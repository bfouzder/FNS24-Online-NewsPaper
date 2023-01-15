<?php


include_once('dbconnection.php');

include_once('ppp.php');



$ser=trim($_POST['ser']);


$dat1=trim($_POST['dat1']);
$mon1=trim($_POST['mon1']);
$yer1=trim($_POST['yer1']);




$dat2=trim($_POST['dat2']);
$mon2=trim($_POST['mon2']);
$yer2=trim($_POST['yer2']);







$mdate="$yer1$mon1$dat1";
$ndate="$yer2$mon2$dat2";





if($ser=="")
{


$bbb=time(); 

$d=date("m/d/y",$bbb); 

$mon="$d[0]$d[1]";
$dat="$d[3]$d[4]";
$yer="20$d[6]$d[7]";

$dat1=$dat;
$mon1=$mon;
$yer1=$yer;


$dat2=$dat;
$mon2=$mon;
$yer2=$yer;


$mdate="$yer1$mon1$dat1";
$ndate="$yer2$mon2$dat2";

}



$cost_name=trim($_POST['cost_name']);


$sql="SELECT * FROM `expendature_head` WHERE user_id='$cost_name' ";


$result=mysql_query($sql);
$arr5=mysql_fetch_array($result);

$cost_namen=$arr5[1];










print"

<html>

<head>
<title> Cost Summary </title>
";


include_once('style.php');


print"
</head>


<body onload=window.print()>
";


//include_once('header.php');


print"
<table align='center' width='' cellpadding='0' cellspacing='0' height='' bgcolor=''>
<tr bgcolor='white'> 
";

//include_once('report_left.php');












print"
<td align='center' valign='top' width='980'>  

";


include_once('address.php');





print"
<table align='center' width='400' cellpadding='0' cellspacing='0' bgcolor=''>
<tr> <td height='28' align='center' id='td5' bgcolor=''> <font size='5' face='arial' color=''> <b> Cost Summary Report </b>   </font> </td> </tr>
</table>
";


print"
<table align='center' width='1050' cellpadding='0' cellspacing='1'>

<tr bgcolor=''>
<td align='left' HEIGHT='30'> <font size='5' face='arial'>  </font> </td>
</tr>

<tr bgcolor=''>
<td align='left' HEIGHT='30'> <font size='5' face='arial'>  <b>  Date :  $dat1-$mon1-$yer1 To $dat2-$mon2-$yer2 </b>   </font> </td>
</tr>

";

if($cost_namen!="")
{
print"
<tr bgcolor=''>
<td align='left' HEIGHT='30'> <font size='5' face='arial'> Cost Name :  $cost_namen </font> </td>
</tr>
";
}




print"
<tr bgcolor=''>
<td align='left' HEIGHT='30'> <font size='5' face='arial'>  </font> </td>
</tr>

</table>
";



$t=0;

$result = mysql_query("SELECT * FROM expendature_head");

while ($a_row = mysql_fetch_row($result)) {

	foreach ($a_row as $field) {
		
	}

$h++;
$head_name[$h]=$a_row[1];
$head_id[$h]=$a_row[0];

}


$total=0;

if($cost_name=="")
{

print"
<table align='center' width='1050' cellpadding='6' cellspacing='1' bgcolor='gray'>


<tr bgcolor='F2F2F2'> 
<td height='28' width='20' align='center'> <font size='5' face='arial' color='black'> SL.   </font> </td> 


<td height=''  width='600'align='center'> <font size='5' face='arial' color='black'>  Details  </font> </td> 


<td height=''  width='100'align='center'> <font size='5' face='arial' color='black'>  Amount  </font> </td> 
</tr>

";

for($i=1;$i<=$h;$i++)
{

$total=0;

/*
print"
<tr bgcolor='white'> 
<td height='28' width='' align='center'> <font size='5' face='arial' color='black'> $head_name[$i]  </font> </td> 
<td height=''   width=''align='center'> <font size='5' face='arial' color='black'>    </font> </td>
<td height=''  width=''align='center'> <font size='5' face='arial' color='black'>    </font> </td> 
<td height=''  width=''align='center'> <font size='5' face='arial' color='black'>    </font> </td> 
<td height=''  width=''align='center'> <font size='5' face='arial' color='black'>    </font> </td> 
</tr>
";

*/


$result = mysql_query("SELECT * FROM `costing_entry` where expenduter_name='$head_id[$i]' && adat>='$mdate' && adat<='$ndate'  ORDER BY `adat` ASC  LIMIT 0 , 6000");



while ($a_row = mysql_fetch_row($result)) {

	foreach ($a_row as $field) {
		
	}

$r++;



$total=$total+$a_row[5];


}



$total_up= number_format($total, 2);


print"
<tr bgcolor='white'> 
<td height='28' width='' align='center'> <font size='5' face='arial' color='black'>  $i  </font> </td> 

<td height=''  width=''align='left'> <font size='5' face='arial' color='black'> $head_name[$i]  </font> </td> 
<td height=''  width=''align='right'> <font size='5' face='arial' color='black'>  $total_up  </font> </td> 
</tr>
";

$t=$t+$total;


}

$t_up= number_format($t, 2);



print"
<tr bgcolor='white'> 
<td height='28' width='' align='center'> <font size='5' face='arial' color='black'>    </font> </td> 
 
<td height=''  width=''align='left'> <font size='5' face='arial' color='black'>  Total  </font> </td> 
<td height=''  width=''align='right'> <font size='5' face='arial' color='black'>   $t_up </font> </td> 
</tr>
";

}





