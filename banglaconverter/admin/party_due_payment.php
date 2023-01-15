<?php
include_once('dbconnection.php');


include_once('ppp.php');




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
$id_supplier=$_GET['supplier'];	

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





$ser=trim($_POST['ser']);
$s=trim($_POST['s']);


$dat1=trim($_POST['dat1']);
$mon1=trim($_POST['mon1']);
$yer1=trim($_POST['yer1']);

//$supplier=trim($_POST['supplier']);


$bill_no=trim($_POST['bill_no']);



if($bill_no==1)
{
$bill_non="Due";	
}

if($bill_no==2)
{
$bill_non="All";	
}




$dat2=trim($_POST['dat2']);
$mon2=trim($_POST['mon2']);
$yer2=trim($_POST['yer2']);



if($ser=="")
{

$dat1=$_GET['dat1'];
$mon1=$_GET['mon1'];
$yer1=$_GET['yer1'];

$dat2=$_GET['dat2'];
$mon2=$_GET['mon2'];
$yer2=$_GET['yer2'];
$rm=$_GET['action'];


}










if($supplier=="")
{
$supplier=$_GET['supplier'];
}


$sql="SELECT * FROM `supplier` WHERE user_id='$supplier' ";
$result=mysql_query($sql);
$arrs=mysql_fetch_array($result);
$suppliern=$arrs[1];
$mobile=$arrs[3];
$address=$arrs[5];




$mdate="$yer1$mon1$dat1";
$ndate="$yer2$mon2$dat2";


//print"$mdate -";


if($supplier=="")
{
$suppliern="All";
}




if($ser=="" && $rm=="")
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


//$result = mysql_query("DELETE FROM cash_book WHERE money_id=$m_id");

//$result = mysql_query("DELETE FROM customer_laser WHERE money_id=$m_id");
//$result = mysql_query("DELETE FROM bank_refill WHERE money_id=$m_id");

//$result = mysql_query("DELETE FROM salememo_return WHERE user_id=$d");
//$result = mysql_query("DELETE FROM saleproduct_return WHERE money_id=$m_id");

//$result = mysql_query("DELETE FROM buyproduct WHERE money_id=$m_id");
//$result = mysql_query("DELETE FROM buymemo WHERE money_id=$m_id");





include_once('d.php');






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




	
$sql="SELECT * FROM `customer_laser` WHERE user_id='$d' ";

$result=mysql_query($sql);
$arr_m=mysql_fetch_array($result);
$m_id=$arr_m[8];


$sql="SELECT * FROM `customer` WHERE user_id='$supplier' ";


$result=mysql_query($sql);
$arrss=mysql_fetch_array($result);
$suppliern=$arrss[1];

$mobile=$arrss[3];
$address=$arrss[5];

$mz=0;

$result = mysql_query("DELETE FROM salememo WHERE money_id=$m_id && m_new!=$mz ");
$result = mysql_query("DELETE FROM cash_book WHERE money_id=$m_id && m_new!=$mz ");
$result = mysql_query("DELETE FROM saleproduct WHERE money_id=$m_id && m_new!=$mz ");
$result = mysql_query("DELETE FROM customer_laser WHERE money_id=$m_id && m_new!=$mz ");
$result = mysql_query("DELETE FROM bill_ledger WHERE money_id=$m_id && m_new!=$mz ");



$result = mysql_query("DELETE FROM bank_refill WHERE money_id=$m_id && m_new!=$mz ");
$result = mysql_query("DELETE FROM check_entry WHERE money_id=$m_id && m_new!=$mz ");



$result = mysql_query("DELETE FROM salememo_return WHERE money_id=$m_id");
$result = mysql_query("DELETE FROM saleproduct_return WHERE money_id=$m_id");

$result = mysql_query("DELETE FROM buyproduct WHERE money_id=$m_id && m_new!=$mz");
$result = mysql_query("DELETE FROM buymemo WHERE money_id=$m_id && m_new!=$mz");



$mdate="$yer1$mon1$dat1";
$ndate="$yer2$mon2$dat2";

}





print"

<html>

<head>
<title> Due Payment  </title>
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
	

	

	
$result = mysql_query("SELECT * FROM `supplier`  ORDER BY `customer_name` ASC ");



