@extends('main')

@section('content')

<div id="content" data-type="index">

	<h2>{{ $header }}</h2>

	@include('template.errors', ['errors' => $errors])

	@include('template.notices')

	@include('template.table', ['table' => $table, 'class' => ((isset($table['class']) ? implode($table['class']) : 'table-clickable'))])

	@if (isset($userCreate))
	<a href="{{ URL::route('admin.super.user.create') }}" class="btn btn-default" role="button">{{ Lang::get('general.create') }}</a>
	@elseif (isset($dataCreate))
	<a href="{{ URL::route('data.create', ['name' => $name]) }}" class="btn btn-default" role="button">{{ Lang::get('general.create') }}</a>
	@endif
</div>
@stop