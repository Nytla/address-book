<?php
/**
 * Adress Book
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
	public function languageEng($option, $flag) {

		$data = array(
			"site"		=> array(

				"name"		=> 'Address Book',
				"title"		=> 'Address Book'

			),

			"http_status"	=> array(

				"100" => "HTTP/1.1 100 Continue",
				"101" => "HTTP/1.1 101 Switching Protocols",
				"200" => "HTTP/1.1 200 OK",
				"201" => "HTTP/1.1 201 Created",
				"202" => "HTTP/1.1 202 Accepted",
				"203" => "HTTP/1.1 203 Non-Authoritative Information",
				"204" => "HTTP/1.1 204 No Content",
				"205" => "HTTP/1.1 205 Reset Content",
				"206" => "HTTP/1.1 206 Partial Content",
				"300" => "HTTP/1.1 300 Multiple Choices",
				"301" => "HTTP/1.1 301 Moved Permanently",
				"302" => "HTTP/1.1 302 Found",
				"303" => "HTTP/1.1 303 See Other",
				"304" => "HTTP/1.1 304 Not Modified",
				"305" => "HTTP/1.1 305 Use Proxy",
				"307" => "HTTP/1.1 307 Temporary Redirect",
				"400" => "HTTP/1.1 400 Bad Request",
				"401" => "HTTP/1.1 401 Unauthorized",
				"402" => "HTTP/1.1 402 Payment Required",
				"403" => "HTTP/1.1 403 Forbidden",
				"404" => "HTTP/1.1 404 Not Found",
				"405" => "HTTP/1.1 405 Method Not Allowed",
				"406" => "HTTP/1.1 406 Not Acceptable",
				"407" => "HTTP/1.1 407 Proxy Authentication Required",
				"408" => "HTTP/1.1 408 Request Time-out",
				"409" => "HTTP/1.1 409 Conflict",
				"410" => "HTTP/1.1 410 Gone",
				"411" => "HTTP/1.1 411 Length Required",
				"412" => "HTTP/1.1 412 Precondition Failed",
				"413" => "HTTP/1.1 413 Request Entity Too Large",
				"414" => "HTTP/1.1 414 Request-URI Too Large",
				"415" => "HTTP/1.1 415 Unsupported Media Type",
				"416" => "HTTP/1.1 416 Requested range not satisfiable",
				"417" => "HTTP/1.1 417 Expectation Failed",
				"500" => "HTTP/1.1 500 Internal Server Error",
				"501" => "HTTP/1.1 501 Not Implemented",
				"502" => "HTTP/1.1 502 Bad Gateway",
				"503" => "HTTP/1.1 503 Service Unavailable",
				"504" => "HTTP/1.1 504 Gateway Time-out"

			),

			"errors"	=> array(
				"page_error"	=> 'This is page error.',
				"99"		=> 'Error occurred reasons unknown to us.',
				"400"		=> 'Error 400 Bad Request.',
				"401"		=> 'Error 401 Authorization Required.',
				"402"		=> 'Error 402 Payment Required.',
				"403"		=> 'Error 403 Forbidden.',
				"404"		=> 'Error 404 Page Not Found.',
				"500"		=> 'Error 500 Internal Server Error.',
				"502"		=> 'Error 502 Bad Gateway.'
			),

			"script"	=> array(

				"error"		=> 'CSS or JavaScript flag not found!'

			),

			"noscript"	=> array(

				"message"	=> 'Your browser does not support JavaScript!'

			),

			"authorization" => array(
				
				"auth"			=> 'Authorization',
				"login"			=> 'Login',
				"password"		=> 'Password',
				"error_incorect"	=> 'Login or password is incorrect!',
				"error_empty"		=> 'Login or password is empty!'

			)

		);

		return $data[$option][$flag];
	}
}
?>
