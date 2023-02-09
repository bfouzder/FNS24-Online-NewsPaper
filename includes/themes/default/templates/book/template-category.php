<style>
    .book-info{padding-top:10px;}
    .book-info h3{font-size:14px;text-align:center;}
    .book_card{margin:0 10px;}
</style>
<section class="section-block clearfix">
	<div class="row">
		<div class="col-xs-12 col-sm-9">
			<h2 class="nav-page-title"><?=$book_cat_name?></h2>
	        <div class="page-breadcrumb clearfix">
			    <ol class="breadcrumb">
        		   <li><a href="<?=SCRIPT_URL?>">প্রচ্ছদ</a></li>
                   <li><a href="<?=SCRIPT_URL?>book"><i class="fa fa-book"></i> বই</a></li>
        		   <li class="active"><?=$book_cat_name?></li>
        		 </ol>
			</div>
			
		  <!--eof top heading-->
       <?=ar_showAds($position=9);?>     
<?php 
/*
$news_cat_info;
$news_cat_name;
*/        
$html_list='';
if($book_rows){
	//pre($news_cat_rows);
	foreach($book_rows as $k=>$book_info){
	
        $book_ID= $book_info['book_id'];	
		$book_CategoryID= $book_info['cat_id'];	
		$book_title= $book_info['book_title'];
		
		$book_image=$book_info['image_url'];	
		$book_image_caption=$book_info["image_url_caption"];
    
		$fb_image= $book_image;	
	

		$book_content= $book_info["book_details"];
		$book_summary= $book_info["book_summary"];


		$book_pdf=$book_info['book_pdf'];	
		$book_pdf_url=$book_info['book_pdf_url'];	


		$book_pdf =($book_pdf)?$book_pdf:$book_pdf_url;

		$book_Writers= $book_info['Writers'];
        $book_pub_date=ar_FormatDateEn2Bn($book_info["date_added"],'j F, Y, g:i a');
		$book_updated_date=ar_FormatDateEn2Bn($book_info["DateTimeUpdated"],'j F, Y, g:i a');
		$book_url= SCRIPT_URL.'book/'.$book_ID.'/'.$book_title;	
        	
        $html_list .='<div class="col-md-3">
                        <div class="book_card">
                        <a href="'.$book_url.'">
                            <div class="book_cover">
                                <img src="'.$book_image.'" alt="image-here" class="img-thumbnail"/>
                                <div class="caption">'.$book_image_caption.'</div>
                            </div>
                            <div class="book-info">
                                <h3>'.$book_title.'</h3>
                            </div></a>
                        </div>   	
                        </div>'."\n";     	
     }//foreach 
 
 }//if  
 ?>          
          
          
          
          
          
            <!--bof cat iteams-->
           	<div class="rows">
				<?=$html_list?>
			</div>
           
            <?php include(TEMPLATE_STORE.'pagination_raw.php');?>	            
            <!--eof cat iteams-->		
		</div>
		<div class="col-xs-12 col-sm-3">
            <div class="story-list-block">
                <ul class="nav nav-tabs nav-justified" role="tablist">
                    <li role="presentation" class="active"><a href="#top" aria-controls="home" role="tab" data-toggle="tab">শীর্ষ সংবাদ </a></li>
                    <li role="presentation"><a href="#mostread" aria-controls="home" role="tab" data-toggle="tab">সর্বাধিক </a></li>
                    <li role="presentation"><a href="#latest" aria-controls="profile" role="tab" data-toggle="tab">সর্বশেষ </a></li>
                </ul>
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane active" id="top">
                        <ul class="list-title-block">
                             <?=ar_showTablistNews($type='Top', $limit =4);//Spotlight News?>
                        </ul>
                        <div class="more"><a href="<?=SCRIPT_URL?>allnews/top/">আরও</a></div>
                    </div>
                    <div role="tabpanel" class="tab-pane" id="mostread">
                        <ul class="list-title-block">
                             <?=ar_showTablistNews($type='MostRead', $limit =4);?>
                        </ul>
                         <div class="more"><a href="<?=SCRIPT_URL?>allnews/mostviewed/">আরও</a></div>
                    </div>
                    <div role="tabpanel" class="tab-pane" id="latest">
                        <ul class="list-title-block">
                             <?=ar_showTablistNews($type='Latest', $limit =4);?>
                        </ul>
                        <div class="more"><a href="<?=SCRIPT_URL?>allnews/latest/">আরও</a></div>
                    </div>
                </div>
            </div>
             <?=ar_showAds($position=10);?> 
            <div class="fb-block" style="margin: 10px auto;">
                 <iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2FFns24%2F&tabs=timeline&width=340&height=500&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId=47111295515"  style="border:none; overflow:hidden; width:100%; height:490px; border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>
            </div>
		</div>		
	</div>
</section>