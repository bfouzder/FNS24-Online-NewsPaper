<?php
include_once('dbconnection.php');

//session_start();

$ser=trim($_POST['ser']);
$less=trim($_POST['less']);
$payment=trim($_POST['payment']);
$payment_mode=trim($_POST['payment_mode']);
$check_no=trim($_POST['check_no']);
$less_new=trim($_POST['less_new']);
$idat=trim($_POST['idat']);
$imon=trim($_POST['imon']);
$iyer=trim($_POST['iyer']);
$paymenttype=trim($_POST['paymenttype']);
$supplier=trim($_POST['supplier']);
$comments=trim($_POST['comments']);
$due=trim($_POST['due']);


$comments=str_replace("'","`","$comments");


$discount=trim($_POST['discount']);
$car=trim($_POST['car']);



$adjust=trim($_POST['adjust_amount']);




if($supplier=="" || $supplier==0)
{
print"<h1>Something wrong please Select Supplier</h1>";
exit;
}





$ddddd=trim($_POST['ddddd']);






$result = mysql_query("SELECT * FROM `buyproduct` where tf!='1'   ORDER BY `money_id` DESC  LIMIT 0 , 1 ");

while ($a_row = mysql_fetch_row($result)) {

	foreach ($a_row as $field) {
		
	}

$num=$a_row[1];

}


$me=$num;
$memo_no=$me+1;






if($ddddd==100)
{
$memo_no=trim($_POST['memo_no']);
}



$memo_no2=trim($_POST['memo_no2']);



foreach($_SESSION['cart_unique'] as $product_id_unique => $quantity)
{
$wh++;

$ql=$ql+$quantity;
}




$ckl=$car-$discount;



$qll=$ckl/$ql;

$qll = number_format($qll, 2);
$qll=str_replace(",","","$qll");




if($ddddd==100 && $wh>0)
{
$result = mysql_query("DELETE FROM buymemo WHERE money_id=$memo_no");
$result = mysql_query("DELETE FROM cash_book WHERE money_id2=$memo_no2");
$result = mysql_query("DELETE FROM buyproduct WHERE money_id=$memo_no");
$result = mysql_query("DELETE FROM supplier_laser WHERE money_id2=$memo_no2");

$result = mysql_query("DELETE FROM supplier_advance WHERE money_id2=$memo_no2");

$result = mysql_query("DELETE FROM bank_refill WHERE money_id2=$memo_no2");
$result = mysql_query("DELETE FROM check_entry WHERE money_id2=$memo_no2");
$result = mysql_query("DELETE FROM buymemo_return WHERE money_id2=$memo_no2");
$result = mysql_query("DELETE FROM buyproduct_return WHERE money_id2=$memo_no2");
}

















$sql="SELECT * FROM `bank` WHERE user_id='$payment_mode' ";
$result=mysql_query($sql);
$arrsp=mysql_fetch_array($result);
$payment_moden=$arrsp[1];


if($payment_mode=="")
{
$payment_moden="Cash";
}




$sql="SELECT * FROM `supplier` WHERE user_id='$supplier' ";
$result=mysql_query($sql);
$arr1=mysql_fetch_array($result);

$u=$arr1[0];
$suppliern=$arr1[1];
$address=$arr1[5];
$mobile=$arr1[3];


$supplier_id=$arr1[2];







//$money_id= time().$u;


$money_id=trim($_POST['memo_no']);




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


$adat="$yer$mon$dat";






foreach($_SESSION['cart'] as $product_id_unique => $quantity)
{
$w++;
$p_id[$w]=$product_id_unique;
}







$q=0;
$total_price_sale=0;
$preo=0;
for($i=1;$i<=$w;$i++)

