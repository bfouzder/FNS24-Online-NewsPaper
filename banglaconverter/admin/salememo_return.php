<?php
include_once('dbconnection.php');
session_start();







$ser=trim($_POST['ser']);
$less=trim($_POST['less']);
$payment=trim($_POST['payment']);
$payment_mode=trim($_POST['payment_mode']);
$sales_invoice=trim($_POST['sales_invoice']);
$paymenttype=trim($_POST['paymenttype']);
$supplier=trim($_POST['supplier']);
$comments=trim($_POST['comments']);

$comments=str_replace("'","`","$comments");


$due=trim($_POST['due']);

$sql="SELECT * FROM `bank` WHERE user_id='$payment_mode' ";
$result=mysql_query($sql);
$arrsp=mysql_fetch_array($result);
$payment_moden=$arrsp[1];



if($payment_mode=="")
{
$payment_moden="Cash";
}









foreach($_SESSION['cart'] as $product_id_unique => $quantity)
{
$w++;
$p_id[$w]=$product_id;
}





for($i=1;$i<=$w;$i++)
{

$total_price=0;
$net_amount=0;


$sql="SELECT * FROM `saleproduct` WHERE money_id='$sales_invoice' && product_id='$p_id[$i]' ";
$result=mysql_query($sql);
$arrp_ic=mysql_fetch_array($result);


$per_ic_price=$arrp_ic[14];
$per_ic_profit=$arrp_ic[16]/$arrp_ic[6];
$per_ic_profit= number_format($per_ic_profit, 3);
$per_ic_profit=str_replace(",","","$per_ic_profit");


if($per_ic_price=="")
{
$sql="SELECT * FROM `product_name` WHERE  product_id='$p_id[$i]' ";
$result=mysql_query($sql);
$arrp_icp=mysql_fetch_array($result);
$per_ic_price=$arrp_icp[4];
}


$sql= "UPDATE  `product_name` SET `return_total`='$per_ic_price' WHERE `user_id`='$p_id[$i]'";
mysql_query($sql);


$sql= "UPDATE  `product_name` SET `return_profit`='$per_ic_profit' WHERE `user_id`='$p_id[$i]'";
mysql_query($sql);



}










$sql="SELECT * FROM `customer` WHERE user_id='$supplier' ";
$result=mysql_query($sql);
$arr1=mysql_fetch_array($result);

$u=$arr1[0];
$suppliern=$arr1[1];
$address=$arr1[5];
$mobile=$arr1[3];
$supplier_id=$arr1[2];



if($supplier=="")
{

$suppliern=trim($_POST['new_customer']);
$address=trim($_POST['new_address']);
$mobile=trim($_POST['new_mobile']);
$supplier=50000;


}





//$money_id= time().$u;




$money_id=$sales_invoice;

$money_id2= time().$u_idd;



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

<title> Welcome to customer memo return </title>

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




if($address_off==1)
{
include_once('address.php');
}




/*

print"

<table align='center' width='1000' cellpadding='0' cellspacing='0'>
<tr> <td align='center' height='10'>  </td></tr>
<tr> 
<td width='300' align='left'><a href=\"sales.php?action=removee&i5d=$arrp[0]\"> <font face='arial' size='4' color='black'> Sl No./ Memo No: <b> $money_id   </b> </font> </a> </td>
<td width='130' align='center' bgcolor='$set_bg_color' height='40' id='kh'> <b> Sales Return </b> </font> </td>
<td width='270' align='right'><font face='arial' size='4'> Date: <b> $dat-$mon-$yer </b> </font> &nbsp;</td>
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
<tr> <td align='left' height='30' bgcolor='white'> &nbsp;	 <font face='arial' szie='3'> Employee : <b> $u_namee </b> </font>  </td></tr>
</table>

";
*/











