<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Print</title>
	<link rel="stylesheet" href="/css/normalize.css">
	<link rel="stylesheet" href="/css/print.css">
</head>
<body>
	<div id="print-container">
		<div id="print">
			<header>
				<p>
					{{ $name['full'] }}
					<br>
					({{ $name['abbr'] }})
				</p>
			</header>
			<table id="main-data">
				<tbody>
					<tr>
						<td class="label">{{ $name['abbr'] }} NO.</td>
						<td class="data">{{ $data->no }}</td>
						<td class="label">DEPARTEMENT</td>
						<td class="data">{{ $data->departement }}</td>
					</tr>
					<tr>
						<td class="label">{{ $name['abbr'] }} DATE</td>
						<td class="data">{{ $data->date }}</td>
						<td class="label">JOB NO.</td>
						<td class="data">{{ $data->job_number }}</td>
					</tr>
					<tr>
						<td class="label">REQUESTER</td>
						<td class="data">{{ $data->requester->full_name }}</td>
						<td class="label">CUSTOMER/CLIENT</td>
						<td class="data">{{ $data->customer_client }}</td>
					</tr>
				</tbody>
			</table>
			<!-- /#main-data -->
			<table id="additional-data">
				{{ $table }}
			</table>
			<!-- /#additional-data -->
			<table id="signature">
				<thead>
					<th>REQUESTED BY</th>
					<th>APPROVED BY</th>
				</thead>
				<tfoot>
					<td>{{ $data->requester->full_name }}</td>
					<td>{{ $data->approver->full_name or '' }}</td>
				</tfoot>
				<tbody>
					<td>stamp</td>
					<td>stamp</td>
				</tbody>
			</table>
			<!-- /#signature -->
		</div>
		<!-- /#print -->
	</div>
	<!-- /#print-container -->
</body>
</html>