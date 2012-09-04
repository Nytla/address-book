<?php
/**
 * Adress Book Ajax
 * 
 * search_clients.php
 *
 * This is ajax file for search clients in DB
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
 * Create copy of BookList object
 */
$BookListController = new BookList();

/**
 * Run method from our model
 */
print $BookListController -> searchClients($_REQUEST['keywords'], $_REQUEST['country_id'], $_REQUEST['city_id']);
?>
