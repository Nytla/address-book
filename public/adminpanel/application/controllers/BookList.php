<?php
/**
 * Adress Book Controller
 * 
 * BookList.php
 *
 * This is administrator address book list
 * 
 * @category	controllers
 * @copyright	2012
 * @author	Igor Zhabskiy <Zhabskiy.Igor@googlemail.com>
 */

/**
 * BookList
 * 
 * This is administrator address book list
 * 
 * @version 0.1
 */
class BookList extends Templating {

	/**
	 * makeAB
	 *
	 * This function make address book list
	 *
	 * @return string $tempalate	This is source address book tempalate
	 */
	public function makeAB() {

		/**
		 * Create header content
		 */
		$template = Indexes::headerContent(Locale::languageEng('book_list', 'title'));

		/**
		 * Create css or/and javascript content
		 */
		$name = Config::dataArray('flags', 'js');

		$flag = array("", "$name", "$name");

		$validation = Config::dataArray('jquery', 'path').Config::dataArray('jquery', 'validation');

		$add_admin = Config::dataArray('javascript', 'path').Config::dataArray('javascript', 'book_list');

		$path = array("", "$validation", "$add_admin");

		$template .= Indexes::scriptsContent($flag, $path);
		
		/**
		 * Create authorization content
		 */
		$params = array(
			"site_name"		=> Locale::languageEng('site', 'name'),
			"search_word"		=> Locale::languageEng('book_list', 'search_word'),
			"keywords_word"		=> Locale::languageEng('book_list', 'keywords_word'),			
			"country_word"		=> Locale::languageEng('book_list', 'country_word'),
			"city_word"		=> Locale::languageEng('book_list', 'city_word'),
			"country_option"	=> Locale::languageEng('book_list', 'country_option'),
			"city_option"		=> Locale::languageEng('book_list', 'city_option'),
			"add_new_record"	=> Locale::languageEng('book_list', 'add_new_record'),
			"clients_data"		=> BookListModel::getClientsData(),
			"back_to_page_layout"	=> Locale::languageEng('book_list', 'back_to_page_layout'),
			"phrase"		=> BookListModel::getRandomPhrase(),
			"country_array"		=> BookListModel::getAllCountries()

		);

		/**
		 * Set template name
		 */
		$template_name = Config::dataArray('templates', 'book_list');

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
