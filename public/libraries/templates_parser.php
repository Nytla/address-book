<?php
/**
 * 
 * templates_parser.php
 * 
 * This is a templates parser
 * 
 * @author phpshop.ru
 * 
 * @copyright (c)2011
 * 
 */

/**
 * 
 * parseTemplateReturn
 * 
 * Return string from template
 * 
 * @param string $TemplateName
 * @return string $dis templat content
 *  
 */
function ParseTemplateReturn($TemplateName) { 
	global $SysValue,$LoadItems,$_SESSION; 
	
	$SysValue=$GLOBALS['SysValue'];

	$TemplateFile=phpshop_read_file($SysValue['dir']['parser'].chr(47).$SysValue['skin']['address_book'].chr(47).$TemplateName);
	
	$dis = '';
	
	while(list($line,$string)=each($TemplateFile)) { 
		$string=ConstantS($string);

		$dis.= $string;
	}

	return $dis;
}

/**
 * 
 * parseTemplateReturnSubFolder
 * 
 * Return string from template sub folder
 * 
 * @param string $TemplateName
 * @return string $dis templat content
 *  
 */
function ParseTemplateReturnSubFolder($TemplateName) { 
	global $SysValue,$LoadItems,$_SESSION; 
	
	$SysValue=$GLOBALS['SysValue'];

	$TemplateFile=phpshop_read_file($TemplateName);
	
	$dis = '';
	
	while(list($line,$string)=each($TemplateFile)) { 
		$string=ConstantS($string);

		$dis.= $string;
	}

	return $dis;
}

/**
 * ConstantS
 *
 * This is constant string
 * 
 * @param $string $string
 * @return string 
 * 
 */
function ConstantS($string) {
	return preg_replace_callback("/@([[:alnum:]]+)@/","ConstantR",$string);
} 

/**
 * ConstantR
 *
 * This is constant array
 * 
 * @param array $array
 * @return string $string
 * 
 */
function ConstantR($array) { 
	global $SysValue; 
	
	if(!empty($SysValue['other'][$array[1]])) {
		$string=$SysValue['other'][$array[1]];
	} else { 
		$string=null;
	}
	
	return $string; 
}

/**
 * phpshop_read_file
 * 
 * This read template file
 *
 * @param string $path
 * @return array $array
 * 
 */
function phpshop_read_file($path) {
	if(!is_file($path)) return false; 
		elseif(!filesize($path)) return array(); 
		elseif($array=file($path)) return $array; 
		else while(!$array=file($path)) sleep(1); 
	
	return $array;
}
?>