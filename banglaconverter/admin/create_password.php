<?php
include_once('dbconnection.php');



$user_name=trim($_POST['user_name']);
$password=trim($_POST['password']);
$email=trim($_POST['email']);
$details=trim($_POST['details']);
$name=trim($_POST['name']);
$status=trim($_POST['status']);
$s_id=trim($_POST['s_id']);
$go=trim($_POST['go']);








$sql="SELECT * FROM `godawn_new` WHERE user_id='$go' ";
$result=mysql_query($sql);
$arrug=mysql_fetch_array($result);
$gon=$arrug[1];




//print" $user_name  - $password  - $email - $details - $name ";


$ser=trim($_POST['ser']);

$a=0;
//print"$branch_name  -  $branch_address";


if($ser==1)
{



if($user_name!="" && $password!="" && $status!="")
{


$sql="SELECT * FROM `create_password` WHERE user_name='$user_name' ";
$result=mysql_query($sql);
$arru=mysql_fetch_array($result);

$aru=$arru[3];

if($aru==$user_name)
{

include_once('aw.php');
$a=1;

}


if($a==0)
{


$log_out=0;

$sql = "INSERT INTO `create_password` (`user_id`, `name`, `email`, `user_name`, `password`, `details`, `log_out`,`status`,`s_id` ,`go`) VALUES ('','$name','$email','$user_name','$password','$details','$log_out','$status','$s_id','$go')";
mysql_query($sql);

include_once('s.php');
}

}
else
{
include_once('w.php');
}
}




print"

<html>

<head>
<title> New Password </title>
";


include_once('style.php');


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


<tr> <td height='30' width='200' bgcolor='green'>   <span id='child'> <b> <font color='white'>Create</font> </b> </span>  </td></tr>

<tr> <td height='7'> </td></tr>





";


include_once('create_left.php');


print"
















<td align='center' valign='top' width='980'>  



<br>
<br>
<br>
";



print"
<form action='create_password.php' method='POST'>

<table align='center' width='500' cellpadding='0' cellspacing='0'>
<tr> <td align='center' height='28' bgcolor='#7087A3' id='tda'>  <font face='arial' color='white' size='2'> <b> New Account  </b> </font> </td> </tr>
</table>





<table align='center' width='500' cellpadding='0' cellspacing='0' bgcolor='F2F2F2'>
<tr> <td align='center' height='20' bgcolor=''>   </td> <td> </td> </tr>








<tr> 

 <td width='50'>
     <td height='20' bgcolor='' align='left' width='150'> <font face='arial' size='2'> Godawn Name  </font>   </td>
     <td align='left' width='250'> :  
";

print"
<select name='go' id='go_new'>
<option value='$go'>$gon</option>
";


$result = mysql_query("SELECT * FROM `godawn_new`  ORDER BY `user_id` ASC  LIMIT 0 , 60000 ");

while ($a_row = mysql_fetch_row($result)) {

	foreach ($a_row as $field) {
		
	}
print"
<option value='$a_row[0]'>$a_row[1]</option>
";

}

print"
</select>
";

print"
 </td> 
</tr>


<tr> <td height='10'> </td> </tr>






<tr> 

 <td width='50'>
     <td height='20' bgcolor='' align='left' width='150'> <font face='arial' size='2'> Name  </font>   </td>
     <td align='left' width='250'> :  <input type='text' id='q1_new' name='name'> </td> 
</tr>


<tr> <td height='10'> </td> </tr>




<tr> 
 <td width=''>
     <td height='20' bgcolor='' align='left'> <font face='arial' size='2'> Email  </font>   </td>
     <td align='left'> : <input type='text' id='q1_new' name='email'> </td> 
</tr>


<tr> <td height='10'> </td> </tr>



<tr> 

<td>  </td>
     <td height='20' bgcolor='' align='left'> <font face='arial' size='2'> Login User Name  </font>   </td>
     <td align='left'> : <input type='text' id='q1_new' name='user_name'> </td> 
</tr>


<tr> <td height='10'> </td> </tr>



<tr> 
<td> </td>
     <td height='20' bgcolor='' align='left'> <font face='arial' size='2'> Password  </font>   </td>
     <td align='left'> :  <input type='password' id='q1_new' name='password'> </td> 
</tr>


<tr> <td height='10'> </td> </tr>






<tr> 

<td> </td>
     <td height='20' bgcolor='' align='left'> <font face='arial' size='2'> Sales Man ID  </font>   </td>
     <td align='left'>  : <input type='text' id='q1_new' name='s_id'> </td> 
</tr>


<tr> <td height='10'> </td> </tr>





<tr> 

<td>  </td>
     <td height='20' bgcolor='' align='left' valign='top'> <font face='arial' size='2'> Details  </font>   </td>
     <td align='left'> :  <input type='text' id='q1_new' name='details'> </td> 
</tr>


<tr> <td height='10'> </td> </tr>


<tr>

<td> </td> 
     <td height='20' bgcolor='' align='left'> <font face='arial' size='2'>  </font>   </td>
     <td align='left'>&nbsp; <input type='radio' name='status' value='1'> Manager &nbsp;
	 <input type='radio' name='status' value='2'> Sales
	 
	 </td> 
</tr>


<tr> <td height='15'> </td> </tr>




<tr> 

<td>  </td>
     <td height='20' bgcolor='' align='right' valign='top'>   </td>
     <td align='left'>


&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;


<input type='hidden'  name='ser' value='1'>
<input type='hidden'  name='pas' value='$pas'>


<input type='hidden' name='sesion_user_id' value='$sesion_user_id'>
<input type='hidden' name='sesion_password' value='$sesion_password'>
<input type='hidden' name='sy' value='1'>

 <input type='Submit' id='qq' value='Save'>  


</td> </tr></td> 
</tr>



<tr> <td align='center' height='20' bgcolor=''>   </td> <td> </td> </tr>

</table>






<table align='center' width='500' cellpadding='0' cellspacing='0'>
<tr> <td align='center' height='28' bgcolor='#7087A3' id='tdt'>  <font face='arial' color='white' size='2'> <b>   </b> </font> </td> </tr>
</table>

</form>
";




print"
</td>


</tr>
</table>




</body>

</html>


";


?>