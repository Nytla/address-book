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
 * @category	controllers
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
		$template = Indexes::headerContent(Locale::languageEng('authorization', 'title'), 1);

		/**
		 * Create css or/and javascript content
		 */
		$jquery = Config::dataArray('jquery_lib', 'path').Config::dataArray('jquery_lib', 'jquery');

		$auth = Config::dataArray('javascript', 'path').Config::dataArray('javascript', 'authorization');

		$js = array("$jquery", "$auth");

		$template .= Indexes::scriptsContent('', $js);

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
			'login_button'		=> Locale::languageEng('authorization', 'login_button'),
			"error_incorect"	=> Locale::languageEng('authorization', 'error_incorect'),
			"error_empty"		=> Locale::languageEng('authorization', 'error_empty'),
		);

		/**
		 * Rendering our tempalate
		 */
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
	public function validateAuth($admin_login = '', $admin_password = '') {

		$admin_data_array = AuthorizationModel::getAuthDataByLogin($admin_login);

		if (is_array($admin_data_array)) {

			/**
			 * Get adminisrator information from DB
			 */
			$admin_data_array = AuthorizationModel::getAuthDataByLogin($admin_login);

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
				AuthorizationModel::updateHash($admin_data_array['admin_id'], $hash);

				/**
				 * Set cookie with admin id and admin hash
				 */
				Cookie::set('admin_id', $admin_data_array['admin_id'], Cookie::THIRTY_DAYS);

				Cookie::set('admin_hash', $hash, Cookie::THIRTY_DAYS);

				/**
				 * Check administator information
				 */
				$this -> checkAuth();

				return json_encode(array('validate' => true, 'redirect_file' => Config::dataArray('redirect_page', 'layout')));

			} else {

				return json_encode(array('validate' => false, 'redirect_file' => Config::dataArray('redirect_page', 'index')));
			}

		} else {
			return json_encode(array('validate' => false, 'redirect_file' => Config::dataArray('redirect_page', 'index')));
		}
	}

	/**
	 * checkAuth
	 *
	 * This function check authorization
	 *
	 * @return string $tempalate	This is source authorization tempalate
	 */
	private function checkAuth() {

		//Check cookie from administrator
		if (Cookie::exists('admin_id') or Cookie::exists('admin_hash')) {

			/**
			 * Get adminisrator information from DB
			 */
			$admin_data_array = AuthorizationModel::getAuthDataById();

			if ($admin_data_array['admin_hash'] !== $_COOKIE['admin_hash'] or $admin_data_array['admin_id'] !== $_COOKIE['admin_id']) {

				Cookie::delete('admin_id');

				Cookie::delete('admin_hash');

				return false;
			} else {
				return true;
			}
		}
	}

	/**
	 * checkAuthIndex
	 *
	 * This function check authorization on index page
	 *
	 * @return boolean
	 */
	public function checkAuthIndex() {

		/**
		 * Check the cookie are set or no
		 */
		if (Cookie::exists('admin_id') or Cookie::exists('admin_hash')) {

			if (is_array(AuthorizationModel::getAuthDataById())) {

				/**
				 * Get adminisrator information from DB and take first array element
				 */
				$admin_data_array = AuthorizationModel::getAuthDataById();

				/**
				 * Check administrator information
				 */
				if ($admin_data_array['admin_hash'] !== $_COOKIE['admin_hash'] or $admin_data_array['admin_id'] !== $_COOKIE['admin_id']) {
					return false;
				} else {
					Redirect::uriRedirect(301, Config::dataArray('redirect_page', 'layout'));
				}
			} else {
				return false;
			}

		} else {
			return false;
		}
	}

	/**
	 * checkAuthNotIndex
	 *
	 * This function check authorization on not index page
	 *
	 * @return boolean
	 */
	public function checkAuthNotIndex() {

		/**
		 * Check the cookie are set or no
		 */
		if (Cookie::exists('admin_id') or Cookie::exists('admin_hash')) {

			if (is_array(AuthorizationModel::getAuthDataById())) {

				/**
				 * Get adminisrator information from DB and take first array element
				 */
				$admin_data_array = AuthorizationModel::getAuthDataById();

				if ($admin_data_array['admin_hash'] !== $_COOKIE['admin_hash'] or $admin_data_array['admin_id'] !== $_COOKIE['admin_id']) {

					Cookie::delete('admin_id');

					Cookie::delete('admin_hash');

					Redirect::uriRedirect(301, Config::dataArray('redirect_page', 'index'));
				} else {
					return true;
				}
			} else {
				Redirect::uriRedirect(301, Config::dataArray('redirect_page', 'index'));
			}

		} else {
			Redirect::uriRedirect(301, Config::dataArray('redirect_page', 'index'));
		}
	}

	/**
	 * checkAuthAdminPermission()
	 *
	 * This function check authorization on not index page and adminisrator permission 
	 *
	 * @return boolean
	 */
	public function checkAuthAdminPermission() {

		/**
		 * Check the cookie are set or no
		 */
		if (Cookie::exists('admin_id') or Cookie::exists('admin_hash')) {

			if (is_array(AuthorizationModel::getAuthDataById())) {

				/**
				 * Get adminisrator information from DB and take first array element
				 */
				$admin_data_array = AuthorizationModel::getAuthDataById();

				/**
				 * Check administrator information
				 */
				if ($admin_data_array['admin_hash'] !== $_COOKIE['admin_hash'] or $admin_data_array['admin_id'] !== $_COOKIE['admin_id'] or (int) $admin_data_array['admin_permission'] !== 1) {

					Cookie::delete('admin_id');

					Cookie::delete('admin_hash');

					Redirect::uriRedirect(301, Config::dataArray('redirect_page', 'index'));
				} else {
					return true;
				}
			} else {
				Redirect::uriRedirect(301, Config::dataArray('redirect_page', 'index'));
			}

		} else {
			Redirect::uriRedirect(301, Config::dataArray('redirect_page', 'index'));
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

		/**
		 * Create code in cycle
		 */
		while(strlen($code) < $length) {
			$code .= $chars[mt_rand(0, $clean)];
		}

		/**
		 * Return code or false
		 */
		return (isset($code)) ? $code : false;
/*
		if ($code) {
			return $code;
		} else {
			return false;
		}
*/
	}
}
?>
