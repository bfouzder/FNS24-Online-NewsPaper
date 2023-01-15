<?php
include_once('dbconnection.php');



$ser=trim($_POST['ser']);
$s=trim($_POST['s']);

$dat1=trim($_POST['dat1']);
$mon1=trim($_POST['mon1']);
$yer1=trim($_POST['yer1']);


$dat2=trim($_POST['dat2']);
$mon2=trim($_POST['mon2']);
$yer2=trim($_POST['yer2']);

$dat=trim($_POST['dat']);
$mon=trim($_POST['mon']);
$yer=trim($_POST['yer']);


$mdate="$yer1$mon1$dat1";


$mdate_final="$yer1$mon1";

$ndate="$yer$mon$dat";









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

$mdate_final="$yer1$mon1";

$ndate="$yer2$mon2$dat2";




}





$ar='"';




print"

<html>

<head>
<title> Capitals Report </title>
";
?>



<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  
  <script src="jquery-1.10.2.js"></script>
  <script src="jquery-ui.js"></script>
  <link rel="stylesheet" href="/resources/demos/style.css">






<?php


include_once('style.php');

print"

<style>

#da
{
width:50px;
height:30px;
font-family:arial;
font-size:22px;
}




#ye
{
width:100px;
height:30px;
font-family:arial;
font-size:22px;
}


#yee
{
width:100px;
height:35px;
font-family:arial;
font-size:22px;
}


</style>

";

print"
</head>


<body>
";


include_once('address.php');


print"
<table align='center' width='' cellpadding='0' cellspacing='0' height='0'>
<tr bgcolor='white'> 
";




print"
<td align='center' valign='top' width='1000'> 


<br>


<table align='center' width='1000' cellpadding='0' cellspacing='0' bgcolor=''>
<tr> <td align='center' height='40'> <font face='arial' size='6'> <b> Capital Report Summary  </b>  </font> </td> </tr>
<tr> <td align='center' height='1' bgcolor=''> </td> </tr>
</table>


















<table align='center' width='1000' cellpadding='0' cellspacing='0' bgcolor=''>



<tr> 

<form action='capital_reports.php' method='POST'>

<td align='center' height='10'> 
";















print"








<font face='arial' size='6'> <b> Year :  </b>  </font>




";


print"

<select name='yer1' id='ye'>
<option>$yer1</option>
";

include_once('year.php');

print"
</select>




<input type='hidden' name='ser' value='7'>

<input type='submit' value='Search' id='yee'>

</td> 


</form>

</tr>
<tr> <td align='center' height='1' bgcolor='F9F4D8'> </td> </tr>
</table>
";











print"
<br>
<br>
<table align='center' width='800' cellpadding='2' cellspacing='1' bgcolor='black'>

<tr bgcolor='F2F2F2'>
 <td align='center' width='400' height='30'> <font face='arial' size='6'> Name Of The Month </font> </td> 
 <td align='center' width='400'> <font face='arial' size='6'>  Capital Amount </font> </td>
 
</tr>
";


$result = mysql_query("SELECT * FROM `capital` where customer_id='$yer1' ORDER BY `user_id` ASC  LIMIT 0 , 60000 ");


while ($a_row = mysql_fetch_row($result)) {

	foreach ($a_row as $field) {
		
	}

$vcc++;
$zmn="$iz";
$iz=$a_row[1];
$sales_net[$vcc]=$a_row[3];

if($iz==1)
{
$mon_name="January";	
}
if($iz==2)
{
$mon_name="February";	
}
if($iz==3)
{
$mon_name="March";	
}
if($iz==4)
{
$mon_name="April";	
}
if($iz==5)
{
$mon_name="May";	
}
if($iz==6)
{
$mon_name="June";	
}
if($iz==7)
{
$mon_name="July";	
}
if($iz==8)
{
$mon_name="August";	
}
if($iz==9)
{
$mon_name="September";	
}
if($iz==10)
{
$mon_name="October";	
}
if($iz==11)
{
$mon_name="Nobember";	
}
if($iz==12)
{
$mon_name="December";	
}




$m_name[$vcc]=$mon_name;


$tp20= number_format($a_row[3], 2);
$tp20=str_replace(",","","$tp20");




print"
<tr bgcolor='white'>
 <td align='left' width='' height='30'> <font face='arial' size='6'>&nbsp;  $mon_name     </font> </td>  
 <td align='right' width=''> <font face='arial' size='6'>   $tp20   </font> </td> 

 </tr>
";

}







print"
</table>
";






print"
 </td>
</tr>
</table>
";








print"
</table>
<br>
<br>

";






print"

<table align='center' width='400' cellpadding='2' cellspacing='0'>
<tr> <td align='center' bgcolor='#F2F2F2'> <font size='6' face='arial'>  Graph </font> </td> </tr>
</table>

<table align='center' width='1400' cellpadding='10' cellspacing='0'>
";



for($i=1;$i<=$vcc;$i++)
{
	

$sales_net[$i]= number_format($sales_net[$i], 2);
$sales_net[$i]=str_replace(",","","$sales_net[$i]");
	
	
$im=$sales_net[$i]/40000;	

$im= number_format($im, 2);
$im=str_replace(",","","$im");

	
print"
<tr>
<td width='150' align='left'> <font face='arial' size='3'> $m_name[$i] </font> </td>
<td align='left' width='850'>
 <img src='graph.gif' height='10' width='$im'>($sales_net[$i])
</td>
</tr>
";
}


print"
</table>

";













print"
<br>
<br>
<br>
<br>


";

include_once('sign_cost.php');

print"
</body>

</html>


";


?>