<?php

namespace App\Helpers;

use Lcobucci\JWT\Builder;
use Lcobucci\JWT\Parser;
use Lcobucci\JWT\Signer\Keychain;
use Lcobucci\JWT\Signer\Rsa\Sha256;
use Lcobucci\JWT\ValidationData;

use App\Models\User;

use Date;
use Exception;
use Log;

abstract class QDJWT
{
    /**
     * Verify the token
     *
     * @param boolean $check_csrf
     * @return array
     */
    public static function verify($check_csrf=false)
    {
        $token = static::parse();
        if (is_null($token)) {
            return null;
        }
        return self::validate($token, $check_csrf);
    }

    /**
     * Validate the token
     *
     * @param Lcobucci\JWT\Token $token
     * @param boolean $check_csrf
     * @return array
     */
    public static function validate($token, $check_csrf)
    {
        $token = (is_string($token)) ? self::parser($token) : $token;

        if (is_null($token) || !(self::checkSignature($token) && self::checkClaims($token))) {
            return false;
        }

        $validations = self::getValidations($token, $check_csrf);
        return (!in_array(false, $validations));
    }

    /**
     * Return validation code
     *
     * @param boolean $check_csrf
     * @return array
     */
    public static function getValidationCode($check_csrf=false)
    {
        $token = static::parse();
        if (is_null($token)) {
            return null;
        }

        $validation_code = array_map(function ($value) {
            return (string)(int)$value;
        }, self::getValidations($token, $check_csrf));
        return implode("", $validation_code);
    }

    /*
    ==================================================
    PROTECTED FUNCTIONS
    ==================================================
    */

    /**
     * Parse the token
     *
     * @param string $token
     * @return Lcobucci\JWT\Token|null
     */
    protected static function parser($token)
    {
        try {
            $token = (new Parser())->parse((string) $token);
        } catch (Exception $e) {
            $error_message = $e->getMessage();
            Log::error("QDJWT@parser : {$error_message}");
            $token = null;
        }
        return $token;
    }

    /**
     * Build the JWT token
     *
     * @param boolean $guest
     * @return Lcobucci\JWT\Token
     */
    protected static function payload($guest=false)
    {
        $claims = [
            'iss' => config('app.host'),
            'aud' => config('app.host'),
            'jti' => config('money.app.version'),
            'iat' => Date::now()->timestamp,
            'nbf' => Date::now()->timestamp,
            'exp' => (new Date('+1 month'))->timestamp
        ];

        $csrf_token = csrf_token();
        $scope = static::$scope;
        $uid = ($guest) ? self::guest() : request()->user()->hashid;
        $ip = request()->ip();

        $signer = new Sha256();
        $keychain = new Keychain();
        $private_key = $keychain->getPrivateKey('file://' . storage_path(static::$private_key));
        $token = (new Builder())->setIssuer($claims['iss'])     // Sets the issuer (iss claim)
                                ->setAudience($claims['aud'])   // Sets the audience (aud claim)
                                ->setId($claims['jti'])         // Sets the id (jti claim), replicating as a header item
                                ->setIssuedAt($claims['iat'])   // Sets the time that the token was issue (iat claim)
                                ->setNotBefore($claims['nbf'])  // Sets the time that the token can be used (nbf claim)
                                ->setExpiration($claims['exp']) // Sets the expiration time of the token (nbf claim)
                                ->set('csrfToken', $csrf_token) // Sets a new claim, called "csrfToken"
                                ->set('scope', $scope)          // Sets a new claim, called "scope"
                                ->set('uid', $uid)              // Sets a new claim, called "uid"
                                ->set('uip', $ip)               // Sets a new claim, called "uip"
                                ->sign($signer, $private_key)   // Creates a signature using your private key
                                ->getToken();                   // Retrieves the generated token
        return $token;
    }

    /**
     * Verify the token signature
     *
     * @param Lcobucci\JWT\Token $token
     * @return boolean
     */
    protected static function checkSignature($token)
    {
        $signer = new Sha256();
        $keychain = new Keychain();
        $public_key = $keychain->getPublicKey('file://' . storage_path(static::$public_key));
        return $token->verify($signer, $public_key);
    }

    /**
     * Verify the token base claims
     *
     * @param Lcobucci\JWT\Token $token
     * @return boolean
     */
    protected static function checkClaims($token)
    {
        $claims = [
            'iss' => config('app.host'),
            'aud' => config('app.host'),
            'jti' => config('money.app.version'),
        ];
        $data = new ValidationData(); // It will use the current time to validate (iat, nbf and exp)
        $data->setIssuer($claims['iss']);
        $data->setAudience($claims['aud']);
        $data->setId($claims['jti']);
        return $token->validate($data);
    }

    /**
     * Return the array of validations
     *
     * @param Lcobucci\JWT\Token $token
     * @param boolean $check_csrf
     * @return array
     */
    protected static function getValidations($token, $check_csrf)
    {
        return [
            self::validateScope($token),
            ($check_csrf) ? self::validateCsrfToken($token) : true,
            self::validateUip($token),
            self::validateUid($token)
        ];
    }

    /**
     * Validate claim scope
     *
     * @param Lcobucci\JWT\Token $token
     * @return boolean
     */
    protected static function validateScope($token)
    {
        $claim = 'scope';
        if (!$token->hasClaim($claim)) {
            return false;
        }
        $scope = $token->getClaim($claim);
        return ($scope === static::$scope);
    }

    /**
     * Validate claim csrf token
     *
     * @param Lcobucci\JWT\Token $token
     * @return boolean
     */
    protected static function validateCsrfToken($token)
    {
        $claim = 'csrfToken';
        if (!$token->hasClaim($claim)) {
            return false;
        }
        $csrf_token = $token->getClaim($claim);
        return ($csrf_token === csrf_token());
    }

    /**
     * Validate claim ip address
     *
     * @param Lcobucci\JWT\Token $token
     * @return boolean
     */
    protected static function validateUip($token)
    {
        return true;
        /*
        $claim = 'uip';
        if (!$token->hasClaim($claim)) {
            return false;
        }
        $claim_ip = $token->getClaim($claim);
        $request_ip = request()->ip();
        return ($claim_ip === $request_ip);
        */
    }

    /**
     * Validate claim uid
     *
     * @param Lcobucci\JWT\Token $token
     * @return boolean
     */
    protected static function validateUid($token)
    {
        $claim = 'uid';
        if (!$token->hasClaim($claim)) {
            return false;
        }
        $uid = $token->getClaim($claim);
        $user = request()->user();
        if (!$user instanceof User) {
            return true;
        }

        return $user->compareHashid($uid);
    }

    /*
    ==================================================
    PRIVATE FUNCTIONS
    ==================================================
    */

    /**
     * Generate guest payload
     *
     * @return string
     */
    private static function guest()
    {
        return bcrypt('guest');
    }
}
