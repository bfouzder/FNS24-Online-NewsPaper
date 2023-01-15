<?php
include_once('dbconnection.php');


include_once('ppp.php');


$s=trim($_POST['s']);




$sql="SELECT * FROM `buymemo_return` WHERE user_id='$s' ";


$result=mysql_query($sql);
$arra=mysql_fetch_array($result);

$memo_id=$arra[1];

$money_id=$arra[1];


$suppliern=$arra[3];
$supplier_id=$arra[2];

$employee=$arra[20];

$u_namee=$arra[20];


$sub_total=$arra[5];
$payment=$arra[7];




$due=$arra[8];


$dat=$arra[9];
$mon=$arra[10];
$yer=$arra[11];
$t4=$arra[13];

$less=$arra[6];

$paymenttype=$arra[15];

$mobile=$arra[16];


$stotal=$sub_total-$less;



$sql="SELECT * FROM `supplier` WHERE user_id='$supplier_id' ";
$result=mysql_query($sql);
$arras=mysql_fetch_array($result);
$address=$arras[5];


//print" $sub_total - $payment - $less - $due  ";



//print" <br> $adat - $dat-$mon- $yer - $money_id";

//print" $suppliern - $address - Mobile- $mobile  ";









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
<table align='center' width='$set_wd' cellpadding='0' cellspacing='0'>
<tr> <td align='center' height='10'>  </td></tr>
<tr> 
<td width='130' align='center' bgcolor='$set_bg_color'  height='40' id='kh'> <b> Purchase Return  </b>  </td>
</tr>
<tr> <td align='center' height='10'>  </td></tr>
</table>





<table align='center' width='990' cellpadding='0' cellspacing='1' bgcolor='black'>
<tr>
<td bgcolor='white' align='center'>

<table align='center' width='1000' cellpadding='0' cellspacing='0' bgcolor='black'>
<tr bgcolor='white'> 
<td align='left' height='30' bgcolor='white' width='160'> 
&nbsp; <font face='arial' size='4'> <b> Purchase Ret. No </b>     </font> 
</td>

<td align='left' height='30' bgcolor='white' width='620'> 
&nbsp; <font face='arial' size='4'> <b>  : </b>  $money_id   </font> 
</td>



<td width='70' align='left'>
<font face='arial' size='4'>   <b> Date </b>    </font>
</td>

<td width='150' align='left'>
<font face='arial' size='4'> <b> : </b> $dat-$mon-$yer   </font> 
</td>

</tr>
</table>





<table align='center' width='600' cellpadding='0' cellspacing='0' bgcolor=''>
<tr> <td align='left' height='1' bgcolor=''>   </td></tr>
</table>






<table align='center' width='1000' cellpadding='0' cellspacing='0' bgcolor='black'>
<tr bgcolor='white'> 


<td align='left' height='30' bgcolor='white' width='160'> 
&nbsp; <font face='arial' size='4'>  <b> Supplier Name  </b>   </font>  </td>

<td align='left' height='30' bgcolor='white' width='620'> 
&nbsp; <font face='arial' size='4'>  <b> :   </b>   $suppliern </font>  </td>



";



print"
<td width='70' align='left'>
<font face='arial' size='4'>  <b>  </b> 
</td>

<td width='150' align='left'>
<font face='arial' size='4'> <b>  </b>   </font> 
</td>
";


/*

print"
<td width='350' align='right'>
<font face='arial' size='4'> <b>  </b>
</td>

<td width='150' align='left'>
<font face='arial' size='4'>  &nbsp;  $u_namee  </font> 
</td>
";
*/


print"
</tr>
</table>



<table align='center' width='1000' cellpadding='0' cellspacing='0' bgcolor=''>
<tr> <td align='left' height='1' bgcolor=''>   </td></tr>
</table>


<table align='center' width='1000' cellpadding='0' cellspacing='0' bgcolor=''>
<tr> 

<td align='left' height='30' bgcolor='white' width='160'> &nbsp;	 <font face='arial' size='4'> <b> Address  </b>  
</td>

<td align='left' height='30' bgcolor='white' width='620'> &nbsp;	 <font face='arial' size='4'> <b> : </b>  $address   
</td>


<td width='70' align='left'>
<font face='arial' size='4'> <b>   </b>  
</td>

<td width='150' align='left'>
<font face='arial' size='4'> <b>  </b>    </font> 
</td>



</tr>
</table>
";


