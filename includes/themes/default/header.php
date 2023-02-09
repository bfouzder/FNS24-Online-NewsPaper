<?php include('header-common.php');
$dtTimeDifference=((6*60)*60);
?>
<div id="top-block">
  
    <header class="header"><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <div class="wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xs-12 col-sm-3 col-md-3">
                        <div class="brand-block">
                            <a href="<?=SCRIPT_URL?>"><img src="<?php echo GET_TEMPLATE_DIRECTORY_URI; ?>/images/logo.png" alt="Logo"></a>
                            <span class="meta-page"><?php include_once(CLASS_DIR."class.banglaDate.min.php");$bn=new BanglaDate(time());$bn->set_time(time(), 6);$date=$bn->get_date();$todayBDST=gmdate("l, d F Y, ", time()+$dtTimeDifference);$dateEng=$bn->fFormatDate($todayBDST);echo $dateEng;echo $date[0]."&nbsp;".$date[1]."&nbsp;".$date[2]; ?></span>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-7 col-md-7">
                        <div class="head-nav-block">
                            <ul class="nav nav-justified ">
                                <li><a href="<?=SCRIPT_URL?>banglaconverter/" target="_blank">Bangla Converter</a></li>
                                 <li><a href="<?=SCRIPT_URL?>publicnews">Public News</a></li>
                                <li><a href="http://shop.fns24.com/" target="_blank">News Service</a></li>
                                 <li><a href="<?=SCRIPT_URL?>payment/" target="_blank" style="color:yellow">Payment</a></li>
                                  <li><a href="<?=SCRIPT_URL?>newspapers/" target="_blank">Bangladeshi Newspaper</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-2 col-md-2">
                        <div class="social-blocks clearfix">
                            <ul>
                                <li><a href="https://www.facebook.com/Fns24/" target="_blank"><img src="<?php echo GET_TEMPLATE_DIRECTORY_URI; ?>/images/facebook.png" alt="facebook"></a></li>
                                <li><a href="#"><img src="<?php echo GET_TEMPLATE_DIRECTORY_URI; ?>/images/twitter.png" alt="twitter"></a></li>
                                <li><a href="#"><img src="<?php echo GET_TEMPLATE_DIRECTORY_URI; ?>/images/youtube.png" alt="youtube"></a></li>
                                <li><a href="#"><img src="<?php echo GET_TEMPLATE_DIRECTORY_URI; ?>/images/plus.png" alt="G-plus"></a></li>
                                <li><a href="#"><img src="<?php echo GET_TEMPLATE_DIRECTORY_URI; ?>/images/linkedin.png" alt="linkedin"></a></li>
                                <li><a href="#"><img src="<?php echo GET_TEMPLATE_DIRECTORY_URI; ?>/images/rss.png" alt="rss"></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
   
    <div class="wrapper">
        <div class="container-fluid main-wrapper">
		
 <nav class="navbar head-block">
	<div class="navbar-header">
		<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false">
			<span class="sr-only">মেনুবার</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</button>
	</div>
	<div class="collapse navbar-collapse" id="navbar-collapse">
		<ul class="nav navbar-nav">
			<li<?=(CURRENT_URL==SCRIPT_URL)?' class="active"':'';?>><a href="<?=SCRIPT_URL?>"><i calss="fa fa-home"></i> হোম </a></li>

