<?php

include_once('dbconnection.php');


$ser=trim($_POST['ser']);
$s=trim($_POST['s']);


$id=trim($_POST['tags']);

$idn=strlen($id);

for($lk=0;$lk<=$idn;$lk++)
{
if($id[$lk]=='=')
{
$rty++;	
}

if($rty==1)
{
	$rkk++;
	if($rkk>1)
	{
$idvalue="$idvalue$id[$lk]";
	}	
}
	
}



$product_id=$idvalue;





$sql="SELECT * FROM `teacher_profile` WHERE user_id='$product_id' ";
$result=mysql_query($sql);
$arrs=mysql_fetch_array($result);

$picture=$arrs[9];
$name=$arrs[2];
$mobile=$arrs[5];
$address=$arrs[8];
$jdate="$arrs[12]-$arrs[13]-$arrs[14]";
$designation=$arrs[1];
$status=$arrs[15];
$v_id=$arrs[6];
$com=$arrs[11];
















$rty=0;
$rkk=0;






$ch=trim($_POST['ch']);

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


$smon2=trim($_POST['smon2']);
$syer2=trim($_POST['syer2']);



$adat1="$syer$smon";

$adat2="$syer2$smon2";


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
<title> View Profile </title>
";

?>



  <link rel="stylesheet" href="jquery-ui-themes-1.11.4/themes/smoothness/jquery-ui.css">
  
  
  
  <script src="jquery-1.10.2.js"></script>
  <script src="jquery-ui.js"></script>
  
 
<script type="text/javascript">

$(function() 
{
 $( "#tags" ).autocomplete({
  source: 'p_profile.php'

 });
});



</script>

<?php

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
<tr> <td height='28' align='center' id='tda' bgcolor=''> <font size='5' face='arial' color='black'> View Employee Profile <br> Date: $smon-$syer To $smon2-$syer2  </font> </td> </tr>
</table>


<br>

";








print"
<table align='center' width='1460' cellpadding='3' cellspacing='0' bgcolor='white'>
<tr bgcolor=''>
<td align='left'> <img src='employee/$picture' width='160' height='160'> </td>
</tr>

<tr bgcolor=''>
<td align='left'> <font face='arial' size='4'><b>  Name : $name  ID: $v_id  Status : $status </b> </font> </td>
</tr>

<tr bgcolor=''>
<td align='left'> <font face='arial' size='4'><b>  Designation  : $designation </b> </font> </td>
</tr>

<tr bgcolor=''>
<td align='left'> <font face='arial' size='4'><b>  Joining Date  : $jdate </b> </font> </td>
</tr>


<tr bgcolor=''>
<td align='left'> <font face='arial' size='4'><b>  Mobile : $mobile </b> </font> </td>
</tr>

<tr bgcolor=''>
<td align='left'> <font face='arial' size='4'><b>  Address : $address </b> </font> </td>
</tr>

<tr bgcolor=''>
<td align='left'> <font face='arial' size='4'><b>  Provident Fund : $com </b> </font> </td>
</tr>

</table>
";

print"
<table align='center' width='1460' cellpadding='3' cellspacing='1' bgcolor='black'>
<tr bgcolor='#F2F2F2'> 


<td align='center' height='30' width='70'><font face='arial' size='4' color=''>  SL. </font> </td> 
<td align='center' height='30' width='20'><font face='arial' size='4' color=''>  Salary </font> </td> 
<td align='center' height='30' width='120'><font face='arial' size='4' color=''>  Absent Day </font> </td> 
<td align='center' height='30' width='20'><font face='arial' size='4' color=''>  Gross Salary  </font> </td> 
<td align='center' height='30' width='180'><font face='arial' size='4' color=''> Over Time Hour </font> </td>
<td align='center' height='30' width='120'><font face='arial' size='4' color=''>  Over Income </font> </td>
<td align='center' height='30' width='90'><font face='arial' size='4' color=''>  Lunch Bill / Meal </font> </td>
<td align='center' height='30' width='90'><font face='arial' size='4' color=''>  Residential Cost </font> </td>
<td align='center' height='30' width='80'><font face='arial' size='4' color=''>  Salary Advance </font> </td>
<td align='center' height='30' width='80'><font face='arial' size='4' color=''> Incentive </font> </td>
<td align='center' height='30' width='80'><font face='arial' size='4' color=''> Provident Fund  </font> </td>
<td align='center' height='30' width='80'><font face='arial' size='4' color=''> Festival Bonus   </font> </td>
<td width='110' align='center'> <font face='arial' size='4'> Net Salary </font> </td>




</tr>
";





$result = mysql_query("SELECT * FROM `salary_sheet` where adat>='$adat1' && adat<='$adat2' && ledger_id='$product_id'  ORDER BY `user_id` ASC  LIMIT 0 , 60 ");





while ($a_row = mysql_fetch_row($result)) {

	foreach ($a_row as $field) {
		
	}

$rs++;


print"
<tr bgcolor='white'> 


<td align='center' height='30' width=''><font face='arial' size='4' color=''>  $rs . </font> </td> 


";


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
<td width='' align='right'> <font face='arial' size='4'> $pm11  </font>


<input type='hidden' name='s$rs' value='$a_row[0]'>


<input type='hidden' name='ledger_id$rs' value='$a_row[0]'>

 </td>
";

$total=$total+$a_row[10];




print"


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

$total= number_format($total, 2);


print"

<tr bgcolor='#F2F2F2'> 

<td align='center' height='30' width=''><font face='arial' size='4' color=''> Total   </font> </td> 




<td align='right' height='30' width=''><font face='arial' size='4' color=''> $t_salary </font> </td> 

<td align='right' height='30' width=''><font face='arial' size='4' color=''> $t_absent </font> </td>


<td align='right' height='30' width=''><font face='arial' size='4' color=''> $t_gross  </font> </td> 

<td align='right' height='30' width=''><font face='arial' size='4' color=''> $t_hour  </font> </td> 

<td align='right' height='30' width=''><font face='arial' size='4' color=''> $t_over  </font> </td>

<td align='right' height='30' width=''><font face='arial' size='4' color=''> $t_lunch  </font> </td>

<td align='right' height='30' width=''><font face='arial' size='4' color=''> $t_res   </font> </td>

<td align='right' height='30' width=''><font face='arial' size='4' color=''> $t_advance  </font> </td>

<td align='right' height='30' width=''><font face='arial' size='4' color=''>  $t_incentive  </font> </td>

<td align='right' height='30' width=''><font face='arial' size='4' color=''>  $t_pf </font> </td>


<td align='right' height='30' width=''><font face='arial' size='4' color=''> $t_bonus  </font> </td>

<td width='150' align='right'> <font face='arial' size='4'> $total  </font> </td>

</tr>


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