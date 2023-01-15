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









$ser=trim($_POST['ser']);
$s=trim($_POST['s']);


$dat1=trim($_POST['dat1']);
$mon1=trim($_POST['mon1']);
$yer1=trim($_POST['yer1']);

$dat2=trim($_POST['dat2']);
$mon2=trim($_POST['mon2']);
$yer2=trim($_POST['yer2']);
//$supplier=trim($_POST['supplier']);


if($supplier=="")
{
//$supplier=$_GET['supplier'];	
}




if($supplier=="")
{

$supplier=$_GET['supplier'];

$sql="SELECT * FROM `supplier` WHERE user_id='$supplier' ";
$result=mysql_query($sql);
$arrsx=mysql_fetch_array($result);
$suppliern=$arrsx[1];
$id_supplier="$suppliern=$supplier";
	
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

$result = mysql_query("DELETE FROM cash_book WHERE money_id=$m_id");

$result = mysql_query("DELETE FROM bank_refill WHERE user_id=$s");




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



	
$sql="SELECT * FROM `supplier_advance` WHERE user_id='$d' ";
$result=mysql_query($sql);
$arr_m=mysql_fetch_array($result);
$m_id=$arr_m[8];

$m_id2=$arr_m[14];





$result = mysql_query("SELECT * FROM `buyproduct` where money_id='$m_id' ");

while ($a_row = mysql_fetch_row($result)) {

	foreach ($a_row as $field) {
		
	}
$w++;
$p_id[$w]=$a_row[4];
$qty[$w]=$a_row[6];
$price_d[$w]=$a_row[8];
$uid[$w]=$a_row[0];

}













$q=0;
$total_price_sale=0;
$preo=0;
for($i=1;$i<=$w;$i++)

{
	
$total_price_sale=0;
$result = mysql_query("SELECT * FROM `product_name` where  user_id='$p_id[$i]' ORDER BY `user_id` ");


//$result = mysql_query("SELECT * FROM `saleproduct` where adat<='$mdate'  && product_id='$p_id[$i]' ORDER BY `adat` ");


while ($a_row = mysql_fetch_row($result)) {

	foreach ($a_row as $field) {
		
	}

//$q=$q+$a_row[6];
$psingle=$a_row[4];
//print"$a_row[6] <br>";
}

$awqs++;
//$q_wsale[$wqs]=$q;
$p_single[$awqs]=$psingle;

//print"$psingle <br>";


$q=0;
$t=0;
$tax=0;
$profit=0;
$ptyy=0;
$pty=0;
}






for($i=1;$i<=$w;$i++)
{
$total_price_sale=0;
$result = mysql_query("SELECT * FROM `saleproduct` where  product_id='$p_id[$i]' ORDER BY `adat` ");
while ($a_row = mysql_fetch_row($result)) {

	foreach ($a_row as $field) {
		
	}


$tq++;
$q=$q+$a_row[6];
$tax=$tax+$a_row[15];
$aui=$a_row[8]/$a_row[6];

$aui = number_format($aui, 3);
$aui=str_replace(",","","$aui");




$pty=$aui-$a_row[14];

$pty=$pty*$a_row[6];
$ptyy=$ptyy+$pty;
$profit=$profit+$a_row[16];
$ppp=$a_row[7];
$mtt=$a_row[17];
$ptt=$a_row[19];
$preo=$a_row[8]-$a_row[25];
$total_price_sale=$total_price_sale+$a_row[8];
}


$tp20=$tp20+$total_price_sale;
$t=$ppp*$q;
$qs++;
$q_sale[$qs]=$q;
$q_price[$qs]=$total_price_sale;
$prrp[$qs]=$ptyy;
$tax1=$tax1+$tax;
$t1=$t1+$t;
$profit1=$profit1+$profit;
$q10=$q10+$q;
$q=0;
$t=0;
$tax=0;
$profit=0;
$ptyy=0;
$pty=0;

}










for($i=1;$i<=$w;$i++)
{	
$q_purchase_return=0;
$total_purchase_return=0;

$result = mysql_query("SELECT * FROM `buyproduct_return` where  product_id='$p_id[$i]' ORDER BY `adat` ");

while ($a_row = mysql_fetch_row($result)) {

	foreach ($a_row as $field) {
		
	}
$q_purchase_return=$q_purchase_return+$a_row[6];
$total_purchase_return=$total_purchase_return+$a_row[8];

}
$wqs_purchase_return++;
$q_wsale_purchase_return[$wqs_purchase_return]=$q_purchase_return;
$total_price_purchase_return[$wqs_purchase_return]=$total_purchase_return;
$q_purchase_return=0;
$total_purchase_return=0;
}





for($i=1;$i<=$w;$i++)
{	
$q_return=0;
$total_return=0;
$result = mysql_query("SELECT * FROM `saleproduct_return` where   product_id='$p_id[$i]' ORDER BY `adat` ");

while ($a_row = mysql_fetch_row($result)) {

	foreach ($a_row as $field) {
		
	}
$q_return=$q_return+$a_row[6];
//$total_return=$total_return+$a_row[25];
}

$wqs_return++;
$q_wsale_return[$wqs_return]=$q_return;
//$total_price_return[$wqs_return]=$total_return;
$q_return=0;
$total_return=0;

}



//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


$q=0;
$t=0;
$q1=0;


for($i=1;$i<=$w;$i++)
{


$total_price=0;
$net_amount=0;

$result = mysql_query("SELECT * FROM `buyproduct` where  product_id='$p_id[$i]' ");

while ($a_row = mysql_fetch_row($result)) {

	foreach ($a_row as $field) {
		
	}


$q=$q+$a_row[6];
$aaa=$a_row[14];
$bbb=$a_row[16];
$ppp=$a_row[7];

$total_price=$total_price+$a_row[8];

}


$ew++;
$total_price=$total_price+$stp_price[$ew];
$q=$q+$stp[$ew];
$tp=$tp+$total_price;
$t=$ppp*$q;


if($total_price>0)
{
$single=$total_price/$q;	
}
else
{
$single=0;	
}


$w8++;
$stock_q=$q-$q_sale[$ew];
$stock_q=$stock_q-$q_wsale_purchase_return[$ew];
$stock_q=$stock_q+$q_wsale_return[$ew];






$pry[$w8]=$stock_q;
$net_amount=$p_single[$w8]*$pry[$w8];
$net_amountn[$w8]=$net_amount;


$net_q=$pry[$w8]-$qty[$w8];
$net_amount=$net_amount-$price_d[$w8];

$net_amount=$net_amount/$net_q;

$net_amount = number_format($net_amount, 3);
$net_amount=str_replace(",","","$net_amount");

if($net_amount<=0)
{
$net_amount=$p_single[$w8];
}


$sql= "UPDATE  `product_name` SET `buying_price`='$net_amount' WHERE `user_id`='$p_id[$i]'";
mysql_query($sql);



$stock_p=$stock_q*$single;
$stock_qq=$stock_qq+$stock_q;
$stock_pp=$stock_pp+$stock_p;
$per_product=$total_price/$q;
$per_product = number_format($per_product, 3);
$per_product=str_replace(",","","$per_product");

$per_sale_product= $q_price[$ew]/$q_sale[$ew];
$per_sale_product = number_format($per_sale_product, 3);
$per_sale_product=str_replace(",","","$per_sale_product");
$prot=$per_sale_product-$per_product;
$profit_t=$q_sale[$ew]*$prot;
$profit_total=$profit_total+$profit_t;
$total_q=$total_q+$q;
$total_t=$total_t+$t;
$tpyy=$tpyy+$prrp[$ew];
$q=0;
$t=0;

//print" $pry[$w8] - $net_amount <br>";

}










$sql="SELECT * FROM `supplier` WHERE user_id='$supplier' ";
$result=mysql_query($sql);
$arrss=mysql_fetch_array($result);
$suppliern=$arrss[1];

$mobile=$arrss[3];
$address=$arrss[4];





$result = mysql_query("DELETE FROM buymemo WHERE money_id2=$m_id2");
$result = mysql_query("DELETE FROM cash_book WHERE money_id2=$m_id2");
$result = mysql_query("DELETE FROM buyproduct WHERE money_id2=$m_id2");

$result = mysql_query("DELETE FROM supplier_laser WHERE money_id2=$m_id2");

$result = mysql_query("DELETE FROM supplier_advance WHERE money_id2=$m_id2");
$result = mysql_query("DELETE FROM supplier_advance_money_receipt WHERE money_id2=$m_id2");



$result = mysql_query("DELETE FROM bank_refill WHERE money_id2=$m_id2");





$mdate="$yer1$mon1$dat1";
$ndate="$yer2$mon2$dat2";

}

























