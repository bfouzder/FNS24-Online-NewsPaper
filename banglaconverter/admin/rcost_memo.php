<?php

include_once('dbconnection.php');

//session_start();



$ser=trim($_POST['ser']);
$less=trim($_POST['less']);
$payment=trim($_POST['payment']);


$no_cash=trim($_POST['no_cash']);

//print"$no_cash";

//exit;

$payment_mode=trim($_POST['payment_mode']);

$paymenttype=trim($_POST['paymenttype']);
$supplier=trim($_POST['supplier']);
$comments=trim($_POST['comments']);
$due=trim($_POST['due']);


$comments888=$comments;



$sql="SELECT * FROM `bank` WHERE user_id='$payment_mode' ";
$result=mysql_query($sql);
$arrsp=mysql_fetch_array($result);
$payment_moden=$arrsp[1];


if($payment_mode=="")
{
$payment_moden="Cash";
}

//print" - $comments -";


$ledger=trim($_POST['ledger']);

$cost_name=trim($_POST['cost_name']);


//print" $ledger  <br> ";


$sql="SELECT * FROM `receipt_laser` WHERE user_id='$ledger' ";

$result=mysql_query($sql);
$arrl=mysql_fetch_array($result);
$ledgern=$arrl[1];








$sql="SELECT * FROM `rexpendature_sub` WHERE user_id='$cost_name' ";


$result=mysql_query($sql);
$arrc=mysql_fetch_array($result);
$cost_namen=$arrc[2];





$commentss=$comments;




//print"$ledgern - $cost_namen - $comments ";






//print" $supplier - $less - $payment - $due - $comments ";




/*
$sql="SELECT * FROM `expenduter_sub` WHERE user_id='$supplier' ";
$result=mysql_query($sql);
$arr1=mysql_fetch_array($result);
$u=$arr1[0];
$suppliern=$arr1[1];
$address=$arr1[4];
$mobile=$arr1[2];
*/





$money_id= time().$u;

$money_id2= time().$u_idd;





/*

$bbb=time(); 

$d=date("m/d/y",$bbb); 

$mon="$d[0]$d[1]";
$dat="$d[3]$d[4]";
$yer="20$d[6]$d[7]";
*/


$dat=trim($_POST['dat']);
$mon=trim($_POST['mon']);
$yer=trim($_POST['yer']);



$adat="$yer$mon$dat";



print"

<html>

<head>
<title> Others Income Collection Memo </title>


<style>

body
{
margin-top:30px;
}

A:link {
    FONT-WEIGHT: normal; FONT-SIZE: 15px; COLOR: black; FONT-STYLE: normal; FONT-FAMILY: verdana, Arial, Helvetica, sans-serif; TEXT-DECORATION: none
}

A:visited {
    FONT-WEIGHT: normal; FONT-SIZE: 15px; COLOR: black; FONT-STYLE: normal; FONT-FAMILY: verdana, Arial, Helvetica, sans-serif; TEXT-DECORATION: none
}
A:active {
    FONT-WEIGHT: normal; FONT-SIZE: 15px; COLOR: black; FONT-STYLE: normal; FONT-FAMILY: verdana, Arial, Helvetica, sans-serif; TEXT-DECORATION: none
}
A:hover {
    FONT-WEIGHT: normal; FONT-SIZE: 15px; COLOR: black; FONT-STYLE: normal; FONT-FAMILY: verdana, Arial, Helvetica, sans-serif; TEXT-DECORATION: none
}





table#tableq
{
border: 1px solid black;
 border-collapse: collapse;
}



</style>


</head>


<body onload='window.print()' bgcolor=''>
";



include_once('address.php');


print"

<table align='center' width='150' cellpadding='0' cellspacing='0'>
<tr> <td align='center' height='40' bgcolor='F2F2F2'> <font face='arial' size='3'> <b> Money Receipt From Others Income  </b> </font>  </td></tr>
</table>

<br>

<table align='center' width='800' cellpadding='0' cellspacing='0'>
<tr> 
<td align='left' width='200'> <font face='arial' size='4' color='094FA1'> <a href='cost_entry.php'> Transaction ID : $money_id2 </a> </font> </td> 
<td align='right' width='400'> <font face='arial' size='4' color='094FA1'> Date: $dat-$mon-$yer </font> </td> 
</tr>

