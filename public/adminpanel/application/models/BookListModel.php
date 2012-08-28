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
	 * _DB_table_name_countries_phrases
	 * 
	 * @var string	This is name of Database
	 */
	static private $_DB_table_name_phrases;

	/**
	 * _DB_limit
	 * 
	 * @var string	This is limit for Database selections
	 */
	static private $_DB_limit = 10;


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
		self::$_DB_table_name_clients = Config::dataArray('table_name', 'clients');

		self::$_DB_table_name_countries = Config::dataArray('table_name', 'countries');

		self::$_DB_table_name_cities = Config::dataArray('table_name', 'cities');

		/**
		 * Select administrator information
		 */
		$select_clients = self::dbConnect() -> query("
			SELECT * FROM " . self::$_DB_table_name_clients . ", " . self::$_DB_table_name_countries . ", " . self::$_DB_table_name_cities . "
			WHERE " . self::$_DB_table_name_clients .".country = " . self::$_DB_table_name_countries . ".country_id
				AND " . self::$_DB_table_name_clients .".city = " . self::$_DB_table_name_cities . ".city_id
			ORDER BY `id`
			LIMIT " . self::$_DB_limit . "");

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
	}

	/**
	 * getAllCountries
	 *
	 * This function get all countries from Database
	 *
	 * @return array $countries	This is countries id and name
	 */
	static public function getAllCountries() {

		/**
		 * Set adminisrator variable
		 */
		self::$_DB_table_name_countries = Config::dataArray('table_name', 'countries');

		/**
		 * Select administrator information
		 */
		$select_countries = self::dbConnect() -> query("SELECT `country_id`, `countryname_en` FROM " . self::$_DB_table_name_countries . " ORDER BY `countryname_en`");

		/**
		 * Get our countries
		 */
		while ($row = $select_countries -> fetch(PDO::FETCH_ASSOC)) {

			$data_array[$row['country_id']] = $row['countryname_en'];
		}
		
		if ($data_array) {

			return $data_array;

		} else {
			return false;
		}
	}

	/**
	 * getAllCountries
	 *
	 * This function get all countries from Database
	 *
	 * @return array $countries	This is countries id and name
	 */
	public function getCities($country_id) {

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
		
		if ($data_array) {

			return json_encode(array('cities' => $data_array));

		} else {
			return json_encode(array('cities' => false));
		}
	}

	/**
	 * getRandomPhrase
	 *
	 * This function get random phrase from Database
	 *
	 * @return array $phrase_text	This is phrase from Database
	 */
	static public function getRandomPhrase() {

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

		if ($phrase_text) {

			return $phrase_text['phrase_text'];

		} else {
			return false;
		}
	}
}
?>
