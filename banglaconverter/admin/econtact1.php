<?php

include_once('dbconnection.php');



$ser=trim($_POST['ser']);

$customer_name=trim($_POST['customer_name']);
$customer_id=trim($_POST['customer_id']);
$mobile=trim($_POST['mobile']);
$email=trim($_POST['email']);
$address=trim($_POST['address']);
$company_name=trim($_POST['company_name']);






$customer_name=str_replace("'","`","$customer_name");
$company_name=str_replace("'","`","$company_name");
$mobile=str_replace("'","`","$mobile");
$email=str_replace("'","`","$email");
$address=str_replace("'","`","$address");
$category=str_replace("'","`","$category");
$company_name=$customer_name;





$s=trim($_POST['s']);
$d=$_GET['dell'];

//print" $category_name - $details ";



if($ser==10)
{


$sql= "UPDATE  `contact1` SET `customer_name`='$customer_name' WHERE `user_id`='$s'";
mysql_query($sql);

$sql= "UPDATE  `contact1` SET `customer_id`='$customer_id' WHERE `user_id`='$s'";
mysql_query($sql);

$sql= "UPDATE  `contact1` SET `mobile`='$mobile' WHERE `user_id`='$s'";
mysql_query($sql);

$sql= "UPDATE  `contact1` SET `email`='$email' WHERE `user_id`='$s'";
mysql_query($sql);

$sql= "UPDATE  `contact1` SET `address`='$address' WHERE `user_id`='$s'";
mysql_query($sql);




include_once('s.php');
}




if($d!="")
{

$result = mysql_query("DELETE FROM contact1 WHERE user_id=$d");

	
}





print"

<html>

<head>
<title> Edit Receiver Person </title>
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



<table align='center' width='900' cellpadding='0' cellspacing='0'>
<tr> <td height='10'>  </td> </tr>
</table>



<table align='center' width='900' cellpadding='0' cellspacing='0'>
<tr> <td align='center' height='28' bgcolor='#7087A3' id='tda'>  <font face='arial' color='white' size='2'> <b> Edit Receiver  Name </b> </font> </td> </tr>
</table>





<table align='center' width='900' cellpadding='1' cellspacing='1' bgcolor='EFEBEB'>




<tr bgcolor='white' height='40'> 
     <td  bgcolor='' align='center' height='0' width=''> <font face='arial' size='2'> Receiver Name </font> </td>
     <td align='center' width=''> <font face='arial' size='2'> Customer ID </font> </td>
	 <td align='center' width=''> <font face='arial' size='2'> Mobile </font> </td>
	 <td align='center' width=''> <font face='arial' size='2'> Email </font> </td>
	 ";
	 
	 /*
	 <td align='center' width='150'> <font face='arial' size='2'> Company Name </font> </td>
	 */
	 
	 
	 print"
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



$result = mysql_query("SELECT * FROM `create_area`  ORDER BY `user_id` ASC  LIMIT 0 , 60000 ");

while ($a_row = mysql_fetch_row($result)) {

	foreach ($a_row as $field) {
		
	}
	
	$ty++;
	$c_id[$ty]=$a_row[0];
    $c_name[$ty]=$a_row[1];
	
}







//for($i=1;$i<=$ty;$i++)
//{
	
/*
	print"
	
<tr bgcolor='white' height='40'> 
<td align='center' height='40'> $c_name[$i] </td>
</tr>
	";

*/


$d=11;

//$result = mysql_query("SELECT * FROM product_category");

//$result = mysql_query("SELECT * FROM `customer` where area='$c_id[$i]' ORDER BY `user_id` ASC  LIMIT 0 , 60000 ");



$result = mysql_query("SELECT * FROM `contact1`  ORDER BY `customer_name` ASC  LIMIT 0 , 60000 ");


while ($a_row = mysql_fetch_row($result)) {

	foreach ($a_row as $field) {
		
	}

$eqq++;

$ku++;

print"
<tr bgcolor='white' height='40'> 

<form action='econtact1.php' method='POST'>

	
	    <td  bgcolor='' align='center' height='0' width='100'> <font face='arial' size='2'> <b> $ku_old </b>  <input type='text' name='customer_name' value='$a_row[1]' size='30'>  </font> </td>
		
	    <td  bgcolor='' align='center' height='0' width='40'> <font face='arial' size='2'> <input type='text' name='customer_id' value='$a_row[0]'  readonly size='10'>  </font> </td>
		
	    <td  bgcolor='' align='center' height='0' width='40'> <font face='arial' size='2'> <input type='text' name='mobile' value='$a_row[3]' size='10'>  </font> </td>
		
			    <td  bgcolor='' align='center' height='0' width='40'> <font face='arial' size='2'> <input type='text' name='email' value='$a_row[4]' size='10'>  </font> </td>
				";
				
				/*
		
	 			    <td  bgcolor='' align='center' height='0' width='40'> <font face='arial' size='2'> <input type='text' name='company_name' value='$a_row[7]' size='10'>  </font> </td>
		*/
		
		
print"
	 
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
	 
	 <td align='center' width='70'> <a onClick=\"javascript: return confirm('Are you confirm to delete');\" href=\"econtact1.php?dell=".$a_row[0]."\"> <div id='del'><font face='arial' size='2'> Delete  </font> </div>  </a> </td>
	 ";
	 
}

print"
</tr>
";


}

//}












print"
<tr> <td align='center' height='30' bgcolor=''>   </td> <td> </td> </tr>

</table>

<br>
<br>
<br>
<br>


<form action='customer_print.php' method='POST' target='_blank'>


  

</form>


<table align='center' width='900' cellpadding='0' cellspacing='0'>
<tr> <td align='center' height='28' bgcolor='#7087A3' id='tdt'>  <font face='arial' color='white' size='2'> <b>   </b> </font> </td> </tr>
</table>









</td>


</tr>
</table>




</body>

</html>


";


?>