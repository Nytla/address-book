<?php
/**
 * Adress Book Controller
 * 
 * Indexes.php
 *
 * This is indexes file
 * 
 * @category	controllers
 * @copyright	2012
 * @author	Igor Zhabskiy <Zhabskiy.Igor@googlemail.com>
 */

/**
 * Indexes
 * 
 * This is indexes class
 * 
 * @version 0.1
 */
final class Indexes extends Templating {

	/**
	 * headerContent
	 * 
	 * This function print header template
	 * 
	 * @param string $title
	 * @param integer $flag
	 * @return string $tempalate	This is source header tempalate
	 */
	static public function headerContent($title = '', $flag_blue_print = 0) {

		/**
		 * Create variable with header tempalate name
		 */
		$template_name = Config::dataArray('templates', 'header');

		/**
		 * Create array with variables for header tempalate
		 */
		$params = array(
			"charset"		=> Config::dataArray('common', 'charset'),
			"site_name"		=> Locale::languageEng('site', 'title'),
			"title"			=> $title,
			"image_path"		=> Config::dataArray('image_settings', 'images_path'),
			"screen"		=> Config::dataArray('css', 'path'),
			"print"			=> Config::dataArray('css', 'path'),
			"ie"			=> Config::dataArray('css', 'path'),
			"jquery"		=> Config::dataArray('jquery_lib', 'path'),
			"flag_blue_print"	=> $flag_blue_print
		);

		return Templating::renderingTemplate($template_name, $params);
	}

	/**
	 * scriptsContent
	 *
	 * This function include javascript or css our header
	 * 
	 * @return string $tempalate	This is source scripts tempalate
	 */
	static public function scriptsContent($css_path = '', $js_path = '') {

		/**
		 * Include css or/and javascript content
		 */
		$template_name = Config::dataArray('templates', 'scripts');

		/**
		 * Create array with variables for scripts tempalate
		 */
		$params = array(
			"css_path"	=> $css_path,
			"js_path"	=> $js_path,
			"noscript"	=> Locale::languageEng('noscript', 'message'),
		);

		return Templating::renderingTemplate($template_name, $params);
	}

	/**
	 * footerContent
	 * 
	 * This function print footer template
	 * 
	 * @return string $tempalate	This is source footer tempalate
	 */
	static public function footerContent() {

		/**
		 * Create variable with footer tempalate name
		 */
		$template_name = Config::dataArray('templates', 'footer');

		/**
		 * Create array with variable for footer tempalate
		 */
		$params = array(
			'year' => date("Y"),
		);

		return Templating::renderingTemplate($template_name, $params);
	}
}
?>
