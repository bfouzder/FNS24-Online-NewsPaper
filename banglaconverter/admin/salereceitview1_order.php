<?php
include_once('dbconnection.php');

session_start();


$s=trim($_POST['s']);





$sql="SELECT * FROM `salememo_order` WHERE user_id='$s' ";

$result=mysql_query($sql);
$arra=mysql_fetch_array($result);

$memo_id=$arra[1];
$money_id=$memo_id;
$service=$arra[44];
$dcl=$arra[45];
$tin=$arra[46];

$adjust=$arra[47];




$sss_id=$arra[2];
$comments=$arra[14];
$suppliern=$arra[3];
$supplier_id=$arra[0];
$sub_total=$arra[5];
$payment=$arra[7];
$u_namee=$arra[22];
$balance=$arra[28];
$po_no=$arra[29];
$d_no=$arra[30];
$order_no=$arra[33];
$transport_name=$arra[34];
$contact_name=$arra[50];
$mobile_contact=$arra[51];

$project_namen=$arra[36];
$f_dis=$arra[42];


$payment=$payment-$adjust;


$vat=$arra[38];
$tax2=$arra[39];


$vat_tk=$arra[40];
$tax2_tk=$arra[41];




//$contact_new=$arra[35];



$due=$arra[8];
$dat=$arra[9];
$mon=$arra[10];
$yer=$arra[11];
$t4=$arra[13];
$less=$arra[6];
$paymenttype=$arra[15];
$mobile=$arra[18];
$address=$arra[43];


$discount_less=$arra[27];

$subtotal_last=$arra[5]-$discount_less;





$stotal=$subtotal_last+$less;



$stotal2=$stotal+$vat_tk+$tax2_tk;



//include_once('taxx.php');

$sty=$arra[16];


//print"$sty";


$stotal=$stotal+$sty;



//print" $sub_total - $payment - $less - $due  ";










//print" <br> $adat - $dat-$mon- $yer - $money_id";

//print" $suppliern - $address - Mobile- $mobile  ";



/*
$sql="SELECT * FROM `customer` WHERE user_id='$sss_id' ";
$result=mysql_query($sql);
$arras=mysql_fetch_array($result);
$address=$arras[5];
$mobile=$arras[3];

*/











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
<table align='left' width='1000' cellpadding='0' cellspacing='0'>

<tr> 
<td width='1000' align='center'> 
";




include_once('address.php');





print"
<table align='center' width='$set_wd' cellpadding='0' cellspacing='0'>
<tr> <td align='center' height='10'>  </td></tr>
<tr> 
<td width='130' align='center' bgcolor='$set_bg_color'  height='40' id='kh'>

 <b> Sales Order  </b>  </td>

</tr>
<tr> <td align='center' height='10'>  </td></tr>
</table>










<table align='center' width='990' cellpadding='0' cellspacing='1' bgcolor='black'>
<tr>
<td bgcolor='white' align='center'>

<table align='center' width='1000' cellpadding='0' cellspacing='0' bgcolor='black'>
<tr bgcolor='white'> 
<td align='left' height='30' bgcolor='white' width='160'> 
&nbsp; <font face='arial' size='4'> <b> Order No </b>     </font> 
</td>

<td align='left' height='30' bgcolor='white' width='620'> 
&nbsp; <font face='arial' size='4'> <b>  : </b>  INV-$money_id   </font> 
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
&nbsp; <font face='arial' size='4'>  <b> Customer Name  </b>   </font>  </td>

<td align='left' height='30' bgcolor='white' width='620'> 
&nbsp; <font face='arial' size='4'>  <b> :   </b>   $suppliern </font>  </td>



";



print"
<td width='70' align='left'>
<font face='arial' size='4'>  <b> PO No </b> 
</td>

<td width='150' align='left'>
<font face='arial' size='4'> <b> : </b> $order_no  </font> 
</td>
";


