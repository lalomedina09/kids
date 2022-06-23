<?php

namespace App\Helpers;

use App\Models\User;

use Auth;
use Exception;
use Hash;

class QDToken extends QDJWT
{

    const HEADER_NAME = 'Authorization';
    const HEADER_TYPE = 'Bearer';

    protected static $scope = 'token';
    protected static $private_key = 'app/keys/token-private.key';
    protected static $public_key = 'app/keys/token-public.key';

    /**
     * Authenticate user using token
     *
     * @return boolean
     */
    public static function authenticate()
    {
        $token = self::parse();
        if (is_null($token)) {
            return false;
        }

        $user_hashid = $token->getClaim('uid');
        if (Hash::check('guest', $user_hashid)) {
            return true;
        }

        $user = User::byHashid($user_hashid)->first();
        if (!$user instanceof User) {
            return false;
        }
        Auth::onceUsingId($user->id);

        return true;
    }

    /**
     * Generate a token
     *
     * @param boolean $guest
     * @return string
     */
    public static function generate($guest=false)
    {
        return self::payload($guest);
    }

    /*
    ==================================================
    PROTECTED FUNCTIONS
    ==================================================
    */

    /**
     * Parse the cookie
     *
     * @return Lcobucci\JWT\Token|null
     */
    protected static function parse()
    {
        $authorization_header = request()->header(self::HEADER_NAME);
        $matches = [];
        $header_type = self::HEADER_TYPE;
        preg_match("/{$header_type}\s(.*)/", $authorization_header, $matches);
        if (!isset($matches[1])) {
            throw new Exception('Unable to extract token, bad authorization header');
        }
        $token = self::parser($matches[1]);
        return $token;
    }
}
