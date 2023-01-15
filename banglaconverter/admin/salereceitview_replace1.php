<?php
include_once('dbconnection.php');

session_start();


$s=trim($_POST['s']);



$sql="SELECT * FROM `salememo_replace` WHERE user_id='$s' ";

$result=mysql_query($sql);
$arra=mysql_fetch_array($result);

$memo_id=$arra[1];

$money_id=$memo_id;

$service=$arra[44];


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
$project_namen=$arra[36];
$f_dis=$arra[42];





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

<title> Welcome to Replacement  </title>

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

 <b> Replacement  </b>  </td>

</tr>
<tr> <td align='center' height='10'>  </td></tr>
</table>




<table align='center' width='990' cellpadding='0' cellspacing='1' bgcolor='black'>
<tr>
<td bgcolor='white' align='center'>


<table align='center' width='1000' cellpadding='0' cellspacing='0' bgcolor='black'>
<tr bgcolor='white'> 
<td align='left' height='30' bgcolor='white' width='500'> 
&nbsp; <font face='arial' size='4'>  <b> Sales Order No : </b> $order_no   </font>  </td>

<td width='350' align='right'>
<font face='arial' size='4'>  <b> Date: </b>    </font>
</td>

<td width='150' align='left'>
<font face='arial' size='4'>  &nbsp;  $dat-$mon-$yer   </font> 
</td>







</tr>
</table>

<table align='center' width='1000' cellpadding='0' cellspacing='0' bgcolor=''>
<tr> <td align='left' height='1' bgcolor=''>   </td></tr>
</table>






<table align='center' width='1000' cellpadding='0' cellspacing='0' bgcolor='black'>
<tr bgcolor='white'> 
<td align='left' height='30' bgcolor='white' width='500'> 
&nbsp; <font face='arial' size='4'>  <b> Replacement  No : </b>  INV-$money_id  </font>  </td>




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



<table align='center' width='1000' cellpadding='0' cellspacing='0' bgcolor='black'>
<tr> <td align='left' height='30' width='250' bgcolor='white'>  &nbsp;	 <font face='arial' size='4'> <b> Customer Name :   </b>  $suppliern  
";
if($project_namen!="")
{
print"
<b> &nbsp; &nbsp;  Project Name :   </b>  $project_namen
";
}

print"
</font>  </td>
</tr>
</table>

";


if($contact_name!="")
{
print"
<table align='center' width='1000' cellpadding='0' cellspacing='0' bgcolor='black'>
<tr> <td align='left' height='30' width='250' bgcolor='white'> 	&nbsp; <font face='arial' size='4'> <b> Contact Person : </b>  $contact_name </font>  </td>
<td width='10' bgcolor='white'>  </td>
<td width='105' align='right' bgcolor='white'> <font face='arial' size='4'> <b>  &nbsp;  </b>    </font> </td>
<td width='5' bgcolor='white'>  </td>
<td width='110' align='left' bgcolor='white'> <font face='arial' size='4'>    </font>  </td>
</tr>
</table>
";
}







print"
<table align='center' width='1000' cellpadding='0' cellspacing='0' bgcolor=''>
<tr> <td align='left' height='1' bgcolor=''>   </td></tr>
</table>



<table align='center' width='1000' cellpadding='0' cellspacing='0' bgcolor='black'>
<tr> <td align='left' height='30' bgcolor='white'> &nbsp;  <font face='arial' size='4'> <b> Address :  $address &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  Mobile : $mobile </b>  </font>  </td></tr>
</table>


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
 <td width='30' height='25' align='center'> <font face='arial' size='4'> <b> SL. </b> </font> </td> 
 <td width='300' align='left'><font face='arial' size='4'> <b> &nbsp; Product Description </b> </font> </td>
 
 
 <td width='100' align='center'><font face='arial' size='4'> <b> Qty. </b> </font> </td> 
 
<td width='50' align='center'><font face='arial' size='4'> <b> Unit  </b> </font> </td> 
 
 ";
 
 if($set_wa==1)
 {
 print"
<td width='100' align='center'><font face='arial' size='4'> <b> Warranty </b> </font> </td> 
 ";
 }
 
 print"
 <td width='100' align='center'><font face='arial' size='4'> <b>  Unit Price </b> </font> </td>
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

</table>

";




$result = mysql_query("SELECT * FROM `saleproduct_replace` where money_id='$memo_id' ORDER BY `user_id` ASC ");




