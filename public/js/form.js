String.prototype.toUnderscore = function() {
	return this.replace(/ /g, "_");
};

$(function() {
	$("button#submit")
		.click(function() {
			if ($("table#list > tbody > tr#empty-list")
				.length) {
				return;
			}
			$form = $("<form />")
				.attr({
					"method": "POST",
					"action": document.URL,
				});

			generateInput = function(value, name, type) {
				type = type || "text";
				return $("<input />")
					.attr({
						"type": type,
						"name": name,
						"value": value
					});
			};

			generateInputSelector = function(selector, name, type) {
				var selectorArray = selector.split("#");
				var name = selectorArray[selectorArray.length - 1];
				return generateInput(
					$(selector)
					.val(),
					name,
					type
				)
			}

			generateInputSelector("input#no")
				.appendTo($form);
			generateInputSelector("input#date")
				.appendTo($form);
			generateInputSelector("input#requester_id")
				.appendTo($form);
			generateInputSelector("select#departement")
				.appendTo($form);
			generateInputSelector("input#job_number")
				.appendTo($form);
			generateInputSelector("input#customer_client")
				.appendTo($form);
			generateInputSelector("textarea#note")
				.appendTo($form);

			var table = $("table#list")
				.tableToJSON();
			for (var key in table) {
				if (table.hasOwnProperty(key)) {
					var object = table[key];
					for (var property in object) {
						if (object.hasOwnProperty(property)) {
							var name = [
									"list[",
									key,
									"][",
									property,
									"]"
								].join("")
								.toLowerCase()
								.toUnderscore();
							generateInput(object[property], name)
								.appendTo($form);
						}
					}
				}
			}
			$form.submit();
		});
});