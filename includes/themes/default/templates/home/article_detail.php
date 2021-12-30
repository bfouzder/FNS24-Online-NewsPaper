<style>.news_photo_block{float:left;}
.news_photo_block img{padding:5px;;}

.gray-box {
    background: #aaa;
    padding: 15px;
    max-width: 316px;
    float: none;
    margin: 10px auto;
    border: 1px solid #44445f;
}
</style>
<section class="section-block clearfix">
	<div class="row">
		<div class="col-xs-12 col-sm-9">
			<h2 class="nav-page-title"><?=$news_cat_name?></h2>
			<div class="page-breadcrumb clearfix">
			    <ol class="breadcrumb">
        		   <li><a href="<?=SCRIPT_URL?>"><i class="fa fa-home"></i> প্রচ্ছদ</a></li>
        		   <li class="active"><a href="<?=$news_cat_url?>"><?=$news_cat_name?></a></li>
        
        		 </ol>
			</div>
		<!--eof top heading-->	
	
<!--bof news detail-->	
<div class="section-info news_detail_page_block">
     <?=ar_showAds($position=11);?> 
	<?php if ($news_article_sub_title) { ?> 
	<h2 class="news_sub_title"><?php echo $news_article_sub_title ; ?></h2>
	<?php } ?> 
	<h1 class="news_main_title"><?=$news_article_title?></h1>

	<div class="meta-block">
		<div class="row">
			<div class="col-xs-12 col-sm-12">
				<?=$news_article_Writers?> | প্রকাশ:  <?=$news_article_pub_date?>
<?php if($news_article_pub_date != $news_article_updated_date){ ?>
				|  আপডেট: <?=$news_article_updated_date?>
<?php }else{ ?>	

<?php } ?>				
			</div>
			<div class="col-xs-12 col-sm-12">
				<div class="social-follow-block share">
                    <div class="sharethis-inline-share-buttons"></div>
				</div>
			</div>
		</div>
	</div>
	<?php if($news_article_image): ?>
	<div class="news_photo_block">
		<img src="<?=$news_article_image?>" alt="image-here"/>
		<div class="caption"><?php echo $news_article_image_caption; ?></div>
	</div>
	<?php endif;?>	
	
	<?=str_replace('<p style="text-align: justify;">&nbsp;</p>', '', $news_article_content)?>

<?php if($news_article_info['news_video']){
$news_video_url= $news_article_info['news_video'];
$news_video_url= str_replace('watch?v=','embed/',$news_video_url);
?>
	<div class="video-block">
		<div class="embed-responsive embed-responsive-16by9">
			<iframe class="embed-responsive-item" src="<?=$news_video_url?>"></iframe>
		</div>
	</div>
<?php } ?>	
	<div class="clearfix"></div>
	<div class="sharethis-inline-reaction-buttons"></div>
	<div class="clearfix"></div>
</div>
<!--eof news detail-->	
<?=ar_showAds($position=12);?> 
<!--bof Related News-->	
<style>
.post_tag_content h2 {
    font-size: 14px;
    padding: 8px 5px;
    height: 67px;
    overflow: hidden;
    background: #eee;
    line-height: 19px;
    text-align: center;

}
.post_tag_content img{width: 100%; }   
<</style>
				 
<?php 
if($related_news_home_rows){ ?>
	<div class="row inner_more_news">
		<div class="col-xs-12 col-sm-12">
			 <div class="panel panel-default">
			 <div class="panel-heading"> আরও খবর</div>
			  <div class="panel-body">
				 <div class="row">
<?php
	foreach($related_news_home_rows as $k=>$news_article_info2){
		
	$news_article_ID2= $news_article_info2['news_id'];	
	$news_article_title2= $news_article_info2['news_title'];
	
	#bof Image
	$news_article_image_url2= $news_article_info2['image_url'];
	#eof Image
		
	$news_article_Writers2= $news_article_info2['writer'];	
	$news_article_Initial2= $news_article_info2['Initial'];
	$news_article_url2= __bn_getNewsURL($news_article_info2);	
	?>
				<div class="col-xs-12 col-sm-4 col-md-3">
					<div class="post_content post_tag_content">
					  <a href="<?=$news_article_url2?>" title="">
					  	<?php if($news_article_image_url2) {		
						echo $news_article_image2= ar_timthumb_image($news_article_image_url2,$image_width=240,$image_height=200,$zc=1);
						// echo '<p>'.short_excerpts(strip_tags($news_article_info2['news_details']),15).'</p>';
                        }else{
                         //   echo '<p>'.short_excerpts(strip_tags($news_article_info2['news_details']),25).'</p>';
                        } ?>
					    <h2><?=$news_article_title2?></h2>
					  </a>
					</div>
				</div>
<?php
	}
?>
				</div><!--/row-->
				
				
				
			  </div><!--/panel-body-->
			</div>
		</div>
   </div><!--bof Related News-->	
   
<?php	
}//related news;	
?>		
		</div>
		<div class="col-xs-12 col-sm-3">
		    
		    <section class="section-block location_drop_block clearfix"> 
    <form method="get" name="frmDivision" action="<?=SCRIPT_URL?>allnews/">
	আপনার পছন্দের এলাকার সংবাদ পড়তে চাই:

		<span class="xs-custom-box">
		    <select name="division" id="cboDivision2" onchange="getDistrict2(this.value)" style="width:100%">
	<option value="0">বিভাগ</option>
		<?php 
		$all_divisions=$db->select("SELECT DivisionID, DivisionNameBN FROM bas_division LIMIT 1,8");
		if($all_divisions){
			foreach($all_divisions as $k=>$rsDivision){
			$division_wise_districts=$db->select('SELECT DistrictID, DistrictNameBN FROM bas_district WHERE DivisionID='.$rsDivision["DivisionID"].' ORDER BY DistrictNameBN ASC');
			$division_url=SCRIPT_URL.'division/'.$rsDivision["DivisionID"].'/'.$rsDivision["DivisionNameBN"];
			?>	
			<option value="<?php echo $rsDivision["DivisionID"] ?>"><?php echo $rsDivision["DivisionNameBN"]; ?></option>
			<?php	
			}
		}//all_divisions 
		?>
	</select>
	<div class="clearfix"></div>
	<select name="dist" id="nttl2"  style="width:100%">
		<option value="0">জেলা</option>
	</select> 
		<div class="clearfix"></div>
	<input type="submit" value="সংবাদ পড়তে ক্লিক করুন"  id="btnSubmit" /> </span>
