<?php
/**
 * Adress Book
 * 
 * BookListModel.php
 *
 * This is administrator address book file
 * 
 * @category	Model
 * @copyright	2012
 * @author	Igor Zhabskiy <Zhabskiy.Igor@googlemail.com>
 */

/**
 * BookListModel
 * 
 * This is administrator address book list class
 * 
 * @version 0.1
 */
class BookListModel extends PDOMysqlConnect {

	/**
	 * getAuthData
	 *
	 * This function get authorization data from Database
	 *
	 * @return array $data	This is authorization data from Database
	 */
	static public function getClientsData() {

		/**
		 * Set adminisrator variable
		 */
//		$this -> _admin_id = intval(Cookie::get('admin_id'));

//		$this -> _DB_table_name = Config::dataArray('table_name', 'administrators');

		$_DB_table_name = Config::dataArray('table_name', 'administrators');

		/**
		 * Select administrator information
		 */
//		$select = $this -> _DB_connect -> query("SELECT * FROM " . $this -> _DB_table_name . " WHERE `admin_id` = '" . $this -> _admin_id . "' LIMIT 1");

//		$select = self::$_DB_connect -> query("SELECT * FROM " . $this -> _DB_table_name . " LIMIT 10");

		$select = self::$_DB_connect -> query("SELECT * FROM " . $_DB_table_name . " LIMIT 10");

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

}
