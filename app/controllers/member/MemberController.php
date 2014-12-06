<?php

namespace Member;

use BaseController;
use View;
use Input;
use Exception;
use Redirect;
use Notification;
use Event;

use Sentry;
use Model\User;

use Scienceguard\SG_Util;

class MemberController extends BaseController {

	public function getDashboard()
	{
		$data = array(
			'content' => 'member/user/dashboard',
			'values' => Input::old(),
		);

		Event::fire('test.dashboard', array($data));

		return View::make($this->template, $data);
	}


}
