<?php

include_once('dbconnection.php');



$ser=trim($_POST['ser']);

$product_name=trim($_POST['product_name']);
$product_id=trim($_POST['product_id']);
$buying_price=trim($_POST['buying_price']);
$selling_price=trim($_POST['selling_price']);
$details=trim($_POST['details']);

$s=trim($_POST['s']);



$d=$_GET['dell'];

//print" $category_name - $details ";



if($ser==10)
{


$sql= "UPDATE  `product_name` SET `product_name`='$product_name' WHERE `user_id`='$s'";
mysql_query($sql);

$sql= "UPDATE  `product_name` SET `product_id`='$product_id' WHERE `user_id`='$s'";
mysql_query($sql);

$sql= "UPDATE  `product_name` SET `buying_price`='$buying_price' WHERE `user_id`='$s'";
mysql_query($sql);

$sql= "UPDATE  `product_name` SET `selling_price`='$selling_price' WHERE `user_id`='$s'";
mysql_query($sql);

$sql= "UPDATE  `product_name` SET `details`='$details' WHERE `user_id`='$s'";
mysql_query($sql);

include_once('s.php');
}




if($d!="")
{

$result = mysql_query("DELETE FROM product_name WHERE user_id=$d");

	
}





print"

<html>

<head>
<title>  Product Name Print </title>
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
<td align='center' valign='top' width='220' bgcolor=''>  

<table align='center' width='200' cellpadding='0' cellspacing='0' height=''>

<tr> <td height='10'> </td></tr>



<tr> <td height='7'> </td></tr>





";


//include_once('edit_left.php');


print"
















<td align='center' valign='top' width='980'>  



<table align='center' width='700' cellpadding='0' cellspacing='0'>
<tr> <td height='10'>  </td> </tr>
</table>



<table align='center' width='1000' cellpadding='0' cellspacing='0'>
<tr> <td align='center' height='28' bgcolor='' id='tda'>  <font face='arial' color='' size='4'> <b>  Products  Name   </b> </font> </td> </tr>
</table>





<table align='center' width='1000' cellpadding='5' cellspacing='1' bgcolor='cccccc'>




<tr bgcolor='F2F2F2' height='40'> 
     <td  bgcolor='' align='center' height='0' width='350'> <font face='arial' size='4'> Product Name </font> </td>
	 
	 <td  bgcolor='' align='center' height='0' width='50'> <font face='arial' size='4'> Model </font> </td>

	 <td  bgcolor='' align='center' height='0' width='50'> <font face='arial' size='4'> Brand  </font> </td>
	 <td  bgcolor='' align='center' height='0' width='50'> <font face='arial' size='4'> Capacity </font> </td>

	 <td  bgcolor='' align='center' height='0' width='50'> <font face='arial' size='4'> Origin  </font> </td>
	 


	 <td  bgcolor='' align='center' height='0' width='50'> <font face='arial' size='4'> Pack Size  </font> </td>
	 
	 
     
	 <td align='center' width=''> <font face='arial' size='3'> Buying price </font> </td>
	 <td align='center' width=''> <font face='arial' size='3'> Selling price </font> </td>
	 <td align='center' width=''> <font face='arial' size='3'> Minimum Piece </font> </td>
	 ";

/*
	 	 <td align='center' width=''> <font face='arial' size='3'> Details </font> </td>
	
*/

print" 
 
	 ";



print"
</tr>
";



$result = mysql_query("SELECT * FROM `product_category`  ORDER BY `user_id` ASC  LIMIT 0 , 60000 ");

while ($a_row = mysql_fetch_row($result)) {

	foreach ($a_row as $field) {
		
	}
	
	$ty++;
	$c_id[$ty]=$a_row[0];
    $c_name[$ty]=$a_row[1];
	
}


$result = mysql_query("SELECT * FROM `product_sub_category`  ORDER BY `user_id` ASC  LIMIT 0 , 60000 ");

while ($a_row = mysql_fetch_row($result)) {

	foreach ($a_row as $field) {
		
	}
	
	$rd++;
	$ca_id[$rd]=$a_row[1];
	$cas_id[$rd]=$a_row[0];
	$can_id[$rd]=$a_row[2];
	
	
	
}



$d=11;

//$result = mysql_query("SELECT * FROM product_category");

for($i=1;$i<=$ty;$i++)
{

print"
<tr bgcolor='white' height='40' align='center'> 
<td bgcolor='#F2F2F2'> <font face=='arail' size='4' color='black'> <b> $c_name[$i] </b> </font> </td>
<td> </td>
<td> </td>

<td> </td>
<td> </td>

<td> </td>
<td> </td>
<td> </td>
<td> </td>


</tr>
";	


	
	
	for($j=1;$j<=$rd;$j++)
	{
		
	if($c_id[$i]==$ca_id[$j])
	
	{
print"
<tr bgcolor='white' height='40' align='center'> 
<td bgcolor='yellow' align='left'> <font face=='arail' size='4' color=''> <b> $can_id[$j] </b> </font> </td>

<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>

</tr>
";	

$result = mysql_query("SELECT * FROM `product_name` where sub_category_id='$cas_id[$j]' ORDER BY `user_id` ASC  LIMIT 0 , 60000 ");

while ($a_row = mysql_fetch_row($result)) {

	foreach ($a_row as $field) {
		
	}


print"
<tr bgcolor='white' height='40'> 

<form action='eproduct_name.php' method='POST'>

	
	    <td  bgcolor='' align='left' height='0' width='50'> <font face='arial' size='3'>  $a_row[2]  </font> </td>
		
<td  bgcolor='' align='left' height='0' width='50'> <font face='arial' size='3'>  $a_row[3]  </font> </td>

<td  bgcolor='' align='left' height='0' width='50'> <font face='arial' size='3'>  $a_row[30]  </font> </td>
<td  bgcolor='' align='left' height='0' width='50'> <font face='arial' size='3'>  $a_row[31]  </font> </td>

<td  bgcolor='' align='left' height='0' width='50'> <font face='arial' size='3'>  $a_row[32]  </font> </td>


<td  bgcolor='' align='left' height='0' width='50'> <font face='arial' size='3'>  $a_row[33]  </font> </td>

		
	    <td  bgcolor='' align='left' height='0' width='40'> <font face='arial' size='3'>   $a_row[4]</font> </td>
		
			    <td  bgcolor='' align='left' height='0' width='40'> <font face='arial' size='3'>   $a_row[5] </font> </td>
		

			    <td  bgcolor='' align='left' height='0' width='40'> <font face='arial' size='3'>   $a_row[28] </font> </td>
	 
";

/* 
     <td align='left' width='180'> <font face='arial' size='3'> $a_row[6]</font> </td> 
	 
*/

print" 
		
	 </form>
	 
";


print"
</tr>
";


}

	}


}


}





print"

</table>















</td>


</tr>
</table>




</body>

</html>


";


?>