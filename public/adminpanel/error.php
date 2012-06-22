<?php
/**
 * Adress Book
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
 * Authorization
 * 
 * This is administrator authorization class
 * 
 * @version 0.1
 */

/**
 * Include autoload file
 */
require_once(dirname(__FILE__).'/application/autoload.php');

/**
 * Create authorization object
 */
$object = new Errors();

/**
 * Print error page
 */
print $object -> getErrors();
?>
