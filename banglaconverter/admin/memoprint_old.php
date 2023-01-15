<?php
include_once('dbconnection.php');

//session_start();

include_once('ppp.php');

$ser=trim($_POST['ser']);
$less=trim($_POST['less']);
$payment=trim($_POST['payment']);

$payment_mode=trim($_POST['payment_mode']);


$paymenttype=trim($_POST['paymenttype']);
$supplier=trim($_POST['supplier']);
$comments=trim($_POST['comments']);
$due=trim($_POST['due']);



$sql="SELECT * FROM `bank` WHERE user_id='$payment_mode' ";
$result=mysql_query($sql);
$arrsp=mysql_fetch_array($result);
$payment_moden=$arrsp[1];


if($payment_mode=="")
{
$payment_moden="Cash";
}




$sql="SELECT * FROM `supplier` WHERE user_id='$supplier' ";
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







//print" <br> $adat - $dat-$mon- $yer - $money_id";

//print" $suppliern - $address - Mobile- $mobile  ";









print"
<html>

<head>
<meta http-equiv='content-type' content='text/html;charset=utf-8' />

<title> Welcome to purchase memo  </title>

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
<table align='center' width='800' cellpadding='0' cellspacing='0'>
<tr> <td align='center' height='10'>  </td></tr>


<tr> 
<td width='100' height='0'> </td> 
<td align='left' height='10' width='90'> 
<font face='arial' size='2'> Suplier Name 
</td>
<td align='left' height='10' width='420'> 
<font face='arial' size='2'>:  $suppliern </font>  
</td> 
<td width='200' align='left'>  <a href=\"purchase.php?action=removee&i5d=$arrp[0]\"> <font face='arial' size='2' color='black'> Memo no: $money_id </font> </a> 
</td> 
</tr>

<tr> <td height='5'> </td> </tr>

<tr> 
<td width='100' height='0'> </td> 
<td align='left' height='10' width='90'> 
<font face='arial' size='2'> Suplier ID	
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

<tr> 
<td width='100' height='0'> </td> 
<td align='left' height='10' width='90'> 
<font face='arial' size='2'> Employee
</td>
<td align='left' height='10' width='420'> 
<font face='arial' size='2'>:  $user_name1 </font>  
</td> 
<td width='200' align='left'>  
</td> 
</tr>



<tr> <td height='5'> </td> </tr>







</table>



<table align='center' width='800' cellpadding='0' cellspacing='0'>
<tr>
<td width='20' height='13'align='center'> <font face='arial' size='2'></font> </td> 
</tr>
</table>


<table align='center' width='600' cellpadding='0' cellspacing='1' bgcolor='black'>

<tr bgcolor='white'>
 <td width='30' height='25' align='center'> <font face='arial' size='2'> <b> No. </b> </font> </td> 
 <td width='300' align='center'><font face='arial' size='2'> <b> Product Name. </b> </font> </td>
 <td width='100' align='center'><font face='arial' size='2'> <b>  Unit-Price </b> </font> </td>
 <td width='100' align='center'><font face='arial' size='2'> <b> Quantity. </b> </font> </td> 
 <td width='100' align='center'><font face='arial' size='2'> <b> Price. </b> </font> </td> 
</tr>
";







foreach($_SESSION['cart'] as $product_id => $quantity)
{

$e++;
$w++;
 
$sql="SELECT * FROM `product_name` WHERE user_id='$product_id' ";


$result=mysql_query($sql);
$arrp=mysql_fetch_array($result);


$total=$arrp[4]*$quantity;

$subtotal=$subtotal+$total;

$st=$arrp[11];


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
 <td width='30' align='center' height='25'> <font face='arial' size='2'>   $w  </font> </td> 
 <td width='300' align='left'><font face='arial' size='2'>  &nbsp;&nbsp;&nbsp;  $arrp[2] - $name[1] </font> </td>
 <td width='50' align='center'><font face='arial' size='2'>    $arrp[4] </font> </td> 
 <td width='100' align='center'><font face='arial' size='2'>   $quantity   </font> </td> 
 <td width='100' align='center'><font face='arial' size='2'>   $total  </font> </td> 
</tr>

";






$sql = "INSERT INTO `buyproduct` (`user_id`, `money_id`, `supplier_id`, `supplier_name`, `product_id`, `product_name`, `qty`, `price`, `total`, `dat`, `mon`, `yer`, `adat`, `t4`, `m_type`, `m_id`, `p_type`, `p_id`, `user`) VALUES ('','$money_id','$supplier','$suppliern','$product_id','$arrp[2]','$quantity','$arrp[4]','$total','$dat','$mon','$yer','$adat','$t4','$arrpm[1]',' $arrpm[0]','$name[1]','$arrpt[0]','$user_name1')";
mysql_query($sql);





$st=$st+$quantity;

$sql= "UPDATE  `product_name` SET `total_product`='$st' WHERE `user_id`='$product_id'";
mysql_query($sql);


}




