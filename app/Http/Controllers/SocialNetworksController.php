<?php

namespace App\Http\Controllers;

use App\Mail\Auth\Mailer;
use App\Models\User;
use App\Models\LoginLog;
use App\Repositories\UserRepository;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Session;

class SocialNetworksController extends Controller
{

	private $users;

    /**
     * Create a new resource instance
     */
    public function __construct(UserRepository  $users) {
        $this->users = $users;
    }

    public function facebookRedirect() {
        return Socialite::driver('facebook')->stateless()->redirect();
    }

    public function facebookClientRedirect($trackClient)
    {
        Session::put('trackClient', $trackClient);
        $trackClient = Session::get('trackClient');

        return Socialite::driver('facebook')->stateless()->redirect();
    }

    public function facebookCallback() : RedirectResponse {
        $facebook_user = Socialite::driver('facebook')->stateless()->user();
        $trackClient = (Session::get('trackClient')) ? Session::get('trackClient') : "unknown";
		$user = User::where('facebook_id', $facebook_user->id)->first();
		if (!($user instanceof User))
			$user = User::where('email', $facebook_user->email)->first();

		if ($user instanceof User) {
			if (is_null($user->facebook_id)) {
				$user->facebook_id = $facebook_user->id;
				$user->save();
			}
		} else {
			$user = new User;
			$user->email = $facebook_user->email ?? $facebook_user->id;
			$user->password = '3rd party';
			$user->facebook_id = $facebook_user->id;
            $user->source = $trackClient;
			$this->users->saveProfile([
				'name' => strtok(trim($facebook_user->name), ' '),
				'last_name' => strtok(' '),
			], $user);

			//Mailer::sendRegisterMail($user);
		}

		Auth::login($user);

        LoginLog::create(
            [
                'user_id' => $user->id,
                'source' => $trackClient
            ]
        );

        if ($trackClient) {
            Session::forget('trackClient');
        }

        return redirect()
            ->route('home')
            ->with(['success' => '¡Bienvenido!']);
    }

    public function googleClientRedirect($trackClient) : RedirectResponse {

        Session::put('trackClient', $trackClient);
        $trackClient = Session::get('trackClient');

        return Socialite::driver('google')->redirect();
    }

    public function googleRedirect() : RedirectResponse {
        return Socialite::driver('google')->redirect();
    }

    public function googleCallback() : RedirectResponse {
        $google_user = Socialite::driver('google')->user();
		$g_user = $google_user->user;
        $trackClient = (Session::get('trackClient')) ? Session::get('trackClient') : "unknown" ;

		if (!$g_user['email_verified'])
			return redirect()
					->route('home')
					->with(['error' => '¡No has verificado el mail de tu cuenta Google!']);

		$user = User::where('google_id', $g_user['sub'])->first();
		if (!($user instanceof User))
			$user = User::where('email', $g_user['email'])->first();

		if ($user instanceof User) {
			if (is_null($user->google_id)) {
				$user->google_id = $g_user['sub'];
				$user->save();
			}
		} else {
			$user = new User;
			$user->email = $g_user['email'] ?? $g_user['sub'];
			$user->password = '3rd party';
			$user->google_id = $g_user['sub'];
            $user->source = $trackClient;
			$this->users->saveProfile([
				'name' => $g_user['given_name'],
				'last_name' => $g_user['family_name'],
			], $user);

			//Mailer::sendRegisterMail($user);
		}

		Auth::login($user);

        LoginLog::create(
            [
                'user_id' => $user->id,
                'source' => $trackClient
            ]
        );

        if ($trackClient) {
            Session::forget('trackClient');
        }

        return redirect()
            ->route('home')
            ->with(['success' => '¡Bienvenido!']);
    }

	public function microsoftRedirect() : RedirectResponse {
        return Socialite::driver('microsoft')->redirect();
    }

    public function microsoftClientRedirect($trackClient): RedirectResponse
    {
        Session::put('trackClient', $trackClient);
        $trackClient = Session::get('trackClient');

        return Socialite::driver('microsoft')->redirect();
    }

    public function microsoftCallback(): RedirectResponse {
		$microsoft_user = Socialite::driver('microsoft')->user();
        $trackClient = (Session::get('trackClient')) ? Session::get('trackClient') : "unknown";
		$user = User::where('microsoft_id', $microsoft_user->id)->first();

		if (!($user instanceof User))
			$user = User::where('email', $microsoft_user->userPrincipalName)->first();

		if ($user instanceof User) {
			if (is_null($user->microsoft_id)) {
				$user->microsoft_id = $microsoft_user->id;
				$user->save();
			}
		} else {
			$user = new User;
			$user->email = $microsoft_user->userPrincipalName ?? $microsoft_user->id;
			$user->password = '3rd party';
			$user->microsoft_id = $microsoft_user->id;
            $user->source = $trackClient;
			$this->users->saveProfile([
				'name' => $microsoft_user->givenName,
				'last_name' => $microsoft_user->surname,
			], $user);

			//Mailer::sendRegisterMail($user);
		}

		Auth::login($user);

        LoginLog::create(
            [
                'user_id' => $user->id,
                'source' => $trackClient
            ]
        );

        if ($trackClient) {
            Session::forget('trackClient');
        }

        return redirect()
            ->route('home')
            ->with(['success' => '¡Bienvenido!']);
    }

	public function appleRedirect() : RedirectResponse {
        return Socialite::driver('apple')->redirect();
    }

	public function appleCallback() : RedirectResponse {
		$apple_user = Socialite::driver('apple')->user();
		$a_user = $apple_user->user;
		if (!$a_user['email_verified'])
			return redirect()
					->route('home')
					->with(['error' => '¡No has verificado el mail de tu cuenta Apple!']);

		$user = User::where('apple_id', $a_user['sub'])->first();
		if (!($user instanceof User))
			$user = User::where('email', $a_user['email'])->first();

		if ($user instanceof User) {
			if (is_null($user->apple_id)) {
				$user->apple_id = $a_user['sub'];
				$user->save();
			}
		} else {
			$user = new User;
			$user->email = $a_user['email'];
			$user->password = '3rd party';
			$user->apple_id = $a_user['sub'];
			$this->users->saveProfile([
				'name' => $apple_user->name ?? strtok(trim($a_user['email']), '@'),
				'last_name' => $apple_user->nickname ?? strtok('@'),
			], $user);

			//Mailer::sendRegisterMail($user);
		}

		Auth::login($user);

        return redirect()
            ->route('home')
            ->with(['success' => '¡Bienvenido!']);
    }

}
