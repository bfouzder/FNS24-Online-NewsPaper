<?php

/**

 * @package Customize WP (3rd Party Helper)

 * @author bfouzder@yahoo.com

 * @version 1.1.1

 */



/****************************************************/ 
function ar_getLatestPostsByCategory($cat_name='news',$limit=5,$image_width=70,$image_height=46,$rand=true, $htmlby='fornews' ){

$news_html="";
$p_queries = new WP_Query('category_name='.$cat_name.'&showposts='.$limit); //category : News
if($p_queries->posts){
foreach($p_queries->posts as $post){
$p_link=get_permalink($post->ID);
if($rand){
$p_image='<img src="'.get_template_directory_uri().'/timthumb.php?src='.get_rand_generalImage().'&h='.$image_height.'&w='.$image_width.'&zc=1" alt="" />';
}else{
$news_image=wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
if($news_image[0]){
$p_image='<img src="'.get_template_directory_uri().'/timthumb.php?src='.$news_image[0].'&h='.$image_height.'&w='.$image_width.'&zc=1">';
}else{
$p_image='';
}

}

$p_title=$post->post_title;
$p_content=trunck_string($post->post_content,80,true);
$p_date=get_the_time( 'M,j, Y');
$p_author=get_the_author();
if($htmlby=='fornews'){
$news_html .='<div class="latest_news_box">
<a href="'.$p_link.'">'.$p_image.'</a>
<div class="news-info">
<h3><a href="'.$p_link.'">'.$p_title.'</a></h3>
<p>'.$p_content.'</p>
</div>
</div>';
}elseif($htmlby=='PaymentsMethods'){
$news_html .='<div class="card-box">
<div class="card-ion"><a href="'.$p_link.'">'.$p_image.'</a></div>
<a href="'.$p_link.'">'.$p_title.'</a>
</div>';
}

}
}
return $news_html;
}

#bof Latest Pages;

function showLatestArticlePages($showPosts=3,$echo =true){
  $Latestarticles="";   
  $articles_query=getLatestArticlePages($showPosts);
  if(!$articles_query->posts){ return false;}
//	pre($articles_query->posts);							  
    //while ($articles_query->have_posts()) : $articles_query->the_post(); 
	
	 $ar_excerpt_length= trim(ar_get_theme_mod('ar_excerpt_length'));
	  $ar_excerpt_length= ($ar_excerpt_length)?$ar_excerpt_length:300;
	
    foreach($articles_query->posts as $k=>$post){
        $general_rand_image= get_rand_generalImage();
        $news_image=($general_rand_image)?'<img src="'.$general_rand_image.'" width="128" height="127" >':'';
        $p_link=get_permalink($post->ID);
        $p_con = trunck_string($post->post_content, $ar_excerpt_length,true);
        $p_title = trunck_string($post->post_title,30,true);
        //$news_image=getPostImage($post->ID,"medium",128,127);
	 $news_image=ar_timthumb_image($post->ID,$image_width=102,$image_height=67);   
			$Latestarticles .='<div class="all-half-box"><div class="preview-box">'.$news_image.'</div>
                                 <h2><a href="'.$p_link.'">'.$p_title.'</a></h2>
                                 <p>'.$p_con.'</p>
                              </div>'."\n";   
  }
  //  endwhile;  
   if(!$echo){
      return $Latestarticles;  
   }else{
    echo $Latestarticles;
   } 
}



function showLatestArticlePages1($showPosts=3,$echo =true){
  $Latestarticles="";   
  $articles_query=getLatestArticlePages($showPosts);
  if(!$articles_query->posts){ return false;}
//	pre($articles_query->posts);							  
    //while ($articles_query->have_posts()) : $articles_query->the_post(); 
	
	 $ar_excerpt_length= trim(ar_get_theme_mod('ar_excerpt_length'));
	  $ar_excerpt_length= ($ar_excerpt_length)?$ar_excerpt_length:300;
	
    foreach($articles_query->posts as $k=>$post){
        $general_rand_image= get_rand_generalImage();
        $news_image=($general_rand_image)?'<img src="'.$general_rand_image.'" width="128" height="127" >':'';
        $p_link=get_permalink($post->ID);
        $p_con = trunck_string($post->post_content, $ar_excerpt_length,true);
        $p_title = trunck_string($post->post_title,25,true);
        //$news_image=getPostImage($post->ID,"medium",128,127);
		$news_image=ar_timthumb_image($post->ID,$image_width=102,$image_height=67);  
		
			$Latestarticles .='<li><a href="'.$p_link.'">'.$p_title.'</a></li>'."\n";  
  }
  //  endwhile;  
   if(!$echo){
      return $Latestarticles;  
   }else{
    echo $Latestarticles;
   } 
}



function getLatestArticlePages($showPosts=3,$viewed=false){
$exclude_pages= trim(ar_get_theme_mod('ar_exclude_pages'));

if($viewed){
 if($exclude_pages){
	 $parg=array( 
	 'post_type'=>'page',
	 'showposts'=>$showPosts,
	 'post__not_in' => explode(",",$exclude_pages),
     'orderby' => 'meta_value_num',
        'meta_key' => 'TOTAL_VIEWED',
        'order' => 'DESC' 
	); 
	}else{
	 $parg=array( 
	 'post_type'=>'page',
	 'showposts'=>$showPosts,
     'orderby' => 'meta_value_num',
        'meta_key' => 'TOTAL_VIEWED',
        'order' => 'DESC'
	);   
}   
}else{
     if($exclude_pages){
    	 $parg=array( 
    	 'post_type'=>'page',
    	 'showposts'=>$showPosts,
    	 'post__not_in' => explode(",",$exclude_pages) 
    	); 
    	}else{
    	 $parg=array( 
    	 'post_type'=>'page',
    	 'showposts'=>$showPosts
    	);   
    }  
}


$articles_query = new WP_Query($parg);
return $articles_query;
}
#eof Latest Pages;

#bof mostviewed pages;
function showTopOnlineJackpots($showPosts = 4,$post_parent=120,$play_now_link='#',$img_width=191,$img_height=115, $echo=true){
    //$jackpot_query = getMostViewedPages($showPosts,$post_parent);
    $jackpot_query =  ar_getSubPages($post_parent,$showPosts); //latest pages;
     
    if($jackpot_query->posts){ 
        $top_jackpots="\n"; 
        
        foreach ($jackpot_query->posts as  $post){
             
        $p_link=get_permalink($post->ID);
        $p_con = trunck_string($post->post_content, $ar_excerpt_length,true);
        $p_title = trunck_string($post->post_title,18,true);
        $p_content = trunck_string($post->post_content,148,true);
        $news_image=getPostImage($post->ID,"medium",$img_width,$img_height);
        $price=(get_post_meta($post->ID,'PRICE',true))?'<div class="price">'.get_post_meta($post->ID,'PRICE',true).'</div>':$p_title;
        
        $top_jackpots .='<div class="info-block">
                                  <div class="preview"><a href="'.$p_link.'">'.$news_image.'</a></div>
                                  '.$price.'
                                  <div class="more"><a href="'.$play_now_link.'">Play Now!</a></div>
                             </div><!--/info-block-->'."\n";               
        }
        }
    
     $html ='<div class="item-blocks">
                     <h1><a href="'.get_permalink($post_parent).'">Jackpots</a></h1>
                    '.$top_jackpots.'
             </div><!--/item-blocks-->';
    
    if(!$echo){
      return $html;  
    }else{
    echo $html;
    } 
}