//$result = mysql_query("SELECT * FROM expenduter_sub");



$result = mysql_query("SELECT * FROM `expendature_sub` where  category='$cost_name'  ORDER BY `user_id` ASC  LIMIT 0 , 6000");

while ($a_row = mysql_fetch_row($result)) {

	foreach ($a_row as $field) {
		
	}

$hh++;
$sub_name[$hh]=$a_row[2];
$sub_id[$hh]=$a_row[0];

}







if($cost_name!="")
{


print"
<table align='center' width='1050' cellpadding='5' cellspacing='1' bgcolor='gray'>


<tr bgcolor='F2F2F2'> 
<td height='28' width='20' align='center'> <font size='5' face='arial' color='black'> SL.   </font> </td> 

<td height=''  width='750' align='center'> <font size='5' face='arial' color='black'> Cost Name  </font> </td> 



<td height=''  width='100' align='center'> <font size='5' face='arial' color='black'>  Amount  </font> </td> 
</tr>

";

$t=0;


for($j=1;$j<=$hh;$j++)
{

$total=0;

$result = mysql_query("SELECT * FROM `costing_entry` where  expenduter_name='$cost_name' && sub_id='$sub_id[$j]' && adat>='$mdate' && adat<='$ndate'  ORDER BY `adat` ASC  LIMIT 0 , 6000");



while ($a_row = mysql_fetch_row($result)) {

	foreach ($a_row as $field) {
		
	}

$r++;



$total=$total+$a_row[5];

}


$total_up= number_format($total, 2);


print"
<tr bgcolor='white'> 
<td height='28' width='' align='center'> <font size='5' face='arial' color='black'>   $j </font> </td> 

<td height=''  width='' align='left'> <font size='5' face='arial' color='black'>  $sub_name[$j]  </font> </td>
<td height=''  width='' align='right'> <font size='5' face='arial' color='black'>   $total_up </font> </td> 
</tr>
";
$t=$t+$total;

}


$t_up= number_format($t, 2);


print"
<tr bgcolor='white'> 
<td height='28' width='' align='center'> <font size='5' face='arial' color='black'>    </font> </td> 


<td height=''  width='' align='center'> <font size='5' face='arial' color='black'>  Total  </font> </td> 
<td height=''  width='' align='right'> <font size='5' face='arial' color='black'>   $t_up </font> </td> 
</tr>
";


}






print"
</table>
";







print"
<table align='center' width='750' cellpadding='0' cellspacing='0'>
<tr> <td align='center' height='28' bgcolor='' id='tdt'>  <font face='arial' color='white' size='5'> <b>   </b> </font> </td> </tr>
</table>
";





print"

<br>

<form action='cost_summary_print.php' method='POST' target='a_blank'>

<input type='hidden' name='ser' value='1'>

<input type='hidden' name='dat1' value='$dat1'>
<input type='hidden' name='mon1' value='$mon1'>
<input type='hidden' name='yer1' value='$yer1'>

<input type='hidden' name='dat2' value='$dat2'>
<input type='hidden' name='mon2' value='$mon2'>
<input type='hidden' name='yer2' value='$yer2'>


<input type='hidden' name='cost_name' value='$cost_name'>




</form>
";


print"
</td>
</tr>

</table>

</td>  



</tr>
</table>
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