<?php

include_once('dbconnection.php');


$ser=trim($_POST['ser']);
$s=trim($_POST['s']);
$comments=trim($_POST['comments']);
$active=trim($_POST['active']);
$type=trim($_POST['type']);


$customer_name_new_id=trim($_POST['customer_name_new']);


$dat=trim($_POST['dat']);
$mon=trim($_POST['mon']);
$yer=trim($_POST['yer']);


$dat1=trim($_POST['dat1']);
$mon1=trim($_POST['mon1']);
$yer1=trim($_POST['yer1']);




$idat=trim($_POST['idat']);
$imon=trim($_POST['imon']);
$iyer=trim($_POST['iyer']);



$day=trim($_POST['day']);



if($day=="")
{
$day=$_GET['day'];
}





if($day=="")
{
$day=2;
}

if($day==1)
{
$day_check="checked";
}

if($day==2)
{
$day_check1="checked";
}






if($type=="")
{
$typen="Ready Cheque";	
}


if($type==1)
{
$typen="Active Cheque";	
}

if($type==2)
{
$typen="Bounch Cheque";	
}






/*
	
if($ser=="")
{

$bbb=time(); 
$d=date("m/d/y",$bbb); 
$mon="$d[0]$d[1]";
$dat="$d[3]$d[4]";
$yer="20$d[6]$d[7]";


$mon1="$d[0]$d[1]";
$dat1="$d[3]$d[4]";
$yer1="20$d[6]$d[7]";



}


*/


$adat="$yer$mon$dat";
$adat1="$yer1$mon1$dat1";











if($ser==12)
{


//print"$comments - $type - $typen ";


$idat=trim($_POST['idat']);
$imon=trim($_POST['imon']);
$iyer=trim($_POST['iyer']);



$iadat="$iyer$imon$idat";


$check1=0;

$sql="SELECT * FROM `check_entry` WHERE user_id='$s' ";
$result=mysql_query($sql);
$arrma=mysql_fetch_array($result);
$check1=$arrma[16];



//print"$check1";



$sql= "UPDATE  `check_entry` SET `comments`='$comments' WHERE `user_id`='$s'";
mysql_query($sql);


$sql= "UPDATE  `check_entry` SET `idat`='$idat' WHERE `user_id`='$s'";
mysql_query($sql);


$sql= "UPDATE  `check_entry` SET `imon`='$imon' WHERE `user_id`='$s'";
mysql_query($sql);


$sql= "UPDATE  `check_entry` SET `iyer`='$iyer' WHERE `user_id`='$s'";
mysql_query($sql);


$sql= "UPDATE  `check_entry` SET `iadat`='$iadat' WHERE `user_id`='$s'";
mysql_query($sql);



$sql= "UPDATE  `check_entry` SET `active`='$active' WHERE `user_id`='$s'";
mysql_query($sql);




if($check1==0 && $active==1)
{
$sql="SELECT * FROM `check_entry` WHERE user_id='$s' ";
$result=mysql_query($sql);
$arrmaa=mysql_fetch_array($result);
$customer_id=$arrmaa[2];
$customer_name=$arrmaa[1];

$bank_name=$arrmaa[5];
$check_no=$arrmaa[6];
$amount=$arrmaa[7];

$money_id=$arrmaa[19];

$money_id2=$arrmaa[22];



$bbb=time(); 
$d=date("m/d/y",$bbb); 
$mon3="$d[0]$d[1]";
$dat3="$d[3]$d[4]";
$yer3="20$d[6]$d[7]";
$adat3="$yer3$mon3$dat3";
$com="Payment By Cheque $bank_name ";

$credit=2;



$sql = "INSERT INTO `customer_laser` (`user_id`, `bank_name`,`credit`, `amount`,`comments`,`dat`, `mon`, `yer`, `money_id`, `adat`, `user`,`discount_less`,`sal`,`money_id2`,`u_id2`) VALUES ('','$customer_id','$credit','$amount','$com','$dat3','$mon3','$yer3','$money_id','$adat3','$u_namee','$amount6','$sal4','$money_id2','$u_idd')";
mysql_query($sql);


$credit=1;

$com="$customer_name - Payment By Cheque $bank_name ";

$credit=1;

/*
$sql = "INSERT INTO `cash_book` (`user_id`, `money_id`, `dat`, `mon`, `yer`, `adat`, `time`, `comments`, `debit`, `credit`, `balance`, `user`, `money_id2`, `u_id2`) VALUES ('','$money_id','$dat3','$mon3','$yer3','$adat3','$time','$com','$debit','$credit','$amount','$u_namee','$money_id2','$u_idd')";
mysql_query($sql);
*/


$sql = "INSERT INTO `bank_refill` (`user_id`, `bank_name`,`credit`, `amount`,`comments`,`dat`, `mon`, `yer`, `money_id`, `adat`, `user`, `money_id2`, `u_id2`) VALUES ('','$bank_id','$credit','$amount','$com','$dat3','$mon3','$yer3','$money_id','$adat3','$u_namee','$money_id2','$u_idd')";
mysql_query($sql);

	
}



include_once('s.php');
}


