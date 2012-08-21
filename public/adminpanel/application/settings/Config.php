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
	static public function dataArray($option, $flag) {

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

				"charset"	=> 'utf-8'

			),

			"server"	=> array(

				"protocol"	=> 'http',
				"name"		=> $_SERVER['SERVER_NAME'],
				"separator"	=> ':',
				"slash"		=> '/',
				"backslash"	=> "\\"
			),

			"db"		=> array(

				"adapter"	=> 'PDO',
				"driver"	=> 'mysql',
				"host"		=> 'localhost',
				'name'		=> 'address_book', 
				"login"		=> 'root',
				"password"	=> '551514',
				"charset"	=> 'UTF8'

			),

			"table_name"	=> array(

				"clients"	=> 'clients',
				"administrators"=> 'administrators'

			),

			"paths"		=> array(

				"root" 		=> $root_path,
				"adminpanel"	=> 'adminpanel/',	
				"application"	=> 'application/',
				"ajax"		=> 'ajax/',
				"controllers"	=> 'controllers/',
				"data"		=> 'data/',
				"models"	=> 'models/',
				"settings"	=> 'settings/',
				"views"		=> 'views/',
				"libraries" 	=> 'libraries/',
				"public"	=> 'public/'

			),

			"errors"	=> array(

				"path"		=> $root_path.'/application/data/errors.log',
				"image"		=> '/adminpanel/public/images/',
				"page_error"	=> 'error.php'

			),

			"redirect_page"	=> array(

				"layout"	=> './layout.php',
				"index"		=> './index.php'

			),

			"css"		=> array(
				"path"		=> '/adminpanel/libraries/css/blueprint-v1.0.1/blueprint/'

			),

			"jquery"	=> array(

				"path"		=> '/adminpanel/libraries/jquery/',
				"validation"	=> 'jQuery_validation_1.9.0.js'

			),

			"javascript"	=> array(

				"path"		=> '/adminpanel/public/javascripts/',
				"authorization"	=> 'authorization.js',
				"add_admin"	=> 'add_admin.js'

			),

			"flags"		=> array(

				"css"		=> 'css',
				"js"		=> 'js'

			),

			"templates"	=> array(

				"path"		=> './application/views',
				"name"		=> '/address_book',
				"cache"		=> '/cache',
				"header"	=> 'header.html',
				"scripts"	=> 'scripts.html',
				"footer"	=> 'footer.html',
				"errors"	=> 'errors.html',
				"authorization"	=> 'authorization.html',
				"layout"	=> 'layout.html',
				"add_admin"	=> 'add_admin.html',
				"book_list"	=> 'book_list.html'

			)

		);

		return $config[$option][$flag];
	}
}
?>
