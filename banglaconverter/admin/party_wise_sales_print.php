<?php
include_once('dbconnection.php');

$go_g=trim($_POST['go_g']);


$sql="SELECT * FROM `godawn_new` WHERE user_id='$go_g' ";
$result=mysql_query($sql);
$arrug=mysql_fetch_array($result);
$go_gn=$arrug[1];






if($go_g=="")
{
$go_gn="All";
}



$id=trim($_POST['product_id_new']);
$supplier=trim($_POST['supplier']);


$sql="SELECT * FROM `customer` WHERE user_id='$supplier' ";
$result=mysql_query($sql);
$arrs=mysql_fetch_array($result);
$suppliern=$arrs[7];

$mobiles=$arrs[3];
$addresss=$arrs[5];


$ch=trim($_POST['ch']);


if($ch==1)
{
$che="CHECKED";
}


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









$mdate="$yer1$mon1$dat1";

$ndate="$yer2$mon2$dat2";






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
<title> Party Wise Sales </title>
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


include_once('address.php');


print"
<table align='center' width='' cellpadding='0' cellspacing='0' height='' bgcolor=''>
<tr bgcolor='white'> 
";

//include_once('report_left.php');












print"
<td align='center' valign='top' width='1000'> 


<br>


<table align='center' width='1000' cellpadding='0' cellspacing='0' bgcolor=''>
<tr> <td align='center' height='40'> <font face='arial' size='4'> Party Wise Product Sales  - B ( $go_gn )   </font> </td> </tr>
<tr> <td align='center' height='1' bgcolor=''> </td> </tr>
</table>


















<table align='center' width='1000' cellpadding='0' cellspacing='0' bgcolor=''>



<tr> 

<form action='party_wise_sales.php' method='POST'>

<td align='center' height='40'> 
";

















print"

With Profit : 

<input type='checkbox' value='1' name='ch' $che> &nbsp;

<font face='arial' size='4'> Customer: 
</font>




";



print"
<select name='supplier' id='new_sup'>
<option value='$supplier'> $suppliern </option>
";


//$result = mysql_query("SELECT * FROM `customer`  ORDER BY `user_id` ASC  LIMIT 0 , 60000 ");

$result = mysql_query("SELECT * FROM `customer`  ORDER BY `company_name` ASC ");



while ($a_row = mysql_fetch_row($result)) {

	foreach ($a_row as $field) {
		
	}
print"
	<option value='$a_row[0]'> $a_row[7] - ID - $a_row[2] - Address - $a_row[5] </option>
";

}

print"
</select>








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

&nbsp;&nbsp;&nbsp; <font face='arial' size='4'>To </font>&nbsp;&nbsp;&nbsp;


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


<tr> <td align='center' height='1' bgcolor=''> </td> </tr>
</table>












<table align='center' width='1500' cellpadding='3' cellspacing='1' bgcolor='black'>

<tr bgcolor='F2F2F2'>


 
<td align='center' height='30' width='180'>  <font face='arial' size='4' color=''> Date </font> </td> 
 
";

if($supplier=="")
{
print"
<td align='left' height='30' width='180'>  <font face='arial' size='4' color=''> Customer Name </font> </td> 
";	
}

print"
<td align='center' height='30' width='180'>  <font face='arial' size='4' color=''> Product Name </font> </td> 

<td align='center' height='30' width='50'>  <font face='arial' size='4' color=''>  Qty   </font> </td> 

<td align='center' height='30' width='50'>  <font face='arial' size='4' color=''>  Unit_Price   </font> </td> 


<td align='center' height='30' width='100'>  <font face='arial' size='4' color=''>  Total    </font> </td> 

<td align='center' height='30' width='80'>  <font face='arial' size='4' color=''> Commission    </font> </td> 



<td align='center' height='30' width='100'>  <font face='arial' size='4' color=''> Total    </font> </td> 
";

if($ch==1)
{
print"
<td align='center' height='30' width='80'>  <font face='arial' size='4' color=''> Buy value    </font> </td> 
<td align='center' height='30' width='80'>  <font face='arial' size='4' color=''> Sale value    </font> </td> 
<td align='center' height='30' width='80'>  <font face='arial' size='4' color=''> Profit   </font> </td> 
";
}


