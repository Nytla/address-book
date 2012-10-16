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
			"edit_good_message"	=> Locale::languageEng('edit_record', 'edit_good_message'),
			"edit_bad_message"	=> Locale::languageEng('edit_record', 'edit_bad_message')
		);

		/**
		 * Set template name
		 */
		$template_name = Config::dataArray('templates', 'edit_record');

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
	 * destributorData
	 *
	 * This function 
	 *
	 * @return string $tempalate
	 */
	public function destributorData($client_data_array) {

		switch ($client_data_array['flag']) {

			case 'edit':

				return $this -> getClientData($client_data_array['edit_id']);

			break;

			case 'update':

				return $this -> updateClientData($client_data_array);

			break;
		}

		return false;

	}

	/**
	 * getClientData
	 *
	 * This function get client data
	 *
	 * @return string $tempalate	This is source address book tempalate
	 */
	private function getClientData($client_id) {

		$data_array = EditRecordModel::getClientDataFromDB($client_id);

		$data_array['photo_name'] = Config::dataArray('server', 'dot').Config::dataArray('server', 'slash').Config::dataArray('paths', 'public').Config::dataArray('paths', 'images').Config::dataArray('paths', 'uploads_client').$data_array['photo_name'];


		return json_encode($data_array);
	}

	/**
	 * updateClientData
	 *
	 * This function update client data
	 *
	 * @return string $tempalate	This is source address book tempalate
	 */
	private function updateClientData($client_data_array) {

		return json_encode(array("flag" => EditRecordModel::updateClientDataInDB($client_data_array)));
	}
}
?>

