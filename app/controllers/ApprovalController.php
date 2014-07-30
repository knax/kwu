<?php

class ApprovalController extends \BaseController {

	public function showList()
	{
		$table = [
		'header' => Setting::get('table-header.data-list'),
		'body' => Data::getListOfDataAsTable(Auth::user()->admin->getDataNeedApproval())
		];

		return View::make('data.index', [
			'table' => $table,
			'header' => 'Homepage Admin',
			]);
	}

	public function showDetails($id)
	{
		$data = Data::findOrFail($id);

		$type = $data->type();

		$table = [
		'header' => Setting::get('subtype.' . $type . '.header'),
		'body' => json_decode($data->additional_data)
		];

		return View::make('data.details', [
			'data' => $data,
			'table' => $table,
			'approving' => true
			]);
	}

	public function handleApproval($id)
	{
		$data = Data::findOrFail($id);

		$data->approver_id = Auth::id();
		$data->save();

		Session::flash('notices', 'Data telah berhasil diapprove');

		return Redirect::route('admin.approval');
	}
}