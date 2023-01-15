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

$dat=trim($_POST['dat']);
$mon=trim($_POST['mon']);
$yer=trim($_POST['yer']);


$mdate="$yer1$mon1$dat1";
$ndate="$yer$mon$dat";









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





$ar='"';




print"

<html>

<head>
<title> Find Profit </title>
";
?>



<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  
  <script src="jquery-1.10.2.js"></script>
  <script src="jquery-ui.js"></script>
  <link rel="stylesheet" href="/resources/demos/style.css">






<?php


include_once('style.php');

print"

<style>

#da
{
width:50px;
height:30px;
font-family:arial;
font-size:22px;
}




#ye
{
width:100px;
height:30px;
font-family:arial;
font-size:22px;
}


#yee
{
width:100px;
height:35px;
font-family:arial;
font-size:22px;
}


</style>

";

print"
</head>


<body>
";


include_once('address.php');


print"
<table align='center' width='' cellpadding='0' cellspacing='0' height='0'>
<tr bgcolor='white'> 
";

//include_once('report_left.php');




$cr=0;
$de=0;
$cv=0;

$result = mysql_query("SELECT * FROM `supplier_laser`  where adat>='$ndate' && adat<='$mdate' && ck='1'  ORDER BY `user_id` ASC  LIMIT 0 , 100000");


while ($a_row = mysql_fetch_row($result)) {

	foreach ($a_row as $field) {
		
	}

if($a_row[2]==1)
{

}

if($a_row[2]==2)
{
$de=$de+$a_row[3];
}


}




$dvc=$de;


$cr=0;
$de=0;
$cv=0;

$result = mysql_query("SELECT * FROM `supplier_laser`  where adat>='$ndate' && adat<='$mdate' && commission!='' ORDER BY `user_id` ASC  LIMIT 0 , 100000");


while ($a_row = mysql_fetch_row($result)) {

	foreach ($a_row as $field) {
		
	}

$de_c=$de_c+$a_row[13];

}



$p_commission=$de_c+$dvc;


print"
<td align='center' valign='top' width='1000'> 


<br>


<table align='center' width='1000' cellpadding='0' cellspacing='0' bgcolor=''>
<tr> <td align='center' height='40'> <font face='arial' size='5'> <b> Find Profit  </b>  </font> </td> </tr>
<tr> <td align='center' height='1' bgcolor=''> </td> </tr>
</table>


















<table align='center' width='1000' cellpadding='0' cellspacing='0' bgcolor=''>



<tr> 

<form action='profit_new.php' method='POST'>

<td align='center' height='10'> 
";















print"








<font face='arial' size='5'> <b> Date :  </b>  </font>






<select name='dat' id='da'>

<option>$dat</option>
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


<select name='mon' id='da'>
<option>$mon</option>
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



<select name='yer' id='ye'>
<option>$yer</option>
";

include_once('year1.php');

print"
</select>


<font face='arial' size='5'> &nbsp; To  &nbsp;  </font>




<select name='dat1' id='da'>
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


<select name='mon1' id='da'>
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



<select name='yer1' id='ye'>
<option>$yer1</option>
";

include_once('year.php');

print"
</select>




<input type='hidden' name='ser' value='7'>

<input type='submit' value='Search' id='yee'>

</td> 


</form>

</tr>
<tr> <td align='center' height='1' bgcolor='F9F4D8'> </td> </tr>
</table>
";







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
	
//for($i=1;$i<=$kr;$i++)

//{	
	
//$result = mysql_query("SELECT * FROM product_name where sub_category_id='$sub_id[$i]'");

$result = mysql_query("SELECT * FROM product_name ORDER BY `user_id`");


//$result = mysql_query("SELECT * FROM `product_name`  ORDER BY `product_name` ASC  LIMIT 0 , 100000");