while ($a_row = mysql_fetch_row($result)) {

	foreach ($a_row as $field) {
		
	}


$w++;


$comm=$a_row[25];
$total3=$a_row[6]*$a_row[7];

$pto++;




if($pto==1)
{
print"
<table align='center' width='1000' cellpadding='3' cellspacing='1' bgcolor='black'>
";




if($txy==11)
{

$txy=13;	
	
print"
<tr bgcolor='white'>
 <td width='30' align='center' height='25'> <font face='arial' size='4'>      </font> </td> 
 <td width='300' align='left'><font face='arial' size='4'>     </font> </td>
 <td width='100' align='center'><font face='arial' size='4'>      </font> </td> 


 <td width='50' align='center'><font face='arial' size='4'>     </font> </td> 
";


 if($set_wa==1)
 {
print"
 <td width='100' align='center'><font face='arial' size='4'>     </font> </td> 
";
 }



print"

 <td width='100' align='center'><font face='arial' size='4'>  Sub Total 1     </font> </td> 
";

 if($set_discount==1)
{

if($a_row[35]=="")
{
print"
<td width='100' align='left'><font face='arial' size='4'>        </font> </td> 
";
}
else
{
print"
<td width='100' align='left'><font face='arial' size='4'>         </font> </td> 
";
	
}
 


}

 
 
 
print"
 
 <td width='100' align='right'><font face='arial' size='4'>   $stotalxx &nbsp;</font> </td> 
</tr>

";

}
	


}

if($pto<=$set_pto)
	
{
	

print"
<tr bgcolor='white'>
 <td width='30' align='center' height='25'> <font face='arial' size='4'>   $w   </font> </td> 
 <td width='300' align='left'><font face='arial' size='4'> &nbsp;  $a_row[5] $a_row[34]  $a_row_test[19]    </font> </td>
 <td width='100' align='center'><font face='arial' size='4'>   $a_row[6]   </font> </td> 


 <td width='50' align='center'><font face='arial' size='4'>   $a_row[29]   </font> </td> 
";



 if($set_wa==1)
 {

print"
 <td width='100' align='center'><font face='arial' size='4'>   $a_row[36]   </font> </td> 
";

 }



print"

 <td width='100' align='center'><font face='arial' size='4'>     $a_row[7]  </font> </td> 
";

 if($set_discount==1)
{

if($a_row[35]=="")
{
print"
<td width='100' align='left'><font face='arial' size='4'>     $comm    </font> </td> 
";
}
else
{
print"
<td width='100' align='left'><font face='arial' size='4'>     $a_row[35] = $comm    </font> </td> 
";
	
}
 


}

 
 /*
  <td width='50' align='center'><font face='arial' size='4'>    $arrp[19] </font> </td> 
 
 */
 
print"
 
 <td width='100' align='right'><font face='arial' size='4'>   $a_row[8] &nbsp;</font> </td> 
</tr>

";


$stotalxx=$stotalxx+$a_row[8];
$txy=1;

}





if($pto==$set_pto)
{
	

if($txy==1)
{

$txy=11;	
	
print"
<tr bgcolor='white'>
 <td width='30' align='center' height='25'> <font face='arial' size='4'>      </font> </td> 
 <td width='300' align='left'><font face='arial' size='4'>     </font> </td>
 <td width='100' align='center'><font face='arial' size='4'>      </font> </td> 


 <td width='50' align='center'><font face='arial' size='4'>     </font> </td> 
";



 if($set_wa==1)
 {
print"
<td width='100' align='center'><font face='arial' size='4'>     </font> </td> 
";
 }



print"

 <td width='100' align='center'><font face='arial' size='4'>  Sub Total 1     </font> </td> 
";

 if($set_discount==1)
{

if($a_row[35]=="")
{
print"
<td width='100' align='left'><font face='arial' size='4'>        </font> </td> 
";
}
else
{
print"
<td width='100' align='left'><font face='arial' size='4'>         </font> </td> 
";
	
}
 


}

 
 
 
print"
 
 <td width='100' align='right'><font face='arial' size='4'>   $stotalxx &nbsp;</font> </td> 
</tr>

";

}
	
print"
</table>
";

////////////////////////////////////////////////////////

if($set_pad!=1)
{
print"
<table align='center' width='1000' cellpadding='0' height='0' cellspacing='0' bgcolor=''>
<tr>


<tr>
<td height='20'> </td>
</tr>


<td width='100'>  </td>

<td align='left' width='200'> <img src='banner//$shop_name' width='200' height='60'> </td>

<td width='20'>  </td>

<td align='left'>
<table align='center' width='750' cellpadding='0' height='0' cellspacing='0' bgcolor=''>
<tr>
<td align='left'>

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<font face='arial' size='6'> <b> $shop_address </b>
</font>
<font face='arial' size='4'> <br>  $shop_mobile </font>
<br>
<font face='arial' size='4'>

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
 $shop_email
</font>

<font color='red' size='4'>  </font>
<br>


</td>
</tr>
</table>

</td>
</tr>


<tr>
<td align='center' height='18'>
</td>
</tr>
</table>
";



}



////////////////////////////////////////////////////////////

$pto=0;
}






}


















































print"
</table>



