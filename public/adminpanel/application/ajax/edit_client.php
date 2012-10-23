<?php
/**
 * Adress Book Ajax
 * 
 * edit_client.php
 *
 * This is ajax file which edit client record in DB
 * 
 * @category	ajax
 * @copyright	2012
 * @author	Igor Zhabskiy <Zhabskiy.Igor@googlemail.com>
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
 * Create copy EditClientController object
 */
$EditClientController = new EditClient();

/**
 * Take client data from DB 
 */
print $EditClientController -> destributorData($_REQUEST);
?>
