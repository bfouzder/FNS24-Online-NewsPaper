<?php
include_once('dbconnection.php');




$id=trim($_POST['product_id_new']);

$idn=strlen($id);

for($lk=0;$lk<=$idn;$lk++)
{
if($id[$lk]=='=')
{
$rty++;	
}

if($rty==1)
{
	$rkk++;
	if($rkk>1)
	{
$idvalue="$idvalue$id[$lk]";
	}	
}
	
}



$product_id_new=$idvalue;








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
  <script>
  $(function() {
    var availableTags = [


<?php
	

	
$result = mysql_query("SELECT * FROM `product_name`  ORDER BY `user_id` ASC  LIMIT 0 , 100000");

while ($a_row = mysql_fetch_row($result)) {

	foreach ($a_row as $field) {
		
	}
print" ${ar}$a_row[2]=$a_row[0]$ar, ";
	}
?>

      "Testing"

    ];
    $( "#tags" ).autocomplete({
      source: availableTags
    });
  });
  </script>





<?php


include_once('style.php');


print"
</head>


<body>
";


//include_once('header.php');


print"
<table align='center' width='1200' cellpadding='0' cellspacing='1' height='800'>
<tr bgcolor='white'> 
";

//include_once('report_left.php');












print"
<td align='center' valign='top' width='980'> 


<br>


<table align='center' width='1000' cellpadding='0' cellspacing='0' bgcolor='F7D3F2'>
<tr> <td align='center' height='40'> <font face='arial' size='4'> <b> Find Profit  </b>  </font> </td> </tr>
<tr> <td align='center' height='1' bgcolor='F9F4D8'> </td> </tr>
</table>


















<table align='center' width='1000' cellpadding='0' cellspacing='0' bgcolor='F3F3F3'>



<tr> 

<form action='profit_new.php' method='POST'>

<td align='center' height='40'> 
";















print"















<select name='dat'>

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


<select name='mon'>
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



<select name='yer'>
<option>$yer</option>
<option>2014</option>
<option>2015</option>
<option>2016</option>
<option>2017</option>
<option>2018</option>
<option>2019</option>
<option>2020</option>
</select>


To




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
<option>2014</option>
<option>2015</option>
<option>2016</option>
<option>2017</option>
<option>2018</option>
<option>2019</option>
<option>2020</option>
</select>




<input type='hidden' name='ser' value='7'>

<input type='submit' value='Search'>

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
$preo=0;



//print"$ndate";

/*
for($i=1;$i<=$w;$i++)

{
	
$total_price_sale=0;
$result = mysql_query("SELECT * FROM `find_stock` where adat<='$mdate'   && product_id='$p_id[$i]' ORDER BY `adat` ");
//$result = mysql_query("SELECT * FROM `saleproduct` where adat<='$mdate'  && product_id='$p_id[$i]' ORDER BY `adat` ");
while ($a_row = mysql_fetch_row($result)) {

	foreach ($a_row as $field) {
		
	}
//$q=$q+$a_row[6];
$psingle=$a_row[6];

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



*/













$q=0;

$total_price_sale=0;
$preo=0;



//print"$ndate";


for($i=1;$i<=$w;$i++)

