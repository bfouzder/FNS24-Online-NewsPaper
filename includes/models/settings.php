<?php
function ar_ShowAds($position=1, $displayon=''){

   $html='';    
   if($position){
    $html ='<!--bof Ads '.$position. '-->';
    $html .= '<div class="ar_ads">'.getSettings('AR_GOOGL_ADS_'.$position).'</div>'; 
    $html .='<!--eof Ads '.$position. '-->';
   } 
   return $html; 
}
function getSettingGroups(){
	global $db;

	$gropus = $db->select("SELECT opt_group FROM settings GROUP BY opt_group");
	$return = array();
	foreach($gropus as $group){
		$return[] = $group['opt_group'];
	}
	return $return;	
}

function getSettingByGroups($opt_group){	

	global $db;
	$settings = $db->select("SELECT * FROM settings WHERE opt_group='".$opt_group."'");
	return $settings;	
}

function getGroupSettings($opt_group){
	global $db;
    
    $gsetts=array();
	$gsettings = $db->select("SELECT `key`, `value` FROM settings WHERE opt_group='".$opt_group."'");
    if($gsettings){
        foreach($gsettings as $k=>$val){
            $gsetts[$val['key']]=$val['value'];
        }
    }
	return $gsetts;	
}

function getSettings($key=false){
	 global $db;  
	  if($key){
		$res = $db->getRowArray('settings',array("key" => $key),'value');
		return $res['value'];
	  }else{
			$res = $db->getRowsArray('settings');
			if($res){
				foreach($res as $value){		

					$v_key = $value['key'];
					$v_value = $value['value'];
					$settings[$v_key] = $v_value;
				 }
			 }
		 return $settings;
	   }
}


function showTopBanner($banner_id,$show_ads=true){
	global $db;
    
    return '<img src="'.MAGE_URL.'add.png" alt="" />';
    
	$banner_info=$db->select_single("SELECT * FROM banners WHERE banner_id='$banner_id' AND status=1");
	if($banner_info  && $show_ads){
	   return '<a href="'.$banner_info['url'].'"><img src="'.$banner_info['banner'].'" alt="'.$banner_info['name'].'" /></a>';	
	}else return '<img src="'.MAGE_URL.'add.png" alt="" />';
}
function showGoogleAds($id,$show_ads=true){
	global $db;
    
	$row=$db->select_single("SELECT ads_code FROM adsense WHERE id='$id' AND status=1");
	if($row  && $show_ads){
	return $row['ads_code'];	
	}else return false;
}
function showBannerAds($id,$show_ads=true){
	global $db;
    
	$row=$db->select_single("SELECT ads_code FROM banner_adsense WHERE id='$id' AND status=1");
	if($row  && $show_ads){
	return $row['ads_code'];	
	}else return false;
}
?>	