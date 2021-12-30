<?php
function showPage($data = array(),$disaply = 'PAGE'){
	global $lang,$db,$session;
	
	// Set the default data variables
	if($data){foreach ($data as $k=>$val){$$k = $val;}}

	switch($disaply){
		case 'PAGE':
			require(GET_TEMPLATE_DIRECTORY.'/header.php');
			require(TEMPLATE_STORE.$data['contentView']);
			require(GET_TEMPLATE_DIRECTORY.'/footer.php');
			break;
			
		case 'LIGHTBOX':
			require(TEMPLATE_STORE.$data['contentView']);		
			break;
	}
}

function ar_timthumb_image($image_src,$image_width=120,$image_height=67,$zc=1,$echo=false,$timthumb=true){

    $zc =($zc)?$zc:1;
    $news_image=$image_src;
    $no_image=WWW_RESOURCE_STORE.'images/noimage.png';
    if($timthumb){
    $p_image=($news_image)?'<img src="'.SCRIPT_URL.'includes/3rdParty/timthumb.php?src='.$news_image.'&h='.$image_height.'&w='.$image_width.'&zc='.$zc.'" class="img-responsive2">':'<img src="'.$no_image.'" width="'.$image_width.'" alt="noimage"  class="img-responsive">';    
    }else{
        $p_image=($news_image)?'<img src="'.$news_image.'" width="'.$image_width.'" height="'.$image_height.'">':'<img src="'.$no_image.'" width="'.$image_width.'" height="'.$image_height.'" alt="noimage"  class="img-responsive">';
    }

    if($echo){
        echo $p_image;
    }else{
    return   $p_image;    
    }
}

function pick_page_info($page_name , $mother=false , $apply=0 , $myval=false){
	
  		global $db;
  		
  		$page_info = $db->querySingle("*" , "page_info" , "page_name='".$page_name."'");
  		
  		if($apply == 0)
	  	{	  			
		  		return $page_info;
	  	}
  		else
  		{
  			if($mother)
  			{  	
  				if($myval)
  				{
  					//$mother->page_title = $page_info['page_title'];
  					$temp = $myval;
  					if($page_info['title_prefix'] !='')$temp = $page_info['title_prefix'] . ' ' . $temp; 
  					if($page_info['title_suffix'] !='')$temp = $temp . ' ' . $page_info['title_suffix']; 
  					
  					
  					if($page_info['append_style'] == 0)
  						$mother->page_title = $page_info['page_title'] .' '. $temp;
  					else
					  	$mother->page_title = $temp . ' ' . $page_info['page_title'];	
  				}
  				else
  					$mother->page_title = $page_info['page_title'];
    	  			$mother->meta_keywords = $page_info['meta_keywords'];
    	  			$mother->meta_description = $page_info['meta_description'];
				
  			}
			return $page_info;
  		}
  	}
  	


function redirect($url=false){ 
	header("Location: ".SCRIPT_URL.$url); 
	exit;
	}



//function setLanguagesInfo($language){
//	global $session,$db;
//	$data=$db->getRowArray('languages', array('code'=>strtolower($language)),'directory');
//	if($data){
//			return $data['directory'];
//	}else{
//		return 'english';
//	}
//}
//function load_lang()
//	{
//		global $language,$lang;
//		require_once(DIR_LANGUAGES.$language.'/'.$language.'.php');	
//		
//		return $lang;	
//	}
	
//	function load_page_lang($file_name)
//	{
//		global $language;global $lang;
//		
//		if(file_exists(DIR_LANGUAGES.$language.'/child/'.$file_name.'.php')){
//		@require_once(DIR_LANGUAGES.$language.'/child/'.$file_name.'.php');
//		$lang = array_merge($lang, $lang_child);	
//		}else{
//			return false;
//		}
//		//return $lang_child;
//	}
	
	//function append_lang($lang,$file_name)
//	{	
//		require_once(DIR_LANGUAGES.state('ln').'/child/'.$file_name.'.php');
//		$lang = array_merge($lang, $lang_child);
//		
//		return $lang;
//	}
//	
//	function lang_value($key)
//	{
//		GLOBAL $lang;
//		return $lang[$key];
//	}
	
	


function state($key, $value = FALSE, $newline = FALSE){
	global $session,$db;
		
		$valueOld = $session->userdata($key);
		if ($value !== FALSE){
			if ($valueOld == FALSE) {
				$session->set_userdata($key, $value);
			} else {
				if ($newline) $value = $valueOld . "\n" . $value;
				$session->set_userdata($key, $value);
			}
		}else{
			return $session->userdata($key);
		}
}

