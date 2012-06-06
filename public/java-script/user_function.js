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
	
    /*
     *Get client infrormation on ajax
     */
    // Create new JsHttpRequest object.
    var req = new JsHttpRequest();
	// Code automatically called on load finishing.
    req.onreadystatechange = function() {
        if (req.readyState == 4) {
	
			if(req.responseJS) {
				
				if(req.responseJS.client_info == true) {
					$.prompt(req.responseJS.information);
				}
			}
		}
	}
				
	req.caching = false;
	req.open('POST', './ajax/ajax_view_client.php', true);
	req.send({ client_id: client_id });

	return;
}
