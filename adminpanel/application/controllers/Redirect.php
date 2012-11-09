<?php
/**
 * Adress Book Controller
 * 
 * Redirect.php
 *
 * This is redirect URI 
 * 
 * @category	controllers
 * @copyright	2012
 * @author	Igor Zhabskiy <Zhabskiy.Igor@googlemail.com>
 */

/**
 * Redirect
 * 
 * This is administrator redirect class
 * 
 * @version 0.1
 */
final class Redirect {

	/**
	 * uriRedirect
	 *
	 * This function to redirect our user on page error
	 *
	 * @param integer $code	This is http status code
	 * @param string $url	This is url where script redirect our user
	 */
	static public function uriRedirect($code = 301, $url = 'error.php') {

		/**
		 * Formed http header
		 */
		$code_text = Locale::languageEng('http_status', $code);

		/**
		 * Formed url where make our redirect
		 */
		if ($code == 301) {

			$uri = Config::dataArray('server', 'protocol').Config::dataArray('server', 'separator').Config::dataArray('server', 'slash').Config::dataArray('server', 'slash').Config::dataArray('server', 'name').Config::dataArray('server', 'slash').Config::dataArray('paths', 'adminpanel').$url;
		} else {

			$uri = Config::dataArray('server', 'protocol').Config::dataArray('server', 'separator').Config::dataArray('server', 'slash').Config::dataArray('server', 'slash').Config::dataArray('server', 'name').Config::dataArray('server', 'slash').Config::dataArray('paths', 'adminpanel').$url.'?error='.$code;
		}

		/**
		 * Send http header
		 */
		header(true, $code);

		/**
		 * To do Redirect
		 */
		header("Location: $uri");

		/**
		 * Exit in our script (The status 0 is used to terminate the program successfully.)
		 */
		exit(0);
	}
}
?>
