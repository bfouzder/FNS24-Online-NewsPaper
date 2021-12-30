<?php
$album_html='';
if($album_lists){
	foreach($album_lists as $k=> $album_info){
		
		$album_title= $album_info['album_title'];
		$album_cover= $album_info['fec_image'];
		$album_date= $album_info['created'];
		$reporter= $album_info['reporter'];
		$album_url= SCRIPT_URL.'imagemanager/viewAlbum/'.$album_info['album_id'].'/'.$album_title;
		
	
$album_html .='<div class="col-xs-12 col-sm-3 col-md-3">
	<div class="gl-box">
		<a href="'.$album_url.'"><img src="'.$album_cover.'" alt="" height="100"></a>
		<h4><a href="'.$album_url.'">'.$album_title.'</a></h4>
		<div class="meta-info">
			'.date_time($album_date, false).',  ছবি: '.$reporter.'
		</div>
	</div>
</div>'."\n";
	}
}
?>
<article class="gallery-main-block">
<div class="view-block">
	<ul>
		<li><a href="#"><i class="fa fa-th"></i> Grid View</a></li>
		<li><a href="#"><i class="fa fa-list"></i> List View</a></li>
	</ul>
</div>
<div class="row">
<?=$album_html?>
</div>


<div class="page-nav-area clearfix">
	<?php include(TEMPLATE_STORE.'pagination_all.php');?>
</div>
</article>
       
