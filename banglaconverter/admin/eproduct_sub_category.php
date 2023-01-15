<?php

include_once('dbconnection.php');



$ser=trim($_POST['ser']);

$product_name=trim($_POST['sub_category']);
$product_name=str_replace("'","`","$product_name");







$s=trim($_POST['s']);
$d=$_GET['dell'];

//print" $category_name - $details ";



if($ser==10)
{



for($l=1;$l<=$branch_control;$l++)
{
	
if($l==1)
{
include_once('connection1.php');

$sql= "UPDATE  `product_sub_category` SET `sub_category_id`='$product_name' WHERE `user_id`='$s'";
mysql_query($sql);
}


if($l==2)
{
include_once('connection2.php');

$sql= "UPDATE  `product_sub_category` SET `sub_category_id`='$product_name' WHERE `user_id`='$s'";
mysql_query($sql);
}




if($l==3)
{
include_once('connection3.php');

$sql= "UPDATE  `product_sub_category` SET `sub_category_id`='$product_name' WHERE `user_id`='$s'";
mysql_query($sql);
}


if($l==4)
{
include_once('connection4.php');

$sql= "UPDATE  `product_sub_category` SET `sub_category_id`='$product_name' WHERE `user_id`='$s'";
mysql_query($sql);
}


if($l==5)
{
include_once('connection5.php');

$sql= "UPDATE  `product_sub_category` SET `sub_category_id`='$product_name' WHERE `user_id`='$s'";
mysql_query($sql);
}



if($l==6)
{
include_once('connection6.php');

$sql= "UPDATE  `product_sub_category` SET `sub_category_id`='$product_name' WHERE `user_id`='$s'";
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
$result = mysql_query("DELETE FROM product_sub_category WHERE user_id=$d");
}


if($l==2)
{
include_once('connection2.php');
//$result = mysql_query("DELETE FROM product_sub_category WHERE user_id=$d");
}


if($l==3)
{
include_once('connection3.php');
//$result = mysql_query("DELETE FROM product_sub_category WHERE user_id=$d");
}



if($l==4)
{
include_once('connection4.php');
//$result = mysql_query("DELETE FROM product_sub_category WHERE user_id=$d");
}



if($l==5)
{
include_once('connection5.php');
//$result = mysql_query("DELETE FROM product_sub_category WHERE user_id=$d");
}



if($l==6)
{
include_once('connection6.php');
//$result = mysql_query("DELETE FROM product_sub_category WHERE user_id=$d");
}





}

	
}



include_once('connection11.php');



$l=0;

print"

<html>

<head>
<title> Edit Product Sub Category Name </title>
";


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


<tr> <td height='30' width='200' bgcolor='green'>  <span id='child'> <b> <font color='white'> Edit </font> </b> </span>  </td></tr>

<tr> <td height='7'> </td></tr>





";


include_once('edit_left.php');


print"
















<td align='center' valign='top' width='980'>  



<table align='center' width='700' cellpadding='0' cellspacing='0'>
<tr> <td height='10'>  </td> </tr>
</table>



<table align='center' width='800' cellpadding='0' cellspacing='0'>
<tr> <td align='center' height='28' bgcolor='#7087A3' id='tda'>  <font face='arial' color='white' size='2'> <b> Edit Product Sub Category    </b> </font> </td> </tr>
</table>





<table align='center' width='800' cellpadding='1' cellspacing='1' bgcolor='EFEBEB'>




<tr bgcolor='gray' height='40'> 
     <td  bgcolor='' align='center' height='0' width=''> <font face='arial' size='2'> Category Name </font> </td>
     <td align='center' width=''> <font face='arial' size='2'> Sub Category Name </font> </td>

	 
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



$d=11;

//$result = mysql_query("SELECT * FROM product_category");

for($i=1;$i<=$ty;$i++)
{
	
print"
<tr bgcolor='white' height='40' align='center'> 
<td bgcolor='green'> <font face=='arail' size='2' color='white'> <b> $c_name[$i] </b> </font> </td>
</tr>
";	

$result = mysql_query("SELECT * FROM `product_sub_category` where category_id='$c_id[$i]' ORDER BY `user_id` ASC  LIMIT 0 , 60000 ");

while ($a_row = mysql_fetch_row($result)) {

	foreach ($a_row as $field) {
		
	}


print"
<tr bgcolor='white' height='40'> 

<form action='eproduct_sub_category.php' method='POST'>

<td> </td>
	
	    <td  bgcolor='' align='center' height='0' width='450'> <font face='arial' size='2'> <input type='text' name='sub_category' value='$a_row[2]' size='30'>  </font> </td>
		
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
	 
	 <td align='center' width='70'> <a onClick=\"javascript: return confirm('Are you confirm to delete');\" href=\"eproduct_sub_category.php?dell=".$a_row[0]."\"> <div id='del'><font face='arial' size='2'> Delete  </font> </div>  </a> </td>
	 ";
	 
}
print"
</tr>
";


}


}









print"
<tr> <td align='center' height='30' bgcolor=''>   </td> <td> </td> </tr>

</table>





<table align='center' width='800' cellpadding='0' cellspacing='0'>
<tr> <td align='center' height='28' bgcolor='#7087A3' id='tdt'>  <font face='arial' color='white' size='2'> <b>   </b> </font> </td> </tr>
</table>









</td>


</tr>
</table>




</body>

</html>


";


?>