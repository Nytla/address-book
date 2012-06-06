<?php
	ini_set('display_errors', 1);

	error_reporting(E_ALL | E_STRICT);

/**
 * class_admin_display.php
 * 
 * This file a main for admin
 * 
 * @author Igor Zhabskiy  <Zhabskiy.Igor@googlemail.com>
 * 
 * @copyring (c) 2012
 * 
**/

/**
 * AdminDisplay()
 * 
 * This class responsible for admin action and extends user class
 * 
 * @version 0.1
 **/

//class AdminDisplay extends UserDisplay {

class AdminDisplay {

	/**
	 * path_error_log
	 * 
	 * @var string This is path to errors log
	 */
	public $_path_error_log = '';
	
	/**
	 * config_file_path
	 * 
	 * @var string This is configuration file path
	**/
	public $_path_config_file = '';

	/**
	 * path_to_view
	 * 
	 * @var string This is path to template files
	**/
	public $_path_to_view = '';
	
	/**
	 * path_to_cache
	 * 
	 * @var string Path to cache
	**/
	public $_path_to_cache = '';

	/**
	  * Limit to DB
	  * 
	  * @var number	Limit users on one page
	**/
	private $_limit = 10;
	
	/**
	 * 
	 * errorsHandler
	 * 
	 * Set all error from  site
	 *
	 */
	public function errorsHandler() {
//    	set_error_handler (array(&$this, 'errorsLog'));

    	set_error_handler (array(&$this, 'errorsLog'), E_ALL);
	}
	
	/**
	 * 
	 * errorsLog
	 * 
	 * Write all errors in log file
	 *
	 * @param strung $errno		code-level errors
	 * @param string $errmsg	text of error
	 * @param sting $filename	this is name log file
	 * @param string $linenum	line number where the error occurred
	 * 
	*/
	public function errorsLog($errno, $errmsg, $filename, $linenum) {
		
		if (isset($errno)) {
			date_default_timezone_set("Europe/Kiev");
			
			$date = date("Y-m-d H:i:s (TZ)");
			
			$f = fopen($this -> _path_error_log, 'a');
			
			if (!empty($f)) {
				$err = "<error>\r\n";
				$err .= " <date>$date</date>\r\n";
				$err .= " <errno>$errno</errno>\r\n";
				$err .= " <errmsg>$errmsg</errmsg>\r\n";
				$err .= " <filename>$filename</filename>\r\n";
				$err .= " <linenum>$linenum</linenum>\r\n";
				$err .= " </error>\r\n";
				
				flock($f, LOCK_EX);
				
				fwrite($f, $err);
				
				flock($f, LOCK_UN);
			}
		}
	}

	/**
	 * 
	 * startSession
	 * 
	 * Start session in user part of site
	 * 
	 * @return boolean 1
	 * 
	*/	
	public function startSession() {

		session_start();

		return true;
	}

	/**
	 * 
	 * parseIniFile
	 * 
	 * Parse configuration file
	 *
	 * @param int	$new_id	first left_id (should start with 1)
	 *   
	 * @return array	$SysValue	config file content
	 * 
	*/
	private function parseIniFile($option, $file) {
		
		$config_values = parse_ini_file($this -> _path_config_file, 1);

		return $config_values[$option][$file];
	}
	
	/**
	 *
	 * templatesObjects
	 * 
	 * This is API for templates framework
	 * 
	 * @param string	$template_name This is a name of template
	 * @param array		$params	This is a variables for our template
	 * 
	 * @return string	$template Parse to our template
	 * 
	**/
	private function templatesObjects() {

		/**
		 * The first step to use Twig is to register its autoloader::
		**/
		Twig_Autoloader::register();

		/**
		 * Twig also comes with a filesystem loader::
		**/
		$loader = new Twig_Loader_Filesystem($this -> _path_to_view);
		
		/**
		 * Templates cache
		**/
		$twig = new Twig_Environment($loader, array(
			'cache' => $this -> _path_to_cache,
		));

		return $twig;
	}

	/**
	 *
	 * templatesRender
	 * 
	 * This is render function for templates framework
	 * 
	 * @return string	$template Parse to our template
	 * 
	**/
	private function templatesRender($template_name, $params) {
		
		$twig = $this -> templatesObjects();

		$template = $twig -> loadTemplate($template_name) -> render($params);

		return $template;
	}
	
