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
<title> Product Stock </title>
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


include_once('header.php');


print"
<table align='center' width='1200' cellpadding='0' cellspacing='1' height='800' bgcolor='gray'>
<tr bgcolor='white'> 
";

include_once('report_left.php');












print"
<td align='center' valign='top' width='980'> 


<br>


<table align='center' width='1000' cellpadding='0' cellspacing='0' bgcolor='F7D3F2'>
<tr> <td align='center' height='40'> <font face='arial' size='2'> Product Store View  </font> </td> </tr>
<tr> <td align='center' height='1' bgcolor='F9F4D8'> </td> </tr>
</table>


















<table align='center' width='1000' cellpadding='0' cellspacing='0' bgcolor='F3F3F3'>



<tr> 

<form action='stock_report.php' method='POST'>

<td align='center' height='40'> 
";















print"
<font face='arial' size='2'> Product: 
</font>


<label for='tags'> </label>
<input type='text' id='tags' name='product_id_new' size='20'>
















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












<table align='center' width='900' cellpadding='5' cellspacing='1' bgcolor='black'>

<tr bgcolor='F677F2'>


 
<td align='center' height='30' width='100'>  <font face='arial' size='2' color=''> Product Name </font> </td> 
<td align='center' height='30' width='180'>  <font face='arial' size='2' color=''> Quantity    </font> </td> 

<td align='center' height='30' width='180'>  <font face='arial' size='2' color=''> Price value    </font> </td> 

<td align='center' height='30' width='180'>  <font face='arial' size='2' color=''> Total    </font> </td> 



<td align='center' height='30' width='180'>  <font face='arial' size='2' color=''> Sale_Quantity   </font> </td> 


<td align='center' height='30' width='180'>  <font face='arial' size='2' color=''> Price value    </font> </td> 


<td align='center' height='30' width='180'>  <font face='arial' size='2' color=''> Total    </font> </td> 

<td align='center' height='30' width='180'>  <font face='arial' size='2' color=''> Stock   </font> </td> 





<td align='center' height='30' width='180'>  <font face='arial' size='2' color=''> Stock Money </font> </td> 


<td align='center' height='30' width='180'>  <font face='arial' size='2' color=''> Profit  </font> </td> 




</tr>
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


for($i=1;$i<=$w;$i++)

