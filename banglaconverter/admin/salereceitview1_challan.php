<?php
include_once('dbconnection.php');

session_start();


$s=trim($_POST['s']);



$sql="SELECT * FROM `salememo_challan` WHERE user_id='$s' ";


$result=mysql_query($sql);
$arra=mysql_fetch_array($result);

$memo_id=$arra[1];

$money_id=$memo_id;

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
$contact_name=$arra[35];


$contact_name1=$arra[39];
$mobile_contact1=$arra[40];




//$contact_new=$arra[35];



$due=$arra[8];
$dat=$arra[9];
$mon=$arra[10];
$yer=$arra[11];
$t4=$arra[13];
$less=$arra[6];
$paymenttype=$arra[15];
$mobile=$arra[18];
$address=$arra[38];

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

<title> Challan  </title>

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
<td width='130' align='center' bgcolor='$set_bg_color'  height='40' id='kh'> <b> Challan  </b>  </td>
</tr>
<tr> <td align='center' height='10'>  </td></tr>
</table>









<table align='center' width='990' cellpadding='0' cellspacing='1' bgcolor='black'>
<tr>
<td bgcolor='white' align='center'>

<table align='center' width='1000' cellpadding='0' cellspacing='0' bgcolor='black'>
<tr bgcolor='white'> 
<td align='left' height='30' bgcolor='white' width='160'> 
&nbsp; <font face='arial' size='4'> <b> Challan No </b>     </font> 
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
&nbsp; <font face='arial' size='4'>  <b> Customer Name  </b>   </font>  </td>

<td align='left' height='30' bgcolor='white' width='600'> 
&nbsp; <font face='arial' size='4'>  <b> :   </b>   $suppliern </font>  </td>



";



print"
<td width='90' align='left'>
<font face='arial' size='4'>  <b> Receiver  </b> 
</td>

<td width='150' align='left'>
<font face='arial' size='4'> <b> : </b> $contact_name1   </font> 
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

<td align='left' height='30' bgcolor='white' width='620'> &nbsp;	 <font face='arial' size='4'> <b> : </b>  $address   
</td>


<td width='70' align='left'>
<font face='arial' size='4'> <b>  Mobile  </b>  
</td>

<td width='150' align='left'>
<font face='arial' size='4'> <b> : </b>  $mobile_contact1    </font> 
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
<font face='arial' size='4'>   <b> </b>   </font> 
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
&nbsp; <font face='arial' size='4'>  <b> Challan No : </b> $money_id  </font>  </td>


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
<td align='left' height='30' bgcolor='white' width='500'> &nbsp;	 <font face='arial' size='4'> <b> Customer Name : </b>  $suppliern  

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
<table align='center' width='$set_wd' cellpadding='0' cellspacing='0'>
<tr> <td align='center' height='10'>  </td></tr>
<tr> 
<td width='130' align='center' bgcolor='$set_bg_color' height='40' id='kh'>  <b> Challan  </b> </font> </td>

</tr>
<tr> <td align='center' height='10'>  </td></tr>
</table>



<table align='center' width='1000' cellpadding='0' cellspacing='0' bgcolor='black'>
<tr> 
<td align='left' height='30' bgcolor='white' width='500'> 

	 <font face='arial' size='4'> <b> Challan No : </b> $money_id   </font>  </td>


<td width='265' bgcolor='white'>  </td>
<td width='125' align='left' bgcolor='white'> <font face='arial' size='4'> &nbsp;&nbsp; <b> Date </b>   </font> </td>
<td width='5' bgcolor='white'>  </td>
<td width='110' align='left' bgcolor='white'> <font face='arial' size='4'>  $dat-$mon-$yer  &nbsp; </font>  </td>

</tr>
</table>

<table align='center' width='1000' cellpadding='0' cellspacing='0' bgcolor=''>
<tr> <td align='left' height='1' bgcolor=''>   </td></tr>
</table>






