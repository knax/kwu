<div class="row">
	<div class="col-sm-12">
		@if(Session::has('notices'))
		<div class="alert alert-info" role="alert">{{ Session::get('notices') }}</div>
		@endif
	</div>
	<!-- /.col-sm-12 -->
</div>
<!-- /.row -->