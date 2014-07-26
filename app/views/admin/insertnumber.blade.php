@extends('main')

@section('content')

<div data-type="createuser" id="content">
	<form action="{{ URL::route('admin.super.insertnumber.change') }}" method="POST" class="form-horizontal">
		<div class="form-group">
			<div class="col-sm-offset-2 col-sm-10">
				<h2>Change Insert Number</h2>
			</div>
		</div>
		<div class="form-group">
			<label for="insertnumber" class="col-sm-2 control-label">Insert Number</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" id="insertnumber" name="insertnumber" value="{{ $insertnumber }}">
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-offset-2 col-sm-10">
				<input id="submit" type="submit" class="btn btn-primary" value="Submit">
			</div>
		</div>
	</form>
</div>
@stop
