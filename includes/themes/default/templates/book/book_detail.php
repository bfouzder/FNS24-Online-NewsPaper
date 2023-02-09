<style>.book_photo_block{float:left;}
.book_photo_block img{padding:5px; max-width: 500px;}
.book_summary{margin:40px;}
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
			<h2 class="nav-page-title"><?=$book_cat_name?></h2>
			<div class="page-breadcrumb clearfix">
			    <ol class="breadcrumb">
        		   <li><a href="<?=SCRIPT_URL?>"><i class="fa fa-home"></i> প্রচ্ছদ </a></li>
        		   <li><a href="<?=SCRIPT_URL?>book"><i class="fa fa-book"></i> বই</a></li>
        		   <li class="active"><a href="<?=$book_cat_url?>"><?=$book_cat_name?></a></li>
        
        		 </ol>
			</div>
		<!--eof top heading-->	
	
<!--bof book detail-->	
<div class="section-info book_detail_page_block">
     <?=ar_showAds($position=11);?> 

	<h1 class="book_main_title"><?=$book_title?></h1>

	<div class="meta-block">
		<div class="row">
			<div class="col-xs-12 col-sm-12">
				<?=$book_Writers?> | প্রকাশ:  <?=$book_pub_date?>
<?php if($book_pub_date != $book_updated_date){ ?>
				|  আপডেট: <?=$book_updated_date?>
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

    <div class="row">
			<div class="col-xs-12 col-md-7">
                <?php
                if($book_image): ?>
                    <div class="book_photo_block" >
                        <img src="<?=$book_image?>" alt="image-here" width=""/>
                        <div class="caption"><?php echo $book_image_caption; ?></div>
                    </div>
                <?php endif;?>	
				<?php if($book_content){ ?>
                <a href="javascript:void(0)" onclick="jQuery('#book_content').toggle();" class="btn btn-success"><i class="fa fa-book"></i>  বইটি পড়তে এখানে ক্লিক করুন</a>
				<?php }else{  ?>
					<a href="<?=$book_pdf?>" class="btn btn-danger" target="_blank"><i class="fa fa-book"></i>  বইটি পড়তে এখানে ক্লিক করুন</a>
                <?php } ?>

				<?php if($book_pdf){ ?>
                <a href="<?=$book_pdf?>" class="btn btn-danger" target="_blank"><i class="fa fa-book"></i> বইটি ডাউনলোড করুন</a>
                <?php }  ?>

				<?php if($book_video){ ?>
                <a href="<?=$book_video?>" class="btn btn-success" target="_blank"><i class="fa fa-youtube"></i> ইউটিউব-এ শুনুন</a>
                <?php }  ?>

            </div> 
            <div class="col-xs-12 col-md-4">
				<br/>
			    <div class="book_summary"><?php echo nl2br($book_summary); ?></div>
				<br/>
				
            </div> 
    </div> 

	<div id="book_content" style="display:none; margin-top:50px;"><p><?=$book_content?></p></div>

	<div class="clearfix"></div>
	<div class="sharethis-inline-reaction-buttons"></div>
	<div class="clearfix"></div>
</div>

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
</style>
				 
<?php 
if($related_book_rows){ ?>
	<div class="row inner_more_book">
		<div class="col-xs-12 col-sm-12">
			 <div class="panel panel-default">
			 <div class="panel-heading"> আরও বই</div>
			  <div class="panel-body">
				 <div class="row">
<?php
	foreach($related_book_rows as $k=>$book_article_info2){
		
	$book_article_ID2= $book_article_info2['book_id'];	
	$book_article_title2= $book_article_info2['book_title'];
	
	#bof Image
	$book_article_image_url2= $book_article_info2['image_url'];
	#eof Image
		
	$book_article_Writers2= $book_article_info2['Writers'];	
	$book_article_url2= __bn_getbookURL($book_article_info2);	
	?>
				<div class="col-xs-12 col-sm-4 col-md-3">
					<div class="post_content post_tag_content">
					  <a href="<?=$book_article_url2?>" title="">
					  	<?php if($book_article_image_url2) {		
						echo $book_article_image2= ar_timthumb_image($book_article_image_url2,$image_width=240,$image_height=200,$zc=1);
						// echo '<p>'.short_excerpts(strip_tags($book_article_info2['book_details']),15).'</p>';
                        }else{
                         //   echo '<p>'.short_excerpts(strip_tags($book_article_info2['book_details']),25).'</p>';
                        } ?>
					    <h2><?=$book_article_title2?></h2>
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
   </div><!--bof Related book-->	
   
<?php	
}//related book;	
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
                        $sql_query="SELECT * FROM all_news WHERE status=1  ORDER BY news_id DESC LIMIT $limit"; 
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