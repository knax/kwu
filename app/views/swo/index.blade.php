@extends('main')

@section('content')

<h2>Homepage SWO</h2>

@foreach ($errors->all() as $error)
<div class="alert alert-warning alert-dismissible" role="alert">
	{{ $error }}
	<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
</div>
@endforeach

@if (Session::has('notices'))
<div class="alert alert-success alert-dismissible" role="alert">
	{{ $value = Session::get('notices') }}
	<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
</div>
@endif

@include ('template.table.open')

@include('template.table.head', array('head' => $tableHeader))

@include('template.table.body', array('body' => $tableBody, 'class' => 'swo'))

@include ('template.table.close')

<a href="{{ URL::route('swo.create')}}" class="btn btn-default" role="button">Create</a>

@stop