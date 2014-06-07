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



