<?php
include_once('dbconnection.php');



$sppp=1;

$sql="SELECT * FROM `sms_p` WHERE user_id='$sppp'";
$result=mysql_query($sql);
$arr_sp=mysql_fetch_array($result);

$sp_user=$arr_sp[1];
$sp_pass=$arr_sp[2];


$ser=trim($_POST['ser']);
$less=trim($_POST['less']);
$payment=trim($_POST['payment']);
$payment_mode=trim($_POST['payment_mode']);
$paymenttype=trim($_POST['paymenttype']);
//$supplier=trim($_POST['supplier']);
$comments=trim($_POST['comments']);


$comments_new="$comments";


$comments=str_replace("'","`","$comments");
$comments_new=str_replace("'","`","$comments_new");


$bill_no=trim($_POST['bill_no']);


$sql="SELECT * FROM `salememo` WHERE money_id='$bill_no' ";
$result=mysql_query($sql);
$arrspb=mysql_fetch_array($result);
$supplier=$arrspb[2];

$dis=trim($_POST['dis']);
$adjust=trim($_POST['adjust_amount']);





//$due=trim($_POST['due']);






$sql="SELECT * FROM `bank` WHERE user_id='$payment_mode' ";
$result=mysql_query($sql);
$arrsp=mysql_fetch_array($result);
$payment_moden=$arrsp[1];


if($payment_mode=="")
{
$payment_moden="Cash";	
}







if($supplier=="")
{
print"<h1>  You are entered something wrong please enter again </h1>";	
exit;
}









$sql="SELECT * FROM `customer` WHERE user_id='$supplier' ";


$result=mysql_query($sql);
$arr1=mysql_fetch_array($result);

$u=$arr1[0];
$suppliern=$arr1[7];
$address=$arr1[5];
$mobile=$arr1[3];








$due=0;

$cr=0;
$de=0;
$cv=0;

$result = mysql_query("SELECT * FROM `customer_laser`  where money_id='$bill_no'  ORDER BY `user_id` ASC  LIMIT 0 , 100000");


while ($a_row = mysql_fetch_row($result)) {

	foreach ($a_row as $field) {
		
	}

if($a_row[2]==1)
{
$cr=$cr+$a_row[3];
}

if($a_row[2]==2)
{
$de=$de+$a_row[3];
}


}


$cv=$cr-$de;





$tcr=$tcr+$cr;
$tde=$tde+$de;
$tcv=$tcv+$cv;


$pdue=$tcv;


$due=$pdue-$payment;
$total_dis=$pdue-$dis;
$due=$total_dis-$payment;
$due=$due-$adjust;


$pa2=$payment+$adjust;




$money_id2= time().$u_idd;



$money_id=$bill_no;

$m_new= time().$u;




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



$dat=trim($_POST['dat']);
$mon=trim($_POST['mon']);
$yer=trim($_POST['yer']);




$adat="$yer$mon$dat";







//print" <br> $adat - $dat-$mon- $yer - $money_id";
//print" $suppliern - $address - Mobile- $mobile  ";





//$prev="Previous Due";




// print" $prev - $pdue - $n_due - $payment  ";




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

<table align='center' width='150' cellpadding='0' cellspacing='0'>
<tr> <td align='center' height='40' bgcolor='F2F2F2'> <font face='arial' size='3'> <b> Money Receipt </b> </font>  </td></tr>
</table>


<table align='center' width='1000' cellpadding='0' cellspacing='0'>
<tr> <td height='10'> </td> </tr>
<tr> <td width='100' height=''> </td> <td align='left' height='' width='500'> <font face='arial' size='4'> Transection ID  : $money_id2 </font>  </td> <td width='300'> </td> </tr>

<tr> <td height='5'> </td> </tr>




<tr> <td width='100' height=''> </td> <td align='left' height='' width='500'> <font face='arial' size='4'> Bill No  : $money_id </font>  </td> <td width='300'> </td> </tr>

<tr> <td height='5'> </td> </tr>



<tr> <td align='center' height=''>  </td></tr>
<tr> <td width='100' height=''> </td> <td align='left' height='' width='500'> <font face='arial' size='4'> Customer Name :  $suppliern  </font>  </td> <td width='200' align='left'>  <a href=\"customer_refill.php?action=removee&i5d=$arrp[0]\"> <font face='arial' size='4' color='black'> Date: $dat-$mon-$yer</font> </a> </td> </tr>

<tr> <td height='5'> </td> </tr>


<tr> <td width='100' height=''> </td> <td align='left' height='' width='500'> <font face='arial' size='4'>Address &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;: $address , Mobile : $mobile </font>  </td> <td width='200'> </td> </tr>

";

