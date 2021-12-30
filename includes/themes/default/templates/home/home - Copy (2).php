<section class="section-block clearfix">
    <div class="row">
    <?php 
            echo ar_showTop_4_News($position=4, $limit=4);
       
    ?> 
    </div>
</section>

<?=ar_showBreakingNews($limit =10, $section_title='তাজা খবর');?>


<section class="section-block clearfix">
    <div class="row">
        <div class="col-xs-12 col-sm-4 col-md-6">
            <?=ar_showSliderNews($limit =3, $cat_id= false, $carosel_id='carousel-main-slider');?>
        </div>
        <div class="col-xs-12 col-sm-4 col-md-3">
            <div class="story-list-block">
                <ul class="nav nav-tabs nav-justified" role="tablist">
                    <li role="presentation" class="active"><a href="#top" aria-controls="home" role="tab" data-toggle="tab">শীর্ষ সংবাদ </a></li>
                    <li role="presentation"><a href="#latest" aria-controls="profile" role="tab" data-toggle="tab">সর্বশেষ </a></li>
                </ul>
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane active" id="top">
                        <ul class="list-title-block">
                             <?=ar_showTablistNews($type='MostRead', $limit =5);?>
                        </ul>
                    </div>
                    <div role="tabpanel" class="tab-pane" id="latest">
                        <ul class="list-title-block">
                             <?=ar_showTablistNews($type='Latest', $limit =5);?>
                        </ul>
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

            <section class="section-block clearfix">
                <div class="row">
                    <div class="col-xs-12 col-sm-8 col-md-9">
                       <?//= ar_showTop_3_News($view= 'grid', $position=3, $image_width=304,$image_height=185)?>
                       <?= ar_showTop_3_News($view= 'list', $position=3, $image_width=304,$image_height=185)?>
                    </div>
                
                    <div class="col-xs-12 col-sm-4 col-md-3">
                        <div class="story-list-block">
                            <ul class="nav nav-tabs nav-justified" role="tablist">
                                <li role="presentation" class="active"><a href="#muktomot-news" aria-controls="home"   role="tab" data-toggle="tab">মুক্তমত </a></li>
                                <li role="presentation"><a href="#editorial-news" aria-controls="profile" role="tab" data-toggle="tab">সম্পাদকীয় </a></li>
                            </ul>
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane active" id="muktomot-news">
                                    <ul class="list-title-block">
                                          <?=ar_showTablistNews($type='muktomot', $limit =5);?>
                                    </ul>
                                </div>
                                <div role="tabpanel" class="tab-pane" id="editoria-news">
                                    <ul class="list-title-block">
                                         <?=ar_showTablistNews($type='editoria', $limit =5);?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            
            
<section class="section-block clearfix">
    <div class="row">
        <div class="col-xs-12 col-sm-8 col-md-9">
            <h3 class="title-bar-black"><a href="<?=__bn_getCatURL($cat_id=6)?>">বিনোদন</a></h3>
             <div class="row">  
                <div class="col-xs-12 col-sm-8 col-md-9">
                    <?=ar_showSliderNews($limit =1, $cat_id= 6, $carosel_id='carousel-main-slider-6');?>
                </div>
                <div class="col-xs-12 col-sm-4 col-md-3">
                    <div class="story-list-block">
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane active" id="top2">
                                <ul class="list-title-block">
                                     <?=ar_showTablistNews($type='binodon', $limit =5);?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
             </div>
        </div>
      
        <div class="col-xs-12 col-sm-4 col-md-3">
           <h3 class="title-bar-black"><a href="<?=__bn_getCatURL($cat_id=7)?>">লাইফস্টাইল</a></h3>
            <div class="section-overlay-block">
                <?php 
                    $news=ar_getNewsByCategory($cat_id=7, $limit=2);
                    if($news){ foreach($news as $k=> $news_info){
                           echo ar_displayNews($news_info, $news_for='overlay-block'); 
                        } //foreach
                    }
                ?>
            </div>
        </div>
    </div>
