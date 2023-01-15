<?php 
function ar_displayNews($news_info, $news_for='small_thumb_list'){
  
        $html='';
        $news_ID= $news_info['news_id'];	
        $news_CategoryID= $news_info['cat_id'];	
        $news_title= $news_info['news_title'];
        $news_sub_title=$news_info["news_subheading"];
        $news_image= getNewsFecImageURL($news_info);	
        $news_content= $news_info["news_details"];
        $news_excerpt= trunc_words($news_content,40);
        $news_Writers= $news_info['Writers'];	
        $news_Initial= $news_info['Initial'];
       // $news_pub_date=ar_FormatDateEn2Bn($news_info["DateTimeInserted"],'j F, Y, g:i a');
        $news_article_url= __bn_getArticleURL($news_info);	 
     // echo $news_image. $news_ID.'<br/>';
      if($news_for == 'small_thumb_list') {
         $news_image_thumb=ar_timthumb_image($news_image,$image_width=150,$image_height=75, 1); 	
        $html='<li>
            <div class="list-preview"><a href="'.$news_article_url.'">'.$news_image_thumb.'</a></div>
            <h4><a href="'.$news_article_url.'">'.$news_title.'</a></h4>
        </li>'."\n"; 
      }elseif( $news_for == 'footer_news'){
        $news_image_thumb=ar_timthumb_image($news_image,$image_width=375,$image_height=369, 1); 	
        $html='<div class="item"><a href="'.$news_article_url.'">
            <div class="single-preview">'.$news_image_thumb.'</div>
            <h4>'.$news_title.'</h4></a></div>'."\n"; 
      }elseif( $news_for == 'overlay-block'){
        // $slider_image=ar_timthumb_image($news_image,$image_width=304,$image_height=185, 1); 
          $slider_image=ar_timthumb_image($news_image,$image_width=304,$image_height=197, 1); 
         $html='<div class="overlay-block">
                    <a href="'.$news_article_url.'">
                        '.$slider_image.'
                       <div class="overlay-wrap">'.$news_title.'</div>
                    </a>
                    </div>'."\n";   
      }
      
     return $html; 
    
}
function ar_getNewsByCategory($cat_id, $limit=10){
     global $db; 
    $html='';
    $sql_query="SELECT *FROM `all_news` WHERE status=1 AND cat_id ='$cat_id' ORDER BY news_id DESC LIMIT $limit"; 
    $news=$db->select(	$sql_query);
    return $news;
}
function ar_showNewsCategoryWidget($cat_id, $limit =10, $widget_title=false){
    global $db; 
    $html='';
    $news=ar_getNewsByCategory($cat_id, $limit);
    if($news){ 
        $cat_info=getNewsCatInfo($cat_id);
        $cat_url=__bn_getCatURL($cat_info);
        $cat_name=$cat_info['CategoryName'];
        $widget_title =($widget_title)?$widget_title: $cat_name;
      $read_more = 'আরও';
                    
                    $top_one_news='';
                    $news_list='';
                        foreach($news as $k=> $news_info){    
                            
                            $news_ID= $news_info['news_id'];	
                            $news_CategoryID= $news_info['cat_id'];	
                            $news_title= $news_info['news_title'];
                            $news_article_url= __bn_getArticleURL($news_info);	 
                             $news_image= getNewsFecImageURL($news_info);
                            
                            if($k ==0){
                                $top_one_news ='<div class="post-preview">
                                  <a href="'.$news_article_url.'"><img src="'.$news_image.'" alt="img-'.$news_ID.'"></a>
                                </div>
                                <h4 class="main-title"><a href="'.$news_article_url.'">'.$news_title.'</a></h4>';   
                            }else{
                              $news_list .='<li><a href="'.$news_article_url.'">'.$news_title.'</a></li>'."\n";  
                            }
                            
                             
                            $html .=' <li><a href="'.$news_article_url.'">'.$news_title.'</a></li>'."\n"; 
                            
                        } 
        
      $html = '<div class="post-blocks clearfix">
                <h3 class="title-bar-mid"><a href="'.$cat_url.'">'.$widget_title.'</a></h3>
                '.$top_one_news.'
                <div class="list-block">
                    <ul>'.$news_list.'</ul>
                    <div class="more"><a href="'.$cat_url.'">'.$read_more.'</a></div>
                </div>
            </div>'."\n";   

    }
    
     
    return $html;
}
function ar_showFooterNews($limit =5){
    global $db; 
    $html='';
    $sql_query="SELECT *FROM `all_news` WHERE footer_news !=0 AND status=1 ORDER BY news_id DESC LIMIT $limit"; 
    $news=$db->select(	$sql_query);
    if($news){     
        foreach($news as $news_info){           
        
        $news_ID= $news_info['news_id'];	
        $news_CategoryID= $news_info['cat_id'];	
        $news_title= $news_info['news_title'];
        $news_article_url= __bn_getArticleURL($news_info);	 
         
        $html .=ar_displayNews($news_info, $news_for='footer_news'); 
        
        
        }
    }
     
    return $html;
}

