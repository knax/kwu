<?php

class SuperAdminController extends BaseController {

	public function showIndex()
	{
		return 'superadmin';
	}

	public function showChangeInsertNumberForm()
	{
		return View::make('admin.insertnumber', ['insertnumber' => Setting::get('data.insert-number')]);
	}
	public function handleChangeInsertNumber()
	{
		$insertNumber = (int) Input::get('insertnumber');
		if ( ! is_integer($insertNumber)) {
			return false;
		}
		Setting::set('data.insert-number', $insertNumber);

		Session::flash('notices', Lang::get('admin.change_successful'));
		return Redirect::route('homepage');
	}

}