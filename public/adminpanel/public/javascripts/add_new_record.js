//Ajax Image Upload with Progressbar with jQuery and PHP - http://www.saaraan.com/2012/05/ajax-image-upload-with-progressbar-with-jquery-and-php
//Demo - http://www.saaraan.com/assets/ajax-image-upload-progressbar/


/**
 * Validate add new administrator form
 */
$(document).ready(function() {

	//Create select list for our cities
	$("#country").change(function() {

		//Set object with our options (country id)
		var object_options = {
			module:		'create_cities',
			file_name:	'cities_formed.php',
			data:		{ country_id: this.value }
		};

		//Get cities from DB
		$.ajaxes(object_options);
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

			alert('Submited~');

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

				

			}
		});
	}
})(jQuery);
