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
	 * __construct
	 * 
	 * This is constructor 
	 */
	public function __construct() {
		spl_autoload_register(array($this, 'loadClass'));
	}

	/**
	 * loaderClass
	 * 
	 * This function load class
	 *
	 * @param sring $className	This is class name
	 */
	private function loadClass($class_name) {
		
		$path_controllers = './application/controllers/' . $class_name . '.php';
		
		$path_models = './application/models/' . $class_name . '.php';
		
		$path_settings = './application/settings/' . $class_name . '.php';
				
		$path_data = './application/data/' . $class_name . '.php';

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
