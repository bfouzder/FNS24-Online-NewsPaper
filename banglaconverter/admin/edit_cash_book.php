<?php

include_once('dbconnection.php');



$ser=trim($_POST['ser']);
$credit=trim($_POST['credit']);

$cr=trim($_POST['cr']);
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




if($ser==123)
{
	

$sql= "UPDATE  `cash_book` SET `balance`='$cr' WHERE `user_id`='$s'";
mysql_query($sql);
	
	
include_once('s.php');

}




$d=$_GET['dell'];


if($d!="")
{
	
$result = mysql_query("DELETE FROM cash_book WHERE user_id='$d'");


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
<title> Cash book </title>
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


<tr> <td height='30' width='200' bgcolor='green'>  <span id='child'> <b> <font color='white'> Edit </font> </b> </span>  </td></tr>

<tr> <td height='7'> </td></tr>





";


include_once('edit_left.php');


print"
















<td align='center' valign='top' width='980'>  

<br>
<br>

";








print"
<table align='center' width='750' cellpadding='0' cellspacing='0' bgcolor='F2F2F2'>
<tr> <td height='28' align='center' id='tda' bgcolor='#7087A3'> <font size='3' face='arial' color='white'> Edit Opening Cash Book   </font> </td> </tr>
</table>
";












print"
<table align='center' width='750' cellpadding='8' cellspacing='1' bgcolor='cccccc'>

";













$dr=0;
$cr=0;


$result = mysql_query("SELECT * FROM `cash_book` where   adat<'$mdate'  ORDER BY `user_id` ASC  LIMIT 0 , 60000 ");


while ($a_row = mysql_fetch_row($result)) {

	foreach ($a_row as $field) {
		
	}




$r++;

if($a_row[9]==2)
{

$dr=$dr+$a_row[10];
}

if($a_row[9]==1)
{
$cr=$cr+$a_row[10];
}


}

$balancee=$cr-$dr;





print"
<tr bgcolor='F2F2F2'> 
<td height='28' width='80' align='center'> <font size='2' face='arial' color='black'> SL.   </font> </td> 
<td height='28' width='80' align='center'> <font size='2' face='arial' color='black'> Money_id   </font> </td> 
<td height='28' width='80' align='center'> <font size='2' face='arial' color='black'> Date  </font> </td> 
<td height='28' width='280' align='left'> <font size='2' face='arial' color='black'> &nbsp; Comments  </font> </td> 
<td height=''  width='80'align='center'> <font size='2' face='arial' color='black'>  Debit  </font> </td> 
<td height=''  width='100'align='center'> <font size='2' face='arial' color='black'>  Tk. </font> </td> 
<td height=''  width='80'align='center'> <font size='2' face='arial' color='black'>  Credit  </font> </td> 
<td height=''  width='100'align='center'> <font size='2' face='arial' color='black'>  Edit  </font> </td> 
<td height=''  width='100'align='center'> <font size='2' face='arial' color='black'>  Delete  </font> </td> 


</tr>
";





$dr=0;
$cr=0;
$balance=0;

$cb=12345;


if($credit=="")
{
$result = mysql_query("SELECT * FROM `cash_book` where  time='$cb'  ORDER BY `adat` ASC  LIMIT 0 , 6000000 ");
}


while ($a_row = mysql_fetch_row($result)) {

	foreach ($a_row as $field) {
		
	}




$r++;

print"
<form action='edit_cash_book.php' method='POST'>

<tr bgcolor='F2F2F2'> 
<td height='28' width='80' align='center'> <font size='2' face='arial' color='black'> $r   </font> </td> 
<td height='28' width='80' align='center'> <font size='2' face='arial' color='black'> $a_row[1]   </font> </td> 
<td height='28' width='80' align='center'> <font size='2' face='arial' color='black'> $a_row[2]-$a_row[3]-$a_row[4] </font> </td> 
<td height='28' width='280' align='left'> <font size='2' face='arial' color='black'> $a_row[7]  </font> </td> 
";

if($a_row[9]==1)
{
print"
<td height=''  width='80'align='center'> <font size='2' face='arial' color='black'>  
 <input type='text' name='cr' value='$a_row[10]' size='10'>
</font> </td> 
<td height=''  width='100'align='center'> <font size='2' face='arial' color='black'>   </font> </td> 



<td height=''  width='80'align='center'> <font size='2' face='arial' color='black'>    </font> </td> 
";
$dr=$dr+$a_row[10];
}

if($a_row[9]==2)
{
print"

<td height=''  width='80'align='center'> <font size='2' face='arial' color='black'>    </font> </td> 
<td height=''  width='100'align='center'> <font size='2' face='arial' color='black'>   </font> </td> 

<td height=''  width='100'align='center'> <font size='2' face='arial' color='black'> 

<input type='text' name='cr' value='$a_row[10]' size='10'>

 </font> </td> 

";
$cr=$cr+$a_row[10];
}

$balance=$cr-$dr;




print"


<td height=''  width='100'align='center'> 
<font size='2' face='arial' color='black'>   </font> 
<input type='hidden' name='ser' value='123'>
<input type='hidden' name='s' value='$a_row[0]'>
<input type='submit'  value='Edit'>
</td> 
</form>


";





	 if($user_name1=="superadmin")
{
print"
	 <td align='center' width='70'> <a onClick=\"javascript: return confirm('Are you confirm to delete');\" href=\"edit_cash_book.php?dell=".$a_row[0]."\"> <div id='del'><font face='arial' size='2'> Delete  </font> </div>  </a> </td>
	 ";
	 
}




print"
</tr>
";

}





















print"
</table>
";




























print"
<table align='center' width='750' cellpadding='0' cellspacing='0'>
<tr> <td align='center' height='28' bgcolor='#7087A3' id='tdt'>  <font face='arial' color='white' size='2'> <b>   </b> </font> </td> </tr>
</table>

<br>


<table align='center' width='750' cellpadding='0' cellspacing='0'>
<tr> 
<form action='cash_book_print.php' method='POST' target='a_blank'>
<td align='right'>

<input type='hidden' name='credit' value='$credit'>

<input type='hidden' name='dat1' value='$dat1'>
<input type='hidden' name='mon1' value='$mon1'>
<input type='hidden' name='yer1' value='$yer1'>

<input type='hidden' name='ser' value='1'>


<input type='hidden' name='dat2' value='$dat2'>
<input type='hidden' name='mon2' value='$mon2'>
<input type='hidden' name='yer2' value='$yer2'>


&nbsp;&nbsp;&nbsp;</td> 
</form>
</tr>
</table>




</td>


</tr>
</table>




</body>

</html>


";


?>