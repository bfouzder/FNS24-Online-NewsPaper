<?php

include_once('dbconnection.php');



$ser=trim($_POST['ser']);

$dat1=trim($_POST['dat1']);
$mon1=trim($_POST['mon1']);
$yer1=trim($_POST['yer1']);

$dat=trim($_POST['dat']);
$mon=trim($_POST['mon']);
$yer=trim($_POST['yer']);



$mdate="$yer1$mon1$dat1";


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




$mdate="$yer1$mon1$dat1";
$ndate="$yer1$mon1$dat1";





}











print"

<html>

<head>
<title> Find Supplier Due </title>
";


include_once('style.php');


print"

<style>

.list1 tr:hover{
background-color:pink;
}

</style>

</head>


<body>
";


//include_once('header.php');


print"
<table align='center' width='1200' cellpadding='0' cellspacing='0'  bgcolor=''>
<tr bgcolor='white'> 


";

//include_once('find_transection_left.php');

print"





<td align='center' valign='top' width='980'> 


";

include_once('address.php');

print"

<table align='center' width='1200' cellpadding='0' cellspacing='1' bgcolor=''>

<tr> 
<td width='1000' height='320' bgcolor='' valign='top'> 


";







print"

<table align='center' width='1200' cellpadding='0' cellspacing='0' bgcolor=''>

<tr> 
<td width='1000' height='320' bgcolor='' valign='top'> 

<table align='center' width='1200' cellpadding='0' cellspacing='0' bgcolor=''>
<tr> <td align='center' height='40'> <font face='arial' size='6'> Outstanding Report Of  Supplier Due  </font> </td> </tr>
<tr> <td align='center' height='1' bgcolor=''> </td> </tr>
</table>





<table align='center' width='1200' cellpadding='0' cellspacing='0' bgcolor=''>
<tr> 

<form action='supplier_due.php' method='POST'>
<td align='center' height='40'> <font face='arial' size='5'>


Date :


<select name='dat' id='da'>

<option>$dat</option>
<option>01</option>
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
<option>13</option>
<option>14</option>
<option>15</option>
<option>16</option>
<option>17</option>
<option>18</option>
<option>19</option>
<option>20</option>
<option>21</option>
<option>22</option>
<option>23</option>
<option>24</option>
<option>25</option>
<option>26</option>
<option>27</option>
<option>28</option>
<option>29</option>
<option>30</option>
<option>31</option>
</select>


<select name='mon' id='da'>
<option>$mon</option>
<option>01</option>
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



<select name='yer' id='ye'>
<option>$yer</option>
";

include_once('year1.php');

print"
</select>






TO


<select name='dat1' id='da'>

<option>$dat1</option>
<option>01</option>
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
<option>13</option>
<option>14</option>
<option>15</option>
<option>16</option>
<option>17</option>
<option>18</option>
<option>19</option>
<option>20</option>
<option>21</option>
<option>22</option>
<option>23</option>
<option>24</option>
<option>25</option>
<option>26</option>
<option>27</option>
<option>28</option>
<option>29</option>
<option>30</option>
<option>31</option>
</select>


<select name='mon1' id='da'>
<option>$mon1</option>
<option>01</option>
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



<select name='yer1' id='ye'>
<option>$yer1</option>
";

include_once('year.php');

print"
</select>




<input type='hidden' name='ser' value='7'>

<input type='submit' value='Search' id='yee'>





</font> 
</td> 

</form>

</tr>
<tr> <td align='center' height='1' bgcolor='F9F4D8'> </td> </tr>
</table>




<table align='center' width='1200' cellpadding='5' cellspacing='1' bgcolor='black' class='list1'>
";



//$result = mysql_query("SELECT * FROM supplier");


$result = mysql_query("SELECT * FROM `supplier`  ORDER BY `customer_name` ASC ");



while ($a_row = mysql_fetch_row($result)) {

	foreach ($a_row as $field) {
		
	}

$r++;
$bank_name[$r]=$a_row[1];
$bank_id[$r]=$a_row[0];

}




print"
<tr bgcolor='F2F2F2'>  
<td width='340' height='30' align='left'> <font face='arial' size='5'> <b> Supplier name </b> </font></td> 
<td width='200' align='center'> <font face='arial' size='5'> <b> Opening </b>  </font> </td> 


<td width='200' align='center'> <font face='arial' size='5'> <b> Debit </b>  </font> </td> 

<td width='200' align='center'> <font face='arial' size='5'> <b> Total </b>  </font> </td> 


<td width='200' align='center'> <font face='arial' size='5'> <b> Credit </b>  </font> </td> 


<td width='200' align='center'> <font face='arial' size='5'> <b> Due </b>  </font> </td> 
</tr>
";




for($i=1;$i<=$r;$i++)

