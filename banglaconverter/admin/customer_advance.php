<?php

include_once('dbconnection.php');


$ser=trim($_POST['ser']);

$dat=trim($_POST['dat']);
$mon=trim($_POST['mon']);
$yer=trim($_POST['yer']);



$mdate="$yer$mon$dat";
$dat1=trim($_POST['dat1']);
$mon1=trim($_POST['mon1']);
$yer1=trim($_POST['yer1']);

$ndate="$yer1$mon1$dat1";


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


print"

<html>

<head>
<title>  Customer Advance List </title>
";


include_once('style.php');


print"
</head>


<body>
";


//include_once('header.php');


print"
<table align='center' width='1000' cellpadding='0' cellspacing='0'  bgcolor=''>
<tr bgcolor='white'> 


";

//include_once('find_transection_left.php');

print"





<td align='center' valign='top' width='980'> 


";

include_once('address.php');

print"

<table align='center' width='1000' cellpadding='0' cellspacing='0' bgcolor=''>

<tr> 
<td width='1000' height='320' bgcolor='' valign='top'> 


";







print"

<table align='center' width='1000' cellpadding='0' cellspacing='0' bgcolor=''>
<tr> 
<td width='1000' height='320' bgcolor='' valign='top'> 

<table align='center' width='1000' cellpadding='0' cellspacing='0' bgcolor='white'>
<tr> <td align='center' height='40'> <font face='arial' size='5'> Outstanding Report of Customer Advance  </font> </td> </tr>
<tr> <td align='center' height='1' bgcolor=''> </td> </tr>



<tr>

<form action='customer_advance.php' method='POST'>
<td align='center' height='50'>

<font face='arial' size='3'> Select Date:  </font>


<select name='dat'>

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


<select name='mon'>
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



<select name='yer'>
<option>$yer</option>
";

include_once('year1.php');

print"
</select>


To




<select name='dat1'>

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


<select name='mon1'>
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



<select name='yer1'>
<option>$yer1</option>
";

include_once('year.php');

print"
</select>




<input type='hidden' name='ser' value='7'>

<input type='submit' value='Search'>

</td> 


</form>

</tr>




</table>


";










//$result = mysql_query("SELECT * FROM customer");




//$result = mysql_query("SELECT * FROM `create_area`  ORDER BY `category_name` ASC ");



$result = mysql_query("SELECT * FROM `create_area` ");


while ($a_row = mysql_fetch_row($result)) {

	foreach ($a_row as $field) {
		
	}

$ree++;
$area_name[$ree]=$a_row[1];
$area_id[$ree]=$a_row[0];

}




print"
<table align='center' width='1000' cellpadding='4' cellspacing='1' bgcolor='cccccc'>
";







print"
<tr bgcolor='F2F2F2'>  
<td width='' height='0' align='center'> <font face='arial' size='3'> <b>  Customer Name </b> </font></td> 
<td width='' height='0' align='center'> <font face='arial' size='3'> <b>  Address </b> </font></td> 


<td width='' height='30' align='center'> <font face='arial' size='3'> <b>  Opening Balance </b> </font></td> 
";
/*
<td width='' height='30' align='center'> <font face='arial' size='3'> <b>  Net Sales </b> </font></td> 
<td width='' height='30' align='center'> <font face='arial' size='3'> <b>  Total </b> </font></td> 
*/

print"
<td width='' height='30' align='center'> <font face='arial' size='3'> <b>  Receipt   </b> </font></td> 
";



print"

<td width='' align='center'> <font face='arial' size='3'> <b> Advance Amount </b>  </font> </td> 
</tr>
";









for($j=1;$j<=$ree;$j++)

