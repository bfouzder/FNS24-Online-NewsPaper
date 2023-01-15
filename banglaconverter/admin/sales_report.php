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


$mdate_final="$yer1$mon1";

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

$mdate_final="$yer1$mon1";

$ndate="$yer2$mon2$dat2";




}





$ar='"';




print"

<html>

<head>
<title> Sales Report </title>
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


/*

$cr=0;
$de=0;
$cv=0;

$result = mysql_query("SELECT * FROM `supplier_laser`  where adat<='$mdate' && ck='1'  ORDER BY `user_id` ASC  LIMIT 0 , 100000");


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

$result = mysql_query("SELECT * FROM `supplier_laser`  where adat<='$mdate'&& commission!='' ORDER BY `user_id` ASC  LIMIT 0 , 100000");


while ($a_row = mysql_fetch_row($result)) {

	foreach ($a_row as $field) {
		
	}

$de_c=$de_c+$a_row[13];

}



$p_commission=$de_c+$dvc;

*/


print"
<td align='center' valign='top' width='1000'> 


<br>


<table align='center' width='1000' cellpadding='0' cellspacing='0' bgcolor=''>
<tr> <td align='center' height='40'> <font face='arial' size='5'> <b> Daily Sales Report Summary  </b>  </font> </td> </tr>
<tr> <td align='center' height='1' bgcolor=''> </td> </tr>
</table>


















<table align='center' width='1000' cellpadding='0' cellspacing='0' bgcolor=''>



<tr> 

<form action='sales_report.php' method='POST'>

<td align='center' height='10'> 
";















print"








<font face='arial' size='5'> <b> Date :  </b>  </font>




";

/*

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
";
*/


print"
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
/*

$result = mysql_query("SELECT * FROM product_sub_category");

while ($a_row = mysql_fetch_row($result)) {

	foreach ($a_row as $field) {
		
	}
	$kr++;
	$sub_id[$kr]=$a_row[0];
	
}

*/





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





print"
<br>
<br>
<table align='center' width='1200' cellpadding='2' cellspacing='1' bgcolor='black'>

<tr bgcolor='F2F2F2'>
 <td align='left' width='200' height='30'> <font face='arial' size='5'> &nbsp; Date </font> </td> 
 <td align='center' width='200'> <font face='arial' size='5'>  Sales </font> </td>
 <td align='center' width='200'> <font face='arial' size='5'>  Discount </font> </td>
 <td align='center' width='200'> <font face='arial' size='5'>  Sales Return </font> </td> 

 <td align='center' width='200'> <font face='arial' size='5'>  Cash Sales  </font> </td> 

 <td align='center' width='300'> <font face='arial' size='5'>  Net Sales </font> </td> 
 
</tr>
";



$vac="01";

$mdate_final="$mdate_final$vac";


$mdate2=$mdate;