/*
<tr> <td height='5'> </td> </tr>


<tr> <td width='100' height='20'> </td> <td align='left' height='25' width='500'> <font face='arial' size='4'> Created By :
  $u_namee </font>  </td> <td width='200'> </td> </tr>
*/

print"
</table>



<table align='center' width='800' cellpadding='0' cellspacing='0'>
<tr>
<td width='20' height='13'align='center'> <font face='arial' size='2'></font> </td> 
</tr>
</table>


<table align='center' width='800' cellpadding='0' cellspacing='1' bgcolor='black'>
";


/*
print"
<tr bgcolor='white'>
 <td width='30' height='25' align='center'> <font face='arial' size='2'> <b> No. </b> </font> </td> 
 <td width='350' align='center'><font face='arial' size='2'> <b> Product Name. </b> </font> </td>
 <td width='50' align='center'><font face='arial' size='2'> <b> Unit-Price </b> </font> </td>
 <td width='100' align='center'><font face='arial' size='2'> <b> Quantity. </b> </font> </td> 
 <td width='100' align='center'><font face='arial' size='2'> <b> Price. </b> </font> </td> 
</tr>
";
*/


















/*


//$comments="$suppliern - On sale- $prev - $comments";

//print"$comments --- ";
$credit=1;
$sql = "INSERT INTO `cash_book` (`user_id`, `money_id`, `dat`, `mon`, `yer`, `adat`, `time`, `comments`, `debit`, `credit`, `balance`, `user`) VALUES ('','$money_id','$dat','$mon','$yer','$adat','$time','$comments','$debit','$credit','$payment','$user')";
mysql_query($sql);
*/


if($dis>0)
{
$commentss="$suppliern Bill No $bill_no Discount   ";
$type=1;
$credit=2;
$sal=1;
$sql = "INSERT INTO `customer_laser` (`user_id`, `bank_name`,`credit`, `amount`,`comments`,`dat`, `mon`, `yer`, `money_id`, `adat`, `user`,`type`,`money_id2`,`u_id2`,`discount_less`,`sal`) VALUES ('','$u','$credit','$dis','$commentss','$dat','$mon','$yer','$money_id','$adat','$u_namee','$type','$money_id2','$u_idd','$dis','$sal')";
mysql_query($sql);	

}




if($payment>0)
{
$pio="Payment : $payment";
}



if($adjust>0)
{


$adj="Adjust Amount : $adjust  $bill_no ";

$commentss="$suppliern Bill No $bill_no payment  $comments ";

$credit=2;
$sql = "INSERT INTO `customer_advance` (`user_id`, `bank_name`,`credit`, `amount`,`comments`,`dat`, `mon`, `yer`, `money_id`, `adat`, `user`, `shipment`, `commission`, `discount_less`, `money_id2`, `u_id2`, `vat`, `tax2`, `vat_tk`, `tax2_tk`) VALUES ('','$u','$credit','$adjust','$commentss','$dat','$mon','$yer','$money_id','$adat','$u_namee','$less','$lesst','$discount_less','$money_id2','$u_idd','$vat','$tax2','$vat_tk','$tax2_tk')";
mysql_query($sql);
}












if($payment>0 || $dis>0 || $adjust>0)
{
	
$commentss="$suppliern Bill No $bill_no Payment Mode $payment_moden ";

$sql = "INSERT INTO `customer_money_receipt` (`user_id`, `bank_name`,`credit`, `amount`,`comments`,`dat`, `mon`, `yer`, `money_id`, `adat`, `user`,`type`,`money_id2`,`u_id2`,`p_due`,`dis`,`total_dis`,`address`,`customer_name`,`due`,`mobile`,`adjust`) VALUES ('','$u','$comments_new','$payment','$commentss','$dat','$mon','$yer','$money_id','$adat','$u_namee','$type','$money_id2','$u_idd','$pdue','$dis','$total_dis','$address','$suppliern','$due','$mobile','$adjust')";
mysql_query($sql);	

}





if($payment!=0 && $payment!="" || $adjust>0)
{

if($adjust>0)
{
$pqu="Adjust Amount $adjust";
}

$commentss="$suppliern Bill No $bill_no Money Receipt  $pqu  $comments  ";
$type=1;
$credit=2;
$sql = "INSERT INTO `customer_laser` (`user_id`, `bank_name`,`credit`, `amount`,`comments`,`dat`, `mon`, `yer`, `money_id`, `adat`, `user`,`type`,`money_id2`,`u_id2`) VALUES ('','$u','$credit','$pa2','$commentss','$dat','$mon','$yer','$money_id','$adat','$u_namee','$type','$money_id2','$u_idd')";
mysql_query($sql);	





$commentss="$suppliern Bill No $bill_no Money Receipt $payment_moden   $comments  ";
$type=1;
$credit=2;
$sql = "INSERT INTO `bill_ledger` (`user_id`, `bank_name`,`credit`, `amount`,`comments`,`dat`, `mon`, `yer`, `money_id`, `adat`, `user`,`type`) VALUES ('','$u','$credit','$payment','$commentss','$dat','$mon','$yer','$money_id','$adat','$user','$type')";
mysql_query($sql);	



}






