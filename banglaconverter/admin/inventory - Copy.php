<?php
include_once('dbconnection.php');

$ser=trim($_POST['ser']);
$s=trim($_POST['s']);







print"
<html>

<head>
<title> Inventory - Product - Stock - Reports </title>
";


include_once('style.php');


print"
</head>


<body>
";


//include_once('header.php');


print"
<table align='center' width='1200' cellpadding='0' cellspacing='1' height='800' bgcolor='gray'>
<tr bgcolor='white'> 
";

//include_once('report_left.php');












print"
<td align='center' valign='top' width='980'> 
";

include_once('address.php');

print"

<br>


<table align='center' width='1000' cellpadding='0' cellspacing='1' bgcolor='F9F4D8'>

<tr> 
<td width='1000' height='320' bgcolor='ECE9D8' valign='top'> 

<table align='center' width='1300' cellpadding='0' cellspacing='0' bgcolor='F7D3F2'>
<tr> <td align='center' height='40'> <font face='arial' size='2'> Product Stock Reports  </font> </td> </tr>
<tr> <td align='center' height='1' bgcolor='F9F4D8'> </td> </tr>
</table>



<table align='center' width='1300' cellpadding='0' cellspacing='1'>

<tr bgcolor='F677F2'>


<td width='40' align='center'>               <font face='arial' size='2'> Code </font> </td> 
<td align='center' height='30' width='450'>  <font face='arial' size='2' color=''> Categories Name</font> </td> 
<td align='center' height='30' width='150'>  <font face='arial' size='2' color=''> Product name</font> </td> 

<td width='200' align='center'>              <font face='arial' size='2'> Buying Price</font> </td>
<td width='250' align='center'>              <font face='arial' size='2'> Selling Price</font> </td>

<td width='100' align='center'>              <font face='arial' size='2'> Comments </font> </td>

<td width='100' align='center'>              <font face='arial' size='2'> Total_Pro </font> </td>
<td width='100' align='center'>              <font face='arial' size='2'> Sale_Pro </font> </td>
";



//<td width='100' align='center'>              <font face='arial' size='2'> Return_Pro </font> </td>



print"
<td width='100' align='center'>              <font face='arial' size='2'>  Stock </font> </td>
<td width='100' align='center'>              <font face='arial' size='2'>  Stock Money </font> </td>




</tr>
";




$result = mysql_query("SELECT * FROM product_category");

while ($a_row = mysql_fetch_row($result)) {

	foreach ($a_row as $field) {
		
	}

$l++;
$pi[$l]=$a_row[0];
$pnn[$l]=$a_row[1];

}






$result = mysql_query("SELECT * FROM product_name");

while ($a_row = mysql_fetch_row($result)) {

	foreach ($a_row as $field) {
		
	}

$m++;

for($i=1;$i<=$l;$i++)
{

if($a_row[1]==$pi[$i])

{
$k++;
$pn[$k]=$pnn[$i];
}

}



}









/*

$result = mysql_query("SELECT * FROM measurement");

while ($a_row = mysql_fetch_row($result)) {

	foreach ($a_row as $field) {
		
	}

$ml++;

$mpi[$ml]=$a_row[0];
$mpnn[$ml]=$a_row[1];

}





$result = mysql_query("SELECT * FROM product_type");

while ($a_row = mysql_fetch_row($result)) {

	foreach ($a_row as $field) {
		
	}

$pl++;

$ppi[$pl]=$a_row[0];
$ppnn[$pl]=$a_row[1];

}




*/





$result = mysql_query("SELECT * FROM product_name");

while ($a_row = mysql_fetch_row($result)) {

	foreach ($a_row as $field) {
		
	}

$m++;



for($i=1;$i<=$ml;$i++)
{

if($a_row[14]==$mpi[$i])

{
$mk++;
$mpn[$mk]=$mpnn[$i];
}


}





for($i=1;$i<=$pl;$i++)
{

if($a_row[15]==$ppi[$i])

{
$pk++;
$ppn[$pk]=$ppnn[$i];
}


}






}


























//$result = mysql_query("SELECT * FROM productname");


for($i=1;$i<=$l;$i++)


{

$count="";
$sc="";


$result = mysql_query("SELECT * FROM product_name where category='$pi[$i]' ");
$count = mysql_num_rows($result);


$result = mysql_query("SELECT * FROM `product_name`  where category='$pi[$i]'  ORDER BY `user_id` ASC  LIMIT 0 , 10000");



while ($a_row = mysql_fetch_row($result)) {

	foreach ($a_row as $field) {
		
	}


$badd=$a_row[12]+$a_row[13];

$stockk=$a_row[11]-$badd;

$sc=$sc+$stockk;

}

print"
<tr bgcolor='white'> 
<td> </td><td align='center' id='bangla'>$pnn[$i] - $count - Stock- $sc </td>
</tr>
";




$result = mysql_query("SELECT * FROM `product_name`  where category='$pi[$i]'  ORDER BY `user_id` ASC  LIMIT 0 , 10000");



while ($a_row = mysql_fetch_row($result)) {

	foreach ($a_row as $field) {
		
	}



  $p++;



$bad=$a_row[12]+$a_row[13];

$stock=$a_row[11]-$bad;

$sto=$a_row[4]*$stock;

$seo=$a_row[5]*$stock;

print"
<tr bgcolor='white'> 

<td width='40' align='center'>               <font face='arial' size='2'> $a_row[0] </font> </td> 
<td align='center' height='30' width='150'>  <font face='arial' size='2' color=''> </font> </td> 

<td width='300' align='center'>              <font face='solaimanlipi' size='2'> $a_row[2] - $pnn[$i]</font> </td>


<td width='100' align='center'>              <font face='arial' size='2'> $a_row[4]  </font> </td>
<td width='250' align='center'>              <font face='arial' size='2'> $a_row[5] </font> </td>

<td width='100' align='center'>              <font face='arial' size='2'> $a_row[6]   </font> </td>
<td width='100' align='center'>              <font face='arial' size='2'> $a_row[11] </font> </td>

<td width='100' align='center'>              <font face='arial' size='2'> $a_row[12]</font> </td>
";

//<td width='100' align='center'>              <font face='arial' size='2'> $a_row[13]</font> </td>

print"
<td width='100' align='center'>              <font face='arial' size='2'> $stock </font> </td>


<td width='100' align='center'>              <font face='arial' size='2'> $sto </font> </td>







</tr>

";

$stto=$stto+$sto;
$seto=$seto+$seo;
}


}

print"

</table>

<br>

<font face='arial' size='2'> &nbsp;
&nbsp;&nbsp;&nbsp;
Total Products : $p <br>
&nbsp; &nbsp; Stock Buying Money: $stto tk/= <br>

<br><br>




 </td>


</tr>
</table>
";

//////////////////////////////////////////////////


















































print"



</body>

</html>


";


?>