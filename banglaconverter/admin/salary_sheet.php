<?php

include_once('dbconnection.php');




$ser=trim($_POST['ser']);
$s=trim($_POST['s']);

$em_type=trim($_POST['em_type']);


if($em_type==1)
{
$em_typen="Head Office";
}

if($em_type==2)
{
$em_typen="Factory";
}




$rss=trim($_POST['rs']);



$smon=trim($_POST['smon']);

$syer=trim($_POST['syer']);


$a=0;












if($ser==1)
{



if($a==0)

{



$p=0;

$result = mysql_query("SELECT * FROM `teacher_profile`  where active='1'  ORDER BY `sl` ASC  LIMIT 0 , 365 ");


while ($a_row = mysql_fetch_row($result)) {

	foreach ($a_row as $field) {
		
	}



$p++;

$ledger_id1[$p]=$a_row[0];
$name1[$p]=$a_row[2];
$designation1[$p]=$a_row[1];
$ac_no1[$p]=$a_row[6];
$active1[$p]=$a_row[15];
$abs1[$p]=$a_row[18];
$sl1[$p]=$a_row[16];
$adat="$syer$smon";
$new_type[$p]=$a_row[19];


}




for($i=1;$i<=$p;$i++)
{



$sql= "UPDATE  `salary_sheet` SET `type`='$new_type[$i]' WHERE `ledger_id`='$ledger_id1[$i]'";
mysql_query($sql);



$sql="SELECT * FROM `salary_sheet` WHERE smon='$smon' && syer='$syer' && ledger_id='$ledger_id1[$i]'";
$result=mysql_query($sql);
$arrw=mysql_fetch_array($result);

$vc=$arrw[1];



if($vc=="")
{

$ledger_id=$ledger_id1[$i];
$name=$name1[$i];
$designation=$designation1[$i];
$ac_no=$ac_no1[$i];
$sl=$sl1[$i];
$active=$active1[$i];
$abs=$abs1[$i];
$adat="$syer$smon";




$sql = "INSERT INTO `salary_sheet` (`user_id`, `ledger_id`, `name`, `designation`,`ac_no`,`gross_salary`,`deduction`, `incentive`, `p_fund`, `bonus`, `salary`, `smon`, `syer`, `advance`, `active`, `over_income`, `lunch_bill`, `residential`, `abs`, `adat`, `sl`) VALUES ('','$ledger_id','$name','$designation','$ac_no','$gross_salary','$deduction','$incentive','$p_fund','$bonus','$salary','$smon','$syer','$advance','$active','$over_income','$lunch_bill','$residential','$abs','$adat','$sl')";
mysql_query($sql);


include_once('s.php');
}


}





}



}













print"

<html>

<head>
<title> Salary Sheet </title>
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

function sv()
{
document.fk.submit();
}

</script>

</head>


<body>
";


include_once('address.php');


print"
<table align='center' width='1200' cellpadding='0' cellspacing='' height='' bgcolor=''>
<tr bgcolor='white'> 
<td align='center' valign='top' width='1200' bgcolor=''>  


<form action='salary_sheet.php' method='POST'>


<table align='center' width='400' cellpadding='0' cellspacing='0'>
<tr> <td height='0'>  </td> </tr>
</table>
";










print"
<table align='center' width='1200' cellpadding='0' cellspacing='0' bgcolor=''>
<tr> <td height='28' align='center' id='tda' bgcolor=''> <font size='5' face='arial' color='black'> Create Salary Sheet   </font> </td> </tr>
</table>


<br>
";



print"
<table align='center' width='1200' cellpadding='0' cellspacing='0' bgcolor=''>
<tr> <td height='38' align='center' id='' bgcolor=''> <font size='4' face='arial' color='black'> 

Select Office / Factory :

<select name='em_type'>

<option value='$em_type'>$em_typen</option>

<option value='0'>All</option>
<option value='1'>Head Office</option>
<option value='2'>Factory</option>

</select>

&nbsp;

Select Date : 

<select name='smon'>

<option>$smon</option>

<option>01</option>
<option>02</option>
<option>03</option>
<option>04</option>
<option>05</option>
<option>06</option>
<option>07</option>
<option>08</option>
<option>09</option>
<option>10</option>
<option>11</option>
<option>12</option>
</select>



<select name='syer'>

<option>$syer</option>
<option>2015</option>
<option>2016</option>
<option>2017</option>
<option>2018</option>
<option>2019</option>
<option>2020</option>
<option>2021</option>
<option>2022</option>
<option>2023</option>
<option>2024</option>
<option>2025</option>
</select>

<input type='hidden' name='ser' value='10'>

<input type='submit' value='Create'>



   </font> </td> 

</form>
<form  name='fk' action='salary_sheet.php' method='POST'>

</tr>
</table>
";



print"


<table align='center' width='1200' cellpadding='0' cellspacing='1' bgcolor='black'>
<tr bgcolor='#F2F2F2'> 