/*

print"
<td width='350' align='right'>
<font face='arial' size='4'> <b> Created By : </b>
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

<td align='left' height='30' bgcolor='white' width='550'> &nbsp;	 <font face='arial' size='4'> <b> : </b>  $address   
</td>


<td width='140' align='left'>
<font face='arial' size='4'> <b>  Sales Person </b>  
</td>

<td width='150' align='left'>
<font face='arial' size='4'> <b> : </b> $contact_name   </font> 
</td>



</tr>
</table>
";



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
<font face='arial' size='4'> <b>  Mobile  </b>  
</td>

<td width='150' align='left'>
<font face='arial' size='4'>   <b> : </b> $mobile_contact </font> 
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
<table align='center' width='1000' cellpadding='0' cellspacing='0' bgcolor='black'>
<tr> <td align='left' height='30' bgcolor='white'> 




print"
 <font face='arial' szie='3'>
 <b> Transport Name:  $transport_name </b>
</font>

";




print" </td></tr>
";



print"
</table>
";

*/





/*
print"
<table align='center' width='800' cellpadding='0' cellspacing='0'>
<tr> <td align='center' height='10'>  </td></tr>

<tr> 
<td width='100' height='0'> </td> 
<td align='left' height='10' width='90'> 
<font face='arial' size='4'> Cust. Name 
</td>
<td align='left' height='10' width='420'> 
<font face='arial' size='4'>:  $suppliern </font>  
</td> 
<td width='200' align='left'>  <a href=\"sales.php?action=removee&i5d=$arrp[0]\"> <font face='arial' size='4' color='black'> Memo no: $money_id </font> </a> 
</td> 
</tr>

<tr> <td height='5'> </td> </tr>

<tr> 
<td width='100' height='0'> </td> 
<td align='left' height='10' width='90'> 
<font face='arial' size='4'> Customer ID	
</td>
<td align='left' height='10' width='420'> 
<font face='arial' size='4'>:  $supplier_id </font>  
</td> 
<td width='200' align='left'>  
</td> 
</tr>




<tr> <td height='5'> </td> </tr>

<tr> 
<td width='100' height='0'> </td> 
<td align='left' height='10' width='90'> 
<font face='arial' size='4'> Address
</td>
<td align='left' height='10' width='420'> 
<font face='arial' size='4'> :  $address , $mobile </font>  
</td> 
<td width='200' align='left'>  
</td> 
</tr>




<tr> <td height='5'> </td> </tr>

<tr> 
<td width='100' height='0'> </td> 
<td align='left' height='10' width='90'> 
<font face='arial' size='4'> Date
</td>
<td align='left' height='10' width='420'> 
<font face='arial' size='4'>:  $dat-$mon-$yer </font>  
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
<td width='20' height='13'align='center'> <font face='arial' size='4'></font> </td> 
</tr>
</table>


<table align='center' width='1000' cellpadding='0' cellspacing='1' bgcolor='black'>
<tr>
<td bgcolor='white'>


<table align='center' width='1000' cellpadding='0' cellspacing='0'>
<tr>
<td valign='top' height='$set_height'>


<table align='center' width='1000' cellpadding='3' cellspacing='1' bgcolor='black'>

<tr bgcolor='white'>
 <td width='30' height='25' align='center'> <font face='arial' size='4'> <b> Sl. </b> </font> </td> 
 <td width='300' align='center'><font face='arial' size='4'> <b>  Product Name </b> </font> </td>
 ";


 if($cwp1==1)
{
print"
 <td width='70' align='center'><font face='arial' size='4'> <b> $cwp11  </b> </font> </td> 
";
}

if($cwp2==1)
{
print"
 <td width='70' align='center'><font face='arial' size='4'> <b> $cwp22 </b> </font> </td> 
";
}

if($cwp3==1)
{
print"
 <td width='70' align='center'><font face='arial' size='4'> <b> $cwp33 </b> </font> </td> 
";
}

if($cwp4==1)
{
print"
 <td width='70' align='center'><font face='arial' size='4'> <b> $cwp44 </b> </font> </td> 
";
}


print" 
 <td width='70' align='center'><font face='arial' size='4'> <b> Qty. </b> </font> </td> 

 
<td width='50' align='center'><font face='arial' size='4'> <b> Unit  </b> </font> </td> 
 
 ";
 
 if($set_wa==1)
 {
 print"
<td width='100' align='center'><font face='arial' size='4'> <b> Warranty </b> </font> </td> 
 ";
 }
 
 print"
 <td width='100' align='center'><font face='arial' size='4'> <b>  Rate </b> </font> </td>
";

 if($set_discount==1)
{
print"

 
 <td width='100' align='center'><font face='arial' size='4'> <b>  Discount  </b> </font> </td>
 ";
 
}
 
 
 

 /*
 <td width='100' align='center'><font face='arial' size='4'> <b> Commission </b> </font> </td> 
 */
 
 
 print"
 
 <td width='100' align='right'><font face='arial' size='4'> <b> Total &nbsp; </b> </font> </td> 

