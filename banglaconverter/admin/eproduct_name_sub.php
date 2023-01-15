<?php

include_once('dbconnection.php');



$id=trim($_POST['product_idv']);

$barcode_id=trim($_POST['barcode_id']);


if($id=="")
{
$id=$_GET['vc'];
}







$ser=trim($_POST['ser']);

$product_name=trim($_POST['product_name']);

$rate=trim($_POST['rate']);

$brand=trim($_POST['brand']);
$capacity=trim($_POST['capacity']);

$or=trim($_POST['or']);
$pack=trim($_POST['pack']);


$sub_category=trim($_POST['sub_category']);

if($sub_category=="")
{
$sub_category=$_GET['sub_id'];
}





$sql="SELECT * FROM `product_sub_category` WHERE user_id='$sub_category'";
$result=mysql_query($sql);
$arrr=mysql_fetch_array($result);
$pron=$arrr[2];





$product_type=trim($_POST['product_type']);
$product_id=trim($_POST['product_id']);


$buying_price=trim($_POST['buying_price']);
$selling_price=trim($_POST['selling_price']);
$details=trim($_POST['details']);


$product_name=str_replace("'","`","$product_name");
$details=str_replace("'","`","$details");
$or=str_replace("'","`","$or");
$pack=str_replace("'","`","$pack");


$s=trim($_POST['s']);
$d=$_GET['dell'];

//print" $category_name - $details ";



