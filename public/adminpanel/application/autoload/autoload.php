<?php
/**
 * Adress Book
 * 
 * autoload.php
 *
 * This is autoload class
 * 
 * @category	Main
 * @copyright	2012
 * @author	Igor Zhabskiy  <Zhabskiy.Igor@googlemail.com>
 */

/**
 * ClassAutoloader
 * 
 * This is autoload class
 * 
 * @version 0.1
 */
class ClassAutoloader {

	/**
	 * Constructor
	 * 
	 * Initialize class loader
	 */
	public function __construct() {
		spl_autoload_register(array($this, 'classLoader'));
	}

	/**
	 * classLoader
	 * 
	 * This function load class
	 *
	 * @param sring $class_name	This is class name
	 */
	private function classLoader($class_name) {

		$root = dirname(__FILE__);

		$path_controllers = $root.'/../../application/controllers/' . $class_name . '.php';

		$path_models = $root.'/../../application/models/' . $class_name . '.php';

		$path_settings = $root.'/../../application/settings/' . $class_name . '.php';

		$path_data = $root.'/../../application/data/' . $class_name . '.php';

		if (file_exists($path_controllers)) {
			include_once($path_controllers);
		} elseif (file_exists($path_models)) {
			include_once($path_models);
		} elseif (file_exists($path_settings)) {
			include_once($path_settings);
		} elseif (file_exists($path_data)) {
			include_once($path_data);
		}
	}
}

/**
 * Run classAutoloader
 */
new ClassAutoloader();
?>
