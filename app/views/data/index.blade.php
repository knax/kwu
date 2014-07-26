@extends('main')

@section('content')

<div id="content" data-type="index">
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

	<table class="table table-bordered table-hover" id="index-list">
		<thead>
			@foreach ($tableHeader as $header)
			<th>{{{ $header }}}</th>
			@endforeach
		</thead>
		<tbody>
			@foreach ($tableBody as $key => $row )
			<tr data-id="{{ $key }}">
				@foreach ($row as $data)
				<td>{{{ $data }}}</td>
				@endforeach
			</tr>
			@endforeach
		</tbody>
	</table>

	@if (isset($userCreate))
	<a href="{{ URL::route('admin.super.user.create') }}" class="btn btn-default" role="button">Create</a>
	@else
	<a href="{{ URL::route('data.create', ['name' => strtolower($name['abbr'])]) }}" class="btn btn-default" role="button">Create</a>
	@endif
</div>
@stop