function showMostViewedPages($showPosts = 8,$post_parent=false,$img_width=85,$img_height=72, $echo=true){
    $my_query = getMostViewedPages($showPosts,$post_parent);
    $html =""; 
    if(!$my_query->posts ){return false;}
    $kk=1;
    while ($my_query->have_posts()) : $my_query->the_post(); 
        $post_id=get_the_ID();
        $p_link=get_permalink($post_id);
        $p_title = trunck_string(get_the_title(),12,true);
       
        $news_image=getPostImage($post_id,"medium",$img_width,$img_height);
        $extra = (($kk%4)==0)?' addlast':'';      
        $html .= "\n".'<div class="add-game'.$extra.'">
                	<a href="'.$p_link.'">'.$news_image.'</a>
                     <a href="'.$p_link.'">'.$p_title.'</a>
                </div><!--/add-game-->'."\n";  
     $kk++;                       
   
    endwhile; 
    
    if(!$echo){
      return $html;  
    }else{
    echo $html;
    } 
}


function getMostViewedPages($showPosts = 3,$post_parent=false){
    if($post_parent){
      $args = array(
        'post_type' => 'page',
        'post_parent' => $post_parent, 
        'showposts' => $showPosts,
        'orderby' => 'meta_value_num',
        'meta_key' => 'TOTAL_VIEWED',
        'order' => 'DESC'
        );

    }else{
       $args = array(
        'post_type' => 'page',
        'showposts' => $showPosts,
        'orderby' => 'meta_value_num',
        'meta_key' => 'TOTAL_VIEWED',
        'order' => 'DESC'
        ); 
    }
    $rows=null;
 return $rows = new WP_Query( $args ); 
} 
function ar_getSubPages($parent_page_id,$showposts =false){

if($showposts){

    $args = array(

    'post_type' => 'page',

    'post_parent' => $parent_page_id,

    'posts_per_page' => $showposts,

	'orderby' => 'menu_order',

	'order' => 'ASC'

    );    

}else{

   $args = array(

    'post_type' => 'page',

    'post_parent' => $parent_page_id,

    'orderby' => 'menu_order',

	'order' => 'ASC'

    );    

}



//pre($args);

$wp_query =null;



return $subpages = new WP_Query($args); 



}
#eof mostviewed pages;

#bof Latest News;
function showLatestNews($showPosts = 4,$img_width=80,$img_height=64, $echo=true){
    $my_query = getLatestNews($showPosts);
    $html =""; 
    if(!$my_query->posts ){return false;}
    
        foreach($my_query->posts as $k=>$post){
            $post_title= trunck_string($post->post_title,70,true); 
            $post_link= get_permalink($post->ID);
            $post_content= trunck_string($post->post_content,250,true);
            $post_date= get_the_time('F j, Y',$post);
            $post_image=getPostImage($post->ID,"thumbnail",$img_width,$img_height)?getPostImage($post->ID,"thumbnail",$img_width,$img_height):'<img src="'.get_rand_generalImage().'" alt="rand images" width="'.$img_width.'" height="'.$img_height.'" >';
    
    		$html .='<div class="info_news">

                       		<a href="'.$post_link.'"> <h5>'.$post_title.'</h5>

                       		 <p class="date"><span>'.$post_date.'</span></p>
                            
                          	   <p>'.$post_image.' '.$post_content.'</p>

                            	<span class="readmore">Read More &gt;&gt;</span> 
                            </a>
                       	  </div><!--/info_news-->
                          <div class="line"></div>'."\n"; 
    
    		//$html .='<li> <a href="'.$post_link.'">'.$post_title.' <span>('.$post->comment_count.')</span></a></li>'."\n"; 
    
    }
    
    if(!$echo){
      return $html;  
    }else{
    echo $html;
    } 
}


function getLatestNews($showPosts = 3,$orderbycomment=false){
    if($orderbycomment){
         $args = array(
        	'category_name' =>'news',
        	'posts_per_page' => $showPosts,
    		'orderby' => 'comment_count',
      		'order' => 'DESC', 
    		);  
    }else{
       $args = array(
        	'category_name' =>'news',
        	'posts_per_page' => $showPosts
    		);   
    }
 $rows=null;   
 return $rows = new WP_Query( $args ); 
} 

#eof Latest News;



function ar_fb_like($cur_url =false, $echo =true){

    $cur_url= ($cur_url)?$cur_url:'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']; 

    $like= '<iframe src="http://www.facebook.com/plugins/like.php?href='.$cur_url.'&amp;layout=button_count&amp;show_faces=false&amp;width=99&amp;action=like&amp;colorscheme=light" allowtransparency="true" style="border: medium none; overflow: hidden; width: 99px; height: 22px; " frameborder="0" scrolling="no"></iframe>';



    if($echo){

     echo $like;

    }else{

        return $like;

    }

}







function get_generalImages(){

   $images_path=trim(ar_get_theme_mod('ar_general_images_path'));

   if(!$images_path) return false;

   

   $images=scandir($images_path);

   unset($images[0]);

   unset($images[1]);

   return $images;

}



function get_rand_generalImage(){

   $images_url=trim(ar_get_theme_mod('ar_general_images_url'));

   if(!$images_url) return false;

   $images = get_generalImages();

   

    $rand_keys = array_rand($images, 2);

    $images_name= $images[$rand_keys[0]];

    if(!$images_name) return false;

  

     return $images_url.$images_name;

}


function ar_timthumb_image($post_id,$image_width=235,$image_height=145,$rand=false,$echo=false,$timthumb=false){
    if($timthumb){

   if($rand){
        $p_image='<img src="'.get_template_directory_uri().'/timthumb.php?src='.get_rand_generalImage().'&h='.$image_height.'&w='.$image_width.'&zc=1" alt="" />';   
    }else{
        $news_image=wp_get_attachment_image_src( get_post_thumbnail_id( $post_id ), 'full' );
        $p_image=($news_image[0])?'<img src="'.get_template_directory_uri().'/timthumb.php?src='.$news_image[0].'&h='.$image_height.'&w='.$image_width.'&zc=1">':'';
    }
}else{
   if($rand){
        $p_image='<img src="'.get_rand_generalImage().'"  width="'.$image_width.'" height="'.$image_height.'" alt="" />';   
    }else{
        $news_image=wp_get_attachment_image_src( get_post_thumbnail_id( $post_id ), 'full' );
        $p_image=($news_image[0])?'<img src="'.$news_image[0].'"  width="'.$image_width.'" height="'.$image_height.'" alt="" >':'';
    }
}
 


    if($echo){
        echo $p_image;
    }else{
    return   $p_image;    
    }
}


 function ar_fb_reader($fbaccount='MQiv',$bg_color='0099ff',$display=true){

  $fbr='<a href="http://feedproxy.google.com/blogspot/'.$fbaccount.'"><img width="88" height="26" src="http://feedproxy.google.com/~fc/blogspot/'.$fbaccount.'?bg='.$bg_color.'&amp;fg=444444&amp;anim=0" alt="" style="border: 0pt none;"></a>';

  if($display){

    echo $fbr;

  }else{

        return $fbr;

  }    

}




