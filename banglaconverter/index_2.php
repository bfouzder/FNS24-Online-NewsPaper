<?php

/*
    Document   : Bijoy to Unicode to Bijoy converter
    Created on : Dec 10, 2013, 10:23:43 AM
    @author    : Md. Mosaddek
	@Copy Right: All Right Reserved
	@E-mail	   : saamok@gmail.com
  
  
*/



$from="hsdgfhshg45435";



$preConversionMap = array(
    ' +' => ' ',
    'yy' => 'y', //Double Hrosh-u-Kar
    'vv' => 'v', //Double Aa-Kar
    '­­' => '­', //Double Jukto-L - L+Double-L = Triple L
    'y&' => 'y', //Hoshonto+Hrosh-u
    '"&' => '"', //Hoshonto+Ri-Kar
    '‡u' => 'u‡', //ChondroBindu Error /Typing Mistake
    'wu' => 'uw', //ChondroBindu Error /Typing Mistake
    ' ,' => ',',
    ' \\|' => '\\|',
    '\\\\ ' => '',
    ' \\\\' => '',
    '\\\\' => '',
    '\n +' => '\n',
    ' +\n' => '\n',
    '\n\n\n\n\n' => '\n\n',
    '\n\n\n\n' => '\n\n',
    '\n\n\n' => '\n\n'
);