print"
<table align='center' width='$set_wd' cellpadding='0' cellspacing='0'>
<tr> <td align='center' height='10'>  </td></tr>
<tr> 
<td width='130' align='center' bgcolor='$set_bg_color'  height='40' id='kh'> <b> Sales Return  </b>  </td>
</tr>
<tr> <td align='center' height='10'>  </td></tr>
</table>









<table align='center' width='990' cellpadding='0' cellspacing='1' bgcolor='black'>
<tr>
<td bgcolor='white' align='center'>

<table align='center' width='1000' cellpadding='0' cellspacing='0' bgcolor='black'>
<tr bgcolor='white'> 
<td align='left' height='30' bgcolor='white' width='160'> 
&nbsp; <font face='arial' size='4'> <b>  Return Inv. No </b>     </font> 
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
&nbsp; <font face='arial' size='4'>  <b> Return Invoice No : </b>  INV - $money_id  </font>  </td>


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

<tr> 
<td width='100' height='0'> </td> 
<td align='left' height='10' width='90'> 
<font face='arial' size='4'> Saler
</td>
<td align='left' height='10' width='420'> 
<font face='arial' size='4'>:  $u_namee </font>  
</td> 
<td width='200' align='left'>  
</td> 
</tr>
<tr> <td height='5'> </td> </tr>
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
 <td width='70' align='center'><font face='arial' size='4'> <b> Unit </b> </font> </td> 
 ";
 print"
 <td width='100' align='center'><font face='arial' size='4'> <b>  Rate  </b> </font> </td>
 ";
 print"
 <td width='100' align='right'><font face='arial' size='4'> <b> Total &nbsp; </b> </font> </td> 
</tr>
";




















$qeu=0;

foreach($_SESSION['cart_price'] as $product_id_unique => $price)
{
$qeu++;
$price_a[$qeu]=$price;
}

$qeu=0;

foreach($_SESSION['cart_com'] as $product_id_unique => $com)
{
$qeu++;
$com_a[$qeu]=$com;
}


$qeu=0;

foreach($_SESSION['cart_local'] as $product_id_unique => $local)
{
$qeu++;
$local_a[$qeu]=$local;
}


$qeu=0;

foreach($_SESSION['cart'] as $product_id_unique => $pp_id)
{
$qeu++;
$product_id_other[$qeu]=$pp_id;
}



$qeu=0;

foreach($_SESSION['cart_go'] as $product_id_unique => $gdd)
{
$qeu++;
$go_other[$qeu]=$gdd;
}


$qg=0;



