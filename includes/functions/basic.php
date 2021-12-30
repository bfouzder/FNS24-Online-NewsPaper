<?php
function pre($value){ echo '<pre>'; print_r($value);echo '</pre>';}
function urlredirect($url=false){header("Location: ".$url);exit;}
function ar_serialize($data){
return base64_encode(serialize($data));
}
function ar_unserialize($data){
return unserialize(base64_decode($data));
}
function ar_link_it($text,$target=false)  
   {  

if($target){
  $text= preg_replace("/(^|[\n ])([\w]*?)([\w]*?:\/\/[\w]+[^ \,\"\n\r\t<]*)/is", "$1$2<a href=\"$3\" target='_blank'>$3</a>", $text);  
        $text= preg_replace("/(^|[\n ])([\w]*?)((www)\.[^ \,\"\t\n\r<]*)/is", "$1$2<a href=\"http://$3\" >$3</a>", $text);
      
}else{
  $text= preg_replace("/(^|[\n ])([\w]*?)([\w]*?:\/\/[\w]+[^ \,\"\n\r\t<]*)/is", "$1$2<a href=\"$3\" >$3</a>", $text);  
  $text= preg_replace("/(^|[\n ])([\w]*?)((www)\.[^ \,\"\t\n\r<]*)/is", "$1$2<a href=\"http://$3\" >$3</a>", $text);
}
                $text= preg_replace("/(^|[\n ])([\w]*?)((ftp)\.[^ \,\"\t\n\r<]*)/is", "$1$2<a href=\"ftp://$3\" >$3</a>", $text);  
        $text= preg_replace("/(^|[\n ])([a-z0-9&\-_\.]+?)@([\w\-]+\.([\w\-\.]+)+)/i", "$1<a href=\"mailto:$2@$3\">$2@$3</a>", $text);  
        return($text);  
    }
	
	
/**
* Turn all URLs in clickable links.
*
* @param string $value
* @param array $protocols http/https, ftp, mail, twitter
* @param array $attributes
* @param string $mode normal or all
* @return string
*/
    function ar_linkify($value, $protocols = array('http', 'https', 'ftp', 'mail', 'twitter'), array $attributes = array(), $mode = 'normal')
    {
        // Link attributes
        $attr = '';
        foreach ($attributes as $key => $val) {
            $attr = ' ' . $key . '="' . htmlentities($val) . '"';
        }

        $links = array();

        // Extract existing links and tags
        $value = preg_replace_callback('~(<a .*?>.*?</a>|<.*?>)~i', function ($match) use (&$links) { return '<' . array_push($links, $match[1]) . '>'; }, $value);

        // Extract text links for each protocol
        foreach ((array)$protocols as $protocol) {
            switch ($protocol) {
                case 'http':
                case 'https': $value = preg_replace_callback($mode != 'all' ? '~(?:(https?)://([^\s<]+)|(www\.[^\s<]+?\.[^\s<]+))(?<![\.,:])~i' : '~([^\s<]+\.[^\s<]+)(?<![\.,:])~i', function ($match) use ($protocol, &$links, $attr) { if ($match[1]) $protocol = $match[1]; $link = $match[2] ?: $match[3]; return '<' . array_push($links, '<a' . $attr . ' href="' . $protocol . '://' . $link . '">' . $link . '</a>') . '>'; }, $value); break;
                case 'mail': $value = preg_replace_callback('~([^\s<]+?@[^\s<]+?\.[^\s<]+)(?<![\.,:])~', function ($match) use (&$links, $attr) { return '<' . array_push($links, '<a' . $attr . ' href="mailto:' . $match[1] . '">' . $match[1] . '</a>') . '>'; }, $value); break;
                case 'twitter': $value = preg_replace_callback('~(?<!\w)[@#](\w++)~', function ($match) use (&$links, $attr) { return '<' . array_push($links, '<a' . $attr . ' href="https://twitter.com/' . ($match[0][0] == '@' ? '' : 'search/%23') . $match[1] . '">' . $match[0] . '</a>') . '>'; }, $value); break;
                default: $value = preg_replace_callback($mode != 'all' ? '~' . preg_quote($protocol, '~') . '://([^\s<]+?)(?<![\.,:])~i' : '~([^\s<]+)(?<![\.,:])~i', function ($match) use ($protocol, &$links, $attr) { return '<' . array_push($links, '<a' . $attr . ' href="' . $protocol . '://' . $match[1] . '">' . $match[1] . '</a>') . '>'; }, $value); break;
            }
        }

        // Insert all link
        return preg_replace_callback('/<(\d+)>/', function ($match) use (&$links) { return $links[$match[1] - 1]; }, $value);
    }
	

