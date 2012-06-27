<?php
//http://www.pcre.ru/docs/apache/text/modrewrite-1/



/**
 * Adress Book
 * 
 * AuthorizationModel.php
 *
 * This is administrator authorization file
 * 
 * @category	Main
 * @copyright	2012
 * @author	Igor Zhabskiy <Zhabskiy.Igor@googlemail.com>
 */

/**
 * AuthorizationModel
 * 
 * This is administrator authorization class
 * 
 * @version 0.1
 */
class AuthorizationModel {

	/**
	 * _DB_connect
	 * 
	 * @var object	This is connect to our Database
	 */
	public $_DB_connect;

	/**
	 * _DB_encoding
	 * 
	 * @var string	This is encoding of our Database
	 */
	public $_DB_table_name;

	/**
	 * Constructor
	 *
	 * This constructor initialize connect to our Database
	 *
	 */
	public function __construct() {

		/**
		 * Initialize connect to Database
		 */
		//$this -> _DB_connect = PDOMysql::connect();

		/**
		 * Set our table name
		 */
		//$this -> _DB_table_name = Config::dataArray('table_name', 'clients');

		//$this -> _DB_table_name = '444)';

	}

	/**
	 * getAuthData
	 *
	 * This function get authorization data from Database
	 *
	 * @return array $data	This is authorization data from Database
	 */
	public function getAuthData() {

		$this -> _DB_connect = PDOMysql::connect();

		$this -> _DB_table_name = Config::dataArray('table_name', 'clients');

		$select = $this -> _DB_connect -> query("SELECT * FROM " . $this -> _DB_table_name . "");

		try {			
			Exceptions::catchExept($select);

			while ($row = $select -> fetch(PDO::FETCH_ASSOC)) {

				$data[$row['id']] = $row;
			}

			return $data;
		
		} catch (Exception $e) {

			//return $error = 'Caught exception: ' . $e->getMessage();

			Redirect::uriRedirect('bad_connect');
		}

	}

	/**
	 *
	 */
	public function updateHash() {

		return 'TEST' . $this -> _DB_table_name . ' f';

		$select = $this -> _DB_connect -> query("SELECT * FROM " . $this -> _DB_table_name . "");

		try {

			Exceptions::catchExept($select);

			while ($row = $select -> fetch(PDO::FETCH_ASSOC)) {

				$data[$row['id']] = $row;
			}

			return $data;
		
		} catch (Exception $e) {

			//return $error = 'Caught exception: ' . $e->getMessage();
	
		}

	}


}
?>