{
	
$total_price_sale=0;
$result = mysql_query("SELECT * FROM `product_name` where  user_id='$p_id[$i]' ORDER BY `user_id` ");


//$result = mysql_query("SELECT * FROM `saleproduct` where adat<='$mdate'  && product_id='$p_id[$i]' ORDER BY `adat` ");


while ($a_row = mysql_fetch_row($result)) {

	foreach ($a_row as $field) {
		
	}

//$q=$q+$a_row[6];
$psingle=$a_row[4];
//print"$a_row[6] <br>";
}

$awqs++;
//$q_wsale[$wqs]=$q;
$p_single[$awqs]=$psingle;

//print"$psingle <br>";


$q=0;
$t=0;
$tax=0;
$profit=0;
$ptyy=0;
$pty=0;
}






for($i=1;$i<=$w;$i++)
{
$total_price_sale=0;
$result = mysql_query("SELECT * FROM `saleproduct` where  product_id='$p_id[$i]' ORDER BY `adat` ");
while ($a_row = mysql_fetch_row($result)) {

	foreach ($a_row as $field) {
		
	}


$tq++;
$q=$q+$a_row[6];
$tax=$tax+$a_row[15];
$aui=$a_row[8]/$a_row[6];

$aui = number_format($aui, 3);
$aui=str_replace(",","","$aui");




$pty=$aui-$a_row[14];

$pty=$pty*$a_row[6];
$ptyy=$ptyy+$pty;
$profit=$profit+$a_row[16];
$ppp=$a_row[7];
$mtt=$a_row[17];
$ptt=$a_row[19];
$preo=$a_row[8]-$a_row[25];
$total_price_sale=$total_price_sale+$a_row[8];
}


$tp20=$tp20+$total_price_sale;
$t=$ppp*$q;
$qs++;
$q_sale[$qs]=$q;
$q_price[$qs]=$total_price_sale;
$prrp[$qs]=$ptyy;
$tax1=$tax1+$tax;
$t1=$t1+$t;
$profit1=$profit1+$profit;
$q10=$q10+$q;
$q=0;
$t=0;
$tax=0;
$profit=0;
$ptyy=0;
$pty=0;

}













for($i=1;$i<=$w;$i++)
{	
$q_purchase_return=0;
$total_purchase_return=0;

$result = mysql_query("SELECT * FROM `buyproduct_return` where   product_id='$p_id[$i]' ORDER BY `adat` ");

while ($a_row = mysql_fetch_row($result)) {

	foreach ($a_row as $field) {
		
	}
$q_purchase_return=$q_purchase_return+$a_row[6];
$total_purchase_return=$total_purchase_return+$a_row[8];

}
$wqs_purchase_return++;
$q_wsale_purchase_return[$wqs_purchase_return]=$q_purchase_return;
$total_price_purchase_return[$wqs_purchase_return]=$total_purchase_return;
$q_purchase_return=0;
$total_purchase_return=0;

}






for($i=1;$i<=$w;$i++)
{	
$q_return=0;
$total_return=0;
$result = mysql_query("SELECT * FROM `saleproduct_return` where   product_id='$p_id[$i]' ORDER BY `adat` ");

while ($a_row = mysql_fetch_row($result)) {

	foreach ($a_row as $field) {
		
	}
$q_return=$q_return+$a_row[6];
//$total_return=$total_return+$a_row[25];
}

$wqs_return++;
$q_wsale_return[$wqs_return]=$q_return;
//$total_price_return[$wqs_return]=$total_return;
$q_return=0;
$total_return=0;

}











//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


$q=0;
$t=0;
$q1=0;


