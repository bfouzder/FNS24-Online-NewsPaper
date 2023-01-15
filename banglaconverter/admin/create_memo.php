<?php
include_once('dbconnection.php');



$ser=trim($_POST['ser']);
$company_name=trim($_POST['ad2']);
$mobile=trim($_POST['mobile']);
$email=trim($_POST['email']);







if($ser==1)
{


$s=1;

$banner= $_FILES['banner']['name'];




$bannert= time().$banner['name'];

$fnn = $_FILES['banner']['type'];




$ii="$fnn";

$jj="image/jpeg";

$jj1="image/gif";




if($ii==$jj)
{

$banner="$bannert.jpg";
$jf=1;
}





if($ii==$jj1)
{

$banner="$bannert.gif";
$jf=1;
}







if($ser!="")
{



$upload_dir="banner";



$s=1;
$sql= "UPDATE  `address` SET `mobile`='$mobile' WHERE `user_id`='$s'";
mysql_query($sql);


$sql= "UPDATE  `address` SET `email`='$email' WHERE `user_id`='$s'";
mysql_query($sql);

$sql= "UPDATE  `address` SET `address`='$company_name' WHERE `user_id`='$s'";
mysql_query($sql);



if($banner!="")
{

if($jf==1)

{
	
$sql= "UPDATE  `address` SET `name`='$banner' WHERE `user_id`='$s'";
mysql_query($sql);


copy($_FILES['banner']['tmp_name'], "$upload_dir/$banner") or die("Couldn't copy");
}


}


include_once('s.php');



}


}



print"

<html>

<head>
<title> Edit Memo </title>
";


include_once('style.php');


include_once('jw.php');


print"
</head>


<body>
";


include_once('header.php');


print"
<table align='center' width='1200' cellpadding='0' cellspacing='1' height='800' bgcolor='gray'>
<tr bgcolor='white'> 
<td align='center' valign='top' width='220' bgcolor='#C5B991'>  

<table align='center' width='200' cellpadding='0' cellspacing='0' height=''>

<tr> <td height='10'> </td></tr>


<tr> <td height='30' width='200' bgcolor='green'> &nbsp;&nbsp;&nbsp;  <span id='child'> <b> <font color='white'>Creat</font> </b> </span>  </td></tr>

<tr> <td height='7'> </td></tr>





";


include_once('create_left.php');


print"
















<td align='center' valign='top' width='980'>  



<br>


<form enctype='multipart/form-data'  action='create_memo.php' method='POST'>

<table align='center' width='900' cellpadding='0' cellspacing='0'>
<tr> <td align='center' height='28' bgcolor='#7087A3' id='tda'>  <font face='arial' color='white' size='2'> <b> Edit memo </b> </font> </td> </tr>
</table>





<table align='center' width='900' cellpadding='0' cellspacing='0' bgcolor='F2F2F2'>
<tr> <td align='center' height='20' bgcolor=''>   </td> <td> </td> </tr>


";

$result = mysql_query("SELECT * FROM address");

while ($a_row = mysql_fetch_row($result)) {

	foreach ($a_row as $field) {
		
	}

print"
<tr> 
     <td height='20' bgcolor='' align='right' valign='top'> <font face='arial' size='2'>  </font>   </td>
     <td align='left'>&nbsp; 


<img src='banner/$a_row[1]' width='300' height='100'>

</td> 
</tr>

<tr> <td height='10'> </td> </tr>

";



print"

<tr> 
     <td height='20' bgcolor='' align='right' valign='top'> <font face='arial' size='2'> Ad logo </font>   </td>
     <td align='left'>&nbsp; 

<input type='file' name='banner'>


</td> 
</tr>

<tr> <td height='10'> </td> </tr>





<tr> 
     <td height='20' bgcolor='' align='right' valign='top'> <font face='arial' size='2'> Company Name: </font>   </td>
     <td align='left'>&nbsp; <textarea  name='ad2' rows='6' cols='40'> $a_row[4]</textarea> </td> 
</tr>

<tr> <td height='10'> </td> </tr>


<tr> 
     <td height='20' bgcolor='' align='right' valign='top' width='100'> <font face='arial' size='2'> Banner : </font>   </td>
     <td align='left'>&nbsp; <input type='text' name='mobile' value='$a_row[2]'> </td> 
</tr>

<tr> <td height='10'> </td> </tr>




";

/*
<tr> 
     <td height='20' bgcolor='' align='right' valign='top'> <font face='arial' size='2'> Address : </font>   </td>
     <td align='left'>&nbsp; 
	 
	 
	 <textarea id='qq2' name='mobile' rows='6' cols='40'>$a_row[2]</textarea>
	 
	 
	 </td> 
</tr>


<tr> <td height='10'> </td> </tr>

<tr> 
     <td height='20' bgcolor='' align='right' valign='top'> <font face='arial' size='2'> Mobile : </font>   </td>
     <td align='left'>&nbsp; 
	 
	 
	 <textarea id='3q2' name='email' rows='6' cols='40'>$a_row[3]</textarea>
	 	 
	 
	 </td> 
</tr>


<tr> <td height='10'> </td> </tr>

<tr> 
     <td height='20' bgcolor='' align='right' valign='top'> <font face='arial' size='2'> Only Banner With Gif : </font>   </td>
     <td align='left'>&nbsp; 
	 
	  
	 <textarea id='3q2' name='email' rows='6' cols='40'>$a_row[3]</textarea>
	 	 
	 
	 </td> 
</tr>

*/


print"

<tr> <td height='10'> </td> </tr>




<tr> 
     <td height='20' bgcolor='' align='right' valign='top'>   </td>
     <td align='left'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

<input type='hidden'  name='ser' value='1'>
<input type='hidden'  name='pas' value='$pas'>


<input type='hidden' name='sesion_user_id' value='$sesion_user_id'>
<input type='hidden' name='sesion_password' value='$sesion_password'>
<input type='hidden' name='sy' value='1'>

 <input type='Submit' id='qq' value='Edit'>  


</td> </tr></td> 
</tr>
";

}

print"


<tr> <td align='center' height='20' bgcolor=''>   </td> <td> </td> </tr>

</table>






<table align='center' width='900' cellpadding='0' cellspacing='0'>
<tr> <td align='center' height='28' bgcolor='#7087A3' id='tdt'>  <font face='arial' color='white' size='2'> <b>   </b> </font> </td> </tr>

<tr> <td height='100'> </td> </tr>
</table>

</form>



</td>


</tr>

<tr> <td height='100'> &nbsp; </td> </tr>
</table>





</body>

</html>


";


?>