<?php
include_once('dbconnection.php');





$ser=trim($_POST['ser']);
$less=trim($_POST['less']);
$payment=trim($_POST['payment']);
$payment_mode=trim($_POST['payment_mode']);
$paymenttype=trim($_POST['paymenttype']);
$supplier=trim($_POST['supplier']);
$comments=trim($_POST['comments']);

$comments_new=trim($_POST['comments_new']);


$return_amount=trim($_POST['return_amount']);


//$due=trim($_POST['due']);




$sql="SELECT * FROM `bank` WHERE user_id='$payment_mode' ";
$result=mysql_query($sql);
$arrsp=mysql_fetch_array($result);
$payment_moden=$arrsp[1];


if($payment_mode=="")
{
$payment_moden="Cash";	
}








if($supplier=="")
{
print"<h1>  You are entered something wrong please enter again </h1>";	
exit;
}








$sql="SELECT * FROM `supplier` WHERE user_id='$supplier' ";


$result=mysql_query($sql);
$arr1=mysql_fetch_array($result);

$u=$arr1[0];
$suppliern=$arr1[1];
$address=$arr1[5];
$mobile=$arr1[3];
















$due=0;



$cr=0;
$de=0;
$cv=0;

$result = mysql_query("SELECT * FROM `supplier_advance`  where bank_name='$supplier'  ORDER BY `user_id` ASC  LIMIT 0 , 100000");


while ($a_row = mysql_fetch_row($result)) {

	foreach ($a_row as $field) {
		
	}

if($a_row[2]==1)
{
$cr=$cr+$a_row[3];
}

if($a_row[2]==2)
{
$de=$de+$a_row[3];
}


}


$cv=$cr-$de;





$tcr=$tcr+$cr;
$tde=$tde+$de;
$tcv=$tcv+$cv;


$pdue=$tcv;


$due=$pdue-$payment;








$money_id_old= time().$u;

$money_id2= time().$u_idd;



$dt = new DateTime();

$k=$dt->format('H:i:s');





$t1="$k[0]$k[1]";
$t2="$k[3]$k[4]";
$t3="$k[6]$k[7]";


$t1=$t1-6;



$t4="$t1-$t2";




$dat=trim($_POST['dat']);
$mon=trim($_POST['mon']);
$yer=trim($_POST['yer']);







$adat="$yer$mon$dat";







//print" <br> $adat - $dat-$mon- $yer - $money_id";
//print" $suppliern - $address - Mobile- $mobile  ";





$prev="Previous Due";




//print" $prev - $pdue - $n_due - $payment  ";




print"
<html>

<head>
<meta http-equiv='content-type' content='text/html;charset=utf-8' />

<title> Supplier Advance print </title>

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

<body bgcolor='' onload='window.print()'>
";

print"
<table align='center' width='800' cellpadding='0' cellspacing='0'>

<tr> 
<td width='800' align='center'> 


";


include_once('address.php');

print"

<table align='center' width='150' cellpadding='0' cellspacing='0'>
<tr> <td align='center' height='40' bgcolor='F2F2F2'> <font face='arial' size='3'> <b> Debit Voucher </b> </font>  </td></tr>
</table>

<br>


<table align='center' width='1000' cellpadding='0' cellspacing='0'>
<tr> <td align='center' height='10'>  </td></tr>

<tr>  <td align='left' height='10' width='500'> <font face='arial' size='4'> Transaction ID:  $money_id2 </font>  </td> <td width='200' align='left'>  <a href=\"supplier_refill.php?action=removee&i5d=$arrp[0]\"> <font face='arial' size='4' color='black'> Date : $dat-$mon-$yer </font> </a> </td> </tr>


<tr> <td align='center' height='5'>  </td></tr>

<tr> <td align='left' height='10' width='500'> <font face='arial' size='4'> Supplier Name :  $suppliern </font>  </td> <td width='200' align='left'>  <a href=\"supplier_refill.php?action=removee&i5d=$arrp[0]\"> <font face='arial' size='4' color='black'>   </font> </a> </td> </tr>


