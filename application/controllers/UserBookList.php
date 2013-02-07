<?php
/**
 * Adress Book Controller
 * 
 * UserBookList.php
 *
 * This is user address book list
 * 
 * @category	controllers
 * @copyright	2012
 * @author	Igor Zhabskiy <Zhabskiy.Igor@gmail.com>
 */

/**
 * UserBookList
 * 
 * This is administrator address book list
 * 
 * @version 0.1
 */
final class UserBookList extends Templating {

	/**
	 * makeUserAB
	 *
	 * This function make address book list
	 *
	 * @return string $tempalate	This is source address book list tempalate
	 */
	public function makeUserAB() {

		/**
		 * Create header content
		 */
		$template = Indexes::headerContent(Locale::languageEng('user_book_list', 'title'), 1);

		/**
		 * Create css content
		 */
		$demo_table = Config::dataArray('css', 'path_style') . Config::dataArray('css', 'demo_table');

		$jquery_ui = Config::dataArray('css', 'path_style') . Config::dataArray('css', 'jquery_ui');

		$css = array(
			"$demo_table",
			"$jquery_ui"
		);

		/**
		 * Create javascript content
		 */
		$jquery = Config::dataArray('jquery_lib', 'path') . Config::dataArray('jquery_lib', 'jquery');

		$data_table = Config::dataArray('jquery_lib', 'path') . Config::dataArray('jquery_lib', 'data_table');

		$book_list = Config::dataArray('javascript', 'path') . Config::dataArray('javascript', 'user_book_list');

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
			"preloader_alt_text"	=> Locale::languageEng('book_list', 'preloader_alt_text'),
			"image_path"		=> Config::dataArray('errors', 'image'),
			"phrase"		=> UserBookListModel::getUserRandomPhraseFromDB()
		);

		/**
		 * Set template name
		 */
		$template_name = Config::dataArray('templates', 'user_book_list');

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
	 * setUserClientsObject
	 *
	 * This function set clients data json
	 *
	 * @return json
	 */
	public function getClientData($id) {
		return json_encode(UserBookListModel::getUserClientsDataFromDB($id));
	}
	
	/**
	 * getUserClientsJSON
	 * 
	 * This function get clients data (json)
	 *
	 * @return json
	 */
	public function getUserClientsJSON() {

		/**
		 * Array of database columns which should be read and sent back to DataTables. Use a space where
		 * you want to insert a non-database field (for example a counter or static image)
		 */
		$acolumns = array('id', 'name', 'countryname_en', 'cityname_en');
		
		$columns_sort = array('id', 'first_name', 'countryname_en', 'cityname_en');
		
		$columns_search = array('first_name', 'last_name', 'countryname_en', 'cityname_en');
		
		/* 
		 * Paging
		 */
		$slimit = "";
		
		if (isset($_GET['iDisplayStart']) && $_GET['iDisplayLength'] != '-1') {
			
			$slimit = "LIMIT " . intval($_GET['iDisplayStart'] ).", " . intval($_GET['iDisplayLength']);
		}
		
		/*
		 * Ordering
		 */
		$sorder = "";
		
		if (isset( $_GET['iSortCol_0'])) {
			$sorder = "ORDER BY  ";
			for ($i=0 ; $i<intval( $_GET['iSortingCols']) ; $i++) {
				
				if ($_GET['bSortable_'.intval($_GET['iSortCol_'.$i])] == "true") {
					
					$sorder .= "`" . $columns_sort[intval( $_GET['iSortCol_'.$i])] . "` " . ($_GET['sSortDir_'.$i] === 'asc' ? 'asc' : 'desc') . ", ";
				}
			}
			
			$sorder = substr_replace($sorder, "", -2);
			
			if ($sorder == "ORDER BY") {
				$sorder = "";
			}
		}
		
		/* 
		 * Filtering
		 * NOTE this does not match the built-in DataTables filtering which does it
		 * word by word on any field. It's possible to do here, but concerned about efficiency
		 * on very large tables, and MySQL's regex functionality is very limited
		 */
		$swhere = '';
		$count_swhere = '';
		
		if (isset($_GET['sSearch']) && $_GET['sSearch'] != "") {
			
			$swhere = "AND (";
			$count_swhere = "WHERE (";
			
			for ($i = 0; $i < count($acolumns); $i++) {
				
				$swhere .= "`" . $columns_search[$i] . "` LIKE '%" . mysql_escape_string($_GET['sSearch']) . "%' OR ";
				$count_swhere .= "`" . $columns_search[$i] . "` LIKE '%" . mysql_escape_string($_GET['sSearch']) . "%' OR ";
			}
			
			$swhere = substr_replace( $swhere, "", -3 );
			
			$swhere .= ')';
			
			$count_swhere = substr_replace($count_swhere, "", -3);
			
			$count_swhere .= ')';
		}
		
		/**
		 * Individual column filtering
		 */
		for ($i = 0; $i < count($acolumns); $i++) {
			
			if (isset($_GET['bSearchable_'.$i]) && $_GET['bSearchable_'.$i] == "true" && $_GET['sSearch_'.$i] != '') {
				
				if ($swhere == "") {
					
					$swhere = "WHERE ";
					$count_swhere = "WHERE ";
				} else {
					$swhere .= " AND ";
					$count_swhere .= " AND ";
				}
				
				$swhere .= "`" . $acolumns[$i] . "` LIKE '%" . mysql_escape_string($_GET['sSearch_'.$i]) . "%' ";
				$count_swhere .= "`".$acolumns[$i]."` LIKE '%" . mysql_escape_string($_GET['sSearch_'.$i]) . "%' ";
			}
		}
		
		/*
		 * SQL queries
		 * Get data to display
		 */
		$squery = UserBookListModel::UserClientsDataFromDB($swhere, $count_swhere, $sorder, $slimit);
		
		/*
		 * Output
		 */
		$output = array(
			'sEcho' 				=> intval($_GET['sEcho']),
			'iTotalRecords' 		=> $squery['count'],
			'iTotalDisplayRecords'	=> $squery['count'],
			'aaData' 				=> array()
		);
		
		/**
		 * Preparing array for aaData
		 */
		$result = $squery['clients'];
		
		foreach ($result as $arow) {
		 
			$row = array();
			
			for ($i = 0; $i < count($acolumns); $i++) {
				
				if ($acolumns[$i] == "version") {
					
					/**
					 * Special output formatting for 'version' column 
					 */
					$row[] = ($arow[$acolumns[$i]]=="0") ? '-' : $arow[$acolumns[$i]];
				} else if ($acolumns[$i] != ' ') {
					
					/**
					 * General output 
					 */
					$row[] = $arow[$acolumns[$i]];
				}
			}
			
			$output['aaData'][] = $row;
		}
		
		/**
		 * Return data (json)
		 */
		return json_encode($output);
	}
}
?>