function ar_showTablistNews($news_type='Latest',  $limit =5){
     global $db;
     $html='';
	// echo $news_type
     if($news_type=='Latest'){
       $html .=ar_showLatestNews($limit);  
     }elseif($news_type=='MostRead'){
       $html .=ar_showMostReadNews($limit);    
     }elseif($news_type=='Top'){//spotlight
        $html .=ar_showTopNews($limit);  
     }elseif($news_type=='muktomot'){
        $news=ar_getNewsByCategory($cat_id=10, $limit);
        if($news){     
            foreach($news as $news_info){   
            $html .=ar_displayNews($news_info, $news_for='small_thumb_list'); 
            }
        } 
     }elseif($news_type=='editorial'){
        $news=ar_getNewsByCategory($cat_id=18, $limit);
        if($news){     
            foreach($news as $news_info){   
            $html .=ar_displayNews($news_info, $news_for='small_thumb_list'); 
            }
        } 
     }elseif($news_type=='exclusive'){
        $news=ar_getNewsByCategory($cat_id=19, $limit);
        if($news){     
            foreach($news as $news_info){   
            $html .=ar_displayNews($news_info, $news_for='small_thumb_list'); 
            }
        } 
     }elseif($news_type=='binodon'){
        $news=ar_getNewsByCategory($cat_id=6, $limit);
        if($news){     
            foreach($news as $news_info){   
            $html .=ar_displayNews($news_info, $news_for='small_thumb_list'); 
            }
        }  
     }elseif($news_type=='Play'){
        $news=ar_getNewsByCategory($cat_id=5, $limit);
        if($news){     
            foreach($news as $news_info){   
            $html .=ar_displayNews($news_info, $news_for='small_thumb_list'); 
            }
        }   
     }
     
      return $html; 
}
function ar_showTopNews($limit =5){
    global $db; 
    $html='';
    $sql_query="SELECT *FROM `all_news` WHERE status=1 AND spot_light = 1 ORDER BY news_id DESC LIMIT $limit"; 
    $news=$db->select(	$sql_query);
    if($news){     
        foreach($news as $news_info){           
        
        $news_ID= $news_info['news_id'];	
        $news_CategoryID= $news_info['cat_id'];	
        $news_title= $news_info['news_title'];
        $news_article_url= __bn_getArticleURL($news_info);	 
         
        $html .=ar_displayNews($news_info, $news_for='small_thumb_list'); 
        
        }
    }
     
    return $html;
}
function ar_showMostReadNews($limit =5){
    global $db; 
    $html='';
   // $sql_query="SELECT *FROM `all_news` WHERE status=1 ORDER BY total_read DESC LIMIT $limit"; 
    $sql_query="SELECT *FROM `all_news` WHERE date_added >= DATE(NOW()) - INTERVAL 7 DAY AND status=1 ORDER BY total_read DESC LIMIT $limit"; 
    
    
    $news=$db->select(	$sql_query);
    if($news){     
        foreach($news as $news_info){           
        
        $news_ID= $news_info['news_id'];	
        $news_CategoryID= $news_info['cat_id'];	
        $news_title= $news_info['news_title'];
        $news_article_url= __bn_getArticleURL($news_info);	 
         
        $html .=ar_displayNews($news_info, $news_for='small_thumb_list'); 
        
        }
    }
     
    return $html;
}
function ar_showLatestNews($limit =5){
    global $db; 
    $html='';
    $sql_query="SELECT *FROM `all_news` WHERE status=1  ORDER BY news_id DESC LIMIT $limit"; 
    $news=$db->select($sql_query);
    if($news){     
        foreach($news as $news_info){           
        
        $news_ID= $news_info['news_id'];	
        $news_CategoryID= $news_info['cat_id'];	
        $news_title= $news_info['news_title'];
        $news_article_url= __bn_getArticleURL($news_info);	 
         
        $html .=ar_displayNews($news_info, $news_for='small_thumb_list'); 
        
        }
    }
     
    return $html;
}

