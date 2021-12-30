<?php

$album_id= $album_info['album_id'];
$album_title= $album_info['album_title'];

$album_categories= explode(",",$album_info['cat_id']);

$album_description= $album_info['description'];
$album_cover= $album_info['fec_image'];
$album_date= $album_info['created'];
$reporter= $album_info['reporter'];
$album_url= SCRIPT_URL.'viewAlbum/'.$album_info['album_id'].'/'.$album_title;

//$album_images=getImages($ImageType='image_albums',$album_id);
$album_html='';
if($album_images){
	foreach($album_images as $k=> $image_info){
		
$image_caption= $image_info['image_caption'];
$image_url= $image_info['image_path'];

$active_class=($k == 0)?' active':'';
		$album_html .='<div class="item'.$active_class.'">
							<img src="'.$image_url.'" alt=""  width="100%">
							<div class="carousel-caption">
								<a href="#">'.$image_caption.'</a>
							</div>
						</div>'."\n";
	}
}
?>
<article class="gallery-main-block">
	<section class="section-block clearfix">
		<div class="row">
			<div class="col-xs-12 col-sm-8 col-md-9">
				<div class="title-head clearfix">
					<h1><?=$album_title?></h1>
					<small><?=ar_FormatDateEn2Bn($album_date, false).',  ছবি: '.$reporter?></small>
					
					<a href="<?=SCRIPT_URL.$this->controller.'/editAlbumList/'.$album_id?>"> <button class="btn btn-danger btn-xs"><i class="fa fa-check-circle"></i>Edit</button></a>
				</div>
				<div id="gallery-main-slider" class="carousel slide" data-ride="carousel">
					<ol class="carousel-indicators">
						<li data-target="#gallery-main-slider" data-slide-to="0" class="active"></li>
					</ol>
					<div class="carousel-inner" role="listbox">
						<?=$album_html?>						
					</div>


					<a class="left carousel-control" href="#gallery-main-slider" role="button" data-slide="prev">
						<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
						<span class="sr-only">Previous</span>
					</a>
					<a class="right carousel-control" href="#gallery-main-slider" role="button" data-slide="next">
						<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
						<span class="sr-only">Next</span>
					</a>
				</div>
				
				<div class="description">
					<p><?=$album_description?></p>
				</div>
				<div class="page-nav-area clearfix">
						<?php include(TEMPLATE_STORE.'pagination_all.php');?>
				</div>
			</div>

			<div class="col-xs-12 col-sm-4 col-md-3">
				<div class="adv-block-details"><img src="<?php echo GET_TEMPLATE_DIRECTORY_URI; ?>/images/ad-31.jpg" alt=""></div>
			</div>
		</div>
	</section>
	
    <!--<div class="adv-top"><a href="#"><img src="<?php echo GET_TEMPLATE_DIRECTORY_URI; ?>/images/adv22.png" alt=""></a></div>-->
  <?php 
  
  $photo_categories=$db->select("SELECT * FROM image_categories WHERE  active=1 AND `parent`='0' ORDER BY menu_order limit 5");
  if($photo_categories){
    $list_html ='';
    $content_html ='';
    foreach($photo_categories as $k=> $photoCatInfo){
        $photo_cat_id=$photoCatInfo['cat_id'];
        $photo_cat_name=$photoCatInfo['menu_text'];
        $cls_active='';$class_active='';
        if($k == 0){
            $cls_active=' active';
            $class_active=' class="active"';
        }
        $list_html .='<li role="presentation"'.$class_active.'><a href="#tab_'.$photo_cat_id.'" aria-controls="home" role="tab" data-toggle="tab">'.$photo_cat_name.'</a></li>'."\n";  
     $cat_albums=ar_getAlbumsbyCatId($photo_cat_id, $p_limit=8);
        $content_html .='	<div role="tabpanel" class="tab-pane'.$cls_active.'" id="tab_'.$photo_cat_id.'">
				<div class="row">'.$cat_albums.'</div>
			</div>'."\n";
    }
    
  echo  $catalbumsTabhtml='<div class="story-list-block">
		<ul class="nav nav-tabs nav-justified" role="tablist">
        	'.$list_html.'
		</ul>
		<div class="tab-content">
			'.$content_html.'
		</div>
	</div>'."\n"; 
  }
  ?>  

</article>
 			
				
<!--bof All Images-->			
<?php
function ar_getAlbumsbyCatId($cat_id, $p_limit=8){
	global $db;
		if($cat_id){
		$sql_query="SELECT * FROM image_albums where cat_id like '%$cat_id%'";
		}else{
		$sql_query="SELECT * FROM image_albums";
		}
		
		$pages = make_pagination_all($sql_query,$page,$p_limit);
		$sql_query .= " ORDER BY album_id ";
		$sql_query .= " LIMIT ".$pages['start_form'].",".$pages['per_page'];
		echo $sql_query;
		$album_lists = $db->select($sql_query);
        pre($album_lists);
		
$album_html='';
if($album_lists){
	foreach($album_lists as $k=> $album_info){
		
		$album_title= $album_info['album_title'];
		
		$album_cover= $album_info['fec_image'];
		$album_cover=ar_timthumb_image($album_cover,298,208);
		
		$album_date= $album_info['created'];
		$reporter= $album_info['reporter'];
		$album_url= SCRIPT_URL.'siteadminpanel/viewAlbum/'.$album_info['album_id'].'/'.$album_title;

	
$album_html .='<div class="col-xs-12 col-sm-3 col-md-3">
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
return $album_html;
}
function ar_getAlbumImages($album_id){
	
	$album_all_images=getImages($ImageType='image_albums',$album_id);
	$album_all_html='';
	if($album_all_images){
		foreach($album_all_images as $k=> $image_info){			
		$image_caption= $image_info['image_caption'];
		$image_url= $image_info['image_path'];

			$album_all_html .='<div class="col-xs-12 col-sm-3 col-md-3">
					<a href="'.$album_url.'"><img src="'.$image_url.'" alt="" height="100"></a>
					<p>'.$image_caption.'</p>
			</div>'."\n";
		}
	}	
}

?>