$conversionMap = array(
    // Vowels Start
    'Av' => 'আ',
    'A' => 'অ',
    'B' => 'ই',
    'C' => 'ঈ',
    'D' => 'উ',
    'E' => 'ঊ',
    'F' => 'ঋ',
    'G' => 'এ',
    'H' => 'ঐ',
    'I' => 'ও',
    'J' => 'ঔ',
    // Constants
    'K' => 'ক',
    'L' => 'খ',
    'M' => 'গ',
    'N' => 'ঘ',
    'O' => 'ঙ',
    'P' => 'চ',
    'Q' => 'ছ',
    'R' => 'জ',
    'S' => 'ঝ',
    'T' => 'ঞ',
    'U' => 'ট',
    'V' => 'ঠ',
    'W' => 'ড',
    'X' => 'ঢ',
    'Y' => 'ণ',
    'Z' => 'ত',
    '_' => 'থ',
    '`' => 'দ',
    'a' => 'ধ',
    'b' => 'ন',
    'c' => 'প',
    'd' => 'ফ',
    'e' => 'ব',
    'f' => 'ভ',
    'g' => 'ম',
    'h' => 'য',
    'i' => 'র',
    'j' => 'ল',
    'k' => 'শ',
    'l' => 'ষ',
    'm' => 'স',
    'n' => 'হ',
    'o' => 'ড়',
    'p' => 'ঢ়',
    'q' => 'য়',
    'r' => 'ৎ',
    's' => 'ং',
    't' => 'ঃ',
    'u' => 'ঁ',
    // Numbers
    '0' => '০',
    '1' => '১',
    '2' => '২',
    '3' => '৩',
    '4' => '৪',
    '5' => '৫',
    '6' => '৬',
    '7' => '৭',
    '8' => '৮',
    '9' => '৯',
    // Kars
    '•' => 'ঙ্',
    'v' => 'া', // Aa-Kar
    'w' => 'ি', // i-Kar
    'x' => 'ী', // I-Kar
    'y' => 'ু', // u-Kar
    'z' => 'ু', // u-Kar
    '"' => 'ু', // u-kar
    '–' => 'ু', // u-kar
    '~' => 'ূ', // U-kar
    'ƒ' => 'ূ', // U-kaar
    '‚' => 'ূ', // U-kaar
    '""' => 'ৃ', //Double Rri-kar Bug
    '"' => 'ৃ', // Ri-Kar
    '…' => 'ৃ', // Ri-Kar
    '†' => 'ে', // E-Kar
    '‡' => 'ে', // E-Kar
    'ˆ' => 'ৈ', // Oi-Kar
    '‰' => 'ৈ', // Oi-Kar
    'Š' => 'ৗ', // Ou-Kar
    '\\|' => '।', // Full-Stop
    '\\&' => '্‌', // Ho-shonto
    //	Jukto Okkhor
    '\\^' => '্ব',
 
  
    '‹' => '্ক',
    'Œ' => '্ক্র',
    '"' => 'চ্',
    '—' => '্ত',
    '˜' => 'দ্',
    '™' => 'দ্',
    'š' => 'ন্',
    '›' => 'ন্',
    'œ' => '্ন',
    'Ÿ' => '্ব',
    '¡' => '্ব',
    '¢' => '্ভ',
    '£' => '্ভ্র',
    '¤' => 'ম্',
    '¥' => '্ম',
    '¦' => '্ব',
    '§' => '্ম',
    '¨' => '্য',
    '©' => 'র্',
    'ª' => '্র',
    '«' => '্র',
    '¬' => '্ল',
    '­' => '্ল',
    '®' => 'ষ্',
    '¯' => 'স্',
    '°' => 'ক্ক',
    '±' => 'ক্ট',
    '²' => 'ক্ষ্ণ', //shu(kkhno)
    '³' => 'ক্ত',
    '´' => 'ক্ম',
    'µ' => 'ক্র',
    '¶' => 'ক্ষ',
    '·' => 'ক্স',
    '¸' => 'গু',
    '¹' => 'জ্ঞ',
    'º' => 'গ্দ',
    '»' => 'গ্ধ',
    '¼' => 'ঙ্ক',
    '½' => 'ঙ্গ',
    '¾' => 'জ্জ',
    '¿' => '্ত্র',
    'À' => 'জ্ঝ',
    'Á' => 'জ্ঞ',
    'Â' => 'ঞ্চ',
    'Ã' => 'ঞ্ছ',
    'Ä' => 'ঞ্জ',
    'Å' => 'ঞ্ঝ',
    'Æ' => 'ট্ট',
    'Ç' => 'ড্ড',
    'È' => 'ণ্ট',
    'É' => 'ণ্ঠ',
    'Ê' => 'ণ্ড',
    'Ë' => 'ত্ত',
    'Ì' => 'ত্থ',
    'Í' => 'ত্ম',
    'Î' => 'ত্র',
    'Ï' => 'দ্দ',
    'Ð' => '-',
    'Ñ' => '-',
    'Ò' => '"',
    'Ó' => '"',
    'Ô' => "'",
    'Õ' => "'",
    'Ö' => '্র',
    '×' => 'দ্ধ',
    'Ø' => 'দ্ব',
    'Ù' => 'দ্ম',
    'Ú' => 'ন্ঠ',
    'Û' => 'ন্ড',
    'Ü' => 'ন্ধ',
    'Ý' => 'ন্স',
    'Þ' => 'প্ট',
    'ß' => 'প্ত',
    'à' => 'প্প',
    'á' => 'প্স',
    'â' => 'ব্জ',
    'ã' => 'ব্দ',
    'ä' => 'ব্ধ',
    'å' => 'ভ্র',
    'æ' => 'ম্ন',
    'ç' => 'ম্ফ',
    'è' => '্ন',
    'é' => 'ল্ক',
    'ê' => 'ল্গ',
    'ë' => 'ল্ট',
    'ì' => 'ল্ড',
    'í' => 'ল্প',
    'î' => 'ল্ফ',
    'ï' => 'শু',
    'ð' => 'শ্চ',
    'ñ' => 'শ্ছ',
    'ò' => 'ষ্ণ',
    'ó' => 'ষ্ট',
    'ô' => 'ষ্ঠ',
    'õ' => 'ষ্ফ',
    'ö' => 'স্খ',
    '÷' => 'স্ট',
    'ø' => 'স্ন', //(sn)eho //†ønØ
    'ù' => 'স্ফ',
    'ú' => '্প',
    'û' => 'হু',
    'ü' => 'হৃ',
    'ý' => 'হ্ন',
    'þ' => 'হ্ম'
);

$proConversionMap = array('্্' => '্');



