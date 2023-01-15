<?php
include_once('dbconnection.php');

session_start();

$con=trim($_POST['con']);

//print"$con";


$supplier=trim($_POST['supplier']);



//$memo_no= time().$u_idd;



foreach($_SESSION['cart'] as $product_id_unique => $quantity)
{
$wh++;
}




$dat=trim($_POST['dat']);
$mon=trim($_POST['mon']);
$yer=trim($_POST['yer']);




/*
$result = mysql_query("SELECT * FROM `salememo` where tf!='1'  ORDER BY `money_id` DESC  LIMIT 0 , 1 ");

while ($a_row = mysql_fetch_row($result)) {

	foreach ($a_row as $field) {
		
	}

$num=$a_row[1];

}



$me=$num;
$memo_no=$me+1;

*/











$ddddd=trim($_POST['ddddd']);






if($yer==2016 && $wh>0)
{

if($ddddd=="")
{
$sql = "INSERT INTO `sl_memo_2016` (`user_id`, `name`) VALUES ('','1')";
mysql_query($sql);
}

$result = mysql_query("SELECT * FROM `sl_memo_2016`  ORDER BY `user_id` DESC  LIMIT 0 , 1 ");


while ($a_row = mysql_fetch_row($result)) {

	foreach ($a_row as $field) {
		
	}

$num=$a_row[0];

}

$me=$num;
$memo_no=$me;

}













if($yer==2017 && $wh>0)
{

if($ddddd=="")
{
$sql = "INSERT INTO `sl_memo_2017` (`user_id`, `name`) VALUES ('','1')";
mysql_query($sql);
}

$result = mysql_query("SELECT * FROM `sl_memo_2017`  ORDER BY `user_id` DESC  LIMIT 0 , 1 ");


while ($a_row = mysql_fetch_row($result)) {

	foreach ($a_row as $field) {
		
	}

$num=$a_row[0];

}

$me=$num;
$memo_no=$me;

}








if($yer==2018 && $wh>0)
{

if($ddddd=="")
{
$sql = "INSERT INTO `sl_memo_2018` (`user_id`, `name`) VALUES ('','1')";
mysql_query($sql);
}

$result = mysql_query("SELECT * FROM `sl_memo_2018`  ORDER BY `user_id` DESC  LIMIT 0 , 1 ");


while ($a_row = mysql_fetch_row($result)) {

	foreach ($a_row as $field) {
		
	}

$num=$a_row[0];

}

$me=$num;
$memo_no=$me;

}













if($yer==2019 && $wh>0)
{

if($ddddd=="")
{
$sql = "INSERT INTO `sl_memo_2019` (`user_id`, `name`) VALUES ('','1')";
mysql_query($sql);
}

$result = mysql_query("SELECT * FROM `sl_memo_2019`  ORDER BY `user_id` DESC  LIMIT 0 , 1 ");


while ($a_row = mysql_fetch_row($result)) {

	foreach ($a_row as $field) {
		
	}

$num=$a_row[0];

}

$me=$num;
$memo_no=$me;

}









if($yer==2020 && $wh>0)
{

if($ddddd=="")
{
$sql = "INSERT INTO `sl_memo_2020` (`user_id`, `name`) VALUES ('','1')";
mysql_query($sql);
}

$result = mysql_query("SELECT * FROM `sl_memo_2020`  ORDER BY `user_id` DESC  LIMIT 0 , 1 ");


while ($a_row = mysql_fetch_row($result)) {

	foreach ($a_row as $field) {
		
	}

$num=$a_row[0];

}

$me=$num;
$memo_no=$me;

}









if($yer==2021 && $wh>0)
{

if($ddddd=="")
{
$sql = "INSERT INTO `sl_memo_2021` (`user_id`, `name`) VALUES ('','1')";
mysql_query($sql);
}

$result = mysql_query("SELECT * FROM `sl_memo_2021`  ORDER BY `user_id` DESC  LIMIT 0 , 1 ");


while ($a_row = mysql_fetch_row($result)) {

	foreach ($a_row as $field) {
		
	}

$num=$a_row[0];

}

$me=$num;
$memo_no=$me;

}




















if($ddddd==100)
{
$memo_no=trim($_POST['memo_no']);
}




$sf=trim($_POST['sf']);

if($sf==100)
{

$subtotal=trim($_POST['subtotal']);

$memo_no= time().$u_idd;

$id_supplier=trim($_POST['supplier']);

$idn_s=strlen($id_supplier);

for($lk=0;$lk<=$idn_s;$lk++)
{
if($id_supplier[$lk]=='=')
{
$rty++;	
}

if($rty==1)
{
	$rkk++;
	if($rkk>1)
	{
$idvalue_s="$idvalue_s$id_supplier[$lk]";
	}	
}
	
}







}


