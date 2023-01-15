<?php
/**
 * RAW PHP SCRIPT
 *
 * @package		RAWPHPSCRIPT
 * @author		Aditya(bfouzder@yahoo.com).
 * @copyright	Copyright (c) 2015.
 * @version 2.0
 */
	
class home{
	
	var $db;
	var $session;
	var $controller;	
			
	function __construct()
	{
		global $lang,$db,$session;
		
		$this->db = $db;
		$this->session = $session;								
		$this->controller = 'home';
		$this->member_id = state('CE_member_id');
        
        $this->is_home=false;
	}
			
	function index($params = array()){
		global $lang,$db,$session;
   	    if($_SERVER['SERVER_NAME'] == 'fns24.com'){
   	      redirect();  
   	    }
		$this->is_home =true;
		if($params){
			$page_name=trim($params['0']);		
			$page_info=$this->db->getRowArray("pagemanager", array("page_name" =>$page_name));
			if($page_info){
				$this->page($params);exit;
			}
		}

		$is_home_page=true;
	
        require(GET_TEMPLATE_DIRECTORY.'/header.php');
		require(TEMPLATE_STORE.$this->controller . DS .'home.php');  
	    require(GET_TEMPLATE_DIRECTORY.'/footer.php');		
	}
	function newscategory($params = array()){
		global $lang,$db,$session;
   	
		//pre($params);
		$news_cat_id=$params[1];
		$news_cat_name=$params[2];
		$page = $db->get('page');
		$page_limit=10;
		$link ="newscategory/$news_cat_id/$news_cat_name/?";
		#category Info
	    $sql_query="SELECT *FROM `bn_bas_category` WHERE CategoryID ='$news_cat_id' "; 
		$news_cat_info=$db->select_single( $sql_query);
		$news_cat_name=$news_cat_info['CategoryName'];
		if(!$news_cat_info)die('Wrong Access!');
		
		#News by category
		$sql_query="SELECT *FROM `bn_content` WHERE CategoryID ='$news_cat_id' "; 
		$sql_query="SELECT ContentID, ContentHeading, ContentDetails, ImageSMPath, EncryptedValue, DATE_FORMAT(bn_content.DateTimeInserted, '%d%m%Y') AS fDateTimeInserted FROM bn_content WHERE ShowContent=1 AND Deletable=1 AND CategoryID='$news_cat_id' ORDER BY ContentID DESC "; 
		$sql_query="SELECT * FROM all_news WHERE status=1 AND cat_id='$news_cat_id' ORDER BY news_id DESC "; 
		$pages = make_pagination($sql_query,$page,$page_limit);
		$sql_query .= " LIMIT ".$pages['start_form'].",".$pages['per_page'];
		$news_cat_rows = $db->select($sql_query);
	//	pre($news_cat_rows);
	//	echo $sql_query;
	//pre($pages);
	
        require(GET_TEMPLATE_DIRECTORY.'/header.php');
		require(TEMPLATE_STORE.$this->controller . DS .'template-category.php');  
	    require(GET_TEMPLATE_DIRECTORY.'/footer.php');		
	}
	
