<?php
include_once('dbconnection.php');

session_start();



$ser=trim($_POST['ser']);
$less=trim($_POST['less']);
$payment=trim($_POST['payment']);


$po_no=trim($_POST['po_no']);
$d_no=trim($_POST['d_no']);




$payment_mode=trim($_POST['payment_mode']);


$paymenttype=trim($_POST['paymenttype']);
$supplier=trim($_POST['supplier']);
$comments=trim($_POST['comments']);
$due=trim($_POST['due']);

$comments=str_replace("'","`","$comments");



$discount_less=trim($_POST['discount_less']);


$check_no=trim($_POST['check_no']);
$check_amount=trim($_POST['check_amount']);



$less_new=trim($_POST['less_new']);

$idat=trim($_POST['idat']);
$imon=trim($_POST['imon']);
$iyer=trim($_POST['iyer']);






$sql="SELECT * FROM `bank` WHERE user_id='$payment_mode' ";
$result=mysql_query($sql);
$arrsp=mysql_fetch_array($result);
$payment_moden=$arrsp[1];
$bank_account_no=$arrsp[1];





if($payment_mode=="")
{
$payment_moden="Cash";
}




$sql="SELECT * FROM `customer` WHERE user_id='$supplier' ";
$result=mysql_query($sql);
$arr1=mysql_fetch_array($result);


$u=$arr1[0];
$suppliern=$arr1[1];
$address=$arr1[5];
$mobile=$arr1[3];
$supplier_id=$arr1[2];

$money_id= time().$u;





















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



/*

$bbb=time(); 
$d=date("m/d/y",$bbb); 
$mon="$d[0]$d[1]";
$dat="$d[3]$d[4]";
$yer="20$d[6]$d[7]";

*/


$adat="$yer$mon$dat";


$iadat="$iyer$imon$idat";





if($payment_mode!="" && $check_amount!="")
{

$sql = "INSERT INTO `check_entry` (`user_id`, `customer_name`, `customer_id`, `mobile`, `address`, `bank_name`, `check_no`, `amount`, `dat`, `mon`, `yer`, `adat`, `idat`, `imon`, `iyer`, `iadat`, `active`, `comments`, `bank_id`, `money_id`, `account_no`) VALUES ('','$suppliern','$supplier','$mobile','$address','$payment_moden','$check_no','$check_amount','$dat','$mon','$yer','$adat','$idat','$imon','$iyer','$iadat','$active','$comments','$payment_mode','$money_id','$bank_account_no')";
mysql_query($sql);
	
}









//print" <br> $adat - $dat-$mon- $yer - $money_id";

//print" $suppliern - $address - Mobile- $mobile  ";









print"
<html>

<head>
<meta http-equiv='content-type' content='text/html;charset=utf-8' />

<title> Welcome to customer memo  </title>

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
<table align='center' width='800' cellpadding='0' cellspacing='0'>

<tr> 
<td width='800' align='center'> 
";




include_once('address.php');








print"

<table align='center' width='1000' cellpadding='0' cellspacing='0'>
<tr> <td align='center' height='10'>  </td></tr>
<tr> 
<td width='300' align='left'><a href=\"sales.php?action=removee&i5d=$arrp[0]\"> <font face='arial' size='3' color='black'> Sl No./ Memo No: <b> $money_id </b> </font> </a> </td>
<td width='130' align='center' bgcolor='cccccc'><font face='arial' size='3'> <b> Challan Invoice </b> </font> </td>
<td width='270' align='right'><font face='arial' size='3'> Date: <b> $dat-$mon-$yer </b> </font> &nbsp;</td>
</tr>
<tr> <td align='center' height='10'>  </td></tr>
</table>


<table align='center' width='1000' cellpadding='0' cellspacing='1' bgcolor='black'>
<tr> <td align='left' height='30' bgcolor='white'> &nbsp;	 <font face='arial' szie='3'> Customer Name : <b> $suppliern </b> </font>  </td></tr>
</table>

<table align='center' width='1000' cellpadding='0' cellspacing='0' bgcolor=''>
<tr> <td align='left' height='3' bgcolor=''>   </td></tr>
</table>