foreach($_SESSION['cart_unique'] as $product_id_unique => $quantity)
{

$e++;
$w++;
$qg++;


$product_id=$product_id_other[$qg];
 
$sql="SELECT * FROM `product_name` WHERE user_id='$product_id' ";
$result=mysql_query($sql);
$arrp_new=mysql_fetch_array($result);



$arrp[21]=$price_a[$qg];
$arrp[19]=$com_a[$qg];
$arrp[29]=$local_a[$qg];




$profit=$arrp[21]-$arrp_new[20];
$profit=$profit*$quantity;


$total=$arrp[21]*$quantity;

$return_total=$arrp_new[26]*$quantity;
$return_profit=$arrp_new[27]*$quantity;




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
 <td width='' align='center' height='25'> <font face='arial' size='4'>   $w  </font> </td> 
 <td width='' align='left'><font face='arial' size='4'>    $arrp_new[2] $arrp[29]  $name_old[1] </font> </td>
 ";
 
 if($cwp1==1)
 {
 print"
 <td height='30' bgcolor='' width='' align='center'> <font face='arial' color='black' size='4'> $arrp_new[3] </font> </td>
 ";
}


 if($cwp2==1)
 {
print"
 <td height='30' bgcolor='' width='' align='center'> <font face='arial' color='black' size='4'> $arrp_new[30] </font> </td>
 ";
 }
 
 
 if($cwp3==1)
 {
 print"
 <td height='30' bgcolor='' width='' align='center'> <font face='arial' color='black' size='4'> $arrp_new[31] </font> </td>
 ";
 }
 
 
 if($cwp4==1)
 {
 print"
 <td height='30' bgcolor='' width='' align='center'> <font face='arial' color='black' size='4'> $arrp_new[32] </font> </td>
";
}
 
 
 print"
 <td width='' align='center'><font face='arial' size='4'>   $quantity   </font> </td> 
 <td width='' align='center'><font face='arial' size='4'>   $arrp_new[22]   </font> </td> 
 
 <td width='' align='center'><font face='arial' size='4'>    $arrp[21] </font> </td> 
 
 
 <td width='' align='right'><font face='arial' size='4'>   $total &nbsp;  </font> </td> 
</tr>

";



/*
$sql = "INSERT INTO `buyproduct` (`user_id`, `money_id`, `supplier_id`, `supplier_name`, `product_id`, `product_name`, `qty`, `price`, `total`, `dat`, `mon`, `yer`, `adat`, `t4`, `m_type`, `m_id`, `p_type`, `p_id`, `user`, `commission`) VALUES ('','$money_id','$supplier','$suppliern','$product_id','$arrp[2]','$quantity','$arrp[20]','$total','$dat','$mon','$yer','$adat','$t4','$arrpm[1]',' $arrpm[0]','$name[1]','$arrpt[0]','$u_namee','$arrp[19]')";
mysql_query($sql);
*/




$sql = "INSERT INTO `saleproduct_return` (`user_id`, `money_id`, `supplier_id`, `supplier_name`, `product_id`, `product_name`, `qty`, `price`, `total`, `dat`, `mon`, `yer`, `adat`, `t4`,`buy`, `tax1`, `profit`, `m_type`, `m_id`, `p_type`, `p_id`, `user`, `u_name`, `pas_type`, `u_idd`, `return_total`, `return_profit`, `money_id2`, `u_id2`, `p_des`, `unit`, `model`, `brand`, `capacity`, `origion`, `branch_id`, `branch_using_id`) VALUES ('','$money_id','$supplier','$suppliern','$product_id','$arrp_new[2]','$quantity','$arrp[21]','$total','$dat','$mon','$yer','$adat','$t4','$arrp_new[20]','$tax1','$profit','$arrpm[1]',' $arrpm[0]','$name[1]','$arrpt[0]','$u_namee','$u_namee','$pas_type','$u_idd','$return_total','$return_profit','$money_id2','$u_idd','$arrp[29]','$arrp_new[22]','$arrp_new[3]','$arrp_new[30]','$arrp_new[31]','$arrp_new[32]','$go_other[$qg]','$go_id_new')";
mysql_query($sql);



$st=$st-$quantity;

/*
$sql= "UPDATE  `product_name` SET `total_product`='$st' WHERE `user_id`='$product_id'";
mysql_query($sql);
*/



//print"$st <br>";

$sql= "UPDATE  `product_name` SET `sale_product`='$st' WHERE `user_id`='$product_id'";
mysql_query($sql);

}




$stotal=$subtotal-$less;


//$tax=0.00;

$due=$stotal-$payment;



