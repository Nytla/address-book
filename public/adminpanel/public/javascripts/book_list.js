/**
 * Create select list for our cities
 */
$(document).ready(function() {

	$("#country").change(function() {

		var obj_options = { country_id: this.value };

		$.ajax({
			type: "POST",
			dataType: "json",
			url: "./application/ajax/cities_formed.php",
			cache: false,
			data: obj_options,
			success: function(object) {

				if (object.clients == false) {

					return false;
				} else {

					//Set style for cities list
					$("#city").css("width", "150");

					//Delete all options element, but not first
					$("#city option").remove();

					$("#city").append(new Option('::ALL::', 0));

					//Create options element for sity list
					$.each(object.clients, function(index, value) {

						$("#city").append(new Option(value, index));
					});
				}
			}
		});
	});


	//Sort our table
	//http://www.datatables.net/examples/advanced_init/sorting_control.html
/*
	$("#clients").dataTable({

		"aoColumns": [

			{ "asSorting": [ "desc", "asc" ] },
			{ "asSorting": [ "desc", "asc" ] },
			{ "asSorting": [ "desc", "asc" ] },			

		]

	});
*/

});
