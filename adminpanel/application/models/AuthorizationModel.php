<?php
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
final class AuthorizationModel extends PDOMysqlConnect {

	/**
	 * _DB_table_name
	 * 
	 * @var string	This is encoding of our Database
	 */
	static private $_DB_table_administrators;

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
	 * @return array $data_array	This is authorization data from Database
	 */
	static public function getAuthDataById() {

		/**
		 * Set adminisrator variable
		 */
		self::$_admin_id = intval(Cookie::get('admin_id'));

		/**
		 * Validate administrator id
		 */
		if (ValidateData::filterValidate(self::$_admin_id, ValidateData::DATA_INT)) {

			self::$_DB_table_administrators = Config::dataArray('table_name', 'administrators');

			/**
			 * Select administrator information from DB
			 */
			$select = self::dbConnect() -> query("
				SELECT 
					`admin_id`, 
					`admin_hash`,
					`admin_permission`
				FROM " . self::$_DB_table_administrators . " 
				WHERE `admin_id` = '" . mysql_escape_string(self::$_admin_id) . "' 
				LIMIT 1
			");

			/**
			 * Get administrator information from array
			 */
			$data_array = $select -> fetch(PDO::FETCH_ASSOC);
		}

		return ($data_array) ? $data_array : false;
	}

	/**
	 * getAuthData
	 *
	 * This function get authorization data from Database
	 *
	 * @param string $admin_login
	 * @return array / boolean
	 */
	static public function getAuthDataByLogin($admin_login = '') {

		/**
		 * Set adminisrator variables
		 */
		self::$_admin_login = $admin_login;

		/**
		 * Validate administrator login
		 */
		if (ValidateData::filterValidate(self::$_admin_login, ValidateData::DATA_REGEXP, ValidateData::$_regex_login)) {

			self::$_DB_table_administrators = Config::dataArray('table_name', 'administrators');

			/**
			 * Get information from DB
			 */
			$select = self::dbConnect() -> query("
				SELECT 
					`admin_id`, 
					`admin_password` 
				FROM " . self::$_DB_table_administrators . " 
				WHERE `admin_login` = '" . mysql_escape_string(self::$_admin_login) . "' 
				LIMIT 1
			");

			/**
			 * Get administrator information from array
			 */
			$data_array = $select -> fetch(PDO::FETCH_ASSOC);
		}

		return (isset($data_array)) ? $data_array : false;
	}

	/**
	 * updateHash
	 *
	 * This function update administrator hash from Database
	 *
	 * @param string $admin_id
	 * @param string $hash
	 * @return boolean
	 */
	static public function updateHash($admin_id = '', $hash = '') {

		/**
		 * Validate administrator id
		 */
		if (ValidateData::filterValidate($admin_id, ValidateData::DATA_INT)) {

			/**
			 * Update our hash in DB
			 */
			$update = self::dbConnect() -> exec("
				UPDATE " . self::$_DB_table_administrators . " 
				SET `admin_hash` = '" . mysql_escape_string($hash) . "' 
				WHERE `admin_id` = '" . mysql_escape_string($admin_id) . "' 
			");
		}

		return ($update) ? true : false;
	}
}
?>
