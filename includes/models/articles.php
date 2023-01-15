<?php
function __bn_getArticleURL($news_article_info){
	
	$news_article_ID= $news_article_info['news_id'];	
	$news_article_title= $news_article_info['news_title'];
	$news_article_title= make_seo_bangla($news_article_title);
	$EncryptedValue= $news_article_info['EncryptedValue'];
    if(in_array($news_article_info['cat_id'],array(20,23,24,25) )){
        $url= SCRIPT_URL.'book/'.$news_article_ID.'/'.$news_article_title.'/'.$EncryptedValue;
    }else{
        $url= SCRIPT_URL.'article/'.$news_article_ID.'/'.$news_article_title.'/'.$EncryptedValue;
    }
	
	return $url;
}
function __bn_getCatURL($bn_cat_info){
	if(is_numeric($bn_cat_info)){
	   $bn_cat_info =  getNewsCatInfo($bn_cat_info);
	}
	$url= SCRIPT_URL.'newscategory/'.$bn_cat_info['CategoryID'].'/'.$bn_cat_info['CategoryName'].'/';	
	return $url;
}

function __getAlbumURL($album_info){
   
	return __getPhotoAlbumURL($album_info);
}
function __getPhotoAlbumURL($album_info){
    global $db;
	if(is_numeric($album_info)){
	   $album_info =  $db->getRowArray('image_albums',$album_info);
	}
	$url= SCRIPT_URL.'photo/album/'.$album_info['album_id'].'/'.$album_info['album_title'].'/';	
	return $url;
}
function __getPhotoCatURL($album_cat_info){
    global $db;
	if(is_numeric($album_cat_info)){
	   $album_cat_info =  $db->getRowArray('image_categories',$album_cat_info);
	}
    $album_cat_id=$album_cat_info['cat_id']; 
    $album_cat_name=$album_cat_info['menu_text']; 
     $album_cat_name=($album_cat_name)?$album_cat_name:$album_cat_info['image_title']; 
    $album_cat_seo_name=$album_cat_info['seo_title']; 
    
	$url= SCRIPT_URL.'photo/category/'.$album_cat_seo_name.'/'.$album_cat_id.'/'.$album_cat_name.'/';	
	$url= SCRIPT_URL.'photo/category/'.$album_cat_seo_name.'/';	
	return $url;
}

function __getRelatedNewsArticles($news_article_CategoryID,$except_news_article_ID, $limit=4){
	global $db;
	
	$related_news_html="";
		$related_news_limit=3;
		$sql_query="SELECT * FROM all_news WHERE news_id !='$except_news_article_ID' AND status=1 AND cat_id='$news_article_CategoryID' ORDER BY news_id DESC LIMIT $limit"; 
		$related_news_rows = $db->select($sql_query);
		//pre($related_news_rows);
		if($related_news_rows){
		$related_news_html='<!--bof related news--><div class="gray-box"><h4>এ বিভাগের অন্যান্য সংবাদ </h4><ul>';	
			foreach($related_news_rows as $k=>$news_article_info){
			$news_article_ID= $news_article_info['news_id'];	
			$news_article_title= $news_article_info['news_title'];
 			$news_article_image= 'http://fns24.com/images/imgAll/'.$news_article_info['ImageSMPath'];	
			$news_article_excerpt= trunc_words($news_article_info["news_details"],50);
			$news_article_Writers= $news_article_info['Writers'];	
			$news_article_Initial= $news_article_info['Initial'];
			$news_article_pub_date=ar_FormatDateEn2Bn($news_article_info["DateTimeInserted"],'j F, Y, g:i a');
		
			$news_article_url= __bn_getArticleURL($news_article_info);
			
			$related_news_html .='<li><h5><a href="'.$news_article_url.'">'.$news_article_title.'</a></h5><div class="box-meta">'.$news_article_pub_date.'</div></li>';
			}
			$related_news_html .='</ul></div><!--eof related news-->';
		}
	return 	$related_news_html;
}


