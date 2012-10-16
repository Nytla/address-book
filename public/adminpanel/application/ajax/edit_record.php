<?php
/**
 * Adress Book Ajax
 * 
 * edit_record.php
 *
 * This is ajax file which edit client record in DB
 * 
 * @category	ajax
 * @copyright	2012
 * @author	Igor Zhabskiy  <Zhabskiy.Igor@googlemail.com>
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
 * Create copy EditRecordController object
 */
$EditRecordController = new EditRecord();

/**
 * Take client data from DB 
 */
print $EditRecordController -> destributorData($_REQUEST);
?>
