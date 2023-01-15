<?php
include_once('dbconnection.php');






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













include_once('ppp.php');


$ser=trim($_POST['ser']);
$s=trim($_POST['s']);


$dat1=trim($_POST['dat1']);
$mon1=trim($_POST['mon1']);
$yer1=trim($_POST['yer1']);



$dat2=trim($_POST['dat2']);
$mon2=trim($_POST['mon2']);
$yer2=trim($_POST['yer2']);

//$supplier=trim($_POST['supplier']);


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
//$supplier=$_GET['supplier'];
}



if($supplier=="")
{

$supplier=$_GET['supplier'];

$sql="SELECT * FROM `customer` WHERE user_id='$supplier' ";
$result=mysql_query($sql);
$arrs=mysql_fetch_array($result);
$suppliern=$arrs[7];
$id_supplier="$suppliern=$supplier";
	
}



$sql="SELECT * FROM `customer` WHERE user_id='$supplier' ";
$result=mysql_query($sql);
$arrs=mysql_fetch_array($result);
$suppliern=$arrs[7];
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


/*
$result = mysql_query("DELETE FROM salememo WHERE money_id=$m_id");
$result = mysql_query("DELETE FROM cash_book WHERE money_id=$m_id");
$result = mysql_query("DELETE FROM saleproduct WHERE money_id=$m_id");
$result = mysql_query("DELETE FROM customer_laser WHERE money_id=$m_id");
$result = mysql_query("DELETE FROM bank_refill WHERE money_id=$m_id");
$result = mysql_query("DELETE FROM check_entry WHERE money_id=$m_id");



$result = mysql_query("DELETE FROM salememo_return WHERE money_id=$m_id");
$result = mysql_query("DELETE FROM saleproduct_return WHERE money_id=$m_id");

$result = mysql_query("DELETE FROM buyproduct WHERE money_id=$m_id");
$result = mysql_query("DELETE FROM buymemo WHERE money_id=$m_id");

*/


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


//$supplier=$_GET['supplier'];




	
$sql="SELECT * FROM `customer_advance` WHERE user_id='$d' ";

$result=mysql_query($sql);
$arr_m=mysql_fetch_array($result);
$m_id=$arr_m[8];
$m_id2=$arr_m[17];



$sql="SELECT * FROM `customer` WHERE user_id='$supplier' ";


$result=mysql_query($sql);
$arrss=mysql_fetch_array($result);
$suppliern=$arrss[1];

$mobile=$arrss[3];
$address=$arrss[5];






$result = mysql_query("DELETE FROM salememo WHERE money_id2=$m_id2");
$result = mysql_query("DELETE FROM cash_book WHERE money_id2=$m_id2");
$result = mysql_query("DELETE FROM saleproduct WHERE money_id2=$m_id2");
$result = mysql_query("DELETE FROM customer_laser WHERE money_id2=$m_id2");


$result = mysql_query("DELETE FROM customer_advance WHERE money_id2=$m_id2");
$result = mysql_query("DELETE FROM customer_advance_money_receipt WHERE money_id2=$m_id2");



$result = mysql_query("DELETE FROM bank_refill WHERE money_id2=$m_id2");
$result = mysql_query("DELETE FROM check_entry WHERE money_id2=$m_id2");
$result = mysql_query("DELETE FROM customer_money_receipt WHERE money_id2=$m_id2");





$result = mysql_query("DELETE FROM salememo_return WHERE money_id2=$m_id2");
$result = mysql_query("DELETE FROM saleproduct_return WHERE money_id2=$m_id2");





//$result = mysql_query("DELETE FROM buyproduct WHERE money_id=$m_id");
//$result = mysql_query("DELETE FROM buymemo WHERE money_id=$m_id");



$mdate="$yer1$mon1$dat1";
$ndate="$yer2$mon2$dat2";

}





print"

<html>

<head>
<title> Customer Advance Transaction </title>
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


include_once('header.php');


print"
<table align='center' width='1200' cellpadding='0' cellspacing='' height='' bgcolor=''>
<tr bgcolor='white'> 


";

//include_once('find_transection_left.php');

print"





<td align='center' valign='top' width='1200'> 




<table align='center' width='1200' cellpadding='0' cellspacing='1' bgcolor='F9F4D8'>

<tr> 
<td width='1000' height='320' bgcolor='ECE9D8' valign='top'> 

