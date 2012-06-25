<?php
/**
 * Adress Book
 * 
 * Config.php
 *
 * This is config for admin panel
 * 
 * @category	settings
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

			"common"	=> array(

				"charset" => 'utf-8'

			),

			"server"	=> array(

				"protocol"	=> 'http',
				"name"		=> $_SERVER['SERVER_NAME'],
				"separator"	=> ':',
				"slash"		=> '/',
				"backslash"	=> "\\"
			),

			"paths"		=> array(

				"root" 		=> $root_path,
				"adminpanel"	=> 'adminpanel/',	
				"application"	=> 'application/',
				"libraries" 	=> 'libraries/',
				"ajax"		=> 'ajax/',
				"controllers"	=> 'controllers/',
				"data"		=> 'data/',
				"models"	=> 'models/',
				"settings"	=> 'settings/',
				"views"		=> 'views/'

			),

			"errors"	=> array(

				"path"		=> './application/data/errors.log',
				"image"		=> '/adminpanel/public/images/',
				"page_error"	=> 'error.php'

			),

			"css"		=> array(
				"path"		=> '/adminpanel/libraries/css/blueprint-v1.0.1/blueprint/'

			),

			"jquery"	=> array(

				"path"		=> '/adminpanel/libraries/jquery/'

			),

			"flags"		=> array(

				"css"		=> 'css',
				"js"		=> 'js'

			),

			"authorization"	=> array(

				"path"		=> '/adminpanel/public/javascripts/',
				"js"		=> 'authorization.js'

			),

			"db"		=> array(

				"adapter"	=> 'PDO',
				"driver"	=> 'mysql',
				"host"		=> 'localhost',
				'name'		=> 'address_book', 
				"login"		=> 'root',
				"password"	=> '551514'

			),

			"templates"	=> array(

				"path"			=> './application/views',
				"name"			=> '/address_book',
				"cache"			=> '/cache',
				"header"		=> 'header.html',
				"scripts"		=> 'scripts.html',
				"footer"		=> 'footer.html',
				"errors"		=> 'errors.html',
				"authorization"		=> 'authorization.html'

			)

		);

		return $config[$option][$flag];
	}
}
?>
