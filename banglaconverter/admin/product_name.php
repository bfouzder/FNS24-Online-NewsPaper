<?php
include_once('dbconnection.php');

$ser=trim($_POST['ser']);

$category=trim($_POST['category']);
$sub_category=trim($_POST['sub_category']);
$product_type=trim($_POST['product_type']);
$rate=trim($_POST['rate']);

$pack=trim($_POST['pack']);

$barcode_id=trim($_POST['barcode_id']);


$brand=trim($_POST['brand']);
$capacity=trim($_POST['capacity']);

$or=trim($_POST['or']);



$sql="SELECT * FROM `product_category` WHERE user_id='$category' ";
$result=mysql_query($sql);
$arr=mysql_fetch_array($result);
$category_name=$arr[1];


$sql="SELECT * FROM `product_sub_category` WHERE user_id='$sub_category' ";
$result=mysql_query($sql);
$arrsub=mysql_fetch_array($result);
$sub_category_name=$arrsub[2];



$product_name=trim($_POST['product_name']);
$product_id=trim($_POST['product_id']);
$buying_price=trim($_POST['buying_price']);
$selling_price=trim($_POST['selling_price']);
$details=trim($_POST['details']);



$product_name=str_replace("'","`","$product_name");
$details=str_replace("'","`","$details");
$or=str_replace("'","`","$or");

 






