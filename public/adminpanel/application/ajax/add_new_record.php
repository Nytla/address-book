<?php
/**
 * Adress Book Ajax
 * 
 * add_new_record.php
 *
 * This is ajax file for added client to DB
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
 * Create copy AddNewRecordController object
 */
$AddNewRecordController = new AddNewRecord();

/**
 * Add new client to DB
 */
print $AddNewRecordController -> addNewClient($_REQUEST['first_name'], $_REQUEST['last_name'], $_REQUEST['email'], $_REQUEST['country'], $_REQUEST['city'], $_REQUEST['photo_id'], $_REQUEST['notes']);
?>
