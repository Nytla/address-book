<?php
/**
 * Adress Book Controller
 * 
 * AddNewClient.php
 *
 * This is add new clients for administrator
 * 
 * @category	controllers
 * @copyright	2012
 * @author	Igor Zhabskiy <Zhabskiy.Igor@googlemail.com>
 */

/**
 * AddNewClient
 * 
 * This class is add new client to DB
 * 
 * @version 0.1
 */
class AddNewClient extends Templating {

	/**
	 * _thumb_max_width
	 * 
	 * @var integer	This is max width for thumbnail image
	 */
	private $_thumb_max_width = 300;

	/**
	 * _thumb_max_height
	 * 
	 * @var integer	This is max height for thumbnail image
	 */
	private $_thumb_max_height = 300;

	/**
	 * _big_image_max_width
	 * 
	 * @var integer	This is max width for big image
	 */
	private $_big_image_max_width = 500;

	/**
	 * _big_image_max_height
	 * 
	 * @var integer	This is max height for big image
	 */
	private $_big_image_max_height = 500;

	/**
	 * _thumbnail_prefix
	 * 
	 * @var string	This is thumbnail prefix
	 */
	private $_thumbnail_prefix = 'thumb_';
	
	/**
	 * _thumbnail_prefix
	 * 
	 * @var string	This is destination image path
	 */
	private $_destination_image_path = './../../public/images/uploads_client/';

	/**
	 * _image_quality
	 * 
	 * @var integer	This is image quality (%)
	 */
	private $_image_quality = 90;

	/**
	 * _new_image_width
	 * 
	 * @var integer	This is new image width
	 */
	private $_new_image_width;

	/**
	 * _new_image_height
	 * 
	 * @var integer	This is new image height
	 */
	private $_new_image_height;

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
		$template = Indexes::headerContent(Locale::languageEng('add_new_client', 'title'), 1);

		/**
		 * Create css or/and javascript content
		 */
		$jquery = Config::dataArray('jquery_lib', 'path').Config::dataArray('jquery_lib', 'jquery');

		$valid_plugin = Config::dataArray('jquery_lib', 'path').Config::dataArray('jquery_lib', 'valid_plugin');

		$form_plugin = Config::dataArray('jquery_lib', 'path').Config::dataArray('jquery_lib', 'form_plugin');

		$add_new_record = Config::dataArray('javascript', 'path').Config::dataArray('javascript', 'add_new_client');

