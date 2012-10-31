<?php
/**
 * Adress Book Controller
 * 
 * Testing.php
 *
 * This is user testing
 * 
 * @category	controllers
 * @copyright	2012
 * @author	Igor Zhabskiy <Zhabskiy.Igor@googlemail.com>
 */

/**
 * Testing
 * 
 * This is user testing class
 * 
 * @version 0.1
 */
class Testing extends Templating {

	/**
	 * Constructor
	 *
	 * This is constructor testing
	 *
	 * @return string $tempalate	This is source address book list tempalate
	 */
	public function test() {

		/**
		 * Create authorization content
		 */
		$params = array(
			"worlds" => 'Hello world!' //Locale::languageEng('site', 'name')
		);

		/**
		 * Set template name
		 */
		$template_name = 'testing.html'; //Config::dataArray('templates', 'book_list');

		/**
		 * Rendering our tempalate
		 */
		$template = Templating::renderingTemplate($template_name, $params);

		return $template;
	}
}
?>