while ($a_row = mysql_fetch_row($result)) {

	foreach ($a_row as $field) {
		
	}

$w++;
$p_id[$w]=$a_row[0];
$p_n[$w]=$a_row[2];
$p[$w]=$a_row[4];


//}


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
$preo=0;



//print"$mdate";


for($i=1;$i<=$w;$i++)
{
$total_price_sale=0;
$psingle=0;
//$result = mysql_query("SELECT * FROM `product_name` where  user_id='$p_id[$i]' ORDER BY `user_id` ");
$result = mysql_query("SELECT * FROM `buyproduct` where product_id='$p_id[$i]' && adat<='$mdate' ORDER BY `user_id` DESC  LIMIT 0 , 1  ");
//$result = mysql_query("SELECT * FROM `saleproduct` where adat<='$mdate'  && product_id='$p_id[$i]' ORDER BY `adat` ");
while ($a_row = mysql_fetch_row($result)) {

	foreach ($a_row as $field) {
	}
//$q=$q+$a_row[6];
$psingle=$a_row[21];
//print"$a_row[6] <br>";
}
$awqs++;
//$q_wsale[$wqs]=$q;
$p_single[$awqs]=$psingle;
$q=0;
$t=0;

$tax=0;
$profit=0;
$ptyy=0;
$pty=0;
}





















$result = mysql_query("SELECT * FROM `buymemo` where adat>='$ndate' && adat<='$mdate' && total_money!=''   && tf!='1' ");

while ($a_row = mysql_fetch_row($result)) {

	foreach ($a_row as $field) {
		
	}


$t55=$a_row[5]+$a_row[21];
$t55_total=$t55_total+$t55;
$comm=$comm+$a_row[21];
$tot=$tot+$a_row[5];
$ship=$ship+$a_row[6];
$t66=$a_row[5]+$a_row[6];
$stot=$stot+$t66;




$total_money=$total_money+$a_row[5];
$total_less=$total_less+$a_row[6];
$total_joma=$total_joma+$a_row[7];
$total_due=$total_due+$a_row[8];


}


$total_money=0;
$total_less=0;
$total_joma=0;
$total_due=0;


































for($i=1;$i<=$w;$i++)
{	
$q_return=0;
$total_return=0;


$result = mysql_query("SELECT * FROM `saleproduct_return` where  adat<='$mdate' && product_id='$p_id[$i]'   && tf!='1' ORDER BY `adat` ");

while ($a_row = mysql_fetch_row($result)) {

	foreach ($a_row as $field) {
		
	}
$q_return=$q_return+$a_row[6];
$total_return=$total_return+$a_row[25];
}
$wqs_return++;
$q_wsale_return[$wqs_return]=$q_return;
$total_price_return[$wqs_return]=$total_return;

$q_return=0;
$total_return=0;
}














for($i=1;$i<=$w;$i++)
{	
$q_return=0;
$total_return=0;
$profit_return=0;

$result = mysql_query("SELECT * FROM `saleproduct_return` where adat>='$ndate' && adat<='$mdate' && product_id='$p_id[$i]'   && tf!='1' ORDER BY `adat` ");

while ($a_row = mysql_fetch_row($result)) {

	foreach ($a_row as $field) {
		
	}
$profit_return=$total_return+$a_row[26];
}
$wqs_return1++;
$profit_return1[$wqs_return1]=$profit_return;
$q_return=0;
$total_return=0;
$profit_return=0;
}














for($i=1;$i<=$w;$i++)
{	
$q_purchase_return=0;
$total_purchase_return=0;

$result = mysql_query("SELECT * FROM `buyproduct_return` where  adat>='$ndate' && adat<='$mdate' && product_id='$p_id[$i]'   && tf!='1' ORDER BY `adat` ");

while ($a_row = mysql_fetch_row($result)) {

	foreach ($a_row as $field) {
		
	}
$q_purchase_return=$q_purchase_return+$a_row[6];
$total_purchase_return=$total_purchase_return+$a_row[8];

$total_purchase_return1=$total_purchase_return1+$a_row[8];


}

$wqs_purchase_return++;
$q_wsale_purchase_return[$wqs_purchase_return]=$q_purchase_return;
$total_price_purchase_return[$wqs_purchase_return]=$total_purchase_return;
$q_purchase_return=0;
$total_purchase_return=0;

}





























$q=0;

$total_price_sale=0;
$preo=0;



//print"$ndate";



for($i=1;$i<=$w;$i++)
{	
$total_price_sale=0;
$result = mysql_query("SELECT * FROM `saleproduct` where adat<'$ndate'   && product_id='$p_id[$i]'   && tf!='1' ORDER BY `adat` ");

while ($a_row = mysql_fetch_row($result)) {

	foreach ($a_row as $field) {
		
	}
$q=$q+$a_row[6];
}
$wqs++;
$q_wsale[$wqs]=$q;
$q=0;
$t=0;
$tax=0;
$profit=0;
$ptyy=0;
$pty=0;

}


























$q=0;

$total_price_sale=0;
$preo=0;


//for($i=1;$i<=$w;$i++)

//{
	
$total_price_sale=0;

$result = mysql_query("SELECT * FROM `saleproduct` where adat>='$ndate' && adat<='$mdate'     && tf!='1' ORDER BY `adat` ");



//$result = mysql_query("SELECT * FROM `saleproduct` where adat<='$mdate'  && product_id='$p_id[$i]' ORDER BY `adat` ");


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
//$pty=$a_row[7]-$a_row[14];

$pty=$pty*$a_row[6];



$ptyy=$ptyy+$pty;



$profit=$profit+$a_row[16];

$ppp=$a_row[7];

$mtt=$a_row[17];
$ptt=$a_row[19];

$preo=$a_row[8]-$a_row[25];


//$total_price_sale=$total_price_sale+$a_row[8];
$total_price_sale=$total_price_sale+$a_row[8];
}


