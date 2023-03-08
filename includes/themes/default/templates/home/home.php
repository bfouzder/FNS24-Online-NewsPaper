<section class="section-block clearfix">
    <div class="row">
         <?=ar_showTop_4_News($position=4, $limit=4);?> 
    </div>
</section>

<?=ar_showBreakingNews($limit =10, $section_title='তাজা খবর');?>

<section class="section-block section-flex clearfix">
    <div class="row">
        <div class="col-xs-12 col-sm-4 col-md-6">
            <?=ar_showSliderNews($limit =5, $cat_id= false, $carosel_id='carousel-main-slider');?>
        </div>
        <div class="col-xs-12 col-sm-4 col-md-3">
            <div class="story-list-block">
                <ul class="nav nav-tabs nav-justified" role="tablist">
                    <li role="presentation" class="active"><a href="#top" aria-controls="home" role="tab" data-toggle="tab">শীর্ষ সংবাদ </a></li>
                    <li role="presentation"><a href="#mostread" aria-controls="home" role="tab" data-toggle="tab">সর্বাধিক </a></li>
                    <li role="presentation"><a href="#latest" aria-controls="profile" role="tab" data-toggle="tab">সর্বশেষ </a></li>
                </ul>
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane active" id="top">
                        <ul class="list-title-block">
                             <?=ar_showTablistNews($type='Top', $limit =5);//Spotlight News?>
                        </ul>
                        <div class="more"><a href="<?=SCRIPT_URL?>allnews/top/">আরও</a></div>
                    </div>
                    <div role="tabpanel" class="tab-pane" id="mostread">
                        <ul class="list-title-block">
                             <?=ar_showTablistNews($type='MostRead', $limit =5);?>
                        </ul>
                         <div class="more"><a href="<?=SCRIPT_URL?>allnews/mostviewed/">আরও</a></div>
                    </div>
                    <div role="tabpanel" class="tab-pane" id="latest">
                        <ul class="list-title-block">
                             <?=ar_showTablistNews($type='Latest', $limit =5);?>
                        </ul>
                        <div class="more"><a href="<?=SCRIPT_URL?>allnews/latest/">আরও</a></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-4 col-md-3">
            <div class="section-overlay-block">
               <?= ar_showTop_2_News($position=2)?>
            </div>
        </div>
    </div>
</section>
<!--<img src="https://fns24.com/resources/ads/Gif%20File.gif" class="img-responsive2">-->
<?=ar_showAds($position=1);?>
<section class="section-block section-flex section-exclusive-blocks clearfix">
    <div class="row">
        <div class="col-xs-12 col-sm-8 col-md-9">
           <?//= ar_showTop_3_News($view= 'grid', $position=3, $image_width=304,$image_height=185)?>
           <?= ar_showTop_3_News($view= 'list', $position=3, $image_width=304,$image_height=185)?>
		 </div>
    
        <div class="col-xs-12 col-sm-4 col-md-3">
            <div class="story-list-block">
                <ul class="nav nav-tabs nav-justified" role="tablist">
                    <li role="presentation"><a href="#exclusive-news" aria-controls="profile" role="tab" data-toggle="tab">বিশেষ সংবাদ </a></li>
			   </ul>
                <div class="tab-content">                    
					 <div role="tabpanel" class="tab-pane active" id="exclusive-news">
                        <ul class="list-title-block">
                              <?=ar_showTablistNews($type='exclusive', $limit =5);?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php if(getSettings('AR_SHOW_TOP_16_NEWS') =='ON'){?>
<?=ar_showAds($position=2);?>
<section class="section-block section-flex clearfix">
	<div class="row">
		 <div class="col-xs-12 col-sm-8 col-md-9">
		    <!--<h3 class="title-bar-black"><a href="#">Top 16 News</a></h3>-->
		      <div class="row"> 
				<?=ar_showTop_16_News($position=16, $limit=12);?>
				</div>
		</div>    
		<div class="col-xs-12 col-sm-4 col-md-3">
			<a href="https://bangla-converter.com/" target="_blank"><img src="https://www.fns24.com/resources/bangla_converter.jpg" alt="bangla converter"></a>		
			<br/>
			<a href="https://www.fns24.com/allnewspaper/" target="_blank"><img src="https://www.fns24.com/resources/ads/all_news_paper.jpg" alt="All News Paper"></a>		
		</div>
	</div>
</section>
<?php }//AR_SHOW_TOP_16_NEWS ?>

