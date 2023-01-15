<?php


//include_once('session.php');

include_once('dbconnection.php');


$ser=trim($_POST['ser']);

$class=trim($_POST['class']);

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


$s=trim($_POST['s']);


if($ser==11)
{

$result = mysql_query("DELETE FROM student_infoo WHERE user_id=$s");
include_once('d.php');
}






$ac=1;


$result = mysql_query("SELECT * FROM `sms_count` where active='$ac'  ORDER BY `user_id` ASC  LIMIT 0 , 600000 ");


while ($a_row = mysql_fetch_row($result)) {

	foreach ($a_row as $field) {
		
	}
//print"  $a_row[1]  <br>";
$var="$a_row[1],$var";
}


$total=substr_count("$var",",");

//print" <br> <br> $var  <br> <br>

//$total

//";





$result = mysql_query("SELECT * FROM `sms_count` where active='$ac' && adat>='$mdate' && adat<='$ndate'  ORDER BY `user_id` ASC  LIMIT 0 , 60000 ");

while ($a_row = mysql_fetch_row($result)) {

	foreach ($a_row as $field) {
		
	}

$varr="$a_row[1],$varr";
}




$total_send=substr_count("$varr",",");








/*

$result = mysql_query("SELECT * FROM sms_count where active='$ac' ");
$num_rows = mysql_num_rows($result);

$extra2015=6000;

$total_send=700+$num_rows+$extra2015;

*/


$given=10000;

$rem=$given-$total;




if($class==1)
{
$classn="Sent";
}


if($class==0)
{
$classn="Not Sent";
}



if($class=="")
{
$classn="All";
}






//print"$mdate - $ndate";



//rint"-- $class --";


print"

<html>

<head>
<title> Sms status </title>
<meta http-equiv='content-type' content='text/html;charset=utf-8' />

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











<form action='sms_count.php' method='POST'>


<table align='center' width='850' cellpadding='0' cellspacing='0'>
<tr> <td align='center' height='28' bgcolor='#7087A3' id='tda'>  <font face='arial' color='white' size='2'> <b> View Sms - Total sms: $given -  &nbsp;&nbsp;&nbsp;&nbsp;   Send: $total -  Remaining: $rem </b> </font> </td> </tr>
</table>


<table align='center' width='850' cellpadding='0' cellsapcing=''>
<tr> <td height='10'> </td> </tr>

";

include_once('year.php');

print"

</table>


<table align='center' width='850' cellpadding='0'  bgcolor='white' cellspacing='0'>
<tr bgcolor=''>


<td height='40' align='center'> <font face='arial' size='2'> Status: </font> 

<select name='class'>

<option value='$class'> $classn </option>


";


print"
<option value=''> All </option>
<option value='1'> Sent </option>
<option value='0'> Not Sent </option>
";

print"
</select>




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


<input type='hidden' name='ser' value='1'>


<input type='submit' value='Search'>

</td> 

</form>
</tr>
</table>








<table align='center' width='850' cellpadding='5'  bgcolor='cccccc' cellspacing='1'>

<tr bgcolor='F2F2F2'> 


<td width='150' align='center' height='20' bgcolor=''> <font face='arial' size='2'>  <b> Mobile </b> </font>  </td> 
<td width='100' align='center' height='20' bgcolor=''> <font face='arial' size='2'> <b> Date </b> </font>  </td> 
<td width='100' align='center'> <font face='arial' size='2'> <b> Details </b> </font>  </td> 
<td width='100' height='30' align='center'><font face='arial' size='2'> <b> Status </b></font>  </td> 


</tr>
";



//print"<br> $class  -";





if($class=="")
{

//$result = mysql_query("SELECT * FROM online_application");
$result = mysql_query("SELECT * FROM `sms_count` where adat>='$mdate' && adat<='$ndate'  ORDER BY `user_id` ASC  LIMIT 0 , 60000 ");

}



//print" <br> <br> <br>  $mdate -  $ndate <br>";


if($class!="")
{
$result = mysql_query("SELECT * FROM `sms_count` where active='$class' && adat>='$mdate' && adat<='$ndate'  ORDER BY `user_id` ASC  LIMIT 0 , 60000 ");

}




while ($a_row = mysql_fetch_row($result)) {

	foreach ($a_row as $field) {
		
	}


print"


<tr bgcolor='white'> 

 
<td width='50' align='center' height='20' bgcolor=''>  <font face='arial' size='2'> 
";

$detn=str_replace(",","<br>","$a_row[1]");



print"

$detn
 </font>  </td> 

<td width='50' align='center' height='20' bgcolor=''>  <font face='arial' size='2'>  $a_row[2] - $a_row[3] - $a_row[4] </font>  </td> 

<td width='50' align='left' height='20' bgcolor=''>  <font face='arial' size='2'>
";

//$det = urlencode($a_row[6]);

$det=str_replace("+"," ","$a_row[6]");

print"
   
$det

  </font>  </td> 
";


if($a_row[7]==1)
{
print"
<td width='50' align='center' height='20' bgcolor=''>  <font face='arial' size='2'>  Sent  </font>  </td> 
";
}
else
{
print"
<td width='50' align='center' height='20' bgcolor=''>  <font face='arial' size='2' color='red'> Not Sent  </font>  </td> 
";

}



print"


</tr>
";

}



print"

<tr> <td align='center' height='20' bgcolor=''>   </td> <td> </td> </tr>

</table>






<table align='center' width='850' cellpadding='0' cellspacing='0'>
<tr> <td align='center' height='28' bgcolor='#7087A3' id='tdt'>  <font face='arial' color='white' size='2'> <b> $total_send  </b> </font> </td> </tr>
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