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


if($product_id_new=="")
{
$product_id_new="nmn354362546";	
}


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


$bbb_n=time(); 

$d=date("m/d/y",$bbb_n); 

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



 <link rel="stylesheet" href="jquery-ui-themes-1.11.4/themes/smoothness/jquery-ui.css">
 <link rel="stylesheet" href="/resources/demos/style.css">
 
 
  <script src="jquery-1.10.2.js"></script>
  <script src="jquery-ui.js"></script>
  

<script type="text/javascript">

$(function() 
{
 $( "#tags" ).autocomplete({
  source: 'p.php'

 });
});

</script>





<?php


include_once('style.php');


print"


<style>

.list1 tr:hover{
background-color:pink;
}

</style>


</head>


<body>
";


include_once('address.php');


print"
<table align='center' width='' cellpadding='0' cellspacing='' height='' bgcolor=''>
<tr bgcolor='white'> 
";

//include_once('report_left.php');












print"
<td align='center' valign='top' width='1080'> 
<br>


<table align='center' width='1280' cellpadding='0' cellspacing='0' bgcolor=''>
<tr> <td align='center' height='40'> <font face='arial' size='4'> Product Stock Lists  </font> </td> </tr>
<tr> <td align='center' height='1' bgcolor=''> </td> </tr>
</table>


















<table align='center' width='1280' cellpadding='0' cellspacing='0' bgcolor=''>



<tr> 

<form action='sd_list.php' method='POST'>

<td align='center' height='40'> 
";














print"
<font face='arial' size='3'> Product: 
</font>


<label for='tags'> </label>
<input type='text' id='tags' name='product_id_new' value='$id' size='20'>

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
";

include_once('year.php');

print"
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
";

include_once('year1.php');

print"
</select>




<input type='hidden' name='ser' value='7'>

<input type='submit' value='Search'>

</td> 


</form>

</tr>


<tr> <td align='center' height='' bgcolor=''> </td> </tr>
</table>












<table align='center' width='680' cellpadding='5' cellspacing='1' bgcolor='black' class='list1'>

<tr bgcolor='F2F2F2'>


 
<td align='left' height='30' width='300'>  <font face='arial' size='3' color=''> &nbsp; Branch Name </font> </td> 

<td align='left' height='30' width='220'>  <font face='arial' size='3' color=''> &nbsp; Product Name </font> </td> 
";

/*
print"
<td align='left' height='30' width='100'>  <font face='arial' size='3' color=''> &nbsp; Quantity    </font> </td> 
";
*/


/*
<td align='center' height='30' width='180'>  <font face='arial' size='3' color=''> &nbsp; Price value    </font> </td> 
*/

/*
print"
<td align='left' height='30' width='100'>  <font face='arial' size='3' color=''> &nbsp; Total_Buying    </font> </td> 
";
*/



/*
<td align='left' height='30' width='100'>  <font face='arial' size='3' color=''>  Return_Quantity    </font> </td> 
<td align='left' height='30' width='100'>  <font face='arial' size='3' color=''>  Return_Amount    </font> </td> 
*/

/*
print"
<td align='left' height='30' width='100'>  <font face='arial' size='3' color=''> &nbsp; Previous_Sale   </font> </td> 
<td align='left' height='30' width='100'>  <font face='arial' size='3' color=''> &nbsp; Sale_Quantity   </font> </td> 
";
*/

/*
<td align='center' height='30' width='180'>  <font face='arial' size='3' color=''> Price value    </font> </td> 
*/


/*
print"
<td align='left' height='30' width='100'>  <font face='arial' size='3' color=''> &nbsp; Total_Sale    </font> </td> 
";
*/


print"
<td align='left' height='30' width='100'>  <font face='arial' size='3' color=''> &nbsp; Stock   </font> </td> 
";


/*
<td align='left' height='30' width='100'>  <font face='arial' size='3' color=''> &nbsp; Price   </font> </td> 

print"
<td align='left' height='30' width='100'>  <font face='arial' size='3' color=''> &nbsp; Stock Amount </font> </td> 
<td align='left' height='30' width='100'>  <font face='arial' size='3' color=''> &nbsp; Profit  </font> </td> 

*/

print"


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
$minimum_rate[$w]=$a_row[28];

$product_code[$w]=$a_row[3];


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



$result = mysql_query("SELECT * FROM `godawn_new`  ORDER BY `user_id` ASC ");



while ($a_row = mysql_fetch_row($result)) {

	foreach ($a_row as $field) {
		
	}
	
$gf1++;
$godawn_name[$gf1]=$a_row[1];
$godawn_id[$gf1]=$a_row[0];

}	


