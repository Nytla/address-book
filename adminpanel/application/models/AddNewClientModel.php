<?php
/**
 * Add New Client Model
 * 
 * AddNewClientModel.php
 *
 * This file is add new clients record to DB 
 * 
 * @category	models
 * @copyright	2012
 * @author	Igor Zhabskiy <Zhabskiy.Igor@googlemail.com>
 */

/**
 * AddNewClientModel
 * 
 * This is class add new clients record in DB
 * 
 * @version 0.1
 */
final class AddNewClientModel extends PDOMysqlConnect {

	/**
	 * _DB_table_name_clients
	 * 
	 * @var string	This is name of Database
	 */
	static private $_DB_table_name_clients;

	/**
	 * _DB_table_name_photos
	 * 
	 * @var string	This is name of Database
	 */
	static private $_DB_table_name_photos;

	/**
	 * insertPhotoNameInDb
	 *
	 * This function insert image name in Database
	 *
	 * @param string $photo_name
	 * @param string $photo_height
	 * @param string $photo_width
	 * @param string $photo_description
	 * @return integer / boolean
	 */
	static public function insertPhotoNameInDb($photo_name = '', $photo_height = '', $photo_width = '', $photo_description = '') {

		/**
		 * Set adminisrator variable
		 */
		self::$_DB_table_name_photos = Config::dataArray('table_name', 'photos');

		/**
		 * Add new administrator to DB
		 */
		$insert_photo = self::dbConnect() -> exec("
			INSERT INTO " . self::$_DB_table_name_photos . " 
				(`photo_id`, `photo_name`, `photo_height`, `photo_width`, `photo_description`) 
			VALUES 
				('', '" . mysql_escape_string($photo_name) . "', '" . mysql_escape_string($photo_height) . "', '" . mysql_escape_string($photo_width) . "', '" . mysql_escape_string($photo_description) . "')");

		if ($insert_photo) {

			$select_id = self::dbConnect() -> query("
				SELECT `photo_id` 
				FROM " . self::$_DB_table_name_photos . " 
				WHERE `photo_name` = '$photo_name'
			");

			$photo_id = $select_id -> fetch(PDO::FETCH_ASSOC);
		}

		return ($photo_id) ? $photo_id : false;
	}

	/**
	 * insertNewClientInDb
	 *
	 * This function insert image new client in Database
	 *
	 * @param string $first_name
	 * @param string $last_name
	 * @param string $email
	 * @param string $country
	 * @param string $city
	 * @param string $photo_id
	 * @param string $notes
	 * @return boolean
	 */
	static public function insertNewClientInDb($first_name, $last_name, $email, $country, $city, $photo_id = '', $notes = '') {

		/**
		 * Set adminisrator variable
		 */
		self::$_DB_table_name_clients = Config::dataArray('table_name', 'clients');

		$photo_id = ($photo_id) ? $photo_id : 1;

		/**
		 * Add new client to DB
		 */
		$insert_client = self::dbConnect() -> exec("
			INSERT INTO " . self::$_DB_table_name_clients . " 
				(`id`, `first_name`, `last_name`, `email`, `country`, `city`, `photo`, `notes`) 
			VALUES 
				('', '" . mysql_escape_string($first_name) . "', '" . mysql_escape_string($last_name) . "', '" . mysql_escape_string($email) . "', '" . mysql_escape_string($country) . "', '" . mysql_escape_string($city) . "', '" . mysql_escape_string($photo_id) . "', '" . mysql_escape_string($notes) . "')");

		return ($insert_client) ? true : false;
	}
}
?>
