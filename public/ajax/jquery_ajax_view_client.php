<?php
/**
 * Require main file
 */
require_once(getenv("DOCUMENT_ROOT")."/address_book.my/require.php");

/**
 * We get data from an user
 */
$client_id = $_REQUEST['client_id'];

/*
$_REQUEST['username']
*/

/**
 * Require class
 */
require_once("phpfiles/class_display_user.php");

$view = new UserDisplay();

/**
 * Path to errors log
 */
//$view -> path_error_log = $SysValue['php_files']['errors_log_ajax'];

$view -> path_error_log = "../errors_log.txt";

/**
 * Write all errors in log file
 */
$view -> errorsHandler();

/**
 * Parse and create array with config file contents
 */
$view -> config_file_name = '../config.ini';

/**
 * Parse and create array with config file contents
 */
$view -> parseIniFile();

/**
 * Path to temlate parser
 */
//$view -> parser_path = $SysValue['php_files']['path_parser_for_ajax'];

$view -> parser_path = "../libraries/templates_parser.php";

/**
 * Displays index template
 */
//$view -> indexFile();

require_once($view -> parser_path);

/**
 * Connect to DB MYSQL
 */
$view -> connToDB();

/**
 * Get client information with template
 */
$info = $view -> userDisplaysViewInfo($client_id);

/**
 * Write away for information in JS
 */

echo $info;

/*
$GLOBALS['_RESULT'] = array(
  "client_info" => true,
  "information"   => $info,
);
*/
?>
