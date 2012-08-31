<?php
/**
 * Address Book
 * 
 * add_new_record.php
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
$AuthorizationController -> checkAuthNotIndex();

/**
 * Create copy of AddNewRecord object
 */
$AddNewRecordController = new AddNewRecord();

/**
 * Print add new record form 
 */
print $AddNewRecordController -> makeAddForm();



//////////////////
print_r($_COOKIE);
/*
echo '
<h1>This is Add new ewcord<h1>
<br>
<a href="./index.php">Back</a>
</h1>
';
*/
?>