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
 * @author	Igor Zhabskiy <Zhabskiy.Igor@gmail.com>
 */

/**
 * Errors
 * 
 * This is errors class
 * 
 * @version 0.1
 */
final class Errors extends Templating {

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
		$template = Indexes::headerContent(Locale::languageEng('http_status', 'title'), 1);

		/**
		 * Create css or/and javascript content
		 */
		$template .= Indexes::scriptsContent();

		/**
		 * Create error content
		 */
		$template_name = Config::dataArray('templates', 'errors');

		/**
		 * Create array with http error codes
		 */
		$http_status_codes = array(
			"bad_connect",
			"100", "101", "102", 
			"200", "201", "202", "203", "204", "205", "206", "207", 
			"300", "301", "302", "303", "304", "305", "306", "307", 
			"400", "401", "402", "403", "404", "405", "406", "407", "408", "409", "410", "411", "412", "413", "414", "415", "416", "417", "422", "423", "424","425", "426", 
			"500", "501", "502", "503", "504", "505", "506", "507", "508", "509", "510"
		);

		/**
		 * Set error variable
		 */
		$error = (empty($_GET['error']) or array_search($_GET['error'], $http_status_codes) === false) ? 99 : $_GET['error'];

		/**
		 * Get error codes from locale
		 */
		$params = array(
			"site_url"			=> Config::dataArray('server', 'slash') . Config::dataArray('paths', 'adminpanel'),
			"site_name"			=> Locale::languageEng('site', 'name'),			
			"page_error"		=> Locale::languageEng('http_status', 'page_error'),
			"error_description"	=> Locale::languageEng('http_status', $error),
			"image"				=> Config::dataArray('errors', 'image')
		);

		$template .= Templating::renderingTemplate($template_name, $params);

		/**
		 * Create footer content
		 */
		$template .= Indexes::footerContent();

		return $template;
	}
}
?>