$postConversionMap = array(
    //Colon with Number/Space
    '০ঃ' => '০:',
    '১ঃ' => '১:',
    '২ঃ' => '২:',
    '৩ঃ' => '৩:',
    '৪ঃ' => '৪:',
    '৫ঃ' => '৫:',
    '৬ঃ' => '৬:',
    '৭ঃ' => '৭:',
    '৮ঃ' => '৮:',
    '৯ঃ' => '৯:',
    ' ঃ' => ' :',
    '\nঃ' => '\n:',
    ']ঃ' => ']:',
    '\\[ঃ' => '\\[:',
    '  ' => ' ',
    'অা' => 'আ',
    '্‌্‌' => '্‌'
);

function IsBanglaDigit($c) {
    if ($c >= '০' && $c <= '৯')
        return true;
    return false;
}

function IsBanglaPreKar($c) {
    if ($c == 'ি' || $c == 'ৈ' || $c == 'ে')
        return true;
    return false;
}

function IsBanglaPostKar($c) {
    if ($c == 'া' || $c == 'ো' || $c == 'ৌ' || $c == 'ৗ' || $c == 'ু' || $c == 'ূ' || $c == 'ী' || $c == 'ৃ')
        return true;
    return false;
}

function IsBanglaKar($c) {
    if (IsBanglaPreKar($c) || IsBanglaPostKar($c))
        return true;
    return false;
}



function IsBanglaBanjonborno($c) {
    if ($c == 'ক' || $c == 'খ' || $c == 'গ' || $c == 'ঘ' || $c == 'ঙ' || $c == 'চ' || $c == 'ছ' || $c == 'জ' || $c == 'ঝ' || $c == 'ঞ' || $c == 'ট' || $c == 'ঠ' || $c == 'ড' || $c == 'ঢ' || $c == 'ণ' || $c == 'ত' || $c == 'থ' || $c == 'দ' || $c == 'ধ' || $c == 'ন' || $c == 'প' || $c == 'ফ' || $c == 'ব' || $c == 'ভ' || $c == 'ম' || $c == 'য' || $c == 'র' || $c == 'ল' || $c == 'শ' || $c == 'ষ' || $c == 'স' || $c == 'হ' || $c == 'ড়' || $c == 'ঢ়' || $c == 'য়' || $c == 'ৎ' || $c == 'ং' || $c == 'ঃ' || $c == 'ঁ')
        return true;
    return false;
}

function IsBanglaSoroborno($c) {
    if ($c == 'অ' || $c == 'আ' || $c == 'ই' || $c == 'ঈ' || $c == 'উ' || $c == 'ঊ' || $c == 'ঋ' || $c == 'ঌ' || $c == 'এ' || $c == 'ঐ' || $c == 'ও' || $c == 'ঔ')
        return true;
    return false;
}

function IsBanglaNukta($c) {
    if ($c == 'ঁ')
        return true;
    return false;
}



function IsBanglaHalant($c) {
    if ($c == '্')
        return true;
    return false;
}

function IsSpace($c) {
    if ($c == ' ' || $c == '\t' || $c == '\n' || $c == '\r')
        return true;
    return false;
}

