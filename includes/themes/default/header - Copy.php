<?php include('header-common.php')?>
<div id="top-block">
    <div class="wrapper">
        <div class="container-fluid">
            <div class="adv-top"><a href="#"><img src="<?php echo GET_TEMPLATE_DIRECTORY_URI; ?>/images/pran_ads.gif" alt="ads"></a></div>
        </div>
    </div>
    <header class="header">
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
                                <li><a href="http://www.bangla-converter/" target="_blank">Bangla Converter</a></li>
                                <li><a href="http://a2zmedialink.com/" target="_blank">A2Z Media Link</a></li>
                                <li><a href="#">English Version</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-2 col-md-2">
                        <div class="social-blocks clearfix">
                            <ul>
                                <li><a href="#"><img src="<?php echo GET_TEMPLATE_DIRECTORY_URI; ?>/images/facebook.png" alt="facebook"></a></li>
                                <li><a href="#"><img src="<?php echo GET_TEMPLATE_DIRECTORY_URI; ?>/images/twitter.png" alt="twitter"></a></li>
                                <li><a href="#"><img src="<?php echo GET_TEMPLATE_DIRECTORY_URI; ?>/images/youtube.png" alt="youtube"></a></li>
                                <li><a href="#"><img src="<?php echo GET_TEMPLATE_DIRECTORY_URI; ?>/images/plus.png" alt="G-plus"></a></li>
                                <li><a href="#"><img src="<?php echo GET_TEMPLATE_DIRECTORY_URI; ?>/images/linkedin.png" alt="linkedin"></a></li>
                                <li><a href="#"><img src="<?php echo GET_TEMPLATE_DIRECTORY_URI; ?>/images/pinterest.png" alt="pinterest"></a></li>
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
			<span class="sr-only">Navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</button>
	</div>
	<div class="collapse navbar-collapse" id="navbar-collapse">
		<ul class="nav navbar-nav">
			<li<?=(CURRENT_URL==SCRIPT_URL)?' class="active"':'';?>><a href="<?=SCRIPT_URL?>">প্রচ্ছদ</a></li>
			<li class="dropdown">
				<a href="<?=SCRIPT_URL?>mofossol.php" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">সারা বাংলা <span class="caret"></span></a>
				<ul class="dropdown-menu multi-level" role="menu" aria-labelledby="dropdownMenu">
					<?php 
					$all_divisions=$db->select("SELECT DivisionID, DivisionNameBN FROM bas_division LIMIT 1,8");
					if($all_divisions){
					foreach($all_divisions as $k=>$rsDivision){
					$division_wise_districts=$db->select('SELECT DistrictID, DistrictNameBN FROM bas_district WHERE DivisionID='.$rsDivision["DivisionID"].' ORDER BY DistrictNameBN ASC');
					$division_url=SCRIPT_URL.'division/'.$rsDivision["DivisionID"].'/'.$rsDivision["DivisionNameBN"];
					?>
					<li class="dropdown-submenu" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true"><a href="<?=$division_url?>"><?php echo $rsDivision["DivisionNameBN"]; ?></a>
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
							
					<li><a href="<?=$district_url?>mofossol">মফস্বেলের সব খবর</a></li>
				</ul>
			</li>
			<?php 
			//$menu_rows =$db->select("SELECT * FROM image_categories WHERE active=1 and cat_id NOT IN (36,38)");
			$menu_rows =$db->select("SELECT * FROM bn_bas_category WHERE ShowData=1 ORDER BY CategoryID ASC");
			if($menu_rows){
				foreach($menu_rows as $key => $bn_cat_info){	
				if($key >10) break;
				$article_cat_url= SCRIPT_URL.'newscategory/'.$bn_cat_info['CategoryID'].'/'.$bn_cat_info['CategoryName'].'/';	
				$active_sel=(strpos(CURRENT_URL,'/'.$bn_cat_info['CategoryID'] ) !==false)?' class="active"':'';
				echo $album_cats_html ='<li'.$active_sel.'><a href="'.$article_cat_url.'">'.$bn_cat_info['CategoryName'].'</a></li>'."\n";	
				}
			}
			?>
			<li class="dropdown">
				<a href="<?=SCRIPT_URL?>mofossol.php" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">অন্যান্য <span class="caret"></span></a>
				<ul class="dropdown-menu multi-level" role="menu" aria-labelledby="dropdownMenu">
			<?php 			
			if($menu_rows){
				foreach($menu_rows as $key => $bn_cat_info){	
				if($key >10){
				$article_cat_url= SCRIPT_URL.'newscategory/'.$bn_cat_info['CategoryID'].'/'.$bn_cat_info['CategoryName'].'/';	
				$active_sel=(strpos(CURRENT_URL,'/'.$menu_info['seo_title'] ) !==false)?' class="active"':'';
				echo $album_cats_html ='<li'.$active_sel.'><a href="'.$article_cat_url.'">'.$bn_cat_info['CategoryName'].'</a></li>'."\n";	
				}
				}
			}
			?>
				<li><a href="<?=SCRIPT_URL?>archives">আর্কাইভ</a></li>
				<li><a href="#">প্রোফাইল</a></li>
			</ul>
		</li>
		</ul>
	</div>
</nav>

<section class="adv-block clearfix">
<div class="row">
	<div class="col-xs-12 col-sm-6">
		<div class="adv-70"><a href="#"><img src="<?php echo GET_TEMPLATE_DIRECTORY_URI; ?>/images/half_banner.png" alt=""></a></div>
	</div>
	<div class="col-xs-12 col-sm-6">
		<div class="adv-70"><a href="#"><img src="<?php echo GET_TEMPLATE_DIRECTORY_URI; ?>/images/fruto.gif" alt="" ></a></div>
	</div>
</div>
</section>