</tr>


";




$result = mysql_query("SELECT * FROM `saleproduct_order` where money_id='$memo_id' ORDER BY `user_id` ASC ");




while ($a_row = mysql_fetch_row($result)) {

	foreach ($a_row as $field) {
		
	}


$w++;


$comm=$a_row[25];
$total3=$a_row[6]*$a_row[7];

$pto++;


	

print"
<tr bgcolor='white'>
 <td width='' align='center' height='25'> <font face='arial' size='4'>   $w   </font> </td> 
 <td width='' align='left'><font face='arial' size='4'> &nbsp;  $a_row[5] $a_row[34]  $a_row_test[19]    </font> </td>
";


if($cwp1==1)
{
print"
<td width='' align='center'><font face='arial' size='4'>  $a_row[40]    </font> </td> 
 ";
}


if($cwp2==1)
{
print"
 <td width='' align='center'><font face='arial' size='4'>  $a_row[37]    </font> </td> 
 ";
}
 
 
 
if($cwp3==1)
{
 print"
 <td width='' align='center'><font face='arial' size='4'>  $a_row[38]      </font> </td> 
";

}



if($cwp4==1)
{
print"
 <td width='' align='center'><font face='arial' size='4'>   $a_row[39]   </font> </td> 
";
}


print"
 <td width='' align='center'><font face='arial' size='4'>   $a_row[6]  </font> </td> 


 <td width='' align='center'><font face='arial' size='4'>   $a_row[29]   </font> </td> 
";



 if($set_wa==1)
 {

print"
 <td width='' align='center'><font face='arial' size='4'>   $a_row[36]   </font> </td> 
";

 }



$arow7= number_format($a_row[7], 2);


print"

 <td width='' align='right'><font face='arial' size='4'>     $arow7 &nbsp; </font> </td> 
";

 if($set_discount==1)
{

if($a_row[35]=="")
{
print"
<td width='' align='left'><font face='arial' size='4'>     $comm    </font> </td> 
";
}
else
{
print"
<td width='' align='left'><font face='arial' size='4'>     $a_row[35] = $comm    </font> </td> 
";
	
}
 


}

 

$arow8= number_format($a_row[8], 2);

 
print"
 
 <td width='' align='right'><font face='arial' size='4'> $arow8   &nbsp;</font> </td> 
</tr>

";

}




$sub_total_f= number_format($sub_total, 2);

$discount_less_f= number_format($discount_less, 2);

$subtotal_last_f= number_format($subtotal_last, 2);
$less_f= number_format($less, 2);
$stotal_f= number_format($stotal, 2);


$vat_tk_f= number_format($vat_tk, 2);
$tax2_tk_f= number_format($tax2_tk, 2);
$stotal2_f= number_format($stotal2, 2);

$payment_f= number_format($payment, 2);
$adjust_f= number_format($adjust, 2);
$due_f= number_format($due, 2);



print"
</table>


<table align='center' width='1000' cellpadding='0' cellspacing='0'>

<tr>
 <td width='504' height='25' bgcolor='' align='right'> <font face='arial' size='4'> <b> Total : </b>  </font> </td> 
 <td width='96' align='right'> &nbsp;  <font face='arial' size='4'> <b>  $sub_total_f  &nbsp;&nbsp; </b> </font> </td> 
</tr>

";


if($discount_less>0)
{
print"
<tr>
";

if($f_dis=="")
{
print"
<td width='504' height='25' bgcolor='' align='right'> <font face='arial' size='4'> <b> Discount :  </b> </font> </td> 
";

}
else
{
	
print"
<td width='504' height='25' bgcolor='' align='right'> <font face='arial' size='4'> <b> Discount $f_dis :  </b> </font> </td> 
";
	
}


print"
 <td width='96' align='right'> <font face='arial' size='4'> <b> &nbsp;  $discount_less_f    &nbsp;&nbsp;  </b> </font> </td> 
</tr>



<tr>
 <td width='504' height='25' bgcolor='' align='right'> <font face='arial' size='4'> <b>  Total :  </b>  </font> </td> 
 <td width='96' align='right'> <font face='arial' size='4'> &nbsp; <b>  $subtotal_last_f    &nbsp;&nbsp; </b> </font> </td> 
</tr>

";
}



