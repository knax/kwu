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
}
