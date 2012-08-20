<?php
/**
 * Adress Book Controller
 * 
 * AddAdmin.php
 *
 * This is administrator add file
 * 
 * @category	Controller
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

	public function makeAddForm() {

		/**
		 * Create header content
		 */
		$template = Indexes::headerContent(Locale::languageEng('add_admin', 'title'));

		/**
		 * Create css or/and javascript content
		 */
		$name = Config::dataArray('flags', 'js');

		$flag = array("", "$name", "$name");

		$validation = Config::dataArray('jquery', 'path').Config::dataArray('jquery', 'validation');

		$add_admin = Config::dataArray('javascript', 'path').Config::dataArray('javascript', 'add_admin');

		$path = array("", "$validation", "$add_admin");

		$template .= Indexes::scriptsContent($flag, $path);

		/**
		 * Create authorization content
		 */
		$params = array(
			"layout"		=> Locale::languageEng('add_admin', 'layout'),
			"content"		=> Locale::languageEng('add_admin', 'content'),
			"login"			=> Locale::languageEng('authorization', 'login'),
			"password"		=> Locale::languageEng('authorization', 'password'),
			"confirm_password"	=> Locale::languageEng('add_admin', 'confirm_password'),
			"error_empty"		=> Locale::languageEng('add_admin', 'error_empty'),
			"error_incorect"	=> Locale::languageEng('add_admin', 'error_incorect'),
			"error_min_length"	=> Locale::languageEng('add_admin', 'error_min_length'),
			"error_max_lenght"	=> Locale::languageEng('add_admin', 'error_max_lenght'),
			"error_confirm"		=> Locale::languageEng('add_admin', 'error_confirm'),
			"error_exists"		=> Locale::languageEng('add_admin', 'error_exists'),
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

}
?>