while ($a_row = mysql_fetch_row($result)) {

	foreach ($a_row as $field) {
		
	}

$cq='"';	
$cq = mb_ereg_replace("$cq","*", $a_row[1]);

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
<tr> <td align='center' height='40'> <font face='arial' size='2'> Supplier Due Payment </font> </td> </tr>
<tr> <td align='center' height='1' bgcolor='F9F4D8'> </td> </tr>
</table>

";














print"
<table align='center' width='950' cellpadding='0' cellspacing='0' bgcolor='F3F3F3'>







<tr> 

<form name='p' action='party_due_payment.php' method='POST'>

<td align='center' height='40'> 








<font face='arial' size='4'> Select Supplier    </font>

";


print"
: 
<label for='tags2'> </label>
<input type='text' id='tags2' name='supplier' value='$id_supplier' size='30' onclick='cl()'>
";






print"
<font face='arial' size='2'> Select One:   </font>

<select name='bill_no'>

<option value='$bill_no'>$bill_non</option>

<option value='1'>Due</option>
<option value='2'>All</option>
</select>

&nbsp;&nbsp;
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





<table align='center' width='950' cellpadding='0' cellspacing='1'>

<tr bgcolor='F2F2F2'>
<td align='left' HEIGHT='30'> <font size='3' face='arial'> &nbsp; <b> Supplier name: $suppliern </b> </font> </td>
</tr>

<tr bgcolor='F2F2F2'>
<td align='left' HEIGHT='30'> <font size='3' face='arial'> &nbsp; <b> Address: $address </b> </font> </td>
</tr>


<tr bgcolor='F2F2F2'>
<td align='left' HEIGHT='30'> <font size='3' face='arial'> &nbsp; <b> Mobile: $mobile </b>  </font> </td>
</tr>


</table>



<table align='center' width='950' cellpadding='0' cellspacing='1'>

<tr bgcolor='F2F2F2'>
<td align='left' HEIGHT='30'> <font size='2' face='arial'>  </font> </td>
</tr>

</table>





<table align='center' width='950' cellpadding='5' cellspacing='1' bgcolor='black'>

";

print"
<tr bgcolor='F677F2'>
<td align='center' height='20' width='80'>  <font face='arial' size='2' color=''> Date</font> </td> 
<td align='center' height='' width='80'>  <font face='arial' size='2' color=''> Bill No </font> </td> 
<td align='center' height='' width='180'>  <font face='arial' size='2' color=''> Name </font> </td> 
<td width='100' align='center'>              <font face='arial' size='2'> Total </font> </td>
<td width='100' align='center'>              <font face='arial' size='2'> Paid </font> </td>
<td width='100' align='center'>              <font face='arial' size='2'> Due </font> </td>

";


print"
</tr>
";





//$nn=
//$mm=






if($supplier!="")
{
$result = mysql_query("SELECT * FROM `supplier_laser` where  bank_name='$supplierr' && adat<'$mdate' ORDER BY `adat` ASC ");
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











$result = mysql_query("SELECT * FROM `buymemo` where  supplier_id='$supplier' &&  adat>='$mdate' && adat<='$ndate'  ORDER BY `adat` ASC ");


while ($a_row = mysql_fetch_row($result)) {

	foreach ($a_row as $field) {
		
	}
	
	$tu++;
	$bill[$tu]=$a_row[1];
	$bill_name[$tu]=$a_row[3];
	$bill_date[$tu]="$a_row[9]-$a_row[10]-$a_row[11]";
	
	
	
}















for($i=1;$i<=$tu;$i++)
{
$dr=0;
$cr=0;
$cr=0;
$balance=0;



$result = mysql_query("SELECT * FROM `supplier_laser` where  money_id='$bill[$i]' && adat>='$mdate' && adat<='$ndate'  ORDER BY `adat` ASC ");


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

$balance=$cr-$dr;

}



if($bill_no==1 && $balance>0)
{
	
$tc=$tc+$cr;
$td=$td+$dr;
$ball=$ball+$balance;

	
print"
<tr bgcolor='white'>
<td align='center' height='30' width=''>  <font face='arial' size='2' color=''> $bill_date[$i] </font> </td> 
<td align='center' height='30' width='80'>  <font face='arial' size='2' color=''> $bill[$i] </font> </td>
";


print"
<td align='left' height='30' width=''>  <font face='arial' size='2' color=''>  $bill_name[$i] </font> </td> 
";



print"
<td width='' align='center'>              <font face='arial' size='2'> $cr </font> </td>
<td width='' align='center'>              <font face='arial' size='2'> $dr </font> </td>
<td width='100' align='center'>              <font face='arial' size='2'> $balance   </font> </td>

";


print"
</tr>
";

}














if($bill_no==2)
{
	
$tc=$tc+$cr;
$td=$td+$dr;
$ball=$ball+$balance;

	

	
if($balance>0)
{
print"
<tr bgcolor='yellow'>
";

}
else
{
print"
<tr bgcolor='white'>
";

}
	
	
print"
<td align='center' height='30' width=''>  <font face='arial' size='2' color=''> $bill_date[$i] </font> </td> 
<td align='center' height='30' width='80'>  <font face='arial' size='2' color=''> $bill[$i] </font> </td>
";


print"
<td align='left' height='30' width=''>  <font face='arial' size='2' color=''>  $bill_name[$i] </font> </td> 
";



print"
<td width='' align='center'>              <font face='arial' size='2'> $cr </font> </td>
<td width='' align='center'>              <font face='arial' size='2'> $dr </font> </td>
<td width='100' align='center'>              <font face='arial' size='2'> $balance   </font> </td>

";


print"
</tr>
";

}














}




print"
<tr bgcolor='F2F2F2'>
<td align='center' height='20' width='80'>  <font face='arial' size='2' color=''> </font> </td> 
<td align='center' height='' width='80'>  <font face='arial' size='2' color=''> </font> </td> 
<td align='center' height='' width=''>  <font face='arial' size='2' color=''>  </font> </td> 
<td align='center' height='' width=''>  <font face='arial' size='2' color=''>  $tc </font> </td> 
<td align='center' height='' width=''>  <font face='arial' size='2' color=''> $td </font> </td> 
<td align='center' height='' width=''>  <font face='arial' size='2' color=''> $ball </font> </td> 
</tr>
";



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
<form action='party_due_bill_print.php' method='POST' target='_blank'>
<td align='right'>

<input type='hidden' name='supplier' value='$supplier'>
<input type='hidden' name='dat1' value='$dat1'>
<input type='hidden' name='mon1' value='$mon1'>
<input type='hidden' name='yer1' value='$yer1'>

<input type='hidden' name='ser' value='1'>

<input type='hidden' name='bill_no' value='$bill_no'>


<input type='hidden' name='dat2' value='$dat2'>
<input type='hidden' name='mon2' value='$mon2'>
<input type='hidden' name='yer2' value='$yer2'>




</td> 
</form>
</tr>
</table>

";





if($user_name1=="superadmin")
{
	
	
	
	
	
$profit=0;

if($supplier=="")
{

$result = mysql_query("SELECT * FROM `saleproduct` where  adat>='$mdate' && adat<='$ndate'  ");

}

else
{
$result = mysql_query("SELECT * FROM `saleproduct` where supplier_id='$supplier' && adat>='$mdate' && adat<='$ndate'  ");
	
}



while ($a_row = mysql_fetch_row($result)) {

	foreach ($a_row as $field) {
		
	}
	
	$profit=$profit+$a_row[16];
}

	
	
	
	
	
$less=0;
if($supplier=="")
{
$result = mysql_query("SELECT * FROM `customer_laser` where  adat>='$mdate' && adat<='$ndate'  ");
}

else
{
$result = mysql_query("SELECT * FROM `customer_laser` where bank_name='$supplier' && adat>='$mdate' && adat<='$ndate'  ");	
}

while ($a_row = mysql_fetch_row($result)) {

	foreach ($a_row as $field) {
		
	}
	
	$less1=$less1+$a_row[13];
	$less2=$less2+$a_row[14];
	
	
}



$less=$less1+$less2;

$pro1=$profit-$less;


	
	
	
	
	
	
/*
print"

<br><br>
<table align='center' width='1000' cellpadding='0' cellspacing='0'>

<tr> 

<td height='40' bgcolor='green' align='center'>

<font face='arial' size='3' color='white'> &nbsp;&nbsp;&nbsp; <b>  Profit: $profit -  Commission: $less = Net Profit : $pro1  </b> </font>


</td> 
</tr>

</table>

";

	*/

}

















print"



</td>


</tr>
</table>




</body>

</html>


";


?>