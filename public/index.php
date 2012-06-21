<?php
/**
 * 
 * index.php
 * 
 * This is a main file of Address Book in user's part
 * 
 * @author Igor Zhabskiy <Zhabskiy.Igor@googlemail.com>
 * 
 * @version 0.1
 * 
 * @copyright (c)2011
 * 
 */

/*
	ini_set('display_errors', 1);
	
	error_reporting(E_ALL | E_STRICT);
*/
/**
 * Require main file
 */
/*
require_once(getenv("DOCUMENT_ROOT")."/address_book.my/require.php");
*/

require_once("./require.php");

/**
 * Require file with php user's class
 */
require_once("./phpfiles/class_display_user.php");

/**
 * Create object class
 * 
 */
$view = new UserDisplay;

/**
 * Path to errors log
 */
//$view -> path_error_log = $SysValue['php_files']['errors_log'];

$view -> path_error_log = "./errors_log.txt";

/**
 * Write all errors in log file
 */
$view -> errorsHandler();

/**
 * Session start
 */
$view -> startSession();

/*
print_r($_SESSION);

echo '<hr />';

print_r($_REQUEST);
*/

/**
 * Parse and create array with config file contents
 */
$view -> config_file_name = "./config.ini";

/**
 * Parse and create array with config file contents
 */
$view -> parseIniFile();

echo $config_value;

/**
 * Read template file
 */
//$view -> templateReadFile();

/**
 * Parse template
 */
//$view -> parseTemplateReturn($TemplateName);

/**
 * Path to temlate parser
 */
$view -> parser_path = "./libraries/templates_parser.php";

/**
 * Displays index template
 */
echo $view -> indexFile();

/**
 * Connect to DB MYSQL
 */
$view -> connToDB();

/**
 * Set user options 
 */
echo $view -> userSearchOptions();

/**
 * Form list users countries
 */
echo $view -> userSearchCountries();

/**
 * Form list users cities
 */
echo $view -> UserSearchCities();

/**
 * Navigation variables
 */
$view -> userPageNavigation();

/**
 * Sort fields (Name, Country, City)
 */
$view -> userSortFields();

/**
 * Displays users table
 */
echo $view -> userDisplaysTable();

/**
 * Displays left navigation
 */
echo $view -> userDisplaysNavigationLeft();

/**
 * Displays right navigation
 */
echo $view -> userDisplaysNavigationRight();

/**
 * Displays footer template
 */

echo $view -> copyringFooterYear();
?>
