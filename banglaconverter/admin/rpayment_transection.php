<?php
include_once('dbconnection.php');




$ser=trim($_POST['ser']);

$s=trim($_POST['s']);


$dat1=trim($_POST['dat1']);
$mon1=trim($_POST['mon1']);
$yer1=trim($_POST['yer1']);




$dat2=trim($_POST['dat2']);
$mon2=trim($_POST['mon2']);
$yer2=trim($_POST['yer2']);





$supplier=trim($_POST['supplier']);


$sql="SELECT * FROM `receipt_laser` WHERE user_id='$supplier' ";
$result=mysql_query($sql);
$arrs=mysql_fetch_array($result);
$suppliern=$arrs[1];

$address=$arrs[4];




$mdate="$yer1$mon1$dat1";

$ndate="$yer2$mon2$dat2";


//print"$mdate -";


if($supplier=="")
{
$suppliern="All";
}




if($ser=="")
{


$bbb=time(); 

$d=date("m/d/y",$bbb); 

$mon="$d[0]$d[1]";
$dat="$d[3]$d[4]";
$yer="20$d[6]$d[7]";

$dat1=$dat;
$mon1=$mon;
$yer1=$yer;


$dat2=$dat;
$mon2=$mon;
$yer2=$yer;


$mdate="$yer1$mon1$dat1";

$ndate="$yer2$mon2$dat2";




}













if($ser==5)
{






$sql="SELECT * FROM `bank_refill` WHERE user_id='$s' ";

$result=mysql_query($sql);
$arrco=mysql_fetch_array($result);
$m_id=$arrco[8];


//print" -- $m_id  --";

//$result = mysql_query("DELETE FROM tcosting_entry WHERE user_id=$s");

//$result = mysql_query("DELETE FROM costing_entry WHERE money_id=$m_id");

//$result = mysql_query("DELETE FROM cash_book WHERE money_id=$m_id");

//$result = mysql_query("DELETE FROM bank_refill WHERE user_id=$s");




//include_once('d.php');






}

















$d=$_GET['dell'];



if($d!="")
{
	
	
$dat1=$_GET['dat1'];
$mon1=$_GET['mon1'];
$yer1=$_GET['yer1'];


$dat2=$_GET['dat2'];
$mon2=$_GET['mon2'];
$yer2=$_GET['yer2'];


$supplier=$_GET['supplier'];



	
$sql="SELECT * FROM `rpayment_transection` WHERE user_id='$d' ";

$result=mysql_query($sql);
$arr_m=mysql_fetch_array($result);
$m_id=$arr_m[8];
$m_id2=$arr_m[12];



$sql="SELECT * FROM `receipt_laser` WHERE user_id='$supplier' ";


$result=mysql_query($sql);
$arrss=mysql_fetch_array($result);
$suppliern=$arrss[1];

$mobile=$arrss[2];
$address=$arrss[4];


$result = mysql_query("DELETE FROM rpayment_transection WHERE money_id2=$m_id2");
$result = mysql_query("DELETE FROM rtcosting_entry WHERE money_id2=$m_id2");
$result = mysql_query("DELETE FROM rcosting_entry WHERE money_id2=$m_id2");
$result = mysql_query("DELETE FROM cash_book WHERE money_id2=$m_id2");
$result = mysql_query("DELETE FROM bank_refill WHERE money_id2=$m_id2");



/*


$result = mysql_query("DELETE FROM salememo WHERE user_id=$d");
$result = mysql_query("DELETE FROM cash_book WHERE money_id=$m_id");
$result = mysql_query("DELETE FROM saleproduct WHERE money_id=$m_id");
$result = mysql_query("DELETE FROM customer_laser WHERE money_id=$m_id");
$result = mysql_query("DELETE FROM bank_refill WHERE money_id=$m_id");


*/

$mdate="$yer1$mon1$dat1";
$ndate="$yer2$mon2$dat2";

}





print"

<html>

<head>
<title> Money Receipt Ledger Transaction </title>
";


include_once('style.php');


print"

<style>

.list1 tr:hover{
background-color:pink;
}

</style>
</head>


<body>
";


include_once('header.php');


print"
<table align='center' width='1200' cellpadding='0' cellspacing='1' height='800' bgcolor='gray'>
<tr bgcolor='white'> 


";

include_once('find_transection_left.php');

print"





<td align='center' valign='top' width='980'> 




<table align='center' width='1000' cellpadding='0' cellspacing='1' bgcolor='F9F4D8'>

