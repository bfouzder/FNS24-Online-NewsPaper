<?php
include_once('dbconnection.php');




$s=trim($_POST['s']);



$sql="SELECT * FROM `salememo` WHERE user_id='$s' ";


$result=mysql_query($sql);
$arra=mysql_fetch_array($result);

$memo_id=$arra[1];

$sss_id=$arra[2];

$suppliern=$arra[3];
$supplier_id=$arra[0];


$sub_total=$arra[5];


$payment=$arra[7];
$saler=$arra[22];

$po_no=$arra[29];
$d_no=$arra[30];



$due=$arra[8];
$dat=$arra[9];
$mon=$arra[10];
$yer=$arra[11];
$t4=$arra[13];
$less=$arra[6];
$paymenttype=$arra[15];
$mobile=$arra[18];


$discount_less=$arra[27];

$subtotal_last=$arra[5]-$discount_less;





$stotal=$subtotal_last+$less;

//include_once('taxx.php');

$sty=$arra[16];


//print"$sty";


$stotal=$stotal+$sty;



//print" $sub_total - $payment - $less - $due  ";










//print" <br> $adat - $dat-$mon- $yer - $money_id";

//print" $suppliern - $address - Mobile- $mobile  ";




$sql="SELECT * FROM `customer` WHERE user_id='$sss_id' ";
$result=mysql_query($sql);
$arras=mysql_fetch_array($result);
$address=$arras[5];






print"
<html>

<head>
<meta http-equiv='content-type' content='text/html;charset=utf-8' />

<title> Welcome to memo print </title>

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
<table align='center' width='1000' cellpadding='0' cellspacing='0'>
<tr> <td align='center' height='10'>  </td></tr>
<tr> 
<td width='300' align='left'><a href=\"daily_purchase.php?action=removee&i5d=$arrp[0]\"> <font face='arial' size='3' color='black'> Sl No./ Memo No: <b> $memo_id </b> </font> </a> </td>
<td width='130' align='center' bgcolor='cccccc'><font face='arial' size='3'> <b> Challan  </b> </font> </td>
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
<tr> <td align='left' height='30' bgcolor='white'> &nbsp;	 <font face='arial' szie='3'> Created By : <b> $saler  </b> </font>  </td></tr>
</table>

";











/*
print"
<table align='center' width='800' cellpadding='0' cellspacing='0'>
<tr> <td align='center' height='10'>  </td></tr>
<tr> <td width='100' height='25'> </td> <td align='left' height='10' width='500'> <font face='arial' size='2'> Customer Name :  $suppliern </font>  </td> <td width='200' align='left'>  <a href=\"customer_transection.php?action=removee&i5d=$arrp[0]\"> <font face='arial' size='2' color='black'> Memo no: $memo_id </font> </a> </td> </tr>
<tr> <td width='100' height='20'> </td> <td align='left' height='10' width='500'> <font face='arial' size='2'>Customer ID &nbsp;&nbsp;&nbsp;&nbsp; : $supplier_id </font>  </td> <td width='200'> </td> </tr>
<tr> <td width='100' height='20'> </td> <td align='left' height='10' width='500'> <font face='arial' size='2'>Address &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : $paymenttype ,  $mobile </font>  </td> <td width='200'> </td> </tr>


<tr> <td width='100'> <td align='left' height='10' width='500'> <font face='arial' size='2'>Date &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : $dat-$mon-$yer &nbsp;  </font> </td> <td width='200'> </td> </tr>



<tr> <td width='100'> <td align='left' height='10' width='500'> <font face='arial' size='2'> Saler &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: $saler &nbsp;  </font> </td> <td width='200'> </td> </tr>

</table>
*/







print"
<table align='center' width='1000' cellpadding='0' cellspacing='0'>
<tr>
<td width='20' height='13'align='center'> <font face='arial' size='2'></font> </td> 
</tr>
</table>


<table align='center' width='1000' cellpadding='0' cellspacing='1' bgcolor='black'>

<tr bgcolor='white'>
 <td width='30' height='25' align='center'> <font face='arial' size='3'> <b> No. </b> </font> </td> 
 <td width='350' align='left'><font face='arial' size='3'> <b> &nbsp; Description. </b> </font> </td>
 
 <td width='100' align='center'><font face='arial' size='3'> <b> Qty. </b> </font> </td> 
 
 
 <td width='50' align='center'><font face='arial' size='3'> <b> Unit </b> </font> </td>
 ";
 
 
 
 
 /*"
 
 <td width='50' align='center'><font face='arial' size='3'> <b> Rate </b> </font> </td>

 ";
 */
 
 
 
 /*
 <td width='50' align='center'><font face='arial' size='3'> <b> Commission </b> </font> </td>
 */
 
 /*
 print"
 <td width='100' align='center'><font face='arial' size='3'> <b> Total. </b> </font> </td>
 ";
 */
 
 
 
 print"
