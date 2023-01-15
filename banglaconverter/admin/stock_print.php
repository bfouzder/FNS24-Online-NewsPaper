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


include_once('address.php');


print"
<table align='center' width='1200' cellpadding='0' cellspacing='1' height='800' bgcolor='gray'>
<tr bgcolor='white'> 
";

//include_once('report_left.php');












print"
<td align='center' valign='top' width='1200'> 


<br>


<table align='center' width='1200' cellpadding='0' cellspacing='0' bgcolor='F7D3F2'>
<tr> <td align='center' height='40'> <font face='arial' size='2'> Product Store View of $dat1 - $mon1 - $yer1  </font> </td> </tr>
<tr> <td align='center' height='1' bgcolor='F9F4D8'> </td> </tr>
</table>








<table align='center' width='1200' cellpadding='5' cellspacing='1' bgcolor='black'>

<tr bgcolor='F677F2'>


 
<td align='center' height='30' width='100'>  <font face='arial' size='2' color=''> Product Name </font> </td> 
<td align='center' height='30' width='180'>  <font face='arial' size='2' color=''> Quantity    </font> </td> 

<td align='center' height='30' width='180'>  <font face='arial' size='2' color=''> Total    </font> </td> 



<td align='center' height='30' width='180'>  <font face='arial' size='2' color=''> Sale_Quantity   </font> </td> 


<td align='center' height='30' width='180'>  <font face='arial' size='2' color=''> Total    </font> </td> 



<td align='center' height='30' width='180'>  <font face='arial' size='2' color=''> Stock   </font> </td> 





<td align='center' height='30' width='180'>  <font face='arial' size='2' color=''> Stock Money </font> </td> 




</tr>
";










$q=0;

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

$result = mysql_query("SELECT * FROM `saleproduct` where adat<='$mdate'  && product_id='$p_id[$i]' ");


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

$result = mysql_query("SELECT * FROM `buyproduct` where adat<='$mdate'  && product_id='$p_id[$i]' ");


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






print"
<tr bgcolor='white'> 
<td align='left' height='30' width='600'>  <font face='arial' size='2' color=''>  $p_n[$i]  - $bbb   </font> </td> 


<td align='center' height='30' width='180'>  <font face='arial' size='2' color=''> $q  </font> </td> 

<td align='center' height='30' width='180'>  <font face='arial' size='2' color=''> 


 $total_price  </font> </td> 


<td align='center' height='30' width='180'>  <font face='arial' size='2' color=''>
 $q_sale[$ew]  </font> </td> 

<td align='center' height='30' width='180'>  <font face='arial' size='2' color=''>
 $q_price[$ew]  </font> </td> 


<td align='center' height='30' width='180'>  <font face='arial' size='2' color=''> $stock_q  </font> </td> 

<td align='center' height='30' width='180'>  <font face='arial' size='2' color=''> $stock_p </font> </td> 
 
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

<td align='center' height='30' width='180'>  <font face='arial' size='2' color=''> $total_q  </font> </td> 

<td align='center' height='30' width='180'>  <font face='arial' size='2' color=''> $tp  </font> </td> 
<td align='center' height='30' width='180'>  <font face='arial' size='2' color=''> $q10 </font> </td> 

<td align='center' height='30' width='180'>  <font face='arial' size='2' color=''> $tp20  </font> </td> 
<td align='center' height='30' width='180'>  <font face='arial' size='2' color=''> $stock_qq </font> </td> 


<td align='center' height='30' width='180'>  <font face='arial' size='2' color=''> $stock_pp </font> </td> 


</tr>
";


print"

</table>

<br>



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





</form>

 </td>


</tr>
</table>




</body>

</html>


";


?>