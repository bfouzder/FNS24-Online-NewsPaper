<?php

include_once('dbconnection.php');



$cbank=trim($_POST['cbank']);


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



//$supplier=$idvalue_s;


$bank_name1=$idvalue_s;






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




$bank_name1=$idvalue_s;


$rty=0;
$rkk=0;


$ar='"';










$result = mysql_query("SELECT * FROM `customer`  ORDER BY `company_name` ASC ");


while ($a_row = mysql_fetch_row($result)) {

	foreach ($a_row as $field) {
		
	}

$rf++;
$bank_name[$rf]=$a_row[1];
$bank_address[$rf]=$a_row[5];
$bank_id[$rf]=$a_row[0];
$company_name[$rf]=$a_row[7];
$customer_id[$rf]=$a_row[2];


}












for($i=1;$i<=$rf;$i++)

{

$cr5=0;
$de5=0;
$cv5=0;




$result = mysql_query("SELECT * FROM `customer_laser`  where bank_name='$bank_id[$i]'    ORDER BY `user_id` ASC  LIMIT 0 , 100000");





while ($a_row = mysql_fetch_row($result)) {

	foreach ($a_row as $field) {
		
	}

if($a_row[2]==1)
{
$cr5=$cr5+$a_row[3];
}

if($a_row[2]==2)
{
$de5=$de5+$a_row[3];
}


}


$cv5=$cr5-$de5;

$opp++;
$due_balance_new[$opp]=$cv5;


//print"$bank_name[$i] - $due_balance_new[$opp] <br>";


}





















$ser=trim($_POST['ser']);


//$bank_name=trim($_POST['bank_name']);
$credit=trim($_POST['credit']);
$check_amount=trim($_POST['amount']);
$comments=trim($_POST['comments']);
$check_no=trim($_POST['check_no']);
$payment_mode=trim($_POST['payment_mode']);


$comments=str_replace("'","`","$comments");




$dat=trim($_POST['dat']);
$mon=trim($_POST['mon']);
$yer=trim($_POST['yer']);



$idat=trim($_POST['idat']);
$imon=trim($_POST['imon']);
$iyer=trim($_POST['iyer']);
$iadat="$iyer$imon$idat";




	
if($ser=="")
{

$bbb=time(); 
$d=date("m/d/y",$bbb); 
$mon="$d[0]$d[1]";
$dat="$d[3]$d[4]";
$yer="20$d[6]$d[7]";

$imon="$d[0]$d[1]";
$idat="$d[3]$d[4]";
$iyer="20$d[6]$d[7]";


}

$adat="$yer$mon$dat";


$money_id= time().$u;

$money_id2= time().$u_idd;




if($ser==1)
{

$sql="SELECT * FROM `customer` WHERE user_id='$bank_name1' ";

$result=mysql_query($sql);
$arrb=mysql_fetch_array($result);

$bank_namem=$arrb[1];
$u=$arr1[0];
$suppliern=$arrb[1];
$address=$arrb[5];
$mobile=$arrb[3];
$supplier_id=$arrb[2];
$u=$arrb[0];
$a=0;


$sql="SELECT * FROM `bank` WHERE user_id='$payment_mode' ";
$result=mysql_query($sql);
$arrsp=mysql_fetch_array($result);
$payment_moden=$arrsp[1];
//$bank_account_no=$arrsp[1];
$credit=1;







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




if($check_amount=="" && $a==0)
{
include_once('w.php');
$a=1;
}

/*
if($check_no=="" && $a==0)
{
include_once('w.php');
$a=1;
}
*/


if($a==0)
{

$commentss=" Cheque No :  $check_no $comments";	

if($cbank!="" && $check_amount!="")
{

$sql = "INSERT INTO `check_entry` (`user_id`, `customer_name`, `customer_id`, `mobile`, `address`, `bank_name`, `check_no`, `amount`, `dat`, `mon`, `yer`, `adat`, `idat`, `imon`, `iyer`, `iadat`, `active`, `comments`, `bank_id`, `money_id`, `account_no`, `u_name`, `money_id2`, `u_id2`, `cbank`) VALUES ('','$suppliern','$bank_name1','$mobile','$address','$payment_moden','$check_no','$check_amount','$dat','$mon','$yer','$adat','$idat','$imon','$iyer','$iadat','$active','$comments','$payment_mode','$money_id','$bank_account_no','$u_namee','$money_id2','$u_idd','$cbank')";
mysql_query($sql);
include_once('s.php');

}



}



}











