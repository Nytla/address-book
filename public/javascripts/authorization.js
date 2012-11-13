/** 
 * @fileoverview This file validate authorization data
 * @author Igor Zhabskiy Zhabskiy.Igor@googlemail.com
 * @version 0.1
 */
$(document).ready(function() {

	//Hide errors messages
	$("[name ^= 'value']").keypress(function() {
		
		$('#error_empty')
			.removeClass()
			.addClass("hide");

		$('#error_incorect')
			.removeClass()
			.addClass("hide");

		$('#error_capcha')
			.removeClass()
			.addClass("hide");
	});

	//Submit authorization form on Ajax
	$("#authForm").submit(function() {

		//Set variables
		var login = $("#login").val();

		var password = $("#pass").val();

		//If login or password is empty than return error message
		if(login == '' || password == '') {

			$('#error_empty')
				.removeClass()
				.addClass("error");
			
			return false;
		}

		//Validate login
		var reg_login = /([^А-Яа-яA-Za-z])/gi;
		
		var login = login.replace(reg_login, "");

		var hidden = $("#hide").val();

		//Validate password
		var reg_pass = /([^А-Яа-яA-Za-z0-9_-])/gi;
		
		var password = password.replace(reg_pass, "");

		//If input hidden was introduced then view error 
		if (hidden != '') {

			$('#error_capcha')
				.removeClass()
				.addClass("error");

			return false;
		}

		//Ajax request
		$.ajax({
			type: "POST",
			dataType: "json",
			url: "/application/ajax/authorization.php",
			cache: false,
			data: {
				login: login,
				password: password
			},
			success: function(object) {

				if(object.validate == false) {

					$('#error_incorect')
						.removeClass()
						.addClass("error");
				} else {

					var url = object.redirect_file;

					$(location).attr('href',url);
				}
			}
		});

		return false;
	});
});
