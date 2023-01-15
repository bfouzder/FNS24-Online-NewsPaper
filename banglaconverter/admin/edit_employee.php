<?php

include_once('dbconnection.php');




$deg_name=trim($_POST['deg_name']);

$em_type=trim($_POST['em_type']);


if($em_type==1)
{
$em_typen="Head Office";
}

if($em_type==2)
{
$em_typen="Factory";
}




$ser=trim($_POST['ser']);

$s=trim($_POST['s']);



$d=$_GET['dell'];





if($d!="")
{

//$result = mysql_query("DELETE FROM teacher_profile WHERE user_id=$d");

	
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


include_once('header2.php');


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



<table align='center' width='900' cellpadding='0' cellspacing='0'>
<tr> <td height='10'>  </td> </tr>
</table>



<table align='center' width='950' cellpadding='0' cellspacing='0'>
<tr> <td align='center' height='28' bgcolor='#7087A3' id='tda'>  <font face='arial' color='white' size='2'> <b> Edit Employee Profile </b> </font> </td> </tr>
</table>


<form action='edit_employee.php' method='POST'>

<table align='center' width='700' cellpadding='0' cellspacing='0'>
<tr> <td align='center' height='128' bgcolor='' id='tda'>  <font face='arial' color='black' size='4'> <b> 


Select Office / Factory  : 

<select name='em_type' id='enter2'>

<option value='$em_type'>$em_typen</option>

<option value=''>All</option>
<option value='1'>Head Office</option>
<option value='2'>Factory</option>

</select>

<input type='submit' value='Search' id='enter2'>

  </b> </font> </td> </tr>
</table>

</form>




<table align='center' width='950' cellpadding='2'  bgcolor='cccccc' cellspacing='1'>

<tr bgcolor='F2F2F2'> 

<td width='10' align='center' height='20' bgcolor=''> <font face='arial' size='2'>  <b> SN. </b> </font>  </td> 

<td width='150' align='center' height='20' bgcolor=''> <font face='arial' size='2'>  <b> Picture </b> </font>  </td> 

<td width='100' align='center' height='20' bgcolor=''> <font face='arial' size='2'> <b> Name  </b> </font>  </td> 

<td width='100' align='center' height='20' bgcolor=''> <font face='arial' size='2'> <b> Designation  </b> </font>  </td> 


<td width='100' align='center' height='20' bgcolor=''> <font face='arial' size='2'> <b>  Joining Date </b> </font>  </td> 


<td width='100' align='center' height='20' bgcolor=''> <font face='arial' size='2'> <b> Mobile </b> </font>  </td> 


<td width='50' align='center'> <font face='arial' size='2'> <b> ID </b> </font>  </td> 



<td width='50' align='center'> <font face='arial' size='2'> <b> Sl. </b> </font>  </td> 




<td width='50' height='30' align='center'><font face='arial' size='2'> <b> Edit </b></font>  </td> 



<td width='50' align='center'><font face='arial' size='2'> <b> Delete </b> </font>  </td> 
</tr>
";


if($em_type==1||$em_type==2)
{
$result = mysql_query("SELECT * FROM `teacher_profile` where type='$em_type' ORDER BY `sl` ASC  LIMIT 0 , 60000 ");
}
else
{
$result = mysql_query("SELECT * FROM `teacher_profile`  ORDER BY `sl` ASC  LIMIT 0 , 60000 ");

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
<form action='edit_employee_profile.php' method='POST' target='_blank'>
<td width='' align='center' height='20' bgcolor=''> $x  </td> 

<td width='160' align='center' height='20' bgcolor=''> <img src='employee/$a_row[9]' width='80' height='83'>  </td> 

<td width='150' align='left' height='20' bgcolor=''>  <font face='arial' size='2'>  $a_row[2] </font>  </td> 

<td width='150' align='left' height='20' bgcolor=''>  <font face='arial' size='2'>  $a_row[1] </font>  </td> 


<td width='100' align='center' height='20' bgcolor=''> <font face='arial' size='2'> <b>  $a_row[12]- $a_row[13]- $a_row[14] </b> </font>  </td> 

<td width='150' align='center' height='20' bgcolor=''>  <font face='arial' size='2'>  $a_row[5] </font>  </td> 



<td width='50' align='center' height='20' bgcolor=''>  <font face='arial' size='2'>  $a_row[6] </font>  </td> 
";

if($a_row[15]==1)
{
$av="Active";
}
else
{
$av="Not Active";

}

print"

<td width='50' align='center' height='20' bgcolor=''>  <font face='arial' size='2'>  $a_row[16] - $av </font>  </td> 




<td width='50' height='30' align='center'><font face='arial' size='2'> 
<input type='hidden' name='s' value='$a_row[0]'>
<input type='hidden' name='ser' value='10'>
<input type='hidden' name='search_year' value='$search_yearn'>

<input type='submit' value='Edit'> </font>  
</td> 
</form>








	 <td align='center' width='70'> <a onClick=\"javascript: return confirm('Are you confirm to delete');\" href=\"edit_employee.php?dell=".$a_row[0]."\"> <div id='del'><font face='arial' size='2'> Delete  </font> </div>  </a> </td>




</tr>
";

}



print"

</table>


<br>
<br>




<form action='employee_print.php' method='POST' target='_blank'>

&nbsp;&nbsp;&nbsp;&nbsp;

<font face='arial' size='2'> Active / Inactive </font> 

<input type='checkbox' name='active'   value='1'> &nbsp;

<input type='hidden' name='em_type'   value='$em_type'> &nbsp;


<input type='submit' value='Print'>

</form>



</td>


</tr>
</table>




</body>

</html>


";


?>