{

$cr=0;
$de=0;
$cv=0;
$ba=0;
$result = mysql_query("SELECT * FROM `supplier_laser`  where bank_name='$bank_id[$i]' && adat<'$ndate'  ORDER BY `user_id` ASC  LIMIT 0 , 10000000");


while ($a_row = mysql_fetch_row($result)) {

	foreach ($a_row as $field) {
		
	}

if($a_row[2]==2)
{
$cr=$cr+$a_row[3];
}

if($a_row[2]==1)
{
$de=$de+$a_row[3];
}

$ba=$de-$cr;

$pay[$i]=$ba;



}

}

















$dis=0;


for($i=1;$i<=$r;$i++)

{

$cr=0;
$de=0;
$cv=0;

$result = mysql_query("SELECT * FROM `supplier_laser`  where bank_name='$bank_id[$i]' && adat>='$ndate' && adat<='$mdate'  ORDER BY `user_id` ASC  LIMIT 0 , 10000000");


while ($a_row = mysql_fetch_row($result)) {

	foreach ($a_row as $field) {
		
	}

if($a_row[2]==2)
{
$cr=$cr+$a_row[3];
}

if($a_row[2]==1)
{
$de=$de+$a_row[3];
}


if($a_row[16]==1)
{
$dis=$dis+$a_row[3];	
}

}



//$cv=$de-$cr;

$cv2=$de+$pay[$i];
$cv=$cv2-$cr;


$cv = number_format($cv, 2);
$cv=str_replace(",","","$cv");



$cv2 = number_format($cv2, 2);
$cv2=str_replace(",","","$cv2");

$cv3=$cv3+$cv2;


$de = number_format($de, 2);
$de=str_replace(",","","$de");

$cr = number_format($cr, 2);
$cr=str_replace(",","","$cr");



if($cv>=0 || $cv<=0)
{
print"
<tr bgcolor='white'>  
<td width='200' height='30' align='left'> 

<a href=\"supplier_laser_transection.php?action=removegg&i1d=$arrp[0]&supplier=$bank_id[$i]\">

<font face='arial' size='5'>   $bank_name[$i]  </font></td> 
";

$pcr = number_format($pay[$i], 2);
$pcr=str_replace(",","","$pcr");

$pcr_total=$pcr_total+$pcr;


print"
<td width='200' align='right'> <font face='arial' size='5'>  $pcr  </font> </td> 


<td width='200' align='right'> <font face='arial' size='5'>  $de  </font> </td> 


<td width='200' align='right'> <font face='arial' size='5'>  $cv2    </font> </td> 


<td width='200' align='right'> <font face='arial' size='5'>   $cr   </font> </td> 
";


print"


<td width='200' align='right'> <font face='arial' size='5'>  $cv   </font> </td> 
</tr>
";

}


$tcr=$tcr+$cr;
$tde=$tde+$de;
$tcv=$tcv+$cv;

}


$tde = number_format($tde, 2);
$tde=str_replace(",","","$tde");


$tcr = number_format($tcr, 2);
$tcr=str_replace(",","","$tcr");

$tcv = number_format($tcv, 2);
$tcv=str_replace(",","","$tcv");


$pcr_total= number_format($pcr_total, 2);
$pcr_total=str_replace(",","","$pcr_total");


$cv3= number_format($cv3, 2);
$cv3=str_replace(",","","$cv3");


$dis= number_format($dis, 2);
$dis=str_replace(",","","$dis");



print"
<tr bgcolor='white'>  
<td width='200' height='30' align='right'> <font face='arial' size='5'> Total </font></td> 

<td width='200' align='right'> <font face='arial' size='5'>  $pcr_total   </font> </td> 

<td width='200' align='right'> <font face='arial' size='5'>  $tde   </font> </td> 

<td width='200' align='right'> <font face='arial' size='5'>  $cv3   </font> </td> 


<td width='200' align='right'> <font face='arial' size='5'>  $tcr   </font> </td> 


<td width='200' align='right'> <font face='arial' size='5'> $tcv  </font> </td> 
</tr>
";


print"
</table>

<br>
<br>


<table align='center' width='600' cellpadding='5' cellspacing='1' bgcolor='black'>

<tr bgcolor='white'>
<td align='center'> <font face='arial' size='5'> Payment </font> </td>
<td align='center'> <font face='arial' size='5'> Discount </font> </td>
<td align='center'> <font face='arial' size='5'> Net Payment </font> </td>
</tr>
";


$payment=$tcr-$dis;


$payment= number_format($payment, 2);
$payment=str_replace(",","","$payment");


print"
<tr bgcolor='white'>
<td align='right'> <font face='arial' size='5'> $tcr </font> </td>
<td align='right'> <font face='arial' size='5'> $dis </font> </td>
<td align='right'> <font face='arial' size='5'> $payment </font> </td>
</tr>




</table>












<br>
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