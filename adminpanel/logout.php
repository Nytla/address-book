<?php
/**
 * Adress Book
 *
 * logout.php
 *
 * This is administrator login out
 *
 * @category	adminpanel
 * @copyright	2012
 * @author	Igor Zhabskiy <Zhabskiy.Igor@googlemail.com>
 */

/**
 * Include autoload file
 */
require_once(dirname(__FILE__) . '/../application/autoload/autoload.php');

/**
 * Create logout object
 */
$LogoutController = new Logout();

/**
 * Delete authorization by adminisrator
 */
$LogoutController -> deleteAuth();
?>
