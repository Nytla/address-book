<?php
/**
 * Adress Book Model
 * 
 * UserBookListModel.php
 *
 * This is user address book list file
 * 
 * @category	models
 * @copyright	2012
 * @author	Igor Zhabskiy <Zhabskiy.Igor@gmail.com>
 */

/**
 * UserBookListModel
 * 
 * This is user address book list class
 * 
 * @version 0.1
 */
final class UserBookListModel extends PDOMysqlConnect {

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
	 * getUserClientsDataFromDB
	 *
	 * This function get client data from Database
	 *
	 * @return array / boolean
	 */
	static public function getUserClientsDataFromDB($id) {

		/**
		 * Set variable with names of table 
		 */
		self::$_DB_table_name_clients	= Config::dataArray('table_name', 'clients');
		self::$_DB_table_name_countries = Config::dataArray('table_name', 'countries');
		self::$_DB_table_name_cities	= Config::dataArray('table_name', 'cities');
		self::$_DB_table_name_photos	= Config::dataArray('table_name', 'photos');
		
		/**
		 * Delete all symbols, except a numbers
		 */
		$client_id = preg_replace("/([^\d])/", "", $id);

		/**
		 * Select clients in DB
		 */
		$select_clients = self::dbConnect() -> query("
			SELECT 
				`id`,
				`first_name`,
				`last_name`,
				`email`,
				`notes`,
				`countryname_en`,
				`cityname_en`,
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
				" . self::$_DB_table_name_clients .".country = " . self::$_DB_table_name_countries . ".country_id
				AND 
				" . self::$_DB_table_name_clients .".city = " . self::$_DB_table_name_cities . ".city_id
				AND 
					IF (" . self::$_DB_table_name_clients .".photo = '0', " . self::$_DB_table_name_photos . ".photo_id = '1', " . self::$_DB_table_name_clients .".photo = " . self::$_DB_table_name_photos . ".photo_id)
				AND 
				" . self::$_DB_table_name_clients .".id = " . mysql_escape_string($client_id) . "
		");

		/**
		 * Create array in cycle
		 */
		while ($row = $select_clients -> fetch(PDO::FETCH_ASSOC)) {

			/**
			 * Set photo path
			 */
			$row['photo_name'] = Config::dataArray('image_settings', 'image_path') . $row['photo_name'];

			/**
			 * Set notes
			 */
			$row['notes'] = (!empty($row['notes'])) ? $row['notes'] : Locale::languageEng('book_list', 'no_notes');

			$data_array[] = $row;
		}

		/**
		 * Return array from DB
		 */
		return (isset($data_array)) ? $data_array : false;
	}

	/**
	 * getUserClientsRegionFromDB
	 *
	 * This function get client regions from Database
	 *
	 * @return array / boolean
	 */
	static public function getUserClientsRegionFromDB() {

		/**
		 * Set variable with names of table 
		 */
		self::$_DB_table_name_clients	= Config::dataArray('table_name', 'clients');
		self::$_DB_table_name_countries = Config::dataArray('table_name', 'countries');
		self::$_DB_table_name_cities	= Config::dataArray('table_name', 'cities');
		self::$_DB_table_name_photos	= Config::dataArray('table_name', 'photos');

		/**
		 * Select clients in DB
		 */
		$select_clients = self::dbConnect() -> query("
			SELECT 
				`countryname_en`,
				`cityname_en`
			FROM 
				" . self::$_DB_table_name_clients . ", 
				" . self::$_DB_table_name_countries . ", 
				" . self::$_DB_table_name_cities . " 
			WHERE 
				" . self::$_DB_table_name_clients .".country = " . self::$_DB_table_name_countries . ".country_id
				AND 
				" . self::$_DB_table_name_clients .".city = " . self::$_DB_table_name_cities . ".city_id
		");

		/**
		 * Create array in cycle
		 */
		while ($row = $select_clients -> fetch(PDO::FETCH_ASSOC)) {
			$data_array[] = $row;
		}

		/**
		 * Return array from DB
		 */
		return (isset($data_array)) ? $data_array : false;
	}
	
	/**
	 * UserClientsDataFromDBPro
	 * 
	 * This fucntion get client's data from DB
	 *
	 * @param string $where
	 * @param string $count_where
	 * @param string $order
	 * @param string $limit
	 * 
	 * @return array
	 */
	static public function UserClientsDataFromDB($where, $count_where, $order, $limit) {
		
		/**
		 * Set variable with name of tables 
		 */
		self::$_DB_table_name_clients	= Config::dataArray('table_name', 'clients');
		self::$_DB_table_name_countries = Config::dataArray('table_name', 'countries');
		self::$_DB_table_name_cities	= Config::dataArray('table_name', 'cities');
		self::$_DB_table_name_photos	= Config::dataArray('table_name', 'photos');

		/**
		 * Select clients in DB
		 */
		$select_clients = self::dbConnect() -> query("
			SELECT SQL_CALC_FOUND_ROWS 
				`id`,
				`email`,
				`notes`,
				`countryname_en`,
				`cityname_en`,
				`photo_name`,
				`photo_height`,
				`photo_width`,
				`photo_description`, 
				CONCAT(`first_name`, ' ', `last_name`) AS `name`
			FROM 
				" . self::$_DB_table_name_clients . ",
				" . self::$_DB_table_name_countries . ",
				" . self::$_DB_table_name_cities . ",
				" . self::$_DB_table_name_photos . " 
			WHERE 
				" . self::$_DB_table_name_clients .".country = " . self::$_DB_table_name_countries . ".country_id 
				AND 
				" . self::$_DB_table_name_clients .".city = " . self::$_DB_table_name_cities . ".city_id 
				AND 
				IF (" . self::$_DB_table_name_clients .".photo = '0', " . self::$_DB_table_name_photos . ".photo_id = '1', " . self::$_DB_table_name_clients .".photo = " . self::$_DB_table_name_photos . ".photo_id) 
				$where 
				$order 
				$limit
		");

		/**
		 * Create array in cycle
		 */
		$data_array = array();
		
		while ($row = $select_clients -> fetch(PDO::FETCH_ASSOC)) {
	
			$row['id'] = '<img width="20" height="20" alt="' . $row['id'] . '" src="/public/images/details_open.png">';
			
			/**
			 * Set photo path
			 */
			$row['photo_name'] = Config::dataArray('image_settings', 'image_path') . $row['photo_name'];

			/**
			 * Set notes
			 */
			$row['notes'] = (!empty($row['notes'])) ? $row['notes'] : Locale::languageEng('book_list', 'no_notes');
			
			$data_array[] = $row;
		}
		
		/**
		 * This query for count our row(s)
		 */
		$count_clients = self::dbConnect() -> query("
			SELECT 
				`id`
			FROM  
				" . self::$_DB_table_name_clients . ",
				" . self::$_DB_table_name_countries . ",
				" . self::$_DB_table_name_cities . "
			WHERE 
				" . self::$_DB_table_name_clients .".country = " . self::$_DB_table_name_countries . ".country_id 
				AND 
				" . self::$_DB_table_name_clients .".city = " . self::$_DB_table_name_cities . ".city_id 
				$where");
		
		/**
		 * Count our row(s)
		 */
		$row_count = $count_clients -> rowCount();

		/**
		 * Return array with client's data
		 */
		return array(
			'clients'	=> $data_array,
			'count'		=> $row_count
		);
	}
	
	/**
	 * getUserRandomPhraseFromDB
	 *
	 * This function get random phrase from Database
	 *
	 * @return array / boolean
	 */
	static public function getUserRandomPhraseFromDB() {

		/**
		 * Set variable with name of table
		 */
		self::$_DB_table_name_phrases = Config::dataArray('table_name', 'phrases');

		/**
		 * Select data from DB
		 */
		$select_chrase = self::dbConnect() -> query("
			SELECT `phrase_text` 
			FROM " . self::$_DB_table_name_phrases . " 
			ORDER BY RAND() 
			LIMIT 1
		");

		/**
		 * Get our phrase
		 */
		$phrase_text = $select_chrase -> fetch(PDO::FETCH_ASSOC);

		/**
		 * Return data with phrase
		 */
		return (isset($phrase_text)) ? $phrase_text['phrase_text'] : false;
	}
}
?>
