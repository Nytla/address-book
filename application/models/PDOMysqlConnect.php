<?php
/**
 * Adress Book Model
 * 
 * PDOMysqlConnect.php
 *
 * This is administrator PDO MYSQL file
 * 
 * @category	models
 * @copyright	2012
 * @author	Igor Zhabskiy <Zhabskiy.Igor@googlemail.com>
 */

/**
 * PDOMysqlConnect
 * 
 * This is administrator PDO MYSQL Connect class
 * 
 * @version 0.1
 */
class PDOMysqlConnect extends Exceptionizer {

	/**
	 * _DB_driver
	 * 
	 * @var string	This is name of Database driver
	 */
	static private $_DB_driver;

	/**
	 * _DB_host
	 * 
	 * @var string	This is address of host our Database
	 */
	static private $_DB_host;

	/**
	 * _DB_name
	 * 
	 * @var string	This is name of Database
	 */
	static private $_DB_name;

	/**
	 * _DB_login
	 * 
	 * @var string	This is login of user our Database
	 */
	static private $_DB_login;

	/**
	 * _DB_password
	 * 
	 * @var string	This is password of user our Database
	 */
	static private $_DB_password;

	/**
	 * _DB_encoding
	 * 
	 * @var string	This is encoding of our Database
	 */
	static private $_DB_encoding;

	/**
	 * _DB_connect
	 * 
	 * @var string	This is connect to our Database
	 */
	static private $_DB_connect;

	/**
	 * dbConnect
	 *
	 * This function initialize connect to our Database
	 *
	 * @return object $_DB_connect	This is PDO connect mysql
	 */
	static protected function dbConnect() {

		/**
		 * Set DB variables
		 */
		self::$_DB_driver	= Config::dataArray('db', 'driver');

		self::$_DB_host		= Config::dataArray('db', 'host');

		self::$_DB_name		= Config::dataArray('db', 'name');

		self::$_DB_login	= Config::dataArray('db', 'login');

		self::$_DB_password	= Config::dataArray('db', 'password');

		self::$_DB_encoding	= Config::dataArray('db', 'charset');

		$connect = 
			self::$_DB_driver . ':host=' . 
			self::$_DB_host   . ';dbname=' . 
			self::$_DB_name;

		try {
			
			/**
			 * Create PDO object
			 */
			self::$_DB_connect = new PDO(
				$connect,
				self::$_DB_login,
				self::$_DB_password,
				array(
					PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'' . self::$_DB_encoding . '\''
				)
			);

			/**
			 * Set attribute for DB connect
			 */
			self::$_DB_connect -> setAttribute(
				PDO::ATTR_ERRMODE,
				PDO::ERRMODE_EXCEPTION
			);

			return self::$_DB_connect;

		} catch (E_ERROR $object) {
			Redirect::uriRedirect('bad_connect');
		}
	}

	/**
	 * Destructor
	 *
	 * This is destructor close connect with Data Base
	 */
	public function __destruct() {

		self::$_DB_connect = null;
	}
}
?>