/** 
*This script to detect a mobile browser in PHP.
*The code detects a user based on the user-agent string by preg_match()ing words that are found in only mobile devices user-agent strings after hundreds of tests. It has 100% accuracy on all current mobile devices and I'm currently updating it to support more mobile devices as they come out. The code is called isMobile and is as follows:
// If the user is on a mobile device, redirect them
if(ar_isMobile()){
    header("Location: http://m.yoursite.com/");
}
**/


function ar_isMobile() {
	#return preg_match("/(android|avantgo|blackberry|bolt|boost|cricket|docomo|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i", $_SERVER["HTTP_USER_AGENT"]);
	$device=ar_check_device();
	if($device=='is_mobile'){
		return $device;	
	}
	return false;	
}
function ar_check_device(){

	$tablet_browser = 0;
	$mobile_browser = 0;
	$ipod_browser = 0; 
	
	$ua = strtolower($_SERVER['HTTP_USER_AGENT']);
	
	if (preg_match('/ipod/i', $ua)) 
    {
        $platform = 'iPod';
		$ipod_browser++;
    }

    if (preg_match('/ipad/i', $ua)) 
    {
        $platform = 'iPad';
		$ipod_browser++;
    }
	
	if (preg_match('/(tablet|ipad|playbook)|(android(?!.*(mobi|opera mini)))/i', $ua)) {
		$tablet_browser++;
	}
	 
	if (preg_match('/(up.browser|up.link|mmp|symbian|smartphone|midp|wap|phone|android|iemobile)/i', $ua)) {
		$mobile_browser++;
	}
	 
	if ((strpos(strtolower($_SERVER['HTTP_ACCEPT']),'application/vnd.wap.xhtml+xml') > 0) or ((isset($_SERVER['HTTP_X_WAP_PROFILE']) or isset($_SERVER['HTTP_PROFILE'])))) {
		$mobile_browser++;
	}
	 
	$mobile_ua = strtolower(substr($_SERVER['HTTP_USER_AGENT'], 0, 4));
	$mobile_agents = array(
		'w3c ','acs-','alav','alca','amoi','audi','avan','benq','bird','blac',
		'blaz','brew','cell','cldc','cmd-','dang','doco','eric','hipt','inno',
		'ipaq','java','jigs','kddi','keji','leno','lg-c','lg-d','lg-g','lge-',
		'maui','maxo','midp','mits','mmef','mobi','mot-','moto','mwbp','nec-',
		'newt','noki','palm','pana','pant','phil','play','port','prox',
		'qwap','sage','sams','sany','sch-','sec-','send','seri','sgh-','shar',
		'sie-','siem','smal','smar','sony','sph-','symb','t-mo','teli','tim-',
		'tosh','tsm-','upg1','upsi','vk-v','voda','wap-','wapa','wapi','wapp',
		'wapr','webc','winw','winw','xda ','xda-');
	 
	if (in_array($mobile_ua,$mobile_agents)) {
		$mobile_browser++;
	}
	  
	 

	if (strpos(strtolower($_SERVER['HTTP_USER_AGENT']),'opera mini') > 0) {
		$mobile_browser++;
		//Check for tablets on opera mini alternative headers
		$stock_ua = strtolower(isset($_SERVER['HTTP_X_OPERAMINI_PHONE_UA'])?$_SERVER['HTTP_X_OPERAMINI_PHONE_UA']:(isset($_SERVER['HTTP_DEVICE_STOCK_UA'])?$_SERVER['HTTP_DEVICE_STOCK_UA']:''));
		if (preg_match('/(tablet|ipad|playbook)|(android(?!.*mobile))/i', $stock_ua)) {
		  $tablet_browser++;
		}
	}
	
	if ($ipod_browser > 0) {
	   // do something for tablet devices
	   return 'is_ipod';
	}elseif ($tablet_browser > 0) {
	   // do something for tablet devices
	   return 'is_tablet';
	}else if ($mobile_browser > 0) {
	   // do something for mobile devices
	   return 'is_mobile';
	}else {
	   // do something for everything else
	   return 'is_desktop';
	}
}

