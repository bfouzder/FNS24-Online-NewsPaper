<?php

include_once('dbconnection.php');


$ser=trim($_POST['ser']);

$customer_name=trim($_POST['customer_name']);
$customer_id=trim($_POST['customer_id']);
$mobile=trim($_POST['mobile']);
$email=trim($_POST['email']);
$address=trim($_POST['address']);
$company_name=trim($_POST['company_name']);
$category=trim($_POST['category']);



$customer_name=str_replace("'","`","$customer_name");
$company_name=str_replace("'","`","$company_name");
$mobile=str_replace("'","`","$mobile");
$email=str_replace("'","`","$email");
$address=str_replace("'","`","$address");
$category=str_replace("'","`","$category");
$company_name=$customer_name;






$sql="SELECT * FROM `create_area` WHERE user_id='$category' ";
$result=mysql_query($sql);
$arr=mysql_fetch_array($result);
$category_name=$arr[1];



if($ser==1)
{
$a=0;



/*

$sql="SELECT * FROM `customer` WHERE customer_id='$customer_id' ";


$result=mysql_query($sql);
$arrp=mysql_fetch_array($result);
$t=$arrp[2];


if($t!="")
{
include_once('ci.php');
$a=1;
}

*/






if($a==0)
{

if($customer_name=="" || $category=="")
{
include_once('w.php');
$a=1;
}

}

if($a==0)
{
$sql = "INSERT INTO `customer` (`user_id`, `customer_name`, `customer_id`, `mobile`, `email`, `address`, `area`, `company_name`) VALUES ('','$customer_name','$customer_id','$mobile','$email','$address','$category','$company_name')";
mysql_query($sql);

include_once('s.php');
}

}


print"

<html>

<head>
<title> New Customer Name </title>
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


include_once('header2.php');


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



<form action='customer.php' method='POST'>


<table align='center' width='400' cellpadding='0' cellspacing='0'>
<tr> <td height='20'>  </td> </tr>
</table>



<table align='center' width='400' cellpadding='0' cellspacing='0'>
<tr> <td align='center' height='28' bgcolor='#7087A3' id='tda'>  <font face='arial' color='white' size='2'> <b> New Customer Name  </b> </font> </td> </tr>
</table>





<table align='center' width='400' cellpadding='0' cellspacing='0' bgcolor='EFEBEB'>
<tr> <td align='center' height='30' bgcolor=''>   </td> <td> </td> </tr>






<tr> 
     <td  bgcolor='' align='right' height='0'> <font face='arial' size='2'> Select Area : </font>   </td>
     <td align='left'>&nbsp;
	 
<select id='c9' name='category'>

<option value='$category'> $category_name </option>
";

//$result = mysql_query("SELECT * FROM product_category");


$result = mysql_query("SELECT * FROM `create_area`  ORDER BY `user_id` ASC  LIMIT 0 , 60000 ");


while ($a_row = mysql_fetch_row($result)) {

	foreach ($a_row as $field) {
		
	}

print"
<option value='$a_row[0]'> $a_row[1] </option>
";
}


print"
</select>
	 </td> 
</tr>

<tr> <td height='10'> </td> </tr>












<tr> 
     <td  bgcolor='' align='right' height='0'> <font face='arial' size='2'> Customer Name : </font>   </td>
     <td align='left'>&nbsp; <input type='text' id='c9'  name='customer_name' size='26'> </td> 
</tr>

<tr> <td height='10'> </td> </tr>

";


/*


<tr> 
     <td  bgcolor='' align='right' height='0'> <font face='arial' size='2'> Customer ID : </font>   </td>
     <td align='left'>&nbsp; <input type='text'  name='customer_id' size='26'> </td> 
</tr>

<tr> <td height='10'> </td> </tr>
*/


print"

<tr> 
     <td  bgcolor='' align='right' height='0'> <font face='arial' size='2'> Mobile : </font>   </td>
     <td align='left'>&nbsp; <input type='text' id='c9'  name='mobile' size='26'> </td> 
</tr>

<tr> <td height='10'> </td> </tr>



<tr> 
     <td  bgcolor='' align='right' height='0'> <font face='arial' size='2'> Email : </font>   </td>
     <td align='left'>&nbsp; <input type='text' id='c9'  name='email' size='26'> </td> 
</tr>

<tr> <td height='10'> </td> </tr>

";


/*

<tr> 
     <td  bgcolor='' align='right' height='0'> <font face='arial' size='2'> Company Name : </font>   </td>
     <td align='left'>&nbsp; <input type='text' id='c9'  name='company_name' size='25'> </td> 
</tr>

<tr> <td height='10'> </td> </tr>

*/




print"
<tr> 
     <td  bgcolor='' align='right' height='0' valign='top'> <font face='arial' size='2'> Address : </font>   </td>
     <td align='left'>&nbsp; 


<input type='text'  id='c9' name='address' size='25'> 
 </td> 
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