print"

<html>

<head>
<title> Cheque Entry of Customer  </title>
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


$mkk++;

print"


${ar}$cq  - $cq10 - $a_row[3]- Due Balance $due_balance_new[$mkk]=$a_row[0]$ar, 

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
document.p.supplier.value="";
}  
  
  
 </script>








<?php

include_once('style.php');

print"
<style>
#tags2
{
width:200px;
height:25px;
}
</style>
";

print"
</head>


<body>
";


include_once('header.php');


print"
<table align='center' width='1200' cellpadding='0' cellspacing='1' height='800' bgcolor='gray'>
<tr bgcolor='white'> 

";





include_once('check_report_left.php');









print"


<td align='center' valign='top' width='980'> 


<br>
<br>



<form name='p' action='check_entry.php' method='POST'>

<table align='center' width='450' cellpadding='0' cellspacing='1' bgcolor='F9F4D8'>
<tr> 
<td width='450' height='' bgcolor='ECE9D8' valign='top'> 



<table align='center' width='550' cellpadding='0' cellspacing='1' bgcolor='F9F4D8'>

<tr> 
<td width='450' height='450' bgcolor='ECE9D8' valign='top'> 



<table align='center' width='550' cellpadding='0' cellspacing='0' bgcolor='F7D3F2'>
<tr> <td align='center' height='40'> <font face='arial' size='3'> Cheque  Entry Of Customer </font> </td> </tr>
<tr> <td align='center' height='1' bgcolor='F9F4D8'> </td> </tr>
</table>

<br><br>

<table align='center' width='420' cellpadding='0' cellspacing='0'>


<tr> 
<td align='left' height='30' width='250'><font face='arial' color='black' size='3'> Select Date </font> </td> 
<td width='270' align='left'>
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


<tr> <td height='8'> </td> </tr>

<tr> 
<td align='left' height='30' width=''><font color='black' face='arial' size='3'> Select Customer Name </font> </td> 
<td width='' align='left'>

";

print"
:
<label for='tags2'> </label>
<input type='text' id='tags2' name='supplier' value='$id_supplier' size='27' onclick='cl()'>
";


print"
</td>
</tr>





<tr> <td height='8'> </td> </tr>

<tr> 

<td width='' align='left'> <font color='black' face='arial' size='3'>  Bank Name </font> </td>
<td width='' height='30' align='left'> 
:

<input type='text' name='cbank' id='txt'>


</td>
</tr>



<tr> <td height='8'> </td> </tr>

";



print"
<tr> 
<td width='' align='left'> <font color='black' face='arial' color='black' size='3'> Cheque No   &nbsp; </font></td>
<td width='' height='30' align='left' valign='top'> :
<input type='text' name='check_no' value='$check_no' id='txt'>
</td>
</tr>
<tr> <td height='8'> </td> </tr>
";


print"
<tr> 
<td align='left' height='30' width=''><font color='black' face='arial' size='3'> Amount </font> </td> 
<td width='' align='left'> : <input type='text' name='amount' id='txt' size='30'> </td>
</tr>





<tr> <td height='8'> </td> </tr>



<tr> 

<td width='' align='left'> <font color='black' face='arial' size='3'> Cheque Active Date  </font></td>
<td width='' height='30' align='left' valign='top'> 
:
<select name='idat' id='dat1'>
<option name='$idat'>$idat</option>
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

<select name='imon' id='mon1'>
<option name='$imon'>$imon</option>
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

<select name='iyer' id='yer1'>
<option name='$iyer'>$iyer</option>
";

include_once('year1.php');

print"

</select>

</td>
</tr>






<tr> <td height='8'> </td> </tr>




<tr> 
<td align='left' height='30' width='' valign=''><font color='black' face='arial' size='3'> Comments </font> </td> 
<td width='' align='left' valign='top'>  &nbsp; <textarea rows='3' cols='27' name='comments'></textarea> </td>
</tr>



<tr> 
<td align='right' height='40' width='' valign='top'> </td> 
<td width='' align='center'> 

<input type='hidden' name='ser' value='1'>
<input type='submit' value='Save'>

 </td>
</tr>

</table>


</td> 
</tr>

</table>


</tr>
</td>
</table>

</form>













 </td>


</tr>
</table>




</body>

</html>


";


?>