</form> 
<script>
function getDistrict2(iDivisionID){
	var xmlhttp;
	if(window.XMLHttpRequest){
		//code for IE7+, Firefox, Chrome, Opera, Safari
		xmlhttp=new XMLHttpRequest();
	}else{
		//Code for IE6, IE5
		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange=function(){
		if(xmlhttp.readyState==4 && xmlhttp.status==200){
			document.getElementById("nttl2").innerHTML=xmlhttp.responseText;
		}
	}
	sURL="<?=SCRIPT_URL?>ajax/getDistrict.php?DivisionID="+iDivisionID;
	xmlhttp.open("GET",sURL,true);
	xmlhttp.send();
}
</script>
</section>
	<div class="clearfix"></div>
		    
			<div class="story-list-block">
                <ul class="nav nav-tabs nav-justified" role="tablist">
                    <li role="presentation" class="active"><a href="#top" aria-controls="home" role="tab" data-toggle="tab">শীর্ষ সংবাদ </a></li>
                    <li role="presentation"><a href="#mostread" aria-controls="home" role="tab" data-toggle="tab">সর্বাধিক </a></li>
                    <li role="presentation"><a href="#latest" aria-controls="profile" role="tab" data-toggle="tab">সর্বশেষ </a></li>
                </ul>
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane active" id="top">
                        <ul class="list-title-block">
                             <?=ar_showTablistNews($type='Top', $limit =5);//Spotlight News?>
                        </ul>
                        <div class="more"><a href="<?=SCRIPT_URL?>allnews/top/">আরও</a></div>
                    </div>
                    <div role="tabpanel" class="tab-pane" id="mostread">
                        <ul class="list-title-block">
                             <?=ar_showTablistNews($type='MostRead', $limit =5);?>
                        </ul>
                         <div class="more"><a href="<?=SCRIPT_URL?>allnews/mostviewed/">আরও</a></div>
                    </div>
                    <div role="tabpanel" class="tab-pane" id="latest">
                        <ul class="list-title-block">
                             <?=ar_showTablistNews($type='Latest', $limit =5);?>
                        </ul>
                        <div class="more"><a href="<?=SCRIPT_URL?>allnews/latest/">আরও</a></div>
                    </div>
                </div>
            </div>
             <?=ar_showAds($position=10);?> 
            <div class="clearfix"></div>
           
            <div class="story-list-block">
                <ul class="nav nav-tabs nav-justified" role="tablist">
                    <li role="presentation"><a href="#other-news2" aria-controls="profile" role="tab" data-toggle="tab">এ বিভাগের অন্যান্য সংবাদ  </a></li>
			   </ul>
                <div class="tab-content">                    
					 <div role="tabpanel" class="tab-pane active" id="other-news2">
                        <ul class="list-title-block">
                        <?php 
                        $sql_query="SELECT * FROM all_news WHERE news_id !='$news_article_ID' AND status=1 AND cat_id='$news_article_CategoryID' ORDER BY news_id DESC LIMIT $limit"; 
	                	$related_news_rows = $db->select($sql_query);
		
                            if($related_news_rows){     
                                foreach($related_news_rows as $news_info){   
                                echo  ar_displayNews($news_info, $news_for='small_thumb_list'); 
                                }
                            } 
                         ?>
                        </ul>
                    </div>
                </div>
            </div>
             
    <? /*?>
    <div class="fb-block" style="margin: 10px auto;">
                 <iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2FFns24%2F&tabs=timeline&width=340&height=500&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId=47111295515"  style="border:none; overflow:hidden; width:100%; height:490px; border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>
    </div>
    <? */?>        
            <?//=$related_news_html?>
            
			
		</div>		
	</div>
</section>