    function archive($params = array()){
		global $lang,$db,$session;
   	
   	
   	    $date=$db->get('date');
   	    $date = ($date)?$date:date('Y-m-d');
   	    $display_date=ar_FormatDateEn2Bn($date,'j F, Y');
   	    
		//pre($params);
		$page = $db->get('page');
		$page_limit=10;
		$link ="archive/?date=$date&";
	
      
        $news_top_title= 'আর্কাইভ';
		
		$bread_cum_list= '<li><a href="'.SCRIPT_URL.'archive/">'. $news_top_title.'</a></li>';
		$bread_cum_list .= '<li class="active">'. $display_date.'</li>';
		
		#News by category
		$sql_query="SELECT * FROM all_news WHERE status=1 AND date(`date_added`)='$date' ORDER BY news_id DESC "; 
		$pages = make_pagination($sql_query,$page,$page_limit);
		$sql_query .= " LIMIT ".$pages['start_form'].",".$pages['per_page'];
		$news_cat_rows = $db->select($sql_query);
		//echo $sql_query;
	
	
        require(GET_TEMPLATE_DIRECTORY.'/header.php');
	//	require(TEMPLATE_STORE.$this->controller . DS .'template-dist-news.php');  
		require(TEMPLATE_STORE.$this->controller . DS .'template-archive-news.php');  
	    require(GET_TEMPLATE_DIRECTORY.'/footer.php');		
	}
	function mofossol($params = array()){
		global $lang,$db,$session;
   	
		//pre($params);
		$DistrictID =$news_cat_id=$params[1];
		$news_cat_name=$params[2];
		$page = $db->get('page');
		$page_limit=10;
		$link ="mofossol/?";
	
  
      
      
        $news_top_title= 'জেলার / মফস্বলের সব খবর';
		
		$bread_cum_list .= '<li class="active">'. $news_top_title.'</li>';
		
		#News by category
		$sql_query="SELECT * FROM all_news WHERE status=1 AND DistrictID BETWEEN 2 and 66 ORDER BY news_id DESC Limit 200 "; 
	    /*$sql_query="SELECT * FROM all_news WHERE status=1 AND DistrictID BETWEEN 1 and 66"; 
		$pages = make_pagination($sql_query,$page,$page_limit);
		$sql_query .= " LIMIT ".$pages['start_form'].",".$pages['per_page'];
		*/
		$news_cat_rows = $db->select($sql_query);
	#	echo $sql_query;
	
	
        require(GET_TEMPLATE_DIRECTORY.'/header.php');
		require(TEMPLATE_STORE.$this->controller . DS .'template-dist-news.php');  
	    require(GET_TEMPLATE_DIRECTORY.'/footer.php');		
	}
	
    function district($params = array()){
		global $lang,$db,$session;
   	
		//pre($params);
		$DistrictID =$news_cat_id=$params[1];
		$news_cat_name=$params[2];
		$page = $db->get('page');
		$page_limit=10;
		$link ="district/$DistrictID/$news_cat_name/?";
		#category Info
	    $sql_query="SELECT *FROM `bas_district` WHERE DistrictID ='$news_cat_id' "; 
		$district_info= $news_cat_info=$db->select_single( $sql_query);
        
        $news_top_title='';
        $DistrictNameBN= $district_info['DistrictNameBN'];
     
        $news_top_title= $DistrictNameBN;
		if(!$news_cat_info)die('Wrong Access!');
		$DivisionID=$district_info['DivisionID'];
		$sql_query="SELECT *FROM `bas_division` WHERE DivisionID ='$DivisionID'"; 
		$division_info= $news_cat_info=$db->select_single( $sql_query);
		
		$DivisionNameBN=$division_info['DivisionNameBN'];
		
		$bread_cum_list= '<li><a href="'.SCRIPT_URL.'division/'.$DivisionID.'/'.$DivisionNameBN.'/">'. $DivisionNameBN.'</a></li>';
		$bread_cum_list .= '<li class="active">'. $DistrictNameBN.'</li>';
		
		#News by category
		$sql_query="SELECT * FROM all_news WHERE status=1 AND DistrictID='$news_cat_id' ORDER BY news_id DESC "; 
		$pages = make_pagination($sql_query,$page,$page_limit);
		$sql_query .= " LIMIT ".$pages['start_form'].",".$pages['per_page'];
		$news_cat_rows = $db->select($sql_query);
		//echo $sql_query;
	
	
        require(GET_TEMPLATE_DIRECTORY.'/header.php');
		require(TEMPLATE_STORE.$this->controller . DS .'template-dist-news.php');  
	    require(GET_TEMPLATE_DIRECTORY.'/footer.php');		
	}
    
