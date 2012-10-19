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
	 * _DB_table_name_countries_phrases
	 * 
	 * @var string	This is name of Database
	 */
	static private $_DB_table_name_phrases;

	/**
	 * getAuthData
	 *
	 * This function get authorization data from Database
	 *
	 * @return array $data	This is authorization data from Database
	 */
	static public function getClientsDataFromDB() {

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
		$select_clients = self::dbConnect() -> query("
			SELECT * 
			FROM 
				" . self::$_DB_table_name_clients . ", 
				" . self::$_DB_table_name_countries . ", 
				" . self::$_DB_table_name_cities . ",
				" . self::$_DB_table_name_photos . " 
			WHERE 
				" . self::$_DB_table_name_clients .".country = " . self::$_DB_table_name_countries . ".country_id
				AND " . self::$_DB_table_name_clients .".city = " . self::$_DB_table_name_cities . ".city_id
				AND 
					IF (" . self::$_DB_table_name_clients .".photo = '0', " . self::$_DB_table_name_photos . ".photo_id = '1', " . self::$_DB_table_name_clients .".photo = " . self::$_DB_table_name_photos . ".photo_id)
		");

		/**
		 * Create array in cycle
		 */
		while ($row = $select_clients -> fetch(PDO::FETCH_ASSOC)) {

			/**
			 * Set photo path
			 */
			$row['photo_name'] = Config::dataArray('server', 'dot').Config::dataArray('server', 'slash').Config::dataArray('paths', 'public').Config::dataArray('paths', 'images').Config::dataArray('paths', 'uploads_client').$row['photo_name'];

			$data_array[] = $row;
		}

		/**
		 * Return array from DB
		 */
		return (isset($data_array)) ? $data_array : false;

/*
		try {

			while ($row = $select_clients -> fetch(PDO::FETCH_ASSOC)) {

				$data[] = $row;
			}

			if ($data) {
				return $data;
			}

		} catch (E_NOTICE $object) {
			
			return false;
		}
*/
	}

	/**
	 * getAllCountries
	 *
	 * This function get all countries from Database
	 *
	 * @return array $countries This is countries id and name
	 */
	static public function getAllCountriesFromDB() {

		/**
		 * Set adminisrator variable
		 */
		self::$_DB_table_name_countries = Config::dataArray('table_name', 'countries');

		/**
		 * Select administrator information
		 */
		$select_countries = self::dbConnect() -> query("
			SELECT `country_id`, `countryname_en`
			FROM " . self::$_DB_table_name_countries . "
			ORDER BY `countryname_en`
		");

		/**
		 * Get our countries
		 */
		while ($row = $select_countries -> fetch(PDO::FETCH_ASSOC)) {

			$data_array[$row['country_id']] = $row['countryname_en'];
		}

		return (isset($data_array) and is_array($data_array)) ? $data_array : false;
	}

	/**
	 * getAllCountries
	 *
	 * This function get all countries from Database
	 *
	 * @return array $countries This is countries id and name
	 */
	static public function getCitiesFromDB($country_id = '') {

		/**
		 * Set adminisrator variable
		 */
		self::$_DB_table_name_cities = Config::dataArray('table_name', 'cities');

		/**
		 * Select administrator information
		 */
		$select_cities = self::dbConnect() -> query("
			SELECT `city_id`, `cityname_en`
			FROM " . self::$_DB_table_name_cities . "
			WHERE `country_id` = '$country_id'
			ORDER BY `cityname_en`");

		/**
		 * Get our countries
		 */
		while ($row = $select_cities -> fetch(PDO::FETCH_ASSOC)) {

			$data_array[$row['city_id']] = $row['cityname_en'];
		}

		return (isset($data_array) and is_array($data_array)) ? $data_array : false;
	}

	/**
	 * deleteClientFromDB
	 *
	 * This function delete client from Database
	 *
	 * @return array $phrase_text	This is phrase from Database
	 */
	static public function deleteClientFromDB($id) {

		/**
		 * Validate administrator id
		 */
		if (ValidateData::filterValidate($id, ValidateData::DATA_INT)) {

			/**
			 * Set adminisrator variable
			 */
			self::$_DB_table_name_clients = Config::dataArray('table_name', 'clients');

			/**
			 * Delete client from DB
			 */
			$delete_client = self::dbConnect() -> exec("
				DELETE 
				FROM " . self::$_DB_table_name_clients . "
				WHERE `id` = '$id'
			");
		}

		/**
		 * If client deleted return true else false
		 */
		return ($delete_client) ? true : false;
	}

	/**
	 * getRandomPhrase
	 *
	 * This function get random phrase from Database
	 *
	 * @return array $phrase_text	This is phrase from Database
	 */
	static public function getRandomPhraseFromDB() {

		/**
		 * Set adminisrator variable
		 */
		self::$_DB_table_name_phrases = Config::dataArray('table_name', 'phrases');

		/**
		 * Select administrator information
		 */
		$select_chrase = self::dbConnect() -> query("SELECT `phrase_text` FROM " . self::$_DB_table_name_phrases . " ORDER BY RAND() LIMIT 1");

		/**
		 * Get our phrase
		 */
		$phrase_text = $select_chrase -> fetch(PDO::FETCH_ASSOC);

		return (isset($phrase_text)) ? $phrase_text['phrase_text'] : false;
	}
}
?>
