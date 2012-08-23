<?php
//http://www.pcre.ru/docs/apache/text/modrewrite-1/
//http://i-novice.net/oop-nasledovanie-klassov-v-php/
//http://ru.wikibooks.org/wiki/%D0%9E%D0%B1%D1%8A%D0%B5%D0%BA%D1%82%D0%BD%D0%BE-%D0%BE%D1%80%D0%B8%D0%B5%D0%BD%D1%82%D0%B8%D1%80%D0%BE%D0%B2%D0%B0%D0%BD%D0%BD%D0%BE%D0%B5_%D0%BF%D1%80%D0%BE%D0%B3%D1%80%D0%B0%D0%BC%D0%BC%D0%B8%D1%80%D0%BE%D0%B2%D0%B0%D0%BD%D0%B8%D0%B5



/**
 * Adress Book Model
 * 
 * AuthorizationModel.php
 *
 * This is administrator authorization file
 * 
 * @category	models
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
	static private $_DB_table_name;

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
	 * getAuthData
	 *
	 * This function get authorization data from Database
	 *
	 * @return array $data	This is authorization data from Database
	 */
	static public function getAuthDataById() {

		/**
		 * Set adminisrator variable
		 */
		self::$_admin_id = intval(Cookie::get('admin_id'));

		self::$_DB_table_name = Config::dataArray('table_name', 'administrators');

		/**
		 * Select administrator information
		 */
		$select = self::dbConnect() -> query("SELECT * FROM " . self::$_DB_table_name . " WHERE `admin_id` = '" . self::$_admin_id . "' LIMIT 1");

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
	 * getAuthData
	 *
	 * This function get authorization data from Database
	 *
	 * @return array $data	This is authorization data from Database
	 */
	static public function getAuthDataByLogin($admin_login = '') {

		/**
		 * Set adminisrator variables
		 */
		self::$_DB_table_name = Config::dataArray('table_name', 'administrators');

		self::$_admin_login = $admin_login;

		/**
		 * Get information from DB
		 */
		$select = self::dbConnect() -> query("SELECT `admin_id`, `admin_password` FROM " . self::$_DB_table_name . " WHERE `admin_login` = '" . mysql_escape_string(self::$_admin_login) . "' LIMIT 1");

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
	static public function updateHash($admin_id = '', $hash = '') {

		/**
		 * Update our hash in DB
		 */
		$update = self::dbConnect() -> exec("UPDATE " . self::$_DB_table_name . "  SET `admin_hash` = '" . mysql_escape_string($hash) . "' WHERE `admin_id` = '" . $admin_id . "' ");

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
