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
	 * _DB_search_keywords
	 * 
	 * @var string	This is keywords search for Database
	 */
	static private $_DB_search_keywords;

	/**
	 * _DB_search_country
	 * 
	 * @var string	This is country search for Database
	 */
	static private $_DB_search_country;

	/**
	 * _DB_search_city
	 * 
	 * @var string	This is country search for Database
	 */
	static private $_DB_search_city;

	/**
	 * _DB_field
	 * 
	 * @var string	This is name of field whish sortes for Database
	 */
	static private $_DB_field;

	/**
	 * _DB_order_sort
	 * 
	 * @var string	This is order (ASC/DESC) of sort field for Database
	 */
	static private $_DB_order_sort;

	/**
	 * _DB_page
	 * 
	 * @var string	This is page for Database
	 */
	static private $_DB_page;

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
		self::$_DB_table_name_clients	= Config::dataArray('table_name', 'clients');

		self::$_DB_table_name_countries = Config::dataArray('table_name', 'countries');

		self::$_DB_table_name_cities	= Config::dataArray('table_name', 'cities');

		/**
		 * Select clients in DB
		 */
		$select_clients = self::dbConnect() -> query("
			SELECT * 
			FROM " . self::$_DB_table_name_clients . ", " . self::$_DB_table_name_countries . ", " . self::$_DB_table_name_cities . "
			WHERE 
				" . self::$_DB_table_name_clients .".country = " . self::$_DB_table_name_countries . ".country_id
				AND " . self::$_DB_table_name_clients .".city = " . self::$_DB_table_name_cities . ".city_id

			ORDER BY `id`
			
		");

		//LIMIT 0," . self::$_DB_limit . "

		/**
		 * Create array in cycle
		 */ 
		while ($row = $select_clients -> fetch(PDO::FETCH_ASSOC)) {

			$data[] = $row;
		}

		/**
		 * Return array from DB
		 */
		return (isset($data)) ? $data : false;

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

		return (isset($phrase_text)) ? $phrase_text['phrase_text'] : false;
	}
}
?>
