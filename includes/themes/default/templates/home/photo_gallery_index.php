<style>
.ak_jhalok {
    min-height: 190px;
    background: #f6f6f6;
    padding: 0px;
    margin-bottom: 22px;
}
.ak_jhalok p{ text-align: center;padding:5px;margin:0px;}
img.thumbnail2{margin-bottom:10px; }
</style>
<?php 
$page_title=($page_title)?$page_title:'ফটো গ্যালারি';
?>

 <div class="row main_cont">
  <div class="col-xs-12 col-sm-12 col-md-12">
	    <div class="home_top_left">
							
<div class="row">
	<div class="col-xs-12 col-sm-12">
	  <ol class="breadcrumb">
	   <li><a href="<?=SCRIPT_URL?>">প্রচ্ছদ</a></li>
	   <?php if($cattitle){ ?>
	   <li><a href="<?=SCRIPT_URL?>photo">ফটো গ্যালারি</a></li>
	   <li class="active"><?=$cattitle?></li>
	     <?php }else{ ?>
	     <li class="active"><?=$page_title?></li>
	     <?php } ?>
	  </ol>
     	</div>
    	<div class="col-xs-12 col-sm-12"><div class="row section-flex-photo">
          <?= ar_showAlbumsByPhotoCategory($cat_id, $limit =500)?>
          </div>
       <br/>
	</div>
</div> 
 <hr class="style1 news_list_border">
<div class="pagination_hldr">
<?php include(TEMPLATE_STORE.'pagination_raw.php');?>	
</div>


					
 
</div>
</div><!--cont_left-->
</div><!--main_cont-->					

