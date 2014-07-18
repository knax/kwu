String.prototype.toUnderscore = function() {
	return this.replace(/ /g, "_");
};

$(function() {
	$("button#approve")
		.click(function() {
			$form = $("<form />")
				.attr({
					"method": "POST",
					"action": document.URL,
				});

			$("<input />")
				.attr({
					"type": "text",
					"name": "id",
					"value": $(this)
						.data("id")
				})
				.appendTo($form);

			$form.submit();
		});
});