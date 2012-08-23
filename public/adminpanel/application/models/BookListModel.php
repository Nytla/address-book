<?php
/**
 * Adress Book Model
 * 
 * BookListModel.php
 *
 * This is administrator address book file
 * 
 * @category	models
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
	 * _DB_table_name
	 * 
	 * @var string	This is name of Database
	 */
	static private $_DB_table_name;

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
		self::$_DB_table_name = Config::dataArray('table_name', 'clients');

		/**
		 * Select administrator information
		 */
		$select = self::dbConnect() -> query("SELECT * FROM " . self::$_DB_table_name . " LIMIT 10");

		try {

			while ($row = $select -> fetch(PDO::FETCH_ASSOC)) {

				$data[] = $row;
			}

			if ($data) {
				return $data;
			}

		} catch (E_NOTICE $object) {
			
			return false;
		}
	}
}
?>
