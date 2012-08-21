<?php
/**
 * Adress Book
 * 
 * add_admin.php
 *
 * This is page which add new administrator
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
 * Create authorization object
 */
$AuthorizationController = new Authorization();

/**
 * Validate information from form
 */
$AuthorizationController -> checkAuthAdminPermission();

/**
 * Create authorization object
 */
$AddAdminController = new AddAdmin();

/**
 * Print form
 */
print $AddAdminController -> makeAddForm();
?>
