@extends('main')

@section('content')

<h2 class="text-center">Service Work Order</h2>
<h2 class="text-center">(SWO)</h2>

<hr>

<div class="row">
	<div id="left-side" class="col-md-6">
		<div class="row form-group">
			<div class="col-md-6">
				<label for="no" class="control-label">Nomor</label>
			</div>
			<div class="col-md-6">
				<input type="text" class="form-control" id="no" name="no" value="{{ $swo->no }}" disabled>
			</div>
		</div>
		<div class="row form-group">
			<div class="col-md-6">
				<label for="date" class="control-label">Date</label>
			</div>
			<div class="col-md-6">
				<input type="text" class="form-control" id="date" name="date" value="{{ $swo->date }}" disabled>
			</div>
		</div>
		<div class="row form-group">
			<div class="col-md-6">
				<label for="requester" class="control-label">Requester</label>
			</div>
			<div class="col-md-6">
				<input type="text" class="form-control" id="requester" name="requester" value="{{ $swo->requester->full_name }}" disabled>
			</div>
		</div>
	</div>
	<div id="right-side" class="col-md-6">
		<div class="row form-group">
			<div class="col-md-6">
				<label for="date" class="control-label">Departement</label>
			</div>
			<div class="col-md-6">
				<input type="text" class="form-control" id="departement" name="departement" value="{{ $swo->departement }}" disabled>
			</div>
		</div>
		<div class="row form-group">
			<div class="col-md-6">
				<label for="job_number" class="control-label">Job Number</label>
			</div>
			<div class="col-md-6">
				<input type="text" class="form-control" id="job_number" name="job_number" value="{{ $swo->job_number }}" disabled>
			</div>
		</div>
		<div class="row form-group">
			<div class="col-md-6">
				<label for="customer_client" class="control-label">Customer Client</label>
			</div>
			<div class="col-md-6">
				<input type="text" class="form-control" id="customer_client" name="customer_client" value="{{ $swo->customer_client }}" disabled>
			</div>
		</div>
	</div>
</div>

<hr>

<div class="row">
	<div class="col-md-12">
		<table class="table table-bordered">
			<thead>
				<th>No</th>
				<th>Serial Number</th>
				<th>Description</th>
				<th>Service Requested</th>
			</thead>
			<tbody>
				@foreach($details as $row)
				<tr>
					<td>{{ $row->no }}</td>
					<td>{{ $row->serial_number }}</td>
					<td>{{ $row->description }}</td>
					<td>{{ $row->service_requested }}</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>

<hr>

<div class="row">
	<div class="col-md-12">
		<div class="form-group">
			<label for="note">Note:</label>
			<textarea class="form-control" name="note" disabled>{{ $swo->note }}</textarea>
		</div>
	</div>
</div>

<hr>

<div class="row">
	<div class="col-md-offset-8 col-md-4">
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
					<td class="text-center">{{ $swo->requester->full_name }}</td>
					<td class="text-center"></td>
				</tr>
			</tbody>
		</table>
	</div>
</div>


@stop