if($payment_mode=="")
{

if($payment!=0 && $payment!="")
{
$commentss="$suppliern  Bill No $bill_no Money Receipt $payment_moden   $comments  ";
$credit=1;
$sql = "INSERT INTO `cash_book` (`user_id`, `money_id`, `dat`, `mon`, `yer`, `adat`, `time`, `comments`, `debit`, `credit`, `balance`, `user`, `money_id2`, `u_id2`) VALUES ('','$money_id','$dat','$mon','$yer','$adat','$time','$commentss','$debit','$credit','$payment','$u_namee','$money_id2','$u_idd')";
mysql_query($sql);
}


}
else
{


if($payment!=0 && $payment!="")
{
$commentss=" $suppliern Bill No $bill_no Money Receipt $payment_moden      $comments  ";
$credit=1;
$sql = "INSERT INTO `bank_refill` (`user_id`, `bank_name`,`credit`, `amount`,`comments`,`dat`, `mon`, `yer`, `money_id`, `adat`, `user`, `money_id2`, `u_id2`) VALUES ('','$payment_mode','$credit','$payment','$commentss','$dat','$mon','$yer','$money_id','$adat','$u_namee','$money_id2','$u_idd')";
mysql_query($sql);
	
}

}











print"
</table>



<table align='center' width='800' cellpadding='6' cellspacing='1' bgcolor='black'>
<tr bgcolor='white'>
 <td width='504' height='25' bgcolor='' align='right'> <font face='arial' size='4'> Previous Due :  </font> </td> 
 <td width='96' align='right'> <font face='arial' size='4'>  $pdue &nbsp;&nbsp; </font> </td> 
</tr>




<tr bgcolor='white'>
 <td width='504' height='25' bgcolor='' align='right'> <font face='arial' size='4'> Discount :  </font> </td> 
 <td width='96' align='right'> <font face='arial' size='4'>  $dis &nbsp;&nbsp; </font> </td> 
</tr>



<tr bgcolor='white'>
 <td width='504' height='25' bgcolor='' align='right'> <font face='arial' size='4'> Total :  </font> </td> 
 <td width='96' align='right'> <font face='arial' size='4'>  $total_dis &nbsp;&nbsp; </font> </td> 
</tr>


<tr bgcolor='white'>
 <td width='504' height='25' bgcolor='' align='right'> <font face='arial' size='4'> Payment:  </font> </td> 
 <td width='96' align='right'> <font face='arial' size='4'>  $payment &nbsp;&nbsp; </font> </td> 
</tr>



<tr bgcolor='white'>
 <td width='504' height='25' bgcolor='' align='right'> <font face='arial' size='4'> Adjust amount  :  </font> </td> 
 <td width='96' align='right'> <font face='arial' size='4'>  $adjust &nbsp;&nbsp; </font> </td> 
</tr>




<tr bgcolor='white'>
 <td width='504' height='25' bgcolor='' align='right'> <font face='arial' size='4'> Due:  </font> </td> 
 <td width='96' align='right'> <font face='arial' size='4'>  $due &nbsp;&nbsp; </font> </td> 
</tr>
</table>


<table align='center' width='800' cellpadding='0' cellspacing='0'>
<tr> <td height='30'>  </td>  </tr>
<tr bgcolor='white'>
<td width='504' height='25' bgcolor='' align='left'> <font face='arial' size='4'> <b> Note </b>: $comments  </font> </td>  
</tr>
<tr> <td height='10'>  </td>  </tr>
<tr bgcolor='white'>
<td width='504' height='25' bgcolor='' align='left'> <font face='arial' size='4'>   
";
include_once('convert48_bill.php');
print"
Taka Only.
</font> </td>  
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
<table align='center' width='800' cellpadding='0' cellspacing='0'>
<tr> <td height='100'>  </td>  </tr>

<tr bgcolor='white'>
<td width='300' height='25' bgcolor='' align='left'> <font face='arial' size='4'> <b> ......................... </b> </font> </td>  
<td width='300' height='25' bgcolor='' align='right'> <font face='arial' size='4'><b> ..................... </b> </font> </td>  
</tr>
<tr bgcolor='white'>
<td width='300' height='25' bgcolor='' align='left'> <font face='arial' size='4'> <b> Customer Sign </b> </font> </td>  
<td width='300' height='25' bgcolor='' align='right'> <font face='arial' size='4'> <b> Approved By </b> </font> </td>  
</tr>

</table>





</td> 
</tr>
</table>

";





print"
</body>

</head>

</html>



";


?>