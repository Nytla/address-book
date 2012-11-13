<?php
/**
 * Address Book 
 * 
 * index.php
 *
 * This is index file
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
 * Create authorization object
 */
$AuthorizationController = new Authorization();

/**
 * If isset administrator authorization then redirect him on layout page
 */
$AuthorizationController -> checkAuthIndex();

/**
 * Print authorization form
 */
print $AuthorizationController -> makeAuthForm();
?>
