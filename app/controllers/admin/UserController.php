<?php

namespace Admin;

use BaseController;
use View;
use Input;
use Exception;
use Redirect;
use Notification;

use User;

class UserController extends BaseController {

	public function getIndex()
	{
		$result = (object) User::paginate(12)->toArray();

		$data = array(
			'content' => 'admin/user/index',
			'filter' => Input::get('filter'),
			'result' => $result,
		);

		return View::make($this->template, $data);
	}

	public function getDelete($user_id)
	{
		try{
			User::where('id', '=', $user_id)->delete();

			Notification::success('notif.delete_user_success');
			return Redirect::to('user');
		}
		catch(Exception $e){
			Notification::error($e->getMessage());
			return Redirect::to('user');
		}
	}

	public function getEdit($user_id)
	{
		$values = (object) User::where('id', '=', $user_id)->first()->toArray();

		if(count($values)){
			$values->invoice_id = $values->id;
		}

		$data = array(
			'content' => 'admin/user/edit',
			'values' => $values,
		);

		return View::make($this->template, $data);
	}

	public function getAdd()
	{
		$values = array();

		$data = array(
			'content' => 'admin/user/add',
			'values' => $values,
		);

		return View::make($this->template, $data);
	}

	public function dataPost()
	{
		$input_username = Input::get('username','');
		$input_email = Input::get('email','');
		$input_phone = Input::get('phone','');
		$input_password = sha1(Input::get('password',''));
		$input_user_group_id = Input::get('user_group_id','');
		$input_status = Input::get('status','');

		$data = array(
			'username' => $input_user_name,
			'email' => $input_email,
			'phone' => $input_phone,
			'password' => $input_password,
		);

		return $data;
	}

	public function postAdd()
	{
		$data = $this->dataPost();

		try{
			User::create($data);

			Notification::success('notif.add_user_success');
			return Redirect::to('user');
		}
		catch(Exception $e){
			Notification::error($e->getMessage());
			return Redirect::to('user');
		}
	}

	public function postEdit()
	{
		$input_id = Input::get('user_id');

		$data = $this->dataPost();

		try{
			User::where('id', '=', $input_id)->update($data);

			Notification::success('notif.edit_user_success');
			return Redirect::to('user');
		}
		catch(Exception $e){
			Notification::error($e->getMessage());
			return Redirect::to('user');
		}
	}

}
