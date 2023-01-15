<?php

include_once('dbconnection.php');







$ser=trim($_POST['ser']);

$dat1=trim($_POST['dat1']);
$mon1=trim($_POST['mon1']);
$yer1=trim($_POST['yer1']);



$mdate="$yer1$mon1$dat1";




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






}











print"

<html>

<head>
<title> Find Supplier Advance List </title>
";


include_once('style.php');


print"
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

<table align='center' width='1000' cellpadding='0' cellspacing='1' bgcolor=''>

<tr> 
<td width='1000' height='320' bgcolor='' valign='top'> 


";







print"

<table align='center' width='1000' cellpadding='0' cellspacing='0' bgcolor=''>

<tr> 
<td width='1000' height='320' bgcolor='' valign='top'> 

<table align='center' width='1000' cellpadding='0' cellspacing='0' bgcolor=''>
<tr> <td align='center' height='40'> <font face='arial' size='4'> Outstanding Report Of  Supplier Advance  </font> </td> </tr>
<tr> <td align='center' height='1' bgcolor=''> </td> </tr>
</table>





<table align='center' width='1000' cellpadding='0' cellspacing='0' bgcolor=''>
<tr> 

<form action='supplier_advance_list.php' method='POST'>
<td align='center' height='40'> <font face='arial' size='4'>





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





</font> 
</td> 

</form>

</tr>
<tr> <td align='center' height='1' bgcolor='F9F4D8'> </td> </tr>
</table>




<table align='center' width='900' cellpadding='5' cellspacing='1' bgcolor='cccccc'>
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
<td width='340' height='30' align='left'> <font face='arial' size='4'> <b> Supplier name </b> </font></td> 
<td width='200' align='left'> <font face='arial' size='4'> <b> Debit </b>  </font> </td> 
<td width='200' align='left'> <font face='arial' size='4'> <b> Credit </b>  </font> </td> 
<td width='200' align='left'> <font face='arial' size='4'> <b> Advance </b>  </font> </td> 
</tr>
";



for($i=1;$i<=$r;$i++)

{

$cr=0;
$de=0;
$cv=0;

$result = mysql_query("SELECT * FROM `supplier_advance`  where bank_name='$bank_id[$i]' && adat<='$mdate'  ORDER BY `user_id` ASC  LIMIT 0 , 10000000");


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

if($cv>0 || $cv<0)
{
print"
<tr bgcolor='white'>  
<td width='200' height='30' align='left'> 
<a href=\"supplier_laser_transection.php?action=removegg&i1d=$arrp[0]&supplier=$bank_id[$i]\">
<font face='arial' size='4'>   $bank_name[$i]  </font></td> 
<td width='200' align='left'> <font face='arial' size='4'>  $de  </font> </td> 
<td width='200' align='left'> <font face='arial' size='4'>   $cr   </font> </td> 
<td width='200' align='left'> <font face='arial' size='4'>  $cv   </font> </td> 
</tr>
";
}




$tcr=$tcr+$cr;
$tde=$tde+$de;
$tcv=$tcv+$cv;

}






print"
<tr bgcolor='white'>  
<td width='200' height='30' align='left'> <font face='arial' size='4'> Total </font></td> 
<td width='200' align='left'> <font face='arial' size='4'>  $tde   </font> </td> 
<td width='200' align='left'> <font face='arial' size='4'>  $tcr   </font> </td> 
<td width='200' align='left'> <font face='arial' size='4'> $tcv  </font> </td> 
</tr>
";





print"
</table>
<br>
<br>
<br>
<br>

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