<div class="row">
	<div class="col-sm-2">
	<form action="{{ URL::route('admin.approval.approve', ['id' => $data->id]) }}" method="POST">
			<input id="submit" type="submit" class="btn btn-default" value="{{ Lang::get('general.approve') }}">
		</form>
	</div>
	<div class="col-sm-10"></div>
</div>