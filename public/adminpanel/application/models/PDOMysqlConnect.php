<?php
//http://net.tutsplus.com/tutorials/php/why-you-should-be-using-phps-pdo-for-database-access/



/**
 * Adress Book Model
 * 
 * PDOMysqlConnect.php
 *
 * This is administrator authorization file
 * 
 * @category	Main
 * @copyright	2012
 * @author	Igor Zhabskiy <Zhabskiy.Igor@googlemail.com>
 */

/**
 * PDOMysqlConnect
 * 
 * This is administrator authorization class
 * 
 * @version 0.1
 */
class PDOMysqlConnect extends Exceptionizer {

	/**
	 * _DB_driver
	 * 
	 * @var string	This is name of Database driver
	 */
	private $_DB_driver;

	/**
	 * _DB_host
	 * 
	 * @var string	This is address of host our Database
	 */
	private $_DB_host;

	/**
	 * _DB_name
	 * 
	 * @var string	This is name of Database
	 */
	private $_DB_name;

	/**
	 * _DB_login
	 * 
	 * @var string	This is login of user our Database
	 */
	private $_DB_login;

	/**
	 * _DB_password
	 * 
	 * @var string	This is password of user our Database
	 */
	private $_DB_password;

	/**
	 * _DB_encoding
	 * 
	 * @var string	This is encoding of our Database
	 */
	private $_DB_encoding;

	/**
	 * _DB_connect
	 * 
	 * @var string	This is connect Database
	 */
	protected $_DB_connect;

	/**
	 * connect
	 *
	 * This function make connect to our Database
	 *
	 * @return object $db	This is PDO connect mysql
	 */
/*
	public static function connect() {

		self::$_DB_driver	= Config::dataArray('db', 'driver');

		self::$_DB_host		= Config::dataArray('db', 'host');

		self::$_DB_name		= Config::dataArray('db', 'name');

		self::$_DB_login	= Config::dataArray('db', 'login');

		self::$_DB_password	= Config::dataArray('db', 'password');

		self::$_DB_encoding	= Config::dataArray('db', 'charset');

		try {
			$connect = 
				self::$_DB_driver . ':host=' . 
				self::$_DB_host   . ';dbname=' . 
				self::$_DB_name;

			$db = new PDO(
				$connect,
				self::$_DB_login,
				self::$_DB_password,
				array(
					PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'' . self::$_DB_encoding . '\''
				)
			);

			$db -> setAttribute(
				PDO::ATTR_ERRMODE,
				PDO::ERRMODE_EXCEPTION
			);

			return $db;

		} catch (PDOException $object) {

			Redirect::uriRedirect('bad_connect');

		}
	}
*/



	public function __construct() {

		$this -> _DB_driver	= Config::dataArray('db', 'driver');

		$this -> _DB_host	= Config::dataArray('db', 'host');

		$this -> _DB_name	= Config::dataArray('db', 'name');

		$this -> _DB_login	= Config::dataArray('db', 'login');

		$this -> _DB_password	= Config::dataArray('db', 'password');

		$this -> _DB_encoding	= Config::dataArray('db', 'charset');

		try {
			$connect = 
				$this -> _DB_driver . ':host=' . 
				$this -> _DB_host   . ';dbname=' . 
				$this -> _DB_name;

			$db = new PDO(
				$connect,
				$this -> _DB_login,
				$this -> _DB_password,
				array(
					PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'' . $this -> _DB_encoding . '\''
				)
			);

			$db -> setAttribute(
				PDO::ATTR_ERRMODE,
				PDO::ERRMODE_EXCEPTION
			);

			$this -> _DB_connect = $db;

		} catch (PDOException $object) {

			Redirect::uriRedirect('bad_connect');

		}
	}

	/**
	 * Destructor
	 *
	 * This is destructor close connect with Data Base
	 */
	public function __destruct() {

		$this -> _DB_connect = null;

	}
}
?>