$d=(int)$_GET['dell'];



if($d!="")
{


$type=$_GET['type'];

$dat=$_GET['dat'];
$mon=$_GET['mon'];
$yer=$_GET['yer'];

$dat1=$_GET['dat1'];
$mon1=$_GET['mon1'];
$yer1=$_GET['yer1'];



$adat="$yer$mon$dat";
$adat1="$yer1$mon1$dat1";



if($type=="")
{
$typen="Ready check";	
}


if($type==1)
{
$typen="Active Check";	
}

if($type==2)
{
$typen="Bounch Check";	
}





$sql="SELECT * FROM `check_entry` WHERE user_id='$d' ";
$result=mysql_query($sql);
$arrm=mysql_fetch_array($result);
$money_id=$arrm[19];
$money_id2=$arrm[22];




$result = mysql_query("DELETE FROM check_entry WHERE user_id=$d");
$result = mysql_query("DELETE FROM customer_laser WHERE money_id2=$money_id2");
$result = mysql_query("DELETE FROM cash_book WHERE money_id2=$money_id2");
$result = mysql_query("DELETE FROM bank_refill WHERE money_id2=$money_id2");


}





print"

<html>

<head>
<title> Cheque View </title>
";


include_once('style.php');


print"
</head>


<body>
";


include_once('address.php');


print"
<table align='center' width='1200' cellpadding='0' cellspacing='' height='' bgcolor=''>
<tr bgcolor='white'> 
<td align='center' valign='top' width='220' bgcolor=''>  

<table align='center' width='200' cellpadding='0' cellspacing='0' height=''>

<tr> <td height='10'> </td></tr>


<tr> <td height='7'> </td></tr>
";


//include_once('check_report_left.php');


print"
















<td align='center' valign='top' width='1200' bgcolor='white'>  


<form action='check_view.php' method='POST'>
<table align='center' width='1200' cellpadding='0' cellspacing='0'>
<tr> <td height='20'>  </td>  </tr>

<tr> <td align='left' height='' bgcolor='' id='tda'>  <font face='arial' color='black' size='4'> <b> 
Cheque Type :
";
if($day==1)
{
print"
Receive
";
}
else
{
print"
 $typen
";
}
print"
</b> </font> </td> </tr>

<tr><td height='10'> </td> </tr>

<tr> <td align='left' height='' bgcolor='' id='tda'>  <font face='arial' color='black' size='4'> <b> 
";

if($day==1)
{
print"
Issu Date :
";
}

if($day==2)
{
print"
Active Date :
";
}

print"
 $dat-$mon-$yer To $dat1-$mon1-$yer1 
</b> </font> </td> </tr>


</table>



</form>







<table align='center' width='1200' cellpadding='0' cellspacing='0'>
<tr> <td height='10'>  </td> </tr>
</table>



<table align='center' width='1200' cellpadding='0' cellspacing='0'>
<tr> <td align='center' height='28' bgcolor='' id=''>  <font face='arial' color='black' size='5'> <b> Cheque View  </b> </font> </td> </tr>

<tr><td height='15'> </td> </tr>
</table>





<table align='center' width='1200' cellpadding='4' cellspacing='1' bgcolor='black'>

