<?php
/**
 * RAW PHP SCRIPT
 *
 * @package		RAWPHPSCRIPT
 * @author		Aditya(bfouzder@yahoo.com).
 * @copyright	Copyright (c) 2023.
 * @version 3.0
 */
	
class book{
	
	var $db;
	var $session;
	var $controller;	
			
	function __construct()
	{
		global $lang,$db,$session;
		
		$this->db = $db;
		$this->session = $session;								
		$this->controller = 'book';
		$this->member_id = state('CE_member_id');
        
        $this->is_book=false;
		$this->is_home=false;
	
	}
			
	function index($params = array()){
		global $lang,$db,$session;
   	    if($_SERVER['SERVER_NAME'] == 'fns24.com'){
   	      redirect();  
   	    }
	
		//pre($params);
		$this->is_book =true;
		if($params){
			$page_name=trim($params['0']);		
			$book_info=$this->db->getRowArray("all_books", array("book_id" =>$page_name));
			if($book_info){
				$this->article($params);exit;
			}else{
				$this->allBooks($params);exit;
			}
		}else{
			$this->allBooks($params);exit;
		}		
	}

	function category($params = array()){
		global $lang,$db,$session;
	

		//pre($params);
		$book_cat_id=$params[0];
		$book_cat_name=$params[1];
		$page = $db->get('page');
		$page_limit=10;
		$link ="category/$book_cat_id/$book_cat_name/?";
		#category Info
	    $sql_query="SELECT *FROM `bn_book_category` WHERE CategoryID ='$book_cat_id' "; 
		$book_cat_info=$db->select_single( $sql_query);
		$book_cat_name=$book_cat_info['CategoryName'];
		if($book_cat_info['parent'] ==0){
			$this->allBooks($params);exit;
		}
		if(!$book_cat_info)die('Wrong Access!');
		
		#News by category
		$sql_query="SELECT * FROM all_books WHERE status=1 AND cat_id='$book_cat_id' ORDER BY book_id DESC "; 
		$sql_query="SELECT * FROM all_books WHERE status=1 AND cat_id='$book_cat_id' ORDER BY book_serial "; 
		$pages = make_pagination($sql_query,$page,$page_limit);
		$sql_query .= " LIMIT ".$pages['start_form'].",".$pages['per_page'];
		$book_rows = $db->select($sql_query);
	//	pre($news_cat_rows);
	//	echo $sql_query;
	//pre($pages);
	//pre($book_cat_info);

		$template='template-category.php';


        require(GET_TEMPLATE_DIRECTORY.'/header.php');
		require(TEMPLATE_STORE.$this->controller . DS .$template);  
	    require(GET_TEMPLATE_DIRECTORY.'/footer.php');		
	}

	function allBooks($params = array()){
		global $lang,$db,$session;

		//pre($params);
		
		$book_cat_name='';
		$page = $db->get('page');
		$page_limit=10;
		$link ="book/allBooks/?";
		$pages =array();
		#News by category
	
if($params){
	$types=$db->select("SELECT * FROM bn_book_category WHERE `status` =1 AND parent =".$params['0']." order by Priority");
}else{
	$types=$db->select("SELECT * FROM bn_book_category WHERE `status` =1 AND parent !=0 order by Priority");
}
$home_cats=array();		// $home_cats=array(23=>'কোরান', 24=>'তাফসীর', 25=>'তর্জমা');
if($types){
	foreach($types as $type){
	$home_cats[$type['CategoryID']]=$type['CategoryName'];
	}
}


		$template='template-book-home.php';


        require(GET_TEMPLATE_DIRECTORY.'/header.php');
		require(TEMPLATE_STORE.$this->controller . DS .$template);  
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
		$sql_query="SELECT * FROM all_books WHERE status=1 AND date(`date_added`)='$date' ORDER BY book_id DESC "; 
		$sql_query="SELECT * FROM all_books WHERE status=1 AND date(`date_added`)='$date' ORDER BY book_serial "; 
		$pages = make_pagination($sql_query,$page,$page_limit);
		$sql_query .= " LIMIT ".$pages['start_form'].",".$pages['per_page'];
		$news_cat_rows = $db->select($sql_query);
		//echo $sql_query;
	
	
        require(GET_TEMPLATE_DIRECTORY.'/header.php');
	//	require(TEMPLATE_STORE.$this->controller . DS .'template-dist-news.php');  
		require(TEMPLATE_STORE.$this->controller . DS .'template-archive-news.php');  
	    require(GET_TEMPLATE_DIRECTORY.'/footer.php');		
	}
    
