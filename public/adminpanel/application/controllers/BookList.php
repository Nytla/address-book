<?php
/**
 * Adress Book Controller
 * 
 * BookList.php
 *
 * This is administrator address book list
 * 
 * @category	Controller
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

		$add_admin = Config::dataArray('javascript', 'path').Config::dataArray('javascript', 'add_admin');

		$path = array("", "$validation", "$add_admin");

		$template .= Indexes::scriptsContent($flag, $path);



//$model = new BookListModel();

$data = BookListModel::getClientsData();

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

			"clients_num"		=> count($model -> getClientsData()),
			"clients_data"		=> $data[1]['admin_login']

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
