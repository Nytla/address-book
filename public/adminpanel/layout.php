<?php
/**
 * Address Book
 * 
 * page_layout.php
 *
 * This is administrator page layout
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
$AuthorizationController -> checkAuthNotIndex();

/**
 * Create layout object
 */
$LayoutController = new Layout();

/**
 * Print layout page
 */
print $LayoutController -> makeLayout();
?>
