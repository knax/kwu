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
		return Redirect::route('homepage')
		->with('notice', 'Anda sudah masuk');
	}
});

Route::filter('authentication', function() {
	if (Auth::guest())
		return Redirect::intended('login')
	->withErrors('Anda harus login terlebih dahulu');
});

Route::filter('checkAdmin', function() {
	if (!Auth::user()->isAdmin())
		return Redirect::route('homepage')
	->withErrors('Anda tidak dapat mengakses halaman admin');
});


Route::group(['before' => 'authentication'], function()
{
	Route::get('logout', ['uses' => 'AuthenticationController@handleLogout', 'as' => 'login']);
	Route::get('/', ['uses' => 'HomepageController@showHomepage', 'as' => 'homepage']);

	Route::get('{name}', ['uses' => 'DataController@showList', 'as' => 'data.index'])->where('name', '\b(swo)\b|\b(mrf)\b');
	Route::get('{name}/{id}', ['uses' => 'DataController@showDetail', 'as' => 'data.details'])->where('name', '\b(swo)\b|\b(mrf)\b')->where('id', '[0-9]+');
	Route::get('{name}/create', ['uses' => 'DataController@showCreateFrom', 'as' => 'data.create'])->where('name', '\b(swo)\b|\b(mrf)\b');
	Route::post('{name}', ['uses' => 'DataController@handleFormData', 'as' => 'data.index'])->where('name', '\b(swo)\b|\b(mrf)\b');

	Route::group(['before' => 'checkAdmin'], function()
	{
		Route::get('admin/{name}', ['uses' => 'AdminController@showList', 'as' => 'admin.index'])->where('name', '\b(swo)\b|\b(mrf)\b');
		Route::get('admin/{name}/{id}', ['uses' => 'AdminController@showDetails', 'as' => 'admin.details'])->where('name', '\b(swo)\b|\b(mrf)\b')->where('id', '[0-9]+');
		Route::post('admin/{name}/{id}', ['uses' => 'AdminController@handleApproval', 'as' => 'admin.approval'])->where('name', '\b(swo)\b|\b(mrf)\b')->where('id', '[0-9]+');
		Route::get('admin/user', ['uses' => 'UserController@showList', 'as' => 'admin.user']);
		Route::get('admin/create', ['uses' => 'UserController@showCreateForm', 'as' => 'admin.user.create']);
		Route::post('admin/create', ['uses' => 'UserController@handleForm', 'as' => 'admin.user.createAction']);
		// Route::get('admin/swo/{id}', ['uses' => 'AdminSWOController@showSWODetails', 'as' => 'admin.swo.details'])->where('id', '[0-9]+');
		// Route::post('admin/swo/{id}', ['uses' => 'AdminSWOController@handleApproval', 'as' => 'admin.swo.approve'])->where('id', '[0-9]+');
	});
});

Route::get('login', ['uses' => 'AuthenticationController@showLoginForm', 'as' => 'login'])->before('logged_in');;
Route::post('login', ['uses' => 'AuthenticationController@handleLoginData', 'as' => 'loginAction']);