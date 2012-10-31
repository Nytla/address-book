<?php
/**
 * Address Book 
 * 
 * index.php
 *
 * This is index file for user
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
 * Create copy of book list object
 */
$UserBookListController = new UserBookList();

/**
 * Print our address book for user
 */
print $UserBookListController -> makeUserAB();
?>
