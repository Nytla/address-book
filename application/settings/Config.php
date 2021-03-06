<?php
/**
 * Adress Book Settings
 * 
 * Config.php
 *
 * This is config file for administrator panel
 * 
 * @category	Settings
 * @copyright	2012
 * @author	Igor Zhabskiy <Zhabskiy.Igor@gmail.com>
 */

/**
 * Config
 * 
 * This is config class
 * 
 * @version 0.1
 */
final class Config {

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
				"dot"		=> '.',
				"separator"	=> ':',
				"slash"		=> '/',
				"backslash"	=> "\\"
			),

			"db"		=> array(

				"adapter"	=> 'PDO',
				"driver"	=> 'mysql',
				"host"		=> 'localhost',
				"port"		=> '3306',
				"name"		=> 'address_book', 
				"login"		=> 'root',
				"password"	=> '',
				"charset"	=> 'utf8'
			),

			"table_name"	=> array(

				"clients"		=> 'clients',
				"administrators"=> 'administrators',
				"phrases"		=> 'phrases',
				"countries"		=> 'countries',
				"cities"		=> 'cities',
				"photos"		=> 'photos'
			),

			"paths"		=> array(

				"root" 			=> $root_path,
				"adminpanel"	=> 'adminpanel/',	
				"application"	=> 'application/',
				"ajax"			=> 'ajax/',
				"controllers"	=> 'controllers/',
				"data"			=> 'data/',
				"models"		=> 'models/',
				"settings"		=> 'settings/',
				"views"			=> 'views/',
				"libraries" 	=> 'libraries/',
				"public"		=> 'public/',
				"images"		=> 'images/',
				"javascripts"	=> 'javascripts/',
				"styles"		=> 'styles/',
				"uploads_client"=> 'uploads_client/'
			),

			"errors"	=> array(

				"full_path"		=> 'http://address_book.loc/adminpanel/',
				"path_error"	=> $root_path . '/application/data/errors.log',
				"path_access"	=> $root_path . '/application/data/access.log',
				"image"			=> '/public/images/',
				"page_error"	=> 'error.php'
			),

			"redirect_page"	=> array(

				"layout"	=> './layout.php',
				"index"		=> './index.php'
			),

			"css"		=> array(
				"path"		=> '/libraries/css/blueprint-v1.0.1/blueprint/',
				"path_style"=> '/public/styles/',
				"c_css"		=> 'site_jui_1.2.c.1.css',
				"demo_table"=> 'demo_table_jui.css',
				"jquery_ui"	=> 'jquery-ui-1.7.2.custom.css'
			),

			"jquery_lib"	=> array(

				"path"			=> '/libraries/jquery/',
				"jquery"		=> 'jQuery_v1.8.2.js',
				"valid_plugin"	=> 'jQuery_validation_1.9.0.js',
				"form_plugin"	=> 'jQuery_form_3.14.js',
				"data_table"	=> 'jQuery_dataTables_1.9.3_min.js'
			),

			"javascript"	=> array(

				"path"			=> '/public/javascripts/',
				"authorization"	=> 'authorization.js',
				"add_admin"		=> 'add_admin.js',
				"book_list"		=> 'book_list.js',
				"user_book_list"=> 'user_book_list.js',
				"add_new_client"=> 'add_new_client.js',
				"edit_client"	=> 'edit_client.js'
			),

			"image_settings"=> array(

				"thumb_prefix"	=> 'thumb_',
				"upload_path"	=> './../../public/images/uploads_client/',
				"image_path"	=> '/public/images/uploads_client/',
				"images_path"	=> '/public/images/',
				"no_photo"		=> 'no_photo.gif'
			),

			"templates"	=> array(

				"path"		=> $root_path . '/application/views',			
				"name"		=> '/address_book',
				"cache"		=> '/cache',
				"header"	=> 'header.html',
				"scripts"	=> 'scripts.html',
				"footer"	=> 'footer.html',
				"errors"	=> 'errors.html',
				"authorization"	=> 'authorization.html',
				"layout"		=> 'layout.html',
				"add_admin"		=> 'add_admin.html',
				"book_list"		=> 'book_list.html',
				"add_new_record"=> 'add_new_client.html',
				"edit_client"	=> 'edit_client.html',
				"user_book_list"=> 'user_book_list.html'
			)
		);

		/**
		 * Return config data
		 */
		return $config[$option][$flag];
	}
}
?>