$ak=trim($_POST['ak']);
$s45=trim($_POST['s45']);




if($ak==100)
{
$cn=1;
$sql= "UPDATE  `salememo_order` SET `confirm`='$cn' WHERE `user_id`='$s45'";
mysql_query($sql);
}


$id_sus=trim($_POST['id_sus']);

if($id_sus>0)
{
$cn=1;
$sql= "UPDATE  `salememo_order` SET `confirm`='$cn' WHERE `user_id`='$id_sus'";
mysql_query($sql);	
}



if($supplier==0)
{
print"<h1> You Are Not Select Customer please select customer </h1>";
exit;

}















$new_customer=trim($_POST['new_customer']);
$new_address=trim($_POST['new_address']);
$new_mobile=trim($_POST['new_mobile']);
$new_name=trim($_POST['new_name']);


$new_address=str_replace("'","`","$new_address");
$new_name=str_replace("'","`","$new_name");
$new_mobile=str_replace("'","`","$new_mobile");






$service=trim($_POST['service']);

$adjust=trim($_POST['adjust_amount']);

$comission_to=trim($_POST['comission_to']);
$comission_amount=trim($_POST['comission_amount']);






$dcl=trim($_POST['dcl']);
$tin=trim($_POST['tin']);



//print"$new_customer - $new_mobile - $new_address";

//exit;



$memo_no2=trim($_POST['m_id2']);






$vat=trim($_POST['vat']);
$tax2=trim($_POST['tax2']);




$sppp=1;

$sql="SELECT * FROM `sms_p` WHERE user_id='$sppp'";
$result=mysql_query($sql);
$arr_sp=mysql_fetch_array($result);

$sp_user=$arr_sp[1];
$sp_pass=$arr_sp[2];






if($ddddd==100 && $wh>0)
{
$result = mysql_query("DELETE FROM salememo WHERE money_id=$memo_no");
$result = mysql_query("DELETE FROM cash_book WHERE money_id2=$memo_no2");
$result = mysql_query("DELETE FROM saleproduct WHERE money_id=$memo_no");
$result = mysql_query("DELETE FROM customer_laser WHERE money_id2=$memo_no2");

$result = mysql_query("DELETE FROM customer_advance WHERE money_id2=$memo_no2");

$result = mysql_query("DELETE FROM bank_refill WHERE money_id2=$memo_no2");
$result = mysql_query("DELETE FROM check_entry WHERE money_id2=$memo_no2");
$result = mysql_query("DELETE FROM salememo_return WHERE money_id2=$memo_no2");
$result = mysql_query("DELETE FROM saleproduct_return WHERE money_id2=$memo_no2");
}








$ser=trim($_POST['ser']);
$less=trim($_POST['less']);
$payment=trim($_POST['payment']);


$po_no=trim($_POST['po_no']);
$d_no=trim($_POST['d_no']);

$project_name=trim($_POST['project_name']);



$transport_name=trim($_POST['transport_name']);
$contact_name=trim($_POST['contact_name']);
$contact_name1=trim($_POST['contact_name1']);


$order_no=trim($_POST['sales_order']);


$order_no=str_replace("'","`","$order_no");