<tr> 
<td width='1000' height='320' bgcolor='ECE9D8' valign='top'> 

<table align='center' width='1000' cellpadding='0' cellspacing='0' bgcolor='F7D3F2'>
<tr> <td align='center' height='40'> <font face='arial' size='2'> Receipt Ledger Transaction  </font> </td> </tr>
<tr> <td align='center' height='1' bgcolor='F9F4D8'> </td> </tr>
</table>

";














print"
<table align='center' width='950' cellpadding='0' cellspacing='0' bgcolor='F3F3F3'>



<tr> 

<form action='rpayment_transection.php' method='POST'>

<td align='center' height='40'> 


<font face='arial' size='2'> Select Laser:   </font>

<select name='supplier'>

<option value='$supplier'> $suppliern id- $supplier  </option>

";



//$result = mysql_query("SELECT * FROM payment_laser");


$result = mysql_query("SELECT * FROM `receipt_laser`  ORDER BY `customer_name` ASC ");



while ($a_row = mysql_fetch_row($result)) {

	foreach ($a_row as $field) {
		
	}

print"
<option value='$a_row[0]'>$a_row[1] - id -$a_row[0]</option>
";

}

print"


</select>


<select name='dat1'>

<option>$dat1</option>
<option>01</option>
<option>01</option>
<option>02</option>
<option>03</option>
<option>04</option>
<option>05</option>
<option>06</option>
<option>07</option>
<option>08</option>
<option>09</option>
<option>10</option>
<option>11</option>
<option>12</option>
<option>13</option>
<option>14</option>
<option>15</option>
<option>16</option>
<option>17</option>
<option>18</option>
<option>19</option>
<option>20</option>
<option>21</option>
<option>22</option>
<option>23</option>
<option>24</option>
<option>25</option>
<option>26</option>
<option>27</option>
<option>28</option>
<option>29</option>
<option>30</option>
<option>31</option>
</select>


<select name='mon1'>
<option>$mon1</option>
<option>01</option>
<option>01</option>
<option>02</option>
<option>03</option>
<option>04</option>
<option>05</option>
<option>06</option>
<option>07</option>
<option>08</option>
<option>09</option>
<option>10</option>
<option>11</option>
<option>12</option>

</select>



<select name='yer1'>
<option>$yer1</option>
";

include_once('year.php');

print"
</select>

&nbsp;&nbsp;&nbsp; <font face='arial' size='2'>To </font>&nbsp;&nbsp;&nbsp;


<select name='dat2'>
<option>$dat2</option>
<option>01</option>
<option>01</option>
<option>02</option>
<option>03</option>
<option>04</option>
<option>05</option>
<option>06</option>
<option>07</option>
<option>08</option>
<option>09</option>
<option>10</option>
<option>11</option>
<option>12</option>
<option>13</option>
<option>14</option>
<option>15</option>
<option>16</option>
<option>17</option>
<option>18</option>
<option>19</option>
<option>20</option>
<option>21</option>
<option>22</option>
<option>23</option>
<option>24</option>
<option>25</option>
<option>26</option>
<option>27</option>
<option>28</option>
<option>29</option>
<option>30</option>
<option>31</option>
</select>


<select name='mon2'>
<option>$mon2</option>
<option>01</option>
<option>01</option>
<option>02</option>
<option>03</option>
<option>04</option>
<option>05</option>
<option>06</option>
<option>07</option>
<option>08</option>
<option>09</option>
<option>10</option>
<option>11</option>
<option>12</option>

</select>



<select name='yer2'>
<option>$yer2</option>
";

include_once('year1.php');

print"
</select>


<input type='hidden' name='ser' value='7'>

<input type='submit' value='Search'>

</td> 


</form>

</tr>


<tr> <td align='center' height='1' bgcolor='F9F4D8'> </td> </tr>
</table>



<table align='center' width='950' cellpadding='0' cellspacing='1'>
<tr bgcolor='F2F2F2'>
<td align='left' HEIGHT='30'> <font size='2' face='arial'> &nbsp; Ledger name: $suppliern Address: $address $mobile </font> </td>
</tr>
</table>



<table align='center' width='950' cellpadding='0' cellspacing='1'>

<tr bgcolor='F2F2F2'>
<td align='left' HEIGHT='30'> <font size='2' face='arial'>  </font> </td>
</tr>

</table>




