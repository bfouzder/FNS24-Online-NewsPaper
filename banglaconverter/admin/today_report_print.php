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


include_once('address.php');


print"
<table align='center' width='1200' cellpadding='0' cellspacing='0' height='' bgcolor=''>
<tr bgcolor='white'> 







";




print"
















<td align='center' valign='top' width='1200'>  




";








print"
<table align='center' width='450' cellpadding='0' cellspacing='0' bgcolor='F2F2F2'>
<tr> <td height='28' align='center' id='td5' bgcolor=''> <font size='5' face='arial' color='black'> Today's $creditn Transaction    </font> </td> </tr>
</table>
<br>
";






print"
<table align='center' width='1200' cellpadding='0' cellspacing='1'>

<tr bgcolor=''>
<td align='left' HEIGHT='30'> <font size='5' face='arial'> &nbsp; <b>  Date :  $dat1-$mon1-$yer1 To $dat2-$mon2-$yer2 </b>   </font> </td>
</tr>


</table>
";






print"
<table align='center' width='1200' cellpadding='3' cellspacing='1' bgcolor='cccccc'>
";



if($credit==2)
{
print"
<tr bgcolor='white'> 
<td height='28' width='' align='center'> <font size='5' face='arial' color='black'>    </font> </td> 
<td height='28' width='' align='center'> <font size='5' face='arial' color='black'>   </font> </td> 
<td height='28' width='' align='center'> <font size='5' face='arial' color='black'>  </font> </td> 
<td height='28' width='' align='center'> <font size='5' face='arial' color='black'> <b> Cash Credit </b>  </font> </td> 
<td height=''  width=''align='center'> <font size='5' face='arial' color='black'>     </font> </td> 
<td height=''  width=''align='center'> <font size='5' face='arial' color='black'>    </font> </td> 
</tr>
";
}
	

	
	
	
	
	
	
	
if($credit==1)
{
print"
<tr bgcolor='white'> 
<td height='28' width='20' align='center'> <font size='5' face='arial' color='black'>    </font> </td> 
<td height='28' width='' align='center'> <font size='5' face='arial' color='black'>   </font> </td> 
<td height='28' width='' align='center'> <font size='5' face='arial' color='black'>  </font> </td> 
<td height='28' width='' align='center'> <font size='5' face='arial' color='black'> <b> Cash Debit </b>  </font> </td> 
<td height=''  width=''align='center'> <font size='5' face='arial' color='black'>     </font> </td> 
<td height=''  width=''align='center'> <font size='5' face='arial' color='black'>    </font> </td> 
</tr>
";
}
	
	
	
	
	
	
	


print"
<tr bgcolor='F2F2F2'> 
<td height='28' width='20' align='center'> <font size='5' face='arial' color='black'>  SL. </b>   </font> </td> 
<td height='28' width='80' align='center'> <font size='5' face='arial' color='black'>  Money_ID    </font> </td> 
<td height='28' width='80' align='center'> <font size='5' face='arial' color='black'>   Date   </font> </td> 
<td height='28' width='380' align='center'> <font size='5' face='arial' color='black'>   Details   </font> </td> 
<td height=''  width='80'align='center'> <font size='5' face='arial' color='black'>   Amount    </font> </td> 
<td height=''  width='80'align='center'> <font size='5' face='arial' color='black'>  Balance   </font> </td> 
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
<td height='28' width='' align='center'> <font size='5' face='arial' color='black'> $r   </font> </td> 
<td height='28' width='' align='center'> <font size='5' face='arial' color='black'> $a_row[1]   </font> </td> 
<td height='28' width='' align='center'> <font size='5' face='arial' color='black'> $a_row[2]-$a_row[3]-$a_row[4] </font> </td> 
<td height='28' width='' align='left'> <font size='5' face='arial' color='black'> $a_row[7]  </font> </td> 
";

$ar10= number_format($a_row[10], 2);


print"
<td height=''  width='' align='right'> <font size='5' face='arial' color='black'> $ar10 </font> </td> 
";
$cr=$cr+$a_row[10];


$balance=$balance+$cr;



$cr_up= number_format($cr, 2);


print"
<td height=''  width=''align='right'> <font size='5' face='arial' color='black'>  $cr_up </font> </td> 

</tr>
";

}







$cr_c=$cr;

$cr_c_up= number_format($cr_c, 2);


print"
<tr bgcolor='#f2f2f2'> 
<td height='28' width='' align='center'> <font size='5' face='arial' color='black'>    </font> </td> 
<td height='28' width='' align='center'> <font size='5' face='arial' color='black'>    </font> </td> 
<td height='28' width='' align='center'> <font size='5' face='arial' color='black'>   </font> </td> 
<td height='28' width='' align='center'> <font size='5' face='arial' color='black'>   </font> </td> 
<td height=''  width=''align='center' bgcolor=''> <font size='5' face='arial' color='black'> <b> Total </b>  </font> </td>
<td height=''  width=''align='right' bgcolor=''> <font size='5' face='arial' color='black'> <b> $cr_c_up </b>  </font> </td>

</tr>
";



//////////////////////////////////////







