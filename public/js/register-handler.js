(function(){
	'use strict';
$(function() {
	var type = $('div#content')
		.data('type');

	if (type === 'details') {
		Knax.handleTableDetails();
	}

	if (type === 'index') {
		Knax.makeTableRowClickable();
	}

	if (type === 'create') {
		Knax.setInputDateToToday();

		Knax.changeValue()();

		Knax.giveNumberToModal();

		$('select#departement')
			.change(Knax.changeValue());
		$('input#date')
			.change(Knax.changeValue());

		$('input#submit')
			.click(Knax.handleFormSubmit());

		Knax.handleModalSave();

		Knax.handleFormSubmit();
	}
});
}());