     function division($params = array()){
		global $lang,$db,$session;
   	
		//pre($params);
		$DivisionID =$news_cat_id=$params[1];
		$news_cat_name=$params[2];
		$page = $db->get('page');
		$page_limit=10;
		$link ="division/$DivisionID/$news_cat_name/?";
		#category Info
	    $sql_query="SELECT *FROM `bas_division` WHERE DivisionID ='$news_cat_id' "; 
		$division_info= $news_cat_info=$db->select_single( $sql_query);
        
        $news_cat_name=$division_info['DivisionNameBN'];
		if(!$news_cat_info)die('Wrong Access!');
		
		#News by category
		$sql_query="SELECT * FROM all_news WHERE status=1 AND DistrictID IN (SELECT DistrictID from `bas_district` WHERE DivisionID =$news_cat_id  ) ORDER BY news_id DESC "; 
		$pages = make_pagination($sql_query,$page,$page_limit);
		$sql_query .= " LIMIT ".$pages['start_form'].",".$pages['per_page'];
		$news_cat_rows = $db->select($sql_query);
		//echo $sql_query;
	
	
        require(GET_TEMPLATE_DIRECTORY.'/header.php');
		require(TEMPLATE_STORE.$this->controller . DS .'template-category.php');  
	    require(GET_TEMPLATE_DIRECTORY.'/footer.php');		
	}
	function allnews($params = array()){
		global $lang,$db,$session;
		#pre($params);
		$news_type=$params[1];
		$news_date=$params[2];
		$page = $db->get('page');
		$page_limit=20;
        
        $district=$db->get('dist');
        $division=$db->get('division');
        if($district){
		     
            $dist_info= $db->select_single("SELECT * FROM `bas_district` WHERE DistrictID= $district");
          	$page_title2 = 'সর্বশেষ  সংবাদ';
          	$page_title = 'জেলা'.' - '.$dist_info['DistrictNameBN'].' - ' .$page_title2;
			
            redirect('district/'.$district.'/'.$dist_info['DistrictNameBN']); 
		}
		if($division){
		     
            $division_info= $db->select_single("SELECT * FROM `bas_division` WHERE DivisionID= $division");
          	$page_title2 = 'সর্বশেষ  সংবাদ';
          	$page_title = 'জেলা'.' - '.$division_info['DivisionNameBN'].' - ' .$page_title2;
            redirect('division/'.$division.'/'.$division_info['DivisionNameBN']); 
		}
        
		$news_type=($news_type)?$news_type:'latest';
	    if($news_type =='mostviewed'){
			
			$page_title = 'সকল সবচেয়ে পঠিত  সংবাদ';	
			$page_title = 'সপ্তাহের সবচেয়ে পঠিত  সংবাদ';
			
			$sql_query="SELECT * FROM all_news where `status`='1' "; 
			$sql_query="SELECT *FROM `all_news` WHERE date_added >= DATE(NOW()) - INTERVAL 7 DAY AND status=1"; 
			$pages = make_pagination($sql_query,$page,$page_limit);
			$sql_query .= " order by `total_read` desc";
			
		}elseif($news_type =='latest'){
			
			$page_title = 'সর্বশেষ  সংবাদ';	
			
			$sql_query="SELECT * FROM all_news where `status`='1' AND news_id > 240000 "; 
			$sql_query="SELECT *FROM `all_news` WHERE date_added >= DATE(NOW()) - INTERVAL 7 DAY AND status=1"; 
			$pages = make_pagination($sql_query,$page,$page_limit);
			$sql_query .= " order by `news_id` desc";
			
		}elseif($news_type =='top'){
			
			$page_title = 'শীর্ষ সংবাদ ';	
			
			$sql_query="SELECT *FROM `all_news` WHERE status=1 AND spot_light = 1 "; 
			$sql_query="SELECT *FROM `all_news` WHERE date_added >= DATE(NOW()) - INTERVAL 7 DAY AND status=1 AND spot_light = 1"; 
			$pages = make_pagination($sql_query,$page,$page_limit);
			$sql_query .= " order by `news_id` desc";
			
		}else{
			$page_title = 'সর্বশেষ  সংবাদ';
			
				$sql_query="SELECT * FROM all_news where `status`='1' AND news_id > 240000"; 
				//order by `news_submission_date` desc
				$pages = make_pagination($sql_query,$page,$page_limit);
				$sql_query .= " order by `news_id` DESC";
		}

		$sql_query .= " LIMIT ".$pages['start_form'].",".$pages['per_page'];
		$news_rows = $db->select($sql_query);
		//echo $sql_query;
	
	    $link ="allnews/$news_type/?";
	   
		
		require(GET_TEMPLATE_DIRECTORY.'/header.php');
		require(TEMPLATE_STORE.$this->controller . DS .'template_all_news.php');  
	    require(GET_TEMPLATE_DIRECTORY.'/footer.php');
	}
    function temparticle($params = array()){
		global $lang,$db,$session;
   	
        $iContentID = '';  	
        
        
        $news_article_ID= $params[1];	
        

        $sql_query="SELECT * FROM `all_news_temp` WHERE news_id_temp ='$news_article_ID' ";  
        

		$news_article_info=$db->select_single( $sql_query);
		//pre($news_article_info);
		if(!$news_article_info)die('Wrong Access!');
		
	//	pre($news_article_info);
		$news_article_ID= $news_article_info['news_id_temp'];	
		$news_article_CategoryID= $news_article_info['cat_id'];	
		$news_article_title= $news_article_info['news_title'];
		$news_article_sub_title=$news_article_info["news_subheading"];
        
		$image_url_caption=$news_article_info["image_url_caption"];
		$big_image_url_caption=$news_article_info["big_image_url_caption"];
        
		$fb_image= $news_article_image_thuumb= getNewsFecImageURL($news_article_info);	
		$news_article_image_big=$news_article_info['big_image_url'];	
		$news_article_image=($news_article_image_big)?$news_article_image_big:$news_article_image_thuumb;	
		$news_article_image_caption=($big_image_url_caption)?$big_image_url_caption:$image_url_caption;	
		
		
		$news_article_image = ($news_article_image)?SCRIPT_URL.'includes/3rdParty/timthumb.php?src='.$news_article_image.'&h=560&w=560&zc=2':$news_article_image;
        
		$news_article_content= $news_article_info["news_details"];
		$news_article_excerpt= trunc_words($news_article_content,40);
		$news_article_Writers= $news_article_info['Writers'];	
		$news_article_Initial= $news_article_info['Initial'];
        //$news_article_pub_date=ar_FormatDateEn2Bn($news_article_info["date_added"],'j F, Y, g:i a');
		$news_article_pub_date=ar_FormatDateEn2Bn($news_article_info["DateTimeUpdated"],'j F, Y, g:i a');
		//$news_article_pub_date=$news_article_info["DateTimeInserted"];
	
	
		#category Info
	    $sql_query="SELECT *FROM `bn_bas_category` WHERE CategoryID ='$news_article_CategoryID' "; 
		$news_cat_info=$db->select_single( $sql_query);
		$news_cat_name=$news_cat_info['CategoryName'];
		$news_cat_url=SCRIPT_URL.'newscategory/'.$news_article_CategoryID.'/'.$news_cat_name;	
		$news_article_url= SCRIPT_URL.'article/'.$news_article_ID.'/'.$news_article_title;	
		if(!$news_cat_info)die('Wrong Access!');
		
		
        
        $total_viewed = $news_article_info['total_read'];	
	   
       
        
        $news_article_info['news_tag'] ;
		$related_news_home_rows ='';
		if($news_article_info['news_tag']){
			$news_tags=explode(',',$news_article_info['news_tag'] );
			if($news_tags){
			  $tag=$news_tags[0];
			// pre($news_tags);
				$related_news_sql_query="SELECT * from `all_news` where `status`='1'";
				/*
                foreach($news_tags as $k=>$tag){
					$tag=trim($tag);
					if($tag){
					$related_news_sql_query .= " AND `news_tag` like '%$tag%'";
					}			
				}
                */
                
               	$related_news_sql_query .= " AND `news_tag` like '%$tag%' AND `news_id` !='$news_article_ID'";
				$related_news_sql_query .= " order by `news_id` desc LIMIT 15";
		        $related_news_home_rows = $db->select($related_news_sql_query);
			}
			//echo $related_news_sql_query;
			
		}
        
        $related_news_rows ='';
		if($news_article_info['cat_id']){
			//$news_cats=current(explode(',',$news_article_info['news_category'] ));
			$news_cats=$news_article_info['cat_id'];
			$related_news_sql_query="select * from `all_news` where `cat_id` = '$news_cats' and `news_id` !='$news_article_ID'  order by `news_id` desc LIMIT 12";
			//$related_news_rows = $db->select($related_news_sql_query);
		}
		
		$meta_url= __bn_getNewsURL($news_article_info);	;
		$meta_title= $news_article_title;
		
        if($news_article_info['meta_keywords']){
		$meta_keywords=$news_article_info['meta_keywords'];
		}else{
		$meta_keywords=($news_article_info['news_tag'])?$news_article_info['news_tag']:strip_tags(short_excerpts($news_article_info['news_details'],40));
		}
		
		#$meta_description='<img src=\'https://www.dailyinqilab.com/includes/themes/dailyinqilab/images/logo.png\'> '.strip_tags(short_excerpts($news_article_info['news_details'],40));
		$meta_description=short_excerpts(strip_tags($news_article_info['news_details']),30);
                
		$replace_array=array(
			'&curren;',
            '&nbsp;',
			'&lsquo;',
			'&rsquo;');
                        
		$meta_description=str_ireplace($replace_array,'',$meta_description);
		$meta_keywords=str_ireplace($replace_array,'',$meta_keywords);
			
		$meta_author=($news_article_Writers)?$news_article_Writers:'নিজস্ব প্রতিবেদক  ';
        //pre($news_cat_info);
                
	        
                
		
        require(GET_TEMPLATE_DIRECTORY.'/header.php');
		require(TEMPLATE_STORE.$this->controller . DS .'article_detail.php');  
	    require(GET_TEMPLATE_DIRECTORY.'/footer.php');		
	}
    