function reArrangeUnicodeConvertedText($str) {

    mb_internal_encoding("UTF-8"); //force multi-byte UTF-8 encoding

    global $proConversionMap;

    for ($i = 0; $i < mb_strlen($str); ++$i) {

        // Change refs
        if ($i < (mb_strlen($str) - 1) && mbCharAt($str, $i) == 'র' && IsBanglaHalant(mbCharAt($str, $i + 1)) && !IsBanglaHalant(mbCharAt($str, $i - 1))) {
            $j = 1;
            while (true) {
                if ($i - $j < 0) {
                    break;
                }
                if (IsBanglaBanjonborno(mbCharAt($str, $i - $j)) && IsBanglaHalant(mbCharAt($str, $i - $j - 1))) {
                    $j += 2;
                } else if ($j == 1 && IsBanglaKar(mbCharAt($str, $i - $j))) {
                    $j++;
                } else {
                    break;
                }
            }
            $temp = subString($str, 0, $i - $j);
            $temp .= mbCharAt($str, $i);
            $temp .= mbCharAt($str, $i + 1);
            $temp .= subString($str, $i - $j, $i);
            $temp .= subString($str, $i + 2, mb_strlen($str));
            $str = $temp;
            $i += 1;
            continue;
        }
    }





    $str = doCharMap($str, $proConversionMap);




    for ($i = 0; $i < mb_strlen($str); ++$i) {


        if ($i < mb_strlen($str) - 1 && mbCharAt($str, $i) == 'র' && IsBanglaHalant(mbCharAt($str, $i + 1)) && !IsBanglaHalant(mbCharAt($str, $i - 1)) && IsBanglaHalant(mbCharAt($str, $i + 2))) {
            $j = 1;
            while (true) {
                if ($i - $j < 0) {
                    break;
                }
                if (IsBanglaBanjonborno(mbCharAt($str, $i - $j)) && IsBanglaHalant(mbCharAt($str, $i - $j - 1))) {
                    $j += 2;
                } else if ($j == 1 && IsBanglaKar(mbCharAt($str, $i - $j))) {
                    $j++;
                } else {
                    break;
                }
            }
            $temp = subString($str, 0, $i - $j);
            $temp .= mbCharAt($str, $i);
            $temp .= mbCharAt($str, $i + 1);
            $temp .= subString($str, $i - $j, $i);
            $temp .= subString($str, $i + 2, mb_strlen($str));
            $str = $temp;
            $i += 1;
            continue;
        }

        // for 'Vowel + HALANT + Consonant' it should be 'HALANT + Consonant + Vowel'
        if ($i > 0 && mbCharAt($str, $i) == '\u09CD' && (IsBanglaKar(mbCharAt($str, $i - 1)) || IsBanglaNukta(mbCharAt($str, $i - 1))) && $i < mb_strlen($str) - 1) {
            $temp = subString($str, 0, $i - 1);
            $temp .= mbCharAt($str, $i);
            $temp .= mbCharAt($str, $i + 1);
            $temp .= mbCharAt($str, $i - 1);
            $temp .= subString($str, $i + 2, mb_strlen($str));
            $str = $temp;
        }

        // for 'RA (\u09B0) + HALANT + Vowel' it should be 'Vowel + RA (\u09B0) + HALANT'
        if ($i > 0 && $i < mb_strlen($str) - 1 && mbCharAt($str, $i) == '\u09CD' && mbCharAt($str, $i - 1) == '\u09B0' && mbCharAt($str, $i - 2) != '\u09CD' && IsBanglaKar(mbCharAt($str, $i + 1))) {
            $temp = subString($str, 0, $i - 1);
            $temp .= mbCharAt($str, $i + 1);
            $temp .= mbCharAt($str, $i - 1);
            $temp .= mbCharAt($str, $i);
            $temp .= subString($str, $i + 2, mb_strlen($str));
            $str = $temp;
        }
        

        // Change pre-kar to post format suitable for unicode
        if ($i < mb_strlen($str) - 1 && IsBanglaPreKar(mbCharAt($str, $i)) && IsSpace(mbCharAt($str, $i + 1)) == false) {
            $temp = subString($str, 0, $i);

            $j = 1;

            while (($i + $j) < mb_strlen($str) - 1 && IsBanglaBanjonborno(mbCharAt($str, $i + $j))) {
                if (($i + $j) < mb_strlen($str) && IsBanglaHalant(mbCharAt($str, $i + $j + 1))) {
                    $j += 2;
                } else {
                    break;
                }
            }
            $temp .= subString($str, $i + 1, $i + $j + 1);

            $l = 0;
            if (mbCharAt($str, $i) == 'ে' && mbCharAt($str, $i + $j + 1) == 'া') {
                $temp .= "ো";
                $l = 1;
            } else if (mbCharAt($str, $i) == 'ে' && mbCharAt($str, $i + $j + 1) == "ৗ") {
                $temp .= "ৌ";
                $l = 1;
            } else {
                $temp .= mbCharAt($str, $i);
            }
            $temp .= subString($str, $i + $j + $l + 1, mb_strlen($str));
            $str = $temp;
            $i += $j;
        }

        // nukta should be placed after kars
        if ($i < mb_strlen($str) - 1 && IsBanglaNukta(mbCharAt($str, $i)) && IsBanglaPostKar(mbCharAt($str, $i + 1))) {
            $temp = subString($str, 0, $i);
            $temp .= mbCharAt($str, $i + 1);
            $temp .= mbCharAt($str, $i);
            $temp .= subString($str, $i + 2, mb_strlen($str));
            $str = $temp;
        }
    }

    return $str;
}


