<?php
include_once('dbconnection.php');


$ser=trim($_POST['ser']);

$category_name=trim($_POST['category_name']);
$details=trim($_POST['details']);



if($ser==1)
{
	
$a=0;

if($category_name=="" && a==0)
{
include_once('w.php');
$a=1;
}




if($a==0)
{
	
$sql = "INSERT INTO `rexpendature_head` (`user_id`, `category_name`, `details`) VALUES ('','$category_name','$details')";
mysql_query($sql);

include_once('s.php');

}


}


print"

<html>

<head>
<title> Receipt Collection Head Entry </title>
";


include_once('style.php');



print"


<style>

#category

{

width:180px;	
}

</style>

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

<form action='rexpendature_head.php' method='POST'>


<table align='center' width='400' cellpadding='0' cellspacing='0'>
<tr> <td height='20'>  </td> </tr>
</table>



<table align='center' width='400' cellpadding='0' cellspacing='0'>
<tr> <td align='center' height='28' bgcolor='#7087A3' id='tda'>  <font face='arial' color='white' size='2'> <b> Receipt Collection Head Entry  </b> </font> </td> </tr>
</table>





<table align='center' width='400' cellpadding='0' cellspacing='0' bgcolor='EFEBEB'>
<tr> <td align='center' height='30' bgcolor=''>   </td> <td> </td> </tr>




<tr> 
     <td  bgcolor='' align='right' height='0'> <font face='arial' size='2'>  Name: </font>   </td>
     <td align='left'>&nbsp; <input type='text'  name='category_name' size='25'> </td> 
</tr>

<tr> <td height='10'> </td> </tr>







<tr> 
     <td  bgcolor='' align='right' height='0' valign='top'> <font face='arial' size='2'> Details: </font>   </td>
     <td align='left'>&nbsp; <textarea rows='3' cols='20' name='details'></textarea> </td> 
</tr>

<tr> <td height='10'> </td> </tr>











<tr> 
     <td height='20' bgcolor='' align='right' valign='top'>   </td>
     <td align='left'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

<input type='hidden'  name='ser' value='1'>
<input type='hidden'  name='pas' value='$pas'>

 <input type='Submit' id='qq' value='Save'>  


</td> </tr></td> 
</tr>



<tr> <td align='center' height='30' bgcolor=''>   </td> <td> </td> </tr>

</table>





<table align='center' width='400' cellpadding='0' cellspacing='0'>
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