<div class="row">
	<div class="col-sm-12">
		<table class="table table-bordered table-hover {{ $class or '' }}" id="{{ $id or ''}}">
			<thead>
				@foreach ($table['header'] as $header)
				<th>{{{ $header }}}</th>
				@endforeach
			</thead>
			<tbody>
				@foreach ($table['body'] as $key => $row )
				<tr data-id="{{ $key }}">
					@foreach ($row as $data)
					<td>{{{ $data }}}</td>
					@endforeach
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
	<!-- /.col-sm-12 -->
</div>
<!-- /.row -->