/**
 * @fileoverview This file formed book list for administrator
 * @author Igor Zhabskiy Zhabskiy.Igor@googlemail.com
 * @version 0.1
 */
$(document).ready(function() {

	//If image not available
	$("#example tbody tr td div img").each(function() {

		$(this).error(function() {

			$(this).attr({
				"height":	'300',
				"width":	'300',
				"alt":		'No photo available',
				"src":		'/public/images/uploads_client/no_photo.gif'
			});
		});
	});

	//Insert a 'details' column to the table
	var img_details_open = $("#details_open img");

	var img_details_close = $("#details_close img");

	var nCloneTh = document.createElement('th');

	var nCloneTd = document.createElement('td');

	nCloneTd.innerHTML = img_details_open.parent().html();

	nCloneTd.className = "center";

	$('#example thead tr').each( function () {
		this.insertBefore(nCloneTh, this.childNodes[0]);
	});

	$('#example tbody tr').each( function () {
		this.insertBefore(nCloneTd.cloneNode(true), this.childNodes[0]);
	});

	//Add event listener for opening and closing details and note that the indicator for showing which row is open is not controlled by DataTables, rather it is done here
	$(document).on("click", "#example tbody tr td img[width='20']", function() {

		var nTr = $(this).parents("tr")[0];

		if (oTable.fnIsOpen(nTr)) {

			//This row is already open - close it 
			this.src = img_details_open.attr("src");

			oTable.fnClose(nTr);
			
		} else {

			//Open this row
			this.src = img_details_close.attr("src");

			var view_id = $(this).attr('alt');

			oTable.fnOpen(nTr, fnFormatDetails(oTable, nTr, view_id), 'details');
		}
	});

	//Set client data json
	$.ajaxesBookList(img_details_open);

	//Create Book list table
	var oTable = $('#example').dataTable({
		"sDom": '<"top"if<"clear">>rt<"bottom"lp<"clear">>',
		"bJQueryUI": true,
		"sPaginationType": "full_numbers",        
                "aaData": clients_data_array,
		"aaSorting": [[ 1, "asc" ]],
		"aoColumnDefs": [
			{ "bSortable": false, "aTargets": [ 0,5 ] },
		],
		"aLengthMenu": [[10, 20, 50, -1], [10, 20, 50, "All"]],
	});

	//Create Country and City container search
	$("#example_filter").append('<label id="Country"></label>');
	
	$("#example_filter").append('<label id="city"></label>');

	$("#example_filter label input").css("width", "140");

	$("#example_filter label").css("float", "left");

	//Create Country and City selected elements search
	$("#example_filter label").each( function (i) {

		if (i == 0) {
			return;
		}

		i = (i == 1) ? 3 : 4;

		this.innerHTML = fnCreateSelect(oTable.fnGetColumnData(i), i);
		$('select', this).change( function () {
			oTable.fnFilter($(this).val(), i);
		} );
		
		$("select").css("width", "130");
	});

	$.extend( $.fn.dataTableExt.oStdClasses, {
	    "sWrapper": "dataTables_wrapper form-inline"
	} );

	//Delete client from DB and from DOM (dynamicaly)
	$(document).on("click", "#example tbody tr td a[name='delete']", function() {
		
		//Get row which clicked
		var href_content = $(this).attr('href');		

		var delete_id = $.parseHash(href_content).delete_id;

		if (confirm("Are you sure you wish to delete the record "+delete_id+"?")) {
			//Create object for ajax request
			var object_options = {
				id: delete_id
			};

			//Delete client from DB
			$.ajaxesDeleteClient(object_options, $(this).parent().parent());

			if (window.ajax_value == true) {

				//Delete row from DOM
				var tr = $(this).parent().parent().get(0);

				$("#example tbody tr").each(function(key, value) {

					var tr_new = $(this).get(0);

					if (tr_new == tr) {
						oTable.fnDeleteRow(value);
					}
				});
			}
		}
	});
});

/**
 * ajaxes This is jQuery ajax plugin.
 *
 * @class ajaxes
 * @param {object} object_options This is options for ajax query
 * @memberOf jQuery.fn
 */
(function($) {
	$.ajaxesDeleteClient = function(object_options) {

		$.ajax({
			type: "POST",
			dataType: "json",
			url: "/application/ajax/delete_client.php",
			cache: true,
			async: false,
			data: object_options,
			success: function(object) {
	
				if (object.flag == true) {

					window.ajax_value = true;
				} else {
					alert("For technical reasons, no record has been deleted.");

					window.ajax_value = false;
				}
			}
		});
	}
})(jQuery);

/**
 * parseHash This is jQuery ajax plugin.
 *
 * @class parseHash
 * @param {string} hash This is hash from our url
 * @memberOf jQuery.fn
 */
