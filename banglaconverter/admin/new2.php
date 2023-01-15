<?php
include_once('dbconnection.php');


$id=trim($_POST['product_id_new']);


$product_group=trim($_POST['product_group']);



$sql="SELECT * FROM `product_category` WHERE user_id='$product_group'";
$result=mysql_query($sql);
$arrr=mysql_fetch_array($result);
$pron=$arrr[1];




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


//$product_id_new=1;
//$product_id_new=trim($_POST['tweet']);


$product_id_new=$_SESSION['pk'];


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






print"
<table align='center' width='' cellpadding='0' cellspacing='' height='' bgcolor=''>
<tr bgcolor='white'> 
";

//include_once('report_left.php');










print"
<td align='center' valign='top' width='1080'> 
<br>


<table align='center' width='1280' cellpadding='0' cellspacing='0' bgcolor=''>
<tr> <td align='center' height='40'> <font face='arial' size='4'> Product Stock View  </font> </td> </tr>
<tr> <td align='center' height='1' bgcolor=''> </td> </tr>
</table>


















<table align='center' width='1280' cellpadding='0' cellspacing='0' bgcolor=''>



<tr> 

<form action='sd.php' method='POST'>

<td align='center' height='40'> 
";















print"
<font face='arial' size='4'>  Product Group :
</font>
<select name='product_group'>

<option value='$product_group'> $pron </option>

";

$result = mysql_query("SELECT * FROM `product_category` where user_id!='0' ORDER BY `user_id` ASC  LIMIT 0 , 60000 ");

while ($a_row = mysql_fetch_row($result)) {

	foreach ($a_row as $field) {
		
	}


print"
<option value='$a_row[0]'> $a_row[1] </option>
";

}

print"

</select>

";













print"
&nbsp;

<font face='arial' size='4'> Product: 
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


<tr> <td align='center' height='1' bgcolor='F9F4D8'> </td> </tr>
</table>












<table align='center' width='1280' cellpadding='5' cellspacing='1' bgcolor='black'>

<tr bgcolor='F2F2F2'>

<td align='center' height='30' width='30'>  <font face='arial' size='2' color=''> <b> P_ID </font> </td> 
 
<td align='center' height='30' width='500'>  <font face='arial' size='2' color=''> <b> Product Name </font> </td> 
<td align='center' height='30' width='100'>  <font face='arial' size='2' color=''> <b> Purchase Qty.   </font> </td> 
";

/*
<td align='center' height='30' width='180'>  <font face='arial' size='2' color=''> <b> Price Value    </font> </td> 
*/


print"
<td align='center' height='30' width='100'>  <font face='arial' size='2' color=''> <b> Total Purchase    </font> </td> 
";


/*
<td align='left' height='30' width='100'>  <font face='arial' size='2' color=''> <b> Return_Quantity    </font> </td> 
<td align='left' height='30' width='100'>  <font face='arial' size='2' color=''> <b> Return_Amount    </font> </td> 
*/


print"
<td align='center' height='30' width='100'>  <font face='arial' size='2' color=''> <b> Previous Sale   </font> </td> 
<td align='center' height='30' width='100'>  <font face='arial' size='2' color=''> <b> Sale Qty.   </font> </td> 
";
/*
<td align='center' height='30' width='180'>  <font face='arial' size='2' color=''> <b> Price Value    </font> </td> 
*/



print"
<td align='center' height='30' width='100'>  <font face='arial' size='2' color=''> <b> Total Sale    </font> </td> 
<td align='center' height='30' width='100'>  <font face='arial' size='2' color=''> <b> Stock   </font> </td> 


<td align='center' height='30' width='100'>  <font face='arial' size='2' color=''> <b> Buy Value   </font> </td> 
<td align='center' height='30' width='100'>  <font face='arial' size='2' color=''> <b> Stock Amount </font> </td>

<td align='center' height='30' width='100'>  <font face='arial' size='2' color=''> <b> Sale Value   </font> </td> 

<td align='center' height='30' width='100'>  <font face='arial' size='2' color=''> <b> Sale Amount   </font> </td> 

 
<td align='center' height='30' width='100'>  <font face='arial' size='2' color=''> <b> Profit  </font> </td> 




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

