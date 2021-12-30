<?php
function __bn_getPhotoURL($galRow){
	
	$news_photo_ID	= $galRow['id'];
	$news_photo_title= ($galRow['title'])?$galRow['title']:$galRow['description'];
	$news_photo_title=short_excerpts(strip_tags($news_photo_title),15);
	$news_photo_title= make_seo_bangla($news_photo_title);
	$url= SCRIPT_URL.'galleryphoto/image/'.$news_photo_ID.'/'.$news_photo_title;
	
	return $url;
}
function getNewsFecImageURL($news_article_info, $image_type='thumb'){
 global $db;
 
 $image_upload_url= 'http://www.fns24.com/images/imgAll/';
$ImageSMPath =($news_article_info['ImageSMPath'])?$image_upload_url.$news_article_info['ImageSMPath']:'';
$image_thumb_url=($news_article_info['image_url'])?$news_article_info['image_url'] : $ImageSMPath;  

$ImageSMPath =($news_article_info['ImageBGPath'])?$image_upload_url.$news_article_info['ImageBGPath']:'';
$image_big_url=($news_article_info['big_image_url'])?$news_article_info['big_image_url'] : $ImageSMPath;
$DistrictID=$news_article_info['DistrictID'];
 if($news_article_info['image_url'] || $news_article_info['ImageSMPath']){
   //  echo 'dddd';
     $image_url = $image_thumb_url;
 }elseif($image_big_url){
  //   echo 'tttt';
     $image_url = $image_big_url;
 }elseif($DistrictID){
     
     $dis_info=$db->getRowArray('bas_district', $DistrictID );
     if($dis_info){
      //   pre($dis_info);
       $image_url =  $dis_info['image_url'];    
     }
     
 }


return  $image_url;
            
}


function __bn_getNewsURL($news_article_info){
	
    
    $url= __bn_getArticleURL($news_article_info);
    /*
	$news_article_ID= $news_article_info['news_id'];	
	$news_article_title= $news_article_info['alias'];
	$news_article_title= make_seo_bangla($news_article_title);
	
	$news_category= $news_article_info['news_category'];
	$news_title= $news_article_info['news_title'];
	
	$url= SCRIPT_URL.'article/'.$news_article_ID.'/'.$news_article_title;
	*/
	return $url;
}

function __uCat($cat_name){
	
	//$url= SCRIPT_URL.'newscategory/'.$bn_cat_info['alias'].'/'.$bn_cat_info['id'].'/'.$bn_cat_info['category_name'];	
	$url= SCRIPT_URL.'newscategory/'.$cat_name.'/';	
	return $url;
}

function __uTodayCat($today_cat_id){
	
	$url= SCRIPT_URL.'todaysnewspaper/'.$today_cat_id;	
	return $url;
}

function __getBreakingNews($limit=20){
	global $db; 
	
	 $breaking_news_sql = "select *  from `breaking_news` where `active` =1 limit $limit";
    $breaking_news_rows = $db->select($breaking_news_sql);
	return 	 $breaking_news_rows;
}

function __getNewsInfo($new_id_seotitle){
	global $db; 
	
	return 	 getNewsInfo($new_id_seotitle);
}
function getNewsCatInfo($cat_id){
    global $db;
  
   
    $table_name='bn_bas_category';$primary_id='CategoryID';
	if(is_numeric($cat_id)){
		$row=$db->getRowArray($table_name,array($primary_id=>$cat_id));
	}
	return 	 $row;	
}

function getNewsInfo($new_id_seotitle){
    global $db;
  
  
  $table_name='all_news';$news_title='news_title';$news_id='news_id';
  
	if(is_numeric($new_id_seotitle)){
		$row=$db->getRowArray($table_name,array($news_id=>$new_id_seotitle));
	}else{
		$row=$db->getRowArray($table_name,array('alias'=>$new_id_seotitle));
		if(!$row){
			$row=$db->select_single("SELECT * FROM $table_name WHERE $news_title ='$new_id_seotitle'");
		}
	}
	return 	 $row;	
}

function getBreakingNews($limit=20){
    global $db;
  
   $sql = "select * from `breaking_news` where `active`='1' ORDER BY id DESC LIMIT $limit";
   return $bqResNumRows = $db->select($sql);
}

function getSelectedNews($limit=7){
    global $db;
  
    $sql = "select * from `all_news` where `selected`='1' and `publish`='1' order by `news_id` desc LIMIT $limit";
	return $selectedNewsqueryresult = $db->select($sql);
}


function getLatestNews($limit=10, $todayDate=false, $cat=false){
		global $db; 
		
	if($todayDate && $cat){
	
	$sql = "select * from `all_news` where `news_submission_date` like '%$todayDate%' order by `news_id` desc LIMIT $limit";
	$sql = "select * from `all_news` where date(`date_added`) = '$todayDate' OR `issue_date` ='$todayDate' order by `news_id` desc LIMIT $limit";
		
	}elseif($todayDate){
		
	$sql = "select * from `all_news` where `news_submission_date` like '%$todayDate%' order by `news_id` desc LIMIT $limit";
	$sql = "select * from `all_news` where date(`date_added`) = '$todayDate' OR `issue_date` ='$todayDate' order by `news_id` desc LIMIT $limit";
	
	}else{
	
	$sql = "select * from `all_news` all_news where `publish`='1' order by `news_id` desc LIMIT $limit";
	
	}	
	
	$rows=$db->select($sql);
	return $rows;
}