if($service>0)
{
print"

<tr>
 <td width='504' height='25' bgcolor='' align='right'> <font face='arial' size='4'>  <b>  Installation Charge :  </a>   </font> </td> 
 <td width='96' align='right'> <font face='arial' size='4'> &nbsp; <b> $service  &nbsp;&nbsp; </b>  </font> </td> 
</tr>
";
}




if($less>0)
{
print"

<tr>
 <td width='504' height='25' bgcolor='' align='right'> <font face='arial' size='4'>  <b>  Transport / Labour Cost :  </a>   </font> </td> 
 <td width='96' align='right'> <font face='arial' size='4'> &nbsp; <b> $less_f  &nbsp;&nbsp; </b>  </font> </td> 
</tr>
";
}


if($less>0 || $service>0)
{
print"
<tr>
 <td width='504' height='25' bgcolor='' align='right'> <font face='arial' size='4'> <b>  Sub Total :   </b></font> </td> 
 <td width='96' align='right'> <font face='arial' size='4'> &nbsp; <b> $stotal_f  &nbsp;&nbsp; </b>   </font> </td> 
</tr>

";

}









if($vat!="")
{
print"

<tr>
 <td width='504' height='25' bgcolor='' align='right'> <font face='arial' size='4'> <b>  Vat $vat % :   </b></font> </td> 
 <td width='96' align='right'> <font face='arial' size='4'>  <b> $vat_tk_f &nbsp;&nbsp; </b>   </font> </td> 
</tr>


";
}

if($tax2!="")
{
print"
<tr>
 <td width='504' height='25' bgcolor='' align='right'> <font face='arial' size='4'> <b>  Tax $tax2 %  :   </b></font> </td> 
 <td width='96' align='right'> <font face='arial' size='4'>  <b> $tax2_tk_f &nbsp;&nbsp; </b>   </font> </td> 
</tr>
";	

}



if($vat!="" || $tax2!="")
{

print"
<tr>
 <td width='504' height='25' bgcolor='' align='right'> <font face='arial' size='4'> <b>  Subtotal :   </b></font> </td> 
 <td width='96' align='right'> <font face='arial' size='4'>  <b> $stotal2_f &nbsp;&nbsp; </b>   </font> </td> 
</tr>
";	
}






if($payment>0)
{
print"

<tr>
 <td width='504' height='25' bgcolor='' align='right'> <font face='arial' size='4'> <b> Payment : </b>  </font> </td> 
 <td width='96' align='right'> <font face='arial' size='4'> &nbsp; <b> $payment_f  &nbsp;&nbsp; </b> </font> </td> 
</tr>
";
}



if($adjust>0)
{
print"

<tr>
 <td width='504' height='25' bgcolor='' align='right'> <font face='arial' size='4'> <b> Adjust Amount : </b>  </font> </td> 
 <td width='96' align='right'> <font face='arial' size='4'> &nbsp; <b> $adjust_f  &nbsp;&nbsp; </b> </font> </td> 
</tr>
";
}






if($due>0 || $due==0 )
{



print"
<tr>
 <td width='504' height='' bgcolor='' align='right'> <br> <font face='arial' size='4'>&nbsp; <b> Due : </b> </font> </td> 
 <td width='96' align='right'> <hr> <font face='arial' size='4'>   <b> $due_f  &nbsp;&nbsp; </b> </font> </hr> </td> 
</tr>
";
}








print"
</table>








<table align='center' width='1000' cellpadding='0' cellspacing='0'>
<tr>
<td width='20' height='10' align='left'>  </td> 
</tr>
</table>
";


$pui=$balance+$stotal2;
$new_pui=$pui-$payment;




