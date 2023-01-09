<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

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
        return Socialite::driver('facebook')->redirect();
    }

    public function facebookCallback()
    {
        // TODO...
		$facebook_user = Socialite::driver('facebook')->user();
		dd($facebook_user);
    }
	
    public function googleRedirect() {
        return Socialite::driver('google')->redirect();
    }

    public function googleCallback()
    {
        $google_user = Socialite::driver('google')->user();
		$subuser = $google_user->user;
		$user = User::query()->where('email', $subuser['email'])->first();
		
		if (is_null($user)) {
			$user = new User;
			$user->email = $subuser['email'];
			$user->password = 'via google oauth';
			$user->google_id = $subuser['sub'];
			$user = $this->users->saveProfile([
				'name' => $subuser['given_name'],
				'last_name' => $subuser['family_name'],
			], $user);
			
			Auth::login($user);

			// TODO..
			//Mailer::sendRegisterMail($user);
			
			return redirect()->route('home')
					->with(['success' => '¡Bienvenido! ahora estás registrado.']);
		} else {
			Auth::login($user);
			
			return redirect()->route('home')
					->with(['success' => 'Se inició tu sesión correctamente.']);
		}
    }
	
	public function microsoftRedirect() {
        return Socialite::driver('microsoft')->redirect();
    }

    public function microsoftCallback()
    {
        // TODO...
		$microsoft_user = Socialite::driver('microsoft')->user();
		dd($microsoft_user);
    }
	
}