{

$op=0;
$cv=0;
$net=0;
$total_opening=0;
$due=0;
$tsale=0;
$total_sale=0;
$total_due=0;
$collection_n=0;

$r=0;




$result = mysql_query("SELECT * FROM `customer` where area='$area_id[$j]' ORDER BY `company_name` ASC ");


while ($a_row = mysql_fetch_row($result)) {

	foreach ($a_row as $field) {
		
	}

$r++;
$bank_name[$r]=$a_row[1];
$bank_address[$r]=$a_row[5];

$bank_id[$r]=$a_row[0];
$company_name[$r]=$a_row[7];
$customer_id[$r]=$a_row[2];


}








print"
<tr bgcolor='yellow'>  
<td width='300' height='30' align='left' bgcolor='yellow'>   <font face='arial' size='3'> <b>  $area_name[$j]   </b> </font></td> 
<td width='300'> </td>
<td width='100'> </td>
";
/*
<td width='100'> </td>
<td width='100'> </td>
*/
print"
<td width='100'> </td>
<td width='100'> </td>
</tr>
";






for($i=1;$i<=$r;$i++)

{

$cr=0;
$de=0;
$cv=0;


//$result = mysql_query("SELECT * FROM `customer_laser` where   adat<'$mdate' ORDER BY `adat` ASC ");


$result = mysql_query("SELECT * FROM `customer_advance`  where bank_name='$bank_id[$i]' && adat<'$mdate'   ORDER BY `user_id` ASC  LIMIT 0 , 100000");


//$result = mysql_query("SELECT * FROM `customer_laser` where   adat>='$mdate' && adat<='$ndate' ORDER BY `adat` ASC ");



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

$op++;
$opening[$op]=$cv;

/*
print"
<tr bgcolor='F2F2F2'>  
<td width='' height='30' align='left'> <font face='arial' size='2'> <b> &nbsp; $bank_name[$i] </b> </font></td> 

<td width='200' align='left'> &nbsp; <font face='arial' size='2'> <b> Opening </b>  </font> </td> 
<td width='200' align='left'> &nbsp; <font face='arial' size='2'> <b> Net Sales </b>  </font> </td> 

<td width='200' align='left'> &nbsp; <font face='arial' size='2'> <b> Collections </b>  </font> </td> 


<td width='200' align='left'> &nbsp; <font face='arial' size='2'> <b> $de </b>  </font> </td> 
<td width='200' align='left'> &nbsp; <font face='arial' size='2'> <b> $cr </b>  </font> </td> 
<td width='200' align='left'> &nbsp; <font face='arial' size='2'> <b> $cv </b>  </font> </td> 
</tr>
";

*/



$tcr=$tcr+$cr;
$tde=$tde+$de;
$tcv=$tcv+$cv;





}




/*

print"
<tr bgcolor='white'>  
<td width='200' height='30' align='center'> <font face='arial' size='2'> <b> </b> </font></td> 
<td width='200' align='center'> <font face='arial' size='2'> <b> $tde </b>  </font> </td> 
<td width='200' align='center'> <font face='arial' size='2'> <b> $tcr </b>  </font> </td> 
<td width='200' align='center'> <font face='arial' size='2'> <b> $tcv </b>  </font> </td> 
</tr>
";
*/



/*

print"
</table>
";
*/







//////////////////////////////////////////////////////////////////////////////







for($i=1;$i<=$r;$i++)

{

$cr=0;
$de=0;
$cv=0;


//$result = mysql_query("SELECT * FROM `customer_laser` where   adat<'$mdate' ORDER BY `adat` ASC ");


$result = mysql_query("SELECT * FROM `customer_advance`  where bank_name='$bank_id[$i]' && adat>='$mdate' && adat<='$ndate'  ORDER BY `user_id` ASC  LIMIT 0 , 100000");


//$result = mysql_query("SELECT * FROM `customer_laser` where   adat>='$mdate' && adat<='$ndate' ORDER BY `adat` ASC ");



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

//$op++;
//$opening[$op]=$cv;

$net=$net+$cr;




$due=$opening[$i]+$cr;

$due=$due-$de;

$tsale=$opening[$i]+$cr;


$total_due=$total_due+$due;


$tq++;


if($due>0 || $due<0)
{

$total_opening=$total_opening+$opening[$i];
$total_sale=$total_sale+$tsale;
$collection_n=$collection_n+$de;


print"
<tr bgcolor='white'>  
<td width='' height='30' align='left'> 

<a href=\"customer_advance_transection.php?action=removegg&i1d=$arrp[0]&supplier=$bank_id[$i]&dat1=$dat&mon1=$mon&yer1=$yer&dat2=$dat1&mon2=$mon1&yer2=$yer1\">  

 <font face='arial' size='2'> <b>    $bank_name_old[$i] $company_name[$i]  </b> </font> </a></td> 



<td align='left'><font face='arial' size='2'> <b>    $bank_address[$i]  </b> </font> </td>


<td width='' align='left'>  <font face='arial' size='2'> <b> $opening[$i] </b>  </font> </td> 
";
/*
<td width='' align='left'>  <font face='arial' size='2'> <b>  $cr </b>  </font> </td> 
<td width='' align='left'>  <font face='arial' size='2'> <b>  $tsale </b>  </font> </td> 
*/

print"
<td width='' align='left'>  <font face='arial' size='2'> <b>  $de </b>  </font> </td> 
";

/*
<td width='200' align='left'> &nbsp; <font face='arial' size='2'> <b> $de </b>  </font> </td> 
<td width='200' align='left'> &nbsp; <font face='arial' size='2'> <b> $cr </b>  </font> </td> 
*/

print"
<td width='' align='left'>  <font face='arial' size='2'> <b> $cv_old $due </b>  </font> </td> 
</tr>
";


}

//$tcr=$tcr+$cr;
//$tde=$tde+$de;
//$tcv=$tcv+$cv;





}






print"
<tr bgcolor='white'>

  
<td width='' height='50' align='left'>  <font face='arial' size='2'> <b> Total  </b> </font></td> 
<td> </td>
<td width='' align='left'>  <font face='arial' size='2'> <b> $total_opening </b>  </font> </td> 
";
/*
<td width='' align='left'>  <font face='arial' size='2'> <b> $net </b>  </font> </td> 
<td width='' align='left'>  <font face='arial' size='2'> <b> $total_sale </b>  </font> </td>
*/

print"
<td width='' align='left'>  <font face='arial' size='2'> <b> $collection_n </b>  </font> </td>
<td width='' align='left'>  <font face='arial' size='2'> <b> $total_due </b>  </font> </td> 
</tr>
";



$total_openingn=$total_openingn+$total_opening;
$netn=$netn+$net;
$total_salen=$total_salen+$total_sale;
$collection_nn=$collection_nn+$collection_n;
$total_duen=$total_duen+$total_due;









}