for($i=1;$i<=$w;$i++)
{


$total_price=0;
$net_amount=0;

$result = mysql_query("SELECT * FROM `buyproduct` where  product_id='$p_id[$i]' ");

while ($a_row = mysql_fetch_row($result)) {

	foreach ($a_row as $field) {
		
	}


$q=$q+$a_row[6];
$aaa=$a_row[14];
$bbb=$a_row[16];
$ppp=$a_row[7];

$total_price=$total_price+$a_row[8];

}


$ew++;
$total_price=$total_price+$stp_price[$ew];
$q=$q+$stp[$ew];
$tp=$tp+$total_price;
$t=$ppp*$q;


if($total_price>0)
{
$single=$total_price/$q;	
}
else
{
$single=0;	
}


$w8++;
$stock_q=$q-$q_sale[$ew];



$stock_q=$stock_q-$q_wsale_purchase_return[$ew];
$stock_q=$stock_q+$q_wsale_return[$ew];







$pry[$w8]=$stock_q;

$net_amount=$p_single[$w8]*$pry[$w8];
$net_amountn[$w8]=$net_amount;


//print"$stock_q  -  $net_amount";



$sql= "UPDATE  `product_name` SET `tq_product`='$pry[$w8]' WHERE `user_id`='$p_id[$i]'";
mysql_query($sql);

$sql= "UPDATE  `product_name` SET `tq_amount`='$net_amount' WHERE `user_id`='$p_id[$i]'";
mysql_query($sql);



$stock_p=$stock_q*$single;
$stock_qq=$stock_qq+$stock_q;
$stock_pp=$stock_pp+$stock_p;
$per_product=$total_price/$q;
$per_product = number_format($per_product, 3);
$per_product=str_replace(",","","$per_product");
$per_sale_product= $q_price[$ew]/$q_sale[$ew];
$per_sale_product = number_format($per_sale_product, 3);
$per_sale_product=str_replace(",","","$per_sale_product");
$prot=$per_sale_product-$per_product;
$profit_t=$q_sale[$ew]*$prot;
$profit_total=$profit_total+$profit_t;
$total_q=$total_q+$q;
$total_t=$total_t+$t;
$tpyy=$tpyy+$prrp[$ew];
$q=0;
$t=0;

//print" $pry[$w8] - $net_amount <br>";

}



















//print" <br> $adat - $dat-$mon- $yer - $money_id";
//print" $suppliern - $address - Mobile- $mobile  ";









print"
<html>
<head>
<meta http-equiv='content-type' content='text/html;charset=utf-8' />
<title> Welcome to purchase memo  </title>
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
<td width='130' align='center' bgcolor='$set_bg_color'  height='40' id='kh'> <b> Purchase  </b>  </td>
</tr>
<tr> <td align='center' height='10'>  </td></tr>
</table>












<table align='center' width='990' cellpadding='0' cellspacing='1' bgcolor='black'>
<tr>
<td bgcolor='white' align='center'>

<table align='center' width='1000' cellpadding='0' cellspacing='0' bgcolor='black'>
<tr bgcolor='white'> 
<td align='left' height='30' bgcolor='white' width='160'> 
&nbsp; <font face='arial' size='4'> <b> Purchase No </b>     </font> 
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
&nbsp; <font face='arial' size='4'>  <b> Purchase No : </b> $money_id  </font>  </td>


<td width='350' align='right'>
<font face='arial' size='4'>  <b> Date : </b>    </font>
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

<br>


";





*/















/*
print"
<table align='center' width='1000' cellpadding='0' cellspacing='0'>
<tr> <td align='center' height='10'>  </td></tr>
<tr> 
<td width='300' align='left'><a href=\"purchase.php?action=removee&i5d=$arrp[0]\"> <font face='arial' size='4' color='black'> Sl No./ Memo No: <b> $money_id </b> </font> </a> </td>
<td width='130' align='center' bgcolor='$set_bg_color' id='kh' height='40'>  <b> Purchase </b> </font> </td>
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
<tr> <td align='left' height='30' bgcolor='white'> &nbsp;	 <font face='arial' szie='3'> Sold By : <b> $u_namee </b> </font>  </td></tr>
</table>


";


*/





print"


<table align='center' width='1000' cellpadding='0' cellspacing='0'>
<tr>
<td width='20' height='3' align='center'> <font face='arial' size='4'></font> </td> 
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
 <td width='30' height='25' align='center'> <font face='arial' size='4'> <b> Sl. </b> </font> </td> 
 <td width='300' align='center'><font face='arial' size='4'> <b> Product Name </b> </font> </td>
"; 
 

