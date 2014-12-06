<?php

namespace Member;

use BaseController;
use View;
use Input;
use Exception;
use Redirect;
use Notification;

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

		return View::make($this->template, $data);
	}


}
