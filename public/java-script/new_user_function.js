/**
*
* user_function.js
* 
* This is js function for work user part of Address Book
*
* @author Igor Zhabskiy <Zhabskiy.Igor@googlemail.com>
* 
* @version 0.1
* 
* @copyright (c)2011
*
*/

/**
*
* reloadSearchForm
*
* Function to reload the search form
* 
*/
function reloadSearchForm() {
	document.getElementById('submit_form').submit();
}

/**
 *
 * Displays client information
 * @param (Number) client_id 	client id
 * 
 */
 function viewClient(client_id) {
	$(document).ready(function(){
		$.ajax({  
			type: "POST",  
			url: "ajax/jquery_ajax_view_client.php",  
			data: "client_id="+client_id,  
			success: function(html){  
				//$("#content").html(html);
				//alert(html);
				$.prompt(html);
			}
		});
		
		return false;
	});
 }
