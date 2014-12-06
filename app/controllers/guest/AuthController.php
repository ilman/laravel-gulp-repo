<?php

namespace Guest;

use BaseController;
use View;
use Input;
use Exception;
use Redirect;
use Notification;
use Event;
use FormRules;

use Sentry;
use Model\User;

use Cartalyst\Sentry\Users\LoginRequiredException;
use Cartalyst\Sentry\Users\UserNotFoundException;
use Cartalyst\Sentry\Users\UserNotActivatedException;
use Cartalyst\Sentry\Throttling\UserSuspendedException;
use Cartalyst\Sentry\Throttling\UserBannedException;
use Scienceguard\SG_Util;

class AuthController extends BaseController {

	public function getLogin()
	{
		$data = array(
			'content' => 'guest/auth/login',
			'subheader' => false,
			'values' => Input::old(),
		);

		return View::make($this->template, $data);
	}

	public function getLogout()
	{
		try{
			Sentry::logout();

			Notification::success('notif.logout_success');
			return Redirect::to('login');
		}
		catch(Exception $e){
			Notification::success($e->getMessage());
			return Redirect::to('login');
		}
	}

	public function getRegister()
	{
		$data = array(
			'content' => 'guest/auth/register',
			'subheader' => false,
			'values' => Input::old(),
		);

		return View::make($this->template, $data);
	}

	public function postRegister()
	{
		$validator = FormRules::formRegister();
		if($validator->fails()){
			return Redirect::to('register')
			->withErrors($validator)->withInput();
		}

		$input_username = Input::get('username');
		$input_email = Input::get('email');
		$input_phone = Input::get('phone');
		$input_password = Input::get('password');

		try{
			$data = array(
				'username' => $input_username,
				'email' => $input_email,
				'phone' => $input_phone,
				'password' => sha1($input_password),
				'activated' => 1,
			);

			$user = User::create($data);
			$user_id = SG_Util::val($user, 'id');

			$group = Sentry::findGroupByName('Member');
			$user = Sentry::findUserById(1);
			$user->addGroup($group);

			Sentry::login($user, false);

			Event::fire('user.register', array($user));

			Notification::success('notif.register_user_success');
			return Redirect::to('member');
		}
		catch(Exception $e){
			Notification::error($e->getMessage());
			return Redirect::to('register');
		}
	}

	public function postLogin()
	{
		$validator = FormRules::formLogin();
		if($validator->fails()){
			return Redirect::to('login')
			->withErrors($validator)->withInput();
		}

		$input_username = Input::get('username');
		$input_password = Input::get('password');

		try{
			$user = User::where('username', '=', $input_username)
			->where('password', '=', sha1($input_password))
			->first();

			$user_id = SG_Util::val($user, 'id');

			// get sentry user object
			$user = Sentry::findUserById(1);

			Sentry::login($user, false);

			Event::fire('user.login', array($user));

			Notification::success('notif.login_user_success');
			return Redirect::to('member');
		}
		catch(Exception $e){
			Notification::error($e->getMessage());
			return Redirect::to('login');
		}
		// catch (LoginRequiredException $e){
		//     echo 'Login field is required.';
		// }
		// catch (UserNotFoundException $e){
		//     echo 'User not found.';
		// }
		// catch (UserNotActivatedException $e){
		//     echo 'User not activated.';
		// }
		// catch (UserSuspendedException $e){
		//     $time = $throttle->getSuspensionTime();
		//     echo "User is suspended for [$time] minutes.";
		// }
		// catch (UserBannedException $e){
		//     echo 'User is banned.';
		// }
	}

}