if($credit==2)
{
print"
<tr bgcolor='white'> 
<td height='28' width='' align='center'> <font size='5' face='arial' color='black'>    </font> </td> 
<td height='28' width='' align='center'> <font size='5' face='arial' color='black'>   </font> </td> 
<td height='28' width='' align='center'> <font size='5' face='arial' color='black'>  </font> </td> 
<td height='28' width='' align='center'> <font size='5' face='arial' color='black'> <b> Bank Credit </b>  </font> </td> 
<td height=''  width=''align='center'> <font size='5' face='arial' color='black'>     </font> </td> 
<td height=''  width=''align='center'> <font size='5' face='arial' color='black'>    </font> </td> 
</tr>
";
}


if($credit==1)
{
print"
<tr bgcolor='white'> 
<td height='28' width='10' align='center'> <font size='5' face='arial' color='black'>    </font> </td> 
<td height='28' width='80' align='center'> <font size='5' face='arial' color='black'>   </font> </td> 
<td height='28' width='80' align='center'> <font size='5' face='arial' color='black'>  </font> </td> 
<td height='28' width='280' align='center'> <font size='5' face='arial' color='black'> <b> Bank Debit </b>  </font> </td> 
<td height=''  width='80'align='center'> <font size='5' face='arial' color='black'>     </font> </td> 
<td height=''  width='80'align='center'> <font size='5' face='arial' color='black'>    </font> </td> 
</tr>
";
}

	



print"
<tr bgcolor='F2F2F2'> 
<td height='28' width='' align='center'> <font size='5' face='arial' color='black'>  SL.    </font> </td> 
<td height='28' width='' align='center'> <font size='5' face='arial' color='black'>  Money_ID    </font> </td> 
<td height='28' width='' align='center'> <font size='5' face='arial' color='black'>   Date   </font> </td> 
<td height='28' width='' align='center'> <font size='5' face='arial' color='black'>   Details   </font> </td> 
<td height=''  width=''align='center'> <font size='5' face='arial' color='black'>   Amount   </font> </td> 
<td height=''  width=''align='center'> <font size='5' face='arial' color='black'>  Balance   </font> </td> 
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
<td height='28' width='' align='center'> <font size='5' face='arial' color='black'> $r   </font> </td> 
<td height='28' width='' align='center'> <font size='5' face='arial' color='black'> $a_row[8]   </font> </td> 
<td height='28' width='' align='center'> <font size='5' face='arial' color='black'> $a_row[5]-$a_row[6]-$a_row[7] </font> </td> 
<td height='28' width='' align='left'> <font size='5' face='arial' color='black'> $a_row[4]  </font> </td> 
";



$ar3= number_format($a_row[3], 2);


print"
<td height=''  width=''align='right'> <font size='5' face='arial' color='black'> $ar3 </font> </td> 
";
$cr=$cr+$a_row[3];


$cr_up3= number_format($cr, 2);



print"
<td height=''  width=''align='right'> <font size='5' face='arial' color='black'>  $cr_up3 </font> </td> 
</tr>
";

}



$cr_bank=$cr;




$cr_bank_up= number_format($cr_bank, 2);


print"
<tr bgcolor='white'> 
<td height='28' width='' align='center'> <font size='5' face='arial' color='black'>    </font> </td> 
<td height='28' width='' align='center'> <font size='5' face='arial' color='black'>    </font> </td> 
<td height='28' width='' align='center'> <font size='5' face='arial' color='black'>   </font> </td> 
<td height='28' width='' align='center'> <font size='5' face='arial' color='black'>   </font> </td> 
<td height=''  width=''align='center' bgcolor=''> <font size='5' face='arial' color='black'> <b> Total </b>  </font> </td>
<td height=''  width=''align='right' bgcolor=''> <font size='5' face='arial' color='black'> <b> $cr_bank_up </b>  </font> </td>

</tr>
";





print"
</table>
<br>
<br>
";

$ccc=$cr_c+$cr_bank;



$ccc_up= number_format($ccc, 2);

/*

if($credit==2)
{
print"
<table align='center' width='800' cellpadding='5' cellspacing='1' bgcolor='black'>
<tr bgcolor='#F2F2F2'> 
<td width='200' align='center' height='30'> <font face='arial' size='5'> Cash Credit </font>  </td>
<td width='200' align='center'> <font face='arial' size='5'> Bank Credit </font> </td>
<td width='200' align='center'> <font face='arial' size='5'> Total </font> </td>
</tr>

<tr bgcolor='#F2F2F2'> 
<td width='200' align='right' height='30'> <font face='arial' size='5'>  $cr_c_up </font>  </td>
<td width='200' align='right'> <font face='arial' size='5'>  $cr_bank_up  </font> </td>
<td width='200' align='right'> <font face='arial' size='5'>  $ccc_up </font> </td>
</tr>

</table>
";
}


if($credit==1)
{






print"
<table align='center' width='800' cellpadding='5' cellspacing='1' bgcolor='black'>
<tr bgcolor='#F2F2F2'> 
<td width='200' align='center' height='30'> <font face='arial' size='5'> Cash Debit </font>  </td>
<td width='200' align='center'> <font face='arial' size='5'> Bank Debit </font> </td>
<td width='200' align='center'> <font face='arial' size='5'> Total </font> </td>
</tr>

<tr bgcolor='#F2F2F2'> 
<td width='200' align='right' height='30'> <font face='arial' size='5'>  $cr_c_up </font>  </td>
<td width='200' align='right'> <font face='arial' size='5'>  $cr_bank_up  </font> </td>
<td width='200' align='right'> <font face='arial' size='5'>  $ccc_up </font> </td>
</tr>

</table>
";
}

*/


print"
<br>
<br>
<br>
<br>
<br>
<br>

";


include_once('sign_cost.php');





















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