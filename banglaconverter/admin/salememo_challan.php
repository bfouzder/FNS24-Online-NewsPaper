<?php
include_once('dbconnection.php');

session_start();

$supplier=trim($_POST['supplier']);


if($supplier==0 ||$supplier=="")
{
print"<h1> You Are Not Select Customer please select customer </h1>";
exit;

}

$new_customer=trim($_POST['new_customer']);
$new_address=trim($_POST['new_address']);
$new_mobile=trim($_POST['new_mobile']);



$ddddd=trim($_POST['ddddd']);
$memo_no=trim($_POST['memo_no']);


foreach($_SESSION['cart'] as $product_id => $quantity)
{

$ej++;

}



if($ddddd==100 && $ej>0)
{
$result = mysql_query("DELETE FROM salememo_challan WHERE money_id=$memo_no");
$result = mysql_query("DELETE FROM saleproduct_challan WHERE money_id=$memo_no");
}






$ser=trim($_POST['ser']);
$less=trim($_POST['less']);
$payment=trim($_POST['payment']);


$po_no=trim($_POST['po_no']);
$d_no=trim($_POST['d_no']);


$transport_name=trim($_POST['transport_name']);
$contact_name=trim($_POST['contact_name']);

$contact_name1=trim($_POST['contact_name1']);


$order_no=trim($_POST['sales_order']);





$sql="SELECT * FROM `contact1` WHERE user_id='$contact_name1' ";
$result=mysql_query($sql);
$arrsco1=mysql_fetch_array($result);
$contact_namen1=$arrsco1[1];
$mobile_contact1=$arrsco1[3];
$address_contact1=$arrsco1[5];





if($contact_namen1=="")
{

$contact_namen1=trim($_POST['contact_name1']);
$mobile_contact1=trim($_POST['mobile_contact1']);
$address_contact1=trim($_POST['address_contact1']);

		
}











$payment_mode=trim($_POST['payment_mode']);


$paymenttype=trim($_POST['paymenttype']);
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
$suppliern=$arr1[7];
$contact_new=$arr1[1];
$address=$arr1[5];
$mobile=$arr1[3];
$supplier_id=$arr1[2];

//$money_id= time().$u;

if($supplier==1)
{

if($new_customer!="")
{
$suppliern="$new_customer";	
}

}



$address=$new_address;
$mobile=$new_mobile;



$money_id=$memo_no;



//$contact_name=$contact_new;













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

<title> Challan </title>

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
<td width='1000' align='left'> 
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
<font face='arial' size='4'> <b> :  </b> $contact_namen1   </font> 
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
<font face='arial' size='4'> <b> : </b> $mobile_contact1    </font> 
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
<td width='130' align='center' bgcolor='$set_bg_color' height='40' id='kh'> <b> Challan  </b> </font> </td>

</tr>
<tr> <td align='center' height='10'>  </td></tr>
</table>



<table align='center' width='1000' cellpadding='0' cellspacing='0' bgcolor='black'>
<tr> 
<td align='left' height='30' bgcolor='white' width='500'> 

<font face='arial' size='4'> <b> Challan No :   $money_id  </b>  </font>  </td>


<td width='265' bgcolor='white'>  </td>
<td width='125' align='left' bgcolor='white'> <font face='arial' size='4'> &nbsp;&nbsp; <b> Date </b>    </font> </td>
<td width='5' bgcolor='white'>  </td>
<td width='110' align='left' bgcolor='white'> <font face='arial' size='4'>   $dat-$mon-$yer  &nbsp; </font>  </td>

</tr>
</table>

<table align='center' width='600' cellpadding='0' cellspacing='0' bgcolor=''>
<tr> <td align='left' height='1' bgcolor=''>   </td></tr>
</table>






<table align='center' width='1000' cellpadding='0' cellspacing='0' bgcolor='black'>
<tr> 
<td align='left' height='30' bgcolor='white' width='500'> 

	 <font face='arial' size='4'> <b> Customer Name : <b>  </b> $suppliern  </font>  </td>


