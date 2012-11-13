<?php
/**
 * Adress Book Ajax
 * 
 * add_admin.php
 *
 * This is ajax file for added administrator to DB
 * 
 * @category	ajax
 * @copyright	2012
 * @author	Igor Zhabskiy <Zhabskiy.Igor@googlemail.com>
 */

/**
 * Include autoload file
 */
require_once(dirname(__FILE__) . '/../../application/autoload/autoload.php');

/**
 * Create access object
 */
$AccessController = new Access();

/**
 * Run method
 */
$AccessController -> httpRequested();

/**
 * Create AddAdminController object
 */
$AddAdminController = new AddAdmin();

/**
 * Add new administrator to DB
 */
print $AddAdminController -> adminRegister($_REQUEST['login'], $_REQUEST['password']);
?>
