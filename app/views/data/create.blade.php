@extends('main')

@section('content')
<div data-type="create" id="content">
	<form action="{{ URL::route('data.index', ['name' => strtolower($name)]) }}" method="POST" data-form-type="{{ strtolower(strtolower($name)) }}">
		@foreach ($pageHeader as $row)
		<h2 class="text-center">{{ $row }}</h2>
		@endforeach

		<hr>

		<input type="text" id="additional-data" name="additional_data" hidden>

		<div class="row">
			<div id="left-side" class="col-md-6">
				<div class="row form-group">
					<div class="col-md-6">
						<label for="no" class="control-label">{{ Lang::get('data.number') }}</label>
					</div>
					<div class="col-md-6">
						<input type="text" class="form-control" id="no" name="no" data-insert-number="{{ $insertNumber }}" readonly>
					</div>
				</div>
				<div class="row form-group">
					<div class="col-md-6">
						<label for="date" class="control-label">{{ Lang::get('data.date') }}</label>
					</div>
					<div class="col-md-6">
						<input type="date" class="form-control" id="date" name="date">
					</div>
				</div>
				<div class="row form-group">
					<div class="col-md-6">
						<label for="requester" class="control-label">{{ Lang::get('data.requester') }}</label>
					</div>
					<div class="col-md-6">
						<input type="text" class="form-control" id="requester" value="{{ Auth::user()->full_name }}" name="requester" disabled>
					</div>
				</div>
			</div>
			<div id="right-side" class="col-md-6">
				<div class="row form-group">
					<div class="col-md-6">
						<label for="date" class="control-label">{{ Lang::get('data.departement') }}</label>
					</div>
					<div class="col-md-6">
						<select class="form-control" id="departement" name="departement">
							<option value="ADM">ADM</option>
							<option value="GYR">GYRO</option>
							<option value="LOG">LOGGING</option>
							<option value="SHR">LOGISTIC</option>
							<option value="MTR">MOTOR</option>
							<option value="DD">DD</option>
							<option value="MWD">MWD</option>
							<option value="OFF">OFFICE</option>
							<option value="WRK">WORKSHOP</option>
						</select>
					</div>
				</div>
				<div class="row form-group">
					<div class="col-md-6">
						<label for="job_number" class="control-label">{{ Lang::get('data.job_number') }}</label>
					</div>
					<div class="col-md-6">
						<input type="text" class="form-control" id="job_number" name="job_number">
					</div>
				</div>
				<div class="row form-group">
					<div class="col-md-6">
						<label for="customer_client" class="control-label">{{ Lang::get('data.customer_client') }}</label>
					</div>
					<div class="col-md-6">
						<input type="text" class="form-control" id="customer_client" name="customer_client">
					</div>
				</div>
			</div>
		</div>

		<hr>

		<div class="row">
			<div class="col-md-12">
				<table id="create-list" class="table table-bordered">
					<thead>
						@foreach ($tableHeader as $header)
						<th>{{ $header }}</th>
						@endforeach
					</thead>
					<tbody data-insert-id="1">
					</tbody>
				</table>
			</div>
		</div>
		<div class="text-center">
			<a href="#" class="btn btn-primary" id="modal-launcher" data-toggle="modal" data-target="#insert-list-modal">
				{{ Lang::get('general.insert') }}
			</a>
		</div>

		<hr>

		<div class="row">
			<div class="col-md-12">
				<div class="form-group">
					<label for="note">{{ Lang::get('data.note') }}</label>
					<textarea class="form-control" id="note" name="note"></textarea>
				</div>
			</div>
		</div>

		<hr>

		<div class="row">
			<div class="col-md-offset-8 col-md-4">
				<table class="table table-bordered">
					<thead>
						<th class="text-center">{{ Lang::get('data.requested_by') }}</th>
						<th class="text-center">{{ Lang::get('data.approved_by') }}</th>
					</thead>
					<tbody>
						<tr id="signature">
							<td></td>
							<td></td>
						</tr>
						<tr>
							<td class="text-center">{{ Auth::user()->full_name }}</td>
							<td class="text-center"></td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>

		<input type="text" id="requester_id" value="{{ Auth::id() }}" hidden>

		<hr>
		<input id="submit" type="submit" class="btn btn-primary" value="Submit">
	</form>
	<!-- Modal -->
	<div class="modal fade" id="insert-list-modal" tabindex="-1" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
					<h4 class="modal-title">{{ Lang::get('data.insert_data') }}</h4>
				</div>
				<div class="modal-body">
					<form id="list-form" class="form-horizontal" role="form">
						@foreach ($tableHeader as $header)
						<div class="form-group">
							<label for="list-{{ strtolower($header) }}" class="col-sm-2 control-label">{{ $header }}</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="list-{{ strtolower($header) }}">
							</div>
						</div>
						@endforeach
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">{{ Lang::get('general.close') }}</button>
					<button type="button" class="btn btn-primary" id="list-save-change">{{ Lang::get('general.save_changes') }}</button>
				</div>
			</div>
		</div>
	</div>

</div>
@stop
