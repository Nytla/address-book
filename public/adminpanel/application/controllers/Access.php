<?php
/**
 * Adress Book Controller
 * 
 * Access.php
 *
 * This is administrator acces file
 * 
 * @category	Main
 * @copyright	2012
 * @author	Igor Zhabskiy <Zhabskiy.Igor@googlemail.com>
 */

/**
 * Adress
 * 
 * This is administrator acces class
 * 
 * @version 0.1
 */
class Access extends Templating {

	/**
	 * makeAuth
	 *
	 * This function make authorization
	 *
	 * @return string $tempalate	This is source authorization tempalate
	 */
	public function httpRequested($flag = '') {

		try {
			$flag = $_SERVER['HTTP_X_REQUESTED_WITH'];

			echo Exceptions::catchExept($flag);

		} catch (Exception $e) {

			Redirect::uriRedirect(404);

		}
	}
}
?>