<table align='center' width='1200' cellpadding='0' cellspacing='0' bgcolor='F7D3F2'>
<tr> <td align='center' height='40'> <font face='arial' size='5'> Customer Advance Transaction  </font> </td> </tr>
<tr> <td align='center' height='1' bgcolor='F9F4D8'> </td> </tr>
</table>

";














print"
<table align='center' width='1200' cellpadding='0' cellspacing='0' bgcolor='F3F3F3'>



<tr> 

<form name='p' action='customer_advance_transection.php' method='POST'>

<td align='center' height='40'> 


<font face='arial' size='4'> Select Customer   </font>
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

&nbsp;&nbsp;&nbsp; <font face='arial' size='3'>To </font>&nbsp;&nbsp;&nbsp;


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



<table align='center' width='1200' cellpadding='0' cellspacing='1'>

<tr bgcolor='F2F2F2'>
<td align='left' HEIGHT='30'> <font size='4' face='arial'> &nbsp; Customer name: $suppliern  </font> </td>
</tr>

<tr bgcolor='F2F2F2'>
<td align='left' HEIGHT='30'> <font size='4' face='arial'> &nbsp;  Address: $address  </font> </td>
</tr>


<tr bgcolor='F2F2F2'>
<td align='left' HEIGHT='30'> <font size='4' face='arial'> &nbsp;  Mobile: $mobile  </font> </td>
</tr>


</table>



<table align='center' width='1200' cellpadding='0' cellspacing='1'>

<tr bgcolor='F2F2F2'>
<td align='left' HEIGHT='30'> <font size='3' face='arial'>  </font> </td>
</tr>

</table>




<table align='center' width='1200' cellpadding='5' cellspacing='1' bgcolor='black'>

";

print"
<tr bgcolor='F677F2'>
<td align='center' height='20' width='80'>  <font face='arial' size='3' color=''> Date</font> </td> 
<td align='center' height='' width='80'>  <font face='arial' size='3' color=''> Money id</font> </td> 
<td align='center' height='' width='180'>  <font face='arial' size='3' color=''> Comments </font> </td> 





<td align='center' height='' width='50'>  <font face='arial' size='3' color=''> Total </font> </td> 
<td align='center' height='' width='50'>  <font face='arial' size='3' color=''> Comi. </font> </td>
<td align='center' height='' width='50'>  <font face='arial' size='3' color=''> Total </font> </td>
<td align='center' height='' width='50'>  <font face='arial' size='3' color=''> Carring Cost </font> </td>






<td align='center' height='' width='50'>  <font face='arial' size='3' color=''> Vat  </font> </td> 
<td align='center' height='' width='50'>  <font face='arial' size='3' color=''> Tax </font> </td> 






<td width='80' align='center'>              <font face='arial' size='3'> Debit</font> </td>
<td width='80' align='center'>              <font face='arial' size='3'> Tk.</font> </td>
<td width='80' align='center'>              <font face='arial' size='3'> Credit</font> </td>
<td width='100' align='center'>              <font face='arial' size='3'> Tk. </font> </td>
<td width='100' align='center'>              <font face='arial' size='3'> Balance </font> </td>

";

if($user_name1=="superadmin")
{
print"
<td width='100' align='center'>              <font face='arial' size='3'> Delete </font> </td>
";
}
print"
</tr>
";





//$nn=
//$mm=






if($supplier!="")
{
$result = mysql_query("SELECT * FROM `customer_advance` where  bank_name='$supplier' && adat<'$mdate' ORDER BY `adat` ASC ");
}

if($supplier=="")
{
$result = mysql_query("SELECT * FROM `customer_advance` where   adat<'$mdate' ORDER BY `adat` ASC ");
}

while ($a_row = mysql_fetch_row($result)) {

	foreach ($a_row as $field) {
		
	}





if($a_row[2]==1)
{

$dr=$dr+$a_row[3];
}


if($a_row[2]==2)
{
$cr=$cr+$a_row[3];
}



}







$balancee=$dr-$cr;




//print"$balancee -";


//print"$balance <br>";


print"
<tr bgcolor='F2F2F2'>
<td align='center' height='20' width='80'>  <font face='arial' size='3' color=''> </font> </td> 
<td align='center' height='' width='80'>  <font face='arial' size='3' color=''> </font> </td> 
<td align='center' height='' width='180'>  <font face='arial' size='3' color=''>  </font> </td> 