for($iz=$mdate_final;$iz<=$mdate2;$iz++)
{


$ndate=$iz;
$mdate=$iz;

$tp20=0;
$sales_return=0;
$net_sales=0;

$q=0;

$total_price_sale=0;
$preo=0;



//print"$mdate";















	
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











$q=0;

$total_price_sale=0;
$preo=0;



//print"$ndate";

/*


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

*/
























$q=0;

$total_price_sale=0;
$preo=0;


//for($i=1;$i<=$w;$i++)

//{
	
$total_price_sale=0;

$zfff=1;

$result = mysql_query("SELECT * FROM `saleproduct` where adat>='$ndate' && adat<='$mdate'     && tf!='$zfff' ORDER BY `adat` ");



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



$cash1=0;


$result = mysql_query("SELECT * FROM `salememo` where adat>='$ndate' && adat<='$mdate'   && tf!='1' ");


while ($a_row = mysql_fetch_row($result)) {

	foreach ($a_row as $field) {
		
	}

$cash1=$cash1+$a_row[7];

}

$cash_sales=$cash1;
$cash_sales_f=$cash_sales_f+$cash1;


$cash_sales=str_replace(",","","$cash_sales");




$total_money=0;
$total_less=0;
$total_joma=0;
$total_due=0;
$tyuu=0;






$result = mysql_query("SELECT * FROM `salememo_return` where adat>='$ndate' && adat<='$mdate'   && tf!='1'  ");


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




$tot= number_format($tot, 2);
$tot=str_replace(",","","$tot");



$tp20= number_format($tp20, 2);
$tp20=str_replace(",","","$tp20");




$sales_return= number_format($sales_return, 2);
$sales_return=str_replace(",","","$sales_return");
/*
print"
<tr bgcolor='white'>
 <td align='left' width='400' height='30'> <font face='arial' size='5'>&nbsp;  Sales Return  </font> </td> 
 <td align='right' width='400'> <font face='arial' size='5'> $sales_return  </font> </td> 
</tr>
";
*/


$net_sales=$net_sales-$less;

$net_sales= number_format($net_sales, 2);
$net_sales=str_replace(",","","$net_sales");

$less= number_format($less, 2);
$less=str_replace(",","","$less");


$tp20_f=$tp20_f+$tp20;
$less_f=$less_f+$less;
$sales_return_f=$sales_return_f+$sales_return;
$net_sales_f=$net_sales_f+$net_sales;





$zmn="$iz";

$vcc++;
$sales_net[$vcc]=$net_sales;


print"
<tr bgcolor='white'>
 <td align='left' width='' height='30'> <font face='arial' size='5'>&nbsp;  $zmn[0]$zmn[1]$zmn[2]$zmn[3]-$zmn[4]$zmn[5]-$zmn[6]$zmn[7]    </font> </td> 
 
 <td align='right' width=''> <font face='arial' size='5'>   $tp20   </font> </td> 

  <td align='right' width=''> <font face='arial' size='5'>   $less   </font> </td> 

  
 <td align='right' width=''> <font face='arial' size='5'>   $sales_return   </font> </td>
 

 <td align='right' width=''> <font face='arial' size='5'>   $cash_sales   </font> </td>


 <td align='right' width=''> <font face='arial' size='5'>   $net_sales   </font> </td> 

 </tr>
";












}






$tp20_f= number_format($tp20_f, 2);
$tp20_f=str_replace(",","","$tp20_f");

$less_f= number_format($less_f, 2);
$less_f=str_replace(",","","$less_f");

$sales_return_f= number_format($sales_return_f, 2);
$sales_return_f=str_replace(",","","$sales_return_f");

$net_sales_f= number_format($net_sales_f, 2);
$net_sales_f=str_replace(",","","$net_sales_f");




$cash_sales_f= number_format($cash_sales_f, 2);
$cash_sales_f=str_replace(",","","$cash_sales_f");













print"
<tr bgcolor='#F2F2F2'>
 <td align='left' width='' height='30'> <font face='arial' size='5'>&nbsp; Total    </font> </td> 
 
 <td align='right' width=''> <font face='arial' size='5'>   $tp20_f   </font> </td> 

  <td align='right' width=''> <font face='arial' size='5'>   $less_f   </font> </td> 

  
 <td align='right' width=''> <font face='arial' size='5'>   $sales_return_f   </font> </td> 


 <td align='right' width=''> <font face='arial' size='5'>   $cash_sales_f   </font> </td> 


 <td align='right' width=''> <font face='arial' size='5'>   $net_sales_f   </font> </td> 

 </tr>


</table>
";






print"
 </td>
</tr>
</table>
";








print"
</table>
<br>
<br>

";






print"

<table align='center' width='400' cellpadding='2' cellspacing='0'>
<tr> <td align='center' bgcolor='#F2F2F2'> <font size='5' face='arial'> Sales Graph </font> </td> </tr>
</table>

<table align='center' width='1000' cellpadding='2' cellspacing='0'>
";



for($i=1;$i<=$vcc;$i++)
{
	
	
	
$im=$sales_net[$i]/5000;	

$im= number_format($im, 2);
$im=str_replace(",","","$im");

	
print"
<tr>
<td width='50' align='center'> $i </td>
<td align='left' width='950'>
 <img src='graph.gif' height='10' width='$im'>($sales_net[$i])
</td>
</tr>
";
}


print"
</table>

";













print"
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