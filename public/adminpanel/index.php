<?php
//http://ru.wikipedia.org/wiki/%D0%A7%D0%9F%D0%A3_%28%D0%98%D0%BD%D1%82%D0%B5%D1%80%D0%BD%D0%B5%D1%82%29
//http://php.name/php/krasivye-ssylki-chpu/
//http://framework.zend.com/manual/ru/
//Перехват выходного потока

/**
 * Adress Book
 * 
 * index.php
 *
 * This is index file
 * 
 * @category	Main
 * @copyright	2012
 * @author	Igor Zhabskiy  <Zhabskiy.Igor@googlemail.com>
 */

/**
 * Include autoload file
 */
include_once(dirname(__FILE__).'/application/autoload.php');

/**
 * Create authorization object
 */
$obj = new Authorization();

/**
 * Print authorization form
 */
print $obj -> makeAuth();



//////////////////////////////


//$object = new Redirect();

//$object -> uriRedirect();
?>
