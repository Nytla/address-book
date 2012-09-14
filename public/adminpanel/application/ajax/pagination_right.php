<?php
/**
 * Adress Book Ajax
 * 
 * pagination_right.php
 *
 * This is ajax file which formed right pagination
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
 * Create copy of BookList class
 */
$BookListController = new BookList();

/**
 * Get client from DB
 */
print $BookListController -> paginationRight($_REQUEST['keywords'], $_REQUEST['country_id'], $_REQUEST['city_id'], $_REQUEST['field'], $_REQUEST['order'], $_REQUEST['page'], $_REQUEST['limit']);