function ar_GooglePlus($cur_url =false,$title=false, $echo =true){
$cur_url= ($cur_url)?$cur_url:'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
$like= '<!-- Place this tag in your head or just before your close body tag --><script type="text/javascript" src="https://apis.google.com/js/plusone.js"></script><!-- Place this tag where you want the +1 button to render --><g:plusone size="standard" annotation="bubble" href="'.$cur_url.'"></g:plusone>';
if($echo){
echo $like;
}else{
return $like;
}
}

#bof ALL ABOUT POST IMAGE

function ShowPostImage($post_id,$type='large',$width=150,$height=false){

    $img_src=getImageFromPost($post_id,$width,$height);

    echo makeTimThumb($img_src,$width,$height);

}



function getPostImage($post_id,$type='large',$width=150,$height=false){

    $img_src=getImageFromPost($post_id,$type);

    return makeTimThumb($img_src,$width,$height);

}

function getImageFromPost($post_id,$type='large'){

    $img_src=getFeaturedImage( $post_id,$type);

    if($img_src)return $img_src;

    

    $post_info=getPostInfo($post_id);





    $text=$post_info->post_content;

	preg_match('/<img[^>]+>/i',$text, $result);

    if($result)preg_match('/(src)=("[^"]*")/i',$result[0], $img);

	if($img)$img_src= $img[2];



	$home_url=home_url( '/' );

	if(strpos($img_src, '../wp-content/') !==false){

		$img_src=str_ireplace("../wp-content/",$home_url."wp-content/",$img_src);

	}

		$img_src=str_ireplace('"','',$img_src);

    return $img_src;

}

function makeTimThumb($img_src,$width=150,$height=false){

    if(!$img_src)return;



    $thumb_file_url=get_bloginfo( 'template_url' ).'/TimThumb/timthumb.php';

	$thumb_file_dir = str_replace(home_url( '/wp-content'),WP_CONTENT_DIR,$thumb_file_url);

    if(file_exists($thumb_file_dir)){

        return '<img src="'.get_bloginfo( 'template_url' ).'/TimThumb/timthumb.php?src='.$img_src.'&w='.$width.'&h='.$height.'&zc=1" alt="" />';    

    }else{

        if($width && $height){

             return '<img src="'.$img_src.'" width="'.$width.'" height="'.$height.'" alt="" />'; 

        }

          return '<img src="'.$img_src.'" width="'.$width.'" alt="" />';  

    }

}



function getSliderFeaturedImage($post_id) {

 return getFeaturedImage( $post_id,'large');

}

function getThumbFeaturedImage($post_id) {

 return getFeaturedImage( $post_id,'thumbnail');

}

function getMediumFeaturedImage( $post_id) {

 return getFeaturedImage( $post_id,'medium');

}





/**

 * $size = large(original), medium, thumbnail;

 * getFeaturedImage(get_the_ID());

 * <img src="<?=getFeaturedImage($id,'medium')?>" alt=""/>

 * */

function getFeaturedImage( $post_id = NULL, $size = 'large', $arr=false) {

	global $id;

	

	$post_thumbnail_id = get_post_thumbnail_id( $post_id );

    $image = wp_get_attachment_image_src($post_thumbnail_id, $size);

    if(!$image)return false;

    if($arr) return $image;

	if ( $image ) {

		list($src, $width, $height) = $image;

	}

    return $src;

}

#eof ALL ABOUT POST IMAGE





 



function getLatestPosts($limit=40,$output='object') {

	global $wpdb;

    $output = ($output=='object')?OBJECT:ARRAY_A;    

   return $wpdb->get_results($wpdb->prepare("SELECT * FROM $wpdb->posts WHERE post_type = 'post' AND post_status='publish' ORDER BY ID DESC LIMIT $limit"),$output);    

}







function getCauseTotalDonateMembersAndAmount($causes_name){

        $ctd= getCauseTotalDonate($causes_name);

        

        return '$'.$ctd['price'].' donated from '.$ctd['members'];              

}



function ar_displayCauses($data, $img_width=54, $trunccate=80,$lstart=1,$ltotal=10){



        $post_id = $data->ID; 

        if(!$post_id)return false;

		$post_title = str_replace('"', '', stripslashes($data->post_title)); 

		$post_link = get_permalink($post_id); 

        

      //  $causedinners=getCauseDinners($causes_name);

    

      

          

//        $catNames=ar_getPostCategories($post_id);

//        

//        $post_comments = get_comments_number( $post_id );

//        $post_comments = ($post_comments)?$post_comments.' comments': 'No comment';

//        

//		$post_author = ar_getUserInfo($data->post_author); 

//		$post_author = $post_author->display_name; 

		

        #$post_date = date('l, F j, Y', strtotime(str_replace('"', '', stripslashes($data->post_date)))); 

        $post_date = date('F j, Y', strtotime(str_replace('"', '', stripslashes($data->post_date)))); 

		$post_content = trunck_string($data->post_content,$trunccate,true); 

		

        $causes_address=get_post_meta($post_id,'_ar_dinner_address',true);

      

       $show_total_donate_amount_member=getCauseTotalDonateMembersAndAmount($post_title);

       

        $cmt_img=get_bloginfo('template_url').'/images/comment.png';

		$post_rating=(function_exists('the_ratings'))?the_ratings('div',$post_id,false):'';

	

        $last_cause=($lstart==$ltotal)?" last-causes":"";

       $html ='<div class="causes'.$last_cause.'">

                            <a href="'. $post_link .'">'.getPostImage($post_id,54,43,'thumbnail').'</a>

                            <a href="'. $post_link .'" title="'. $post_title .'" id="destacado_'.$post_id.'">'.   ucfirst($post_title) .'</a>

                            <p>'.$show_total_donate_amount_member.'<br /><span>'.$causes_address.'</span></p></div>'."\n";

    

    return $html;

    

}

function ar_displayPost2($data, $img_width=54, $trunccate=80,$lstart=1,$ltotal=10){



        $post_id = $data->ID; 

        if(!$post_id)return false;

		$post_title = str_replace('"', '', stripslashes($data->post_title)); 

		$post_link = get_permalink($post_id); 

	

          

        $catNames=ar_getPostCategories($post_id);

        

        $post_comments = get_comments_number( $post_id );

        $post_comments = ($post_comments)?$post_comments.' comments': 'No comment';

        

		$post_author = ar_getUserInfo($data->post_author); 

		$post_author = $post_author->display_name; 

		

        #$post_date = date('l, F j, Y', strtotime(str_replace('"', '', stripslashes($data->post_date)))); 

        $post_date = date('F j, Y', strtotime(str_replace('"', '', stripslashes($data->post_date)))); 

		$post_content = trunck_string($data->post_content,$trunccate,true); 

		

        $cmt_img=get_bloginfo('template_url').'/images/comment.png';

		$post_rating=(function_exists('the_ratings'))?the_ratings('div',$post_id,false):'';

	

        $last_cause=($lstart==$ltotal)?" last-causes":"";

       $html ='<div class="causes'.$last_cause.'">

                            <a href="'. $post_link .'">'.getPostImage($post_id,54,43,'thumbnail').'</a>

                            <a href="'. $post_link .'" title="'. $post_title .'" id="destacado_'.$post_id.'">'.   ucfirst($post_title) .'</a>

                            <p>'.$post_content.'</p></div>'."\n";

    

    return $html;

    

}





function ar_author_profile_link($post_author){

    

    return $post_author_link=home_url( '/' ).'foodie-profile/?u='.$post_author->user_login;

}



