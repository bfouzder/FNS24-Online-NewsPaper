<?php

include_once('dbconnection.php');




print"

<html>

<head>
<title> Find Payment Due </title>
";


include_once('style.php');


print"
</head>


<body>
";


//include_once('header.php');


print"
<table align='center' width='1200' cellpadding='0' cellspacing='1' height='800' bgcolor='gray'>
<tr bgcolor='white'> 


";

//include_once('find_transection_left.php');

print"





<td align='center' valign='top' width='980'> 


";

include_once('address.php');

print"

<table align='center' width='1000' cellpadding='0' cellspacing='1' bgcolor='F9F4D8'>

<tr> 
<td width='1000' height='320' bgcolor='ECE9D8' valign='top'> 


";







print"

<table align='center' width='1000' cellpadding='0' cellspacing='1' bgcolor='F9F4D8'>

<tr> 
<td width='1000' height='320' bgcolor='ECE9D8' valign='top'> 

<table align='center' width='1000' cellpadding='0' cellspacing='0' bgcolor='F7D3F2'>
<tr> <td align='center' height='40'> <font face='arial' size='2'> Payment Ledger Due  </font> </td> </tr>
<tr> <td align='center' height='1' bgcolor='F9F4D8'> </td> </tr>
</table>









<table align='center' width='600' cellpadding='0' cellspacing='1' bgcolor='cccccc'>
";



$result = mysql_query("SELECT * FROM payment_laser");

while ($a_row = mysql_fetch_row($result)) {

	foreach ($a_row as $field) {
		
	}

$r++;
$bank_name[$r]=$a_row[1];
$bank_id[$r]=$a_row[0];

}



print"
<tr bgcolor='F2F2F2'>  
<td width='200' height='30' align='center'> <font face='arial' size='2'> <b> Payment Laser name </b> </font></td> 
<td width='200' align='center'> <font face='arial' size='2'> <b> Debit </b>  </font> </td> 
<td width='200' align='center'> <font face='arial' size='2'> <b> Credit </b>  </font> </td> 
<td width='200' align='center'> <font face='arial' size='2'> <b> Due </b>  </font> </td> 
</tr>
";



for($i=1;$i<=$r;$i++)

{

$cr=0;
$de=0;
$cv=0;

$result = mysql_query("SELECT * FROM `payment_transection`  where bank_name='$bank_id[$i]'  ORDER BY `user_id` ASC  LIMIT 0 , 100000");


while ($a_row = mysql_fetch_row($result)) {

	foreach ($a_row as $field) {
		
	}

if($a_row[2]==1)
{
$cr=$cr+$a_row[3];
}

if($a_row[2]==2)
{
$de=$de+$a_row[3];
}


}


$cv=$cr-$de;

print"
<tr bgcolor='F2F2F2'>  
<td width='200' height='30' align='center'> <font face='arial' size='2'> <b> $bank_name[$i] </b> </font></td> 
<td width='200' align='center'> <font face='arial' size='2'> <b> $de </b>  </font> </td> 
<td width='200' align='center'> <font face='arial' size='2'> <b> $cr </b>  </font> </td> 
<td width='200' align='center'> <font face='arial' size='2'> <b> $cv </b>  </font> </td> 
</tr>
";




$tcr=$tcr+$cr;
$tde=$tde+$de;
$tcv=$tcv+$cv;

}






print"
<tr bgcolor='F2F2F2'>  
<td width='200' height='30' align='center'> <font face='arial' size='2'> <b> </b> </font></td> 
<td width='200' align='center'> <font face='arial' size='2'> <b> $tde </b>  </font> </td> 
<td width='200' align='center'> <font face='arial' size='2'> <b> $tcr </b>  </font> </td> 
<td width='200' align='center'> <font face='arial' size='2'> <b> $tcv </b>  </font> </td> 
</tr>
";





print"
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