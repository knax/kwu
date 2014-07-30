<div class="row">
	<div id="left-side" class="col-sm-6">
		<div class="row form-group">
			<div class="col-sm-6">
				<label for="no" class="control-label">{{ Lang::get('data.number') }}</label>
			</div>
			<div class="col-sm-6">
				<input type="text" class="form-control" id="no" name="no" value="{{ $data->no }}" disabled>
			</div>
		</div>
		<div class="row form-group">
			<div class="col-sm-6">
				<label for="date" class="control-label">{{ Lang::get('data.date') }}</label>
			</div>
			<div class="col-sm-6">
				<input type="text" class="form-control" id="date" name="date" value="{{ $data->date }}" disabled>
			</div>
		</div>
		<div class="row form-group">
			<div class="col-sm-6">
				<label for="requester" class="control-label">{{ Lang::get('data.requester') }}</label>
			</div>
			<div class="col-sm-6">
				<input type="text" class="form-control" id="requester" name="requester" value="{{ $data->requester->full_name }}" disabled>
			</div>
		</div>
	</div>
	<div id="right-side" class="col-sm-6">
		<div class="row form-group">
			<div class="col-sm-6">
				<label for="date" class="control-label">{{ Lang::get('data.departement') }}</label>
			</div>
			<div class="col-sm-6">
				<input type="text" class="form-control" id="departement" name="departement" value="{{ $data->departement }}" disabled>
			</div>
		</div>
		<div class="row form-group">
			<div class="col-sm-6">
				<label for="job_number" class="control-label">{{ Lang::get('data.job_number') }}</label>
			</div>
			<div class="col-sm-6">
				<input type="text" class="form-control" id="job-number" name="job_number" value="{{ $data->job_number }}" disabled>
			</div>
		</div>
		<div class="row form-group">
			<div class="col-sm-6">
				<label for="customer_client" class="control-label">{{ Lang::get('data.customer_client') }}</label>
			</div>
			<div class="col-sm-6">
				<input type="text" class="form-control" id="customer-client" name="customer_client" value="{{ $data->customer_client }}" disabled>
			</div>
		</div>
	</div>
</div>