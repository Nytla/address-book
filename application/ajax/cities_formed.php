<?php
/**
 * Adress Book Ajax
 * 
 * cities_formed.php
 *
 * This is ajax file which formed cities list from DB
 * 
 * @category	ajax
 * @copyright	2012
 * @author	Igor Zhabskiy <Zhabskiy.Igor@gmail.com>
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
 * Get cities from DB
 */
print $BookListController -> getCities($_REQUEST['country_id']);
?>
