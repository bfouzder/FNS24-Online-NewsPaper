<?php 
$page = basename($_SERVER['SCRIPT_NAME']);
$id = $page."?q=".$_GET['q']; 
 ?> 
<html><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<head>
<meta http-equiv="Content-Language" content="en-us">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>Unicode to Bijoy Converter - Developed by i2soft technology</title>
</head>
<style>
@font-face {
    font-family: SutonnyMJ; font-style:  normal; font-weight: normal; src: url(sut_IE.eot);
	  }
A { 
	color : #ffffff; 
} 
A:link { 
	text-decoration : none; 
} 
A:visited { 
	color : #ffffff; 
		text-decoration : none; 
} 
A:hover { 
	color : #aaaaaa; 
	text-decoration : underline; 
} 
A:active { 
	color : #ffffff; 
	text-decoration : none; 
} 
/*menu*/

#horiz-menu {
	height: 40px;	
	position: relative;
	top: -4px;
	left: 12px;

}
#horiz-menu ul.menutop {
	padding-left: 0px;
}

#horiz-menu ul {
	list-style: none;
	margin: 0;
	padding: 0;
}
 

#horiz-menu li {
	display: block;
	float: left;
	margin: 0;
	padding: 0;	
}

#horiz-menu a {
	white-space: nowrap;	
	display: block;
	_float:left;
	line-height: 30px;
	padding-left: 18px;
	padding-right: 18px;
	font-weight: bold;
	font-size: 120%;
	font-size: 10pt;
	font-family : Arial; 
	text-decoration: none;
	text-align: center;

}

#horiz-menu li li.active{
	background: none;
	text-decoration: none;

}
#horiz-menu li.active
{

	background: url(images/menu-right.jpg) 100% 0 no-repeat;
	text-decoration: none;
}

#horiz-menu li.active a
{
	background: url(images/menu-left.jpg) 0 0 no-repeat;
	text-decoration: none;	
	color: #ffffff;	
}
	

/*End of menu*/	
</style>
<body topmargin="0" leftmargin="0" rightmargin="0" bottommargin="0" marginwidth="0" marginheight="0">
<div align="center">
	<table border="0" width="100%" cellspacing="0" cellpadding="0" height="138" background="images/top-bg.jpg">
		<tr>
			<td>
			<div align="center">
<DIV align=center>
      <TABLE height=138 cellSpacing=0 cellPadding=0 width=1005 border=0>
        <TBODY>
        <TR>
          <TD vAlign=bottom>&nbsp;</TD></TR></TBODY></TABLE></DIV>
			</div>
			</td>
		</tr>
	</table>
</div>
<div align="center">
	<table border="0" width="1005" cellspacing="0" cellpadding="0" height="657" align="center">
		<tr>
			<td valign="top" width="11" background="images/left.jpg">&nbsp;</td>
			<td valign="top" width="983">
			<div align="center">
				<table border="0" width="975" cellspacing="0" cellpadding="0">
					<tr>
						<td valign="top">
