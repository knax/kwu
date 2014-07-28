<?php

class DataController extends BaseController {

	public function showList($name)
	{
		$tableBody = Data::getTableByData(Auth::user()->data()->type($name)->get());

		return View::make('data.index', [
			'tableHeader' => Data::$tableHeaderList,
			'tableBody' => $tableBody,
			'name' => Data::$nameDescription[$name]
			]);
	}

	public function showPrintRaw($name, $id)
	{
		$data = Data::findOrFail($id);

		$table = [];

		$table[] = '<thead>';
		foreach (Data::$tableHeaderDetails[$name] as $value) {
			$table[] = '<th>' . $value . '</th>';
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
			'name' => Data::$nameDescription[$name]
			]);
	}

	public function showDetail($name, $id)
	{
		$data = Data::findOrFail($id);

		if( $data->requester_id != Auth::id()) {
			return Redirect::route('data.index', ['name' => $name])->withErrors(Lang::get('authentication.not_enough_permission'));
		}

		return View::make('data.details', [
			'data' => $data,
			'tableHeader' => Data::$tableHeaderDetails[$name],
			'name' => Data::$nameDescription[$name]
			]);
	}

	public function showCreateFrom($name)
	{
		$insertNumber = Setting::get('data.insert-number');

		return View::make('data.create', [
			'insertNumber' => $insertNumber,
			'tableHeader' => Data::$tableHeaderDetails[$name],
			'name' => Data::$nameDescription[$name]
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

	public function showPrint($name, $id) {
		$binary = base_path() . '/vendor/h4cc/wkhtmltopdf-amd64/bin/wkhtmltopdf';
		$snappy = new Knp\Snappy\Pdf($binary);
		$response = Response::make($snappy->getOutput(URL::route('data.print.raw', ['name' => $name, 'id' => $id])));
		$response->header('Content-Type', 'application/pdf');
		$response->header('Content-Disposition', 'attachment; filename="' . $name . '-' . $id . '.pdf"');
		return $response;
	}
}