$stotal=$subtotal-$less;


//$tax=0.00;

$due=$stotal-$payment;




if($e>0)
{
$sql = "INSERT INTO `buymemo` (`user_id`, `money_id`, `supplier_id`, `supplier_name`, `product_item`, `total_money`, `less`, `joma`, `due`, `dat`, `mon`, `yer`, `adat`, `t4`, `comments`, `paymenttype`, `mobile`, `user`) VALUES ('','$money_id','$supplier','$suppliern','$e','$subtotal','$less','$payment','$due','$dat','$mon','$yer','$adat','$t4','$comments','$address','$mobile','$user_name1')";
mysql_query($sql);







$commentss="$suppliern - On sale - $comments";
$credit=1;
$sql = "INSERT INTO `supplier_laser` (`user_id`, `bank_name`,`credit`, `amount`,`comments`,`dat`, `mon`, `yer`, `money_id`, `adat`, `user`) VALUES ('','$u','$credit','$stotal','$commentss','$dat','$mon','$yer','$money_id','$adat','$user_name1')";
mysql_query($sql);



if($payment!=0 && $payment!="")
{
$commentss="$suppliern - On sale - Payment - $comments - $payment_moden";
$credit=2;
$sql = "INSERT INTO `supplier_laser` (`user_id`, `bank_name`,`credit`, `amount`,`comments`,`dat`, `mon`, `yer`, `money_id`, `adat`, `user`) VALUES ('','$u','$credit','$payment','$commentss','$dat','$mon','$yer','$money_id','$adat','$user_name1')";
mysql_query($sql);	
}










if($payment_mode=="")
{

if($payment!=0 && $payment!="")
{
$commentss="$suppliern - On Purchase - $comments";
$credit=2;
$sql = "INSERT INTO `cash_book` (`user_id`, `money_id`, `dat`, `mon`, `yer`, `adat`, `time`, `comments`, `debit`, `credit`, `balance`, `user`) VALUES ('','$money_id','$dat','$mon','$yer','$adat','$time','$commentss','$debit','$credit','$payment','$user_name1')";
mysql_query($sql);
}


}
else
{


if($payment!=0 && $payment!="")
{
$commentss=" $suppliern - On Purchase - $comments - $payment_moden ";
$credit=2;
$sql = "INSERT INTO `bank_refill` (`user_id`, `bank_name`,`credit`, `amount`,`comments`,`dat`, `mon`, `yer`, `money_id`, `adat`, `user`) VALUES ('','$payment_mode','$credit','$payment','$commentss','$dat','$mon','$yer','$money_id','$adat','$user_name1')";
mysql_query($sql);
	
}

}






}









print"
</table>



<table align='center' width='600' cellpadding='0' cellspacing='0'>

<tr>
 <td width='504' height='25' bgcolor='' align='right'> <font face='arial' size='2'> Total:  </font> </td> 
 <td width='96' align='center'> <font face='arial' size='2'> &nbsp; $subtotal tk/= </font> </td> 
</tr>


<tr>
 <td width='504' height='25' bgcolor='' align='right'> <font face='arial' size='2'> Less:  </font> </td> 
 <td width='96' align='center'> <font face='arial' size='2'> &nbsp; $less tk/=</font> </td> 
</tr>


<tr>
 <td width='504' height='25' bgcolor='' align='right'> <font face='arial' size='2'> Sub Total:  </font> </td> 
 <td width='96' align='center'> <font face='arial' size='2'> &nbsp; $stotal tk/= </font> </td> 
</tr>


<tr>
 <td width='504' height='25' bgcolor='' align='right'> <font face='arial' size='2'> Payment:  </font> </td> 
 <td width='96' align='center'> <font face='arial' size='2'> &nbsp; $payment tk/=</font> </td> 
</tr>


<tr>
 <td width='504' height='25' bgcolor='' align='right'> <font face='arial' size='2'> Due:  </font> </td> 
 <td width='96' align='center'> <font face='arial' size='2'> &nbsp; $due tk/= </font> </td> 
</tr>



</table>


</td> 
</tr>
</table>


</td>
</tr>
</table>

";


unset($_SESSION['cart']);

//session_unset($_SESSION['cart']);


//session_start();

//$user_name=$_SESSION['color1'];
//$password=$_SESSION['color2'];


//set($_SESSION['cart']);

//session_destroy($_SESSION['cart']);


print"
</body>

</head>

</html>



";


?>