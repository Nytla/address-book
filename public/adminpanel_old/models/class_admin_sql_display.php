<?php
/**
 * class_admin_sql_display.php
 * 
 * This is model for administrator panel
 * 
 * @author Igor Zhabskiy  <Zhabskiy.Igor@googlemail.com>
 * 
 * @copyring (c) 2012
 */

/**
 * SqlModel
 * 
 * This class is work with MYSQL
 * 
 * @version 0.1
 */
class SqlModel {

	/**
	 * path_error_log
	 * 
	 * @var string This is path to errors log
	 */
//	private $_path_error_log = '../errors.log';
	
	/**
	 * config_file_path
	 * 
	 * @var string This is configuration file path
	**/
//	private $config_file_path = '../config.ini';

	public function pdo($db_driver, $db_host, $db_name, $db_user, $db_password) {
		
		
		
//		http://php.net/manual/en/ref.pdo-mysql.php
		
//		http://pyha.ru/articles/php/auth/
		
		
		
		//Create constants
		define('DB_DRIVER', 'mysql');
		define('DB_HOST', 'localhost');
		//define('DB_NAME', 'address_book');
		define('DB_NAME', 'wordpress');
		define('DB_USER', 'root');
		define('DB_PASSWORD', '551514');

		try {			
			$connect = DB_DRIVER . ':host=' . DB_HOST . ';dbname=' . DB_NAME;
			
			$db = new PDO($connect, DB_USER, DB_PASSWORD);
			
			$db -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		} catch (PDOException $errors) {
			echo ('Could connect to the Data Base because: ' . $errors -> getMessage());
		}

		$select = $db -> query("SELECT * FROM `wp_users`, `wp_usermeta`, `wp_terms`");

		while ($row = $select -> fetch(PDO::FETCH_ARRAY)) {
	
			//echo $row['ID'] . ' ' . $row['user_login']. '<br />';
		}
	}
}

?>