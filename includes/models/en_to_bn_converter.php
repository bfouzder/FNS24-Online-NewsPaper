<?php
#number_converter.php
function converter($val, $echo =false) {
	$letters = str_split($val);
	for($i=0;$i<sizeof($letters);$i++)
	{
		if($letters[$i]=='1'){
            $letters[$i] = "১";
		}else if($letters[$i]=='2'){
		    $letters[$i] = "২";
		}else if($letters[$i]=='3'){
            $letters[$i] = "৩";
		}else if($letters[$i]=='4'){
		    $letters[$i] = "৪";
		}else if($letters[$i]=='5'){
            $letters[$i] = "৫";
		}else if($letters[$i]=='6'){
		$letters[$i] = "৬";
		}else if($letters[$i]=='7'){
		$letters[$i] = "৭";
		}else if($letters[$i]=='8'){
		$letters[$i] = "৮";
		}else if($letters[$i]=='9'){
		$letters[$i] = "৯";
		}else if($letters[$i]=='0'){
		$letters[$i] = "০";
		}
		
		if($echo){
			echo $letters[$i];	
		}else{
			return $letters[$i];	
		}
	
	}
}


function ar_en_to_bn_converter($val, $echo =false){
	$letters = str_split($val);
	//print_r($letters);
	for($i=0;$i<sizeof($letters);$i++)
	{
		if($letters[$i]=='1'){
		$letters[$i] = "১";
		}else if($letters[$i]=='2'){
		$letters[$i] = "২";
		}else if($letters[$i]=='3'){
		$letters[$i] = "৩";
		}else if($letters[$i]=='4'){
		$letters[$i] = "৪";
		}else if($letters[$i]=='5'){
		$letters[$i] = "৫";
		}else if($letters[$i]=='6'){
		$letters[$i] = "৬";
		}else if($letters[$i]=='7'){
		$letters[$i] = "৭";
		}else if($letters[$i]=='8'){
		$letters[$i] = "৮";
		}else if($letters[$i]=='9'){
		$letters[$i] = "৯";
		}else if($letters[$i]=='0'){
		$letters[$i] = "০";
		}
		if($echo){
			echo $letters[$i];	
		}
	
	}

	if(!$echo){
		return implode('',$letters);	
	}
}
#extra
function trunc_words($content, $world_limit=20){
    
    $content=strip_tags($content);
	//Get first 20 words from a lot of words
	$sBrief=implode(' ', array_slice(explode(' ', $content), 0, $world_limit));
	return $sBrief;
}
function short_excerpts($string, $word_limit = 30)
{
	$string=strip_tags($string);
    $words = explode(" ",$string);
    
    return implode(" ",array_splice($words,0,$word_limit));
}
function fGetWordsCount($sBrief, $iWordsNo){
	//Get list of words and provide how many words you want to show
	$sBrief=implode(' ', array_slice(explode(' ', $sBrief), 0, $iWordsNo));
	return $sBrief;
}

#date Format
function ar_FormatDateEn2Bn($BDDate, $format=false){
	
	$BDDate=($format)?date($format, @strtotime($BDDate)):$BDDate;
	//Convert a English date to Bangla date
	$en=array("AM","PM","am","pm","Saturday","Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","January","February","March","April","May","June","July","August","September","October","November","December","0","1","2","3","4","5","6","7","8","9");
	$bn=array("এএম","পিএম","এএম","পিএম","শনিবার","রবিবার","সোমবার","মঙ্গলবার","বুধবার","বৃহস্পতিবার","শুক্রবার","জানুয়ারি","ফেব্রুয়ারি","মার্চ","এপ্রিল","মে","জুন","জুলাই","আগস্ট","সেপ্টেম্বর","অক্টোবর","নভেম্বর","ডিসেম্বর","০","১","২","৩","৪","৫","৬","৭","৮","৯");
	$BDDate=str_replace($en,$bn,$BDDate);
	return $BDDate;
}
function ar_FormatMonth2Number($sMonth){
	//Converts a month's numbers
	$en=array("January","February","March","April","May","June","July","August","September","October","November","December");$bn=array("01","02","03","04","05","06","07","08","09","10","11","12");$sMonth=str_replace($en,$bn,$sMonth);
	return $sMonth;
}

function ar_FormatDate_forDB($sDate){
	//Converts a date to MySQL data value
	//Workable for DatePicker or jQuery UI DatePicker
	$sDate=str_replace('/', '-', $sDate);
	$sDate=date("Y-m-d", strtotime($sDate));
	return $sDate;
}



$ar_html='<!DOCTYPE HTML>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="author" content="aditya Email : info@thearsoft.com" />
	<meta name="viewport" content="width=device-width, initial-scale=1"/>
    <title>En to BN Converter</title>
	</head>
<body style="background:#bce6fc;">
'. ar_FormatDateEn2Bn($BDDate=date('j F, Y')).'
</body>
</html>';

?>