$result = mysql_query("SELECT * FROM product_name where category='$product_group' ORDER BY `user_id`");

//$result = mysql_query("SELECT * FROM `product_name`  ORDER BY `product_name` ASC  LIMIT 0 , 100000");


while ($a_row = mysql_fetch_row($result)) {

	foreach ($a_row as $field) {
		
	}

$w++;
$p_id[$w]=$a_row[0];
$p_n[$w]=$a_row[2];
$p[$w]=$a_row[4];
$minimum_rate[$w]=$a_row[28];
$sa_value[$w]=$a_row[5];

$sz[$w]=$a_row[31];




$brand[$w]=$a_row[30];

$code[$w]=$a_row[3];
$size[$w]=$a_row[31];
$origion[$w]=$a_row[32];





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
$sa_value[$w]=$a_row[5];
$sz[$w]=$a_row[31];
$brand[$w]=$a_row[30];

$code[$w]=$a_row[3];
$size[$w]=$a_row[31];
$origion[$w]=$a_row[32];


}


}






$supplier=$b_code;



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


$tfh=0;




















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


$result = mysql_query("SELECT * FROM `saleproduct_return` where  adat<='$mdate' && product_id='$p_id[$i]' ORDER BY `adat` ");

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

$result = mysql_query("SELECT * FROM `saleproduct_return` where adat>='$ndate' && adat<='$mdate' && product_id='$p_id[$i]' ORDER BY `adat` ");

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

$result = mysql_query("SELECT * FROM `buyproduct_return` where  adat<='$mdate' && product_id='$p_id[$i]' ORDER BY `adat` ");

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
$result = mysql_query("SELECT * FROM `saleproduct` where adat<'$ndate'   && product_id='$p_id[$i]' ORDER BY `adat` ");

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
$total_dis=0;

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

$total_dis=$total_dis+$a_row[25];


}


$tp20=$tp20+$total_price_sale;
$t=$ppp*$q;
$qs++;
$q_sale[$qs]=$q;
$q_price[$qs]=$total_price_sale;



$q_dis=$total_price_sale;


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
$q=0;
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


$ew++;
$total_price=$total_price;
$total_price=$total_price;
$total_price=$total_price-$total_price_purchase_return[$ew];

$total_price=$total_price+$total_price_return[$ew];





//$q=$q+$q_wsale_return[$ew];

$tfn=$tf1[$ew]-$tf2[$ew];



$q=$q-$q_wsale_purchase_return[$ew];
$q=$q+$q_wsale_return[$ew];

$q=$q+$tfn;




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

if($stock_q>=0 || $stock_q<=0)

{

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


<td> $p_id[$i] </td>
<td align='left' height='30' width=''>  <font face='arial' size='2' color=''>   $p_n[$i] - $code[$i] - $size[$i] - $brand[$i] -  $origion[$i] $bbb_old   </font> </td> 

<td align='center' height='30' width=''>  <font face='arial' size='2' color=''>  $q    </font> </td> 
";
/*
<td align='center' height='30' width=''>  <font face='arial' size='2' color=''> $per_product_cross    </font> </td> 
*/
print"
<td align='right' height='30' width=''>  <font face='arial' size='2' color=''> 

$total_price  </font> </td> 
";

 
$re_q=$re_q+$q_wsale_return[$ew];
$re_a=$re_a+$total_price_return[$ew];

/* 
print"
<td align='left' height=''>  <font face='arial' size='2' color=''> $q_wsale_return[$ew]     </font> </td> 
<td align='left' height=''>  <font face='arial' size='2' color=''>  $total_price_return[$ew]    </font> </td> 
";
*/



 print"
<td align='Center' height='30' width=''>  <font face='arial' size='2' color=''> $q_wsale[$ew]   </font> </td> 
<td align='Center' height='30' width=''>  <font face='arial' size='2' color=''>
 $q_sale[$ew]   </font> </td> 

";

/*
<td align='center' height='30' width='180'>  <font face='arial' size='2' color=''> $per_sale_product_cross    </font> </td> 
*/


$pnew_single = number_format($p_single[$ew], 3);
$pnew_single=str_replace(",","","$pnew_single");


$p_new = number_format($p_new, 4);
$p_new=str_replace(",","","$p_new");

$wq10=$wq10+$q_wsale[$ew];


print"

<td align='Right' height='30' width=''>  <font face='arial' size='2' color=''> 
 $q_price[$ew]  </font> </td> 




<td align='Center' height='30' width=''>  <font face='arial' size='2' color=''>  $stock_q  </font> </td> 

";

$xc=$sa_value[$ew]*$stock_q;


$total_sa_value=$total_sa_value+$xc;

print"
<td align='right' height='30' width=''>  <font face='arial' size='2' color=''>   $p_single_cross[$ew] $pnew_single    </font> </td> 
";





print"
<td align='right' height='30' width=''>  <font face='arial' size='2' color=''> 
  $p_new    </font> </td> 


<td align='Right' height='30' width=''>  <font face='arial' size='2' color=''>  $sa_value[$ew]   </font> </td> 

<td align='right' height='30' width=''>  <font face='arial' size='2' color=''>  $xc   </font> </td> 


<td align='Right' height='30' width=''>  <font face='arial' size='2' color=''>   $prrp[$ew]  $profit_t_old  </font> </td> 
 
</tr>
";

$total_q=$total_q+$q;
$total_t=$total_t+$t;

$tpyy=$tpyy+$prrp[$ew];



$q=0;
$t=0;






}




}





