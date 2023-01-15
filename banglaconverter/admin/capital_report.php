<?php

include_once('dbconnection.php');

$bbb=time(); 
$d=date("m/d/y",$bbb); 
$mon="$d[0]$d[1]";
$dat="$d[3]$d[4]";
$yer="20$d[6]$d[7]";


include_once('ppp.php');


print"

<html>

<head>
<title> Capital Reports </title>
";


include_once('style.php');


print"
</head>


<body>
";


//include_once('header.php');


print"
<table align='center' width='1200' cellpadding='0' cellspacing='1' height='800' bgcolor='gray'>
<tr bgcolor='white'> 


";

//include_once('find_transection_left.php');

print"





<td align='center' valign='top' width='980'> 


";

include_once('address.php');

print"

<table align='center' width='1000' cellpadding='0' cellspacing='1' bgcolor='F9F4D8'>

<tr> 
<td width='1000' height='320' bgcolor='ECE9D8' valign='top'> 


";







print"

<table align='center' width='1000' cellpadding='0' cellspacing='1' bgcolor='F9F4D8'>

<tr> 
<td width='1000' height='320' bgcolor='ECE9D8' valign='top'> 

<table align='center' width='1000' cellpadding='0' cellspacing='0' bgcolor='F7D3F2'>
<tr> <td align='center' height='40'> <font face='arial' size='3'> Capital Reports - $dat - $mon - $yer </font> </td> </tr>
<tr> <td align='center' height='1' bgcolor='F9F4D8'> </td> </tr>
</table>



";




$r=0;

$result = mysql_query("SELECT * FROM customer");

while ($a_row = mysql_fetch_row($result)) {

	foreach ($a_row as $field) {
		
	}

$r++;
$bank_name[$r]=$a_row[1];
$bank_id[$r]=$a_row[0];

}






$tcr=0;
$tde=0;
$tcv=0;




for($i=1;$i<=$r;$i++)

{

$cr=0;
$de=0;
$cv=0;

$result = mysql_query("SELECT * FROM `customer_laser`  where bank_name='$bank_id[$i]'  ORDER BY `user_id` ASC  LIMIT 0 , 100000");


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

}

$totalcustomer_final=$tcv;





$r=0;

$result = mysql_query("SELECT * FROM bank");

while ($a_row = mysql_fetch_row($result)) {

	foreach ($a_row as $field) {
		
	}

$r++;
$bank_name[$r]=$a_row[1];
$bank_id[$r]=$a_row[0];

}






$tcr=0;
$tde=0;
$tcv=0;




for($i=1;$i<=$r;$i++)

{

$cr=0;
$de=0;
$cv=0;

$result = mysql_query("SELECT * FROM `bank_refill`  where bank_name='$bank_id[$i]'  ORDER BY `user_id` ASC  LIMIT 0 , 100000");


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

}

$totalbank_final=$tcv;







$r=0;
$dr=0;
$cr=0;


$result = mysql_query("SELECT * FROM `cash_book`   ORDER BY `user_id` ASC  LIMIT 0 , 6000000 ");


while ($a_row = mysql_fetch_row($result)) {

	foreach ($a_row as $field) {
		
	}




$r++;

if($a_row[9]==2)
{

$dr=$dr+$a_row[10];
}

if($a_row[9]==1)
{
$cr=$cr+$a_row[10];
}


}

$totalcash_final=$cr-$dr;
































////////////





$q=0;
$w=0;


$result = mysql_query("SELECT * FROM product_sub_category");

while ($a_row = mysql_fetch_row($result)) {

	foreach ($a_row as $field) {
		
	}
	$kr++;
	$sub_id[$kr]=$a_row[0];
	
}