print"

<html>

<head>
<title> Supplier Advance Transaction </title>
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
<tr> <td align='center' height='40'> <font face='arial' size='4'> Supplier Advance Transaction  </font> </td> </tr>
<tr> <td align='center' height='1' bgcolor='F9F4D8'> </td> </tr>
</table>

";














print"
<table align='center' width='950' cellpadding='0' cellspacing='0' bgcolor='F3F3F3'>



<tr> 

<form  name='p' action='supplier_advance_transection.php' method='POST'>

<td align='center' height='40'> 

<font face='arial' size='4'> Select Supplier    </font>
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




<table align='center' width='950' cellpadding='0' cellspacing='1'>


<tr bgcolor='F2F2F2'>
<td align='left' HEIGHT='30'> <font size='3' face='arial'> &nbsp;<b> Supplier name: $suppliern </b>  </font> </td>
</tr>

<tr bgcolor='F2F2F2'>
<td align='left' HEIGHT='30'> <font size='3' face='arial'> &nbsp; <b> Address: $address </b>  </font> </td>
</tr>

<tr bgcolor='F2F2F2'>
<td align='left' HEIGHT='30'> <font size='3' face='arial'> &nbsp; <b> Mobile: $mobile </b> </font> </td>
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
<td align='center' height='' width='80'>  <font face='arial' size='2' color=''> Money id</font> </td> 
<td align='center' height='' width='380'>  <font face='arial' size='2' color=''> Comments </font> </td> 