	function article($params = array()){
		global $lang,$db,$session;
          
        $book_ID= $params[0];	       
        $sql_query="SELECT * FROM `all_books` WHERE book_id ='$book_ID' ";  
		
		$book_info=$db->select_single( $sql_query);
		//pre($book_info);
		if(!$book_info)die('Wrong Access!');
		
	//	pre($book_info);
		$book_ID= $book_info['book_id'];	
		$book_CategoryID= $book_info['cat_id'];	
		$book_title= $book_info['book_title'];
		
		$book_image=$book_info['image_url'];	
		$book_image_caption=$book_info["image_url_caption"];
    
		$fb_image= $book_image;	
	

		$book_content= $book_info["book_details"];
		$book_summary= $book_info["book_summary"];


		$book_pdf=$book_info['book_pdf'];	
		$book_pdf_url=$book_info['book_pdf_url'];	
		$book_video=$book_info['book_video'];	


		$book_pdf =($book_pdf)?$book_pdf:$book_pdf_url;

		$book_Writers= $book_info['Writers'];
        $book_pub_date=ar_FormatDateEn2Bn($book_info["date_added"],'j F, Y, g:i a');
		$book_updated_date=ar_FormatDateEn2Bn($book_info["DateTimeUpdated"],'j F, Y, g:i a');
		
		
		#category Info
	    $sql_query="SELECT *FROM `bn_book_category` WHERE CategoryID ='$book_CategoryID' "; 
		$book_cat_info=$db->select_single( $sql_query);
		$book_cat_name=$book_cat_info['CategoryName'];
		$book_cat_url=SCRIPT_URL.'book/category/'.$book_CategoryID.'/'.$book_cat_name;	
		$book_url= SCRIPT_URL.'book/'.$book_ID.'/'.$book_title;	
		if(!$book_cat_info)die('Wrong Cat Access!');
		
		
        
        $total_viewed = $book_info['total_read'];	
	    if(state('nvid')!=$book_ID){
			$db->update("UPDATE all_books SET `total_read` = total_read+1 WHERE book_id=$book_ID");
			state('nvid',$book_ID);
			$total_viewed=$total_viewed+1;
		}
		
		$meta_url= __bn_getBookURL($book_info);	;
		$meta_title= $book_title;
		
        if($book_info['meta_keywords']){
		$meta_keywords=$book_info['meta_keywords'];
		}else{
		$meta_keywords=($book_info['news_tag'])?$book_info['news_tag']:strip_tags(short_excerpts($book_info['book_details'],40));
		}
		
		#$meta_description='<img src=\'https://www.dailyinqilab.com/includes/themes/dailyinqilab/images/logo.png\'> '.strip_tags(short_excerpts($book_info['book_details'],40));
		$meta_description=short_excerpts(strip_tags($book_info['book_details']),30);
                
		$replace_array=array(
			'&curren;',
            '&nbsp;',
			'&lsquo;',
			'&rsquo;');
                        
		$meta_description=str_ireplace($replace_array,'',$meta_description);
		$meta_keywords=str_ireplace($replace_array,'',$meta_keywords);
			
		$book_Writers=($book_Writers)?$book_Writers:'নিজস্ব ';
        //pre($book_cat_info);
          
		$related_book_sql="SELECT * FROM `all_books` WHERE book_id !='$book_ID' AND cat_id = $book_CategoryID order by book_serial";
	    $related_book_rows=$db->select($related_book_sql);
		
		               
		$template='book_detail.php';
        require(GET_TEMPLATE_DIRECTORY.'/header.php');
		require(TEMPLATE_STORE.$this->controller . DS .$template);  
	    require(GET_TEMPLATE_DIRECTORY.'/footer.php');		
	}

}
?>