</section>            
            
            
            
            <section class="adv-block clearfix">
                <div class="row">
                    <div class="col-xs-12 col-sm-6 col-md-3">
                        <div class="adv-50"><a href="#"><img src="images/adv3.png" alt=""></a></div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-3">
                        <div class="adv-50"><a href="#"><img src="images/adv3.png" alt=""></a></div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-3">
                        <div class="adv-50"><a href="#"><img src="images/adv3.png" alt=""></a></div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-3">
                        <div class="adv-50"><a href="#"><img src="images/adv3.png" alt=""></a></div>
                    </div>
                </div>
            </section>
            <section class="section-block clearfix">
                <div class="row">
                    <div class="col-xs-12 col-sm-6 col-md-3">
                    	<?=ar_showNewsCategoryWidget($cat_id=1, $limit =4, $widget_title='জাতীয়')?>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-3">
                    	<?=ar_showNewsCategoryWidget($cat_id=2, $limit =4, $widget_title='রাজনীতি')?>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-3">
                    	<?=ar_showNewsCategoryWidget($cat_id=3, $limit =4, $widget_title='অর্থনীতি')?>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-3">
                    	<?=ar_showNewsCategoryWidget($cat_id=4, $limit =4, $widget_title='বিদেশ')?>
                    </div>
                </div>
            </section>
            <section class="adv-block clearfix">
                <div class="row">
                    <div class="col-xs-12 col-sm-6 col-md-3">
                        <div class="adv-50"><a href="#"><img src="<?php echo GET_TEMPLATE_DIRECTORY_URI; ?>/images/adv3.png" alt=""></a></div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-3">
                        <div class="adv-50"><a href="#"><img src="<?php echo GET_TEMPLATE_DIRECTORY_URI; ?>/images/adv3.png" alt=""></a></div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-3">
                        <div class="adv-50"><a href="#"><img src="<?php echo GET_TEMPLATE_DIRECTORY_URI; ?>/images/adv3.png" alt=""></a></div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-3">
                        <div class="adv-50"><a href="#"><img src="<?php echo GET_TEMPLATE_DIRECTORY_URI; ?>/images/adv3.png" alt=""></a></div>
                    </div>
                </div>
            </section>
            <section class="section-block clearfix">
                <div class="row">
                    <div class="col-xs-12 col-sm-3 col-md-3">
                        <div class="group-block-wrap">
                            <div class="group-block">
                                <h3 class="title-bar-black"><a href="#">ঢাকার বাইরে </a></h3>

                                <div class="preview">
                                    <img src="http://3.bp.blogspot.com/-Il7sxhERNZ4/UtVqnCf4M_I/AAAAAAAAQUs/anO4H8Ri_UE/s1600/Bangladeshi+film+actress+Achol+(9).jpg"
                                         alt="">
                                </div>
                            </div>
                            <div class="group-block">
                                <h3 class="title-bar-black"><a href="#">ফিচার</a></h3>

                                <div class="preview">
                                    <img src="http://4.bp.blogspot.com/-IVDO3DG68_g/VOcJy5D0Z6I/AAAAAAAADuE/27a4hHfctzE/s1600/Airin%2BSultana.jpg"
                                         alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-6">
                        <div class="container-slider">
                            <h3 class="title-bar-black"><a href="<?=SCRIPT_URL?>photos">গ্যালারি </a></h3>                            
                              <?=ar_showSliderPhotos($limit =3);?>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-3 col-md-3">
                        <div class="adv-block">
                            <div class="adv-465"></div>
                        </div>
                    </div>
                </div>
            </section>
            
<section class="adv-block clearfix">
    <div class="row">
        <div class="col-xs-12 col-sm-4 col-md-2">
            <div class="adv-70"><a href="#"><img src="<?php echo GET_TEMPLATE_DIRECTORY_URI; ?>/images/adv3.png" alt=""></a></div>
        </div>
        <div class="col-xs-12 col-sm-4 col-md-2">
            <div class="adv-70"><a href="#"><img src="<?php echo GET_TEMPLATE_DIRECTORY_URI; ?>/images/adv3.png" alt=""></a></div>
        </div>
        <div class="col-xs-12 col-sm-4 col-md-2">
            <div class="adv-70"><a href="#"><img src="<?php echo GET_TEMPLATE_DIRECTORY_URI; ?>/images/adv3.png" alt=""></a></div>
        </div>
        <div class="col-xs-12 col-sm-4 col-md-2">
            <div class="adv-70"><a href="#"><img src="<?php echo GET_TEMPLATE_DIRECTORY_URI; ?>/images/adv3.png" alt=""></a></div>
        </div>
        <div class="col-xs-12 col-sm-4 col-md-2">
            <div class="adv-70"><a href="#"><img src="<?php echo GET_TEMPLATE_DIRECTORY_URI; ?>/images/adv3.png" alt=""></a></div>
        </div>
        <div class="col-xs-12 col-sm-4 col-md-2">
            <div class="adv-70"><a href="#"><img src="<?php echo GET_TEMPLATE_DIRECTORY_URI; ?>/images/adv3.png" alt=""></a></div>
        </div>
    </div>
</section>
            