print"
<tr bgcolor='white'> 

<td>  </td>
<td align='center' height='30' width=''>  <font face='arial' size='2' color=''> Total   </font> </td> 

<td align='center' height='30' width=''>  <font face='arial' size='2' color=''> $total_q   </font> </td> 
";

/*
<td align='center' height='30' width=''>  <font face='arial' size='2' color=''>     </font> </td> 
*/

print"
<td align='right' height='30' width=''>  <font face='arial' size='2' color=''> $tp  </font> </td>
";


/*
print"
<td align='left' height=''>  <font face='arial' size='2' color=''>   $re_q  </font> </td> 
<td align='left' height=''>  <font face='arial' size='2' color=''>  $re_a   </font> </td> 
";
*/



print"
<td align='center' height='30' width=''>  <font face='arial' size='2' color=''>  $wq10   </font> </td>
<td align='center' height='30' width=''>  <font face='arial' size='2' color=''>  $q10 </font>
 </td> 
";
/*
<td align='center' height='30' width=''>  <font face='arial' size='2' color=''>     </font> </td> 

*/
print"
";


$pp_new = number_format($pp_new, 4);


print"

<td align='right' height='30' width=''>  <font face='arial' size='2' color=''>  $tp20    </font> </td> 

<td align='center' height='30' width=''>  <font face='arial' size='2' color=''>   $stock_qq  </font> </td> 

<td align='center' height='30' width=''>  <font face='arial' size='2' color=''> </font> </td> 


<td align='right' height='30' width=''>  <font face='arial' size='2' color=''>  $stock_pp_cross  $pp_new </font> </td> 




<td align='left' height='30' width=''>  <font face='arial' size='2' color=''>     </font> </td> 


<td align='right' height='30' width=''>  <font face='arial' size='2' color=''>  $total_sa_value    </font> </td> 

<td align='right' height='30' width=''>  <font face='arial' size='2' color=''>  $tpyy  $profit_total_old </font> </td> 
 

</tr>
";









print"

</table>
";




$sal=0;


$result = mysql_query("SELECT * FROM `costing_entry` where  adat>='$ndate' && adat<='$mdate' && sub_id='26' ORDER BY `user_id` ASC  LIMIT 0 , 60000");



while ($a_row = mysql_fetch_row($result)) {

	foreach ($a_row as $field) {
		
	}

$sal=$sal+$a_row[5];




}










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







//print"Sales man comission: $sal <br> ";

//print"Sales comission: $less2 <br>";

//print"Discount comission: $less3 <br>";

//print" Total comission: $less <br>";


//print"$less + $sal = $less10 <br>";


$less=$less10;
//$less=$less1+$less2;


$profit_total1=$tpyy-$less;









//print"
//<br>


//Total Product's profit : $tpyy 

//";

/*
<br>

Total comission: $less




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




";


?>