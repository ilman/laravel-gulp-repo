<?php

namespace Admin;

use BaseController;
use View;
use Input;
use Exception;
use Redirect;
use Notification;

use Sentry;

use Model\UserGroup;

class UserGroupController extends BaseController {

	public function getIndex()
	{
		$result = (object) UserGroup::paginate(12)->toArray();

		$data = array(
			'content' => 'admin/user_group/index',
			'filter' => Input::get('filter'),
			'result' => $result,
		);

		return View::make($this->template, $data);
	}

	public function getDelete($group_id)
	{
		try{
			$group = Sentry::findGroupById($group_id);
			$group->delete();

			Notification::success('notif.delete_group_success');
			return Redirect::to('admin/user_group');
		}
		catch(Exception $e){
			Notification::error($e->getMessage());
			return Redirect::to('admin/user_group');
		}
	}

	public function getEdit($group_id)
	{
		$values = (object) UserGroup::where('id', '=', $group_id)->first()->toArray();

		if(count($values)){
			$values->invoice_id = $values->id;
		}

		$data = array(
			'content' => 'admin/user_group/edit',
			'values' => $values,
		);

		return View::make($this->template, $data);
	}

	public function getAdd()
	{
		$values = array();

		$data = array(
			'content' => 'admin/user_group/add',
			'values' => $values,
		);

		return View::make($this->template, $data);
	}

	public function postAdd()
	{
		$input_group_name = Input::get('group_name','');
		$input_group_permission = Input::get('group_permission',array('member'));
		$group_permission = array();

		foreach($input_group_permission as $item){
			$group_permission[$item] = 1;
		}

		$data = array(
			'name' => $input_group_name,
			'permissions' => $group_permission,
		);

		try{
			Sentry::createGroup($data);

			Notification::success('notif.add_group_success');
			return Redirect::to('admin/user_group');
		}
		catch(Exception $e){
			Notification::error($e->getMessage());
			return Redirect::to('admin/user_group');
		}
	}

	public function postEdit()
	{
		$input_id = Input::get('group_id');
		$input_group_name = Input::get('group_name','');
		$input_group_permission = Input::get('group_permission',array('member'=>1));

		try{
			$group = Sentry::findGroupById($input_id);
			$group->name = $input_group_name;
			$group->permissions = $input_group_permission;
			$group->save();

			Notification::success('notif.edit_group_success');
			return Redirect::to('admin/user_group');
		}
		catch(Exception $e){
			Notification::error($e->getMessage());
			return Redirect::to('admin/user_group');
		}
	}

}
