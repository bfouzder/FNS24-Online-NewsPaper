<?php
include_once('dbconnection.php');





$s=trim($_POST['s']);


$sql="SELECT * FROM `customer_money_receipt` WHERE user_id='$s' ";
$result=mysql_query($sql);
$arrsp=mysql_fetch_array($result);

$money_id=$arrsp[8];
$money_id2=$arrsp[17];

$suppliern=$arrsp[23];
$address=$arrsp[22];
$mobile=$arrsp[25];
$u_namee =$arrsp[10];
$comments =$arrsp[2];

$dat =$arrsp[5];
$mon =$arrsp[6];
$yer =$arrsp[7];



$pdue=$arrsp[19];
$dis=$arrsp[20];
$total_dis=$arrsp[21];
$due=$arrsp[24];
$payment=$arrsp[3];

$adjust=$arrsp[26];





$pa2=$payment+$adjust;


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

";

if($money_id!="")
	
{
print"
<tr> <td height='5'> </td> </tr>
<tr> <td width='100' height=''> </td> <td align='left' height='' width='500'> <font face='arial' size='4'> Bill No  : $money_id</font>  </td> <td width='300'> </td> </tr>
";
}


print"
<tr> <td align='center' height='5'>  </td></tr>
<tr> <td width='100' height=''> </td> <td align='left' height='' width='500'> <font face='arial' size='4'> Customer Name :  $suppliern    </font>  </td> <td width='200' align='left'>  <a href=\"customer_refill.php?action=removee&i5d=$arrp[0]\"> <font face='arial' size='4' color='black'> Date: $dat - $mon - $yer</font> </a> </td> </tr>

<tr> <td height='5'> </td> </tr>


<tr> <td width='100' height=''> </td> <td align='left' height='' width='500'> <font face='arial' size='4'>Address &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;: $address , Mobile : $mobile </font>  </td> <td width='200'> </td> </tr>
";




print"

<tr> <td height='5'> </td> </tr>


<tr> <td width='100' height='20'> </td> <td align='left' height='25' width='500'> <font face='arial' size='4'> Created By :
  $u_namee </font>  </td> <td width='200'> </td> </tr>



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








print"
</table>



<table align='center' width='800' cellpadding='6' cellspacing='1' bgcolor='black'>
<tr bgcolor='white'>
 <td width='504' height='25' bgcolor='' align='right'> <font face='arial' size='4'> Previous Due:  </font> </td> 
 <td width='96' align='center'> <font face='arial' size='4'> &nbsp; $pdue  </font> </td> 
</tr>

";





print"



<tr bgcolor='white'>
 <td width='504' height='25' bgcolor='' align='right'> <font face='arial' size='4'> Discount :  </font> </td> 
 <td width='96' align='center'> <font face='arial' size='4'> &nbsp; $dis  </font> </td> 
</tr>




<tr bgcolor='white'>
 <td width='504' height='25' bgcolor='' align='right'> <font face='arial' size='4'> Payment :  </font> </td> 
 <td width='96' align='center'> <font face='arial' size='4'> &nbsp; $payment  </font> </td> 
</tr>


<tr bgcolor='white'>
 <td width='504' height='25' bgcolor='' align='right'> <font face='arial' size='4'> Adjust Amount :  </font> </td> 
 <td width='96' align='center'> <font face='arial' size='4'> &nbsp; $adjust  </font> </td> 
</tr>



<tr bgcolor='white'>
 <td width='504' height='25' bgcolor='' align='right'> <font face='arial' size='4'> Due :  </font> </td> 
 <td width='96' align='center'> <font face='arial' size='4'> &nbsp; $due  </font> </td> 
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



<table align='center' width='800' cellpadding='0' cellspacing='0'>
<tr> <td height='100'>  </td>  </tr>

<tr bgcolor='white'>
<td width='300' height='25' bgcolor='' align='left'> <font face='arial' size='4'> <b> ......................... </b> </font> </td>  
<td width='300' height='25' bgcolor='' align='right'> <font face='arial' size='4'><b> ......................... </b> </font> </td>  
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