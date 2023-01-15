<?php

include_once('dbconnection.php');



$ser=trim($_POST['ser']);
$credit=trim($_POST['credit']);


if($credit=="")
{
$credit=1;
}



if($credit==2)
{
$creditn="Credit";
}


if($credit==1)
{
$creditn="Debit";
}







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





/*
$cost_name=trim($_POST['cost_name']);


$sql="SELECT * FROM `expenduter_head` WHERE user_id='$cost_name' ";

$result=mysql_query($sql);
$arr5=mysql_fetch_array($result);

$cost_namen=$arr5[1];
*/












print"

<html>

<head>
<title> Today's Transaction  </title>
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
<td align='center' valign='top' width='220' bgcolor='#C5B991'>  

<table align='center' width='200' cellpadding='0' cellspacing='0' height=''>

<tr> <td height='10'> </td></tr>


<tr> <td height='30' width='200' bgcolor='green'>   <span id='child'> <b> <font color='white'> Report </font> </b> </span>  </td></tr>

<tr> <td height='7'> </td></tr>





";


include_once('create_left.php');


print"
















<td align='center' valign='top' width='780'>  



<br>
<br>


";








print"
<table align='center' width='850' cellpadding='0' cellspacing='0' bgcolor='F2F2F2'>
<tr> <td height='28' align='center' id='tda' bgcolor='#7087A3'> <font size='4' face='arial' color='white'> Today's Transaction    </font> </td> </tr>
</table>
";


print"
<table align='center' width='850' cellpadding='0' cellspacing='0' bgcolor=''>


<tr bgcolor='F2F2F2'> 

<form action='today_report.php' method='POST'>

<td height='40' width='' align='center'> <font size='2' face='arial' color='black'>  Select One: &nbsp;   </font> 


<select name='credit' id='ar'>

<option value='$credit'>$creditn</option>
<option value='1'>Debit</option>
<option value='2'>Credit</option>

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
";

include_once('year.php');

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

include_once('year1.php');

print"
</select>


<input type='hidden' name='ser' value='1'>



<input type='hidden' name='sesion_user_id' value='$sesion_user_id'>
<input type='hidden' name='sesion_password' value='$sesion_password'>
<input type='hidden' name='sy' value='1'>


<input type='submit' value='Search'>



</td> 

</form>

</tr>

</table>
";











print"
<table align='center' width='850' cellpadding='8' cellspacing='1' bgcolor='cccccc'>
";



if($credit==2)
{
print"
<tr bgcolor='yellow'> 
<td height='28' width='80' align='center'> <font size='2' face='arial' color='black'>    </font> </td> 
<td height='28' width='80' align='center'> <font size='2' face='arial' color='black'>   </font> </td> 
<td height='28' width='80' align='center'> <font size='2' face='arial' color='black'>  </font> </td> 
<td height='28' width='280' align='center'> <font size='2' face='arial' color='black'> <b> Cash Credit </b>  </font> </td> 
<td height=''  width='80'align='center'> <font size='2' face='arial' color='black'>     </font> </td> 
<td height=''  width='80'align='center'> <font size='2' face='arial' color='black'>    </font> </td> 
</tr>
";
}
	

	
	
	
	
	
	
	
if($credit==1)
{
print"
<tr bgcolor='yellow'> 
<td height='28' width='80' align='center'> <font size='2' face='arial' color='black'>    </font> </td> 
<td height='28' width='80' align='center'> <font size='2' face='arial' color='black'>   </font> </td> 
<td height='28' width='80' align='center'> <font size='2' face='arial' color='black'>  </font> </td> 
<td height='28' width='280' align='center'> <font size='2' face='arial' color='black'> <b> Cash Debit </b>  </font> </td> 
<td height=''  width='80'align='center'> <font size='2' face='arial' color='black'>     </font> </td> 
<td height=''  width='80'align='center'> <font size='2' face='arial' color='black'>    </font> </td> 
</tr>
";
}
	
	
	
	
	
	
	


print"
<tr bgcolor='F2F2F2'> 
<td height='28' width='80' align='center'> <font size='2' face='arial' color='black'> <b> SL. </b>   </font> </td> 
<td height='28' width='80' align='center'> <font size='2' face='arial' color='black'> <b> Money_ID </b>   </font> </td> 
<td height='28' width='80' align='center'> <font size='2' face='arial' color='black'>  <b> Date </b>  </font> </td> 
<td height='28' width='280' align='left'> <font size='2' face='arial' color='black'>  <b> Details </b>  </font> </td> 
<td height=''  width='80'align='center'> <font size='2' face='arial' color='black'>  <b> Amount </b>   </font> </td> 
<td height=''  width='80'align='center'> <font size='2' face='arial' color='black'> <b> Balance </b>  </font> </td> 
</tr>
";







