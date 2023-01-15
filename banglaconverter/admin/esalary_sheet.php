<?php

include_once('dbconnection.php');


$ser=trim($_POST['ser']);
$s=trim($_POST['s']);


$ch=trim($_POST['ch']);

$dc1=trim($_POST['dc1']);
$dc2=trim($_POST['dc2']);




$em_type=trim($_POST['em_type']);


if($em_type==1)
{
$em_typen="Head Office";
}

if($em_type==2)
{
$em_typen="Factory";
}










if($ser=="")
{
if($ch=="")
{
$ch=1;
}

}


if($ch==1)
{
$chn="checked";
}


$rss=trim($_POST['rs']);

$smon=trim($_POST['smon']);

$syer=trim($_POST['syer']);


$a=0;









if($ser==1)
{




for($i=1;$i<=$rss;$i++)
{


$z1=0;
$z2=0;
$z3=0;
$z4=0;
$z5=0;
$z6=0;
$z6=0;
$z7=0;
$z8=0;


$salary=0;

//$ledger_id=trim($_POST['ledger_id'.$i]);


$name=trim($_POST['name'.$i]);

$designation=trim($_POST['designation'.$i]);

$ac_no=trim($_POST['ac_no'.$i]);

$gross_salary=trim($_POST['gross_salary'.$i]);

$deduction=trim($_POST['deduction'.$i]);

$incentive=trim($_POST['incentive'.$i]);

$p_fund=trim($_POST['p_fund'.$i]);

$bonus=trim($_POST['bonus'.$i]);

$advance=trim($_POST['advance'.$i]);

$active=trim($_POST['active'.$i]);


$s=trim($_POST['s'.$i]);






//$z1=$gross_salary*$deduction;
//$z2=$z1/30;


$z3=$gross_salary-$z2;

$z4=$incentive;

$z5=$p_fund;

$z8=$bonus;





$over_income=trim($_POST['over_income'.$i]);
$lunch_bill=trim($_POST['lunch_bill'.$i]);
$residential=trim($_POST['residential'.$i]);

$abs=trim($_POST['abs'.$i]);






$salary=$z3-$advance;

$salary=$salary+$z4;

$salary=$salary-$z5;


$salary=$salary+$z8;




$salary=$salary+$over_income;

$salary=$salary-$lunch_bill;

$salary=$salary-$residential;





//$salary=str_replace(",","","$salary");

$t=$t+$salary;


$t=str_replace(",","","$t");



//$salary = number_format($salary 0);


//print"$salary <br>";






$salary= number_format($salary, 2);
$salary=str_replace(",","","$salary");






$query="UPDATE salary_sheet SET name='$name', designation='$designation', ac_no='$ac_no', gross_salary='$gross_salary', deduction='$deduction', advance='$advance',incentive='$incentive', p_fund='$p_fund', bonus='$bonus', salary='$salary', active='$active',over_income='$over_income',lunch_bill='$lunch_bill',residential='$residential',abs='$abs'  WHERE user_id='$s'"; 
mysql_query($query);


}



include_once('s.php');





}



$t = number_format($t,0);





