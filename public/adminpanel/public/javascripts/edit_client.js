/**
 * Validate add new administrator form
 */
$(document).ready(function() {

	//Create select list for our cities when page loaded
	$.formedCitiesList('load_page');

	//Create select list for our cities when country changed
	$.formedCitiesList('change_country');

	//Set client information in our forms
	var object_options = {
		module:		'set_information',
		file_name:	'edit_client.php',
		data:		{
			edit_id: $.parseHash().edit_id,
			flag: 	'edit',
		}
	};

	//Get cities from DB
	$.ajaxes(object_options);

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
				minlength: 2,
				maxlength: 16
			},

			last_name: {
				required: true,
				minlength: 2,
				maxlength: 16
			},

			email: {
				required: true,
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

			//Set object with our options (country id)
			var object_options = {
				module:		'edit_record',
				file_name:	'edit_client.php',
				data: 
				{
					flag: 		'update',
					edit_id: 	$.parseHash().edit_id,
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
 * Formed cities select list
 */
(function($) {
	$.formedCitiesList = function(module, city_id) {

		switch (module) {

			case 'load_page':

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

			break;

			case 'change_country':

				//Create select list for our cities when country changed
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

			break;

			case 'load_cities':

				//Set object with our options (country id)
				var object_options = {
					module:		'cities_formed',
					file_name:	'cities_formed.php',
					city_id:	city_id,
					data:		{ country_id: $("#country").val() }
				};

				//Get cities from DB
				$.ajaxes(object_options);

			break;
		}

		
	}
})(jQuery);

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
			success: function(object) {

				switch(object_options.module) {

					case 'set_information':

						$("#first_name").val(object.first_name);

						$("#last_name").val(object.last_name);

						$("#email").val(object.email);

						$("#country").val(object.country);

						$.formedCitiesList('load_cities', object.city);

						$("#preview_photo")
							.html('')
							.append('<img>');

						$("#preview_photo img")					
							.attr("width", object.photo_width)
							.attr("height", object.photo_height)
							.attr("src", object.photo_name)
							.attr("alt", object.photo_description)
							.attr("id", object.photo_id)
							.parent()
							.slideDown();
						$("#notes").val(object.notes);

					break;

					case 'cities_formed':

						//Set select element width
						$("#city").css("width", "235");

						//Delete all options element, but not first
						$("#city option").remove();

						$("#city").append(new Option('::ALL::', ''));

						//Create options element for sity list
						$.each(object.cities, function(index, value) {

							if (index == object_options.city_id) {

								var default_selected = true;
							} else { 
								var default_selected = false;
							}

							$("#city").append(new Option(value, index, default_selected));

							
						});

					break;

					case 'edit_record':

						//Clear our forms
						$("#InformationForm, #NotesForm").clearForm();

						//Hide our forms
						$('#forms_content').addClass("hide");

						//Show success message
						if (object.flag == true) {
							$('#edit_good_message').removeClass("hide").addClass("success");
						} else {
							$('#edit_bad_message').removeClass("hide").addClass("success");
						}
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

/**
 * Parse hash from url
 */
(function($){
	$.parseHash = function() {

		//Get the URI and remove the hash
		var uri = $(location).attr('search').substring(1);

		//Parse the data
		var elements = uri.split('&');

		//The Object that will have the data
		var data = new Object();

		//Do a for loop
		for(i = 0; i < elements.length; i++) {

			//Split the element to item -> value format
			var cur = elements[i].split('=');

			//Append the element to the list
			data[cur[0]] = cur[1]; 
		}

		//Return the result
		return data;
	}
})(jQuery);
