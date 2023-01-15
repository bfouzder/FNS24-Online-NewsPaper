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


$convert=trim($_POST['convert']);

$convert=strip_tags($convert);


$convert=str_replace("'","","$convert");


?>
<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
<title> Fns Converter  </title>


<meta http-equiv='content-type' content='text/html;charset=utf-8' />
<meta name="viewport" content="width=device-width, initial-scale=1">

<script src="https://cdn.tiny.cloud/1/b2e1ep2if4q5warabathz3kfqf9ual4lv89nkfkrtfzn6pgg/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<meta http-equiv='content-type' content='text/html;charset=utf-8' />
<meta name="viewport" content="width=device-width, initial-scale=1">





<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">



  <script src="jquery.min.js"></script>
  
  <script language='javascript'>
  
  
  function buu2()
  {
document.f1.submit();
  }
  
  
 function buu()
 
  {
document.f.submit();


/*
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
    

document.f.convert.value='';
document.f.convert.value=data;

    
}

});

}

  */  
    
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

data=data.trim();
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
  
  
  
  
  
  
  function cf()
  {

 var copyText = document.getElementById("conv");
 copyText.select();
 copyText.setSelectionRange(0, 99999)
 document.execCommand("copy");

  
  
  }
  
  
  
  
  
  
  
  
  
  
  
  
  
  
      function one()
  {
    


var tags_txt=$('#conv').val();



if($.trim(tags_txt)!='')
{
$.ajax ({
url:"one.php",
method:"POST",
data:{convert:tags_txt},
dataType:"text",
success:function(data)
{
//alert(data);

document.f.convert.value='';

data=data.trim();
document.f.convert.value=data;
}

});

}

    
    
  }
  
  
  
  
  
  
  
  
        function two()
  {
    


var tags_txt=$('#conv').val();



if($.trim(tags_txt)!='')
{
$.ajax ({
url:"two.php",
method:"POST",
data:{convert:tags_txt},
dataType:"text",
success:function(data)
{
//alert(data);

document.f.convert.value='';

data=data.trim();
document.f.convert.value=data;
}

});

}

    
    
  }
  
  
  
  
  
  
  
        function three()
  {
    


var tags_txt=$('#conv').val();



if($.trim(tags_txt)!='')
{
$.ajax ({
url:"three.php",
method:"POST",
data:{convert:tags_txt},
dataType:"text",
success:function(data)
{
//alert(data);

document.f.convert.value='';

data=data.trim();
document.f.convert.value=data;
}

});

}

    
    
  }
  
  
  
  
  
  
  
  
  
  
  
  
        function four()
  {
    


var tags_txt=$('#conv').val();



if($.trim(tags_txt)!='')
{
$.ajax ({
url:"four.php",
method:"POST",
data:{convert:tags_txt},
dataType:"text",
success:function(data)
{
//alert(data);

document.f.convert.value='';

data=data.trim();
document.f.convert.value=data;
}

});

}

    
    
  }
  
  
  
  
  
  
  
  
  
  
  
        function five()
  {
    


var tags_txt=$('#conv').val();



if($.trim(tags_txt)!='')
{
$.ajax ({
url:"five.php",
method:"POST",
data:{convert:tags_txt},
dataType:"text",
success:function(data)
{
//alert(data);

document.f.convert.value='';

data=data.trim();
document.f.convert.value=data;
}

});

}

    
    
  }
  
  
  
  
  
  
  
  
       function six()
  {
    


var tags_txt=$('#conv').val();



if($.trim(tags_txt)!='')
{
$.ajax ({
url:"six.php",
method:"POST",
data:{convert:tags_txt},
dataType:"text",
success:function(data)
{
//alert(data);

document.f.convert.value='';

data=data.trim();
document.f.convert.value=data;
}

});

}

    
    
  }
  
   
  
  
  
  
  
  
  
  
  
  
        function seven()
  {
    


var tags_txt=$('#conv').val();



if($.trim(tags_txt)!='')
{
$.ajax ({
url:"seven.php",
method:"POST",
data:{convert:tags_txt},
dataType:"text",
success:function(data)
{
//alert(data);

document.f.convert.value='';

data=data.trim();
document.f.convert.value=data;
}

});

}

    
    
  }
  
  
  
  
  
  
  
  
  
    
        function eight()
  {
    


var tags_txt=$('#conv').val();



if($.trim(tags_txt)!='')
{
$.ajax ({
url:"eight.php",
method:"POST",
data:{convert:tags_txt},
dataType:"text",
success:function(data)
{
//alert(data);

document.f.convert.value='';

data=data.trim();
document.f.convert.value=data;
}

});

}

    
    
  }
  
  
  
  
  
  
  
  
  
  
    
        function nine()
  {
    


var tags_txt=$('#conv').val();



if($.trim(tags_txt)!='')
{
$.ajax ({
url:"nine.php",
method:"POST",
data:{convert:tags_txt},
dataType:"text",
success:function(data)
{
//alert(data);

document.f.convert.value='';

data=data.trim();
document.f.convert.value=data;
}

});

}

    
    
  }
  
  
  
  
  
  
  
    
        function ten()
  {
    


var tags_txt=$('#conv').val();



if($.trim(tags_txt)!='')
{
$.ajax ({
url:"ten.php",
method:"POST",
data:{convert:tags_txt},
dataType:"text",
success:function(data)
{
//alert(data);

document.f.convert.value='';

data=data.trim();
document.f.convert.value=data;
}

});

}

    
    
  }
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
    
        function eleven()
  {
    


var tags_txt=$('#conv').val();



if($.trim(tags_txt)!='')
{
$.ajax ({
url:"eleven.php",
method:"POST",
data:{convert:tags_txt},
dataType:"text",
success:function(data)
{
//alert(data);

document.f.convert.value='';

data=data.trim();
document.f.convert.value=data;
}

});

}

    
    
  }
  
  
  
  
  
  
  
  
    
        function twelve()
  {
    


var tags_txt=$('#conv').val();



if($.trim(tags_txt)!='')
{
$.ajax ({
url:"twelve.php",
method:"POST",
data:{convert:tags_txt},
dataType:"text",
success:function(data)
{
//alert(data);

document.f.convert.value='';

data=data.trim();
document.f.convert.value=data;
}

});

}

    
    
  }
  
  
  
  
  
  
  
  
  
    
        function thirteen()
  {
    


var tags_txt=$('#conv').val();



if($.trim(tags_txt)!='')
{
$.ajax ({
url:"thirteen.php",
method:"POST",
data:{convert:tags_txt},
dataType:"text",
success:function(data)
{
//alert(data);

document.f.convert.value='';

data=data.trim();
document.f.convert.value=data;
}

});

}

    
    
  }
  
  
  
  
  
  
  
  
  
  
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
font-size:33px;
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







$ser=trim($_POST['ser']);

if($ser==1)
{
include_once('b2uu.php');  

//print"$convert";

}









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
<form  name='f' action='test.php' method='POST'>

<td width='40%' align='center'>

<?php
print"
<textarea class='tinymce' name='convert' id='conv_b' style='FONT-FAMILY:SutonnyMJ; FONT-SIZE: 24px'>$convert</textarea>
";
?>

</td>
</tr>
</table>

<table align='center' width='400' cellpadding='0' height='30' cellspacing='0' bgcolor=''>
<tr>
<td align='center'>

<input type='button' onclick='buu()' value='Start' id='b1'>

<input type='hidden' name='ser' value='2'>

&nbsp;&nbsp;

</form>

</td>







<?php
print"
<form  name='f1' action='test.php' method='POST'>

<td align='center'>

<input type='button' onclick='buu2()' value='Bijoy To Unicode' id='b1'>

<input type='hidden' name='ser' value='1'>
<input type='hidden' size='100' name='description' value='$convert'>


&nbsp;&nbsp;

</form>

</td>

";
?>







<td align='left'>


<input type='button' onclick='uub()' value='Unicode To Bijoy' id='b2'>


</td>

<td align='left'>

<input type='reset' onclick='cl()' value='&nbsp;&nbsp;&nbsp;Clear&nbsp;&nbsp;&nbsp;' id='b2'>
</td>
<td align='left'>
<input type='button' onclick='cf()'  value='&nbsp;&nbsp;&nbsp; Copy &nbsp;&nbsp;&nbsp;' id='b2'>


</td>
</tr>

</table>


<table align='center' width='100%' cellpadding='0' height='30' cellspacing='0' bgcolor=''>
<tr>
<td align='center' height='50'> 

<input type='button' value='1'  onclick='one()'>
&nbsp;
<input type='button' value='2'  onclick='two()'>
&nbsp;
<input type='button' value='3'  onclick='three()'>
&nbsp;
<input type='button' value='4'   onclick='four()'>
&nbsp;
<input type='button' value='5'  onclick='five()'>
&nbsp;
<input type='button' value='6'  onclick='six()'>
&nbsp;



<input type='button' value='7'  onclick='seven()'>
&nbsp;


<input type='button' value='8'  onclick='eight()'>
&nbsp;


<input type='button' value='9'  onclick='nine()'>
&nbsp;


<input type='button' value='10'  onclick='ten()'>
&nbsp;



<input type='button' value='11'  onclick='eleven()'>
&nbsp;

<input type='button' value='12'  onclick='twelve()'>
&nbsp;

<input type='button' value='13'  onclick='thirteen()'>
&nbsp;






</td>
</tr>














</table>

</div>
</table>




<br>
<br>
<br>

<?php
print"
";
?>

<script>



 tinymce.init({
        selector: "textarea:not(.textarea-no-styles)",
 });




/*
    tinymce.init({
      selector: 'textarea.tinymce',
      plugins: '',
      toolbar: '',
      toolbar_mode: 'floating',
      });
      
      */
      
  </script>
  
  
  <?php
  print"
";

?>

<?php
print"
</body>

</html>
";




?>