<?php

include_once('dbconnection.php');


$ser=trim($_POST['ser']);







$ar='"';


$id_supplier=trim($_POST['bank_name']);

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



$bank_name=$idvalue_s;


$rty=0;
$rkk=0;



if($id_supplier=="")
{
$id_supplier=$_GET['sup'];	

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



$id_supplier=str_replace("&","and","$id_supplier");
$id_supplier=str_replace("#","hash","$id_supplier");




$bank_name=$idvalue_s;


$rty=0;
$rkk=0;



















//$bank_name=trim($_POST['bank_name']);
//$credit=trim($_POST['credit']);
$amount=trim($_POST['amount']);
$comments=trim($_POST['comments']);





$dat=trim($_POST['dat']);
$mon=trim($_POST['mon']);
$yer=trim($_POST['yer']);


$dat1=trim($_POST['dat1']);
$mon1=trim($_POST['mon1']);
$yer1=trim($_POST['yer1']);


	
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

$adat="$yer$mon$dat";

$mdat="$yer1$mon1$dat1";


$money_id= time().$u;




if($ser==1)
{

$sql="SELECT * FROM `customer` WHERE user_id='$bank_name' ";


$result=mysql_query($sql);
$arrb=mysql_fetch_array($result);

$bank_namem=$arrb[1];

$u=$arrb[0];


$a=0;

if($bank_name=="")
{
//include_once('w.php');
$a=1;
}

$credit=2;

if($credit=="" && $a==0)
{
//include_once('w.php');
$a=1;
}



if($credit=="" && $a==0)
{
//include_once('w.php');
$a=1;
}

if($amount=="" && $a==0)
{
//include_once('w.php');
$a=1;
}



if($a==0)
{
/*
$sal=1;

$commentss="Sales commission - $comments";	

$sql = "INSERT INTO `customer_laser` (`user_id`, `bank_name`,`credit`, `amount`,`comments`,`dat`, `mon`, `yer`, `money_id`, `adat`, `user`,`discount_less`,`sal`) VALUES ('','$u','$credit','$amount','$commentss','$dat','$mon','$yer','$money_id','$adat','$user','$amount','$sal')";

mysql_query($sql);


include_once('s.php');
*/

}



}











print"

<html>

<head>
<title> Find Sales Commission   </title>
";
?>








  <link rel="stylesheet" href="jquery-ui-themes-1.11.4/themes/smoothness/jquery-ui.css">
  
  <script src="jquery-1.10.2.js"></script>
  <script src="jquery-ui.js"></script>
  
 
  
  <script>
  
  var availableTags;

  var availableTags2;

  
  var saletags;
  
  var stooo;
  
  
  var sale_price1;
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  


  
  
  $(function() {
	  
	  
	  
 availableTags2 = [

	<?php
	

	

	
$result = mysql_query("SELECT * FROM `customer`  ORDER BY `company_name` ASC ");



while ($a_row = mysql_fetch_row($result)) {

	foreach ($a_row as $field) {
		
	}

$cq='"';	
$cq = mb_ereg_replace("$cq","*", $a_row[7]);

$cq10='"';
$cq10 = mb_ereg_replace("$cq10","*", $a_row[5]);



print"


${ar}$cq  - $cq10 - $a_row[3]=$a_row[0]$ar, 

 ";


	}
?>

      "Testing"

    ];
    $( "#tags2" ).autocomplete({
      source: availableTags2
    });
  });
  



function cl()
{
document.p.bank_name.value="";
}  
  
  
 </script>

















<?php

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





include_once('sales_commission_left.php');







print"


<td align='center' valign='top' width='980'> 


<br>
<br>



<form name='p' action='find_sales_commission.php' method='POST'>

<table align='center' width='950' cellpadding='0' cellspacing='1' bgcolor='F9F4D8'>

<tr> 
<td width='650' height='0' bgcolor='ECE9D8' valign='top'> 



<table align='center' width='950' cellpadding='0' cellspacing='0' bgcolor='F7D3F2'>
<tr> <td align='center' height='40'> <font face='arial' size='3'> Find Direct Sales Commission   </font> </td> </tr>
<tr> <td align='center' height='1' bgcolor='F9F4D8'> </td> </tr>
</table>

<br><br>

<table align='center' width='950' cellpadding='0' cellspacing='0'>


<tr> 
<td align='center' height='30' width='150'><font face='arial' size='3'> Select Customer: &nbsp;</font> 
";






print" 
<label for='tags2'> </label>
<input type='text' id='tags2' name='bank_name' value='$id_supplier' size='30' onclick='cl()'>
";










print"
Select Date:
&nbsp;&nbsp;&nbsp;&nbsp;


<select name='dat'>
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

<select name='mon'>
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

<select name='yer'>
<option name='$yer'>$yer</option>
";

include_once('year.php');

print"

</select>

To



<select name='dat1'>
<option name='$dat1'>$dat1</option>
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

<select name='mon1'>
<option name='$mon1'>$mon1</option>
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

<select name='yer1'>
<option name='$yer1'>$yer1</option>
";

include_once('year1.php');

print"

</select>

<input type='hidden' name='ser' value='1'>
<input type='submit' value='Search'>

</td>
</tr>





</table>


</td> 
</tr>

</table>



</form>



<table align='center' width='950' cellpadding='0' cellspacing='1' bgcolor='black'>

<tr bgcolor='#F2F2F2'> 
<td align='center' width='100' height='40'> <font face='arial' size='3'> Date </font> </td>
<td align='center' width='100'> <font face='arial' size='3'> Money ID </font> </td>
<td align='center' width='100'> <font face='arial' size='3'> Customer Name </font> </td>
<td align='center' width='100'> <font face='arial' size='3'> Amount </font> </td>
</tr>
";


if($bank_name!="")
{
$result = mysql_query("SELECT * FROM `customer_laser` where  bank_name='$bank_name' && adat>='$adat' &&  adat<='$mdat' && sal='1' ORDER BY `adat` ASC ");
}

if($bank_name=="")
{
$result = mysql_query("SELECT * FROM `customer_laser` where adat>='$adat' &&  adat<='$mdat' && sal='1' ORDER BY `adat` ASC ");
}

while ($a_row = mysql_fetch_row($result)) {

	foreach ($a_row as $field) {
		
	}


print"
<tr bgcolor='white'> 
<td align='center' width='100' height='40'> <font face='arial' size='3'> $a_row[5]-$a_row[6]-$a_row[7] </font> </td>
<td align='center' width='100'> <font face='arial' size='3'> $a_row[8] </font> </td>
<td align='center' width='100'> <font face='arial' size='3'> $bank_namen </font> </td>
<td align='center' width='100'> <font face='arial' size='3'> $a_row[3] </font> </td>
</tr>
";


$amount=$amount+$a_row[3];
}



print"
<tr bgcolor='white'> 
<td align='center' width='100' height='40'> <font face='arial' size='3'>  </font> </td>
<td align='center' width='100'> <font face='arial' size='3'>  </font> </td>
<td align='center' width='100'> <font face='arial' size='3'> <b> Total </b>  </font> </td>
<td align='center' width='100'> <font face='arial' size='3'> <b> $amount </b> </font> </td>
</tr>
";



print"


</table>










 </td>


</tr>
</table>




</body>

</html>


";


?>