<?php
/**
 * Address Book
 * 
 * add_new_record.php
 *
 * This is page which add new client record
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
 * Validate information from form
 */
$AuthorizationController -> checkAuthNotIndex();

/**
 * Create copy of AddNewRecord object
 */
$AddNewClientController = new AddNewClient();

/**
 * Print add new record form
 */
print $AddNewClientController -> makeAddForm();
?>
