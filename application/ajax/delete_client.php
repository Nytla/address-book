<?php
/**
 * Adress Book Ajax
 * 
 * delete_client.php
 *
 * This is ajax file which delete client from DB
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
 * Create copy of BookList class
 */
$BookListController = new BookList();

/**
 * Delete client from DB
 */
print $BookListController -> deleteClient($_REQUEST['id']);
?>
