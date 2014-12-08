<?php

namespace Member;

use BaseController;
use View;
use Input;
use Exception;
use Redirect;
use Notification;
use FormRules;

use Model\Company;
use Scienceguard\SG_Util;

class CompanyController extends BaseController {

	public function getIndex()
	{
		$result = (object) Company::paginate(12)->toArray();

		$data = array(
			'content' => 'member/company/index',
			'filter' => Input::get('filter'),
			'result' => $result,
		);

		return View::make($this->template, $data);
	}

	public function getDelete($company_id)
	{
		try{
			Company::where('id', '=', $company_id)->delete();

			Notification::success('notif.delete_company_success');
			return Redirect::to('member/company');
		}
		catch(Exception $e){
			Notification::error($e->getMessage());
			return Redirect::to('member/company');
		}
	}

	public function getEdit($company_id)
	{
		$values = (object) Company::where('id', '=', $company_id)->first()->toArray();

		if(count($values)){
			$values->invoice_id = $values->id;
		}

		$data = array(
			'content' => 'member/company/edit',
			'values' => $values,
		);

		return View::make($this->template, $data);
	}

	public function getAdd()
	{
		$values = array();

		$data = array(
			'content' => 'member/company/add',
			'values' => $values,
		);

		return View::make($this->template, $data);
	}

	public function dataPost()
	{
		$input_company_name = Input::get('company_name','');
		$input_company_email = Input::get('company_email','');
		$input_company_phone = Input::get('company_phone','');
		$input_company_address = Input::get('company_address','');
		$input_company_city_id = Input::get('company_city_id','');
		$input_company_zipcode = Input::get('company_zipcode','');
		$input_company_desc = Input::get('company_desc','');
		$input_company_image = Input::get('company_image','');

		$company_slug = SG_Util::slug($input_company_name,'-');

		$data = array(
			'company_name' => $input_company_name,
			'company_slug' => $company_slug,
			'company_email' => $input_company_email,
			'company_phone' => $input_company_phone,
			'company_address' => $input_company_address,
			'city_id' => $input_company_city_id,
			'company_zipcode' => $input_company_zipcode,
			'company_desc' => $input_company_desc,
			'company_image' => $input_company_image,
		);

		return $data;
	}

	public function postAdd()
	{
		$validator = FormRules::formCompany();
		if($validator->fails()){
			return Redirect::to('member/company/add')
			->withErrors($validator)->withInput();
		}

		$data = $this->dataPost();

		try{
			Company::create($data);

			Notification::success('notif.add_company_success');
			return Redirect::to('member/company');
		}
		catch(Exception $e){
			Notification::error($e->getMessage());
			return Redirect::to('member/company');
		}
	}

	public function postEdit()
	{
		$input_id = Input::get('company_id');

		$validator = FormRules::formCompany();
		if($validator->fails()){
			return Redirect::to('member/company/edit/'.$input_id)
			->withErrors($validator)->withInput();
		}

		$data = $this->dataPost();

		try{
			Company::where('id', '=', $input_id)->update($data);

			Notification::success('notif.edit_company_success');
			return Redirect::to('member/company');
		}
		catch(Exception $e){
			Notification::error($e->getMessage());
			return Redirect::to('member/company');
		}
	}

}
