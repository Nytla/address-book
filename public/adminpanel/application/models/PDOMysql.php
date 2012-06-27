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
class PDOMysql extends Exceptions {

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
	 * connect
	 *
	 * This function make connect to our Database
	 *
	 * @return object $db	This is PDO connect mysql
	 */
	public function connect() {

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
					PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \''.$this -> _DB_encoding.'\''
				)
			);

			$db -> setAttribute(
				PDO::ATTR_ERRMODE,
				PDO::ERRMODE_EXCEPTION
			);

			return $db;

		} catch (PDOException $errors) {

			//return ('Could connect to the Data Base because: ' . $errors -> getMessage());

			Redirect::uriRedirect('bad_connect');

		}
	}
}
?>
