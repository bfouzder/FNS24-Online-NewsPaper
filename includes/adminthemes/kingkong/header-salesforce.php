<?php include ("header-common.php");?>
   <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="<?=ADMIN_URL?>" class="site_title"><img src="<?php echo ADMIN_GET_TEMPLATE_DIRECTORY_URI; ?>/images/logo.png" alt=""/></a>
            </div>
            <div class="clearfix"></div>
            <!-- /menu profile quick info -->
            <br />
			<?php include("sidebar-salesforce.php");?>
			<div class="right_col" role="main">
			<!--bof flash msg -->
			<?php include('displaymessage.php');?>
			<!--eof flash msg -->