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

		$validator = Validator::make(Input::all(), $rules);

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
				return Redirect::route('homepage');
			} else {
				return Redirect::to('login')
				->withErrors(Lang::get('authentication.wrong_username_or_password'));
			}
		}
	}

	public function handleLogout()
	{
		Auth::logout();

		return Redirect::intended(URL::route('login'));
	}
}