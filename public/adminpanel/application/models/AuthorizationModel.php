<?php
//http://www.pcre.ru/docs/apache/text/modrewrite-1/

//http://i-novice.net/oop-nasledovanie-klassov-v-php/

//http://ru.wikibooks.org/wiki/%D0%9E%D0%B1%D1%8A%D0%B5%D0%BA%D1%82%D0%BD%D0%BE-%D0%BE%D1%80%D0%B8%D0%B5%D0%BD%D1%82%D0%B8%D1%80%D0%BE%D0%B2%D0%B0%D0%BD%D0%BD%D0%BE%D0%B5_%D0%BF%D1%80%D0%BE%D0%B3%D1%80%D0%B0%D0%BC%D0%BC%D0%B8%D1%80%D0%BE%D0%B2%D0%B0%D0%BD%D0%B8%D0%B5

/**
 * Adress Book
 * 
 * AuthorizationModel.php
 *
 * This is administrator authorization file
 * 
 * @category	Main
 * @copyright	2012
 * @author	Igor Zhabskiy <Zhabskiy.Igor@googlemail.com>
 */

/**
 * AuthorizationModel
 * 
 * This is administrator authorization class
 * 
 * @version 0.1
 */
class AuthorizationModel extends PDOMysql {

	/**
	 * _DB_connect
	 * 
	 * @var object	This is connect to our Database
	 */
	private static $_DB_connect;

	/**
	 * _DB_encoding
	 * 
	 * @var string	This is encoding of our Database
	 */
	private static $_DB_table_name;

	/**
	 * Constructor
	 *
	 * This constructor initialize connect to our Database
	 *
	 */
//	public function __construct() {

		/**
		 * Initialize connect to Database
		 */
		//$this -> _DB_connect = PDOMysql::connect();

		/**
		 * Set our table name
		 */
		//$this -> _DB_table_name = Config::dataArray('table_name', 'clients');

		//$this -> _DB_table_name = '444)';

		//parent::__construct;

//	}

	/**
	 * getAuthData
	 *
	 * This function get authorization data from Database
	 *
	 * @return array $data	This is authorization data from Database
	 */
	public static function getAuthData($login) {

		self::$_DB_connect = PDOMysql::connect();

		self::$_DB_table_name = Config::dataArray('table_name', 'clients');

		$select = self::$_DB_connect -> query("SELECT * FROM " . self::$_DB_table_name . "");
		
		//mysql_query("SELECT users_id, users_password FROM `users` WHERE `users_login`='".mysql_real_escape_string($_POST['login'])."' LIMIT 1"));

		//$select = self::$_DB_connect -> query("SELECT `admin_id`, `admin_password` FROM " . self::$_DB_table_name . " WHERE `admin_login` = '" . mysql_real_escape_string($login) . "' LIMIT 1");

		try {			
			Exceptions::catchExept($select);

			while ($row = $select -> fetch(PDO::FETCH_ASSOC)) {

				$data[$row['id']] = $row;
			}

			return $data;
		
		} catch (Exception $e) {

			//return $error = 'Caught exception: ' . $e->getMessage();

			Redirect::uriRedirect('bad_connect');
		}
	}

	/**
	 *
	 */
	public function updateHash() {

		$select = $this -> _DB_connect -> query("SELECT * FROM " . $this -> _DB_table_name . "");

		try {

			Exceptions::catchExept($select);

			while ($row = $select -> fetch(PDO::FETCH_ASSOC)) {

				$data[$row['id']] = $row;
			}

			return $data;
		
		} catch (Exception $e) {

			//return $error = 'Caught exception: ' . $e->getMessage();
	
		}

	}


}
?>