function ar_author_dinner_link($post_author){

    

    return $post_author_link=home_url( '/' ).'join-dinner/?u='.$post_author->user_login;

}





/**

 * 

 * Make sure featuredme plaguin is install

 **/ 

 



function ar_getAllFeaturedPostsIDs() {

	global $wpdb, $table_prefix;

    

	$table_name = $table_prefix."features";

    $fposts = array();  

      

	$sql = "SELECT id FROM $table_name"; 

	$posts = $wpdb->get_results($sql); 

    if($posts){

        foreach($posts as $post) { 

         $fposts[]=$post->id;

        }

    }

    return $fposts;

}

function ar_getFeaturedPosts($max_posts=1, $offset=0) {

	global $wpdb, $table_prefix;

    

	$table_name = $table_prefix."features";

    $fposts = array();  

      

	$sql = "SELECT * FROM $table_name ORDER BY  RAND() LIMIT $offset, $max_posts"; 

	$posts = $wpdb->get_results($sql); 

    if($posts){

        foreach($posts as $post) { 

         $fposts[]=ar_getPostInfo($post->id);

        }

    }

    return $fposts;

}



#post,user and page info



function ar_getUserInfo($user_id,$output='object') {

	global $wpdb;

    $output = ($output=='object')?OBJECT:ARRAY_A;

    return $wpdb->get_row($wpdb->prepare("SELECT * FROM $wpdb->users WHERE  ID = '$user_id'"),$output); 

      

}

function ar_getUserInfoByName($user_name,$output='object') {

	global $wpdb;

    $output = ($output=='object')?OBJECT:ARRAY_A;

   

    $user_info= $wpdb->get_row($wpdb->prepare("SELECT * FROM $wpdb->users WHERE  user_login  = '$user_name'"),$output); 

    return get_userdata($user_info->ID);

      

}



function getPostInfo($post_id_name,$output='object') {

	return ar_getPostInfo($post_id_name,$output='object');

}



function ar_getPostInfo($post_id_name,$output='object') { 

	global $wpdb; 

    $output = ($output=='object')?OBJECT:ARRAY_A; 

	if ( !$post_id_name ) 

		return false; 

    if(is_numeric($post_id_name)){ 

        #return $wpdb->get_row($wpdb->prepare("SELECT * FROM $wpdb->posts WHERE post_type = 'post' AND post_status='publish' AND  ID = '$post_id_name'"),$output); 

        return $wpdb->get_row($wpdb->prepare("SELECT * FROM $wpdb->posts WHERE  ID = '$post_id_name'"),$output);  

     }else{ 

        #return $wpdb->get_row($wpdb->prepare("SELECT * FROM $wpdb->posts WHERE post_type = 'post' AND post_status='publish' AND post_name = '$post_id_name'"),$output);   

        return $wpdb->get_row($wpdb->prepare("SELECT * FROM $wpdb->posts WHERE  post_name = '$post_id_name'"),$output);   



     } 

}

function getPageInfo($post_id_name,$output='object'){

      return  ar_getPageInfo($post_id_name,$output);

}



function ar_getPageInfo($post_id_name,$output='object'){

	global $wpdb;

    $output = ($output=='object')?OBJECT:ARRAY_A;

	if ( !$post_id_name )

		return false;

    

     if(is_numeric($post_id_name)){

        return $wpdb->get_row($wpdb->prepare("SELECT * FROM $wpdb->posts WHERE post_type = 'page' AND post_status='publish' AND ID = '$post_id_name'"),$output);    

     }else{

        return $wpdb->get_row($wpdb->prepare("SELECT * FROM $wpdb->posts WHERE post_type = 'page' AND post_status='publish' AND post_name = '$post_id_name'"),$output);    

     }

}



function getLinksList($order = 'name', $deprecated = '') {

	_deprecated_function(__FUNCTION__, '0.0', 'wp_list_bookmarks()');



	$order = strtolower($order);



	// Handle link category sorting

	$direction = 'ASC';

	if ( '_' == substr($order,0,1) ) {

		$direction = 'DESC';

		$order = substr($order,1);

	}



	if ( !isset($direction) )

		$direction = '';



	$cats = get_categories("type=link&orderby=$order&order=$direction&hierarchical=0");



	// Display each category

	if ( $cats ) {

		foreach ( (array) $cats as $cat ) {

			// Handle each category.



			// Display the category name

			echo "<ul class='linkcat'>\n";

			// Call get_links() with all the appropriate params

			get_links($cat->term_id, '<li>', "</li>", "\n", true, 'name', false);



			// Close the last category

			echo "\n\t</ul>\n\n";

		}

	}

}







#bof taxonomy

function ar_getTermInfoByName($post_name){

   	global $wpdb;

        if(!$post_name)return false;

 

	return  $wpdb->get_row($wpdb->prepare("SELECT t.*,tt.* FROM $wpdb->terms AS t INNER JOIN $wpdb->term_taxonomy AS tt ON t.term_id = tt.term_id  WHERE t.name = '$post_name' "),ARRAY_A);    



}



function ar_getTermInfoBySlug($post_slug){

   	global $wpdb;

     if(!$post_slug)return false;

    # echo "SELECT t.*,tt.* FROM $wpdb->terms AS t INNER JOIN $wpdb->term_taxonomy AS tt ON t.term_id = tt.term_id  WHERE t.slug = '$post_slug' ";

    # return  $wpdb->get_row($wpdb->prepare("SELECT *FROM $wpdb->terms WHERE slug = '$post_slug' LIMIT 1"),ARRAY_A);   

     return  $wpdb->get_row($wpdb->prepare("SELECT t.*,tt.* FROM $wpdb->terms AS t INNER JOIN $wpdb->term_taxonomy AS tt ON t.term_id = tt.term_id  WHERE t.slug = '$post_slug' "),ARRAY_A);   

}

function ar_getObjectsByName($post_name,$taxonomy,$content_type, $limit='*'){

   	global $wpdb;

    

    $limit=($limit=='*')?'': " LIMIT ".(int)$limit;

    #echo $post_name;

    $term_info=ar_getTermInfoBySlug($post_name);

    if(!$term_info){

    $term_info=ar_getTermInfoByName($post_name);    

    }

    

    #pre($term_info);

    

    #echo "<br/>SELECT tr.*,tt.* FROM $wpdb->term_relationships AS tr INNER JOIN $wpdb->term_taxonomy AS tt ON tr.term_taxonomy_id = tt.term_taxonomy_id  WHERE tt.term_id = '".$term_info['term_id']."' AND tt.taxonomy = '$taxonomy' AND tr.object_id in (select ID from $wpdb->posts where post_type='$content_type' and post_status ='publish' )$limit";

    return $wpdb->get_results($wpdb->prepare("SELECT tr.*,tt.* FROM $wpdb->term_relationships AS tr INNER JOIN $wpdb->term_taxonomy AS tt ON tr.term_taxonomy_id = tt.term_taxonomy_id  WHERE tt.term_id = '".$term_info['term_id']."' AND tt.taxonomy = '$taxonomy' AND tr.object_id in (select ID from $wpdb->posts where post_type='$content_type' and post_status ='publish' )$limit"));

}





function ar_show_taxonomy($pid,$taxonomy,$seperate=', '){

       

    return ar_show_post_taxonomy($pid,$taxonomy,$seperate);

}



