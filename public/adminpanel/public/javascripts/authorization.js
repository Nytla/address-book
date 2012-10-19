//Regexp - http://seoromin.com.ua/topic/109_regulyarnye-vyrazheniya-v-jquery/



/**
 * Validate authorization form
 */
$(document).ready(function() {

	/**
	 * Hide errors messages
	 */
	$("[name ^= 'value']").keypress(function() {
	
		$('#error').removeClass().addClass("hide");
		
		$('#error_empty').removeClass().addClass("hide");
	});

	/**
	 * Submit authorization form on Ajax
	 */
	$("#authForm").submit(function() {

		//Validate login
		var reg_login = /([^А-Яа-яA-Za-z])/gi;
		
		var login = $("#login").val().replace(reg_login, "");

		//Validate password
		var reg_pass = /([^А-Яа-яA-Za-z0-9_-])/gi;
		
		var password = $("#pass").val().replace(reg_pass, "");

		//If login or password is empty than return error message
		if(login == '' || password == '') {
			$('#error_empty').removeClass().addClass("error");
			
			return false;
		}

		$.ajax({  
			type: "POST",
			dataType: "json",
			url: "./application/ajax/authorization.php",
			cache: false,
			data: {
				login: login,
				password: password
			},
			success: function(object) {

				if(object.validate == false) {

					$('#error').removeClass().addClass("error");
				} else {

					var url = object.redirect_file;

					$(location).attr('href',url);
				}
			}
		});

		return false;
	});
});