	function article($params = array()){
		global $lang,$db,$session;
   	
        $iContentID = '';  	
        
        
        $news_article_ID= $params[1];	
        
        #category Info
        $sql_query="SELECT * FROM `bn_content` WHERE ContentID ='$news_article_ID' "; 
        if($iContentID ){
           $sql_query="SELECT * FROM `all_news` WHERE EncryptedValue ='$iContentID' "; 
        }else{
          $sql_query="SELECT * FROM `all_news` WHERE news_id ='$news_article_ID' ";  
        }
        

		$news_article_info=$db->select_single( $sql_query);
		//pre($news_article_info);
		if(!$news_article_info)die('Wrong Access!');
		
	//	pre($news_article_info);
		$news_article_ID= $news_article_info['news_id'];	
		$news_article_CategoryID= $news_article_info['cat_id'];	
		$news_article_title= $news_article_info['news_title'];
		$news_article_sub_title=$news_article_info["news_subheading"];
        
		$image_url_caption=$news_article_info["image_url_caption"];
		$big_image_url_caption=$news_article_info["big_image_url_caption"];
        
		$fb_image= $news_article_image_thuumb= getNewsFecImageURL($news_article_info);	
		$news_article_image_big=$news_article_info['big_image_url'];	
		$news_article_image=($news_article_image_big)?$news_article_image_big:$news_article_image_thuumb;	
		$news_article_image_caption=($big_image_url_caption)?$big_image_url_caption:$image_url_caption;	
        
		$news_article_content= $news_article_info["news_details"];
		$news_article_excerpt= trunc_words($news_article_content,40);
		$news_article_Writers= $news_article_info['Writers'];	
		$news_article_Initial= $news_article_info['Initial'];
        $news_article_pub_date=ar_FormatDateEn2Bn($news_article_info["date_added"],'j F, Y, g:i a');
		$news_article_updated_date=ar_FormatDateEn2Bn($news_article_info["DateTimeUpdated"],'j F, Y, g:i a');
		//$news_article_pub_date=$news_article_info["DateTimeInserted"];
	
		if($news_article_info['news_id_temp']){
		   $news_article_image = ($news_article_image)?SCRIPT_URL.'includes/3rdParty/timthumb.php?src='.$news_article_image.'&h=560&w=560&zc=3':$news_article_image;	
		}
	
		#category Info
	    $sql_query="SELECT *FROM `bn_bas_category` WHERE CategoryID ='$news_article_CategoryID' "; 
		$news_cat_info=$db->select_single( $sql_query);
		$news_cat_name=$news_cat_info['CategoryName'];
		$news_cat_url=SCRIPT_URL.'newscategory/'.$news_article_CategoryID.'/'.$news_cat_name;	
		$news_article_url= SCRIPT_URL.'article/'.$news_article_ID.'/'.$news_article_title;	
		if(!$news_cat_info)die('Wrong Access!');
		
		
        
        $total_viewed = $news_article_info['total_read'];	
	    if(state('nvid')!=$news_article_ID){
			$db->update("UPDATE all_news SET `total_read` = total_read+1 WHERE news_id=$news_article_ID");
			state('nvid',$news_article_ID);
			$total_viewed=$total_viewed+1;
		}
        
        
        
		#related News
		//$related_news_html=__getRelatedNewsArticles($news_article_CategoryID,$except_ID=$news_article_ID);
		
		/*$pos=getPosition($news_article_content); 
		//$pos = stripos($news_article_content, '</p>');		
		$news_article_content = substr_replace($news_article_content, $related_news_html, $pos+5, 0);		
        */
        
        $news_article_info['news_tag'] ;
		$related_news_home_rows ='';
		if($news_article_info['news_tag']){
			$news_tags=explode(',',$news_article_info['news_tag'] );
			if($news_tags){
			  $tag=$news_tags[0];
			// pre($news_tags);
				$related_news_sql_query="SELECT * from `all_news` where `status`='1'";
				/*
                foreach($news_tags as $k=>$tag){
					$tag=trim($tag);
					if($tag){
					$related_news_sql_query .= " AND `news_tag` like '%$tag%'";
					}			
				}
                */
                
               	$related_news_sql_query .= " AND `news_tag` like '%$tag%' AND `news_id` !='$news_article_ID'";
				$related_news_sql_query .= " order by `news_id` desc LIMIT 15";
		        $related_news_home_rows = $db->select($related_news_sql_query);
			}
			//echo $related_news_sql_query;
			
		}
        
        $related_news_rows ='';
		if($news_article_info['cat_id']){
			//$news_cats=current(explode(',',$news_article_info['news_category'] ));
			$news_cats=$news_article_info['cat_id'];
			$related_news_sql_query="select * from `all_news` where `cat_id` = '$news_cats' and `news_id` !='$news_article_ID'  order by `news_id` desc LIMIT 12";
			//$related_news_rows = $db->select($related_news_sql_query);
		}
		
		$meta_url= __bn_getNewsURL($news_article_info);	;
		$meta_title= $news_article_title;
		
        if($news_article_info['meta_keywords']){
		$meta_keywords=$news_article_info['meta_keywords'];
		}else{
		$meta_keywords=($news_article_info['news_tag'])?$news_article_info['news_tag']:strip_tags(short_excerpts($news_article_info['news_details'],40));
		}
		
		#$meta_description='<img src=\'https://www.dailyinqilab.com/includes/themes/dailyinqilab/images/logo.png\'> '.strip_tags(short_excerpts($news_article_info['news_details'],40));
		$meta_description=short_excerpts(strip_tags($news_article_info['news_details']),30);
                
		$replace_array=array(
			'&curren;',
            '&nbsp;',
			'&lsquo;',
			'&rsquo;');
                        
		$meta_description=str_ireplace($replace_array,'',$meta_description);
		$meta_keywords=str_ireplace($replace_array,'',$meta_keywords);
			
		$meta_author=($news_article_Writers)?$news_article_Writers:'নিজস্ব প্রতিবেদক  ';
        //pre($news_cat_info);
                
	        
                
		
        require(GET_TEMPLATE_DIRECTORY.'/header.php');
		require(TEMPLATE_STORE.$this->controller . DS .'article_detail.php');  
	    require(GET_TEMPLATE_DIRECTORY.'/footer.php');		
	}
	
