<?php
/**
 * Address Book
 * 
 * book_list.php
 *
 * This is administrator address book list page
 * 
 * @category	adminpanel
 * @copyright	2012
 * @author	Igor Zhabskiy <Zhabskiy.Igor@gmail.com>
 */

/**
 * Include autoload file
 */
require_once(dirname(__FILE__) . '/../application/autoload/autoload.php');

/**
 * Create authorization object
 */
$AuthorizationController = new Authorization();

/**
 * Validate information from form
 */
$AuthorizationController -> checkAuthNotIndex();

/**
 * Create book list object
 */
$BookListController = new BookList();

/**
 * Print our address book
 */
print $BookListController -> makeAB();
?>
