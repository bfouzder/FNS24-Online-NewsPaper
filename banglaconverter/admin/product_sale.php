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
<title> Daily product sale </title>
";
?>





 <link rel="stylesheet" href="jquery-ui-themes-1.11.4/themes/smoothness/jquery-ui.css">
 <link rel="stylesheet" href="/resources/demos/style.css">
  
  <script src="jquery-1.10.2.js"></script>
  <script src="jquery-ui.js"></script>
  
  <script>
  $(function() {
    var availableTags = [


<?php
	

	
$result = mysql_query("SELECT * FROM `product_name`  ORDER BY `user_id` ASC  LIMIT 0 , 100000");

while ($a_row = mysql_fetch_row($result)) {

	foreach ($a_row as $field) {
		
	}
	
	$cq='"';	

$cq = mb_ereg_replace("$cq","*", $a_row[2]);
$cq10='"';
$cq10 = mb_ereg_replace("$cq10","*", $a_row[3]);
$cqz='"';
$a_row[31]= mb_ereg_replace("$cqz","*", $a_row[31]);
$a_row[30]= mb_ereg_replace("$cqz","*", $a_row[30]);




print"
${ar}$cq -  $cq10 - $a_row[31] - $a_row[30]=$a_row[0]$ar, 
";

//print" ${ar}$a_row[2]=$a_row[0]$ar, ";
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
<tr> <td align='center' height='40'> <font face='arial' size='2'> Product Sales View  </font> </td> </tr>
<tr> <td align='center' height='1' bgcolor='F9F4D8'> </td> </tr>
</table>














<table align='center' width='1000' cellpadding='0' cellspacing='0' bgcolor='F3F3F3'>



<tr> 

<form action='product_sale.php' method='POST'>

<td align='center' height='40'> 



<font face='arial' size='2'> Product: 
</font>


<label for='tags'> </label>
<input type='text' id='tags' name='product_id_new' size='20'>




&nbsp;



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

&nbsp;&nbsp;&nbsp; <font face='arial' size='2'>To </font>&nbsp;&nbsp;&nbsp;


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


<tr> <td align='center' height='1' bgcolor='F9F4D8'> </td> </tr>
</table>












<table align='center' width='800' cellpadding='0' cellspacing='1' bgcolor='black'>

<tr bgcolor='F677F2'>


 
<td align='left' height='30' width='200'>  <font face='arial' size='2' color=''> &nbsp; Product Name </font> </td> 


<td align='left' height='30' width='180'>  <font face='arial' size='2' color=''> &nbsp; Quantity    </font> </td> 









</tr>
";













//$result = mysql_query("SELECT * FROM buymemo");


//$result = mysql_query("SELECT * FROM product_name");


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
$p[$w]=$a_row[5];

$product_code[$w]=$a_row[3];

$capacity[$w]=$a_row[31];
$brand[$w]=$a_row[31];



}


$q=0;


for($i=1;$i<=$w;$i++)

{

$result = mysql_query("SELECT * FROM `saleproduct` where adat>='$mdate' && adat<='$ndate' && product_id='$p_id[$i]' && tf!='1' ");


while ($a_row = mysql_fetch_row($result)) {

	foreach ($a_row as $field) {
		
	}


$q=$q+$a_row[6];


$tax=$tax+$a_row[15];

$profit=$profit+$a_row[16];

$ppp=$a_row[7];

$mtt=$a_row[17];
$ptt=$a_row[19];

}


if($q!=0)
{

$t=$ppp*$q;

print"
<tr bgcolor='white'> 
<td align='left' height='30' width='100'>  <font face='arial' size='2' color=''> &nbsp;  $p_n[$i] $capacity[$i] $brand[$i]  $ptt_old </font> </td> 

<td align='left' height='30' width='180'>  <font face='arial' size='2' color=''> &nbsp;  $q  </font> </td> 


</tr>

";


$tax1=$tax1+$tax;
$t1=$t1+$t;
$profit1=$profit1+$profit;
$q11=$q11+$q;


$q=0;
$t=0;

$tax=0;
$profit=0;

}


}


/*
print"
<tr bgcolor='white'> 
<td align='center' height='30' width='100'>  <font face='arial' size='2' color=''> $a_row[5] </font> </td> 
<td align='center' height='30' width='180'>  <font face='arial' size='2' color=''> $a_row[7]  </font> </td> 
<td align='center' height='30' width='180'>  <font face='arial' size='2' color=''> $a_row[6]  </font> </td> 
<td align='center' height='30' width='180'>  <font face='arial' size='2' color=''> $a_row[8]  </font> </td> 
</tr>

";

*/



print"
<tr bgcolor='F2F2F2'> 
<td align='left' height='30' width='100'>  <font face='arial' size='2' color=''> &nbsp; Total   </font> </td> 



<td align='left' height='30' width='180'>  <font face='arial' size='2' color=''> &nbsp; $q11  </font> </td> 






</tr>

";




$ttt=$t1+$tax1;


print"

</table>
<br>
<br>
";
















print"

<table align='center' width='400' cellpadding='0' cellspacing='1' bgcolor='black'>

<tr bgcolor='white'> <td align='center' height='40'> <font face='arial' size='4'> Purchase Return </font> </td> </tr>
</table>

<br>

";



print"

<table align='center' width='800' cellpadding='0' cellspacing='1' bgcolor='black'>
<tr bgcolor='F677F2'>
<td align='left' height='30' width='100'>  <font face='arial' size='2' color=''> &nbsp; Product Name </font> </td> 
<td align='left' height='30' width='180'>  <font face='arial' size='2' color=''> &nbsp; Quantity    </font> </td> 
</tr>
";








$q=0;


for($i=1;$i<=$w;$i++)

{

$result = mysql_query("SELECT * FROM `buyproduct_return` where adat>='$mdate' && adat<='$ndate' && product_id='$p_id[$i]' && tf!='1' ");


while ($a_row = mysql_fetch_row($result)) {

	foreach ($a_row as $field) {
		
	}


$q=$q+$a_row[6];

$aaa=$a_row[14];
$bbb=$a_row[16];
$ppp=$a_row[7];

}


if($q!=0)
{
$t=$ppp*$q;

print"
<tr bgcolor='white'> 
<td align='left' height='30' width='200'>  <font face='arial' size='2' color=''> &nbsp; $p_n[$i]  $capacity[$i] $brand[$i]  </font> </td> 


<td align='left' height='30' width='180'>  <font face='arial' size='2' color=''> &nbsp; $q  </font> </td> 
 
</tr>
";

$total_q1=$total_q1+$q;
$total_t1=$total_t1+$t;


$q=0;
$t=0;



}


}



print"
<tr bgcolor='white'> 
<td align='left' height='30' width='200'>  <font face='arial' size='2' color=''>  &nbsp; Total  </font> </td> 

<td align='left' height='30' width='180'>  <font face='arial' size='2' color=''> &nbsp; $total_q1 </font> </td> 
</tr>
";


print"

</table>

";




if($g_1==1)
	
	{

$result = mysql_query("SELECT * FROM `godawn`  ORDER BY `user_id` ASC ");

while ($a_row = mysql_fetch_row($result)) {

	foreach ($a_row as $field) {
		
	}
	
$gff++;

if($gff<=$branch_control)
{
$gf1++;
$godawn_name[$gf1]=$a_row[1];
$godawn_id[$gf1]=$a_row[0];
}

}	





for($mf=1;$mf<=$gf1;$mf++)
{
	
$q=0;
$total_q2=0;
	


print"
<br>
<table align='center' width='400' cellpadding='0' cellspacing='1' bgcolor='black'>
<tr bgcolor='white'> <td align='center' height='40'> <font face='arial' size='4'> Transfer To $godawn_name[$mf] </font> </td> </tr>
</table>
<br>
";



print"

<table align='center' width='800' cellpadding='0' cellspacing='1' bgcolor='black'>
<tr bgcolor='F677F2'>
<td align='left' height='30' width='100'>  <font face='arial' size='2' color=''> &nbsp; Product Name </font> </td> 
<td align='left' height='30' width='180'>  <font face='arial' size='2' color=''> &nbsp; Quantity    </font> </td> 
</tr>
";





$total_q2=0;
$total_t1=0;


$tf2=$b_code;

$q=0;


for($i=1;$i<=$w;$i++)

{
$q=0;

$result = mysql_query("SELECT * FROM `saleproduct_transfer` where adat>='$mdate' && adat<='$ndate' && supplier_id='$tf2' && transfer2='$mf' && product_id='$p_id[$i]' ");


while ($a_row = mysql_fetch_row($result)) {

	foreach ($a_row as $field) {
		
	}


$q=$q+$a_row[6];
$aaa=$a_row[14];
$bbb=$a_row[16];
$ppp=$a_row[7];

}


if($q!=0)
{
$t=$ppp*$q;

print"
<tr bgcolor='white'> 
<td align='left' height='30' width='200'>  <font face='arial' size='2' color=''> &nbsp; $p_n[$i]  - Code $product_code[$i]  </font> </td> 


<td align='left' height='30' width='180'>  <font face='arial' size='2' color=''> &nbsp; $q  </font> </td> 
 
</tr>
";

$total_q2=$total_q2+$q;
$total_t1=$total_t1+$t;



$tm=$tm+$total_q2;
$q=0;
$t=0;



}




}



print"
<tr bgcolor='white'> 
<td align='left' height='30' width='200'>  <font face='arial' size='2' color=''>  &nbsp; Total  </font> </td> 

<td align='left' height='30' width='180'>  <font face='arial' size='2' color=''> &nbsp; $total_q2  </font> </td> 
</tr>
";


print"

</table>
";



}



	}

//print"$total_q1 - $total_q - $tm";

$total_final=$q11+$tm+$total_q1+$total_q;

print"

<br>
<table align='center' width='800' cellpadding='0' cellspacing='1' bgcolor='black'>

";



print"
<tr bgcolor='white'> 
<td align='left' height='30' width='200'>  <font face='arial' size='2' color=''>  &nbsp; All Total  </font> </td> 

<td align='left' height='30' width='180'>  <font face='arial' size='2' color=''> &nbsp; $total_final </font> </td> 
</tr>
";


print"

</table>
";
















print"




<br>











<form action='product_sale_print.php' method='POST' target='a_blank'>

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



<input type='submit' value='Print' id='enter'>

</form>

 </td>


</tr>
</table>




</body>

</html>


";


?>