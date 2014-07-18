<?php

class SWOController extends BaseController {

	public function showSWOList()
	{
		$swo = Auth::user()->createdSWO;

		$tableHeader = [
		'No',
		'Requester name',
		'Approved'
		];

		$tableBody = [];

		foreach ($swo as $data) {
			$temp = [
			$data->no,
			$data->requester->full_name,
			($data->isApproved()) ? 'Ya' : 'Tidak'
			];
				$tableBody[$data->id] = $temp;
		}

		return View::make('swo.index', [
			'tableHeader' => $tableHeader,
			'tableBody' => $tableBody
			]);
	}

	public function showSWODetails($id)
	{
		$swo = SWO::findOrFail($id);

		if( $swo->requester_id != Auth::id()) {
			return Redirect::route('swo.index')->withErrors('Anda tidak dapat mengakses record tersebut');
		}

		return View::make('swo.details', [
			'swo' => $swo,
			'details' => $swo->lists
			]);
	}

	public function showSWOForm()
	{
		$insertNumber = explode('/', SWO::orderby('created_at', 'desc')->first()->no)[0];
		return View::make('swo.create', [
			'insertNumber' => $insertNumber + 1
			]);
	}

	public function handleSWOData()
	{
		try {

			$swo = new SWO();
			$swo->no = Input::get('no');
			$swo->date = Input::get('date');
			$swo->requester_id = Input::get('requester_id');
			$swo->departement = Input::get('departement');
			$swo->job_number = Input::get('job_number');
			$swo->customer_client = Input::get('customer_client');
			$swo->note = Input::get('note');
			$swo->save();

			$swo_list_input = Input::get('list');

			foreach($swo_list_input as $data) {
				$swo_list = new SWOList();
				$swo_list->no = $data['no'];
				$swo_list->serial_number = $data['serial_number'];
				$swo_list->description = $data['description'];
				$swo_list->service_requested = $data['service_requested'];
				$swo->lists()->save($swo_list);
			}
		// return var_dump($swo_list_input);

		} catch(\Exception $e) {
			return var_dump($e);
		}

		Session::flash('notices', 'Data telah berhasil dimasukan');

		return Redirect::route('swo.index');
		// return var_dump(Input::all());
	}

}
