<?php
/**
 * Address Book
 * 
 * error.php
 *
 * This is administrator error file
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
 * Create copy of error object
 */
$ErrorsController = new Errors();

/**
 * Print error page
 */
print $ErrorsController -> getErrors();
?>