function ar_show_post_taxonomy($pid,$taxonomy,$seperate=', ',$link=true){

    

    $taxonomies = wp_get_post_terms($pid , $taxonomy, '');

    $outputres ="";$output_res=array();

    if($taxonomies){

         foreach ($taxonomies as $term) {

          #  $output_res .= '<li>'.$term->slug.'</li>';

          if($link){

             $output_res[] = '<a href="' . esc_attr(get_term_link($term, $taxonomy)) . '" title="' . sprintf( __( "View all posts in %s" ), $term->name ) . '" ' . '>' . $term->name.'</a>';  

          }else{

            $output_res[] = $term->name;

          }

            

        }

        

        $outputres=implode($seperate,$output_res);

    }

    

    return $outputres;

}



function ar_get_all_terms_by_taxonomy($taxonomy,$limit=10,$output='object') {

	global $wpdb;

    $output = ($output=='object')?OBJECT:ARRAY_A;

	if (!$taxonomy)

		return false;

        

        

  # echo "SELECT t.*, tt.* FROM $wpdb->terms AS t INNER JOIN $wpdb->term_taxonomy AS tt ON t.term_id = tt.term_id WHERE tt.taxonomy = '$taxonomy' ORDER BY t.term_id ASC LIMIT $limit";

  return $wpdb->get_results($wpdb->prepare("SELECT t.*, tt.* FROM $wpdb->terms AS t INNER JOIN $wpdb->term_taxonomy AS tt ON t.term_id = tt.term_id WHERE tt.taxonomy = '$taxonomy' ORDER BY t.term_id ASC LIMIT $limit"),$output);   

 

 } 



function ar_get_terms_by_taxonomy($taxonomy,$limit=10,$parent='0', $output='object') {

	global $wpdb;

    $output = ($output=='object')?OBJECT:ARRAY_A;

	if (!$taxonomy)

		return false;

    if(!is_numeric($parent)) {

       $term_info=ar_getTermInfoByName($parent);

      $parent=$term_info['term_id'];

    }    

        

  #echo "SELECT t.*, tt.* FROM $wpdb->terms AS t INNER JOIN $wpdb->term_taxonomy AS tt ON t.term_id = tt.term_id WHERE tt.taxonomy = '$taxonomy' AND tt.parent = '$parent'  LIMIT $limit";

  return $wpdb->get_results($wpdb->prepare("SELECT t.*, tt.* FROM $wpdb->terms AS t INNER JOIN $wpdb->term_taxonomy AS tt ON t.term_id = tt.term_id WHERE tt.taxonomy = '$taxonomy' AND tt.parent = '$parent'  LIMIT $limit"),$output);   

 

 } 





 

function ar_showall_from_taxonomy($taxonomy,$limit=10,$seperator="side-list-item"){

    

  $outputres="";

$staxonomy=$taxonomy;

    $taxonomy_res = ar_get_terms_by_taxonomy($taxonomy,$limit);

                            if($taxonomy_res){ 

                                $class=($ul_css_class)?' class="'.$ul_css_class.'"':'';

                                $output_res= '<ul'.$class.'>';

                                foreach ($taxonomy_res as $sterm) {

                                  $t_link=esc_attr(get_term_link($sterm, $staxonomy));  

                                  $t_name=$sterm->name; 

                                  $t_slug=$sterm->slug;

                                  $sterm_sel=($visited_taxonomy==$t_slug)?" selected='selected'":"";

                                   $output_res .= '<li><a href="' .$t_link. '" >' . $t_name .'</a></li>'."\n";

                                }

                                $output_res .=  '</ul>'."\n";

                                $outputres=$output_res;                               

                            } 

    

    return $outputres;

}



#eof taxonomy





#bof category

/**

 * return as a object

 */ 

 

function ar_getCategoryInfo($cat_id){

    return $cat_info = get_term_by('term_id', $cat_id,'category' );

}





function ar_getPostCategories($post_id, $seperator=', ',$array_output=false){

    

    $catNames=array();  

	$category_ids = ar_get_category_ids_from_post_id( $post_id ); 

    if($category_ids){

      	foreach($category_ids as  $cat_id){ 

	  	   $cat_info = ar_getCategoryInfo($cat_id);

		  $catNames []= '<a href="'.get_category_link($cat_id).'">'.$cat_info->name.'</a>';

		}  

    }

   if($output_array) return $catNames;

    

   $catNames=implode($seperator,$catNames);  

   return $catNames;

}



function ar_get_category_ids_from_post_id($post_id,$output='array'){

	global $wpdb;



	$cat_ids=array();

	$output = ($output=='object')?OBJECT:ARRAY_A;

	$categories=$wpdb->get_results($wpdb->prepare("SELECT DISTINCT term_taxonomy_id FROM $wpdb->term_relationships WHERE object_id=$post_id"),$output);   

	if($categories){

		foreach($categories as $c){

			$cat_ids[]=$c['term_taxonomy_id'];

		}

	}

	return $cat_ids; 

}



if(!function_exists('ar_get_highest_rated_by_category')) {

	function ar_get_highest_rated_by_category($cat_id, $limit = 10, $mode = '', $min_votes = 0, $chars = 0, $display = false) {

		global $wpdb, $post;

		$temp_post = $post;

		$ratings_max = intval(get_option('postratings_max'));

		$ratings_custom = intval(get_option('postratings_customrating'));

		$output = '';

		if(!empty($mode) && $mode != 'both') {

			$where = "$wpdb->posts.post_type = '$mode'";

		} else {

			$where = '1=1';

		}

		if($ratings_custom && $ratings_max == 2) {

			$order_by = 'ratings_score';

		} else {

			$order_by = 'ratings_average';

		}

		$temp = stripslashes(get_option('postratings_template_highestrated'));

		$highest_rated = $wpdb->get_results("SELECT DISTINCT $wpdb->posts.*, (t1.meta_value+0.00) AS ratings_average, (t2.meta_value+0.00) AS ratings_users, (t3.meta_value+0.00) AS ratings_score FROM $wpdb->posts LEFT JOIN $wpdb->postmeta AS t1 ON t1.post_id = $wpdb->posts.ID LEFT JOIN $wpdb->postmeta As t2 ON t1.post_id = t2.post_id LEFT JOIN $wpdb->postmeta AS t3 ON t3.post_id = $wpdb->posts.ID WHERE t1.meta_key = 'ratings_average' AND t2.meta_key = 'ratings_users' AND t3.meta_key = 'ratings_score' AND $wpdb->posts.post_password = '' AND $wpdb->posts.post_date < '".current_time('mysql')."' AND $wpdb->posts.post_status = 'publish' AND t2.meta_value >= $min_votes AND $where ORDER BY $order_by DESC, ratings_users DESC LIMIT $limit");

		if($highest_rated) {

			foreach($highest_rated as $post) {

                $p_id=$post->ID;

                $post_cat_ids=ar_get_category_ids_from_post_id($p_id);

                $bar_cat_id=get_cat_id('Bars');

                if (in_array($bar_cat_id, $post_cat_ids)) {

                  	$output .= expand_ratings_template($temp, $post->ID, $post, $chars)."\n";

                }





			#	$output .= expand_ratings_template($temp, $post->ID, $post, $chars)."\n";

			}

		} else {

			$output = '<li>'.__('N/A', 'wp-postratings').'</li>'."\n";

		}

		$post = $temp_post;

		if($display) {

			echo $output;

		} else {

			return $output;

		}

	}

}



