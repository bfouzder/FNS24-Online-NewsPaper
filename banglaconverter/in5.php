<?php

/*
require_once 'bijoy2unicode.php';
$demo=trim($_POST['convert']);
$converted = convertBijoyToUnicode($demo);

*/

/*
$uni_text=trim($_POST['convert']);


require 'u2b.php';
		//$uni_text = 'আমার সোনার বাংলা , আমি তোমায় ভালবাসি';

		$converted = u2b($uni_text);
*/


print"
<html>
<head>
<title> Fns Converter  </title>

";
?>

<meta http-equiv='content-type' content='text/html;charset=utf-8' />
<meta name="viewport" content="width=device-width, initial-scale=1">




<link rel='icon' type='image/jpg' href='image/logo.jpg' />


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


    <link href="themes/1/js-image-slider.css" rel="stylesheet" type="text/css" />
    <script src="themes/1/js-image-slider.js" type="text/javascript"></script>


  <script src="jquery.min.js"></script>
  
  <script language='javascript'>
  
  function buu()
  {
    


var tags_txt=$('#conv').val();


if($.trim(tags_txt)!='')
{
$.ajax ({
url:"b2u.php",
method:"POST",
data:{convert:tags_txt},
dataType:"text",
success:function(data)
{
//alert(data);

document.f.convert.value='';
document.f.convert.value=data;
}

});

}

    
    
  }
  
  
  
  
  
  
  
  
  
  
    function uub()
  {
    


var tags_txt=$('#conv').val();


if($.trim(tags_txt)!='')
{
$.ajax ({
url:"u2v.php",
method:"POST",
data:{convert:tags_txt},
dataType:"text",
success:function(data)
{
//alert(data);

document.f.convert.value='';
document.f.convert.value=data;
}

});

}

    
    
  }
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  /*
  
  
  
  function uub()
  {
    


var tags_txt=$('#conv').val();


if($.trim(tags_txt)!='')
{
$.ajax ({
url:"u2v.php",
method:"POST",
data:{convert:tags_txt},
dataType:"text",
success:function(data)
{
//alert(data);

document.f.convert.value='';
document.f.convert.value=data;
}

});

}

    
    
  }
  
  
  
  */
  
  
  
  
  
  
  
  
  
  </script>
  


<style>


body {
margin:0;

font-family: Arial, Helvetica, sans-serif;
}



@font-face {
			  font-family: 'Rajon Shoily';
			  src: url('bangla.ttf')  format('truetype'), /* Safari, Android, iOS */
			}


#b1
{
padding:3px;
height:30px;
font-family:arial;
size:16px;
}


#b2
{
padding:3px;
height:30px;
font-family:arial;
size:16px;
}





A:link {
    FONT-WEIGHT: normal; FONT-SIZE: 16px; COLOR: black; FONT-STYLE: normal; FONT-FAMILY: Arial; TEXT-DECORATION: none;
}

A:visited {
    FONT-WEIGHT: normal; FONT-SIZE: 16px; COLOR: black; FONT-STYLE: normal; FONT-FAMILY:  Arial; TEXT-DECORATION: none
}
A:active {
    FONT-WEIGHT: normal; FONT-SIZE: 16px; COLOR: black; FONT-STYLE: normal; FONT-FAMILY: Arial; TEXT-DECORATION: none;
}
A:hover {
    FONT-WEIGHT: normal; FONT-SIZE: 16px; COLOR: black; FONT-STYLE: normal; FONT-FAMILY: Arial; TEXT-DECORATION: underline;
}




#sl
{
width:100%;    
height:380;

}




.lilink {
    FONT-WEIGHT: normal; FONT-SIZE: 14px; WIDTH: 100%; COLOR: black; FONT-FAMILY: solaimanlipi
}
A.li:active {
    FONT-WEIGHT: normal; FONT-SIZE: 14px; BACKGROUND: url(images/topback.jpg); COLOR: black; FONT-STYLE: normal; FONT-FAMILY: solaimanlipi
}
A.li:link {
    FONT-WEIGHT: normal; FONT-SIZE: 14px; BACKGROUND: url(images/topback.jpg); COLOR: black; FONT-STYLE: normal; FONT-FAMILY: solaimanlipi
}
A.li:visited {
    FONT-WEIGHT: normal; FONT-SIZE: 14px; BACKGROUND: url(images/topback.jpg); COLOR: black; FONT-STYLE: normal; FONT-FAMILY: solaimanlipi
}


A.li:hover {
    FONT-WEIGHT: normal;  FONT-SIZE: 14px; BACKGROUND: url(link.jpg) no-repeat center top;  COLOR: black; FONT-STYLE: normal; FONT-FAMILY: solaimanlipi,arial
}