<tr bgcolor='#F2F2F2' height='40'> 

<td  bgcolor='' align='center' height='0' width='50'> <font face='arial' size='4'> SL. </font> </td>

<td  bgcolor='' align='center' height='0' width='140'> <font face='arial' size='4'> Date </font> </td>
	 

     <td  bgcolor='' align='center' height='0' width='200'> <font face='arial' size='4'> Customer Name </font> </td>
	 
	 
	 <td align='center' width='200'> <font face='arial' size='4'> Bank name </font> </td>

	 <td align='center' width='200'> <font face='arial' size='4'> Cheque No </font> </td>


	 <td align='center' width='300'> <font face='arial' size='4'> Details </font> </td>
	 <td align='center' width='110'> <font face='arial' size='4'> Active Date </font> </td>

	 <td align='center' width='110'> <font face='arial' size='4'> Deposit To </font> </td>


	 <td align='center' width='150'> <font face='arial' size='4'> Amount </font> </td>

	
	 ";
print"
</tr>
";







if($customer_name_new_id=="")

{
$d=11;


if($day==2)
{
$result = mysql_query("SELECT * FROM `check_entry` where iadat>=$adat && iadat<=$adat1 && active='$type'  ORDER BY `user_id` ASC  LIMIT 0 , 60000 ");
}



if($day==1)
{
$result = mysql_query("SELECT * FROM `check_entry` where adat>=$adat && adat<=$adat1   ORDER BY `user_id` ASC  LIMIT 0 , 60000 ");
}


}

else
{



$d=11;


if($day==2)
{
$result = mysql_query("SELECT * FROM `check_entry` where iadat>=$adat && iadat<=$adat1 && active='$type' && customer_id='$customer_name_new_id'  ORDER BY `user_id` ASC  LIMIT 0 , 60000 ");
}



if($day==1)
{
$result = mysql_query("SELECT * FROM `check_entry` where adat>=$adat && adat<=$adat1 && customer_id='$customer_name_new_id'  ORDER BY `user_id` ASC  LIMIT 0 , 60000 ");
}


}



while ($a_row = mysql_fetch_row($result)) {

	foreach ($a_row as $field) {
		
	}

$zx++;

print"
<tr bgcolor='white' height='40'> 

<td align='center' width=''> <font face='arial' size='4'> $zx </font> </td> 
	 

     <td align='center' width=''> <font face='arial' size='4'> $a_row[8]-$a_row[9]-$a_row[10] </font> </td> 
	 

     <td  bgcolor='' align='left' height='0' width=''> <font face='arial' size='4'> $a_row[1] </font> </td>
";
/*
     <td align='center' width=''> <font face='arial' size='4'> $a_row[3] </font> </td> 
	 
	 <td align='left' width=''> <font face='arial' size='4'> $a_row[4]  </font> </td>

*/

print"
	 <td align='left' width=''> <font face='arial' size='4'> $a_row[24] </font> </td>

	 <td align='left' width=''> <font face='arial' size='4'> $a_row[6] </font> </td>

	 
  </font> </td>
	 <td align='left' width=''> <font face='arial' size='4'>  $a_row[17] </font> </td>
";

print"
	 <td align='center' width=''> <font face='arial' size='4'>

$a_row[12]-$a_row[13]-$a_row[14]


	 <td align='right' width=''> <font face='arial' size='4'> $a_row[5] </font> </td>


	 ";


$a_row[7]= number_format($a_row[7], 2);
$a_row[7]=str_replace(",","","$a_row[7]");

$ar7= number_format($a_row[7], 2);



print"

	 <td align='right' width=''> <font face='arial' size='4'> $ar7 </font> </td>

";


	
	 
print"
</tr>
";




$tk=$tk+$a_row[7];

}



$tk_up= number_format($tk, 2);


print"
<tr bgcolor='white'>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>


<td> </td>
<td> </td>
<td> </td>
<td align='right'> <font face='arial' size='4'>  $tk_up </font> </td>

</tr>

";







print"

</table>

<br>
<br>
<br>
<br>
<br>

";






include_once('sign_cost.php');






print"
</td>


</tr>
</table>




</body>

</html>


";


?>