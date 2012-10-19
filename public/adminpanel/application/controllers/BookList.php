<?php
//Pagination - http://www.tonymarston.net/php-mysql/pagination.html
//Table sort and navigation on jQuery UI - http://tablesorter.com/docs/example-pager.html
//DataTable (sort, search and navigation) - http://www.datatables.net/
//Table search, pagination, and sort - http://flexigrid.info/


//Task managers
//http://todoist.com/
//http://asana.com/
//http://web.appstorm.net/roundups/task-management/top-10-apps-web-based-task-managers/


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
		$template = Indexes::headerContent(Locale::languageEng('book_list', 'title'), 1);

		/**
		 * Create css content
		 */
		$demo_table = Config::dataArray('css', 'path_style').Config::dataArray('css', 'demo_table');

		$jquery_ui = Config::dataArray('css', 'path_style').Config::dataArray('css', 'jquery_ui');

		$css = array(
			"$demo_table",
			"$jquery_ui"
		);

		/**
		 * Create javascript content
		 */
		$jquery = Config::dataArray('jquery_lib', 'path').Config::dataArray('jquery_lib', 'jquery');

		$data_table = Config::dataArray('jquery_lib', 'path').Config::dataArray('jquery_lib', 'data_table');

		$book_list = Config::dataArray('javascript', 'path').Config::dataArray('javascript', 'book_list');

		$js = array(
			"$jquery",
			"$data_table",
			"$book_list"
		);

		$template .= Indexes::scriptsContent($css, $js);

		/**
		 * Create authorization content
		 */
		$params = array(
			"site_name"		=> Locale::languageEng('site', 'name'),
			"search_word"		=> Locale::languageEng('book_list', 'search_word'),
			"keywords_word"		=> Locale::languageEng('book_list', 'keywords_word'),			
			"country_word"		=> Locale::languageEng('book_list', 'country_word'),
			"city_word"		=> Locale::languageEng('book_list', 'city_word'),
			"empty_option"		=> Locale::languageEng('book_list', 'empty_option'),
			"add_new_client"	=> Locale::languageEng('book_list', 'add_new_client'),
			"clients_data"		=> BookListModel::getClientsDataFromDB(),
			"back_to_page_layout"	=> Locale::languageEng('book_list', 'back_to_page_layout'),
			"phrase"		=> BookListModel::getRandomPhraseFromDB(),
			"image_path"		=> Config::dataArray('errors', 'image'),
			"preloader_alt_text"	=> Locale::languageEng('book_list', 'preloader_alt_text'),
			"record_edit"		=> Locale::languageEng('book_list', 'record_edit'),
			"record_delete"		=> Locale::languageEng('book_list', 'record_delete'),
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

	/**
	 * getCities
	 *
	 * This function get cities from our nodel
	 *
	 * @return string $tempalate This is source address book tempalate
	 */
	public function getCities($country_id = '') {

		$cities = BookListModel::getCitiesFromDB($country_id);

		return ($cities) ? json_encode(array("flag" => true, "cities" => $cities)) : json_encode(array("flag" => false));
	}

	/**
	 * getClientsDataJSON
	 *
	 * This function get clients information from DB in JSON format
	 *
	 * @return object	This is JSON object from DB
	 */
	public function getClientsDataJSON() {

		return json_encode(BookListModel::getClientsDataFromDB());
	}

	/**
	 * deleteClient
	 *
	 * This function get clients information from DB in JSON format
	 *
	 * @return object	This is JSON object from DB
	 */
	public function deleteClient($id) {

		return json_encode(array("flag" => BookListModel::deleteClientFromDB($id)));
	}
}
?>
