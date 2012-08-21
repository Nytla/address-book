<?php
/**
 * Adress Book
 * 
 * log_out.php
 *
 * This is administrator login out
 * 
 * @category	Main
 * @copyright	2012
 * @author	Igor Zhabskiy <Zhabskiy.Igor@googlemail.com>
 */

/**
 * Include autoload file
 */
require_once(dirname(__FILE__).'/application/autoload/autoload.php');

/**
 * Create book list object
 */
$BookListController = new BookList();

/**
 * Print our address book
 */
print $BookListController -> makeAB();


echo '
<h1>This is address book<h1>
<br>
<a href="./index.php">Back</a>
';

?>
