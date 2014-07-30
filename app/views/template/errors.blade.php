<div class="row">
	<div class="col-sm-12">
		@if(Session::has('errors'))
		@foreach (Session::get('errors') as $errors)
		<div class="alert alert-warning" role="alert">{{ Session::get('errors') }}</div>
		@endforeach
		@endif
	</div>
	<!-- /.col-sm-12 -->
</div>
<!-- /.row -->