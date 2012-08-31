/**
 * Validate add new administrator form
 */
$(document).ready(function() {

	//alert('Yahho!');

	//Set errors variables
//	var error_empty_first_name = $("#error_empty_f_n").html();

//	var error_min_length_first_name = $("#error_min_length_f_n").html();

//	var error_max_length_first_name = $("#error_max_length_f_n").html();
	
//	var error_empty_last_name = $("#error_empty_last_name").html();

//	var error_empty_first_name = $("#error_empty_login").html();

	var container = $("#container");

	//Validate our form
	$("#addnewrecordForm").validate({

		rules: {

			first_name: {
				required: true,
				minlength: 5,
				maxlength: 16
			},
/*
			last_name: {
				required: true,
				minlength: 5,
				maxlength: 16
			},

			email: {
				required: true,
				minlength: 5,
				maxlength: 16
			},

			country: {
				required: true
			}
*/
		},

		errorContainer: container,
		errorLabelContainer: $("div", container),

/*
		messages: {

			first_name: {
				required: error_empty_first_name,
				minlength: error_min_length_first_name,
				maxlength: error_max_length_first_name
			}
		},
*/
		submitHandler: function() {

		}

	});

});
