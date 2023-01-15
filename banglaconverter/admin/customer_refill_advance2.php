<?php
include_once('dbconnection.php');










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








$ser=trim($_POST['ser']);
$less=trim($_POST['less']);


$payment=trim($_POST['payment']);
$payment_mode=trim($_POST['payment_mode']);
$paymenttype=trim($_POST['paymenttype']);
//$supplier=trim($_POST['supplier']);
$comments=trim($_POST['comments']);

$return_amount=trim($_POST['return_amount']);



$comments=str_replace("'","`","$comments");






$sql="SELECT * FROM `bank` WHERE user_id='$payment_mode' ";
$result=mysql_query($sql);
$arrsp=mysql_fetch_array($result);
$payment_moden=$arrsp[1];


if($payment_mode=="")
{
$payment_moden="Cash";	
}

//print" $less - $payment  ";




$sql="SELECT * FROM `customer` WHERE user_id='$supplier' ";


$result=mysql_query($sql);
$arrs=mysql_fetch_array($result);
$suppliern=$arrs[7];






if($ser==6)

{

$b=0;


if($supplier=="" && $b==0)
{
include_once('sup.php');
$b=1;
}


if($payment=="" && $b==0)
{
include_once('pay.php');
$b=1;
}



}













$due=0;



$cr=0;
$de=0;
$cv=0;

$result = mysql_query("SELECT * FROM `customer_advance`  where bank_name='$supplier'  ORDER BY `user_id` ASC  LIMIT 0 , 100000");


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


$cv=$cr-$de;





$tcr=$tcr+$cr;
$tde=$tde+$de;
$tcv=$tcv+$cv;


$pdue=$tcv;


$due=$pdue-$payment;








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







$ar='"';



print"

<html>
<head>
<base target='_parent' /> 
<meta http-equiv='content-type' content='text/html;charset=utf-8' />

<title> Sales Advance Receive </title>
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


include_once('header2.php');


print"
<table align='center' width='1200' cellpadding='0' cellspacing='1' height='800' bgcolor='gray'>
<tr bgcolor='white'> 
<td align='center' valign='top' width='220' bgcolor='#C5B991'>  

<table align='center' width='200' cellpadding='0' cellspacing='0' height=''>

<tr> <td height='10'> </td></tr>


<tr> <td height='30' width='200' bgcolor='green'>   <span id='child'> <b> <font color='white'> Sales </font> </b> </span>  </td></tr>

<tr> <td height='7'> </td></tr>

";


include_once('sales_left.php');





print"
</td>












<td align='center' valign='top' width='980' valign='top' bgcolor='F2F2F2'>  



<table align='center' width='900' cellpadding='0' cellspacing='0' bgcolor='F2F2F2'>

<tr> <td height='50' align='center'> <font size='4' face='arial' color='blue'> Sales Advance Receive  </font> </td> </tr>

</table>

<table align='center' width='900' cellpadding='0' cellspacing='0' bgcolor='F2F2F2'>

<tr> <td height='20'> </td> </tr>

<tr> 

<td width='900' bgcolor='' align='center' valign='top' height='900'>

<table align='center' width='900' cellpadding='0' cellspacing='0'>


<tr> <td height='0'> </td> </tr>




<tr> 

<form name='p' action='customer_refill_advance2.php' method='POST'>




<td width='500' align='left'> 

<font size='2' face='arial' color='716E6E'> &nbsp;&nbsp; <b>  Customer Name </b> </font>
";


print"
: 
<label for='tags2'> </label>
<input type='text' id='tags2' name='supplier' value='$id_supplier' size='30' onclick='cl()'>
";



print"
&nbsp;  Date:

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







<input type='hidden' name='ser' value='1'>
<input type='submit' value='Search' id='enter'> 

</td>


</form>




</tr>

</table>



";




if($ser==1 || $ser==5)
{
}
else
{
exit;
}


print"



<br>


<table align='center' width='880' cellpadding='0' cellspacing='1' bgcolor='E4DBDB'>

";







print"



</table>



<table align='center' width='880' cellpadding='0' cellspacing='0'>

<tr bgcolor='white'> 

<td width='400' bgcolor='' align='center' valign='top'> 

<br>

<table align='center' width='500' cellpadding='0' cellspacing='0'>

<tr> 

<td width='20'> </td>

<form action='customer_refill_advance2.php' method='POST'>
<td width='0' align='left'> 

<input type='hidden' name='ser' value='5'>

</td>

<td>

</td>

</tr>




<tr> 
<td width='20'> </td>
<td width='' height='30' align='left'> 
<font color='716E6E' face='arial' size='2'> Cash  </font>
</td>

<td width='200' align='left'> :
<input type='text' name='payment' value='$payment' size='10'> Tk.
</td>
</tr>






<tr> 
<td width='20'> </td>
<td width='' height='30' align='left'> 
<font color='716E6E' face='arial' size='2'> Return Amount   </font>
</td>

<td width='200' align='left'> :
<input type='text' name='return_amount' value='$return_amount' size='10'> Tk.
</td>
</tr>





