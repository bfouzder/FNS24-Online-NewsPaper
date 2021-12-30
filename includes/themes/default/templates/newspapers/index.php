 <?//=include('/home/fns24bangla/public_html/includes/themes/default/templates/newspapers/newspaper_menu.php');?>
 <nav class="navbar head-block">
	<div class="navbar-header">
		<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse2" aria-expanded="false">
			<span class="sr-only">Newspaper</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</button>
	</div>
	<div class="collapse navbar-collapse" id="navbar-collapse2">
		<ul class="nav navbar-nav">
		<li>
		<a href="<?=SCRIPT_URL?>newspapers/"><i calss="fa fa-home"></i> HOME </a></li>
		
		<?php 	
			$mmenu_rows = $db->select("select * from np_menuname where status=1 AND menu_id > 8 and parent=0 ORDER BY Priority");
			if($mmenu_rows){
				foreach($mmenu_rows as $key => $mcat_info){	
				$mcat_url= SCRIPT_URL.'newspapers/category/'.$mcat_info['menu_id'].'/'.$mcat_info['menuname'].'/';	
				$active_sel=(strpos(CURRENT_URL,'/'.$mcat_info['menu_id'].'/' ) !==false)?' class="active"':'';
				echo '<li'.$active_sel.'><a href="'.$mcat_url.'">'.strtoupper($mcat_info['menuname']).'</a></li>'."\n";   
				}
			}
			?>

			<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">OTHERS <span class="caret"></span></a>
				<ul class="dropdown-menu multi-level" role="menu" aria-labelledby="dropdownMenu">
			<?php 	
			$mmenu_rows2 = $db->select("select * from np_menuname where status=1 AND menu_id <= 8 and parent=0 ORDER BY Priority");
			if($mmenu_rows2){
				foreach($mmenu_rows2 as $key => $mcat_info){	
				$mcat_url= SCRIPT_URL.'newspapers/category/'.$mcat_info['menu_id'].'/'.$mcat_info['menuname'].'/';	
				$active_sel=(strpos(CURRENT_URL,'/'.$mcat_info['menu_id'].'/' ) !==false)?' class="active"':'';
				echo '<li'.$active_sel.'><a href="'.$mcat_url.'">'.$mcat_info['menuname'].'</a></li>'."\n";   
				}
			}
			?>
			</ul>
		</li>
		<li><a href="<?=SCRIPT_URL?>newspapers/adnewspaper" class="fancybox fancybox.iframe">ADD YOUR NEWSPAPER</a></li>
		</ul>
	</div>
</nav>
 <style>
  .bs-component {
    background: #fff;
    padding: 20px;
    border: 1px solid #c2c2c2;
}
.allbanglanewspaperslogo {
    margin-bottom: 20px;
}
.allbanglanewspaperslogo img {
    min-height: 61px;
    border: 1px solid #ccc;
    padding: 5px;
    object-fit: initial;
    width: 100%;
    height: 61px;
}
.banglanewspaperlistname {
    padding: 3px;
    border: 1px solid #c2c2c2;     
    border-top: 0;
    text-align: center;
    font-family: Verdana,Arial,Helvetica,sans-serif;
    font-size: 9px;
}
.section-block {
    margin-top: 15px;
    padding-bottom: 10px;
}

.page-header {
    padding-bottom: 9px;
    border-bottom: 1px solid #eee;
     margin: 5px 0 5px !important;
}
.page-header h2, h2#bangla {
    font-size: 20px;
    border-left: 5px solid;
    padding: 6px 0 6px 10px;
    color: #156690;
    text-shadow: 0 1px #fffbf;
    font-weight: 600;
    text-transform: uppercase;
}
.page-header h2 a{
    color: #156690;
}
.page-header h2 a:hover{
    color: #ff0000;
}
#navbar-collapse2 li a{font-size:13px !important;}
  </style>
  <div class="" style="height: auto !important;">
 <!---bof AR Loop--> 
  <?php  
$all_menus = $db->select("SELECT * FROM `np_menuname` where menu_id!='0' ORDER BY `menu_id` ASC  LIMIT 0 , 1000  ");
if($all_menus){
		foreach ($all_menus as $menu_info) {
			$menu_id=$menu_info['menu_id'];
			$menu_name=$menu_info['menuname'];
?>
	<?php  
				$all_news = $db->select("SELECT * FROM `np_news` where paper_id >'0' && categories='$menu_id'  ORDER BY `serial` ASC  LIMIT 0 , 30  ");
				if($all_news){?>
<section class="section-block section-flex clearfix">
		 <div class="page-header"><h2><a href="<?=SCRIPT_URL?>newspapers/category/<?=$menu_id?>/<?=$menu_name?>/" id="bangla_<?=$menu_id?>"><?=$menu_name?></a></h2></div>
			<div class="row">
				<?php
					foreach ($all_news as $news_info) {
						$news_picture=$news_info['addpicture'];
						$news_picture_url=SCRIPT_URL."allnewspaper/admin/newspicture/$news_picture";
						$paper_name=$news_info['paper_name'];
						$paper_url=$news_info['newstitle'];
					?>
						
					<div class='col-lg-2 col-md-2 col-sm-3 col-xs-6 allbanglanewspaperslogo'> 
						<a href="<?=$paper_url?>" target='_blank' rel='noopener nofollow'><img src="<?=$news_picture_url?>" alt="<?=$news_picture?>" title="<?=$news_picture?>"></a>
						<div class='banglanewspaperlistname'><?=$paper_name?></div> 
					</div>
					<?php	  
					}
				?>
			</div> 
			<div class="clearfix">
			<a href="<?=SCRIPT_URL?>newspapers/category/<?=$menu_id?>/<?=$menu_name?>/" class="btn-link">More Newsportal</a></div>
</section>

<?php
}}}
?>
  <!---/eof AR Loop-->   
</div>