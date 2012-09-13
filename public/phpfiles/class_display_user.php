<?php
/**
 * class_display_user.php
 * 
 * This file for user part of Address Book
 * 
 * @author Igor Zhabskiy <Zhabskiy.Igor@googlemail.com>
 * 
 * @copyright (c)2011
 * 
 */

/**
 * 
 * AdresBookUser()
 * 
 * This class displays content for user
 * 
 * @version 0.1
 * 
 */
class UserDisplay {

	/**
	 * Config file name or pash
	 */
	public $config_file_name = '';
	
	/**
	 * Templates parser
	 */
	public $parser_path = '';
	
	/**
	 * Path to errors log
	 *
	 * @var $path_error_log
	 */
	public $path_error_log = '';
	
	/**
	 * Limit displays user for db 
	 *
	 */
	private $limit = 10;
	
	/**
	 * 
	 * errorsHandler
	 * 
	 * Set all error from  site
	 *
	 */
	
	public function errorsHandler() { 
    	set_error_handler (array(&$this, 'errorsLog'));
	}
		
	/**
	 * 
	 * errorsLog
	 * 
	 * Write all errors in log file
	 *
	 * @param strung $errno		code-level errors
	 * @param string $errmsg	text of error
	 * @param sting $filename	this is name log file
	 * @param string $linenum	line number where the error occurred 
	 * @global array $SysValue	this is content from config file
	 * 
	*/

	public function errorsLog($errno, $errmsg, $filename, $linenum) {
		
		if (isset($errno)) {
			date_default_timezone_set("Europe/Kiev");
			
			$date = date("Y-m-d H:i:s (TZ)");
			
			$f = fopen($this -> path_error_log, 'a');
			
//			$f = fopen("./errors_log.txt", "a");
			
			if (!empty($f)) {
				$err = "<error>\r\n";
				$err .= " <date>$date</date>\r\n";
				$err .= " <errno>$errno</errno>\r\n";
				$err .= " <errmsg>$errmsg</errmsg>\r\n";
				$err .= " <filename>$filename</filename>\r\n";
				$err .= " <linenum>$linenum</linenum>\r\n";
				$err .= " </error>\r\n";
				
				flock($f, LOCK_EX);
				
				fwrite($f, $err);
				
				flock($f, LOCK_UN);
			}
		}
	}
	
	/**
	 * 
	 * startSession
	 * 
	 * Start session in user part of site
	 * 
	 * @global array	$SysValue this is content from config file
	 * 
	 * @return boolean 1
	 * 
	*/	
	public function startSession() {

		session_start();

		return true;
	}

	/**
	 * 
	 * parseIniFile
	 * 
	 * Parse configuration file
	 *
	 * @param int	$new_id	first left_id (should start with 1)
	 *
	 * @global array	$SysValue	config file content
	 *   
	 * @return array	$SysValue	config file content
	 * 
	*/
	public function parseIniFile() {
		global $SysValue;
		
		$SysValue = parse_ini_file($this -> config_file_name, 1);
		
		return $SysValue;
	}
	
	/**
	 * 
	 * parseTemplateReturn
	 * 
	 * Return string from template
	 * 
	 * @param string $TemplateName
	 * @return string $dis templat content
	 *  
	 */
/*	public function parseTemplateReturn($TemplateName) { 
		global $SysValue; 
		
		$TemplateFile = templateReadFile($SysValue['dir']['parser'].chr(47).$SysValue['skin']['address_book'].chr(47).$TemplateName);
		
		$dis = '';
		
		while(list($line,$string)=each($TemplateFile)) { 
			$string=constantString($string);
	
			$dis.= $string;
		}
	
		return $dis;
	}*/

	/**
	 * 
	 * parseTemplateReturnSubFolder
	 * 
	 * Return string from template sub folder
	 * 
	 * @param string $TemplateName
	 * @return string $dis templat content
	 *  
	 */
/*	public function parseTemplateReturnSubFolder($TemplateName) { 
		global $SysValue;
		
		$SysValue=$GLOBALS['SysValue'];
	
		$TemplateFile = templateReadFile($TemplateName);
		
		$dis = '';
		
		while(list($line,$string)=each($TemplateFile)) { 
			$string=constantString($string);
	
			$dis.= $string;
		}
	
		return $dis;
	}*/