{
	
$total_price_sale=0;
$result = mysql_query("SELECT * FROM `saleproduct` where adat<'$ndate'   && product_id='$p_id[$i]' ORDER BY `adat` ");



//$result = mysql_query("SELECT * FROM `saleproduct` where adat<='$mdate'  && product_id='$p_id[$i]' ORDER BY `adat` ");


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


for($i=1;$i<=$w;$i++)

{
	
$total_price_sale=0;

$result = mysql_query("SELECT * FROM `saleproduct` where adat>='$ndate' && adat<='$mdate'  && product_id='$p_id[$i]' ORDER BY `adat` ");



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




/*

if($a_row[4]==114)
{

$typ=$a_row[7]*$a_row[6];
print" Date: $a_row[9]-$a_row[10] -$a_row[11]  -- $a_row[6] - $a_row[7] = $typ  - $a_row[25] <br>";

$pk=$a_row[8]+$a_row[25];

$try=$try+$a_row[8];

print"
<tr bgcolor='white'> 

<td> $a_row[9]-$a_row[10] -$a_row[11] - $a_row[1] </td>

<td> $a_row[3] </td>

<td> $a_row[6] </td>

<td> $a_row[7] </td>

<td> $a_row[8] </td>

<td> $a_row[25] </td>

<td> $pk  -   $try </td>



</tr>
";
}

*/
//$total_price_sale=$total_price_sale+$a_row[8];
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





/*

$result = mysql_query("SELECT * FROM `create_new`");


while ($a_row = mysql_fetch_row($result)) {

	foreach ($a_row as $field) {
		
	}
   $rqo++;
   $stp[$rqo]=$a_row[2];
   $stp_price[$rqo]=$a_row[3];

}




*/

















$q=0;
$t=0;
$q1=0;

/*

$result = mysql_query("SELECT * FROM `buyproduct` where  adat<='$mdate'  && product_id='$p_id[$i]' ");




*/



for($i=1;$i<=$w;$i++)

{

$total_price=0;




//$result = mysql_query("SELECT * FROM `buyproduct` where   adat>=$ndate &&  adat<='$mdate'  && product_id='$p_id[$i]' ");


$result = mysql_query("SELECT * FROM `buyproduct` where  adat<='$mdate'  && product_id='$p_id[$i]' ");


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










//$ppp=$ppp+$stp_price[$ew];



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


/*

$sql= "UPDATE  `saleproduct` SET `buy`='$per_product' WHERE `product_id`='$p_id[$i]' &&  adat<='$mdate' && adat>=$ndate";
mysql_query($sql);

*/

/*

$sql = "INSERT INTO `create_new5` (`user_id`, `product_id`, `stock`, `value`, `date`) VALUES ('','$p_id[$i]','$stock_qq','$stock_pp','$mdate')";
mysql_query($sql);



*/







$per_sale_product= $q_price[$ew]/$q_sale[$ew];

$per_sale_product = number_format($per_sale_product, 3);
$per_sale_product=str_replace(",","","$per_sale_product");


$prot=$per_sale_product-$per_product;



$profit_t=$q_sale[$ew]*$prot;



/*
$sql= "UPDATE  `saleproduct` SET `profit`='$profit_t' WHERE `product_id`='$p_id[$i]' &&  adat<='$mdate' && adat>=$ndate";
mysql_query($sql);


*/


//$profit_t = number_format($profit_t, 3);
//$profit_t=str_replace(",","","$profit_t");




$profit_total=$profit_total+$profit_t;












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











































/////////////////////////////













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























$result = mysql_query("SELECT * FROM `salememo_return` where adat>='$ndate' && adat<='$mdate' ");


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

<table align='center' width='1000' cellpadding='5' cellspacing='1' bgcolor='black'>

<tr bgcolor='cccccc'>
 <td align='left' width='400' height='30'> <font face='arial' size='3'> &nbsp; Name </font> </td> 
 <td align='left' width='400'> <font face='arial' size='3'> &nbsp; Amount </font> </td> 
</tr>




<tr bgcolor='white'>
 <td align='left' width='400' height='30'> <font face='arial' size='3'>&nbsp; Total Sales  </font> </td> 
 <td align='left' width='400'> <font face='arial' size='3'>&nbsp; $tp20 </font> </td> 
</tr>



<tr bgcolor='white'>
 <td align='left' width='400' height='30'> <font face='arial' size='3'>&nbsp;  Sales Return  </font> </td> 
 <td align='left' width='400'> <font face='arial' size='3'>&nbsp; $sales_return  </font> </td> 
</tr>


<tr bgcolor='white'>
 <td align='left' width='400' height='30'> <font face='arial' size='3'>&nbsp; <b>  Net Sales </b>  </font> </td> 
 <td align='left' width='400'> <font face='arial' size='3'>&nbsp; <b> $net_sales </b>  </font> </td> 
</tr>


<tr bgcolor='white'>
 <td align='left' width='400' height='30'> <font face='arial' size='3'>&nbsp; Profit From Product  </font> </td> 
 <td align='left' width='400'> <font face='arial' size='3'>&nbsp; $profit_total1 </font> </td> 
</tr>
";


/*
<tr bgcolor='white'>
 <td align='left' width='400' height='30'> <font face='arial' size='3'>&nbsp;  Purchase  </font> </td> 
 <td align='left' width='400'> <font face='arial' size='3'>&nbsp; $net_purchase  </font> </td> 
</tr>
*/


/*
print"
<tr bgcolor='white'>
 <td align='left' width='400' height='30'> <font face='arial' size='3'>&nbsp;  Current Stock  </font> </td> 
 <td align='left' width='400'> <font face='arial' size='3'>&nbsp; $pp_new  </font> </td> 
</tr>
";
*/



print"
<tr bgcolor='cccccc'>
 <td align='left' width='400' height='30'> <font face='arial' size='3'>&nbsp; <b> Expences </b>  </font> </td> 
 <td align='left' width='400'> <font face='arial' size='3'>&nbsp;  </font> </td> 
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


$total=0;




for($i=1;$i<=$h;$i++)
{

$total=0;




$result = mysql_query("SELECT * FROM `costing_entry` where expenduter_name='$head_id[$i]' && adat>='$ndate' && adat<='$mdate'  ORDER BY `user_id` ASC  LIMIT 0 , 6000");



while ($a_row = mysql_fetch_row($result)) {

	foreach ($a_row as $field) {
		
	}

$r++;



$total=$total+$a_row[5];


}





print"
<tr bgcolor='white'>
 <td align='left' width='400' height='30'> <font face='arial' size='3'>&nbsp; $head_name[$i]  </font> </td> 
 <td align='left' width='400'> <font face='arial' size='3'>&nbsp; $total </font> </td> 
</tr>
";


$t=$t+$total;


}




$net_profit=$profit_total1-$t;



print"
<tr bgcolor='white'>
 <td align='left' width='400' height='30'> <font face='arial' size='3'>&nbsp; <b> Total Expences </b>  </font> </td> 
 <td align='left' width='400'> <font face='arial' size='3'>&nbsp; <b> $t </b>  </font> </td> 
</tr>


<tr bgcolor='white'>
 <td align='left' width='400' height='30'> <font face='arial' size='3'>&nbsp; <b> Net Profit </b>  </font> </td> 
 <td align='left' width='400'> <font face='arial' size='3'>&nbsp; <b> $net_profit </b>  </font> </td> 
</tr>





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




//<input type='submit' value='Print'>

print"



</form>

 </td>


</tr>
</table>
";
























print"



</body>

</html>


";


?>