<td align='center' height='' width='50'>  <font face='arial' size='2' color=''> Total </font> </td> 
<td align='center' height='' width='50'>  <font face='arial' size='2' color=''> Commission </font> </td>
<td align='center' height='' width='50'>  <font face='arial' size='2' color=''> Total </font> </td>
<td align='center' height='' width='50'>  <font face='arial' size='2' color=''> Shipment </font> </td>




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
$result = mysql_query("SELECT * FROM `supplier_advance` where  bank_name='$supplier' && adat<'$mdate' ORDER BY `user_id` ASC ");
}

if($supplier=="")
{
$result = mysql_query("SELECT * FROM `supplier_advance` where   adat<'$mdate' ORDER BY `user_id` ASC ");
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


<td align='center' height='' width='100'>  <font face='arial' size='2' color=''>  </font> </td> 
<td align='center' height='' width='100'>  <font face='arial' size='2' color=''> </font> </td>
<td align='center' height='' width='100'>  <font face='arial' size='2' color=''>  </font> </td>
<td align='center' height='' width='100'>  <font face='arial' size='2' color=''>  </font> </td>



<td width='80' align='center'>              <font face='arial' size='2'> </font> </td>


<td width='80' align='center'>              <font face='arial' size='2'> </font> </td>
<td width='80' align='center'>              <font face='arial' size='2'> Opening</font> </td>
<td width='100' align='center'>              <font face='arial' size='2'> $balancee </font> </td>
<td width='100' align='center'>              <font face='arial' size='2'> $balancee   </font> </td>

";

	 if($user_name1=="superadmin")
{
print"
<td width='100' align='center'>              <font face='arial' size='2'>    </font> </td>
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
$result = mysql_query("SELECT * FROM `supplier_advance` where  bank_name='$supplier' && adat>='$mdate' && adat<='$ndate' ORDER BY `user_id` ASC ");
}


if($supplier=="")
{
$result = mysql_query("SELECT * FROM `supplier_advance` where   adat>='$mdate' && adat<='$ndate' ORDER BY `user_id` ASC ");
}



while ($a_row = mysql_fetch_row($result)) {

	foreach ($a_row as $field) {
		
	}

print"
<tr bgcolor='white'>
<td align='center' height='30' width=''>  <font face='arial' size='2' color=''> $a_row[5]-$a_row[6]-$a_row[7]</font> </td> 
<td align='center' height='30' width='80'>  <font face='arial' size='2' color=''> $a_row[8] </font> </td>
";

if($supplier!="")
{
$a_row[4]=str_replace("$suppliern","","$a_row[4]");	
}




print"
<td align='left' height='30' width=''>  <font face='arial' size='2' color=''> $a_row[4]  </font> </td> 

";




if($a_row[12]!="")
{
	

$t55=$a_row[3]-$a_row[12];	
$t5=$t55+$a_row[13];


$ft5=$ft5+$t5;
$fcom=$fcom+$a_row[13];
$ft55=$ft55+$t55;
$fship=$fship+$a_row[12];



print"
<td align='center' height='' width='50'>  <font face='arial' size='2' color=''> $t5 </font> </td> 

<td align='center' height='' width='50'>  <font face='arial' size='2' color=''> $a_row[13] </font> </td>

<td align='center' height='' width='50'>  <font face='arial' size='2' color=''> $t55 </font> </td>

<td align='center' height='' width='50'>  <font face='arial' size='2' color=''> $a_row[12] </font> </td>
";
}
else
{
print"
<td align='center' height='' width=''>  <font face='arial' size='2' color=''>  </font> </td> 

<td align='center' height='' width=''>  <font face='arial' size='2' color=''>  </font> </td>

<td align='center' height='' width=''>  <font face='arial' size='2' color=''>  </font> </td>

<td align='center' height='' width=''>  <font face='arial' size='2' color=''> </font> </td>
";	
	
}










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


$balance_new=$balancee+$balance;

print"
<td width='' align='center'>              <font face='arial' size='2'> $b4alance </font> </td>
<td width='100' align='center'>              <font face='arial' size='2'> $balance_old  $balance_new   </font> </td>



";

	 if($user_name1=="superadmin")
{
print"
<td align='center' width='70'> <a onClick=\"javascript: return confirm('Are you confirm to delete');\" href=\"supplier_advance_transection.php?dell=$a_row[0]&supplier=$id_supplier&dat1=$dat1&mon1=$mon1&yer1=$yer1&dat2=$dat2&mon2=$mon2&yer2=$yer2 \"> <div id='del'><font face='arial' size='2'> Delete  </font> </div>  </a> </td>
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




<td align='center' height='' width=''>  <font face='arial' size='2' color=''> $ft5 </font> </td> 
<td align='center' height='' width=''>  <font face='arial' size='2' color=''> $fcom </font> </td>
<td align='center' height='' width=''>  <font face='arial' size='2' color=''> $ft55 </font> </td>
<td align='center' height='' width=''>  <font face='arial' size='2' color=''> $fship </font> </td>



<td width='80' align='center'>              <font face='arial' size='2'> Total Debit </font> </td>
<td width='80' align='center'>              <font face='arial' size='2'> $dr </font> </td>
<td width='80' align='center'>              <font face='arial' size='2'> Total_Credit </font> </td>
<td width='100' align='center'>              <font face='arial' size='2'> $cr </font> </td>
<td width='100' align='center'>              <font face='arial' size='2'> $balance_old   </font> </td>
";

	 if($user_name1=="superadmin")
{
print"
<td width='100' align='center'>              <font face='arial' size='2'>    </font> </td>
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



<td align='center' height='' width=''>  <font face='arial' size='2' color=''>  </font> </td> 
<td align='center' height='' width=''>  <font face='arial' size='2' color=''>  </font> </td>
<td align='center' height='' width=''>  <font face='arial' size='2' color=''>  </font> </td>
<td align='center' height='' width=''>  <font face='arial' size='2' color=''>  </font> </td>


 
<td width='80' align='center'>              <font face='arial' size='2'> Clo. Balance </font> </td>
<td width='80' align='center'>              <font face='arial' size='2'> $bal </font> </td>
<td width='80' align='center'>              <font face='arial' size='2'>  </font> </td>
<td width='100' align='center'>              <font face='arial' size='2'>  </font> </td>
<td width='100' align='center'>              <font face='arial' size='2'>   </font> </td>

";

	 if($user_name1=="superadmin")
{
print"
<td width='100' align='center'>              <font face='arial' size='2'>    </font> </td>
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


<td align='center' height='' width=''>  <font face='arial' size='2' color=''>  </font> </td> 
<td align='center' height='' width=''>  <font face='arial' size='2' color=''>  </font> </td>
<td align='center' height='' width=''>  <font face='arial' size='2' color=''>  </font> </td>
<td align='center' height='' width=''>  <font face='arial' size='2' color=''>  </font> </td>




<td width='80' align='center'>              <font face='arial' size='2'> Total </font> </td>
<td width='80' align='center'>              <font face='arial' size='2'> $tot_d </font> </td>
<td width='80' align='center'>              <font face='arial' size='2'>  Total </font> </td>
<td width='100' align='center'>              <font face='arial' size='2'> $tot_dd   </font> </td>

<td width='100' align='center'>              <font face='arial' size='2'>   </font> </td>

";

	 if($user_name1=="superadmin")
{
print"
<td width='100' align='center'>              <font face='arial' size='2'>    </font> </td>
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
<form action='supplier_advance_transection_print.php' method='POST' target='_blank'>
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