	/**
	 * constantString
	 *
	 * This is constant string
	 * 
	 * @param $string $string
	 * @return string 
	 * 
	 */
/*	public function constantString($string) {
		return preg_replace_callback("/@([[:alnum:]]+)@/","constantArray",$string);
	} */
	
	/**
	 * constantArray
	 *
	 * This is constant array
	 * 
	 * @param array $array
	 * @return string $string
	 * 
	 */
/*	public function constantArray($array) { 
		global $SysValue; 
		
		if(!empty($SysValue['other'][$array[1]])) {
			$string=$SysValue['other'][$array[1]];
		} else { 
			$string=null;
		}
		
		return $string; 
	}*/

	/**
	 * templateReadFile
	 * 
	 * This read template file
	 *
	 * @param string $path
	 * @return array $array
	 * 
	 */
/*	public function templateReadFile($path) {
		if(!is_file($path)) return false; 
			elseif(!filesize($path)) return array(); 
			elseif($array=file($path)) return $array; 
			else while(!$array=file($path)) sleep(1); 
		
		return $array;
	}*/
	
	/**
	 *
	 * indexFile
	 * 
	 * Display main information for user
	 * 
	 * @global array	$SysValue this is content from config file
	 * 
	 * @return string	$footer footer template
	 *  
	 */
	public function indexFile() {
		global $SysValue;
		
		require_once($this -> parser_path);
		
		$SysValue['other']['title'] = 'Public Area';
		
		$index = ParseTemplateReturn($SysValue['templates_files']['index']);
		
		return $index;
	}
	
	/**
	 * 
	 * copyringFooterYear
	 * 
	 * Displays the year for footer
	 * 
	 * @global array	$SysValue this is content from config file
	 * 
	 * @return string	$footer this is footer template
	 * 
	 */
	public function copyringFooterYear() {
		global $SysValue;
		
		date_default_timezone_set('Europe/Kiev');
		
		$year = date("Y");
		
		$SysValue['other']['year'] = $year;
		
		$footer = ParseTemplateReturn($SysValue['templates_files']['footer']);
		
		return $footer;
	}
	
	/**
	 * 
	 * connectToDB
	 * 
	 * Connect to Data Base MYSQL
	 * 
	 * @global array	$SysValue this is content from config file
	 * 
	 * @return boolen	1
	 * 
	 */
	public function connToDB() {
		global $SysValue;
		
		$db_connect = mysql_connect($SysValue['db_connect']['host'], $SysValue['db_connect']['user_login_db'], $SysValue['db_connect']['user_password_db']);
	
		if(!$db_connect) {
/*
			echo "Не удается подключиться к базе Mysql!";
*/
			echo mysql_error();
		}
		
		$db_select = mysql_select_db($SysValue['db_connect']['db_name'], $db_connect);
		
		if (!$db_select) {
/*
			echo "База данных не найдена!";
*/
			exit;
		} else {
			mysql_query("set characher_set_client='cp1251'");
			mysql_query("set characher_set_results='cp1251'");
			mysql_query("set characher_set_connection='cp1251_general_ci'");
		}
		
		return true;
	}
	
