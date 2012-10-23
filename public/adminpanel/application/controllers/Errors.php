<?php
/**
 * Adress Book Controller
 * 
 * Errors.php
 *
 * This is errors file
 * 
 * @category	controllers
 * @copyright	2012
 * @author	Igor Zhabskiy <Zhabskiy.Igor@googlemail.com>
 */

/**
 * Errors
 * 
 * This is errors class
 * 
 * @version 0.1
 */
class Errors extends Templating {

	/**
	 * getErrors
	 *
	 * This function get errors
	 *
	 * @return string $template	This is error source template 
	 */
	public function getErrors() {

		/**
		 * Create header content
		 */
		$template = Indexes::headerContent(Locale::languageEng('errors', 'title'), 1);

		/**
		 * Create css or/and javascript content
		 */
		$template .= Indexes::scriptsContent();

		/**
		 * Create error content
		 */
		$template_name = Config::dataArray('templates', 'errors');

		$error = (isset($_GET['error']) and is_numeric($_GET['error'])) ? $_GET['error'] : 99;

		switch ($error) {

			case '99':

				$params = array(
					"site_url"		=> Config::dataArray('server', 'slash').Config::dataArray('paths', 'adminpanel'),
					"site_name"		=> Locale::languageEng('site', 'name'),			
					"page_error"		=> Locale::languageEng('errors', 'page_error'),
					"error_description"	=> Locale::languageEng('errors', (isset($_GET['error'])) ? $_GET['error'] : 'unknown_error'),
					"image"			=> Config::dataArray('errors', 'image')
				);

				break;

			case ValidateData::filterValidate($error, ValidateData::DATA_INT):

				$params = array(
					"site_url"		=> Config::dataArray('server', 'slash').Config::dataArray('paths', 'adminpanel'),
					"site_name"		=> Locale::languageEng('site', 'name'),			
					"page_error"		=> Locale::languageEng('errors', 'page_error'),
					"error_description"	=> Locale::languageEng('errors', $error),
					"image"			=> Config::dataArray('errors', 'image')
				);

				break;


			default:

				$params = array(
					"site_url"		=> Config::dataArray('server', 'slash').Config::dataArray('paths', 'adminpanel'),
					"site_name"		=> Locale::languageEng('site', 'name'),			
					"page_error"		=> Locale::languageEng('errors', 'page_error'),
					"error_description"	=> Locale::languageEng('errors', 'unknown_error'),
					"image"			=> Config::dataArray('errors', 'image')
				);
		}

		$template .= Templating::renderingTemplate($template_name, $params);

		/**
		 * Create footer content
		 */
		$template .= Indexes::footerContent();

		return $template;
	}
}
?>
