<?php
/**
 * Adress Book
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
	public function getErrors($message) {

		/**
		 * Create header content
		 */
		//$template = Indexes::header();

		/**
		 * Create css or/and javascript content
		 */
		//$flag = array('');

		//$path = array('');

		$template .= Indexes::scripts($flag, $path);

		/**
		 * Create error content
		 */
		$template_name = Config::dataArray('templates', 'errors');

		$params = array(
			"title"			=> 'Page Error',
			"error_description"	=> 'THIS IS TEST ERROR MESSAGE!',
		);

		$template .= Templating::renderingTemplate($template_name, $params);

		/**
		 * Create footer content
		 */
		//$template .= Indexes::footer();

		return $template;
	}
}
?>
