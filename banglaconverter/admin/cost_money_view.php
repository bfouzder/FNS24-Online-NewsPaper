<?php

include_once('dbconnection.php');

//session_start();



$s=trim($_POST['s']);

$sql="SELECT * FROM `tcosting_entry` WHERE user_id='$s' ";
$result=mysql_query($sql);
$arrsp=mysql_fetch_array($result);
$money_id2=$arrsp[13];
$ledgern=$arrsp[15];
$u_namee=$arrsp[11];


$dat=$arrsp[6];
$mon=$arrsp[7];
$yer=$arrsp[8];






print"

<html>

<head>
<title> Welcome to cost memo </title>


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
<tr> <td align='center' height='40' bgcolor='F2F2F2'> <font face='arial' size='3'> <b> Debit Voucher </b> </font>  </td></tr>
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
<table align='center' width='800' cellpadding='0' cellspacing='1'  border='1' id='tableq'>

<tr bgcolor='F2F2F2'> 
<td align='center'  width='40' height='20'> <font face='arial' size='4' color='094FA1'> Sl. </font> </td> 
<td align='left' width='150'> <font face='arial' size='4' color='094FA1'> &nbsp; Name</font> </td> 
<td align='left' width='300'> <font face='arial' size='4' color='094FA1'> &nbsp; Description </font> </td> 
<td align='center' width='100'> <font face='arial' size='4' color='094FA1'> Amount </font> </td> 
</tr>
";





/*

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


*/








$total=0;




$result = mysql_query("SELECT * FROM `costing_entry` where money_id2='$money_id2' ORDER BY `user_id` ASC ");




while ($a_row = mysql_fetch_row($result)) {

	foreach ($a_row as $field) {
		
	}



$e++;
$w++;
$qw++;
 
 /*
$sql="SELECT * FROM `expendature_sub` WHERE user_id='$product_id' ";

$result=mysql_query($sql);
$arrp_new=mysql_fetch_array($result);

$arrp[3]=$local_a[$qw];
$arrp[4]=$amount_a[$qw];
*/



print"
<tr bgcolor='white'> 
<td align='center'  width='40' height='25'> <font face='arial' size='4' color=''> $e. </font> </td> 
<td align='left' width='150'> <font face='arial' size='4' color=''> &nbsp; $a_row[3] </font> </td> 
<td align='left' width='300'> <font face='arial' size='4' color=''> &nbsp; $a_row[4] </font> </td> 
<td align='center' width='100'> <font face='arial' size='4' color=''> $a_row[5] </font> </td> 
</tr>
";
$total=$total+$a_row[5];
 



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
<td width='300' height='25' bgcolor='' align='left'> <font face='arial' size='4'> <b> ................... </b> </font> </td>  
<td width='300' height='25' bgcolor='' align='right'> <font face='arial' size='4'><b> ..................... </b> </font> </td>  
</tr>
<tr bgcolor='white'>
<td width='300' height='25' bgcolor='' align='left'> <font face='arial' size='4'> <b>  Received By </b> </font> </td>  
<td width='300' height='25' bgcolor='' align='right'> <font face='arial' size='4'> <b> Approved By </b> </font> </td>  
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