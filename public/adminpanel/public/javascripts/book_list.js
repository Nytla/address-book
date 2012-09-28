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

/**
 * Create selected element Country and City 
 */
function fnCreateSelect(aData, num) {
	var option_name = (num == 3) ? 'Country' : 'City';

	var r='<select><option value="">'+option_name+'</option>', i, iLen=aData.length;
	for ( i=0 ; i<iLen ; i++ )
	{
		r += '<option value="'+aData[i]+'">'+aData[i]+'</option>';
	}
	return r+'</select>';
}




//#####################

/* Formating function for row details */
function fnFormatDetails ( oTable, nTr )
{
    var aData = oTable.fnGetData( nTr );
    var sOut = '<table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;">';
/*
    sOut += '<tr><td>Rendering engine:</td><td>'+aData[1]+' '+aData[4]+'</td></tr>';
    sOut += '<tr><td>Link to source:</td><td>Could provide a link here</td></tr>';
    sOut += '<tr><td>Extra info:</td><td>And any further details here (images etc)</td></tr>';
*/
//http://datatables.net/release-datatables/examples/api/row_details.html
	sOut += '<div>';
	sOut += '<img src="http://www.intuit.ru/department/school/hypermediachem/0/00_06.jpg" width="300" height="300" alt="Test" style="float: left;">';
	sOut += 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.';
	sOut += '</div>';

    sOut += '</table>';
     
    return sOut;
}

//####################



/**
 * Formed Book list page 
 */
