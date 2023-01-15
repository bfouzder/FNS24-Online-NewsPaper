<?php

include_once('dbconnection.php');

//$result = mysql_query("DELETE FROM product_name2 WHERE user_id>200");
//exit;





$id=trim($_POST['product_idv']);


if($id=="")
{
$id=$_GET['vc'];
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





$product_id3=$idvalue;

$rty=0;
$rkk=0;

//print"$product_id3";



$ser=trim($_POST['ser']);

$product_name=trim($_POST['product_name']);


$barcode_id=trim($_POST['barcode_id']);


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
$s=trim($_POST['s']);


$product_name=str_replace("'","`","$product_name");
$details=str_replace("'","`","$details");

$or=str_replace("'","`","$or");



$d=$_GET['dell'];

//print" $category_name - $details ";



if($ser==10)
{


for($l=1;$l<=$branch_control;$l++)
{
	
if($l==1)
{
include_once('connection1.php');

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

$sql= "UPDATE  `product_name` SET `brand`='$brand' WHERE `user_id`='$s'";
mysql_query($sql);

$sql= "UPDATE  `product_name` SET `capacity`='$capacity' WHERE `user_id`='$s'";
mysql_query($sql);


$sql= "UPDATE  `product_name` SET `product_id`='$product_id' WHERE `user_id`='$s'";
mysql_query($sql);


$sql= "UPDATE  `product_name` SET `orr`='$or' WHERE `user_id`='$s'";
mysql_query($sql);


$sql= "UPDATE  `product_name` SET `pack`='$pack' WHERE `user_id`='$s'";
mysql_query($sql);


$sql= "UPDATE  `product_name` SET `barcode_id`='$barcode_id' WHERE `user_id`='$s'";
mysql_query($sql);


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
//include_once('connection1.php');
//$result = mysql_query("DELETE FROM product_name WHERE user_id=$d");
}

if($l==2)
{
//include_once('connection2.php');
//$result = mysql_query("DELETE FROM product_name WHERE user_id=$d");
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
  
 <script type="text/javascript">
  $(function() 
{
 $( "#tags" ).autocomplete({
  source: 'p.php'

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

<style>

.list1 tr:hover{
background-color:pink;
}

</style>


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





<form name='fuu' action='eproduct_name.php' method='POST'>

<table align='center' width='925' cellpadding='0' cellspacing='0'>
<tr> <td align='center' height='28' bgcolor=''> 

<br>
<br>

 <font face='arial' color='black' size='2'> <b> Search Product :  


<label for='tags'> </label>
<input type='text' id='tags' value='$id' name='product_idv' size='30'  onclick='rneww()'>

&nbsp;&nbsp;


  </b> </font> 

<input type='submit' value='Search'>

</td> </tr>
</table>

</form>

<br> <br>




";


/*

$result = mysql_query("SELECT * FROM `product_category`  ORDER BY `user_id` ASC  ");

while ($a_row = mysql_fetch_row($result)) {

	foreach ($a_row as $field) {
		
	}
	
	$ty++;
	$c_id[$ty]=$a_row[0];
        $c_name[$ty]=$a_row[1];
	
}

*/



/*
print"
<form action='eproduct_name.php' method='POST'>




<table align='center' width='925' cellpadding='0' cellspacing='0'>
<tr> <td align='center' height='68' bgcolor='white' id=''>  <font face='arial' color='' size='3'> <b>

Select Sub Category :



<select id='category' name='sub_category'>

<option value='$sub_category'> $sub_category_name </option>
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

*/


print"

<table align='center' width='900' cellpadding='1' cellspacing='1' bgcolor='EFEBEB' class='list1'>




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


print"
<td align='center' width=''> <font face='arial' size='2'>   </font> </td>
	 

	 <td align='center' width=''> <font face='arial' size='2'> Minimum Piece </font> </td>
	
	 <td align='center' width=''> <font face='arial' size='2'> Barcode_ID </font> </td>
	
";

/*
 
	 	 <td align='center' width=''> <font face='arial' size='2'> Details </font> </td>
*/

print"
	 
	 <td align='center' width=''> <font face='arial' size='2'> Edit </font> </td>
	 
	 ";

	 if($user_name1=="superadmin")
{
print"
	 <td align='center' width=''> <font face='arial' size='2'> Delete </font> </td>
	 ";
}

print"
</tr>
";



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


$gv=0;

$d=11;

//$result = mysql_query("SELECT * FROM product_category");


if($product_id3!="")
{
$result = mysql_query("SELECT * FROM `product_name` where user_id='$product_id3' ORDER BY `user_id` ASC  LIMIT 0 , 60000 ");

while ($a_row = mysql_fetch_row($result)) {

	foreach ($a_row as $field) {
		
	}


print"
<tr bgcolor='white' height='40'> 

<form action='eproduct_name.php' method='POST'>

	
	    <td  bgcolor='' align='center' height='0' width='50'> <font face='arial' size='2'> <input type='text' name='product_name' value='$a_row[2]' size='30'>  </font> </td>
		";

		
 if($cwp1==1)
	 {		
		print"
		<td  bgcolor='' align='center' height='0' width='50'> <font face='arial' size='2'> <input type='text' name='product_id' value='$a_row[3]' size='3'>  </font> </td>
";
}

 if($cwp2==1)
	 {
print"
		<td  bgcolor='' align='center' height='0' width='50'> <font face='arial' size='2'> <input type='text' name='brand' value='$a_row[30]' size='3'>  </font> </td>
";
}


 if($cwp3==1)
	 {

 print"
		<td  bgcolor='' align='center' height='0' width='50'> <font face='arial' size='2'> <input type='text' name='capacity' value='$a_row[31]' size='5'>  </font> </td>
";
	 }


	 print"
		
		
	    <td  bgcolor='' align='center' height='0' width='40'> <font face='arial' size='2'> <input type='text' name='product_type' value='$a_row[22]' size='3'>  </font> </td>
";

print"
		
	    <td  bgcolor='' align='center' height='0' width='40'> <font face='arial' size='2'> <input type='text' name='buying_price' value='$a_row[4]' size='6'>  </font> </td>
		
			    <td  bgcolor='' align='center' height='0' width='40'> <font face='arial' size='2'> <input type='text' name='selling_price' value='$a_row[5]' size='6'>  </font> </td>
		
";


 if($cwp4==1)
	 {
print"

		    <td  bgcolor='' align='center' height='0' width='40'> <font face='arial' size='2'> <input type='text' name='or' value='$a_row[32]' size='6'>  </font> </td>
	";
	 }
	
	
	print"

 <td align='center' width='180'> <font face='arial' size='2'> <input type='text' name='pack' value='$a_row[33]' size='2'> </font> </td> 

	
 <td align='center' width='180'> <font face='arial' size='2'> <input type='text' name='rate' value='$a_row[28]' size='2'> </font> </td> 

  <td align='center' width='180'> <font face='arial' size='2'> <input type='text' name='barcode_id' value='$a_row[36]' size='12'> </font> </td> 


";

/*
		
     <td align='center' width='180'> <font face='arial' size='2'> <input type='text' name='details' value='$a_row[6]' size='30'> </font> </td> 
*/
 

print"	 
		
	 <td align='center' width='70'> 
	 <input type='hidden' name='ser' value='10'>

	 <input type='hidden' name='product_idv' value='$id'>

	 <input type='hidden' name='s' value='$a_row[0]'>
	 <font face='arial' size='2'> <input type='submit' value='Edit'> </font>


	 </td>
	 </form>
	 
";

	 if($user_name1=="superadmin")
{
print"	 
	 
	 <td align='center' width='70'> <a onClick=\"javascript: return confirm('Are you confirm to delete');\" href=\"eproduct_name.php?dell=$a_row[0]&vc=$id\"> <div id='del'><font face='arial' size='2'> Delete  </font> </div>  </a> </td>
	 ";
}
print"
</tr>
";


}




}

else
{

for($i=1;$i<=$ty;$i++)
{

print"
<tr bgcolor='white' height='40' align='center'> 
<td bgcolor='#F77171' align='left'> <font face=='arial' size='2' color='white'> <b> $c_name[$i] </b> </font> </td>
</tr>
";



	
	
	for($j=1;$j<=$rd;$j++)
	{
		
	if($c_id[$i]==$ca_id[$j])
	
	{
print"
<tr bgcolor='white' height='40' align='center'> 
<td bgcolor='green'> <font face=='arail' size='2' color='white'> <b> $can_id[$j] </b> </font> </td>
</tr>
";	


$result = mysql_query("SELECT * FROM `product_name` where sub_category_id='$cas_id[$j]' ORDER BY `user_id` ASC  LIMIT 0 , 60000 ");


/*
if($sub_category!="" && $gv==0)
{
$result = mysql_query("SELECT * FROM `product_name` where sub_category_id='$sub_category' ORDER BY `user_id` ASC  LIMIT 0 , 60000 ");
$gv++;
}
*/


while ($a_row = mysql_fetch_row($result)) {

	foreach ($a_row as $field) {
		
	}


print"
<tr bgcolor='white' height='40'> 

<form action='eproduct_name.php' method='POST'>

	
	    <td  bgcolor='' align='center' height='0' width='50'> <font face='arial' size='2'> <input type='text' name='product_name' value='$a_row[2]' size='30'>  </font> </td>
		";
		
		
		 if($cwp1==1)
	 {
		print"
		<td  bgcolor='' align='center' height='0' width='50'> <font face='arial' size='2'> <input type='text' name='product_id' value='$a_row[3]' size='3'>  </font> </td>
";
}

 if($cwp2==1)
	 {
print"
		<td  bgcolor='' align='center' height='0' width='50'> <font face='arial' size='2'> <input type='text' name='brand' value='$a_row[30]' size='3'>  </font> </td>
";
	}

	 if($cwp3==1)
	 {
	print"
		<td  bgcolor='' align='center' height='0' width='50'> <font face='arial' size='2'> <input type='text' name='capacity' value='$a_row[31]' size='5'>  </font> </td>
";
	}


	
print"	
		
	    <td  bgcolor='' align='center' height='0' width='40'> <font face='arial' size='2'> <input type='text' name='product_type' value='$a_row[22]' size='3'>  </font> </td>
";



print"
		
	    <td  bgcolor='' align='center' height='0' width='40'> <font face='arial' size='2'> <input type='text' name='buying_price' value='$a_row[4]' size='6'>  </font> </td>
		
			    <td  bgcolor='' align='center' height='0' width='40'> <font face='arial' size='2'> <input type='text' name='selling_price' value='$a_row[5]' size='6'>  </font> </td>
		
";

 if($cwp4==1)
	 {
print"

		    <td  bgcolor='' align='center' height='0' width='40'> <font face='arial' size='2'> <input type='text' name='or' value='$a_row[32]' size='6'>  </font> </td>
	 ";
	 
}



	 print"

 <td align='center' width='180'> <font face='arial' size='2'> <input type='text' name='pack' value='$a_row[33]' size='2'> </font> </td> 

	
 <td align='center' width='180'> <font face='arial' size='2'> <input type='text' name='rate' value='$a_row[28]' size='2'> </font> </td> 
  <td align='center' width='180'> <font face='arial' size='2'> <input type='text' name='barcode_id' value='$a_row[36]' size='12'> </font> </td> 


";

/*
		
     <td align='center' width='180'> <font face='arial' size='2'> <input type='text' name='details' value='$a_row[6]' size='30'> </font> </td> 
*/
 

print"	 
		
	 <td align='center' width='70'> 
	 <input type='hidden' name='ser' value='10'>
	 <input type='hidden' name='s' value='$a_row[0]'>
	 <font face='arial' size='2'> <input type='submit' value='Edit'> </font>


	 </td>
	 </form>
	 
";

	 if($user_name1=="superadmin")
{
print"	 
	 
	 <td align='center' width='70'> <a onClick=\"javascript: return confirm('Are you confirm to delete');\" href=\"eproduct_name.php?dell=".$a_row[0]."\"> <div id='del'><font face='arial' size='2'> Delete  </font> </div>  </a> </td>
	 ";
}
print"
</tr>
";


}

	}


}

}


}





print"
<tr> <td align='center' height='30' bgcolor=''>   </td> <td> </td> </tr>

</table>


<br>
<br>

<form action='eproduct_name_print.php' method='POST' target='a_blank'>


<input type='submit' value='Print'>

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