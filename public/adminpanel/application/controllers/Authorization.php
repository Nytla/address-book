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
	public function validateAuth($login, $password) {

		/**
		 * Get adminisrator information from DB
		 */
//		$dataArray = AuthorizationModel::getAuthData();

		$AuthorizationModel = new AuthorizationModel();

		$dataArray = $AuthorizationModel -> getAuthData();


		$dataArray = $dataArray[1];

		print_r($dataArray);

		/**
		 * Set adminisrator variables
		 */
		$admin_id = $dataArray['admin_id'];

		$admin_login = 'admin';//$login;

		$admin_password = md5(md5('551514'));

//		self::$_admin_login = 'admin';//$_REQUEST['valueLogin'] = $login

//		self::$_admin_password = md5(md5('551514'));//$_REQUEST['valuePassword'] = $password

//		$hash = $this -> hashGenerator();

		/**
		 * If cookie error not empty then delete it
		 */
/*
		if (Cookie::isEmpty('error')) {
			$error = Cookie::get('error');

			Cookie::delete('error');
		}
*/
		/**
		 * If isset admin_login than ...
		 */
		if ($dataArray and $dataArray['admin_password'] == $admin_password) {

			/**
			 * Generate hash
			 */
			$hash = md5($this -> hashGenerator(10));

			/**
			 * Update hash in DB
			 */
			$AuthorizationModel -> updateHash($dataArray['admin_id'], $hash);

			/**
			 * Set cookie with admin id and admin hash
			 */
			Cookie::set('admin_id', $dataArray['admin_id'], Cookie::THIRTY_DAYS);

			Cookie::set('admin_hash', $hash, Cookie::THIRTY_DAYS);

			/**
			 * Check administator information
			 */
			$this -> checkAuth();
	
			//Redirect on page layout

			return 'yees';//Redirect on page layout

		} else {

			return 'noo';//Redirect on authorization page

		}

		//return $dataArray;
		

		/**
		 *
		 */
		//$login = preg_match("/^[a-zA-Z0-9]+$/", $login);

		//$password = ("/^[a-zA-Z0-9]+$/", $password);
/*		foreach ($dataArray as $key => $value) {

			if ($dataArray[$key]['adm_login'] == $login and $dataArray[$key]['adm_password'] == $password) {

			}

		}
*/

		# Вытаскиваем из БД запись, у которой логин равняеться введенному
		//$data = mysql_fetch_assoc(mysql_query("SELECT users_id, users_password FROM `users` WHERE `users_login`='".mysql_real_escape_string($_POST['login'])."' LIMIT 1"));
     



		//Cookie::set('my_test_igor_3', '7111', Cookie::SESSION_EXPIRE);

		//Cookie::set('my_test_igor_3', '8777', Cookie -> _session_expire);

		//Cookie::delete('my_test_igor_2');

		//return $this -> hashGenerator();

		


		//http://www.sql.ru/forum/actualthread.aspx?tid=674596

		//http://php.net/manual/ru/language.oop5.constants.php


	}

	/**
	 * checkAuth
	 *
	 * This function check authorization
	 *
	 * @return string $tempalate	This is source authorization tempalate
	 */
	public function checkAuth() {

		//Exceptionizer
		if (!Cookie::isEmpty('admin_id') and !Cookie::isEmpty('admin_hash')) {

			$userdata = mysql_fetch_assoc(mysql_query("SELECT * FROM users WHERE users_id = '".intval($_COOKIE['admin_id'])."' LIMIT 1"));

			//...

		}

/*
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
*/
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

		return $code;

	}

}
?>
