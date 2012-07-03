<?php
/**
 * Adress Book Controller
 * 
 * Indexes.php
 *
 * This is indexes file
 * 
 * @category	Main
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
class Indexes extends Templating {

	/**
	 * headerContent
	 * 
	 * This function print header template
	 * 
	 * @return string $tempalate	This is source header tempalate
	 */
	public static function headerContent() {
	
		$template_name = Config::dataArray('templates', 'header');

		$params = array(
			"charset"	=> Config::dataArray('common', 'charset'),
			"site_name"	=> Locale::languageEng('site', 'title'),
			"title"		=> Locale::languageEng('site', 'name'),
			"screen"	=> Config::dataArray('css', 'path'),
			"print"		=> Config::dataArray('css', 'path'),
			"ie"		=> Config::dataArray('css', 'path'),
			"jquery"	=> Config::dataArray('jquery', 'path'),
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
	public static function scriptsContent($flag = array(""), $path = array("")) {

		/**
		 * Include css or/and javascript content
		 */
		$template_name = Config::dataArray('templates', 'scripts');

		$params = array(
			"num"		=> count($flag) - 1,
			"flag"		=> $flag,
			"path"		=> $path,
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
	public static function footerContent() {

		$template_name = Config::dataArray('templates', 'footer');

		$params = array(
			'year' => date("Y"),
		);

		return Templating::renderingTemplate($template_name, $params);
	}
}
?>