if($contact_name!="")
{
print"
<table align='center' width='1000' cellpadding='0' cellspacing='0' bgcolor=''>
<tr> <td align='left' height='1' bgcolor=''>   </td></tr>
</table>


<table align='center' width='1000' cellpadding='0' cellspacing='0' bgcolor='black'>
<tr> <td align='left' height='30' bgcolor='white' width='260'> 	&nbsp; <font face='arial' size='4'> <b> Contact Person : </b>  $contact_name  </font>  </td>
<td width='10' bgcolor='white'>  </td>
<td width='105' align='right' bgcolor='white'> <font face='arial' size='4'> <b>  </b> &nbsp;      </font> </td>
<td width='5' bgcolor='white'>  </td>
<td width='110' align='left' bgcolor='white'> <font face='arial' size='4'>  $contact_name_old_old  $contact_new_old     </font>  </td>
</tr>
</table>
";
}


print"

<table align='center' width='1000' cellpadding='0' cellspacing='0' bgcolor=''>
<tr> <td align='left' height='1' bgcolor=''>   </td></tr>
</table>



<table align='center' width='1000' cellpadding='0' cellspacing='0' bgcolor=''>
<tr> 

<td align='left' height='30' bgcolor='white' width='160'> &nbsp;	 <font face='arial' size='4'> <b> Mobile  </b>  
</td>

<td align='left' height='30' bgcolor='white' width='620'> &nbsp;	 <font face='arial' size='4'> <b> : </b>  $mobile   
</td>


<td width='70' align='left'>
<font face='arial' size='4'> <b>   </b>  
</td>

<td width='150' align='left'>
<font face='arial' size='4'>   <b>  </b>   </font> 
</td>



</tr>
</table>
";


print"

</td>
</tr>
</table>
";












/*

print"

<table align='center' width='990' cellpadding='0' cellspacing='1' bgcolor='black'>
<tr>
<td bgcolor='white' align='center'>

<table align='center' width='1000' cellpadding='0' cellspacing='0' bgcolor='black'>
<tr bgcolor='white'> 
<td align='left' height='30' bgcolor='white' width='500'> 
&nbsp; <font face='arial' size='4'>  <b> Purchase Return No : </b> $money_id  </font>  </td>


<td width='350' align='right'>
<font face='arial' size='4'>  <b> Date: </b>    </font>
</td>

<td width='150' align='left'>
<font face='arial' size='4'>  &nbsp;  $dat-$mon-$yer   </font> 
</td>

</tr>
</table>





<table align='center' width='600' cellpadding='0' cellspacing='0' bgcolor=''>
<tr> <td align='left' height='1' bgcolor=''>   </td></tr>
</table>






<table align='center' width='1000' cellpadding='0' cellspacing='0' bgcolor='black'>
<tr bgcolor='white'> 
<td align='left' height='30' bgcolor='white' width='500'> &nbsp;	 <font face='arial' size='4'> <b> Supplier / Company Name : </b>  $suppliern  

</font>  </td>





<td width='350' align='right'>
<font face='arial' size='4'> <b> Created By : </b>
</td>

<td width='150' align='left'>
<font face='arial' size='4'>  &nbsp;  $u_namee  </font> 
</td>

</tr>
</table>





<table align='center' width='1000' cellpadding='0' cellspacing='0' bgcolor=''>
<tr> <td align='left' height='1' bgcolor=''>   </td></tr>
</table>




";


if($contact_name!="")
{
print"
<table align='center' width='1000' cellpadding='0' cellspacing='0' bgcolor=''>
<tr> <td align='left' height='1' bgcolor=''>   </td></tr>
</table>


<table align='center' width='1000' cellpadding='0' cellspacing='0' bgcolor='black'>
<tr> <td align='left' height='30' bgcolor='white' width='260'> 	&nbsp; <font face='arial' size='4'> <b> Contact Person : </b>  $contact_name  </font>  </td>
<td width='10' bgcolor='white'>  </td>
<td width='105' align='right' bgcolor='white'> <font face='arial' size='4'> <b>  </b> &nbsp;      </font> </td>
<td width='5' bgcolor='white'>  </td>
<td width='110' align='left' bgcolor='white'> <font face='arial' size='4'>  $contact_name_old_old  $contact_new_old     </font>  </td>
</tr>
</table>
";
}


print"

<table align='center' width='1000' cellpadding='0' cellspacing='0' bgcolor=''>
<tr> <td align='left' height='1' bgcolor=''>   </td></tr>
</table>



<table align='center' width='1000' cellpadding='0' cellspacing='0' bgcolor='black'>
<tr> <td align='left' height='30' bgcolor='white'> &nbsp;  <font face='arial' size='4'> <b> Address : </b>  $address &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  Mobile : $mobile   </font>  </td></tr>
</table>


</td>
</tr>
</table>
";

*/




