<?php

namespace Member;

use BaseController;
use View;
use Input;
use Exception;
use Redirect;
use Notification;
use FormRules;

use Model\Product;
use Scienceguard\SG_Util;

class ProductController extends BaseController {

	public function getIndex()
	{
		$result = (object) Product::paginate(12)->toArray();

		$data = array(
			'content' => 'member/product/index',
			'filter' => Input::get('filter'),
			'result' => $result,
		);

		return View::make($this->template, $data);
	}

	public function getDelete($product_id)
	{
		try{
			Product::where('id', '=', $product_id)->delete();

			Notification::success('notif.delete_product_success');
			return Redirect::to('member/product');
		}
		catch(Exception $e){
			Notification::error($e->getMessage());
			return Redirect::to('member/product');
		}
	}

	public function dataGet()
	{
		$option_user_company = array(
			array('label'=>'test company', 'value'=>1), 
		);

		$data = array(
			'option_user_company' => $option_user_company,
		);

		return $data;
	}

	public function getEdit($product_id)
	{
		$values = (object) Product::where('id', '=', $product_id)->first()->toArray();

		if(count($values)){
			$values->invoice_id = $values->id;
		}

		$data = array(
			'content' => 'member/product/edit',
			'values' => $values,
		);
		$data = array_merge($this->dataGet(), $data);

		return View::make($this->template, $data);
	}

	public function getAdd()
	{
		$values = array();

		$data = array(
			'content' => 'member/product/add',
			'values' => $values,
		);
		$data = array_merge($this->dataGet(), $data);

		return View::make($this->template, $data);
	}

	public function dataPost()
	{
		$input_product_name = Input::get('product_name','');
		$input_product_image = Input::get('product_image','');
		$input_product_desc = Input::get('product_desc','');
		$input_product_weight = Input::get('product_weight',1);
		$input_weight_unit = Input::get('weight_unit','kg');
		$input_product_price = Input::get('product_price',0);
		$input_currency = Input::get('currency','idr');
		$input_company_id = Input::get('company_id',0);
		$input_product_cat_id = Input::get('product_cat_id',0);
		$input_product_group_id = Input::get('product_group_id',0);

		$product_slug = SG_Util::slug($input_product_name,'-');

		$data = array(
			'product_name' => $input_product_name,
			'product_slug' => $product_slug,
			'product_desc' => $input_product_desc,
			'product_image' => $input_product_image,
			'product_weight' => $input_product_weight,
			'weight_unit' => $input_weight_unit,
			'product_price' => $input_product_price,
			'currency' => $input_currency,
			'company_id' => $input_company_id,
			'product_cat_id' => $input_product_cat_id,
			'product_group_id' => $input_product_group_id,
		);

		return $data;
	}

	public function postAdd()
	{
		$validator = FormRules::formProduct();
		if($validator->fails()){
			return Redirect::to('member/product/add')
			->withErrors($validator)->withInput();
		}

		$data = $this->dataPost();

		try{
			Product::create($data);

			Notification::success('notif.add_product_success');
			return Redirect::to('member/product');
		}
		catch(Exception $e){
			Notification::error($e->getMessage());
			return Redirect::to('member/product');
		}
	}

	public function postEdit()
	{
		$input_id = Input::get('product_id');

		$validator = FormRules::formProduct();
		if($validator->fails()){
			return Redirect::to('member/product/edit/'.$input_id)
			->withErrors($validator)->withInput();
		}

		$data = $this->dataPost();

		try{
			Product::where('id', '=', $input_id)->update($data);

			Notification::success('notif.edit_product_success');
			return Redirect::to('member/product');
		}
		catch(Exception $e){
			Notification::error($e->getMessage());
			return Redirect::to('member/product');
		}
	}

}
