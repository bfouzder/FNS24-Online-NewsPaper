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
			$mmenu_rows = $db->select("select * from np_menuname where status=1 AND menu_id > 8 ORDER BY Priority");
			if($mmenu_rows){
				foreach($mmenu_rows as $key => $mcat_info){	
				$mcat_url= SCRIPT_URL.'newspapers/category/'.$mcat_info['menu_id'].'/'.$mcat_info['menuname'].'/';	
				$active_sel=(strpos(CURRENT_URL,'/'.$mcat_info['menu_id'].'/' ) !==false)?' class="active"':'';
				echo '<li'.$active_sel.'><a href="'.$mcat_url.'">'.$mcat_info['menuname'].'</a></li>'."\n";   
				}
			}
			?>

			<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">অন্যান্য <span class="caret"></span></a>
				<ul class="dropdown-menu multi-level" role="menu" aria-labelledby="dropdownMenu">
			<?php 	
			$mmenu_rows2 = $db->select("select * from np_menuname where status=1 AND menu_id <= 8 ORDER BY Priority");
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
		<li><a href="<?=SCRIPT_URL?>newspapers/adnewspaper" class="fancybox fancybox.iframe">Add Your Newspaper</a></li>
		</ul>
	</div>
</nav>