(function($){
	$.parseHash = function(hash) {

		//Get the URI and remove the hash
		if (!hash) {
			var hash = $(location).attr('hash').substring(1);
		} 

		//Parse the data
		var elements = hash.split('#');

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

/**
 * fnGetColumnData This is jQuery plugin which return an array of table values from a particular column
 *
 * @class fnGetColumnData
 * @param {object} oSettings	This is always the last argument past to the function
 * @param {int} iColumn		This is id of the column to extract the data from
 * @param {bool} bUnique	(optional) If set to false duplicated values are not filtered out
 * @param {bool} bFiltered	(optional) If set to false all the table data is used (not only the filtered)
 * @param {bool} bIgnoreEmpty	(optional) If set to false empty values are not filtered from the result array
 * @memberOf jQuery.fn
 * @author Benedikt Forchhammer <b.forchhammer /AT\ mind2.de> (http://datatables.net/)
 */
(function($) {
	$.fn.dataTableExt.oApi.fnGetColumnData = function (oSettings, iColumn, bUnique, bFiltered, bIgnoreEmpty) {
		// check that we have a column id
		if (typeof iColumn == "undefined") return new Array();
	
		// by default we only wany unique data
		if (typeof bUnique == "undefined") bUnique = true;
	
		// by default we do want to only look at filtered data
		if (typeof bFiltered == "undefined") bFiltered = true;
	
		// by default we do not wany to include empty values
		if (typeof bIgnoreEmpty == "undefined") bIgnoreEmpty = true;
	
		// list of rows which we're going to loop through
		var aiRows;
	
		// use only filtered rows
		if (bFiltered == true) aiRows = oSettings.aiDisplay; 
		// use all rows
		else aiRows = oSettings.aiDisplayMaster; // all row numbers

		// set up data array	
		var asResultData = new Array();
	
		for (var i=0,c=aiRows.length; i<c; i++) {
			iRow = aiRows[i];
			var aData = this.fnGetData(iRow);
			var sValue = aData[iColumn];
		
			// ignore empty values?
			if (bIgnoreEmpty == true && sValue.length == 0) continue;

			// ignore unique values?
			else if (bUnique == true && jQuery.inArray(sValue, asResultData) > -1) continue;
		
			// else push the value onto the result data array
			else asResultData.push(sValue);
		}
	
		return asResultData;
}}(jQuery));

/**
 * fnCreateSelect This function create selected element Country and City for search
 *
 * @param {object} aData	This is our option elements
 * @param {string} num		This is number of search element
 * @memberOf JavaScript function
 */
function fnCreateSelect(aData, num) {

	var option_name = (num == 3) ? 'Country' : 'City';

	var r = '<select><option value="">'+option_name+'</option>', i, iLen=aData.length;
	
	for ( i = 0 ; i < iLen ; i++ ) {
		r += '<option value="'+aData[i]+'">'+aData[i]+'</option>';
	}

	return r+'</select>';
}

/**
 * Formating function for row details
 */
/**
 * fnFormatDetails This function formating function for row details
 *
 * @param {object} oTable	This is clients table object
 * @param {object} nTr		This is view object
 * @param {int} view_id		This is id of view client
 * @memberOf JavaScript function
 */
function fnFormatDetails(oTable, nTr, view_id) {

	var aData = oTable.fnGetData(nTr);

	var sOut = window.clients_data_array[view_id][6];

	return sOut;
}

/**
 * ajaxes This is awesome jQuery plugin.
 *
 * @class ajaxes
 * @param {object} img_details_open This is image for table (information view)
 * @memberOf jQuery.fn
 */
(function($) {
	$.ajaxesBookList = function(img_details_open) {

		$.ajax({  
			type: "POST",
			dataType: "json",
			url: "/application/ajax/clients_json.php",
			cache: false,
			async: false,
			data: {},
			beforeSend: function() {
				//Show ajax preloader
				$("#preloader").removeClass('hide');

				//Hide book list table
				$("#example").addClass('hide');
			},
			complete: function() {
				//Hide ajax preloader
				$("#preloader").slideUp('slow');

				//Show book list table
				$("#example").removeClass('hide');
			},
			success: function(object) {

				//Create array with client data
				window.clients_data_array = new Array();
 
				$(object).each(function(i, v) {

					var edit_url = $(document.createElement('a'))
						.attr({
							"href": '/adminpanel/edit_client.php?edit_id=' + v.id,
							"name": 'edit'
						})
						.text('Edit')
						.wrap('<div />');

					var delete_url = $(document.createElement('a'))
						.attr({
							"href": '#delete_id=' + v.id,
							"name": 'delete'
						})
						.text('Delete')
						.wrap('<div />');

					var action = edit_url.parent().html() + ' | ' + delete_url.parent().html();

					var content = '<div id="view_content_' + i + '">';

					content += '<div>';

					content += '<img src="' + v.photo_name + '" height="' + v.photo_height + '" width="' + v.photo_width + '" alt="' + v.photo_description + '" class="left" style="padding: 10px;">';

					content += '<p style="padding: 10px;">';

					content += '<b>Email:</b> ' + v.email + '<br>';

					content += '<b>Notes:</b> ' + v.notes + '';

					content += '</p></div></div>';

					window.clients_data_array[i] = [img_details_open.attr('alt', i).parent().html(), v.id, v.first_name + ' ' + v.last_name, v.countryname_en, v.cityname_en, action, content];
				});
			}
		});
	}
})(jQuery);
