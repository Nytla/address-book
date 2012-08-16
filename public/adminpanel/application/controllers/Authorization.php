<?php
//http://habrahabr.ru/post/13726/
//http://programmer-weekdays.ru/archives/125
//http://docstore.mik.ua/orelly/webprog/pcook/ch08_11.htm
//http://raza.narfum.org/post/1/user-authentication-with-a-secure-cookie-protocol-in-php/
		


/**
 * Adress Book Controller
 * 
 * Authorization.php
 *
 * This is administrator authorization file
 * 
 * @category	Main
 * @copyright	2012
 * @author	Igor Zhabskiy <Zhabskiy.Igor@googlemail.com>
 */

/**
 * Authorization
 * 
 * This is administrator authorization class
 * 
 * @version 0.1
 */
class Authorization extends Templating {

	/**
	 * _authorization_model
	 * 
	 * @var object	This is administrator information from DB 
	 */
	private $_authorization_model;

	/**
	 * _admin_id
	 * 
	 * @var string	This is id of administrator
	 */
	private $_admin_id;

	/**
	 * _admin_login
	 * 
	 * @var string	This is login of administrator
	 */
	private $_admin_login;

	/**
	 * _admin_password
	 * 
	 * @var string	This is password of administrator
	 */
	private $_admin_password;

	/**
	 * Constructor
	 *
	 * This function get adminisrator information from Database
	 */
	public function __construct() {

		$this -> _authorization_model = new AuthorizationModel();
	}

	/**
	 * makeAuth
	 *
	 * This function make authorization
	 *
	 * @return string $tempalate	This is source authorization tempalate
	 */
	public function makeAuth() {

		/**
		 * Create header content
		 */
		$template = Indexes::headerContent();

		/**
		 * Create css or/and javascript content
		 */
		$name = Config::dataArray('flags', 'js');

		$flag = array("", "$name");

		$file = Config::dataArray('authorization', 'path').Config::dataArray('authorization', 'js');

		$path = array("", "$file");

		$template .= Indexes::scriptsContent($flag, $path);

		/**
		 * Create authorization content
		 */
		$template_name = Config::dataArray('templates', 'authorization');

		$params = array(
			"site_url"		=> Config::dataArray('server', 'slash').Config::dataArray('paths', 'adminpanel'),
			"site_name"		=> Locale::languageEng('site', 'name'),
			"auth"			=> Locale::languageEng('authorization', 'auth'),
			'login'			=> Locale::languageEng('authorization', 'login'),			
			'password'		=> Locale::languageEng('authorization', 'password'),
			"error_incorect"	=> Locale::languageEng('authorization', 'error_incorect'),
			"error_empty"		=> Locale::languageEng('authorization', 'error_empty'),
		);

		$template .= Templating::renderingTemplate($template_name, $params);

		/**
		 * Create footer content
		 */
		$template .= Indexes::footerContent();

		return $template;
	}

	/**
	 * validateAuth
	 *
	 * This function check authorization
	 *
	 * @return string $tempalate	This is source authorization tempalate
	 */
	public function validateAuth($admin_login, $admin_password) {

		if (is_array($this -> _authorization_model -> getAuthDataByLogin($admin_login))) {

			/**
			 * Get adminisrator information from DB
			 */
			$admin_data_array = array_shift($this -> _authorization_model -> getAuthDataByLogin($admin_login));

			/**
			 * Set adminisrator variables
			 */
			$this -> _admin_id = $admin_data_array['admin_id'];

			$this -> _admin_login = $admin_login;

			$this -> _admin_password = md5(md5($admin_password));

			/**
			 * If isset admin_login than ...
			 */
			if ($admin_data_array['admin_password'] === $this -> _admin_password) {

				/**
				 * Generate hash
				 */
				$hash = md5($this -> hashGenerator(10));

				/**
				 * Update hash in DB
				 */
				$this -> _authorization_model -> updateHash($admin_data_array['admin_id'], $hash);

				/**
				 * Set cookie with admin id and admin hash
				 */
				Cookie::set('admin_id', $admin_data_array['admin_id'], Cookie::SESSION_EXPIRE);//Cookie::THIRTY_DAYS);

				Cookie::set('admin_hash', $hash, Cookie::SESSION_EXPIRE);//Cookie::THIRTY_DAYS);

				/**
				 * Check administator information
				 */
				$this -> checkAuth();
	
				/**
				 * Redirect on page layout
				 */
				//Redirect::uriRedirect('', 'page_layout.php')

//				return true;

				$arr = 'Oops';

				return json_encode(array('validate' => true,'redirect_file' => Config::dataArray('redirect_page', 'page_layout'), 'arr_test' => $arr));

				//return 'Yes';//Redirect on page layout

			} else {

				return false;

				//return 'No';//Redirect on authorization page

			}

		} else {

			//echo 'NO00';

			return false;
		}
	}

	/**
	 * checkAuth
	 *
	 * This function check authorization
	 *
	 * @return string $tempalate	This is source authorization tempalate
	 */
	public function checkAuth() {

		//check.php
		# проверка авторизации
/*
		if (isset($_COOKIE['id']) and isset($_COOKIE['hash']))
		{    
			$userdata = mysql_fetch_assoc(mysql_query("SELECT * FROM users WHERE users_id = '".intval($_COOKIE['id'])."' LIMIT 1"));

			if(($userdata['users_hash'] !== $_COOKIE['hash']) or ($userdata['users_id'] !== $_COOKIE['id']))
			{
				setcookie('id', '', time() - 60*24*30*12, '/');
				setcookie('hash', '', time() - 60*24*30*12, '/');
				setcookie('errors', '1', time() + 60*24*30*12, '/');
				header('Location: login.php'); exit();
			} 
		}
		else
		{
		  setcookie('errors', '2', time() + 60*24*30*12, '/');
		  header('Location: login.php'); exit();
		}
*/

		

		/**
		 * Get adminisrator information from DB
		 */
		$this -> _authorization_model -> getAuthDataById();

		/**
		 * Check the cookie are set or no
		 */
		if (!Cookie::isEmpty('admin_id') and !Cookie::isEmpty('admin_hash')) {

			$this -> _authorization_model -> getAuthDataById();

			$admin_data_array = $this -> _authorization_model -> getAuthDataById();

			$admin_data_array = array_shift($admin_data_array);

			if ($admin_data_array['admin_hash'] !== $_COOKIE['admin_hash'] or $admin_data_array['admin_id'] !== $_COOKIE['admin_id']) {

				Cookie::delete('admin_id');

				Cookie::delete('hash');

				return false;
			} else {
				return true;

				//Redirect::uriRedirect('', 'page_layout.php');
			}
		}
	}

	/**
	 * hashGenerator
	 *
	 * This function generate hash
	 *
	 * @return string $tempalate	This is source authorization tempalate
	 */
	private function hashGenerator($length = 6) {

		$chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPRQSTUVWXYZ0123456789';
		
		$chars_length = strlen($chars);

		$clean = $chars_length - 1;

		$code = '';

		while(strlen($code) < $length) {
			$code .= $chars[mt_rand(0, $clean)];
		}
/*
		try {
			if ($data) {
				return $data;
			}

		} catch (E_NOTICE $object) {

			Redirect::uriRedirect('bad_connect');
		}
*/
		return $code;

	}

	/**
	 * Destructor
	 *
	 * This function delete adminisrator information
	 */
	public function __destruct() {

		$this -> _authorization_model = null;
	}
}
?>