if($ser==12)
{


if($dc1==1 && $dc2==1)
{
$result = mysql_query("DELETE FROM salary_sheet where smon='$smon' && syer='$syer'");

include_once('d.php');

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

</head>


<body>
";


include_once('address.php');


print"
<table align='center' width='1400' cellpadding='0' cellspacing='' height='' bgcolor=''>
<tr bgcolor='white'> 
<td align='center' valign='top' width='1200' bgcolor=''>  




<table align='center' width='400' cellpadding='0' cellspacing='0'>
<tr> <td height='0'>  </td> </tr>
</table>
";







print"
<table align='center' width='1400' cellpadding='0' cellspacing='0' bgcolor=''>
<tr> <td height='28' align='center' id='tda' bgcolor=''> <font size='5' face='arial' color='black'> Edit Salary Sheet   </font> </td> </tr>
</table>


<br>

";









print"

<form action='esalary_sheet.php' method='POST'>

<table align='center' width='950' cellpadding='0' cellspacing='0' bgcolor='white'>
<tr> <td height='28' align='center'> <font size='4' face='arial' color='black'> 


Select Office / Factory  :

<select name='em_type'>

<option value='$em_type'>$em_typen</option>

<option value='0'>All</option>
<option value='1'>Head Office</option>
<option value='2'>Factory</option>

</select>

&nbsp;


Active / In active <input type='checkbox' name='ch' $chn value='1'> &nbsp; 


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
<option>2026</option>
</select>


<input type='hidden' name='ser' value='10'>

<input type='submit' value='Search'>


   </font> </td> 

</form>

</tr>
</table>
<br>
";



print"
<table align='center' width='1400' cellpadding='3' cellspacing='1' bgcolor='black'>
<tr bgcolor='#F2F2F2'> 


<td align='center' height='30' width='70'><font face='arial' size='2' color=''> Serial </font> </td> 


<td align='center' height='30' width='70'><font face='arial' size='2' color=''> E_SL. </font> </td> 


<td align='center' height='30' width='70'><font face='arial' size='2' color=''>  Name</font> </td> 
 
<td align='center' height='30' width='90'><font face='arial' size='2' color=''> Designation </font> </td> 


<td align='center' height='30' width='80'><font face='arial' size='2' color=''>  Salary </font> </td> 


<td align='center' height='30' width='80'><font face='arial' size='2' color=''>  Absent </font> </td> 

<td align='center' height='30' width='80'><font face='arial' size='2' color=''>  Gross Salary  </font> </td> 


<td align='center' height='30' width='80'><font face='arial' size='2' color=''>  Overtime </font> </td>


<td align='center' height='30' width='80'><font face='arial' size='2' color=''>  Over Income </font> </td>


<td align='center' height='30' width='80'><font face='arial' size='2' color=''>  Lunch Bill / Meal </font> </td>


<td align='center' height='30' width='80'><font face='arial' size='2' color=''>  Residential Cost </font> </td>



<td align='center' height='30' width='80'><font face='arial' size='2' color=''>  Salary Advance </font> </td>

<td align='center' height='30' width='80'><font face='arial' size='2' color=''> Incentive </font> </td>

<td align='center' height='30' width='80'><font face='arial' size='2' color=''> Provident Fund  </font> </td>

<td align='center' height='30' width='80'><font face='arial' size='2' color=''> Festival Bonus   </font> </td>

<td width='100' align='center'> <font face='arial' size='2'> Net Salary </font> </td>

<td align='center' width='30'> <font face='arial' size='2'> Active </font> </td>


<form action='esalary_sheet.php' method='POST'>

</tr>
";






if($em_type==1||$em_type==2)
{
if($ch==1)
{
$result = mysql_query("SELECT * FROM `salary_sheet` where smon='$smon' && syer='$syer' && active='$ch' && type='$em_type' ORDER BY `sl` ASC  LIMIT 0 , 16500 ");
}
else
{
$result = mysql_query("SELECT * FROM `salary_sheet` where smon='$smon' && syer='$syer' && type='$em_type' ORDER BY `sl` ASC  LIMIT 0 , 16500 ");

}

}
else
{
if($ch==1)
{
$result = mysql_query("SELECT * FROM `salary_sheet` where smon='$smon' && syer='$syer' && active='$ch'  ORDER BY `sl` ASC  LIMIT 0 , 16500 ");
}
else
{
$result = mysql_query("SELECT * FROM `salary_sheet` where smon='$smon' && syer='$syer'  ORDER BY `sl` ASC  LIMIT 0 , 16500 ");

}

}





while ($a_row = mysql_fetch_row($result)) {

	foreach ($a_row as $field) {
		
	}

$rs++;

print"
<tr bgcolor='white'> 


<td align='center' height='30' width='70'><font face='arial' size='2' color=''>  $rs . </font> </td> 

<td align='center' height='30' width='70'><font face='arial' size='2' color=''>  $a_row[20] </font> </td> 


<td align='center' height='30' width='120'><font face='arial' size='2' color=''>   <input type='text' name='name$rs' size='10' value='$a_row[2]'>  </font> </td> 
 
<td align='center' height='30' width='90'><font face='arial' size='2' color=''>  <input type='text' name='designation$rs' size='10' value='$a_row[3]'> </font> </td> 
";

/*
print"
<td align='center' height='30' width='90'><font face='arial' size='2' color=''> <input type='text' name='ac_no$rs' size='10' value='$a_row[4]'> </font> </td> 
";
*/




print"
<td align='center' height='30' width='80'><font face='arial' size='2' color=''> <input type='text' name='abs$rs' size='10' value='$a_row[18]'> </font> </td> 
";



$t_salary=$t_salary+$a_row[18];



$fr=$a_row[18]/30;
$fr2=$fr*$a_row[5];
$fr3=$a_row[18]-$fr2;


$ov=$fr/9;
$ov=$ov*$a_row[6];


$ov= number_format($ov, 2);
$ov=str_replace(",","","$ov");


$fr3= number_format($fr3, 2);
$fr3=str_replace(",","","$fr3");
$frr=$frr+$fr3;


$fr6=$a_row[16]+$a_row[17]+$a_row[13]+$a_row[8];

$fr4=$fr3+$a_row[7]+$a_row[9];

$a_row[10]=$fr4-$fr6;




print"
<td align='center' height='30' width='80'><font face='arial' size='2' color=''> <input type='text' name='gross_salary$rs' size='5' value='$a_row[5]'> </font> </td> 
";


$t_absent=$t_absent+$a_row[5];

print"
<td align='center' height='30' width='80'><font face='arial' size='2' color=''> $fr3 </font> </td> 
";

$t_gross=$t_gross+$fr3;



print"
<td align='center' height='30' width='80'><font face='arial' size='2' color=''>  <input type='text' name='deduction$rs' size='5' value='$a_row[6]'> </font> </td>
";


$t_hour=$t_hour+$a_row[6];


print"
<td align='center' height='30' width='80'><font face='arial' size='2' color=''>  $ov </font> </td>
";

$t_over=$t_over+$ov;



print"
<td align='center' height='30' width='80'><font face='arial' size='2' color=''>  <input type='text' name='lunch_bill$rs' size='10' value='$a_row[16]'> </font> </td>
";

$t_lunch=$t_lunch+$a_row[16];

print"
<td align='center' height='30' width='80'><font face='arial' size='2' color=''>  <input type='text' name='residential$rs' size='10' value='$a_row[17]'> </font> </td>
";

$t_res=$t_res+$a_row[17];


print"
<td align='center' height='30' width='80'><font face='arial' size='2' color=''>  <input type='text' name='advance$rs' size='10' value='$a_row[13]'> </font> </td>
";

$t_advance=$t_advance+$a_row[13];


print"
<td align='center' height='30' width='80'><font face='arial' size='2' color=''> <input type='text' name='incentive$rs' size='10' value='$a_row[7]'> </font> </td>
";

$t_incentive=$t_incentive+$a_row[7];

print"
<td align='center' height='30' width='80'><font face='arial' size='2' color=''> <input type='text' name='p_fund$rs' size='10' value='$a_row[8]'> </font> </td>
";

$t_pf=$t_pf+$a_row[8];


print"
<td align='center' height='30' width='80'><font face='arial' size='2' color=''> <input type='text' name='bonus$rs' size='10' value='$a_row[9]'>  </font> </td>
";

$t_bonus=$t_bonus+$a_row[9];

print"
<td width='100' align='center'> <font face='arial' size='2'> $a_row[10]  </font> </td>
";

$total=$total+$a_row[10];




print"

<td width='30' align='center'> 

<input type='text' name='active$rs' value='$a_row[14]' size='2'>


<input type='hidden' name='s$rs' value='$a_row[0]'>


<input type='hidden' name='ledger_id$rs' value='$a_row[0]'>



 </td>



";






print"

</tr>

";

}





$t_salary= number_format($t_salary, 2);
$t_absent= number_format($t_absent, 2);


$t_gross= number_format($t_gross, 2);

$t_hour= number_format($t_hour, 2);

$t_over= number_format($t_over, 2);


$t_lunch= number_format($t_lunch, 2);
$t_res= number_format($t_res, 2);


$t_advance= number_format($t_advance, 2);

$t_incentive= number_format($t_incentive, 2);

$t_pf= number_format($t_pf, 2);

$t_bonus= number_format($t_bonus, 2);



print"

<tr bgcolor='#F2F2F2'> 


<td align='center' height='30' width='70'><font face='arial' size='2' color=''>   </font> </td> 

<td align='center' height='30' width='70'><font face='arial' size='2' color=''>   </font> </td> 


 
<td align='center' height='30' width='90'><font face='arial' size='2' color=''>  </font> </td> 

<td align='center' height='30' width='90'><font face='arial' size='2' color=''> Total  </font> </td> 

<td align='right' height='30' width='80'><font face='arial' size='2' color=''> $t_salary </font> </td> 

<td align='right' height='30' width='80'><font face='arial' size='2' color=''> $t_absent </font> </td>


<td align='right' height='30' width='90'><font face='arial' size='2' color=''> $t_gross  </font> </td> 

<td align='right' height='30' width='80'><font face='arial' size='2' color=''> $t_hour  </font> </td> 

<td align='right' height='30' width='80'><font face='arial' size='2' color=''> $t_over  </font> </td>

<td align='right' height='30' width='80'><font face='arial' size='2' color=''> $t_lunch  </font> </td>

<td align='right' height='30' width='80'><font face='arial' size='2' color=''> $t_res   </font> </td>

<td align='right' height='30' width='80'><font face='arial' size='2' color=''> $t_advance  </font> </td>

<td align='right' height='30' width='80'><font face='arial' size='2' color=''>  $t_incentive  </font> </td>

<td align='right' height='30' width='80'><font face='arial' size='2' color=''>  $t_pf </font> </td>


<td align='right' height='30' width='80'><font face='arial' size='2' color=''> $t_bonus  </font> </td>

<td width='150' align='center'> <font face='arial' size='2'> $total  </font> </td>

<td> </td>
</tr>





</table>
";






//if($rs>0)
//{

print"
<br>
<br>
<table align='center' width='1200' cellpadding='0' cellspacing='0'>
<tr> <td align='center' height='28'>  <font face='arial' color='white' size='2'>


<input type='hidden' name='rs' value='$rs'>


<input type='hidden' name='smon' value='$smon'>

<input type='hidden' name='syer' value='$syer'>

<input type='hidden' name='ch' value='$ch'>

<input type='hidden' name='em_type' value='$em_type'>


<input type='hidden' name='ser' value='1'>

  <input type='submit' value='Edit / Calculate '> </font> </td> </tr>
</table>
";


print"
</form>
";
//}





print"
<form action='esalary_sheet.php' method='POST'>
";









print"

<br>
<br>
<table align='center' width='1200' cellpadding='0' cellspacing='0'>
<tr> <td align='center' height='28'>  <font face='arial' color='white' size='2'>


<input type='hidden' name='rs' value='$rs'>


<input type='hidden' name='smon' value='$smon'>

<input type='hidden' name='syer' value='$syer'>

<input type='hidden' name='ch' value='$ch'>

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;


<input type='checkbox' name='dc1' value='1'>
&nbsp;
<input type='checkbox' name='dc2' value='1'>


<input type='hidden' name='ser' value='12'>

  <input type='submit' value='Delete '> </font> </td> </tr>
</table>
";











print"

<br>
<br>

<table align='center' width='1200' cellpadding='0' cellspacing='0'>
<tr> 

</form>

<form action='sheet_print.php' method='POST' target='_blank'>
<td align='center' height='28'>  



<font face='arial' color='black' size='2'> <b>  

<input type='hidden' name='ch' value='$ch'>

<input type='hidden' name='smon' value='$smon'>
<input type='hidden' name='syer' value='$syer'>

<input type='hidden' name='em_type' value='$em_type'>


Over time <input type='checkbox' name='over' value='1'> &nbsp;&nbsp;&nbsp;

<input type='submit' value='Print'>

 </b> </font> </td> </tr>
</table>




</form>

";










print"


</td>


</tr>
</table>




</body>

</html>


";


?>