<?=ar_showAds($position=2);?>
<section class="section-block section-flex clearfix">
    <div class="row">
        <div class="col-xs-12 col-sm-8 col-md-9">
            <h3 class="title-bar-black"><a href="<?=__bn_getCatURL($cat_id=6)?>">বিনোদন</a></h3>
             <div class="row">  
                <div class="col-xs-12 col-sm-8 col-md-8">
                    <?=ar_showSliderNews2($limit =1, $cat_id= 6, $carosel_id='carousel-main-slider-6');?>
                </div>
                <div class="col-xs-12 col-sm-4 col-md-4">
                    <div class="story-list-block special2_block">
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane active" id="top2">
                                <ul class="list-title-block">
                                     <?=ar_showTablistNews($type='binodon', $limit =6);?>
                                </ul>
                            </div>
                        </div>
                        
                           <div class="more"><a href="<?=__bn_getCatURL($cat_id=6)?>">আরও</a></div>    
                    </div>
                </div>
             </div>
        </div>
        <div class="col-xs-12 col-sm-4 col-md-3">
           <h3 class="title-bar-black"><a href="<?=__bn_getCatURL($cat_id=7)?>">লাইফস্টাইল</a></h3>
            <div class="section-overlay-block" style="border:0; padding:0;">
                <?php 
                    $life_style_news=ar_getNewsByCategory($cat_id=7, $limit=4);
                    if($life_style_news){ foreach($life_style_news as $kk=> $news_info){
							if($kk < 2) {
								echo ar_displayNews($news_info, $news_for='overlay-block'); 
							}
                        } //foreach
                    }
                ?>
            </div>
        </div>
    </div>
</section>  
<?=ar_showAds($position=3);?>
<section class="section-block section-flex clearfix">
    <div class="row">
        <div class="col-xs-12 col-sm-6 col-md-3">
        	<?=ar_showNewsCategoryWidget($cat_id=27, $limit =4, $widget_title='বাংলাদেশ')?>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-3">
        	<?=ar_showNewsCategoryWidget($cat_id=3, $limit =4, $widget_title='অর্থনীতি')?>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-3">
        	<?=ar_showNewsCategoryWidget($cat_id=4, $limit =4, $widget_title='বিশ্ব')?>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-3">
            <div class="story-list-block">
                <ul class="nav nav-tabs nav-justified" role="tablist">
                  	<li role="presentation" class="active"><a href="#muktomot-news" aria-controls="home"   role="tab" data-toggle="tab">মুক্তমত </a></li>
                   <li role="presentation"><a href="#editorial-news" aria-controls="profile" role="tab" data-toggle="tab">সম্পাদকীয় </a></li>
                </ul>
                <div class="tab-content">                    
					<div role="tabpanel" class="tab-pane active" id="muktomot-news">
                        <ul class="list-title-block">
                              <?=ar_showTablistNews($type='muktomot', $limit =6);?>
                        </ul>
						<div class="more"><a href="http://www.fns24.com/newscategory/10/মুক্তমত/">আরও</a></div>
                    </div>
                    <div role="tabpanel" class="tab-pane" id="editorial-news">
                        <ul class="list-title-block">
                             <?=ar_showTablistNews($type='editorial', $limit =6);?>
                        </ul>
						<div class="more"><a href="http://www.fns24.com/newscategory/18/সম্পাদকীয়/">আরও</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?=ar_showAds($position=4);?>
<section class="section-block section-flex clearfix">
    <div class="row">
        <div class="col-xs-12 col-sm-8 col-md-9">
            <h3 class="title-bar-black"><a href="<?=__bn_getCatURL($cat_id=5)?>">খেলা</a></h3>
             <div class="row">  
                <div class="col-xs-12 col-sm-8 col-md-8">
                    <?=ar_showSliderNews2($limit =1, $cat_id= 5, $carosel_id='carousel-main-slider-5');?>
                </div>
                <div class="col-xs-12 col-sm-4 col-md-4">
                    <div class="story-list-block special2_block">
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane active" id="top3">
                                <ul class="list-title-block">
                                     <?=ar_showTablistNews($type='Play', $limit =6);?>
                                </ul>
                            </div>
                        </div>
                        <div class="more"><a href="<?=__bn_getCatURL($cat_id=5)?>">আরও</a></div>
                    </div>
                </div>
             </div>
        </div>
        <div class="col-xs-12 col-sm-4 col-md-3">
           <h3 class="title-bar-black"><a href="<?=__bn_getCatURL($cat_id=8)?>">প্রযুক্তি</a></h3>
            <div class="section-overlay-block" style="border:0; padding:0;">
                <?php 
                    $news=ar_getNewsByCategory($cat_id=8, $limit=2);
                    if($news){ foreach($news as $k=> $news_info){
                           echo ar_displayNews($news_info, $news_for='overlay-block'); 
                        } //foreach
                    }
                ?>
            </div>
        </div>
    </div>