function ar_getTopNewsByPosition($position=1, $limit=4){
    global $db; 
    $html='';
    $sql_query="SELECT *FROM `all_news` WHERE top_news ='$position' ORDER BY news_id DESC LIMIT $limit"; 
    $news_info=$db->select($sql_query);
    return $news_info;
}
function ar_showTop_16_News($position=16, $limit=16){
    global $db; 
    $html='';
    
    $news=ar_getTopNewsByPosition($position,$limit);
    if($news){
        foreach($news as $news_info){
            $news_ID= $news_info['news_id'];	
            $news_CategoryID= $news_info['cat_id'];	
            $news_title= $news_info['news_title'];
            $news_sub_title=$news_info["news_subheading"];
            $news_image= getNewsFecImageURL($news_info);
            $news_image_thumb=ar_timthumb_image($news_image,$image_width=304,$image_height=197); 	
            $news_content= $news_info["news_details"];
            $news_excerpt= trunc_words($news_content,40);
            $news_Writers= $news_info['Writers'];	
            $news_Initial= $news_info['Initial'];
            #$news_pub_date=ar_FormatDateEn2Bn($news_info["DateTimeInserted"],'j F, Y, g:i a');
            $news_pub_date=ar_FormatDateEn2Bn($news_info["date_added"],'j F, Y, g:i a');
            $news_article_url= __bn_getArticleURL($news_info);	 
             
            /* $html .='<div class="col-xs-12 col-sm-4 col-md-3">
							<div class="section-overlay-block">
								<div class="overlay-block">
								<a href="'.$news_article_url.'">
									 '.$news_image_thumb.'
								   <div class="overlay-wrap">'.$news_title.'</div>
								</a>
							</div>
							</div>
					</div>'."\n";   
					
					*/
			    $html .='<div class="col-xs-12 col-sm-4 col-md-3">
							<div class="sel_news_block">
								<a href="'.$news_article_url.'">
									 '.$news_image_thumb.'
								   <h2>'.$news_title.'</h2>
								</a>
							</div>
					</div>'."\n";  		
        }
    }
      
     
    return $html;
}
function ar_showTop_4_News($position=4, $image_width=145,$image_height=100){
    global $db; 
    $html='';
    
    $news=ar_getTopNewsByPosition($position);
    if($news){
        foreach($news as $news_info){
          //  pre($news_info);
            $news_ID= $news_info['news_id'];	
            $news_CategoryID= $news_info['cat_id'];	
            $news_title= $news_info['news_title'];
            $news_sub_title=$news_info["news_subheading"];
            $news_image= getNewsFecImageURL($news_info);
            $news_image_thumb=ar_timthumb_image($news_image,$image_width=145,$image_height=100); 	
            $news_content= $news_info["news_details"];
            $news_excerpt= trunc_words($news_content,40);
            $news_Writers= $news_info['Writers'];	
            $news_Initial= $news_info['Initial'];
            //$news_pub_date=ar_FormatDateEn2Bn($news_info["DateTimeInserted"],'j F, Y, g:i a');
            $news_pub_date=ar_FormatDateEn2Bn($news_info["date_added"],'j F, Y, g:i a');
            $news_article_url= __bn_getArticleURL($news_info);	 
             
            $html .='<div class="col-xs-12 col-sm-6 col-md-3">
                    <div class="post-list-blocks clearfix">
                        <a href="'.$news_article_url.'">
                            '.$news_image_thumb.'
                           '.$news_title.'
                        </a>
                    </div>
                </div>'."\n";   
        }
    }
      
     
    return $html;
}
function ar_showTop_3_News($view= 'grid', $position=3, $image_width=304,$image_height=185){
    global $db; 
    $html_grid='';
    $html_list='';
    
    $news=ar_getTopNewsByPosition($position, $limit=3);
    if($news){
        $html_grid ='<div class="row">'."\n";
        $html_list ='<div class="feature-story-block clearfix">'."\n";
        foreach($news as $news_info){
                $news_ID= $news_info['news_id'];	
                $cat_id= $news_info['cat_id'];	
                $news_title= $news_info['news_title'];
                $news_image= getNewsFecImageURL($news_info);
                $slider_image=ar_timthumb_image($news_image,$image_width=304,$image_height=185); 
                $news_article_url= __bn_getArticleURL($news_info);	 
                $news_content= $news_info["news_details"];
                 $news_excerpt= trunc_words($news_content,40);
        
                $html_grid .='<div class="col-xs-12 col-sm-4 col-md-4">
                            <div class="overlay-block">
                            <a href="'.$news_article_url.'">
                                '.$slider_image.'
                               <div class="overlay-wrap">'.$news_title.'</div>
                            </a>
                            </div>
                         </div>'."\n";     
                         
                $html_list .='<div class="feature-story-wrap clearfix">
                                <div class="feature-preview"><a href="'.$news_article_url.'">'.$slider_image.'</a></div>
                                <div class="feature-story-info">
                                    <h2><a href="'.$news_article_url.'">'.$news_title.'</a></h2>
                                    <p>'.$news_excerpt.'</p>
                                </div>
                            </div>'."\n";          
        }
        
       $html_grid .='</div>'."\n"; 
       $html_list .='</div>'."\n"; 
    }
     if($view =='grid'){
        return $html_grid;
     }else{
        return $html_list;
     }
    
}
function ar_showTop_2_News($position=2, $image_width=304,$image_height=185){
    global $db; 
    $html='';
    
    $news=ar_getTopNewsByPosition($position, $limit=2);
    if($news){
        foreach($news as $news_info){
                $news_ID= $news_info['news_id'];	
                $cat_id= $news_info['cat_id'];	
                $news_title= $news_info['news_title'];
                $news_image= getNewsFecImageURL($news_info);
                $slider_image=ar_timthumb_image($news_image,$image_width=304,$image_height=197); 
                $news_article_url= __bn_getArticleURL($news_info);	 
                 
                $html .='<div class="overlay-block">
                            <a href="'.$news_article_url.'">
                                '.$slider_image.'
                               <div class="overlay-wrap">'.$news_title.'</div>
                            </a>
                            </div>'."\n";     
        }
    }
     
    return $html;
}

