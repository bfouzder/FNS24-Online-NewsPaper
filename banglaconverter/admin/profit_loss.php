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











print"

<html>

<head>
<title> Profit and loss </title>
";


include_once('style.php');


print"
</head>


<body>
";


include_once('header.php');


print"
<table align='center' width='1200' cellpadding='0' cellspacing='1' height='800' bgcolor='gray'>
<tr bgcolor='white'> 
";

include_once('report_left.php');












print"
<td align='center' valign='top' width='980'>  



<br>
<br>

<table align='center' width='700' cellpadding='0' cellspacing='0' bgcolor='F7D3F2'>
<tr> <td align='center' height='40'> <font face='arial' size='2'> Find Profit or Loss </font> </td> </tr>
<tr> <td align='center' height='1' bgcolor='F9F4D8'> </td> </tr>
</table>





<table align='center' width='700' cellpadding='0' cellspacing='0' bgcolor='F3F3F3'>



<tr> 

<form action='profit_loss.php' method='POST'>

<td align='center' height='40'> 


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
<option>2014</option>
<option>2015</option>
<option>2016</option>
<option>2017</option>
<option>2018</option>
<option>2019</option>
<option>2020</option>
</select>

&nbsp;&nbsp;&nbsp; <font face='arial' size='2'>To </font>&nbsp;&nbsp;&nbsp;


<select name='dat2'>
<option>$dat2</option>
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


<select name='mon2'>
<option>$mon2</option>
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



<select name='yer2'>
<option>$yer2</option>
<option>2014</option>
<option>2015</option>
<option>2016</option>
<option>2017</option>
<option>2018</option>
<option>2019</option>
<option>2020</option>
</select>


<input type='hidden' name='ser' value='7'>

<input type='submit' value='Search'>

</td> 


</form>

</tr>


<tr> <td align='center' height='1' bgcolor='F9F4D8'> </td> </tr>
</table>
";


$profit=0;


$result = mysql_query("SELECT * FROM `saleproduct` where adat>='$mdate' && adat<='$ndate'  ");


while ($a_row = mysql_fetch_row($result)) {

	foreach ($a_row as $field) {
		
	}
	
	$profit=$profit+$a_row[16];
}




$less=0;


$result = mysql_query("SELECT * FROM `customer_laser` where adat>='$mdate' && adat<='$ndate'  ");


while ($a_row = mysql_fetch_row($result)) {

	foreach ($a_row as $field) {
		
	}
	
	$less1=$less1+$a_row[13];
	$less2=$less2+$a_row[14];
	
	
}



$less=$less1+$less2;

$pro1=$profit-$less;
















$r=0;

$result = mysql_query("SELECT * FROM payment_laser");

while ($a_row = mysql_fetch_row($result)) {

	foreach ($a_row as $field) {
		
	}

$r++;
$bank_name[$r]=$a_row[1];
$bank_id[$r]=$a_row[0];

}






$tcr=0;
$tde=0;
$tcv=0;




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



$tcr=$tcr+$cr;
$tde=$tde+$de;
$tcv=$tcv+$cv;

}

//$totalparty_final=$tcv;









$cost=$tde;




























$pro2=$pro1-$cost;




print"

<table align='center' width='500' cellpadding='0' cellspacing='1' bgcolor='black'>

<tr bgcolor='f2f2f2' height='30'> 
<td align='center' width=''><font face='arial' size='3'> Name </font></td>
<td align='center' width=''><font face='arial' size='3'> TK </font></td>
</tr>


<tr bgcolor='white' height='30'> 
<td align='center' width=''> <font face='arial' size='3'>Profit on Product Sale </font> </td>
<td align='center' width=''> <font face='arial' size='3'> $profit </font></td>
</tr>


<tr bgcolor='white' height='30'> 
<td align='center' width=''> <font face='arial' size='3'> Less </font> </td>
<td align='center' width=''> <font face='arial' size='3'> $less </font></td>
</tr>



<tr bgcolor='f2f2f2' height='30'> 
<td align='center' width=''><font face='arial' size='3'>  </font></td>
<td align='center' width=''><font face='arial' size='3'> $pro1 TK </font></td>
</tr>



<tr bgcolor='white' height='30'> 
<td align='center' width=''> <font face='arial' size='3'> Cost </font> </td>
<td align='center' width=''> <font face='arial' size='3'> $cost </font></td>
</tr>






<tr bgcolor='f2f2f2' height='30'> 
<td align='center' width=''><font face='arial' size='3'> Profit </font></td>
<td align='center' width=''><font face='arial' size='3'> $pro2 TK </font></td>
</tr>

</table>


<br> <br>



<form action='profit_loss_print.php' method='POST' target='a_blank'>

&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type='hidden' name='dat1' value='$dat1'>
<input type='hidden' name='mon1' value='$mon1'>
<input type='hidden' name='yer1' value='$yer1'>


<input type='hidden' name='ser' value='1'>

<input type='hidden' name='dat2' value='$dat2'>
<input type='hidden' name='mon2' value='$mon2'>
<input type='hidden' name='yer2' value='$yer2'>



<input type='submit' value='Print'>

</form>



</td>


</tr>
</table>




</body>

</html>


";


?>