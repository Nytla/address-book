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
 * @author	Igor Zhabskiy  <Zhabskiy.Igor@googlemail.com>
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
	 * @return string $template	This is error template 
	 */
	public function getErrors() {

		/**
		 * Create header content
		 */
		$template = Indexes::headerContent();

		/**
		 * Create css or/and javascript content
		 */
		$template .= Indexes::scriptsContent();

		/**
		 * Create error content
		 */
		$template_name = Config::dataArray('templates', 'errors');

		$error = ($_GET['error'] and is_numeric($_GET['error'])) ? $_GET['error'] : 99;

		switch ($error) {

			case '99':

				$params = array(
					"site_url"		=> Config::dataArray('server', 'slash').Config::dataArray('paths', 'adminpanel'),
					"site_name"		=> Locale::languageEng('site', 'name'),			
					"page_error"		=> Locale::languageEng('errors', 'page_error'),
					"error_description"	=> Locale::languageEng('errors', ($_GET['error']) ? $_GET['error'] : 'unknown_error'),
					"image"			=> Config::dataArray('errors', 'image')
				);

				break;

			case '400':

				$params = array(
					"site_url"		=> Config::dataArray('server', 'slash').Config::dataArray('paths', 'adminpanel'),
					"site_name"		=> Locale::languageEng('site', 'name'),			
					"page_error"		=> Locale::languageEng('errors', 'page_error'),
					"error_description"	=> Locale::languageEng('errors', '400'),
					"image"			=> Config::dataArray('errors', 'image')
				);
				
				break;

			case '401':

				$params = array(
					"site_url"		=> Config::dataArray('server', 'slash').Config::dataArray('paths', 'adminpanel'),
					"site_name"		=> Locale::languageEng('site', 'name'),			
					"page_error"		=> Locale::languageEng('errors', 'page_error'),
					"error_description"	=> Locale::languageEng('errors', '401'),
					"image"			=> Config::dataArray('errors', 'image')
				);
				
				break;
				
			case '402':

				$params = array(
					"site_url"		=> Config::dataArray('server', 'slash').Config::dataArray('paths', 'adminpanel'),
					"site_name"		=> Locale::languageEng('site', 'name'),			
					"page_error"		=> Locale::languageEng('errors', 'page_error'),
					"error_description"	=> Locale::languageEng('errors', '402'),
					"image"			=> Config::dataArray('errors', 'image')
				);
				
				break;

			case '403':
				
				$params = array(
					"site_url"		=> Config::dataArray('server', 'slash').Config::dataArray('paths', 'adminpanel'),
					"site_name"		=> Locale::languageEng('site', 'name'),			
					"page_error"		=> Locale::languageEng('errors', 'page_error'),
					"error_description"	=> Locale::languageEng('errors', '403'),
					"image"			=> Config::dataArray('errors', 'image')
				);
				
				break;
				
			case '404':
				
				$params = array(
					"site_url"		=> Config::dataArray('server', 'slash').Config::dataArray('paths', 'adminpanel'),
					"site_name"		=> Locale::languageEng('site', 'name'),			
					"page_error"		=> Locale::languageEng('errors', 'page_error'),
					"error_description"	=> Locale::languageEng('errors', '404'),
					"image"			=> Config::dataArray('errors', 'image')
				);
				
				break;
				
			case '500':
				
				$params = array(
					"site_url"		=> Config::dataArray('server', 'slash').Config::dataArray('paths', 'adminpanel'),
					"site_name"		=> Locale::languageEng('site', 'name'),			
					"page_error"		=> Locale::languageEng('errors', 'page_error'),
					"error_description"	=> Locale::languageEng('errors', '500'),
					"image"			=> Config::dataArray('errors', 'image')
				);
				
				break;

			case '502':

				$params = array(
					"site_url"		=> Config::dataArray('server', 'slash').Config::dataArray('paths', 'adminpanel'),
					"site_name"		=> Locale::languageEng('site', 'name'),			
					"page_error"		=> Locale::languageEng('errors', 'page_error'),
					"error_description"	=> Locale::languageEng('errors', '502'),
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
