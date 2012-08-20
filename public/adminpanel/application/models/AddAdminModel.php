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
		$select_permission = $this -> _DB_connect -> query("SELECT `admin_permission` FROM " . $this -> _DB_table_name . " WHERE `admin_id` = '" . $this -> _admin_id . "' LIMIT 1");

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
}
?>
