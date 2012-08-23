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
 * Address Book 
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
 * If isset administrator authorization then redirect him on layout page
 */
$AuthorizationController -> checkAuthIndex();

/**
 * Print authorization form
 */
print $AuthorizationController -> makeAuth();

//////////////////////////////
//$AuthorizationController -> validateAuth('', '');

//Cookie::set('my_test_igor_3', '7111', Cookie::SESSION_EXPIRE);

//Cookie::delete('my_test_igor_3');

//Redirect::uriRedirect('', 'index.php');

//Cookie::set('my_test_igor_3', '7111', Cookie::SESSION_EXPIRE);

//Cookie::set('my_test_igor_3', '8777', Cookie -> _session_expire);

//Cookie::get('admin_id');

//Cookie::delete('my_test_igor_3');

//Cookie::delete('admin_id');

//Cookie::delete('admin_hash');

//print_r($_COOKIE);

//Redirect::uriRedirect(301, 'page_layout.php');
?>
