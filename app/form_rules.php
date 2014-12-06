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

    public static function formProductGroup()
    {
        $input = Input::all();

        $rules = array(
            'store_id' => 'required',
            'group_name' => 'required',
        );
        $validator = Validator::make($input, $rules);

        return $validator;
    }
}