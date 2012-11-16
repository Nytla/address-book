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
final class Locale {

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

		/**
		 * Create array with our data
		 */
		$data = array(
			"site"		=> array(

				"name"			=> 'Address Book',
				"title"			=> 'Welcome to Address Book',
				"year"			=> 2012

			),

			"http_status"	=> array(

				"title"			=> 'Address Book Error Page',
				"page_error"		=> 'This is page error.',
				"bad_connect"		=> 'Could connect to the Data Base.',
				"99"			=> 'Error occurred reasons unknown to us.',
				"100"			=> 'HTTP/1.1 100 Continue',
				"101"			=> 'HTTP/1.1 101 Switching Protocols',
				"102"			=> 'HTTP/1.1 102 Processing',
				"200"			=> 'HTTP/1.1 200 OK',
				"201"			=> 'HTTP/1.1 201 Created',
				"202"			=> 'HTTP/1.1 202 Accepted',
				"203"			=> 'HTTP/1.1 203 Non-Authoritative Information',
				"204"			=> 'HTTP/1.1 204 No Content',
				"205"			=> 'HTTP/1.1 205 Reset Content',
				"206"			=> 'HTTP/1.1 206 Partial Content',
				"207"			=> 'HTTP/1.1 207 Multi-Status',
				"300"			=> 'HTTP/1.1 300 Multiple Choices',
				"301"			=> 'HTTP/1.1 301 Moved Permanently',
				"302"			=> 'HTTP/1.1 302 Found',
				"303"			=> 'HTTP/1.1 303 See Other',
				"304"			=> 'HTTP/1.1 304 Not Modified',
				"305"			=> 'HTTP/1.1 305 Use Proxy',
				"307"			=> 'HTTP/1.1 307 Temporary Redirect',
				"400"			=> 'HTTP/1.1 400 Bad Request',
				"401"			=> 'HTTP/1.1 401 Unauthorized',
				"402"			=> 'HTTP/1.1 402 Payment Required',
				"403"			=> 'HTTP/1.1 403 Forbidden',
				"404"			=> 'HTTP/1.1 404 Not Found',
				"405"			=> 'HTTP/1.1 405 Method Not Allowed',
				"406"			=> 'HTTP/1.1 406 Not Acceptable',
				"407"			=> 'HTTP/1.1 407 Proxy Authentication Required',
				"408"			=> 'HTTP/1.1 408 Request Time-out',
				"409"			=> 'HTTP/1.1 409 Conflict',
				"410"			=> 'HTTP/1.1 410 Gone',
				"411"			=> 'HTTP/1.1 411 Length Required',
				"412"			=> 'HTTP/1.1 412 Precondition Failed',
				"413"			=> 'HTTP/1.1 413 Request Entity Too Large',
				"414"			=> 'HTTP/1.1 414 Request-URI Too Large',
				"415"			=> 'HTTP/1.1 415 Unsupported Media Type',
				"416"			=> 'HTTP/1.1 416 Requested range not satisfiable',
				"417"			=> 'HTTP/1.1 417 Expectation Failed',
				"422"			=> 'HTTP/1.1 422 Unprocessable Entity',
				"423"			=> 'HTTP/1.1 423 Locked',
				"424"			=> 'HTTP/1.1 424 Failed Dependency',
				"425"			=> 'HTTP/1.1 425 Unordered Collection',
				"426"			=> 'HTTP/1.1 425 Upgrade Required',
				"500"			=> 'HTTP/1.1 500 Internal Server Error',
				"501"			=> 'HTTP/1.1 501 Not Implemented',
				"502"			=> 'HTTP/1.1 502 Bad Gateway',
				"503"			=> 'HTTP/1.1 503 Service Unavailable',
				"504"			=> 'HTTP/1.1 504 Gateway Time-out',
				"505"			=> 'HTTP/1.1 505 HTTP Version Not Supported',
				"506"			=> 'HTTP/1.1 506 Variant Also Negotiates',
				"507"			=> 'HTTP/1.1 507 Insufficient Storage',
				"508"			=> 'HTTP/1.1 508 Loop Detected',
				"509"			=> 'HTTP/1.1 509 Bandwidth Limit Exceeded',
				"510"			=> 'HTTP/1.1 510 Not Extended'

			),

			"script"	=> array(

				"error"			=> 'CSS or JavaScript flag not found!'

			),

			"noscript"	=> array(

				"message"		=> 'Your browser does not support JavaScript or JavaScript has been disabled!'

			),

			"authorization" => array(

				"title"			=> 'Admin: Login',				
				"auth"			=> 'Authorization',
				"login"			=> 'Login:',
				"password"		=> 'Password:',
				"login_button"		=> 'Login',
				"error_incorect"	=> 'Login or password is incorrect.',
				"error_empty"		=> 'Login or password is empty.',
				"error_capcha"		=> 'You did not validate captcha.'

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
				"add_new_client"	=> 'Add New Client',
				"preloader_alt_text"	=> 'Loading...',
				"back_to_page_layout"	=> 'Back to the Page Layout',
				"details_open"		=> 'Details open',
				"details_close"		=> 'Details close',
				"client_edit"		=> 'Edit',
				"client_delete"		=> 'Delete',
				"no_photo"		=> 'No photo available.',
				"no_notes"		=> 'No information available.'

			),

			"user_book_list"=> array(

				"title"			=> 'Adress Book List',

			),

			"add_new_client"=> array(

				"title"			=> 'Admin: Add New Client',
				"page_name"		=> 'Add New Client',
				"first_name"		=> 'First Name:',
				"last_name"		=> 'Last Name:',
				"email"			=> 'Email:',
				"country"		=> 'Country:',
				"city"			=> 'City:',
				"photo"			=> 'Photo:',
				"preloader_alt_text"	=> 'Loading...',
				"thumbnail_photo"	=> 'Thumbnail photo',
				"preview"		=> 'Preview',
				"notes"			=> 'Notes:',
				"reset"			=> 'Reset',
				"back_to_book_list"	=> 'Back to the Address Book',
				"error_required_f_n"	=> 'First Name is required!',
				"error_min_length_f_n"	=> 'First Name must be at least 2 characters long!',
				"error_max_length_f_n"	=> 'First Name should contain no more than 16 characters!',
				"error_eng_letters_f_n" => 'First Name must consist of English letters!',
				"error_required_l_n"	=> "Last Name is required!",
				"error_min_length_l_n"	=> 'Last Name must be at least 2 characters long!',
				"error_max_length_l_n"	=> 'Last Name should contain no more than 16 characters!',
				"error_eng_letters_l_n" => 'Last Name must consist of English letters!',
				"error_required_email"	=> 'Email address is required!',
				"error_min_length_email"=> 'Email address must be at least 5 characters long!',
				"error_max_length_email"=> 'Email address should contain no more than 16 characters!',
				"error_incorect_email"	=> 'Please enter a valid email address!',
				"error_empty_country"	=> 'Country is required!',
				"error_empty_city"	=> 'City is required!',
				"error_upload_photo"	=> 'Please upload your photo!',
				"error_image_size"	=> 'File is larger than 1 Mb!',
				"error_image_extension"	=> 'The downloaded image is not supported!',
				"error_image_resize"	=> 'Image resize error (maybe file is small).',
				"mess_max_length_notes" => '(1500 characters max.)',
				"add_good_message"	=> 'The new client has been added to the database.'

			),

			"edit_client"	=> array(

				"title"			=> 'Admin: Edit Client',
				"edit_good_message"	=> 'Client data successfully changed.',
				"edit_bad_message"	=> 'Customer data were not recorded due to technical reasons.',
				"edit_bad_client"	=> 'These clients can not be found.'

			)
		);

		/**
		 * Return our data
		 */
		return $data[$option][$flag];
	}
}
?>
