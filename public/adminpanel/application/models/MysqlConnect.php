<?php
<?php
/**
 * Adress Book Model
 * 
 * MysqlConnect.php
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
class MysqlConnect extends Exceptions {

	/**
	 *
	 */
	public function __construct() {

		try {

			//$connect = DB_DRIVER . ':host=' . DB_HOST . ';dbname=' . DB_NAME;

			$connect = Config::dataArray('db', 'driver') . ':host=' . Config::dataArray('db', 'host') . ';dbname=' . Config::dataArray('db', 'name');

			//$db = new PDO($connect, DB_USER, DB_PASSWORD);
	
			$db = new PDO($connect, Config::dataArray('db', 'login'), Config::dataArray('db', 'password'));

			

		} catch {

			

		}

	}

}



class MysqlDB {
	
	static function testFuncTwo() {
		echo 'OOPS_';
	}
	
}
?>