if($ser==10)
{
$a=0;

/*
$sql="SELECT * FROM `product_name` WHERE product_id='$product_id' ";


$result=mysql_query($sql);
$arrp=mysql_fetch_array($result);
$t=$arrp[3];



if($t!="")
{
include_once('pi.php');
$a=1;
}


*/



if($a==0)
{

if($category=="" || $product_name=="" || $sub_category=="")
{
include_once('w.php');
$a=1;
}

}

if($a==0)
{
	
	
for($l=1;$l<=$branch_control;$l++)
{
	
if($l==1)
{
include_once('connection1.php');




/*
$coo[1]="Plain White";
$coo[2]="Plain Ivory";
$coo[3]="Plain Pink";
$coo[4]="Plain Blue";
$coo[5]="Plain Green";
$ps=5;
*/

/*
$coo[6]="Marble White";
$coo[7]="Marble Ivory";
$coo[8]="Marble Pink";
$coo[9]="Marble Blue";
$coo[10]="Marble Green";
$coo[11]="VIP Blue";
$coo[12]="VIP Green";
$coo[13]="VIP Red";
$coo[14]="Coral Pink";
$ps=14;
*/


/*
$coo[1]="Plain White";
$coo[2]="Plain Ivory";
$coo[3]="Plain Pink";
$coo[4]="Plain Blue";
$coo[5]="Plain Green";
$coo[6]="Marble White";
$coo[7]="Marble Ivory";
$coo[8]="Marble Pink";
$coo[9]="Marble Blue";
$coo[10]="Marble Green";
*/

/*
$coo[11]="Decor White";
$coo[12]="Decor Ivory";
$coo[13]="Decor Pink";
$coo[14]="Decor Blue";
$coo[15]="Decor Green";
$coo[16]="Rustic Blue";
$coo[17]="Rustic Red";
$coo[18]="Rustic Golden";
*/
/*
$coo[11]="VIP Red";
$coo[12]="VIP Merun";
$coo[13]="VIP Pacific Blue";
$coo[14]="VIP Deep Green";
$coo[15]="VIP Paste";
$coo[16]="VIP Orange";
$coo[17]="VIP Green";
$coo[18]="VIP Yellow";
*/
/*
$coo[17]="DC Red";
$coo[18]="DC Merun";
$coo[19]="DC Pacific Blue";
$coo[20]="DC Deep Green";
$coo[21]="DC Paste";
$coo[22]="DC Orange";
$coo[23]="DC Green";
$coo[24]="DC Yellow";

$coo[25]="DCV Red";
$coo[26]="DCV Merun";
$coo[27]="DCV Pacific Blue";
$coo[28]="DCV Deep Green";
$coo[29]="DCV Paste";
$coo[30]="DCV Orange";
$coo[31]="DCV Green";
$coo[32]="DCV Yellow";
*/

//$ps=18;




/*
$coo[1]="Plain White";
$coo[2]="Plain Ivory";
$coo[3]="Plain Pink";
$coo[4]="Plain Blue";
$coo[5]="Plain Green";
$coo[6]="Marble White";
$coo[7]="Marble Ivory";
$coo[8]="Marble Pink";
$coo[9]="Marble Blue";
$coo[10]="Marble Green";
$coo[11]="Decor White";
$coo[12]="Decor Ivory";
$coo[13]="Decor Pink";
$coo[14]="Decor Blue";
$coo[15]="Decor Green";
$ps=15;
*/


/*
$coo[1]="Plain White";
$coo[2]="Plain Ivory";
$coo[3]="Plain Pink";
$coo[4]="Plain Blue";
$coo[5]="Plain Green";
*/


/*
$coo[1]="Marble White";
$coo[2]="Marble Ivory";
$coo[3]="Marble Pink";
$coo[4]="Marble Blue";
$coo[5]="Marble Green";

$coo[6]="Decor White";
$coo[7]="Decor Ivory";
$coo[8]="Decor Pink";
$coo[9]="Decor Blue";
$coo[10]="Decor Green";


$coo[11]="Rustic Blue";
$coo[12]="Rustic Red";
$coo[13]="Rustic Golden";

$coo[14]="VIP Red";
$coo[15]="VIP Merun";
$coo[16]="VIP Pacific Blue";
$coo[17]="VIP Deep Green";
$coo[18]="VIP Paste";
$coo[19]="VIP Orange";
$coo[20]="VIP Green";
$coo[21]="VIP Yellow";

$coo[22]="DC Red";
$coo[23]="DC Merun";
$coo[24]="DC Pacific Blue";
$coo[25]="DC Deep Green";
$coo[26]="DC Paste";
$coo[27]="DC Orange";
$coo[28]="DC Green";
$coo[29]="DC Yellow";

$coo[30]="DCV Red";
$coo[31]="DCV Merun";
$coo[32]="DCV Pacific Blue";
$coo[33]="DCV Deep Green";
$coo[34]="DCV Paste";
$coo[35]="DCV Orange";
$coo[36]="DCV Green";
$coo[37]="DCV Yellow";
$ps=37;

*/













/*
$coo[1]="Marble White";
$coo[2]="Marble Ivory";
$coo[3]="Marble Pink";
$coo[4]="Marble Blue";
$coo[5]="Marble Green";
$coo[6]="Rustic Blue";
$coo[7]="Rustic Red";
$coo[8]="Rustic Golden";
$coo[9]="VIP Red";
$coo[10]="VIP Merun";
$coo[11]="VIP Pacific Blue";
$coo[12]="VIP Deep Green";
$coo[13]="VIP Paste";
$coo[14]="VIP Orange";
$coo[15]="VIP Grenn";
$coo[16]="VIP Yellow";
$coo[17]="DC Red";
$coo[18]="DC Merun";
$coo[19]="DC Pacific Blue";
$coo[20]="DC Deep Green";
$coo[21]="DC Paste";
$coo[22]="DC Orange";
$coo[23]="DC Grenn";
$coo[24]="DC Yellow";
$coo[25]="DCV Red";
$coo[26]="DCV Merun";
$coo[27]="DCV Pacific Blue";
$coo[28]="DCV Deep Green";
$coo[29]="DCV Paste";
$coo[30]="DCV Orange";
$coo[31]="DCV Grenn";
$coo[32]="DCV Yellow";
$ps=32;
*/







/*
$coo[1]="Plain White";
$coo[2]="Plain Ivory";
$coo[3]="Plain Pink";
$coo[4]="Plain Blue";
$coo[5]="Plain Green";
$coo[6]="Marble White";
$coo[7]="Marble Ivory";
$coo[8]="Marble Pink";
$coo[9]="Marble Blue";
$coo[10]="Marble Green";
$coo[11]="Decor White";
$coo[12]="Decor Ivory";
$coo[13]="Decor Pink";
$coo[14]="Decor Blue";
$coo[15]="Decor Green";
$coo[16]="Rustic Blue";
$coo[17]="Rustic Red";
$coo[18]="Rustic Golden";
$coo[19]="VIP Red";
$coo[20]="VIP Merun";
$coo[21]="VIP Pacific Blue";
$coo[22]="VIP Deep Green";
$coo[23]="VIP Paste";
$coo[24]="VIP Orange";
$coo[25]="VIP Grenn";
$coo[26]="VIP Yellow";
$ps=26;
*/













/*
$coo[1]="Plain White";
$coo[2]="Plain Ivory";
$coo[3]="Plain Pink";
$coo[4]="Plain Blue";
$coo[5]="Plain Green";
$coo[6]="Marble White";
$coo[7]="Marble Ivory";
$coo[8]="Marble Pink";
$coo[9]="Marble Blue";
$coo[10]="Marble Green";
$coo[11]="VIP Red";
$coo[12]="VIP Merun";
$coo[13]="VIP Pacific Blue";
$coo[14]="VIP Deep Green";
$coo[15]="VIP Paste";
$coo[16]="VIP Orange";
$coo[17]="VIP Grenn";
$coo[18]="VIP Yellow";
$ps=18;
*/












/*

for($hd=1;$hd<=$ps;$hd++)
{
$sql = "INSERT INTO `product_name` (`user_id`, `category`, `product_name`, `product_id`, `buying_price`, `selling_price`, `details`, `sub_category_id`, `product_type2`, `rate`, `brand`, `capacity`, `orr`, `pack`) VALUES ('','$category','$product_name','$product_id','$buying_price','$selling_price','$details','$sub_category','$product_type','$rate','$brand','$capacity','$coo[$hd]','$pack')";
mysql_query($sql);
}


*/




$sql = "INSERT INTO `product_name` (`user_id`, `category`, `product_name`, `product_id`, `buying_price`, `selling_price`, `details`, `sub_category_id`, `product_type2`, `rate`, `brand`, `capacity`, `orr`, `pack`, `barcode_id`) VALUES ('','$category','$product_name','$product_id','$buying_price','$selling_price','$details','$sub_category','$product_type','$rate','$brand','$capacity','$or','$pack','$barcode_id')";
mysql_query($sql);




}




	
if($l==2)
{
include_once('connection2.php');

$sql = "INSERT INTO `product_name` (`user_id`, `category`, `product_name`, `product_id`, `buying_price`, `selling_price`, `details`, `sub_category_id`, `product_type2`, `rate`, `brand`, `capacity`, `orr`, `pack`) VALUES ('','$category','$product_name','$product_id','$buying_price','$selling_price','$details','$sub_category','$product_type','$rate','$brand','$capacity','$or','$pack')";
mysql_query($sql);

}





	
if($l==3)
{
include_once('connection3.php');
$sql = "INSERT INTO `product_name` (`user_id`, `category`, `product_name`, `product_id`, `buying_price`, `selling_price`, `details`, `sub_category_id`, `product_type2`, `rate`) VALUES ('','$category','$product_name','$product_id','$buying_price','$selling_price','$details','$sub_category','$product_type','$rate')";
mysql_query($sql);
}



	
if($l==4)
{
include_once('connection4.php');
$sql = "INSERT INTO `product_name` (`user_id`, `category`, `product_name`, `product_id`, `buying_price`, `selling_price`, `details`, `sub_category_id`, `product_type2`, `rate`) VALUES ('','$category','$product_name','$product_id','$buying_price','$selling_price','$details','$sub_category','$product_type','$rate')";
mysql_query($sql);
}



	
if($l==5)
{
include_once('connection5.php');
$sql = "INSERT INTO `product_name` (`user_id`, `category`, `product_name`, `product_id`, `buying_price`, `selling_price`, `details`, `sub_category_id`, `product_type2`, `rate`) VALUES ('','$category','$product_name','$product_id','$buying_price','$selling_price','$details','$sub_category','$product_type','$rate')";
mysql_query($sql);
}



	
if($l==6)
{
include_once('connection6.php');
$sql = "INSERT INTO `product_name` (`user_id`, `category`, `product_name`, `product_id`, `buying_price`, `selling_price`, `details`, `sub_category_id`, `product_type2`, `rate`) VALUES ('','$category','$product_name','$product_id','$buying_price','$selling_price','$details','$sub_category','$product_type','$rate')";
mysql_query($sql);
}

















}


include_once('s.php');
}

}



