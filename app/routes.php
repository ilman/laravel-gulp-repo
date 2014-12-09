<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('hello');
});


Route::group(
	array(
		'prefix'=>'',
		'namespace' => 'Guest'
	),
	function(){
		Route::get('login', 'AuthController@getLogin');
		Route::post('login', 'AuthController@postLogin');
		Route::get('logout', 'AuthController@getLogout');
		Route::get('register', 'AuthController@getRegister');
		Route::post('register', 'AuthController@postRegister');
	}
);

Route::filter('sentry', function(){
	if(!Sentry::check()){
		Notification::error('notif.not_logged_in');
		return Redirect::to('login');
	}
});

Route::group(
	array(
		'prefix' => 'member',
		'namespace' => 'Member',
		'before' => 'sentry'
	),
	function(){
		Route::get('', 'MemberController@getDashboard');
		Route::controller('company', 'CompanyController');
		Route::controller('product', 'ProductController');
	}
);

Route::group(
	array(
		'prefix' => 'admin',
		'namespace' => 'Admin'
	),
	function(){
		Route::controller('user', 'UserController');
		Route::controller('user_group', 'UserGroupController');
	}
);


Route::group(
	array(
		'prefix'=>'marketnesia'
	),
	function(){
		Route::group(
			array(
				'prefix'=>'',
				'namespace' => 'Marketnesia\Guest'
			),
			function(){
				Route::get('home', 'IndexController@index');
				Route::controller('market', 'MarketController');
			}
		);
	}
);