function formatDescription($info){
 
 $description=$info['description'];  
 $meta_keywords=utf8_encode($info['meta_kw']);
 $comment_type=(array_key_exists('article_id',$info))?"articles":"catarticles";
 
//$description=utf8_encode($description);
//$description=utf8_decode($description);
$search = array('�','–','—','t’','é','è','ó','…','®','“','”','™');
$replace = array('`','-','-' ,'�','�','�','�','-','�','-','-','-','-',);
$description = str_replace($search,$replace,$description);
//$description=str_ireplace('��','-',$description);
//$description=str_ireplace( '��','`',$description);
//$description=str_ireplace('�','`',$description);
$description=str_replace( ' hoe',' hope',$description);

$description=str_ireplace( '&amp;','&',$description);


if($meta_keywords){
    $description=getDesToMakeBoldKeywd($description,$meta_keywords);    
}

if($info['make_link']){
$description = getDesToMakeLinkBuilders($description);
}

if($comment_type=="catarticles"){
  if($info['no_index']){
    $rpls='<a href="'.CURRENT_URL.'">'.$info['menu_text'].'</a>';
    $description=str_replace('&ldquo;insert category&rdquo;',$rpls,$description);
  }  
}


$description=str_replace('href="../content/',SCRIPT_URL.'content/',$description);
$description=str_ireplace('<br /> <br />','</p><p>',$description);
$description=str_ireplace('<p></p>','',$description);
$description=str_ireplace('<br>','</p><p>',$description);
$description=str_ireplace('<br/>','</p><p>',$description);
$description=str_ireplace('<br >','</p><p>',$description);
$description=str_ireplace('<br />','</p><p>',$description);
$description=str_ireplace('<p>&nbsp;</p>','',$description);
$description=str_ireplace('<br />','',$description);

//$description=str_ireplace('��','',$description);
//$description=str_ireplace('�','`',$description);
$description=str_ireplace('````','',$description);
$description=utf8_encode($description);
return   $description;
}

function unhtmlentities($str){
	$return = '';
	$final = '';
	$search = array('–','—','t’','é','è','ó','…','®','“','”','™');
	$replace = array('-','-','�','�','�','�','-','�','-','-','-','-');
	$return = str_replace($search,$replace,$str);
	$ret_array = preg_split('//', $return);
	foreach ($ret_array as $val) {
		if (ord($val) < 128) $final .= $val;
	}
	return $final;
}

function getDesToMakeBoldKeywd($description,$meta_keywords){
    
    $meta_keywords=getSettings('SCRIPT_META_KEYWORD');
    
    
    $keywords=str_replace(',',' ',$meta_keywords);
    $keywords=explode(" ",trim($keywords));
    $keywords = array_unique($keywords);
    if($keywords){
        foreach($keywords as $k=>$key){
            if(strlen($key)>2){
                if(stristr($meta_keywords, $key) === FALSE) {
                    $description=str_ireplace(' '.$key,' <b>'.$key.'</b>',$description);
                    
                } 
            }
        }  
    }    
    return $description;    
}
function getPosition($description){
        
    $mpos = stripos($description, '</p>');
	
    $fpos= stripos($description, '<br />');
	if($fpos==false || $fpos>750){
	$fpos= stripos($description, '.<');
	}
    
    $pos = $mpos;
    if($pos === false){
        $pos = $fpos;
        $pos=$pos+1;
    }elseif($pos < 300 ){
        $pos= $pos;
    }else{

	   $fpos = (int) $fpos;
 
       $subdescription=substr($description,$fpos);
       $spos = stripos($subdescription, ". ");
		if($spos==false){
		$spos = stripos($subdescription, ".<");
	   	}
     $pos= (($fpos + $spos) +1);

    }

    #echo "m=".$mpos."&nbsp;&nbsp;f=".$fpos."&nbsp;&nbsp;sf=".$spos."&nbsp;&nbsp;final=".$pos;
    $pos =($pos>$mpos)?$mpos:$pos;
    return $pos;
}
function __getPosition($description){
        
    $mpos = stripos($description, '</p>');
	
    $fpos= stripos($description, '. ');
	if($fpos==false || $fpos>350){
	$fpos= stripos($description, '.<');
	}
    
    $pos = $mpos;
    if($pos === false){
        $pos = $fpos;
        $pos=$pos+1;
    }elseif($pos < 300 ){
        $pos= $pos;
    }else{

	   $fpos = (int) $fpos;
 
       $subdescription=substr($description,$fpos);
       $spos = stripos($subdescription, ". ");
		if($spos==false){
		$spos = stripos($subdescription, ".<");
	   	}
     $pos= (($fpos + $spos) +1);

    }

    #echo "m=".$mpos."&nbsp;&nbsp;f=".$fpos."&nbsp;&nbsp;sf=".$spos."&nbsp;&nbsp;final=".$pos;
    $pos =($pos>$mpos)?$mpos:$pos;
    return $pos;
}



