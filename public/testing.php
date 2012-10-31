<?php
/**
 * Test load time, Memory and Peak START
 */
$begin = microtime(TRUE);



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
 * Create copy of testing object
 */
$TestingController = new Testing();

/**
 * Print our test
 */
print $TestingController -> test();



/**
 * Test load Time, Memory and Peak FINISH
 */
$finish = microtime(TRUE);
$diff = sprintf('%.5f', $finish - $begin);
$peak = memory_get_peak_usage();
$mem = memory_get_usage();
echo "\r\nGeneration: $diff. Memory: $mem. Peak: $peak";
?>
