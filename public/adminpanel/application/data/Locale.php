<?php
/**
 * Adress Book Locale
 * 
 * Locale.php
 *
 * This is locale for admin panel
 * 
 * @category	data
 * @copyright	2012
 * @author	Igor Zhabskiy <Zhabskiy.Igor@googlemail.com>
 */

/**
 * Locale
 * 
 * This is class of locale 
 * 
 * @version 0.1
 */
class Locale {

	/**
	 * languageEng
	 *
	 * This is english locale
	 *
	 * @param string $option	This is first parameter for array
	 * @param string $flag		This is second parameter for array
	 *
	 * @return string $data		This is word of a given parameter
	 */
	static public function languageEng($option, $flag) {

		$data = array(
			"site"		=> array(

				"name"			=> 'Address Book',
				"title"			=> 'Address Book'

			),

			"http_status"	=> array(

				"100"			=> "HTTP/1.1 100 Continue",
				"101"			=> "HTTP/1.1 101 Switching Protocols",
				"200"			=> "HTTP/1.1 200 OK",
				"201"			=> "HTTP/1.1 201 Created",
				"202"			=> "HTTP/1.1 202 Accepted",
				"203"			=> "HTTP/1.1 203 Non-Authoritative Information",
				"204"			=> "HTTP/1.1 204 No Content",
				"205"			=> "HTTP/1.1 205 Reset Content",
				"206"			=> "HTTP/1.1 206 Partial Content",
				"300"			=> "HTTP/1.1 300 Multiple Choices",
				"301"			=> "HTTP/1.1 301 Moved Permanently",
				"302"			=> "HTTP/1.1 302 Found",
				"303"			=> "HTTP/1.1 303 See Other",
				"304"			=> "HTTP/1.1 304 Not Modified",
				"305"			=> "HTTP/1.1 305 Use Proxy",
				"307"			=> "HTTP/1.1 307 Temporary Redirect",
				"400"			=> "HTTP/1.1 400 Bad Request",
				"401"			=> "HTTP/1.1 401 Unauthorized",
				"402"			=> "HTTP/1.1 402 Payment Required",
				"403"			=> "HTTP/1.1 403 Forbidden",
				"404"			=> "HTTP/1.1 404 Not Found",
				"405"			=> "HTTP/1.1 405 Method Not Allowed",
				"406"			=> "HTTP/1.1 406 Not Acceptable",
				"407"			=> "HTTP/1.1 407 Proxy Authentication Required",
				"408"			=> "HTTP/1.1 408 Request Time-out",
				"409"			=> "HTTP/1.1 409 Conflict",
				"410"			=> "HTTP/1.1 410 Gone",
				"411"			=> "HTTP/1.1 411 Length Required",
				"412"			=> "HTTP/1.1 412 Precondition Failed",
				"413"			=> "HTTP/1.1 413 Request Entity Too Large",
				"414"			=> "HTTP/1.1 414 Request-URI Too Large",
				"415"			=> "HTTP/1.1 415 Unsupported Media Type",
				"416"			=> "HTTP/1.1 416 Requested range not satisfiable",
				"417"			=> "HTTP/1.1 417 Expectation Failed",
				"500"			=> "HTTP/1.1 500 Internal Server Error",
				"501"			=> "HTTP/1.1 501 Not Implemented",
				"502"			=> "HTTP/1.1 502 Bad Gateway",
				"503"			=> "HTTP/1.1 503 Service Unavailable",
				"504"			=> "HTTP/1.1 504 Gateway Time-out",
				"bad_connect"		=> 'Could connect to the Data Base.',
				"unknown_error"		=> 'Error occurred reasons unknown to us.',
				"bad_connect"		=> 'Could connect to the Data Base.'

			),

			"errors"	=> array(
				"title"			=> 'Address Book Error Page',
				"page_error"		=> 'This is page error.',
				"unknown_error"		=> 'Error occurred reasons unknown to us.',
				"bad_connect"		=> 'Could connect to the Data Base.',
				"400"			=> 'Error 400 Bad Request.',
				"401"			=> 'Error 401 Authorization Required.',
				"402"			=> 'Error 402 Payment Required.',
				"403"			=> 'Error 403 Forbidden.',
				"404"			=> 'Error 404 Page Not Found.',
				"500"			=> 'Error 500 Internal Server Error.',
				"502"			=> 'Error 502 Bad Gateway.'

			),

			"script"	=> array(

				"error"			=> 'CSS or JavaScript flag not found!'

			),

			"noscript"	=> array(

				"message"		=> 'Your browser does not support JavaScript!'

			),

			"authorization" => array(

				"title"			=> 'Admin: Login',				
				"auth"			=> 'Authorization',
				"login"			=> 'Login:',
				"password"		=> 'Password:',
				"login_button"		=> 'Login',
				"error_incorect"	=> 'Login or password is incorrect!',
				"error_empty"		=> 'Login or password is empty!'

			),

			"layout"	=> array(

				"title"			=> 'Admin: Page Layout',
				"log_out"		=> 'Log Out',
				"add_admin"		=> 'Add New Admin',
				"content"		=> 'Page layout content.'

			),

			"add_admin"	=> array(

				"title"			=> 'Admin: Add New Administrator',
				"layout"		=> 'Page Layout',
				"content"		=> 'Add New Administrator',
				"confirm_password"	=> 'Confirm password:',
				"save"			=> 'Save',	
				"error_empty_login"	=> 'Please enter a login!',
				"error_empty_pass"	=> 'Please enter a password!',
				"error_empty_pass_conf"	=> 'Please enter a confirm password!',
				"error_incorect_login"	=> 'Login must consist of English letters!',
				"error_incorect_pass"	=> 'Password must consist of English letters and digits!',
				"error_min_length_login"=> 'Your login must be at least 5 characters long!',
				"error_min_length_pass"	=> 'Your password must be at least 5 characters long!',
				"error_max_length_login"=> 'Your login should contain no more than 16 characters!',
				"error_max_length_pass"	=> 'Your password should contain no more than 16 characters!',
				"error_confirm"		=> 'Please enter the same password as above!',
				"error_exists"		=> 'Adminitsrator with this login already exists!',
				"add_good_message"	=> 'The new administrator has been added to the database.'

			),

			"book_list"	=> array(

				"title"			=> 'Admin: Adress Book List',
				"search_word"		=> 'Search',
				"keywords_word"		=> "Keywords",
				"country_word"		=> "Country",
				"city_word"		=> "City",
				"empty_option"		=> '::ALL::',
				"add_new_record"	=> 'Add New Record',
				"back_to_page_layout"	=> 'Back to the Page Layout',
				"preloader_alt_text"	=> 'Loading...',
				"record_edit"		=> 'Edit',
				"record_delete"		=> 'Delete'

			),

			"search"	=> array(

				"error_message_one"	=> 'Your search <strong>"',
				"error_message_two"	=> '"</strong> did not match any client.'

			),

			"add_new_record"=> array(

				"title"			=> 'Admin: Add New Record',
				"page_name"		=> 'Add New Record',
				"first_name"		=> 'First Name:',
				"last_name"		=> 'Last Name:',
				"email"			=> 'Email:',
				"country"		=> 'Country:',
				"city"			=> 'City:',
				"photo"			=> 'Photo:',
				"thumbnail_photo"	=> 'Thumbnail photo',
				"preview"		=> 'Preview',
				"notes"			=> 'Notes:',
				"reset"			=> 'Reset',
				"back_to_book_list"	=> 'Back to the Address Book',
				"error_required_f_n"	=> 'First Name is required!',
				"error_min_length_f_n"	=> 'First Name must be at least 5 characters long!',
				"error_max_length_f_n"	=> 'First Name should contain no more than 16 characters!',
				"error_required_l_n"	=> "Last Name is required!",
				"error_min_length_l_n"	=> 'Last Name must be at least 5 characters long!',
				"error_max_length_l_n"	=> 'Last Name should contain no more than 16 characters!',
				"error_required_email"	=> 'Email address is required!',
				"error_min_length_email"=> 'Email address must be at least 5 characters long!',
				"error_max_length_email"=> 'Email address should contain no more than 16 characters!',
				"error_incorect_email"	=> 'Please enter a valid email address!',
				"error_empty_country"	=> 'Country is required!',
				"error_empty_city"	=> 'City is required!',
				"error_upload_photo"	=> 'Please upload your photo!',
				"error_image_size"	=> 'File is larger than 1 Mb!',
				"error_image_extension"	=> 'The downloaded image is not supported!',
				"add_good_message"	=> 'The new client has been added to the database.'

			),

			"edit_record"	=> array(

				"title"			=> 'Admin: Edit Record',
				"edit_good_message"	=> 'Client data successfully changed.',
				"edit_bad_message"	=> 'Customer data were not recorded due to technical reasons.'

			)





		);

		return $data[$option][$flag];
	}
}
?>
