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
 * @author	Igor Zhabskiy  <Zhabskiy.Igor@googlemail.com>
 */

/**
 * Include autoload file
 */
require_once(dirname(__FILE__).'/../../application/autoload/autoload.php');

/**
 * Create copy of BookListModel class
 */
$BookListModel = new BookListModel();

/**
 * Get cities from DB
 */
print $BookListModel -> getCities($_REQUEST['country_id']);
?>
