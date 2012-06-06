<?php
/**
 * Adress Book
 * 
 * Locale.php
 *
 * This is locale for admin panel
 * 
 * @category	Main
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

				"name"		=> 'Address Book'

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