<table align='center' width='1000' cellpadding='0' cellspacing='1' bgcolor='black'>
<tr> <td align='left' height='30' bgcolor='white'> &nbsp;	 <font face='arial' szie='3'> Address : <b> $address &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  Mobile : $mobile  </b> </font>  </td></tr>
</table>

<table align='center' width='1000' cellpadding='0' cellspacing='1' bgcolor='black'>
<tr> <td align='left' height='30' bgcolor='white'> &nbsp;

";


if($po_no!="")
{
print"
	 <font face='arial' szie='3'> P/O NO: <b> $po_no
";
}

if($d_no!="")
{
print"
 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  Delivery Challan No : $d_no  </b> </font> 
";
}

print" </td></tr>
</table>
";




print"

<table align='center' width='1000' cellpadding='0' cellspacing='1' bgcolor='black'>
<tr> <td align='left' height='30' bgcolor='white'> &nbsp;	 <font face='arial' szie='3'> Employee : <b> $u_namee </b> </font>  </td></tr>
</table>

";





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
<table align='center' width='1000' cellpadding='0' cellspacing='0'>
<tr>
<td width='20' height='13'align='center'> <font face='arial' size='2'></font> </td> 
</tr>
</table>


<table align='center' width='1000' cellpadding='5' cellspacing='1' bgcolor='black'>

<tr bgcolor='white'>
 <td width='30' height='25' align='center'> <font face='arial' size='3'> <b> SL. </b> </font> </td> 
 <td width='300' align='center'><font face='arial' size='3'> <b> Description. </b> </font> </td>
 
 
 <td width='100' align='center'><font face='arial' size='3'> <b> Qty. </b> </font> </td> 
 
 
 <td width='100' align='center'><font face='arial' size='3'> <b>  Unit </b> </font> </td>
 
 ";
 
 /*"
 <td width='100' align='center'><font face='arial' size='3'> <b>  Rate </b> </font> </td>
 ";
 */
 
 
 
 
 /*
 <td width='100' align='center'><font face='arial' size='3'> <b> Commission </b> </font> </td> 
 */
 
 
 /*
 print"
 <td width='100' align='center'><font face='arial' size='3'> <b> Total </b> </font> </td> 
 ";
 */
 
 
 print"

</tr>
";







foreach($_SESSION['cart'] as $product_id => $quantity)
{

$e++;
$w++;
 
$sql="SELECT * FROM `product_name` WHERE user_id='$product_id' ";


$result=mysql_query($sql);
$arrp=mysql_fetch_array($result);


$profit=$arrp[21]-$arrp[20];
$profit=$profit*$quantity;

$total=$arrp[21]*$quantity;
$total3=$total;


$total=$total-$arrp[19];

$lesst=$lesst+$arrp[19];

$comm=$arrp[19];

$subtotal=$subtotal+$total;

$st=$arrp[12];


/*
$sql="SELECT * FROM `measurement` WHERE user_id='$arrp[14]' ";
$result=mysql_query($sql);
$arrpm=mysql_fetch_array($result);

$sql="SELECT * FROM `product_type` WHERE user_id='$arrp[15]' ";
$result=mysql_query($sql);
$arrpt=mysql_fetch_array($result);
*/





$sql="SELECT * FROM `product_category` WHERE user_id='$arrp[1]' ";
$result=mysql_query($sql);
$name=mysql_fetch_array($result);




print"
<tr bgcolor='white'>
 <td width='30' align='center' height='25'> <font face='arial' size='3'>   $w  </font> </td> 
 <td width='300' align='left'><font face='arial' size='3'> &nbsp;  $arrp[2]  $nametest[1] </font> </td>
 
 
 <td width='100' align='center'><font face='arial' size='3'>   $quantity   </font> </td> 
 

 <td width='50' align='center'><font face='arial' size='3'>    $arrp[22] </font> </td> 
";


/*
print"
<td width='50' align='center'><font face='arial' size='3'>    $arrp[21] </font> </td> 
 ";
 */
 
 
 
 /*
  <td width='50' align='center'><font face='arial' size='3'>    $arrp[19] </font> </td> 
 
 */
 
 /*
print"
 <td width='100' align='center'><font face='arial' size='3'>   $total  </font> </td> 
 ";
 */
 
 
 
 print"
</tr>

";





/*
$sql = "INSERT INTO `saleproduct` (`user_id`, `money_id`, `supplier_id`, `supplier_name`, `product_id`, `product_name`, `qty`, `price`, `total`, `dat`, `mon`, `yer`, `adat`, `t4`, `m_type`, `m_id`, `p_type`, `p_id`, `user`) VALUES ('','$money_id','$supplier','$suppliern','$product_id','$arrp[2]','$quantity','$arrp[4]','$total','$dat','$mon','$yer','$adat','$t4','$arrpm[1]',' $arrpm[0]','$name[1]','$arrpt[0]','$u_namee')";
mysql_query($sql);

*/





$sql = "INSERT INTO `saleproduct` (`user_id`, `money_id`, `supplier_id`, `supplier_name`, `product_id`, `product_name`, `qty`, `price`, `total`, `dat`, `mon`, `yer`, `adat`, `t4`,`buy`, `tax1`, `profit`, `m_type`, `m_id`, `p_type`, `p_id`, `user`, `commission`, `po_no`, `d_no`, `unit`) VALUES ('','$money_id','$supplier','$suppliern','$product_id','$arrp[2]','$quantity','$arrp[21]','$total','$dat','$mon','$yer','$adat','$t4','$arrp[20]','$tax1','$profit','$arrpm[1]',' $arrpm[0]','$name[1]','$arrpt[0]','$u_namee','$comm','$po_no','$d_no','$arrp[22]')";
mysql_query($sql);



$st=$st+$quantity;

/*
$sql= "UPDATE  `product_name` SET `total_product`='$st' WHERE `user_id`='$product_id'";
mysql_query($sql);
*/



//print"$st <br>";

$sql= "UPDATE  `product_name` SET `sale_product`='$st' WHERE `user_id`='$product_id'";
mysql_query($sql);

}






