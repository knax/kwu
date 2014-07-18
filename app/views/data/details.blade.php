@extends('main')

@section('content')

<div data-type="details" id="content">
	<h2 class="text-center">{{ $name['full'] }}</h2>
	<h2 class="text-center">({{ $name['abbr'] }})</h2>

	<hr>

	<input type="hidden" id="additional-data" name="additional_data" value="{{{ $data->additional_data }}}"hidden>

	<div class="row">
		<div id="left-side" class="col-sm-6">
			<div class="row form-group">
				<div class="col-sm-6">
					<label for="no" class="control-label">Nomor</label>
				</div>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="no" name="no" value="{{ $data->no }}" disabled>
				</div>
			</div>
			<div class="row form-group">
				<div class="col-sm-6">
					<label for="date" class="control-label">Date</label>
				</div>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="date" name="date" value="{{ $data->date }}" disabled>
				</div>
			</div>
			<div class="row form-group">
				<div class="col-sm-6">
					<label for="requester" class="control-label">Requester</label>
				</div>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="requester" name="requester" value="{{ $data->requester->full_name }}" disabled>
				</div>
			</div>
		</div>
		<div id="right-side" class="col-sm-6">
			<div class="row form-group">
				<div class="col-sm-6">
					<label for="date" class="control-label">Departement</label>
				</div>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="departement" name="departement" value="{{ $data->departement }}" disabled>
				</div>
			</div>
			<div class="row form-group">
				<div class="col-sm-6">
					<label for="job_number" class="control-label">Job Number</label>
				</div>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="job-number" name="job_number" value="{{ $data->job_number }}" disabled>
				</div>
			</div>
			<div class="row form-group">
				<div class="col-sm-6">
					<label for="customer_client" class="control-label">Customer Client</label>
				</div>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="customer-client" name="customer_client" value="{{ $data->customer_client }}" disabled>
				</div>
			</div>
		</div>
	</div>

	<hr>

	<div class="row">
		<div class="col-sm-12">
			<table id="details-list" class="table table-bordered">
				<thead>
				@foreach($tableHeader as $header)
				<th>{{$header}}</th>
				@endforeach
				</thead>
			</table>
		</div>
	</div>

	<hr>

	<div class="row">
		<div class="col-sm-12">
			<div class="form-group">
				<label for="note">Note:</label>
				<textarea class="form-control" name="note" disabled>{{ $data->note }}</textarea>
			</div>
		</div>
	</div>

	<hr>

	<div class="row">
		<div class="col-sm-offset-8 col-sm-4">
			<table class="table table-bordered">
				<thead>
					<th class="text-center">Request By</th>
					<th class="text-center">Approved By</th>
				</thead>
				<tbody>
					<tr id="signature">
						<td></td>
						<td></td>
					</tr>
					<tr>
						<td class="text-center">{{ $data->requester->full_name }}</td>
						<td class="text-center">{{ $data->approver->full_name or '' }}</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>

	<hr>

	@if (isset($approving))

	<div class="row">
		<div class="col-sm-2">
			<form action="{{ URL::route('admin.approval', ['name' => strtolower($name['abbr']), 'id' => $data->id]) }}" method="POST">
		<input id="submit" type="submit" class="btn btn-primary" value="Approve"></form>
		</div>
		<div class="col-sm-10"></div>
	</div>

	<hr>

	@endif
</div>

@stop