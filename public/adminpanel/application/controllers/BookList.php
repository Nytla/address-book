<?php
//Pagination - http://www.tonymarston.net/php-mysql/pagination.html
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
		$template = Indexes::headerContent(Locale::languageEng('book_list', 'title'));

		/**
		 * Create css or/and javascript content
		 */
		$name = Config::dataArray('flags', 'js');

		$flag = array("$name");

		$add_admin = Config::dataArray('javascript', 'path').Config::dataArray('javascript', 'book_list');

		$path = array("$add_admin");

		$template .= Indexes::scriptsContent($flag, $path);
		
		/**
		 * Get clients data from DB
		 */
		//$get_clients_data = BookListModel::getClientsData();

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
			"add_new_record"	=> Locale::languageEng('book_list', 'add_new_record'),
			"clients_data"		=> BookListModel::getClientsData(),
			"clients_num"		=> $this -> pageNavigationRight(),
			"back_to_page_layout"	=> Locale::languageEng('book_list', 'back_to_page_layout'),
			"phrase"		=> BookListModel::getRandomPhrase(),
			"country_array"		=> BookListModel::getAllCountries(),
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
	 * @return string $tempalate	This is source address book tempalate
	 */
	public function getCities($country_id = '') {
		
		$cities = BookListModel::getCitiesFromDb($country_id);

		if ($cities) {
			return json_encode(array("flag" => true, "cities" => $cities));

		} else {
			return json_encode(array("flag" => false, "cities" => ''));
		}
	}

	/**
	 * searchClients
	 *
	 * This function search our clients in DB
	 *
	 * @return string $tempalate	This is source address book tempalate
	 */
	public function searchClients($keywords = '', $country_id = '', $city_id = '') {

		$search_clients = BookListModel::getSearchClients($keywords, $country_id, $city_id);

		if ($search_clients) {
			return json_encode(array("flag" => true, "clients" => $search_clients));

		} else {
			return json_encode(array("flag" => false, "clients" => '', "error_search_message" => $this -> createErrorSearhMessage($keywords)));
		}
	}

	/**
	 * createErrorSearhMessage
	 *
	 * This function create error search message
	 *
	 * @return string $tempalate	This is source address book tempalate
	 */
	public function createErrorSearhMessage($keywords = '') {

		$error_message = Locale::languageEng('search', 'error_message_one') . $keywords . Locale::languageEng('search', 'error_message_two');

		return $error_message;
	}

	/**
	 * pageNavigationRight
	 *
	 * This function create error search message
	 *
	 * @return string $tempalate	This is source address book tempalate
	 */
	public function pageNavigationRight($keywords = '', $country = 0, $city = 0, $field_name = '', $order_sort = '', $page = 1, $limit = 10) {

		/**
		 * Count clients in DB
		 */
		$clients_num = BookListModel::countClientInDB();

		/**
		 * True count clients in DB
		 */
		$true_clients_num = ($limit == 'all') ? BookListModel::countClientInDB() : $limit;

		/**
		 * Limit
		 */
		$limit = ($limit == 'all') ? $clients_num : $limit;

		/**
		 * Total
		 */
		$total = intval(($clients_num - 1) / $true_clients_num) + 1;

		$total = ($limit == 'all') ? 1 : $total;

		/**
		 * Page
		 */
		$page = ($page > $total) ? $total : $page;

		/**
		 * Start
		 */
		$start = $page * $true_clients_num - $true_clients_num;

		/**
		 * Create left navigation
		 */
		if ($total > 1) {

			$element_nav_array[0]["page_num"] = $page;
/*
			if ($page != 1 and $page > 0) {

				$element_nav_array[1]["page_prev_text"]		= '&lt;Prev';

				$element_nav_array[1]["page_num"]		= $page - 1;

				$element_nav_array[1]["field_name"]		= $field_name;

				$element_nav_array[1]["order_sort"]		= $order_sort;

				$element_nav_array[1]["limit"]			= $limit;

			}
*/
			if ($page - 2 > 0) {

				$element_nav_array[2]["page_num"]		= $page - 2;

				$element_nav_array[2]["field_name"]		= $field_name;

				$element_nav_array[2]["order_sort"]		= $order_sort;

				$element_nav_array[2]["limit"]			= $limit;

			}

			if ($page - 1 > 0) {

				$element_nav_array[3]["page_num"]		= $page - 1;

				$element_nav_array[3]["field_name"]		= $field_name;

				$element_nav_array[3]["order_sort"]		= $order_sort;

				$element_nav_array[3]["limit"]			= $limit;

			}

			if ($page + 1 <= $total) {

				$element_nav_array[4]["page_num"]		= $page + 1;

				$element_nav_array[4]["field_name"]		= $field_name;

				$element_nav_array[4]["order_sort"]		= $order_sort;

				$element_nav_array[4]["limit"]			= $limit;

			}

			if ($page + 2 <= $total) {

				$element_nav_array[5]["page_num"]		= $page + 2;

				$element_nav_array[5]["field_name"]		= $field_name;

				$element_nav_array[5]["order_sort"]		= $order_sort;

				$element_nav_array[5]["limit"]			= $limit;

			}
/*
			if ($page != $total) {

				$element_nav_array[6]["page_next_text"]		= 'Next&gt;';

				$element_nav_array[6]["page_num"]		= $page + 1;

				$element_nav_array[6]["field_name"]		= $field_name;

				$element_nav_array[6]["order_sort"]		= $order_sort;

				$element_nav_array[6]["limit"]			= $limit;

			}
*/
/*
			echo
			'clients = ' . $clients_num . '<br />' .
			'page = ' . $page . '<br />' .
			'total = ' . $total . '<br />' .
			'limit = ' . $limit . '<br />' . 
			'<hr>';

			print_r($element_nav_array);
*/

		}


		return $element_nav_array;



	}


	public function getClientsDatapagination($keywords = '', $country_id = '', $city_id = '', $field_name = '', $order_sort = '', $page = '', $limit = '') {

		$clients_data = BookListModel::getClientsData($keywords, $country_id, $city_id, $field_name, $order_sort, $page, $limit);

		return json_encode(array("flag" => true, "clients" => $clients_data));
		

	}


	/**
	 * limitNavigationLeft
	 *
	 * This function create error search message
	 *
	 * @return string $tempalate	This is source address book tempalate
	 */
	public function limitNavigationLeft($keywords = '') {

	}
}
?>
