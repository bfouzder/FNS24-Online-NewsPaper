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


$sql="SELECT * FROM `expendature_sub` WHERE user_id='$cost_name' ";


$result=mysql_query($sql);
$arr5=mysql_fetch_array($result);

$cost_namen=$arr5[2];



print"

<html>

<head>
<title> Cost Reports </title>
";


include_once('style.php');


print"
</head>


<body onload='window.print()'>
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

  
<table align='center' width='700' cellpadding='0' cellspacing='0'>

<tr>

<td align='center' bgcolor='' height='50'>
";










print"
<table align='center' width='450' cellpadding='0' cellspacing='0' bgcolor=''>
<tr> <td height='28' align='center' id='td5' bgcolor=''> <font size='5' face='arial' color=''> <b> Daily Cost Reports </b>   </font> </td> </tr>
</table>
";

$u=-1;

$result = mysql_query("SELECT * FROM expendature_sub");

while ($a_row = mysql_fetch_row($result)) {

	foreach ($a_row as $field) {
		
	}
$u++;
$expenduter_head[$u]=$a_row[1];
$expenduter_sub[$u]=$a_row[2];
$expenduter_sub_id[$u]=$a_row[0];
}


array_multisort($expenduter_sub,$expenduter_sub_id,$expenduter_head,SORT_ASC);


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
";

print"
</table>
";



print"
<table align='center' width='1050' cellpadding='6' cellspacing='1' bgcolor='cccccc'>


<tr bgcolor='F2F2F2'> 
<td height='28' width='80' align='center'> <font size='5' face='arial' color='black'> SL.   </font> </td> 
<td height=''   width='80' align='center'> <font size='5' face='arial' color='black'>  Date  </font> </td>
<td height=''  width='450' align='center'> <font size='5' face='arial' color='black'> Cost  Name  </font> </td> 
<td height=''  width='200' align='center'> <font size='5' face='arial' color='black'>  Details  </font> </td> 
<td height=''  width='100' align='center'> <font size='5' face='arial' color='black'>  Amount  </font> </td> 
</tr>

";



$total=0;

if($cost_name=="")
{
$result = mysql_query("SELECT * FROM `costing_entry` where  adat>='$mdate' && adat<='$ndate'  ORDER BY `adat` ASC  LIMIT 0 , 6000");
}


if($cost_name!="")
{
$result = mysql_query("SELECT * FROM `costing_entry` where  sub_id='$cost_name' && adat>='$mdate' && adat<='$ndate'  ORDER BY `adat` ASC  LIMIT 0 , 6000");
}



while ($a_row = mysql_fetch_row($result)) {

	foreach ($a_row as $field) {
		
	}

$r++;

$a_row[5]= number_format($a_row[5], 2);
$a_row[5]=str_replace(",","","$a_row[5]");

$a_row_up= number_format($a_row[5], 2);

print"
<tr bgcolor='white'> 
<td height='28' width='' align='center'> <font size='5' face='arial' color='black'>  $r  </font> </td> 
<td height=''   width='' align='center'> <font size='5' face='arial' color='black'>  $a_row[6]-$a_row[7]-$a_row[8]  </font> </td>
<td height=''  width='' align='left'> <font size='5' face='arial' color='black'>  $a_row[3]  </font> </td> 
<td height=''  width='' align='left'> <font size='5' face='arial' color='black'>  $a_row[4]  </font> </td> 
<td height=''  width='' align='right'> <font size='5' face='arial' color='black'>  $a_row_up  </font> </td> 
</tr>
";

$total=$total+$a_row[5];

}





$total= number_format($total, 2);


print"
<tr bgcolor='white'> 
<td height='28' width='' align='center'> <font size='5' face='arial' color='black'>    </font> </td> 
<td height=''   width='' align='center'> <font size='5' face='arial' color='black'>    </font> </td>
<td height=''  width='' align='center'> <font size='5' face='arial' color='black'>    </font> </td> 
<td height=''  width='' align='left'> <font size='5' face='arial' color='black'>  Total  </font> </td> 
<td height=''  width='' align='right'> <font size='5' face='arial' color='black'>   $total </font> </td> 
</tr>
";


print"
</table>
";







print"
<table align='center' width='850' cellpadding='0' cellspacing='0'>
<tr> <td align='center' height='28' bgcolor='' id='tdt'>  <font face='arial' color='white' size='5'> <b>   </b> </font> </td> </tr>
</table>
";



print"

<br>

<form action='cost_report_print.php' method='POST' target='a_blank'>

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