print"
</tr>
";








/*
$result = mysql_query("SELECT * FROM `news` where categories='$w3' && add2='$v' ORDER BY `user_id` DESC  LIMIT 0 , 6 ");

*/


//$result = mysql_query("SELECT * FROM buymemo");

/*
if($product_id_new=="")
{
$result = mysql_query("SELECT * FROM product_name");
}
else
{
$result = mysql_query("SELECT * FROM `product_name` where user_id='$product_id_new' ");	
}
while ($a_row = mysql_fetch_row($result)) {

	foreach ($a_row as $field) {
		
	}

$w++;
$p_id[$w]=$a_row[0];
$p_n[$w]=$a_row[2];
$p[$w]=$a_row[4];


}



*/





$q=0;




if($go_g=="")
{
if($supplier=="")
{
	$result = mysql_query("SELECT * FROM `saleproduct` where adat>='$mdate' && adat<='$ndate'   && tf!='1'  ORDER BY `adat` ASC  LIMIT 0 , 600000 ");

}
else
{
$result = mysql_query("SELECT * FROM `saleproduct` where adat>='$mdate' && adat<='$ndate' && supplier_id='$supplier'   && tf!='1' ORDER BY `adat` ASC  LIMIT 0 , 600000 ");

}

}

else
{
if($supplier=="")
{
	$result = mysql_query("SELECT * FROM `saleproduct` where adat>='$mdate' && adat<='$ndate' && branch_id='$go_g'   && tf!='1'  ORDER BY `adat` ASC  LIMIT 0 , 600000 ");

}
else
{
$result = mysql_query("SELECT * FROM `saleproduct` where adat>='$mdate' && adat<='$ndate' && supplier_id='$supplier'  && branch_id='$go_g'  && tf!='1' ORDER BY `adat` ASC  LIMIT 0 , 600000 ");

}
}



while ($a_row = mysql_fetch_row($result)) {

	foreach ($a_row as $field) {
		
	}


$net=$a_row[8]+$a_row[25];

$qn=$qn+$a_row[6];
$com=$com+$a_row[25];
$tcom=$tcom+$a_row[7];
$tp=$tp+$net;

$t1=$a_row[6]*$a_row[7];

$totall=$totall+$a_row[8];


print"
<tr bgcolor='white'> 
";


//$cm=$a_row[25]/$a_row[6];
//$per=$a_row[7]-$cm;

$aui=$a_row[8]/$a_row[6];

$aui = number_format($aui, 3);
$aui=str_replace(",","","$aui");


$buy = number_format($a_row[14], 3);
$buy=str_replace(",","","$buy");




$pro=$aui-$a_row[14];
$pro=$pro*$a_row[6];

$pro = number_format($pro, 3);
$pro=str_replace(",","","$pro");



//$per_sale_product = number_format($per_sale_product, 3);
//$per_sale_product=str_replace(",","","$per_sale_product");



$per_b=$per_b+$buy;
$per_b=str_replace(",","","$per_b");


$pert=$pert+$per;
$per_p=$per_p+$pro;

$per_p=str_replace(",","","$per_p");




print"

<td align='center' height='30' width=''>  <font face='arial' size='4' color=''> $a_row[9]-$a_row[10]-$a_row[11] <br> $a_row[1] </font> </td> 
";

if($supplier=="")
{

print"
<td align='left' height='30' width=''>  <font face='arial' size='4' color=''>  $a_row[3] </font> </td> 
";

}

print"	

<td align='left' height='30' width=''>  <font face='arial' size='4' color=''>  $a_row[5]  $a_row[38] $a_row[37] </font> </td> 

<td align='center' height='30' width=''>  <font face='arial' size='4' color=''>  $a_row[6]   </font> </td> 

<td align='center' height='30' width=''>  <font face='arial' size='4' color=''>  $a_row[7]   </font> </td> 


<td align='center' height='30' width=''>  <font face='arial' size='4' color=''>    $net  </font> </td> 

<td align='center' height='30' width=''>  <font face='arial' size='4' color=''> $a_row[25]    </font> </td> 


<td align='center' height='30' width=''>  <font face='arial' size='4' color=''> $a_row[8]    </font> </td> 
";


if($ch==1)
{
print"

<td align='center' height='30' width=''>  <font face='arial' size='4' color=''>  $buy    </font> </td> 

<td align='center' height='30' width=''>  <font face='arial' size='4' color=''> $per $aui    </font> </td> 

 
<td align='center' height='30' width=''>  <font face='arial' size='4' color=''>  $pro   </font> </td> 
";
}

print"
</tr>
";




}



