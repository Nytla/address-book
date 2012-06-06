<?php
//ini_set('display_errors', 1);
	
//error_reporting(E_ALL | E_STRICT);

//var_dump($_REQUEST);

//echo is_array($_REQUEST['error']) ? 'Is array' : "Not an array";

//var_dump(count($_REQUEST));

//echo (count($_REQUEST) > 0) ? 'Yes' : 'No';

/**
 * index.php
 * 
 * This is index file for admin
 * 
 * @author Igor Zhabskiy  <Zhabskiy.Igor@googlemail.com>
 * 
 * @version 0.1
 * 
 * @copyring (c) 2011
 * 
**/
/**
 * Require main fail
**/
require_once(getenv("DOCUMENT_ROOT")."/adminpanel/require.php");

/**
 * The simplest way to configure Twig to load templates for our application
**/
require_once("./libraries/twig-v1.2.3/lib/Twig/Autoloader.php");

/**
 * Require file with php user's class
 */
require_once('./controllers/class_admin_display.php');

/**
 * Create object of class "AdminDisplay"
 */

$admin_view = new AdminDisplay;

/**
 * Path to errors log
 */
$admin_view -> _path_error_log = "./errors.log";

/**
 * Path to config .ini file
 */
$admin_view -> _path_config_file = "./config.ini";

/**
 * Set path to our templates file
 */
$admin_view -> _path_to_view = './views';

/**
 * Set path to cache for templates file
 */
$admin_view -> _path_to_cache = './views/compilation_cache';

/**
 * Write all errors in log file
 */
$admin_view -> errorsHandler();

/**
 * Start session for administrator
 */
$admin_view -> startSession();

/**
 * Redirect to our page when an error occurs
 */
print ($admin_view -> errorsPage());

/**
 * Display header for admin
 */
print( $admin_view -> adminHeader());

/**
 * Display authorization form for admin
 */
print ($admin_view -> adminAuthorizationForm());

/**
 * Admin lauout page
 */
print ($admin_view -> adminLayout());

/**
 * Display footer for admin
 */
print ($admin_view -> adminFooter());

?>
