/**
 * Formed Book list page 
 */
$(document).ready(function() {

	var create_table = $('#example').dataTable({
		//"aaSorting": [[2, "asc"]],
		//"bPaginate": false,
		//"aLengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],

		"aoColumnDefs": [
			{ "bSortable": false, "aTargets": [ 0 ] }
		],

		"bJQueryUI": true,
		"sPaginationType": "full_numbers"
	
	});

});



/**
 * Parse hash from url
 */
(function($){
	$.parseHash = function() {

		//Get the URI and remove the hash
//		var uri = window.location.hash.substring(1);

		var uri = $(location).attr('hash').substring(1);

		//Parse the data
		var elements = uri.split('&');

		//The Object that will have the data
		var data = new Object();

		//Do a for loop
		for(i = 0; i < elements.length; i++) {

			//Split the element to item -> value format
			var cur = elements[i].split('=');

			//Append the element to the list
			data[cur[0]] = cur[1]; 
		}

		//Return the result
		return data;
	}
})(jQuery);