<td align='center' height='' width=''>  <font face='arial' size='3' color=''>  </font> </td> 
<td align='center' height='' width=''>  <font face='arial' size='3' color=''>  </font> </td> 



<td width='80' align='center'>              <font face='arial' size='3'> </font> </td>
<td width='80' align='center'>              <font face='arial' size='3'> </font> </td>
<td width='80' align='center'>              <font face='arial' size='3'> </font> </td>
<td width='80' align='center'>              <font face='arial' size='3'> </font> </td>
";


$balancee_u= number_format($balancee, 2);


print"
<td width='80' align='center'>              <font face='arial' size='3'> </font> </td>


<td width='80' align='center'>              <font face='arial' size='3'> </font> </td>
<td width='80' align='center'>              <font face='arial' size='3'> Opening</font> </td>
<td width='100' align='center'>              <font face='arial' size='3'> $balancee_u </font> </td>
<td width='100' align='center'>              <font face='arial' size='3'> $balancee_u   </font> </td>

";

	 if($user_name1=="superadmin")
{
print"
<td width='100' align='center'>              <font face='arial' size='3'>   </font> </td>
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
$result = mysql_query("SELECT * FROM `customer_advance` where  bank_name='$supplier' && adat>='$mdate' && adat<='$ndate' ORDER BY `adat`  ASC ");
}


if($supplier=="")
{
$result = mysql_query("SELECT * FROM `customer_advance` where   adat>='$mdate' && adat<='$ndate' ORDER BY `adat` ASC ");
}



