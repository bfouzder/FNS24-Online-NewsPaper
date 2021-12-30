<?php ob_start(); session_start();
/**
 * @author aditya(bfouzder@yahoo.com)
 * @copyright 2015
 */

// Report all PHP errors
//error_reporting(E_ALL ^ E_NOTICE);
error_reporting(0);
#DEFINE PROJECT URL AND DIRECTORY
define('SCRIPT_URL', "https://www.fns24.com/");
define('BASE_DIR' , '/home/fns24bangla/public_html/');

#DEFINE DTABASE CONNECTION
define('DB_SERVER', 'localhost');
define('DB_SERVER_USERNAME', 'fns24ban_fouzder');
define('DB_SERVER_PASSWORD', ']LSuxQ4Vg9[w');
define('DB_DATABASE', 'fns24bangla_maindb');

define('DS' , '/');
define('THE_URL', SCRIPT_URL);

#DEFINE FRONT END
define('SITE_TITLE','FNS24');
define('SITE_KEYWORD','FNS24');
define('SITE_DESCRIPTION','FNS24');
define('SITE_FROM_EMAIL','info@fns24.com');

#SETUP YOUR FONTEND THEME 
define('CURRENT_THEME','default');
define('THEME_DIR',BASE_DIR.'includes/themes/');
define('THEME_URI',SCRIPT_URL.'includes/themes/');
define('GET_TEMPLATE_DIRECTORY',THEME_DIR.CURRENT_THEME);
define('TEMPLATE_STORE',GET_TEMPLATE_DIRECTORY.'/templates/');
define('GET_TEMPLATE_DIRECTORY_URI',THEME_URI.CURRENT_THEME);
define('COMMON_TEMPLATES',GET_TEMPLATE_DIRECTORY.'/');

#DEFINE BACK-END/ADMIN PANEL
define('ADMIN_TITLE','FNS24 News');
define('ADMIN_SUB_TITLE','Admin Pannel');

#SETUP YOUR  BACK-END THEME 
define('ADMIN_CURRENT_THEME','kingkong');
define('ADMIN_URL',SCRIPT_URL.'siteadminpanel/');
define('ADMIN_THEME_DIR',BASE_DIR.'includes/adminthemes/');
define('ADMIN_THEME_URI',SCRIPT_URL.'includes/adminthemes/');
define('ADMIN_GET_TEMPLATE_DIRECTORY',ADMIN_THEME_DIR.ADMIN_CURRENT_THEME);
define('ADMIN_TEMPLATE_STORE',ADMIN_GET_TEMPLATE_DIRECTORY.'/templates/');
define('ADMIN_GET_TEMPLATE_DIRECTORY_URI',ADMIN_THEME_URI.ADMIN_CURRENT_THEME);
define('ADMIN_COMMON_TEMPLATES',ADMIN_GET_TEMPLATE_DIRECTORY.'/');

#for 3rdParty Vendors
define('GET_VENDORS_DIRECTORY',BASE_DIR.'includes/3rdParty');
define('GET_VENDORS_DIRECTORY_URI',SCRIPT_URL.'includes/3rdParty');

define('UPLOAD_URL', SCRIPT_URL."uploadserver/");
	
//////////////////////////////////////////////////////////////
define('CLASS_DIR',BASE_DIR.'includes/classes/');
define('FUNCTION_DIR',BASE_DIR.'includes/functions/');
define('MODEL_DIR',BASE_DIR.'includes/models/');

#FRAMEWORK RELATED
define('LANG_STATUS','1');
define('DIR_LANGUAGES',BASE_DIR.'language/');
define('WWW_LANGUAGES',SCRIPT_URL.'language/');

define('CONTROLLER_STORE',BASE_DIR.'controllers/');
define('RESOURCE_STORE',BASE_DIR.'resources/');
define('WWW_RESOURCE_STORE',SCRIPT_URL.'resources/');

define('DEFAULT_CONTROLER' , 'home');
define('DEFAULT_FUNCTION' , 'index');

define('FILE_DIR',RESOURCE_STORE.'files/');
define('FILE_URL',WWW_RESOURCE_STORE.'files/');

define('CURRENT_DIR','articles/');

define('IMAGE_DIR',RESOURCE_STORE.'images/');
define('IMAGE_URL',WWW_RESOURCE_STORE.'images/');

define('FEED_IMAGE_DIR',FILE_DIR.'feedimage/');
define('FEED_IMAGE_URL',FILE_URL.'feedimage/');


define('ARTICLE_DIR',FILE_DIR.CURRENT_DIR);
define('ARTICLE_URL',FILE_URL.CURRENT_DIR);

//PROFILE_IMG
define('PROFILE_IMG_URL',SCRIPT_URL.'profileimages/');
define('PROFILE_IMG_DIR',BASE_DIR.'profileimages/');


//DEFINE FAVICON	
define('CURRENT_URL' , 'https://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);

//FUNCTIONS	
//include_from(FUNCTION_DIR);    
 include_once(BASE_DIR.'includes/functions/basic.php');
 include_once(BASE_DIR.'includes/functions/user_auth.php');
 include_once(BASE_DIR.'includes/functions/function.php');
 include_once(BASE_DIR.'includes/functions/common.php');
 include_once(BASE_DIR.'includes/functions/function-view.php');
 include_once(BASE_DIR.'includes/functions/category.php');
 
 //MODELS	
include_from(MODEL_DIR);

//CLASSES
require_once(CLASS_DIR."dbclass.i.php");
$db = new dbclass;
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
