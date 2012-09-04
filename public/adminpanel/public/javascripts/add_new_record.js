/**
 * Validate add new administrator form
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


	//Set errors variables
	var error_empty_first_name = $("#error_empty_f_n").html();

	var error_min_length_first_name = $("#error_min_length_f_n").html();

	var error_max_length_first_name = $("#error_max_length_f_n").html();
	
	var error_empty_last_name = $("#error_empty_l_n").html();

	var error_min_length_last_name = $("#error_min_length_l_n").html();

	var error_max_length_last_name = $("#error_max_length_l_n").html();
	
	var error_empty_email = $("#error_empty_email").html();

	var error_min_length_email = $("#error_min_length_email").html();

	var error_max_length_email = $("#error_max_length_email").html();

	var error_incorect_email = $("#error_incorect_email").html();

	var error_empty_country = $("#error_empty_country").html();

	var error_empty_city = $("#error_empty_city").html();

	var error_upload_photo = $("#error_upload_photo").html();



	//Validate our form
	$("#addnewrecordForm").validate({

		rules: {

			first_name: {
				required: true,
				minlength: 5,
				maxlength: 16
			},

			last_name: {
				required: true,
				minlength: 5,
				maxlength: 16
			},

			email: {
				required: true,
				minlength: 5,
				maxlength: 16,
				email: true
			},

			country: {
				required: true
			},

			city: {
				required: true
			},

			photo: {
				required: true
			}

		},

		messages: {

			first_name: {
				required: error_empty_first_name,
				minlength: error_min_length_first_name,
				maxlength: error_max_length_first_name
			},

			last_name: {
				required: error_empty_last_name,
				minlength: error_min_length_last_name,
				maxlength: error_max_length_last_name
			},

			email: {
				required: error_empty_email,
				minlength: error_min_length_email,
				maxlength: error_max_length_email,
				email: error_incorect_email
			},

			country: {
				required: error_empty_country
			},

			city: {
				required: error_empty_city
			},

			photo: {
				required: error_upload_photo
			}
		},

		errorElement: "div",

		submitHandler: function() {

			

		}

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

						$("#city").append(new Option('::ALL::', ""));

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
