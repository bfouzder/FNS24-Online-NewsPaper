<section class="section-block clearfix">
	<div class="row">
		<div class="col-xs-12 col-sm-9">
			<h2 class="nav-page-title"><?=$news_top_title?></h2>


	        <div class="page-breadcrumb clearfix">
			    <ol class="breadcrumb">
        		    <li><a href="<?=SCRIPT_URL?>"><i class="fa fa-home"></i> প্রচ্ছদ</a></li>
        		   <li>জেলার সংবাদ </li>
        		 </ol>
			</div>
			
		  <!--eof top heading-->
          
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
        $news_excerpt= trunc_words($news_content,45);
        	
        $html_list .='<div class="feature-story-wrap clearfix">
                            <div class="feature-preview"><a href="'.$news_article_url.'">'.$slider_image.'</a></div>
                            <div class="feature-story-info">
                                <h2><a href="'.$news_article_url.'">'.$news_title.'</a></h2>
                                <p>'.$news_excerpt.'</p>
                            </div>
                        </div>'."\n";     	
     }//foreach 
 
 }//if  
 ?>          
          
          
          
          
          
            <!--bof cat iteams-->
           	<div class="feature-story-block clearfix">
				<?=$html_list?>
			</div>
           <div class="clearfix"></div>
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
            
            <div class="fb-block" style="margin: 10px auto;">
                 <iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2FFns24%2F&tabs=timeline&width=340&height=500&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId=47111295515"  style="border:none; overflow:hidden; width:100%; height:490px; border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>
            </div>
		</div>		
	</div>
</section>