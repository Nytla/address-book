<?php

	ini_set('display_errors', 1);

	error_reporting(E_ALL | E_STRICT);

/**
 * authorization.php
 * 
 * This ajax authorization for admin
 * 
 * @author Igor Zhabskiy  <Zhabskiy.Igor@googlemail.com>
 * 
 * @version 0.1
 * 
 * @copyring (c) 2011
 * 
**/

require_once(getenv("DOCUMENT_ROOT")."/adminpanel/require.php");

/**
 * The simplest way to configure Twig to load templates for our application
**/
require_once("./../libraries/twig-v1.2.3/lib/Twig/Autoloader.php");

/**
 * Require file with php user's class
 */
require_once("./../controllers/class_admin_display.php");

/**
 * Take data from ajax
 */
$login = $_REQUEST['login'];

$password = $_REQUEST['password'];

/**
 * Create object of class "AdminDisplay"
 */
$admin_view = new AdminDisplay;

/**
 * Path to errors log
 */
$admin_view -> _path_error_log = "../errors.log";

/**
 * Path to config .ini file
 */
$admin_view -> _path_config_file = '../config.ini';

/**
 * Activate template path for objects
 */
$admin_view -> _path_to_view = '../views';

/**
 * Activate template cache path for objects
 */
$admin_view -> _path_to_cache = '../views/compilation_cache';

/**
 * Write all errors in log file
 */
$admin_view -> errorsHandler();

/**
 * Start session for administrator
 */
$admin_view -> startSession();

/**
 * Take data(ligin & password) from ajax
 */
$auth = $admin_view -> adminAuthorization($login, $password);

/**
 * Return objec json to jQuery
 */
echo json_encode(
		array(
			"authorization" => $auth,
			"pass" => ""
		)
	);
?>