$tp20=$tp20+$total_price_sale;
$t=$ppp*$q;
$qs++;
$q_sale[$qs]=$q;
$q_price[$qs]=$total_price_sale;

$prrp[$qs]=$ptyy-$profit_return1[$qs];


$ret=$ret+$profit_return1[$qs];

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




//}












$q=0;
$t=0;
$q1=0;




for($i=1;$i<=$w;$i++)

{

$total_price=0;

$result = mysql_query("SELECT * FROM `buyproduct` where  adat<='$mdate'  && product_id='$p_id[$i]'   && tf!='1' ");
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
$total_price=$total_price;
$total_price=$total_price;
$total_price=$total_price-$total_price_purchase_return[$ew];

$total_price=$total_price+$total_price_return[$ew];





//$q=$q+$q_wsale_return[$ew];


$q=$q-$q_wsale_purchase_return[$ew];
$q=$q+$q_wsale_return[$ew];



///////////////////

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






$stock_q=$q-$q_sale[$ew];

$stock_q=$stock_q-$q_wsale[$ew];
$stock_p=$stock_q*$single;
$p_new=$p_single[$ew]*$stock_q;
$pp_new=$pp_new+$p_new;
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
$re_q=$re_q+$q_wsale_return[$ew];
$re_a=$re_a+$total_price_return[$ew];


$pnew_single = number_format($p_single[$ew], 3);
$pnew_single=str_replace(",","","$pnew_single");


$p_new = number_format($p_new, 3);
$p_new=str_replace(",","","$p_new");

$wq10=$wq10+$q_wsale[$ew];




$total_q=$total_q+$q;
$total_t=$total_t+$t;
$tpyy=$tpyy+$prrp[$ew];



$q=0;
$t=0;

}























$tpyy=0;



$result = mysql_query("SELECT * FROM `saleproduct` where  adat>='$ndate' && adat<='$mdate' && tf!='1'  ORDER BY `adat` ASC  LIMIT 0 , 6000000 ");


while ($a_row = mysql_fetch_row($result)) {

	foreach ($a_row as $field) {
		
	}


$aui=$a_row[8]/$a_row[6];

$aui = number_format($aui, 3);
$aui=str_replace(",","","$aui");


$buy = number_format($a_row[14], 3);
$buy=str_replace(",","","$buy");




$pro=$aui-$buy;
$pro=$pro*$a_row[6];

$pro = number_format($pro, 3);
$pro=str_replace(",","","$pro");


$tpyy=$tpyy+$pro;


}























/*
print"
<tr bgcolor='white'> 
<td align='left' height='30' width=''>  <font face='arial' size='2' color=''> &nbsp;   </font> </td> 
<td align='left' height='30' width=''>  <font face='arial' size='2' color=''> &nbsp; $total_q   </font> </td> 
";
print"
<td align='left' height='30' width=''>  <font face='arial' size='2' color=''> &nbsp; $tp  </font> </td>
";

print"
<td align='left' height='30' width=''>  <font face='arial' size='2' color=''> &nbsp; $wq10   </font> </td>
<td align='left' height='30' width=''>  <font face='arial' size='2' color=''> &nbsp; $q10 </font>
 </td> 
";


print"
<td align='left' height='30' width=''>  <font face='arial' size='2' color=''> &nbsp; $tp20    </font> </td> 
<td align='left' height='30' width=''>  <font face='arial' size='2' color=''> &nbsp;  $stock_qq </font> </td> 
<td align='left' height='30' width=''>  <font face='arial' size='2' color=''> &nbsp; </font> </td> 
<td align='left' height='30' width=''>  <font face='arial' size='2' color=''> &nbsp; $stock_pp_cross  $pp_new </font> </td> 
<td align='left' height='30' width=''>  <font face='arial' size='2' color=''> &nbsp; $tpyy  $profit_total_old </font> </td> 
</tr>
";

*/





