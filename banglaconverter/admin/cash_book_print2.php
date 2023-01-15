<?php

include_once('dbconnection.php');
include_once('ppp.php');


$meter=5;

$ser=trim($_POST['ser']);
$credit=trim($_POST['credit']);


if($credit=="")
{
$creditn="All";
}



if($credit==1)
{
$creditn="Credit";
}


if($credit==2)
{
$creditn="Debit";
}







$dat1=trim($_POST['dat1']);
$mon1=trim($_POST['mon1']);
$yer1=trim($_POST['yer1']);




$dat2=trim($_POST['dat2']);
$mon2=trim($_POST['mon2']);
$yer2=trim($_POST['yer2']);











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



$mdate="20150101";
$ndate="20190101";



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

<style>

@media all {
	.page-break	{ display: none; }
}

@media print {
	.page-break	{ display: block; page-break-before: always; }
}

</style>


</head>


<body onload='window.print()'>
";


include_once('address.php');
/*

print"
<table align='center' width='1200' cellpadding='0' cellspacing='0' height='' bgcolor=''>
<tr bgcolor='white'> 


";


//include_once('create_left.php');


print"
<td align='center' valign='top' width='980'>  
";


*/





print"
<table align='center' width='400' cellpadding='0' cellspacing='0' bgcolor=''>
<tr> <td height='28' align='center' id='td5' bgcolor=''> <font size='4' face='arial' color=''> <B> Cash Book </B>  </font> </td> </tr>
</table>
";





print"
<table align='center' width='1200' cellpadding='0' cellspacing='1'>
<tr bgcolor=''>
<td align='left' HEIGHT='30'> <font size='4' face='arial'>  </font> </td>
</tr>
<tr bgcolor=''>
<td align='left' HEIGHT='30'> <font size='4' face='arial'>  <b>  Date :  $dat1-$mon1-$yer1 To $dat2-$mon2-$yer2 </b>   </font> </td>
</tr>
<tr bgcolor=''>
<td align='left' HEIGHT='30'> <font size='4' face='arial'> $creditn_OLD </font> </td>
</tr>


</table>
";




print"
<table align='center' width='1200' cellpadding='3' cellspacing='1' bgcolor='gray'>
";



print"
<tr bgcolor='F2F2F2'> 
<td height='28' width='20' align='center'> <font size='4' face='arial' color='black'> SL.   </font> </td> 
<td height='28' width='80' align='center'> <font size='4' face='arial' color='black'> Money_ID   </font> </td> 
<td height='28' width='150' align='center'> <font size='4' face='arial' color='black'> Date  </font> </td> 
<td height='28' width='500' align='center'> <font size='4' face='arial' color='black'> Comments  </font> </td> 
<td height=''  width='100' align='center'> <font size='4' face='arial' color='black'>  Debit  </font> </td> 
<td height=''  width='150' align='center'> <font size='4' face='arial' color='black'> &nbsp;  </font> </td> 
<td height=''  width='100' align='center'> <font size='4' face='arial' color='black'>  Credit  </font> </td> 
<td height=''  width='100' align='center'> <font size='4' face='arial' color='black'>  Balance </font> </td> 
</tr>
";




print"
<tr bgcolor='white'> 
<td height='28' width='20' align='center'> <font size='4' face='arial' color='black'>  &nbsp;  </font> </td> 
<td height='28' width='80' align='center'> <font size='4' face='arial' color='black'>  &nbsp;  </font> </td> 
<td height='28' width='150' align='center'> <font size='4' face='arial' color='black'> &nbsp;  </font> </td> 
<td height='28' width='550' align='left'> <font size='4' face='arial' color='black'> Opening  </font> </td> 
<td height=''  width='100' align='center'> <font size='4' face='arial' color='black'> &nbsp;  </font> </td> 
<td height=''  width='100' align='center'> <font size='4' face='arial' color='black'> &nbsp;   </font> </td> 
<td height=''  width='100' align='center'> <font size='4' face='arial' color='black'> &nbsp;  </font> </td> 
<td height=''  width='100' align='right'> <font size='4' face='arial' color='black'>  $balancee </font> </td> 
</tr>
";






$dr=0;
$cr=0;


$result = mysql_query("SELECT * FROM `cash_book` where   adat<'$mdate'  ORDER BY `user_id` ASC  LIMIT 0 , 60000000 ");


while ($a_row = mysql_fetch_row($result)) {

	foreach ($a_row as $field) {
		
	}




$r++;

if($a_row[9]==1)
{

$dr=$dr+$a_row[10];
}

if($a_row[9]==2)
{
$cr=$cr+$a_row[10];
}


}

$balancee=$dr-$cr;







$r=0;
$dr=0;
$cr=0;
$balance=0;


if($credit!="")
{
$result = mysql_query("SELECT * FROM `cash_book` where  adat>='$mdate' && adat<='$ndate' && credit='$credit'  ORDER BY `adat` ASC,`user_id` ASC");
}

if($credit=="")
{
$result = mysql_query("SELECT * FROM `cash_book` where  adat>='$mdate' && adat<='$ndate'  ORDER BY `adat` ASC,`user_id` ASC");
}