//main conversion function






function convertBijoyToUnicode($srcString) {

    global $preConversionMap, $conversionMap, $postConversionMap;


    $srcString = doCharMap($srcString, $preConversionMap);
    $srcString = doCharMap($srcString, $conversionMap);
    $srcString = reArrangeUnicodeConvertedText($srcString);
    $srcString = doCharMap($srcString, $postConversionMap);
    return $srcString;
    
    print"$srcString";
    
}

function doCharMap($text, $charMap) {
    foreach ($charMap as $srcKey => $keyVal) {
        $format = "@$srcKey@";
        $text = preg_replace($format, $keyVal, $text);
    }

    return $text;
    
     
}

//returns the $i-th byte of the multi-byte string $str
function mbCharAt($str, $i) {
    return mb_substr($str, $i, 1);
}

//returns the javascript 'substring' method equivalent
function subString($string, $from, $to) {
    return mb_substr($string, $from, $to - $from);
}


?>

<html><head><meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta http-equiv="Content-Language" content="en-us">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title> Bijoy to unicode to Bijoy Converter </title>
<script type="text/javascript" src="saamok/jquery.min.js"></script>
<script type="text/javascript" src="saamok/jquery.ar.converter.js"></script>
<script type="text/javascript" src="saamok/rsaamok03.js"></script>
<script type="text/javascript" src="saamok/saamok02.js"></script>
<script type="text/javascript" src="saamok/saamok01.js"></script>
  <style>
  .icon[data-animation=tada] img {
-webkit-animation: tada ease-in-out 1 normal 800ms;
-moz-animation: tada ease-in-out 1 normal 800ms;
-ms-animation: tada ease-in-out 1 normal 800ms;
-o-animation: tada ease-in-out 1 normal 800ms;
animation: tada ease-in-out 1 normal 500ms; }
 .icon[data-animation=pulse] img {
-webkit-animation: pulse ease-in-out 1 normal 500ms;
-moz-animation: pulse ease-in-out 1 normal 500ms;
-ms-animation: pulse ease-in-out 1 normal 500ms;
-o-animation: pulse ease-in-out 1 normal 500ms;
animation: pulse ease-in-out 1 normal 500ms; }
.icon[data-animation=fadeOutRightBig] img {
-webkit-animation: fadeOutRightBig ease-out 1 normal 1s;
-moz-animation: fadeOutRightBig ease-out 1 normal 1s;
-ms-animation: fadeOutRightBig ease-out 1 normal 1s;
-o-animation: fadeOutRightBig ease-out 1 normal 1s;
animation: fadeOutRightBig ease-out 1 normal 1s;}
  </style>
  
<script type="text/javascript">
 //$(function() { /**/ });
 /*
 var __ar_convert = function(c_step){
            $("#ar_result").html("<img src='images/ar_loading.gif' alt='processing..' width='40'/>");
            var form_data=$('#bm').val();
            $("#bm").val("Processing Please Wait........"); 
            var ar_processiong_url = "action"+c_step+".php"; 
            jQuery.post(ar_processiong_url,{action:'step','form_data':form_data},
                 function (data){
                    $("#bm").val(data);$("#ar_result").html('&nbsp;'); 
                    }); 
    }//ar_converter 12_02_2014*/
  //$(function() { /**/ }); 