/*




print"
<table align='center' width='1000' cellpadding='0' cellspacing='0'>
<tr> <td align='center' height='10'>  </td></tr>
<tr> 
<td width='300' align='left'><a href=\"daily_purchase.php?action=removee&i5d=$arrp[0]\"> <font face='arial' size='4' color='black'> Sl No./ Memo No: <b> $memo_id   </b> </font> </a> </td>
<td width='130' align='center' bgcolor='$set_bg_color' height='40' id='kh'> <b> Purchase Return </b> </font> </td>
<td width='270' align='right'><font face='arial' size='4'> Date: <b> $dat-$mon-$yer </b> </font> &nbsp;</td>
</tr>
<tr> <td align='center' height='10'>  </td></tr>
</table>


<table align='center' width='1000' cellpadding='0' cellspacing='1' bgcolor='black'>
<tr> <td align='left' height='30' bgcolor='white'> &nbsp;	 <font face='arial' szie='3'> Supplier / Compnay Name : <b> $suppliern </b> </font>  </td></tr>
</table>

<table align='center' width='1000' cellpadding='0' cellspacing='0' bgcolor=''>
<tr> <td align='left' height='3' bgcolor=''>   </td></tr>
</table>


<table align='center' width='1000' cellpadding='0' cellspacing='1' bgcolor='black'>
<tr> <td align='left' height='30' bgcolor='white'> &nbsp;	 <font face='arial' szie='3'> Address : <b> $address &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  Mobile : $mobile  </b> </font>  </td></tr>
</table>


<table align='center' width='1000' cellpadding='0' cellspacing='1' bgcolor='black'>
<tr> <td align='left' height='30' bgcolor='white'> &nbsp;	 <font face='arial' szie='3'> Employee : <b> $employee  </b> </font>  </td></tr>
</table>

";



*/










/*
print"
<table align='center' width='800' cellpadding='0' cellspacing='0'>
<tr> <td align='center' height='10'>  </td></tr>
<tr> <td width='100' height='25'> </td> <td align='left' height='10' width='500'> <font face='arial' size='4'> Suplier Name :  $suppliern </font>  </td> <td width='200' align='left'>  <a href=\"supplier_transection.php?action=removee&i5d=$arrp[0]\"> <font face='arial' size='4' color='black'> Memo no: $memo_id </font> </a> </td> </tr>
<tr> <td width='100' height='20'> </td> <td align='left' height='10' width='500'> <font face='arial' size='4'>Suplier ID &nbsp;&nbsp;&nbsp;&nbsp; : $supplier_id </font>  </td> <td width='200'> </td> </tr>
<tr> <td width='100' height='20'> </td> <td align='left' height='10' width='500'> <font face='arial' size='4'>Address &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : $paymenttype ,  $mobile </font>  </td> <td width='200'> </td> </tr>
<tr> <td width='100'> <td align='left' height='10' width='500'> <font face='arial' size='4'>Date: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : $dat-$mon-$yer &nbsp;  </font> </td> <td width='200'> </td> </tr>



<tr> <td width='100'> <td align='left' height='10' width='500'> <font face='arial' size='4'> Employee: &nbsp;&nbsp;&nbsp;: $employee &nbsp;  </font> </td> <td width='200'> </td> </tr>

</table>
";

*/


print"

<table align='center' width='1000' cellpadding='0' cellspacing='0'>
<tr>
<td width='20' height='13'align='center'> <font face='arial' size='4'></font> </td> 
</tr>
</table>






<table align='center' width='1000' cellpadding='0' cellspacing='1' bgcolor='black'>
<tr>
<td bgcolor='white'>


<table align='center' width='1000' cellpadding='0' cellspacing='0'>
<tr>
<td valign='top' height='$set_height'>







<table align='center' width='1000' cellpadding='4' cellspacing='1' bgcolor='black'>

<tr bgcolor='white'>
 <td width='30' height='15' align='center'> <font face='arial' size='4'> <b> Sl. </b> </font> </td> 
 <td width='300' align='center'><font face='arial' size='4'> <b> Product Name </b> </font> </td>
 ";
 
 include_once('mm.php');
 
 
 print"
 <td width='70' align='center'><font face='arial' size='4'> <b> Qty. </b> </font> </td> 
 <td width='70' align='center'><font face='arial' size='4'> <b> Unit </b> </font> </td> 
 ";
 print"
 <td width='100' align='center'><font face='arial' size='4'> <b>  Rate  </b> </font> </td>
 ";
 print"
 <td width='100' align='right'><font face='arial' size='4'> <b> Total &nbsp; </b> </font> </td> 