print"
<tr bgcolor='white'> 

<td align='center' height='30' width=''>  <font face='arial' size='4' color=''>  </font> </td> 
";


if($supplier=="")
{

print"
<td> </td>
";
}

print" 

<td align='center' height='30' width=''>  <font face='arial' size='4' color=''> Total  </font> </td> 

<td align='center' height='30' width=''>  <font face='arial' size='4' color=''>  $qn   </font> </td> 

<td> </td>
<td align='center' height='30' width=''>  <font face='arial' size='4' color=''>  $tp  </font> </td> 

<td align='center' height='30' width=''>  <font face='arial' size='4' color=''> $com    </font> </td> 


<td align='center' height='30' width=''>  <font face='arial' size='4' color=''> $totall   </font> </td> 

";

if($ch==1)
{
print"

<td align='center' height='30' width=''>  <font face='arial' size='4' color=''>  $per_b_old  </font> </td> 

<td align='center' height='30' width=''>  <font face='arial' size='4' color=''>  $pert    </font> </td> 

 
<td align='center' height='30' width=''>  <font face='arial' size='4' color=''>  $per_p   </font> </td> 
";
}



print"

</tr>

";










$dr=0;
$cr=0;


$cr=0;

$balance=0;


if($supplier=="")
{
$result = mysql_query("SELECT * FROM `customer_laser` where   adat>='$mdate' && adat<='$ndate'   && tf!='1'  ORDER BY `adat`  ASC ");
	
}
else
{
$result = mysql_query("SELECT * FROM `customer_laser` where  bank_name='$supplier' && adat>='$mdate' && adat<='$ndate'   && tf!='1' ORDER BY `adat`  ASC ");
}

while ($a_row = mysql_fetch_row($result)) {

	foreach ($a_row as $field) {
		
	}






if($a_row[15]==1)
{


if($a_row[12]!="" || $a_row[13]!="" || $a_row[14]!="")
{
	

$final_com=$a_row[14];
$final_com_sum=$final_com_sum+$final_com;


}
else
{
	
}





}

else
{

if($a_row[12]!="" || $a_row[13]!="")
{
	

$t55=$a_row[3]-$a_row[12];	
$t5=$t55+$a_row[13];


$ft5=$ft5+$t5;
$fcom=$fcom+$a_row[13];
$ft55=$ft55+$t55;
$fship=$fship+$a_row[12];



$t5_final=$t5+$a_row[14];
$final_com=$a_row[13]+$a_row[14];
$t55_final=$t5_final-$final_com;




$t5_final_sum=$t5_final_sum+$t5_final;
$final_com_sum=$final_com_sum+$final_com;
$t55_final_sum=$t55_final_sum+$t55_final;


$t5_final_u= number_format($t5_final, 2);
$final_com_u= number_format($final_com, 2);

$t55_final_u= number_format($t55_final, 2);
$ar12= number_format($a_row[12], 2);



}
else
{
	
}




}








$ar3= number_format($a_row[3], 2);




if($a_row[2]==2)
{

$dr=$dr+$a_row[3];

}


if($a_row[2]==1)
{
$cr=$cr+$a_row[3];

}




}











$final_com_sum=$final_com_sum-$com;
$net=$per_p-$final_com_sum;



print"

</table>










<br>
";