		$js = array(
			"$jquery",
			"$valid_plugin",
			"$form_plugin",
			"$add_new_record",
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
			"error_image_resize"	=> Locale::languageEng('add_new_client', 'error_image_resize'),
			"mess_max_length_notes" => Locale::languageEng('add_new_client', 'mess_max_length_notes'),
			"add_good_message"	=> Locale::languageEng('add_new_client', 'add_good_message'),
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
	 * getImageClients
	 *
	 * This function add new image in DB 
	 *
	 * @param array
	 * @return json
	 */
	public function getImageClients($_FILES) {

		if(isset($_POST)) {

			/**
			 * Set some variables
			 */
			$this -> _thumbnail_prefix = Config::dataArray('image_settings', 'thumb_prefix');
	
			$this -> _destination_image_path = Config::dataArray('image_settings', 'upload_path');

			/**
			 * If image size > max size echo error
			 */
			if ((int) $_FILES['image_file']['size'] > (int) $_POST['MAX_FILE_SIZE'] or (int) $_FILES['image_file']['size'] == 0) {

				/**
				 * Return error image size
				 */
				return json_encode(
					array(
						"error" => 'size'
					)
				);
			}

			/**
			 * We need same random name for both files
			 */
			$random_number   = rand(0, 9999999999);

			/**
			 * Some information about image we need later
			 */
			$image_name	= strtolower($_FILES['image_file']['name']);
			$image_size	= $_FILES['image_file']['size'];
			$temp_src	= $_FILES['image_file']['tmp_name'];
			$image_type	= $_FILES['image_file']['type'];
			$process	= true;

			/**
			 * Validate file + create image from uploaded file
			 */
			switch(strtolower($image_type)) {

				case 'image/png':

					$created_image = imagecreatefrompng($_FILES['image_file']['tmp_name']);

					break;

				case 'image/gif':

					$created_image = imagecreatefromgif($_FILES['image_file']['tmp_name']);

					break;

				case 'image/jpeg':

					$created_image = imagecreatefromjpeg($_FILES['image_file']['tmp_name']);

					break;

				default:

					/**
					 * Return error image expansion
					 */
					return json_encode(
						array(
							"error"	=> 'expansion'
						)
					);
			}

			/**
			 * Get Image Size
			 */
			list ($curent_width, $curent_height) = getimagesize($temp_src);

			/**
			 * Set image size summa
			 */
			$size_summa = (int) ($curent_width / $this -> _thumb_max_width) + ($curent_height / $this -> _thumb_max_height);

			/**
			 * Get file extension, this will be added after random name
			 */
			$image_ext = substr($image_name, strrpos($image_name, '.'));

			$image_ext = str_replace('.', '', $image_ext);

			/**
			 * Set the Destination Image path with Random Name
			 */
			$thumb_dest_rand_image_name	= $this -> _destination_image_path . $this -> _thumbnail_prefix . $random_number . '.' . $image_ext;

			$dest_rand_image_name		= $this -> _destination_image_path . $random_number . '.' . $image_ext;

			/**
			 * Resize image to our Specified Size by calling our resizeImage function
			 */
			if ($size_summa > 1 and $this -> resizeImage($curent_width, $curent_height, $this -> _big_image_max_width, $this -> _big_image_max_height, $dest_rand_image_name, $created_image, $this -> _image_quality)) {

				/** 
				 * Create Thumbnail for the Image
				 */
				$this -> resizeImage($curent_width, $curent_height, $this -> _thumb_max_width, $this -> _thumb_max_height, $thumb_dest_rand_image_name, $created_image, $this -> _image_quality);

				/**
				 * Respond with our images
				 */
				$uploads_client_path = Config::dataArray('server', 'dot').Config::dataArray('server', 'slash').Config::dataArray('paths', 'public').Config::dataArray('paths', 'images').Config::dataArray('paths', 'uploads_client');

				/**
				 * Insert info into database table.. do w.e!
				 */
				$data_array = array(
					"image_name"	=> $uploads_client_path . $this -> _thumbnail_prefix . $random_number . '.' . $image_ext,
					"image_height"	=> $this -> _new_image_height,
					"image_width"	=> $this -> _new_image_width,					
					"image_alt"	=> Locale::languageEng('add_new_client', 'thumbnail_photo'),
					"image_id"	=> AddNewClientModel::insertPhotoNameInDb($random_number.'.'.$image_ext, $this -> _new_image_height, $this -> _new_image_width, Locale::languageEng('add_new_client', 'thumbnail_photo'))

				);

				return json_encode($data_array);
				
			} else {

				/**
				 * Return error image resize
				 */
				return json_encode(
					array(
						"error"	=> 'resize'
					)
				);
			}
		}
	}

	/**
	 * resizeImage
	 *
	 * This function resize image
	 *
	 * @param integer $curent_width
	 * @param integer $curent_height
	 * @param integer $max_width
	 * @param integer $max_height
	 * @param integer $dest_folder
	 * @param integer $src_image
	 * @return boolean
	 */
	private function resizeImage($curent_width, $curent_height, $max_width, $max_height, $dest_folder, $src_image, $quality) {

		/**
		 * Set some variables
		 */
		$ImageScale			= min($max_width / $curent_width, $max_height / $curent_height);
		$this -> _new_image_width	= ceil($ImageScale * $curent_width);
		$this -> _new_image_height	= ceil($ImageScale * $curent_height);
		$NewCanves			= imagecreatetruecolor($this -> _new_image_width, $this -> _new_image_height);

		/**
		 * Resize Image
		 */
		if (imagecopyresampled($NewCanves, $src_image,0, 0, 0, 0, $this -> _new_image_width, $this -> _new_image_height, $curent_width, $curent_height)) {

			/**
			 * Copy file
			 */
			if(imagejpeg($NewCanves, $dest_folder, $quality)) {

			    imagedestroy($NewCanves);

			    return true;
			}
		}
	}

	/**
	 * addClient
	 *
	 * This function make form which add new client to DB
	 *
	 * @return object
	 */
	public function addClient($first_name, $last_name, $email, $country, $city, $photo_id = '', $notes = '') {

		return json_encode(
			array(
				"flag" => AddNewClientModel::insertNewClientInDb($first_name, $last_name, $email, $country, $city, $photo_id, $notes)
			)
		);
	}
}
?>
