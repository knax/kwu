@extends('main')

@section('content')

<div data-type="createuser" id="content">
	<form action="{{ URL::route('admin.super.user.editAction', ['id' => $user->id]) }}" method="POST" class="form-horizontal">
		<div class="form-group">
			<div class="col-sm-offset-2 col-sm-10">
				<h2>Edit User</h2>
			</div>
		</div>
		<div class="form-group">
			<label for="username" class="col-sm-2 control-label">New {{ Lang::get('authentication.username') }}</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" id="username" name="username" value="{{ $user->username}}">
			</div>
		</div>
		<div class="form-group">
			<label for="password" class="col-sm-2 control-label">New {{ Lang::get('authentication.password') }}</label>
			<div class="col-sm-10">
				<input type="password" class="form-control" id="password" name="password">
			</div>
		</div>
		<div class="form-group">
			<label for="fullname" class="col-sm-2 control-label">New {{ Lang::get('general.full_name') }}</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" id="fullname" name="full_name" value="{{ $user->full_name}}">
			</div>
		</div>
		<div class="form-group">
			<label for="admin-type" class="col-sm-2 control-label">{{ Lang::get('general.admin_type') }}</label>
			<div class="col-sm-10">
				<select class="form-control" id="admin-type" name="admin_type">
					<option value="none">Not Admin</option>
					<option value="adm">ADM</option>
					<option value="gyro">GYRO</option>
					<option value="logging">LOGGING</option>
					<option value="logistic">LOGISTIC</option>
					<option value="motor-dd">MOTOR-DD</option>
					<option value="mwd">MWD</option>
					<option value="office">OFFICE</option>
					<option value="workshop">WORKSHOP</option>
					<option value="superadmin">Superadmin</option>
				</select>
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-offset-2 col-sm-10">
				<input id="submit" type="submit" class="btn btn-primary" value="Submit">
				<a id="delete" href="{{ URL::route('admin.super.user.deleteAction', ['id' => $user->id]) }}" type="button" class="btn btn-danger">Delete</a>
			</div>
		</div>
	</form>
</div>
<script>
	$(function() {
		@if($user->isAdmin())
		$('select#admin-type').find('option[value={{ $user->admin->type }}]').attr('selected', true);
		@endif
	});
</script>
@stop