<tr> <td align='center' height='5'>  </td></tr>


<tr>  <td align='left' height='10' width='500'> <font face='arial' size='4'>Address &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;: $address , Mobile : $mobile </font>  </td> <td width='200'> </td> </tr>


<tr> <td align='center' height='5'>  </td></tr>


<tr>  <td align='left' height='25' width='500'> <font face='arial' size='4'> Created By :
  $u_namee </font>  </td> <td width='200'> </td> </tr>



</table>



<table align='center' width='800' cellpadding='0' cellspacing='0'>
<tr>
<td width='20' height='13'align='center'> <font face='arial' size='4'></font> </td> 
</tr>
</table>


<table align='center' width='800' cellpadding='0' cellspacing='1' bgcolor='black'>
";


/*
print"
<tr bgcolor='white'>
 <td width='30' height='25' align='center'> <font face='arial' size='4'> <b> No. </b> </font> </td> 
 <td width='350' align='center'><font face='arial' size='4'> <b> Product Name. </b> </font> </td>
 <td width='50' align='center'><font face='arial' size='4'> <b> Unit-Price </b> </font> </td>
 <td width='100' align='center'><font face='arial' size='4'> <b> Quantity. </b> </font> </td> 
 <td width='100' align='center'><font face='arial' size='4'> <b> Price. </b> </font> </td> 
</tr>
";
*/







if($payment>0)
{

$commentss="$suppliern  Advance Payment Mode $payment_moden   $comments ";

$sql = "INSERT INTO `supplier_advance_money_receipt` (`user_id`, `bank_name`,`credit`, `amount`,`comments`,`dat`, `mon`, `yer`, `money_id`, `adat`, `user`,`type`,`money_id2`,`u_id2`,`p_due`,`dis`,`total_dis`,`address`,`customer_name`,`due`,`mobile`) VALUES ('','$u','$comments_new','$payment','$commentss','$dat','$mon','$yer','$money_id','$adat','$u_namee','$type','$money_id2','$u_idd','$pdue','$dis','$total_dis','$address','$suppliern','$due','$mobile')";
mysql_query($sql);	

}





if($return_amount>0)
{

$commentss="$suppliern   $payment_moden Return Amount $comments  ";
$type=1;
$credit=2;
$sql = "INSERT INTO `supplier_advance` (`user_id`, `bank_name`,`credit`, `amount`,`comments`,`dat`, `mon`, `yer`, `money_id`, `adat`, `user`,`type`,`money_id2`,`u_id2`) VALUES ('','$u','$credit','$return_amount','$commentss','$dat','$mon','$yer','$money_id','$adat','$u_namee','$type','$money_id2','$u_idd')";
mysql_query($sql);	
}








if($payment!=0 && $payment!="")
{

$commentss="$suppliern   $payment_moden Payment  $comments  ";
$type=1;
$credit=1;
$sql = "INSERT INTO `supplier_advance` (`user_id`, `bank_name`,`credit`, `amount`,`comments`,`dat`, `mon`, `yer`, `money_id`, `adat`, `user`,`type`,`money_id2`,`u_id2`) VALUES ('','$u','$credit','$payment','$commentss','$dat','$mon','$yer','$money_id','$adat','$u_namee','$type','$money_id2','$u_idd')";
mysql_query($sql);	
}






if($return_amount>0)

{

if($payment_mode=="")
{

if($return_amount>0)
{
$commentss="$suppliern   Return Amount  $payment_moden  $comments  ";
$credit=1;
$sql = "INSERT INTO `cash_book` (`user_id`, `money_id`, `dat`, `mon`, `yer`, `adat`, `time`, `comments`, `debit`, `credit`, `balance`, `user`, `money_id2`, `u_id2`) VALUES ('','$money_id','$dat','$mon','$yer','$adat','$time','$commentss','$debit','$credit','$return_amount','$u_namee','$money_id2','$u_idd')";
mysql_query($sql);
}


}
else
{


if($return_amount>0)
{
$commentss=" $suppliern  Return Amount $payment_moden    $comments   ";
$credit=1;
$sql = "INSERT INTO `bank_refill` (`user_id`, `bank_name`,`credit`, `amount`,`comments`,`dat`, `mon`, `yer`, `money_id`, `adat`, `user`, `money_id2`, `u_id2`) VALUES ('','$payment_mode','$credit','$return_amount','$commentss','$dat','$mon','$yer','$money_id','$adat','$u_namee','$money_id2','$u_idd')";
mysql_query($sql);
	
}

}


}








