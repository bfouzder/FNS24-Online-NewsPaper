<?php
$CE_admin_level = state('CE_member_level');
//$role_array=getAdminRoleArray();
//if(!$CE_admin_level) return false;
$base_url = SCRIPT_URL.$this->controller.'/';
?>	

<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12">
		<div class="panel panel-primary">
			<div class="panel-heading">
			  <h3 class="panel-title">Dashboard: <?=state('CE_member_fname')?></h3>
			</div>
			<div class="panel-body">  
				<!--bof Dashboard-->
				<div class="content-block dashboard">
				  <div class="row">
			
					<div class="col-xs-4 col-sm-3 col-lg-2">
					 <a href="<?=SCRIPT_URL?>/auth/popup_signup" title="" class="fancybox fancybox.iframe"><div class="image"><i class="fa fa-user fa-6x"></i><br><h2>Add Employee</h2></div></a>
					</div>
					
					<div class="col-xs-4 col-sm-3 col-lg-2">
					 <a href="<?=$base_url?>allEmployees" title=""><div class="image"><i class="fa fa-users fa-6x"></i><br><h2>Employee List</h2></div></a>
					</div>
					
					<div class="col-xs-4 col-sm-3 col-lg-2">
					  <a href="<?=$base_url?>manage_lists" title=""><div class="image"><i class="fa fa-file-text fa-6x"></i><br><h2>BV Lists</h2></div></a>
					</div>
					
					<div class="col-xs-4 col-sm-3 col-lg-2">
					  <a href="<?=$base_url?>manage_category" title="" class="fancybox fancybox.iframe"><div class="image"><i class="fa fa-camera-retro fa-6x"></i><br><h2>Manage Category</h2></div></a>
					</div>
					
					<div class="col-xs-4 col-sm-3 col-lg-2">
					  <a href="<?=$base_url?>addAlbumList" title="" ><div class="image"><i class="fa fa-file-image-o fa-6x"></i><br><h2>Add Album</h2></div></a>
					</div>
					<div class="col-xs-4 col-sm-3 col-lg-2">
					  <a href="<?=$base_url?>albums" title="" ><div class="image"><i class="fa fa-file-image-o fa-6x"></i><br><h2>Show Albums</h2></div></a>
					</div>
					
					<div class="col-xs-4 col-sm-3 col-lg-2">
					  <a href="<?=$base_url?>settings" title=""><div class="image"><i class="fa fa-cog fa-spin fa-6x"></i><br><h2>Setting</h2></div></a>
					</div>
					
				  </div>
				</div><!--eof Dashboard-->
			</div><!--panel-body-->
	   </div>
	</div>
</div><!--row-->	