	/**
	 * 
	 * userSearchOptions
	 * 
	 * Search users in Data Base MYSQL
	 * 
	 * @global array	$SysValue this is content from config file
	 * 
	 * @return string	$search this is search template
	 * 
	 */
	public function userSearchOptions() {
		global $SysValue;
		
		/**
		 * Set session srarch
		 */
		if (empty($_GET)) {
			$_SESSION['search'] = '';
			$_SESSION['search_country'] = '';
			$_SESSION['search_city'] = '';
		}

		/**
		 * Set variable $page GET's method
		 */
		if (isset($_GET['page']) and !empty ($_GET['page'])) {
			$SysValue['other']['page'] = trim($_GET['page']);
		} else {
			 $SysValue['other']['page'] = '1';
		}
		
		/**
		 * Set variable $limit GET's method (ПЕРЕПИСАТЬ УСЛОВИЕ)
		 */
		if (isset($_GET['limit']) and !empty($_GET['limit'])) {
			$SysValue['other']['limit'] = trim($_GET['limit']);
		} else	{
			$SysValue['other']['limit'] = '10';
		}
	
		/**
		 * Set variable $field GET's method
		 */
		if (isset($_GET['field']) and !empty($_GET['field'])) {
			$SysValue['other']['field'] = trim($_GET['field']);
		} else {
			$SysValue['other']['field'] = 'id';
		}
		
		/**
		 * Set variable $order GET's method
		 */
		if (isset($_GET['order']) and !empty($_GET['order'])) {
			$SysValue['other']['order'] = trim($_GET['order']);
		} else {
			$SysValue['other']['order'] = '';
		}
		
		/**
		 * Set temlate variable from GET's method
		 */
		if (isset($_GET['poisk'])) {
			$SysValue['other']['poisk'] = trim($_GET['poisk']);
		}
				
		/**
		 * Write in SESSION search word 
		 */		
		if (isset($_GET['poisk']) and isset($_GET['form'])) {
			$_SESSION['search'] = $_GET['poisk'];
		}
	
		if (!empty($_GET['poisk']) and !empty($_GET['form'])) {
			$_SESSION['search'] = $_GET['poisk'];
		}
		
		/**
		 * Write in SESSION your country 
		 */
		if (isset($_GET['country']) and isset($_GET['form'])) {
			$_SESSION['search_country'] = $_GET['country'];
		}
		
		if (!empty($_GET['country']) and !empty($_GET['form'])) {
			$_SESSION['search_country'] = $_GET['country'];
		}
	
		/**
		 * Write in SESSION your city
		 */
		if (isset($_GET['city']) and isset($_GET['form'])) {
			$_SESSION['search_city'] = $_GET['city'];
		}
		
		if (!empty($_GET['city']) and !empty($_GET['form'])) {
			$_SESSION['search_city'] = $_GET['city'];
		}
			
		/**
		 * Link to our website
		 */
		$SysValue['other']['link'] = '/';
		
		$search = ParseTemplateReturn($SysValue['templates_files']['search']);
		
		return $search;

	}
	
	/**
	 * 
	 * userSearchCountries
	 * 
	 * Form list a countries of users
	 * 
	 * @global array	$SysValue this is content from config file
	 * 
	 * @return string	$option_countries this is country templates
	 * 
	 */
	public function userSearchCountries() {
		global $SysValue;

		$mysql_countries = mysql_query("SELECT `country` FROM ".$SysValue['table_name']['table_name_1']." GROUP BY `country`");
		
		$option_countries = '';
		
		while($row = mysql_fetch_array($mysql_countries)) {
		
			$SysValue['other']['selected'] = "";

			if (isset($_GET['country']) and $_GET['country'] == trim($row['country']) or isset($_SESSION['search_country']) and $_SESSION['search_country'] == trim($row['country']) and isset($_GET['country']) and $_GET['country'] == trim($row['country'])) {
				$SysValue['other']['selected'] = 'selected="selected"';
			}
	
			$SysValue['other']['countryName'] = $row['country'];
		
			$option_countries .= ParseTemplateReturn($SysValue['templates_files']['countries']);
		}

		return $option_countries;
	}
	
	/**
	 * 
	 * searchUsersCities
	 * 
	 * Form list a cities of users
	 * 
	 * @global array	$SysValue this is content from config file
	 * 
	 * @return string	$option_cities this is cities template
	 * 
	 */
	public function UserSearchCities() {
		global $SysValue;
		
		$option_cities = ParseTemplateReturn($SysValue['templates_files']['interval_countries_cities']);
		
		if (isset($_GET['country']) and !empty($_GET['country'])) {
		
			$_GET['country'] = trim($_GET['country']);
			
			$mysql_cities = mysql_query("SELECT `country`, `city` FROM ".$SysValue['table_name']['table_name_1']." WHERE `country` = '".$_GET['country']."' GROUP BY `city`");

			$SysValue['other']['cityName'] = '';

			while($row = mysql_fetch_array($mysql_cities)) {
				
				$SysValue['other']['selected'] = "";
				
				if (isset($_GET['country']) and $_GET['country'] == trim(($row['country']))) {
					if (isset($_GET['city']) and $_GET['city'] == trim($row['city']) or isset($_SESSION['search_city']) and $_SESSION['search_city'] == trim($row['city'])) { 

					$SysValue['other']['selected'] = 'selected="selected"';
				}
					
					$SysValue['other']['cityName'] = trim($row['city']);
				}

				$option_cities .= ParseTemplateReturn($SysValue['templates_files']['cities']);			
			}
		}

		$option_cities .= ParseTemplateReturn($SysValue['templates_files']['search_close']);
		
		return $option_cities;
	}
	