if($payment_mode=="")
{

if($payment!=0 && $payment!="")
{
$commentss="$suppliern   Advance $payment_moden Payment $comments  ";
$credit=2;
$sql = "INSERT INTO `cash_book` (`user_id`, `money_id`, `dat`, `mon`, `yer`, `adat`, `time`, `comments`, `debit`, `credit`, `balance`, `user`, `money_id2`, `u_id2`) VALUES ('','$money_id','$dat','$mon','$yer','$adat','$time','$commentss','$debit','$credit','$payment','$u_namee','$money_id2','$u_idd')";
mysql_query($sql);
}


}
else
{


if($payment!=0 && $payment!="")
{
$commentss=" $suppliern  Advance $payment_moden payment   $comments   ";
$credit=2;
$sql = "INSERT INTO `bank_refill` (`user_id`, `bank_name`,`credit`, `amount`,`comments`,`dat`, `mon`, `yer`, `money_id`, `adat`, `user`, `money_id2`, `u_id2`) VALUES ('','$payment_mode','$credit','$payment','$commentss','$dat','$mon','$yer','$money_id','$adat','$u_namee','$money_id2','$u_idd')";
mysql_query($sql);
	
}

}










print"
</table>



<table align='center' width='1000' cellpadding='5' cellspacing='1' bgcolor='black'>

";

if($payment>0)
{
print"
<tr bgcolor='white'>
 <td width='504' height='25' bgcolor='' align='right'> <font face='arial' size='4'> Advance :  </font> </td> 
 <td width='96' align='center'> <font face='arial' size='4'> &nbsp; $payment </font> </td> 
</tr>
";
}


if($return_amount>0)
{
print"
<tr bgcolor='white'>
 <td width='504' height='25' bgcolor='' align='right'> <font face='arial' size='4'> Return Amount :  </font> </td> 
 <td width='96' align='center'> <font face='arial' size='4'> &nbsp; $return_amount </font> </td> 
</tr>
";

$payment=$return_amount;

}





print"
</table>










<table align='center' width='1000' cellpadding='0' cellspacing='0'>
<tr> <td height='30'>  </td>  </tr>
<tr bgcolor='white'>
<td width='504' height='25' bgcolor='' align='left'> <font face='arial' size='4'> <b> Note </b>: $comments  </font> </td>  
</tr>
<tr> <td height='10'>  </td>  </tr>
<tr bgcolor='white'>
<td width='504' height='25' bgcolor='' align='left'> <font face='arial' size='4'>   
";
include_once('convert48.php');
print"
Taka Only. 
</font> </td>  
</tr>
</table>



<table align='center' width='1000' cellpadding='0' cellspacing='0'>
<tr> <td height='100'>  </td>  </tr>

<tr bgcolor='white'>
<td width='300' height='25' bgcolor='' align='left'> <font face='arial' size='4'> <b> ......................... </b> </font> </td>  
<td width='300' height='25' bgcolor='' align='right'> <font face='arial' size='4'><b> ..................... </b> </font> </td>  
</tr>
<tr bgcolor='white'>
<td width='300' height='25' bgcolor='' align='left'> <font face='arial' size='4'> <b> Customer Sign </b> </font> </td>  
<td width='300' height='25' bgcolor='' align='right'> <font face='arial' size='4'> <b> Approved By </b> </font> </td>  
</tr>

</table>














</td> 
</tr>
</table>

";





print"
</body>

</head>

</html>



";


?>