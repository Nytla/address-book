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
 * @category	Controller
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
	 * _DB_table_name
	 * 
	 * @var string	This is encoding of our Database
	 */
	private $_DB_table_name;

	/**
	 * _admin_id
	 * 
	 * @var string	This is id of administrator
	 */
	private $_admin_id;

	/**
	 * _admin_login
	 * 
	 * @var string	This is login of administrator
	 */
	private $_admin_login;







	/**
	 * getAuthData
	 *
	 * This function get authorization data from Database
	 *
	 * @return array $data	This is authorization data from Database
	 */
	public function getAuthDataById() {

		/**
		 * Set adminisrator variable
		 */
		$this -> _admin_id = intval(Cookie::get('admin_id'));

		$this -> _DB_table_name = Config::dataArray('table_name', 'administrators');

		/**
		 * Select administrator information
		 */
//		$select = $this -> _DB_connect -> query("SELECT * FROM " . $this -> _DB_table_name . " WHERE `admin_id` = '" . $this -> _admin_id . "' LIMIT 1");

		$select = self::$_DB_connect -> query("SELECT * FROM " . $this -> _DB_table_name . " WHERE `admin_id` = '" . $this -> _admin_id . "' LIMIT 1");

		try {

			while ($row = $select -> fetch(PDO::FETCH_ASSOC)) {

				$data[$row['admin_id']] = $row;
			}

			if ($data) {
				return $data;
			}

		} catch (E_NOTICE $object) {

			//Redirect::uriRedirect('bad_connect');
			
			return false;
		}
	}

	/**
	 * getAuthData
	 *
	 * This function get authorization data from Database
	 *
	 * @return array $data	This is authorization data from Database
	 */
	public function getAuthDataByLogin($admin_login = '') {

		/**
		 * Set adminisrator variables
		 */
		$this -> _DB_table_name = Config::dataArray('table_name', 'administrators');

		$this -> _admin_login = $admin_login;

		/**
		 * Get information from DB
		 */
//		$select = $this -> _DB_connect -> query("SELECT `admin_id`, `admin_password` FROM " . $this -> _DB_table_name . " WHERE `admin_login` = '" . mysql_escape_string($this -> _admin_login) . "' LIMIT 1");

		$select = self::$_DB_connect -> query("SELECT `admin_id`, `admin_password` FROM " . $this -> _DB_table_name . " WHERE `admin_login` = '" . mysql_escape_string($this -> _admin_login) . "' LIMIT 1");

		
		try {

			while ($row = $select -> fetch(PDO::FETCH_ASSOC)) {

				$data[$row['admin_id']] = $row;
			}

			if ($data) {
				return $data;
			}

		} catch (E_NOTICE $object) {

			return false;
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

		//$update = $this -> _DB_connect -> exec("UPDATE " . $this -> _DB_table_name . "  SET `admin_hash` = '" . mysql_escape_string($hash) . "' WHERE `admin_id` = '" . $admin_id . "' ");

		$update = self::$_DB_connect -> exec("UPDATE " . $this -> _DB_table_name . "  SET `admin_hash` = '" . mysql_escape_string($hash) . "' WHERE `admin_id` = '" . $admin_id . "' ");

		try {
			if ($update) {
				return true;
			}

		} catch (E_NOTICE $object) {

			return false;
		}

	}
}
?>