$(document).ready(function() {


//#####################


    /*
     * Insert a 'details' column to the table
     */
    var nCloneTh = document.createElement( 'th' );
    var nCloneTd = document.createElement( 'td' );
    nCloneTd.innerHTML = '<img src="http://datatables.net/release-datatables/examples/examples_support/details_open.png">';
    nCloneTd.className = "center";
     
    $('#example thead tr').each( function () {
        this.insertBefore( nCloneTh, this.childNodes[0] );
    } );
     
    $('#example tbody tr').each( function () {
        this.insertBefore(  nCloneTd.cloneNode( true ), this.childNodes[0] );
    } );
     
/* Add event listener for opening and closing details
     * Note that the indicator for showing which row is open is not controlled by DataTables,
     * rather it is done here
     */
    $('#example tbody td img').live('click', function () {
        var nTr = $(this).parents('tr')[0];
        if ( oTable.fnIsOpen(nTr) )
        {
            /* This row is already open - close it */
            this.src = "http://datatables.net/release-datatables/examples/examples_support/details_open.png";
            oTable.fnClose( nTr );
        }
        else
        {
            /* Open this row */
            this.src = "http://datatables.net/release-datatables/examples/examples_support/details_close.png";
            oTable.fnOpen( nTr, fnFormatDetails(oTable, nTr), 'details' );
        }
    } );




//#####################


	//Create Book list table
	var oTable = $('#example').dataTable({
		"sDom": '<"top"if<"clear">>rt<"bottom"lp<"clear">>',
		"bJQueryUI": true,
		"sPaginationType": "full_numbers",
		"aaSorting": [[ 1, "asc" ]],
		"aoColumnDefs": [
			{ "bSortable": false, "aTargets": [ 0,5 ] }
		],
		"aLengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],


	});


	//Set background color for our thead
	//$("#example thead tr th").css("background-color", "#C3D9FF");

/*
var obj_content = {
  "aaData": [
    {
      "engine": "Trident",
      "browser": "Internet Explorer 4.0",
      "platform": "Win 95+",
      "version": "4",
      "grade": "X"
    },
    {
      "engine": "Trident",
      "browser": "Internet Explorer 5.0",
      "platform": "Win 95+",
      "version": "5",
      "grade": "C"
    },
    {
      "engine": "Trident",
      "browser": "Internet Explorer 5.5",
      "platform": "Win 95+",
      "version": "5.5",
      "grade": "A"
    },
    {
      "engine": "Trident",
      "browser": "Internet Explorer 6",
      "platform": "Win 98+",
      "version": "6",
      "grade": "A"
    },
    {
      "engine": "Trident",
      "browser": "Internet Explorer 7",
      "platform": "Win XP SP2+",
      "version": "7",
      "grade": "A"
    },
    {
      "engine": "Trident",
      "browser": "AOL browser (AOL desktop)",
      "platform": "Win XP",
      "version": "6",
      "grade": "A"
    },
    {
      "engine": "Gecko",
      "browser": "Firefox 1.0",
      "platform": "Win 98+ / OSX.2+",
      "version": "1.7",
      "grade": "A"
    },
    {
      "engine": "Gecko",
      "browser": "Firefox 1.5",
      "platform": "Win 98+ / OSX.2+",
      "version": "1.8",
      "grade": "A"
    },
    {
      "engine": "Gecko",
      "browser": "Firefox 2.0",
      "platform": "Win 98+ / OSX.2+",
      "version": "1.8",
      "grade": "A"
    },
    {
      "engine": "Gecko",
      "browser": "Firefox 3.0",
      "platform": "Win 2k+ / OSX.3+",
      "version": "1.9",
      "grade": "A"
    },
    {
      "engine": "Gecko",
      "browser": "Camino 1.0",
      "platform": "OSX.2+",
      "version": "1.8",
      "grade": "A"
    },
    {
      "engine": "Gecko",
      "browser": "Camino 1.5",
      "platform": "OSX.3+",
      "version": "1.8",
      "grade": "A"
    },
    {
      "engine": "Gecko",
      "browser": "Netscape 7.2",
      "platform": "Win 95+ / Mac OS 8.6-9.2",
      "version": "1.7",
      "grade": "A"
    },
    {
      "engine": "Gecko",
      "browser": "Netscape Browser 8",
      "platform": "Win 98SE+",
      "version": "1.7",
      "grade": "A"
    },
    {
      "engine": "Gecko",
      "browser": "Netscape Navigator 9",
      "platform": "Win 98+ / OSX.2+",
      "version": "1.8",
      "grade": "A"
    },
    {
      "engine": "Gecko",
      "browser": "Mozilla 1.0",
      "platform": "Win 95+ / OSX.1+",
      "version": "1",
      "grade": "A"
    },
    {
      "engine": "Gecko",
      "browser": "Mozilla 1.1",
      "platform": "Win 95+ / OSX.1+",
      "version": "1.1",
      "grade": "A"
    },
    {
      "engine": "Gecko",
      "browser": "Mozilla 1.2",
      "platform": "Win 95+ / OSX.1+",
      "version": "1.2",
      "grade": "A"
    },
    {
      "engine": "Gecko",
      "browser": "Mozilla 1.3",
      "platform": "Win 95+ / OSX.1+",
      "version": "1.3",
      "grade": "A"
    },
    {
      "engine": "Gecko",
      "browser": "Mozilla 1.4",
      "platform": "Win 95+ / OSX.1+",
      "version": "1.4",
      "grade": "A"
    },
    {
      "engine": "Gecko",
      "browser": "Mozilla 1.5",
      "platform": "Win 95+ / OSX.1+",
      "version": "1.5",
      "grade": "A"
    },
    {
      "engine": "Gecko",
      "browser": "Mozilla 1.6",
      "platform": "Win 95+ / OSX.1+",
      "version": "1.6",
      "grade": "A"
    },
    {
      "engine": "Gecko",
      "browser": "Mozilla 1.7",
      "platform": "Win 98+ / OSX.1+",
      "version": "1.7",
      "grade": "A"
    },
    {
      "engine": "Gecko",
      "browser": "Mozilla 1.8",
      "platform": "Win 98+ / OSX.1+",
      "version": "1.8",
      "grade": "A"
    },
    {
      "engine": "Gecko",
      "browser": "Seamonkey 1.1",
      "platform": "Win 98+ / OSX.2+",
      "version": "1.8",
      "grade": "A"
    },
    {
      "engine": "Gecko",
      "browser": "Epiphany 2.20",
      "platform": "Gnome",
      "version": "1.8",
      "grade": "A"
    },
    {
      "engine": "Webkit",
      "browser": "Safari 1.2",
      "platform": "OSX.3",
      "version": "125.5",
      "grade": "A"
    },
    {
      "engine": "Webkit",
      "browser": "Safari 1.3",
      "platform": "OSX.3",
      "version": "312.8",
      "grade": "A"
    },
    {
      "engine": "Webkit",
      "browser": "Safari 2.0",
      "platform": "OSX.4+",
      "version": "419.3",
      "grade": "A"
    },
    {
      "engine": "Webkit",
      "browser": "Safari 3.0",
      "platform": "OSX.4+",
      "version": "522.1",
      "grade": "A"
    },
    {
      "engine": "Webkit",
      "browser": "OmniWeb 5.5",
      "platform": "OSX.4+",
      "version": "420",
      "grade": "A"
    },
    {
      "engine": "Webkit",
      "browser": "iPod Touch / iPhone",
      "platform": "iPod",
      "version": "420.1",
      "grade": "A"
    },
    {
      "engine": "Webkit",
      "browser": "S60",
      "platform": "S60",
      "version": "413",
      "grade": "A"
    },
    {
      "engine": "Presto",
      "browser": "Opera 7.0",
      "platform": "Win 95+ / OSX.1+",
      "version": "-",
      "grade": "A"
    },
    {
      "engine": "Presto",
      "browser": "Opera 7.5",
      "platform": "Win 95+ / OSX.2+",
      "version": "-",
      "grade": "A"
    },
    {
      "engine": "Presto",
      "browser": "Opera 8.0",
      "platform": "Win 95+ / OSX.2+",
      "version": "-",
      "grade": "A"
    },
    {
      "engine": "Presto",
      "browser": "Opera 8.5",
      "platform": "Win 95+ / OSX.2+",
      "version": "-",
      "grade": "A"
    },
    {
      "engine": "Presto",
      "browser": "Opera 9.0",
      "platform": "Win 95+ / OSX.3+",
      "version": "-",
      "grade": "A"
    },
    {
      "engine": "Presto",
      "browser": "Opera 9.2",
      "platform": "Win 88+ / OSX.3+",
      "version": "-",
      "grade": "A"
    },
    {
      "engine": "Presto",
      "browser": "Opera 9.5",
      "platform": "Win 88+ / OSX.3+",
      "version": "-",
      "grade": "A"
    },
    {
      "engine": "Presto",
      "browser": "Opera for Wii",
      "platform": "Wii",
      "version": "-",
      "grade": "A"
    },
    {
      "engine": "Presto",
      "browser": "Nokia N800",
      "platform": "N800",
      "version": "-",
      "grade": "A"
    },
    {
      "engine": "Presto",
      "browser": "Nintendo DS browser",
      "platform": "Nintendo DS",
      "version": "8.5",
      "grade": "C/A<sup>1</sup>"
    },
    {
      "engine": "KHTML",
      "browser": "Konqureror 3.1",
      "platform": "KDE 3.1",
      "version": "3.1",
      "grade": "C"
    },
    {
      "engine": "KHTML",
      "browser": "Konqureror 3.3",
      "platform": "KDE 3.3",
      "version": "3.3",
      "grade": "A"
    },
    {
      "engine": "KHTML",
      "browser": "Konqureror 3.5",
      "platform": "KDE 3.5",
      "version": "3.5",
      "grade": "A"
    },
    {
      "engine": "Tasman",
      "browser": "Internet Explorer 4.5",
      "platform": "Mac OS 8-9",
      "version": "-",
      "grade": "X"
    },
    {
      "engine": "Tasman",
      "browser": "Internet Explorer 5.1",
      "platform": "Mac OS 7.6-9",
      "version": "1",
      "grade": "C"
    },
    {
      "engine": "Tasman",
      "browser": "Internet Explorer 5.2",
      "platform": "Mac OS 8-X",
      "version": "1",
      "grade": "C"
    },
    {
      "engine": "Misc",
      "browser": "NetFront 3.1",
      "platform": "Embedded devices",
      "version": "-",
      "grade": "C"
    },
    {
      "engine": "Misc",
      "browser": "NetFront 3.4",
      "platform": "Embedded devices",
      "version": "-",
      "grade": "A"
    },
    {
      "engine": "Misc",
      "browser": "Dillo 0.8",
      "platform": "Embedded devices",
      "version": "-",
      "grade": "X"
    },
    {
      "engine": "Misc",
      "browser": "Links",
      "platform": "Text only",
      "version": "-",
      "grade": "X"
    },
    {
      "engine": "Misc",
      "browser": "Lynx",
      "platform": "Text only",
      "version": "-",
      "grade": "X"
    },
    {
      "engine": "Misc",
      "browser": "IE Mobile",
      "platform": "Windows Mobile 6",
      "version": "-",
      "grade": "C"
    },
    {
      "engine": "Misc",
      "browser": "PSP browser",
      "platform": "PSP",
      "version": "-",
      "grade": "C"
    },
    {
      "engine": "Other browsers",
      "browser": "All others",
      "platform": "-",
      "version": "-",
      "grade": "U"
    }
  ]
};

var oTable = $('#example').dataTable({
	"bProcessing": true,
        "sAjaxSource": obj_content,//"sources/objects.txt",
        "aoColumns": [
            { "mData": "engine" },
            { "mData": "browser" },
            { "mData": "platform" },
            { "mData": "version" },
            { "mData": "grade" }
        ]
});
*/
	//Create Country and City container search
	$("#example_filter").append('<label id="Country"></label>');
	
	$("#example_filter").append('<label id="city"></label>');

	$("#example_filter label input").css("width", "140");

	$("#example_filter label").css("float", "left");

	//Create Country and City selected elements search
	$("#example_filter label").each( function ( i ) {

		if (i == 0 ) {
			return;
		}

		i = (i == 1) ? 3 : 4;

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
//	$(document).on("click", "#example tbody tr td #edit", function() {
		
	$(document).on("click", "#example tbody tr td #delete", function() {

		var delete_id = $(this).attr('name');

		if (confirm("Are you sure you wish to delete the record "+delete_id+"?")) {

			//oTable.fnDraw();

			//Create object for ajax request
			var object_options = {

				id: delete_id,
			};

			console.log(object_options);

			//Delete client from DB
			$.ajaxes(object_options, $(this).parent().parent());

		}
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
	$.ajaxes = function(object_options, dom_elements) {


		$.ajax({
			type: "POST",
			dataType: "json",
			url: "./application/ajax/delete_client.php",
			cache: true,
			async: false,
			data: object_options,
			complete: function() {
				//Hide preloader image
				//$('#preloader').fadeOut('slow', function() {});
			},
			success: function(object) {
	
				if (object.flag == true) {

					//Delete row from DOM
					dom_elements.addClass("hide");
				} else {
					alert("For technical reasons, no record has been deleted.");
				}
			}

		});




/*
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
*/



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