<!-- Start-->
<script src="images/common.js"></script>
<script src="images/rconverter.js"></script>
<script type="text/javascript"> var en="eZ";var t="bangla";var aH=false;var aA=aY;function co(){for(var dX in aA){var as=document.getElementById(dX);if(as.type=="button"){as.value=aA[dX];}else{as.innerHTML=aA[dX];}}};function ax(lang){var as;if(lang==1){aA=cH;as=document.getElementById("cI");as.innerHTML="English";as=document.getElementById("cR");as.innerHTML="<a href=\"javascript:ax(2);\">.....</a>";}else if(lang==2){aA=aY;as=document.getElementById("cI");as.innerHTML="<a href=\"javascript:ax(1);\">English</a>";as=document.getElementById("cR");as.innerHTML=".....";}co();};function ak(eO){if(eO==1){cA("aN");cw("ct");cA("cq");aH=true;}else{cw("aN");cw("cq");cA("ct");aH=false;}};function A(){var g=document.getElementsByName('M');var bK=document.getElementById("aN");if(o==aG||al==true)g[0].checked=true;else if(o>2) g[o-2].checked=true;if(o==cx)bK.innerHTML=af("bangla");else if(o==by)bK.innerHTML=af("unijoy");else if(o==cz)bK.innerHTML=af("probhat");else if(o==aT)bK.innerHTML=af("somewherein");else if(o==ap)bK.innerHTML=af("avro");else if(o==at)bK.innerHTML=af("bornosoft");if(o==aG||al==true)cw("aN");else if(aH==true){cA("aN");av(document.getElementById("CharacteMapTable"),aB,aj);}};function dH(){var g=document.getElementsByName('O');if(t=="bangla"){g[0].checked=true;}else if(t=="somewherein"){g[1].checked=true;}else if(t=="boisakhi"){g[2].checked=true;}else if(t=="bangsee"){g[3].checked=true;}else if(t=="bornosoft"){g[4].checked=true;}else if(t=="phonetic"){g[5].checked=true;}else if(t=="htmlsafehex"){g[6].checked=true;}else if(t=="htmlsafedec"){g[7].checked=true;}};function I(event){var g=document.getElementsByName('M');for(var ae=0;ae<g.length;ae++){if(g[ae].checked){al=false;if(ae)o=ae+2;else o=ae+1; A();var cV=document.getElementById(en);cV.focus();break;}}};function ck(ec){var w=document.getElementById(ec).value;w=cM(t,w);ag(document.getElementById(en),w);};function cB(ec){var w=document.getElementById(en).value;w=cX(t,w);ag(document.getElementById(ec),w);};function dh(eN){var ee=document.getElementById(eN);ee.value="";ee.focus();};function aL(){var g=document.getElementsByName('O');var J=document.getElementById('bm');if(t=="bangla"){J.style.fontFamily="SutonnyMJ";J.style.width=400;g[0].checked=true;}else if(t=="somewherein"){J.style.fontFamily="SushreeMJ";J.style.width=400;g[1].checked=true;}else if(t=="boisakhi"){J.style.fontFamily="Boishakhi";J.style.width=400;g[2].checked=true;}else if(t=="bangsee"){J.style.fontFamily="Bangsee Alpona";J.style.width=400;g[3].checked=true;}else if(t=="bornosoft"){J.style.fontFamily="Falgun";J.style.width=400;g[4].checked=true;}else if(t=="phonetic"){J.style.fontFamily="Times New Roman";J.style.width=400;g[5].checked=true;}else if(t=="htmlsafehex"||t=="htmlsafedec"){J.style.fontFamily="Times New Roman";J.style.width=400;g[6].checked=true;}};function P(event){var g=document.getElementsByName('O');for(var ae=0;ae<g.length;ae++){if(g[ae].checked){if(ae==0)t="bangla";else if(ae==1)t="somewherein";else if(ae==2)t="boisakhi";else if(ae==3)t="bangsee";else if(ae==4)t="bornosoft";else if(ae==5)t="phonetic";else if(ae==6)t="htmlsafehex";else if(ae==7)t="htmlsafedec";break;}}aL();};function dG(){var cp=90;if(aA==cH)aq(L+"language","english",cp,"/","");if(aA==aY)aq(L+"language","bangla",cp,"/","");aq(L+"layout",o,cp,"/","");aq(L+"converter",t,cp,"/","");aq(L+"showhelp",aH,cp,"/","");};function dE(){var ez=aw(L+"language");if(ez=="english")ax(1);else ax(2);o=aw(L+"layout");if(o==null)o=2;t=aw(L+"converter");if(t==null)t="bangla";var eC=aw(L+"showhelp");if(eC=="true")ak(1);else ak(2);};function eE(){aI(L+"language","/","");aI(L+"layout","/","");aI(L+"converter","/","");aI(L+"showhelp","/","");};function dZ(){dE();A();aL();var cV=document.getElementById(en);var bU=document.getElementById("dD");if(eJ){bU.innerHTML="If you can't see Bangla, please download Unicode Bangla Font <a href=fonts/SutonnyBanglaOMJ.ttf>from here</a>.";cV.style.fontFamily="SutonnyBanglaOMJ";}else{bU.innerHTML="If you can't see Bangla, please download Unicode Bangla Font <a href=fonts/SutonnyBanglaOMJ.ttf>from here</a>.";cV.style.fontFamily="SutonnyBanglaOMJ";}cV.style.width=400;var J=document.getElementById('bm');J.style.width=400;di();};function dk(){dG();} </script>


<script type="text/javascript">// <![CDATA[
 function clearContent(idtxt) { 	var elem = document.getElementById(idtxt); 	elem.value = ''; 	elem.focus(); } function insertContent(field, text) { 	if (document.selection) 	{ 		field.focus(); 		sel = document.selection.createRange(); 		sel.text = text; 		sel.collapse(true); 		sel.select(); 	} 	else if (field.selectionStart || field.selectionStart == '0') 	{ 		var startPos = field.selectionStart; 		var endPos = field.selectionEnd; 		var scrollTop = field.scrollTop; 		startPos = (startPos == -1 ? field.value.length : startPos ); 		field.value = field.value.substring(0, startPos) + text + field.value.substring(endPos, field.value.length); 		field.focus(); 		field.selectionStart = startPos + text.length; 		field.selectionEnd = startPos + text.length; 		field.scrollTop = scrollTop; 	} 	else 	{ 		var scrollTop = field.scrollTop; 		field.value += value; 		field.focus(); 		field.scrollTop = scrollTop; 	} }
// ]]&gt;</script>

					<input type="hidden" name="p" value="content.php">
					<textarea name="long_description" id="bm" style="font-size: 18px; width: 979; font-family: SutonnyMJ; height:583" rows="25" cols="100"><?php include "content.php"; ?></textarea></td>
					</tr>
				</table></div>
			</td>
			<td valign="top" width="11" background="images/right.jpg">&nbsp;</td>
		</tr>
		<tr>
			<td height="75" width="1005" colspan="3" align="center">
			</td>
		</tr>
	</table>
	

</body>

</html>