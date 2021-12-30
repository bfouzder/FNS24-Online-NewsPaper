<?php ob_start(); session_start();
/**
 * @author aditya(bfouzder@yahoo.com)
 * @copyright 2015
 */

// Report all PHP errors
//error_reporting(E_ALL ^ E_NOTICE);
error_reporting(0);
/*
#DEFINE PROJECT URL AND DIRECTORY
define('THE_URL', "http://localhost/eTender/");
define('BASE_DIR' , 'D:/xampp/htdocs/eTender/');
#DEFINE DTABASE CONNECTION
define('DB_SERVER', 'localhost');
define('DB_SERVER_USERNAME', 'etender_ewu');
define('DB_SERVER_PASSWORD', '%lMy4s01');
define('DB_DATABASE', 'link3_etender_ewu');
*/
#DEFINE PROJECT URL AND DIRECTORY
define('SCRIPT_URL', "http://etender.ewubd.edu/index.php/");
define('THE_URL', 'http://etender.ewubd.edu/');
define('BASE_DIR' , '/var/www/html/etender/');

#DEFINE DTABASE CONNECTION
define('DB_SERVER', 'localhost');
define('DB_SERVER_USERNAME', 'etender_user');
define('DB_SERVER_PASSWORD', 'etender123!');
define('DB_DATABASE', 'etender');


define('DS' , '/');


//Template example:: http://getbootstrap.com/examples/theme/
//http://getbootstrap.com/css/#forms
//http://getbootstrap.com/components/#input-groups-basic

#DEFINE FRONT END
define('SITE_TITLE','EWS eTender');
define('SITE_KEYWORD','EWS eTender');
define('SITE_DESCRIPTION','EWS eTender');
define('SITE_FROM_EMAIL','bfouzder@yahoo.com');

#DEFINE BACK END/ADMIN PANEL
define('ADMIN_URL',THE_URL.'admin/');
define('ADMIN_DIR',BASE_DIR.'admin/');
define('ADMIN_LOGO','eTender ADMIN <span>PANEL </span>');
define('ADMIN_TITLE','eTender Admin Pannel');


#SETUP YOUR FONTEND THEME 
define('CURRENT_THEME','default');
define('THEME_DIR',BASE_DIR.'includes/themes/');
define('THEME_URI',THE_URL.'includes/themes/');
define('GET_TEMPLATE_DIRECTORY',THEME_DIR.CURRENT_THEME);
define('TEMPLATE_STORE',GET_TEMPLATE_DIRECTORY.'/templates/');
define('GET_TEMPLATE_DIRECTORY_URI',THEME_URI.CURRENT_THEME);

define('COMMON_TEMPLATES',GET_TEMPLATE_DIRECTORY.'/');

define('UPLOAD_URL', THE_URL."uploadserver/");
	
//////////////////////////////////////////////////////////////
define('CLASS_DIR',BASE_DIR.'includes/classes/');
define('FUNCTION_DIR',BASE_DIR.'includes/functions/');
define('MODEL_DIR',BASE_DIR.'includes/models/');

#FRAMEWORK RELATED
define('LANG_STATUS','1');
define('DIR_LANGUAGES',BASE_DIR.'language/');
define('WWW_LANGUAGES',THE_URL.'language/');

define('CONTROLLER_STORE',BASE_DIR.'controllers/');
define('RESOURCE_STORE',BASE_DIR.'resources/');
define('WWW_RESOURCE_STORE',THE_URL.'resources/');

define('DEFAULT_CONTROLER' , 'home');
define('DEFAULT_FUNCTION' , 'index');

define('FILE_DIR',RESOURCE_STORE.'files/');
define('FILE_URL',WWW_RESOURCE_STORE.'files/');

define('CURRENT_DIR','articles2/');

define('IMAGE_DIR',FILE_DIR.CURRENT_DIR.'images/');
define('IMAGE_URL',FILE_URL.CURRENT_DIR.'images/');

define('FEED_IMAGE_DIR',FILE_DIR.'feedimage/');
define('FEED_IMAGE_URL',FILE_URL.'feedimage/');


define('ARTICLE_DIR',FILE_DIR.CURRENT_DIR);
define('ARTICLE_URL',FILE_URL.CURRENT_DIR);

//PROFILE_IMG
define('PROFILE_IMG_URL',THE_URL.'profileimages/');
define('PROFILE_IMG_DIR',BASE_DIR.'profileimages/');


//DEFINE FAVICON	
define('CURRENT_URL' , 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);

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
require_once(CLASS_DIR."dbclass.php");
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
