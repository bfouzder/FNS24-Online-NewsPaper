<?php
function __bn_getBookURL($book_info){
	
	$book_ID= $book_info['book_id'];	
	$book_title= $book_info['book_title'];
	$book_title= make_seo_bangla($book_title);
    $url= SCRIPT_URL.'book/'.$book_ID.'/'.$book_title.'/'; 
	return $url;
}
function getBookCatInfo($cat_id){
    global $db;
  
   
    $table_name='bn_book_category';$primary_id='CategoryID';
	if(is_numeric($cat_id)){
		$row=$db->getRowArray($table_name,array($primary_id=>$cat_id));
	}
	return 	 $row;	
}

function getBookInfo($book_id_seotitle){
    global $db;
  
  $table_name='all_news';$book_title='book_title';$book_id='book_id';
  
	if(is_numeric($book_id_seotitle)){
		$row=$db->getRowArray($table_name,array($book_id=>$book_id_seotitle));
	}else{
		$row=$db->getRowArray($table_name,array('alias'=>$book_id_seotitle));
		if(!$row){
			$row=$db->select_single("SELECT * FROM $table_name WHERE $book_title ='$book_id_seotitle'");
		}
	}
	return 	 $row;	
}
?>