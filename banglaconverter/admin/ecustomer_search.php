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


$sql= "UPDATE  `customer` SET `customer_name`='$customer_name' WHERE `user_id`='$s'";
mysql_query($sql);

$sql= "UPDATE  `customer` SET `customer_id`='$customer_id' WHERE `user_id`='$s'";
mysql_query($sql);

$sql= "UPDATE  `customer` SET `mobile`='$mobile' WHERE `user_id`='$s'";
mysql_query($sql);

$sql= "UPDATE  `customer` SET `email`='$email' WHERE `user_id`='$s'";
mysql_query($sql);

$sql= "UPDATE  `customer` SET `address`='$address' WHERE `user_id`='$s'";
mysql_query($sql);


$sql= "UPDATE  `customer` SET `company_name`='$company_name' WHERE `user_id`='$s'";
mysql_query($sql);


include_once('s.php');
}




if($d!="")
{

if($d==$stock_issu_customer)
{
}
else
{
$result = mysql_query("DELETE FROM customer WHERE user_id=$d");
}
	
}





print"

<html>

<head>
<title> Edit Customer </title>
";


include_once('style.php');


print"

<style>

.list1 tr:hover{
background-color:pink;
}

</style>


</head>


<body>
";


include_once('header2.php');


print"
<table align='center' width='1200' cellpadding='0' cellspacing='1' height='800' bgcolor='gray'>
<tr bgcolor='white'> 
<td align='left' valign='top' width='220' bgcolor='#C5B991'>  

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
<tr> <td align='center' height='28' bgcolor='#7087A3' id='tda'>  <font face='arial' color='white' size='2'> <b> Edit Customer  Name </b> </font> </td> </tr>
</table>





<table align='center' width='900' cellpadding='1' cellspacing='1' bgcolor='EFEBEB' class='list1'>




<tr bgcolor='white' height='40'> 
     <td  bgcolor='' align='center' height='0' width=''> <font face='arial' size='2'> Customer Name </font> </td>
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

$result = mysql_query("SELECT * FROM `customer`  ORDER BY `customer_name` ASC  LIMIT 0 , 40000 ");


while ($a_row = mysql_fetch_row($result)) {

	foreach ($a_row as $field) {
		
	}

$total_row++;

}



$lim=trim($_POST['lim']);


$kuu=trim($_POST['kuu']);


if($lim=="")
{
$lim="A";
}

//$lim_count=30;

//$lim2=$lim*$lim_count;
//$lim1=$lim2-$lim_count;







$result = mysql_query("SELECT * FROM `customer`  ORDER BY `customer_name` ASC  LIMIT 0 , 600000 ");


while ($a_row = mysql_fetch_row($result)) {

	foreach ($a_row as $field) {
		
	}

$eqq++;

$ku++;


$upp=$a_row[1];


$cuu=strtoupper("$upp[0]");



if($lim==$cuu)
{
print"
<tr bgcolor='white' height='40'> 

<form action='ecustomer_search.php' method='POST'>

	
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

	 <input type='hidden' name='lim' value='$lim'>


	 <font face='arial' size='2'> <input type='submit' value='Edit'> </font>


	 </td>
	 </form>
	 
";

	 if($user_name1=="superadmin")
{
print"	 
	 
	 <td align='center' width='70'> <a onClick=\"javascript: return confirm('Are you confirm to delete');\" href=\"ecustomer_search.php?dell=".$a_row[0]."\"> <div id='del'><font face='arial' size='2'> Delete  </font> </div>  </a> </td>
	 ";
	 
}

print"
</tr>
";


}


}

//}












print"
<tr> <td align='center' height='30' bgcolor=''>   </td> <td> </td> </tr>

</table>
<br><br>
";








$mnn=$total_row/$lim_count;



$mn2=$mnn+1;


$letter[1]="A";
$letter[2]="B";
$letter[3]="C";
$letter[4]="D";
$letter[5]="E";
$letter[6]="F";
$letter[7]="G";
$letter[8]="H";
$letter[9]="I";
$letter[10]="J";
$letter[11]="K";
$letter[12]="L";
$letter[13]="M";
$letter[14]="N";
$letter[15]="O";
$letter[16]="P";
$letter[17]="Q";
$letter[18]="R";
$letter[19]="S";
$letter[20]="T";
$letter[21]="U";
$letter[22]="V";
$letter[23]="W";
$letter[24]="X";
$letter[25]="Y";
$letter[26]="Z";




print"
<table align='center' width='900' cellpadding='0' cellspacing='0'>
<tr> 
<td> Page :  </td>
";

for($i=1;$i<=26;$i++)
{

if($kuu==$i)
{
print"
<form name='ecustomer.php' method='POST'>
<td align='center' height='28'  bgcolor='pink'>  
<input type='submit' value='$letter[$i]'>

<input type='hidden' name='kuu' value='$i'>


";
print"
<input type='hidden' name='lim' value='$letter[$i]'>
</td> 
</form>
";
}
else
{
print"
<form name='ecustomer_search.php' method='POST'>
<td align='center' height='28'>  
<input type='submit' value='$letter[$i]'>
<input type='hidden' name='kuu' value='$i'>

";
print"
<input type='hidden' name='lim' value='$letter[$i]'>
</td> 
</form>
";

}



}

print"
</tr>
</table>
";



print"
<br>
<br>


<form action='customer_print.php' method='POST' target='_blank'>


<input type='submit' value='View / Print'  id='enter'>

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