@extends('main')

@section('content')

<div data-type="createuser" id="content">
	<form action="{{ URL::route('admin.super.user.createAction') }}" method="POST" class="form-horizontal">
		<div class="form-group">
			<div class="col-sm-offset-2 col-sm-10">
				<h2>Registrasi User</h2>
			</div>
		</div>
		<div class="form-group">
			<label for="username" class="col-sm-2 control-label">Username</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" id="username" name="username" placeholder="Username">
			</div>
		</div>
		<div class="form-group">
			<label for="password" class="col-sm-2 control-label">Password</label>
			<div class="col-sm-10">
				<input type="password" class="form-control" id="password" name="password" placeholder="Password">
			</div>
		</div>
		<div class="form-group">
			<label for="fullname" class="col-sm-2 control-label">Fullname</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" id="fullname" name="full_name" placeholder="Fullname">
			</div>
		</div>
		<div class="form-group">
			<label for="admin-type" class="col-sm-2 control-label">Admin Type</label>
			<div class="col-sm-10">
				<select class="form-control" id="admin-type" name="admin_type">
					<option value="none">Bukan Admin</option>
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
			</div>
		</div>
	</form>
</div>
@stop
