<?php
/**
 * Adress Book Ajax
 * 
 * clients_object.php
 *
 * This is ajax file create clients object from DB
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
 * Create BookList object
 */
$BookList = new BookList();

/**
 * Create client data json
 */
print $BookList -> setClientsObject();
?>