   function photo($params = array()){
		global $lang,$db,$session;		
     
         $template_name='photo_gallery_index';
         if($params[1]=='album'){
            $template_name='photo_album_detail';
            
            $album_id= $params[2];
            $album_info=$db->select_single("SELECT * FROM  `image_albums` WHERE album_id = '$album_id'");
            if(!$album_info){ die('Wrong Access');}
            $album_title= $album_info['album_title'];
            //pre($album_info);
            $album_cat_id=$album_info['cat_id'];
            $album_cat_info=$db->select_single("SELECT * FROM  image_categories WHERE  active=1 AND cat_id = '$album_cat_id'");
            $album_cat_name=$album_cat_info['menu_text'];
            $album_description= $album_info['description'];
            $album_cover= $album_info['fec_image'];
            $album_date= $album_info['created'];
            $reporter= $album_info['reporter'];
            
            #For Share
            $fb_image = $album_cover;
            $news_article_title=  'ফটো গ্যালারি-'.$album_title;
            $meta_description = $album_description;
           
            
         }
		 if($params[1]=='category'){
		    $cat_seo_title=$params[2];
		       $album_cat_info =  $db->getRowArray('image_categories',array('seo_title'=>$cat_seo_title));
		      $cat_id=$album_cat_info['cat_id'];
               $cattitle=$album_cat_info['menu_text'];

            $template_name='photo_gallery_index';
         }
		//echo (TEMPLATE_STORE.$template_name.'.php');exit;
		require(COMMON_TEMPLATES.'header.php');
       	require(TEMPLATE_STORE.$this->controller . DS .$template_name.'.php');
		require(COMMON_TEMPLATES.'footer.php');
	}
    