function get_view_article_images($images,$img_srccc){

#pre($images);
#if(!$image) return false;

$i_height=240; 
if($images){
$view_image='';
$slideShow=(count($images)>1)?true:false;
$image_info=$images[0];
//foreach($images as $k=>$image_info){
    $image_src=SCRIPT_URL.$image_info['image_path'].$image_info['image_name'];
    
     list($o_width, $o_height, $o_type, $o_attr) = @getimagesize($image_src);
    
    if($o_height){
    
    $i_width= ceil(($i_height/$o_height)*$o_width);
    }else{
       $i_width=230; 
    }
    if($i_width>300){
        $i_width=300;
    }
  

   $view_image .='<img src="'.$image_src.'" alt="IMG" width="'.$i_width.'" height="'.$i_height.'">';
   
//}
$view_image .='';

}else{
    
    list($o_width, $o_height, $o_type, $o_attr) = @getimagesize($img_srccc);
    
    if($o_height){    
        $i_width= ceil(($i_height/$o_height)*$o_width);
    }else{
       $i_width=230; 
    }
    if($i_width>300){
        $i_width=300;
    }
    
   $view_image ='<img src="'.$img_srccc.'" alt="IMG" width="'.$i_width.'" height="'.$i_height.'">'; 
}

echo '<style type="text/css">
.left_glads{width:260px; float:left;}
.right_glads{width:355px; float:right;}
.right_glads img{width:'.$i_width.'px;height:'.$i_height.'px;}
</style>';


return  $view_image;   
}



function makeRandKeywords($keywords){

if(!$keywords) return false;
if (strpos($keywords, ',') === false){
    $keywords =str_ireplace(" ",", ",$keywords);
}

$keyarray=explode(",",$keywords);

$count=count($keyarray);
if($count > 1){
$newkeywords=array();
$rand_keys = array_rand($keyarray, (int)($count/2));

if($rand_keys){
	if(is_array($rand_keys)){
		foreach($rand_keys as $k =>$v){    
		    $newkeywords[]=$keyarray[$v];
		}
	}
	
}

$except_newkeywords = @array_diff($keyarray, $newkeywords);
$new_keywords = array_merge($newkeywords, $except_newkeywords);
}else{
	$newkeywords=$keyarray;
}


$nkeywords="";
if($new_keywords){
foreach ($new_keywords as $kk => $vv){
     $randconjection=getRandConjunstions();
     if($kk == "0"){
        $nkeywords .=$randconjection.' '.$vv;
     }else{
        $nkeywords .= ", ".$randconjection.' '.$vv;
     }
}
$nkeywords=str_replace(",  ",", ",$nkeywords);
}


return $nkeywords;
}



function getFromKeywords($keywords){
    global $db;
    
    $keywordphrases  = $db->select("SELECT LENGTH( `key_word` ) AS tlen, id, `key_word` , `key_tags` FROM `keywords` WHERE `key_tags` !='' AND status=1 ORDER BY tlen DESC");
    if($keywordphrases){    
        foreach($keywordphrases as $k => $val){
           if (stripos($keywords, " ".$val['key_word']." ") !== false){

		#	echo "<br/>".$keywords .' == '. $val['key_word'];	
            return $val['key_tags'];
           }
        }
    }    
    return false;
} 


