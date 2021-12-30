<?php
function require_lang($file_name)
{
	global $LANGUAGE,$LAN;
	if(file_exists(DIR_LANGUAGES.$LANGUAGE.'/child/'.$file_name.'.php')){	  
	   @require_once(DIR_LANGUAGES.$LANGUAGE.'/child/'.$file_name.'.php');
	   $LAN = array_merge($LAN, $LANG_CHILD);
    	//pre($LAN);
	}else{
		return false;
	}
	//return $LAN_child;
}

function append_lang($LAN,$file_name)
{	
	require_once(DIR_LANGUAGES.state('ln').'/child/'.$file_name.'.php');
	$LAN = array_merge($LAN, $LAN_child);
	
	return $LAN;
}

function lang_value($key)
{
	GLOBAL $LAN;
	return $LAN[$key];
}	

function getLaguages(){
	global $db;
 	 	
	$sql="SELECT * FROM language";	
	$rows=$db->select($sql);
	return $rows;
}

function setLanguagesInfo($LANGUAGE){
	global $session,$db;
	$data=$db->getRowArray('languages', array('code'=>strtolower($LANGUAGE)),'directory');
	if($data){
			return $data['directory'];
	}else{
		return 'english';
	}
}
?>