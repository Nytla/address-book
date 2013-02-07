/**
 * @fileoverview This file formed book list for user
 * @author Igor Zhabskiy Zhabskiy.Igor@gmail.com
 * @version 0.1
 */
$(document).ready(function() {

	/**
	 * If image not available
	 */
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

	/**
	 * Insert a 'details' column to the table
	 */
	var img_details_open = $("#details_open img");
	
	var img_details_close = $("#details_close img");

	var nCloneTh = document.createElement('th');

	var nCloneTd = document.createElement('td');

	nCloneTd.className = "center";

	nCloneTd.innerHTML = img_details_open.parent().html();

	$('#example thead tr').each( function () {
		this.insertBefore(nCloneTh, this.childNodes[0]);
	});

	$('#example tbody tr').each( function () {
		this.insertBefore(nCloneTd.cloneNode( true ), this.childNodes[0]);
	});

	/**
	 * Add event listener for opening and closing details and note that the indicator for showing which row is open is not controlled by DataTables, rather it is done here
	 */
	$(document).on("click", "#example tbody tr td img[width='20']", function() {

		var nTr = $(this).parents("tr")[0];

		if ( oTable.fnIsOpen(nTr) ) {

			/**
			 * This row is already open - close it 
			 */
			this.src = img_details_open.attr("src");

			oTable.fnClose( nTr );
		} else {

			/**
			 * Open this row
			 */
			this.src = img_details_close.attr("src");

			var view_id = $(this).attr('alt');

			oTable.fnOpen(nTr, fnFormatDetails(oTable, nTr, view_id), 'details');
		}
	});

	/**
	 * Create Book list table
	 */
	var oTable = $('#example').dataTable({
		"sDom": '<"top"if<"clear">>rt<"bottom"lp<"clear">>',
		"bJQueryUI": true,
		"sPaginationType": "full_numbers",
		"bProcessing": true,
        "bServerSide": true,
        "sAjaxSource": "../application/ajax/user_clients_json.php",
		"aaSorting": [[ 1, "asc" ]],
		"aoColumnDefs": [
			{ "bSortable": false, "aTargets": [ 0 ] },
		],
		"aLengthMenu": [[10, 20, 50, -1], [10, 20, 50, "All"]],
	});

	/**
	 * Create Country and City container search
	 */
/*
	$("#example_filter").append('<label id="Country"></label>');
	
	$("#example_filter").append('<label id="city"></label>');

	$("#example_filter label input").css("width", "140");

	$("#example_filter label").css("float", "left");
*/
	/**
	 * Create Country and City selected elements search
	 */
/*
	$("#example_filter label").each(function (i) {

		if (i == 0) {
			return;
		}

		i = (i == 2) ? 3 : 2;

		this.innerHTML = fnCreateSelect( oTable.fnGetColumnData(i), i );

		$('select', this).change( function () {
			oTable.fnFilter($(this).val(), i);
		} );
		
		$("select").css("width", "130");

	});
*/
	$.extend($.fn.dataTableExt.oStdClasses, {
	    "sWrapper": "dataTables_wrapper form-inline"
	});
});

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
		
		/**
		 * Check that we have a column id
		 */
		if (typeof iColumn == "undefined") return new Array();
	
		/**
		 * By default we only wany unique data
		 */
		if (typeof bUnique == "undefined") bUnique = true;
	
		/**
		 * By default we do want to only look at filtered data
		 */
		if (typeof bFiltered == "undefined") bFiltered = true;
	
		/**
		 * By default we do not wany to include empty values
		 */
		if (typeof bIgnoreEmpty == "undefined") bIgnoreEmpty = true;
	
		/**
		 * List of rows which we're going to loop through
		 */
		var aiRows;
	
		/**
		 * Use only filtered rows
		 */
		if (bFiltered == true) aiRows = oSettings.aiDisplay; 

		/**
		 * Use all rows (numbers)
		 */
		else aiRows = oSettings.aiDisplayMaster;

		/**
		 * Set up data array
		 */
		var asResultData = new Array();
	
		for (var i = 0,c = aiRows.length; i < c; i++) {
			iRow = aiRows[i];

			var aData = this.fnGetData(iRow);

			var sValue = aData[iColumn];
		
			/**
			 * Ignore empty values?
			 */
			if (bIgnoreEmpty == true && sValue.length == 0) continue;

			/**
			 * Ignore unique values?
			 */
			else if (bUnique == true && jQuery.inArray(sValue, asResultData) > -1) continue;

			/**
			 * Else push the value onto the result data array
			 */
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
/*
function fnCreateSelect(aData, num) {

	var option_name = (num == 2) ? 'Country' : 'City';

	var r = '<select><option value="">'+option_name+'</option>', i, iLen=aData.length;
	
	for ( i = 0 ; i < iLen ; i++ ) {
		r += '<option value="'+aData[i]+'">'+aData[i]+'</option>';
	}

	return r+'</select>';
}
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

	/**
	 * Set client data json
	 */
	$.ajaxes(view_id);
	
	return content;
}

/**
 * ajaxes This is awesome jQuery plugin.
 *
 * @class ajaxes
 * @param {object} img_details_open This is image for table (information view)
 * @memberOf jQuery.fn
 */
(function($) {
	$.ajaxes = function(id) {

		$.ajax({  
			type: "POST",
			dataType: "json",
			url: "/application/ajax/user_client_data.php",
			cache: false,
			async: false,
			data: {
				client_id: id
			},
			beforeSend: function() {},
			complete: function() {},
			success: function(object) {

				var object = object[0];
				
				content = '<div id="view_content_' + object.id + '">';

				content += '<div>';

				content += '<img src="' + object.photo_name + '" height="' + object.photo_height + '" width="' + object.photo_width + '" alt="' + object.photo_description + '" class="left" style="padding: 10px;">';

				content += '<p style="padding: 10px;">';

				content += '<b>Email:</b> ' + object.email + '<br>';

				content += '<b>Notes:</b> ' + object.notes + '';

				content += '</p></div></div>';
			}
		});
	}
})(jQuery);