function getDesToMakeLinkBuilders($description){
    global $db;
    #$link_builders= $db -> select("SELECT *  , LENGTH( `key_word` ) AS tlen FROM `linkbuilders` ORDER BY tlen DESC LIMIT 1000");
    $link_builders= $db -> select("SELECT id,`key_word`,`key_link`  , LENGTH( `key_word` ) AS tlen FROM `keywords` WHERE `key_link` !='' ORDER BY tlen DESC LIMIT 1000");
    if($link_builders){

        foreach($link_builders as $k=>$val){
            
             $key_word=$val['key_word'];

		#	if (stripos($description, $key_word) !== false){  	echo $key_word." found<br/>";}

            $key_link=$val['key_link'];
            $keylink=' <a href="'.$key_link.'">'.$key_word.'</a>';
 # echo $keylink."s$k<br/>";

            $description=str_ireplace(' '.$key_word.' ',' '.$keylink.' ',$description);
            $description=str_ireplace('&nbsp;'.$key_word.'&nbsp;',' '.$keylink.' ',$description);            
            $description=str_ireplace('<strong>'.$key_word.'</strong>','<strong>'.$keylink.'</strong>',$description);
            $description=str_ireplace('<b>'.$key_word.'</b>','<b>'.$keylink.'</b>',$description);
            
            #$description=str_ireplace(' '.$key_word,' '.$keylink,$description);
            #$description=str_ireplace($key_word.' ',$keylink.' ',$description);
            
            $description=str_ireplace($key_word.',',$keylink.',',$description);
            #$description=str_ireplace(' '.$key_word.'.',' '.$keylink.' ',$description);
            #$description=str_ireplace('>'.$key_word.' ',$keylink.' ',$description);


        }  
    } 

    return $description;    
}


function getArticleUrl($article_id_seotitle_info,$default="/"){
	global $db;	
    
    if(is_array($article_id_seotitle_info)){
		$article_info=$article_id_seotitle_info;
	}else{
	   $article_info=getArticleInfo($article_id_seotitle_info);
	}
    
    if(!$article_info)return false;

    $section_path=getSectionPath($article_info['cat_id'],false);
    if(!$section_path)return false;	
    $path=$section_path.$article_info['seo_title'];
	if($default){
        	return $path.$default;
    }
    return $path;
}

function getArticleInfo($article_id_seotitle){
	global $db;	
	
	if(is_numeric($article_id_seotitle)){
		$row=$db->getRowArray('articles',array('article_id'=>$article_id_seotitle));
	}else{
		$row=$db->getRowArray('articles',array('seo_title'=>$article_id_seotitle));
	}		
	return $row;
}

function getArticleId($article_seotitle){
	global $db;
	
	$row=$db->getRowArray('articles',array('seo_title'=>$article_seotitle),'article_id');
	return $row['article_id'];
}
function getArticleSectionId($article_id_seotitle){
	global $db;
	
    if(is_numeric($article_id_seotitle)){
		$row=$db->getRowArray('articles',array('article_id'=>$article_id_seotitle),'cat_id');
	}else{
		$row=$db->getRowArray('articles',array('seo_title'=>$article_id_seotitle),'cat_id');
	}    
	return $row['article_id'];
}

function getAtricleImages($article_id_seotitle){
	global $db;
    
  	if(is_numeric($article_id_seotitle)){
		$article_id=$article_id_seotitle;
	}else{
		$article_id=getArticleId($article_id_seotitle);
	}
      
    $images=getImages('articles',$article_id);   
	return $images;
}

function getConjunstions(){
    
    $conjunstions = array('above all','after', 'after all', 'after that', 'all the same', 'although','and','as','as far as','as how','as if','as long as','as soon as','as though','as well as','because','before','both','but','can be','either','especially','even','even so','even though','eventually','finally','first of all','for','for example','for instance','how','however','if','if only','in','in case','in order that','in spite of','it','in','mainly','neither','nor','now','of course','once','only','or','particularly','perhaps ...','provided','rather','since','so','so that','still','than','that','then','though','till','unless','until','that\'s why','when','whenever','where','whereas','wherever','whether','while','yet','your');
    return $conjunstions;
}

function makeMetaTitle($meta_title){
#echo $meta_title;
    $conjunstions = getConjunstions();
    foreach($conjunstions as $k=>$wthoutvalue){
        $meta_title =str_ireplace(' '.$wthoutvalue.' '," ",$meta_title);
        #$meta_title =str_ireplace($wthoutvalue." "," ",$meta_title);
    }


    $meta_title =str_ireplace('?',"",$meta_title);
	$meta_title =str_ireplace('how ',"",$meta_title);
    return $meta_title;
}

function getRandConjunstions($limit=2){
    
    $conjunstions = getConjunstions();
    $rand_keys = array_rand($conjunstions, 2);
    
    return $conjunstions[$rand_keys['0']] .' '.$conjunstions[$rand_keys['1']]; 
}
?>