<table align='center' width='950' cellpadding='3' cellspacing='1' bgcolor='black' class='list1'>

";

print"
<tr bgcolor='F677F2'>
<td align='center' height='20' width='80'>  <font face='arial' size='2' color=''> Date</font> </td> 
<td align='center' height='' width='80'>  <font face='arial' size='2' color=''> Money ID</font> </td> 
<td align='center' height='' width='180'>  <font face='arial' size='2' color=''> Comments </font> </td> 
<td width='80' align='center'>              <font face='arial' size='2'> Debit</font> </td>

<td width='80' align='center'>              <font face='arial' size='2'> Tk.</font> </td>


<td width='80' align='center'>              <font face='arial' size='2'> Credit</font> </td>
<td width='100' align='center'>              <font face='arial' size='2'> Tk. </font> </td>
<td width='100' align='center'>              <font face='arial' size='2'> Balance </font> </td>

";

	 if($user_name1=="superadmin")
{
print"
<td width='100' align='center'>              <font face='arial' size='2'> Delete </font> </td>
";
}

print"
</tr>
";





//$nn=
//$mm=






if($supplier!="")
{
$result = mysql_query("SELECT * FROM `rpayment_transection` where  bank_name='$supplier' && adat<'$mdate' ORDER BY `adat` ASC ");
}

if($supplier=="")
{
$result = mysql_query("SELECT * FROM `rpayment_transection` where   adat<'$mdate' ORDER BY `adat` ASC ");
}

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







$balancee=$cr-$dr;




//print"$balancee -";


//print"$balance <br>";


print"
<tr bgcolor='F2F2F2'>
<td align='center' height='20' width='80'>  <font face='arial' size='2' color=''> </font> </td> 
<td align='center' height='' width='80'>  <font face='arial' size='2' color=''> </font> </td> 
<td align='center' height='' width='180'>  <font face='arial' size='2' color=''>  </font> </td> 

<td width='80' align='center'>              <font face='arial' size='2'> </font> </td>


<td width='80' align='center'>              <font face='arial' size='2'> </font> </td>
<td width='80' align='center'>              <font face='arial' size='2'> Opening</font> </td>
<td width='100' align='center'>              <font face='arial' size='2'> $balancee </font> </td>
<td width='100' align='center'>              <font face='arial' size='2'> $balancee   </font> </td>

";

	 if($user_name1=="superadmin")
{
print"
<td width='100' align='center'>              <font face='arial' size='2'>   </font> </td>
";
}

print"

</tr>
";





$dr=0;
$cr=0;


$cr=0;

$balance=0;

//$result = mysql_query("SELECT * FROM salememo");



if($supplier!="")
{
$result = mysql_query("SELECT * FROM `rpayment_transection` where  bank_name='$supplier' && adat>='$mdate' && adat<='$ndate' ORDER BY `adat` ASC ");
}


if($supplier=="")
{
$result = mysql_query("SELECT * FROM `rpayment_transection` where   adat>='$mdate' && adat<='$ndate' ORDER BY `adat` ASC ");
}



while ($a_row = mysql_fetch_row($result)) {

	foreach ($a_row as $field) {
		
	}

print"
<tr bgcolor='white'>
<td align='center' height='30' width=''>  <font face='arial' size='2' color=''> $a_row[5]-$a_row[6]-$a_row[7]</font> </td> 


<td align='center' height='30' width='80'>  <font face='arial' size='2' color=''> $a_row[8] </font> </td>


<td align='left' height='30' width=''>  <font face='arial' size='2' color=''> $a_row[4] </font> </td> 



";



if($a_row[2]==2)
{

print"
<td width='' align='center'>              <font face='arial' size='2'> $a_row[3]  </font> </td>
";


print"
<td width='' align='center'>              <font face='arial' size='2'> </font> </td>
";

print"
<td width='' align='center'>              <font face='arial' size='2'> </font> </td>
";

$dr=$dr+$a_row[3];

}


if($a_row[2]==1)
{

print"
<td width='80' align='center'>              <font face='arial' size='2'> </font> </td>
";

print"
<td width='' align='center'>              <font face='arial' size='2'> </font> </td>
";

print"
<td width='' align='center'>              <font face='arial' size='2'>  $a_row[3] </font> </td>
";

$cr=$cr+$a_row[3];

}










$balance=$cr-$dr;




print"
<td width='' align='center'>              <font face='arial' size='2'> $b4alance </font> </td>
<td width='100' align='center'>              <font face='arial' size='2'> $balance   </font> </td>

";

	 if($user_name1=="superadmin")
{
print"
<td align='center' width='70'> <a onClick=\"javascript: return confirm('Are you confirm to delete');\" href=\"rpayment_transection.php?dell=$a_row[0]&supplier=$supplier&dat1=$dat1&mon1=$mon1&yer1=$yer1&dat2=$dat2&mon2=$mon2&yer2=$yer2 \"> <div id='del'><font face='arial' size='2'> Delete  </font> </div>  </a> </td>
";
}



print"

";

print"
</tr>
";

}



