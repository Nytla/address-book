<?php
/**
 * Adress Book Controller
 * 
 * EditRecord.php
 *
 * This is administrator edit client record
 * 
 * @category	controllers
 * @copyright	2012
 * @author	Igor Zhabskiy <Zhabskiy.Igor@googlemail.com>
 */

/**
 * EditRecord
 * 
 * This is administrator edit client record
 * 
 * @version 0.1
 */
class EditRecord extends Templating {

	/**
	 * makeFromEditRecord
	 *
	 * This function make address book list
	 *
	 * @return string $tempalate	This is source address book tempalate
	 */
	public function makeFromEditRecord() {

		/**
		 * Create header content
		 */
		$template = Indexes::headerContent(Locale::languageEng('edit_record', 'title'));

		/**
		 * Create css or/and javascript content
		 */
		$js = Config::dataArray('flags', 'js');

		$flag = array(
			"$js", 
			"$js",
			"$js"
		);

		$valid_plugin = Config::dataArray('jquery', 'path').Config::dataArray('jquery', 'valid_plugin');

		$form_plugin = Config::dataArray('jquery', 'path').Config::dataArray('jquery', 'form_plugin');

		$add_new_record = Config::dataArray('javascript', 'path').Config::dataArray('javascript', 'edit_record');

		$path = array(
			"$valid_plugin",
			"$form_plugin",
			"$add_new_record",
		);

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
			"country_array"		=> BookListModel::getAllCountriesFromDB(),
			"city"			=> Locale::languageEng('add_new_record', 'city'),
			"empty_option"		=> Locale::languageEng('book_list', 'empty_option'),
			"photo"			=> Locale::languageEng('add_new_record', 'photo'),
			"image_path"		=> Config::dataArray('errors', 'image'),
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
			"error_image_size"	=> Locale::languageEng('add_new_record', 'error_image_size'),
			"error_image_extension"	=> Locale::languageEng('add_new_record', 'error_image_extension'),
			"add_good_message"	=> Locale::languageEng('add_new_record', 'add_good_message'),
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

	/**
	 * getClientData
	 *
	 * This function make address book list
	 *
	 * @return string $tempalate	This is source address book tempalate
	 */
	public function getClientData($edit_id) {

		return json_encode(EditRecordModel::getClientDataFromDB($edit_id));
	}
}
?>

