<?php

//include_once('session.php');

include_once('dbconnection.php');




$deg_name=trim($_POST['deg_name']);

$sql="SELECT * FROM `designation` WHERE user_id='$deg_name' ";
$result=mysql_query($sql);
$arrg=mysql_fetch_array($result);
$deg=$arrg[1];


/*

$branch_name=trim($_POST['branch_name']);
$branch_address=trim($_POST['branch_address']);
$type=trim($_POST['type']);





if($ser==10)
{



$sql= "UPDATE  `class` SET `branch_name`='$branch_name' WHERE `user_id`='$s'";
mysql_query($sql);

$sql= "UPDATE  `class` SET `branch_address`='$branch_address' WHERE `user_id`='$s'";
mysql_query($sql);

$sql= "UPDATE  `class` SET `type`='$type' WHERE `user_id`='$s'";
mysql_query($sql);


include_once('s.php');
}



*/




$ser=trim($_POST['ser']);

$s=trim($_POST['s']);




if($ser==11)
{

$result = mysql_query("DELETE FROM teacher_profile WHERE user_id=$s");

include_once('d.php');
}













print"

<html>

<head>
<meta http-equiv='content-type' content='text/html;charset=utf-8' />
<title> Edit Teacher Profile </title>


<style>

body
{
margin-top:0px;
}
";


include_once('style_cur.php');

print"
</style>
";

include_once('js.php');

print"
</head>



<body>
";



include_once('banner.php');



print"

<table align='center' width='1000' cellpadding='0' cellspacing='1' bgcolor='cccccc'>
<tr bgcolor='white'> 

<td align='center' width='210' height='400' valign='top'> 

<table align='center' width='200' cellpadding='3' cellspacing='0'>


<tr>
<td height='25'>  </td>
</tr>
";



include_once('left-link2.php');





print"

<tr bgcolor=''>
<td height='25' align='left'>  </td>
</tr>





</table>

</td>





";

///////////////////////////////////////////////////////////////////////////////////

print"

  
<td align='center' width='790' valign='top'> 

<table align='center' width='700' cellpadding='0' cellspacing='0'>




<tr>
<td align='center' height='50'>
</tr>


<tr>
<td align='center' height='50'>




<form action='eteacher_profile.php' method='POST'>


<table align='center' width='700' cellpadding='0' cellspacing='0'>
<tr> <td align='center' height='28' bgcolor='#7087A3' id='tda'>  <font face='arial' color='white' size='2'> <b> Edit Teacher Profile  </b> </font> </td> </tr>
</table>


<table align='center' width='700' cellpadding='0'  bgcolor='white' cellspacing='0'>

<tr>  <td width='0' height='10'> </td>   </tr>
";
include_once('year.php');
print"
</table>

<table align='center' width='700' cellpadding='0'  bgcolor='white' cellspacing='0'>
<tr bgcolor=''>

<td width='160'> </td>

<td height='40' align='left'> <font face='arial' size='2'> Select Designation: </font> 

<select name='deg_name'>

<option value='$deg_name'> $deg </option>

";

$result = mysql_query("SELECT * FROM designation");

while ($a_row = mysql_fetch_row($result)) {

	foreach ($a_row as $field) {
		
	}
print"
<option value='$a_row[0]'> $a_row[1] </option>
";

}


print"
<option value=''> All </option>
</select>


<input type='submit' value='Search'>

</td> 

</form>
</tr>
</table>


<table align='center' width='700' cellpadding='0'  bgcolor='cccccc' cellspacing='1'>

<tr bgcolor='F2F2F2'> 


<td width='150' align='center' height='20' bgcolor=''> <font face='arial' size='2'>  <b> Picture </b> </font>  </td> 

<td width='100' align='center' height='20' bgcolor=''> <font face='arial' size='2'> <b> Name  </b> </font>  </td> 


<td width='100' align='center' height='20' bgcolor=''> <font face='arial' size='2'> <b>  Joining Date </b> </font>  </td> 


<td width='100' align='center' height='20' bgcolor=''> <font face='arial' size='2'> <b> Mobile </b> </font>  </td> 


<td width='50' align='center'> <font face='arial' size='2'> <b> Id </b> </font>  </td> 



<td width='50' align='center'> <font face='arial' size='2'> <b> Sl. </b> </font>  </td> 




<td width='50' height='30' align='center'><font face='arial' size='2'> <b> Edit </b></font>  </td> 



<td width='50' align='center'><font face='arial' size='2'> <b> Delete </b> </font>  </td> 
</tr>
";


if($deg_name=="")
{
$result = mysql_query("SELECT * FROM `teacher_profile`  ORDER BY `sl` ASC  LIMIT 0 , 600 ");

}


if($deg_name!="")
{
$result = mysql_query("SELECT * FROM `teacher_profile` where deg_name='$deg_name'  ORDER BY `sl` ASC  LIMIT 0 , 600 ");

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
<tr bgcolor='pink'> 
";
}


print"
<form action='eeteacher_profile.php' method='POST'>
<td width='160' align='center' height='20' bgcolor=''> <img src='teacher/$a_row[9]' width='80' height='83'>  </td> 

<td width='150' align='center' height='20' bgcolor=''>  <font face='arial' size='2'>  $a_row[2] </font>  </td> 



<td width='100' align='center' height='20' bgcolor=''> <font face='arial' size='2'> <b>  $a_row[12]- $a_row[13]- $a_row[14] </b> </font>  </td> 

<td width='150' align='center' height='20' bgcolor=''>  <font face='arial' size='2'>  $a_row[5] </font>  </td> 



<td width='50' align='center' height='20' bgcolor=''>  <font face='arial' size='2'>  $a_row[6] </font>  </td> 


<td width='50' align='center' height='20' bgcolor=''>  <font face='arial' size='2'>  $a_row[16] </font>  </td> 




<td width='50' height='30' align='center'><font face='arial' size='2'> 
<input type='hidden' name='s' value='$a_row[0]'>
<input type='hidden' name='ser' value='10'>
<input type='hidden' name='search_year' value='$search_yearn'>

<input type='submit' value='Edit'> </font>  
</td> 
</form>



<form action='eteacher_profile.php' method='POST'>
<td width='50' align='center'>

<font face='arial' size='2'> 
<input type='hidden' name='s' value='$a_row[0]'>
<input type='hidden' name='ser' value='11'>

<input type='hidden' name='deg_name' value='$deg_name'>
<input type='hidden' name='search_year' value='$search_yearn'>


<input type='submit' value='Delete'> </font>  
</td> 
</form>
</tr>
";

}



print"

<tr> <td align='center' height='20' bgcolor=''>   </td> <td> </td> </tr>

</table>






<table align='center' width='700' cellpadding='0' cellspacing='0'>
<tr> <td align='center' height='28' bgcolor='#7087A3' id='tdt'>  <font face='arial' color='white' size='2'> <b>   </b> </font> </td> </tr>
</table>



";











print"


</td>
</tr>

</table>

</td>  



</tr>
</table>

";











include_once('../address.php');



print"
</body>
</html>

";


?>