function close_window($reload_parent=false){$script ="<script type=\"text/javascript\">";if($reload_parent)$script .="window.opener.location.reload();";$script .="window.close();</script>";echo $script;}
function valid_email($email_address){ return ( ! preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $email_address)) ? false : true; }

function IP_TO_LONG($remote_address){$long = ip2long($remote_address);if ($long == -1 || $long === FALSE) {/*echo 'Invalid IP, please try again';*/return false;} else {$ipnum=sprintf("%u", ip2long($remote_address));return $ipnum;}}
function LONG_TO_IP($ipnum){$ip_address=long2ip($ipnum);return $ip_address;}

function base64UrlEncode($url){return urlencode(base64_encode($url));}
function base64UrlDecode($url){return base64_decode(urldecode($url));}
 
function getFileExtention($file_name){if($file_name){$ext = substr($file_name,strrpos($file_name,"."),strlen($file_name));}return $ext;}


function read_file($filename) {$f=fopen($filename,"r");if(filesize($filename) <= 0){return 'No data inserted yet!';}else{$data=fread($f,filesize($filename));}fclose($f);return $data;}

function write_file($filename,$newdata,$checkplus=true){
	$w=($checkplus)?"w":"w+";
	$f=fopen($filename,$w);
	fwrite($f,$newdata);
	fclose($f);
	
	return $f;
}
function append_file($filename,$newdata,$checkplus=true) {
	
	$a=($checkplus)?"a":"a+";
	$f=fopen($filename,$a);
	
	fwrite($f,$newdata);
	fclose($f);
}

function prepend_file($filename,$newdata,$checkplus=true) {
	
	$a=($checkplus)?"r":"r+";
	$f=fopen($filename,$a);
	
	fwrite($f,$newdata);
	fclose($f);
}


function create_random_value($length=12, $type = 'mixed') {if ( ($type != 'mixed') && ($type != 'chars') && ($type != 'digits')) return false;$rand_value = '';while (strlen($rand_value) < $length) {if ($type == 'digits') {$char = rand(0,9);} else {$char = chr(rand(0,255));}if ($type == 'mixed') {if (preg_match('/^[a-z0-9]$/i', $char)) $rand_value .= $char;} elseif ($type == 'chars') {if (preg_match('/^[a-z]$/i', $char)) $rand_value .= $char;} elseif ($type == 'digits') {if (preg_match('/^[0-9]$/i', $char)) $rand_value .= $char;}}return $rand_value;}
function ce_create_random_value($length=12, $type = 'mixed') {if ( ($type != 'mixed') && ($type != 'chars') && ($type != 'digits')) return false;$rand_value = '';while (strlen($rand_value) < $length) {if ($type == 'digits') {$char = rand(0,9);} else {$char = chr(rand(0,255));}if ($type == 'mixed') {if (preg_match('/^[a-z0-9]$/i', $char)) $rand_value .= $char;} elseif ($type == 'chars') {if (preg_match('/^[a-z]$/i', $char)) $rand_value .= $char;} elseif ($type == 'digits') {if (preg_match('/^[0-9]$/i', $char)) $rand_value .= $char;}}return $rand_value;}

function displayPrice($price,$len=2,$format='$'){
	$displayprice=$format.number_format($price, $len, '.', ',');
	return $displayprice;}
function displayNumber($number,$len=2){$displaynumber=number_format($number, $len, '.', ',');return $displaynumber;}
	
function PubdateToDateTime($pubDate){/* $pubDate='Tue, 12 May 2009 04:27:27 GMT';*/$time=strtotime($pubDate);	/*1242102447 */$datetime=date('Y-m-d H:i:s', $time); /* 2009-05-12 04:27:27 */return $datetime;}
function apache_logdatetime_to_php_datetime($apache_logdatetime){
	/*$apache_log_datetime='03/Sep/2009:11:52:30';*/
	if(!$apache_logdatetime) return false;
	
	$time = explode(":",$apache_logdatetime);
	$date = explode("/",$time[0]);
	$result_time= mktime($time[1],$time[2],$time[3],date("m", strtotime($date[1])),$date[0],$date[2]); 
	/*RES=1242102447*/
	$date_time= date("Y-m-d H:i:s",$result_time);
	/*RES=2009-09-03 11:52:30*/
	return $date_time;
}
function mysql2timestamp($datetime){/*$datetime='2009-05-12 04:27:27';*/$val = explode(" ",$datetime);$date = explode("-",$val[0]);$time = explode(":",$val[1]);return mktime($time[0],$time[1],$time[2],$date[1],$date[2],$date[0]); /*1242102447*/}

