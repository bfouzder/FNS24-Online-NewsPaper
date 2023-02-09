<style>
    .book-info{padding-top:10px;}
    .book-info h2{font-size:14px;}
</style>
<section class="section-block clearfix">
	<div class="row">
		<div class="col-md-12 col-xs-12 col-sm-12">
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
                        <a href="'.$book_url.'">
                            <div class="book_cover">
                                <img src="'.$book_image.'" alt="image-here" class="image-thumbnail"/>
                                <div class="caption">'.$book_image_caption.'</div>
                            </div>
                            <div class="book-info">
                                <h2>'.$book_title.'</h2>
                            </div>
                        </a>    
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
				
	</div>
</section>