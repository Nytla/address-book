<?php
//http://www.cyberciti.biz/faq/php-redirect/

//http://edoceo.com/creo/php-redirect

//http://www.seomoz.org/learn-seo/redirection
/**
 * Adress Book
 * 
 * Redirect.php
 *
 * This is redirect URI 
 * 
 * @category	Main
 * @copyright	2012
 * @author	Igor Zhabskiy <Zhabskiy.Igor@googlemail.com>
 */

/**
 * Redirect
 * 
 * This is administrator authorization class
 * 
 * @version 0.1
 */
class Redirect extends Templating {

	/**
	 * uriRedirect
	 *
	 * This function to redirect our user on page error
	 *
	 * @param	string $code	This is http status code
	 * @param	string $url	This is url where script redirect our user
	 */
	public function uriRedirect($code = 301, $url = 'error.php') {

		/**
		 * Formed http header
		 */
		$code = Locale::languageEng('http_status', $code);

		/**
		 * Formed url where make our redirect
		 */
		$uri = Config::dataArray('server', 'protocol').Config::dataArray('server', 'separator').Config::dataArray('server', 'slash').Config::dataArray('server', 'slash').Config::dataArray('server', 'name').Config::dataArray('server', 'slash').Config::dataArray('paths', 'adminpanel').$url;

		//echo $uri;

		//echo Config::dataArray('errors', 'page_error');

		/**
		 * Send http header
		 */
		//header($code);

		/**
		 * To do Redirect
		 */
		//header("Location: $uri");

		/**
		 * Exit in our script (The status 0 is used to terminate the program successfully.)
		 */
		//exit(0);
	}
}
?>
