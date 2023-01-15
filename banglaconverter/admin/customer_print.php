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



}




if($d!="")
{

$result = mysql_query("DELETE FROM customer WHERE user_id=$d");

	
}





print"

<html>

<head>
<title>  Customer </title>
";


include_once('style.php');


print"
</head>


<body>
";


include_once('address.php');


print"
<table align='center' width='1200' cellpadding='0' cellspacing='0' height='' bgcolor=''>
<tr bgcolor='white'> 






";


//include_once('edit_left.php');


print"



<td align='center' valign='top' width='1000'>  



<table align='center' width='900' cellpadding='0' cellspacing='0'>
<tr> <td height='10'>  </td> </tr>
</table>



<table align='center' width='1000' cellpadding='0' cellspacing='0'>
<tr> <td align='center' height='28' bgcolor='' id='tda'>  <font face='arial' color='black' size='4'> <b>  Customer Lists   </b> </font> </td> </tr>
</table>


<br>


<table align='center' width='1000' cellpadding='4' cellspacing='1' bgcolor='EFEBEB'>




<tr bgcolor='F2F2F2' height='40'> 

     <td align='left' width='10'> <font face='arial' size='4'> SL  </font> </td>
     <td  bgcolor='' align='left' height='0' width=''> <font face='arial' size='4'> Customer Name </font> </td>
     <td align='left' width='20'> <font face='arial' size='4'> Customer ID </font> </td>
	 <td align='left' width=''> <font face='arial' size='4'> Mobile </font> </td>
	 <td align='left' width=''> <font face='arial' size='4'> Email </font> </td>
	 ";
	 
	 /*
	 <td align='center' width='150'> <font face='arial' size='4'> Company Name </font> </td>
	 */
	 
	 
	 print"
	 <td align='left' width=''> <font face='arial' size='4'> Address </font> </td>
";

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



$result = mysql_query("SELECT * FROM `customer`  ORDER BY `customer_name` ASC  LIMIT 0 , 60000 ");


while ($a_row = mysql_fetch_row($result)) {

	foreach ($a_row as $field) {
		
	}

$eqq++;

$ku++;

print"
<tr bgcolor='white' height='40'> 

<form action='ecustomer.php' method='POST'>

	<td align='left'> $ku </td>
	    <td  bgcolor='' align='left' height='0' width='100'> <font face='arial' size='4'>  $a_row[1]   </font> </td>
		
	    <td  bgcolor='' align='left' height='0' width='40'> <font face='arial' size='4'> $a_row[2]   </font> </td>
		
	    <td  bgcolor='' align='left' height='0' width='40'> <font face='arial' size='4'> $a_row[3]   </font> </td>
		
			    <td  bgcolor='' align='left' height='0' width='40'> <font face='arial' size='4'> $a_row[4]   </font> </td>

			    <td  bgcolor='' align='left' height='0' width='40'> <font face='arial' size='4'> $a_row[5]   </font> </td>


				";
				

		

	 if($user_name1=="superadmin")
{

	 
}

print"
</tr>
";


}

//}












print"

</table>

<br>
<br>
<br>
<br>















</td>


</tr>
</table>




</body>

</html>


";


?>