<table align='center' width='1000' cellpadding='0' cellspacing='0' bgcolor='black'>
<tr> 
<td align='left' height='30' bgcolor='white' width='500'> 

	 <font face='arial' size='4'> <b> Customer Name : </b>  $suppliern   </font>  </td>


<td width='265' bgcolor='white'>  </td>
<td width='125' align='left' bgcolor='white'> <font face='arial' size='4'> &nbsp;&nbsp; <b> Created By </b>   </font> </td>
<td width='5' bgcolor='white'>  </td>
<td width='110' align='left' bgcolor='white'> <font face='arial' size='4'>  $u_namee  &nbsp; </font>  </td>

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
<tr> <td align='left' height='30' width='250' bgcolor='white'> 	 <font face='arial' size='4'> <b> Contact Person : </b>  $contact_name  </font>  </td>
<td width='10' bgcolor='white'>  </td>
<td width='105' align='right' bgcolor='white'> <font face='arial' size='4'> <b>  &nbsp;  </b>    </font> </td>
<td width='5' bgcolor='white'>  </td>
<td width='110' align='left' bgcolor='white'> <font face='arial' size='4'>  $contact_name_old    </font>  </td>
</tr>
</table>

";

}



print"

<table align='center' width='1000' cellpadding='0' cellspacing='0' bgcolor=''>
<tr> <td align='left' height='1' bgcolor=''>   </td></tr>
</table>



<table align='center' width='1000' cellpadding='0' cellspacing='0' bgcolor='black'>
<tr> <td align='left' height='30' bgcolor='white'>  <font face='arial' size='4'> <b> Address :  $address &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  Mobile : $mobile </b>  </font>  </td></tr>
</table>
";

*/




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
<table align='center' width='1000' cellpadding='0' cellspacing='0'>
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
 <td width='30' height='25' align='center'> <font face='arial' size='4'> <b> SL. </b> </font> </td> 
 <td width='300' align='center'><font face='arial' size='4'> <b>  Product Name </b> </font> </td>
 ";
 
 
 include_once('mm.php');
 
 print"
 <td width='100' align='center'><font face='arial' size='4'> <b> Qty. </b> </font> </td> 
 
 
 <td width='100' align='center'><font face='arial' size='4'> <b>  Unit  </b> </font> </td>
 
 ";
 
 
 
 
 print"
 
 

</tr>
";




$result = mysql_query("SELECT * FROM `saleproduct_challan` where money_id='$memo_id' ORDER BY `user_id` ASC  ");

while ($a_row = mysql_fetch_row($result)) {

	foreach ($a_row as $field) {
		
	}


$w++;


$comm=$a_row[25];
$total3=$a_row[6]*$a_row[7];




print"
<tr bgcolor='white'>
 <td width='30' align='center' height='25'> <font face='arial' size='4'>   $w   </font> </td> 
 <td width='300' align='left'><font face='arial' size='4'>  
";


print"
 
 $a_row[5]
 
 $a_row[39]
 
$a_row[34]  
 ";
  

 

 print"
 </font> </td>
 

";

if($cwp1==1)
{
print"
 <td width='' align='center'><font face='arial' size='4'>  $a_row[35]    </font> </td> 
 ";
}

if($cwp2==1)
{
 print"
 <td width='' align='center'><font face='arial' size='4'>  $a_row[36]    </font> </td> 
 ";
}

if($cwp3==1)
{
 print"
 <td width='' align='center'><font face='arial' size='4'>  $a_row[37]      </font> </td> 
 ";
}

if($cwp4==1)
{
 print"
 <td width='' align='center'><font face='arial' size='4'>   $a_row[38]   </font> </td> 
";
}

 
 
 
 
print" 
 <td width='' align='center'><font face='arial' size='4'>   $a_row[6]   </font> </td> 
 <td width='' align='center'><font face='arial' size='4'>     $a_row[29]  </font> </td> 

 ";
 
 
 
print"
 </tr>

";




$tqq=$tqq+$a_row[6];







}






