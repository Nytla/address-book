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

		/**
		 * Select clients in DB
		 */
		$select_clients = self::dbConnect() -> query("
			SELECT * 
			FROM " . self::$_DB_table_name_clients . ", " . self::$_DB_table_name_countries . ", " . self::$_DB_table_name_cities . "
			WHERE 
				" . self::$_DB_table_name_clients .".country = " . self::$_DB_table_name_countries . ".country_id
				AND " . self::$_DB_table_name_clients .".city = " . self::$_DB_table_name_cities . ".city_id
		");

		/**
		 * Create array in cycle
		 */
		//$clients_array = array();

		while ($row = $select_clients -> fetch(PDO::FETCH_ASSOC)) {

			

			$data_array[] = $row;

			//$clients_array_new = array($row['id'], $row['first_name'] . " " . $row['last_name'], $row['countryname_en'], $row['cityname_en']);

			//array_push($clients_array, $clients_array_new);
		}
/*
		echo '<pre>';

		print_r($data_array);
*/
		/**
		 * Return array from DB
		 */
		return (isset($data_array)) ? $data_array : false;

//		return (isset($clients_array)) ? $clients_array : false;

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

		if (isset($id)) {

			/**
			 * Clean id and leave only number
			 */
			$id_valid = preg_replace("/([^\d])/", "", $id);

			/**
			 * Set adminisrator variable
			 */
			self::$_DB_table_name_clients	= Config::dataArray('table_name', 'clients');

			/**
			 * Delete client from DB
			 */
			$delete_client = self::dbConnect() -> exec("
				DELETE 
				FROM " . self::$_DB_table_name_clients . "
				WHERE `id` = '$id_valid'
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





	/**
	 * ajaxProcessing
	 *
	 * This function get clients information from DB in JSON format
	 *
	 * @return object	This is JSON object from DB
	 */
	public function ajaxProcessing() {

		/* Array of database columns which should be read and sent back to DataTables. Use a space where
		 * you want to insert a non-database field (for example a counter or static image)
		 */
		$aColumns = array( 'first_name', 'last_name', 'country', 'city', 'grade' );
	
		/* Indexed column (used for fast and accurate table cardinality) */
		$sIndexColumn = "id";

		/* 
		 * Paging
		 */
		$sLimit = "";
		if ( isset( $_GET['iDisplayStart'] ) && $_GET['iDisplayLength'] != '-1' )
		{
			$sLimit = "LIMIT ".mysql_real_escape_string( $_GET['iDisplayStart'] ).", ".
				mysql_real_escape_string( $_GET['iDisplayLength'] );
		}
	
	
		/*
		 * Ordering
		 */
		$sOrder = "";
		if ( isset( $_GET['iSortCol_0'] ) )
		{
			$sOrder = "ORDER BY  ";
			for ( $i=0 ; $i<intval( $_GET['iSortingCols'] ) ; $i++ )
			{
				if ( $_GET[ 'bSortable_'.intval($_GET['iSortCol_'.$i]) ] == "true" )
				{
					$sOrder .= "`".$aColumns[ intval( $_GET['iSortCol_'.$i] ) ]."` ".
					 	mysql_real_escape_string( $_GET['sSortDir_'.$i] ) .", ";
				}
			}
		
			$sOrder = substr_replace( $sOrder, "", -2 );
			if ( $sOrder == "ORDER BY" )
			{
				$sOrder = "";
			}
		}
	
	
		/* 
		 * Filtering
		 * NOTE this does not match the built-in DataTables filtering which does it
		 * word by word on any field. It's possible to do here, but concerned about efficiency
		 * on very large tables, and MySQL's regex functionality is very limited
		 */
		$sWhere = "";
		if ( isset($_GET['sSearch']) && $_GET['sSearch'] != "" )
		{
			$sWhere = "WHERE (";
			for ( $i=0 ; $i<count($aColumns) ; $i++ )
			{
				$sWhere .= "`".$aColumns[$i]."` LIKE '%".mysql_real_escape_string( $_GET['sSearch'] )."%' OR ";
			}
			$sWhere = substr_replace( $sWhere, "", -3 );
			$sWhere .= ')';
		}
	
		/* Individual column filtering */
		for ( $i=0 ; $i<count($aColumns) ; $i++ )
		{
			if ( isset($_GET['bSearchable_'.$i]) && $_GET['bSearchable_'.$i] == "true" && $_GET['sSearch_'.$i] != '' )
			{
				if ( $sWhere == "" )
				{
					$sWhere = "WHERE ";
				}
				else
				{
					$sWhere .= " AND ";
				}
				$sWhere .= "`".$aColumns[$i]."` LIKE '%".mysql_real_escape_string($_GET['sSearch_'.$i])."%' ";
			}
		}
	
	
		/*
		 * SQL queries
		 * Get data to display
		 */
		$sQuery = "
			SELECT SQL_CALC_FOUND_ROWS `".str_replace(" , ", " ", implode("`, `", $aColumns))."`
			FROM   $sTable
			$sWhere
			$sOrder
			$sLimit
			";
//		$rResult = mysql_query( $sQuery, $gaSql['link'] ) or fatal_error( 'MySQL Error: ' . mysql_errno() );
	
		$rResult = self::dbConnect() -> query( $sQuery ) or fatal_error( 'MySQL Error: ' . mysql_errno() );
	

		/* Data set length after filtering */
		$sQuery = "
			SELECT FOUND_ROWS()
		";

		$rResultFilterTotal = mysql_query( $sQuery, $gaSql['link'] ) or fatal_error( 'MySQL Error: ' . mysql_errno() );

		$aResultFilterTotal = mysql_fetch_array($rResultFilterTotal);

		$iFilteredTotal = $aResultFilterTotal[0];
	
		/* Total data set length */
		$sQuery = "
			SELECT COUNT(`".$sIndexColumn."`)
			FROM   $sTable
		";
		$rResultTotal = mysql_query( $sQuery, $gaSql['link'] ) or fatal_error( 'MySQL Error: ' . mysql_errno() );
		$aResultTotal = mysql_fetch_array($rResultTotal);
		$iTotal = $aResultTotal[0];
	
	
		/*
		 * Output
		 */
		$output = array(
			"sEcho" => intval($_GET['sEcho']),
			"iTotalRecords" => $iTotal,
			"iTotalDisplayRecords" => $iFilteredTotal,
			"aaData" => array()
		);
	
		while ( $aRow = mysql_fetch_array( $rResult ) )
		{
			$row = array();
			for ( $i=0 ; $i<count($aColumns) ; $i++ )
			{
				if ( $aColumns[$i] == "version" )
				{
					/* Special output formatting for 'version' column */
					$row[] = ($aRow[ $aColumns[$i] ]=="0") ? '-' : $aRow[ $aColumns[$i] ];
				}
				else if ( $aColumns[$i] != ' ' )
				{
					/* General output */
					$row[] = $aRow[ $aColumns[$i] ];
				}
			}
			$output['aaData'][] = $row;
		}
	
		return json_encode( $output );
	}






}
?>
