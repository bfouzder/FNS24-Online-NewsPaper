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















$result = mysql_query("SELECT * FROM sms_count");

while ($a_row = mysql_fetch_row($result)) {

	foreach ($a_row as $field) {
		
	}
	
	$send++;
}

$total_sms=2000;
$total_send=$send;
$total_rem=$total_sms-$total_send;



print"

<html>

<head>
<title> Sms status </title>
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

include_once('sms_left.php');












print"
<td align='center' valign='top' width='980'>  



<table align='center' width='400' cellpadding='0' cellspacing='0'>
<tr> <td height='10'>  </td> </tr>
</table>



<table align='center' width='700' cellpadding='0' cellspacing='0'>
<tr> <td align='center' height='28' bgcolor='#7087A3' id='tda'>  <font face='arial' color='white' size='2'> <b> Sms Sent Reports - $total_sms  -  Send - $total_send -  Remaining - $total_rem </b> </font> </td> </tr>
</table>





<table align='center' width='700' cellpadding='0' cellspacing='0' bgcolor='EFEBEB'>
<tr> <td align='center' height='20' bgcolor=''>   </td>  </tr>


<tr> 
     <td  bgcolor='' align='center' height='0' width='150'> 

	 
	 
	 
	 
	 <form action='sending_sms.php' method='POST'>

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


	 
</tr>



<tr> <td height='10'> </td> </tr>



</table>



<table align='center' width='700' cellpadding='0' cellspacing='1' bgcolor='black'>

<tr bgcolor='F2F2F2'>

 <td width='20' align='center' height='20'> <font face='arial' size='2'> Sl  </font> </td>
 <td width='200' align='center'> <font face='arial' size='2'> Mobile  </font> </td>  
 <td width='350' align='center'> <font face='arial' size='2'> Details  </font> </td> 
</tr>
";

$result = mysql_query("SELECT * FROM `sms_count` where adat>='$mdate' && adat<='$ndate'");

while ($a_row = mysql_fetch_row($result)) {

	foreach ($a_row as $field) {
		
	}
$to++;
print"
<tr bgcolor='white'>
 <td width='20' align='center' height='20'> <font face='arial' size='2'> $to  </font> </td>
 <td width='200' align='center'> <font face='arial' size='2'> $a_row[5]  </font> </td>  
 <td width='350' align='center'> <font face='arial' size='2'> $a_row[6]  </font> </td> 
</tr>
";


}


print"


</table>


<br> 

<table align='center' width='700' cellpadding='0' cellspacing='0'>
<tr> <td align='center' height='28' bgcolor='#7087A3' id='tdt'>  <font face='arial' color='white' size='2'> <b>   </b> </font> </td> </tr>
</table>










</td>


</tr>
</table>




</body>

</html>


";


?>