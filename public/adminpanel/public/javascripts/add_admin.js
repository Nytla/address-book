/**
 * Validate add new administrator form
 */
$(document).ready(function() {

//	alert('Yes_');

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
				minlength: 5,
				maxlength: 16,
				equalTo: "#confirm_pass"
			}

		},

		messages: {

			login: {
				required: "Please enter a login!",
				minlength: "Your password must be at least 5 characters long!",
				maxlength: "Your password should contain no more than 16 characters!"
			},

			pass: {
				required: "Please enter a login!",
				minlength: "Your password must be at least 5 characters long!",
				maxlength: "Your password should contain no more than 16 characters!"
			},

			confirm_pass: {
				required: "Please enter a login!",
				minlength: "Your password must be at least 5 characters long!",
				maxlength: "Your password should contain no more than 16 characters!",
				equalTo: "Please enter the same password as above!"
			},

			submitHandler: function() { alert("Submitted!") }

		}

	});

//	alert('Oops_');

});