</tr>
";







$result = mysql_query("SELECT * FROM `saleproduct` where money_id='$memo_id' ");

while ($a_row = mysql_fetch_row($result)) {

	foreach ($a_row as $field) {
		
	}


$w++;


$comm=$a_row[25];
$total3=$a_row[6]*$a_row[7];


print"
<tr bgcolor='white'>
 <td width='30' align='center' height='25'> <font face='arial' size='3'>  $w  </font> </td> 
 <td width='350' align='left'> &nbsp; <font face='arial' size='3'>   $a_row[5]  $a_row_test[19]  </font> </td>

 <td width='100' align='center'><font face='arial' size='3'>   $a_row[6] </font> </td>
 
 <td width='50' align='center'><font face='arial' size='3'> <b> $a_row[29] </b> </font> </td>
 ";
 
 /*
 <td width='50' align='center'><font face='arial' size='3'>    $a_row[7] </font> </td> 
 */
 
 
 
 
 
 
 
 
 /*
 <td width='50' align='center'><font face='arial' size='3'> <b> $comm </b> </font> </td>
*/

/*
print"
 <td width='100' align='center'><font face='arial' size='3'>   $a_row[8]  </font> </td> 
 ";
 
 
 */
 
 print"
 
</tr>

";


$t_final=$t_final+$total3;
$com_final=$com_final+$comm;

}




/*
print"
<tr bgcolor='white'>
 <td width='30' align='center' height='25'> <font face='arial' size='3'>   </font> </td> 
 <td width='350' align='left'> &nbsp; <font face='arial' size='3'>    </font> </td>
 <td width='100' align='center'><font face='arial' size='3'>    </font> </td>
 <td width='50' align='center'><font face='arial' size='3'>     </font> </td> 
 <td width='50' align='center'><font face='arial' size='3'> <b> $t_final </b> </font> </td>
 <td width='50' align='center'><font face='arial' size='3'> <b> $com_final </b> </font> </td>
 <td width='100' align='center'><font face='arial' size='3'>     </font> </td> 
</tr>
";
*/




print"
</table>



<table align='center' width='1000' cellpadding='0' cellspacing='0'>
";

/*
<tr>
 <td width='504' height='25' bgcolor='' align='right'> <font face='arial' size='2'> Total:  </font> </td> 
 <td width='96' align='center'> <font face='arial' size='3'> &nbsp; $sub_total tk/= </font> </td> 
</tr>
";
*/

if($discount_less>0)
{
print"
<tr>
 <td width='504' height='25' bgcolor='' align='right'> <font face='arial' size='2'> Discount:  </font> </td> 
 <td width='96' align='center'> <font face='arial' size='3'> &nbsp; $discount_less tk/= </font> </td> 
</tr>
";



print"
<tr>
 <td width='504' height='25' bgcolor='' align='right'> <font face='arial' size='2'> Total:  </font> </td> 
 <td width='96' align='center'> <font face='arial' size='3'> &nbsp; $subtotal_last tk/= </font> </td> 
</tr>
";
}


if($less>0)
{

print"
<tr>
 <td width='504' height='25' bgcolor='' align='right'> <font face='arial' size='2'> Freight Cost:  </font> </td> 
 <td width='96' align='center'> <font face='arial' size='3'> &nbsp; $less tk/=</font> </td> 
</tr>




<tr>
 <td width='504' height='25' bgcolor='' align='right'> <font face='arial' size='2'> Sub Total:  </font> </td> 
 <td width='96' align='center'> <font face='arial' size='3'> &nbsp; $stotal tk/= </font> </td> 
</tr>
";
}


if($payment>0)
{
print"
<tr>
 <td width='504' height='25' bgcolor='' align='right'> <font face='arial' size='2'> Payment:  </font> </td> 
 <td width='96' align='center'> <font face='arial' size='3'> &nbsp; $payment tk/=</font> </td> 
</tr>
";

}

/*
print"
<tr>
 <td width='504' height='25' bgcolor='' align='right'> <font face='arial' size='2'> Due:  </font> </td> 
 <td width='96' align='center'> <font face='arial' size='3'> &nbsp; $due tk/= </font> </td> 
</tr>
";
*/


print"

</table>


<table align='center' width='1000' cellpadding='0' cellspacing='0'>
<tr> <td height='40'> </td> </tr>
</table>
";



include_once('sign.php');



print"
</td> 
</tr>
</table>

";


//session_destroy();


print"
</body>

</head>

</html>



";


?>