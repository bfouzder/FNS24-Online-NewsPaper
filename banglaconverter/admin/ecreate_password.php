<?php
include_once('dbconnection.php');




$ser=trim($_POST['ser']);

$s=trim($_POST['s']);


$user_name=trim($_POST['user_name']);
$password=trim($_POST['password']);
$email=trim($_POST['email']);
$details=trim($_POST['details']);
$name=trim($_POST['name']);

$status=trim($_POST['status']);
$s_id=trim($_POST['s_id']);

$go=trim($_POST['go']);





$zc=1;


if($user_name1=="superadmin" && $user_name=="superadmin")
{
$zc=1;
}


if($user_name1!="superadmin" && $user_name=="superadmin")
{
$zc=0;
}




if($ser==10 && $zc==1)
{





$sql= "UPDATE  `create_password` SET `name`='$name' WHERE `user_id`='$s'";
mysql_query($sql);


$sql= "UPDATE  `create_password` SET `email`='$email' WHERE `user_id`='$s'";
mysql_query($sql);


$sql= "UPDATE  `create_password` SET `user_name`='$user_name' WHERE `user_id`='$s'";
mysql_query($sql);


$sql= "UPDATE  `create_password` SET `password`='$password' WHERE `user_id`='$s'";
mysql_query($sql);

$sql= "UPDATE  `create_password` SET `status`='$status' WHERE `user_id`='$s'";
mysql_query($sql);


$sql= "UPDATE  `create_password` SET `s_id`='$s_id' WHERE `user_id`='$s'";
mysql_query($sql);


$sql= "UPDATE  `create_password` SET `go`='$go' WHERE `user_id`='$s'";
mysql_query($sql);



include_once('s.php');



}



if($ser==11)
{


$result = mysql_query("DELETE FROM create_password WHERE user_id=$s");
include_once('d.php');


}





print"

<html>

<head>
<title> Edit Account </title>
";


include_once('style.php');


print"
</head>


<body>
";


include_once('header2.php');


print"
<table align='center' width='1200' cellpadding='0' cellspacing='1' height='800' bgcolor='gray'>
<tr bgcolor='white'> 
<td align='center' valign='top' width='220' bgcolor='#C5B991'>  

<table align='center' width='200' cellpadding='0' cellspacing='0' height=''>

<tr> <td height='10'> </td></tr>


<tr> <td height='30' width='200' bgcolor='green'>   <span id='child'> <b> <font color='white'> Edit </font> </b> </span>  </td></tr>

<tr> <td height='7'> </td></tr>





";


include_once('edit_left.php');


print"
















<td align='center' valign='top' width='980'>  
";



print"
<table align='center' width='960' cellpadding='4' cellspacing='0'>
<tr> <td align='center' height='28' bgcolor='#7087A3' id='tda'>  <font face='arial' color='white' size='2'> <b>  Edit Account </b> </font> </td> </tr>
</table>





<table align='center' width='960' cellpadding='4' cellspacing='1' bgcolor='cccccc'>
<tr> <td align='center' height='20' bgcolor=''>   </td> <td> </td> </tr>


<tr bgcolor='F2F2F2'> 

     <td  bgcolor='' align='center' height='28' width='100'> <font face='arial' size='2'> Branch ID </font>   </td>


     <td  bgcolor='' align='center' height='28' width='100'> <font face='arial' size='2'> Name </font>   </td>

     <td align='center' width='80'>&nbsp;  <font face='arial' size='2'> Email </font> </td> 
     <td align='center' width='80'>&nbsp;  <font face='arial' size='2'> User Name </font> </td> 
     <td align='center' width='80'>&nbsp;  <font face='arial' size='2'> Password </font> </td> 
     <td align='center' width='80'>&nbsp;  <font face='arial' size='2'> Sales Man ID </font> </td> 

	 ";
	 
	 	 if($user_name1=="superadmin")
{
	print"
	 <td align='center' width='80'>&nbsp;  <font face='arial' size='2'> Status </font> </td> 
";
	 }	 
	 
	 print"
	 
     <td align='center' width='80'>&nbsp;  <font face='arial' size='2'> Edit </font> </td> 
     <td align='center' width='80'>&nbsp;  <font face='arial' size='2'> Delete </font> </td> 
</tr>

";




if($user_name1=="superadmin")
{
$result = mysql_query("SELECT * FROM create_password");
}
else
{
$result = mysql_query("SELECT * FROM `create_password` where user_name='$user_name1' && password='$password1'");	
}





while ($a_row = mysql_fetch_row($result)) {

	foreach ($a_row as $field) {
		
	}


print"

<tr bgcolor='F2F2F2'> 
<form enctype='multipart/form-data' action='ecreate_password.php' method='POST'>

     <td  bgcolor='' align='center' height='' width=''> <input type='text' name='go' value='$a_row[9]' size='10'>    </td>


     <td  bgcolor='' align='center' height='' width=''> <input type='text' name='name' value='$a_row[1]' size='10'>    </td>
     <td  bgcolor='' align='center' height='' width=''> <input type='text' name='email' value='$a_row[2]' size='10'>    </td>
     <td  bgcolor='' align='center' height='' width=''> <input type='text' name='user_name' value='$a_row[3]' size='10'>    </td>
     <td  bgcolor='' align='center' height='' width=''> <input type='text' name='password' value='$a_row[4]' size='5'>    </td>
     <td  bgcolor='' align='center' height='' width=''> <input type='text' name='s_id' value='$a_row[8]' size='3'>    </td>

	 ";
	 
	 
	 if($user_name1=="superadmin")
{
	 print"
     <td  bgcolor='' align='center' height='' width=''> <input type='text' name='status' value='$a_row[7]' size='3'>    </td>
	 ";
	 
}
	 
print"
     <td align='center' width='80'> 

<input type='hidden' name='ser' value='10'>

<input type='hidden' name='s' value='$a_row[0]'>

<input type='hidden' name='sesion_user_id' value='$sesion_user_id'>
<input type='hidden' name='sesion_password' value='$sesion_password'>
<input type='hidden' name='sy' value='1'>

<input type='submit' value='Edit'>
 </font> </td> 

</form>


<form enctype='multipart/form-data' action='ecreate_password.php' method='POST'>

     <td align='center' width='80'>  

<input type='hidden' name='ser' value='11'>

<input type='hidden' name='s' value='$a_row[0]'>

<input type='hidden' name='sesion_user_id' value='$sesion_user_id'>
<input type='hidden' name='sesion_password' value='$sesion_password'>
<input type='hidden' name='sy' value='1'>
<input type='submit' value='Delete'> </font> </td> 

</form>
</tr>

";

}



print"


<tr> <td align='center' height='20' bgcolor=''>   </td> <td> </td> </tr>

</table>





<table align='center' width='960' cellpadding='0' cellspacing='0'>
<tr> <td align='center' height='28' bgcolor='#7087A3' id='tdt'>  <font face='arial' color='white' size='2'> <b>   </b> </font> </td> </tr>
</table>


";




print"

</td>


</tr>
</table>




</body>

</html>


";


?>