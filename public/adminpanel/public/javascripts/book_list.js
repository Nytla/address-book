/**
 * Formed Book list page 
 */
$(document).ready(function() {

	//Create select list for our cities
	$("#country").change(function() {

		//Set object with our options (country id)
		var obj_options = {
			module:		'create_cities',
			file_name:	'cities_formed.php',
			data:		{ country_id: this.value }
		};

		//Get cities from DB
		$.ajaxes(obj_options);
	});

	//Search keywords, country and city in DB
	$("#searchForm").submit(function() {

		//Set search variables
		var keywords = $("#keywords").val();

		var country = $("#country").val();

		var city = $("#city").val();

		//Create client list with ajax
		if (keywords !== "" || country != 0 || city != 0) {

			//Set object options for ajax request
			var object_options_search = {
				module:		'search_clients',
				file_name:	'search_clients.php',
				data:		{ 
					keywords:	keywords,
					country_id:	country,
					city_id:	city
				}
			};

			$.ajaxes(object_options_search);

			//Set object options for function which formed uri hash
			var object_options_hash = {
				module:		'search', 
				keywords:	keywords,
				country_id:	country,
				city_id:	city
			};

			$.formHash(object_options_hash);
		}

		//Don't submit our search form
		return false;
	});




	//Pagination loading

	$("#pagination").click(function(){

//		alert('oopss');

		var object_hash = $.parseHash();

		//Set object options for function which formed uri hash
/*		var object_options_hash = {
			module:		'pagination', 
			keywords:	keywords,
			country_id:	country,
			city_id:	city,
			field:		'id',
			order:		'desc',
			page:		'2',
			limit:		'10'
		};

		$.formHash(object_options_hash);
*/
		
		//return false;

	});




});

/**
 * Ajaxes function for our book
 */
(function($) {
	$.ajaxes = function(object_options) {

		$.ajax({
			type: "POST",
			dataType: "json",
			url: "./application/ajax/"+object_options.file_name+"",
			cache: false,
			data: object_options.data,
			complete: function() {
				//Hide preloader image
				$('#preloader').fadeOut('slow', function() {});
			},
			success: function(object) {

				//Show preloader image
				$("#preloader").removeClass("hide").css("display", "block");
			
				//Make code depending on the module				
				switch(object_options.module) {

					//Create our cities select list
					case 'create_cities':

						//Set style for cities list
						$("#city").css("width", "150");

						//Delete all options element, but not first
						$("#city option").remove();

						$("#city").append(new Option('::ALL::', 0));

						//Create options element for sity list
						$.each(object.cities, function(index, value) {

							$("#city").append(new Option(value, index));
						});

					break;

					//Create client list
					case 'search_clients':

						if (object.flag == false) {

							//Hide clients table
							$("#clients").addClass("hide");

							//Show search error message
							$("#search_error").removeClass("hide");

							//Insert message in our block
							$("#search_error h3").html(object.error_search_message);

						} else {

							//Show our clients table
							$("#clients").removeClass("hide");

							//Hide search error message
							$("#search_error").addClass("hide");

							//Delete client from table
							$("#content_clients tr").remove();

							//Create client table
							$.each(object.clients, function(index, value) {

								//Create clients table 
								$("#clients:last").append("<tr><td class=\"prepend-3\">"+value.id+"</td><td>"+value.full_name+ "</td><td>"+value.countryname_en+"</td><<td>"+value.cityname_en+"</td><td><a href=\"#edit="+value.id+"\">Edit</a> | <a href=\"#delete="+value.id+"\">Delete</a></td></tr><tr></tr>");

							});
						}
					break;

				}
			}
		});
	}
})(jQuery);

/**
 * Formed URL hash
 */
(function($) {
//	$.formHash = function(keywords, country, city) {

	$.formHash = function(object_options) {

		//Set variables for hash
/*		var keywords = (keywords) ? keywords : "";

		var country = (country) ? country : "";

		var city = (city) ? city : "";
*/

		//Set variable for url hash
		switch (object_options.module) {

			//Search
			case ("search"):

				var hash = '#keywords=' + object_options.keywords + '&country=' + object_options.country_id + '&city=' + object_options.city_id;

			break;

			//Pagination
			case ("pagination"):

				var hash = '#keywords=' + object_options.keywords + '&country=' + object_options.country_id + '&city=' + object_options.city_id + '&field=' + object_options.field + '&order=' + object_options.order + '&page=' + object_options.page + '&limit=' + object_options.limit;

			break;
		}

		//Set hash
		$(location).attr("hash", hash);

	}
})(jQuery);

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

/*
(function($) {
	$.formHash = function(keywords, country, city, field, order, page, limit) {

		//Set variables for hash
		var keywords = (keywords) ? keywords : '';

		var country = (country) ? country : '';

		var city = (city) ? city : '';

		var field = (field) ? field : '';

		var order = (order) ? order : '';

		var page = (page) ? page : '';

		var limit = (limit) ? limit : '';

		//Set variable for url hash
		var hash = '#keywords=' + keywords + '&country=' + country + '&city=' + city + '&field=' + field + '&order=' + order + '&page=' + page + '&limit=' + limit;

		$(location).attr("hash", hash);

		console.log($(location).attr('hash'));

	}
})(jQuery);
*/
