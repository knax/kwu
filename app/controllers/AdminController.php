<?php

class AdminController extends \BaseController {

	public function showList($name)
	{
		$tableBody = Data::getTableByData(Auth::user()->admin->getDataNeedApproval($name));

		return View::make('data.index', [
			'tableHeader' => Data::$tableHeaderList,
			'tableBody' => $tableBody,
			'name' => Data::$nameDescription[$name]
			]);
	}

	public function showDetails($name, $id)
	{
		$data = Data::findOrFail($id);

		return View::make('data.details', [
			'data' => $data,
			'tableHeader' => Data::$tableHeaderDetails[$name],
			'name' => Data::$nameDescription[$name],
			'approving' => true
			]);
	}

	public function handleApproval($name, $id)
	{
		$data = Data::findOrFail($id);

		$data->approver_id = Auth::id();
		$data->save();

		Session::flash('notices', 'Data telah berhasil diapprove');

		return Redirect::route('admin.index', ['name' => $name]);
	}
}