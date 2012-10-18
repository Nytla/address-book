<?php
/**
 * Adress Book Model
 * 
 * EditRecordModel.php
 *
 * This is administrator edit client record
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
class EditRecordModel extends PDOMysqlConnect {

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
	 * This function make address book list
	 *
	 * @return string $tempalate	This is source address book tempalate
	 */
	public function getClientDataFromDB($edit_id) {

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
			SELECT * 
			FROM " . self::$_DB_table_name_clients . ", " . self::$_DB_table_name_countries . ", " . self::$_DB_table_name_cities . ", " . self::$_DB_table_name_photos . "
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
		$data_array['photo_name'] = Config::dataArray('server', 'dot').Config::dataArray('server', 'slash').Config::dataArray('paths', 'public').Config::dataArray('paths', 'images').Config::dataArray('paths', 'uploads_client').$data_array['photo_name'];

		/**
		 * Return data array
		 */
		return ($data_array) ? $data_array : array("flag" => false);
	}

	/**
	 * updateClientDataInDB
	 *
	 * This function make address book list
	 *
	 * @return string $tempalate	This is source address book tempalate
	 */
	public function updateClientDataInDB($client_data_array) {

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
		//$update_data = self::dbConnect() -> exec("UPDATE " . self::$_DB_table_name . "  SET `admin_hash` = '" . mysql_escape_string($hash) . "' WHERE `admin_id` = '" . $admin_id . "' ");

		//return ($update) ? true : false;

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
