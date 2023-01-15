<?php
include_once('dbconnection.php');

$ser=trim($_POST['ser']);

$category=trim($_POST['category']);
$sub_category=trim($_POST['sub_category']);




$category=str_replace("'","`","$category");
$sub_category=str_replace("'","`","$sub_category");






$sql="SELECT * FROM `product_category` WHERE user_id='$category' ";
$result=mysql_query($sql);
$arr=mysql_fetch_array($result);
$category_name=$arr[1];





if($ser==1)
{
$a=0;



if($a==0)
{

if($category=="" || $sub_category=="")
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

	
$sql = "INSERT INTO `product_sub_category` (`user_id`, `category_id`, `sub_category_id`) VALUES ('','$category','$sub_category')";
mysql_query($sql);

}







if($l==2)
{
	

include_once('connection2.php');


	
$sql = "INSERT INTO `product_sub_category` (`user_id`, `category_id`, `sub_category_id`) VALUES ('','$category','$sub_category')";
mysql_query($sql);

}






if($l==3)
{
include_once('connection3.php');
$sql = "INSERT INTO `product_sub_category` (`user_id`, `category_id`, `sub_category_id`) VALUES ('','$category','$sub_category')";
mysql_query($sql);
}


if($l==4)
{
include_once('connection4.php');
$sql = "INSERT INTO `product_sub_category` (`user_id`, `category_id`, `sub_category_id`) VALUES ('','$category','$sub_category')";
mysql_query($sql);
}

if($l==5)
{
include_once('connection5.php');
$sql = "INSERT INTO `product_sub_category` (`user_id`, `category_id`, `sub_category_id`) VALUES ('','$category','$sub_category')";
mysql_query($sql);
}


if($l==6)
{
include_once('connection6.php');
$sql = "INSERT INTO `product_sub_category` (`user_id`, `category_id`, `sub_category_id`) VALUES ('','$category','$sub_category')";
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
<title> New Product Sub Category </title>
";


include_once('style.php');



print"


<style>

#category

{

width:180px;	
}

</style>

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

<form action='product_sub_category.php' method='POST'>

<table align='center' width='400' cellpadding='0' cellspacing='0'>
<tr> <td height='20'>  </td> </tr>
</table>



<table align='center' width='400' cellpadding='0' cellspacing='0'>
<tr> <td align='center' height='28' bgcolor='#7087A3' id='tda'>  <font face='arial' color='white' size='2'> <b> New Product Sub Category  </b> </font> </td> </tr>
</table>





<table align='center' width='400' cellpadding='0' cellspacing='0' bgcolor='EFEBEB'>
<tr> <td align='center' height='30' bgcolor=''>   </td> <td> </td> </tr>


<tr> 
     <td  bgcolor='' align='right' height='0'> <font face='arial' size='2'> Select Category : </font>   </td>
     <td align='left'>&nbsp;
	 
<select id='c9' name='category'>

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
	 </td> 
</tr>

<tr> <td height='10'> </td> </tr>


<tr> 
     <td  bgcolor='' align='right' height='0'> <font face='arial' size='2'> Sub Category : </font>   </td>
     <td align='left'>&nbsp; <input type='text' id='c9' name='sub_category' size='25'> </td> 
</tr>

<tr> <td height='10'> </td> </tr>
















<tr> 
     <td height='20' bgcolor='' align='right' valign='top'>   </td>
     <td align='left'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

<input type='hidden'  name='ser' value='1'>
<input type='hidden'  name='pas' value='$pas'>

 <input type='Submit' id='qq' value='Save'>  


</td> </tr></td> 
</tr>



<tr> <td align='center' height='30' bgcolor=''>   </td> <td> </td> </tr>

</table>





<table align='center' width='400' cellpadding='0' cellspacing='0'>
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