while ($a_row = mysql_fetch_row($result)) {

	foreach ($a_row as $field) {
		
	}

print"
<tr bgcolor='white'>
<td align='center' height='30' width=''>  <font face='arial' size='3' color=''> $a_row[5]-$a_row[6]-$a_row[7]</font> </td> 


<td align='center' height='30' width='80'>  <font face='arial' size='3' color=''> $a_row[8] </font> </td>
";

if($supplier!="")
{
$a_row[4]=str_replace("$suppliern","","$a_row[4]");
}

print"
<td align='left' height='30' width=''>  <font face='arial' size='3' color=''>  $a_row[4] </font> </td> 





";


$vat=$vat+$a_row[21];
$tax=$tax+$a_row[22];


if($a_row[15]==2)
{


if($a_row[12]!="" || $a_row[13]!="" || $a_row[14]!="")
{
	

$final_com=$a_row[14];

$final_com_sum=$final_com_sum+$final_com;



$final_com_u= number_format($final_com, 2);



print"
<td align='center' height='' width='50'>  <font face='arial' size='3' color=''>  </font> </td> 

<td align='center' height='' width='50'>  <font face='arial' size='3' color=''> $final_com_u       </font> </td>

<td align='center' height='' width='50'>  <font face='arial' size='3' color=''>    </font> </td>

<td align='center' height='' width='50'>  <font face='arial' size='3' color=''>  </font> </td>
";



}
else
{
print"
<td align='center' height='' width=''>  <font face='arial' size='3' color=''>  </font> </td> 

<td align='center' height='' width=''>  <font face='arial' size='3' color=''>  </font> </td>

<td align='center' height='' width=''>  <font face='arial' size='3' color=''>  </font> </td>

<td align='center' height='' width=''>  <font face='arial' size='3' color=''> </font> </td>
";	
	
}





}

else
{

if($a_row[12]!="" || $a_row[13]!="")
{
	

$t55=$a_row[3]-$a_row[12];	
$t5=$t55+$a_row[13];


$ft5=$ft5+$t5;
$fcom=$fcom+$a_row[13];
$ft55=$ft55+$t55;
$fship=$fship+$a_row[12];



$t5_final=$t5+$a_row[14];







$final_com=$a_row[13]+$a_row[14];
$t55_final=$t5_final-$final_com;




$t5_final_sum=$t5_final_sum+$t5_final;
$final_com_sum=$final_com_sum+$final_com;
$t55_final_sum=$t55_final_sum+$t55_final;


$t5_final_u= number_format($t5_final, 2);
$final_com_u= number_format($final_com, 2);

$t55_final_u= number_format($t55_final, 2);
$ar12= number_format($a_row[12], 2);



print"
<td align='center' height='' width='50'>  <font face='arial' size='3' color=''>  $t5_final_u   </font> </td> 

<td align='center' height='' width='50'>  <font face='arial' size='3' color=''> $final_com_u   </font> </td>

<td align='center' height='' width='50'>  <font face='arial' size='3' color=''>  $t55_final_u  </font> </td>

<td align='center' height='' width='50'>  <font face='arial' size='3' color=''> $ar12 </font> </td>
";
}
else
{
print"
<td align='center' height='' width=''>  <font face='arial' size='3' color=''>  </font> </td> 

<td align='center' height='' width=''>  <font face='arial' size='3' color=''>  </font> </td>

<td align='center' height='' width=''>  <font face='arial' size='3' color=''>  </font> </td>

<td align='center' height='' width=''>  <font face='arial' size='3' color=''> </font> </td>
";	
	
}




}








$ar3= number_format($a_row[3], 2);




if($a_row[2]==1)
{

print"
<td align='center' height='' width='50'>  <font face='arial' size='3' color=''>  </font> </td> 
<td align='center' height='' width='50'>  <font face='arial' size='3' color=''>  </font> </td> 
";


print"
<td width='' align='center'>              <font face='arial' size='3'> $ar3  </font> </td>
";


print"
<td width='' align='center'>              <font face='arial' size='3'> </font> </td>
";

print"
<td width='' align='center'>              <font face='arial' size='3'> </font> </td>
";

$dr=$dr+$a_row[3];

}


if($a_row[2]==2)
{


$ar33= number_format($a_row[3] , 2);


print"
<td align='center' height='' width='50'>  <font face='arial' size='3' color=''> $a_row[21]  </font> </td> 
<td align='center' height='' width='50'>  <font face='arial' size='3' color=''> $a_row[22] </font> </td> 

";


print"
<td width='80' align='center'>              <font face='arial' size='3'> </font> </td>
";

print"
<td width='' align='center'>              <font face='arial' size='3'> </font> </td>
";

print"
<td width='' align='center'>              <font face='arial' size='3'>  $ar33  </font> </td>
";

$cr=$cr+$a_row[3];

}










$balance=$dr-$cr;


$balance_new=$balancee+$balance;


//$balance=$balance+$balancee;

$balance_u= number_format($balance, 2);

$b4alance_u= number_format($b4alance, 2);

$balance_new_u= number_format($balance_new, 2);



print"
<td width='' align='center'>              <font face='arial' size='3'> $b4alance_u_old </font> </td>
<td width='100' align='center'>              <font face='arial' size='3'> $balance_u_old $balance_new_u   </font> </td>

";

	 if($user_name1=="superadmin")
{
print"
<td align='center' width='70'> <a onClick=\"javascript: return confirm('Are you confirm to delete');\" href=\"customer_advance_transection.php?dell=$a_row[0]&supplier=$id_supplier&dat1=$dat1&mon1=$mon1&yer1=$yer1&dat2=$dat2&mon2=$mon2&yer2=$yer2 \"> <div id='del'><font face='arial' size='3'> Delete  </font> </div>  </a> </td>
";
}

print"

";

print"
</tr>
";

}



$bal=$balance+$balancee;

//$bal=$balance;



$bal_u= number_format($bal, 2);


$t5_final_sum_u= number_format($t5_final_sum, 2);

$final_com_sum_u= number_format($final_com_sum, 2);


$t55_final_sum_u= number_format($t55_final_sum, 2);

$fship_u= number_format($fship, 2);


$dr_u= number_format($dr, 2);
$cr_u= number_format($cr, 2);

$balance_u= number_format($balance, 2);



print"
<tr bgcolor='F2F2F2'>
<td align='center' height='20' width='80'>  <font face='arial' size='3' color=''> </font> </td> 
<td align='center' height='' width='80'>  <font face='arial' size='3' color=''> </font> </td> 
<td align='center' height='' width='180'>  <font face='arial' size='3' color=''>  </font> </td> 







<td align='center' height='' width=''>  <font face='arial' size='3' color=''> $t5_final_sum_u </font> </td> 
<td align='center' height='' width=''>  <font face='arial' size='3' color=''> $final_com_sum_u </font> </td>
<td align='center' height='' width=''>  <font face='arial' size='3' color=''> $t55_final_sum_u </font> </td>
<td align='center' height='' width=''>  <font face='arial' size='3' color=''> $fship_u </font> </td>