print"
</table>
";




print"
<br>
<br>

<table align='center' width='1000' cellpadding='4' cellspacing='1' bgcolor='black'>
<tr bgcolor='F2F2F2'>  
<td width='300' height='30' align='center'> <font face='arial' size='3'> <b>  Customer name </b> </font></td>
<td width='300' height='30' align='left'> <font face='arial' size='3'> <b>   </b> </font></td>
 
<td width='100' height='30' align='center'> <font face='arial' size='3'> <b>  Opening Balance </b> </font></td> 
";
/*
<td width='100' height='30' align='left'> <font face='arial' size='3'> <b>  Net Sales </b> </font></td> 
<td width='100' height='30' align='left'> <font face='arial' size='3'> <b>  Total </b> </font></td> 
*/
print"
<td width='100' height='30' align='center'> <font face='arial' size='3'> <b>  Payment  </b> </font></td> 
";
/*
<td width='200' align='left'>  <font face='arial' size='3'> <b> Debit </b>  </font> </td> 
<td width='200' align='left'>  <font face='arial' size='3'> <b> Credit </b>  </font> </td> 
*/
print"
<td width='100' align='center'>  <font face='arial' size='3'> <b> Advance </b>  </font> </td> 
</tr>
";




print"
<tr bgcolor='white'>
<td width='' height='50' align='left'>  <font face='arial' size='2'> <b> All  Total [$tq]  </b> </font></td> 
<td> </td>
<td width='' align='left'>  <font face='arial' size='2'> <b> $total_openingn </b>  </font> </td> 
";
/*
<td width='' align='left'>  <font face='arial' size='2'> <b> $netn </b>  </font> </td> 
<td width='' align='left'>  <font face='arial' size='2'> <b> $total_salen </b>  </font> </td>
*/
print"
<td width='' align='left'>  <font face='arial' size='2'> <b> $collection_nn </b>  </font> </td>
<td width='' align='left'>  <font face='arial' size='2'> <b> $total_duen </b>  </font> </td> 
</tr>
";





print"
</table>

<br>
<br>
<br>

<br><br>

";



include_once('sign.php');


print"
</td>


</tr>
</table>




</body>

</html>


";


?>