function ar_showBreakingNews($limit =10, $section_title='???? ???'){
    global $db; 
    $html='';
    $sql_query="SELECT *FROM `all_news` WHERE status=1 AND breaking ='1' ORDER BY news_id DESC LIMIT $limit"; 
    $news=$db->select(	$sql_query);
    
    if($news){ 
       $html = '<section class="news-slider clearfix">
                <h2>'.$section_title.'</h2>
                <div class="news-slide-block">
                    <ul id="news_scroll_block">'; 
                        foreach($news as $news_info){           
                            
                            $news_ID= $news_info['news_id'];	
                            $news_CategoryID= $news_info['cat_id'];	
                            $news_title= $news_info['news_title'];
                            $news_article_url= __bn_getArticleURL($news_info);	 
                             
                            $html .=' <li><a href="'.$news_article_url.'">'.$news_title.'</a></li>'."\n"; 
                            
                        } 
        
      $html .= '</ul>
                </div>
            </section>'."\n";   
        
    }
    
     
    return $html;
}

function ar_showSliderNews2($limit =3, $cat_id= false, $carosel_id='carousel-main-slider'){
    global $db; 
    $html='';
    if($cat_id){
       $sql_query="SELECT *FROM `all_news` WHERE cat_id= $cat_id AND slider_news ='2' ORDER BY news_id DESC LIMIT $limit"; 
    }else{
     $sql_query="SELECT *FROM `all_news` WHERE slider_news ='2' ORDER BY news_id DESC LIMIT $limit";   
    }
     
    $news=$db->select(	$sql_query);
    $html='';
    if($news){ 
        $item_html ='';
        $carosel_indicators_list ='';
                        foreach($news as $k => $news_info){ 
                           
                           $cls_active =($k==0)?' class="active"':'';
                           $item_active =($k==0)?' active':'';
                            
                           $carosel_indicators_list .= '<li data-target="#'.$carosel_id.'" data-slide-to="'.$k.'"'.$cls_active.'></li>'."\n";      
                           $news_image= getNewsFecImageURL($news_info); 
                           $slider_image=ar_timthumb_image($news_image,$image_width=610,$image_height=395); 
                            $news_ID= $news_info['news_id'];	
                            $news_CategoryID= $news_info['cat_id'];	
                            $news_title= $news_info['news_title'];
                            $news_article_url= __bn_getArticleURL($news_info);	 
                            
                            $item_html .='<div class="item'.$item_active.'">
                                    '.$slider_image.'
                                    <div class="carousel-caption"><a href="'.$news_article_url.'">'.$news_title.'</a></div>
                                </div>'."\n"; 
                            
                        } 
        if($limit ==1 ){
            $in_html='';
            $n_p_html='';
        }else{
              $in_html='<ol class="carousel-indicators">
                               '. $carosel_indicators_list .'
                            </ol>';
                            
              $n_p_html='<a class="left carousel-control" href="#carousel-main-slider" role="button"
                               data-slide="prev">
                                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="right carousel-control" href="#carousel-main-slider" role="button"
                               data-slide="next">
                                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>';              
                            
        }
              $html = '<div id="'.$carosel_id.'" class="carousel slide" data-ride="carousel">
                           '.$in_html.'
                            <div class="carousel-inner" role="listbox">
                                '.$item_html.'
                            </div>
                            '.$n_p_html.'
                        </div>'."\n"; 
        
    }    
     
    return $html;
}
function ar_showSliderNews($limit =3, $cat_id= false, $carosel_id='carousel-main-slider'){
    global $db; 
    $html='';
    if($cat_id){
       $sql_query="SELECT *FROM `all_news` WHERE cat_id= $cat_id AND slider_news ='1' ORDER BY news_id DESC LIMIT $limit"; 
    }else{
     $sql_query="SELECT *FROM `all_news` WHERE slider_news ='1' ORDER BY news_id DESC LIMIT $limit";   
    }
     
    $news=$db->select(	$sql_query);
    $html='';
    if($news){ 
        $item_html ='';
        $carosel_indicators_list ='';
                        foreach($news as $k => $news_info){ 
                           
                           $cls_active =($k==0)?' class="active"':'';
                           $item_active =($k==0)?' active':'';
                            
                           $carosel_indicators_list .= '<li data-target="#'.$carosel_id.'" data-slide-to="'.$k.'"'.$cls_active.'></li>'."\n";      
                           $news_image= getNewsFecImageURL($news_info); 
                           //$slider_image=ar_timthumb_image($news_image,$image_width=610,$image_height=375); 
                            $slider_image=ar_timthumb_image($news_image,$image_width=610,$image_height=395); 
                            $news_ID= $news_info['news_id'];	
                            $news_CategoryID= $news_info['cat_id'];	
                            $news_title= $news_info['news_title'];
                            $news_article_url= __bn_getArticleURL($news_info);	 
                            
                            $item_html .='<div class="item'.$item_active.'">
                                    '.$slider_image.'
                                    <div class="carousel-caption"><a href="'.$news_article_url.'">'.$news_title.'</a></div>
                                </div>'."\n"; 
                            
                        } 
        if($limit ==1 ){
            $in_html='';
            $n_p_html='';
        }else{
              $in_html='<ol class="carousel-indicators">
                               '. $carosel_indicators_list .'
                            </ol>';
                            
              $n_p_html='<a class="left carousel-control" href="#carousel-main-slider" role="button"
                               data-slide="prev">
                                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="right carousel-control" href="#carousel-main-slider" role="button"
                               data-slide="next">
                                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>';              
                            
        }
              $html = '<div id="'.$carosel_id.'" class="carousel slide" data-ride="carousel">
                           '.$in_html.'
                            <div class="carousel-inner" role="listbox">
                                '.$item_html.'
                            </div>
                            '.$n_p_html.'
                        </div>'."\n"; 
        
    }    
     
    return $html;
}
function ar_getAlbumsByPhotoCategory($cat_id= false, $limit =1){
     global $db; 
    if($cat_id){
       $sql_query="SELECT *FROM `image_albums` WHERE cat_id= '$cat_id' AND status ='1' ORDER BY album_id DESC LIMIT $limit"; 
    }else{
       $sql_query="SELECT *FROM `image_albums` WHERE  status ='1' ORDER BY album_id DESC LIMIT $limit"; 
    }
    // echo $sql_query;
    $albums=$db->select($sql_query);
    //pre($albums);
    return $albums;
    
}
function ar_showAlbumWidgetByPhotoCategory($cat_id= false, $limit =1){
    $html='';
    
    $album_cat_info = getImageCategoryInfo($cat_id);
    $album_cat_name=$album_cat_info['menu_text'];    
    $album_cat_url= __getPhotoCatURL($album_cat_info);    
    $albums= ar_getAlbumsByPhotoCategory($cat_id, $limit);
    if($albums){
        foreach($albums as $k=>$album_info){
         	     $album_title= $album_name=$album_info['album_title'];
                  $album_cover= $album_info['fec_image'];
        	//	$album_cover=ar_timthumb_image($album_cover,298,208);
        		
        		$album_date= $album_info['created'];
        		$reporter= $album_info['reporter'];
        		$album_url=  __getAlbumURL($album_info);
          
            $html .='<div class="group-block">
                        <h3 class="title-bar-black"><a href="'.$album_cat_url.'">'.$album_cat_name.'</a></h3>
                       <a href="'.$album_url.'" title="'.$album_name.' | '. $album_cat_name.'"> <div class="preview">
                            <img src="'.$album_cover.'" alt="'.$album_name.'">
                        </div></a>
                    </div>';    
        
        }
    }
 return $html;   
}
function ar_showAlbumsByPhotoCategory($cat_id= false, $limit =1){
    $html='';
    
    if($cat_id){
      $album_cat_info = getImageCategoryInfo($cat_id);
      $album_cat_name=$album_cat_info['menu_text'];    
      $album_cat_url= __getPhotoCatURL($album_cat_info);  
    }
      
    $albums= ar_getAlbumsByPhotoCategory($cat_id, $limit);
    if($albums){
        foreach($albums as $k=>$album_info){
         	     $album_title= $album_name=$album_info['album_title'];
                  $album_cover= $album_info['fec_image'];
        		$album_cover=ar_timthumb_image($album_cover,298,208);
        		
        		$album_date= $album_info['created'];
        		$reporter= $album_info['reporter'];
        		$album_url=  __getAlbumURL($album_info);
            /*
            $html .='<div class="group-block">
                        <h3 class="title-bar-black"><a href="'.$album_cat_url.'">'.$album_cat_name.'</a></h3>
                       <a href="'.$album_url.'" title="'.$album_name.' | '. $album_cat_name.'"> <div class="preview">
                            <img src="'.$album_cover.'" alt="'.$album_name.'">
                        </div></a>
                    </div>';    
                    
                */    
                    
            
            
            	
            $html .='<div class="col-xs-12 col-sm-4 col-md-3">
            	<div class="gl-box">
            		<a href="'.$album_url.'">'. $album_cover.'</a>
            		<h4><a href="'.$album_url.'">'.$album_title.'</a></h4>
            		<div class="meta-info">
            			'.date_time($album_date, false).',  ছবি: '.$reporter.'
            		</div>
            	</div>
            </div>'."\n";
        
        }
    }
 return $html;   
}
function ar_showSliderPhotos($limit =10, $cat_id= false, $carosel_id='carousel-photo-slider'){
    global $db; 
    $html='';
    if($cat_id){
       
       	$ImageType='image_albums';
		$sql_query = "SELECT * FROM images WHERE type='$ImageType' AND slider_image= 1 ORDER BY id DESC LIMIT $limit";
        
    }else{
     	$ImageType='image_albums';
		$sql_query = "SELECT * FROM images WHERE type='$ImageType' AND slider_image= 1 ORDER BY id DESC LIMIT $limit";
    }
     
    $images=$db->select(	$sql_query);
    $html='';
    if($images){ 
        $item_html ='';
        $carosel_indicators_list ='';
                        foreach($images as $k => $image_info){ 
                           
                           $cls_active =($k==0)?' class="active"':'';
                           $item_active =($k==0)?' active':'';
                            $album_id=$image_info['type_id'];
                           $carosel_indicators_list .= '<li data-target="#'.$carosel_id.'" data-slide-to="'.$k.'"'.$cls_active.'></li>'."\n";      
                         
                           $slider_image=ar_timthumb_image($image_info['image_path'],$image_width=610,$image_height=375); 
                            $image_title= $image_info['image_caption'];
                            $album_url= __getAlbumURL($album_id);	 
                            
                            $item_html .='<div class="item'.$item_active.'">
                                    <a href="'.$album_url.'">'.$slider_image.'
                                    <div class="carousel-caption">'.$image_title.'</div></a>
                                </div>'."\n"; 
                            
                        } 
        
              $html = '<div id="'.$carosel_id.'" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                               '. $carosel_indicators_list .'
                            </ol>
                            <div class="carousel-inner" role="listbox">
                                '.$item_html.'
                            </div>
                            <a class="left carousel-control" href="#'.$carosel_id.'" role="button"
                               data-slide="prev">
                                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="right carousel-control" href="#'.$carosel_id.'" role="button"
                               data-slide="next">
                                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>'."\n"; 
        
    }    
     
    return $html;
}
?>