<section class="section-block clearfix">
    <div class="row">
        <div class="col-xs-12 col-sm-8 col-md-9">
            <h3 class="title-bar-black"><a href="<?=__bn_getCatURL($cat_id=5)?>">খেলা</a></h3>
             <div class="row">  
                <div class="col-xs-12 col-sm-8 col-md-9">
                    <?=ar_showSliderNews($limit =1, $cat_id= 5, $carosel_id='carousel-main-slider-5');?>
                </div>
                <div class="col-xs-12 col-sm-4 col-md-3">
                    <div class="story-list-block">
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane active" id="top3">
                                <ul class="list-title-block">
                                     <?=ar_showTablistNews($type='play', $limit =5);?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
             </div>
        </div>
      
        <div class="col-xs-12 col-sm-4 col-md-3">
           <h3 class="title-bar-black"><a href="<?=__bn_getCatURL($cat_id=8)?>">তথ্য-প্রযুক্তি</a></h3>
            <div class="section-overlay-block">
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

 <section class="adv-block clearfix">
    <div class="row">
        <div class="col-xs-12 col-sm-4 col-md-2">
            <div class="adv-70"><a href="#"><img src="<?php echo GET_TEMPLATE_DIRECTORY_URI; ?>/images/adv3.png" alt=""></a></div>
        </div>
        <div class="col-xs-12 col-sm-4 col-md-2">
            <div class="adv-70"><a href="#"><img src="<?php echo GET_TEMPLATE_DIRECTORY_URI; ?>/images/adv3.png" alt=""></a></div>
        </div>
        <div class="col-xs-12 col-sm-4 col-md-2">
            <div class="adv-70"><a href="#"><img src="<?php echo GET_TEMPLATE_DIRECTORY_URI; ?>/images/adv3.png" alt=""></a></div>
        </div>
        <div class="col-xs-12 col-sm-4 col-md-2">
            <div class="adv-70"><a href="#"><img src="<?php echo GET_TEMPLATE_DIRECTORY_URI; ?>/images/adv3.png" alt=""></a></div>
        </div>
        <div class="col-xs-12 col-sm-4 col-md-2">
            <div class="adv-70"><a href="#"><img src="<?php echo GET_TEMPLATE_DIRECTORY_URI; ?>/images/adv3.png" alt=""></a></div>
        </div>
        <div class="col-xs-12 col-sm-4 col-md-2">
            <div class="adv-70"><a href="#"><img src="<?php echo GET_TEMPLATE_DIRECTORY_URI; ?>/images/adv3.png" alt=""></a></div>
        </div>
    </div>
</section>           
            
            <section class="section-block clearfix">
                <div class="row">
                    <div class="col-xs-12 col-sm-4 col-md-3">
                    	<?=ar_showNewsCategoryWidget($cat_id=16, $limit =4, $widget_title='ফিচার')?>
                    </div>
                    <div class="col-xs-12 col-sm-4 col-md-3">
                    	<?=ar_showNewsCategoryWidget($cat_id=17, $limit =4, $widget_title='প্রকৃতি ও পরিবেশ ')?>
                    </div>
                    <div class="col-xs-12 col-sm-4 col-md-3">
                    	<?=ar_showNewsCategoryWidget($cat_id=9, $limit =4, $widget_title='স্বাস্থ্য')?>
                    </div>
                    <div class="col-xs-12 col-sm-4 col-md-3">
                    	
                    </div>
                 </div>   
                 <div class="row">  
                    <div class="col-xs-12 col-sm-4 col-md-3">
                    	<?=ar_showNewsCategoryWidget($cat_id=12, $limit =4, $widget_title='শিক্ষা')?>
                    </div>
                    <div class="col-xs-12 col-sm-4 col-md-3">
                    	<?=ar_showNewsCategoryWidget($cat_id=15, $limit =4, $widget_title='সাহিত্য')?>
                    </div>
                    <div class="col-xs-12 col-sm-4 col-md-3">
                    	<?=ar_showNewsCategoryWidget($cat_id=13, $limit =4, $widget_title='প্রেসরিলিজ')?>
                    </div> 
                     <div class="col-xs-12 col-sm-4 col-md-3">
                    	
                    </div>                  
                </div>
            </section>
            <section class="adv-block clearfix">
                <div class="row">
                    <div class="col-xs-12 col-sm-6 col-md-2">
                        <div class="adv-30"><a href="#"><img src="images/adv2.png" alt=""></a></div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-2">
                        <div class="adv-30"><a href="#"><img src="images/adv2.png" alt=""></a></div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-2">
                        <div class="adv-30"><a href="#"><img src="images/adv2.png" alt=""></a></div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-2">
                        <div class="adv-30"><a href="#"><img src="images/adv2.png" alt=""></a></div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-2">
                        <div class="adv-30"><a href="#"><img src="images/adv2.png" alt=""></a></div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-2">
                        <div class="adv-30"><a href="#"><img src="images/adv2.png" alt=""></a></div>
                    </div>
                </div>
            </section>
            <section class="section-block section-single clearfix">
                <div class="row">
                    <?=ar_showFooterNews($limit =6)?>
                </div>
            </section>
            
