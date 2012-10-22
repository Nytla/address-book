<?php
/**
* Adress Book Controller
*
* Access.php
*
* This is administrator acces file
*
* @category	controllers
* @copyright	2012
* @author	Igor Zhabskiy <Zhabskiy.Igor@googlemail.com>
*/

/**
* Adress
*
* This is administrator acces class
*
* @version 0.1
*/
class Access extends Templating {

	/**
	 * _path_access_log
	 * 
	 * @var string	This is path to errors log
	 */
	static private $_path_access_log;

	/**
	 * httpRequested
	 *
	 * This function 
	 *
	 * @return string $tempalate This is source authorization tempalate
	 */
	public function httpRequested() {

		try {
			$flag = $_SERVER['HTTP_X_REQUESTED_WITH'];

			if($flag) {
				return true;
			}

		} catch (E_NOTICE $object) {

			Redirect::uriRedirect(404);
		}
	}

	/**
	 * writeAccessLog
	 *
	 * This function write access data in log
	 *
	 * @return string $tempalate	This is source authorization tempalate
	 */
	static public function writeAccessLog($parameters = '') {

		if (is_array($parameters)) {

			date_default_timezone_set("Europe/Kiev");
			
			$date = date("Y-m-d H:i:s (TZ)");
			
			self::$_path_access_log = Config::dataArray('errors', 'path_access');

			$open = fopen(self::$_path_access_log, 'a');

			if (!empty($open)) {

				/**
				 * Formed parameters
				 */
				$params = '';

				foreach ($parameters as $k => $v) {

					$params .= '		' . $k . ': ' . $v."\r\n";
				}

				/**
				 * Formed message
				 */
				$access = "<error acces>\r\n";
				$access .= "	<date>$date</date>\r\n";
				$access .= "	<parameters>\r\n";
				$access .= $params;
				$access .= "	</parameters>\r\n";
				$access .= "</error access>\r\n";

				flock($open, LOCK_EX);

				fwrite($open, $access);

				flock($open, LOCK_UN);
			}
		}
	}
}
?>