if(!function_exists('ar_get_highest_rated_post_by_category')) {

	function ar_get_highest_rated_post_by_category($cat_id, $limit = 10, $mode = '', $min_votes = 0, $chars = 0, $display = false) {

		global $wpdb, $post;



		$temp_post = $post;

		$ratings_max = intval(get_option('postratings_max'));

		$ratings_custom = intval(get_option('postratings_customrating'));

		

		$posts =array();

		if(!empty($mode) && $mode != 'both') {

			$where = "$wpdb->posts.post_type = '$mode'";

		} else {

			$where = '1=1';

		}

		if($ratings_custom && $ratings_max == 2) {

			$order_by = 'ratings_score';

		} else {

			$order_by = 'ratings_average';

		}

		$temp = stripslashes(get_option('postratings_template_highestrated'));

		$highest_rated = $wpdb->get_results("SELECT DISTINCT $wpdb->posts.*, (t1.meta_value+0.00) AS ratings_average, (t2.meta_value+0.00) AS ratings_users, (t3.meta_value+0.00) AS ratings_score FROM $wpdb->posts LEFT JOIN $wpdb->postmeta AS t1 ON t1.post_id = $wpdb->posts.ID LEFT JOIN $wpdb->postmeta As t2 ON t1.post_id = t2.post_id LEFT JOIN $wpdb->postmeta AS t3 ON t3.post_id = $wpdb->posts.ID WHERE t1.meta_key = 'ratings_average' AND t2.meta_key = 'ratings_users' AND t3.meta_key = 'ratings_score' AND $wpdb->posts.post_password = '' AND $wpdb->posts.post_date < '".current_time('mysql')."' AND $wpdb->posts.post_status = 'publish' AND t2.meta_value >= $min_votes AND $where ORDER BY $order_by DESC, ratings_users DESC LIMIT $limit");

		if($highest_rated) {

			foreach($highest_rated as $post) {

                $p_id=$post->ID;

                $post_cat_ids=ar_get_category_ids_from_post_id($p_id);

                $bar_cat_id=get_cat_id('Bars');

                if (in_array($bar_cat_id, $post_cat_ids)) {

                  	#$output .= expand_ratings_template($temp, $post->ID, $post, $chars)."\n";

					$posts[]=getPostInfo($post->ID);

                }





			#	$output .= expand_ratings_template($temp, $post->ID, $post, $chars)."\n";

			}

		}





		return $posts;

	}

}





function ar_wplogout($cus_redirect='home'){



$_SESSION['step_one_done']='' ;

$_SESSION['step_two_done']='' ;

$_SESSION['step_three_done']='' ;

$_SESSION['step_one_data']='' ;

$_SESSION['step_two_data']='' ;

$_SESSION['step_three_data']='' ;

$_SESSION['host_dinner_id']='' ;

$_SESSION['search_city']='' ;



 

wp_clear_auth_cookie();

do_action('wp_logout');









$fbapi=get_option(FBC_APP_KEY_OPTION);

if($fbapi){

    unset($_COOKIE['ci_session']);

    unset($_COOKIE['__utma_a2a']);

    unset($_COOKIE['base_domain_'.$fbapi]);

    unset($_COOKIE[$fbapi]);

    unset($_COOKIE[$fbapi.'_user']);

    unset($_COOKIE[$fbapi.'_ss']);

    unset($_COOKIE[$fbapi.'_session_key']);

    unset($_COOKIE[$fbapi.'_expires']);

    unset($_COOKIE['fbsetting_'.$fbapi]);     

}



if($cus_redirect !='home'){

 urlredirect(home_url( '/' ).$cus_redirect);      

} 

 urlredirect(home_url( '/' ));exit;   

}



function ar_time_ago($post,$out_put=false){

          

        $datetime=is_object($post)?$post->post_date:$post;

        if(is_object($post)){

          $datetime=  $post->post_date;

        }elseif(is_object($post)){

            $datetime=  $post['post_date'];

        }else{

          $datetime= $post; 

        }

       

         $seconds = time() - strtotime($datetime);

         $time_minute = $seconds/60;

         if( $time_minute >= 1){

             $time = (int)($time_minute);

             $unit =  ($time >= 2)? "minutes": "minute";

            

             $time_hour = $time_minute/60;

              if($time_hour >= 1){

                 $time = (int)($time_hour);

                 $unit =  ($time >= 2)? "hours": "hour";

                

                $time_day = $time_hour/24;

                if( $time_day >= 1){

                     $time = (int)($time_day);

                     $unit =  ($time >= 2)? "days": "day";

                    

                    $time_month = $time_day/30;

                    if( $time_month >= 1){

                         $time = (int)($time_month);

                         $unit =  ($time >= 2)? "months": "month";

                        

                         $time_year = $time_month/12;

                         if($time_year >= 1){

                          $time = 1;   

                          $unit = "year(or more)";

                         }//end year

                     }//end month

                }//end day

            }//end hour

         }//end minutes

        else{

         $time = $seconds;

         $unit = 'seconds';

        }



     $time_ago= $time." ".$unit ." ago" ;

   

    if($out_put){

        echo $time_ago;

    }else{

        return $time_ago;

    }

 }

 

 

 function ar_time_after($date_time,$out_put=false){

          

       

         $seconds =strtotime($date_time)- time();

          $time_minute = $seconds/60;

         if( $time_minute >= 1){

             $time = (int)($time_minute);

             $unit =  ($time >= 2)? "minutes": "minute";

            

             $time_hour = $time_minute/60;

              if($time_hour >= 1){

                 $time = (int)($time_hour);

                 $unit =  ($time >= 2)? "hours": "hour";

                

                $time_day = $time_hour/24;

                if( $time_day >= 1){

                     $time = (int)($time_day);

                     $unit =  ($time >= 2)? "days": "day";

                    

                    $time_month = $time_day/30;

                    if( $time_month >= 1){

                         $time = (int)($time_month);

                         $unit =  ($time >= 2)? "months": "month";

                        

                         $time_year = $time_month/12;

                         if($time_year >= 1){

                          $time = 1;   

                          $unit = "year(or more)";

                         }//end year

                     }//end month

                }//end day

            }//end hour

         }//end minutes

        else{

         $time = $seconds;

         $unit = 'seconds';

        }



     $time_ago= "After ".$time." ".$unit;

   

    if($out_put){

        echo $time_ago;

    }else{

        return $time_ago;

    }

 }

#



/**eof ALL ABOUT COMMENTS**/

function pre($value){ echo '<pre>'; print_r($value);echo '</pre>';}

function ar_valid_email($email_address){ return ( ! preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $email_address)) ? false : true; }

function base64UrlEncode($url){return urlencode(base64_encode($url));}

function base64UrlDecode($url){return base64_decode(urldecode($url));}

function ar_exact_content($content) {

	$content = apply_filters('the_content', $content);

	$content = str_replace(']]>', ']]&gt;', $content);

	return $content;

}

function urlredirect($url=false){header("Location: ".$url);exit;}

function trunck_string($str = "", $len = 150, $more = 'true') {



    if ($str == "") return $str;

    if (is_array($str)) return $str;

    $str = strip_tags($str);	

    $str = trim($str);

    // if it's les than the size given, then return it



    if (strlen($str) <= $len) return $str;



    // else get that size of text

    $str = substr($str, 0, $len);

    // backtrack to the end of a word

    if ($str != "") {

      // check to see if there are any spaces left

      if (!substr_count($str , " ")) {

        if ($more == 'true') $str .= "...";

        return $str;

      }

      // backtrack

      while(strlen($str) && ($str[strlen($str)-1] != " ")) {

        $str = substr($str, 0, -1);

      }

      $str = substr($str, 0, -1);

      if ($more == 'true') $str .= "...";

      if ($more != 'true' and $more != 'false') $str .= $more;

    }

    return $str;

}







