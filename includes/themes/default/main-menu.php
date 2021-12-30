<nav class="navbar head-block">
	<div class="navbar-header">
		<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false">
			<span class="sr-only">Navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</button>
	</div>
	<div class="collapse navbar-collapse" id="navbar-collapse">
		<ul class="nav nav-justified">
			<li class="active"><a href="<?=SCRIPT_URL?>">প্রচ্ছদ</a></li>
<?php if(state('CE_admin')){ ?>
		 <li class="active"><a href="<?=SCRIPT_URL?>imagemanager">Dashboard</a></li>		
 <?php } ?>		
<?php 
$menu_rows $db->select("SELECT * FROM image_categories WHERE active=1");
if($menu_rows){
	foreach($menu_rows as $key => $menu_info){	
	$album_cat_url= SCRIPT_URL.'imagemanager/albums/'.$menu_info['seo_title'];	
	$album_cats_html ='<li><a href="'.$album_cat_url.'">'.$menu_info['menu_text'].'</a></li>'."\n";	
	}
}
?>
			
		</ul>
	</div>
</nav>