function ar_cookie($key, $value = FALSE, $days = 30, $domain='.fns24.com'){
    $exp_time= time()+3600*24*$days;
    
    if($value){
        if($_SERVER['HTTP_HOST']!='localhost'){
            setcookie($key, $value, $exp_time,'/',$domain,false,false);
        }else{
            setcookie($key, $value, $exp_time);  
        }
	}
    
    return $_COOKIE[$key]; 
}

function cookie_state($item){
    if(isset($item)){
       	if(isset($_COOKIE['fouzder'])){       	    
            $cookies = unserialize(base64_decode($_COOKIE['fouzder']));
            if($cookies){
                return $cookies[$item];    
            }
		}
	}
    return false;
}
/****************************************************************************/ 
 function make_pagination($sql,$page=false,$per_page=false,$total_data=false){
			global $db;
			
			$per_page=($per_page)?$per_page:getSettings('PAGING_PER_PAGE');
			$curr_page=($page<=0)?1:$page;			
			$start_form=($curr_page-1)*$per_page;
			
			//echo $sql.'<br/>';
			$total=($total_data)?$total_data:$db->affected($sql);
			
			$total_page=ceil($total/$per_page);				
			
			//bof extra
			$page_list =array();
			if($total_page > 1){
					if($total_page > 9){
							$start = $curr_page-5;
							if($start < 1)
									$start = 1;
											
							$end = $start + 9;
							if($end > $total_page){
									$end = $total_page;
									$start = $end - 9;
							}
					}else{
							$start = 1;
							$end = $total_page;
					}
			
				for($i=$start;$i<=$end;$i++){
						$page_list[$i]=$i;
				}
			}
			//eof extra
			
			
			
			$pages=array();
			$pages['per_page']=$per_page;
			$pages['start_form']=$start_form;
			$pages['curr_page']=$curr_page;
			$pages['total_page']=$total_page;				
			$pages["first"] = 1;
			$pages["last"] = $total_page;
			if($curr_page<$total_page)
			$pages['next_page']=$curr_page+1;
			if($curr_page>1)
			$pages['prev_page']=$curr_page-1;
			
			$pages["page_list"] = $page_list; //extra 
			$pages["total_data"] = $total; //extra 

	return $pages;
}
 function make_pagination_all($sql,$page=false,$per_page=false,$total_data=false){
			global $db;
			
			$per_page=($per_page)?$per_page:getSettings('PAGING_PER_PAGE');
			$curr_page=($page<=0)?1:$page;			
			$start_form=($curr_page-1)*$per_page;
			
			
			$total=($total_data)?$total_data:$db->affected($sql);
			
			$total_page=ceil($total/$per_page);				
if($curr_page < 14 ){
$ar_pagelimit=9;
}elseif($curr_page < 100 ){
$ar_pagelimit=8;
}else{
$ar_pagelimit=6;
}			

			//bof extra
			$page_list =array();
			if($total_page > 1){
					if($total_page > $ar_pagelimit){
							$start = $curr_page-5;
							if($start < 1)
									$start = 1;
											
							$end = $start + $ar_pagelimit;
							if($end > $total_page){
									$end = $total_page;
									$start = $end - $ar_pagelimit;
							}
					}else{
							$start = 1;
							$end = $total_page;
					}
			
				for($i=$start;$i<=$end;$i++){
						$page_list[$i]=$i;
				}
			}
			//eof extra
			
			
            /*
            	for($i=1;$i<=$total_page;$i++){
						$page_list[$i]=$i;
				}*/
			
			$pages=array();
			$pages['per_page']=$per_page;
			$pages['start_form']=$start_form;
			$pages['curr_page']=$curr_page;
			$pages['total_page']=$total_page;				
			$pages["first"] = 1;
			$pages["last"] = $total_page;
			if($curr_page<$total_page)
			$pages['next_page']=$curr_page+1;
			if($curr_page>1)
			$pages['prev_page']=$curr_page-1;
			
			$pages["page_list"] = $page_list; //extra 
			$pages["total_data"] = $total; //extra 

	return $pages;
}