<tr> <td height='7'> </td> </tr>



<tr> 
<td width='20'> </td>
<td width='' height='30' align='left'> 
<font color='716E6E' face='arial' size='2'> Payment mode </font>
</td>

<td width='' align='left'> : 
<select name='payment_mode'>

<option value='$payment_mode'>$payment_moden</option>

";

print"
<option value=''> Cash</option>
";

//$result = mysql_query("SELECT * FROM `bank`   ORDER BY `user_id` ASC  LIMIT 0 , 1000");


$result = mysql_query("SELECT * FROM `bank`  ORDER BY `bank_name` ASC ");


while ($a_row = mysql_fetch_row($result)) {

	foreach ($a_row as $field) {
		
	}
print"
<option value='$a_row[0]'>  $a_row[1] </option>
";
}





print"
</select>
</td>
</tr>



<tr> <td height='7'> </td> </tr>





<tr> 

<td width='20'> </td>
<td width='100' height='30' align='left' valign='top'> 
<font color='716E6E' face='arial' size='2'> Comments  </font>
</td>

<td width='290' align='left'> : 
<input type='hidden' name='supplier' value='$id_supplier'>

<input type='hidden' name='dat' value='$dat'>
<input type='hidden' name='mon' value='$mon'>
<input type='hidden' name='yer' value='$yer'>


<input type='text' name='comments' value='$comments' size='20'>
<input type='submit' value='Add To Payment ' ID='PR'>
</td>

</form>
</tr>


<tr>
<td width='20'> </td>
<form action='salememo1_advance.php' method='POST' target='_blank'>
<td align='center'> 


<br>
<br>

<input type='hidden' name='supplier' value='$supplier'>

<input type='hidden' name='dat' value='$dat'>
<input type='hidden' name='mon' value='$mon'>
<input type='hidden' name='yer' value='$yer'>




<input type='hidden' name='payment' value='$payment'>

<input type='hidden' name='payment_mode' value='$payment_mode'>


<input type='hidden' name='return_amount' value='$return_amount'>


<input type='hidden' name='comments' value='$comments'>

<input type='hidden' name='due' value='$due'>
</td>

<td>
";

if($ser==5)
{
print"
<br>
&nbsp;
<input type='submit' value='Save & Print' target='a_blank' id='enter2'>
";
}

print"
</td>

</form>
</tr>



</table>

</td>





";

/////////////////////////////////////////////////

print"
<td width='480' valign='top' align='center'>
";



print"
<table align='center' width='380' cellpadding='5' cellspacing='1' bgcolor='cccccc'>

<tr bgcolor='white'>
<td bgcolor='' height='30' width='334' align='right'> <font size='2' face='arial' color='716E6E'> Previous Adjust Amount : </font> </td> 
<td bgcolor='' height='30' width='146' align='center'><font size='2' face='arial' color='716E6E'> $pdue  </font> </td> 
</tr>



<tr bgcolor='white'>
<td bgcolor='' height='30' width='334' align='right'> <font size='2' face='arial' color='716E6E'> Cash Amount : </font> </td> 
<td bgcolor='' height='30' width='146' align='center'><font size='2' face='arial' color='716E6E'> $payment  </font> </td> 
</tr>
";


$total_amount=$pdue+$payment;

$net_total_amount=$total_amount-$return_amount;


print"
<tr bgcolor='white'>
<td bgcolor='' height='30' width='334' align='right'> <font size='2' face='arial' color='716E6E'> Total Amount : </font> </td> 
<td bgcolor='' height='30' width='146' align='center'><font size='2' face='arial' color='716E6E'> $total_amount  </font> </td> 
</tr>



<tr bgcolor='white'>
<td bgcolor='' height='30' width='334' align='right'> <font size='2' face='arial' color='716E6E'> Return Amount : </font> </td> 
<td bgcolor='' height='30' width='146' align='center'><font size='2' face='arial' color='716E6E'> $return_amount  </font> </td> 
</tr>



<tr bgcolor='white'>
<td bgcolor='' height='30' width='334' align='right'> <font size='2' face='arial' color='716E6E'> Net Total Amount : </font> </td> 
<td bgcolor='' height='30' width='146' align='center'><font size='2' face='arial' color='716E6E'> $net_total_amount  </font> </td> 
</tr>





<table>
";

/*

print"

<tr bgcolor='white'> 
<td bgcolor='' height='30' width='334' align='right'> <font size='2' face='arial' color='716E6E'> Payment: </font> </td> 
<td bgcolor='' height='30' width='146' align='center'><font size='2' face='arial' color='716E6E'>$payment tk </font> </td> 
</tr>



<tr bgcolor='white'> 
<td bgcolor='' height='30' width='334' align='right'> <font size='2' face='arial' color='716E6E'> Due: </font> </td> 
<td bgcolor='' height='30' width='146' align='center'><font size='2' face='arial' color='716E6E'>$due tk </font> </td> 
</tr>



</table>

*/


print"

</td>


</tr>
</table>




</body>

</html>


";


?>