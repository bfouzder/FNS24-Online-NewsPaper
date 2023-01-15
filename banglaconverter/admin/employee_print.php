<?php

include_once('dbconnection.php');

$em_type=trim($_POST['em_type']);


if($em_type==1)
{
$em_typen="Head Office";
}

if($em_type==2)
{
$em_typen="Factory";
}



$active=trim($_POST['active']);



$ser=trim($_POST['ser']);

$s=trim($_POST['s']);




if($active==1)
{
$tn="Active";
}
else
{
$tn="In-Active";
}





print"

<html>

<head>
<title> Edit Employee Profile </title>
";


include_once('style.php');


print"
</head>


<body>
";


include_once('address.php');


print"
<table align='center' width='1200' cellpadding='0' cellspacing='' height='' bgcolor=''>
<tr bgcolor='white'> 
<td align='center' valign='top' width='' bgcolor=''>  


<table align='center' width='950' cellpadding='0' cellspacing='0'>
<tr> <td align='center' height='28' bgcolor='' >  <font face='arial' color='black' size='5'> <b> Employee Lists [$tn] <br> $em_typen </b> </font> </td> </tr>
</table>


<br>



<table align='center' width='1200' cellpadding='4'  bgcolor='cccccc' cellspacing='1'>

<tr bgcolor='F2F2F2'> 

<td width='10' align='center' height='20' bgcolor=''> <font face='arial' size='4'>  <b> SN. </b> </font>  </td> 

<td width='150' align='center' height='20' bgcolor=''> <font face='arial' size='4'>  <b> Picture </b> </font>  </td> 

<td width='100' align='center' height='20' bgcolor=''> <font face='arial' size='4'> <b> Name  </b> </font>  </td> 

<td width='100' align='center' height='20' bgcolor=''> <font face='arial' size='4'> <b> Designation  </b> </font>  </td> 


<td width='100' align='center' height='20' bgcolor=''> <font face='arial' size='4'> <b>  Joining Date </b> </font>  </td> 


<td width='100' align='center' height='20' bgcolor=''> <font face='arial' size='4'> <b> Mobile </b> </font>  </td> 


<td width='50' align='center'> <font face='arial' size='4'> <b> ID </b> </font>  </td> 



<td width='50' align='center'> <font face='arial' size='4'> <b> Sl. </b> </font>  </td> 


</tr>
";






if($em_type==1||$em_type==2)
{
$result = mysql_query("SELECT * FROM `teacher_profile` where active='$active' && type='$em_type' ORDER BY `sl` ASC  LIMIT 0 , 60000 ");
}
else
{
$result = mysql_query("SELECT * FROM `teacher_profile` where active='$active' ORDER BY `sl` ASC  LIMIT 0 , 60000 ");

}





while ($a_row = mysql_fetch_row($result)) {

	foreach ($a_row as $field) {
		
	}

if($a_row[15]==1)
{
print"
<tr bgcolor='white'> 
";
}
else
{
print"
<tr bgcolor='Yellow'> 
";
}

$x++;

print"
<td width='' align='center' height='20' bgcolor=''> $x  </td> 

<td width='160' align='center' height='20' bgcolor=''> <img src='employee/$a_row[9]' width='80' height='83'>  </td> 

<td width='150' align='left' height='20' bgcolor=''>  <font face='arial' size='4'>  $a_row[2] </font>  </td> 

<td width='150' align='left' height='20' bgcolor=''>  <font face='arial' size='4'>  $a_row[1] </font>  </td> 


<td width='100' align='left' height='20' bgcolor=''> <font face='arial' size='4'> <b>  $a_row[12]- $a_row[13]- $a_row[14] </b> </font>  </td> 

<td width='150' align='left' height='20' bgcolor=''>  <font face='arial' size='4'>  $a_row[5] </font>  </td> 



<td width='50' align='center' height='20' bgcolor=''>  <font face='arial' size='4'>  $a_row[6] </font>  </td> 


<td width='50' align='center' height='20' bgcolor=''>  <font face='arial' size='4'>  $a_row[16] </font>  </td> 




</tr>
";

}



print"

</table>




</td>


</tr>
</table>




</body>

</html>


";


?>