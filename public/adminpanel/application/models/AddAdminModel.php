<?php
/**
 * Adress Book
 * 
 * AddAdminModel.php
 *
 * This file is add administrator to DB 
 * 
 * @category	Model
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
	 * _admin_password
	 * 
	 * @var string	This is password of administrator
	 */
	private $_admin_password;

	/**
	 * adminPermission
	 *
	 * This function get permission for administrator from Database
	 *
	 * @return array $data	This is authorization data from Database
	 */
	public function adminPermission() {

		/**
		 * Set adminisrator variable
		 */
		$this -> _DB_table_name = Config::dataArray('table_name', 'administrators');

		$this -> _admin_id = intval(Cookie::get('admin_id'));

		/**
		 * Select administrator information
		 */
//		$select_permission = $this -> _DB_connect -> query("SELECT `admin_permission` FROM " . $this -> _DB_table_name . " WHERE `admin_id` = '" . $this -> _admin_id . "' LIMIT 1");

		$select_permission = self::$_DB_connect -> query("SELECT `admin_permission` FROM " . $this -> _DB_table_name . " WHERE `admin_id` = '" . $this -> _admin_id . "' LIMIT 1");
		try {

			while ($row = $select_permission -> fetch(PDO::FETCH_ASSOC)) {

				if ($row['admin_permission']) {
					return true; 
				}
			}

		} catch (E_NOTICE $object) {

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
	public function checkAdminExist($login = '') {

		/**
		 * Set adminisrator variable
		 */
		$this -> _DB_table_name = Config::dataArray('table_name', 'administrators');

		$this -> _admin_login = $login;

		$select_login = $this -> _DB_connect -> query("SELECT `admin_id` FROM " . $this -> _DB_table_name . "  WHERE `admin_login` = '" . mysql_escape_string($this -> _admin_login) . "' ");

		try {

			while ($row = $select_login -> fetch(PDO::FETCH_ASSOC)) {

				if ($row['admin_id']) {
					return true; 
				}
			}

		} catch (E_NOTICE $object) {

			return false;
		}
	}

	/**
	 * addAdminToDB
	 *
	 * This function add new administrator to DB
	 *
	 * @return boolean
	 */
	public function addAdminToDB($password = '') {

		/**
		 * Set adminisrator variable
		 */
		$this -> _admin_password = md5(md5($password));

		/**
		 * Add new administrator to DB
		 */
		$insert_admin = $this -> _DB_connect -> exec("INSERT INTO " . $this -> _DB_table_name . " (`admin_id`, `admin_login`, `admin_password`, `admin_hash`, `admin_permission`) VALUES ('', '" . mysql_escape_string($this -> _admin_login) . "', '" . mysql_escape_string($this -> _admin_password) . "', '', 0)");

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
