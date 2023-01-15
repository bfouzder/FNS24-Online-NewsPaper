<?php
error_reporting(0);
session_start();

include_once('dbconnection.php');




$m_tags=$_POST["tags"];

$_SESSION['pk_tags']="$m_tags";




$id_supplier=$_SESSION['pk_tags'];

$supplier_new=$_SESSION['pkk'];


$rty=0;
$rkk=0;


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





$rty=0;
$rkk=0;

$product_id_new=$idvalue_s;









$iy=0;

$result = mysql_query("SELECT * FROM `saleproduct` where supplier_id='$supplier_new' && product_id='$product_id_new' ORDER BY `user_id` DESC  LIMIT 0 , 2");


while ($a_row = mysql_fetch_row($result)) {

	foreach ($a_row as $field) {
		
	}
	$iy++;
	if($iy==1)
	{
$sale_p2=$a_row[7];
	}

	if($iy==2)
	{
$sale_p3=$a_row[7];
	}
		
	
	
}









$result = mysql_query("SELECT * FROM `product_name` where user_id='$product_id_new' ");	


while ($a_row = mysql_fetch_row($result)) {

	foreach ($a_row as $field) {
		
	}

$price_tags=$a_row[5];
$mrp_tags=$a_row[4];
$box_tags=$a_row[33];


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









if($product_id_new=="")
{
	
//for($i=1;$i<=$kr;$i++)

//{	
	
//$result = mysql_query("SELECT * FROM product_name where sub_category_id='$sub_id[$i]'");

$result = mysql_query("SELECT * FROM product_name where category='$product_group' && user_id>100000000 ORDER BY `user_id`");

//$result = mysql_query("SELECT * FROM `product_name`  ORDER BY `product_name`  ASC  LIMIT 0 , 100000");


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









$profit_total=$profit_total+$profit_t;




if($user_name=="superadmin")
{
print"Rate $price_tags   Stock : $stock_q   Cost : $mrp_tags P-Rate: ( $sale_p3 - $sale_p2 ) "; 
}
else
{
print"Rate $price_tags   Stock : $stock_q    P-Rate: ( $sale_p3 - $sale_p2 ) "; 
}




}










?>