if($ch==1)
{
print"

<table align='center' width='600' cellpadding='10' cellspacing='1' bgcolor='black'>



<tr bgcolor='white'> 
 <td align='left'> <font face='arial' size='4'> Product Wise Profit </font>  </td> 
 <td align='left'> <font face='arial' size='4'>  Discount / Commission </font> </td>
 <td align='left'> <font face='arial' size='4'> Net Profit </font> </td>
</tr>


<tr bgcolor='white'> 
 <td align='left'> <font face='arial' size='4'> $per_p </font>  </td> 
 <td align='left'> <font face='arial' size='4'>   $final_com_sum  </font> </td>
 <td align='left'> <font face='arial' size='4'> $net </font> </td>
</tr>








</table>
<br>
<br>
";
}















print"
<table align='center' width='300' cellpadding='0' cellspacing='1'  bgcolor='black'>
<tr bgcolor='white'> <td align='center' height='40'> <font face='arial' size='4'> Product Returns </font>  </td> </tr>
</table>
<br>
<br>

";





$to2=$totall;

print"

<table align='center' width='1500' cellpadding='3' cellspacing='1' bgcolor='black'>

<tr bgcolor='F2F2F2'>


 
<td align='center' height='30' width='180'>  <font face='arial' size='4' color=''> Date </font> </td> 
 ";
 
 if($supplier=="")
{
	
 print"

<td align='left' height='30' width='180'>  <font face='arial' size='4' color=''> Customer Name </font> </td> 
";	
	
}
 
 
 print"

<td align='left' height='30' width='180'>  <font face='arial' size='4' color=''> Product Name </font> </td> 

<td align='center' height='30' width='50'>  <font face='arial' size='4' color=''>  Qty   </font> </td> 

<td align='center' height='30' width='50'>  <font face='arial' size='4' color=''>  Unit _Price  </font> </td> 


<td align='center' height='30' width='100'>  <font face='arial' size='4' color=''>  Total    </font> </td> 

<td align='center' height='30' width='80'>  <font face='arial' size='4' color=''> Commission    </font> </td> 



<td align='center' height='30' width='100'>  <font face='arial' size='4' color=''> Total    </font> </td> 
";



print"
</tr>
";








/*
$result = mysql_query("SELECT * FROM `news` where categories='$w3' && add2='$v' ORDER BY `user_id` DESC  LIMIT 0 , 6 ");

*/


//$result = mysql_query("SELECT * FROM buymemo");

/*
if($product_id_new=="")
{
$result = mysql_query("SELECT * FROM product_name");
}
else
{
$result = mysql_query("SELECT * FROM `product_name` where user_id='$product_id_new' ");	
}
while ($a_row = mysql_fetch_row($result)) {

	foreach ($a_row as $field) {
		
	}

$w++;
$p_id[$w]=$a_row[0];
$p_n[$w]=$a_row[2];
$p[$w]=$a_row[4];


}



*/

$per_p=0;
$pert=0;
$per_b=0;
$totall=0;
$totall=0;
$com=0;
$tp=0;
$qn=0;



$q=0;



$q=0;


if($go_g=="")
{

if($supplier=="")
{
	$result = mysql_query("SELECT * FROM `saleproduct_return` where adat>='$mdate' && adat<='$ndate'  ORDER BY `adat` ASC  LIMIT 0 , 600000 ");

}
else
{
$result = mysql_query("SELECT * FROM `saleproduct_return` where adat>='$mdate' && adat<='$ndate' && supplier_id='$supplier' ORDER BY `adat` ASC  LIMIT 0 , 600000 ");

}

}
else
{

if($supplier=="")
{
	$result = mysql_query("SELECT * FROM `saleproduct_return` where adat>='$mdate' && adat<='$ndate' && branch_id='$go_g'  ORDER BY `adat` ASC  LIMIT 0 , 600000 ");

}
else
{
$result = mysql_query("SELECT * FROM `saleproduct_return` where adat>='$mdate' && adat<='$ndate' && supplier_id='$supplier' && branch_id='$go_g' ORDER BY `adat` ASC  LIMIT 0 , 600000 ");

}
}