if($product_id_new=="")
{
	
for($i=1;$i<=$kr;$i++)

{	
	
$result = mysql_query("SELECT * FROM product_name where sub_category_id='$sub_id[$i]'");

while ($a_row = mysql_fetch_row($result)) {

	foreach ($a_row as $field) {
		
	}

$w++;
$p_id[$w]=$a_row[0];
$p_n[$w]=$a_row[2];
$p[$w]=$a_row[4];

}


}


}
else
{
	
$result = mysql_query("SELECT * FROM `product_name` where user_id='$product_id_new' ");	


while ($a_row = mysql_fetch_row($result)) {

	foreach ($a_row as $field) {
		
	}

$w++;
$p_id[$w]=$a_row[0];
$p_n[$w]=$a_row[2];
$p[$w]=$a_row[4];


}


}















$q=0;

$total_price_sale=0;



for($i=1;$i<=$w;$i++)

{
	
$total_price_sale=0;

$result = mysql_query("SELECT * FROM `saleproduct` where  product_id='$p_id[$i]' ");


while ($a_row = mysql_fetch_row($result)) {

	foreach ($a_row as $field) {
		
	}


$q=$q+$a_row[6];


$tax=$tax+$a_row[15];

$profit=$profit+$a_row[16];

$ppp=$a_row[7];

$mtt=$a_row[17];
$ptt=$a_row[19];

$total_price_sale=$total_price_sale+$a_row[8];

}


$tp20=$tp20+$total_price_sale;
$t=$ppp*$q;



$qs++;
$q_sale[$qs]=$q;
$q_price[$qs]=$total_price_sale;




$tax1=$tax1+$tax;
$t1=$t1+$t;
$profit1=$profit1+$profit;
$q10=$q10+$q;


$q=0;
$t=0;

$tax=0;
$profit=0;




}

























$q=0;
$t=0;
$q1=0;




for($i=1;$i<=$w;$i++)

{

$total_price=0;

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


///

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





$ew++;

$stock_q=$q-$q_sale[$ew];
$stock_p=$stock_q*$single;



$stock_qq=$stock_qq+$stock_q;
$stock_pp=$stock_pp+$stock_p;




$total_q=$total_q+$q;
$total_t=$total_t+$t;


$q=0;
$t=0;






}





















$totalproduct_final=$stock_pp;
$t_capital1=0;

////////////////////////////////////////////  In coming ////////////////////////////

$t_capital1=$totalcash_final+$totalbank_final+$totalcustomer_final+$totalproduct_final;

////////////////////////////////////////////  In coming ////////////////////////////

















$r=0;

$result = mysql_query("SELECT * FROM supplier");

while ($a_row = mysql_fetch_row($result)) {

	foreach ($a_row as $field) {
		
	}

$r++;
$bank_name[$r]=$a_row[1];
$bank_id[$r]=$a_row[0];

}






$tcr=0;
$tde=0;
$tcv=0;




for($i=1;$i<=$r;$i++)

{

$cr=0;
$de=0;
$cv=0;

$result = mysql_query("SELECT * FROM `supplier_laser`  where bank_name='$bank_id[$i]'  ORDER BY `user_id` ASC  LIMIT 0 , 100000");


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

}

$totalsupplier_final=$tcv;









$r=0;

$result = mysql_query("SELECT * FROM payment_laser");

while ($a_row = mysql_fetch_row($result)) {

	foreach ($a_row as $field) {
		
	}

$r++;
$bank_name[$r]=$a_row[1];
$bank_id[$r]=$a_row[0];

}






$tcr=0;
$tde=0;
$tcv=0;




for($i=1;$i<=$r;$i++)

{

$cr=0;
$de=0;
$cv=0;

$result = mysql_query("SELECT * FROM `payment_transection`  where bank_name='$bank_id[$i]'  ORDER BY `user_id` ASC  LIMIT 0 , 100000");


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

}

$totalparty_final=$tcv;


$t_capital2=0;

$t_capital2=$totalsupplier_final+$totalparty_final;

$t_capital=$t_capital1-$t_capital2;




print"

<table align='center'  width='600' cellpadding='0' cellspacing='1' bgcolor='black'>


<tr bgcolor='F2F2F2'>
<td width='150' height='25' align='center'> <font face='arial' size='3'>  Name  </font> </td> 
<td width='150' align='center'> <font face='arial' size='3'>  TK </font> </td> 
<td width='150'  align='center'><font face='arial' size='3'>  Total  </font> </td> 
<td width='150'  align='center'> </td> 
</tr>



