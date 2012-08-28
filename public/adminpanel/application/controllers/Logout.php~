<?php
/**
 * Adress Book Controller
 * 
 * Logout.php
 *
 * This is administrator logout file
 * 
 * @category	controllers
 * @copyright	2012
 * @author	Igor Zhabskiy <Zhabskiy.Igor@googlemail.com>
 */

/**
 * Logout
 * 
 * This is administrator logout class
 * 
 * @version 0.1
 */
class Logout extends Templating {

	/**
	 * Logout
	 *
	 * This function logout adminisrator
	 */
	public function deleteAuth() {

		/**
		 * if cookie is not empty then delete it
		 */
		if (!Cookie::isEmpty('admin_id') and !Cookie::isEmpty('admin_hash')) {

			Cookie::delete('admin_id');

			Cookie::delete('admin_hash');

			Redirect::uriRedirect(301, Config::dataArray('redirect_page', 'index'));
		} else {
			Redirect::uriRedirect(301, Config::dataArray('redirect_page', 'index'));
		}
	}
}
?>
