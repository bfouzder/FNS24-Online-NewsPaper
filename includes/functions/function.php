<?php
// page related
	function get_path($path='url'){
		global $db;
		// theme folder
		$theme = get_current_theme(); 
       if($path=='url'){
       	 return SCRIPT_URL . 'themes/' . $theme . '/';
       } else {
       	 return BASE_DIR . 'themes/' . $theme . '/';
       }

	}

	function get_template($template_name, $type = 'templates', $return = 'include'){
		global $db;
		// theme folder
		//$theme = 'recoverylife'; 
		$theme = get_current_theme(); 

		$default_path = BASE_DIR . 'includes/' . $type . '/' . $template_name;
		$default_uri = SCRIPT_URL . 'includes/' . $type . '/'. $template_name;
		$file_path = BASE_DIR . 'themes/' . $theme . '/' . $type . '/' . $template_name;
		$file_uri = SCRIPT_URL . 'themes/' . $theme . '/' . $type . '/'. $template_name;
		$file_name = '';
		$file_name_uri = '';
		
		if (file_exists($file_path)) {
			$file_name = $file_path;
			$file_name_uri = $file_uri;
		} else {
			$file_name = $default_path;
			$file_name_uri = $default_uri;	
		}
		
		if ($file_name != '') {
			if ($return == 'include') include_once $file_name;
			if ($return == 'uri') return $file_name_uri;
			if ($return == 'path') return $file_name;
		}
		return true;
	}
	
	function get_template_image($imagename){
		return get_template($imagename, 'images', 'uri');
	}
	
	function get_template_css($filename){
		return get_template($filename, 'css', 'uri');
	}
	
	function get_template_js($filename){
		return get_template($filename, 'js', 'uri');
	}
	
	function get_resource($name, $type, $return = 'uri'){
		$resource_path = RESOURCE_STORE;
		$full_path = $resource_path . $type . '/' . $name;
		if (file_exists($full_path)) {
			if ($return == 'uri') return WWW_RESOURCE_STORE . $type . '/' . $name;
		}
		return '';
	}

function getTotalComments($type,$content_id){
	global $db; 

   $sql="SELECT * FROM comments WHERE status=1 AND comment_type='$type' AND post_id='$content_id'";	
   $rows=$db->affected($sql);
   return $rows;		
}
    
function getCommentsByLimit($type,$content_id,$limit=8,$order_by='DESC'){
	global $db; 

   $sql="SELECT * FROM comments WHERE status=1 AND comment_type='$type' AND post_id='$content_id' ORDER BY id $order_by LIMIT $limit";	
   $rows=$db->select($sql);
   if($rows){
   return array_reverse($rows); 
   }	
}   
 
function getComments($type,$content_id,$order_by='DESC'){
	global $db; 

   $sql="SELECT * FROM comments WHERE status=1 AND comment_type='$type' AND post_id='$content_id' ORDER BY id $order_by";	
   $rows=$db->select($sql);
   return $rows;		
}

function checkBadwords($text){
    global $db;
    if(!$text)return false;
    $badwords=$db->getRowsArray('badwords');
    if($badwords){        
        $text=strip_tags($text);
        foreach($badwords as $k=>$val){
            $badword=$val['badword'];
            
            if(stristr($text,$badword)){
                return $badword;
            }
        }
    }
    
    return false;
}
function getAdsByTitle($ads_title){
	global $db;
	
	$row=$db->getRowArray('adsense',array('ads_title'=>$ads_title),array('ads_code'));
	if($row){
	return $row['ads_code'];	
	}else return false;		
}

 function checkBandIPS(){
    
  	//////return true if user ip is in band ip list
    $check = false;    
    $user_ip = $_SERVER['REMOTE_ADDR'];
    $band_ips = getSettings('BANNED_IPS');
    //exit
    $arr_band_ip =explode("\n",$band_ips);
    //print_r($arr_band_ip);
  

    if($arr_band_ip)
     {
         
	 	//if(in_array($user_ip,$arr_band_ip))
     	// $check = true;
     	
     	foreach($arr_band_ip as $values)
     	{
  	      if(trim($values) == trim($user_ip))
	     	{
	     		$check = true;
	     		break;
	     	}
     	}
     
     }
    return $check;
  }
  		
?>