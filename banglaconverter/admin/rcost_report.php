<?php



include_once('dbconnection.php');




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


$sql="SELECT * FROM `rexpendature_sub` WHERE user_id='$cost_name' ";


$result=mysql_query($sql);
$arr5=mysql_fetch_array($result);

$cost_namen=$arr5[2];



print"

<html>

<head>
<title> Others Income Reports </title>
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


include_once('header.php');


print"
<table align='center' width='1200' cellpadding='0' cellspacing='1' height='800' bgcolor='gray'>
<tr bgcolor='white'> 
";

include_once('report_left.php');












print"
<td align='center' valign='top' width='980'>  
<br>
";





print"

  
<table align='center' width='700' cellpadding='0' cellspacing='0'>

<tr>

<td align='center' bgcolor='F2F2F2	' height='50'>
";










print"
<table align='center' width='750' cellpadding='0' cellspacing='0' bgcolor='F2F2F2'>
<tr> <td height='28' align='center' id='tda' bgcolor='#7087A3'> <font size='4' face='arial' color='white'> Daily Others  Income Reports   </font> </td> </tr>
</table>
";

$u=-1;

$result = mysql_query("SELECT * FROM rexpendature_sub");

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
<table align='center' width='750' cellpadding='0' cellspacing='0' bgcolor=''>


<tr bgcolor='F2F2F2'> 

<form action='rcost_report.php' method='POST'>

<td height='40' width='700' align='center'> <font size='2' face='arial' color='black'>  Select One: &nbsp;   </font> 


<select name='cost_name' id='ar'>

<option value='$cost_name'>$cost_namen</option>

<option value=''>All</option>

";

for($i=0;$i<=$u;$i++)
{
print"
<option value='$expenduter_sub_id[$i]'>$expenduter_sub[$i]</option>
";
}


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
";

include_once('year1.php');

print"
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
";

include_once('year.php');

print"
</select>


<input type='hidden' name='ser' value='1'>


<input type='submit' value='Search'>



</td> 

</form>

</tr>

</table>
";




print"
<table align='center' width='750' cellpadding='6' cellspacing='1' bgcolor='cccccc' class='list1'>


<tr bgcolor='F2F2F2'> 
<td height='28' width='80' align='center'> <font size='2' face='arial' color='black'> SL.   </font> </td> 
<td height=''   width='80'align='center'> <font size='2' face='arial' color='black'>  Date  </font> </td>
<td height=''  width='150'align='left'> <font size='2' face='arial' color='black'>  Name  </font> </td> 

<td height=''  width='200'align='left'> <font size='2' face='arial' color='black'>  Details  </font> </td> 


<td height=''  width='100'align='left'> <font size='2' face='arial' color='black'>  Amount  </font> </td> 
</tr>

";



$total=0;

if($cost_name=="")
{
$result = mysql_query("SELECT * FROM `rcosting_entry` where  adat>='$mdate' && adat<='$ndate'  ORDER BY `adat` ASC  LIMIT 0 , 6000");
}


if($cost_name!="")
{
$result = mysql_query("SELECT * FROM `rcosting_entry` where  sub_id='$cost_name' && adat>='$mdate' && adat<='$ndate'  ORDER BY `adat` ASC  LIMIT 0 , 6000");
}



while ($a_row = mysql_fetch_row($result)) {

	foreach ($a_row as $field) {
		
	}

$r++;

print"
<tr bgcolor='white'> 
<td height='28' width='' align='center'> <font size='2' face='arial' color='black'>  $r - $a_row[1]  </font> </td> 
<td height=''   width=''align='center'> <font size='2' face='arial' color='black'>  $a_row[6]-$a_row[7]-$a_row[8]  </font> </td>
<td height=''  width=''align='left'> <font size='2' face='arial' color='black'>  $a_row[3]  </font> </td> 
<td height=''  width=''align='left'> <font size='2' face='arial' color='black'>  $a_row[4]  </font> </td> 
<td height=''  width=''align='left'> <font size='2' face='arial' color='black'>  $a_row[5]  </font> </td> 
</tr>
";

$total=$total+$a_row[5];

}







print"
<tr bgcolor='white'> 
<td height='28' width='' align='center'> <font size='2' face='arial' color='black'>    </font> </td> 
<td height=''   width=''align='center'> <font size='2' face='arial' color='black'>    </font> </td>
<td height=''  width=''align='center'> <font size='2' face='arial' color='black'>    </font> </td> 
<td height=''  width=''align='left'> <font size='2' face='arial' color='black'>  Total  </font> </td> 
<td height=''  width=''align='left'> <font size='2' face='arial' color='black'>   $total </font> </td> 
</tr>
";


print"
</table>
";







print"
<table align='center' width='750' cellpadding='0' cellspacing='0'>
<tr> <td align='center' height='28' bgcolor='#7087A3' id='tdt'>  <font face='arial' color='white' size='2'> <b>   </b> </font> </td> </tr>
</table>
";



print"

<br>

<form action='rcost_report_print.php' method='POST' target='a_blank'>

<input type='hidden' name='ser' value='1'>

<input type='hidden' name='dat1' value='$dat1'>
<input type='hidden' name='mon1' value='$mon1'>
<input type='hidden' name='yer1' value='$yer1'>

<input type='hidden' name='dat2' value='$dat2'>
<input type='hidden' name='mon2' value='$mon2'>
<input type='hidden' name='yer2' value='$yer2'>


<input type='hidden' name='cost_name' value='$cost_name'>


<input type='submit' value='Print'>

</form>
";


print"
</td>
</tr>

</table>

</td>  



</tr>
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