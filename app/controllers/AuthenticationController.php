<?php

class AuthenticationController extends \BaseController {

	public function showLoginForm()
	{
		return View::make('authentication.login');
	}

	public function handleLoginData()
	{
		$rules = array(
			'username' => 'required',
			'password' => 'required'
			);

		$messages = array(
			'required' => 'Kolom :attribute harus dimasukkan.',
			);

		$validator = Validator::make(Input::all(), $rules, $messages);

		if ($validator->fails()) {
			return Redirect::to('login')
			->withErrors($validator)
			->withInput(Input::except('password'));
		} else {
			$userdata = array(
				'username' 	=> Input::get('username'),
				'password' 	=> Input::get('password')
				);

			if (Auth::attempt($userdata)) {
				return Redirect::intended('/');
			} else {
				return Redirect::to('login')
				->withErrors('Username atau Password salah');
			}
		}
	}

	public function handleLogout()
	{
		Auth::logout();

		return Redirect::intended('/login');
	}
}