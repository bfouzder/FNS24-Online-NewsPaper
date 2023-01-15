
<?php

$result = mysql_query("SELECT * FROM `product_name`");	

while ($a_row = mysql_fetch_row($result)) {

	foreach ($a_row as $field) {
		
	}
$w++;
$p_id[$w]=$a_row[0];
$p_n[$w]=$a_row[2];
$p[$w]=$a_row[4];
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


//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


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
$pry[$w8]=$stock_q;

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

print"$pry[$w8] <br>";
}

exit;

?>