	/**
	 * 
	 * userPageNavigation
	 * 
	 * Navigation for user
	 * 
	 * @global array	$SysValue this is content from config file
	 * @global integer	$page this is page right
	 * @global integer	$limit this is limit user of 1 page
	 * @global integer	$client this is count of all clients
	 * @global integer	$start this is user start page
	 * @global integer	$num_str num of page as take from string
	 * @global integer	$num_get num of page as take from GET
	 * @global integer	$total intval intval all page 
	 * 
	 * @return boolean	1
	 * 
	 */
	public function userPageNavigation() {
		global $SysValue, $page, $limit, $client, $start, $num_str, $num_get, $total;
		
		if (!isset($_SESSION['search']) and !isset($_SESSION['search_country']) and !isset($_SESSION['search_city'])) {
			$_SESSION['search'] = '';
			$_SESSION['search_country'] = '';
			$_SESSION['search_city'] = '';
		}
		
		if (!isset($_GET['poisk']) and !isset($_GET['country']) and !isset($_GET['city']) and (!isset($_GET['order']))) {
			$_GET['poisk'] = '';
			$_GET['country'] = '';
			$_GET['city'] = '';
			$_GET['order'] = '';
		}
		
		//-----------
		//Навигация
		//-----------
		if (isset($_GET['page']) and !empty($_GET['page'])) {
			$page = $_GET['page'];
		} else {
			$page = 1;
		}
		
		if (isset($_GET['limit']) and !empty($_GET['limit'])) {
			$limit = $_GET['limit'];
		} else {
			$limit = $this -> limit;
		}
	
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
		
		echo
		'<hr>' . 
		'clients = ' . $client . '<br />' .
		'page = ' . $page . '<br />' .
		'total = ' . $total . '<br />' .
		'limit = ' . $limit . '<br />' . 
		'<hr>';

		return true;
	}
	
	/**
	 * 
	 * userSortFields
	 * 
	 * Sort field for user (Name, Country, City)
	 * 
	 * @global string $field	name field from GET
	 * @global string $order_zapros	name ASC or DESC from GET for MYSQL
	 * @global string $order_zapros	name ASC or DESC from GET for GET
	 * 
	 * @return boolean	1
	 * 
	 */
	public function userSortFields() {
		global $field, $order_zapros, $order_name;
		
		if (!empty($_GET['field']) and !empty($_GET['order_zapros']) and !empty($_GET['order_name']))
		{
			$field = $_GET['field'];
			$order_zapros = $_GET['order_zapros'];
			$order_name = $_GET['order_name'];
		}
		
		if (!isset($_GET['field']) or $_GET['field'] == 'id')
		{
			$field = 'id';
			$order_zapros = 'asc';
			$order_name = 'asc';
		}
		
		if (isset($_GET['field']) and $_GET['field'] != 'id' and $_GET['order'] == 'asc')
		{
			$field = $_GET['field'];
			$order_zapros = 'asc';
		}
		
		if (isset($_GET['field']) and $_GET['field'] != 'id' and $_GET['order'] == 'asc')
		{
			$order_name = 'desc';
		}
		
		if (isset($_GET['field']) and $_GET['field'] != 'id' and $_GET['order'] == 'desc')
		{
			$field = $_GET['field'];
			$order_zapros = 'desc';
			$order_name = 'asc';
		}
		
		return true;
	}
	
