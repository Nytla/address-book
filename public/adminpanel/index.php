<?php
ini_set('display_errors', 'on');

error_reporting(E_ALL | E_STRICT);

//http://ru.wikipedia.org/wiki/%D0%A7%D0%9F%D0%A3_%28%D0%98%D0%BD%D1%82%D0%B5%D1%80%D0%BD%D0%B5%D1%82%29
//http://php.name/php/krasivye-ssylki-chpu/
//http://framework.zend.com/manual/ru/ and http://www.dizballanze.com/?cat=72
//Перехват выходного потока
//Static - http://www.sql.ru/forum/actualthread.aspx?tid=674596
//Pattetn - http://dron.by/post/patterny-shablony-proektirovanie-v-php-vvedenie/

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
require_once(dirname(__FILE__).'/application/autoload/autoload.php');

/**
 * Create authorization object
 */
$AuthorizationController = new Authorization();

/**
 * Print authorization form
 */
print $AuthorizationController -> makeAuth();



//////////////////////////////
print_r($AuthorizationController -> validateAuth('', ''));

//print_r($_COOKIE);
$test = 0;
$test/4;
?>