<td align='center' height='30' width='70'><font face='arial' size='2' color=''> Serial  </font> </td> 


<td align='center' height='30' width='70'><font face='arial' size='2' color=''>  E-SL. </font> </td> 


<td align='center' height='30' width='70'><font face='arial' size='2' color=''>  Name</font> </td> 
 
<td align='center' height='30' width='90'><font face='arial' size='2' color=''> Designation </font> </td> 

<td align='center' height='30' width='90'><font face='arial' size='2' color=''> ID NO. </font> </td> 

<td align='center' height='30' width='80'><font face='arial' size='2' color=''>  Salary </font> </td> 

<td align='center' height='30' width='80'><font face='arial' size='2' color=''>  Absent </font> </td> 


<td align='center' height='30' width='80'><font face='arial' size='2' color=''>  Overtime </font> </td>


<td align='center' height='30' width='80'><font face='arial' size='2' color=''>  Over Income </font> </td>


<td align='center' height='30' width='80'><font face='arial' size='2' color=''>  Lunch Bill </font> </td>


<td align='center' height='30' width='80'><font face='arial' size='2' color=''>  Residential Cost </font> </td>


<td align='center' height='30' width='80'><font face='arial' size='2' color=''>  Advance </font> </td>


<td align='center' height='30' width='80'><font face='arial' size='2' color=''> Incentive </font> </td>

<td align='center' height='30' width='80'><font face='arial' size='2' color=''> Provident Fund  </font> </td>

<td align='center' height='30' width='80'><font face='arial' size='2' color=''> Bonus  </font> </td>

<td width='100' align='center'> <font face='arial' size='2'> Net Salary </font> </td>

<td align='center' height='30' width='50'><font face='arial' size='2' color=''> Active </font> </td>

<td> </td>


</tr>


";


$w6=1;


if($ser==1 || $ser==10)
{

if($em_type==1||$em_type==2)
{
$result = mysql_query("SELECT * FROM `teacher_profile`  where active='1' && type='$em_type' ORDER BY `sl` ASC  LIMIT 0 , 36500 ");
}
else
{
$result = mysql_query("SELECT * FROM `teacher_profile`  where active='1'  ORDER BY `sl` ASC  LIMIT 0 , 36500 ");
}

while ($a_row = mysql_fetch_row($result)) {

	foreach ($a_row as $field) {
		
	}

$rs++;

print"
<tr bgcolor='white'> 

<td align='center' height='30' width='70'><font face='arial' size='2' color=''>  $rs  </font> </td> 


<td align='center' height='30' width='70'><font face='arial' size='2' color=''>  $a_row[16] . </font> </td> 


<td align='center' height='30' width='120'><font face='arial' size='2' color=''>   <input type='text' name='name$rs' size='10' value='$a_row[2]'>  </font> </td> 
 
<td align='center' height='30' width='90'><font face='arial' size='2' color=''>  <input type='text' name='designation$rs' size='10' value='$a_row[1]'> </font> </td> 

<td align='center' height='30' width='90'><font face='arial' size='2' color=''> <input type='text' name='ac_no$rs' size='10' value='$a_row[6]'> </font> </td> 



<td align='center' height='30' width='80'><font face='arial' size='2' color=''> <input type='text' name='abs$rs' size='10' value='$a_row[18]'> </font> </td> 




<td align='center' height='30' width='80'><font face='arial' size='2' color=''> </font> </td> 





<td align='center' height='30' width='80'><font face='arial' size='2' color=''>   </font> </td>
";


print"
<td align='center' height='30' width='80'><font face='arial' size='2' color=''>   </font> </td>

<td align='center' height='30' width='80'><font face='arial' size='2' color=''>   </font> </td>

<td align='center' height='30' width='80'><font face='arial' size='2' color=''>   </font> </td>
";

print"

<td align='center' height='30' width='80'><font face='arial' size='2' color=''>   </font> </td>

<td align='center' height='30' width='80'><font face='arial' size='2' color=''>  </font> </td>

<td align='center' height='30' width='80'><font face='arial' size='2' color=''>  </font> </td>

<td align='center' height='30' width='80'><font face='arial' size='2' color=''>   </font> </td>



<td width='100' align='center'> <font face='arial' size='2'>  </font> </td>

<td align='center' height='30' width='50'>


</font> </td>


<td width='70' align='center'> 



 </td>



";






print"

</tr>

";

}


}


print"
</table>
";








print"



<table align='center' width='900' cellpadding='0' cellspacing='0'>
<tr> <td align='center' height='48'>  <font face='arial' color='white' size='2'>


<input type='hidden' name='rs' value='$rs'>



<input type='hidden' name='smon' value='$smon'>

<input type='hidden' name='syer' value='$syer'>

<input type='hidden' name='em_type' value='$em_type'>


<input type='hidden' name='ser' value='1'>

 <input type='Submit' value='Save'> </font> </td> </tr>
</table>
</form>
";















print"



";

















print"


</td>


</tr>
</table>




</body>

</html>


";


?>