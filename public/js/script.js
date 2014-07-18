$(function() {
	$.each($('tbody#table-body > tr'), function(index, value) {
		$(this)
			.click(function() {
				window.location.href = document.URL + "/" + $(this)
					.data("id");
			});
	});
	$("input#date")
		.val(moment()
			.format("YYYY-MM-DD"));

	if ($("div#content")
		.data("type") == "create") {
		var handleChangeValue = function() {
			var insertNumber = $("input#no")
				.data("insert-number");
			var formType = $("input#no")
				.data("form-type");
			var departement = $("select#departement")
				.val();
			var date = moment($("input#date")
					.val())
				.format("MM/YYYY");
			var arrayValue = [
				insertNumber,
				formType,
				departement,
				date
			];
			$("input#no")
				.val(arrayValue.join("/")
					.toUpperCase());
		}

		handleChangeValue();

		$("select#departement")
			.change(handleChangeValue);
		$("input#date")
			.change(handleChangeValue);
		$('div#insert-list')
			.on('show.bs.modal', function(e) {
				$("input#list-no")
					.val($("table#list > tbody")
						.data("insert-id"));
			});
		$("button#list-save-change")
			.click(function(e) {
				if ($("table#list > tbody > tr#empty-list")
					.length) {
					$("table#list > tbody > tr#empty-list")
						.remove();
				}
				e.preventDefault();
				var $no = $("input#list-no");
				var $serialNumber = $("input#list-serial-number");
				var $description = $("textarea#list-description");
				var $serviceRequested = $("input#list-service-requested");
				var row = '<tr class="list-data"><td>' + [$no.val(), $serialNumber.val(), $description.val(), $serviceRequested.val()].join('</td><td>') + "</td></tr>"
				$("table#list > tbody")
					.append(row);
				$("table#list > tbody")
					.data("insert-id",
						Math.floor($("table#list > tbody")
							.data("insert-id")) + 1);
				$no.val("");
				$serialNumber.val("");
				$description.val("");
				$serviceRequested.val("");
				$('div#insert-list')
					.modal('hide');
			});
		/*
				//show empty
				if ($("table#list > tbody")
					.children()
					.length == "1") {
					$("table#list > tbody > tr#empty-list")
						.show();
				}
			*/
	}

	$("button#submit")
		.click(function() {
			var listTable = null;
			if (!($("table#list > tbody > tr#empty-list")
				.length)) {
				listTable = JSON.stringify($("table#list")
					.tableToJSON())
			}
			console.log(listTable);
		});
});