function viewSize($size){
   // echo $size.'<br/>&';
        //$size=  hexdec($size);
          $size= str_replace('-','',$size);
     // echo $size.'<br/>===<br/>';

    
		if($size >= (1024*1024*1024)){
			$result= round($size/(1024*1024*1024), 2).'GB';
		}elseif($size >= (1024*1024)){
			$result= round($size/(1024*1024), 2).'MB';
		}elseif($size >= 1024){
			$result= round($size/1024, 2).'KB';
		}else{
			

			$result= $size .'bytes';
			$result=  viewSize(hexdec($size));
		}
		
	return $result;	
}
function date_time($datetime, $time=true){if($time){return date("M j, Y g:i a",strtotime($datetime));}else{return date("M j, Y",strtotime($datetime));}}

function getDateTimeDifference($datetime){
 	
 		/*$date['second'] = strtotime("now") - strtotime($datetime);*/
 		$date['second'] = time() - strtotime($datetime);
 		$time_minute = $date['second']/60;
 		if( $time_minute >= 1){
 			$time = (int)($time_minute);
 			$unit =  ($time >= 2)? "minutes": "minute";
 			
 			$time_hour = $time_minute/60;
		  	if($time_hour >= 1){
	 			$time = (int)($time_hour);
	 			$unit =  ($time >= 2)? "hours": "hour";
	 			
			    $time_day = $time_hour/24;
			    if( $time_day >= 1){
		 			$time = (int)($time_day);
		 			$unit =  ($time >= 2)? "days": "day";
		 			
				    $time_month = $time_day/30;
				    if( $time_month >= 1){
			 			$time = (int)($time_month);
			 			$unit =  ($time >= 2)? "months": "month";
			 			
			 			$time_year = $time_month/12;
			 			if($time_year >= 1){
			 			 $time = 1;	
			 			 $unit = "year(or more)";
			 			}//end year
		 			}//end month
			    }//end day
		    }//end hour
 		}//end minutes
		else{
		 $time = '';
		 $unit = 'Moments';
		}
		
 	  $date['time']	= $time; //5
 	  $date['unit']	= $unit; // minutes
 
 	return $date;
 
 }
 
 function getDateTimeToAgo($datetime){

         $time=time();
//$time = $time - ((60*60)*2);
 		/*$date['second'] = strtotime("now") - strtotime($datetime);*/
 		$seconds = $time - strtotime($datetime);
 		$time_minute = $seconds/60;
 		if( $time_minute >= 1){
 			$time = (int)($time_minute);
 			$unit =  ($time >= 2)? "minutes": "minute";
 			
 			$time_hour = $time_minute/60;
		  	if($time_hour >= 1){
	 			$time = (int)($time_hour);
	 			$unit =  ($time >= 2)? "hours": "hour";
	 			
			    $time_day = $time_hour/24;
			    if( $time_day >= 1){
		 			$time = (int)($time_day);
		 			$unit =  ($time >= 2)? "days": "day";
		 			
				    $time_month = $time_day/30;
				    if( $time_month >= 1){
			 			$time = (int)($time_month);
			 			$unit =  ($time >= 2)? "months": "month";
			 			
                         /*
			 			$time_year = $time_month/12;
			 			if($time_year >= 1){
			 			 $time = number_format($time_year,2);	
			 			 $unit =  ((int) $time >= 2)? "years": "year";
			 			}//end year
                        */
                        
		 			}//end month
			    }//end day
		    }//end hour
 		}//end minutes
		else{
		 $time = $seconds;
		 $unit = 'seconds';
		}

 	return $time." ".$unit ." ago" ;
 }
 
 function getListedDate($datetime,$time=false){
 	
 		$time_second = time() - strtotime($datetime);
 		$time_minute = $time_second/60;
 		$time_hour = $time_minute/60;
		$time_day = $time_hour/24;
		$time_day = (int)($time_day);
		
		if($time_day == 0){
			return 	$time_day= "Today";
		}elseif($time_day == 1){
			return 	"Yesterday";
		}else{
			if($time){
				return  date("F j, Y, g:i a");  // March 10, 2001, 5:16 pm
			}else{
				return  date("F j",strtotime($datetime));  // March 10, 2001, 5:16 pm
			}
		}
}

 function getImageUrlFromText($text){
	
		$imgurls=array();
		
		preg_match_all('/<img[^>]+>/i',$text, $results);
		if($results){	
			
			foreach($results as $k=>$result){
				foreach($result as $k=>$src){
					preg_match('/(src)=("[^"]*")/i',$src, $src_content);
					if($src_content){
						$imgurl=@str_replace('"','',$src_content[2]);
						$imgurls[]=$imgurl;	
					}else{
						preg_match("/(src)=('[^']*')/i",$src, $src_content2);
						if($src_content2){
						$imgurl=@str_replace("'",'',$src_content2[2]);
						$imgurls[]=$imgurl;
						}
					}
				}
			}
		}
   return $imgurls;
}
function getTestFromImageUrlText($text){

	$imgurls=array();
	
	preg_match_all('/<img[^>]+>/i',$text, $results);
	if($results){
		foreach($results as $k=>$result){
			$text=@str_replace($result,'',$text);
		}
	}
	
return $text;
}