if($set_p==1)
{
print"
<table align='center' width='1000' cellpadding='0' cellspacing='0'>
<tr>
<td width='300' height='0' align='left'>  
<table align='center' width='300' cellpadding='0' cellspacing='1' bgcolor='black'>
<tr>
<td align='center'>
<table align='center' width='300' cellpadding='3' cellspacing='0' bgcolor='black'>

<tr bgcolor='white'>
<td align='left' width='200'> <font size='4'> <b> Previous dues: </b> </font> </td>
<td align='right' width='100'> <font size='4'> <b> $balance </b> </font> </td>
</tr>



<tr bgcolor='white'>
<td align='left' width='200'> <font size='4'> <b> Sales: </b> </font> </td>
<td align='right' width='100'> <font size='4'> <b> $stotal2 </b> </font> </td>
</tr>

<tr bgcolor='white'>
<td align='left' width='200'> <font size='4'> <b> Total: </b> </font> </td>
<td align='right' width='100'> <font size='4'> <b> $pui </b> </font> </td>
</tr>

<tr bgcolor='white'>
<td align='left' width='200'> <font size='4'> <b> Collected: </b> </font> </td>
<td align='right' width='100'> <font size='4'> <b> $payment </b> </font> </td>
</tr>

<tr bgcolor='white'>
<td align='left' width='1'>............................................... </td>
<td align='right' width='1'>..........................</td>
</tr>


<tr bgcolor='white'>
<td align='left' width='200'> <font size='4'> <b> Net Outstanding: </b> </font> </td>
<td align='right' width='100'> <font size='4'> <b> $new_pui </b> </font> </td>
</tr>




</table>
</td>


</tr>
</table>
</td> 




<td width='360' height='10' align='left'>  </td> 

</tr>
</table>
";

}



print"
<br>


<table align='center' width='1000' cellpadding='0' cellspacing='0'>
<tr>
<td width='20' height='10' align='left'>  </td> 
</tr>
</table>


<table align='center' width='1000' cellpadding='0' cellspacing='0'>
<tr>
<td width='20' height='0' align='left'> <font face='arial' size='4'> &nbsp;&nbsp;
<b>
";

if($set_p==1)
{
include_once('convert4.php');
}
else
{
include_once('convert45_sal.php');
}

print"

Taka Only.
</b>
 </font> </td> 
</tr>
</table>

";




print"
<table align='center' width='1000' cellpadding='0' cellspacing='0'>
<tr> 
<td height='8'> </td>
</tr>
<tr>
<td width='20' height='0' align='left'> <font face='arial' size='4'> &nbsp;&nbsp; <b>  Note:  $comments </b> </font> </td> 
</tr>
</table>
";




print"
<table align='center' width='1000' cellpadding='0' cellspacing='0'>
<tr>
<td width='10' height='10' align='left'>  </td> 
</tr>
</table>
";