</script>
</head>

<body  topmargin="0" leftmargin="0" rightmargin="0" bottommargin="0" marginheight="0" marginwidth="0" bgcolor="#999999">
<table border="0" cellpadding="0" cellspacing="0" height="750" width="1005" align="center" bgcolor="#008080">
<tbody>
<tr>
  <td align="center">&nbsp;</td>
</tr>
<tr>
  <td align="center"><font face="Georgia, Times New Roman, Times, serif" color="#FFFFFF" size="8"><strong>Bijoy to Unicode Converter</strong></font></td>
</tr>
<tr><td>



<div align="center">

  
  <table border="0" cellpadding="0" cellspacing="0" height="250" width="974">
    <tbody><tr>
      <td valign="top" width="487">
        
 
        
  <script type="text/javascript">
   var en="eZ";var t="bangla";
   var aH=false;var aA=aY;
   function co(){for(var dX in aA){var as=document.getElementById(dX);
   if(as.type=="button"){as.value=aA[dX];}
   else{as.innerHTML=aA[dX];}}};
   function ax(lang){var as;
   if(lang==1){aA=cH;
   as=document.getElementById("cI");
   as.innerHTML="English";
   as=document.getElementById("cR");as.innerHTML="<a href=\"javascript:ax(2);\">.....</a>";}else if(lang==2){aA=aY;as=document.getElementById("cI");as.innerHTML="<a href=\"javascript:ax(1);\">English</a>";
   
   as=document.getElementById("cR");
   as.innerHTML=".....";}co();};
   
   function ak(eO){if(eO==1){cA("aN");cw("ct");
   cA("cq");
   aH=true;}
   else
   {cw("aN");
   cw("cq");
   cA("ct");
   aH=false;}};
   
   function A(){var g=document.getElementsByName('M');
   var bK=document.getElementById("aN");if(o==aG||al==true)g[0].checked=true;
   else if(o>2) g[o-2].checked=true;
   if(o==cx)bK.innerHTML=af("bangla");
   else if(o==by)bK.innerHTML=af("unijoy");
   else if(o==cz)bK.innerHTML=af("probhat");
   else if(o==aT)bK.innerHTML=af("somewherein");
   else if(o==ap)bK.innerHTML=af("avro");
   else if(o==at)bK.innerHTML=af("bornosoft");
   if(o==aG||al==true)cw("aN");
   else if(aH==true){cA("aN");
   av(document.getElementById("CharacteMapTable"),aB,aj);}};
   
   function dH(){var g=document.getElementsByName('O');
   if(t=="bangla"){g[0].checked=true;}
   else if(t=="somewherein"){g[1].checked=true;}else if(t=="boisakhi"){g[2].checked=true;}
   else if(t=="bangsee"){g[3].checked=true;}
   else if(t=="bornosoft"){g[4].checked=true;}
   else if(t=="phonetic"){g[5].checked=true;}
   else if(t=="htmlsafehex"){g[6].checked=true;}else if(t=="htmlsafedec"){g[7].checked=true;}};
   
   function I(event){var g=document.getElementsByName('M');
   for(var ae=0;ae<g.length;ae++)
   {
	   if(g[ae].checked){al=false;
	   if(ae)o=ae+2;
	   else o=ae+1;
	    A();
	   var cV=document.getElementById(en);
	   cV.focus();break;}}};
	   function ck(ec){var w=document.getElementById(ec).value;
	   w=cM(t,w);
	   ag(document.getElementById(en),w);};
	   
	   function cB(ec){var w=document.getElementById(en).value;w=cX(t,w);
	   ag(document.getElementById(ec),w);};
	   
	   function dh(eN){var ee=document.getElementById(eN);ee.value="";ee.focus();};
	   
	   function aL(){var g=document.getElementsByName('O');
	   var J=document.getElementById('bm');if(t=="bangla")
	   {J.style.fontFamily="SutonnyMJ";J.style.width=400;
	   g[0].checked=true;}
	   else if(t=="somewherein"){J.style.fontFamily="SushreeMJ";
	   J.style.width=400;g[1].checked=true;}
	   else if(t=="boisakhi")
	   {J.style.fontFamily="Boishakhi";J.style.width=400;g[2].checked=true;}
	   else if(t=="bangsee")
	   {J.style.fontFamily="Bangsee Alpona";J.style.width=400;g[3].checked=true;}
	   else if(t=="bornosoft"){J.style.fontFamily="Falgun";J.style.width=400;g[4].checked=true;}
	   else if(t=="phonetic"){J.style.fontFamily="Times New Roman";
	   J.style.width=400;g[5].checked=true;}
	   else if(t=="htmlsafehex"||t=="htmlsafedec"){J.style.fontFamily="Times New Roman";J.style.width=400;g[6].checked=true;}};
	   
	   function P(event)
			{var g=document.getElementsByName('O');
	   
	   for(var ae=0;ae<g.length;ae++)
	   {if(g[ae].checked){if(ae==0)t="bangla";
	   else if(ae==1)t="somewherein";
	   else if(ae==2)t="boisakhi";
	   else if(ae==3)t="bangsee";
	   else if(ae==4)t="bornosoft";
	   else if(ae==5)t="phonetic";
	   else if(ae==6)t="htmlsafehex";
	   else if(ae==7)t="htmlsafedec";break;}}aL();};
	   
	   function dG(){var cp=90;
	   if(aA==cH)aq(L+"language","english",cp,"/","");
	   if(aA==aY)aq(L+"language","bangla",cp,"/","");
	   aq(L+"layout",o,cp,"/","");
	   aq(L+"converter",t,cp,"/","");
	   aq(L+"showhelp",aH,cp,"/","");};
	   
	   function dE(){var ez=aw(L+"language");
	   if(ez=="english")ax(1);
	   else ax(2);o=aw(L+"layout");
	   if(o==null)o=2;t=aw(L+"converter");
	   if(t==null)t="bangla";
	   var eC=aw(L+"showhelp");
	   if(eC=="true")ak(1);
	   else ak(2);};
	   
	   function eE(){aI(L+"language","/","");
	   aI(L+"layout","/","");aI(L+"converter","/","");
	   aI(L+"showhelp","/","");};
	   
	   function dZ(){dE();
	   A();
	   aL();
	   var cV=document.getElementById(en);
	   var bU=document.getElementById("dD");
	   if(eJ){bU.innerHTML="If you can't see Bangla, please download Unicode Bangla Font <a href=fonts/SutonnyBanglaOMJ.ttf>from here</a>.";
	   cV.style.fontFamily="SutonnyBanglaOMJ";}
	   else{bU.innerHTML="If you can't see Bangla, please download Unicode Bangla Font <a href=fonts/SutonnyBanglaOMJ.ttf>from here</a>.";
	   cV.style.fontFamily="SutonnyBanglaOMJ";}
	   cV.style.width=400;var J=document.getElementById('bm');
	   J.style.width=400;di();
	   };function dk(){dG();
	   } </script>
        
        
        
        
        
        
        
  <script type="text/javascript">// <![CDATA[