<tr> <td height='7'> </td> </tr>

<tr> 
<td align='left' width='250'> <font face='arial' size='4' color='094FA1'> <a href='cost_entry.php'> Ledger Name: $ledgern </a> </font> </td> 
<td align='left' width='400'> <font face='arial' size='4' color='094FA1'>  </font> </td> 
</tr>
";


/*

<tr> <td height='7'> </td> </tr>

<tr> 
<td align='left' width='200'> <font face='arial' size='4' color='094FA1'> <a href='cost_entry.php'> Purpose: $cost_namen </a> </font> </td> 
<td align='left' width=''> <font face='arial' size='4' color='094FA1'>  </font> </td> 
</tr>
*/


print"
<tr> <td height='7'> </td> </tr>

<tr> 
<td align='left' width='200'> <font face='arial' size='4' color='094FA1'> <a href='cost_entry.php'> Created By : $u_namee </a> </font> </td> 
<td align='left' width=''> <font face='arial' size='4' color='094FA1'>  </font> </td> 
</tr>


<tr> <td height='20'> </td> </tr>


</table>
";



print"
<table align='center' width='800' cellpadding='3' cellspacing='1'  border='1' id='tableq'>

<tr bgcolor='F2F2F2'> 
<td align='center'  width='40' height='20'> <font face='arial' size='4' color='094FA1'> Sl. </font> </td> 
<td align='left' width='170'> <font face='arial' size='4' color='094FA1'>  Name</font> </td> 
<td align='left' width='300'> <font face='arial' size='4' color='094FA1'>  Description </font> </td> 
<td align='center' width='100'> <font face='arial' size='4' color='094FA1'> Amount </font> </td> 
</tr>
";







$qeu=0;

foreach($_SESSION['cart_price'] as $product_id => $amount)
{
$qeu++;
$amount_a[$qeu]=$amount;
}



$qeu=0;

foreach($_SESSION['cart_local'] as $product_id => $local)
{
$qeu++;
$local_a[$qeu]=$local;
}










$total=0;

foreach($_SESSION['cart'] as $product_id => $quantity)
{

$e++;
$w++;
$qw++;
 
$sql="SELECT * FROM `rexpendature_sub` WHERE user_id='$product_id' ";

$result=mysql_query($sql);
$arrp_new=mysql_fetch_array($result);

$arrp[3]=$local_a[$qw];
$arrp[4]=$amount_a[$qw];


print"
<tr bgcolor='white'> 
<td align='center'  width='40' height='25'> <font face='arial' size='4' color=''> $e. </font> </td> 
<td align='left' width='150'> <font face='arial' size='4' color=''> $arrp_new[2] </font> </td> 
<td align='left' width='300'> <font face='arial' size='4' color=''>  $arrp[3] </font> </td> 
<td align='center' width='100'> <font face='arial' size='4' color=''> $arrp[4] </font> </td> 
</tr>
";
$total=$total+$arrp[4];
 

$sql = "INSERT INTO `rcosting_entry` (`user_id`, `money_id`, `expenduter_name`, `sub_name`, `details`, `amount`, `dat`, `mon`, `yer`,`adat`, `tim`, `user_name`,`sub_id`,`ledger`,`no_cash`,`money_id2`,`u_id2`) VALUES ('','$money_id','$arrp_new[1]','$arrp_new[2]','$arrp[3]','$arrp[4]','$dat','$mon','$yer','$adat','$time','$u_namee','$arrp_new[0]','$ledger','$no_cash','$money_id2','$u_idd')";
mysql_query($sql);











if($no_cash=="")
{

if($payment_mode=="" && $arrp[4]>0)
{

$comments8="   $arrp_new[2]   $comments888 ";

$credit=1;
$sql = "INSERT INTO `cash_book` (`user_id`, `money_id`, `dat`, `mon`, `yer`, `adat`, `time`, `comments`, `debit`, `credit`, `balance`, `user`,`money_id2`,`u_id2`) VALUES ('','$money_id','$dat','$mon','$yer','$adat','$time','$comments8','$debit','$credit','$arrp[4]','$u_namee','$money_id2','$u_idd')";
mysql_query($sql);
}

else
{	

if($arrp[4]>0)
{
$commentss="   $arrp_new[2]   $comments   $payment_moden  ";
$credit=1;
$sql = "INSERT INTO `bank_refill` (`user_id`, `bank_name`,`credit`, `amount`,`comments`,`dat`, `mon`, `yer`, `money_id`, `adat`, `user`,`money_id2`,`u_id2`) VALUES ('','$payment_mode','$credit','$arrp[4]','$commentss','$dat','$mon','$yer','$money_id','$adat','$u_namee','$money_id2','$u_idd')";
mysql_query($sql);
}
	
}

}














}



