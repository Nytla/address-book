<?php
/**
 * Adress Book Ajax
 * 
 * resize_photo.php
 *
 * This is ajax file which resize client photo
 * 
 * @category	ajax
 * @copyright	2012
 * @author	Igor Zhabskiy <Zhabskiy.Igor@googlemail.com>
 */

/**
 * Include autoload file
 */
require_once(dirname(__FILE__).'/../../application/autoload/autoload.php');

/**
 * Create access object
 */
$AccessController = new Access();

/**
 * Run method
 */
$AccessController -> httpRequested();

/**
 * Create copy of AddNewClient class
 */
$AddNewClientController = new AddNewClient();

/**
 * Get resized image
 */
print $AddNewClientController -> getImageClients($_FILES);
?>
