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

		$flag = array("$name");

		$add_admin = Config::dataArray('javascript', 'path').Config::dataArray('javascript', 'book_list');

		$path = array("$add_admin");

		$template .= Indexes::scriptsContent($flag, $path);
		
		/**
		 * Get clients data from DB
		 */
		$get_clients_data = BookListModel::getClientsData();

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
			"clients_data"		=> $get_clients_data['clients_array'],
			"clients_num"		=> $get_clients_data['clients_num'],
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
	public function pageNavigationRight($page = 1, $limit = 0) {

		$clients_num = '';

		
/*
//---------------------------------------------
//Запрос для подсчета количества записей в бд
//---------------------------------------------
$result = mysql_query("SELECT COUNT(*) FROM ".$SysValue['table_name']['table_name_1']." WHERE `first_name` LIKE '".$_SESSION['search']."%' AND `country` LIKE '".$_SESSION['search_country']."%' AND `city` LIKE '".$_SESSION['search_city']."%'");

$client = mysql_result($result, 0);

if (isset($_GET['limit']) and $_GET['limit'] == 'all') {
	$num_str = $client;
	
	$num_get = 'all';
} else {
	$num_str = $limit;
	
	$num_get = $limit;
}

$total = intval(($client - 1) / $num_str) + 1;

if ($page > $total) {
	$page = $total;
}

$start = $page * $num_str - $num_str;

return true;
*/
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