	/**
	 * 
	 * userDisplaysTables
	 * 
	 * Displays user's table and name fields
	 * 
	 * @global array $SysValue	this is content from config file
	 * @global integer $page	this is page right
	 * @global integer $limit	this is limit user of 1 page
	 * @global integer $client	this is count of all clients
	 * @global integer $start	this is user start page
	 * @global integer $num_str	num of page as take from string
	 * @global integer $num_get num of page as take from GET
	 * @global integer $total	intval intval all page 
	 * @global string $field	name field from GET
	 * @global string $order_zapros	name ASC or DESC from GET for MYSQL
	 * @global string $order_zapros	name ASC or DESC from GET for GET
	 * 
	 * @return string $name_for_table this is table for client
	 * 
	 */
	public function userDisplaysTable() {
		global $SysValue, $limit, $client, $field, $order_zapros, $order_name, $start, $page, $num, $num_str, $num_get, $total;
		
		$result = mysql_query("SELECT * FROM ".$SysValue['table_name']['table_name_1']." WHERE `first_name` LIKE '".$_SESSION['search']."%' AND `country` LIKE '".$_SESSION['search_country']."%' AND `city` LIKE '".$_SESSION['search_city']."%' ORDER BY $field $order_zapros LIMIT $start, $num_str");

		$SysValue['other']['field'] = $field;
		$SysValue['other']['page'] = $page;
		$SysValue['other']['num'] = $num_get;
		$SysValue['other']['orderName'] = $order_name;
		$SysValue['other']['getOrder'] = $_GET['order'];
		$SysValue['other']['getPoisk'] = $_GET['poisk'];
		$SysValue['other']['getCountry'] = $_GET['country'];
		$SysValue['other']['getCity'] = $_GET['city'];
		
		/**
		 * Displays fields name
		 */
		if (empty($client) or $client == '') {
			$name_for_table = '';
		} else {
			$name_for_table = ParseTemplateReturn($SysValue['templates_files']['table_start']);
		}

		while ($peoplerow = mysql_fetch_array($result)) {
			/**
			 * Displays user's name, country, city
			 */
			$SysValue['other']['id'] = $peoplerow['id'];
			$SysValue['other']['firstName'] = $peoplerow['first_name'];
			$SysValue['other']['lastName'] = $peoplerow['last_name'];
			$SysValue['other']['country'] = $peoplerow['country'];
			$SysValue['other']['city'] = $peoplerow['city'];
			
			$name_for_table .= ParseTemplateReturn($SysValue['templates_files']['table_clients']);
		}
	
		return $name_for_table;
	}

	/**
	 * 
	 * userDisplaysNavigationLeft
	 * 
	 * Displays left navigation Show: 10|20|50|All
	 * 
	 * @global array $SysValue this is content from config file
	 * @global integer $limit	this is limit user of 1 page
	 * @global integer $client	this is count of all clients
	 * 
	 * @return string $navigation_left template of left navigation
	 * 
	 */
	function userDisplaysNavigationLeft() {
		global $SysValue, $limit, $client;

		if (isset($_GET['field']) and !empty($_GET['field'])) {
			$_GET['field'] = 'id';
		}
		
		if (!isset($_GET['order'])) {
			$_GET['order'] = '';
		}
		
		$navigation_left = ParseTemplateReturn($SysValue['templates_files']['navigation_left_page_start']);
			
		/**
		 * If serch return 0 result
		 */
		if (empty($client) or $client == '') {
			$SysValue['other']['searchGetPoisk'] = $_GET['poisk'];
				
			$navigation_left = ParseTemplateReturn($SysValue['templates_files']['search_result']);
		} else {
			$navigation_left .= ParseTemplateReturn($SysValue['templates_files']['navigation_left_page_show']);
		}
		
		if ($limit == 10 and $limit != 'all' and $client >= 1) {
			$SysValue['other']['pageNum'] = '10';
			
			$navigation_left .= ParseTemplateReturn($SysValue['templates_files']['navigation_left']);
			
		} elseif ($client > 10) {
			$SysValue['other']['page'] = '10';
			
			$SysValue['other']['pageNum'] = '10';
			
			$navigation_left .= ParseTemplateReturn($SysValue['templates_files']['navigation_left_page']);
		}
		
		if ($limit == 20 and $client > 10) {
			$SysValue['other']['pageNum'] = '20';
			
			$navigation_left .= ParseTemplateReturn($SysValue['templates_files']['navigation_left']);

		} elseif ($client > 10) {
			$SysValue['other']['page'] = '20';
			
			$SysValue['other']['pageNum'] = '20';
			
			$navigation_left .= ParseTemplateReturn($SysValue['templates_files']['navigation_left_page']);
		}
		
		if ($limit == 50 and $client > 20) {
			$SysValue['other']['pageNum'] = '50';
			
			$navigation_left .= ParseTemplateReturn($SysValue['templates_files']['navigation_left']);

		} elseif ($client > 20) {
			$SysValue['other']['page'] = '50';
			
			$SysValue['other']['pageNum'] = '50';
			
			$navigation_left .= ParseTemplateReturn($SysValue['templates_files']['navigation_left_page']);
		}
	
		if ($limit == 'all' or $limit == 'All') {
			$SysValue['other']['pageNum'] = 'All';
			
			$navigation_left .= substr(ParseTemplateReturn($SysValue['templates_files']['navigation_left']), 0, -2);

		} elseif ($client > 50) {
			$SysValue['other']['page'] = 'all';
			
			$SysValue['other']['pageNum'] = 'All';
			
			$navigation_left .= substr(ParseTemplateReturn($SysValue['templates_files']['navigation_left_page']), 0, -3);
			
			$navigation_left .= ParseTemplateReturn($SysValue['templates_files']['navigation_left_per_page']);
		}
		
		return $navigation_left;
	}