if($ser==100)
{


for($l=1;$l<=$branch_control;$l++)
{
	
if($l==1)
{
include_once('connection1.php');


$result = mysql_query("SELECT * FROM `product_name` where sub_category_id='$sub_category' ORDER BY `user_id` ASC  LIMIT 0 , 60000 ");

while ($a_row = mysql_fetch_row($result)) {

	foreach ($a_row as $field) {
		
	}
$mc++;
$product_name=trim($_POST['product_name'.$mc]);
$buying_price=trim($_POST['buying_price'.$mc]);
$selling_price=trim($_POST['selling_price'.$mc]);
$details=trim($_POST['details'.$mc]);
$product_type=trim($_POST['product_type'.$mc]);
$rate=trim($_POST['rate'.$mc]);
$brand=trim($_POST['brand'.$mc]);
$capacity=trim($_POST['capacity'.$mc]);
$product_id=trim($_POST['product_id'.$mc]);
$or=trim($_POST['or'.$mc]);
$pack=trim($_POST['pack'.$mc]);
$barcode_id=trim($_POST['barcode_id'.$mc]);








$product_name=str_replace("'","`","$product_name");
$details=str_replace("'","`","$details");
$or=str_replace("'","`","$or");
$pack=str_replace("'","`","$pack");
$brand=str_replace("'","`","$brand");
$capacity=str_replace("'","`","$capacity");







$sql= "UPDATE  `product_name` SET `product_name`='$product_name' WHERE `user_id`='$a_row[0]'";
mysql_query($sql);


$sql= "UPDATE  `product_name` SET `buying_price`='$buying_price' WHERE `user_id`='$a_row[0]'";
mysql_query($sql);

$sql= "UPDATE  `product_name` SET `selling_price`='$selling_price' WHERE `user_id`='$a_row[0]'";
mysql_query($sql);

$sql= "UPDATE  `product_name` SET `details`='$details' WHERE `user_id`='$a_row[0]'";
mysql_query($sql);

$sql= "UPDATE  `product_name` SET `product_type2`='$product_type' WHERE `user_id`='$a_row[0]'";
mysql_query($sql);


$sql= "UPDATE  `product_name` SET `rate`='$rate' WHERE `user_id`='$a_row[0]'";
mysql_query($sql);


$sql= "UPDATE  `product_name` SET `barcode_id`='$barcode_id' WHERE `user_id`='$a_row[0]'";
mysql_query($sql);



/*
$sql= "UPDATE  `product_name` SET `brand`='$brand' WHERE `user_id`='$a_row[0]'";
mysql_query($sql);

$sql= "UPDATE  `product_name` SET `capacity`='$capacity' WHERE `user_id`='$a_row[0]'";
mysql_query($sql);


$sql= "UPDATE  `product_name` SET `product_id`='$product_id' WHERE `user_id`='$a_row[0]'";
mysql_query($sql);


$sql= "UPDATE  `product_name` SET `orr`='$or' WHERE `user_id`='$a_row[0]'";
mysql_query($sql);


$sql= "UPDATE  `product_name` SET `pack`='$pack' WHERE `user_id`='$a_row[0]'";
mysql_query($sql);
*/


}




}



if($l==2)
{
include_once('connection2.php');

$sql= "UPDATE  `product_name` SET `product_name`='$product_name' WHERE `user_id`='$s'";
mysql_query($sql);


$sql= "UPDATE  `product_name` SET `buying_price`='$buying_price' WHERE `user_id`='$s'";
mysql_query($sql);

$sql= "UPDATE  `product_name` SET `selling_price`='$selling_price' WHERE `user_id`='$s'";
mysql_query($sql);

$sql= "UPDATE  `product_name` SET `details`='$details' WHERE `user_id`='$s'";
mysql_query($sql);

$sql= "UPDATE  `product_name` SET `product_type2`='$product_type' WHERE `user_id`='$s'";
mysql_query($sql);


$sql= "UPDATE  `product_name` SET `rate`='$rate' WHERE `user_id`='$s'";
mysql_query($sql);



$sql= "UPDATE  `product_name` SET `product_id`='$product_id' WHERE `user_id`='$s'";
mysql_query($sql);

}








if($l==3)
{
include_once('connection3.php');

$sql= "UPDATE  `product_name` SET `product_name`='$product_name' WHERE `user_id`='$s'";
mysql_query($sql);


$sql= "UPDATE  `product_name` SET `buying_price`='$buying_price' WHERE `user_id`='$s'";
mysql_query($sql);

$sql= "UPDATE  `product_name` SET `selling_price`='$selling_price' WHERE `user_id`='$s'";
mysql_query($sql);

$sql= "UPDATE  `product_name` SET `details`='$details' WHERE `user_id`='$s'";
mysql_query($sql);

$sql= "UPDATE  `product_name` SET `product_type2`='$product_type' WHERE `user_id`='$s'";
mysql_query($sql);


$sql= "UPDATE  `product_name` SET `rate`='$rate' WHERE `user_id`='$s'";
mysql_query($sql);



$sql= "UPDATE  `product_name` SET `product_id`='$product_id' WHERE `user_id`='$s'";
mysql_query($sql);

}





if($l==4)
{
include_once('connection4.php');

$sql= "UPDATE  `product_name` SET `product_name`='$product_name' WHERE `user_id`='$s'";
mysql_query($sql);


$sql= "UPDATE  `product_name` SET `buying_price`='$buying_price' WHERE `user_id`='$s'";
mysql_query($sql);

$sql= "UPDATE  `product_name` SET `selling_price`='$selling_price' WHERE `user_id`='$s'";
mysql_query($sql);

$sql= "UPDATE  `product_name` SET `details`='$details' WHERE `user_id`='$s'";
mysql_query($sql);

$sql= "UPDATE  `product_name` SET `product_type2`='$product_type' WHERE `user_id`='$s'";
mysql_query($sql);


$sql= "UPDATE  `product_name` SET `rate`='$rate' WHERE `user_id`='$s'";
mysql_query($sql);



$sql= "UPDATE  `product_name` SET `product_id`='$product_id' WHERE `user_id`='$s'";
mysql_query($sql);

}




if($l==5)
{
include_once('connection5.php');

$sql= "UPDATE  `product_name` SET `product_name`='$product_name' WHERE `user_id`='$s'";
mysql_query($sql);


$sql= "UPDATE  `product_name` SET `buying_price`='$buying_price' WHERE `user_id`='$s'";
mysql_query($sql);

$sql= "UPDATE  `product_name` SET `selling_price`='$selling_price' WHERE `user_id`='$s'";
mysql_query($sql);

$sql= "UPDATE  `product_name` SET `details`='$details' WHERE `user_id`='$s'";
mysql_query($sql);

$sql= "UPDATE  `product_name` SET `product_type2`='$product_type' WHERE `user_id`='$s'";
mysql_query($sql);


$sql= "UPDATE  `product_name` SET `rate`='$rate' WHERE `user_id`='$s'";
mysql_query($sql);



$sql= "UPDATE  `product_name` SET `product_id`='$product_id' WHERE `user_id`='$s'";
mysql_query($sql);

}






if($l==6)
{
include_once('connection6.php');

$sql= "UPDATE  `product_name` SET `product_name`='$product_name' WHERE `user_id`='$s'";
mysql_query($sql);


$sql= "UPDATE  `product_name` SET `buying_price`='$buying_price' WHERE `user_id`='$s'";
mysql_query($sql);

$sql= "UPDATE  `product_name` SET `selling_price`='$selling_price' WHERE `user_id`='$s'";
mysql_query($sql);

$sql= "UPDATE  `product_name` SET `details`='$details' WHERE `user_id`='$s'";
mysql_query($sql);

$sql= "UPDATE  `product_name` SET `product_type2`='$product_type' WHERE `user_id`='$s'";
mysql_query($sql);


$sql= "UPDATE  `product_name` SET `rate`='$rate' WHERE `user_id`='$s'";
mysql_query($sql);



$sql= "UPDATE  `product_name` SET `product_id`='$product_id' WHERE `user_id`='$s'";
mysql_query($sql);

}



}


include_once('s.php');
}