function insertContent(field, text) { 	
if (document.selection) 	
	{ 		
		field.focus(); 		
		sel = document.selection.createRange(); 		
		sel.text = text; 		sel.collapse(true); 		
		sel.select(); 	
		} 	
else if (field.selectionStart || field.selectionStart == '0') 	
	{ 		
		var startPos = field.selectionStart; 		
		var endPos = field.selectionEnd; 		
		var scrollTop = field.scrollTop; 		
		startPos = (startPos == -1 ? field.value.length : startPos ); 		
		field.value = field.value.substring(0, startPos) + text + field.value.substring(endPos, field.value.length); 		
		field.focus(); 		
		field.selectionStart = startPos + text.length; 		
		field.selectionEnd = startPos + text.length; 		
		field.scrollTop = scrollTop; 	
		} 	
	else 	
		{ 		
		var scrollTop = field.scrollTop; 		
		field.value += value; 		
		field.focus(); 		
		field.scrollTop = scrollTop; 	
		} 
			}
function clearContent(idtxt) {
	  	var elem = document.getElementById(idtxt); 	
		elem.value = ''; 	
		elem.focus(); 
		} 
// ]]&gt;</script>
        

        
    
        <div align="center">
            
            <textarea id="bm" name="form_1" style="margin : 0 2px 0 0; font-size: 18px; width: 100%; height: 350px;  font-family: SutonnyMJ;">hghgh</textarea>
          </div></td>
      <td valign="top" width="487">
        <div align="center"><textarea onKeyPress="return dg(event);" id="eZ" onKeyDown="return dn(event);" style="margin : 0 0 0 2px; font-size: 18px; width: 100%; height: 350px; font-family: Solaimanlipi;"></textarea>
          </div></td>
      </tr>
      </tbody></table>
  <div align="center"></div>
  <div>
    <table width="100%" border="0">
      <tr>
        <td width="2%">&nbsp;</td>
        <td width="48%" align="center" valign="top"><font color="#FFFFFF">বিজয় কী বোর্ড (লিখূন অথবা কপি করে পেস্ট করুন)</font></td>
        <td width="1%">&nbsp;</td>
        <td width="49%" align="center" valign="middle"><font color="#FFFFFF">ইউনিকোড</font></td>
        </tr>
      </table>
  </div>
  
  
  
  
  
  
  <!--<input onClick="clearContent('bm');" value="Clear Left" type="button">
  <input onClick="clearContent('eZ');" value="Clear Right" type="button">-->	
  <!--bof ref-->
 <!-- <script>
