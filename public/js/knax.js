'use strict';
var Knax = {
	makeTableRowClickable: function() {
		$.each($('table.table-clickable > tbody > tr'), function(index, value) {
			$(this)
				.click(function() {
					window.location.href = document.URL + '/' + $(this)
						.data('id');
				});
		});
	},
	setInputDateToToday: function() {
		$('input#date')
			.val(moment()
				.format('YYYY-MM-DD'));
	},
	changeValue: function() {
		return function() {
			var formType = $('form')
				.data('form-type');
			var insertNumber = $('input#no')
				.data('insert-number');
			var departement = $('select#departement')
				.val();
			var date = moment($('input#date')
					.val())
				.format('MM/YYYY');
			var arrayValue = [
				insertNumber,
				formType,
				departement,
				date
			];
			$('input#no')
				.val(arrayValue.join('/')
					.toUpperCase());
		};
	},
	giveNumberToModal: function() {
		$('div#insert-list-modal')
			.on('show.bs.modal', function(e) {
				$("input#list-no")
					.val($("table#create-list > tbody")
						.data("insert-id"));
			});
	},
	handleFormSubmit: function() {
		$("input#submit")
			.click(function() {
				$("input#additional-data")
					.val(JSON.stringify($("table#create-list")
						.tableToJSON()));
			});
	},
	handleModalSave: function() {
		$("button#list-save-change")
			.click(function(e) {
				var $tableBody = $("table#create-list > tbody");
				var $inputArray = $('div#insert-list-modal')
					.find('input');
				var row = ['<tr class="list-data">'];
				$inputArray.each(function(index) {
					row.push('<td>');
					row.push($(this)
						.val());
					row.push('</td>');
				});
				row.push('</tr>');
				$(row.join(''))
					.appendTo($tableBody);

				$tableBody.data("insert-id", Math.floor($tableBody.data("insert-id")) + 1);

				$('div#insert-list-modal')
					.modal('hide');
			});
	}
};