<div class="row">
	<div class="col-sm-offset-8 col-sm-4">
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
					<td class="text-center">{{ $data->requester->full_name }}</td>
					<td class="text-center">{{ $data->approver->full_name or '' }}</td>
				</tr>
			</tbody>
		</table>
	</div>
</div>