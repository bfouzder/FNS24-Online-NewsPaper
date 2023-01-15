<?php
include_once('dbconnection.php');




$ser=trim($_POST['ser']);

$bill=trim($_POST['bill']);
$s=1;

if($ser==1 && $bill!="")
{
	

	
$sql= "UPDATE  `sett` SET `vat`='$bill' WHERE `user_id`='$s'";
mysql_query($sql);

include_once('s.php');

}



$sql="SELECT * FROM `sett` WHERE user_id='$s' ";
$result=mysql_query($sql);
$arr=mysql_fetch_array($result);
$ch=$arr[2];

if($ch==1)
{
$c1="Checked";
}
else
{
$c2="Checked";	
}











print"

<html>

<head>
<title> Vat Active Or Not </title>
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


<tr> <td height='30' width='200' bgcolor='green'> &nbsp;&nbsp;&nbsp;  <span id='child'> <b> <font color='white'>Create</font> </b> </span>  </td></tr>

<tr> <td height='7'> </td></tr>





";


include_once('create_left.php');


print"
















<td align='center' valign='top' width='980'>  



<br>

<br>
<br>


<form action='vat.php' method='POST'>

<table align='center' width='400' cellpadding='0' cellspacing='0'>
<tr> <td align='center' height='28' bgcolor='#7087A3' id='tda'>  <font face='arial' color='white' size='2'> <b>  Previous Bill Show Or Not </b> </font> </td> </tr>
</table>





<table align='center' width='400' cellpadding='0' cellspacing='0' bgcolor='F2F2F2'>
<tr> <td align='center' height='20' bgcolor=''>   </td> <td> </td> </tr>




<tr> <td height='10'> </td> </tr>


<tr> 
     <td height='20' bgcolor='' align='right'> <font face='arial' size='2'>  </font>   </td>
     <td align='left'>&nbsp;

	 <input type='radio' name='bill' $c1 value='1'> Vat Active  &nbsp;
	 
	 
	 </td> 
</tr>


<tr> <td height='15'> </td> </tr>


<tr> 
     <td height='20' bgcolor='' align='right'> <font face='arial' size='2'>  </font>   </td>
     <td align='left'>&nbsp;

	 <input type='radio' name='bill' $c2 value='2'> Not Active &nbsp;
	 
	 
	 </td> 
</tr>



<tr> <td height='30'> </td> </tr>




<tr> 
     <td height='20' bgcolor='' align='right' valign='top' width='150'>   </td>
     <td align='left'>
	 
	 
	 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

<input type='hidden'  name='ser' value='1'>
<input type='hidden'  name='pas' value='$pas'>



<input type='hidden' name='sy' value='1'>

 <input type='Submit' id='qq' value='Save'>  


</td> </tr></td> 
</tr>



<tr> <td align='center' height='20' bgcolor=''>   </td> <td> </td> </tr>

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