<tr bgcolor='white'>
<td width='150' height='25' align='center'> <font face='arial' size='3'>  Cash  </font> </td> 
<td width='150' align='right'> <font face='arial' size='3'>  $totalcash_final Tk &nbsp;&nbsp;&nbsp;</font> </td> 
<td width='150'  align='center'> <font face='arial' size='3'>  </font> </td> 
<td width='150'> </td> 
</tr>


<tr bgcolor='white'>
<td width='150' height='25' align='center'> <font face='arial' size='3'>  In Bank  </font> </td> 
<td width='150' align='right'> <font face='arial' size='3'>  $totalbank_final Tk &nbsp;&nbsp;&nbsp; </font> </td> 
<td width='150'  align='center'><font face='arial' size='3'>   </font> </td> 
<td width='150'  align='center'> </td> 
</tr>


<tr bgcolor='white'>
<td width='150' height='25' align='center'> <font face='arial' size='3'>  Customer  </font> </td> 
<td width='150' align='right'> <font face='arial' size='3'>  $totalcustomer_final Tk &nbsp;&nbsp;&nbsp; </font> </td> 
<td width='150'  align='center'><font face='arial' size='3'>    </font> </td> 
<td width='150'  align='center'> </td> 
</tr>


<tr bgcolor='white'>
<td width='150' height='25' align='center'> <font face='arial' size='3'>  Product Stock  </font> </td> 
<td width='150' align='right'> <font face='arial' size='3'>  $totalproduct_final Tk &nbsp;&nbsp;&nbsp; </font> </td> 
<td width='150'  align='center'><font face='arial' size='3'>   </font> </td> 
<td width='150'  align='center'> </td> 
</tr>


<tr bgcolor='white'>
<td width='150' height='25' align='center'> <font face='arial' size='3'>    </font> </td> 
<td width='150' align='center'> <font face='arial' size='3'>  Total  </font> </td> 
<td width='150'  align='center'><font face='arial' size='3'>  $t_capital1 Tk  </font> </td> 
<td width='150'  align='center'> </td> 
</tr>


<tr bgcolor='white'>
<td width='150' height='25' align='center'> <font face='arial' size='3'>    </font> </td> 
<td width='150' align='center'> <font face='arial' size='3'>   </font> </td> 
<td width='150'  align='center'><font face='arial' size='3'>    </font> </td> 
<td width='150'  align='center'> </td> 
</tr>



<tr bgcolor='white'>
<td width='150' height='25' align='center'> <font face='arial' size='3'>  Supplier Due  </font> </td> 
<td width='150' align='right'> <font face='arial' size='3'>  $totalsupplier_final Tk &nbsp;&nbsp;&nbsp;  </font> </td> 
<td width='150'  align='center'><font face='arial' size='3'>    </font> </td> 
<td width='150'  align='center'> </td> 
</tr>

<tr bgcolor='white'>
<td width='150' height='25' align='center'> <font face='arial' size='3'>  Party  Due  </font> </td> 
<td width='150' align='right'> <font face='arial' size='3'>  $totalparty_final Tk &nbsp;&nbsp;&nbsp;   </font> </td> 
<td width='150'  align='center'><font face='arial' size='3'>    </font> </td> 
<td width='150'  align='center'> </td> 
</tr>


<tr bgcolor='white'>
<td width='150' height='25' align='center'> <font face='arial' size='3'>    </font> </td> 
<td width='150' align='center'> <font face='arial' size='3'> Total </font> </td> 
<td width='150'  align='center'><font face='arial' size='3'>    $t_capital2 tk  </font> </td> 
<td width='150'  align='center'> </td> 
</tr>


<tr bgcolor='red'>
<td width='150' height='25' align='center'> <font face='arial' size='3'>    </font> </td> 
<td width='150' align='center'>  </td> 
<td width='150'  align='center'> <font face='arial' size='3' color='white'> Your Capital </font> </td> 
<td width='150'  align='center'> <font face='arial' size='3' color='white'>    $t_capital Tk  </font> </td> 
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