//////////////////////////////////////////////////////////////////////////////////////////
/*
$sal=0;
$result = mysql_query("SELECT * FROM `costing_entry` where  adat>='$ndate' && adat<='$mdate' && sub_id='26' ORDER BY `user_id` ASC  LIMIT 0 , 60000");
while ($a_row = mysql_fetch_row($result)) {

	foreach ($a_row as $field) {	
	}
$sal=$sal+$a_row[5];
}
*/







//$mdate



	
$less=0;
$less2=0;
$less3=0;

if($supplier=="")
{
$result = mysql_query("SELECT * FROM `customer_laser` where  adat>=$ndate &&  adat<='$mdate'    ");
}

//else
//{
//$result = mysql_query("SELECT * FROM `customer_laser` where bank_name='$supplier' && adat>='$mdate' && adat<='$ndate'  //");	
//}

while ($a_row = mysql_fetch_row($result)) {

	foreach ($a_row as $field) {
		
	}


if($a_row[14]>0)
{


if($a_row[15]==1)
{

$less1=$less1+$a_row[13];
$less2=$less2+$a_row[14];
// print"$a_row[14] <br>";
}
else
{
$less3=$less3+$a_row[14];
}


}


	
}






$less=$less2+$less3+$sal;


$less10=$less;







///print"Sales man comission: $sal <br> ";

///print"Sales comission: $less2 <br>";

///print"Discount comission: $less3 <br>";

///print" Total comission: $less <br>";


//print"$less + $sal = $less10 <br>";


$less=$less10;

//$less=$less1+$less2;


$profit_total1=$tpyy-$less;








$total_money=0;
$total_less=0;
$total_joma=0;
$total_due=0;
$tyuu=0;






$result = mysql_query("SELECT * FROM `salememo_return` where adat>='$ndate' && adat<='$mdate'   && tf!='1' ");


while ($a_row = mysql_fetch_row($result)) {

	foreach ($a_row as $field) {
		
	}



$total_money=$total_money+$a_row[5];
$total_less=$total_less+$a_row[6];
$total_joma=$total_joma+$a_row[7];
$total_due=$total_due+$a_row[8];


}



$tyuu=$total_joma+$total_due;


$sales_return=$tyuu;
$net_sales=$tp20-$sales_return;


print"
<br>

<table align='center' width='1200' cellpadding='2' cellspacing='1' bgcolor='black'>

<tr bgcolor='F2F2F2'>
 <td align='left' width='400' height='30'> <font face='arial' size='5'> &nbsp; Name </font> </td> 
 <td align='center' width='400'> <font face='arial' size='5'>  Amount </font> </td> 
</tr>
";


$tot= number_format($tot, 2);
$tot=str_replace(",","","$tot");


print"
<tr bgcolor='white'>
 <td align='left' width='400' height='30'> <font face='arial' size='5'>&nbsp; Total Purchase  </font> </td> 
 <td align='right' width='400'> <font face='arial' size='5'>  $tot  </font> </td> 
</tr>
";



$total_purchase_return1= number_format($total_purchase_return1, 2);
$total_purchase_return1=str_replace(",","","$total_purchase_return1");


print"
<tr bgcolor='white'>
 <td align='left' width='400' height='30'> <font face='arial' size='5'>&nbsp;  Purchase Return   </font> </td> 
 <td align='right' width='400'> <font face='arial' size='5'> $total_purchase_return1  </font> </td> 
</tr>
";

$tp20= number_format($tp20, 2);
$tp20=str_replace(",","","$tp20");


print"
<tr bgcolor='white'>
 <td align='left' width='400' height='30'> <font face='arial' size='5'>&nbsp; Total Sales  </font> </td> 
 <td align='right' width='400'> <font face='arial' size='5'>  $tp20 </font> </td> 
