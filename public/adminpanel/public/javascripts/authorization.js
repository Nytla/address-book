/**
 * Validate authorization form
 */
$(document).ready(function() {

	/**
	 * Show or hide authorization menu
	 */	
	$("#testing").html('this is small test :)');
	
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
/*
		//Validate signup form on keyup and submit

		http://jquery.bassistance.de/validate/demo/

		http://www.linkexchanger.su/2008/46.html

		$("#authForm").validate({

			rules: {
				valueLogin: {
					required: true,
					minlength: 2
				},
				valuePass: {
					required: true,
					minlength: 5
				},
			
				messages: {
					valueLogin: {
						required: "Please enter a username",
						minlength: "Your username must consist of at least 2 characters"
					},
					valuePass: {
						required: "Please provide a password",
						minlength: "Your password must be at least 5 characters long"
					},
				}
			}
		});
*/
		var login = $.trim($("#login").val());
		
		var password = $.trim($("#pass").val());
		
		if(login == '' || password == '') {
			$('#error_empty').removeClass().addClass("error");
			
			return false;
		}

		$.ajax({  
			type: "POST",
			//dataType: "json",
			url: "./application/ajax/authorization.php",
			cache: false,
			data: {
				login: login,
				password: password
			},
			success: function(json_object) {
				
				alert(json_object.redirect_file);

				//console.log(data);

				if(json_object.validate == false) {
					alert('this is false');

					$('#error').removeClass().addClass("error");
				} else {
					alert('this not false');

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
