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
class AuthorizationModel extends PDOMysqlConnect {

	/**
	 * _DB_connect
	 * 
	 * @var object	This is connect to our Database
	 */
	//static private $_DB_connect;

	/**
	 * _DB_table_name
	 * 
	 * @var string	This is encoding of our Database
	 */
	//static private $_DB_table_name;

	private $_DB_table_name;


	/**
	 * _admin_id
	 * 
	 * @var string	This is id of administrator
	 */
	static private $_admin_id;


	/**
	 * _admin_login
	 * 
	 * @var string	This is login of administrator
	 */
	static private $_admin_login;

	/**
	 * _admin_password
	 * 
	 * @var string	This is password of administrator
	 */
	static private $_admin_password;

	public function getAuthDataById($id = '') {

		

	}

	/**
	 * getAuthData
	 *
	 * This function get authorization data from Database
	 *
	 * @return array $data	This is authorization data from Database
	 */
	public function getAuthData($id = '', $login = '') {

		/**
		 * Connect to DB and get table name from config files
		 */
		//self::$_DB_connect = PDOMysql::connect();

		$this -> _DB_table_name = Config::dataArray('table_name', 'administrators');
/*
		//Select administrator information
		if ($id) {

			////$userdata = mysql_fetch_assoc(mysql_query("SELECT * FROM users WHERE users_id = '".intval($_COOKIE['id'])."' LIMIT 1"));

		} elseif ($login) {

			

		}
*/
//		self::$_DB_table_name = Config::dataArray('table_name', 'clients');

		

		self::$_admin_login = 'admin';//$_REQUEST['valueLogin'] = $login

		# Вытаскиваем из БД запись, у которой логин равняеться введенному
		//$data = mysql_fetch_assoc(mysql_query("SELECT users_id, users_password FROM `users` WHERE `users_login`='".mysql_real_escape_string($_POST['login'])."' LIMIT 1"));

//		$select = self::$_DB_connect -> query("SELECT * FROM " . self::$_DB_table_name . "");
		
		$select = $this -> _DB_connect -> query("SELECT * FROM " . $this -> _DB_table_name . "");


		//$select = self::$_DB_connect -> query("SELECT `admin_id`, `admin_password` FROM " . self::$_DB_table_name . " WHERE `admin_login` = '" . mysql_escape_string(self::$_admin_login) . "' LIMIT 1");

		//return "SELECT * FROM " . self::$_DB_table_name . "";

		try {

			while ($row = $select -> fetch(PDO::FETCH_ASSOC)) {

				$data[$row['admin_id']] = $row;
			}

			return $data;
		
		} catch (E_NOTICE $e) {

			//return $error = 'Caught exception: ' . $e->getMessage();

			//Redirect::uriRedirect('bad_connect');
		}
	}

	

	/**
	 * updateHash
	 *
	 * This function update administrator hash from Database
	 *
	 * @return array $data	This is authorization data from Database
	 */
	public function updateHash($admin_id = '', $hash = '') {

		# Записываем в БД новый хеш авторизации и IP 
		//mysql_query("UPDATE users SET users_hash='".$hash."' WHERE users_id='".$data['users_id']."'") or die("MySQL Error: " . mysql_error()); 

		$update = $this -> _DB_connect -> query("UPDATE " . $this -> _DB_table_name . "  SET `admin_hash` = '" . $hash . "' WHERE `admin_id` = '" . $admin_id . "' ");

//		$select = $this -> _DB_connect -> query("SELECT * FROM " . $this -> _DB_table_name . "");

		try {
/*
			Exceptions::catchExept($update);

			while ($row = $select -> fetch(PDO::FETCH_ASSOC)) {

				$data[$row['id']] = $row;
			}
*/		

			return 'upDAte';

	} catch (Exception $e) {

			//return $error = 'Caught exception: ' . $e->getMessage();
	
		}

	}


}
?>