<td align='center' height='' width=''>  <font face='arial' size='3' color=''> $vat </font> </td>
<td align='center' height='' width=''>  <font face='arial' size='3' color=''> $tax </font> </td>





<td width='80' align='center'>              <font face='arial' size='3'> Total Debit </font> </td>
<td width='80' align='center'>              <font face='arial' size='3'> $dr_u </font> </td>
<td width='80' align='center'>              <font face='arial' size='3'> Total_Credit </font> </td>
<td width='100' align='center'>              <font face='arial' size='3'> $cr_u </font> </td>
<td width='100' align='center'>              <font face='arial' size='3'> $balance_u_old  </font> </td>

";

	 if($user_name1=="superadmin")
{
print"
<td width='100' align='center'>              <font face='arial' size='3'>   </font> </td>
";
}

print"
</tr>
";



/*

print"
<tr bgcolor='F2F2F2'>
<td align='center' height='20' width='80'>  <font face='arial' size='3' color=''> </font> </td> 
<td align='center' height='' width='80'>  <font face='arial' size='3' color=''> </font> </td> 
<td align='center' height='' width='180'>  <font face='arial' size='3' color=''>  </font> </td> 

<td align='center' height='' width=''>  <font face='arial' size='3' color=''>  </font> </td>
<td align='center' height='' width=''>  <font face='arial' size='3' color=''>  </font> </td>



<td align='center' height='' width=''>  <font face='arial' size='3' color=''>  </font> </td> 
<td align='center' height='' width=''>  <font face='arial' size='3' color=''>  </font> </td>
<td align='center' height='' width=''>  <font face='arial' size='3' color=''>  </font> </td>
<td align='center' height='' width=''>  <font face='arial' size='3' color=''>  </font> </td>







<td width='80' align='center'>              <font face='arial' size='3'> Clo. Balance </font> </td>
<td width='80' align='center'>              <font face='arial' size='3'> $bal_u </font> </td>
<td width='80' align='center'>              <font face='arial' size='3'>  </font> </td>
<td width='100' align='center'>              <font face='arial' size='3'>  </font> </td>
<td width='100' align='center'>              <font face='arial' size='3'>   </font> </td>

";

	 if($user_name1=="superadmin")
{
print"
<td width='100' align='center'>              <font face='arial' size='3'>   </font> </td>
";
}

print"
</tr>
";


$tot_d=$bal+$dr;
$tot_dd=$balancee+$cr;


$tot_d_u= number_format($tot_d, 2);
$tot_dd_u= number_format($tot_dd, 2);



print"
<tr bgcolor='F2F2F2'>
<td align='center' height='20' width='80'>  <font face='arial' size='3' color=''> </font> </td> 
<td align='center' height='' width='80'>  <font face='arial' size='3' color=''> </font> </td> 
<td align='center' height='' width='180'>  <font face='arial' size='3' color=''>  </font> </td>

<td align='center' height='' width=''>  <font face='arial' size='3' color=''>  </font> </td>
<td align='center' height='' width=''>  <font face='arial' size='3' color=''>  </font> </td>



<td align='center' height='' width=''>  <font face='arial' size='3' color=''>  </font> </td> 
<td align='center' height='' width=''>  <font face='arial' size='3' color=''>  </font> </td>
<td align='center' height='' width=''>  <font face='arial' size='3' color=''>  </font> </td>
<td align='center' height='' width=''>  <font face='arial' size='3' color=''>  </font> </td>




 
<td width='80' align='center'>              <font face='arial' size='3'> Total </font> </td>
<td width='80' align='center'>              <font face='arial' size='3'> $tot_d_u </font> </td>
<td width='80' align='center'>              <font face='arial' size='3'>  Total </font> </td>
<td width='100' align='center'>              <font face='arial' size='3'> $tot_dd_u   </font> </td>

<td width='100' align='center'>              <font face='arial' size='3'>   </font> </td>
";

	 if($user_name1=="superadmin")
{
print"
<td width='100' align='center'>              <font face='arial' size='3'>   </font> </td>
";
}

print"
</tr>
";

*/




print"
</table>
";






print"

<br>


<table align='center' width='750' cellpadding='0' cellspacing='0'>
<tr> 
<form action='customer_advance_transection_print.php' method='POST' target='_blank'>
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