</tr>
";


$sales_return= number_format($sales_return, 2);
$sales_return=str_replace(",","","$sales_return");

print"
<tr bgcolor='white'>
 <td align='left' width='400' height='30'> <font face='arial' size='5'>&nbsp;  Sales Return  </font> </td> 
 <td align='right' width='400'> <font face='arial' size='5'> $sales_return  </font> </td> 
</tr>
";


$net_sales= number_format($net_sales, 2);
$net_sales=str_replace(",","","$net_sales");


print"
<tr bgcolor='white'>
 <td align='left' width='400' height='30'> <font face='arial' size='5'>&nbsp; <b>  Net Sales </b>  </font> </td> 
 <td align='right' width='400'> <font face='arial' size='5'>  <b> $net_sales </b>  </font> </td> 
</tr>
";

$less= number_format($less, 2);
$less=str_replace(",","","$less");


print"
<tr bgcolor='white'>
 <td align='left' width='400' height='30'> <font face='arial' size='5'>&nbsp; <b>  Discount  </b>  </font> </td> 
 <td align='right' width='400'> <font face='arial' size='5'>  <b>  $less </b>  </font> </td> 
</tr>
";


$profit_total1= number_format($profit_total1, 2);
$profit_total1=str_replace(",","","$profit_total1");


$ret= number_format($ret, 2);
$ret=str_replace(",","","$ret");


print"
<tr bgcolor='white'>
 <td align='left' width='400' height='30'> <font face='arial' size='5'>&nbsp; Profit From Product  </font> </td> 
 <td align='right' width='400'> <font face='arial' size='5'>  $profit_total1 </font> </td> 
</tr>
";


print"
<tr bgcolor='white'>
 <td align='left' width='400' height='30'> <font face='arial' size='5'>&nbsp; Return Profit From Product  </font> </td> 
 <td align='right' width='400'> <font face='arial' size='5'>  $ret </font> </td> 
</tr>
";

$profit_total1=$profit_total1-$ret;

$profit_total1= number_format($profit_total1, 2);
$profit_total1=str_replace(",","","$profit_total1");


print"
<tr bgcolor='white'>
 <td align='left' width='400' height='30'> <font face='arial' size='5'>&nbsp; Final Profit From Product  </font> </td> 
 <td align='right' width='400'> <font face='arial' size='5'>  $profit_total1 </font> </td> 
</tr>
";






$p_commission= number_format($p_commission, 2);
$p_commission=str_replace(",","","$p_commission");


print"
<tr bgcolor='white'>
 <td align='left' width='400' height='30'> <font face='arial' size='5'>&nbsp; Purchase Commission  </font> </td> 
 <td align='right' width='400'> <font face='arial' size='5'>  $p_commission </font> </td> 
</tr>


";




$pp_new= number_format($pp_new, 2);
$pp_new=str_replace(",","","$pp_new");


print"
<tr bgcolor='white'>
 <td align='left' width='400' height='30'> <font face='arial' size='5'>&nbsp;  Current Stock  </font> </td> 
 <td align='right' width='400'> <font face='arial' size='5'>  $pp_new  </font> </td> 
</tr>
";




print"
<tr bgcolor='F2F2F2'>
 <td align='left' width='400' height='30'> <font face='arial' size='5'>&nbsp; <b> Expences </b>  </font> </td> 
 <td align='right' width='400'> <font face='arial' size='5'>   </font> </td> 
</tr>

";






$t=0;
$total=0;
$h=0;
$r=0;


$result = mysql_query("SELECT * FROM expendature_head");

while ($a_row = mysql_fetch_row($result)) {

	foreach ($a_row as $field) {
		
	}

$h++;
$head_name[$h]=$a_row[1];
$head_id[$h]=$a_row[0];

}


$r=0;
$total=0;

for($i=1;$i<=$h;$i++)
{
$total=0;
$result = mysql_query("SELECT * FROM `costing_entry` where expenduter_name='$head_id[$i]' && adat>='$ndate' && adat<='$mdate'  ORDER BY `user_id` ASC  LIMIT 0 , 6000000");
while ($a_row = mysql_fetch_row($result)) {

	foreach ($a_row as $field) {
		
	}
$r++;
$total=$total+$a_row[5];
}







$total= number_format($total, 2);
$total=str_replace(",","","$total");


print"
<tr bgcolor='white'>
 <td align='left' width='400' height='30'> <font face='arial' size='5'>&nbsp; $head_name[$i]  </font> </td> 
 <td align='right' width='400'> <font face='arial' size='5'>  $total </font> </td> 
</tr>
";


$t=$t+$total;


}




