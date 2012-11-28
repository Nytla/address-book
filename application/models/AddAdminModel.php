<?php
/**
 * Adress Book Model
 * 
 * AddAdminModel.php
 *
 * This file is add administrator to DB 
 * 
 * @category	models
 * @copyright	2012
 * @author	Igor Zhabskiy <Zhabskiy.Igor@gmail.com>
 */

/**
 * AddAdminModel
 * 
 * This is administrator add class
 * 
 * @version 0.1
 */
final class AddAdminModel extends PDOMysqlConnect {

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
	 * _admin_password
	 * 
	 * @var string	This is password of administrator
	 */
	static private $_admin_password;

	/**
	 * adminPermission
	 *
	 * This function get permission for administrator from Database
	 *
	 * @return array $admin_permission	This is authorization data from Database
	 */
	static public function adminPermission() {

		/**
		 * Set adminisrator variable
		 */
		self::$_admin_id = intval(Cookie::get('admin_id'));

		/**
		 * Validate administrator id
		 */
		if (ValidateData::filterValidate(self::$_admin_id, ValidateData::DATA_INT)) {

			self::$_DB_table_name = Config::dataArray('table_name', 'administrators');

			/**
			 * Select administrator information
			 */
			$select_permission = self::dbConnect() -> query("
				SELECT `admin_permission` 
				FROM " . self::$_DB_table_name . " 
				WHERE `admin_id` = '" . mysql_escape_string(self::$_admin_id) . "' 
				LIMIT 1
			");

			/**
			 * Get administrator permission from DB
			 */
			$admin_permission = $select_permission -> fetch(PDO::FETCH_ASSOC);
		}

		return ($admin_permission) ? $admin_permission['admin_permission'] : false;
	}

	/**
	 * checkAdminExist
	 *
	 * This function check exist administrator in DB
	 *
	 * @param string $login
	 * @return boolean
	 */
	static public function checkAdminExist($login = '') {

		/**
		 * Set adminisrator variable
		 */
		self::$_admin_login = $login;

		/**
		 * Validate administrator login
		 */
		if (ValidateData::filterValidate(self::$_admin_login, ValidateData::DATA_REGEXP, ValidateData::$_regex_login)) {

			self::$_DB_table_name = Config::dataArray('table_name', 'administrators');		

			$select_login = self::dbConnect() -> query("
				SELECT `admin_id` 
				FROM " . self::$_DB_table_name . "  
				WHERE `admin_login` = '" . mysql_escape_string(self::$_admin_login) . "' LIMIT 1
			");

			/**
			 * Get administrator id from DB
			 */
			$admin_id = $select_login -> fetch(PDO::FETCH_ASSOC);
		}

		return ($admin_id) ? true : false;
	}

	/**
	 * addAdminToDB
	 *
	 * This function add new administrator to DB
	 *
	 * @param string $login
	 * @param string $password
	 * @return boolean
	 */
	static public function addAdminToDB($login, $password) {

		/**
		 * Set adminisrator variable
		 */
		self::$_admin_password = md5(md5($password));

		self::$_admin_login = $login;

		self::$_DB_table_name = Config::dataArray('table_name', 'administrators');

		/**
		 * Add new administrator to DB
		 */
		try {
			$insert_admin = self::dbConnect() -> exec("
				INSERT INTO " . self::$_DB_table_name . " 
					(`admin_id`, `admin_login`, `admin_password`, `admin_hash`, `admin_permission`) 
				VALUES 
					('', '" . mysql_escape_string(self::$_admin_login) . "', '" . mysql_escape_string(self::$_admin_password) . "', '', 0)
			");

			return true;
		} catch (PDOException $object) {

			return false;
		}
	}
}
?>