$bal=$balance+$balancee;



print"
<tr bgcolor='F2F2F2'>
<td align='center' height='20' width='80'>  <font face='arial' size='2' color=''> </font> </td> 
<td align='center' height='' width='80'>  <font face='arial' size='2' color=''> </font> </td> 
<td align='center' height='' width='180'>  <font face='arial' size='2' color=''>  </font> </td> 
<td width='80' align='center'>              <font face='arial' size='2'> Total Debit </font> </td>
<td width='80' align='center'>              <font face='arial' size='2'> $dr </font> </td>
<td width='80' align='center'>              <font face='arial' size='2'> Total_Credit </font> </td>
<td width='100' align='center'>              <font face='arial' size='2'> $cr </font> </td>
<td width='100' align='center'>              <font face='arial' size='2'> $balance   </font> </td>


";

	 if($user_name1=="superadmin")
{
print"
<td width='100' align='center'>              <font face='arial' size='2'>   </font> </td>
";
}


print"
</tr>
";



print"
<tr bgcolor='F2F2F2'>
<td align='center' height='20' width='80'>  <font face='arial' size='2' color=''> </font> </td> 
<td align='center' height='' width='80'>  <font face='arial' size='2' color=''> </font> </td> 
<td align='center' height='' width='180'>  <font face='arial' size='2' color=''>  </font> </td> 
<td width='80' align='center'>              <font face='arial' size='2'> Clo. Balance </font> </td>
<td width='80' align='center'>              <font face='arial' size='2'> $bal </font> </td>
<td width='80' align='center'>              <font face='arial' size='2'>  </font> </td>
<td width='100' align='center'>              <font face='arial' size='2'>  </font> </td>
<td width='100' align='center'>              <font face='arial' size='2'>   </font> </td>

";

	 if($user_name1=="superadmin")
{
print"
<td width='100' align='center'>              <font face='arial' size='2'>   </font> </td>
";
}

print"
</tr>
";


$tot_d=$bal+$dr;

$tot_dd=$balancee+$cr;


print"
<tr bgcolor='F2F2F2'>
<td align='center' height='20' width='80'>  <font face='arial' size='2' color=''> </font> </td> 
<td align='center' height='' width='80'>  <font face='arial' size='2' color=''> </font> </td> 
<td align='center' height='' width='180'>  <font face='arial' size='2' color=''>  </font> </td> 
<td width='80' align='center'>              <font face='arial' size='2'> Total </font> </td>
<td width='80' align='center'>              <font face='arial' size='2'> $tot_d </font> </td>
<td width='80' align='center'>              <font face='arial' size='2'>  Total </font> </td>
<td width='100' align='center'>              <font face='arial' size='2'> $tot_dd   </font> </td>

<td width='100' align='center'>              <font face='arial' size='2'>   </font> </td>
";

	 if($user_name1=="superadmin")
{
print"
<td width='100' align='center'>              <font face='arial' size='2'>   </font> </td>
";
}



print"
</tr>
";





print"
</table>
";






print"

<br>


<table align='center' width='750' cellpadding='0' cellspacing='0'>
<tr> 
<form action='rpayment_transection_print.php' method='POST' target='a_blank'>
<td align='right'>

<input type='hidden' name='supplier' value='$supplier'>
<input type='hidden' name='dat1' value='$dat1'>
<input type='hidden' name='mon1' value='$mon1'>
<input type='hidden' name='yer1' value='$yer1'>

<input type='hidden' name='ser' value='1'>


<input type='hidden' name='dat2' value='$dat2'>
<input type='hidden' name='mon2' value='$mon2'>
<input type='hidden' name='yer2' value='$yer2'>


 <input type='submit' value='Print'>  &nbsp;&nbsp;&nbsp;</td> 
</form>
</tr>
</table>

";
























print"



</td>


</tr>
</table>




</body>

</html>


";


?>