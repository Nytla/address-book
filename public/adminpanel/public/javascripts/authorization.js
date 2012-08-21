/**
 * Validate authorization form
 */
$(document).ready(function() {

	/**
	 * Show or hide authorization menu
	 */
	$("[name ^= 'value']").keypress(function() {
	
		$('#error').removeClass().addClass("hide");
		
		$('#error_empty').removeClass().addClass("hide");
	});
	
	var flag = true;

	$("#auth_url").click(function() {
		
		if(flag == true) {
			$("#auth_content").slideDown('slow');
			
			flag =! flag;
		} else {
			$("#auth_content").slideUp('slow');
			
			flag =! flag;
		}
	});

	/**
	 * Submit authorization form on Ajax
	 */
	$("#authForm").submit(function() {

//		Regexp - http://seoromin.com.ua/topic/109_regulyarnye-vyrazheniya-v-jquery/

		//Validate login
		var reg_login = /([^А-Яа-яA-Za-z0-9])/gi;
		
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
			success: function(json_object) {

				if(json_object.validate == false) {
					//alert('this is false');

					$('#error').removeClass().addClass("error");
				} else {
					//alert('this is not false');

					var url = json_object.redirect_file;

					$(location).attr('href',url);
				}
			}
		});
		
/*
		$.ajax({  
			type: "POST",
			dataType: "json",
			url: "./application/ajax/authorization.php",
			cache: false,
			data: "login="+$("#login").val()+"&password="+$("#pass").val(),
			success: function(json_obj, event) {
				
				alert('asd');

				alert(json_obj.authorization);
				
				if (json_obj.authorization == 1) {
					//redirect

					var url = '#layout=1';

					$(location).attr('href',url);
					
					$("#testing").fadeOut('slow', function() {
						$("#content").html(json_obj.content);
					});
					//console.log(url);
					
					//$("body").fadeOut(1000, redirectPage(linkLocation));
					
				} else {
					$('#error').removeClass().addClass("error");
				}
			}

		});
*/

		return false;
	});
});