include_once('connection11.php');



print"

<html>

<head>
<title> New Product Name </title>
";


include_once('style.php');



print"


<style>

#category

{

width:180px;	
}

</style>


<script language='javascript'>

function on()
{
	
document.f.submit();	
}
</script>

</head>


<body>
";


include_once('header.php');

include_once('ppp.php');


print"
<table align='center' width='1200' cellpadding='0' cellspacing='1' height='800' bgcolor='gray'>
<tr bgcolor='white'> 
<td align='center' valign='top' width='220' bgcolor='#C5B991'>  

<table align='center' width='200' cellpadding='0' cellspacing='0' height=''>

<tr> <td height='10'> </td></tr>


<tr> <td height='30' width='200' bgcolor='green'>   <span id='child'> <b> <font color='white'>Create</font> </b> </span>  </td></tr>

<tr> <td height='7'> </td></tr>





";


include_once('create_left.php');


print"
















<td align='center' valign='top' width='980'>  

<form name='f' action='product_name.php' method='POST'>

<table align='center' width='400' cellpadding='0' cellspacing='0'>
<tr> <td height='20'>  </td> </tr>
</table>



<table align='center' width='500' cellpadding='0' cellspacing='0'>
<tr> <td align='center' height='28' bgcolor='#7087A3' id='tda'>  <font face='arial' color='white' size='2'> <b> New Product Name  </b> </font> </td> </tr>
</table>





