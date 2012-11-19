<?php
/**
 * Adress Book Ajax
 * 
 * add_new_client.php
 *
 * This is ajax file for added client to DB
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
 * Create copy AddNewClientController object
 */
$AddNewClientController = new AddNewClient();

/**
 * Add new client to DB
 */
print $AddNewClientController -> addClient($_REQUEST['first_name'], $_REQUEST['last_name'], $_REQUEST['email'], $_REQUEST['country'], $_REQUEST['city'], $_REQUEST['photo_id'], $_REQUEST['notes']);
?>
