<?php
//ini_set('display_errors', 'on');

//error_reporting(E_ALL | E_STRICT);

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
require_once(dirname(__FILE__).'/autoload.php');

/**
 * Create authorization object
 */
$AuthorizationController = new Authorization();

/**
 * Print authorization form
 */
print $AuthorizationController -> makeAuth();



//////////////////////////////
$test = ($AuthorizationController -> validateAuth('', ''));

print $test;

//print_r($_COOKIE);





//Catch error
/*
try {

	$message_error = Locale::languageEng('script', 'error');

	$message_good = '';

	//$flag = 0;

	Exceptions::catchExept($flag, $message_error, $message_good);

	//Include css or/and javascript content
	$template_name = Config::dataArray('templates', 'scripts');

	$params = array(
		"num"		=> count($flag) - 1,
		"flag"		=> $flag,
		"path"		=> $path,
		"noscript"	=> Locale::languageEng('noscript', 'message'),
	);

	return Templating::renderingTemplate($template_name, $params);

} catch (Exception $e) {

	Redirect::uriRedirect();		

}
*/
?>