</section> 
<?=ar_showAds($position=5);?>
<section class="section-block section-flex clearfix">
    <div class="row">
        <div class="col-xs-12 col-sm-3 col-md-3">
            <div class="group-block-wrap">
            <?=ar_showAlbumWidgetByPhotoCategory($cat_id= 2, $limit =1);//ঢাকার বাইরে ?>
            <?=ar_showAlbumWidgetByPhotoCategory($cat_id= 1, $limit =1);//ফিচার ?>
            </div>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-6">
            <div class="container-slider gallery_block">
                <h3 class="title-bar-black"><a href="<?=SCRIPT_URL?>photo">গ্যালারি </a></h3>                            
                  <?=ar_showSliderPhotos($limit =20);?>
            </div>
        </div>
        <div class="col-xs-12 col-sm-3 col-md-3">
            <div class="fb-block">
                 <iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2FFns24%2F&tabs=timeline&width=340&height=500&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId=47111295515"  style="border:none; overflow:hidden; width:100%; height:490px; border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>
            </div>
        </div>
    </div>
</section>
<?=ar_showAds($position=6);?>
<section class="section-block section-flex clearfix">
    <div class="row">
         <div class="col-xs-12 col-sm-4 col-md-3">
            <?=ar_showNewsCategoryWidget($cat_id=20, $limit =4, $widget_title='ধর্ম')?>
        </div>
        <div class="col-xs-12 col-sm-4 col-md-3">        	
        	<?=ar_showNewsCategoryWidget($cat_id=15, $limit =4, $widget_title='সাহিত্য')?>
        </div>
        <div class="col-xs-12 col-sm-4 col-md-3">
        	<?=ar_showNewsCategoryWidget($cat_id=13, $limit =4, $widget_title='সংগঠন ')?>
        </div>
        <div class="col-xs-12 col-sm-4 col-md-3">
        	<?=ar_showNewsCategoryWidget($cat_id=11, $limit =4, $widget_title='প্রবাস')?>
        </div>       
     </div> 
</section>  
<?=ar_showAds($position=7);?> 
<section class="section-block section-flex clearfix">
    <div class="row">
        <div class="col-xs-12 col-sm-9 col-md-9">
            <div class="container-slider">
                <h3 class="title-bar-black"><a href="https://www.youtube.com/channel/UCeqsFQ1CbE46xOdeG8_S8Bg" target="_blank">Video গ্যালারি </a></h3> 
				<script type="text/javascript" src="<?=SCRIPT_URL?>includes/3rdParty/html5gallery/html5gallery.js"></script>				
                 <div style="text-align:center;">
					<?=ar_showSliderVideos($limit = 40);?>
				</div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-4 col-md-3">
           <?php $todayDate=''; include('sidebar_archive.php');?>
        </div>
    </div>
</section>

<?=ar_showAds($position=8);?> 

<script>
$=jQuery;
</script>
<?php 
function ar_showSliderVideos($limit = 40){
	global $db, $session;
    $html = '';
	$youtube_videos =$db->select("select * from youtube_videos limit $limit");
	if($youtube_videos){
		$html = '<div style="display:none;margin:0 auto;" class="html5gallery" data-skin="light" data-width="480" data-height="272" data-resizemode="fill">';
		foreach ($youtube_videos as $data){
           // pre($data);
			$video_id=$data['video_id'];
			$video_title=$data['video_title'];
			$channelId=$data['channelId'];
			$publishedAt=$data['publishedAt'];
			$video_description=$data['video_description'];
			$video_thumbnails_default=$data['video_thumbnails'];
			$video_embeded=$data['video_embeded'];
			$html .='<a href="http://www.youtube.com/embed/'.$video_id.'"><img src="http://img.youtube.com/vi/'.$video_id.'/2.jpg" alt="'.$video_title.'"></a>';
		}
		$html .= '</div>';
	}
	return  $html;
}
?>
