<?php
/**
 * Adress Book Controller
 * 
 * AddAdmin.php
 *
 * This is administrator add file
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
class AddAdmin extends Templating {	

	/**
	 * makeAddForm
	 *
	 * This function make form which added new administrator to DB
	 *
	 * @return string $tempalate	This is source add new administrator tempalate
	 */
	public function makeAddForm() {

		/**
		 * Create header content
		 */
		$template = Indexes::headerContent(Locale::languageEng('add_admin', 'title'), 1);

		/**
		 * Create css or/and javascript content
		 */
		$jquery = Config::dataArray('jquery_lib', 'path') . Config::dataArray('jquery_lib', 'jquery');

		$validation = Config::dataArray('jquery_lib', 'path') . Config::dataArray('jquery_lib', 'valid_plugin');

		$add_admin = Config::dataArray('javascript', 'path') . Config::dataArray('javascript', 'add_admin');

		$js = array("$jquery", "$validation", "$add_admin");

		$template .= Indexes::scriptsContent('', $js);

		/**
		 * Create authorization content
		 */
		$params = array(
			"layout"		=> Locale::languageEng('add_admin', 'layout'),
			"content"		=> Locale::languageEng('add_admin', 'content'),
			"login"			=> Locale::languageEng('authorization', 'login'),
			"password"		=> Locale::languageEng('authorization', 'password'),
			"save"			=> Locale::languageEng('add_admin', 'save'),
			"confirm_password"	=> Locale::languageEng('add_admin', 'confirm_password'),
			"error_empty_login"	=> Locale::languageEng('add_admin', 'error_empty_login'),
			"error_empty_pass"	=> Locale::languageEng('add_admin', 'error_empty_pass'),
			"error_empty_pass_conf"	=> Locale::languageEng('add_admin', 'error_empty_pass_conf'),
			"error_incorect_login"	=> Locale::languageEng('add_admin', 'error_incorect_login'),
			"error_incorect_pass"	=> Locale::languageEng('add_admin', 'error_incorect_pass'),
			"error_min_length_login"=> Locale::languageEng('add_admin', 'error_min_length_login'),
			"error_min_length_pass"	=> Locale::languageEng('add_admin', 'error_min_length_pass'),
			"error_max_length_login"=> Locale::languageEng('add_admin', 'error_max_length_login'),
			"error_max_length_pass"	=> Locale::languageEng('add_admin', 'error_max_length_pass'),
			"error_confirm"		=> Locale::languageEng('add_admin', 'error_confirm'),
			"error_exists"		=> Locale::languageEng('add_admin', 'error_exists'),
			"add_good_message"	=> Locale::languageEng('add_admin', 'add_good_message')
		);

		/**
		 * Set template name
		 */
		$template_name = Config::dataArray('templates', 'add_admin');

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
	 * adminRegister
	 *
	 * This function register new administrator our DB
	 *
	 * @param string $login
	 * @param string $password
	 * @return json
	 */
	public function adminRegister($login = '', $password = '') {

		/**
		 * Validate administrator login
		 */
		if (ValidateData::filterValidate($login, ValidateData::DATA_REGEXP, ValidateData::$_regex_login) or ValidateData::filterValidate($password, ValidateData::DATA_REGEXP, ValidateData::$_regex_password)) {

			return json_encode(array('validate' => AddAdminModel::addAdminToDB($login, $password)));

		} else {
			return json_encode(array('validate' => false));
		}
	}
}
?>