$net_profit=$profit_total1-$t;


$net_profit=$net_profit+$p_commission;


$t= number_format($t, 2);
$t=str_replace(",","","$t");


print"
<tr bgcolor='white'>
 <td align='left' width='400' height='30'> <font face='arial' size='5'>&nbsp; <b> Total Expences </b>  </font> </td> 
 <td align='right' width='400'> <font face='arial' size='5'>  <b> $t </b>  </font> </td> 
</tr>
";

$net_profit= number_format($net_profit, 2);
$net_profit=str_replace(",","","$net_profit");


print"
<tr bgcolor='white'>
 <td align='left' width='400' height='30'> <font face='arial' size='5'>&nbsp; <b> Net Profit </b>  </font> </td> 
 <td align='right' width='400'> <font face='arial' size='5'>  <b> $net_profit </b>  </font> </td> 
</tr>
";





$other_income=1;


if($other_income==1)
{

print"
<tr bgcolor='white'>
 <td align='left' width='400' height='30'> <font face='arial' size='3'>&nbsp; <b> Others Income </b>  </font> </td> 
 <td align='right' width='400'> <font face='arial' size='5'>  <b>  </b>  </font> </td> 
</tr>
";








$t_r=0;
$total_r=0;
$h_r=0;
$r_r=0;


$result = mysql_query("SELECT * FROM rexpendature_head");

while ($a_row = mysql_fetch_row($result)) {

	foreach ($a_row as $field) {
		
	}

$h_r++;
$head_name_r[$h_r]=$a_row[1];
$head_id_r[$h_r]=$a_row[0];

}


$r_r=0;
$total_r=0;

for($i=1;$i<=$h_r;$i++)
{
$total_r=0;
$result = mysql_query("SELECT * FROM `rcosting_entry` where expenduter_name='$head_id_r[$i]' && adat>='$ndate' && adat<='$mdate'  ORDER BY `user_id` ASC  LIMIT 0 , 6000000");
while ($a_row = mysql_fetch_row($result)) {

	foreach ($a_row as $field) {
		
	}
$r_r++;
$total_r=$total_r+$a_row[5];
}







$total_r= number_format($total_r, 2);
$total_r=str_replace(",","","$total_r");


print"
<tr bgcolor='white'>
 <td align='left' width='400' height='30'> <font face='arial' size='5'>&nbsp; $head_name_r[$i]  </font> </td> 
 <td align='right' width='400'> <font face='arial' size='5'>  $total_r </font> </td> 
</tr>
";


$t_r=$t_r+$total_r;


}







$t_r= number_format($t_r, 2);
$t_r=str_replace(",","","$t_r");





print"
<tr bgcolor='white'>
 <td align='left' width='400' height='30'> <font face='arial' size='3'>&nbsp; <b> Total Others Income </b>  </font> </td> 
 <td align='right' width='400'> <font face='arial' size='5'>  <b> $t_r </b>  </font> </td> 
</tr>
";


}










print"

</table>

";


/*
print"
<br>


Total Product's profit : $tpyy  <br>

Profit from product : $profit_total1 

";
*/


/*
<br>

//Total comission: $less




<br>

$tpyy-$less
<br>

 Profit on product:  $profit_total1
*/

print"



<form action='stock_report_print.php' method='POST' target='a_blank'>

&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type='hidden' name='dat1' value='$dat1'>
<input type='hidden' name='mon1' value='$mon1'>
<input type='hidden' name='yer1' value='$yer1'>


<input type='hidden' name='ser' value='1'>


<input type='hidden' name='dat2' value='$dat2'>
<input type='hidden' name='mon2' value='$mon2'>
<input type='hidden' name='yer2' value='$yer2'>
<input type='hidden' name='product_id_new' value='$product_id_new'>
";

print"
</form>
 </td>
</tr>
</table>
";





////////////////////////////////////////////////////////////////////////////////Customer Due//////////////////////////////////////



$cr=0;
$de=0;



