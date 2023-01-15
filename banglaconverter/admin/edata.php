<?php

include_once('dbconnection.php');



$ser=trim($_POST['ser']);




$wrong=trim($_POST['wrong']);
$right=trim($_POST['right']);
$button=trim($_POST['button']);





$s=trim($_POST['s']);


$d=$_GET['dell'];

//print" $category_name - $details ";



if($ser==10)
{


$sql= "UPDATE  `right_word` SET `wrong`='$wrong' WHERE `user_id`='$s'";
mysql_query($sql);

$sql= "UPDATE  `right_word` SET `right_w`='$right' WHERE `user_id`='$s'";
mysql_query($sql);

$sql= "UPDATE  `right_word` SET `button`='$button' WHERE `user_id`='$s'";
mysql_query($sql);

include_once('s.php');
}




if($d!="")
{

$result = mysql_query("DELETE FROM right_word WHERE user_id=$d");

	
}





print"

<html>

<head>
<title> Edit Wrong Word </title>
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


<tr> <td height='30' width='200' bgcolor='green'> &nbsp;&nbsp;&nbsp;  <span id='child'> <b> <font color='white'> Edit Wrong Word  </font> </b> </span>  </td></tr>

<tr> <td height='7'> </td></tr>


";


include_once('edit_left.php');


print"
















<td align='center' valign='top' width='980'>  



<table align='center' width='700' cellpadding='0' cellspacing='0'>
<tr> <td height='10'>  </td> </tr>
</table>



<table align='center' width='900' cellpadding='0' cellspacing='0'>
<tr> <td align='center' height='28' bgcolor='#7087A3' id='tda'>  <font face='arial' color='white' size='2'> <b> Edit Wrong Word   </b> </font> </td> </tr>
</table>





<table align='center' width='900' cellpadding='1' cellspacing='1' bgcolor='EFEBEB'>




<tr bgcolor='gray' height='40'> 
     <td  bgcolor='' align='center' height='0' width=''> <font face='arial' size='2'> Wrong </font> </td>
     <td align='center' width=''> <font face='arial' size='2'> Right </font> </td>
        <td align='center' width=''> <font face='arial' size='2'> Button </font> </td>  
     
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


$d=11;

//$result = mysql_query("SELECT * FROM product_category");


$result = mysql_query("SELECT * FROM `right_word`  ORDER BY `user_id` ASC  LIMIT 0 , 6000000 ");

while ($a_row = mysql_fetch_row($result)) {

	foreach ($a_row as $field) {
		
	}


print"
<tr bgcolor='white' height='40'> 

<form action='edata.php' method='POST'>
     <td  bgcolor='' align='center' height='0' width='180'> <font face='arial' size='2'> <input type='text' name='wrong' value='$a_row[1]' size='30'>  </font> </td>
     <td align='center' width='180'> <font face='arial' size='2'> <input type='text' name='right' value='$a_row[2]' size='30'> </font> </td> 
	 
     <td align='center' width='180'> <font face='arial' size='2'> <input type='text' name='button' value='$a_row[3]' size='10'> </font> </td> 
	 	 
		
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
	 <td align='center' width='70'> <a onClick=\"javascript: return confirm('Are you confirm to delete Please Call 01686797756');\" href=\"edata.php?dell=".$a_row[0]."\"> <div id='del'><font face='arial' size='2'> Delete  </font> </div>  </a> </td>
	 ";
	 
}
	 
print"
</tr>
";


}









print"
<tr> <td align='center' height='30' bgcolor=''>   </td> <td> </td> </tr>

</table>





<table align='center' width='900' cellpadding='0' cellspacing='0'>
<tr> <td align='center' height='28' bgcolor='#7087A3' id='tdt'>  <font face='arial' color='white' size='2'> <b>   </b> </font> </td> </tr>
</table>









</td>


</tr>
</table>




</body>

</html>


";


?>