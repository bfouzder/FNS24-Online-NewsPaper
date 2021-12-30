<?php
include('../includes/config.php');
$referrer_url=($_SERVER['HTTP_REFERER'])?$_SERVER['HTTP_REFERER']:SCRIPT_URL.'/siteadminpanel/';
$tableName='';
$primaryKey='';
$action = $db->get_post('action');
$id = $db->get_post('id');
if($action =='publicnews'){
	$tableName='all_news_temp';
	$primaryKey='news_id_temp';
	$newsId = $id;
}else{
	$tableName='all_news';
	$primaryKey='news_id';
	$newsId = $id;
}
 if(isset($tableName))  
 { 
$news_article_info=$db->getRowArray($tableName,$newsId);			

##############
		$news_article_ID= $news_article_info[$primaryKey];	
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
		$news_article_Writers= $news_article_info['Writers'];	
		$news_article_Initial= $news_article_info['Initial'];
        //$news_article_pub_date=ar_FormatDateEn2Bn($news_article_info["date_added"],'j F, Y, g:i a');
		$news_article_pub_date=ar_FormatDateEn2Bn($news_article_info["DateTimeUpdated"],'j F, Y, g:i a');
		
	
		
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
		$news_article_image_html='';
		if($news_article_image): 
			$news_article_image_html ='<div class="news_photo_block" style="text-aign:center:padding:10px;width:700px;">
				<img src="'.$news_article_image.'" alt="image-here" style="width:98%"/>
				<em class="caption">'.$news_article_image_caption.'</em>
			</div>';
		 endif;	
	 
		$news_article_html = '<h1>'.$news_article_title.'</h1> 
		<h4>'.strtoupper($news_article_Writers) .' |  আপডেট:'.$news_article_pub_date.'</h4>
		'. $news_article_content.'<hr/><h2>News Image</h2><hr/>'.$news_article_image_html.'<hr/><em>Copyright &copy; 2020 FNS24 Ltd.</em><hr/>';
		
		//'<hr/><h2>Meta Info:</h2><b>Meta Keywords: </b>'.$meta_keywords ;
		
		
			
	
		
#################
          /*
           header("Content-type: application/vnd.ms-word");  
           header("Content-Disposition: attachment;Filename=".$news_article_ID."_fns24news.doc");  
           header("Pragma: no-cache");  
           header("Expires: 0");  
            echo $news_article_html; 
           */
          include("html_to_doc.inc.php");
	
	$htmltodoc= new HTML_TO_DOC();
	
echo $htmltodoc->createDoc($news_article_html,$news_article_ID."_fns24news.doc", $download=true);
	//$htmltodoc->createDocFromURL("http://yahoo.com","test");
 }else{
	 echo '<script>alert("News Info Missing")</script>';  
     echo '<script>window.location = "'.$referrer_url.'"</script>';   
 }  
 ?>	