function getTestFromTableText($text){

	$imgurls=array();
	
	preg_match_all('/<table[^>]+>/i',$text, $results);
	if($results){
		foreach($results as $k=>$result){
			$text=@str_replace($result,'',$text);
		}
	}
	
return $text;
}



 function getEndedDate($datetime,$unit='day'){
 	
 		$time_second = strtotime($datetime)-time();
 		$time_minute = $time_second/60;
 		$time_hour = $time_minute/60;
		$time_day = $time_hour/24;
		$time_day = (int)($time_day);
		
		if($time_day == 0){
			return 	$time_day= "Today".$unit;
		}elseif($time_day < 30) {
			$unit= ($time_day >= 2)? "days": "day";
			return 	$time_day= $time_day." ".$unit;	
		}else{
			$time_month = $time_day/30;
			$time_month = (int)($time_month);
			if($time_month<12){
				$unit= ($time_month >= 2)? "months": "month";
				return 	$time_month= $time_month." ".$unit;	
			}else{
				$time_year = $time_month/12;
				$time_year = (int)($time_year);
				$unit= ($time_year >= 2)? "years": "year";
				return 	$time_year= $time_year." ".$unit;	
			}
		}
}
 
function getCurrentCampaignDate($datetime){
 	
 		$time_second =  strtotime($datetime)-time();
 		$time_minute = $time_second/60;
 		$time_hour = $time_minute/60;
		$time_day = $time_hour/24;
		$time_day = (int)($time_day);
		
		return 	30-$time_day;	
}
 
 
 function getFormatedDate($date_in_y_mm_dd,$format){$year_leading = substr(date('Y'),0,2);$time = strtotime($year_leading.$date_in_y_mm_dd);return 	date($format,$time);   /*date: 090502 */}	
  
 function getCalenderDates(){
    $time = time();
    $month = date('m');
	 for($i= 0; $i< 30; $i++){
		 $x[$i]['date_f1'] = date('Y-m-d',$time);
		 $x[$i]['date_f2'] = date('ymd',$time);
	     $x[$i]['month']=(date('m',$time)==$month)?1:0;
	     $x[$i]['day']= date('d',$time);
		 $time = $time - (24 * 60 * 60);
	 }
  
    return  $x;
 }
/**********************************************************************************************/

function check_url($url){
	$host=str_replace(" ","",$url);
	$host_url = strstr(strtolower($host), 'http://')?$host:'http://'.$host;
	$parse_host_url=@parse_url($host_url);
  	$host_array=explode(".", $parse_host_url['host']);
   
   if(strtolower($host_array[0])=='www'){
	    if(count($host_array)<3){
			return false;
		}
	}else{
		if(count($host_array)<2){
			return false;
		}	
	}
	
	if(strlen($host_url) > 256){
		return false;
	}
	
	return $host_url;
}