$result = mysql_query("SELECT * FROM `customer_laser`  where  adat<='$mdate'   ORDER BY `user_id` ASC  LIMIT 0 , 100000");


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


$customer_due=$cr-$de;













$cr=0;
$de=0;



$result = mysql_query("SELECT * FROM `customer_advance`  where  adat<='$mdate'   ORDER BY `user_id` ASC  LIMIT 0 , 100000");


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


$customer_advance=$cr-$de;









$cr=0;
$de=0;



$result = mysql_query("SELECT * FROM `supplier_advance`  where  adat<='$mdate'   ORDER BY `user_id` ASC  LIMIT 0 , 100000");


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


$supplier_advance=$cr-$de;




































$cr=0;
$de=0;
$cv=0;

$result = mysql_query("SELECT * FROM `supplier_laser`  where adat<='$mdate'  ORDER BY `user_id` ASC  LIMIT 0 , 100000");


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






$supplier_due=$cr-$de;

$lq=1;
$result = mysql_query("SELECT * FROM `bank`  ORDER BY `bank_name` ");

while ($a_row = mysql_fetch_row($result)) {

	foreach ($a_row as $field) {
		
	}

$rf++;
$bank_namef[$rf]=$a_row[1];
$bank_idf[$rf]=$a_row[0];



}




$cr=0;
$de=0;
$cv=0;


for($i=1;$i<=$rf;$i++)

{


$result = mysql_query("SELECT * FROM `bank_refill`  where bank_name='$bank_idf[$i]' && adat<='$mdate' ORDER BY `user_id` ASC  LIMIT 0 , 100000");


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



}




$bank_due1=$cr-$de;







$lq=1;
$r=0;
$result = mysql_query("SELECT * FROM `bank` where b_id='1'  ORDER BY `bank_name` ");


while ($a_row = mysql_fetch_row($result)) {

	foreach ($a_row as $field) {
		
	}

$r++;
$lbank_name[$r]=$a_row[1];
$lbank_id[$r]=$a_row[0];

}





$cr=0;
$de=0;
$cv=0;


for($i=1;$i<=$r;$i++)

{


$result = mysql_query("SELECT * FROM `bank_refill`  where bank_name='$lbank_id[$i]' && adat<='$mdate' ORDER BY `user_id` ASC  LIMIT 0 , 100000");


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



}




$bank_due2=$cr-$de;



$bank_due=$bank_due1+$bank_due2;



$dr=0;
$cr=0;
$r=0;


$result = mysql_query("SELECT * FROM `cash_book` where   adat<='$mdate'  ORDER BY `user_id` ASC  LIMIT 0 , 6000000 ");


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

$cash_due=$cr-$dr;


/*
print" <br> Customer Due: $customer_due  <br>";
print" <br>Supplier Due: $supplier_due  <br>";
print" <br> Bank Balance : $bank_due  <br>";
print" <br> Cash Balance : $cash_due  <br>";
*/









/*

$r=0;
$asset=0;
$asc=3;

$total=0;
$result = mysql_query("SELECT * FROM `costing_entry` where expenduter_name='$asc'  && adat<='$mdate'  ORDER BY `user_id` ASC  LIMIT 0 , 6000000");
while ($a_row = mysql_fetch_row($result)) {

	foreach ($a_row as $field) {
		
	}
$asset=$asset+$a_row[5];
}



*/












$result = mysql_query("SELECT * FROM `asset`  ORDER BY `customer_name` ASC  LIMIT 0 , 60000 ");


while ($a_row = mysql_fetch_row($result)) {

	foreach ($a_row as $field) {
		
	}

	
                $amount_asset=$amount_asset+$a_row[3];
				$amount_kor=$amount_kor+$a_row[4];
				
				
				$kor=$a_row[3]-$a_row[4];
				$asset=$asset+$kor;
				
				
	
}




$asset= number_format($asset, 2);
$asset=str_replace(",","","$asset");









$total_due=$asset+$pp_new+$bank_due+$cash_due+$customer_due;

$total_due=$total_due+$supplier_advance;

$capital=$total_due-$supplier_due;
$capital=$capital-$customer_advance;



$asset= number_format($asset, 2);
$asset=str_replace(",","","$asset");


$pp_new= number_format($pp_new, 2);
$pp_new=str_replace(",","","$pp_new");



