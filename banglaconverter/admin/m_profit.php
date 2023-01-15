<?php

include_once('dbconnection.php');




$ser=trim($_POST['ser']);
$c=trim($_POST['c']);
$p=trim($_POST['p']);



$s=trim($_POST['s']);


if($ser==10)
{


$sql= "UPDATE  `m_profit` SET `credit`='$c' WHERE `user_id`='$s'";
mysql_query($sql);

$sql= "UPDATE  `m_profit` SET `amount`='$p' WHERE `user_id`='$s'";
mysql_query($sql);



include_once('s.php');
}


print"

<html>

<head>
<title> Monthly Profit </title>
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

//include_once('find_transection_left.php');

print"





<td align='center' valign='top' width='980'> 


";

include_once('address.php');

print"

<table align='center' width='1000' cellpadding='0' cellspacing='1' bgcolor='F9F4D8'>

<tr> 
<td width='1000' height='320' bgcolor='ECE9D8' valign='top'> 


";







print"

<table align='center' width='1000' cellpadding='0' cellspacing='1' bgcolor='F9F4D8'>

<tr> 
<td width='1000' height='320' bgcolor='ECE9D8' valign='top'> 

<table align='center' width='1000' cellpadding='0' cellspacing='0' bgcolor='F7D3F2'>
<tr> <td align='center' height='40'> <font face='arial' size='2'> Monthly Profit  </font> </td> </tr>
<tr> <td align='center' height='1' bgcolor='F9F4D8'> </td> </tr>
</table>









<table align='center' width='800' cellpadding='0' cellspacing='1' bgcolor='cccccc'>
";







print"
<tr bgcolor='F2F2F2'>  
<td width='200' height='30' align='center'> <font face='arial' size='2'> <b> Month Name </b> </font></td> 

<td width='200' align='center'> <font face='arial' size='2'> <b> Product Wise Profit   </b>  </font> </td> 

<td width='200' align='center'> <font face='arial' size='2'> <b> Total Cost </b>  </font> </td> 


<td width='200' align='center'> <font face='arial' size='2'> <b> Net Profit </b>  </font> </td> 
<td width='200' align='center'> <font face='arial' size='2'> <b> Balance </b>  </font> </td> 
<td width='200' align='center'> <font face='arial' size='2'> <b> Edit </b>  </font> </td> 


</tr>
";





$result = mysql_query("SELECT * FROM `m_profit`   ORDER BY `user_id` ASC  LIMIT 0 , 100000");


while ($a_row = mysql_fetch_row($result)) {

	foreach ($a_row as $field) {
		
	}


$ca=$ca+$a_row[2];
$pa=$pa+$a_row[3];

$ba=$a_row[3]-$a_row[2];
$baa=$baa+$ba;
$fba=$fba+$ba;


print"
<tr bgcolor='F2F2F2'> 
<form action='m_profit.php' method='POST'> 
<td width='200' height='50' align='center'> <font face='arial' size='2'> <b> $a_row[1] </b> </font></td> 

<td width='200' align='center'> <font face='arial' size='2'> <b> <input type='text' name='p' size='30' value='$a_row[3]'> </b>  </font> </td> 


<td width='200' align='center'> <font face='arial' size='2'> <b> <input type='text' name='c' size='30' value='$a_row[2]'> </b>  </font> </td> 



<td width='200' align='center'> <font face='arial' size='2'> <b> $ba </b>  </font> </td> 


<td width='200' align='center'> <font face='arial' size='2'> <b> $fba </b>  </font> </td> 




<td align='center'>


<input type='hidden' name='ser' value='10'>
<input type='hidden' name='s' value='$a_row[0]' >

<input type='submit' value='Edit'>

 </font> </td> 
</form>


</tr>
";



}






print"
<tr bgcolor='F2F2F2'>  
<td width='200' height='30' align='center'> <font face='arial' size='2'> <b> </b> </font></td> 
<td width='200' align='center'> <font face='arial' size='2'> <b> $pa </b>  </font> </td> 

<td width='200' align='center'> <font face='arial' size='2'> <b> $ca </b>  </font> </td> 
<td width='200' align='center'> <font face='arial' size='2'> <b> $baa  </b>  </font> </td> 


<td width='200' align='center'> <font face='arial' size='2'> <b> $fba </b>  </font> </td> 
<td width='200' align='center'> <font face='arial' size='2'> <b>   </b>  </font> </td> 



</tr>
";





print"
</table>
";







print"




</td>


</tr>
</table>




</body>

</html>


";


?>