if($order_no!="")
{
    
$pocom="PO NO : $order_no";    
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




if($new_name!="")
{
$suppliern="$new_name";	
}

if($new_address!="")
{
$address=$new_address;
}

if($new_mobile!="")
{
$mobile=$new_mobile;
}











$sql="SELECT * FROM `contact` WHERE user_id='$contact_name' ";
$result=mysql_query($sql);
$arrsco=mysql_fetch_array($result);
$contact_namen=$arrsco[1];


$mobile_contact=$arrsco[3];
$address_contact=$arrsco[5];



$sql="SELECT * FROM `contact1` WHERE user_id='$contact_name1' ";
$result=mysql_query($sql);
$arrsco1=mysql_fetch_array($result);
$contact_namen1=$arrsco1[1];


$mobile_contact1=$arrsco1[3];
$address_contact1=$arrsco1[5];







if($contact_namen=="")
{

$contact_namen=trim($_POST['contact_name']);
$mobile_contact=trim($_POST['mobile_contact']);
$address_contact=trim($_POST['address_contact']);
}


if($contact_namen1=="")
{

$contact_namen1=trim($_POST['contact_name1']);
$mobile_contact1=trim($_POST['mobile_contact1']);
$address_contact1=trim($_POST['address_contact1']);

		
}













//$money_id= time().$u;



$money_id2= time().$u_idd;

$money_id=$memo_no;



//$contact_name=$contact_new;













$dt = new DateTime();
$k=$dt->format('H:i:s');





$t1="$k[0]$k[1]";

$t2="$k[3]$k[4]";

$t3="$k[6]$k[7]";


$t1=$t1-6;



$t4="$t1-$t2";







/*

$bbb=time(); 
$d=date("m/d/y",$bbb); 
$mon="$d[0]$d[1]";
$dat="$d[3]$d[4]";
$yer="20$d[6]$d[7]";

*/


$adat="$yer$mon$dat";


$iadat="$iyer$imon$idat";





if($payment_mode!="" && $check_amount!="")
{

$sql = "INSERT INTO `check_entry` (`user_id`, `customer_name`, `customer_id`, `mobile`, `address`, `bank_name`, `check_no`, `amount`, `dat`, `mon`, `yer`, `adat`, `idat`, `imon`, `iyer`, `iadat`, `active`, `comments`, `bank_id`, `money_id`, `account_no`, `u_name`, `money_id2`, `u_id2`) VALUES ('','$suppliern','$supplier','$mobile','$address','$payment_moden','$check_no','$check_amount','$dat','$mon','$yer','$adat','$idat','$imon','$iyer','$iadat','$active','$comments','$payment_mode','$money_id','$bank_account_no','$u_namee','$money_id2','$u_idd')";
mysql_query($sql);
	
}









//print" <br> $adat - $dat-$mon- $yer - $money_id";

//print" $suppliern - $address - Mobile- $mobile  ";






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

<script language='javascript'>

function on()
{
window.print();
//window.location.replace('http://74.91.27.226/~ssss/c3/sales.php'); 
}

</script>


</head>

<body bgcolor='' onload='on()'>
";

print"
<table align='left' width='1000' cellpadding='0' cellspacing='0'>

<tr> 
<td width='1000' align='left'> 
";




if($address_off==1)
{
include_once('address.php');
}


if($set_pad==4)
{
include_once('address.php');
}







print"
<table align='center' width='$set_wd' cellpadding='0' cellspacing='0'>
<tr> <td align='center' height='10'>  </td></tr>
<tr> 
<td width='130' align='center' bgcolor='$set_bg_color'  height='40' id='kh'> <b> Sales Invoice  </b>  </td>
</tr>
<tr> <td align='center' height='10'>  </td></tr>
</table>





<table align='center' width='990' cellpadding='0' cellspacing='1' bgcolor='black'>
<tr>
<td bgcolor='white' align='center'>

<table align='center' width='1000' cellpadding='0' cellspacing='0' bgcolor='black'>
<tr bgcolor='white'> 
<td align='left' height='30' bgcolor='white' width='160'> 
&nbsp; <font face='arial' size='4'> <b> Invoice No </b>     </font> 
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
";



if($order_no!="")
{
print"
<table align='center' width='1000' cellpadding='0' cellspacing='0' bgcolor='black'>
<tr bgcolor='white'> 
<td align='left' height='30' bgcolor='white' width='160'> 
&nbsp; <font face='arial' size='4'> <b> PO No </b>     </font> 
</td>

<td align='left' height='30' bgcolor='white' width='840'> 
&nbsp; <font face='arial' size='4'> <b>  : </b>  $order_no    </font> 
</td>
</tr>
</table>
";
}




print"
<table align='center' width='600' cellpadding='0' cellspacing='0' bgcolor=''>
<tr> <td align='left' height='1' bgcolor=''>   </td></tr>
</table>






<table align='center' width='1000' cellpadding='0' cellspacing='0' bgcolor='black'>
<tr bgcolor='white'> 


<td align='left' height='30' bgcolor='white' width='160'> 
&nbsp; <font face='arial' size='4'>  <b> Customer Name  </b>   </font>  </td>

<td align='left' height='30' bgcolor='white' width='840'> 
&nbsp; <font face='arial' size='5'>  <b> :   </b>   $suppliern </font>  </td>

";






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

<td align='left' height='30' bgcolor='white' width='840'> &nbsp;	 <font face='arial' size='4'> <b> : </b>  $address   
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
<font face='arial' size='4'>   <b>  </b> $mobile_contact_old  </font> 
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





<table align='center' width='1000' cellpadding='3' cellspacing='1' bgcolor='black'>

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
 
 if($set_wa==1)
 {
 print"
 <td width='100' align='center'><font face='arial' size='4'> <b> Warranty </b> </font> </td> 
 ";
 }
 
 
 print"
 
 <td width='100' align='center'><font face='arial' size='4'> <b>  Rate  </b> </font> </td>
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

foreach($_SESSION['cart_wa'] as $product_id_unique => $wa)
{
$qeu++;
$local_wa[$qeu]=$wa;
}


$qeu=0;

foreach($_SESSION['cart_other'] as $product_id_unique => $wa_other)
{
$qeu++;
$local_other[$qeu]=$wa_other;
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

$pto++;

$qg++;

$product_id=$product_id_other[$qg];

$sql="SELECT * FROM `product_name` WHERE user_id='$product_id' ";
$result=mysql_query($sql);
$arrp_new=mysql_fetch_array($result);



$arrp[21]=$price_a[$qg];
$arrp[19]=$com_a[$qg];
$arrp[29]=$local_a[$qg];



if($supplier==$stock_issu_customer)
{

$arrp_new[4]=$arrp[21];

$profit=$arrp[21]-$arrp_new[4];
$profit=$profit*$quantity;
}
else
{
$profit=$arrp[21]-$arrp_new[4];
$profit=$profit*$quantity;
}



$total=$arrp[21]*$quantity;
$total3=$total;








$f_p=$arrp[19];
$f_len=strlen($f_p);
$f_u=$f_len-1;
$f_pp=str_replace("%","","$f_p");


if($f_p[$f_u]=='%')
{
$tg=$total*$f_pp;
$tg=$tg/100;
$arrp[19]=$tg;
$f_ppe="$f_pp%";
}
else
{
$f_ppe="";
}









$total=$total-$arrp[19];
$lesst=$lesst+$arrp[19];

$comm=$arrp[19];

if($sf!=100)
{
$subtotal=$subtotal+$total;
}




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
 <td width=''  align='center' height='15'> <font face='arial' size='4'>   $w   </font> </td> 
 <td width='' align='left'><font face='arial' size='4'>   $arrp_new[2] $local_other[$qg]  $arrp[29]  $nametest[1]  </font> </td>
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
 <td width='' align='center'><font face='arial' size='4'>   $quantity   </font> </td> 
 <td width='' align='center'><font face='arial' size='4'>   $arrp_new[22]   </font> </td> 
 
 ";
 
 if($set_wa==1)
{
 print"
 <td width='' align='center'><font face='arial' size='4'>   $local_wa[$w]   </font> </td> 
 ";
}
 


$arow8= number_format($arrp[21], 2);


 
 print"
 <td width=''  align='right'><font face='arial' size='4'>    $arrp_old[22] $arow8 &nbsp;  </font> </td>
";

if($set_discount==1)
{

 if($f_p[$f_u]=='%')
 {
print"
 <td height='30' bgcolor='' width='' align='left'> <font face='arial'  size='4'> $f_pp % = $arrp[19] </font> </td>
";

 }
 else
 {
print"
 <td height='30' bgcolor='' width='' align='left'> <font face='arial'  size='4'> $arrp[19] </font> </td>
";
	 
 }
	 
	 
 
}
 
 


$total_f= number_format($total, 2);

 
print"
 
 <td width='' align='right'><font face='arial' size='4'>   $total_f  &nbsp; </font> </td> 
</tr>

";


$stotalxx=$stotalxx+$total;
$txy=1;







	
	
	
	






/*
$sql = "INSERT INTO `saleproduct` (`user_id`, `money_id`, `supplier_id`, `supplier_name`, `product_id`, `product_name`, `qty`, `price`, `total`, `dat`, `mon`, `yer`, `adat`, `t4`, `m_type`, `m_id`, `p_type`, `p_id`, `user`) VALUES ('','$money_id','$supplier','$suppliern','$product_id','$arrp[2]','$quantity','$arrp[4]','$total','$dat','$mon','$yer','$adat','$t4','$arrpm[1]',' $arrpm[0]','$name[1]','$arrpt[0]','$u_namee')";
mysql_query($sql);

*/





$sql = "INSERT INTO `saleproduct` (`user_id`, `money_id`, `supplier_id`, `supplier_name`, `product_id`, `product_name`, `qty`, `price`, `total`, `dat`, `mon`, `yer`, `adat`, `t4`,`buy`, `tax1`, `profit`, `m_type`, `m_id`, `p_type`, `p_id`, `user`, `commission`, `po_no`, `d_no`, `unit`, `project_name`, `u_idd`, `money_id2`, `p_des`, `pe`, `wa`, `brand`, `capacity`, `origion`, `model`, `contact_name`, `other`, `branch_id`, `branch_using_id`) VALUES ('','$money_id','$supplier','$suppliern','$product_id','$arrp_new[2]','$quantity','$arrp[21]','$total','$dat','$mon','$yer','$adat','$t4','$arrp_new[4]','$tax1','$profit','$arrpm[1]',' $arrpm[0]','$name[1]','$arrpt[0]','$u_namee','$comm','$po_no','$d_no','$arrp_new[22]','$project_name','$u_idd','$money_id2','$arrp[29]','$f_ppe','$local_wa[$w]','$arrp_new[30]','$arrp_new[31]','$arrp_new[32]','$arrp_new[3]','$contact_name','$local_other[$qg]','$go_other[$qg]','$go_id_new')";
mysql_query($sql);



$stq=$stq+$quantity;

/*
$sql= "UPDATE  `product_name` SET `total_product`='$st' WHERE `user_id`='$product_id'";
mysql_query($sql);
*/



//print"$st <br>";

$sql= "UPDATE  `product_name` SET `sale_product`='$st' WHERE `user_id`='$product_id'";
mysql_query($sql);

}




print"
</table>
";









/*
print"
<tr bgcolor='white'>
<td width='30' align='center' height='25'> <font face='arial' size='4'>     </font></td> 
<td width='300' align='left'><font face='arial' size='4'>    </font> </td>
<td width='100' align='center'><font face='arial' size='4'> $stq    </font> </td> 
<td width='50' align='center'><font face='arial' size='4'>     </font> </td> 
<td width='50' align='center'><font face='arial' size='4'>    </font> </td> 
<td width='50' align='center'><font face='arial' size='4'>    $lesst </font> </td> 
<td width='100' align='center'><font face='arial' size='4'>     </font> </td> 
</tr>
";
*/









$discount_less=trim($_POST['discount_less']);

$discount_less2=trim($_POST['discount_less']);




$f_p_dis=$discount_less;
$f_len_dis=strlen($f_p_dis);
$f_u_dis=$f_len_dis-1;
$f_pp_dis=str_replace("%","","$f_p_dis");


if($f_p_dis[$f_u_dis]=='%')
{
$tg_dis=$subtotal*$f_pp_dis;
$tg_dis=$tg_dis/100;
$discount_less=$tg_dis;
$f_ppe_dis="$f_pp_dis%";
}
else
{
$f_ppe_dis="";
}



$f_ppe_dis=trim($_POST['discount_lessp']);






$subtotal_last=$subtotal-$discount_less;


$stotal=$subtotal_last+$less;



$stotal=$stotal+$service;













$stotal_vat=($vat*$stotal);
$stotal_vat=($stotal_vat/100);


$stotal_vat = number_format($stotal_vat, 2);
$vat_tk=str_replace(",","","$stotal_vat");



$stotal_tax=($tax2*$stotal);
$stotal_tax=($stotal_tax/100);


$stotal_tax = number_format($stotal_tax, 2);
$tax2_tk=str_replace(",","","$stotal_tax");



$stotal2=$stotal+$vat_tk+$tax2_tk;









//$tax=0.00;

$due=$stotal2-$payment;


$due=$due-$adjust;

$pa2=$payment+$adjust;



if($supplier==$stock_issu_customer)
{
$pa2=$stotal2;
$payment=$stotal2;
$due=0;
}








$result = mysql_query("SELECT * FROM `customer_laser` where  bank_name='$supplier' && adat<='$adat' ORDER BY `adat` ASC ");



while ($a_row = mysql_fetch_row($result)) {

	foreach ($a_row as $field) {
		
	}





if($a_row[2]==2)
{
$dr=$dr+$a_row[3];
}


if($a_row[2]==1)
{
$cr=$cr+$a_row[3];
}




}


$balance=$cr-$dr;




$pui=$balance+$stotal2;
$new_pui=$pui-$payment;


















if($e>0)
{
	
	/*
$sql = "INSERT INTO `salememo` (`user_id`, `money_id`, `supplier_id`, `supplier_name`, `product_item`, `total_money`, `less`, `joma`, `due`, `dat`, `mon`, `yer`, `adat`, `t4`, `comments`, `paymenttype`, `mobile`, `user`) VALUES ('','$money_id','$supplier','$suppliern','$e','$subtotal','$less','$payment','$due','$dat','$mon','$yer','$adat','$t4','$comments','$address','$mobile','$user')";
mysql_query($sql);
*/





$sql = "INSERT INTO `salememo` (`user_id`, `money_id`, `supplier_id`, `supplier_name`, `product_item`, `total_money`, `less`, `joma`, `due`, `dat`, `mon`, `yer`, `adat`, `t4`, `comments`, `paymenttype`, `tax1`, `subtotal1`, `mobile`, `user`, `commission`, `discount_less`,`pre_bal`, `po_no`, `d_no`, `order_no`, `transport_name`, `contact_name`, `project_name`, `u_idd`, `money_id2`, `vat`, `tax2`, `vat_tk`, `tax2_tk`, `pe`, `address`, `service`, `dcl`, `tin`, `adjust`, `comission_to`, `comission_amount`, `contact_name_new`, `mobile_contact`, `address_contact`, `contact_name_new1`, `mobile_contact1`, `address_contact1`, `branch_id`, `branch_using_id`) VALUES ('','$money_id','$supplier','$suppliern','$e','$subtotal','$less','$pa2','$due','$dat','$mon','$yer','$adat','$t4','$comments','$address','$sty','$stotal','$mobile','$u_namee','$lesst','$discount_less','$balance','$po_no','$d_no','$order_no','$transport_name','$contact_name','$project_name','$u_idd','$money_id2','$vat','$tax2','$vat_tk','$tax2_tk','$f_ppe_dis','$address','$service','$dcl','$tin','$adjust','$comission_to','$comission_amount','$contact_namen','$mobile_contact','$address_contact','$contact_namen1','$mobile_contact1','$address_contact1','$go_other[$qg]','$go_id_new')";
mysql_query($sql);





/*
$sql = "INSERT INTO `salememo` (`user_id`, `money_id`, `supplier_id`, `supplier_name`, `product_item`, `total_money`, `less`, `joma`, `due`, `dat`, `mon`, `yer`, `adat`, `t4`, `comments`, `paymenttype`, `tax1`, `subtotal1`, `mobile`, `user`, `commission`, `discount_less`, `po_no`, `d_no`, `order_no`, `transport_name`, `contact_name`) VALUES ('','$money_id','$supplier','$suppliern','$e','$subtotal','$less','$payment','$due','$dat','$mon','$yer','$adat','$t4','$comments','$address','$sty','$stotal','$mobile','$u_namee','$lesst','$discount_less','$po_no','$d_no','$order_no','$transport_name,'$contact_name')";
mysql_query($sql);
*/






$commentss="$suppliern Sales  $pocom $comments $project_name";




$credit=1;
$sql = "INSERT INTO `customer_laser` (`user_id`, `bank_name`,`credit`, `amount`,`comments`,`dat`, `mon`, `yer`, `money_id`, `adat`, `user`, `shipment`, `commission`, `discount_less`, `money_id2`, `u_id2`, `vat`, `tax2`, `vat_tk`, `tax2_tk`, `contact_name`) VALUES ('','$u','$credit','$stotal2','$commentss','$dat','$mon','$yer','$money_id','$adat','$u_namee','$less','$lesst','$discount_less','$money_id2','$u_idd','$vat','$tax2','$vat_tk','$tax2_tk','$contact_name')";
mysql_query($sql);



if($payment>0)
{
$pio="Payment : $payment";
}


if($adjust>0)
{
$adj="Adjust Amount : $adjust  $pio ";

$commentss="$suppliern payment  $comments ";

$credit=2;
$sql = "INSERT INTO `customer_advance` (`user_id`, `bank_name`,`credit`, `amount`,`comments`,`dat`, `mon`, `yer`, `money_id`, `adat`, `user`, `shipment`, `commission`, `discount_less`, `money_id2`, `u_id2`, `vat`, `tax2`, `vat_tk`, `tax2_tk`) VALUES ('','$u','$credit','$adjust','$commentss','$dat','$mon','$yer','$money_id','$adat','$u_namee','$less','$lesst','$discount_less','$money_id2','$u_idd','$vat','$tax2','$vat_tk','$tax2_tk')";
mysql_query($sql);
}



if($payment!=0 && $payment!="" || $adjust>0)
{
$commentss="$suppliern  Sales Money Receipt  $payment_moden $adj $comments $project_name ";
$credit=2;
$sql = "INSERT INTO `customer_laser` (`user_id`, `bank_name`,`credit`, `amount`,`comments`,`dat`, `mon`, `yer`, `money_id`, `adat`, `user`, `money_id2`, `u_id2`, `contact_name`) VALUES ('','$u','$credit','$pa2','$commentss','$dat','$mon','$yer','$money_id','$adat','$u_namee','$money_id2','$u_idd','$contact_name')";
mysql_query($sql);	
}









if($payment_mode=="")
{

if($payment!=0 && $payment!="" && $supplier!=$stock_issu_customer)
{
$commentss="$suppliern  Sales  Money Receipt $adj  $comments $project_name ";
$credit=1;
$sql = "INSERT INTO `cash_book` (`user_id`, `money_id`, `dat`, `mon`, `yer`, `adat`, `time`, `comments`, `debit`, `credit`, `balance`, `user`, `money_id2`, `u_id2`) VALUES ('','$money_id','$dat','$mon','$yer','$adat','$time','$commentss','$debit','$credit','$payment','$u_namee','$money_id2','$u_idd')";
mysql_query($sql);
}


}
else
{


if($payment!=0 && $payment!=""  && $supplier!=$stock_issu_customer)
{
$commentss=" $suppliern  Sales Money Receipt $payment_moden   $adj  $comments   ";
$credit=1;
$sql = "INSERT INTO `bank_refill` (`user_id`, `bank_name`,`credit`, `amount`,`comments`,`dat`, `mon`, `yer`, `money_id`, `adat`, `user`, `money_id2`, `u_id2`) VALUES ('','$payment_mode','$credit','$payment','$commentss','$dat','$mon','$yer','$money_id','$adat','$u_namee','$money_id2','$u_idd')";
mysql_query($sql);
	
}

}






}




$subtotal_f= number_format($subtotal, 2);

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

<table align='center' width='1000' cellpadding='0' cellspacing='0'>

<tr>
 <td width='504' height='25' bgcolor='' align='right'> <font face='arial' size='4'> <b> Total : </b>  </font> </td> 
 <td width='96' align='right'> <font face='arial' size='4'> <b>  $subtotal_f  &nbsp;&nbsp; </b> </font> </td> 
</tr>

";


if($discount_less>0)
{
print"
<tr>
";
 
 
 if($f_ppe_dis>0)
{
print"

 <td width='504' height='25' bgcolor='' align='right'> <font face='arial' size='4'> <b> Discount $f_ppe_dis % :  </b> </font> </td> 
 

";
}
else
{
print"

<td width='504' height='25' bgcolor='' align='right'> <font face='arial' size='4'> <b> Discount :  </b> </font> </td> 
 
";
}
 
 
 
 
 
 
 print"
 
 
 <td width='96' align='right'> <font face='arial' size='4'> <b>  $discount_less_f  &nbsp;&nbsp;  </b> </font> </td> 
</tr>



<tr>
 <td width='504' height='25' bgcolor='' align='right'> <font face='arial' size='4'> <b>  Total :  </b>  </font> </td> 
 <td width='96' align='right'> <font face='arial' size='4'>  <b>  $subtotal_last_f &nbsp;&nbsp; </b> </font> </td> 
</tr>

";
}


if($set_in==1)
{
	
if($service>0)
{


$service8= number_format($service, 2);



print"
<tr>
 <td width='504' height='25' bgcolor='' align='right'> <font face='arial' size='4'>  <b>  Installation Charge :  </a>   </font> </td> 
 <td width='96' align='right'> <font face='arial' size='4'>  <b> $service8  &nbsp;&nbsp; </b>  </font> </td> 
</tr>
";

}

}


if($less>0)
{
print"

<tr>
 <td width='504' height='25' bgcolor='' align='right'> <font face='arial' size='4'>  <b>  Transport / Labour Cost :  </a>   </font> </td> 
 <td width='96' align='right'> <font face='arial' size='4'>  <b> $less_f  &nbsp;&nbsp; </b>  </font> </td> 
</tr>
";

}





if($less>0 || $service>0)
{
print"
<tr>
 <td width='504' height='25' bgcolor='' align='right'> <font face='arial' size='4'> <b>  Sub Total :   </b></font> </td> 
 <td width='96' align='right'> <font face='arial' size='4'>  <b> $stotal_f  &nbsp;&nbsp; </b>   </font> </td> 
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
 <td width='96' align='right'>  <font face='arial' size='4'> <b>  $payment_f  &nbsp;&nbsp; </b> </font> </td> 
</tr>
";
}




if($adjust>0)
{
print"

<tr>
 <td width='504' height='25' bgcolor='' align='right'> <font face='arial' size='4'> <b> Adjust Amount : </b>  </font> </td> 
 <td width='96' align='right'>  <font face='arial' size='4'> <b>  $adjust_f  &nbsp;&nbsp; </b> </font> </td> 
</tr>
";
}







if($due>0 || $due==0 || $due<=0)
{

print"
<tr>
 <td width='504' height='' bgcolor='' align='right'> <br> <font face='arial' size='4'> <b> Due : </b> </font> </td> 
 <td width='96' align='right'> <hr> <font face='arial' size='4'>   <b>  $due_f &nbsp;&nbsp; </b> </font> </hr> </td> 
</tr>
";
}







print"
</table>
";




























print"
<table align='center' width='1000' cellpadding='0' cellspacing='0'>
<tr>
<td width='20' height='10' align='left'>  </td> 
</tr>
</table>
";



 
if($set_p==1)
{
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
<td align='right' width='100'> <font size='4'>  $stotal2  </font> </td>
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

}


print"


<br>


<table align='center' width='1000' cellpadding='0' cellspacing='0'>
<tr>
<td width='20' height='10' align='left'>  </td> 
</tr>
</table>



<table align='center' width='990' cellpadding='0' cellspacing='0'>
<tr>
<td width='20' height='0' align='left'> <font face='arial' size='4'> 

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

 </font> </td> 
</tr>
</table>
";



print"
<table align='center' width='990' cellpadding='0' cellspacing='0'>
<tr> 
<td height='18'> </td>
</tr>
<tr>
<td width='20' height='0' align='left'> <font face='arial' size='4'>  <b>  Note:  $comments </b> </font> </td> 
</tr>
</table>
";







if($set_sms==1)

{

if($e>0)

{



$res=0;
$sender="M/S. CHASHI GHAR";
$sender=urlencode("$sender");

$bbb=time(); 
$d=date("m/d/y",$bbb); 
$mon_n="$d[0]$d[1]";
$dat_n="$d[3]$d[4]";
$yer_n="20$d[6]$d[7]";


$adat_n="$yer_n$mon_n$dat_n";



$mobile="88$mobile";
$sendto="$mobile";


$msg="M/S. CHASHI GHAR $suppliern has paid $payment  and due $due ";
$msgg = trim($_POST["msg"]);
$msg=urlencode("$msg");
$msgg="$msgy[$i]";


$url='http://193.105.74.59/api/sendsms/plain?user='.$sp_user.'&password='.$sp_pass.'&sender='.$sender.'&SMSText='.$msg.'&GSM='.$sendto.'';

	$curl = curl_init();
 
curl_setopt_array($curl, array(
    CURLOPT_RETURNTRANSFER => 1,
    CURLOPT_URL =>$url,
    CURLOPT_USERAGENT =>'jadukor IT Browser'
));
 
$resp = curl_exec($curl);
 
curl_close($curl);
 
if($resp > 0) {
  //echo 'SMS sent . Delivery id is '.$resp.'';

$res=1;
$res_new++;

$sql = "INSERT INTO `sms_count` (`user_id`, `mobile`, `dat`, `mon`, `yer`, `adat`, `det`, `active`) VALUES ('','$sendto','$dat_n','$mon_n','$yer_n','$adat_n','$msg','$res')";
mysql_query($sql);

} else {
    // echo 'not sent ,error code is '.$resp.'';
$res=0;
$sql = "INSERT INTO `sms_count` (`user_id`, `mobile`, `dat`, `mon`, `yer`, `adat`, `det`, `active`) VALUES ('','$sendto','$dat_n','$mon_n','$yer_n','$adat_n','$msg','$res')";
mysql_query($sql);
}


  



}



}











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
";



print"
<table align='center' width='900' cellpadding='0' cellspacing='0'>
<tr>
<td align='left'>
<font face='arial' size='2'> Declaration <br>
We declare that this invoice shows the actual price of the goods 
described and that all particulars are true and correct.
 </font>
</td>
</tr>

<tr> <td height='8'> </td> </tr>

<tr>
<td align='center'>
<font face='arial' size='3'> 

This is a computer generated Invoice
 </font>
</td>
</tr>

</table>
";



print"
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



unset($_SESSION['cart_unique']);
unset($_SESSION['cart_go']);

unset($_SESSION['cart']);
unset($_SESSION['cart_price']);
unset($_SESSION['cart_unit']);
unset($_SESSION['cart_com']);
unset($_SESSION['cart_id']);
unset($_SESSION['cart_local']);
unset($_SESSION['cart_wa']);
unset($_SESSION['cart_other']);






//session_unset($_SESSION['cart']);

//session_destroy();


print"
</body>

</head>

</html>



";


?>