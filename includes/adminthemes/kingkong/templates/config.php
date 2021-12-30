<?php ob_start(); session_start();
/**
 * AR_PHPMVC
 *
 * @package		PHPMVC_SCRIPT
 * @author		DevTeam
 * @copyright	Copyright (c) 2015, ARSoft, Ltd.
 * @version 3.0
 */
 
error_reporting(E_ALL ^ E_NOTICE);

define('SCRIPT_URL', 'https://www.peumind.com/');
define('BASE_DIR' , '/var/www/html/');
define('THE_URL', SCRIPT_URL);
define('DS' , '/');


#SETUP YOUR FONTEND THEME 
define('CURRENT_THEME','peumind_v1');
define('THEME_DIR',BASE_DIR.'includes/themes/');
define('THEME_URI',SCRIPT_URL.'includes/themes/');
define('GET_TEMPLATE_DIRECTORY',THEME_DIR.CURRENT_THEME);
define('TEMPLATE_STORE',GET_TEMPLATE_DIRECTORY.'/templates/');
define('GET_TEMPLATE_DIRECTORY_URI',THEME_URI.CURRENT_THEME);
define('COMMON_TEMPLATES',GET_TEMPLATE_DIRECTORY.'/');

define('UPLOAD_URL', "/");
	
	
#SETUP YOUR  BACK-END THEME 
//define('ADMIN_CURRENT_THEME','rawframe');
define('ADMIN_CURRENT_THEME','kingkong');
define('ADMIN_URL',SCRIPT_URL.'siteadminpanel/');
//define('ADMIN_URL',SCRIPT_URL.'admin/');//For default
define('ADMIN_THEME_DIR',BASE_DIR.'includes/adminthemes/');
define('ADMIN_THEME_URI',SCRIPT_URL.'includes/adminthemes/');
define('ADMIN_GET_TEMPLATE_DIRECTORY',ADMIN_THEME_DIR.ADMIN_CURRENT_THEME);
define('ADMIN_TEMPLATE_STORE',ADMIN_GET_TEMPLATE_DIRECTORY.'/templates/');
define('ADMIN_GET_TEMPLATE_DIRECTORY_URI',ADMIN_THEME_URI.ADMIN_CURRENT_THEME);
define('ADMIN_COMMON_TEMPLATES',ADMIN_GET_TEMPLATE_DIRECTORY.'/');	
	
//////////////////////////////////////////////////////////////
define('CLASS_DIR',BASE_DIR.'includes/classes/');
define('FUNCTION_DIR',BASE_DIR.'includes/functions/');
define('MODEL_DIR',BASE_DIR.'includes/models/');

define('LANG_STATUS','1');
define('DIR_LANGUAGES',BASE_DIR.'language/');
define('WWW_LANGUAGES',SCRIPT_URL.'language/');

define('CSS_IMAGE_URL',SCRIPT_URL.'includes/css/images/');
define('JS_URL',SCRIPT_URL.'includes/js/');

define('CONTROLLER_STORE',BASE_DIR.'controllers/');
define('TEMPLATE_STORE',BASE_DIR.'templates/');
define('RESOURCE_STORE',BASE_DIR.'resources/');
define('WWW_RESOURCE_STORE',SCRIPT_URL.'resources/');

define('DEFAULT_CONTROLER' , 'home');
define('DEFAULT_FUNCTION' , 'index');

define('COMMON_TEMPLATES',BASE_DIR.'includes/templates/common/');
define('CSS_DIR',BASE_DIR.'includes/css/');
define('CSS_URL',SCRIPT_URL.'includes/css/');

define('FILE_DIR',RESOURCE_STORE.'files/');
define('FILE_URL',WWW_RESOURCE_STORE.'files/');

define('CURRENT_DIR','articles/');

define('IMAGE_DIR',FILE_DIR.CURRENT_DIR.'images/');
define('IMAGE_URL',FILE_URL.CURRENT_DIR.'images/');

define('FEED_IMAGE_DIR',FILE_DIR.'feedimage/');
define('FEED_IMAGE_URL',FILE_URL.'feedimage/');

define('ARTICLE_DIR',FILE_DIR.CURRENT_DIR);
define('ARTICLE_URL',FILE_URL.CURRENT_DIR);

//PROFILE_IMG
define('PROFILE_IMG_URL',FILE_URL.'profileimages/');
define('PROFILE_IMG_DIR',FILE_DIR.'profileimages/');


//DEFILE ADMIN
define('ADMIN_LOGO','PeuMindADMIN <span>PANEL </span>');
define('ADMIN_TITLE','PeuMindAdmin Pannel @PeuMind.Com');

define('SITE_TITLE','PeuMind.Com');
define('SITE_KEYWORD','PeuMind');
define('SITE_DESCRIPTION','PeuMind');


//DEFINE FAVICON	
define('FAVICON','favicon.ico');
define('HTML_PARAMS','dir="ltr" lang="en"');  
define('CURRENT_URL' , 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);

//FUNCTIONS	
//include_from(FUNCTION_DIR);    
 include_once(BASE_DIR.'includes/functions/basic.php');
 include_once(BASE_DIR.'includes/functions/user_auth.php');
 include_once(BASE_DIR.'includes/functions/common.php');
 include_once(BASE_DIR.'includes/functions/function-view.php');


 //MODELS	
include_from(MODEL_DIR);



#DEFINE DTABASE CONNECTION
require("db_connect.php");

require_once(CLASS_DIR."setsessionclass.php");
$session = new setsessionclass;    
require_once(CLASS_DIR."drivers.php");
$driver = new drivers;
include(CLASS_DIR."router.class.php");
$router = new Router($_SERVER['REQUEST_URI']);
$arguments = $router->args;

function include_from($dir, $ext='php',$include_once=false){
	$opened_dir = opendir($dir);	
	while ($element=readdir($opened_dir)){
	   $fext=substr($element,strlen($ext)*-1);
	   if(($element!='.') && ($element!='..') && ($fext==$ext)){
	      if(!$include_once){
	        include($dir.$element);
	      }else{
	        include_once($dir.$element);
	      }
	   }
	}
	closedir($opened_dir);
}
?>