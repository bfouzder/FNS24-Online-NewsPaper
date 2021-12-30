<?php
include('/home/fns24bangla/public_html/includes/themes/default/templates/newspapers/newspaper_menu.php');
$ser='';
$url_name='';
$editor_name='';
$mobile='';
$email='';
$address='';
$pas='';
if(isset($_POST['formsubmitted'])):
$ser=trim($_POST['ser']);
$url_name=trim($_POST['url_name']);
$editor_name=trim($_POST['editor_name']);
$mobile=trim($_POST['mobile']);
$email=trim($_POST['email']);
$address=trim($_POST['address']);

$addpicture= $_FILES['addpicture']['name'];
$addpicturet= time().$addpicture;
$fnn = $_FILES['addpicture']['type'];
/*
$ii="$fnn";
$jj="image/jpeg";
$jj1="image/gif";
$jj11="image/png";


if($ii==$jj)
{
$addpicture="$addpicturet.jpg";
$cb1=1;
}


if($ii==$jj1)
{
$addpicture="$addpicturet.gif";
$cb1=1;
}

if($ii==$jj11)
{
$addpicture="$addpicturet.png";
$cb1=1;
}
*/
$addpicture="$addpicturet";
$cb1=1;


$upload_dir="/home/fns24bangla/public_html/allnewspaper/newsportal";


$bbb=time(); 
$d=date("m/d/y",$bbb); 
$mon="$d[0]$d[1]";
$dat="$d[3]$d[4]";
$yer="20$d[6]$d[7]";

$adat="$yer$mon$dat";





if($ser==1)
{
$a=0;





if($a==0)
{

if($url_name=="" || $editor_name=="" || $mobile=="")
{
include_once('w.php');
$a=1;
}

}

if($a==0)
{
$sql = "INSERT INTO `np_ad_newsportal` ( `url_name`, `editor_name`, `mobile`, `email`, `address`, `dat`, `mon`, `yer`, `adat`, `pic`) VALUES ('$url_name','$editor_name','$mobile','$email','$address','$dat','$mon','$yer','$adat','$addpicture')";
$user_id=$db->insert($sql);
#mysql_query($sql);



if($addpicture=="")
{
}
else
{
	
	if($cb1==1)
	{
	   // echo $_FILES['addpicture']['tmp_name'].' == '. "$upload_dir/$addpicture";
copy($_FILES['addpicture']['tmp_name'], "$upload_dir/$addpicture") or die("Couldn't copy");
    }

}


//include_once('s.php');


print" <br> <br> <h1> Successfully Submit Please Wait To Publish  Untill Review. </h1> ";
exit;

}

}
endif;//if form submitted








print"

<html>

<head>
<title> Ad news paper </title>

<HTA:APPLICATION ID='oHTA'

APPLICATIONNAME='secondApp'
BORDER='thin'
CAPTION='yes'
VERSION='1.0'
SHOWINTASKBAR='no'
WINDOWSTATE='NORMAL'
SYSMENU='yes'

>
";





print"


<style>

#category

{

width:180px;	
}

#p
{
width:200px;
height:30px;
}

</style>

</head>


<body>
";





print"
<table align='center' width='500' cellpadding='0' cellspacing='0' height='' bgcolor='gray'>
<tr bgcolor='white'> 



";



print"

<td align='center' valign='top' width='480'>  



<form enctype='multipart/form-data' action='' method='POST'>


<table align='center' width='400' cellpadding='0' cellspacing='0'>
<tr> <td height='20'>  </td> </tr>
</table>





<table align='center' width='500' cellpadding='0' cellspacing='0'>
<tr> <td align='center' height='28' bgcolor='#7087A3' id='tda'>  <font face='arial' color='white' size='2'> <b> Ad Your Newsportal  </b> </font> </td> </tr>
</table>





<table align='center' width='500' cellpadding='0' cellspacing='0' bgcolor='EFEBEB'>
<tr> <td align='center' height='30' bgcolor=''>   </td> <td> </td> </tr>

";





print"
<tr>

<td width='40'> </td>

     <td  bgcolor='' align='left' height='0' width='150'> <font face='arial' size='2'> Ad Newsportal Logo  </font>   </td>
     <td align='left' width='250'> : <input type='file'  name='addpicture' size='25'> </td> 
</tr>
<tr> <td height='10'> </td> </tr>
";






print"
<tr> 

<td></td>

     <td  bgcolor='' align='left' height='0'> <font face='arial' size='2'> Url Name  </font>   </td>
     <td align='left'> : <input type='text' id='p' name='url_name' size='25'> </td> 
</tr>
<tr> <td height='10'> </td> </tr>
";



print"
<tr> 

<td></td>

     <td  bgcolor='' align='left' height='0'> <font face='arial' size='2'> Editor Name  </font>   </td>
     <td align='left'> : <input type='text'  id='p' name='editor_name' size='25'> </td> 
</tr>

<tr> <td height='10'> </td> </tr>

";




print"


<tr> 

<td></td>

     <td  bgcolor='' align='left' height='0'> <font face='arial' size='2'> Mobile  </font>   </td>
     <td align='left'> : <input type='text' id='p'  name='mobile' size='25'> </td> 
</tr>

<tr> <td height='10'> </td> </tr>



<tr> 

<td></td>

     <td  bgcolor='' align='left' height='0'> <font face='arial' size='2'> Email </font>   </td>
     <td align='left'> : <input type='text' id='p'  name='email' size='25'> </td> 
</tr>

<tr> <td height='10'> </td> </tr>





<tr> 

<td></td>

     <td  bgcolor='' align='left' height='0' valign='top'> <font face='arial' size='2'> Address  </font>   </td>
     <td align='left'> : <textarea rows='3' id='p' cols='20' name='address'></textarea> </td> 
</tr>

<tr> <td height='10'> </td> </tr>

<tr> 


<td></td>

     <td height='20' bgcolor='' align='right' valign='top'>   </td>
     <td align='left'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

<input type='hidden'  name='ser' value='1'>
<input type='hidden'  name='pas' value='$pas'>

 <input type='submit' id='qq' name='formsubmitted' value='Submit'>  


</td> </tr></td> 
</tr>



<tr> <td align='center' height='30' bgcolor=''>   </td> <td> </td> </tr>

</table>





<table align='center' width='500' cellpadding='0' cellspacing='0'>
<tr> <td align='center' height='28' bgcolor='#7087A3' id='tdt'>  <font face='arial' color='white' size='2'> <b>   </b> </font> </td> </tr>
</table>




</form>




</td>


</tr>
</table>




</body>

</html>


";


?>