if($d!="")
{

for($l=1;$l<=$branch_control;$l++)
{
	
if($l==1)
{
include_once('connection1.php');
$result = mysql_query("DELETE FROM product_name WHERE user_id=$d");
}

if($l==2)
{
include_once('connection2.php');
$result = mysql_query("DELETE FROM product_name WHERE user_id=$d");
}


if($l==3)
{
include_once('connection3.php');
$result = mysql_query("DELETE FROM product_name WHERE user_id=$d");
}

if($l==4)
{
include_once('connection4.php');
$result = mysql_query("DELETE FROM product_name WHERE user_id=$d");
}


if($l==5)
{
include_once('connection5.php');
$result = mysql_query("DELETE FROM product_name WHERE user_id=$d");
}

if($l==6)
{
include_once('connection6.php');
$result = mysql_query("DELETE FROM product_name WHERE user_id=$d");
}







}


}


include_once('connection11.php');

$ar='"';

print"

<html>

<head>
<title> Edit Product Name </title>
";
?>










  <link rel="stylesheet" href="jquery-ui-themes-1.11.4/themes/smoothness/jquery-ui.css">
  
  
  
  <script src="jquery-1.10.2.js"></script>
  <script src="jquery-ui.js"></script>
  
 
  
  <script>
  
  var availableTags;

  var availableTags2;

  
  var saletags;
  
  var stooo;
  

  var address_o;
  var mobile_o;

  
  
  
  var sale_price1;
  
  var boxxx;
  
  
 


 $(function() {
	  
	  
	  
 availableTags = [

	<?php
	

$result = mysql_query("SELECT * FROM `product_name`");	

while ($a_row = mysql_fetch_row($result)) {

	foreach ($a_row as $field) {
		
	}
	
$es++;


$cq='"';	



$cq = mb_ereg_replace("$cq","*", $a_row[2]);

$cq10='"';
$cq10 = mb_ereg_replace("$cq10","*", $a_row[3]);

$cqz='"';
$a_row[31]= mb_ereg_replace("$cqz","*", $a_row[31]);
$a_row[30]= mb_ereg_replace("$cqz","*", $a_row[30]);




print"


${ar}$cq -  $cq10 - $a_row[31] - $a_row[30] -  (P_Value $a_row[4])=$a_row[0]$ar, 


 ";
	}
?>

      "Testing"

    ];
    $( "#tags" ).autocomplete({
      source: availableTags
    });
  });
  


  
</script>



<script language='javascript'>

function rneww()
{
document.fuu.product_idv.value='';	
}
  
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
<td align='center' valign='top' width='220' bgcolor='#C5B991'>  

<table align='center' width='200' cellpadding='0' cellspacing='0' height=''>

<tr> <td height='10'> </td></tr>


<tr> <td height='30' width='200' bgcolor='green'>   <span id='child'> <b> <font color='white'> Edit </font> </b> </span>  </td></tr>