print"
<tr bgcolor='white'>
 <td width='30' align='center' height='25'> <font face='arial' size='4'>      </font> </td> 
 <td width='300' align='left'><font face='arial' size='4'>  Total
";


print"
 </font> </td>
"; 
 
 
if($cwp1==1)
{
print"
 <td width='' align='center'><font face='arial' size='4'>      </font> </td> 
";
}

if($cwp2==1)
{
print"
 <td width='' align='center'><font face='arial' size='4'>     </font> </td> 
";
}


if($cwp3==1)
{
print"
 <td width='' align='center'><font face='arial' size='4'>      </font> </td> 
";
}


if($cwp4==1)
{
print"
 <td width='' align='center'><font face='arial' size='4'>     </font> </td> 
";
}


 
 
 
 
 print"
 <td width='' align='center'><font face='arial' size='4'>   $tqq   </font> </td> 
 <td width='' align='center'><font face='arial' size='4'>      </font> </td> 

 ";
 
 
 
print"
 </tr>
";









print"
</table>



<table align='center' width='1000' cellpadding='0' cellspacing='0'>

";

/*
if($discount_less>0)
{
print"
<tr>
 <td width='504' height='25' bgcolor='' align='right'> <font face='arial' size='4'>  Discount:   </font> </td> 
 <td width='96' align='center'> <font face='arial' size='4'> &nbsp;  $discount_less .00   </font> </td> 
</tr>



<tr>
 <td width='504' height='25' bgcolor='' align='right'> <font face='arial' size='4'>  Total:   </font> </td> 
 <td width='96' align='center'> <font face='arial' size='4'> &nbsp;  $subtotal_last .00   </font> </td> 
</tr>

";
}


if($less>0)
{
print"

<tr>
 <td width='504' height='25' bgcolor='' align='right'> <font face='arial' size='4'>  Transport / Labour Cost :   </font> </td> 
 <td width='96' align='center'> <font face='arial' size='4'> &nbsp;  $less .00  </font> </td> 
</tr>


<tr>
 <td width='504' height='25' bgcolor='' align='right'> <font face='arial' size='4'>  Sub Total:   </font> </td> 
 <td width='96' align='center'> <font face='arial' size='4'> &nbsp;  $stotal .00   </font> </td> 
</tr>

";

}

*/

/*
if($payment>0)
{
print"

<tr>
 <td width='504' height='25' bgcolor='' align='right'> <font face='arial' size='4'> <b> Payment: </b>  </font> </td> 
 <td width='96' align='center'> <font face='arial' size='4'> &nbsp; <b> $payment </b> </font> </td> 
</tr>
";
}

*/


/*

if($due>0)
{
print"
<tr>
 <td width='504' height='25' bgcolor='' align='right'> <font face='arial' size='4'> <b> Due: </b> </font> </td> 
 <td width='96' align='center'> <font face='arial' size='4'> &nbsp; <b> $due </b> </font> </td> 
</tr>
";
}
*/







print"
</table>








<table align='center' width='1000' cellpadding='0' cellspacing='0'>
<tr>
<td width='20' height='10' align='left'>  </td> 
</tr>
</table>
";


$pui=$balance+$stotal;
$new_pui=$pui-$payment;



/* 

print"
<table align='center' width='1000' cellpadding='0' cellspacing='0'>
<tr>
<td width='10'> </td>
<td width='300' height='0' align='center'>  
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
<td align='right' width='100'> <font size='4'> <b> $stotal </b> </font> </td>
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




<td width='60' height='10' align='left'>  </td> 

</tr>
</table>
";

*/


print"
<table align='center' width='1000' cellpadding='0' cellspacing='0'>

<tr> 

<td height='8'> </td>

</tr>

<tr>
<td width='20' height='0' align='left'> <font face='arial' size='4'> &nbsp;&nbsp; <b>  Note :   </b> $comments </font> </td> 
</tr>
</table>

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
//include_once('convert4.php');
print"
</b>
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