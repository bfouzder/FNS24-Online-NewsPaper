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


	
}





print"

<html>

<head>
<title>  Asset Print </title>
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
<tr> <td align='center' height='28' bgcolor='' id='tda'>  <font face='arial' color='black' size='5'> <b>  Assets   </b> </font> </td> </tr>
</table>


<br>


<table align='center' width='1200' cellpadding='4' cellspacing='1' bgcolor='black'>




<tr bgcolor='F2F2F2' height='40'> 

     <td align='left' width='10'> <font face='arial' size='5'> SL  </font> </td>
     <td  bgcolor='' align='center' height='0' width='300'> <font face='arial' size='5'>  Asset Name </font> </td>
     <td align='center' width='300'> <font face='arial' size='5'> Comments  </font> </td>
	 <td align='center' width='200'> <font face='arial' size='5'> Amount </font> </td>
	 <td align='center' width='200'> <font face='arial' size='5'> Korton  </font> </td>
	 ";
	 
	 /*
	 <td align='center' width='150'> <font face='arial' size='5'> Company Name </font> </td>
	 */
	 
	 
	 print"
	 <td align='center' width='200'> <font face='arial' size='5'> Total </font> </td>
";

print"
</tr>
";










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



$result = mysql_query("SELECT * FROM `asset` where customer_name!=''  ORDER BY `user_id` ASC  LIMIT 0 , 60000 ");


while ($a_row = mysql_fetch_row($result)) {

	foreach ($a_row as $field) {
		
	}

	
$eqq++;

$ku++;



$a_row_f[3]= number_format($a_row[3], 2);

$a_row_f[4]= number_format($a_row[4], 2);



print"
<tr bgcolor='white' height='40'> 

<form action='ecustomer.php' method='POST'>

	<td align='left'> <font face='arial' size='5'> $ku </font> </td>
	    <td  bgcolor='' align='left' height='0' width=''> <font face='arial' size='5'>  $a_row[1]   </font> </td>
		
	    <td  bgcolor='' align='left' height='0' width=''> <font face='arial' size='5'> $a_row[5]   </font> </td>
		
	    <td  bgcolor='' align='right' height='0' width=''> <font face='arial' size='5'> $a_row_f[3]   </font> </td>
		
			    <td  bgcolor='' align='right' height='0' width=''> <font face='arial' size='5'> $a_row_f[4]   </font> </td>
";


                $amount_asset=$amount_asset+$a_row[3];
				$amount_kor=$amount_kor+$a_row[4];
				
				
				$kor=$a_row[3]-$a_row[4];
				$kor1=$kor1+$kor;
				
				$kor_f= number_format($kor, 2);


print"
			    <td  bgcolor='' align='right' height='0' width=''> <font face='arial' size='5'> $kor_f   </font> </td>


				";
				

		

	 if($user_name1=="superadmin")
{

	 
}

print"
</tr>
";


}

//}









				$amount_asset_f= number_format($amount_asset, 2);
				$amount_kor_f= number_format($amount_kor, 2);
				$kor1_f= number_format($kor1, 2);
				
				



print"

<tr bgcolor='white'> 


<td align='center' height='30' bgcolor=''>  </font>  </td> 
<td align='center' height='30' bgcolor=''> <font size='5' face='arial'> <b> Total </b>  </font>  </td> 

<td align='center' height='30' bgcolor=''> <font size='5' face='arial'>  </font>  </td> 

<td align='right'> <font size='5' face='arial'> <b> $amount_asset_f </b> </font> </td> 
<td align='right'> <font size='5' face='arial'> <b> $amount_kor_f </b></font> </td> 
<td align='right'> <font size='5' face='arial'> <b> $kor1_f  </b><font></td> 


</tr>

</table>

<br>
<br>
<br>
<br>
<br><br>








";

include_once('sign_cost.php');

print"

</td>


</tr>
</table>




</body>

</html>


";


?>