<?php

include_once('dbconnection.php');



$ser=trim($_POST['ser']);

$s=trim($_POST['s']);

$m_no=trim($_POST['m_no']);

$dat1=trim($_POST['dat1']);
$mon1=trim($_POST['mon1']);
$yer1=trim($_POST['yer1']);




$dat2=trim($_POST['dat2']);
$mon2=trim($_POST['mon2']);
$yer2=trim($_POST['yer2']);





$ar='"';


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



$supplier=$idvalue_s;


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




$supplier=$idvalue_s;


$rty=0;
$rkk=0;







//$supplier=trim($_POST['supplier']);







$mdate="$yer1$mon1$dat1";

$ndate="$yer2$mon2$dat2";






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



























$sql="SELECT * FROM `customer` WHERE user_id='$supplier' ";






$result=mysql_query($sql);
$arrss=mysql_fetch_array($result);
$suppliern=$arrss[1];

$mobile=$arrss[2];
$address=$arrss[4];








$mdate="$yer1$mon1$dat1";
$ndate="$yer2$mon2$dat2";






















print"

<html>

<head>
<title> Customer Money Receipt View </title>
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
document.p.supplier.value="";
}  
  
  
 </script>












<?php

include_once('style.php');


print"
</head>


<body>
";


//include_once('header.php');


print"
<table align='center' width='1500' cellpadding='0' cellspacing='1' height='800' bgcolor='gray'>
<tr bgcolor='white'> 


";

//include_once('find_transection_left.php');

print"





<td align='center' valign='top' width='980'> 

";

include_once('address.php');

print"


<table align='center' width='1500' cellpadding='0' cellspacing='1' bgcolor='F9F4D8'>

<tr> 
<td width='1000' height='320' bgcolor='ECE9D8' valign='top'> 


";







print"

<table align='center' width='1500' cellpadding='0' cellspacing='1' bgcolor='F9F4D8'>

<tr> 
<td width='1000' height='320' bgcolor='ECE9D8' valign='top'> 

<table align='center' width='1500' cellpadding='0' cellspacing='0' bgcolor='F7D3F2'>
<tr> <td align='center' height='40'> <font face='arial' size='2'> Customer Money Receipt View  </font> </td> </tr>
<tr> <td align='center' height='1' bgcolor='F9F4D8'> </td> </tr>
</table>








<table align='center' width='1500' cellpadding='0' cellspacing='0' bgcolor='F3F3F3'>



<tr> 

<form name='p' action='customer_money_receipt.php' method='POST'>

<td align='center' height='40'> 

<font face='arial' size='2'> Memo_id: </font>

<input type='text' name='m_no' size='20'>

<font face='arial' size='2'> Customer name
</font>
";



print"
: 
<label for='tags2'> </label>
<input type='text' id='tags2' name='supplier' value='$id_supplier' size='30' onclick='cl()'>
";


print"

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







<table align='center' width='1500' cellpadding='3' cellspacing='1'>

<tr bgcolor='F2F2F2'>
<td align='left' HEIGHT='30'> <font size='2' face='arial'> Customer name: $suppliern Address: $address $mobile </font> </td>
</tr>

</table>




<table align='center' width='1500' cellpadding='3' cellspacing='1'>

<tr bgcolor='F677F2'>


 
<td align='center' height='30' width='100'>  <font face='arial' size='2' color=''> Memo_ID</font> </td> 
<td width='100' align='center'>             <font face='arial' size='2'> Date </font> </td>
<td align='center' height='30' width='100'>  <font face='arial' size='2' color=''> Posting Name </font> </td> 
<td width='250' align='center'>              <font face='arial' size='2'> Comments </font> </td>
<td align='center' height='30' width='180'>  <font face='arial' size='2' color=''> Customer Name </font> </td> 
<td width='100' align='center'>              <font face='arial' size='2'> Address</font> </td>
<td width='100' align='center'>              <font face='arial' size='2'> Mobile </font> </td>


<td width='100' align='center'>              <font face='arial' size='2'> Previous Due </font> </td>
<td width='100' align='center'>              <font face='arial' size='2'> Discount </font> </td>
<td width='100' align='center'>              <font face='arial' size='2'> Total </font> </td>


<td width='50' align='center'>              <font face='arial' size='2'> Payment </font> </td>

<td width='50' align='center'>              <font face='arial' size='2'> Adjust Amount </font> </td>

<td width='50' align='center'>              <font face='arial' size='2'> Due</font> </td>

";


print"
<td width='100' align='center'>              <font face='arial' size='2'>  View </font> </td>
";




/*
<td width='50' align='center'>              <font face='arial' size='2'> Counting Present Due </font> </td>
*/




print"
</tr>
";













//$result = mysql_query("SELECT * FROM salememo");

$cv=0;

if($m_no!="")
{
$result = mysql_query("SELECT * FROM `customer_money_receipt` where  money_id='$m_no'  ORDER BY `user_id` ASC ");

$cv=1;
}



if($supplier!="" && $cv==0)
{
$result = mysql_query("SELECT * FROM `customer_money_receipt` where adat>='$mdate' && adat<='$ndate' && bank_name='$supplier' ORDER BY `adat` ASC ");

$cv=1;
}


if($cv==0)
{
$result = mysql_query("SELECT * FROM `customer_money_receipt` where adat>='$mdate' && adat<='$ndate'  ORDER BY `adat` ASC ");

$cv=1;
}




while ($a_row = mysql_fetch_row($result)) {

	foreach ($a_row as $field) {
		
	}



	
	
print"
<tr bgcolor='white'>

<td align='center' height='30' width='100'>  <font face='arial' size='2' color=''> $a_row[8] </font> </td> 
<td width='100' align='center'>             <font face='arial' size='2'> $a_row[5]-$a_row[6]-$a_row[7] </font> </td>
<td align='left' height='30' width='100'>  <font face='arial' size='2' color=''> $a_row[10] </font> </td> 
<td width='50' align='left'>              <font face='arial' size='2'> $a_row[4] </font> </td>
<td align='left' height='30' width='180'>  <font face='arial' size='2' color=''> $a_row[23] </font> </td> 
<td width='100' align='left'>              <font face='arial' size='2'> $a_row[22] </font> </td>
<td width='100' align='left'>              <font face='arial' size='2'> $a_row[25] </font> </td>


<td width='100' align='center'>              <font face='arial' size='2'> $a_row[19] </font> </td>
<td width='100' align='center'>              <font face='arial' size='2'> $a_row[20] </font> </td>
<td width='100' align='right'>              <font face='arial' size='2'> $a_row[21] </font> </td>


<td width='50' align='right'>              <font face='arial' size='2'> $a_row[3] </font> </td>

<td width='50' align='right'>              <font face='arial' size='2'> $a_row[26] </font> </td>


<td width='50' align='right'>              <font face='arial' size='2'> $a_row[24] </font> </td>

";
	
	
	
	
	
	
	
	
	

print"

<form action='money_receipt_view.php' method='POST' target='_blank'>

<td width='100' align='center'>  
<input type='hidden' name='s' value='$a_row[0]'>      
<input type='submit' value='View'>

</td>

</form>

";



print"
</tr>
";

}



print"
</table>
";










//   total sale $tyuu=$c11+$ddd;







print"

<br>
<br>


</td>


</tr>
</table>




</body>

</html>


";


?>