// ALL RELATED TO MAIL	
function send_emailer($mailer = array()){
    
    if($_SERVER['HTTP_HOST'] == 'localhost'){return true;}

    if($mailer['subject']=="" && $mailer['to_email']=="")return false;
    
    $from_email=isset($mailer['from_email'])?$mailer['from_email']:'no-reply@fns24.com';
    $from_name=isset($mailer['from_name'])?$mailer['from_name']:'FNS24';
    $to_name=$mailer['to_name'];
    $to_email=$mailer['to_email'];
    $subject=$mailer['subject'];
    $message=nl2br($mailer['message']);
    $message=stripslashes(rtrim(str_replace("\r", "", $message)));
	
    // To send HTML mail, the Content-type header must be set
    $headers  = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
    
    // Additional headers
    $headers .= 'To: '.$to_name.' <'.$to_email.'>' . "\r\n";
    $headers .= 'From: '.$from_name.' <'.$from_email.'>' . "\r\n";
   
    
    // Mail it
    if(@mail($to_email, $subject, $message, $headers)){
        return true;
    }else return false;
}

function make_data_array_from_CSVFiles($csv_file,$excluding_first_line=true){
		
		/* $csv_file means path to csv files */
		$excluding_first_line;
		$buffer=array();
			$handle = fopen($csv_file, "r");
			while (!feof($handle)) {
				$buffer[] = fgets($handle, 9096);
			}
			fclose($handle);
			
	return $buffer;		
}


 
function readCSVFiles($csv_file,$excluding_first_line=true){
		
		/* $csv_file means path to csv files */

		require_once(BASE_DIR."includes/classes/csv.class.php");

		$csv = new phpCSV();
		$csv->setFetchLimit(5);
		$csv->open($csv_file, 'r');
		$csv->setFirstRowContainsColumnHeadings($excluding_first_line);

		while(!$csv->getEOF()) {
			$result = $csv->fetch();
			if($result <> false) {
				//echo "".$csv->attributes['csv']['result']['heading'][0][0] ." ".$csv->attributes['csv']['result']['heading'][0][0]."</b><br/>"; 
				foreach($csv->attributes['csv']['result']['data'] as $row => $column) {
					/*
					$value ="";
					for($i=0; $i<count($column);$i++){
						$value .= $csv->getValue($row, $i)." ";
					}
					$result_data[] = $value;	
					//echo "<br/>";
					*/
					$result_data[]=$column;
				}
			}
		}
		$csv->close();
		if($result_data){
			return $result_data;
		}else{
			return false;
		}
}
function mail_attachment($filename, $path, $mailto, $from_mail, $from_name, $replyto, $subject, $message) {
    /*
#Example on how-to use this function to send an e-mail message with one attached zip file:
$my_file = "somefile.zip";
$my_path = $_SERVER['DOCUMENT_ROOT']."/your_path_here/";
$my_name = "Olaf Lederer";
$my_mail = "my@mail.com";
$my_replyto = "my_reply_to@mail.net";
$my_subject = "This is a mail with attachment.";
$my_message = "Hallo,\r\ndo you like this script? I hope it will help.\r\n\r\ngr. Olaf";
mail_attachment($my_file, $my_path, "recipient@mail.org", $my_mail, $my_name, $my_replyto, $my_subject, $my_message);
 */
    
    $file = $path.$filename;
    $file_size = filesize($file);
    $handle = fopen($file, "r");
    $content = fread($handle, $file_size);
    fclose($handle);
    $content = chunk_split(base64_encode($content));
    $uid = md5(uniqid(time()));
    $name = basename($file);
    $header = "From: ".$from_name." <".$from_mail.">\r\n";
    $header .= "Reply-To: ".$replyto."\r\n";
    $header .= "MIME-Version: 1.0\r\n";
    $header .= "Content-Type: multipart/mixed; boundary=\"".$uid."\"\r\n\r\n";
    $header .= "This is a multi-part message in MIME format.\r\n";
    $header .= "--".$uid."\r\n";
    $header .= "Content-type:text/plain; charset=iso-8859-1\r\n";
    $header .= "Content-Transfer-Encoding: 7bit\r\n\r\n";
    $header .= $message."\r\n\r\n";
    $header .= "--".$uid."\r\n";
    $header .= "Content-Type: application/octet-stream; name=\"".$filename."\"\r\n"; // use different content types here
    $header .= "Content-Transfer-Encoding: base64\r\n";
    $header .= "Content-Disposition: attachment; filename=\"".$filename."\"\r\n\r\n";
    $header .= $content."\r\n\r\n";
    $header .= "--".$uid."--";
    if (mail($mailto, $subject, "", $header)) {
        echo "mail send ... OK"; // or use booleans here
    } else {
        echo "mail send ... ERROR!";
    }
}	
function showSitethumb($siteurl,$width=120,$height=90){
	//echo '<img src="http://images.websnapr.com/?size=S&key=N2QIAFp06G76&url='.$site_url.'" />';
	 echo '<img src="http://open.thumbshots.org/image.aspx?url='.$siteurl.'" width="'.$width.'" height="'.$height.'"  border="1" />';
}	
?>