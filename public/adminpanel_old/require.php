<?php
/**
 * 
 * require.php
 * 
 * This is a main config file of Address Book in user's part
 * 
 * @author Igor Zhabskiy <Zhabskiy.Igor@googlemail.com>
 * 
 * @version 0.1
 * 
 * @copyright (c)2011
 * 
 */

/**
 * Connects to all scenarios (automatically or manually)
 */
if (!defined("PATH_SEPARATOR"))
	define("PATH_SEPARATOR", getenv("COMSPEC") ? "?" : ":");
ini_set("include_path", ini_get("include_path").PATH_SEPARATOR.dirname(__FILE__));
?>
