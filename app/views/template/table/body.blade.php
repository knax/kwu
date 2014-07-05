<tbody id="table-body">

	@foreach ($body as $key => $tr )
	<tr data-id="{{ $key }}">
		@foreach ($tr as $td)
		<td>{{{ $td }}}</td>
		@endforeach
	</tr>
	@endforeach

</tbody>