<table align='center' width='500' cellpadding='0' cellspacing='0' bgcolor='EFEBEB'>
<tr> <td align='center' height='30' bgcolor=''>   </td> <td> </td> </tr>


<tr> 
     <td  bgcolor='' align='right' height='0'> <font face='arial' size='2'> Select Category : </font>   </td>
     <td align='left'>&nbsp;
	 
<select  name='category'  id='p_n' onchange='on()'>

<option value='$category'> $category_name </option>
";

//$result = mysql_query("SELECT * FROM product_category");


$result = mysql_query("SELECT * FROM `product_category`  ORDER BY `user_id` ASC  LIMIT 0 , 60000 ");


while ($a_row = mysql_fetch_row($result)) {

	foreach ($a_row as $field) {
		
	}

print"
<option value='$a_row[0]'> $a_row[1] </option>
";
}


print"
</select>


<input type='hidden'  name='ser' value='1'>
<input type='hidden'  name='pas' value='$pas'>

	 </td> 
	 
</form>

<form action='product_name.php' method='POST'>
</tr>

<tr> <td height='10'> </td> </tr>




<tr> 
     <td  bgcolor='' align='right' height='0'> <font face='arial' size='2'> Select Sub Category : </font>   </td>
     <td align='left'>&nbsp;
	 
<select   id='p_n' name='sub_category'>

<option value='$sub_category'> $sub_category_name </option>
";

//$result = mysql_query("SELECT * FROM product_category");


$result = mysql_query("SELECT * FROM `product_sub_category` where category_id='$category'  ORDER BY `user_id` ASC  LIMIT 0 , 60000 ");


while ($a_row = mysql_fetch_row($result)) {

	foreach ($a_row as $field) {
		
	}

print"
<option value='$a_row[0]'> $a_row[2] </option>
";
}


print"
</select>
	 </td> 
</tr>

<tr> <td height='10'> </td> </tr>










<tr> 
     <td  bgcolor='' align='right' height='0'> <font face='arial' size='2'> Product Name : </font>   </td>
     <td align='left'>&nbsp; <input type='text'  id='p_n'  name='product_name' size='25'> </td> 
</tr>

<tr> <td height='10'> </td> </tr>

";


if($cwp1==1)
{
print"
<tr> 
     <td  bgcolor='' align='right' height='0'> <font face='arial' size='2'> $cwp11  : </font>   </td>
     <td align='left'>&nbsp; 
	 

	 
 <input type='text'  id='p_n'  name='product_id' size='25'> </td> 

	 
	 </td> 
</tr>

<tr> <td height='10'> </td> </tr>
";
}






if($cwp2==1)
{
print"
<tr> 
     <td  bgcolor='' align='right' height='0'> <font face='arial' size='2'> $cwp22 : </font>   </td>
     <td align='left'>&nbsp;

 <input type='text'   id='p_n' name='brand' size='25'> </td> 
</tr>

<tr> <td height='10'> </td> </tr>
";
}




