<?php
/**
 * Adress Book Controller
 * 
 * Templating.php
 *
 * This is tempalte file
 * 
 * @category	controllers
 * @copyright	2012
 * @author	Igor Zhabskiy <Zhabskiy.Igor@googlemail.com>
 */

/**
 * Templating
 * 
 * This is template class
 * 
 * @version 0.1
 */
class Templating extends Exceptionizer {
	/**
	 * _path_to_template
	 * 
	 * @var string This is path to template file
	 */
	private static $_path_to_template;

	/**
	 * __path_to_cache
	 * 
	 * @var string This is path to cache folder
	 */
	private static $_path_to_cache;

	/**
	 * Constructor
	 *
	 * This is constructor which include autoloader for our Twig template 
	 */
	public function __construct() {

		$root_path = dirname(__FILE__);

		/**
		 * The simplest way to configure Twig to load templates for our application
		 */
		require_once($root_path . "/../../libraries/templating/twig-v1.2.3/lib/Twig/Autoloader.php");
	}

	/**
	 * renderingTemplate
	 * 
	 * This is function render admin template
	 * 
	 * @param string template_name	This is tempalate name
	 * @param array $params	This is variables for our tempalate
	 *
	 * @return string $tempalate	This is source our tempalate
	 */
	public static function renderingTemplate($template_name, $params) {

		/**
		 * The first step to use Twig is to register its autoloader::
		**/
		Twig_Autoloader::register();

		/**
		 * Twig also comes with a filesystem loader::
		**/
		self::$_path_to_template = Config::dataArray('templates', 'path').Config::dataArray('templates', 'name');

		$loader = new Twig_Loader_Filesystem(self::$_path_to_template);

		/**
		 * Templates cache
		**/
		self::$_path_to_cache = Config::dataArray('templates', 'path').Config::dataArray('templates', 'name').Config::dataArray('templates', 'cache');

		$twig = new Twig_Environment($loader, array(
			'cache' => self::$_path_to_cache,
		));

		/**
		 * Clear cache files
		 */
		###########################################
		# Cache clear is not for working server
		###########################################
		//$twig -> clearCacheFiles();
	
		/**
		 * Render template
		 */
		$template = $twig -> loadTemplate($template_name) -> render($params);
	
		return $template;
	}

	/**
	 * Destructor
	 *
	 * This is destructor
	 */
	public function __destruct() {}
}
?>
