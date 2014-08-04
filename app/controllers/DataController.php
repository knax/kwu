<?php

class DataController extends BaseController {

	public function showList($name)
	{
		return View::make('data.index', [
			'table' => [
			'header' => Setting::get('table-header.data-list'),
			'body' => Data::getListOfDataAsTable(Auth::user()->data()->type($name)->get())
			],
			'header' => 'Homepage ' . strtoupper($name),
			'name' => $name,
			'dataCreate' => true
			]);
	}

	public function showDetail($name, $id)
	{
		$data = Data::findOrFail($id);

		if( $data->requester_id != Auth::id()) {
			return Redirect::route('data.index', ['name' => $name])->withErrors(Lang::get('authentication.not_enough_permission'));
		}

		$table = [
		'header' => $data->getAdditionalDataTableHeader(),
		'body' => json_decode($data->additional_data)
		];

		return View::make('data.details', [
			'table' => $table,
			'data' => $data,
			'name' => $data->getNameDescription()
			]);
	}

	public function showCreateForm($name)
	{
		$insertNumber = Setting::get('data.insert-number');

		return View::make('data.create', [
			'insertNumber' => $insertNumber,
			'tableHeader' => Data::getAdditionalDataTableHeaderByName($name),
			'pageHeader' => Data::getPageHeaderByName($name),
			'name' => $name
			]);
	}

	public function handleFormData($name) {
		$data = new Data(Input::all());
		$data->requester_id = Auth::id();
		$data->save();

		Session::flash('notices', Lang::get('data.successful_insert'));

		$lastNumber = Setting::get('data.insert-number');

		Setting::set('data.insert-number', $lastNumber + 1);

		return Redirect::route('data.index', ['name' => $name]);
	}

	public function showPrint($id) {
		$data = Data::findOrFail($id);
		$binary = base_path() . '/app/bin/wkhtmltopdf';
		$snappy = new Knp\Snappy\Pdf($binary);
		$response = Response::make($snappy->getOutput(URL::route('data.print.raw', ['id' => $id])));
		$response->header('Content-Type', 'application/pdf');
		$response->header('Content-Disposition', 'attachment; filename="' . $data->no . '.pdf"');
		return $response;
	}


	public function showPrintRaw($id)
	{
		$data = Data::findOrFail($id);

		$table = [];

		$table[] = '<thead>';
		foreach ($data->getAdditionalDataTableHeader() as $value) {
			$table[] = '<th class="width-' . $value['width'] . '">' . $value['name'] . '</th>';
		}
		$table[] = '</thead>';

		$table[] = '<tbody>';
		foreach (json_decode($data->additional_data) as $row) {
			$table[] = '<tr>';
			foreach ($row as $value) {
				$table[] = '<td>' . $value . '</td>';
			}
			$table[] = '</tr>';
		}
		$table[] = '</tbody>';

		return View::make('data.print', [
			'data' => $data,
			'table' => implode($table, ''),
			'header' => $data->getPageHeader()
			]);
	}

}