if($cwp3==1)
{
print"
<tr> 
     <td  bgcolor='' align='right' height='0'> <font face='arial' size='2'> $cwp33 : </font>   </td>
     <td align='left'>&nbsp; <input type='text' id='p_n' name='capacity' size='25'> </td> 
</tr>

<tr> <td height='10'> </td> </tr>
";
}



if($cwp4==1)
{
print"
<tr> 
     <td  bgcolor='' align='right' height='0'> <font face='arial' size='2'> $cwp44 : </font>   </td>
     <td align='left'>&nbsp; <input type='text' id='p_n' name='or' size='25'> </td> 
</tr>

<tr> <td height='10'> </td> </tr>
";
}


/*


print"
<tr> 
     <td  bgcolor='' align='right' height='0'> <font face='arial' size='2'> Pack Size : </font>   </td>
     <td align='left'>&nbsp; <input type='text' id='p_n' name='pack' size='25'> </td> 
</tr>

<tr> <td height='10'> </td> </tr>
";

*/





print"
<tr> 
     <td  bgcolor='' align='right' height='0'> <font face='arial' size='2'> Buying Price : </font>   </td>
     <td align='left'>&nbsp; <input type='text'  id='p_n'  name='buying_price' size='25'> </td> 
</tr>

<tr> <td height='10'> </td> </tr>




<tr> 
     <td  bgcolor='' align='right' height='0'> <font face='arial' size='2'> Selling Price : </font>   </td>
     <td align='left'>&nbsp; <input type='text'  id='p_n'  name='selling_price' size='25'> </td> 
</tr>

<tr> <td height='10'> </td> </tr>

";

/*



<tr> 
     <td  bgcolor='' align='right' height='0' valign='top'> <font face='arial' size='2'> Details : </font>   </td>
     <td align='left'>&nbsp; <textarea rows='3' cols='19'  id='p_n' name='details'> </textarea> </td> 
</tr>

<tr> <td height='10'> </td> </tr>
";

*/





print"

<tr> 
     <td  bgcolor='' align='right' height='0' valign='top'> <font face='arial' size='2'> Product Unit : </font>   </td>
     <td align='left'>&nbsp; 
	 

<select name='product_type'  id='p_n'>

<option value='$product_type'> $product_type </option>
";

//$result = mysql_query("SELECT * FROM product_category");


$result = mysql_query("SELECT * FROM `product_type`  ORDER BY `user_id` ASC  LIMIT 0 , 60000 ");


while ($a_row = mysql_fetch_row($result)) {

	foreach ($a_row as $field) {
		
	}

print"
<option value='$a_row[1]'> $a_row[1] </option>
";
}


print"
</select>



	 
	 
	 </td> 
</tr>

<tr> <td height='10'> </td> </tr>



<tr> 
     <td  bgcolor='' align='right' height='0'> <font face='arial' size='2' color='red'> ( Signal ) </font> <font face='arial' size='2'> Minimum Piece : </font>   </td>
     <td align='left'>&nbsp; <input type='text'  id='p_n'  name='rate' size='25'> </td> 
</tr>

<tr> <td height='10'> </td> </tr>


<tr> 
     <td  bgcolor='' align='right' height='0'> <font face='arial' size='2' color='black'>  </font> <font face='arial' size='2'> Barcode_ID : </font>   </td>
     <td align='left'>&nbsp; <input type='text'  id='p_n'  name='barcode_id' size='25'> </td> 
</tr>

<tr> <td height='10'> </td> </tr>





<tr> 
     <td height='20' bgcolor='' align='right' valign='top'>   </td>
     <td align='left'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

<input type='hidden'  name='ser' value='10'>
<input type='hidden'  name='pas' value='$pas'>
<input type='hidden'  name='category' value='$category'>

 <input type='Submit' id='qq' value='Save'>  


</td> </tr></td> 
</tr>



<tr> <td align='center' height='30' bgcolor=''>   </td> <td> </td> </tr>

</table>





<table align='center' width='500' cellpadding='0' cellspacing='0'>
<tr> <td align='center' height='28' bgcolor='#7087A3' id='tdt'>  <font face='arial' color='white' size='2'> <b>   </b> </font> </td> </tr>
</table>





</form>



</td>


</tr>
</table>




</body>

</html>


";


?>