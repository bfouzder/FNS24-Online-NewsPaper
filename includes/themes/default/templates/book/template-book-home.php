<style>
    .book-info{padding-top:10px;}
    .book-info h3{font-size:13px;text-align:center;}
    .book_list{padding:0 5px;}
    .book_block{padding: 5px; margin: 10px 0; position: relative;display:block;}
    .book_block_title{padding: 5px; margin: 10px 0; background:#eee;}
    .book_block_title{border-left:10px solid #337ab7;margin-bottom:10px;}
    .book_block_title h2{line-height: 15px;margin: 10px;padding: 0px; color:#337ab7;}
.book_card{margin:0 10px;}
    @media (min-width: 992px) {
        .col-md-3 {
        width: 19%;
        }
    }
    
</style>   
<section class="section-block clearfix">
	<div class="row">
		<div class="col-md-12 col-xs-12 col-sm-12">
			<h2 class="nav-page-title">বই</h2>
	        <div class="page-breadcrumb clearfix">
			    <ol class="breadcrumb">
        		   <li><a href="<?=SCRIPT_URL?>">প্রচ্ছদ</a></li>
                   <li class="active"><a href="<?=SCRIPT_URL?>book"><i class="fa fa-book"></i> বই</a></li>
        		 </ol>
			</div>
			
		  <!--eof top heading-->
           
          
            <!--bof cat iteams-->
           	<div class="book_list">
                <?php 
                foreach($home_cats as $book_cat_id =>$book_cat_name){
                   $cat_contents= ar_showBooksByCategory($book_cat_id);
                   if($cat_contents){
                    $book_cat_url=SCRIPT_URL.'book/category/'.$book_cat_id.'/'.$book_cat_name;	
                    
                    echo '<div class="book_block">
                        <div class="book_block_title"><h2>'.$book_cat_name.'</h2></div>
                            '. $cat_contents.'

                            <div class="clearfix"></div><div class="more"><a href="'.$book_cat_url.'">আরও</a></div>
                            </div>';
                   }
                }
                ?>
			</div>
           
            <?php //include(TEMPLATE_STORE.'pagination_raw.php');?>	            
            <!--eof cat iteams-->		
		</div>
	</div>
</section>

<?php 
function ar_showBooksByCategory($book_cat_id=23, $book_limit=12){
    global $db;


    $html='';
    $html_list='';

        $sql_query="SELECT * FROM all_books WHERE status=1 AND cat_id='$book_cat_id' ORDER BY book_id DESC LIMIT $book_limit";
		$book_rows = $db->select($sql_query);
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
                                </div>
                            </a>   
                            </div> 
                            </div>'."\n";     	

                             
         }//foreach 
         $html='<div class="rows">
         '.$html_list.'
          </div>';
     }

    
    return $html;
}

?>