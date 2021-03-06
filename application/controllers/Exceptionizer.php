<?php
/**
 * Adress Book Controller
 * 
 * Exceptionizer.php
 *
 * This is exceptions file
 * 
 * @category	controllers
 * @copyright	2012
 * @author	Igor Zhabskiy <Zhabskiy.Igor@gmail.com>
 */

/**
 * Exceptionizer
 * 
 * This is exceptions class
 * 
 * @version 0.1
 */
class Exceptionizer {

	/**
	 * Constructor
	 *
	 * This is main constructor which run our main Exceptionizer class 
	 *
	 * @param strung $mask		code-level errors
	 * @param boolean $ignore_other	This is variable ignore or not error
	 */
	public function __construct($mask = E_ALL, $ignore_other = false) {

		$catcher = new PHP_Exceptionizer_Catcher();
		$catcher -> _mask = $mask;
		$catcher -> _ignore_other = $ignore_other;
		$catcher -> _divv_hdl = set_error_handler(array($catcher, "handler"));
	}

	/**
	 * Destructor
	 *
	 * This is destructor which delete object exception
	 *
	 * @param strung $mask		code-level errors
	 * @param boolean $ignore_other	This is variable ignore or not error
	 */
	public function __destruct() {
		restore_error_handler();
	}
}

/**
 * PHP_Exceptionizer_Catcher
 * 
 * This is inside class for our exceptions
 * 
 * @version 0.1
 */
class PHP_Exceptionizer_Catcher {
	
	/**
	 * _mask
	 * 
	 * @var string	This is type of our error
	 */
	public $_mask = E_ALL;

	/**
	 * _ignore_other
	 * 
	 * @var boolean	This variable determines the was idnore error or not ignore
	 */
	public $_ignore_other = false;

	/**
	 * _DB_password
	 * 
	 * @var string	This is previous handler of errors 
	 */
	public $_divv_hdl = null;

	/**
	 * handler
	 *
	 * This function handler php errors
	 *
	 * @param strung $errno		code-level errors
	 * @param string $errmsg	text of error
	 * @param sting $filename	this is name log file
	 * @param string $linenum	line number where the error occurred
	 */
	public function handler($errno, $errstr, $errfile, $errline) {

	/**
	 * If error_reporting == 0 than was used operator @
	 */
	if (!error_reporting()) return;

	if (!($errno & $this -> _mask)) {

		/**
		 * if error not ignore
		 */
		if (!$this -> _ignore_other) {
			if ($this -> _divv_hdl) {

				/**
				 * If isset previous handler call his
				 */
				$args = func_get_args();
				call_user_func_array($this -> _divv_hdl, $args);
			} else {
				return false;
			}
		}

		return true;
	}

	/**
	 * Get text type of error
	 */
	$types = array(
		"E_ERROR", 
		"E_WARNING", 
		"E_PARSE", 
		"E_NOTICE", 
		"E_CORE_ERROR",
		"E_CORE_WARNING", 
		"E_COMPILE_ERROR", 
		"E_COMPILE_WARNING",
		"E_USER_ERROR", 
		"E_USER_WARNING", 
		"E_USER_NOTICE", 
		"E_STRICT"
	);
	
	/**
	 * Formed class name by exception according to type error
	 */
	$className = __CLASS__ . "_" . "Exception";

	foreach ($types as $t) {
		$e = constant($t);
		if ($errno & $e) {
			$className = $t;
			break;
		}
	}

	/**
	 * Generate exception type
	 */
	throw new $className($errno, $errstr, $errfile, $errline);
	}
}

/**
 * PHP_Exceptionizer_Exception
 * 
 * This is main class for our exceptions
 * 
 * @version 0.1
 */
abstract class PHP_Exceptionizer_Exception extends Exception {
	
	/**
	 * _path_error_log
	 * 
	 * @var string	This is path to errors log
	 */
	private $_path_error_log;

	/**
	 * Constructor
	 *
	 * This constructor initialize parent constructor from Exception class
	 */
	public function __construct($no = 0, $str = null, $file = null, $line = 0) {

		parent::__construct($str, $no);
		
		$this -> file = $file;

		$this -> line = $line;

		$this -> writeMessageError();
	}

	/**
	 * writeMessageError
	 *
	 * This function write error message to errors.log
	 *
	 * @return string $message	This is message error or good
	 */
	private function writeMessageError() {

		if (isset($this -> code)) {

			$date = date("Y-m-d H:i:s (TZ)");
			
			$this -> _path_error_log = Config::dataArray('errors', 'path_error');

			$open = fopen($this -> _path_error_log, 'a');

			if (!empty($open) and $this -> code) {

				$err = "<error>\r\n";
				$err .= "	<date>$date</date>\r\n";
				$err .= "	<errcode>".$this -> code."</errcode>\r\n";
				$err .= "	<errmsg>".$this -> message."</errmsg>\r\n";
				$err .= "	<filename>".$this -> file."</filename>\r\n";
				$err .= "	<linenum>".$this -> line."</linenum>\r\n";
				$err .= "</error>\r\n";

				flock($open, LOCK_EX);

				fwrite($open, $err);

				flock($open, LOCK_UN);
			}
		}
	}

	/**
	 * Destructor
	 *
	 * This is destructor close open .log file
	 */
	public function __destruct() {}
}

/**
 * Create hierarchy serious error
 */
class E_EXCEPTION extends PHP_Exceptionizer_Exception {}
class AboveE_STRICT extends E_EXCEPTION {}
class E_STRICT extends AboveE_STRICT {}
class AboveE_NOTICE extends AboveE_STRICT {}
class E_NOTICE extends AboveE_NOTICE {}
class AboveE_WARNING extends AboveE_NOTICE {}
class E_WARNING extends AboveE_WARNING {}
class AboveE_PARSE extends AboveE_WARNING {}
class E_PARSE extends AboveE_PARSE {}
class AboveE_ERROR extends AboveE_PARSE {}
class E_ERROR extends AboveE_ERROR {}
class E_CORE_ERROR extends AboveE_ERROR {}
class E_CORE_WARNING extends AboveE_ERROR {}
class E_COMPILE_ERROR extends AboveE_ERROR {}
class E_COMPILE_WARNING extends AboveE_ERROR {}
class AboveE_USER_NOTICE extends E_EXCEPTION {}
class E_USER_NOTICE extends AboveE_USER_NOTICE {}
class AboveE_USER_WARNING extends AboveE_USER_NOTICE {}
class E_USER_WARNING extends AboveE_USER_WARNING {}
class AboveE_USER_ERROR extends AboveE_USER_WARNING {}
class E_USER_ERROR extends AboveE_USER_ERROR {}
?>