while ($a_row = mysql_fetch_row($result)) {

	foreach ($a_row as $field) {
		
	}


$net=$a_row[8]+$a_row[25];

$qn=$qn+$a_row[6];
$com=$com+$a_row[25];
$tcom=$tcom+$a_row[7];
$tp=$tp+$net;

$t1=$a_row[6]*$a_row[7];

$totall=$totall+$a_row[8];


print"
<tr bgcolor='white'> 
";


//$cm=$a_row[25]/$a_row[6];
//$per=$a_row[7]-$cm;

$aui=$a_row[8]/$a_row[6];

$aui = number_format($aui, 3);
$aui=str_replace(",","","$aui");


$buy = number_format($a_row[14], 3);
$buy=str_replace(",","","$buy");




$pro=$aui-$a_row[14];
$pro=$pro*$a_row[6];

$pro = number_format($pro, 3);
$pro=str_replace(",","","$pro");



//$per_sale_product = number_format($per_sale_product, 3);
//$per_sale_product=str_replace(",","","$per_sale_product");



$per_b=$per_b+$buy;
$per_b=str_replace(",","","$per_b");


$pert=$pert+$per;
$per_p=$per_p+$pro;

$per_p=str_replace(",","","$per_p");




print"

<td align='center' height='30' width=''>  <font face='arial' size='4' color=''> $a_row[9]-$a_row[10]-$a_row[11] <br> $a_row[1] </font> </td> 
 ";
 
 
  if($supplier=="")
{	
print"
<td align='left' height='30' width=''>  <font face='arial' size='4' color=''>  $a_row[3]   </font> </td> 
";	
}
 
 print"

<td align='left' height='30' width=''>  <font face='arial' size='4' color=''>  $a_row[5]  $a_row[34] </font> </td> 

<td align='center' height='30' width=''>  <font face='arial' size='4' color=''>  $a_row[6]   </font> </td> 

<td align='center' height='30' width=''>  <font face='arial' size='4' color=''>  $a_row[7]   </font> </td> 


<td align='center' height='30' width=''>  <font face='arial' size='4' color=''>    $net  </font> </td> 

<td align='center' height='30' width=''>  <font face='arial' size='4' color=''> $a_row[25]    </font> </td> 


<td align='center' height='30' width=''>  <font face='arial' size='4' color=''> $a_row[8]    </font> </td> 
";


print"
</tr>
";




}



print"
<tr bgcolor='white'> 

<td align='center' height='30' width=''>  <font face='arial' size='4' color=''>  </font> </td> 
";

  if($supplier=="")
{
print"<td> </td>";
}


print"
<td align='center' height='30' width=''>  <font face='arial' size='4' color=''> Total  </font> </td> 

<td align='center' height='30' width=''>  <font face='arial' size='4' color=''>  $qn   </font> </td> 

<td>  </td>

<td align='center' height='30' width=''>  <font face='arial' size='4' color=''>  $tp  </font> </td> 

<td align='center' height='30' width=''>  <font face='arial' size='4' color=''> $com    </font> </td> 


<td align='center' height='30' width=''>  <font face='arial' size='4' color=''> $totall   </font> </td> 

";



print"

</tr>
</table>
<br>
<br>
";








$to3=$to2-$totall;

print"
<table align='center' width='300' cellpadding='0' cellspacing='1'  bgcolor='black'>
<tr bgcolor='white'> <td align='center' height='40'> <font face='arial' size='4'> Net Sales : $to2 - $totall = $to3 </font>  </td> </tr>
</table>
<br>
<br>

";



























print"
<br>
<br>
<br>

";


include_once('sign.php');

print"


<form action='party_wise_sales_print.php.php' method='POST' target='_blank'>

&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type='hidden' name='dat1' value='$dat1'>
<input type='hidden' name='mon1' value='$mon1'>
<input type='hidden' name='yer1' value='$yer1'>


<input type='hidden' name='ser' value='1'>

<input type='hidden' name='ch' value='$ch'>


<input type='hidden' name='dat2' value='$dat2'>
<input type='hidden' name='mon2' value='$mon2'>
<input type='hidden' name='yer2' value='$yer2'>

<input type='hidden' name='product_id_new' value='$product_id_new'>




</form>

 </td>


</tr>
</table>




</body>

</html>


";


?>