include_once('mm.php');
 
 
 print"
 
 <td width='100' align='center'><font face='arial' size='4'> <b> Qty. </b> </font> </td> 
 <td width='100' align='center'><font face='arial' size='4'> <b> Unit </b> </font> </td> 
 <td width='100' align='center'><font face='arial' size='4'> <b>  Rate </b> </font> </td>
 
 
";



/*
 <td width='100' align='center'><font face='arial' size='4'> <b>  Comission </b> </font> </td>
 */
 
 
 print"
 
 <td width='100' align='right'><font face='arial' size='4'> <b> Total </b> &nbsp; </font> </td> 
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


foreach($_SESSION['cart_unique'] as $product_id_unique => $quantity)
{


$e++;
$w++;

$w5++;

$product_id=$product_id_other[$e];



 
$sql="SELECT * FROM `product_name` WHERE user_id='$product_id' ";
$result=mysql_query($sql);
$arrp_new=mysql_fetch_array($result);



$arrp[20]=$price_a[$e];
$total=$arrp[20]*$quantity;


$tq_p=$quantity+$arrp_new[24];
$tq_a=$total+$arrp_new[25];
$final_price=$tq_a/$tq_p;


$final_price = number_format($final_price, 3);
$final_price=str_replace(",","","$final_price");


$final_price=$final_price+$qll;


$sql= "UPDATE  `product_name` SET `buying_price`='$final_price' WHERE `user_id`='$product_id'";
mysql_query($sql);




$total3=$total;
$total=$total-$arrp_new[19];
$subtotal=$subtotal+$total;
$st=$arrp_new[11];
$lesst=$lesst+$arrp_new[19];






$sql="SELECT * FROM `product_category` WHERE user_id='$arrp[1]' ";
$result=mysql_query($sql);
$name=mysql_fetch_array($result);




print"
<tr bgcolor='white'>
 <td width='' align='center' height='25'> <font face='arial' size='4'>   $w5 </font> </td> 
 <td width='' align='left'><font face='arial' size='4'>    $arrp_new[2]    $name5[1] </font> </td>
 
 
 ";
 
 
 if($cwp1==1)
 {
 print"
 <td height='25' bgcolor='' width='' align='center'> <font face='arial' color='black' size='4'> $arrp_new[3] </font> </td>
 ";
}


 if($cwp2==1)
 {
print"
 <td height='25' bgcolor='' width='' align='center'> <font face='arial' color='black' size='4'> $arrp_new[30] </font> </td>
 ";
}


 if($cwp3==1)
 {
print"
 <td height='25' bgcolor='' width='' align='center'> <font face='arial' color='black' size='4'> $arrp_new[31] </font> </td>
 ";
 }
 
 if($cwp4==1)
 {
 print"
 <td height='25' bgcolor='' width='' align='center'> <font face='arial' color='black' size='4'> $arrp_new[32] </font> </td>
 ";
 }

print"
 
 
 
 

 

 
 <td width='' align='center'><font face='arial' size='4'>   $quantity   </font> </td>  
 <td width='' align='center'><font face='arial' size='4'>    $arrp_new[22] </font> </td>
<td width='' align='center'><font face='arial' size='4'>    $arrp[20] </font> </td>

 
 ";
 
 
 /*
 <td width='50' align='center'><font face='arial' size='4'>    $arrp[19] </font> </td>
*/

print"
 <td width='100' align='right'><font face='arial' size='4'> &nbsp;   $total  &nbsp; </font> </td> 
</tr>

";



$arrp_new[2]="$arrp_new[2]";


$sql = "INSERT INTO `buyproduct` (`user_id`, `money_id`, `supplier_id`, `supplier_name`, `product_id`, `product_name`, `qty`, `price`, `total`, `dat`, `mon`, `yer`, `adat`, `t4`, `m_type`, `m_id`, `p_type`, `p_id`, `user`, `commission`, `unit`, `final_price`, `money_id2`, `u_id2`, `model`, `brand`, `capacity`, `origion`, `branch_id`, `branch_using_id`) VALUES ('','$money_id','$supplier','$suppliern','$product_id','$arrp_new[2]','$quantity','$arrp[20]','$total','$dat','$mon','$yer','$adat','$t4','$arrpm[1]',' $arrpm[0]','$name[1]','$arrpt[0]','$u_namee','$arrp_new[19]','$arrp_new[22]','$final_price','$money_id2','$u_idd','$arrp_new[3]','$arrp_new[30]','$arrp_new[31]','$arrp_new[32]','$go_other[$e]','$go_id_new')";
mysql_query($sql);





$st=$st+$quantity;

$sql= "UPDATE  `product_name` SET `total_product`='$st' WHERE `user_id`='$product_id'";
mysql_query($sql);


}


