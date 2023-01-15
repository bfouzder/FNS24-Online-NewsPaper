<?php
include_once('dbconnection.php');

session_start();



$ser=trim($_POST['ser']);

$s=trim($_POST['s']);



$sql="SELECT * FROM `chalan` WHERE user_id='$s' ";


$result=mysql_query($sql);
$arra=mysql_fetch_array($result);

$dat=$arra[1];
$mon=$arra[2];
$yer=$arra[3];

$chalan=$arra[5];








print"
<html>

<head>
<meta http-equiv='content-type' content='text/html;charset=utf-8' />
<title> Chalan Print  </title>

";


include_once('style1.php');

print"


<style>

#b
{
border:1px;
border-color:black;
}

</style>


</head>

<body bgcolor='' onload='window.print()'>
";

print"
<table align='left' width='650' cellpadding='0' cellspacing='0'>

<tr> 
<td width='650' align='left'> 
";




include_once('address.php');








print"
<table align='center' width='650' cellpadding='0' cellspacing='0'>
<tr> <td align='center' height='10'>  </td></tr>
<tr> 
<td width='300' align='left'><a href=\"sales.php?action=removee&i5d=$arrp[0]\"> <font face='arial' size='3' color='black'> &nbsp;&nbsp;  <b>  </b> </font> </a> </td>
<td width='130' align='center' bgcolor='cccccc'><font face='arial' size='3'> <b> Chalan   </b> </font> </td>
<td width='270' align='right'><font face='arial' size='3'>  </font> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
</tr>
<tr> <td align='center' height='10'>  </td></tr>
</table>


";

/*
print"

<table align='center' width='650' cellpadding='0' cellspacing='0' bgcolor='black'>
<tr> <td align='left' height='30' bgcolor='white'> 

";



print"
	
 <font face='arial' size='2'>
 <b> Transport Name: </b> $transport_name 
</font>

";




print" </td></tr>
</table>
";


*/





/*
print"
<table align='center' width='800' cellpadding='0' cellspacing='0'>
<tr> <td align='center' height='10'>  </td></tr>

<tr> 
<td width='100' height='0'> </td> 
<td align='left' height='10' width='90'> 
<font face='arial' size='2'> Cust. Name 
</td>
<td align='left' height='10' width='420'> 
<font face='arial' size='2'>:  $suppliern </font>  
</td> 
<td width='200' align='left'>  <a href=\"sales.php?action=removee&i5d=$arrp[0]\"> <font face='arial' size='2' color='black'> Memo no: $money_id </font> </a> 
</td> 
</tr>

<tr> <td height='5'> </td> </tr>

<tr> 
<td width='100' height='0'> </td> 
<td align='left' height='10' width='90'> 
<font face='arial' size='2'> Customer ID	
</td>
<td align='left' height='10' width='420'> 
<font face='arial' size='2'>:  $supplier_id </font>  
</td> 
<td width='200' align='left'>  
</td> 
</tr>




<tr> <td height='5'> </td> </tr>

<tr> 
<td width='100' height='0'> </td> 
<td align='left' height='10' width='90'> 
<font face='arial' size='2'> Address
</td>
<td align='left' height='10' width='420'> 
<font face='arial' size='2'> :  $address , $mobile </font>  
</td> 
<td width='200' align='left'>  
</td> 
</tr>







<tr> <td height='5'> </td> </tr>

<tr> 
<td width='100' height='0'> </td> 
<td align='left' height='10' width='90'> 
<font face='arial' size='2'> Date
</td>
<td align='left' height='10' width='420'> 
<font face='arial' size='2'>:  $dat-$mon-$yer </font>  
</td> 
<td width='200' align='left'>  
</td> 
</tr>
<tr> <td height='5'> </td> </tr>
</table>

*/


print"
<table align='center' width='650' cellpadding='0' cellspacing='0'>
<tr>
<td width='20' height='13'align='center'> <font face='arial' size='2'></font> </td> 
</tr>
</table>


<table align='center' width='650' cellpadding='0' cellspacing='0' bgcolor='black'>
<tr>
<td bgcolor='white'>


<table align='center' width='650' cellpadding='0' cellspacing='0'>
<tr>
<td valign='top' height='650'>

<table align='center' width='650' cellpadding='0' cellspacing='0' bgcolor='white'>


<tr>
<td align='left' bgcolor='white'> $chalan </td>
</tr>
</table>






<table align='center' width='650' cellpadding='0' cellspacing='0'>
<tr>
<td width='20' height='10' align='left'>  </td> 
</tr>
</table>
";



print"
</td>
</tr>
</table>
";



print"
<table align='center' width='650' cellpadding='0' cellspacing='0'>
<tr>
<td width='20' height='10' align='left'>  </td> 
</tr>
</table>

</td>
</tr>
</table>
";





include_once('sign.php');


print"
<br>
</td> 
</tr>
</table>


</td>
</tr>
</table>


</td>
</tr>
</table>

";

//unset($_SESSION['cart']);

//session_unset($_SESSION['cart']);

//session_destroy();


print"
</body>

</head>

</html>



";


?>