<tr> <td height='7'> </td></tr>





";


include_once('edit_left.php');


print"
















<td align='center' valign='top' width='980'>  



<table align='center' width='700' cellpadding='0' cellspacing='0'>
<tr> <td height='10'>  </td> </tr>
</table>



<table align='center' width='925' cellpadding='0' cellspacing='0'>
<tr> <td align='center' height='28' bgcolor='#7087A3' id='tda'>  <font face='arial' color='white' size='2'> <b> Edit Product Name   </b> </font> </td> </tr>
</table>


";





$result = mysql_query("SELECT * FROM `product_category`  ORDER BY `user_id` ASC  ");

while ($a_row = mysql_fetch_row($result)) {

	foreach ($a_row as $field) {
		
	}
	
	$ty++;
	$c_id[$ty]=$a_row[0];
        $c_name[$ty]=$a_row[1];
	
}






print"
<form action='eproduct_name_sub.php' method='POST'>




<table align='center' width='925' cellpadding='0' cellspacing='0'>
<tr> <td align='center' height='68' bgcolor='white' id=''>  <font face='arial' color='' size='3'> <b>

Select Sub Category :



<select id='category' name='sub_category'>

<option value='$sub_category'> $pron </option>
";

//$result = mysql_query("SELECT * FROM product_category");

for($i=1;$i<=$ty;$i++)
{
print"<option>$c_name[$i]</option>";

$result = mysql_query("SELECT * FROM `product_sub_category` where category_id='$c_id[$i]'   ORDER BY `sub_category_id` ASC  LIMIT 0 , 60000 ");


while ($a_row = mysql_fetch_row($result)) {

	foreach ($a_row as $field) {
		
	}

print"
<option value='$a_row[0]'> &nbsp;&nbsp;&nbsp;&nbsp;  $a_row[2] </option>
";
}



}

print"
</select>

&nbsp;

<input type='submit' value='Search'>




   </b> </font> </td> </tr>
</table>


</form>
";





print"

<table align='center' width='900' cellpadding='1' cellspacing='1' bgcolor='EFEBEB'>




<tr bgcolor='gray' height='40'> 
     <td  bgcolor='' align='center' height='0' width=''> <font face='arial' size='2'> Product Name </font> </td>
     ";
	 
	 if($cwp1==1)
	 {
	 print"
	 <td align='center' width=''> <font face='arial' size='2'> $cwp11  </font> </td>
	 ";
	 }
	  if($cwp2==1)
	 {
	 print"
      <td align='center' width=''> <font face='arial' size='2'> $cwp22 </font> </td>
	  ";
	 }
	  
	   if($cwp3==1)
	 {
	  print"
      <td align='center' width=''> <font face='arial' size='2'> $cwp33 </font> </td>
";
	 }


	 
	 print"
	 <td align='center' width=''> <font face='arial' size='2'> Product Unit </font> </td>
";

print"
	 <td align='center' width=''> <font face='arial' size='2'> Buying price </font> </td>
	 <td align='center' width=''> <font face='arial' size='2'> Selling price </font> </td>

";

 if($cwp4==1)
	 {
print"
<td align='center' width=''> <font face='arial' size='2'> $cwp44  </font> </td>
";
	 }




if($pack_set==1)
{

print"
<td align='center' width=''> <font face='arial' size='2'> Pack Size  </font> </td>
";	 
}


print"
	 <td align='center' width=''> <font face='arial' size='2'> Minimum Piece </font> </td>
	 <td align='center' width=''> <font face='arial' size='2'> Barcode_ID </font> </td>
	
";

/*
 
	 	 <td align='center' width=''> <font face='arial' size='2'> Details </font> </td>
*/

print"
	 
	 ";

print"
<form action='eproduct_name_sub.php' method='POST'>
";
print"
</tr>
";