</tr>
";







$result = mysql_query("SELECT * FROM `buyproduct_return` where money_id='$memo_id' ORDER BY `user_id` ASC ");

while ($a_row = mysql_fetch_row($result)) {

	foreach ($a_row as $field) {
		
	}


$w++;



print"
<tr bgcolor='white'>
 <td width='' align='center' height='25'> <font face='arial' size='4'>  $w  </font> </td> 
 <td width='' align='left'><font face='arial' size='4'>   $a_row[5]  $a_row_old[16]  </font> </td>
 ";
 
 
if($cwp1==1)
{
 print"
 <td width='' align='center'><font face='arial' size='4'>   $a_row[22]  </font> </td> 
 ";
}

if($cwp2==1)
{ 
 print"
 <td width='' align='center'><font face='arial' size='4'>   $a_row[23]  </font> </td> 
 ";
}

if($cwp3==1)
{
 print"
 <td width='' align='center'><font face='arial' size='4'>   $a_row[24]  </font> </td> 
 ";
} 


if($cwp4==1)
{
 print"
 <td width='' align='center'><font face='arial' size='4'>   $a_row[25]  </font> </td> 
 ";
}
 
 print"
 <td width='' align='center'><font face='arial' size='4'>   $a_row[6]  </font> </td> 
 <td width='' align='center'><font face='arial' size='4'>   $a_row[21]  </font> </td> 
 
 <td width='' align='center'><font face='arial' size='4'>    $a_row[7] </font> </td> 
 
 
 <td width='' align='right'><font face='arial' size='4'>   $a_row[8] &nbsp;  </font> </td> 
</tr>

";





}






print"
</table>



<br>

<table align='center' width='1000' cellpadding='0' cellspacing='0'>
<tr>
<td width='720'> </td>
<td align='center' width='280'> 


<table align='center' width='280' cellpadding='3' cellspacing='1' bgcolor='black'>

<tr bgcolor='white'>
 <td width='176' height='25' bgcolor='' align='left'> <font face='arial' size='4'> Total   </font> </td> 
 <td width='93' align='right'> <font face='arial' size='4'>  $sub_total &nbsp; </font> </td> 
</tr>


<tr bgcolor='white'>
 <td width='' height='25' bgcolor='' align='left'> <font face='arial' size='4'> Discount   </font> </td> 
 <td width='' align='right'> <font face='arial' size='4'>  $less &nbsp; </font> </td> 
</tr>


<tr bgcolor='white'>
 <td width='' height='25' bgcolor='' align='left'> <font face='arial' size='4'> Sub Total   </font> </td> 
 <td width='' align='right'> <font face='arial' size='4'>  $stotal &nbsp; </font> </td> 
</tr>


<tr bgcolor='white'>
 <td width='' height='25' bgcolor='' align='left'> <font face='arial' size='4'> Payment Amount  </font> </td> 
 <td width='' align='right'> <font face='arial' size='4'>  $payment &nbsp; </font> </td> 
</tr>


<tr bgcolor='white'>
 <td width='' height='25' bgcolor='' align='left'> <font face='arial' size='4'> Due  </font> </td> 
 <td width='' align='right'> <font face='arial' size='4'>  $due &nbsp; </font> </td> 
</tr>
</table>


</td>
</tr>
</table>

";








print"

<table align='center' width='1000' cellpadding='0' cellspacing='0'>
<tr>
<td width='20' height='40' align='left'> &nbsp; <font face='arial' size='4'> <b> Note: </b> $comments </font>  </td> 
</tr>
</table>







<table align='center' width='1000' cellpadding='0' cellspacing='0'>
<tr>
<td width='20' height='10' align='left'>  </td> 
</tr>
</table>


<table align='center' width='1000' cellpadding='0' cellspacing='0'>
<tr>
<td width='20' height='0' align='left'> &nbsp;<font face='arial' size='4'>
";
include_once('convert4m.php');
print"
Taka Only.
 </font> </td> 
</tr>
</table>






<table align='center' width='1000' cellpadding='0' cellspacing='0'>
<tr>
<td width='20' height='10' align='left'>  </td> 
</tr>
</table>

</td>
</tr>
</table>
";





include_once('sign.php');


print"
<br>
</td> 
</tr>
</table>


</td>
</tr>
</table>


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