function reloadPage()
  {
  location.reload();
  }
</script>

<input type="button" value="Reload page" onclick="reloadPage()">
  <!--eof ref-->
  
  
</div>
 <INPUT value=content.php type=hidden name=p>
            <FORM style="FONT-FAMILY: Verdana; FONT-SIZE: 12pt" method=post name=frm action=action1.php>
<table width="100%" cellpadding="2" cellspacing="2" border="0" align="center">
<tr>
<td>&nbsp;


</td>
<td><font color="#fff" size="4">Special Character</font></td>
<td><div id="ar_result">&nbsp;</div></td>
<td onClick="__ar_convert(1)"><img src="01.png" alt="1"></td>
<td onClick="__ar_convert(2)"><img src="02.png" alt="2"></td>
<td onClick="__ar_convert(3)"><img src="03.png" alt="3"></td>
<td onClick="__ar_convert(4)"><img src="04.png" alt="4"></td>
<td onClick="__ar_convert(5)"><img src="05.png" alt="5"></td>
<td onClick="__ar_convert(6)"><img src="06.png" alt="6"></td>
<td onClick="__ar_convert(7)"><img src="07.png" alt="7"></td>
<td onClick="__ar_convert(8)"><img src="08.png" alt="8"></td>
<td onClick="__ar_convert(9)"><img src="09.png" alt="9"></td>
<td onClick="__ar_convert(10)"><img src="09.png" alt="10"></td>

<td><input id="dc" onClick="ck('bm');" value="Bijoy >> Unicode" name="eF" type="button"></td>
<td><input id="db" name="ea" value="Unicode << Bijoy" onClick="cB('bm');" type="button"></td>
<td><input onClick="clearContent('bm'); clearContent('eZ');" value="Reset" type="button"></td>
<td><input type="button" value="Home" onClick="window.location.reload()"></td>
</tr>
</table>

</form>
<br /><br />

 <br />
</td></tr>
<tr>
  <td align="center" valign="middle"><font face="Verdana, Geneva, sans-serif" size="2" color="#CCCCCC">Copy Right@ all right reserved</font></td></tr>
</tbody>
</table>

<table cellpadding="0" cellspacing="0" align="center" border="0" width="100%">
<tr>
<td>
   
</td>
</tr>
</table>


</body></html>