/*


print"
<tr bgcolor='white'>
<td width='30' align='center' height='25'> <font face='arial' size='3'>     </font></td> 
<td width='300' align='left'><font face='arial' size='3'> &nbsp;   </font> </td>
<td width='100' align='center'><font face='arial' size='3'>     </font> </td> 
<td width='50' align='center'><font face='arial' size='3'>     </font> </td> 
<td width='50' align='center'><font face='arial' size='3'>    </font> </td> 
<td width='50' align='center'><font face='arial' size='3'>    $lesst </font> </td> 

<td width='100' align='center'><font face='arial' size='3'>     </font> </td> 
</tr>

";


*/


$subtotal_last=$subtotal-$discount_less;


$stotal=$subtotal_last+$less;


//$tax=0.00;

$due=$stotal-$payment;




if($e>0)
{
	
	/*
$sql = "INSERT INTO `salememo` (`user_id`, `money_id`, `supplier_id`, `supplier_name`, `product_item`, `total_money`, `less`, `joma`, `due`, `dat`, `mon`, `yer`, `adat`, `t4`, `comments`, `paymenttype`, `mobile`, `user`) VALUES ('','$money_id','$supplier','$suppliern','$e','$subtotal','$less','$payment','$due','$dat','$mon','$yer','$adat','$t4','$comments','$address','$mobile','$user')";
mysql_query($sql);
*/



$sql = "INSERT INTO `salememo` (`user_id`, `money_id`, `supplier_id`, `supplier_name`, `product_item`, `total_money`, `less`, `joma`, `due`, `dat`, `mon`, `yer`, `adat`, `t4`, `comments`, `paymenttype`, `tax1`, `subtotal1`, `mobile`, `user`, `commission`, `discount_less`, `po_no`, `d_no`) VALUES ('','$money_id','$supplier','$suppliern','$e','$subtotal','$less','$payment','$due','$dat','$mon','$yer','$adat','$t4','$comments','$address','$sty','$stotal','$mobile','$u_namee','$lesst','$discount_less','$po_no','$d_no')";
mysql_query($sql);







$commentss="$suppliern - On puchase - $comments";
$credit=1;
$sql = "INSERT INTO `customer_laser` (`user_id`, `bank_name`,`credit`, `amount`,`comments`,`dat`, `mon`, `yer`, `money_id`, `adat`, `user`, `shipment`, `commission`, `discount_less`) VALUES ('','$u','$credit','$stotal','$commentss','$dat','$mon','$yer','$money_id','$adat','$user','$less','$lesst','$discount_less')";
mysql_query($sql);



if($payment!=0 && $payment!="")
{
$commentss="$suppliern - On purchase - Payment- $comments - $payment_moden";
$credit=2;
$sql = "INSERT INTO `customer_laser` (`user_id`, `bank_name`,`credit`, `amount`,`comments`,`dat`, `mon`, `yer`, `money_id`, `adat`, `user`) VALUES ('','$u','$credit','$payment','$commentss','$dat','$mon','$yer','$money_id','$adat','$user')";
mysql_query($sql);	
}









if($payment_mode=="")
{

if($payment!=0 && $payment!="")
{
$commentss="$suppliern - On sale - Payment - $comments";
$credit=1;
$sql = "INSERT INTO `cash_book` (`user_id`, `money_id`, `dat`, `mon`, `yer`, `adat`, `time`, `comments`, `debit`, `credit`, `balance`, `user`) VALUES ('','$money_id','$dat','$mon','$yer','$adat','$time','$commentss','$debit','$credit','$payment','$user')";
mysql_query($sql);
}


}
else
{


if($payment!=0 && $payment!="")
{
$commentss=" $suppliern - On sale - payment -  $comments - $payment_moden ";
$credit=1;
$sql = "INSERT INTO `bank_refill` (`user_id`, `bank_name`,`credit`, `amount`,`comments`,`dat`, `mon`, `yer`, `money_id`, `adat`, `user`) VALUES ('','$payment_mode','$credit','$payment','$commentss','$dat','$mon','$yer','$money_id','$adat','$user')";
mysql_query($sql);
	
}

}






}