function get_country_flag($cn_name){

$country_list_with_twochr= twochr_countrylist();   

 $image_name=$country_list_with_twochr[$cn_name];

return $image_name=bloginfo('template_url').'/images/flags/'.$image_name.'.gif';

 

}





/*****bof post get*****/

function ar_db_prepare_input($string){

    if (is_string($string)) {

      return trim(stripslashes($string));

    } elseif (is_array($string)) {

      reset($string);

      while (list($key, $value) = each($string)) {

        $string[$key] = ar_db_prepare_input($value);

      }

      return $string;

    } else {

      return $string;

    }

}

function ar_fetch_from_array(&$array, $index = ''){

	if ( ! isset($array[$index])){

		return false;

	}

	return trim(stripslashes($array[$index]));

}

function ar_get($index = ''){

		return ar_fetch_from_array($_GET, $index);

}



function ar_post($index = ''){

		return ar_fetch_from_array($_POST, $index);

}

	

function ar_get_post($index = ''){		

    if ( ! isset($_POST[$index]) ){

			return ar_get($index);

		}else{

			return ar_post($index);

		}		

}



/**

 * Determine if a post exists based on title, content, and date

 *

 * @since unknown

 *

 * @param string $title Post title

 * @param string $content Optional post content

 * @param string $date Optional post date

 * @return int Post ID if post exists, 0 otherwise.

 */

function ar_post_exists($title, $content = '', $date = '') {

	global $wpdb;



	$post_title = stripslashes( sanitize_post_field( 'post_title', $title, 0, 'db' ) );

	$post_content = stripslashes( sanitize_post_field( 'post_content', $content, 0, 'db' ) );

	$post_date = stripslashes( sanitize_post_field( 'post_date', $date, 0, 'db' ) );



	$query = "SELECT ID FROM $wpdb->posts WHERE 1=1";

	$args = array();



	if ( !empty ( $date ) ) {

		$query .= ' AND post_date = %s';

		$args[] = $post_date;

	}



	if ( !empty ( $title ) ) {

		$query .= ' AND post_title = %s';

		$args[] = $post_title;

	}



	if ( !empty ( $content ) ) {

		$query .= 'AND post_content = %s';

		$args[] = $post_content;

	}



	if ( !empty ( $args ) )

		return $wpdb->get_var( $wpdb->prepare($query, $args) );



	return 0;

}

    

/*****eof post get*****/



function ar_country(){

    

   return $country=array_keys(twochr_countrylist());

}





function SelBoxCountries($country_name =false){

    $ar_countries=ar_country();

    $countries='<select name="country" class="input_share">';

    $countries .='<option value=""> select country </option>'."\n";

    foreach($ar_countries as   $k => $country ){

        $sel = ($country_name == $country)?' selected="selected"':'';

        $countries .='<option value="'.$country.'"'.$sel.'>'.$country.'</option>'."\n";

        

    }

    $countries .='</select>'."\n";

    

    return $countries;

}







