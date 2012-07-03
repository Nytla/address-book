<?php
//http://framework.zend.com/manual/ru/zend.exception.previous.html
//http://habrahabr.ru/post/30399/

/*
	function testing() {
		
		try {
			$param = 0;

			$error = 'Errors this is.';

			$good = 'No error.';	

			$error = Exceptions::catchExept($param, $error, $good);

		} catch (Exception $e) {

			$error = 'Caught exception: ' . $e->getMessage();
	
		}

		return $error;

	}
*/



/**
 * Adress Book Controller
 * 
 * Exceptions.php
 *
 * This is exception file
 * 
 * @category	controllers
 * @copyright	2012
 * @author	Igor Zhabskiy  <Zhabskiy.Igor@googlemail.com>
 */

/**
 * Exceptions
 * 
 * This is exception class
 * 
 * @version 0.1
 */
class Exceptions extends Exception {

	/**
	 * _path_error_log
	 * 
	 * @var string This is path to errors log
	 */
	private $_path_error_log;

	/**
	 * catchExept
	 *
	 * This exception function
	 *
	 * @param void $parameter	This is parameter from code
	 * @param srting $message_error	This is error message
	 * @param string $message_good	This is good message
	 *
	 * @return string $message	This is message error or good
	 */
	public static function catchExept($parameter, $message_error = '', $message_good = '') {

		if (!$parameter) {
			/**
			 * Write message in errors.log
			 */
			$this -> writeMessageError();

			/**
			 * Display message_error
			 */
			throw new Exception($message_error);
		} else {

			/**
			 * Display message_good
			 */
			return $message_good;
		}
	}

	/**
	 * writeMessageError
	 *
	 * This function write error message to errors.log
	 *
	 * @param void $parameter	This is parameter from code
	 * @param srting $message_error	This is error message
	 * @param string $message_good	This is good message
	 *
	 * @return string $message	This is message error or good
	 */
	private function writeMessageError() {

		if (isset($this -> code)) {

			date_default_timezone_set("Europe/Kiev");
			
			$date = date("Y-m-d H:i:s (TZ)");
			
			$this -> _path_error_log = Config::dataArray('errors', 'path');

			$f = fopen($this -> _path_error_log, 'a');

			if (!empty($f)/* and $this -> code*/) {
				$err = "<error>\r\n";
				$err .= "	<date>$date</date>\r\n";
				$err .= "	<errcode>".$this -> code."</errcode>\r\n";
				$err .= "	<errmsg>".$this -> message."</errmsg>\r\n";
				$err .= "	<filename>".$this -> file."</filename>\r\n";
				$err .= "	<linenum>".$this -> line."</linenum>\r\n";
				$err .= "</error>\r\n";

				flock($f, LOCK_EX);
				
				fwrite($f, $err);
				
				flock($f, LOCK_UN);
			}
		}
	}
}
?>