for($mf=1;$mf<=$gf1;$mf++)
{

$qs=0;

$tq_tr=0;
$q=0;
$q1=0;

$awqs=0;
$psingle=0;

$wqs_return=0;
$q_return=0;
$total_return=0;
$wqs_return1=0;
$profit_return=0;
$wqs_purchase_return=0;
$q_purchase_return=0;
$total_purchase_return=0;
$wqs=0;
$tq=0;
$tax=0;
$profit=0;
$total_price_sale=0;
$ew=0;
$stock_q=0;
$tfn=0;
$stock_qq=0;
$stock_pp=0;
$profit_total=0;



/*

for($i=1;$i<=$w;$i++)

{
	
$total_price_sale=0;
$q=0;
$q1=0;

$result = mysql_query("SELECT * FROM `saleproduct_transfer` where   product_id='$p_id[$i]' ORDER BY `adat` ");

 
//$result = mysql_query("SELECT * FROM `saleproduct` where adat<='$mdate'  && product_id='$p_id[$i]' ORDER BY `adat` ");


while ($a_row = mysql_fetch_row($result)) {

	foreach ($a_row as $field) {
		
	}


$tq_tr++;
if($a_row[36]==$supplier)
{
$q=$q+$a_row[6];
}


if($a_row[2]==$supplier)
{
$q1=$q1+$a_row[6];

}


}

$tfh++;


$tf1[$tfh]=$q;
$tf2[$tfh]=$q1;



}

*/


$tfh=0;







/*


if($mf==1)
{
include_once('connection1.php');
$supplier=$mf;
}


if($mf==2)
{
include_once('connection2.php');
$supplier=$mf;
}


if($mf==3)
{
include_once('connection3.php');
$supplier=$mf;
}


if($mf==4)
{
include_once('connection4.php');
$supplier=$mf;
}

if($mf==5)
{
include_once('connection5.php');
$supplier=$mf;
}



if($mf==6)
{
include_once('connection6.php');
$supplier=$mf;
}




*/











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














for($i=1;$i<=$w;$i++)
{	
$q_return=0;
$total_return=0;


$result = mysql_query("SELECT * FROM `saleproduct_return` where  adat<='$mdate' && product_id='$p_id[$i]' && branch_id='$godawn_id[$mf]'  ORDER BY `adat` ");

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

$result = mysql_query("SELECT * FROM `saleproduct_return` where adat>='$ndate' && adat<='$mdate' && product_id='$p_id[$i]' && branch_id='$godawn_id[$mf]' ORDER BY `adat` ");

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

$result = mysql_query("SELECT * FROM `buyproduct_return` where  adat<='$mdate' && product_id='$p_id[$i]' && branch_id='$godawn_id[$mf]' ORDER BY `adat` ");

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





























$q=0;

$total_price_sale=0;
$preo=0;



//print"$ndate";



for($i=1;$i<=$w;$i++)
{	
$total_price_sale=0;
$result = mysql_query("SELECT * FROM `saleproduct` where adat<'$ndate'   && product_id='$p_id[$i]' && branch_id='$godawn_id[$mf]' ORDER BY `adat` ");

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

$result = mysql_query("SELECT * FROM `saleproduct` where adat>='$ndate' && adat<='$mdate'  && product_id='$p_id[$i]' && branch_id='$godawn_id[$mf]' ORDER BY `adat` ");



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

$prrp[$qs]=$ptyy-$profit_return1[$qs];


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












$q=0;
$t=0;
$q1=0;




for($i=1;$i<=$w;$i++)

{

$total_price=0;

$result = mysql_query("SELECT * FROM `buyproduct` where  adat<='$mdate'  && product_id='$p_id[$i]' && branch_id='$godawn_id[$mf]' ");
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










//$ppp=$ppp+$stp_price[$ew];



$stock_q=$q-$q_sale[$ew];


$tfn=$tf1[$ew]-$tf2[$ew] ;


//print"$tfn - $stock_q - $q_sale[$ew]<br>";

$stock_q=$stock_q+$tfn;

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


if($stock_q<$minimum_rate[$ew])
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
<td align='left' height='30' width=''>  <font face='arial' size='3' color=''> &nbsp; $godawn_name[$mf]     $bbb_old   </font> </td> 

<td align='left' height='30' width=''>  <font face='arial' size='3' color=''> &nbsp; $p_n[$i]    $product_code[$i]   </font> </td> 
";

/*
print"
<td align='left' height='30' width=''>  <font face='arial' size='3' color=''> &nbsp; $q    </font> </td> 
";
*/

/*
<td align='center' height='30' width=''>  <font face='arial' size='3' color=''> $per_product_cross    </font> </td> 
*/

/*
print"
<td align='left' height='30' width=''>  <font face='arial' size='3' color=''> 
&nbsp;
$total_price  </font> </td> 
";

*/

 
$re_q=$re_q+$q_wsale_return[$ew];
$re_a=$re_a+$total_price_return[$ew];

/* 
print"
<td align='left' height=''>  <font face='arial' size='3' color=''> $q_wsale_return[$ew]     </font> </td> 
<td align='left' height=''>  <font face='arial' size='3' color=''>  $total_price_return[$ew]    </font> </td> 
";
*/


/*
 print"
<td align='left' height='30' width=''>  <font face='arial' size='3' color=''> &nbsp; $q_wsale[$ew]   </font> </td> 
<td align='left' height='30' width=''>  <font face='arial' size='3' color=''> &nbsp;
 $q_sale[$ew]   </font> </td> 

";
*/

/*
<td align='center' height='30' width='180'>  <font face='arial' size='3' color=''> $per_sale_product_cross    </font> </td> 
*/


$pnew_single = number_format($p_single[$ew], 3);
$pnew_single=str_replace(",","","$pnew_single");


$p_new = number_format($p_new, 3);
$p_new=str_replace(",","","$p_new");

$wq10=$wq10+$q_wsale[$ew];


/*
print"

<td align='left' height='30' width=''>  <font face='arial' size='3' color=''> &nbsp;
 $q_price[$ew]  </font> </td> 

";
*/



print"

<td align='left' height='30' width=''>  <font face='arial' size='3' color=''> &nbsp; $stock_q  </font> </td> 

";

/*
<td align='left' height='30' width=''>  <font face='arial' size='3' color=''> &nbsp;  $p_single_cross[$ew] $pnew_single    </font> </td> 

<td align='left' height='30' width=''>  <font face='arial' size='3' color=''> &nbsp;
  $p_new    </font> </td> 


<td align='left' height='30' width=''>  <font face='arial' size='3' color=''> &nbsp;  $prrp[$ew]  $profit_t_old  </font> </td> 
 */


print"
</tr>
";

$total_q=$total_q+$q;
$total_t=$total_t+$t;

$tpyy=$tpyy+$prrp[$ew];



$q=0;
$t=0;


$stock_qq_godawn=$stock_qq_godawn+$stock_q;

}



}





print"
<tr bgcolor='white'> 
<td align='left' height='30' width=''>  <font face='arial' size='3' color=''> &nbsp; Total   </font> </td> 
<td>  </td>
";
/*
print"
<td align='left' height='30' width=''>  <font face='arial' size='3' color=''> &nbsp; $total_q   </font> </td> 
";
*/


/*
<td align='center' height='30' width=''>  <font face='arial' size='3' color=''>     </font> </td> 
*/

/*
print"
<td align='left' height='30' width=''>  <font face='arial' size='3' color=''> &nbsp; $tp  </font> </td>
";
*/

/*
print"
<td align='left' height=''>  <font face='arial' size='3' color=''>   $re_q  </font> </td> 
<td align='left' height=''>  <font face='arial' size='3' color=''>  $re_a   </font> </td> 
";
*/


/*
print"
<td align='left' height='30' width=''>  <font face='arial' size='3' color=''> &nbsp; $wq10   </font> </td>
<td align='left' height='30' width=''>  <font face='arial' size='3' color=''> &nbsp; $q10 </font>
 </td> 
";
*/

/*
<td align='center' height='30' width=''>  <font face='arial' size='3' color=''>     </font> </td> 

*/
print"
";


/*
print"
<td align='left' height='30' width=''>  <font face='arial' size='3' color=''> &nbsp; $tp20    </font> </td> 
";
*/
	

print"
<td align='left' height='30' width=''>  <font face='arial' size='3' color=''> &nbsp;  $stock_qq_godawn </font> </td> 

";

/*
<td align='left' height='30' width=''>  <font face='arial' size='3' color=''> &nbsp; </font> </td> 

<td align='left' height='30' width=''>  <font face='arial' size='3' color=''> &nbsp; $stock_pp_cross  $pp_new </font> </td> 

<td align='left' height='30' width=''>  <font face='arial' size='3' color=''> &nbsp; $tpyy  $profit_total_old </font> </td> 
 */


print"

</tr>
";






print"
</table>
";











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