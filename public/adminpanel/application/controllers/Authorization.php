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
		$name = Config::dataArray('flag', 'js');

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
	public function validateAuth() {

//		$hash = $this -> hashGenerator();

		/* */
		if (Cookie::isEmpty('error')) {
			$error = Cookie::get('error');

			Cookie::delete('error');	
		}

		//sql

		//Cookie::set('my_test_igor_3', '7111', Cookie::SESSION_EXPIRE);

		//Cookie::set('my_test_igor_3', '8777', Cookie -> _session_expire);

		Cookie::delete('my_test_igor_2');


		return $this -> hashGenerator();

		


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
