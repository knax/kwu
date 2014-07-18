@extends('main')

@section('content')

<h2>Homepage</h2>

@if(Session::has('notice'))
	<div class="alert alert-info" role="alert">{{ Session::get('notice') }}</div>
@endif

@if(Session::has('errors'))
	<div class="alert alert-warning" role="alert">{{ Session::get('errors') }}</div>
@endif

Hello {{ Auth::user()->full_name }}

@stop