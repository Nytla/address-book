//DataTables is a plug-in for the jQuery Javascript library. - http://datatables.net/

/*
 * Function: fnGetColumnData
 * Purpose:  Return an array of table values from a particular column.
 * Returns:  array string: 1d data array 
 * Inputs:   object:oSettings - dataTable settings object. This is always the last argument past to the function
 *           int:iColumn - the id of the column to extract the data from
 *           bool:bUnique - optional - if set to false duplicated values are not filtered out
 *           bool:bFiltered - optional - if set to false all the table data is used (not only the filtered)
 *           bool:bIgnoreEmpty - optional - if set to false empty values are not filtered from the result array
 * Author:   Benedikt Forchhammer <b.forchhammer /AT\ mind2.de>
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


function fnCreateSelect( aData, num )
{
	var option_name = (num == 2) ? 'Country' : 'City';

	var r='<select><option value="">'+option_name+'</option>', i, iLen=aData.length;
	for ( i=0 ; i<iLen ; i++ )
	{
		r += '<option value="'+aData[i]+'">'+aData[i]+'</option>';
	}
	return r+'</select>';
}

/**
 * Formed Book list page 
 */
$(document).ready(function() {

	//Create Book list table
	var oTable = $('#example').dataTable({
		//"aaSorting": [[2, "asc"]],
		//"bPaginate": false,
		//Limit ALL - "aLengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
		//Position elements - "sDom": '<"top"i>rt<"bottom"flp><"clear">'


		"sDom": '<"top"if<"clear">>rt<"bottom"lp<"clear">>',
		"bJQueryUI": true,
		"sPaginationType": "full_numbers",
		"aoColumnDefs": [
			{ "bSortable": false, "aTargets": [ 4 ] }
		],
		"aLengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
	
	});

	//Create Country and City container search
	$("#example_filter").append('<label id="Country"></label>');
	
	$("#example_filter").append('<label id="city"></label>');

	$("#example_filter label input").css("width", "140");

	$("#example_filter label").css("float", "left");

	//Create Country and City selected elements search
	$("#example_filter label").each( function ( i ) {

		if (i == 0) {return;}

		i = (i == 1) ? 2 : 3;

		this.innerHTML = fnCreateSelect( oTable.fnGetColumnData(i), i );
		$('select', this).change( function () {
			oTable.fnFilter( $(this).val(), i );
		} );
		
		$("select").css("width", "130");
	});

	$.extend( $.fn.dataTableExt.oStdClasses, {
	    "sWrapper": "dataTables_wrapper form-inline"
	} );


/////////////////////////////////	
//	alert($.ajaxes());

	//console.log($.ajaxes());

	//console.log(oTable.dataTableSettings);
/*
	$("#example_length label select").change(function(){

		var testing = $("#example_length label select").val();

		//alert(testing);

		if (testing == -1) {
			alert('Yes');
			
			oTable.bPaginate = false;
		}
	});
*/


	$(document).on("click", "#example tbody td #edit", function() {
		
		var edit_id = $(this).attr('name');

		alert(edit_id);

		//$(this).parent().parent().remove();

/*
		$("#example").dataTable({
			"bProcessing": true,
			"bServerSide": true,
			"sAjaxSource": "../examples_support/server_processing.php",
			"fnServerData": function ( sSource, aoData, fnCallback ) {
				//Add some extra data to the sender
				aoData.push( { "name": "more_data", "value": "my_value" } );
				$.getJSON( sSource, aoData, function (json) { 
					//Do whatever additional processing you want on the callback, then tell DataTables
					fnCallback(json);
				} );
			},
		} );
*/		
		
		
	
	


	});

});



/**
 * Ajaxes function for our book
 */
(function($) {
	$.ajaxes = function() {

		var data;

		$.ajax({
			type: "POST",
			dataType: "json",
			url: "./application/ajax/cities_formed.php",			
			cache: false,
			async: false,
			data: {},
			complete: function() {
				//Hide preloader image
				//$('#preloader').fadeOut('slow', function() {});
			},
			success: function(object) {
				data = object;
			}

		});

	return data;

	}


})(jQuery);



/**
 * Parse hash from url
 */
(function($){
	$.parseHash = function() {

		//Get the URI and remove the hash
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
