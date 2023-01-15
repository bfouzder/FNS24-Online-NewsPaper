<?php

include_once('dbconnection.php');




include_once('dbconnection.php');





$ser=trim($_POST['ser']);


$bank_name=trim($_POST['bank_name']);

$bank_name2=trim($_POST['bank_name2']);
$cheque_no=trim($_POST['cheque_no']);



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



$sql="SELECT * FROM `bank` WHERE user_id='$bank_name2' ";


$result=mysql_query($sql);
$arrbd=mysql_fetch_array($result);

$bank_namem2=$arrbd[1];


if($ser==1)
{

$a=0;

if($bank_name=="" || $bank_name2=="" )
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









if($a==0)

{
	
	


$money_id= time().$u;

$money_id2= time().$u_idd;



//$sql = "INSERT INTO `bankk` (`user_id`, `bank_name`,`accountt`, `mobile`, `address`, `comments`, `email`,`dat`, `mon`, `yer`) VALUES ('','$bank_name','$account','$mobile','$address','$comments','$email','$dat','$mon','$yer')";
//mysql_query($sql);



/*
if($credit==1)
{
$comments2="$bank_namem  Deposit Money  $comments";
}

if($credit==2)
{
$comments2="$bank_namem  Money Withdraw  $comments";
}

*/


$comments2="$bank_namem Transfer to $bank_namem2  Cheque No $cheque_no  $comments";

$comments3="$bank_namem Transfer to Deposit $bank_namem2  Cheque No $cheque_no  $comments";

$credit=2;

$sql = "INSERT INTO `bank_refill` (`user_id`, `bank_name`,`credit`, `amount`,`comments`,`dat`, `mon`, `yer`, `money_id`, `adat`, `user`, `money_id2`, `u_id2`) VALUES ('','$bank_name','$credit','$amount','$comments2','$dat','$mon','$yer','$money_id','$adat','$u_namee','$money_id2','$u_idd')";
mysql_query($sql);


$credit=1;

$sql = "INSERT INTO `bank_refill` (`user_id`, `bank_name`,`credit`, `amount`,`comments`,`dat`, `mon`, `yer`, `money_id`, `adat`, `user`, `money_id2`, `u_id2`) VALUES ('','$bank_name2','$credit','$amount','$comments3','$dat','$mon','$yer','$money_id','$adat','$u_namee','$money_id2','$u_idd')";
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
<title> Refill </title>
";


include_once('style.php');


print"
</head>


<body>
";


include_once('header.php');


print"
<table align='center' width='1200' cellpadding='0' cellspacing='1' height='800' bgcolor='gray'>
<tr bgcolor='white'> 
<td align='center' valign='top' width='220' bgcolor='#C5B991'>  
<table align='center' width='200' cellpadding='0' cellspacing='0' height=''>
<tr> <td height='10'> </td></tr>
<tr> <td height='30' width='200' bgcolor='green'>   <span id='child'> <b> <font color='white'> Payment / Collection </font> </b> </span>  </td></tr>
<tr> <td height='7'> </td></tr>

";


include_once('refill_left.php');


print"
</td>



<td align='center' valign='top' width='980'>  

<br>
<br>
<br>


<form action='bank_transfer.php' method='POST'>

<table align='center' width='450' cellpadding='0' cellspacing='1' bgcolor='F9F4D8'>

<tr> 
<td width='450' height='320' bgcolor='ECE9D8' valign='top'> 

<table align='center' width='450' cellpadding='0' cellspacing='0' bgcolor='F7D3F2'>
<tr> <td align='center' height='40'> <font face='arial' size='4'> Bank To Bank Transfer </font> </td> </tr>
<tr> <td align='center' height='1' bgcolor='F9F4D8'> </td> </tr>
</table>

<br><br>

<table align='center' width='450' cellpadding='0' cellspacing='0'>


<tr>
<td width='30'> </td> 
<td align='left' height='30' width='150'><font face='arial' size='2'> Select Date </font> </td> 
<td width='300' align='left'>
:
<select name='dat' id='dat1'>
<option name='$dat'>$dat</option>
<option name='01'>01</option>
<option name='02'>02</option>
<option name='03'>03</option>
<option name='04'>04</option>
<option name='05'>05</option>
<option name='06'>06</option>
<option name='07'>07</option>
<option name='08'>08</option>
<option name='09'>09</option>
<option name='10'>10</option>
<option name='11'>11</option>
<option name='12'>12</option>
<option name='13'>13</option>
<option name='14'>14</option>
<option name='15'>15</option>
<option name='16'>16</option>
<option name='17'>17</option>
<option name='18'>18</option>
<option name='19'>19</option>
<option name='20'>20</option>
<option name='21'>21</option>
<option name='22'>22</option>
<option name='23'>23</option>
<option name='24'>24</option>
<option name='25'>25</option>
<option name='26'>26</option>
<option name='27'>27</option>
<option name='28'>28</option>
<option name='29'>29</option>
<option name='30'>30</option>
<option name='31'>31</option>
</select>

<select name='mon' id='mon1'>
<option name='$mon'>$mon</option>
<option name='01'>01</option>
<option name='02'>02</option>
<option name='03'>03</option>
<option name='04'>04</option>
<option name='05'>05</option>
<option name='06'>06</option>
<option name='07'>07</option>
<option name='08'>08</option>
<option name='09'>09</option>
<option name='10'>10</option>
<option name='11'>11</option>
<option name='12'>12</option>
</select>

<select name='yer' id='yer1'>
<option name='$yer'>$yer</option>
";

include_once('year.php');

print"

</select>

</td>
</tr>

<tr> <td height='5'> </td> </tr>


<tr> 
<td></td>
<td align='left' height='30' width=''><font face='arial' size='2'> Select Bank Name </font> </td> 
<td width='' align='left'>

:
<select name='bank_name' id='new_sup1'>
<option value='$bank_name'>$bank_namem</option>
";
//$result = mysql_query("SELECT * FROM bank");

$result = mysql_query("SELECT * FROM `bank`  ORDER BY `bank_name` ASC ");


while ($a_row = mysql_fetch_row($result)) {

	foreach ($a_row as $field) {
		
	}

print" <option value='$a_row[0]'> $a_row[1]</option>";
}



print"
</select>
</td>
</tr>


<tr> <td height='5'> </td> </tr>

<tr> 
<td></td>
<td align='left' height='30' width=''><font face='arial' size='2'> Amount </font> </td> 
<td width='' align='left'> : <input type='text' name='amount'  size='30' id='txt'> </td>
</tr>






<tr> <td height='5'> </td> </tr>


<tr> 
<td> </td>
<td align='left' height='30' width=''><font face='arial' size='2'> Transfer Bank Name </font> </td> 
<td width='' align='left'>
: 
<select name='bank_name2' id='new_sup1'>
<option value='$bank_name2'>$bank_namem2</option>
";
//$result = mysql_query("SELECT * FROM bank");

$result = mysql_query("SELECT * FROM `bank`  ORDER BY `bank_name` ASC ");


while ($a_row = mysql_fetch_row($result)) {

	foreach ($a_row as $field) {
		
	}

print" <option value='$a_row[0]'> $a_row[1]</option>";
}



print"
</select>
</td>
</tr>

<tr> <td height='5'> </td> </tr>



<tr> 
<td></td>
<td align='left' height='30' width='' valign='top'><font face='arial' size='2'> Cheque No  </font> </td> 
<td width='' align='left'> : <input type='text' name='cheque_no' size='25'> </td>
</tr>

<tr> <td height='5'> </td> </tr>



<tr> 
<td> </td>
<td align='left' height='30' width='' valign='top'><font face='arial' size='2'> Comments </font> </td> 
<td width='' align='left'>  : <textarea rows='3' cols='28' name='comments'></textarea> </td>
</tr>

<tr> <td height='5'> </td> </tr>



<tr> 
<td> </td>
<td align='right' height='40' width='150' valign='top'> </td> 
<td width='300' align='center'> 

<input type='hidden' name='ser' value='1'>
<input type='submit' value='Save'>

 </td>
</tr>

</table>


</td> 
</tr>

</table>



</form>






</td>


</tr>
</table>




</body>

</html>


";


?>