/*

$result = mysql_query("SELECT * FROM `product_category`  ORDER BY `user_id` ASC  LIMIT 0 , 60000 ");

while ($a_row = mysql_fetch_row($result)) {

	foreach ($a_row as $field) {
		
	}
	
	$ty++;
	$c_id[$ty]=$a_row[0];
    $c_name[$ty]=$a_row[1];
	
}


$result = mysql_query("SELECT * FROM `product_sub_category`  ORDER BY `user_id` ASC  LIMIT 0 , 60000 ");

while ($a_row = mysql_fetch_row($result)) {

	foreach ($a_row as $field) {
		
	}
	
	$rd++;
	$ca_id[$rd]=$a_row[1];
	$cas_id[$rd]=$a_row[0];
	$can_id[$rd]=$a_row[2];
	
	
	
}

*/


$gv=0;

$d=11;

//$result = mysql_query("SELECT * FROM product_category");


if($sub_category!="")
{
$result = mysql_query("SELECT * FROM `product_name` where sub_category_id='$sub_category' ORDER BY `user_id` ASC  LIMIT 0 , 60000 ");

while ($a_row = mysql_fetch_row($result)) {

	foreach ($a_row as $field) {
		
	}

$fk++;

print"
<tr bgcolor='white' height='40'> 


	
	    <td  bgcolor='' align='center' height='0' width='50'> <font face='arial' size='2'> <input type='text' name='product_name$fk' value='$a_row[2]' size='30'>  </font> </td>
		";

		
 if($cwp1==1)
	 {		
		print"
		<td  bgcolor='' align='center' height='0' width='50'> <font face='arial' size='2'> <input type='text' name='product_id$fk' value='$a_row[3]' size='3'>  </font> </td>
";
}

 if($cwp2==1)
	 {
print"
		<td  bgcolor='' align='center' height='0' width='50'> <font face='arial' size='2'> <input type='text' name='brand$fk' value='$a_row[30]' size='3'>  </font> </td>
";
}


 if($cwp3==1)
	 {

 print"
		<td  bgcolor='' align='center' height='0' width='50'> <font face='arial' size='2'> <input type='text' name='capacity$fk' value='$a_row[31]' size='5'>  </font> </td>
";
	 }


	 print"
		
		
	    <td  bgcolor='' align='center' height='0' width='40'> <font face='arial' size='2'> <input type='text' name='product_type$fk' value='$a_row[22]' size='3'>  </font> </td>
";

print"
		
	    <td  bgcolor='' align='center' height='0' width='40'> <font face='arial' size='2'> <input type='text' name='buying_price$fk' value='$a_row[4]' size='6'>  </font> </td>
		
			    <td  bgcolor='' align='center' height='0' width='40'> <font face='arial' size='2'> <input type='text' name='selling_price$fk' value='$a_row[5]' size='6'>  </font> </td>
		
";


 if($cwp4==1)
	 {
print"

		    <td  bgcolor='' align='center' height='0' width='40'> <font face='arial' size='2'> <input type='text' name='or$fk' value='$a_row[32]' size='6'>  </font> </td>
	";
	 }
	
	


if($pack_set==1)
{

	print"

 <td align='center' width='180'> <font face='arial' size='2'> <input type='text' name='pack$fk' value='$a_row[33]' size='2'> </font> </td> 
";
}



print"	
 <td align='center' width='180'> <font face='arial' size='2'> <input type='text' name='rate$fk' value='$a_row[28]' size='2'> </font> </td> 

 <td align='center' width='180'> <font face='arial' size='2'> <input type='text' name='barcode_id$fk' value='$a_row[36]' size='12'> </font> </td> 

";

/*
		
     <td align='center' width='180'> <font face='arial' size='2'> <input type='text' name='details' value='$a_row[6]' size='30'> 


</font> </td> 
*/
 


print"
</tr>
";


}




}



print"
<tr> <td align='center' height='30' bgcolor=''>   </td> <td> </td> </tr>

</table>


<br>
<br>


<input type='hidden' name='sub_category' value='$sub_category'>
<input type='hidden' name='ser' value='100'>


<input type='submit' value='Edit'>

</form>


<br>
<br>


<table align='center' width='925' cellpadding='0' cellspacing='0'>
<tr> <td align='center' height='28' bgcolor='#7087A3' id='tdt'>  <font face='arial' color='white' size='2'> <b>   </b> </font> </td> </tr>
</table>








</td>


</tr>
</table>




</body>

</html>


";


?>