function trunck_string($str = "", $len = 150, $more = 'true'){
    return  trunc_string($str, $len, $more);
}
function trunc_string($str = "", $len = 150, $more = 'true'){
    if ($str == "") return $str;
    if (is_array($str)) return $str;
    $str = trim($str);
    if (strlen($str) <= $len) return $str;
    /* else get that size of text*/
    $str = substr($str, 0, $len);
    /* backtrack to the end of a word*/
    if ($str != "") {
      if (!substr_count($str , " ")) {
        if ($more == 'true') $str .= "...";
        return $str;
      }
      /* backtrack */
      while(strlen($str) && ($str[strlen($str)-1] != " ")) {
        $str = substr($str, 0, -1);
      }
      $str = substr($str, 0, -1);
      if ($more == 'true') $str .= "...";
      if ($more != 'true' and $more != 'false') $str .= $more;
    }
    return $str;
}


function clean_html($clean_it, $extraTags = '') {
  	
  	if(!is_array($extraTags)) $extraTags = array($extraTags);

    $clean_it = preg_replace('/\r/', ' ', $clean_it);
    $clean_it = preg_replace('/\t/', ' ', $clean_it);
    $clean_it = preg_replace('/\n/', ' ', $clean_it);

    $clean_it= nl2br($clean_it);

	/* update breaks with a space for text displays in all listings with descriptions*/
    while (strstr($clean_it, '<br>'))   $clean_it = str_replace('<br>',   ' ', $clean_it);
    while (strstr($clean_it, '<br />')) $clean_it = str_replace('<br />', ' ', $clean_it);
    while (strstr($clean_it, '<br/>'))  $clean_it = str_replace('<br/>',  ' ', $clean_it);
    while (strstr($clean_it, '<p>'))    $clean_it = str_replace('<p>',    ' ', $clean_it);
    while (strstr($clean_it, '</p>'))   $clean_it = str_replace('</p>',   ' ', $clean_it);

	/* temporary fix more for reviews than anything else*/
    while (strstr($clean_it, '<span class="smallText">')) $clean_it = str_replace('<span class="smallText">', ' ', $clean_it);
    while (strstr($clean_it, '</span>')) $clean_it = str_replace('</span>', ' ', $clean_it);

	/* clean general and specific tags:*/
    $taglist = array('strong','b','u','i','em','p');
    $taglist = array_merge($taglist, (is_array($extraTags) ? $extraTags : array($extraTags)));
    foreach ($taglist as $tofind) {
      if ($tofind != '') $clean_it = preg_replace("/<[\/\!]*?" . $tofind . "[^<>]*?>/si", ' ', $clean_it);
    }

	/* remove any double-spaces created by cleanups:*/
    while (strstr($clean_it, '  ')) $clean_it = str_replace('  ', ' ', $clean_it);

	/* remove other html code to prevent problems on display of text*/
    $clean_it = strip_tags($clean_it);
    
    return $clean_it;
}
function special_clean_html($clean_it,$extraTags = ''){   
    
    $clean_it = preg_replace('/\r/', ' ', $clean_it);
    $clean_it = preg_replace('/\t/', ' ', $clean_it);
    $clean_it = preg_replace('/\n/', ' ', $clean_it);

    $clean_it= nl2br($clean_it);

	/* clean general and specific tags:*/
    $taglist = array('strong','b','u','i','em','br','BR','hr','h1','h2','h3','h4','table','span');
    if($extraTags){
    $taglist = array_merge($taglist, (is_array($extraTags) ? $extraTags : array($extraTags)));    
    }
        
    foreach ($taglist as $tofind) {
      if ($tofind != '') $clean_it = preg_replace("/<[\/\!]*?" . $tofind . "[^<>]*?>/si", ' ', $clean_it);
    }

	/* remove any double-spaces created by cleanups:*/
    while (strstr($clean_it, '  ')) $clean_it = str_replace('  ', ' ', $clean_it);    
    
    $clean_it = str_replace('<p></p>', '', $clean_it);    
    $clean_it = str_replace('<p> </p>', '', $clean_it);  
    return $clean_it;
}
 

function convert_size($size,$type='byte'){
		switch($type){
			case 'byte':
				$result= $size;
				break;
			case 'KB':
				$result= round($size/1024, 2);
				break;
			case 'MB':
				$result= round($size/(1024*1024), 2);
				break;
			case 'GB':
				$result= round($size/(1024*1024*1024), 2);
				break;			
		}
	return $result;	
}