	function page_404($params = array()){
		global $lang,$db,$session;		

		
        //echo __FILE__;
        require(GET_TEMPLATE_DIRECTORY.'/header.php');
        require(TEMPLATE_STORE.'404.php');
        require(GET_TEMPLATE_DIRECTORY.'/footer.php');
	}
	
	function alldistrictnews($params=array()){
		global $db,$lang,$language;


        require(GET_TEMPLATE_DIRECTORY.'/header.php');
        require(TEMPLATE_STORE.$this->controller . DS .'all_district_news.php');
        require(GET_TEMPLATE_DIRECTORY.'/footer.php');
	}

	function page($params=array()){
		global $db,$lang,$language;

    
	$page_name=($params[0]=='page')?trim($params['1']):trim($params['0']);		
		$page_info=$this->db->getRowArray("pagemanager",array("page_name" =>$page_name));
	   // pre($params);pre($page_info);exit;
		if(!$page_info)redirect('page_404');

		$page_id=$page_info['page_id'];
		
     //pre($page_info);
		if(state('pvid')!=$page_id){
			$db->edit("UPDATE pagemanager SET `viewed` = viewed+1 WHERE page_id=$page_id");
			state('pvid',$page_id);
		}	


		$title=$page_info['page_title'];
		if($page_info['meta_kw']){$meta_keywords=$page_info['meta_kw'];}
		if(!$page_info['rm_meta_desc']){$meta_description=$page_info['meta_desc'];}
		
	
        require(GET_TEMPLATE_DIRECTORY.'/header.php');
        require(TEMPLATE_STORE.$this->controller . DS .'static_page.php');
        require(GET_TEMPLATE_DIRECTORY.'/footer.php');
		
	}

