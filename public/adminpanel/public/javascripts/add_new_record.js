//Ajax Image Upload with Progressbar with jQuery and PHP - http://www.saaraan.com/2012/05/ajax-image-upload-with-progressbar-with-jquery-and-php
//Demo - http://www.saaraan.com/assets/ajax-image-upload-progressbar/
//ajaxForm - http://www.malsup.com/jquery/form/#options-object

/**
 * Validate add new administrator form
 */
$(document).ready(function() {


/*
var object_options = {
			module:		'create_cities',
			file_name:	'cities_formed.php',
};

console.log(object_options);
*/


	var option_selected = $("#country option:selected").val();

	if (option_selected != "") {

		//Set object with our options (country id)
		var object_options = {
			module:		'create_cities',
			file_name:	'cities_formed.php',
			data:		{ country_id: option_selected }
		};

		//Get cities from DB
		$.ajaxes(object_options);
	}

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


	$("#ImagesForm").validate({

		rules: {
				image_file: {
					required: true
				}

			},

		messages: {

				image_file: {
					required: error_upload_photo
				}
		},

		errorElement: "div",

		submitHandler: function() {

			alert('Submited~');
		}
	});



	//Validate our form
	$("#InformationForm").validate({

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

			image_file: {
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

			image_file: {
				required: error_upload_photo
			}
		},

		errorElement: "div",

		submitHandler: function() {

			alert('Submited~');

			

		}

	});

	//Action or disabled input file button Upload
	$.InputFileButton();

$.uploadPhoto();

	//Upload and preview photo
	$("#upload_photo").click(function() {

		//alert(':-)');

		//Upload photo
		//$.uploadPhoto();
		
		

	});

	$("#save").click(function() {

		$("#InformationForm, #ImagesForm").submit();

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

				//Set select element width
				$("#city").css("width", "242");

				//Delete all options element, but not first
				$("#city option").remove();

				$("#city").append(new Option('::ALL::', ''));

				//Create options element for sity list
				$.each(object.cities, function(index, value) {

					$("#city").append(new Option(value, index));
				});

			}
		});
	}
})(jQuery);

/**
 * Form submit by jQuery Form Plugin
 */
(function($) {
	$.uploadPhoto = function() {

		console.log('777');

		$("#ImagesForm").ajaxForm({
			method : "POST",
			dataType: "json",
			url: "./application/ajax/resize_photo.php",
			beforeSend: function() {
				//Before sending form

				//Disable upload button
				$("#save").attr('disabled', '');
				//statustxt.empty();
				//show progressbar
				//$("#preloader").slideDown();
				$("#preloader").removeClass('hide');
			},
			complete: function(object) {
				//On complete request
				
				//Reset form
				//myform.resetForm();

				 //Enable submit button
				$("#save").removeAttr('disabled');

				//Hide progressbar
				//$("#preloader").slideUp();
				$("#preloader").addClass('hide');

				//Convert string to object
				var obj = jQuery.parseJSON(object.responseText);
/*
				$("#preview_photo img")
					.attr("width", obj.image_width)
					.attr("height", obj.image_height)
					.attr("src", obj.image_name)
					.attr("alt", obj.image_alt)
					.parent()
					.removeClass("hide");
*/
			}
		});

	}
})(jQuery);

/**
 * Input file button action or disabled
 */
(function($) {
	$.InputFileButton = function() {

		var img_path = $("#image_file").val();

		if (img_path != "") {
			$("#upload_photo").removeAttr("disabled");

		}

		$("#image_file").change(function(img_path){

			if (img_path != "") {
				$("#upload_photo").removeAttr("disabled");

			}
		});
	}
})(jQuery);