//	$purl = makeurl(wrdrem($category['maincat'],'Attorneys'));
function makeurl($name)
{
$url = strtr($name,'ÀÁÂÃÄÅàáâãäåÒÓÔÕÖØòóôõöøÈÉÊËèéêëÇçÌÍÎÏìíîïÙÚÛÜùúûüÿÑñ/','AAAAAAaaaaaaOOOOOOooooooEEEEeeeeCcIIIIiiiiUUUUuuuuyNn-');
$url=preg_replace('/ /', '-', $url);
//$url=preg_replace('|', '-', $url);
$url=trim(preg_replace('/[^a-z|A-Z|0-9|-]/', '', strtolower($url)), '-');
$url=preg_replace('/\-+/', '-', $url);
$url = urlencode($url);
return $url;
} 

function wrdrem($phrase,$word){
	if($phrase != $word){
		$parray = explode (' ',$phrase);
		$pacount = count($parray);
		if(eregi(trim(strtolower($word)),$parray[floor($pacount-1)])){
			$phrase = str_replace($word,'',$phrase);
		}
	}
	return $phrase;											
}
function InStr($String,$Find,$CaseSensitive = false){
	$i=0;
	while (strlen($String)>=$i)
	{
	unset($substring);
	if ($CaseSensitive)
	{
	$Find=strtolower($Find);
	$String=strtolower($String);
	}
	$substring=substr($String,$i,strlen($Find));
	if ($substring==$Find) return true;
	$i++;
	}
	return false; 	
}
function make_seo_bangla($name)
{    
    $replace_array=array(
			'&curren;',
            '&nbsp;',
			'&lsquo;',
			'&rsquo;');
                        
	$name=str_ireplace($replace_array,'',trim($name));
    
	$name = str_replace(" ","-",$name);
	$remove_attr = array("‘",",", "’", ":", ".","!");
	$url = str_replace($remove_attr, '', trim($name));	
	$url = str_replace('/', '-', $url);
	$url = str_replace("--","-",$url);	
	$url=preg_replace('/ /', '-', $url);
    $url=preg_replace('/\-+/', '-', $url);
    $url = urlencode($url);
    return $url;
}

function make_seo($name)
{
    $url = strtr($name,'ÀÁÂÃÄÅàáâãäåÒÓÔÕÖØòóôõöøÈÉÊËèéêëÇçÌÍÎÏìíîïÙÚÛÜùúûüÿÑñ/','AAAAAAaaaaaaOOOOOOooooooEEEEeeeeCcIIIIiiiiUUUUuuuuyNn-');
    $url=preg_replace('/ /', '-', $url);
    $url=trim(preg_replace('/[^a-z|A-Z|0-9|-]/', '', strtolower($url)), '-');
    $url=preg_replace('/\-+/', '-', $url);
    $url = urlencode($url);
    return $url;
} 
function make_seo_title($str, $uid = FALSE){
 	
	/*html decode, in case it is coming encoded (AJAX request)*/
	$seo_title = rawurldecode($str);
	
	/*some characters that might create trouble*/
	$switch_chars = '(,),\,/';
	$sc = explode(',', $switch_chars);
    $seo_title = trunc_string(clean_html(stripslashes(trim($seo_title))),90,false);
    
	foreach ($sc as $c) $seo_title = str_replace($c, '-', $seo_title);
	
	/* leave only alphanumeric characters and replace spaces with hyphens*/
    $seo_title = strtolower(str_replace('--', '-', preg_replace('/[\s]/', '-', preg_replace('/[^[:alnum:]\s-]+/', '', $str))));
	$len = strlen($seo_title);
	
	if ($seo_title[$len - 1] == '-') $seo_title = substr($seo_title, 0, -1);
	if ($seo_title[0] == '-') $seo_title = substr($seo_title, 1, $len);
	if ($uid) $seo_title = $seo_title . '-' . $uid;
	
	return $seo_title;
}

function parse_seo_title($str, $returnIndex = 0){
    $parts = explode('-', $str);
    if (count($parts) > 0){
        switch($returnIndex){
            case -1:
                return $parts;
                break;        
            case 0:
                return $parts[count($parts) - 1];
                break;
            default:
                return $parts[$returnIndex - 1];
        }
    }
    return FALSE;
}