if($total>0)

{

if($e>0 && $total>0)
{



$sql = "INSERT INTO `rtcosting_entry` (`user_id`, `money_id`, `expenduter_name`, `sub_name`, `details`, `total_amount`, `dat`, `mon`, `yer`,`adat`, `tim`, `user_name`, `ledger`,`money_id2`,`u_id2`,`ledger_name`) VALUES ('','$money_id','$arrp_new[1]','$arrp_new[2]','$arrp[3]','$total','$dat','$mon','$yer','$adat','$time','$u_namee','$ledger','$money_id2','$u_idd','$ledgern' )";
mysql_query($sql);



$comments="  $cost_namen  Income  $comments888 ";


$credit=2;

$sql = "INSERT INTO `rpayment_transection` (`user_id`, `bank_name`,`credit`, `amount`,`comments`,`dat`, `mon`, `yer`, `money_id`, `adat`, `user`,`money_id2`,`u_id2`) VALUES ('','$ledger','$credit','$total','$comments','$dat','$mon','$yer','$money_id','$adat','$u_namee','$money_id2','$u_idd')";
mysql_query($sql);




}


}



print"
<tr bgcolor='white'> 
<td align='center' width='Sl.' width='40' height='20'> <font face='arial' size='4' color=''>  </font> </td> 
<td align='center' width='150'> <font face='arial' size='4' color=''> </font> </td> 
<td align='right' width='300'> <font face='arial' size='4' color=''> Total &nbsp; </font> </td> 
<td align='center' width='100'> <font face='arial' size='4' color=''> $total  </font> </td> 
</tr>

</table>







<table align='center' width='800' cellpadding='0' cellspacing='0'>
<tr> <td height='30'>  </td>  </tr>


<tr> <td height='10'>  </td>  </tr>
<tr bgcolor='white'>
<td width='504' height='25' bgcolor='' align='left'> <font face='arial' size='4'>   
";
include_once('convert488.php');
print"
Taka Only
</font> </td>  
</tr>
</table>



<table align='center' width='800' cellpadding='0' cellspacing='0'>
<tr> <td height='100'>  </td>  </tr>

<tr bgcolor='white'>
<td width='300' height='25' bgcolor='' align='left'> <font face='arial' size='4'> <b> ........................... </b> </font> </td>  
<td width='300' height='25' bgcolor='' align='right'> <font face='arial' size='4'><b> ......................... </b> </font> </td>  
</tr>
<tr bgcolor='white'>
<td width='300' height='25' bgcolor='' align='left'> &nbsp;&nbsp; <font face='arial' size='4'> <b>  Received By </b> </font> </td>  
<td width='300' height='25' bgcolor='' align='right'> <font face='arial' size='4'> <b> Approved By </b> </font>&nbsp;  </td>  
</tr>

</table>


















";

print"
<table align='center' width='600' cellpadding='0' cellspacing='0'>

<tr> <td height='30'> </td> </tr>

<tr bgcolor=''> 
<td align='left' width='Sl.' width='200' height='20'> <font face='arial' size='4' color=''>  </font> </td> 
<td align='center' width='200'> <font face='arial' size='4' color=''> </font> </td>  
<td align='right' width='200'> <font face='arial' size='4' color=''>  </font> </td> 
</tr>
</table>


</td>
</tr>
</table>
";

//session_unset($_SESSION['cart']);


unset($_SESSION['cart']);
unset($_SESSION['cart_price']);
unset($_SESSION['cart_unit']);
unset($_SESSION['cart_com']);
unset($_SESSION['cart_id']);
unset($_SESSION['cart_local']);


//session_destroy();

print"

</body>





</html>

";


?>