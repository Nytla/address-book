//Ajax Image Upload with Progressbar with jQuery and PHP - http://www.saaraan.com/2012/05/ajax-image-upload-with-progressbar-with-jquery-and-php
//Demo - http://www.saaraan.com/assets/ajax-image-upload-progressbar/
//ajaxForm - http://www.malsup.com/jquery/form/#options-object

/**
 * Validate add new administrator form
 */
$(document).ready(function() {

	//Set width for select country element
	$("#country").css("width", "235");

	//Create select list for our cities when page loaded
	var option_selected = $("#country option:selected").val();

	if (option_selected != "") {

		//Set object with our options (country id)
		var object_options = {
			module:		'cities_formed',
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
			module:		'cities_formed',
			file_name:	'cities_formed.php',
			data:		{ country_id: this.value }
		};

		//Get cities from DB
		$.ajaxes(object_options);
	});

	//Clear our forms
	$("#reset_forms").click(function() {

		$("#InformationForm, #NotesForm").clearForm();

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

	//Validate form with informatons
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

			//Set object with our options (country id)
			var object_options = {
				module:		'add_new_record',
				file_name:	'add_new_record.php',
				data: 
				{
					first_name:	$("#first_name").val(),
					last_name:	$("#last_name").val(),
					email: 		$("#email").val(),
					country:	$("#country").val(),
					city:		$("#city").val(),
					photo_id:	($("#preview_photo img").attr('id')) ? $("#preview_photo img").attr('id') : '',
					notes:		$("#notes").val()	
				}
			};

			//Get cities from DB
			$.ajaxes(object_options);

			return false;

		}

	});

	//Action or disabled input file button Upload
	$.InputFileButton();

	//Upload image and preview if form (#ImagesForm) submited
	$.uploadPhoto();

	//Submit all forms
	$("#save").click(function() {

		$("#InformationForm").submit();

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
/*
			complete: function() {
				//Hide preloader image
				//$('#preloader').fadeOut('slow', function() {});
			},
*/
			success: function(object) {

				//console.log(object_options.module);

				switch(object_options.module) {

					case 'cities_formed':

						//Set select element width
						$("#city").css("width", "235");

						//Delete all options element, but not first
						$("#city option").remove();

						$("#city").append(new Option('::ALL::', ''));

						//Create options element for sity list
						$.each(object.cities, function(index, value) {

							$("#city").append(new Option(value, index));
						});

					break;

					case 'add_new_record':

						//Clear our forms
						$("#InformationForm, #NotesForm").clearForm();

						//Hide our forms
						$('#forms_content').addClass("hide");

						//Show success message
						$('#add_good_message').removeClass("hide").addClass("success");

					break;

				}
			}
		});
	}
})(jQuery);

/**
 * Form submit by jQuery Form Plugin
 */
(function($) {
	$.uploadPhoto = function() {

		$("#ImagesForm").ajaxForm({
			method : "POST",
			dataType: "json",
			url: "./application/ajax/resize_photo.php",
			beforeSend: function() {
				//Disable upload button
				$("#save").attr("disabled", "disabled");

				//show progressbar
				$("#preloader").removeClass('hide');

				//Hide error message
				$("#error_image_size").addClass('hide');

				$("#error_image_extension").addClass('hide');

				
			},
			complete: function() {

				//Disable "Upload" button
				$("#upload_photo").attr("disabled", "disabled");

				//Hide progressbar
				$("#preloader").slideUp();
			},
			success: function(object) {

				console.log(object.error);

				switch (object.error) {

					case 'size':

						//Hide downloaded image from preview
						$("#preview_photo").css('display', 'none');

						//Show error message
						$("#error_image_size")
							.removeClass('hide')
							.addClass('error');

					break;

					case 'expansion':

						//Hide downloaded image from preview
						$("#preview_photo").css('display', 'none');

						//Show error message
						$("#error_image_extension")
							.removeClass('hide')
							.addClass('error');

					break;

					default:

						//Enable submit button
						$("#save").removeAttr("disabled");

						//Preview client photo
						$("#preview_photo")
							.html('')
							.append('<img>');

						$("#preview_photo img")					
							.attr("width", object.image_width)
							.attr("height", object.image_height)
							.attr("src", object.image_name)
							.attr("alt", object.image_alt)
							.attr("id", object.image_id.photo_id)
							.parent()
							.slideDown();
				}

				
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

		$("#image_file").change(function(img_path) {

			if (img_path != "") {
				$("#upload_photo").removeAttr("disabled");

			}
		});
	}
})(jQuery);
