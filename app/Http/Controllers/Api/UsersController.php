<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

namespace QD\QDPlay\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Repositories\UserRepository;

/**
 * Description of UsersController
 *
 * @author Neurona X
 */
class UsersController extends Controller {
	
	private $users;
	
	public function __construct(UserRepository $users) {
        $this->users = $users;
    }
	
	public function signup() {
		$user = User::where('email', request('email'))->first();
		if ($user instanceof User) {
			return response()->json([
				'valid' => false,
				'message' => 'Already Exists',
			], 412);
		}
		
		$user = new User;
		$user->email = request('email');
		$user->password = bcrypt(request('password'));
		$user->app_password_key = hash('sha512', rand() . $user->email . rand());
		$this->users->saveProfile([
			'name' => strtok(request('name'), ' '),
			'last_name' => strtok(' '),
		], $user);
		
		return json_encode([
			'valid' => true,
			'email' => $user->email,
			'full_name' => $user->full_name,
			'app_password_key' => $user->app_password_key,
			'message' => 'OK'
		]);
	}
	
	public function login() {
		$user = User::where('email', request('email'))->first();
		
		if ($user instanceof User) {
			// TODO... check password
			
			$user->app_password_key = hash('sha512', rand() . $user->email . rand());
			$user->save();
			
			return json_encode([
				'valid' => true,
				'email' => $user->email,
				'full_name' => $user->full_name,
				'app_password_key' => $user->app_password_key,
				'message' => 'OK'
			]);
		}
		
		return response()->json([
			'valid' => false,
			'message' => 'Not Found',
		], 404);
	}
	
	public function thirdPartyAccess() {
		$user = User::where('facebook_id', request('facebookId','$'))->
				orWhere('google_id', request('googleId','$'))->
				orWhere('microsoft_id', request('microsoftId','$'))->
				orWhere('apple_id', request('appleId','$'))->first();

		if (!($user instanceof User))
			$user = User::where('email', request('email'))->first();
		
		if ($user instanceof User) {
			$user->facebook_id = request('facebookId', $user->facebook_id);
			$user->google_id = request('googleId', $user->google_id);
			$user->microsoft_id = request('microsoftId', $user->microsoft_id);
			$user->apple_id = request('appleId', $user->apple_id);
			$user->app_password_key = hash('sha512', rand() . $user->email . rand());
			$user->save();
		} else {
			$user = new User;
			$user->email = request('email') ?? request('facebookId')
					 ?? request('googleId') ?? request('microsoftId')
					 ?? request('appleId');
			$user->password = '3rd party';
			$user->facebook_id = request('facebookId');
			$user->google_id = request('googleId');
			$user->microsoft_id = request('microsoftId');
			$user->apple_id = request('appleId');
			$user->app_password_key = hash('sha512', rand() . $user->email . rand());
			
			$this->users->saveProfile([
				'name' => strtok(trim(request('name')), ' '),
				'last_name' => strtok(' '),
			], $user);
		}
		
		return json_encode([
			'valid' => true,
			'email' => $user->email,
			'full_name' => $user->full_name,
			'app_password_key' => $user->app_password_key,
			'message' => 'OK'
		]);
	}
	
	public function checkSession() {
		$user = User::where('email', request('email'))->first();
		if ($user instanceof User) {
			if ($user->app_password_key != request('passwordKey'))
				return response()->json([
					'valid' => false,
					'message' => 'Invalid Key',
				], 403);
			
			// TODO... check subscriptions and licenses
			
			return json_encode([
				'valid' => true,
				'message' => 'OK'
			]);
		}
		
		return response()->json([
			'valid' => false,
			'message' => 'Not Found',
		], 404);
	}
}
