<?php
//abstract class Twig_Template implements Twig_TemplateInterface - http://twig.sensiolabs.org/api/master/Twig_Template.html
//Twig Documentation - http://twig.sensiolabs.org/documentation



/**
 * Adress Book Controller
 * 
 * Templating.php
 *
 * This is tempalte file
 * 
 * @category	Main
 * @copyright	2012
 * @author	Igor Zhabskiy <Zhabskiy.Igor@googlemail.com>
 */

/**
 * The simplest way to configure Twig to load templates for our application
**/
require_once(dirname(__FILE__)."/../../libraries/templating/twig-v1.2.3/lib/Twig/Autoloader.php");

/**
 * Templating
 * 
 * This is template class
 * 
 * @version 0.1
 */
//class Templating extends Exceptions {

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
		$twig -> clearCacheFiles();
	
		/**
		 * Render template
		 */
		$template = $twig -> loadTemplate($template_name) -> render($params);
	
		return $template;
	}
}
?>