$r=0;
$dr=0;
$cr=0;
$balance=0;




$result = mysql_query("SELECT * FROM `cash_book` where  adat>='$mdate' && adat<='$ndate' && credit='$credit'  ORDER BY `adat` ASC  LIMIT 0 , 6000000 ");




/*
if($credit=="")
{
$result = mysql_query("SELECT * FROM `cash_book` where  adat>='$mdate' && adat<='$ndate'  ORDER BY `adat` ASC  LIMIT 0 , 6000000 ");
}
*/



while ($a_row = mysql_fetch_row($result)) {

	foreach ($a_row as $field) {
		
	}




$r++;

print"
<tr bgcolor='white'> 
<td height='28' width='80' align='center'> <font size='2' face='arial' color='black'> $r   </font> </td> 
<td height='28' width='80' align='center'> <font size='2' face='arial' color='black'> $a_row[1]   </font> </td> 
<td height='28' width='80' align='center'> <font size='2' face='arial' color='black'> $a_row[2]-$a_row[3]-$a_row[4] </font> </td> 
<td height='28' width='280' align='left'> <font size='2' face='arial' color='black'> $a_row[7]  </font> </td> 
";


print"
<td height=''  width='100'align='center'> <font size='2' face='arial' color='black'> $a_row[10] </font> </td> 
";
$cr=$cr+$a_row[10];


$balance=$balance+$cr;




print"


<td height=''  width='100'align='center'> <font size='2' face='arial' color='black'>  $cr</font> </td> 

</tr>
";

}







$cr_c=$cr;


print"
<tr bgcolor='#f2f2f2'> 
<td height='28' width='' align='center'> <font size='2' face='arial' color='black'>    </font> </td> 
<td height='28' width='' align='center'> <font size='2' face='arial' color='black'>    </font> </td> 
<td height='28' width='' align='center'> <font size='2' face='arial' color='black'>   </font> </td> 
<td height='28' width='' align='center'> <font size='2' face='arial' color='black'>   </font> </td> 
<td height=''  width=''align='center' bgcolor=''> <font size='3' face='arial' color='black'> <b> Total </b>  </font> </td>
<td height=''  width=''align='center' bgcolor=''> <font size='3' face='arial' color='black'> <b> $cr_c </b>  </font> </td>

</tr>
";



//////////////////////////////////////







if($credit==2)
{
print"
<tr bgcolor='yellow'> 
<td height='28' width='80' align='center'> <font size='2' face='arial' color='black'>    </font> </td> 
<td height='28' width='80' align='center'> <font size='2' face='arial' color='black'>   </font> </td> 
<td height='28' width='80' align='center'> <font size='2' face='arial' color='black'>  </font> </td> 
<td height='28' width='280' align='center'> <font size='2' face='arial' color='black'> <b> Bank Credit </b>  </font> </td> 
<td height=''  width='80'align='center'> <font size='2' face='arial' color='black'>     </font> </td> 
<td height=''  width='80'align='center'> <font size='2' face='arial' color='black'>    </font> </td> 
</tr>
";
}


if($credit==1)
{
print"
<tr bgcolor='yellow'> 
<td height='28' width='80' align='center'> <font size='2' face='arial' color='black'>    </font> </td> 
<td height='28' width='80' align='center'> <font size='2' face='arial' color='black'>   </font> </td> 
<td height='28' width='80' align='center'> <font size='2' face='arial' color='black'>  </font> </td> 
<td height='28' width='280' align='center'> <font size='2' face='arial' color='black'> <b> Bank Debit </b>  </font> </td> 
<td height=''  width='80'align='center'> <font size='2' face='arial' color='black'>     </font> </td> 
<td height=''  width='80'align='center'> <font size='2' face='arial' color='black'>    </font> </td> 
</tr>
";
}

	



print"
<tr bgcolor='F2F2F2'> 
<td height='28' width='80' align='center'> <font size='2' face='arial' color='black'> <b> SL. </b>   </font> </td> 
<td height='28' width='80' align='center'> <font size='2' face='arial' color='black'> <b> Money_ID </b>   </font> </td> 
<td height='28' width='80' align='center'> <font size='2' face='arial' color='black'>  <b> Date </b>  </font> </td> 
<td height='28' width='280' align='left'> <font size='2' face='arial' color='black'>  <b> Details </b>  </font> </td> 
<td height=''  width='80'align='center'> <font size='2' face='arial' color='black'>  <b> Amount </b>   </font> </td> 
<td height=''  width='80'align='center'> <font size='2' face='arial' color='black'> <b> Balance </b>  </font> </td> 
</tr>
";







$r=0;
$dr=0;
$cr=0;
$balance=0;




