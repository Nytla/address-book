<?php
/**
 * Adress Book Ajax
 * 
 * user_client_region.php
 *
 * This is ajax file create client countries and cities (json) from DB
 * 
 * @category	ajax
 * @copyright	2012
 * @author		Igor Zhabskiy <Zhabskiy.Igor@gmail.com>
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
 * Create UserBookList object
 */
$UserBookList = new UserBookList();

/**
 * Create client data json
 */
print $UserBookList -> getClientRegions();
?>