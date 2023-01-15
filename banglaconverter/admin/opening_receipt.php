<?php

include_once('dbconnection.php');


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


$money_id= time().$u;

$money_id2= time().$u_idd;




if($ser==1)
{

$sql="SELECT * FROM `receipt_laser` WHERE user_id='$bank_name' ";


$result=mysql_query($sql);
$arrb=mysql_fetch_array($result);

$bank_namem=$arrb[1];

$u=$arrb[0];


$a=0;

if($bank_name=="")
{
include_once('w.php');
$a=1;
}

if($credit=="" && $a==0)
{
include_once('w.php');
$a=1;
}



if($credit=="" && $a==0)
{
include_once('w.php');
$a=1;
}

if($amount=="" && $a==0)
{
include_once('w.php');
$a=1;
}



if($a==0)
{

$commentss="$comments";	

$sql = "INSERT INTO `rpayment_transection` (`user_id`, `bank_name`,`credit`, `amount`,`comments`,`dat`, `mon`, `yer`, `money_id`, `adat`, `user`, `money_id2`, `u_id2`) VALUES ('','$u','$credit','$amount','$commentss','$dat','$mon','$yer','$money_id','$adat','$u_namee','$money_id2','$u_idd')";

mysql_query($sql);


include_once('s.php');

}



}











print"

<html>

<head>
<title> Opening Balance Entry of Receipt Laser  </title>
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

";





include_once('opening_balance_left.php');









print"


<td align='center' valign='top' width='980'> 


<br>
<br>



<form action='opening_receipt.php' method='POST'>

<table align='center' width='450' cellpadding='0' cellspacing='1' bgcolor='F9F4D8'>

<tr> 
<td width='450' height='420' bgcolor='ECE9D8' valign='top'> 



<table align='center' width='550' cellpadding='0' cellspacing='0' bgcolor='F7D3F2'>
<tr> <td align='center' height='40'> <font face='arial' size='2'> Opening Balance Entry Of Receipt Ledger </font> </td> </tr>
<tr> <td align='center' height='1' bgcolor='F9F4D8'> </td> </tr>
</table>

<br><br>

<table align='center' width='450' cellpadding='0' cellspacing='0'>


<tr> 
<td align='right' height='30' width='150'><font face='arial' size='2'> Select Date: &nbsp;</font> </td> 
<td width='300' align='left'>

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



<tr> <td height='5'> </td>  </tr>


<tr> 
<td align='right' height='30' width='150'><font face='arial' size='2'> Ledger Name: &nbsp;</font> </td> 
<td width='300' align='left'>

<select name='bank_name' id='new_sup1'>
<option value='$bank_name'>$bank_namem</option>
";
//$result = mysql_query("SELECT * FROM payment_laser");

$result = mysql_query("SELECT * FROM `receipt_laser`  ORDER BY `customer_name` ASC ");


while ($a_row = mysql_fetch_row($result)) {

	foreach ($a_row as $field) {
		
	}

print" <option value='$a_row[0]'> $a_row[1]</option>";
}



print"
</select>
</td>
</tr>



<tr> <td height='5'> </td>  </tr>


<tr> 
<td align='right' height='30' width='150'><font face='arial' size='2'> Amount: &nbsp;</font> </td> 
<td width='300' align='left'> <input type='text' name='amount' id='txt' size='30'> </td>
</tr>


<tr> <td height='5'> </td>  </tr>


<tr> 
<td align='right' height='30' width='150'> </td> 
<td width='300' align='left'> 

<input type='radio' name='credit' value='2'> Debit
<input type='radio' name='credit' value='1'> Credit


 </td>
</tr>


<tr> <td height='5'> </td>  </tr>


<tr> 
<td align='right' height='30' width='150' valign='top'><font face='arial' size='2'> Comments: &nbsp;</font> </td> 
<td width='300' align='left'> <textarea rows='3' cols='28' name='comments'></textarea> </td>
</tr>

<tr> <td height='5'> </td>  </tr>

<tr> 
<td align='right' height='40' width='150' valign='top'> </td> 
<td width='300' align='center'> 

<input type='hidden' name='ser' value='1'>
<input type='submit' value='Save' id='enter'>

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