if($set_bill_ledger==1)
{
print"
<table align='left' width='650' cellpadding='3' cellspacing='0' bgcolor=''>
<tr>
<td width='5'> </td>

<td align='left'>

<table align='left' width='600' cellpadding='3' cellspacing='1' bgcolor='black'>
<tr bgcolor='white'>
<td width='20' height='10' align='left'> <font size='4' face='arial'> Date  </font> </td> 

<td width='20' height='10' align='left'> <font size='4' face='arial'> Note  </font> </td> 


<td width='20' height='10' align='left'> <font size='4' face='arial'> Total  </font> </td> 


<td width='20' height='10' align='left'> <font size='4' face='arial'> Payment </font> </td> 
<td width='20' height='10' align='left'> <font size='4' face='arial'> Due </font> </td> 
</tr>

";





//$result = mysql_query("SELECT * FROM `customer_laser` where  money_id='$money_id'  ORDER BY `adat` ASC ");


$result = mysql_query("SELECT * FROM `customer_laser` where  money_id='$money_id'  ORDER BY `user_id` ASC ");



while ($a_row = mysql_fetch_row($result)) {

	foreach ($a_row as $field) {
		
	}




/*

print"
<tr bgcolor='white'>
<td align='center' height='30' width=''>  <font face='arial' size='2' color=''> $a_row[5]-$a_row[6]-$a_row[7]</font> </td> 


<td align='center' height='30' width='80'>  <font face='arial' size='2' color=''> $a_row[8] </font> </td>
";

if($supplier!="")
{
$a_row[4]=str_replace("$suppliern","","$a_row[4]");
}

print"
<td align='left' height='30' width=''>  <font face='arial' size='2' color=''>  $a_row[4] </font> </td> 
";

*/







if($a_row[15]==1)
{


if($a_row[12]!="" || $a_row[13]!="" || $a_row[14]!="")
{
	

$final_com=$a_row[14];

$final_com_sum=$final_com_sum+$final_com;

/*

print"
<td align='center' height='' width='50'>  <font face='arial' size='2' color=''>  </font> </td> 

<td align='center' height='' width='50'>  <font face='arial' size='2' color=''> $final_com  </font> </td>

<td align='center' height='' width='50'>  <font face='arial' size='2' color=''>    </font> </td>

<td align='center' height='' width='50'>  <font face='arial' size='2' color=''>  </font> </td>
";

*/

}
else
{

/*
print"
<td align='center' height='' width=''>  <font face='arial' size='2' color=''>  </font> </td> 

<td align='center' height='' width=''>  <font face='arial' size='2' color=''>  </font> </td>

<td align='center' height='' width=''>  <font face='arial' size='2' color=''>  </font> </td>

<td align='center' height='' width=''>  <font face='arial' size='2' color=''> </font> </td>
";	
	
*/


}





}

else
{

if($a_row[12]!="" || $a_row[13]!="")
{
	

$t55=$a_row[3]-$a_row[12];	
$t5=$t55+$a_row[13];


$ft5=$ft5+$t5;
$fcom=$fcom+$a_row[13];
$ft55=$ft55+$t55;
$fship=$fship+$a_row[12];



$t5_final=$t5+$a_row[14];
$final_com=$a_row[13]+$a_row[14];
$t55_final=$t5_final-$final_com;




$t5_final_sum=$t5_final_sum+$t5_final;
$final_com_sum=$final_com_sum+$final_com;
$t55_final_sum=$t55_final_sum+$t55_final;

/*
print"
<td align='center' height='' width='50'>  <font face='arial' size='2' color=''>  $t5_final </font> </td> 

<td align='center' height='' width='50'>  <font face='arial' size='2' color=''> $final_com  </font> </td>

<td align='center' height='' width='50'>  <font face='arial' size='2' color=''>  $t55_final  </font> </td>

<td align='center' height='' width='50'>  <font face='arial' size='2' color=''> $a_row[12] </font> </td>
";
*/

}
else
{

/*
print"
<td align='center' height='' width=''>  <font face='arial' size='2' color=''>  </font> </td> 

<td align='center' height='' width=''>  <font face='arial' size='2' color=''>  </font> </td>

<td align='center' height='' width=''>  <font face='arial' size='2' color=''>  </font> </td>

<td align='center' height='' width=''>  <font face='arial' size='2' color=''> </font> </td>
";	
*/

	
}






}







$dqr=0;


if($a_row[2]==2)
{

/*
print"
<td width='' align='center'>              <font face='arial' size='2'> $a_row[3]  </font> </td>
";

print"
<td width='' align='center'>              <font face='arial' size='2'> </font> </td>
";

print"
<td width='' align='center'>              <font face='arial' size='2'> </font> </td>
";
*/





$dr=$dr+$a_row[3];


$dqr=$a_row[3];


}


if($a_row[2]==1)
{


/*
print"
<td width='80' align='center'>              <font face='arial' size='2'> </font> </td>
";

print"
<td width='' align='center'>              <font face='arial' size='2'> </font> </td>
";

print"
<td width='' align='center'>              <font face='arial' size='2'>  $a_row[3] </font> </td>
";
*/


$cr=$cr+$a_row[3];

$dcr=$a_row[3];

}



$balance=$cr-$dr;


print"
<tr bgcolor='white'>
<td width='20' height='10' align='left'> <font size='4' face='arial'> $a_row[5]-$a_row[6]-$a_row[7]  </font> </td> 


<td width='20' height='10' align='left'> <font size='4' face='arial'> $a_row[4] </font> </td> 

";

if($a_row[2]==2)
{

print"

<td>  </td>

<td width='20' height='10' align='left'> <font size='4' face='arial'> $dqr  </font> </td>


";
 
}

if($a_row[2]==1)

{

print"

<td width='20' height='10' align='left'> <font size='4' face='arial'> $dcr </font> </td>

<td> </td>
";
}

print"

<td width='20' height='10' align='left'> <font size='4' face='arial'> $balance  </font> </td> 


</tr>
";




/*
print"
<td width='' align='center'>              <font face='arial' size='2'> $b4alance </font> </td>
<td width='100' align='center'>              <font face='arial' size='2'> $balance   </font> </td>
";
*/





}




print"
</tr>
";

print"

</table>

</td>
</tr>
</table>

";

}









print"
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