$bank_due1= number_format($bank_due1, 2);
$bank_due1=str_replace(",","","$bank_due1");


$bank_due2= number_format($bank_due2, 2);
$bank_due2=str_replace(",","","$bank_due2");


$cash_due= number_format($cash_due, 2);
$cash_due=str_replace(",","","$cash_due");


$customer_due= number_format($customer_due, 2);
$customer_due=str_replace(",","","$customer_due");



$supplier_advance= number_format($supplier_advance, 2);
$supplier_advance=str_replace(",","","$supplier_advance");



$total_due= number_format($total_due, 2);
$total_due=str_replace(",","","$total_due");


$supplier_due= number_format($supplier_due, 2);
$supplier_due=str_replace(",","","$supplier_due");


$customer_advance= number_format($customer_advance, 2);
$customer_advance=str_replace(",","","$customer_advance");


$capital= number_format($capital, 2);
$capital=str_replace(",","","$capital");



















print"
";

print"
<table align='center' width='700' cellpadding='5' cellspacing='1' bgcolor='black'>
<tr bgcolor='white'> 
<td width='200' align='left' height='30'> <font face='arial' size='5'> <b> Asset </b> </font> </td> 
<td width='200' align='right'> <font face='arial' size='5'> <b> $asset </b> </font> </td> 
</tr>

<tr bgcolor='white'> 
<td width='100' align='left' height='30'> <font face='arial' size='5'> <b> Stock </b> </font> </td> 
<td width='200' align='right'> <font face='arial' size='5'> <b> $pp_new </b> </font> </td> 
</tr>

<tr bgcolor='white'> 
<td width='100' align='left' height='30'> <font face='arial' size='5'> <b> Bank Balance </b> </font> </td> 
<td width='200' align='right'> <font face='arial' size='5'> <b> $bank_due1 </b> </font> </td> 
</tr>
";

/*
<tr bgcolor='white'> 
<td width='100' align='left' height='30'> <font face='arial' size='5'> <b> Loan Balance </b> </font> </td> 
<td width='200' align='right'> <font face='arial' size='5'> <b> $bank_due2 </b> </font> </td> 
</tr>
*/


print"
<tr bgcolor='white'> 
<td width='100' align='left' height='30'> <font face='arial' size='5'> <b> Cash Balance</b> </font> </td> 
<td width='200' align='right'> <font face='arial' size='5'> <b> $cash_due </b> </font> </td> 
</tr>



<tr bgcolor='white'> 
<td width='100' align='left' height='30'> <font face='arial' size='5'> <b> Customer Due </b> </font> </td> 
<td width='200' align='right'> <font face='arial' size='5'> <b> $customer_due </b> </font> </td> 
</tr>
";


if($advance100==100)
{
print"
<tr bgcolor='white'> 
<td width='100' align='left' height='30'> <font face='arial' size='5'> <b> Supplier Advance </b> </font> </td> 
<td width='200' align='right'> <font face='arial' size='5'> <b> $supplier_advance </b> </font> </td> 
</tr>
";
}


print"

<tr bgcolor='#F2F2F2'> 
<td width='100' align='left' height='30'> <font face='arial' size='5'> <b> Total </b> </font> </td> 
<td width='200' align='right'> <font face='arial' size='5'> <b> $total_due </b> </font> </td> 
</tr>



<tr bgcolor='yellow'> 
<td width='100' align='left' height='30'> <font face='arial' size='5'> <b> Supplier Due </b> </font> </td> 
<td width='200' align='right'> <font face='arial' size='5'> <b> $supplier_due </b> </font> </td> 
</tr>
";


if($advance100==100)
{
print"
<tr bgcolor='yellow'> 
<td width='100' align='left' height='30'> <font face='arial' size='5'> <b> Customer Advance Receive </b> </font> </td> 
<td width='200' align='right'> <font face='arial' size='5'> <b> $customer_advance </b> </font> </td> 
</tr>
";
}


print"
<tr bgcolor='#F2F2F2'> 
<td width='100' align='left' height='30'> <font face='arial' size='5'> <b> Capital </b> </font> </td> 
<td width='200' align='right'> <font face='arial' size='5'> <b> $capital </b> </font> </td> 
</tr>



</table>
<br>
<br>
<br>
<br>
<br>
<br>


";

include_once('sign_cost.php');

print"
</body>

</html>


";


?>