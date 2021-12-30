<?php

$album_id= $album_info['album_id'];
$album_title= $album_info['album_title'];

$album_categories= explode(",",$album_info['cat_id']);

$album_description= $album_info['description'];
$album_cover= $album_info['fec_image'];
$album_date= $album_info['created'];
$reporter= $album_info['reporter'];
$album_url= SCRIPT_URL.'imagemanager/viewAlbum/'.$album_info['album_id'].'/'.$album_title;

//$album_images=getImages($ImageType='image_albums',$album_id);
$album_html='';
if($album_images){
	foreach($album_images as $k=> $image_info){
		
$image_caption= $image_info['image_caption'];
$image_url= $image_info['image_path'];


		$album_html .='<div class="col-xs-12 col-sm-8 col-md-8">
				<a href="'.$album_url.'"><img src="'.$image_url.'" alt=""  width="100%"></a>
				<p>'.$album_description.'::'.$image_caption.'</p>
		</div>'."\n";
	}
}
?>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-8">
		<div class="panel panel-primary">
			<div class="panel-heading">
			  <h3 class="panel-title"><?=$album_title?></h3>
			</div>
			<div class="panel-body">
			
				<div class="gl-main-news">
					<p><?=$album_description?></p>
					<div class="row">
						<?=$album_html?>
					</div>
					<div class="meta-info">
					<?=date_time($album_date, false).',  ছবি: '.$reporter?>
					</div>
					<?php include(TEMPLATE_STORE.'pagination_all.php');?>
				</div>
				
				
				
<!--bof All Images-->			
<?php
$album_cats_html='';
if($album_categories){
	foreach ($album_categories as $k=>$cat_name){
		$album_cat_url= SCRIPT_URL.'imagemanager/albums/'.$cat_name;	
		$album_cats_html .='<li>
				<a href="'.$album_cat_url.'">'.$cat_name.'</a>
		</li>'."\n";
	}
}


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
?>	

<h3>All Images of this album</h3>
<div class="row">
	<?=$album_all_html?>
</div>
<!--eof All Images-->				
				

			</div><!--panel-body-->
	  </div>
	</div>
	 <div class="col-xs-12 col-sm-12 col-md-4">
		<h3>Categories</h3>
		<ul><?php echo $album_cats_html;?></ul>
	</div>
</div><!--row-->
