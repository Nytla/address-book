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
	 * _path_to_template
	 * 
	 * @var string This is path to template file
	 */
	private static $_path_to_template;







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
		$js = Config::dataArray('flags', 'js');

		$flag = array(
			"$js", 
			"$js",
			"$js"
		);

		$valid_plugin = Config::dataArray('jquery', 'path').Config::dataArray('jquery', 'valid_plugin');

		$form_plugin = Config::dataArray('jquery', 'path').Config::dataArray('jquery', 'form_plugin');

		$add_new_record = Config::dataArray('javascript', 'path').Config::dataArray('javascript', 'add_new_record');

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
	 * resizePhotoClients
	 *
	 * This function make form which add new client to DB
	 *
	 * @return string $tempalate	This is source add new record tempalate
	 */
	public function getImageClients($_FILES) {

		if(isset($_POST)) {

			//Some Settings
			$ThumbMaxWidth          = 300; //Thumbnail width
			$ThumbMaxHeight         = 300; //Thumbnail Height
			$BigImageMaxWidth       = 500; //Resize Image width to
			$BigImageMaxHeight      = 500; //Resize Image height to
			$ThumbPrefix            = "thumb_"; //Normal thumb Prefix
			$DestinationDirectory   = "./../../public/images/uploads_client/";//Upload Directory
			$jpg_quality            = 90; //Image quality

			// check if file upload went ok
/*
			if(!isset($_FILES['image_file']) || !is_uploaded_file($_FILES['image_file']['tmp_name']))
			{
			    die('Something went wrong with Upload, May be File too Big?'); //output error
			}
*/

			//If image size > max size echo error 
			if ((int) $_FILES['image_file']['size'] > (int) $_POST['MAX_FILE_SIZE'] or (int) $_FILES['image_file']['size'] == 0) {
				return json_encode(
					array(
						"error"	  => 'size'
					)
				);
			}

			$RandomNumber   = rand(0, 9999999999); // We need same random name for both files.

			// some information about image we need later.
			$ImageName      = strtolower($_FILES['image_file']['name']);
			$ImageSize      = $_FILES['image_file']['size'];
			$TempSrc        = $_FILES['image_file']['tmp_name'];
			$ImageType      = $_FILES['image_file']['type'];
			$process        = true;

			//Validate file + create image from uploaded file.
			switch(strtolower($ImageType))
			{
			case 'image/png':
			    $CreatedImage = imagecreatefrompng($_FILES['image_file']['tmp_name']);
			    break;
			case 'image/gif':
			    $CreatedImage = imagecreatefromgif($_FILES['image_file']['tmp_name']);
			    break;
			case 'image/jpeg':
			    $CreatedImage = imagecreatefromjpeg($_FILES['image_file']['tmp_name']);
			    break;
			default:
			    return json_encode(
					array(
						"error"		=> 'expansion'
					)
				);
			}

			//get Image Size
			list($CurWidth,$CurHeight)=getimagesize($TempSrc);

			//get file extension, this will be added after random name
			$ImageExt = substr($ImageName, strrpos($ImageName, '.'));
			$ImageExt = str_replace('.','',$ImageExt);

			//Set the Destination Image path with Random Name
			$thumb_DestRandImageName    = $DestinationDirectory.$ThumbPrefix.$RandomNumber.'.'.$ImageExt; //Thumb name
			$DestRandImageName          = $DestinationDirectory.$RandomNumber.'.'.$ImageExt; //Name for Big Image

			//Resize image to our Specified Size by calling our resizeImage function.
			if($this -> resizeImage($CurWidth,$CurHeight,$BigImageMaxWidth,$BigImageMaxHeight,$DestRandImageName,$CreatedImage,$jpg_quality))
			{
				//Create Thumbnail for the Image
				$this -> resizeImage($CurWidth,$CurHeight,$ThumbMaxWidth,$ThumbMaxHeight,$thumb_DestRandImageName,$CreatedImage,$jpg_quality);

				//respond with our images
//				return $ThumbPrefix.$RandomNumber.'.'.$ImageExt;

				$uploads_client_path = Config::dataArray('server', 'dot').Config::dataArray('server', 'slash').Config::dataArray('paths', 'public').Config::dataArray('paths', 'images').Config::dataArray('paths', 'uploads_client');

				/*
				    // Insert info into database table.. do w.e!
				    mysql_query("INSERT INTO myImageTable (ImageName, ThumbName, ImgPath)
				    VALUES ($DestRandImageName, $thumb_DestRandImageName, 'uploads/')");
				*/

				$data_array = array(
					"image_name"	=> $uploads_client_path.$ThumbPrefix.$RandomNumber.'.'.$ImageExt,
					"image_height"	=> $this -> NewHeight,
					"image_width"	=> $this -> NewWidth,					
					"image_alt"	=> Locale::languageEng('add_new_record', 'thumbnail_photo'),
					"image_id"	=> AddNewRecordModel::insertPhotoNameInDb($RandomNumber.'.'.$ImageExt, $this -> NewHeight, $this -> NewWidth, Locale::languageEng('add_new_record', 'thumbnail_photo'))

				);

				return json_encode($data_array);
				
			} else{
				die('Resize Error'); //output error
			}
		}
	}

	/**
	 * resizeImage
	 *
	 * This function make form which add new client to DB
	 *
	 * @return string $tempalate	This is source add new record tempalate
	 */
	private function resizeImage($CurWidth,$CurHeight,$MaxWidth,$MaxHeight,$DestFolder,$SrcImage,$quality) {

		$ImageScale         = min($MaxWidth/$CurWidth, $MaxHeight/$CurHeight);
		$this -> NewWidth           = ceil($ImageScale*$CurWidth);
		$this -> NewHeight          = ceil($ImageScale*$CurHeight);
		$NewCanves          = imagecreatetruecolor($this -> NewWidth, $this -> NewHeight);

		// Resize Image
		if(imagecopyresampled($NewCanves, $SrcImage,0, 0, 0, 0, $this -> NewWidth, $this -> NewHeight, $CurWidth, $CurHeight))
		{
			// copy file
			if(imagejpeg($NewCanves,$DestFolder,$quality))
			{
			    imagedestroy($NewCanves);
			    return true;
			}
		}
	}

	/**
	 * addNewClient
	 *
	 * This function make form which add new client to DB
	 *
	 * @return string $tempalate	This is source add new record tempalate
	 */
	public function addNewClient($first_name, $last_name, $email, $country, $city, $photo_id = '', $notes = '') {

		return json_encode(
			array(
				"flag" => AddNewRecordModel::insertNewClientInDb($first_name, $last_name, $email, $country, $city, $photo_id, $notes)
			)
		);
	}
}
?>