	/**
	 * 
	 * userDisplaysNavigationRight
	 * 
	 * Displays left navigation Page: Prev 3|4|5|6|7 Next
	 * 
	 * @global array $SysValue	this is content from config file
	 * @global integer $page	this is page right
	 * @global integer $num_get num of page as take from GET
	 * @global integer $total	intval intval all page 
	 * @global string $field	name field from GET
	 * 
	 * @return string $navigation_right this is right navigation
	 * 
	 */
	public function userDisplaysNavigationRight() {
		global $SysValue, $total, $page, $num_get, $field;

		if (isset($_GET['limit']) and $_GET['limit'] == 'all') {
			$total = 1;
		}
	
		$navigation_right = '';
		
		if ($total != 1) {
			$navigation_right = ParseTemplateReturn($SysValue['templates_files']['navigation_right']);
			
			if ($page !== 0) {
				$navigation_right .= ParseTemplateReturn($SysValue['templates_files']['navigation_right_page']);
			}
			
			if ($page != 1 && $page > 0) {
				$SysValue['other']['prevOrNext'] = '&lt;Prev';
				
				$SysValue['other']['pageRight'] = $page - 1;
				
				$SysValue['other']['numGetRight'] = $num_get;
				
				$SysValue['other']['fieldRight'] = $field;
				
				$SysValue['other']['orderGetRight'] = $_GET['order'];
				
				$SysValue['other']['poiskGetRight'] = $_GET['poisk'];
				
				$SysValue['other']['countryGetRight'] = $_GET['country'];
				
				$SysValue['other']['cityGetRight'] = $_GET['city'];

				$navigation_right .= substr(ParseTemplateReturn($SysValue['templates_files']['navigation_right_page_num_minus']), 0, -3);
			}
			
			if ($page - 2 > 0) {
				$SysValue['other']['prevOrNext'] = $page - 2;
				
				$SysValue['other']['pageRight'] = $page - 2;
				
				$SysValue['other']['numGetRight'] = $num_get;
				
				$SysValue['other']['fieldRight'] = $field;
				
				$SysValue['other']['orderGetRight'] = $_GET['order'];
				
				$SysValue['other']['poiskGetRight'] = $_GET['poisk'];
				
				$SysValue['other']['countryGetRight'] = $_GET['country'];
				
				$SysValue['other']['cityGetRight'] = $_GET['city'];

				$navigation_right .= ParseTemplateReturn($SysValue['templates_files']['navigation_right_page_num_minus']);
			}
			
			if ($page - 1 > 0) {
				$SysValue['other']['prevOrNext'] = $page - 1;
				
				$SysValue['other']['pageRight'] = $page - 1;
				
				$SysValue['other']['numGetRight'] = $num_get;
				
				$SysValue['other']['fieldRight'] = $field;
				
				$SysValue['other']['orderGetRight'] = $_GET['order'];
				
				$SysValue['other']['poiskGetRight'] = $_GET['poisk'];
				
				$SysValue['other']['countryGetRight'] = $_GET['country'];
				
				$SysValue['other']['cityGetRight'] = $_GET['city'];

				$navigation_right .= ParseTemplateReturn($SysValue['templates_files']['navigation_right_page_num_minus']);
			}
			
			$SysValue['other']['pageRight'] = $page;
			
			$navigation_right .= ParseTemplateReturn($SysValue['templates_files']['navigation_right_page_interval']);	
			
			if ($page + 1 <= $total) {
				$SysValue['other']['prevOrNext'] = $page + 1;
				
				$SysValue['other']['pageRight'] = $page + 1;
				
				$SysValue['other']['numGetRight'] = $num_get;
				
				$SysValue['other']['fieldRight'] = $field;
				
				$SysValue['other']['orderGetRight'] = $_GET['order'];
				
				$SysValue['other']['poiskGetRight'] = $_GET['poisk'];
				
				$SysValue['other']['countryGetRight'] = $_GET['country'];
				
				$SysValue['other']['cityGetRight'] = $_GET['city'];

				$navigation_right .= ParseTemplateReturn($SysValue['templates_files']['navigation_right_page_num_plus']);
			}
			
			if ($page + 2 <= $total) {
				$SysValue['other']['prevOrNext'] = $page + 2;
				
				$SysValue['other']['pageRight'] = $page + 2;
				
				$SysValue['other']['numGetRight'] = $num_get;
				
				$SysValue['other']['fieldRight'] = $field;
				
				$SysValue['other']['orderGetRight'] = $_GET['order'];
				
				$SysValue['other']['poiskGetRight'] = $_GET['poisk'];
				
				$SysValue['other']['countryGetRight'] = $_GET['country'];
				
				$SysValue['other']['cityGetRight'] = $_GET['city'];

				$navigation_right .= ParseTemplateReturn($SysValue['templates_files']['navigation_right_page_num_plus']);
			}
		
			if ($page != $total) {
				$SysValue['other']['prevOrNext'] = 'Next&gt;';
				
				$SysValue['other']['pageRight'] = $page + 1;
				
				$SysValue['other']['numGetRight'] = $num_get;
				
				$SysValue['other']['fieldRight'] = $field;
				
				$SysValue['other']['orderGetRight'] = $_GET['order'];
				
				$SysValue['other']['poiskGetRight'] = $_GET['poisk'];
				
				$SysValue['other']['countryGetRight'] = $_GET['country'];
				
				$SysValue['other']['cityGetRight'] = $_GET['city'];
				
				$navigation_right .= substr(ParseTemplateReturn($SysValue['templates_files']['navigation_right_page_num_plus']), 2);
			}
		}
	
		$navigation_right .= ParseTemplateReturn($SysValue['templates_files']['navigation_right_close']);
		
		$navigation_right .= ParseTemplateReturn($SysValue['templates_files']['table_close']);

		return $navigation_right;
	}
	