while ($a_row = mysql_fetch_row($result)) {

	foreach ($a_row as $field) {
		
	}




$r++;
$ww++;





print"
<tr bgcolor='white'> 
<td height='28' width='20' align='center'> <font size='4' face='arial' color='black'> $r   </font> </td> 
<td height='28' width='80' align='center'> <font size='4' face='arial' color='black'> $a_row[1]   </font> </td> 
<td height='28' width='150' align='center'> <font size='4' face='arial' color='black'> $a_row[2]-$a_row[3]-$a_row[4] </font> </td> 
<td height='28' width='500' align='left'> <font size='4' face='arial' color='black'> $a_row[7]  </font> </td> 
";


$a_row_up= number_format($a_row[10], 2);


if($a_row[9]==1)
{
print"
<td height=''  width='100' align='right'> <font size='4' face='arial' color='black'> $a_row_up   </font> </td> 
<td height=''  width='100' align='center'> <font size='4' face='arial' color='black'>   </font> </td> 

<td height=''  width='100' align='center'> <font size='4' face='arial' color='black'>    </font> </td> 
";
$dr=$dr+$a_row[10];
}

if($a_row[9]==2)
{
print"

<td height=''  width='100' align='center'> <font size='4' face='arial' color='black'>    </font> </td> 
<td height=''  width='100' align='center'> <font size='4' face='arial' color='black'>   </font> </td> 

<td height=''  width='100' align='right'> <font size='4' face='arial' color='black'> $a_row_up </font> </td> 

";
$cr=$cr+$a_row[10];
}

$balance=$dr-$cr;

$balance_new=$balance+$balancee;


$balance_new_up= number_format($balance_new, 2);


print"
<td height=''  width='100' align='right'> <font size='4' face='arial' color='black'> $balance_new_up  </font> </td>

</tr>
";
}







}



$bal=$balance+$balancee;


$dr= number_format($dr, 2);
$cr= number_format($cr, 2);


/*
$t55_final_u= number_format($t55_final, 2);
$ar12= number_format($a_row[12], 2);
*/







print"
<tr bgcolor='white'> 
<td height='28' width='20' align='center'> <font size='4' face='arial' color='black'> &nbsp;   </font> </td> 
<td height='28' width='80' align='center'> <font size='4' face='arial' color='black'>  &nbsp;  </font> </td> 
<td height='28' width='150' align='center'> <font size='4' face='arial' color='black'> &nbsp;  </font> </td> 

<td height='28' width='500' align='right'> <font size='4' face='arial' color='black'>Total Debit   </font> </td> 


<td height=''  width='100' align='right'> <font size='4' face='arial' color='black'>  $dr  </font> </td>
<td height=''  width='150' align='center'> <font size='4' face='arial' color='black'> Total Credit  </font> </td> 
<td height=''  width='100' align='right'> <font size='4' face='arial' color='black'>   $cr  </font> </td> 
<td height=''  width='100' align='center'> <font size='4' face='arial' color='black'> &nbsp; </font> </td> 


</tr>

</table>
";






/*
print"
<tr bgcolor='white'> 
<td height='28' width='80' align='center'> <font size='4' face='arial' color='black'>    </font> </td> 
<td height='28' width='80' align='center'> <font size='4' face='arial' color='black'>    </font> </td> 
<td height='28' width='80' align='center'> <font size='4' face='arial' color='black'>   </font> </td> 
<td height='28' width='280' align='center'> <font size='4' face='arial' color='black'>   </font> </td> 
<td height=''  width='80'align='center'> <font size='4' face='arial' color='black'>  Closing Balance </font> </td>
<td height=''  width='100'align='center'> <font size='4' face='arial' color='black'>  $bal </font> </td> 
<td height=''  width='80'align='center'> <font size='4' face='arial' color='black'>    </font> </td> 
<td height=''  width='100'align='center'> <font size='4' face='arial' color='black'>   </font> </td> 
<td height=''  width='100'align='center'> <font size='4' face='arial' color='black'>   </font> </td> 

</tr>
";


*/


$tot_d=$bal+$dr;

$tot_dd=$balancee+$cr;



/*
print"
<tr bgcolor='white'> 
<td height='28' width='80' align='center'> <font size='4' face='arial' color='black'>    </font> </td> 
<td height='28' width='80' align='center'> <font size='4' face='arial' color='black'>    </font> </td> 
<td height='28' width='80' align='center'> <font size='4' face='arial' color='black'>   </font> </td> 
<td height='28' width='280' align='center'> <font size='4' face='arial' color='black'>   </font> </td> 
<td height=''  width='80'align='center'> <font size='4' face='arial' color='black'>  Total </font> </td>
<td height=''  width='100'align='center'> <font size='4' face='arial' color='black'>  $tot_d </font> </td> 
<td height=''  width='80'align='center'> <font size='4' face='arial' color='black'>  Total  </font> </td> 
<td height=''  width='100'align='center'> <font size='4' face='arial' color='black'>  $tot_dd </font> </td> 
<td height=''  width='100'align='center'> <font size='4' face='arial' color='black'>   </font> </td> 

</tr>
";
*/











print"
<br>
<br>
<br>
<br>
<br>

<table align='center' width='1000' cellpadding='0' cellspacing='0'>
<tr>
<td width='500' align='left'> ...................................................... </td>
<td width='500' align='right'> ...................................................... </td>
</tr>


<tr>
<td width='500' align='left'> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <font face='arial' size='4'> Account's Sign </font> </td>
<td width='500' align='right'> <font face='arial' size='4'> Authority Sign </font> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </td>
</tr>



</table>

";




















/*
print"
</td>
</tr>
</table>
";
*/

print"
</body>

</html>


";


?>