<table align='center' width='1000' cellpadding='0' cellspacing='0'>


<tr>
 <td width='504' height='25' bgcolor='' align='right'> <font face='arial' size='4'> <b> Total: </b>  </font> </td> 
 <td width='96' align='right'> &nbsp;  <font face='arial' size='4'> <b>  $sub_total  &nbsp;&nbsp; </b> </font> </td> 
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
<td width='504' height='25' bgcolor='' align='right'> <font face='arial' size='4'> <b> Discount:  </b> </font> </td> 
";

}
else
{
	
print"
<td width='504' height='25' bgcolor='' align='right'> <font face='arial' size='4'> <b> Discount $f_dis:  </b> </font> </td> 
";
	
}


print"
 <td width='96' align='right'> <font face='arial' size='4'> <b> &nbsp;  $discount_less    &nbsp;&nbsp;  </b> </font> </td> 
</tr>



<tr>
 <td width='504' height='25' bgcolor='' align='right'> <font face='arial' size='4'> <b>  Total:  </b>  </font> </td> 
 <td width='96' align='right'> <font face='arial' size='4'> &nbsp; <b>  $subtotal_last    &nbsp;&nbsp; </b> </font> </td> 
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
 <td width='96' align='right'> <font face='arial' size='4'> &nbsp; <b> $less  &nbsp;&nbsp; </b>  </font> </td> 
</tr>
";
}


if($less>0 || $service>0)
{
print"
<tr>
 <td width='504' height='25' bgcolor='' align='right'> <font face='arial' size='4'> <b>  Sub Total:   </b></font> </td> 
 <td width='96' align='right'> <font face='arial' size='4'> &nbsp; <b> $stotal  &nbsp;&nbsp; </b>   </font> </td> 
</tr>

";

}









if($vat!="")
{
print"

<tr>
 <td width='504' height='25' bgcolor='' align='right'> <font face='arial' size='4'> <b>  Vat $vat % :   </b></font> </td> 
 <td width='96' align='right'> <font face='arial' size='4'>  <b> $vat_tk &nbsp;&nbsp; </b>   </font> </td> 
</tr>


";
}

if($tax2!="")
{
print"
<tr>
 <td width='504' height='25' bgcolor='' align='right'> <font face='arial' size='4'> <b>  Tax $tax2 %  :   </b></font> </td> 
 <td width='96' align='right'> <font face='arial' size='4'>  <b> $tax2_tk &nbsp;&nbsp; </b>   </font> </td> 
</tr>
";	

}



if($vat!="" || $tax2!="")
{

print"
<tr>
 <td width='504' height='25' bgcolor='' align='right'> <font face='arial' size='4'> <b>  Subtotal :   </b></font> </td> 
 <td width='96' align='right'> <font face='arial' size='4'>  <b> $stotal2 &nbsp;&nbsp; </b>   </font> </td> 
</tr>
";	
}






if($payment>0)
{
print"

<tr>
 <td width='504' height='25' bgcolor='' align='right'> <font face='arial' size='4'> <b> Payment: </b>  </font> </td> 
 <td width='96' align='right'> <font face='arial' size='4'> &nbsp; <b> $payment  &nbsp;&nbsp; </b> </font> </td> 
</tr>
";
}





/*

if($due>0)
{



print"
<tr>
 <td width='504' height='' bgcolor='' align='right'> <br> <font face='arial' size='4'>&nbsp; <b> Due: </b> </font> </td> 
 <td width='96' align='right'> <hr> <font face='arial' size='4'>   <b> $due  &nbsp;&nbsp; </b> </font> </hr> </td> 
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


$pui=$balance+$stotal2;
$new_pui=$pui-$payment;


/*

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

*/


print"
<br>
<table align='center' width='1000' cellpadding='0' cellspacing='0'>

<tr> 

<td height='8'> </td>

</tr>

<tr>
<td width='20' height='0' align='left'> <font face='arial' size='4'> &nbsp;&nbsp; <b>  Note:  $comments </b> </font> </td> 
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

if($set_p==1)
{
include_once('convert4.php');
}
else
{
include_once('convert45_sal.php');
}

print"

Taka Only 
</b>
 </font> </td> 
</tr>
</table>














<table align='center' width='1000' cellpadding='0' cellspacing='0'>
<tr>
<td width='10' height='10' align='left'>  </td> 
</tr>
</table>
";

/*

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









if($a_row[15]==1)
{


if($a_row[12]!="" || $a_row[13]!="" || $a_row[14]!="")
{
	

$final_com=$a_row[14];

$final_com_sum=$final_com_sum+$final_com;


}
else
{



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


}
else
{


	
}






}







$dqr=0;


if($a_row[2]==2)
{






$dr=$dr+$a_row[3];


$dqr=$a_row[3];


}


if($a_row[2]==1)
{


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





*/




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