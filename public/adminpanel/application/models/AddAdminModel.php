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
 * @author	Igor Zhabskiy <Zhabskiy.Igor@googlemail.com>
 */

/**
 * AddAdminModel
 * 
 * This is administrator add class
 * 
 * @version 0.1
 */
class AddAdminModel extends PDOMysqlConnect {

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
	 * @return array $data	This is authorization data from Database
	 */
	static public function adminPermission() {

		/**
		 * Set adminisrator variable
		 */
		self::$_DB_table_name = Config::dataArray('table_name', 'administrators');

		self::$_admin_id = intval(Cookie::get('admin_id'));

		/**
		 * Select administrator information
		 */
		$select_permission = self::dbConnect() -> query("SELECT `admin_permission` FROM " . self::$_DB_table_name . " WHERE `admin_id` = '" . self::$_admin_id . "' LIMIT 1");

		/**
		 * Get administrator permission from DB
		 */
		$admin_permission = $select_permission -> fetch(PDO::FETCH_ASSOC);

		if ($admin_permission) {

			return $admin_permission['admin_permission'];

		} else {
			return false;
		}
	}

	/**
	 * checkAdminExist
	 *
	 * This function check exist administrator in DB
	 *
	 * @return boolean
	 */
	static public function checkAdminExist($login = '') {

		/**
		 * Set adminisrator variable
		 */
		self::$_DB_table_name = Config::dataArray('table_name', 'administrators');

		self::$_admin_login = $login;

		$select_login = self::dbConnect() -> query("SELECT `admin_id` FROM " . self::$_DB_table_name . "  WHERE `admin_login` = '" . mysql_escape_string(self::$_admin_login) . "' LIMIT 1");

		/**
		 * Get administrator id from DB
		 */
		$admin_id = $select_login -> fetch(PDO::FETCH_ASSOC);

		if ($admin_id) {

			return true;

		} else {
			return false;
		}
/*
		try {

			while ($row = $select_login -> fetch(PDO::FETCH_ASSOC)) {

				if ($row['admin_id']) {
					return true; 
				}
			}

		} catch (E_NOTICE $object) {

			return false;
		}
*/
	}

	/**
	 * addAdminToDB
	 *
	 * This function add new administrator to DB
	 *
	 * @return boolean
	 */
	static public function addAdminToDB($password = '') {

		/**
		 * Set adminisrator variable
		 */
		self::$_admin_password = md5(md5($password));

		/**
		 * Add new administrator to DB
		 */
		$insert_admin = self::dbConnect() -> exec("INSERT INTO " . self::$_DB_table_name . " (`admin_id`, `admin_login`, `admin_password`, `admin_hash`, `admin_permission`) VALUES ('', '" . mysql_escape_string(self::$_admin_login) . "', '" . mysql_escape_string(self::$_admin_password) . "', '', 0)");

		try {
			if ($insert_admin) {
				return true; 
			}

		} catch (E_NOTICE $object) {

			return false;
		}
	}
}
?>
