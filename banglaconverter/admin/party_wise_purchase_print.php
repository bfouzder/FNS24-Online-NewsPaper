<?php
include_once('dbconnection.php');




$id=trim($_POST['product_id_new']);


$supplier=trim($_POST['supplier']);






$sql="SELECT * FROM `supplier` WHERE user_id='$supplier' ";
$result=mysql_query($sql);
$arrs=mysql_fetch_array($result);
$suppliern=$arrs[1];
$mobilen=$arrs[3];
$addressn=$arrs[5];












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
<title> Party wise purchase  </title>
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
<table align='center' width='1000' cellpadding='0' cellspacing='' height='' bgcolor=''>
<tr bgcolor='white'> 
";












print"
<td align='center' valign='top' width='980'> 


<br>


<table align='center' width='1000' cellpadding='0' cellspacing='0' bgcolor=''>
<tr> <td align='center' height='40'> <font face='arial' size='4'> Party Wise Purchase Product  </font> </td> </tr>
<tr> <td align='center' height='1' bgcolor='F9F4D8'> </td> </tr>
</table>


















<table align='center' width='1000' cellpadding='0' cellspacing='0' bgcolor=''>



<tr> 

<form action='party_wise_purchase.php' method='POST'>

<td align='center' height='40'> 
";

















print"
<font face='arial' size='4'> Supplier : 
</font>


<select name='supplier' id='sup'>
<option value='$supplier'> $suppliern </option>

<option value=''> All </option>


";



//$result = mysql_query("SELECT * FROM supplier");


$result = mysql_query("SELECT * FROM `supplier`  ORDER BY `customer_name` ASC ");


while ($a_row = mysql_fetch_row($result)) {

	foreach ($a_row as $field) {
		
	}

print"
<option value='$a_row[0]'>$a_row[1] - id -$a_row[0]</option>
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
";

include_once('year.php');

print"
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












<table align='center' width='1000' cellpadding='3' cellspacing='1' bgcolor='black'>

<tr bgcolor='F2F2F2'>


 
<td align='center' height='30' width='180'>  <font face='arial' size='4' color=''> Date </font> </td> 
 
";

if($supplier=="")
{

print"
<td align='left' height='30' width='180'>  <font face='arial' size='4' color=''> Supplier Name </font> </td> 
";
}

print"
<td align='left' height='30' width='180'>  <font face='arial' size='4' color=''> Product Name </font> </td> 

<td align='center' height='30' width='50'>  <font face='arial' size='4' color=''>  Qty   </font> </td> 

<td align='center' height='30' width='100'>  <font face='arial' size='4' color=''>  Price   </font> </td> 


<td align='center' height='30' width='100'>  <font face='arial' size='4' color=''>  Total    </font> </td> 



<td align='center' height='30' width='80'>  <font face='arial' size='4' color=''> Comission    </font> </td> 


<td align='center' height='30' width='100'>  <font face='arial' size='4' color=''> Total    </font> </td> 


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

if($supplier=="")
{
$result = mysql_query("SELECT * FROM `buyproduct` where adat>='$mdate' && adat<='$ndate'   && tf!='1'  ORDER BY `adat` ASC  LIMIT 0 , 6000000 ");
}
else
{
$result = mysql_query("SELECT * FROM `buyproduct` where adat>='$mdate' && adat<='$ndate' && supplier_id='$supplier'   && tf!='1'  ORDER BY `adat` ASC  LIMIT 0 , 6000000 ");
	
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



$new_net=$net/$a_row[6];

$new_nett=$new_nett+$net;


print"
<tr bgcolor='white'> 
";


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
<td align='left' height='30' width=''>  <font face='arial' size='4' color=''>  $a_row[5]  $a_row[26]  $a_row[25] </font> </td> 

<td align='center' height='30' width=''>  <font face='arial' size='4' color=''>  $a_row[6]   </font> </td> 

<td align='center' height='30' width=''>  <font face='arial' size='4' color=''>  $new_net   </font> </td> 


<td align='center' height='30' width=''>  <font face='arial' size='4' color=''>    $net  </font> </td> 




<td align='center' height='30' width=''>  <font face='arial' size='4' color=''> $a_row[25]    </font> </td> 


<td align='center' height='30' width=''>  <font face='arial' size='4' color=''> $a_row[8]    </font> </td> 



 
 
</tr>
";




}



print"
<tr bgcolor='white'> 

<td align='center' height='30' width=''>  <font face='arial' size='4' color=''>  </font> </td> 
";


if($supplier=="")
{
print"<td  bgcolor='white'>  </td>";	
}

print"

<td align='left' height='30' width=''>  <font face='arial' size='4' color=''> Total  </font> </td> 

<td align='center' height='30' width=''>  <font face='arial' size='4' color=''>  $qn   </font> </td> 


<td align='center' height='30' width=''>  <font face='arial' size='4' color=''>    </font> </td> 


<td align='center' height='30' width=''>  <font face='arial' size='4' color=''>  $tp  </font> </td> 





<td align='center' height='30' width=''>  <font face='arial' size='4' color=''> $com    </font> </td> 


<td align='center' height='30' width=''>  <font face='arial' size='4' color=''> $totall   </font> </td> 


</tr>

";


print"

</table>

<br>



<form action='part_wise_purchase_print.php' method='POST' target='a_blank'>

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