<td width='265' bgcolor='white'>  </td>
<td width='125' align='left' bgcolor='white'> <font face='arial' size='4'> &nbsp;&nbsp; <b> Created By </b>    </font> </td>
<td width='5' bgcolor='white'>  </td>
<td width='110' align='left' bgcolor='white'> <font face='arial' size='4'>  $u_namee  &nbsp; </font>  </td>

</tr>
</table>

<table align='center' width='1000' cellpadding='0' cellspacing='0' bgcolor=''>
<tr> <td align='left' height='1' bgcolor=''>   </td></tr>
</table>
";

if($contact_name!="")
{
print"
<table align='center' width='1000' cellpadding='0' cellspacing='0' bgcolor='black'>
<tr> <td align='left' height='30' bgcolor='white' width='260'> 	 <font face='arial' size='4'> <b> Contact Person :   $contact_name </b>  </font>  </td>
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
<tr> <td align='left' height='30' bgcolor='white'>  <font face='arial' size='4'> <b> Address : </b>  $address &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  Mobile : $mobile   </font>  </td></tr>
</table>
";

*/





/*
print"

<table align='center' width='1000' cellpadding='0' cellspacing='0' bgcolor='black'>
<tr> <td align='left' height='30' bgcolor='white'> 

";



print"
	
 <font face='arial' size='4'>
 <b> Transport Name: </b> $transport_name 
</font>

";




print" </td></tr>
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

<table align='center' width='1000' cellpadding='4' cellspacing='1' bgcolor='black'>

<tr bgcolor='white'>
 <td width='30' height='15' align='center'> <font face='arial' size='4'> <b> SL. </b> </font> </td> 
 <td width='300' align='left'><font face='arial' size='4'> <b>  Product Name </b> </font> </td>
 ";
 
 include_once('mm.php');
 
 print"
 <td width='100' align='center'><font face='arial' size='4'> <b> Qty. </b> </font> </td> 
 <td width='100' align='center'><font face='arial' size='4'> <b> Unit </b> </font> </td> 
 
 ";
 
 
 
 /*
 <td width='100' align='center'><font face='arial' size='4'> <b> Commission </b> </font> </td> 
 */
 
 
 print"
 

</tr>
";





$qeu=0;

foreach($_SESSION['cart_price'] as $product_id => $price)
{
$qeu++;
$price_a[$qeu]=$price;
}

$qeu=0;

foreach($_SESSION['cart_com'] as $product_id => $com)
{
$qeu++;
$com_a[$qeu]=$com;
}


$qeu=0;

foreach($_SESSION['cart_local'] as $product_id => $local)
{
$qeu++;
$local_a[$qeu]=$local;
}






$qeu=0;

foreach($_SESSION['cart_other'] as $product_id => $local_other)
{
$qeu++;
$local_other[$qeu]=$local_other;
}




foreach($_SESSION['cart'] as $product_id => $quantity)
{

$e++;
$w++;
$qg++;
 
$sql="SELECT * FROM `product_name` WHERE user_id='$product_id' ";
$result=mysql_query($sql);
$arrp_new=mysql_fetch_array($result);


$arrp[21]=$price_a[$qg];
$arrp[19]=$com_a[$qg];
$arrp[29]=$local_a[$qg];



$profit=$arrp[21]-$arrp_new[4];
$profit=$profit*$quantity;
$total=$arrp[21]*$quantity;
$total3=$total;

$total=$total-$arrp[19];
$lesst=$lesst+$arrp[19];
$comm=$arrp[19];
$subtotal=$subtotal+$total;
$st=$arrp[12];



$sql="SELECT * FROM `product_category` WHERE user_id='$arrp[1]' ";
$result=mysql_query($sql);
$name=mysql_fetch_array($result);




print"
<tr bgcolor='white'>
 <td width='30'  align='center' height='15'> <font face='arial' size='4'>   $w   </font> </td> 
 <td width='300' align='left'><font face='arial' size='4'>    $arrp_new[2] $local_other[$qg] $arrp[29]    </font> </td>
  ";
  
  
  if($cwp1==1)
  {
print"
 <td width='' align='center'><font face='arial' size='4'>  $arrp_new[3]    </font> </td> 
";
}


  
  if($cwp2==1)
  {
print"
  <td width='' align='center'><font face='arial' size='4'>  $arrp_new[30]    </font> </td> 
";
  }
 
  
  if($cwp3==1)
  {
 print"
  <td width='' align='center'><font face='arial' size='4'>  $arrp_new[31]     </font> </td> 
 ";
 }
 
  
if($cwp4==1)
{
 print"
 <td width='' align='center'><font face='arial' size='4'>  $arrp_new[32]     </font> </td> 
";
}


 
 
 print"
 <td width='100' align='center'><font face='arial' size='4'>   $quantity   </font> </td> 
 <td width='50'  align='center'><font face='arial' size='4'>   $arrp_new[22]   </font> </td> 
 
 ";
 
 $tqq=$tqq+$quantity;
 
print"
 </tr>

";





/*
$sql = "INSERT INTO `saleproduct` (`user_id`, `money_id`, `supplier_id`, `supplier_name`, `product_id`, `product_name`, `qty`, `price`, `total`, `dat`, `mon`, `yer`, `adat`, `t4`, `m_type`, `m_id`, `p_type`, `p_id`, `user`) VALUES ('','$money_id','$supplier','$suppliern','$product_id','$arrp[2]','$quantity','$arrp[4]','$total','$dat','$mon','$yer','$adat','$t4','$arrpm[1]',' $arrpm[0]','$name[1]','$arrpt[0]','$u_namee')";
mysql_query($sql);

*/





$sql = "INSERT INTO `saleproduct_challan` (`user_id`, `money_id`, `supplier_id`, `supplier_name`, `product_id`, `product_name`, `qty`, `price`, `total`, `dat`, `mon`, `yer`, `adat`, `t4`,`buy`, `tax1`, `profit`, `m_type`, `m_id`, `p_type`, `p_id`, `user`, `commission`, `po_no`, `d_no`, `unit`, `p_des`, `model`, `brand`, `capacity`, `origion`, `other`) VALUES ('','$money_id','$supplier','$suppliern','$product_id','$arrp_new[2]','$quantity','$arrp[21]','$total','$dat','$mon','$yer','$adat','$t4','$arrp_new[4]','$tax1','$profit','$arrpm[1]',' $arrpm[0]','$name[1]','$arrpt[0]','$u_namee','$comm','$po_no','$d_no','$arrp_new[22]','$arrp[29]', '$arrp_new[3]', '$arrp_new[30]', '$arrp_new[31]', '$arrp_new[32]', '$local_other[$qg]')";
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






$subtotal_last=$subtotal-$discount_less;


$stotal=$subtotal_last+$less;


//$tax=0.00;

$due=$stotal-$payment;














print"
<tr bgcolor='white'>
 <td width='30'  align='center' height='15'> <font face='arial' size='4'>      </font> </td> 
 <td width='300' align='left'><font face='arial' size='4'>  Total      </font> </td>
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
 <td width='' align='center'><font face='arial' size='4'> </font> </td> 
 ";
  }
  if($cwp4==1)
  {
	print"
 <td width='' align='center'><font face='arial' size='4'>    </font> </td> 
 ";
  }

 
 
 print"
 <td width='100' align='center'><font face='arial' size='4'>   $tqq   </font> </td> 
 <td width='50'  align='center'><font face='arial' size='4'>  </font> </td> 
 
 ";
 
 
 
print"
 </tr>

";












if($e>0)
{
	
	/*
$sql = "INSERT INTO `salememo` (`user_id`, `money_id`, `supplier_id`, `supplier_name`, `product_item`, `total_money`, `less`, `joma`, `due`, `dat`, `mon`, `yer`, `adat`, `t4`, `comments`, `paymenttype`, `mobile`, `user`) VALUES ('','$money_id','$supplier','$suppliern','$e','$subtotal','$less','$payment','$due','$dat','$mon','$yer','$adat','$t4','$comments','$address','$mobile','$user')";
mysql_query($sql);
*/



$sql = "INSERT INTO `salememo_challan` (`user_id`, `money_id`, `supplier_id`, `supplier_name`, `product_item`, `total_money`, `less`, `joma`, `due`, `dat`, `mon`, `yer`, `adat`, `t4`, `comments`, `paymenttype`, `tax1`, `subtotal1`, `mobile`, `user`, `commission`, `discount_less`,`pre_bal`, `po_no`, `d_no`, `order_no`, `transport_name`, `contact_name`, `address`, `contact_name1`, `mobile_contact1`, `address_contact1`) VALUES ('','$money_id','$supplier','$suppliern','$e','$subtotal','$less','$payment','$due','$dat','$mon','$yer','$adat','$t4','$comments','$address','$sty','$stotal','$mobile','$u_namee','$lesst','$discount_less','$balance','$po_no','$d_no','$order_no','$transport_name','$contact_name','$address','$contact_namen1','$mobile_contact1','$address_contact1')";
mysql_query($sql);




}








print"
</table>



<table align='center' width='1000' cellpadding='0' cellspacing='0'>

";


/*
if($discount_less>0)
{
print"
<tr>
 <td width='504' height='25' bgcolor='' align='right'> <font face='arial' size='4'>  Discount:  </font> </td> 
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
 <td width='504' height='25' bgcolor='' align='right'> <font face='arial' size='4'>  Transport/Labour :   </font> </td> 
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
 <td width='504' height='25' bgcolor='' align='right'> <font face='arial' size='4'>  Payment:   </font> </td> 
 <td width='96' align='center'> <font face='arial' size='4'> &nbsp;  $payment  </font> </td> 
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
<td align='left' width='200'> <font size='4'>  Previous dues:  </font> </td>
<td align='right' width='100'> <font size='4'>  $balance  </font> </td>
</tr>



<tr bgcolor='white'>
<td align='left' width='200'> <font size='4'>  Sales:  </font> </td>
<td align='right' width='100'> <font size='4'>  $stotal  </font> </td>
</tr>

<tr bgcolor='white'>
<td align='left' width='200'> <font size='4'>  Total:  </font> </td>
<td align='right' width='100'> <font size='4'>  $pui  </font> </td>
</tr>

<tr bgcolor='white'>
<td align='left' width='200'> <font size='4'>  Collected:  </font> </td>
<td align='right' width='100'> <font size='4'>  $payment  </font> </td>
</tr>

<tr bgcolor='white'>
<td align='left' width='1'>............................................... </td>
<td align='right' width='1'>..........................</td>
</tr>


<tr bgcolor='white'>
<td align='left' width='200'> <font size='4'>  Net Outstanding:  </font> </td>
<td align='right' width='100'> <font size='4'>  $new_pui  </font> </td>
</tr>




</table>
</td>
</tr>
</table>
</td> 




<td width='390' height='10' align='left'>  </td> 

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

";

//include_once('convert4.php');


print"

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


unset($_SESSION['cart']);
unset($_SESSION['cart_price']);
unset($_SESSION['cart_unit']);
unset($_SESSION['cart_com']);
unset($_SESSION['cart_id']);
unset($_SESSION['cart_local']);
unset($_SESSION['cart_other']);


//session_unset($_SESSION['cart']);
//session_destroy();


print"
</body>

</head>

</html>



";


?>