/*


print"
<tr bgcolor='white'>
 <td width='30' align='center' height='25'> <font face='arial' size='4'>     </font> </td> 
 <td width='300' align='left'><font face='arial' size='4'>  &nbsp;&nbsp;&nbsp;   </font> </td>
 
 <td width='100' align='center'><font face='arial' size='4'>     </font> </td> 

 <td width='50' align='center'><font face='arial' size='4'>     </font> </td>

  <td width='50' align='center'><font face='arial' size='4'>     </font> </td>

 
 <td width='50' align='center'><font face='arial' size='4'>    $lesst </font> </td>

 <td width='100' align='center'><font face='arial' size='4'>     </font> </td> 
</tr>

";

*/




$stotal=$subtotal+$less;

$stotal=$stotal-$discount;

$stotal=$stotal+$car;


$pa2=$payment+$adjust;


//$tax=0.00;



if($supplier==$stock_issu_new)
{
$pa2=$stotal;
$payment=$stotal;
}



$due=$stotal-$pa2;


if($payment>0)
{
$pr="Payment : $payment";
}

if($adjust>0)
{
$adj="Adjust Amount : $adjust $pr ";

$commentss="$suppliern  Adjust  Payment      $comments ";
$credit=2;
$sql = "INSERT INTO `supplier_advance` (`user_id`, `bank_name`,`credit`, `amount`,`comments`,`dat`, `mon`, `yer`, `money_id`, `adat`, `user`, `money_id2`, `u_id2`) VALUES ('','$u','$credit','$adjust','$commentss','$dat','$mon','$yer','$money_id','$adat','$u_namee','$money_id2','$u_idd')";
mysql_query($sql);	

}





