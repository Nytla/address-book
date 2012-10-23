<?php
/**
 * Address Book 
 * 
 * index.php
 *
 * This is index file
 * 
 * @category	public
 * @copyright	2012
 * @author	Igor Zhabskiy <Zhabskiy.Igor@googlemail.com>
 */

/**
 * Include autoload file
 */
require_once(dirname(__FILE__).'/adminpanel/application/autoload/autoload.php');

/**
 * Create book list object
 */
$UserBookListController = new UserBookList();

/**
 * Print our address book
 */
print $UserBookListController -> makeUserAB();
?>
