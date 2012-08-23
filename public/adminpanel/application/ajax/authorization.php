<?php
/**
 * Adress Book Ajax
 * 
 * authorization.php
 *
 * This is ajax file for authorization by administrator
 * 
 * @category	ajax
 * @copyright	2012
 * @author	Igor Zhabskiy  <Zhabskiy.Igor@googlemail.com>
 */

/**
 * Include autoload file
 */
require_once(dirname(__FILE__).'/../../application/autoload/autoload.php');

/**
 * Create access object
 */
$AccessController = new Access();

/**
 * Run method
 */
$AccessController -> httpRequested();

/**
 * Create authorization object
 */
$AuthorizationController = new Authorization();

/**
 * Validate information from form
 */
print $AuthorizationController -> validateAuth($_REQUEST['login'], $_REQUEST['password']);
?>

