@extends('main')

@section('content')

<div data-type="details" id="content">

	@foreach ($data->getPageHeader() as $row)
	<h2 class="text-center">{{ $row }}</h2>
	@endforeach

	<hr>
	@include('data.details.header', ['data' => $data])

	<hr>
	@include('template.table', ['table' => $table, 'class' => 'table-clickable'])

	<hr>
	@include('data.details.note', ['data' => $data])

	<hr>
	@include('data.details.signature', ['data' => $data])


	<hr>
	@include('data.details.print-button', ['id' => $data->id])

	<hr>

	@if (isset($approving))
	<hr>
	@include('data.details.approval', ['id' => $data->id])

	@endif

	<hr>
</div>

@stop