print"
</table>



<table align='center' width='1000' cellpadding='0' cellspacing='0'>

";

/*
print"
<tr>
 <td width='504' height='25' bgcolor='' align='right'> <font face='arial' size='3'> Total:  </font> </td> 
 <td width='96' align='center'> <font face='arial' size='3'> &nbsp; $subtotal tk/= </font> </td> 
</tr>

";
*/


if($discount_less>0)
{
print"
<tr>
 <td width='504' height='25' bgcolor='' align='right'> <font face='arial' size='3'> Discount:  </font> </td> 
 <td width='96' align='center'> <font face='arial' size='3'> &nbsp; $discount_less tk/= </font> </td> 
</tr>



<tr>
 <td width='504' height='25' bgcolor='' align='right'> <font face='arial' size='3'> Total:  </font> </td> 
 <td width='96' align='center'> <font face='arial' size='3'> &nbsp; $subtotal_last tk/= </font> </td> 
</tr>

";
}


if($less>0)
{
print"

<tr>
 <td width='504' height='25' bgcolor='' align='right'> <font face='arial' size='3'> Freight Charge :  </font> </td> 
 <td width='96' align='center'> <font face='arial' size='3'> &nbsp; $less tk/=</font> </td> 
</tr>


<tr>
 <td width='504' height='25' bgcolor='' align='right'> <font face='arial' size='3'> Sub Total:  </font> </td> 
 <td width='96' align='center'> <font face='arial' size='3'> &nbsp; $stotal tk/= </font> </td> 
</tr>

";

}


if($payment>0)
{
print"

<tr>
 <td width='504' height='25' bgcolor='' align='right'> <font face='arial' size='3'> Payment:  </font> </td> 
 <td width='96' align='center'> <font face='arial' size='3'> &nbsp; $payment tk/=</font> </td> 
</tr>
";
}


/*
print"
<tr>
 <td width='504' height='25' bgcolor='' align='right'> <font face='arial' size='3'> Due:  </font> </td> 
 <td width='96' align='center'> <font face='arial' size='3'> &nbsp; $due tk/= </font> </td> 
</tr>
";
*/





print"

</table>





<table align='center' width='1000' cellpadding='0' cellspacing='0'>
<tr>
<td width='20' height='40' align='left'>  </td> 
</tr>
</table>

";

include_once('sign.php');


print"
</td> 
</tr>
</table>


</td>
</tr>
</table>

";

unset($_SESSION['cart']);

//session_unset($_SESSION['cart']);

//session_destroy();


print"
</body>

</head>

</html>



";


?>