<?php 

class FormRules{

	public static function formLogin()
    {
        $input = Input::all();

        $rules = array(
            'username' => 'required',
            'password' => 'required',
        );

        $validator = Validator::make($input, $rules);

        return $validator;
    }

	public static function formRegister()
    {
        $input = Input::all();

        $rules = array(
            'username' => 'required|alpha_num|min:5',
            'password' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
        );
        $validator = Validator::make($input, $rules);

        return $validator;
    }

    public static function formForgot()
    {
        $input = Input::all();

        $rules = array(
            'email' => 'required|email',
        );
        $validator = Validator::make($input, $rules);

        return $validator;
    }

    public static function formCompany()
    {
        $input = Input::all();

        $rules = array(
            'company_name' => 'required',
            // 'company_phone' => 'required',
            // 'company_email' => 'required',
            // 'company_address' => 'required',
            // 'company_city_id' => 'required',
            // 'company_zipcode' => 'required',
            // 'company_desc' => 'required',
        );
        $validator = Validator::make($input, $rules);

        return $validator;
    }

    public static function formProduct()
    {
        $input = Input::all();

        $rules = array(
            'product_name' => 'required',
            // 'company_phone' => 'required',
            // 'company_email' => 'required',
            // 'company_address' => 'required',
            // 'company_city_id' => 'required',
            // 'company_zipcode' => 'required',
            // 'company_desc' => 'required',
        );
        $validator = Validator::make($input, $rules);

        return $validator;
    }
}