	/**
	 * errorsPage
	 * 
	 * This is page for All errors
	 * 
	 * @return string	$template Parse to our template with error
	 * 
	 */
	public function errorsPage() {
	
		if (count($_GET) > 0) {
		
			$template_name = $this -> parseIniFile('admin_views', 'error');
			
			$error = (isset($_REQUEST['error'])) ? $_REQUEST['error'] : '';
			
			switch ($error) {

				case '401':
						
					$params = array(
						"title" => "Error 401 (Authorization Required)",
						"error_description" => "The request requires user authentication.",
						"site_name" => "Address Book"
					);
					
					break;
					
				case '403':
					
					$params = array(
						"title" => "Error 403 (Forbidden)",
						"error_description" => "Access to the requested resource is denied.",
						"site_name" => "Address Book"
					);
					
					break;
					
				case '404':
					
					$params = array(
						"title" => "Error 404 (Page Not Found)",
						"error_description" => "The requested document on the server is not found.",
						"site_name" => "Address Book"
					);
					
					break;
					
				case '500':
					
					$params = array(
						"title" => "Error 500 (Internal Server Error)",
						"error_description" => "Failed to configure the server or an external program.",
						"site_name" => "Address Book"
					);
					
					break;
					
				case '':
					
					$params = array(
						"title" => "Page Not Found",
						"error_description" => "Sorry, this page not found",
						"site_name" => "Address Book"
					);
					
					break;
						
				default:
					
					$params = array(
						"title" => "Page Not Found",
						"error_description" => "Sorry, this page not found",
						"site_name" => "Address Book"
					);
			}
			
			$template = $this -> templatesRender($template_name, $params);
		
			return $template;
		}
	}
	
	/**
	 * adminHeader
	 * 
	 * Prepare header template for admin
	 * 
	 * @return string	template Parse to our header template
	**/
	public function adminHeader() {

		if(empty($_GET)) {
			$template_name = $this -> parseIniFile('admin_views', 'header');

			$params = array(
				"site_name" => 'Address Book'
			);
			
			$template = $this -> templatesRender($template_name, $params);
			
			return $template;
		}
	}

	/**
	 * adminAuthorizationForm
	 * 
	 * This is form for admin authorization
	 * 
	 * @return string	$template Parse to our template with authorization form
	**/
	public function adminAuthorizationForm() {

		if (empty($_GET)) {
			$template_name = $this -> parseIniFile('admin_views', 'authorization');
			
			$params = array(
				'site_name' => 'Address Book',
			);

			$template = $this -> templatesRender($template_name, $params);

			return $template;
		}
	}

	/**
	 * adminAuthorization
	 * 
	 * Check admin authorization
	 * 
	 * @return integer	$redirect This is redirect variable (0 = no redirect, 1 = redirect)
	**/
	public function adminAuthorization($login, $password) {

		$redirect = 0;

		$admin_login = trim($this -> parseIniFile('admin', 'login'));
		
		$admin_password = trim($this -> parseIniFile('admin', 'password'));
		
		if(isset($admin_login) and isset($admin_password)) {
			if(isset($login) and isset($password)) {
				if($login == $admin_login and $password == $admin_password) {
					$redirect = 1;
				}
			}
		}

		if (isset($redirect) and $redirect == 1) {
			$_SESSION['login'] = $login;
			
			$_SESSION['password'] = $password;
		}

		return $redirect;
	}
	
	/**
	 * adminLayout
	 * 
	 * This is layout page for admin
	 * 
	 * @return string	$template Parse layout template
	**/
	public function adminLayout() {

		if(isset($_GET['layout']) and $_GET['layout'] == 1) {
			$template_name_1 = $this -> parseIniFile('admin_views', 'header');
			
			$template_name_2 = $this -> parseIniFile('admin_views', 'layout');
		
			$params = array(
				'site_name' => 'Page Layout',
			);

			$template = $this -> templatesRender($template_name_1, $params);

			$template .= $this -> templatesRender($template_name_2, $params);
			
			return $template;
		}
	}
	
	/**
	 * adminFooter
	 * 
	 * Prepare footer template for admin
	 * 
	 * @return string	template Parse to our footer template
	**/
	public function adminFooter() {
		if (empty($_GET)) {
			$template_name = $this -> parseIniFile('admin_views', 'footer');
	
			$params = array(
				'year' => date("Y"),
			);
	
			$template = $this -> templatesRender($template_name, $params);
	
			return $template;
		}
	}
}
?>
