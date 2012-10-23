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
 * @author	Igor Zhabskiy <Zhabskiy.Igor@googlemail.com>
 */

/**
 * UserBookList
 * 
 * This is administrator address book list
 * 
 * @version 0.1
 */
class UserBookList extends Templating {

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

		$book_list = Config::dataArray('javascript', 'path').Config::dataArray('javascript', 'user_book_list');

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
			"clients_data"		=> BookListModel::getClientsDataFromDB(),
			"phrase"		=> BookListModel::getRandomPhraseFromDB(),
			"image_path"		=> Config::dataArray('errors', 'image'),
			"preloader_alt_text"	=> Locale::languageEng('book_list', 'preloader_alt_text')
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
}
?>