.llink {
    FONT-WEIGHT: normal; FONT-SIZE: 16px; WIDTH: 100%; COLOR: black; FONT-FAMILY: arial;
}

A.l:active {
    FONT-WEIGHT: normal; FONT-SIZE: 16px; BACKGROUND: url(images/topback.jpg); COLOR: black; FONT-STYLE: normal; FONT-FAMILY: arial;
}
A.l:link {
    FONT-WEIGHT: normal; FONT-SIZE: 16px; BACKGROUND: url(images/topback.jpg); COLOR: black; FONT-STYLE: normal; FONT-FAMILY: arial;
}
A.l:visited {
    FONT-WEIGHT: normal; FONT-SIZE: 16px; BACKGROUND: url(images/topback.jpg); COLOR: black; FONT-STYLE: normal; FONT-FAMILY: arial;
}


A.l:hover {
    FONT-WEIGHT:bold;  FONT-SIZE: 16px; BACKGROUND: url(link.jpg) no-repeat center top;  COLOR: red; FONT-STYLE: normal; FONT-FAMILY:arial;TEXT-DECORATION: none;
}







#head
{
padding:0px;    
}






#pp
{
margin-top:0px;
padding-top:10px;

}



#bc
{
display:none;    
}


  
  
  
 #conv
{
padding:10px;
margin:0px;
width:50%;
height:370px;
}

#row
{
width:33%;
float:left;
margin-left:4px;
}




#row_marquee
{
width:100%;
float:left;
margin:4px;
}






@media screen and (max-width: 600px) {
  .topnav a:not(:first-child), .dropdown .dropbtn {
    display: none;
  }
  .topnav a.icon {
    float: right;
    display: block;
  }
}

@media screen and (max-width: 600px) {
  .topnav.responsive {position: relative;}
  .topnav.responsive .icon {
    position: absolute;
    right: 0;
    top: 0;
  }
  .topnav.responsive a {
    float: none;
    display: block;
    text-align: left;
  }
  .topnav.responsive .dropdown {float: none;}
  .topnav.responsive .dropdown-content {position: relative;}
  .topnav.responsive .dropdown .dropbtn {
    display: block;
    width: 100%;
    text-align: left;
  }
  
  
  
    
 #conv
{
padding:0px;
margin:0px;
width:90%;
height:300px;
}
  
  
  #sl
{
width:100%;    
height:180;

}
  
  
  
  
#row
{
float:left;
width:100%;
}
  
#row2
{
float:center;
width:100%;
padding-left:10px;
}


#row3
{
float:center;
width:100%;
padding-left:10px;
}
  
  
  #bl
  {
   float: none;
    display:none;   
  }
  
  
  
    #bb
  {
   float: left;
  width:100%;  
  text-align:center;
    display: inline;
  }
  

      #bc
  {
   float: left;
   width:100%; 
  text-align:center;
    display: inline;
  }
  
  
  
        #uu
  {
   float: center;
   

  }
  
  
  
  #row_marquee
{
width:100%;
float:left;
margin:4px;
}


  
  
  
  
  
}






















<?php
print"
</style>

</head>


<body bgcolor='#008080'>

";

?>



<table align='center' width='100%' cellpadding='0' cellspacing='0' height='42' bgcolor='#F67E1D'>
<tr>
<td width='100%' align='left'>
&nbsp;&nbsp;

<a href='index.php'>
<font color='white' face='arial' size='4'>  FNS Bangla Converter  </font>
</a>

</td>
</tr>
</table>

<br>
<br>
<br>
<br>



<table align='center' width='100%' cellpadding='0' cellspacing='0' height='42' bgcolor=''>
<tr>
<td width='100%' >
<div class='content'>
<table align='center' width='100%' cellpadding='0' height='30' cellspacing='0' bgcolor=''>


<tr>
<td align='center'> 

<font color='white' size='6'> FNS Bangla Converter </font>

<br>
<br>
<br>



</td>
</tr>


<tr>
<form  name='f' action='index.php' method='POST'>

<td width='40%' align='center'>

<?php
print"
<textarea name='convert' id='conv' style='FONT-FAMILY: SutonnyMJ; FONT-SIZE: 18px'></textarea>
";
?>


<br>
<br>
<br>

<input type='button' onclick='buu()' value='Bijoy To Unicode' id='b1'>

&nbsp;&nbsp;


<input type='button' onclick='uub()' value='Unicode To Bijoy' id='b2'>


&nbsp;&nbsp;



<input type='reset' onclick='cl()' value='&nbsp;&nbsp;&nbsp;Clear&nbsp;&nbsp;&nbsp;' id='b2'>




</td>
</tr>

</form>












</table>

</div>
</table>


</form>



<?php
print"
</body>

</html>
";




?>