function twochr_countrylist(){

    

return $country_list_with_twochr=array('Afghanistan' =>'af',

'Aland Islands' =>'ax',

'Albania' =>'al',

'Algeria' =>'dz',

'American Samoa' =>'as',

'Andorra' =>'ad',

'Angola' =>'ao',

'Anguilla' =>'ai',

'Antarctica' =>'aq',

'Antigua And Barbuda' =>'ag',

'Argentina' =>'ar',

'Armenia' =>'am',

'Aruba' =>'aw',

'Australia' =>'au',

'Austria' =>'at',

'Azerbaijan' =>'az',

'Bahamas' =>'bs',

'Bahrain' =>'bh',

'Bangladesh' =>'bd',

'Barbados' =>'bb',

'Belarus' =>'by',

'Belgium' =>'be',

'Belize' =>'bz',

'Benin' =>'bj',

'Bermuda' =>'bm',

'Bhutan' =>'bt',

'Bolivia, Plurinational State Of' =>'bo',

'Bosnia And Herzegovina' =>'ba',

'Botswana' =>'bw',

'Bouvet Island' =>'bv',

'Brazil' =>'br',

'British Indian Ocean Territory' =>'io',

'Brunei Darussalam' =>'bn',

'Bulgaria' =>'bg',

'Burkina Faso' =>'bf',

'Burundi' =>'bi',

'Cambodia' =>'kh',

'Cameroon' =>'cm',

'Canada' =>'ca',

'Cape Verde' =>'cv',

'Cayman Islands' =>'ky',

'Central African Republic' =>'cf',

'Chad' =>'td',

'Chile' =>'cl',

'China' =>'cn',

'Christmas Island' =>'cx',

'Cocos (keeling) Islands' =>'cc',

'Colombia' =>'co',

'Comoros' =>'km',

'Congo' =>'cg',

'Congo, The Democratic Republic Of The' =>'cd',

'Cook Islands' =>'ck',

'Costa Rica' =>'cr',

'Cate D\'ivoire' =>'ci',

'Croatia' =>'hr',

'Cuba' =>'cu',

'Cyprus' =>'cy',

'Czech Republic' =>'cz',

'Denmark' =>'dk',

'Djibouti' =>'dj',

'Dominica' =>'dm',

'Dominican Republic' =>'do',

'Ecuador' =>'ec',

'Egypt' =>'eg',

'El Salvador' =>'sv',

'Equatorial Guinea' =>'gq',

'Eritrea' =>'er',

'Estonia' =>'ee',

'Ethiopia' =>'et',

'Falkland Islands (malvinas)' =>'fk',

'Faroe Islands' =>'fo',

'Fiji' =>'fj',

'Finland' =>'fi',

'France' =>'fr',

'French Guiana' =>'gf',

'French Polynesia' =>'pf',

'French Southern Territories' =>'tf',

'Gabon' =>'ga',

'Gambia' =>'gm',

'Georgia' =>'ge',

'Germany' =>'de',

'Ghana' =>'gh',

'Gibraltar' =>'gi',

'Greece' =>'gr',

'Greenland' =>'gl',

'Grenada' =>'gd',

'Guadeloupe' =>'gp',

'Guam' =>'gu',

'Guatemala' =>'gt',

'Guernsey' =>'gg',

'Guinea' =>'gn',

'Guinea-bissau' =>'gw',

'Guyana' =>'gy',

'Haiti' =>'ht',

'Heard Island And Mcdonald Islands' =>'hm',

'Holy See (vatican City State)' =>'va',

'Honduras' =>'hn',

'Hong Kong' =>'hk',

'Hungary' =>'hu',

'Iceland' =>'is',

'India' =>'in',

'Indonesia' =>'id',

'Iran, Islamic Republic Of' =>'ir',

'Iraq' =>'iq',

'Ireland' =>'ie',

'Isle Of Man' =>'im',

'Israel' =>'il',

'Italy' =>'it',

'Jamaica' =>'jm',

'Japan' =>'jp',

'Jersey' =>'je',

'Jordan' =>'jo',

'Kazakhstan' =>'kz',

'Kenya' =>'ke',

'Kiribati' =>'ki',

'Korea, Democratic People\'s Republic Of' =>'kp',

'Korea, Republic Of' =>'kr',

'Kuwait' =>'kw',

'Kyrgyzstan' =>'kg',

'Lao People\'s Democratic Republic' =>'la',

'Latvia' =>'lv',

'Lebanon' =>'lb',

'Lesotho' =>'ls',

'Liberia' =>'lr',

'Libyan Arab Jamahiriya' =>'ly',

'Liechtenstein' =>'li',

'Lithuania' =>'lt',

'Luxembourg' =>'lu',

'Macao' =>'mo',

'Macedonia, The Former Yugoslav Republic Of' =>'mk',

'Madagascar' =>'mg',

'Malawi' =>'mw',

'Malaysia' =>'my',

'Maldives' =>'mv',

'Mali' =>'ml',

'Malta' =>'mt',

'Marshall Islands' =>'mh',

'Martinique' =>'mq',

'Mauritania' =>'mr',

'Mauritius' =>'mu',

'Mayotte' =>'yt',

'Mexico' =>'mx',

'Micronesia, Federated States Of' =>'fm',

'Moldova, Republic Of' =>'md',

'Monaco' =>'mc',

'Mongolia' =>'mn',

'Montenegro' =>'me',

'Montserrat' =>'ms',

'Morocco' =>'ma',

'Mozambique' =>'mz',

'Myanmar' =>'mm',

'Namibia' =>'na',

'Nauru' =>'nr',

'Nepal' =>'np',

'Netherlands' =>'nl',

'Netherlands Antilles' =>'an',

'New Caledonia' =>'nc',

'New Zealand' =>'nz',

'Nicaragua' =>'ni',

'Niger' =>'ne',

'Nigeria' =>'ng',

'Niue' =>'nu',

'Norfolk Island' =>'nf',

'Northern Mariana Islands' =>'mp',

'Norway' =>'no',

'Oman' =>'om',

'Pakistan' =>'pk',

'Palau' =>'pw',

'Palestinian Territory, Occupied' =>'ps',

'Panama' =>'pa',

'Papua New Guinea' =>'pg',

'Paraguay' =>'py',

'Peru' =>'pe',

'Philippines' =>'ph',

'Pitcairn' =>'pn',

'Poland' =>'pl',

'Portugal' =>'pt',

'Puerto Rico' =>'pr',

'Qatar' =>'qa',

'Runion' =>'re',

'Romania' =>'ro',

'Russian Federation' =>'ru',

'Rwanda' =>'rw',

'Saint Barthlemy' =>'bl',

'Saint Helena, Ascension And Tristan Da Cunha' =>'sh',

'Saint Kitts And Nevis' =>'kn',

'Saint Lucia' =>'lc',

'Saint Martin' =>'mf',

'Saint Pierre And Miquelon' =>'pm',

'Saint Vincent And The Grenadines' =>'vc',

'Samoa' =>'ws',

'San Marino' =>'sm',

'Sao Tome And Principe' =>'st',

'Saudi Arabia' =>'sa',

'Senegal' =>'sn',

'Serbia' =>'rs',

'Seychelles' =>'sc',

'Sierra Leone' =>'sl',

'Singapore' =>'sg',

'Slovakia' =>'sk',

'Slovenia' =>'si',

'Solomon Islands' =>'sb',

'Somalia' =>'so',

'South Africa' =>'za',

'South Georgia And The South Sandwich Islands' =>'gs',

'Spain' =>'es',

'Sri Lanka' =>'lk',

'Sudan' =>'sd',

'Suriname' =>'sr',

'Svalbard And Jan Mayen' =>'sj',

'Swaziland' =>'sz',

'Sweden' =>'se',

'Switzerland' =>'ch',

'Syrian Arab Republic' =>'sy',

'Taiwan, Province Of China' =>'tw',

'Tajikistan' =>'tj',

'Tanzania, United Republic Of' =>'tz',

'Thailand' =>'th',

'Timor-leste' =>'tl',

'Togo' =>'tg',

'Tokelau' =>'tk',

'Tonga' =>'to',

'Trinidad And Tobago' =>'tt',

'Tunisia' =>'tn',

'Turkey' =>'tr',

'Turkmenistan' =>'tm',

'Turks And Caicos Islands' =>'tc',

'Tuvalu' =>'tv',

'Uganda' =>'ug',

'Ukraine' =>'ua',

'United Arab Emirates' =>'ae',

'United Kingdom' =>'gb',

'United States' =>'us',

'United States Minor Outlying Islands' =>'um',

'Uruguay' =>'uy',

'Uzbekistan' =>'uz',

'Vanuatu' =>'vu',

'Vatican City State' =>'see holy see',

'Venezuela, Bolivarian Republic Of' =>'ve',

'Viet Nam' =>'vn',

'Virgin Islands, British' =>'vg',

'Virgin Islands, U.s.' =>'vi',

'Wallis And Futuna' =>'wf',

'Western Sahara' =>'eh',

'Yemen' =>'ye',

'Zambia' =>'zm',

'Zimbabwe' =>'zw',

);



}

define('CURRENT_URL' , 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);

//echo CURRENT_URL;









/**bof ALL ABOUT COMMENTS**/ 

function get_most_recent_comments($no_comments = 3, $comment_lenth = 7, $before = '<li>', $after = '</li>', $show_pass_post = false, $comment_style = 0, $hide_pingbacks_trackbacks = false) {

	global $wpdb;

	$most_recent_comments = wp_cache_get('get_most_recent_comments');

	

	if ( false === $most_recent_comments ) {

		$request = "SELECT ID, comment_ID, comment_content, comment_author,date(`comment_date`) as comment_date, comment_author_url, post_title FROM $wpdb->comments LEFT JOIN $wpdb->posts ON $wpdb->posts.ID=$wpdb->comments.comment_post_ID WHERE post_status IN ('publish','static') ";

		if( !$show_pass_post ) $request .= "AND post_password ='' ";

		if ( $hide_pingbacks_trackbacks ) $request .= "AND comment_type='' ";

		$request .= "AND comment_approved = '1' ORDER BY comment_ID DESC LIMIT $no_comments"; 

		$comments = $wpdb->get_results($request); 

		$output = '';



		if ( $comments ) {

			$idx = 0;

			foreach ($comments as $comment) {

				$comment_author = stripslashes($comment->comment_author);

                $comment_date = stripslashes($comment->comment_date);

                

				if ($comment_author == "")

					$comment_author = "anonymous"; 

    				$comment_content = strip_tags($comment->comment_content);

    				$comment_content = stripslashes($comment_content);

    				$words = split(" ", $comment_content);  

					//$content_com = trunck_string($words,90,true); 

    				$comment_excerpt = join(" ", array_slice($words, 0, $comment_lenth));

    				$permalink = get_permalink($comment->ID) . "#comment-" . $comment->comment_ID; 

					$post_title = stripslashes($comment->post_title);

				 

					$post_id= stripslashes($comment->post_id);

					$url = $comment->comment_author_url; 

                    $output.='<li>'.$comment_excerpt.'<br /><span>Posted by:'.$comment_author.'</span></li>';

				

			}



			$output = convert_smilies($output);

		} else {

			$output .= $before . "None found" . $after;

		}



		$most_recent_comments = $output;

		wp_cache_set('get_most_recent_comments', $most_recent_comments);

	}



	return $most_recent_comments;

}



