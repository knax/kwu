<?php

class UserController extends \BaseController {

	public function showList()
	{
		$tableBody = [];

		$users = User::all();

		foreach ($users as $user) {
			$row = [
			$user->username,
			$user->full_name,
			($user->isAdmin()) ? $user->admin->type : Lang::get('general.no')
			];
			$tableBody[$user->id] = $row;
		}

		return View::make('data.index', [
			'header' => Lang::get('user.user-list'),
			'table' => [
			'header' => Setting::get('table-header.user-list'),
			'body' => $tableBody,
			'class' => ['table-clickable']
			],
			'userCreate' => true
			]);

	}

	public function showDetails($id)
	{
		$tableBody = [];

		$user = User::findOrFail($id);

		return View::make('user.details', [
			'user' => $user
			]);

	}

	public function handleEditForm($id){
		$user = User::findOrFail($id);

		$user->username = Input::get('username');
		$user->password = Hash::make(Input::get('password'));
		$user->full_name = Input::get('full_name');

		$type = Input::get('admin_type');
		if ($type != 'none' && (!$user->isAdmin())) {
			$user->save();
			$admin = new Admin();
			$admin->type = $type;
			$user->admin()->save($admin);
		} elseif ($type != 'none' && $user->isAdmin()) {
			$user->admin->type = $type;
			$user->save();
		} elseif ($type == 'none' && $user->isAdmin()) {
			$user->admin()->delete();
			$user->save();
		} else {
			$user->save();
		}

		Session::flash('notices', 'User succesfully edited');

		return Redirect::route('admin.super.user');
	}
	public function handleDelete($id) {
		$user = User::findOrFail($id);
		$user->delete();

		Session::flash('notices', 'User succesfully deleted');

		return Redirect::route('admin.super.user');

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

		Session::flash('notices', Lang::get('user.register_complete'));

		return Redirect::route('admin.super.user');
	}

}