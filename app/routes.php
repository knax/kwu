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

Route::filter('logged_in', function()
{
	if (Auth::check()) {
		return Redirect::intended('homepage')
			->with('notice', 'Anda sudah masuk');
	}
});

Route::filter('authentication', function() {
	if (Auth::guest())
		return Redirect::intended('login')
				->withErrors('Anda harus login terlebih dahulu');
});


Route::group(['before' => 'authentication'], function()
{
	Route::get('logout', ['uses' => 'AuthenticationController@handleLogout', 'as' => 'login']);
	Route::get('/', ['uses' => 'HomepageController@showHomepage', 'as' => 'homepage']);

	Route::get('swo', ['uses' => 'SWOController@showIndex', 'as' => 'swo.index']);
	Route::get('swo/create', ['uses' => 'SWOController@showSWOForm', 'as' => 'swo.create']);
	Route::post('swo/create', ['uses' => 'SWOController@handleSWOData', 'as' => 'swo.createAction']);
	Route::get('swo/{id}', ['uses' => 'SWOController@showSWODetails', 'as' => 'swo.details'])->where('id', '[0-9]+');

	Route::get('mrf', ['uses' => 'MRFController@showMRFList', 'as' => 'mrf']);
});

Route::get('login', ['uses' => 'AuthenticationController@showLoginForm', 'as' => 'login'])->before('logged_in');;
Route::post('login', ['uses' => 'AuthenticationController@handleLoginData', 'as' => 'loginAction']);