<?php 

	$active_sel_2_1=(strpos(CURRENT_URL,'/district/') !==false)?' active':'';
	$active_sel_2_2=(strpos(CURRENT_URL,'/division/') !==false)?' active':'';
	$active_sel_2=$active_sel_2_1.$active_sel_2_2;
	if(ar_isMobile()){
	?>
	 <li><a href="<?=SCRIPT_URL?>alldistrictnews/">জেলার সংবাদ</a></li>
    <?php }else{ ?>
			<li class="dropdown<?=$active_sel_2?>" >
				<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">জেলার সংবাদ <span class="caret"></span></a>
				<ul class="dropdown-menu multi-level" role="menu" aria-labelledby="dropdownMenu">
					<?php 
					$all_divisions=$db->select("SELECT DivisionID, DivisionNameBN FROM bas_division LIMIT 1,8");
					if($all_divisions){
					foreach($all_divisions as $k=>$rsDivision){
					$division_wise_districts=$db->select('SELECT DistrictID, DistrictNameBN FROM bas_district WHERE DivisionID='.$rsDivision["DivisionID"].' ORDER BY DistrictNameBN ASC');
					$division_url=SCRIPT_URL.'division/'.$rsDivision["DivisionID"].'/'.$rsDivision["DivisionNameBN"];
					?>
					 <li class="dropdown">
                                    <a href="<?=$division_url?>" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                       aria-haspopup="true" aria-expanded="true"><?php echo $rsDivision["DivisionNameBN"]; ?></a> 
						<?php 
							if($division_wise_districts){
							echo '<ul class="dropdown-menu">';
							foreach($division_wise_districts as $k=>$rsDistrict){ 
							$district_url=SCRIPT_URL.'district/'.$rsDistrict["DistrictID"].'/'.$rsDistrict["DistrictNameBN"];
							?>
								<li><a href="<?=$district_url?>"><?php echo $rsDistrict["DistrictNameBN"]; ?></a></li>
							<?php }
							echo "</ul>\n";
							}
						?>
					</li>
					<?php	
					}
					}//all_divisions ?>
							
				   <li><a href="<?=SCRIPT_URL?>mofossol">মফস্বলের সব খবর</a></li>
				</ul>
			</li>
		<?php } ?>
			<?php 
			//$menu_rows =$db->select("SELECT * FROM image_categories WHERE active=1 and cat_id NOT IN (36,38)");
			$menu_rows =$db->select("SELECT * FROM bn_bas_category WHERE ShowData=1 AND CategoryID IN (1,2,3,4,5,6,7,8,10,20,22) ORDER BY CategoryID ASC");
			if($menu_rows){
				foreach($menu_rows as $key => $bn_cat_info){
			
        				$article_cat_url= SCRIPT_URL.'newscategory/'.$bn_cat_info['CategoryID'].'/'.$bn_cat_info['CategoryName'].'/';	
        				$active_sel=(strpos(CURRENT_URL,'/newscategory/'.$bn_cat_info['CategoryID'].'/' ) !==false)?' class="active"':'';
        				echo $album_cats_html ='<li'.$active_sel.'><a href="'.$article_cat_url.'">'.$bn_cat_info['CategoryName'].'</a></li>'."\n";	
				}
			}
			?>
			<li><a href="<?=SCRIPT_URL?>photo">গ্যালারি</a></li>
			<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">অন্যান্য <span class="caret"></span></a>
				<ul class="dropdown-menu multi-level" role="menu" aria-labelledby="dropdownMenu">
			<?php
			$menu_rows =$db->select("SELECT * FROM bn_bas_category WHERE ShowData=1 AND CategoryID IN (9,11,12,13,14,15,16,17,18,19,21) ORDER BY CategoryID ASC");
			if($menu_rows){
				foreach($menu_rows as $key => $bn_cat_info){	
			
				$article_cat_url= SCRIPT_URL.'newscategory/'.$bn_cat_info['CategoryID'].'/'.$bn_cat_info['CategoryName'].'/';	
				$active_sel=(strpos(CURRENT_URL,'/'.$bn_cat_info['CategoryID'].'/' ) !==false)?' class="active"':'';
				echo $album_cats_html ='<li'.$active_sel.'><a href="'.$article_cat_url.'">'.$bn_cat_info['CategoryName'].'</a></li>'."\n";   
				}
			}
				$active_sel=(strpos(CURRENT_URL,'/archives' ) !==false)?' class="active"':'';
			?>
				<li<?=$active_sel?>><a href="<?=SCRIPT_URL?>archives">আর্কাইভ</a></li>
				
			</ul>
		</li>
		</ul>
	</div>
</nav>
