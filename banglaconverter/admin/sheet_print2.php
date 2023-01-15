<?php

include_once('dbconnection.php');


$ser=trim($_POST['ser']);
$s=trim($_POST['s']);


$ch=trim($_POST['ch']);




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

/*

//$sql = "INSERT INTO `salary_sheet` (`user_id`, `ledger_id`, `name`, `designation`,`deduction`, `incentive`, `p_fund`, `bonus`, `salary`, `smon`, `syer`, `advance`) VALUES ('','$ledger_id','$name','$designation','$deduction','$incentive','$p_fund','$bonus','$salary','$smon','$syer','$advance')";
//mysql_query($sql);

*/

//print" $ledger_id - $name - $designation - $ac_no - $gross_salary - $deduction - $incentive - $p_fund - $bonus - $smon - $syer  <br> ";






$z1=$gross_salary*$deduction;
//$z1=str_replace(",","","$z1");

$z2=$z1/30;
//$z2=str_replace(",","","$z2");

$z3=$gross_salary-$z2;

//$z3=str_replace(",","","$z3");


//$incentive=str_replace(",","","$incentive");
$z4=$z3+$incentive;
//$z4=str_replace(",","","$z4");

//$p_fund=str_replace(",","","$p_fund");
$z5=$gross_salary*$p_fund;
//$z5=str_replace(",","","$z5");

$z6=$z5/100;
//$z6=str_replace(",","","$z6");

$z7=$z4-$z6;
//$z7=str_replace(",","","$z7");

$z8=$z7+$bonus;
//$z8=str_replace(",","","$z8");

$salary=$z8-$advance;
//$salary=str_replace(",","","$salary");

$t=$t+$salary;


$t=str_replace(",","","$t");




//$salary = number_format($salary 0);


//print"$salary <br>";


$salary= number_format($salary, 2);
$salary=str_replace(",","","$salary");



$query="UPDATE salary_sheet SET name='$name', designation='$designation', ac_no='$ac_no', gross_salary='$gross_salary', deduction='$deduction', advance='$advance',incentive='$incentive', p_fund='$p_fund', bonus='$bonus', salary='$salary', active='$active'  WHERE user_id='$s'"; 
mysql_query($query);


}



include_once('s.php');





}



$t = number_format($t,0);