	 function sitemap($params=array()){
		global $lang,$language;
		
        
        require(GET_TEMPLATE_DIRECTORY.'/header.php');
        require(TEMPLATE_STORE.$this->controller . DS .'sitemap.php');
        require(GET_TEMPLATE_DIRECTORY.'/footer.php');
	}
	
	
	
/*bof Script LOGs */	
	function scriptLogs($params = array()){
		global $lang,$db,$session;  
 	   
	    
		$popup=true;
		$page = isset($params['2'])?$params['2']:1;
		$link =$params['0'].'/'.$params['1'];

		$sql_query="SELECT * FROM `script_log`  ";
		
    $pages = make_pagination_all($sql_query,$page,$p_limit=40);
	$sql_query .= " ORDER BY id DESC ";
	$sql_query .= " LIMIT ".$pages['start_form'].",".$pages['per_page'];
	$script_logs = $db->select($sql_query);
            
	  //SHOW PAGES
        require(GET_TEMPLATE_DIRECTORY.'/header.php');
        require(TEMPLATE_STORE.$this->controller . DS .'script_log.php');     
        require(GET_TEMPLATE_DIRECTORY.'/footer.php');	
	}
	function popup_scriptLogByType($params = array()){
		global $lang,$db,$session;  
 	   
	     $type_id=$params['1'];
		$popup=true;
		$page = isset($params['2'])?$params['2']:1;
		$link =$params['0'].'/'.$params['1'];

		$breakdown_lists_Info= get_breakdown_lists_Info_by_id( $type_id);
		$bv_no=$breakdown_lists_Info['bv_no'];
		$composit_list_info= get_breakdown_composit_lists_Info($bv_no);
		
	$sql_query="SELECT * FROM `script_log` ";
	if( $type_id){
		if($breakdown_lists_Info && $composit_list_info ){
			$sql_query .=" WHERE type_id IN( ".$breakdown_lists_Info['id'].','.$composit_list_info['id']." ) ";
		}else{
			$sql_query .=" WHERE type_id= $type_id";
		}
	
	}		
    $pages = make_pagination_all($sql_query,$page,$p_limit=400);
	$sql_query .= " ORDER BY id DESC ";
	$sql_query .= " LIMIT ".$pages['start_form'].",".$pages['per_page'];
	//echo $sql_query;
	$script_logs = $db->select($sql_query);
            
	  //SHOW PAGES
        require(GET_TEMPLATE_DIRECTORY.'/header-common.php');
        require(TEMPLATE_STORE.$this->controller . DS .'script_log.php');     
        require(GET_TEMPLATE_DIRECTORY.'/footer-common.php');	
	}
	function scriptLogDetail($params = array()){
		global $lang,$db,$session;  
	   //pre($params);
		$log_id=$params['1']; 
		$log_info=$db->select_single("SELECT * FROM script_log WHERE id='$log_id'");
					
	  //SHOW PAGES
		require(COMMON_TEMPLATES.'header-common.php');
		require(TEMPLATE_STORE.$this->controller . DS .'script_log_detail.php');
		require(COMMON_TEMPLATES.'footer-common.php');
	}  
}
?>