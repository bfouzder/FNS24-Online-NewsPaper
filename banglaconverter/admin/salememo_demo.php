<?php
include_once('dbconnection.php');

session_start();



$ser=trim($_POST['ser']);
$less=trim($_POST['less']);
$payment=trim($_POST['payment']);

$payment_mode=trim($_POST['payment_mode']);


$paymenttype=trim($_POST['paymenttype']);
$supplier=trim($_POST['supplier']);
$comments=trim($_POST['comments']);
$due=trim($_POST['due']);

$balance=trim($_POST['balance']);


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
<table align='left' width='600' cellpadding='0' cellspacing='0'>

<tr> 
<td width='600' align='center'> 
";




include_once('address.php');








print"

<table align='center' width='600' cellpadding='0' cellspacing='0'>
<tr> <td align='center' height='10'>  </td></tr>
<tr> 
<td width='300' align='left'><a href=\"sales.php?action=removee&i5d=$arrp[0]\"> <font face='arial' size='3' color='black'> Sl No./ Memo No: <b> $money_id </b> </font> </a> </td>
<td width='130' align='center' bgcolor='cccccc'><font face='arial' size='3'> <b> SALES INVOICE </b> </font> </td>
<td width='270' align='right'><font face='arial' size='3'> Date: <b> $dat-$mon-$yer </b> </font> &nbsp;</td>
</tr>
<tr> <td align='center' height='10'>  </td></tr>
</table>


<table align='center' width='600' cellpadding='0' cellspacing='1' bgcolor='black'>
<tr> <td align='left' height='30' bgcolor='white'> &nbsp;	 <font face='arial' szie='3'> Customer Name : <b> $suppliern </b> </font>  </td></tr>
</table>

<table align='center' width='600' cellpadding='0' cellspacing='0' bgcolor=''>
<tr> <td align='left' height='3' bgcolor=''>   </td></tr>
</table>


<table align='center' width='600' cellpadding='0' cellspacing='1' bgcolor='black'>
<tr> <td align='left' height='30' bgcolor='white'> &nbsp;	 <font face='arial' szie='3'> Address : <b> $address &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  Mobile : $mobile  </b> </font>  </td></tr>
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
<table align='center' width='600' cellpadding='0' cellspacing='0'>
<tr>
<td width='20' height='13'align='center'> <font face='arial' size='2'></font> </td> 
</tr>
</table>


<table align='center' width='600' cellpadding='5' cellspacing='1' bgcolor='black'>

<tr bgcolor='white'>
 <td width='30' height='25' align='center'> <font face='arial' size='3'> <b> SL. </b> </font> </td> 
 <td width='300' align='center'><font face='arial' size='3'> <b> Product Name. </b> </font> </td>
 
 
 <td width='100' align='center'><font face='arial' size='3'> <b> Quantity. </b> </font> </td> 
 
 
 <td width='100' align='center'><font face='arial' size='3'> <b>  Unit-Price </b> </font> </td>
 
 
 <td width='100' align='center'><font face='arial' size='3'> <b>  Total </b> </font> </td>
 
 <td width='100' align='center'><font face='arial' size='3'> <b> Commission </b> </font> </td> 
 
 
 <td width='100' align='center'><font face='arial' size='3'> <b> Total </b> </font> </td> 
 

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
 <td width='' align='center' height='25'> <font face='arial' size='3'>   $w  </font> </td> 
 <td width='' align='left'><font face='arial' size='3'> &nbsp;  $arrp[2]  $nametest[1] </font> </td>
 
 
 <td width='' align='center'><font face='arial' size='3'>   $quantity   </font> </td> 
 
 <td width='' align='center'><font face='arial' size='3'>    $arrp[21] </font> </td> 
 
 
 <td width='' align='center'><font face='arial' size='3'>    $total3 </font> </td> 
 
 
  <td width='' align='center'><font face='arial' size='3'>    $arrp[19] </font> </td> 
 
 
 
 
 <td width='' align='center'><font face='arial' size='3'>   $total  </font> </td> 
</tr>

";









}









print"
<tr bgcolor='white'>
<td width='' align='center' height='25'> <font face='arial' size='3'>     </font></td> 
<td width='' align='left'><font face='arial' size='3'> &nbsp;   </font> </td>
<td width='' align='center'><font face='arial' size='3'>     </font> </td> 
<td width='' align='center'><font face='arial' size='3'>     </font> </td> 
<td width='' align='center'><font face='arial' size='3'>    </font> </td> 
<td width='' align='center'><font face='arial' size='3'>    $lesst </font> </td> 

<td width='' align='center'><font face='arial' size='3'>     </font> </td> 
</tr>

";




$subtotal_last=$subtotal-$discount_less;


$stotal=$subtotal_last+$less;


//$tax=0.00;

$due=$stotal-$payment;

























print"
</table>



