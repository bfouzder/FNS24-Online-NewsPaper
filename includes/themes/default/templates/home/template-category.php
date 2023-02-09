<section class="section-block clearfix">
	<div class="row">
		<div class="col-xs-12 col-sm-9">
			<h2 class="nav-page-title"><?=$news_cat_name?></h2>


	        <div class="page-breadcrumb clearfix">
			    <ol class="breadcrumb">
        		   <li><a href="<?=SCRIPT_URL?>">প্রচ্ছদ</a></li>
        		   <li class="active"><?=$news_cat_name?></li>
        		 </ol>
			</div>
			
		  <!--eof top heading-->
       <?=ar_showAds($position=9);?>     
<?php 
/*
$news_cat_info;
$news_cat_name;
*/        
$html_list='';
if($news_cat_rows){
	//pre($news_cat_rows);
	foreach($news_cat_rows as $k=>$news_info){
	
        $news_ID= $news_info['news_id'];	
        $cat_id= $news_info['cat_id'];	
        $news_title= $news_info['news_title'];
        $news_image= getNewsFecImageURL($news_info);
        $slider_image=ar_timthumb_image($news_image,$image_width=304,$image_height=185); 
        $news_article_url= __bn_getArticleURL($news_info);	 
         $news_content= strip_tags($news_info["news_details"]);
        $news_excerpt= trunc_words($news_content,35);
        	
        $html_list .='<div class="feature-story-wrap clearfix">
                            <div class="feature-preview"><a href="'.$news_article_url.'">'.$slider_image.'</a></div>
                            <div class="feature-story-info">
                                <h2><a href="'.$news_article_url.'">'.$news_title.'</a></h2>
                                <p>'.$news_excerpt.'...</p>
                            </div>
                        </div>'."\n";     	
     }//foreach 
 
 }//if  
 ?>          
          
          
          <style>
    .book-info{padding-top:10px;}
    .book-info h3{font-size:13px;text-align:center;}
    .book_list{padding:0 5px;}
    .book_block{padding: 0 5px 5px; margin: 0 0 10px; position: relative;display:block;}
    .book_block_title{padding: 5px; margin: 10px 0; background:#eee;}
    .book_block_title{border-left:10px solid #337ab7;margin-bottom:10px;}
    .book_block_title h2{line-height: 15px;margin: 10px;padding: 0px; color:#337ab7;}
.book_card{margin:0 10px;}
    @media (min-width: 992px) {
        .col-md-3 {
        width: 19%;
        }
    }
    
</style>       
<?php 
if($news_cat_id ==20 || $news_cat_id ==15 ){ 
$cat_book_contents= ar_showBooksByParentCategory($news_cat_id);

        if($cat_book_contents){
        $book_cat_url=SCRIPT_URL.'book/category/'.$news_cat_id.'/'.$news_cat_name;	
        
        echo '<div class="book_list"><div class="book_block">
            <div class="book_block_title"><h2>'.$news_cat_name.'</h2></div>
                '. $cat_book_contents.'

                <div class="clearfix"></div><div class="more"><a href="'.$book_cat_url.'">আরও</a></div>
             </div></div>';
        }
} 
?>
       <div class="clearfix"></div>   
            <!--bof cat iteams-->
           	<div class="feature-story-block clearfix">
				<?=$html_list?>
			</div>
           
            <?php include(TEMPLATE_STORE.'pagination_raw.php');?>	            
            <!--eof cat iteams-->		
		</div>
		<div class="col-xs-12 col-sm-3">
            <div class="story-list-block">
                <ul class="nav nav-tabs nav-justified" role="tablist">
                    <li role="presentation" class="active"><a href="#top" aria-controls="home" role="tab" data-toggle="tab">শীর্ষ সংবাদ </a></li>
                    <li role="presentation"><a href="#mostread" aria-controls="home" role="tab" data-toggle="tab">সর্বাধিক </a></li>
                    <li role="presentation"><a href="#latest" aria-controls="profile" role="tab" data-toggle="tab">সর্বশেষ </a></li>
                </ul>
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane active" id="top">
                        <ul class="list-title-block">
                             <?=ar_showTablistNews($type='Top', $limit =4);//Spotlight News?>
                        </ul>
                        <div class="more"><a href="<?=SCRIPT_URL?>allnews/top/">আরও</a></div>
                    </div>
                    <div role="tabpanel" class="tab-pane" id="mostread">
                        <ul class="list-title-block">
                             <?=ar_showTablistNews($type='MostRead', $limit =4);?>
                        </ul>
                         <div class="more"><a href="<?=SCRIPT_URL?>allnews/mostviewed/">আরও</a></div>
                    </div>
                    <div role="tabpanel" class="tab-pane" id="latest">
                        <ul class="list-title-block">
                             <?=ar_showTablistNews($type='Latest', $limit =4);?>
                        </ul>
                        <div class="more"><a href="<?=SCRIPT_URL?>allnews/latest/">আরও</a></div>
                    </div>
                </div>
            </div>
             <?=ar_showAds($position=10);?> 
            <div class="fb-block" style="margin: 10px auto;">
                 <iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2FFns24%2F&tabs=timeline&width=340&height=500&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId=47111295515"  style="border:none; overflow:hidden; width:100%; height:490px; border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>
            </div>
		</div>		
	</div>
</section>

<?php 

function ar_showBooksByParentCategory($book_cat_id, $book_limit=12){
    global $db;


    $html='';
    $html_list='';

        $sql_query="SELECT * FROM all_books WHERE status=1 AND cat_id IN(SELECT CategoryID FROM `bn_book_category` WHERE parent ='$book_cat_id' and `status` =1) ORDER BY book_id DESC LIMIT $book_limit";
		$book_rows = $db->select($sql_query);
    if($book_rows){
        //pre($news_cat_rows);
        foreach($book_rows as $k=>$book_info){
        
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
    
    
            $book_pdf =($book_pdf)?$book_pdf:$book_pdf_url;
    
            $book_Writers= $book_info['Writers'];
            $book_pub_date=ar_FormatDateEn2Bn($book_info["date_added"],'j F, Y, g:i a');
            $book_updated_date=ar_FormatDateEn2Bn($book_info["DateTimeUpdated"],'j F, Y, g:i a');
            $book_url= SCRIPT_URL.'book/'.$book_ID.'/'.$book_title;	
                
            $html_list .='<div class="col-md-3">
            <div class="book_card">
                            <a href="'.$book_url.'">
                                <div class="book_cover">
                                    <img src="'.$book_image.'" alt="image-here" class="img-thumbnail"/>
                                    <div class="caption">'.$book_image_caption.'</div>
                                </div>
                                <div class="book-info">
                                    <h3>'.$book_title.'</h3>
                                </div>
                            </a>   
                            </div> 
                            </div>'."\n";     	

                             
         }//foreach 
         $html='<div class="rows">
         '.$html_list.'
          </div>';
     }

    
    return $html;
}
?>