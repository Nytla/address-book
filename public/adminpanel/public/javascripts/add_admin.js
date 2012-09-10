//Validate signup form on keyup and submit
//http://jquery.bassistance.de/validate/demo/
//http://www.linkexchanger.su/2008/46.html



/**
 * Validate add new administrator form
 */
$(document).ready(function() {

	//Hide errors
	$("#login").keypress(function() {
		$('#error_incorect_login').removeClass().addClass("hide");

		$('#error_exists').removeClass().addClass("hide");

		$('#add_good_message').removeClass().addClass("hide");
	});

	$("#pass").keypress(function() {
		$('#error_incorect_pass').removeClass().addClass("hide");
	});

	//Set errors variables
	var error_empty_login = $("#error_empty_login").html();

	var error_empty_pass = $("#error_empty_pass").html();

	var error_empty_pass_conf = $("#error_empty_pass_conf").html();
	
	var error_incorect_login = $("#error_incorect_login").html();

	var error_incorect_pass = $("#error_incorect_pass").html();

	var error_min_length_login = $("#error_min_length_login").html();

	var error_min_length_pass = $("#error_min_length_pass").html();

	var error_max_length_login = $("#error_max_length_login").html();

	var error_max_length_pass = $("#error_max_length_pass").html();

	var error_confirm = $("#error_confirm").html();

	var error_exists = $("#error_exists").html();

	//Validate our form
	$("#addAdminForm").validate({

		rules: {

			login: {
				required: true,
				minlength: 5,
				maxlength: 16
			},

			pass: {
				required: true,
				minlength: 5,
				maxlength: 16
			},

			confirm_pass: {
				required: true,
				equalTo: "#pass"
			}

		},

		messages: {

			login: {
				required: error_empty_login,
				minlength: error_min_length_login,
				maxlength: error_max_length_login
			},

			pass: {
				required: error_empty_pass,
				minlength: error_min_length_pass,
				maxlength: error_max_length_pass
			},

			confirm_pass: {
				required: error_empty_pass_conf,
				equalTo: error_confirm
			}

		},
		
		submitHandler: function() {

			//Show error if login or password is incorrect
			var login = $("#login").val();

			var password = $("#pass").val();

			//Validate login
			if (!isValidLogin(login)) {

				$('#error_incorect_login').removeClass().addClass("error");

				return false;
			}

			//Validate password
			if (!isValidPassword(password)) {

				$('#error_incorect_pass').removeClass().addClass("error");

				return false;
			}

			//Set object with our login and password and submit form on ajax
			var options = { 
				login: login,
				password: password
			}

			$.ajaxes(options);
		}
	});
});

/**
 * Validate login
 */
function isValidLogin(login){
	var pattern = new RegExp(/^[a-z_-]+$/i);

	return pattern.test(login);
}

/**
 * Validate password
 */
function isValidPassword(password){
	var pattern = new RegExp(/^[a-z0-9_-]+$/i);

	return pattern.test(password);
}

/**
 * Ajaxes function for our form
 */
(function($) {
	$.ajaxes = function(object_options) {

		$.ajax({  
			type: "POST",
			dataType: "json",
			url: "./application/ajax/add_admin.php",
			cache: false,
			data: object_options,
			success: function(object) {				

				if (object.validate == false) {				

					//Show error message
					$('#error_exists').removeClass().addClass("error");
				} else {

					//Hide form
					$('#addAdminForm').addClass("hide");
					
					//Clear form
					$("#login").val('');

					$("#pass").val('');

					$("#confirm_pass").val('');

					//Show success message
					$('#add_good_message').removeClass("hide").addClass("success");
				}
			}
		});
	}
})(jQuery);
