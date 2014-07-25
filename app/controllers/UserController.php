<?php

class UserController extends \BaseController {

	public function showList()
	{
		$tableHeader = [
		'Username',
		'Nama Lengkap',
		'Admin'
		];

		$tableBody = [];

		$user = User::all();

		foreach ($user as $row) {
			$admin = 'Bukan';
			if ($row->isAdmin()) {
				$admin = $row->admin->type;
			}
			$temp = [
			$row->username,
			$row->full_name,
			$admin
			];
			$tableBody[$row->id] = $temp;
		}

		return View::make('data.index', [
			'tableHeader' => $tableHeader,
			'tableBody' => $tableBody,
			'name' => ['full' => 'User List', 'abbr' => ''],
			'userCreate' => true
			]);

	}

	public function showCreateForm()
	{
		return View::make('user.create');
	}

	public function handleForm()
	{
		$user = new User();
		$user->username = Input::get('username');
		$user->password = Hash::make(Input::get('password'));
		$user->full_name = Input::get('full_name');
		$user->save();

		$type = Input::get('admin_type');
		if ($type != 'none') {
			$admin = new Admin();
			$admin->type = $type;
			$user->admin()->save($admin);
		}

		Session::flash('notices', 'User telah berhasil dimasukan');

		return Redirect::route('admin.user');
	}

}