<?php
/**
 * Adress Book Controller
 * 
 * Layout.php
 *
 * This is administrator layout file
 * 
 * @category	Controller
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
	 * _add_admin_model
	 * 
	 * @var object	This is object from our Database
	 */
	private $_add_admin_model;

	/**
	 * Constructor
	 *
	 * This function initialize object AddAdminModel
	 */
	public function __construct() {

		$this -> _AddAdminModel = new AddAdminModel();
	}

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
		$params = array(
			"ab"			=> Locale::languageEng('site', 'name'),
			"address_book"		=> Locale::languageEng('authorization', 'auth'),
			"log_out"		=> Locale::languageEng('layout', 'log_out'),	
			"add_admin"		=> Locale::languageEng('layout', 'add_admin'),
			"prepend"		=> $this -> _AddAdminModel -> adminPermission() ? 8 : 10,
			"admin_permission"	=> $this -> _AddAdminModel -> adminPermission(),
			"content"		=> Locale::languageEng('layout', 'content'),
		);

		/**
		 * Set template name
		 */
		$template_name = Config::dataArray('templates', 'layout');

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

	/**
	 * Destructor
	 *
	 * This destructor delete our object AddAdminModel
	 */
	public function __destruct() {

		$this -> _add_admin_model = null;
	}
}
?>
