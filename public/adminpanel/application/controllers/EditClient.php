<?php
/**
 * Adress Book Controller
 * 
 * EditClient.php
 *
 * This is administrator edit client record
 * 
 * @category	controllers
 * @copyright	2012
 * @author	Igor Zhabskiy <Zhabskiy.Igor@googlemail.com>
 */

/**
 * EditClient
 * 
 * This is administrator edit client record
 * 
 * @version 0.1
 */
class EditClient extends Templating {

	/**
	 * makeFromEditClient
	 *
	 * This function make address book list
	 *
	 * @return string $tempalate	This is source of edit client form tempalate
	 */
	public function makeFromEditClient() {

		/**
		 * Create header content
		 */
		$template = Indexes::headerContent(Locale::languageEng('edit_client', 'title'), 1);

		/**
		 * Create css or/and javascript content
		 */
		$jquery = Config::dataArray('jquery_lib', 'path').Config::dataArray('jquery_lib', 'jquery');

		$valid_plugin = Config::dataArray('jquery_lib', 'path').Config::dataArray('jquery_lib', 'valid_plugin');

		$form_plugin = Config::dataArray('jquery_lib', 'path').Config::dataArray('jquery_lib', 'form_plugin');

		$add_new_client = Config::dataArray('javascript', 'path').Config::dataArray('javascript', 'edit_client');

		$js = array(
			"$jquery",
			"$valid_plugin",
			"$form_plugin",
			"$add_new_client",
		);

		$template .= Indexes::scriptsContent('', $js);

		/**
		 * Create authorization content
		 */
		$params = array(
			"page_name"		=> Locale::languageEng('add_new_client', 'page_name'),
			"first_name"		=> Locale::languageEng('add_new_client', 'first_name'),
			"last_name"		=> Locale::languageEng('add_new_client', 'last_name'),
			"email"			=> Locale::languageEng('add_new_client', 'email'),
			"country"		=> Locale::languageEng('add_new_client', 'country'),
			"country_array"		=> BookListModel::getAllCountriesFromDB(),
			"city"			=> Locale::languageEng('add_new_client', 'city'),
			"empty_option"		=> Locale::languageEng('book_list', 'empty_option'),
			"photo"			=> Locale::languageEng('add_new_client', 'photo'),
			"image_path"		=> Config::dataArray('errors', 'image'),
			"preloader_alt_text"	=> Locale::languageEng('add_new_client', 'preloader_alt_text'),
			"notes"			=> Locale::languageEng('add_new_client', 'notes'),
			"save"			=> Locale::languageEng('add_admin', 'save'),
			"reset"			=> Locale::languageEng('add_new_client', 'reset'),
			"back_to_book_list"	=> Locale::languageEng('add_new_client', 'back_to_book_list'),
			"error_empty_f_n"	=> Locale::languageEng('add_new_client', 'error_required_f_n'),
			"error_min_length_f_n"	=> Locale::languageEng('add_new_client', 'error_min_length_f_n'),
			"error_max_length_f_n"	=> Locale::languageEng('add_new_client', 'error_max_length_f_n'),
			"error_empty_l_n"	=> Locale::languageEng('add_new_client', 'error_required_l_n'),
			"error_min_length_l_n"	=> Locale::languageEng('add_new_client', 'error_min_length_l_n'),
			"error_max_length_l_n"	=> Locale::languageEng('add_new_client', 'error_max_length_l_n'),
			"error_empty_email"	=> Locale::languageEng('add_new_client', 'error_required_email'),
			"error_min_length_email"=> Locale::languageEng('add_new_client', 'error_min_length_email'),
			"error_max_length_email"=> Locale::languageEng('add_new_client', 'error_max_length_email'),
			"error_incorect_email"	=> Locale::languageEng('add_new_client', 'error_incorect_email'),
			"error_empty_country"	=> Locale::languageEng('add_new_client', 'error_empty_country'),
			"error_empty_city"	=> Locale::languageEng('add_new_client', 'error_empty_city'),
			"error_upload_photo"	=> Locale::languageEng('add_new_client', 'error_upload_photo'),
			"error_image_size"	=> Locale::languageEng('add_new_client', 'error_image_size'),
			"error_image_extension"	=> Locale::languageEng('add_new_client', 'error_image_extension'),
			"mess_max_length_notes" => Locale::languageEng('add_new_client', 'mess_max_length_notes'),
			"edit_good_message"	=> Locale::languageEng('edit_client', 'edit_good_message'),
			"edit_bad_message"	=> Locale::languageEng('edit_client', 'edit_bad_message')
		);

		/**
		 * Set template name
		 */
		$template_name = Config::dataArray('templates', 'edit_client');

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
	 * This function is destributor for clients data
	 *
	 * @param array $client_data_array
	 * @return array / object
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
	 * @return json
	 */
	private function getClientData($client_id) {
		return json_encode(EditClientModel::getClientDataFromDB($client_id));
	}

	/**
	 * updateClientData
	 *
	 * This function update client data
	 *
	 * @return json
	 */
	private function updateClientData($client_data_array) {

		return json_encode(array("flag" => EditClientModel::updateClientDataInDB($client_data_array)));
	}
}
?>
