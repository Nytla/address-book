<?php
/**
 * Adress Book Model
 * 
 * EditClientModel.php
 *
 * This is administrator edit client record
 * 
 * @category	models
 * @copyright	2012
 * @author	Igor Zhabskiy <Zhabskiy.Igor@gmail.com>
 */

/**
 * EditClientModel
 * 
 * This is administrator address book edit client record class
 * 
 * @version 0.1
 */
final class EditClientModel extends PDOMysqlConnect {

	/**
	 * _DB_table_name_clients
	 * 
	 * @var string	This is name of Database
	 */
	static private $_DB_table_name_clients;

	/**
	 * _DB_table_name_countries
	 * 
	 * @var string	This is name of Database
	 */
	static private $_DB_table_name_countries;

	/**
	 * _DB_table_name_cities
	 * 
	 * @var string	This is name of Database
	 */
	static private $_DB_table_name_cities;

	/**
	 * _DB_table_name_photos
	 * 
	 * @var string	This is name of Database
	 */
	static private $_DB_table_name_photos;

	/**
	 * getClientDataFromDB
	 *
	 * This function get client data from DB
	 *
	 * @param string $edit_id
	 * @return array 
	 */
	static public function getClientDataFromDB($edit_id) {

		/**
		 * Clean client id
		 */
		$id = preg_replace("/([^\d])/", "", $edit_id);

		/**
		 * Set adminisrator variable
		 */
		self::$_DB_table_name_clients	= Config::dataArray('table_name', 'clients');

		self::$_DB_table_name_countries = Config::dataArray('table_name', 'countries');

		self::$_DB_table_name_cities	= Config::dataArray('table_name', 'cities');

		self::$_DB_table_name_photos	= Config::dataArray('table_name', 'photos');

		/**
		 * Select clients in DB
		 */
		$select_client = self::dbConnect() -> query("
			SELECT
				`first_name`,
				`last_name`,
				`email`,
				`country`,
				`city`,
				`notes`,
				`city_id`,
				`cityname_en`,
				`photo_id`,
				`photo_name`,
				`photo_height`,
				`photo_width`,
				`photo_description`
			FROM 
				" . self::$_DB_table_name_clients . ", 
				" . self::$_DB_table_name_countries . ", 
				" . self::$_DB_table_name_cities . ", 
				" . self::$_DB_table_name_photos . "
			WHERE 
				" . self::$_DB_table_name_clients .".id = '$id'
				AND " . self::$_DB_table_name_clients .".country = " . self::$_DB_table_name_countries . ".country_id
				AND " . self::$_DB_table_name_clients .".city = " . self::$_DB_table_name_cities . ".city_id
				AND IF (" . self::$_DB_table_name_clients .".photo = '0', " . self::$_DB_table_name_photos . ".photo_id = '1', " . self::$_DB_table_name_clients .".photo = " . self::$_DB_table_name_photos . ".photo_id)
		");

		/**
		 * Set data array from DB
		 */
		$data_array = $select_client -> fetch(PDO::FETCH_ASSOC);

		/**
		 * Set photo path
		 */
		if (is_array($data_array)) {
			$data_array['photo_name'] = Config::dataArray('image_settings', 'image_path') . $data_array['photo_name'];
		}

		/**
		 * Return data array
		 */
		return ($data_array) ? $data_array : array("flag" => false);
	}

	/**
	 * updateClientDataInDB
	 *
	 * This function update client data in DB
	 *
	 * @param array $client_data_array
	 * @return boolean
	 */
	static public function updateClientDataInDB($client_data_array) {

		/**
		 * Clean client id
		 */
		$client_id = preg_replace("/([^\d])/", "", $client_data_array['edit_id']);

		/**
		 * Set adminisrator variable
		 */
		self::$_DB_table_name_clients	= Config::dataArray('table_name', 'clients');

		/**
		 * Update client data in DB
		 */
		$update_data = self::dbConnect() -> exec("
			UPDATE " . self::$_DB_table_name_clients . "
			SET
				`first_name`	= '" . mysql_escape_string($client_data_array['first_name']) . "',
				`last_name`	= '" . mysql_escape_string($client_data_array['last_name']) . "',
				`email`		= '" . mysql_escape_string($client_data_array['email']) . "',
				`country`	= '" . mysql_escape_string($client_data_array['country']) . "',
				`city`		= '" . mysql_escape_string($client_data_array['city']) . "',
				`photo`		= '" . mysql_escape_string($client_data_array['photo_id']) . "',
				`notes`		= '" . mysql_escape_string($client_data_array['notes']) . "'
			WHERE 
				`id` = '$client_id'
		");

		return ($update_data) ? true : false;
	}
}
?>
