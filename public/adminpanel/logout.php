<?php
/**
 * Adress Book
 *
 * log_out.php
 *
 * This is administrator login out
 *
 * @category	Main
 * @copyright	2012
 * @author	Igor Zhabskiy <Zhabskiy.Igor@googlemail.com>
 */

/**
 * Include autoload file
 */
require_once(dirname(__FILE__).'/application/autoload/autoload.php');

/**
 * Create logout object
 */
$LogoutController = new Logout();

/**
 * Delete authorization by adminisrator
 */
$LogoutController -> deleteAuth();
?>