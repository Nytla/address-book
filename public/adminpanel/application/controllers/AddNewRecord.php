<?php
/**
 * Adress Book Controller
 * 
 * AddNewRecord.php
 *
 * This is add new clients for administrator
 * 
 * @category	controllers
 * @copyright	2012
 * @author	Igor Zhabskiy <Zhabskiy.Igor@googlemail.com>
 */

/**
 * AddNewRecord
 * 
 * This class is add new client to DB
 * 
 * @version 0.1
 */
class AddNewRecord extends Templating {

	/**
	 * makeAddForm
	 *
	 * This function make form which add new client to DB
	 *
	 * @return string $tempalate	This is source add new record tempalate
	 */
	public function makeAddForm() {

		/**
		 * Create header content
		 */
		$template = Indexes::headerContent(Locale::languageEng('add_new_record', 'title'));

		/**
		 * Create css or/and javascript content
		 */
		$name = Config::dataArray('flags', 'js');

		$flag = array("$name", "$name");

		$validation = Config::dataArray('jquery', 'path').Config::dataArray('jquery', 'validation');

		$add_new_record = Config::dataArray('javascript', 'path').Config::dataArray('javascript', 'add_new_record');

		$path = array("$validation", "$add_new_record");

		$template .= Indexes::scriptsContent($flag, $path);

		/**
		 * Create authorization content
		 */
		$params = array(
			"page_name"		=> Locale::languageEng('add_new_record', 'page_name'),
			"first_name"		=> Locale::languageEng('add_new_record', 'first_name'),
			"last_name"		=> Locale::languageEng('add_new_record', 'last_name'),
			"email"			=> Locale::languageEng('add_new_record', 'email'),
			"country"		=> Locale::languageEng('add_new_record', 'country'),
			"country_array"		=> BookListModel::getAllCountries(),
			"city"			=> Locale::languageEng('add_new_record', 'city'),
			"empty_option"		=> Locale::languageEng('book_list', 'empty_option'),
			"photo"			=> Locale::languageEng('add_new_record', 'photo'),
			"notes"			=> Locale::languageEng('add_new_record', 'notes'),
			"save"			=> Locale::languageEng('add_admin', 'save'),
			"reset"			=> Locale::languageEng('add_new_record', 'reset'),
			"back_to_book_list"	=> Locale::languageEng('add_new_record', 'back_to_book_list'),
			"error_empty_f_n"	=> Locale::languageEng('add_new_record', 'error_required_f_n'),
			"error_min_length_f_n"	=> Locale::languageEng('add_new_record', 'error_min_length_f_n'),
			"error_max_length_f_n"	=> Locale::languageEng('add_new_record', 'error_max_length_f_n'),
			"error_empty_l_n"	=> Locale::languageEng('add_new_record', 'error_required_l_n'),
			"error_min_length_l_n"	=> Locale::languageEng('add_new_record', 'error_min_length_l_n'),
			"error_max_length_l_n"	=> Locale::languageEng('add_new_record', 'error_max_length_l_n'),
			"error_empty_email"	=> Locale::languageEng('add_new_record', 'error_required_email'),
			"error_min_length_email"=> Locale::languageEng('add_new_record', 'error_min_length_email'),
			"error_max_length_email"=> Locale::languageEng('add_new_record', 'error_max_length_email'),
			"error_incorect_email"	=> Locale::languageEng('add_new_record', 'error_incorect_email'),
			"error_empty_country"	=> Locale::languageEng('add_new_record', 'error_empty_country'),
			"error_empty_city"	=> Locale::languageEng('add_new_record', 'error_empty_city'),
			"error_upload_photo"	=> Locale::languageEng('add_new_record', 'error_upload_photo'),
		);




		/**
		 * Set template name
		 */
		$template_name = Config::dataArray('templates', 'add_new_record');

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
