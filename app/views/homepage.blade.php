@extends('main')

@section('content')

<h2>Homepage</h2>

@if(Session::has('notice'))
	@foreach (Session::get('notice') as $notice)
	<div class="alert alert-info" role="alert">{{ $notice }}</div>
	@endforeach

@endif

@if(Session::has('errors'))
	@foreach (Session::get('errors') as $errors)
	<div class="alert alert-warning" role="alert">{{ Session::get('errors') }}</div>
	@endforeach
@endif

Hello {{ Auth::user()->full_name }}

@stop