<?php
include_once('dbconnection.php');





$id=trim($_POST['product_id_new']);

$product_id_new=$id;






$sql="SELECT * FROM `customer` WHERE user_id='$product_id_new' ";
$result=mysql_query($sql);
$arrs1=mysql_fetch_array($result);



$name=$arrs1[1];





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
<title> Stock Out </title>
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
	

	
$result = mysql_query("SELECT * FROM `customer`  ORDER BY `customer_name` ASC  LIMIT 0 , 100000");

while ($a_row = mysql_fetch_row($result)) {

	foreach ($a_row as $field) {
		
	}
	
	$cq='"';	

$cq = mb_ereg_replace("$cq","*", $a_row[1]);
$cq10='"';
$cq10 = mb_ereg_replace("$cq10","*", $a_row[5]);
$cqz='"';
$a_row[31]= mb_ereg_replace("$cqz","*", $a_row[3]);





print"
${ar}$cq -  $cq10 - $a_row[31] =$a_row[0]$ar, 
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


include_once('address.php');


print"
<table align='center' width='1000' cellpadding='0' cellspacing='' height='' bgcolor=''>
<tr bgcolor='white'> 
";












print"
<td align='center' valign='top' width='1000'> 


<table align='center' width='1000' cellpadding='0' cellspacing='0' bgcolor=''>
<tr> <td align='center' height='40'> <font face='arial' size='5'> <b> Stock Out  </b>  </font> </td> </tr>
<tr> <td align='center' height='1' bgcolor=''> </td> </tr>
</table>







<table align='center' width='1000' cellpadding='0' cellspacing='0' bgcolor='white'>



<tr> 

<form action='stock_out_only.php' method='POST'>

<td align='center' height='40'> 



<font face='arial' size='5'> <b>  $name
<br>
Date:
$dat1-$mon1-$yer1  To $dat2-$mon2-$yer2

</b>
</font>

</td> 


</form>

</tr>


<tr> <td align='center' height='15' bgcolor=''> </td> </tr>
</table>












<table align='center' width='1000' cellpadding='0' cellspacing='1' bgcolor='black'>

<tr bgcolor='#F2F2F2'>


 
<td align='left' height='30' width='200'>  <font face='arial' size='5' color=''> &nbsp; Product Name </font> </td> 


<td align='left' height='30' width='180'>  <font face='arial' size='5' color=''> &nbsp; Quantity    </font> </td> 









</tr>
";













//$result = mysql_query("SELECT * FROM buymemo");


//$result = mysql_query("SELECT * FROM product_name");


$result = mysql_query("SELECT * FROM product_name");



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

if($product_id_new=="")
{
$result = mysql_query("SELECT * FROM `saleproduct` where adat>='$mdate' && adat<='$ndate' && product_id='$p_id[$i]'   && tf!='1' ");
}
else
{
$result = mysql_query("SELECT * FROM `saleproduct` where adat>='$mdate' && adat<='$ndate' && product_id='$p_id[$i]' && supplier_id='$product_id_new'   && tf!='1' ");

}

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
<td align='left' height='30' width='100'>  <font face='arial' size='5' color=''> &nbsp;  $p_n[$i] $capacity[$i] $brand[$i]  $ptt_old </font> </td> 

<td align='left' height='30' width='180'>  <font face='arial' size='5' color=''> &nbsp;  $q  </font> </td> 


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
<td align='center' height='30' width='100'>  <font face='arial' size='5' color=''> $a_row[5] </font> </td> 
<td align='center' height='30' width='180'>  <font face='arial' size='5' color=''> $a_row[7]  </font> </td> 
<td align='center' height='30' width='180'>  <font face='arial' size='5' color=''> $a_row[6]  </font> </td> 
<td align='center' height='30' width='180'>  <font face='arial' size='5' color=''> $a_row[8]  </font> </td> 
</tr>

";

*/



print"
<tr bgcolor='F2F2F2'> 
<td align='left' height='30' width='100'>  <font face='arial' size='5' color=''> &nbsp; Total   </font> </td> 



<td align='left' height='30' width='180'>  <font face='arial' size='5' color=''> &nbsp; $q11  </font> </td> 






</tr>

";




$ttt=$t1+$tax1;


print"

</table>
<br>
<br>
";
















print"




<br>











<form action='stock_out_print.php' method='POST' target='a_blank'>

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