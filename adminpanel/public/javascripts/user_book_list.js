/**
 * @fileoverview This file formed book list for user
 * @author Igor Zhabskiy Zhabskiy.Igor@googlemail.com
 * @version 0.1
 */
$(document).ready(function() {

	//Insert a 'details' column to the table
	var img_details_open = $("#details_open img");
	
	var img_details_close = $("#details_close img");

	var nCloneTh = document.createElement( 'th' );

	var nCloneTd = document.createElement( 'td' );

	nCloneTd.innerHTML = img_details_open.parent().html();

	nCloneTd.className = "center";

	$('#example thead tr').each( function () {
		this.insertBefore( nCloneTh, this.childNodes[0] );
	});

	$('#example tbody tr').each( function () {
		this.insertBefore(  nCloneTd.cloneNode( true ), this.childNodes[0] );
	});

	//Add event listener for opening and closing details and note that the indicator for showing which row is open is not controlled by DataTables, rather it is done here
	$(document).on("click", "#example tbody td img", function() {

		var nTr = $(this).parents("tr")[0];

		if ( oTable.fnIsOpen(nTr) ) {

			//This row is already open - close it 
			this.src = img_details_open.attr("src");

			oTable.fnClose( nTr );

		} else {

			//Open this row
			this.src = img_details_close.attr("src");

			var view_id = $(this)
				.parent()
				.parent()
				.children("td:eq(3)")
				.children("div")
				.attr('title');

			oTable.fnOpen( nTr, fnFormatDetails(oTable, nTr, view_id), 'details' );
		}
	});

	//Create Book list table
	var oTable = $('#example').dataTable({
		"sDom": '<"top"if<"clear">>rt<"bottom"lp<"clear">>',
		"bJQueryUI": true,
		"sPaginationType": "full_numbers",
		"aaSorting": [[ 1, "asc" ]],
		"aoColumnDefs": [
			{ "bSortable": false, "aTargets": [ 0 ] },
		],
		"aLengthMenu": [[10, 20, 50, -1], [10, 20, 50, "All"]],
	});

	//Create Country and City container search
	$("#example_filter").append('<label id="Country"></label>');
	
	$("#example_filter").append('<label id="city"></label>');

	$("#example_filter label input").css("width", "140");

	$("#example_filter label").css("float", "left");

	//Create Country and City selected elements search
	$("#example_filter label").each( function ( i ) {

		if (i == 0) {
			return;
		}

		i = (i == 1) ? 2 : 1;

		this.innerHTML = fnCreateSelect( oTable.fnGetColumnData(i), i );
		$('select', this).change( function () {
			oTable.fnFilter( $(this).val(), i );
		} );
		
		$("select").css("width", "130");

	});

	$.extend( $.fn.dataTableExt.oStdClasses, {
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
	$.fn.dataTableExt.oApi.fnGetColumnData = function ( oSettings, iColumn, bUnique, bFiltered, bIgnoreEmpty ) {
		// check that we have a column id
		if ( typeof iColumn == "undefined" ) return new Array();
	
		// by default we only wany unique data
		if ( typeof bUnique == "undefined" ) bUnique = true;
	
		// by default we do want to only look at filtered data
		if ( typeof bFiltered == "undefined" ) bFiltered = true;
	
		// by default we do not wany to include empty values
		if ( typeof bIgnoreEmpty == "undefined" ) bIgnoreEmpty = true;
	
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

	var option_name = (num == 1) ? 'City' : 'Country';

	var r = '<select><option value="">'+option_name+'</option>', i, iLen=aData.length;
	
	for ( i = 0 ; i < iLen ; i++ ) {
		r += '<option value="'+aData[i]+'">'+aData[i]+'</option>';
	}

	return r+'</select>';
}

/**
 * fnFormatDetails This function formating function for row details
 *
 * @param {object} oTable	This is clients table object
 * @param {object} nTr		This is view object
 * @param {int} view_id		This is id of view client
 * @memberOf JavaScript function
 */
function fnFormatDetails( oTable, nTr, view_id ) {

	var aData = oTable.fnGetData( nTr );

	var sOut = $("#view_content_"+view_id).html();

	return sOut;
}