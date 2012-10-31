<?php
//26 client in DB - 	Generation: 0.04112. Memory: 4873136. Peak: 5260432
//1026 client in DB -	Generation: 0.18907. Memory: 6167552. Peak: 15499096
/**
 * Test load time, Memory and Peak START
 */
$begin = microtime(TRUE);



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



/**
 * Test load Time, Memory and Peak FINISH
 */
$finish = microtime(TRUE);
$diff = sprintf('%.5f', $finish - $begin);
$peak = memory_get_peak_usage();
$mem = memory_get_usage();
echo "\r\nGeneration: $diff. Memory: $mem. Peak: $peak";

?>