function getMetaInfo($url){
	
   $v= $url;
   if($v){$i = strpos($v,"\r\n\r\n");$headers = substr($v,0,$i);$v = substr($v,$i);}
   $enc = "auto";
   
   $m=array();
   preg_match('/charset=[\\s]*([a-z0-9\\-]+)/i', $headers, $m);
   if($m && @$m[1]){$enc = trim($m[1]);}
  
   $m=array();
   preg_match('/<meta\s+http\-equiv=[^>]+charset=([a-z0-9\\-]+)/i', $v, $m);
  	if($m && $m[1]){$enc = $m[1];$enc = trim($enc);}
  
   $m=array();
   preg_match('/<meta[^>]+charset=([a-z0-9\\-]+)[^>]+http\-equiv=/i', $v, $m);
   
   if($m && $m[1]){$enc = $m[1];$enc = trim($enc);}

   $v = mb_convert_encoding  ( $v, 'UTF-8', $enc);
   
   preg_match('/<title>(.*?)<\/title>/si', $v, $r);
   $page_title = $r[1]?$r[1]:"";
   
   preg_match('/<meta\s+name=\"descr.*?content=\"(.*?)\"/si', $v, $r);
   if (!$r[1])preg_match('/<meta\s+name=\'descr.*?content=\'(.*?)\'/si', $v, $r);
   if (!$r[1])preg_match('/<meta\s+http\-equiv=\'descr.*?content=\'(.*?)\'/si', $v, $r);
   
   $desc = $r[1]?$r[1]:"";
   preg_match('/<meta\s+name=\"keyw.*?content=\"(.*?)\"/si', $v, $r);
   if (!$r[1])preg_match('/<meta\s+name=\'keyw.*?content=\'(.*?)\'/si', $v, $r);
   if (!$r[1])preg_match('/<meta\s+content=\'(.*?)\'.*?name=\'keyw/si', $v, $r);
   if (!$r[1])preg_match('/<meta\s+content=\"(.*?)\".*?name=\"keyw/si', $v, $r);
   if (!$r[1])preg_match('/<meta\s+http\-equiv=\'keyw.*?content=\'(.*?)\'/si', $v, $r);
   $keys = $r[1]?$r[1]:"";
   if (!$keys || !$desc) { // do some fallback
    $r = "/tmp/".rand(1000, 10000).".html"; // faster than requesting the url
    file_put_contents($r, $v);
    $meta = get_meta_tags($r);
    unlink($r);
    $keys = $meta['keywords'];
    $desc = $meta['description'];
   }
   // do some work on the keywords for safety as people are, yes, morons.
   return array("title"=>$page_title, "description"=>$desc,"keywords"=>$keys);
}
//RSS Function
function MakeRSSFeed($channel_info, $items_info){
	
	// $channel_info AND $items_info must be array 
	//TAG HELP 
	//http://www.make-rss-feeds.com/rss-tags.htm
	
	/*
	$channel_info['title'] = 'Free eBooks Download';
	$channel_info['link'] = SCRIPT_URL;
	$channel_info['description'] = 'freebookspedia.com is a largest free ebooks provider in this world.';
	$channel_info['image_title'] ='Agriculture Information Service, Bangladesh';
	$channel_info['image_url'] =SCRIPT_URL.'images/logo.png';
	$channel_info['image_link'] =SCRIPT_URL;
	$channel_info['image_width'] ='240';
	$channel_info['image_height'] ='140';
	*/
	
	/*
	//PUT THIS CODE ON HEADER OR FOOTER ON THIS SITE
	*/
	
		$rss = '<?xml version="1.0" encoding="utf-8" ?>
			<rss version="2.0">
				<channel>						
					<title>'. $channel_info['title'] .'</title>
					<link>'. $channel_info['link'] .'</link>
					<description>'. $channel_info['description'] .'</description>
					<image>
						<title>'. $channel_info['image_title'] .'</title>
						<url>'. $channel_info['image_url'] .'</url>
						<link>'. $channel_info['image_link'] .'</link>
						<width>'. $channel_info['image_width'] .'</width>
						<height>'. $channel_info['image_height'] .'</height>
					</image>';
	
	if(is_array($items_info)){
		//ITEMS LIST
		foreach($items_info as $item){
			$rss .= '<item>
						 <title>'. $item["item_title"] .'</title>						 
						 <link>'.$item["item_link"].'</link>
						 <description><![CDATA[  '. $item["item_description"] .']]></description>
						 <pubDate>'.$item["item_pubDate"].'</pubDate>
					 </item>';
		}
	}
			
	$rss .= '</channel>
			 </rss>';
	
	return $rss;
}
?>