<table align='center' width='600' cellpadding='0' cellspacing='0'>


<tr>
 <td width='504' height='25' bgcolor='' align='right'> <font face='arial' size='3'> Total:  </font> </td> 
 <td width='96' align='center'> <font face='arial' size='3'> &nbsp; $subtotal tk/= </font> </td> 
</tr>




<tr>
 <td width='504' height='25' bgcolor='' align='right'> <font face='arial' size='3'> Discount:  </font> </td> 
 <td width='96' align='center'> <font face='arial' size='3'> &nbsp; $discount_less tk/= </font> </td> 
</tr>



<tr>
 <td width='504' height='25' bgcolor='' align='right'> <font face='arial' size='3'> Total:  </font> </td> 
 <td width='96' align='center'> <font face='arial' size='3'> &nbsp; $subtotal_last tk/= </font> </td> 
</tr>




<tr>
 <td width='504' height='25' bgcolor='' align='right'> <font face='arial' size='3'> Carring Cost :  </font> </td> 
 <td width='96' align='center'> <font face='arial' size='3'> &nbsp; $less tk/=</font> </td> 
</tr>


<tr>
 <td width='504' height='25' bgcolor='' align='right'> <font face='arial' size='3'> Sub Total:  </font> </td> 
 <td width='96' align='center'> <font face='arial' size='3'> &nbsp; $stotal tk/= </font> </td> 
</tr>
";

/*

<tr>
 <td width='504' height='25' bgcolor='' align='right'> <font face='arial' size='3'> Payment:  </font> </td> 
 <td width='96' align='center'> <font face='arial' size='3'> &nbsp; $payment tk/=</font> </td> 
</tr>


<tr>
 <td width='504' height='25' bgcolor='' align='right'> <font face='arial' size='3'> Due:  </font> </td> 
 <td width='96' align='center'> <font face='arial' size='3'> &nbsp; $due tk/= </font> </td> 
</tr>

*/

print"

</table>
";












print"
<table align='center' width='600' cellpadding='0' cellspacing='0'>
<tr>
<td width='20' height='40' align='left'> <font face='arial' size='2'> <b> Note: </b> $comments </font>  </td> 
</tr>
</table>
";


print"
<table align='center' width='600' cellpadding='0' cellspacing='0'>
<tr> <td height='20'> </td> </tr>
</table>
";

if($payment=="")
{
$payment="0.00";
}




/*







$result = mysql_query("SELECT * FROM `customer_laser` where  bank_name='$supplier' && adat<='$adate' ORDER BY `adat` ASC ");



while ($a_row = mysql_fetch_row($result)) {

	foreach ($a_row as $field) {
		
	}





if($a_row[2]==2)
{
$dr=$dr+$a_row[3];
}


if($a_row[2]==1)
{
$cr=$cr+$a_row[3];
}




}


$balance=$cr-$dr;



*/






$pui=$balance+$stotal;

$new_pui=$pui-$payment;




print"
<table align='center' width='600' cellpadding='0' cellspacing='1' bgcolor='black'>
<tr> 
<td height='60' bgcolor='white'> 

<table align='center' width='600' cellpadding='0' cellspacing='0'>
<tr> 
<td width='20'> </td>
<td width='150' align='center'> <font face='arial' size='3'> Pre Bal (Tk) </font> </td>
<td width='50'  align='center'> <font face='arial' size='3'> + </font> </td>
<td width='150'  align='center'> <font face='arial' size='3'> Purchase (Tk) </font> </td>
<td width='50'  align='center'> <font face='arial' size='3'> - </font> </td>
<td width='150'  align='center'> <font face='arial' size='3'> Payment (Tk) </font> </td>
<td width='50'  align='center'> <font face='arial' size='3'> = </font> </td>
<td width='150'  align='center'> <font face='arial' size='3'> New Bal (Tk) </font> </td>
<td width='20'> </td>
</tr>

<tr> 
<td width='20'> </td>
<td width='150' align='center'> <font face='arial' size='3'> $balance (Tk) </font> </td>
<td width='50'  align='center'> <font face='arial' size='3'>  </font> </td>
<td width='150'  align='center'> <font face='arial' size='3'> $stotal (Tk) </font> </td>
<td width='50'  align='center'> <font face='arial' size='3'>  </font> </td>
<td width='150'  align='center'> <font face='arial' size='3'> $payment (Tk) </font> </td>
<td width='50'  align='center'> <font face='arial' size='3'>  </font> </td>
<td width='150'  align='center'> <font face='arial' size='3'> $new_pui (Tk) </font> </td>
<td width='20'> </td>
</tr>



</table>

</td> 
</tr>
</table>
";












print"
<table align='center' width='600' cellpadding='0' cellspacing='0'>
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

//unset($_SESSION['cart']);

//session_unset($_SESSION['cart']);

//session_destroy();


print"
</body>

</head>

</html>



";


?>