<?php
/**
 * Adress Book Controller
 * 
 * Layout.php
 *
 * This is administrator layout file
 * 
 * @category	Main
 * @copyright	2012
 * @author	Igor Zhabskiy <Zhabskiy.Igor@googlemail.com>
 */

/**
 * Authorization
 * 
 * This is administrator layout class
 * 
 * @version 0.1
 */
class Layout extends Templating {

	/**
	 * makeLayout
	 *
	 * This function make layout page
	 *
	 * @return string $tempalate	This is source layout tempalate
	 */
	public function makeLayout() {

		/**
		 * Create header content
		 */
		$tempalate = Indexes::headerContent(Locale::languageEng('layout', 'title'));

		/**
		 * Create css or/and javascript content
		 */
		$tempalate .= Indexes::scriptsContent();

		/**
		 * Create authorization content
		 */
		$template_name = Config::dataArray('templates', 'layout');

		$params = array(
			"ab"			=> Locale::languageEng('site', 'name'),
			"address_book"		=> Locale::languageEng('authorization', 'auth'),
			'log_out'		=> Locale::languageEng('layout', 'log_out'),		
			'add_admin'		=> Locale::languageEng('layout', 'add_admin'),
			"content"		=> Locale::languageEng('layout', 'content'),
		);

		/**
		 * Rendering our tempalate
		 */
		$tempalate .= Templating::renderingTemplate($template_name, $params);

		/**
		 * Create footer content
		 */
		$tempalate .= Indexes::footerContent();

		return $tempalate;
	}
}
?>
