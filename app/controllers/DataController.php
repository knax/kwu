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
			return Redirect::route('data.index')->withErrors('Anda tidak dapat mengakses record tersebut');
		}

		return View::make('data.details', [
			'data' => $data,
			'tableHeader' => Data::$tableHeaderDetails[$name],
			'name' => Data::$nameDescription[$name]
			]);
	}

	public function showCreateFrom($name)
	{
		$insertNumber = explode('/', Data::type($name)->orderby('created_at', 'desc')->first()->no)[0];

		return View::make('data.create', [
			'insertNumber' => $insertNumber + 1,
			'tableHeader' => Data::$tableHeaderDetails[$name],
			'name' => Data::$nameDescription[$name]
			]);
	}

	public function handleFormData($name) {
		$data = new Data(Input::all());
		$data->requester_id = Auth::id();
		$data->save();

		Session::flash('notices', 'Data telah berhasil dimasukan');

		return Redirect::route('data.index', ['name' => $name]);
	}

	public function showPrint($name, $id) {
		$binary = base_path() . '/vendor/h4cc/wkhtmltopdf-amd64/bin/wkhtmltopdf';
		// $binary = 'wkhtmltopdf';
		$snappy = new Knp\Snappy\Pdf($binary);
		// print_r($snappy->getOutput(URL::route('data.print.raw', ['name' => $name, 'id' => $id])));
		// return $snappy->getOutput(URL::route('data.print.raw', ['name' => $name, 'id' => $id]));
		$response = Response::make($snappy->getOutput(URL::route('data.print.raw', ['name' => $name, 'id' => $id])));
		$response->header('Content-Type', 'application/pdf');
		$response->header('Content-Disposition', 'attachment; filename="record.pdf"');
		return $response;
		// return URL::route('data.print.raw', ['name' => $name, 'id' => $id]);


		// $snappy = new Pdf('wkhtmltopdf');

		// echo $snappy->getOutput('http://localhost:2323/');
		// $data = Data::findOrFail($id);

		// $table = [];

		// $table[] = '<thead>';
		// foreach (Data::$tableHeaderDetails[$name] as $value) {
		// 	$table[] = '<th>' . $value . '</th>';
		// }
		// $table[] = '</thead>';

		// $table[] = '<tbody>';
		// foreach (json_decode($data->additional_data) as $row) {
		// 	$table[] = '<tr>';
		// 	foreach ($row as $value) {
		// 		$table[] = '<td>' . $value . '</td>';
		// 	}
		// 	$table[] = '</tr>';
		// }
		// $table[] = '</tbody>';

		// return PDF::loadHTML(View::make('data.print', [
		// 	'data' => $data,
		// 	'table' => implode($table, ''),
		// 	'name' => Data::$nameDescription[$name]
		// 	]))->setOption('user-style-sheet', 'http://localhost:2323/css/print.css')->download();
		// return PDF::loadFile(URL::route('data.print.raw', ['name' => $name, 'id' => $id]))->stream('github.pdf');
	}
}
