<?php
/**
 * Address Book
 * 
 * edit_record.php
 *
 * This is administrator edit client record
 * 
 * @category	adminpanel
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
 * Create copy of edit client record object
 */
$EditClientController = new EditClient();

/**
 * Print our address book
 */
print $EditClientController -> makeFromEditClient();
?>
