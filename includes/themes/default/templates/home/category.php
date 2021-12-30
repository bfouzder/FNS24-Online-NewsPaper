
<section class="section-block clearfix">
	<div class="row">
		<div class="col-xs-12 col-sm-9">
			<h2 class="nav-page-title"><?=$news_cat_name?></h2>

			<!--<div class="page-drop-menu clearfix">
				<ul class="nav navbar-nav">
					<li class="active"><a href="<?=SCRIPT_URL?>"> প্রচ্ছদ  </a></li>
					<li><a href="#">ফিচার</a></li>
					<li><a href="#">বিনোদন</a></li>
				</ul>
			</div>-->
		<!--eof top heading-->
<!--bof cat iteams-->
	<div class="row">
		<div class="col-xs-12 col-sm-8">
		     <?=ar_showAds($position=9);?> 
			<div class="feature-story-block clearfix">
		
			
		<?php 
		$top_news_limit=4;
		if($news_cat_rows){
			//pre($news_cat_rows);
			foreach($news_cat_rows as $k=>$news_info){
			if($k>=$top_news_limit){	
		
            	
                $news_ID= $news_info['news_id'];	
                $cat_id= $news_info['cat_id'];	
                $news_article_title= $news_info['news_title'];
                $news_image= getNewsFecImageURL($news_info);
                $news_article_image=ar_timthumb_image($news_image,$image_width=304,$image_height=185); 
                $news_article_url= __bn_getArticleURL($news_info);	 
                $news_content= $news_info["news_details"];
                 $news_excerpt= trunc_words($news_content,40);
		
			$news_article_url= __bn_getArticleURL($news_article_info);	
		if($k==$top_news_limit){				
		?>
		<div id="carousel-main-slider" class="carousel slide" data-ride="carousel">
			<ol class="carousel-indicators">
				<li data-target="#carousel-main-slider" data-slide-to="0" class="active"></li>
			</ol>
			<div class="carousel-inner" role="listbox">
				<div class="item active">
						<a href="<?=$news_article_url?>"><?php echo $news_article_image; ?></a>
						<div class="carousel-caption">
							<a href="<?=$news_article_url?>"><?=$news_article_title?></a>
						</div>
					</div>	
			</div>
			<a class="left carousel-control" href="#carousel-main-slider" role="button" data-slide="prev">
				<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
				<span class="sr-only">Previous</span>
			</a>
			<a class="right carousel-control" href="#carousel-main-slider" role="button" data-slide="next">
				<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
				<span class="sr-only">Next</span>
			</a>
		</div>	
		<?php }else{ ?>		
		
				<div class="feature-story-wrap clearfix" style="border-bottom: 1px solid #999">
					<div class="feature-preview"><a href="<?=$news_article_url?>"><?php echo $news_article_image; ?></a></div>
					<div class="feature-story-info">
						<h2><a href="<?=$news_article_url?>"><?=$news_article_title?></a></h2>
						<p><?=$news_article_excerpt?>...</p>
					</div>
				</div>
			<?php }//except first 1  ?>	
			<?php }//except first 4  ?>	
			
			<?php }//foreach ?>		
	<?php }//if  ?>		
			
			
			</div>
	</div>
		<div class="col-xs-12 col-sm-4">
		 <!--bof Top 4-->
		 	<?php 
		if($news_cat_rows){
			//pre($news_cat_rows);
			foreach($news_cat_rows as $k=>$news_info){
			if($k >=4) break;	
	           	$news_ID= $news_info['news_id'];	
                $cat_id= $news_info['cat_id'];	
                $news_article_title= $news_info['news_title'];
                $news_image= getNewsFecImageURL($news_info);
                $news_article_image=ar_timthumb_image($news_image,$image_width=304,$image_height=185); 
                $news_article_url= __bn_getArticleURL($news_info);	 
                $news_content= $news_info["news_details"];
                 $news_excerpt= trunc_words($news_content,40);
			?>
			<div class="post-blocks clearfix">
				<div class="post-preview">
					<a href="<?=$news_article_url?>"><?php echo $news_article_image; ?></a>
				</div>
				<h4 class="main-title"><a href="<?=$news_article_url?>"><?=$news_article_title?></a></h4>			
			</div>
			<?php
			}
		}	
		?>
		 <!--eof Top 4-->
		 
		 
		 </div>
		<?php //include(TEMPLATE_STORE.'pagination_all.php');?>	
		<?php include(TEMPLATE_STORE.'pagination_raw.php');?>	
	</div>
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
		</div>		
	</div>
</section>