if($ser==12)
{

for($i=1;$i<=$rss;$i++)
{
$result = mysql_query("DELETE FROM salary_sheet where smon='$smon' && syer='$syer'");
}

include_once('d.php');

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


<style>

@media all {
	.page-break	{ display: none; }
}

@media print {
	.page-break	{ display: block; page-break-before: always; }
}


#pm8
{
display: block;
display: none; 
}

</style>

</head>


<body>
";


include_once('address.php');


print"
<table align='center' width='1500' cellpadding='0' cellspacing='' height='' bgcolor=''>
<tr bgcolor='white'> 
<td align='center' valign='top' width='1200' bgcolor=''>  

";







print"
<table align='center' width='1500' cellpadding='0' cellspacing='0' bgcolor=''>
<tr> <td height='28' align='center' id='tda' bgcolor=''> <font size='5' face='arial' color='black'> Salary Sheet

</font>
<font size='4' face='arial' color='black'>
 <br> Month Of  - $smon - $syer   </font>

 </td> </tr>
</table>


<br>

";












if($ch==1)
{
$result = mysql_query("SELECT * FROM `salary_sheet` where smon='$smon' && syer='$syer' && active='$ch'  ORDER BY `sl` ASC  LIMIT 0 , 1160 ");
}
else
{
$result = mysql_query("SELECT * FROM `salary_sheet` where smon='$smon' && syer='$syer'   ORDER BY `sl` ASC  LIMIT 0 , 1160 ");

}



while ($a_row = mysql_fetch_row($result)) {

	foreach ($a_row as $field) {
		
	}

$rs++;
$km++;




if($km==1)
{


print"
<table align='center' width='1860' cellpadding='3' cellspacing='1' bgcolor='black'>
<tr bgcolor='#F2F2F2'> 


<td align='center' height='30' width='70'><font face='arial' size='4' color=''>  Serial </font> </td> 


<td align='center' height='30' width='70'><font face='arial' size='4' color=''>  E_SL. </font> </td> 


<td align='center' height='30' width='270'><font face='arial' size='4' color=''>  Name</font> </td> 
 
<td align='center' height='30' width='200'><font face='arial' size='4' color=''> Designation </font> </td> 
";
/*
<td align='center' height='30' width='90'><font face='arial' size='4' color=''> ID </font> </td> 
*/

print"
<td align='center' height='30' width='80'><font face='arial' size='4' color=''>  Salary </font> </td> 


<td align='center' height='30' width='80'><font face='arial' size='4' color=''>  Absent Day </font> </td> 

<td align='center' height='30' width='80'><font face='arial' size='4' color=''>  Gross Salary  </font> </td> 


<td align='center' height='30' width='80'><font face='arial' size='4' color=''> Over Time Hour </font> </td>


<td align='center' height='30' width='80'><font face='arial' size='4' color=''>  Over Income </font> </td>


<td align='center' height='30' width='80'><font face='arial' size='4' color=''>  Lunch Bill / Meal </font> </td>


<td align='center' height='30' width='80'><font face='arial' size='4' color=''>  Residential Cost </font> </td>



<td align='center' height='30' width='80'><font face='arial' size='4' color=''>  Salary Advance </font> </td>

<td align='center' height='30' width='80'><font face='arial' size='4' color=''> Incentive </font> </td>

<td align='center' height='30' width='80'><font face='arial' size='4' color=''> Provident Fund  </font> </td>

<td align='center' height='30' width='80'><font face='arial' size='4' color=''> Festival Bonus   </font> </td>


<td width='110' align='center'> <font face='arial' size='4'> Net Salary </font> </td>

<td align='center' width='130'> <font face='arial' size='4'> Sign </font> </td>



</tr>
";



}




print"
<tr bgcolor='white'> 


<td align='center' height='30' width=''><font face='arial' size='4' color=''>  $rs . </font> </td> 

<td align='center' height='30' width=''><font face='arial' size='4' color=''>  $a_row[20] </font> </td> 


<td align='left' height='30' width=''><font face='arial' size='4' color=''> $a_row[2]   </font> </td> 
 
<td align='left' height='30' width=''><font face='arial' size='4' color=''> $a_row[3]  </font> </td> 
";
/*
print"
<td align='left' height='30' width=''><font face='arial' size='4' color=''>  $a_row[4] </font> </td> 
";
*/


$pm1= number_format($a_row[18], 2);

print"
<td align='right' height='30' width=''><font face='arial' size='4' color=''>  $pm1 </font> </td> 
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


$pm2= number_format($a_row[5], 2);


print"
<td align='right' height='30' width=''><font face='arial' size='4' color=''>  $pm2 </font> </td> 
";


$t_absent=$t_absent+$a_row[5];
$pm3= number_format($fr3, 2);


print"
<td align='right' height='30' width=''><font face='arial' size='4' color=''> $pm3 </font> </td> 
";

$t_gross=$t_gross+$fr3;


$pm4= number_format($a_row[6], 2);


print"
<td align='right' height='30' width=''><font face='arial' size='4' color=''> $pm4  </font> </td>
";


$t_hour=$t_hour+$a_row[6];


print"
<td align='right' height='30' width=''><font face='arial' size='4' color=''>  $ov </font> </td>
";

$t_over=$t_over+$ov;

$pm5= number_format($a_row[16], 2);


print"
<td align='right' height='30' width=''><font face='arial' size='4' color=''>  $pm5  </font> </td>
";

$t_lunch=$t_lunch+$a_row[16];

$pm6= number_format($a_row[17], 2);


print"
<td align='right' height='30' width=''><font face='arial' size='4' color=''>    $pm6 </font> </td>
";

$t_res=$t_res+$a_row[17];


$pm7= number_format($a_row[13], 2);


print"
<td align='right' height='30' width=''><font face='arial' size='4' color=''>  $pm7 </font> </td>
";

$t_advance=$t_advance+$a_row[13];


$pm8= number_format($a_row[7], 2);


print"
<td align='right' height='30' width=''><font face='arial' size='4' color=''>  $pm8 </font> </td>
";

$t_incentive=$t_incentive+$a_row[7];

$pm9= number_format($a_row[8], 2);


print"
<td align='right' height='30' width=''><font face='arial' size='4' color=''>  $pm9 </font> </td>
";

$t_pf=$t_pf+$a_row[8];


$pm10= number_format($a_row[9], 2);

print"
<td align='right' height='30' width=''><font face='arial' size='4' color=''>  $pm10 </font> </td>
";

$t_bonus=$t_bonus+$a_row[9];

$pm11= number_format($a_row[10], 2);


print"
<td width='' align='right'> <font face='arial' size='4'> $pm11  </font> </td>
";

$total=$total+$a_row[10];




print"

<td width='30' align='center'> 


<input type='hidden' name='s$rs' value='$a_row[0]'>


<input type='hidden' name='ledger_id$rs' value='$a_row[0]'>



 </td>



";






print"

</tr>

";




if($km==35)
{
print"</table>";
$km=0;

print"
<div class='page-break'>
&nbsp;
</div>
";
}






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

$total= number_format($total, 2);


print"

<tr bgcolor='#F2F2F2'> 

<td align='center' height='30' width='70'><font face='arial' size='4' color=''>   </font> </td> 
<td align='center' height='30' width='70'><font face='arial' size='4' color=''>   </font> </td> 
";

/*
<td align='center' height='30' width='70'><font face='arial' size='4' color=''>   </font> </td> 
 */

print"
<td align='center' height='30' width='90'><font face='arial' size='4' color=''>  </font> </td> 

<td align='center' height='30' width='90'><font face='arial' size='4' color=''> Total  </font> </td> 

<td align='right' height='30' width='80'><font face='arial' size='4' color=''> $t_salary </font> </td> 

<td align='right' height='30' width='80'><font face='arial' size='4' color=''> $t_absent </font> </td>


<td align='right' height='30' width='90'><font face='arial' size='4' color=''> $t_gross  </font> </td> 

<td align='right' height='30' width='80'><font face='arial' size='4' color=''> $t_hour  </font> </td> 

<td align='right' height='30' width='80'><font face='arial' size='4' color=''> $t_over  </font> </td>

<td align='right' height='30' width='80'><font face='arial' size='4' color=''> $t_lunch  </font> </td>

<td align='right' height='30' width='80'><font face='arial' size='4' color=''> $t_res   </font> </td>

<td align='right' height='30' width='80'><font face='arial' size='4' color=''> $t_advance  </font> </td>

<td align='right' height='30' width='80'><font face='arial' size='4' color=''>  $t_incentive  </font> </td>

<td align='right' height='30' width='80'><font face='arial' size='4' color=''>  $t_pf </font> </td>


<td align='right' height='30' width='80'><font face='arial' size='4' color=''> $t_bonus  </font> </td>

<td width='150' align='right'> <font face='arial' size='4'> $total  </font> </td>

<td> </td>
</tr>


</table>
<br>
<br>
<br>
<br>
<br>

";







include_once('sign_cost.php');




















print"


</td>


</tr>
</table>




</body>

</html>


";


?>