function getMostCommentedNews($limit=10, $todayDate=true, $cat=false){
		global $db; 
		
	if($todayDate){
	  $todayDate=todayDate();	
	}
	
	if($todayDate && $cat){
	$sql = "select * from `all_news` where `news_submission_date` like '%$todayDate%' order by `total_comment` desc LIMIT $limit";
		
	}elseif($todayDate){
	$sql = "select * from `all_news` where `total_comment` >0 AND (date(`date_added`) = '$todayDate' OR `issue_date` ='$todayDate') order by `total_comment` desc LIMIT $limit ";
		
	}else{
	 $sql = "select * from `all_news` order by `total_comment` desc LIMIT $limit";
	}	
	
	$rows=$db->select($sql);
	return $rows;
}
function getMostReadNews_7days($limit=10, $todayDate=true, $cat=false){
		global $db; 
		
	$sql= "SELECT * FROM `all_news` WHERE date(`news_submission_date`) between '". date("Y-m-d",mktime(0, 0, 0, date("m")  , date("d")-6, date("Y")))."' AND '".date("Y-m-d")."' order by `total_read` desc LIMIT $limit";
	$sql= "SELECT * FROM `all_news` WHERE date(`date_added`) between '". date("Y-m-d",mktime(0, 0, 0, date("m")  , date("d")-6, date("Y")))."' AND '".date("Y-m-d")."' order by `total_read` desc LIMIT $limit";
	$sql= "SELECT * FROM `all_news_log` WHERE date(`date_added`) between '". date("Y-m-d",mktime(0, 0, 0, date("m")  , date("d")-6, date("Y")))."' AND '".date("Y-m-d")."' order by `total_read` desc LIMIT $limit";
	//$sql = "select * from `all_news_log` where date(`date_added`) = '$todayDate' order by `total_read` desc LIMIT $limit";
	
	//echo $sql;
	$rows=$db->select($sql);
	return $rows;
}
function getMostReadNews($limit=10, $todayDate=true, $cat=false){
		global $db; 
		
	if($todayDate){
	  $todayDate=todayDate();	
	}
 	

	if($todayDate && $cat){
	$sql = "select * from `all_news` where `news_submission_date` like '%$todayDate%' order by `total_read` desc LIMIT $limit";
	$sql = "select * from `all_news_log` where date(`date_added`) = '$todayDate' order by `total_read` desc LIMIT $limit";
	$rows=$db->select($sql);	
	}elseif($todayDate){
		
		$sql = "select * from `all_news` where `news_submission_date` like '%$todayDate%' order by `total_read` desc LIMIT $limit";
		$sql = "select * from `all_news_log` where date(`date_added`) = '$todayDate' order by `total_read` desc LIMIT $limit";
		$rows=$db->select($sql);
		//echo 'count='.count($rows);
		if(!$rows){
			$sql_up = "UPDATE `all_news_log` SET `date_added` = '$todayDate' where news_id IN(select news_id from `all_news` where `issue_date` = '$todayDate')";
			$db->update($sql_up);
			$rows=$db->select($sql);
		}elseif(count($rows) < 10 ){
			$sql_up = "UPDATE `all_news_log` SET `date_added` = '$todayDate' where news_id IN(select news_id from `all_news` where `issue_date` = '$todayDate')";
			$db->update($sql_up);
			$rows=$db->select($sql);
		}
		
	}else{
		
	 $sql = "select * from `all_news` order by `total_read` desc LIMIT $limit";
	 $sql = "select * from `all_news_log` order by `total_read` desc LIMIT $limit";
	 $rows=$db->select($sql);
	 
	}	
	//echo $sql;
	
	return $rows;
}


#bddate.php
function ShowBangladeshTime() {

	$hour = gmdate("H");

	$minute = gmdate("i");

	$seconds = gmdate("s");

	$day = gmdate("d");

	$month = gmdate("m");

	$year = gmdate("Y");

	// This is the offset from the server time to Bangladesh time.

	$hour = $hour + 6;

	//return date("Y-m-d", mktime ($hour,$minute,$seconds,$month,$day,$year));

	return date("Y-m-d H:i:s", mktime ($hour,$minute,$seconds,$month,$day,$year));

}

function todayDate() {

	$hour = gmdate("H");
	$minute = gmdate("i");
	$seconds = gmdate("s");
	$day = gmdate("d");
	$month = gmdate("m");
	$year = gmdate("Y");
	// This is the offset from the server time to Bangladesh time.

	$hour = $hour + 6;

	//return date("Y-m-d", mktime ($hour,$minute,$seconds,$month,$day,$year));

	return date("Y-m-d", mktime ($hour,$minute,$seconds,$month,$day,$year));

}

function xssafe($data,$encoding='UTF-8') {
   return htmlspecialchars($data,ENT_QUOTES | ENT_HTML401,$encoding);
}
?>