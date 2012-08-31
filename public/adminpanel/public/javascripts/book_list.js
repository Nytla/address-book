/**
 * Formed Book list page 
 */
$(document).ready(function() {

	//Create select list for our cities
	$("#country").change(function() {

		//Set object with our options (country id)
		var obj_options = {
			module:		'create_cities',
			file_name:	'cities_formed.php',
			data:		{ country_id: this.value }
		};

		//Get cities from DB
		$.ajaxes(obj_options);
	});



	//Search keywords, country and city in DB
	$("#searchForm").submit(function() {

		var keywords = $("#keywords").val();

		//Set object options for ajax request
		var obj_options = {
			module:		'search_clients',
			file_name:	'search_clients.php',
			data:		{ keywords: keywords }

		};

		//Create client list with ajax
		$.ajaxes(obj_options);

		//Don't submit our search form
		return false;

	});



});

/**
 * Ajaxes function for our book
 */
(function($) {
	$.ajaxes = function(object_options) {

		$.ajax({
			type: "POST",
			dataType: "json",
			url: "./application/ajax/"+object_options.file_name+"",
			cache: false,
			data: object_options.data,
			complete: function() {
				//Hide preloader image
				$('#preloader').fadeOut('slow', function() {});
			},
			success: function(object) {

				//Show preloader image
				$("#preloader").removeClass("hide").css("display", "block");
			
				//Make code depending on the module				
				switch(object_options.module) {

					//Create our cities select list
					case 'create_cities':

						//if (object.flag == false) {
						//	return false;

						//Set style for cities list
						$("#city").css("width", "150");

						//Delete all options element, but not first
						$("#city option").remove();

						$("#city").append(new Option('::ALL::', 0));

						//Create options element for sity list
						$.each(object.cities, function(index, value) {

							$("#city").append(new Option(value, index));
						});

					break;

					//Create client list
					case 'search_clients':

						if (object.flag == false) {

							//Hide clients table
							$("#clients").addClass("hide");

							//Show search error message
							$("#search_error").removeClass("hide");

							//Insert message in our block
							$("#search_error h3").html(object.error_search_message);

						} else {

							//Show our clients table
							$("#clients").removeClass("hide");

							//Hide search error message
							$("#search_error").addClass("hide");

							//Delete client from table
							$("#content_clients tr").remove();

							//Create client table
							$.each(object.clients, function(index, value) {

								//Create clients table 
								$("#clients:last").append("<tr><td class=\"prepend-3\">"+value.id+"</td><td>"+value.first_name+ " "+value.last_name+"</td><td>"+value.countryname_en+"</td><<td>"+value.cityname_en+"</td><td><a href=\"#edit\">Edit</a> | <a href=\"#delete\">Delete</a></td></tr><tr></tr>");

							});
						}
					break;

				}
			}
		});
	}
})(jQuery);
