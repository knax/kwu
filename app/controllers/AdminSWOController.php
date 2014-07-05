<?php

class AdminSWOController extends \BaseController {

	public function showListNeedApproval() {
		$user = Auth::user();

		$type = $user->admin->type;

		if ($user->admin->type == 'superadmin') {
			$type = '';
		}

		$swo = SWO::where('no', 'LIKE', '%' . $type . '%')->where('approver_id', '=', null)->get();

		$tableHeader = [
		'No',
		'Requester name'
		];

		$tableBody = [];

		foreach ($swo as $data) {
			$temp = [
			$data->no,
			$data->requester->full_name
			];
			$tableBody[$data->id] = $temp;
		}

		return View::make('admin.swo.index', [
			'tableHeader' => $tableHeader,
			'tableBody' => $tableBody
			]);
	}

	public function showSWODetails($id)
	{
		$swo = SWO::findOrFail($id);

		$user = Auth::user();

		$type = $user->admin->type;

		if ($user->admin->type == 'superadmin') {
			$type = '/';
		}

		if (strpos($swo->no, $type) !== false) {
		} else {
			return Redirect::route('admin.swo.index')->withErrors('Anda tidak dapat mengakses record tersebut');
		}

		return View::make('admin.swo.details', [
			'swo' => $swo,
			'details' => $swo->lists
			]);
	}

	public function handleApproval($id){
		$swo = SWO::find($id);
		$swo->approver_id = Auth::id();
		$swo->save();

		Session::flash('notices', 'Data telah berhasil di approve');

		return Redirect::route('admin.swo.index');
	}
}