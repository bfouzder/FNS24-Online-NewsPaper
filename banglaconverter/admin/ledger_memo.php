<?php

include_once('dbconnection.php');

session_start();


$ser=trim($_POST['ser']);


$bank_name=trim($_POST['bank_name']);
$credit=trim($_POST['credit']);
$amount=trim($_POST['amount']);
$comments=trim($_POST['comments']);

$comments=str_replace("'","`","$comments");



$dat=trim($_POST['dat']);
$mon=trim($_POST['mon']);
$yer=trim($_POST['yer']);

	
if($ser=="")
{

$bbb=time(); 
$d=date("m/d/y",$bbb); 
$mon="$d[0]$d[1]";
$dat="$d[3]$d[4]";
$yer="20$d[6]$d[7]";

}

$adat="$yer$mon$dat";














//print" $bank_name - $credit - $amount - $comments ";
//print" $bank_name  - $account - $mobile - $email - $address - $comments  ";


$sql="SELECT * FROM `bank` WHERE user_id='$bank_name' ";


$result=mysql_query($sql);
$arrb=mysql_fetch_array($result);

$bank_namem=$arrb[1];




if($ser==1)
{

$a=0;

if($bank_name=="")
{
$a=1;
}





$cr=0;
$de=0;


//$result = mysql_query("SELECT * FROM bank_refill");


$result = mysql_query("SELECT * FROM `bank_refill`  where bank_name='$bank_name'  ORDER BY `user_id` ASC  LIMIT 0 , 100000");





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



if($credit==2)
{

$cv=$cr-$de;

if($cv<$amount)
{
$a=0;

//print"not";
//include_once('not.php');
}

}









if($a==0 && $credit!="")

{
	
	


$money_id= time().$u;

$money_id2= time().$u_idd;



//$sql = "INSERT INTO `bankk` (`user_id`, `bank_name`,`accountt`, `mobile`, `address`, `comments`, `email`,`dat`, `mon`, `yer`) VALUES ('','$bank_name','$account','$mobile','$address','$comments','$email','$dat','$mon','$yer')";
//mysql_query($sql);




if($credit==1)
{
$comments2="$bank_namem  Deposit Money  $comments";
}

if($credit==2)
{
$comments2="$bank_namem  Money Withdraw  $comments";
}




$sql = "INSERT INTO `bank_refill` (`user_id`, `bank_name`,`credit`, `amount`,`comments`,`dat`, `mon`, `yer`, `money_id`, `adat`, `user`, `money_id2`, `u_id2`) VALUES ('','$bank_name','$credit','$amount','$comments2','$dat','$mon','$yer','$money_id','$adat','$u_namee','$money_id2','$u_idd')";
mysql_query($sql);





$ar=1;

if($credit==1 && $ar==1)
{
$credit=2;
$ar=0;
$comments="$bank_namem  Deposit money  $comments";


}


if($credit==2 && $ar==1)
{
$credit=1;
$ar=0;

$comments="$bank_namem  Money Withdraw  $comments";

}






$sql = "INSERT INTO `cash_book` (`user_id`, `money_id`, `dat`, `mon`, `yer`, `adat`, `time`, `comments`, `debit`, `credit`, `balance`, `user`, `money_id2`, `u_id2`) VALUES ('','$money_id','$dat','$mon','$yer','$adat','$time','$comments','$debit','$credit','$amount','$u_namee','$money_id2','$u_idd')";
mysql_query($sql);







include_once('s.php');

}

if($a==1)
{

include_once('w.php');

}



}






print"

<html>

<head>
<title> Bank </title>


<style>

body
{
margin-top:30px;
}

A:link {
    FONT-WEIGHT: normal; FONT-SIZE: 13px; COLOR: black; FONT-STYLE: normal; FONT-FAMILY: verdana, Arial, Helvetica, sans-serif; TEXT-DECORATION: none
}

A:visited {
    FONT-WEIGHT: normal; FONT-SIZE: 13px; COLOR: black; FONT-STYLE: normal; FONT-FAMILY: verdana, Arial, Helvetica, sans-serif; TEXT-DECORATION: none
}
A:active {
    FONT-WEIGHT: normal; FONT-SIZE: 13px; COLOR: black; FONT-STYLE: normal; FONT-FAMILY: verdana, Arial, Helvetica, sans-serif; TEXT-DECORATION: none
}
A:hover {
    FONT-WEIGHT: normal; FONT-SIZE: 13px; COLOR: black; FONT-STYLE: normal; FONT-FAMILY: verdana, Arial, Helvetica, sans-serif; TEXT-DECORATION: none
}





table#tableq
{
border: 1px solid black;
 border-collapse: collapse;
}



</style>


</head>


<body onload='window.print()'>
";



print"




<table align='center' width='650' height='0' cellpadding='0' cellspacing='0' border='0'>
<tr>
<td align='Left' valign='top'>

</td>
</tr>
</table>






<table align='center' width='650' height='300' cellpadding='10' cellspacing='1' border='1' id='tableq'>
<tr>
<td align='center' valign='top'>
";

include_once('address.php');



print"
<table align='center' width='800' cellpadding='5' cellspacing='1'  border='1' id='tableq'>

<tr bgcolor='F2F2F2'> 
<td align='center' width='Sl.' width='50' height='20'> <font face='arial' size='4' color='094FA1'> Sl. </font> </td> 
<td align='center' width='300'> <font face='arial' size='4' color='094FA1'> Particulars </font> </td> 
<td align='center' width='100'> <font face='arial' size='4' color='094FA1'> Amount </font> </td> 
</tr>
";


$e++;



print"
<tr bgcolor='white'> 
<td align='center' width='Sl.' width='40' height='25'> <font face='arial' size='4' color=''> $e  </font> </td> 
<td align='left' width='500'> <font face='arial' size='4' color=''> $comments </font> </td> 
<td align='center' width='200'> <font face='arial' size='4' color=''> $amount </font> </td> 
</tr>
";




$total=$amount;




/*
print"
<tr bgcolor='white'> 
<td align='center' width='Sl.' width='40' height='20'> <font face='arial' size='4' color=''>  </font> </td> 
<td align='center' width='450'> <font face='arial' size='4' color=''> Total </font> </td> 
<td align='center' width='100'> <font face='arial' size='4' color=''>  </font> </td> 
</tr>
";
*/


print"
</table>


<table align='center' width='800' cellpadding='0' cellspacing='0'>

<tr>
<td height='70'> </td>
</tr>


<tr> 
<td align='left' height='30'> <font face='arial' size='4' color=''> 
";

include_once('convert_new.php');

print"

Taka Only.
  </font> </td> 
</tr>



</table>

";

print"
<table align='center' width='800' cellpadding='0' cellspacing='0'>

<tr> <td height='100'> </td> </tr>

<tr bgcolor='white'> 

<td align='left'  width='120' height='20'> <font face='arial' size='4' color=''> Accounts Sign </font> </td> 
<td align='center'  width='120' height='20'> <font face='arial' size='4' color=''>   </font> </td> 
<td width='10'> </td>
<td align='center'  width='120' height='20'> <font face='arial' size='4' color=''>  </font> </td> 
<td align='right' width='120'> <font face='arial' size='4' color=''> Approved By </font> </td> 

</tr>
</table>


</td>
</tr>
</table>

";






















//session_destroy();

print"

</body>





</html>

";


?>