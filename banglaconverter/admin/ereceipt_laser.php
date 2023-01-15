<?php

include_once('dbconnection.php');



$ser=trim($_POST['ser']);

$customer_name=trim($_POST['customer_name']);
$customer_id=trim($_POST['customer_id']);
$mobile=trim($_POST['mobile']);
$email=trim($_POST['email']);
$address=trim($_POST['address']);





$customer_name=str_replace("'","`","$customer_name");
$mobile=str_replace("'","`","$mobile");
$email=str_replace("'","`","$email");
$address=str_replace("'","`","$address");









$s=trim($_POST['s']);
$d=$_GET['dell'];

//print" $category_name - $details ";



if($ser==10)
{


$sql= "UPDATE  `receipt_laser` SET `customer_name`='$customer_name' WHERE `user_id`='$s'";
mysql_query($sql);

$sql= "UPDATE  `receipt_laser` SET `customer_id`='$customer_id' WHERE `user_id`='$s'";
mysql_query($sql);

$sql= "UPDATE  `receipt_laser` SET `mobile`='$mobile' WHERE `user_id`='$s'";
mysql_query($sql);

$sql= "UPDATE  `receipt_laser` SET `email`='$email' WHERE `user_id`='$s'";
mysql_query($sql);

$sql= "UPDATE  `receipt_laser` SET `address`='$address' WHERE `user_id`='$s'";
mysql_query($sql);

include_once('s.php');
}




if($d!="")
{

$result = mysql_query("DELETE FROM receipt_laser WHERE user_id=$d");

	
}





print"

<html>

<head>
<title> Edit Receipt_laser </title>
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


<tr> <td height='30' width='200' bgcolor='green'> &nbsp;&nbsp;&nbsp;  <span id='child'> <b> <font color='white'> Edit Receipt_laser </font> </b> </span>  </td></tr>

<tr> <td height='7'> </td></tr>





";


include_once('edit_left.php');


print"
















<td align='center' valign='top' width='980'>  



<table align='center' width='700' cellpadding='0' cellspacing='0'>
<tr> <td height='10'>  </td> </tr>
</table>



<table align='center' width='800' cellpadding='0' cellspacing='0'>
<tr> <td align='center' height='28' bgcolor='#7087A3' id='tda'>  <font face='arial' color='white' size='2'> <b> Edit Receipt_laser  </b> </font> </td> </tr>
</table>





<table align='center' width='800' cellpadding='1' cellspacing='1' bgcolor='EFEBEB'>




<tr bgcolor='gray' height='40'> 
     <td  bgcolor='' align='center' height='0' width=''> <font face='arial' size='2'> Receipt Laser Name </font> </td>
     <td align='center' width=''> <font face='arial' size='2'> Laser ID </font> </td>
	 <td align='center' width=''> <font face='arial' size='2'> Mobile </font> </td>
	 <td align='center' width=''> <font face='arial' size='2'> Email </font> </td>
	 	 <td align='center' width=''> <font face='arial' size='2'> Address </font> </td>
	
	 
	 <td align='center' width=''> <font face='arial' size='2'> Edit </font> </td>
	 
	 ";

	 if($user_name1=="superadmin")
{
print"
	 <td align='center' width=''> <font face='arial' size='2'> Delete </font> </td>
	 ";
	 
}

print"
</tr>
";






$d=11;

//$result = mysql_query("SELECT * FROM product_category");



$result = mysql_query("SELECT * FROM `receipt_laser`  ORDER BY `user_id` ASC  LIMIT 0 , 60000 ");

while ($a_row = mysql_fetch_row($result)) {

	foreach ($a_row as $field) {
		
	}


print"
<tr bgcolor='white' height='40'> 

<form action='ereceipt_laser.php' method='POST'>

	
	    <td  bgcolor='' align='center' height='0' width='100'> <font face='arial' size='2'> <input type='text' name='customer_name' value='$a_row[1]' size='10'>  </font> </td>
		
	    <td  bgcolor='' align='center' height='0' width='40'> <font face='arial' size='2'> <input type='text' name='customer_id' value='$a_row[2]' size='10'>  </font> </td>
		
	    <td  bgcolor='' align='center' height='0' width='40'> <font face='arial' size='2'> <input type='text' name='mobile' value='$a_row[3]' size='10'>  </font> </td>
		
			    <td  bgcolor='' align='center' height='0' width='40'> <font face='arial' size='2'> <input type='text' name='email' value='$a_row[4]' size='10'>  </font> </td>
		
	 
	 
     <td align='center' width='180'> <font face='arial' size='2'> <input type='text' name='address' value='$a_row[5]' size='30'> </font> </td> 
	 
	 
		
	 <td align='center' width='70'> 
	 <input type='hidden' name='ser' value='10'>
	 <input type='hidden' name='s' value='$a_row[0]'>
	 <font face='arial' size='2'> <input type='submit' value='Edit'> </font>


	 </td>
	 </form>
	 
";

	 if($user_name1=="superadmin")
{
print"	 
	 
	 <td align='center' width='70'> <a onClick=\"javascript: return confirm('Are you confirm to delete');\" href=\"ereceipt_laser.php?dell=".$a_row[0]."\"> <div id='del'><font face='arial' size='2'> Delete  </font> </div>  </a> </td>
	 ";
}

print"
</tr>
";


}












print"
<tr> <td align='center' height='30' bgcolor=''>   </td> <td> </td> </tr>

</table>





<table align='center' width='800' cellpadding='0' cellspacing='0'>
<tr> <td align='center' height='28' bgcolor='#7087A3' id='tdt'>  <font face='arial' color='white' size='2'> <b>   </b> </font> </td> </tr>
</table>









</td>


</tr>
</table>




</body>

</html>


";


?>