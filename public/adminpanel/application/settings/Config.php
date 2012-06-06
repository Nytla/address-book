<?php
/**
 * Adress Book
 * 
 * Config.php
 *
 * This is config for admin panel
 * 
 * @category	Main
 * @copyright	2012
 * @author	Igor Zhabskiy <Zhabskiy.Igor@googlemail.com>
 */

/**
 * Config
 * 
 * This is config class
 * 
 * @version 0.1
 */
class Config {

	/**
	 * dataArray
	 * 
	 * This is function return config parameter
	 * 
	 * @param string $option	This is first parameter for array
	 * @param string $flag		This is second parameter for array
	 *
	 * @return string $config	This is config parameter
	 */
	public static function dataArray($option, $flag) {

		/**
		 * Physical path to document_root
		 */
		$root_path = dirname(__FILE__);

		$root_path .= '/../../';

		/**
		 * If you need greate address book not standart folder, write this folder
		 */
		$base_url = '';

		$config = array(

			"common" => array(

				"charset" => 'utf-8'

			),

			"paths" => array(

				"root" 		=> $root_path,
				"application"	=> $root_path . 'application/',
				"libraries" 	=> $root_path . 'libraries/',
				"ajax"		=> $root_path . 'ajax',				
				"controllers"	=> $root_path . 'controllers/',
				"data"		=> $root_path . 'data/',
				"js"		=> $root_path . 'js/',
				"models"	=> $root_path . 'models/',
				"settings"	=> $root_path . 'settings/',
				"views"		=> $root_path . 'views/'

			),

			"errors" => array(

				"path" => './application/data/errors.log'

			),

			"css" => array(
				"path"		=> './libraries/css/blueprint-v1.0.1/blueprint/',
				"screen"	=> 'screen.css',
				"print"		=> 'print.css',
				"ie"		=> 'ie.css'

			),

			"jquery" => array(

				"path"		=> './libraries/jquery/jQuery_v1.7.2.js'

			),

			"flags" => array(

				"css"		=> 'css',
				"js"		=> 'js'

			),

			"authorization" => array(
				"path"		=> './application/js/',
				"js"		=> 'authorization.js'

			),

			"db" => array(

				"adapter" => 'PDO :)',
				"name" => 'address_book'

			),

			"templates" => array(

				"path"			=> './application/views',
				"name"			=> '/address_book',
				"cache"			=> '/cache',
				"header"		=> 'header.html',
				"include_scripts"	=> 'include_scripts.html',
				"footer"		=> 'footer.html',
				"errors"		=> 'errors.html',
				"authorization"		=> 'authorization.html'

			)

		);
		
		/**
		 * Setting local time
		 */
		//date_default_timezone_set("Europe/Kiev");

		return $config[$option][$flag];
	}
}
?>
