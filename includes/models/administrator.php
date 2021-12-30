<?php
		function getCountryNameFromCountryCode($countryCode){
			global $db;
			
			$countryName = $db->executeSingle('country_name','country',"country_code='$countryCode'");
			return $countryName;
		}
		
		function getAlexaRank($web_id,$site_url){
			global $db;
			require_once(BASE_DIR.'includes/classes/class.simple_html_dom.php');
			
			$html = file_get_html('http://www.alexa.com/siteinfo/'.$site_url);
			foreach($html->find('table#siteStats') as $element){
				foreach($element->find('div.up') as $rank){
					 $exists = $db->checkExists('ads_website_stats',array('web_id'=>$web_id),'web_id');
					 if($exists){
						$data['Alexa'] = str_replace('</a>','',$rank->plaintext);
					 	$db->doUpdate($data,'ads_website_stats','web_id='.$web_id);
					 }else{
					 	$data['web_id'] = $web_id;
					 	$data['Alexa'] = str_replace('</a>','',$rank->plaintext);
					 	$db->doInsert($data,'ads_website_stats');
					 }
				}
			}
		}
		
		
/** GOOGLE PAGE RANK*/
		function getPageRank($web_id,$url){
			
			//get google pagerank
		    echo $query="http://toolbarqueries.google.com/search?client=navclient-auto&ch=".CheckHash(HashURL($url)). "&features=Rank&q=info:".$url."&num=100&filter=0";
		    $data=file_get_contents_curl($query);
		    //print_r($data);
		    $pos = strpos($data, "Rank_");
		    if($pos === false){} else{
		        $pagerank = substr($data, $pos + 9);
		        	$exists = $db->checkExists('ads_website_stats',array('web_id'=>$web_id),'web_id');
					 if($exists){
						$data['PageRank'] = str_replace('</a>','',$pagerank);
					 	$db->doUpdate($data,'ads_website_stats','web_id='.$web_id);
					 }else{
					 	$data['web_id'] = $web_id;
					 	$data['PageRank'] = str_replace('</a>','',$pagerank);
					 	$db->doInsert($data,'ads_website_stats');
					 }
		    }

		}
		
		function file_get_contents_curl($url) {
		    $ch = curl_init();
		    curl_setopt($ch, CURLOPT_HEADER, 0);
		    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); //Set curl to return the data instead of printing it to the browser.
		    curl_setopt($ch, CURLOPT_URL, $url);
		    $data = curl_exec($ch);
		    curl_close($ch);
		
		    return $data;
		} 
		function CheckHash($Hashnum){
		    $CheckByte = 0;
		    $Flag = 0;
		
		    $HashStr = sprintf('%u', $Hashnum) ;
		    $length = strlen($HashStr);
		   
		    for ($i = $length - 1;  $i >= 0;  $i --) {
		        $Re = $HashStr{$i};
		        if (1 === ($Flag % 2)) {             
		            $Re += $Re;     
		            $Re = (int)($Re / 10) + ($Re % 10);
		        }
		        $CheckByte += $Re;
		        $Flag ++;   
		    }
		
		    $CheckByte %= 10;
		    if (0 !== $CheckByte) {
		        $CheckByte = 10 - $CheckByte;
		        if (1 === ($Flag % 2) ) {
		            if (1 === ($CheckByte % 2)) {
		                $CheckByte += 9;
		            }
		            $CheckByte >>= 1;
		        }
		    }
		
		    return '7'.$CheckByte.$HashStr;
		}
		function HashURL($String){
			
		    $Check1 = StrToNum($String, 0x1505, 0x21);
		    $Check2 = StrToNum($String, 0, 0x1003F);
		
		    $Check1 >>= 2;     
		    $Check1 = (($Check1 >> 4) & 0x3FFFFC0 ) | ($Check1 & 0x3F);
		    $Check1 = (($Check1 >> 4) & 0x3FFC00 ) | ($Check1 & 0x3FF);
		    $Check1 = (($Check1 >> 4) & 0x3C000 ) | ($Check1 & 0x3FFF);   
		   
		    $T1 = (((($Check1 & 0x3C0) << 4) | ($Check1 & 0x3C)) <<2 ) | ($Check2 & 0xF0F );
		    $T2 = (((($Check1 & 0xFFFFC000) << 4) | ($Check1 & 0x3C00)) << 0xA) | ($Check2 & 0xF0F0000 );
		   
		    return ($T1 | $T2);
		}
		
		function StrToNum($Str, $Check, $Magic){
		    $Int32Unit = 4294967296;  // 2^32
		
		    $length = strlen($Str);
		    for ($i = 0; $i < $length; $i++) {
		        $Check *= $Magic;     
		        //If the float is beyond the boundaries of integer (usually +/- 2.15e+9 = 2^31),
		        //  the result of converting to integer is undefined
		        //  refer to http://www.php.net/manual/en/language.types.integer.php
		        if ($Check >= $Int32Unit) {
		            $Check = ($Check - $Int32Unit * (int) ($Check / $Int32Unit));
		            //if the check less than -2^31
		            $Check = ($Check < -2147483648) ? ($Check + $Int32Unit) : $Check;
		        }
		        $Check += ord($Str{$i});
		    }
		    return $Check;
		}
		/** EOF GOOGLE PAGE RANK*/
	
?>