	/**
	 * 
	 * userDisplaysViewInfo
	 * 
	 * Displays client information
	 * 
	 * @param string $client_id	this is client's identifier
	 * 
	 * @global array $SysValue	this is content from config file
	 * 
	 * @return string $view_content this is temlate of view client
	 * 
	 */
	public function userDisplaysViewInfo($client_id) {
		global $SysValue;
		
		/**
		 * Get client information from DB
		 */
		$client_information = mysql_query("SELECT * FROM ".$SysValue['table_name']['table_name_1']." WHERE `id` = '$client_id'");
		
		$client_info_row = mysql_fetch_array($client_information);
	
		/**
		 * Set client information to template
		 */
		$SysValue['other']['firstName'] = trim($client_info_row['first_name']);
		
		$SysValue['other']['lastName'] = trim($client_info_row['last_name']);

		$view_content = ParseTemplateReturnSubFolder($SysValue['templates_files']['table_view_client_open']);
		
		/**
		 * Check image foung or was found
		 */
		if(isset($client_info_row['photo']) and !empty($client_info_row['photo'])) {

			$SysValue['other']['clientPhoto'] = $client_info_row['photo'];
			
			$view_content .= ParseTemplateReturnSubFolder($SysValue['templates_files']['table_view_client_photo']);
		} else {	
			$view_content .= ParseTemplateReturnSubFolder($SysValue['templates_files']['table_view_client_no_photo']);
		}




		$SysValue['other']['locationCountryClient'] = $client_info_row['country'];
		$SysValue['other']['locationCityClient'] = $client_info_row['city'];
		$SysValue['other']['emailClient'] = $client_info_row['email'];
		$SysValue['other']['notesClient'] = $client_info_row['notes'];

		$view_content .= ParseTemplateReturnSubFolder($SysValue['templates_files']['table_view_client_close']);

		return $view_content;
	}
}
?>