if($e>0)
{
	


$sql = "INSERT INTO `salememo_return` (`user_id`, `money_id`, `supplier_id`, `supplier_name`, `product_item`, `total_money`, `less`, `joma`, `due`, `dat`, `mon`, `yer`, `adat`, `t4`, `comments`, `paymenttype`, `tax1`, `subtotal1`, `mobile`, `user`, `u_name`, `pas_type`, `u_idd`, `money_id2`, `u_id2`, `branch_id`, `branch_using_id`) VALUES ('','$money_id','$supplier','$suppliern','$e','$subtotal','$less','$payment','$due','$dat','$mon','$yer','$adat','$t4','$comments','$address','$sty','$stotal','$mobile','$user','$u_namee','$pas_type','$u_idd','$money_id2','$u_idd','','$go_id_new')";
mysql_query($sql);







$commentss="$suppliern Sales Return  $comments";
$credit=2;
$sql = "INSERT INTO `customer_laser` (`user_id`, `bank_name`,`credit`, `amount`,`comments`,`dat`, `mon`, `yer`, `money_id`, `adat`, `user`, `money_id2`, `u_id2`) VALUES ('','$u','$credit','$stotal','$commentss','$dat','$mon','$yer','$money_id','$adat','$u_namee','$money_id2','$u_idd')";
mysql_query($sql);



if($payment!=0 && $payment!="")
{
$commentss="$suppliern  Sales Return $payment_moden Payment  $comments   ";
$credit=1;
$sql = "INSERT INTO `customer_laser` (`user_id`, `bank_name`,`credit`, `amount`,`comments`,`dat`, `mon`, `yer`, `money_id`, `adat`, `user`, `money_id2`, `u_id2`) VALUES ('','$u','$credit','$payment','$commentss','$dat','$mon','$yer','$money_id','$adat','$u_namee','$money_id2','$u_idd')";
mysql_query($sql);	
}










if($payment_mode=="")
{

if($payment!=0 && $payment!="")
{
$commentss="$suppliern   Sales Return $payment_moden payment  $comments";
$credit=2;
$sql = "INSERT INTO `cash_book` (`user_id`, `money_id`, `dat`, `mon`, `yer`, `adat`, `time`, `comments`, `debit`, `credit`, `balance`, `user`, `money_id2`, `u_id2`) VALUES ('','$money_id','$dat','$mon','$yer','$adat','$time','$commentss','$debit','$credit','$payment','$u_namee','$money_id2','$u_idd')";
mysql_query($sql);
}


}
else
{


if($payment!=0 && $payment!="")
{
$commentss=" $suppliern  Sales Return  $payment_moden payment   $comments  ";
$credit=2;
$sql = "INSERT INTO `bank_refill` (`user_id`, `bank_name`,`credit`, `amount`,`comments`,`dat`, `mon`, `yer`, `money_id`, `adat`, `user`, `money_id2`, `u_id2`) VALUES ('','$payment_mode','$credit','$payment','$commentss','$dat','$mon','$yer','$money_id','$adat','$u_namee','$money_id2','$u_idd')";
mysql_query($sql);
	
}

}






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
 <td width='176' height='25' bgcolor='' align='left'> <font face='arial' size='4'> Total  </font> </td> 
 <td width='93' align='right'> <font face='arial' size='4'>  $subtotal  &nbsp; </font> </td> 
</tr>


<tr bgcolor='white'>
 <td width='' height='25' bgcolor='' align='left'> <font face='arial' size='4'> Discount  </font> </td> 
 <td width='' align='right'> <font face='arial' size='4'> $less  &nbsp;</font> </td> 
</tr>


<tr bgcolor='white'>
 <td width='' height='25' bgcolor='' align='left'> <font face='arial' size='4'> Sub Total  </font> </td> 
 <td width='' align='right'> <font face='arial' size='4'>  $stotal  &nbsp; </font> </td> 
</tr>


<tr bgcolor='white'>
 <td width='' height='25' bgcolor='' align='left'> <font face='arial' size='4'> Payment  </font> </td> 
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

";


include_once('convert45_re.php');



print"
Taka Only. 

 </font> </td> 
</tr>
</table>
";






print"
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


unset($_SESSION['cart_unique']);
unset($_SESSION['cart_go']);

unset($_SESSION['cart']);
unset($_SESSION['cart_price']);
unset($_SESSION['cart_unit']);
unset($_SESSION['cart_com']);
unset($_SESSION['cart_id']);
unset($_SESSION['cart_local']);
unset($_SESSION['cart_wa']);




//session_unset($_SESSION['cart']);

//session_destroy();


print"
</body>

</head>

</html>



";


?>