{
	
$total_price_sale=0;


/*
$result = mysql_query("SELECT * FROM `saleproduct` where adat>='$ndate' && adat<='$mdate'  && product_id='$p_id[$i]' ORDER BY `adat` ");
*/


$result = mysql_query("SELECT * FROM `saleproduct` where  adat<='$mdate'  && product_id='$p_id[$i]' ORDER BY `adat` ");

while ($a_row = mysql_fetch_row($result)) {

	foreach ($a_row as $field) {
		
	}


$q=$q+$a_row[6];

$tax=$tax+$a_row[15];

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





$per_product=$total_price/$q;

//$per_product = number_format($per_product, 3);
//$per_product=str_replace(",","","$per_product");




$per_sale_product= $q_price[$ew]/$q_sale[$ew];

//$per_sale_product = number_format($per_sale_product, 3);
//$per_sale_product=str_replace(",","","$per_sale_product");



$prot=$per_sale_product-$per_product;


$profit_t=$q_sale[$ew]*$prot;




//$profit_t = number_format($profit_t, 3);
//$profit_t=str_replace(",","","$profit_t");




$profit_total=$profit_total+$profit_t;


print"
<tr bgcolor='white'> 
<td align='left' height='30' width='600'>  <font face='arial' size='2' color=''>  $p_n[$i]  - $bbb   </font> </td> 


<td align='center' height='30' width='180'>  <font face='arial' size='2' color=''> $q    </font> </td> 

<td align='center' height='30' width='180'>  <font face='arial' size='2' color=''> $per_product_cross    </font> </td> 

<td align='center' height='30' width='180'>  <font face='arial' size='2' color=''> 


 $total_price  </font> </td> 


<td align='center' height='30' width='180'>  <font face='arial' size='2' color=''>
 $q_sale[$ew]   </font> </td> 


<td align='center' height='30' width='180'>  <font face='arial' size='2' color=''> $per_sale_product_cross    </font> </td> 



<td align='center' height='30' width='180'>  <font face='arial' size='2' color=''>
 $q_price[$ew]  </font> </td> 




<td align='center' height='30' width='180'>  <font face='arial' size='2' color=''> $stock_q  </font> </td> 

<td align='center' height='30' width='180'>  <font face='arial' size='2' color=''> $stock_p_cross </font> </td> 


<td align='center' height='30' width='180'>  <font face='arial' size='2' color=''> $profit_t_cross </font> </td> 
 

 
</tr>
";

$total_q=$total_q+$q;
$total_t=$total_t+$t;


$q=0;
$t=0;






}








print"
<tr bgcolor='white'> 
<td align='center' height='30' width='200'>  <font face='arial' size='2' color=''>    </font> </td> 

<td align='center' height='30' width='180'>  <font face='arial' size='2' color=''> $total_q   </font> </td> 

<td align='center' height='30' width='180'>  <font face='arial' size='2' color=''>     </font> </td> 


<td align='center' height='30' width='180'>  <font face='arial' size='2' color=''> $tp  </font> </td>
 
<td align='center' height='30' width='180'>  <font face='arial' size='2' color=''> $q10 </font>
 </td> 


<td align='center' height='30' width='180'>  <font face='arial' size='2' color=''>     </font> </td> 


<td align='center' height='30' width='180'>  <font face='arial' size='2' color=''> $tp20  </font> </td> 
<td align='center' height='30' width='180'>  <font face='arial' size='2' color=''> $stock_qq </font> </td> 


<td align='center' height='30' width='180'>  <font face='arial' size='2' color=''> $stock_pp_cross </font> </td> 

<td align='center' height='30' width='180'>  <font face='arial' size='2' color=''> $profit_total_cross </font> </td> 
 

</tr>
";









print"

</table>
";







//$mdate



	
$less=0;
if($supplier=="")
{
$result = mysql_query("SELECT * FROM `customer_laser` where  adat>=$ndate &&  adat<='$mdate'   ");
}

//else
//{
//$result = mysql_query("SELECT * FROM `customer_laser` where bank_name='$supplier' && adat>='$mdate' && adat<='$ndate'  //");	
//}

while ($a_row = mysql_fetch_row($result)) {

	foreach ($a_row as $field) {
		
	}


	
	$less1=$less1+$a_row[13];

	$less2=$less2+$a_row[14];


	
}


/*

$less=$less2;


$less=$less1+$less2;



$profit_total1=$profit_total-$less;









print"
<br>


Total Product's profit : $profit_total 

<br>

Total comission: $less


<br>

$profit_total-$less
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
<input type='submit' value='Print'>



</form>

 </td>


</tr>
</table>
";










$h=0;
$r=0;
$total=0;
$hh=0;



/////////////////////////////////////////////////////////////////////



$t=0;

$result = mysql_query("SELECT * FROM expendature_head");

while ($a_row = mysql_fetch_row($result)) {

	foreach ($a_row as $field) {
		
	}

$h++;
$head_name[$h]=$a_row[1];
$head_id[$h]=$a_row[0];

}


$total=0;

if($cost_name=="")
{



for($i=1;$i<=$h;$i++)
{

$total=0;




$result = mysql_query("SELECT * FROM `costing_entry` where expenduter_name='$head_id[$i]' && adat>='$ndate' && adat<='$mdate' && sub_id!='41' && sub_id!='40' && sub_id!='30' && sub_id!='34' && sub_id!='35' && sub_id!='48'  ORDER BY `user_id` ASC  LIMIT 0 , 6000");



while ($a_row = mysql_fetch_row($result)) {

	foreach ($a_row as $field) {
		
	}

$r++;



$total=$total+$a_row[5];


}




 $head_name[$i];
  $total; 



$t=$t+$total;


}


  $t;


}





//$result = mysql_query("SELECT * FROM expenduter_sub");



$result = mysql_query("SELECT * FROM `expendature_sub` where  category='$cost_name'  ORDER BY `user_id` ASC  LIMIT 0 , 6000");

while ($a_row = mysql_fetch_row($result)) {

	foreach ($a_row as $field) {
		
	}

$hh++;
$sub_name[$hh]=$a_row[2];
$sub_id[$hh]=$a_row[0];

}







if($cost_name!="")
{



$t=0;


for($j=1;$j<=$hh;$j++)
{


$total=0;

$result = mysql_query("SELECT * FROM `costing_entry` where  expenduter_name='$cost_name' && sub_id='$sub_id[$j]' &&  adat>='$ndate' &&  adat<='$mdate'   ORDER BY `user_id` ASC  LIMIT 0 , 6000");



while ($a_row = mysql_fetch_row($result)) {

	foreach ($a_row as $field) {
		
	}

$r++;



$total=$total+$a_row[5];

}


  $j; 
  $sub_name[$j];  
  $total;

$t=$t+$total;

}


  
   $t;




}





if($mdate<=20160131)
{
$t=$t-1150+60;
}

$final_profit=$profit_total1-$t;




/*


print"  <h1>   $profit_total1 - $t  </h1>";




print"  <h1>  Net profit: $final_profit  </h1>";




*/















print"



</body>

</html>


";


?>