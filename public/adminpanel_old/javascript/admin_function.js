/**
 * Validate authorization form
 */

	//$("#authForm").validate();

/**
 * Show or hide authorization menu
 */

$(document).ready(function() {
	
	$("#testing").html('this is small test :)');
	
	$("[name ^= 'value']").keypress(function() {
	
	//$("#login", $("#password")).keypress(function() {
		
		//alert('keyp');
		
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
	$("#auth_form").submit(function() {

		var login = $.trim($("#login").val());
		
		var password = $.trim($("#pass").val());
		
		if(login == '' || password == '') {
			$('#error_empty').removeClass().addClass("error");
			
			return false;
		}

		$.ajax({  
			type: "POST",
			dataType: "json",
			url: "./ajax/authorization.php", 
			data: "login="+$("#login").val()+"&password="+$("#pass").val(),
			success: function(json_obj, event) {
				
				alert(json_obj.authorization);
				
				if (json_obj.authorization == 1) {
					//redirect
					//alert('Redirect');
					
					//event.preventDefault();
					
					//alert(document.location.href+'?admin=1');
					
					//var linkLocation = '?layout=1';
					
					//linkLocation = '/layout/';
					
					//var url = "http://stackoverflow.com";
					
					//var url = document.location.href;
					
					//var url = '?layout=1';
					var url = '#layout=1';

					$(location).attr('href',url);

					//alert(json_obj.content);
					
					$("#testing").fadeOut('slow', function() {
						$("#content").html(json_obj.content);
					});
					//console.log(url);
					
					//$("body").fadeOut(1000, redirectPage(linkLocation));
					
				} else {
					$('#error').removeClass().addClass("error");
				}
				
				//$("#content").append(obj.orig+obj.num);
				
				//$("#content").html(json_obj.orig);
			}
		});
		
		return false;
	});

	//$("a.transition").click(function(event){
		//event.preventDefault();
		//linkLocation = this.href;
		//$("body").fadeOut(1000, redirectPage);
	//});
		
	function redirectPage(linkLocation) {
		//window.location.replace = linkLocation;
		
		//window.location = linkLocation;
	}

	//$.prompt(test);

});