if($e>0)
{
$sql = "INSERT INTO `buymemo` (`user_id`, `money_id`, `supplier_id`, `supplier_name`, `product_item`, `total_money`, `less`, `joma`, `due`, `dat`, `mon`, `yer`, `adat`, `t4`, `comments`, `paymenttype`, `mobile`, `user`, `commission`, `money_id2`, `u_id2`, `discount`, `adjust`, `car`, `branch_id`, `branch_using_id`) VALUES ('','$money_id','$supplier','$suppliern','$e','$subtotal','$car','$pa2','$due','$dat','$mon','$yer','$adat','$t4','$comments','$address','$mobile','$u_namee','$lesst','$money_id2','$u_idd','$discount','$adjust','$car','','$go_id_new')";
mysql_query($sql);





$commentss="$suppliern  Purchase  $comments";
$credit=1;
$sql = "INSERT INTO `supplier_laser` (`user_id`, `bank_name`,`credit`, `amount`,`comments`,`dat`, `mon`, `yer`, `money_id`, `adat`, `user`, `shipment`, `commission`, `money_id2`, `u_id2`) VALUES ('','$u','$credit','$stotal','$commentss','$dat','$mon','$yer','$money_id','$adat','$u_namee','$car','$discount','$money_id2','$u_idd')";
mysql_query($sql);







if($payment!=0 && $payment!="" || $adjust>0)
{
$commentss="$suppliern  Purchase $payment_moden Payment  $adj    $comments ";
$credit=2;
$sql = "INSERT INTO `supplier_laser` (`user_id`, `bank_name`,`credit`, `amount`,`comments`,`dat`, `mon`, `yer`, `money_id`, `adat`, `user`, `money_id2`, `u_id2`) VALUES ('','$u','$credit','$pa2','$commentss','$dat','$mon','$yer','$money_id','$adat','$u_namee','$money_id2','$u_idd')";
mysql_query($sql);	
}










if($payment_mode=="")
{

if($payment!=0 && $payment!="" && $supplier!=$stock_issu_new)
{
$commentss="$suppliern  On Purchase  $payment_moden Payment $comments";
$credit=2;
$sql = "INSERT INTO `cash_book` (`user_id`, `money_id`, `dat`, `mon`, `yer`, `adat`, `time`, `comments`, `debit`, `credit`, `balance`, `user`, `money_id2`, `u_id2`) VALUES ('','$money_id','$dat','$mon','$yer','$adat','$time','$commentss','$debit','$credit','$payment','$u_namee','$money_id2','$u_idd')";
mysql_query($sql);
}


}
else
{


if($payment!=0 && $payment!="" && $supplier!=$stock_issu_new)
{
$commentss=" $suppliern  On Purchase $payment_moden Payment $comments   ";
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
<td width='750'> </td>
<td align='center' width='250'> 

<table align='center' width='250' cellpadding='3' cellspacing='1' bgcolor='black'>

<tr bgcolor='white'>
 <td width='156' height='25' bgcolor='' align='left'> <font face='arial' size='4'> Total Amount   </font> </td> 
 <td width='93' align='right'> <font face='arial' size='4'>  $subtotal &nbsp; </font> </td> 
</tr>


<tr bgcolor='white'>
 <td width='' height='25' bgcolor='' align='left'> <font face='arial' size='4'> Discount   </font> </td> 
 <td width='' align='right'> <font face='arial' size='4'>  $discount &nbsp; </font> </td> 
</tr>
";

print"
<tr bgcolor='white'>
 <td width='' height='25' bgcolor='' align='left'> <font face='arial' size='4'> Carring Cost   </font> </td> 
 <td width='' align='right'> <font face='arial' size='4'>  $car &nbsp; </font> </td> 
</tr>
";

print"
<tr bgcolor='white'>
 <td width='' height='25' bgcolor='' align='left'> <font face='arial' size='4'> Sub Total   </font> </td> 
 <td width='' align='right'> <font face='arial' size='4'>  $stotal &nbsp; </font> </td> 
</tr>


<tr bgcolor='white'>
 <td width='' height='25' bgcolor='' align='left'> <font face='arial' size='4'> Payment Amount   </font> </td> 
 <td width='' align='right'> <font face='arial' size='4'>  $payment &nbsp; </font> </td> 
</tr>





<tr bgcolor='white'>
 <td width='' height='25' bgcolor='' align='left'> <font face='arial' size='4'> Adjust Amount  </font> </td> 
 <td width='' align='right'> <font face='arial' size='4'>  $adjust &nbsp; </font> </td> 
</tr>




<tr bgcolor='white'>
 <td width='' height='25' bgcolor='' align='left'>  <font face='arial' size='4'> Due Amount  </font>  </td> 
 <td width='' align='right'>  <font face='arial' size='4'>  $due &nbsp;  </font>  </td> 
</tr>



</table>
</td>
</tr>





</table>













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
include_once('convert4mm.php');
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





include_once('sign_p.php');


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






//unset($_SESSION['cart']);


unset($_SESSION['cart_unique']);
unset($_SESSION['cart_go']);


unset($_SESSION['cart']);
unset($_SESSION['cart_price']);
unset($_SESSION['cart_unit']);
unset($_SESSION['cart_com']);
unset($_SESSION['cart_id']);
unset($_SESSION['cart_local']);



//session_unset($_SESSION['cart']);


//session_start();

//$user_name=$_SESSION['color1'];
//$password=$_SESSION['color2'];


//set($_SESSION['cart']);

//session_destroy($_SESSION['cart']);


print"
</body>

</head>

</html>



";


?>