$result = mysql_query("SELECT * FROM `bank_refill` where  adat>='$mdate' && adat<='$ndate' && credit='$credit'  ORDER BY `adat` ASC  LIMIT 0 , 6000000 ");




/*
if($credit=="")
{
$result = mysql_query("SELECT * FROM `cash_book` where  adat>='$mdate' && adat<='$ndate'  ORDER BY `adat` ASC  LIMIT 0 , 6000000 ");
}
*/



while ($a_row = mysql_fetch_row($result)) {

	foreach ($a_row as $field) {
		
	}




$r++;

print"
<tr bgcolor='white'> 
<td height='28' width='80' align='center'> <font size='2' face='arial' color='black'> $r   </font> </td> 
<td height='28' width='80' align='center'> <font size='2' face='arial' color='black'> $a_row[8]   </font> </td> 
<td height='28' width='80' align='center'> <font size='2' face='arial' color='black'> $a_row[5]-$a_row[6]-$a_row[7] </font> </td> 
<td height='28' width='280' align='left'> <font size='2' face='arial' color='black'> $a_row[4]  </font> </td> 
";



print"
<td height=''  width='100'align='center'> <font size='2' face='arial' color='black'> $a_row[3] </font> </td> 
";
$cr=$cr+$a_row[3];





print"
<td height=''  width='100'align='center'> <font size='2' face='arial' color='black'>  $cr </font> </td> 
</tr>
";

}



$cr_bank=$cr;





print"
<tr bgcolor='white'> 
<td height='28' width='' align='center'> <font size='2' face='arial' color='black'>    </font> </td> 
<td height='28' width='' align='center'> <font size='2' face='arial' color='black'>    </font> </td> 
<td height='28' width='' align='center'> <font size='2' face='arial' color='black'>   </font> </td> 
<td height='28' width='' align='center'> <font size='2' face='arial' color='black'>   </font> </td> 
<td height=''  width=''align='center' bgcolor='yellow'> <font size='4' face='arial' color='black'> <b> Total </b>  </font> </td>
<td height=''  width=''align='center' bgcolor='yellow'> <font size='4' face='arial' color='black'> <b> $cr_bank </b>  </font> </td>

</tr>
";





print"
</table>
<br>
<br>
";

$ccc=$cr_c+$cr_bank;


/*
if($credit==2)
{
print"
<table align='center' width='600' cellpadding='0' cellspacing='1' bgcolor='black'>
<tr bgcolor='#F2F2F2'> 
<td width='200' align='center' height='30'> <font face='arial' size='4'> Cash Credit </font>  </td>
<td width='200' align='center'> <font face='arial' size='4'> Bank Credit </font> </td>
<td width='200' align='center'> <font face='arial' size='4'> Total </font> </td>
</tr>

<tr bgcolor='#F2F2F2'> 
<td width='200' align='center' height='30'> <font face='arial' size='4'>  $cr_c </font>  </td>
<td width='200' align='center'> <font face='arial' size='4'>  $cr_bank  </font> </td>
<td width='200' align='center'> <font face='arial' size='4'>  $ccc </font> </td>
</tr>

</table>
";
}


if($credit==1)
{
print"
<table align='center' width='600' cellpadding='0' cellspacing='1' bgcolor='black'>
<tr bgcolor='#F2F2F2'> 
<td width='200' align='center' height='30'> <font face='arial' size='4'> Cash Debit </font>  </td>
<td width='200' align='center'> <font face='arial' size='4'> Bank Debit </font> </td>
<td width='200' align='center'> <font face='arial' size='4'> Total </font> </td>
</tr>

<tr bgcolor='#F2F2F2'> 
<td width='200' align='center' height='30'> <font face='arial' size='4'>  $cr_c </font>  </td>
<td width='200' align='center'> <font face='arial' size='4'>  $cr_bank  </font> </td>
<td width='200' align='center'> <font face='arial' size='4'>  $ccc </font> </td>
</tr>

</table>
";
}

*/


print"
<br>
<br>


";






















print"


<br>


<table align='center' width='750' cellpadding='0' cellspacing='0'>
<tr> 
<form action='today_report_print.php' method='POST' target='_blank'>
<td align='right'>

<input type='hidden' name='credit' value='$credit'>

<input type='hidden' name='dat1' value='$dat1'>
<input type='hidden' name='mon1' value='$mon1'>
<input type='hidden' name='yer1' value='$yer1'>

<input type='hidden' name='ser' value='1'>


<input type='hidden' name='dat2' value='$dat2'>
<input type='hidden' name='mon2' value='$mon2'>
<input type='hidden' name='yer2' value='$yer2'>


 <input type='submit' value='Print' id='enter2'>  &nbsp;&nbsp;&nbsp;</td> 
</form>
</tr>
</table>

<br><br>
<br><br>
<br>



</td>


</tr>
</table>




</body>

</html>


";


?>