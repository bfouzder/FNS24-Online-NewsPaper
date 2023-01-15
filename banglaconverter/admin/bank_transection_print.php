<?php
include_once('dbconnection.php');


include_once('ppp.php');


$ser=trim($_POST['ser']);

$s=trim($_POST['s']);


$dat1=trim($_POST['dat1']);
$mon1=trim($_POST['mon1']);
$yer1=trim($_POST['yer1']);




$dat2=trim($_POST['dat2']);
$mon2=trim($_POST['mon2']);
$yer2=trim($_POST['yer2']);





$supplier=trim($_POST['supplier']);


$sql="SELECT * FROM `bank` WHERE user_id='$supplier' ";
$result=mysql_query($sql);
$arrs=mysql_fetch_array($result);
$suppliern=$arrs[1];

$address=$arrs[4];

if($supplier=="")
{
$suppliern="All";	
}


$mdate="$yer1$mon1$dat1";

$ndate="$yer2$mon2$dat2";


//print"$mdate -";




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













if($ser==5)
{






$sql="SELECT * FROM `bank_refill` WHERE user_id='$s' ";

$result=mysql_query($sql);
$arrco=mysql_fetch_array($result);
$m_id=$arrco[8];


//print" -- $m_id  --";

//$result = mysql_query("DELETE FROM tcosting_entry WHERE user_id=$s");

//$result = mysql_query("DELETE FROM costing_entry WHERE money_id=$m_id");

$result = mysql_query("DELETE FROM cash_book WHERE money_id=$m_id");

$result = mysql_query("DELETE FROM bank_refill WHERE user_id=$s");




include_once('d.php');






}









print"

<html>

<head>
<title> Bank Transaction print </title>
";


include_once('style.php');


print"
</head>


<body onload='window.print()'>
";


include_once('address.php');


print"
<table align='center' width='' cellpadding='0' cellspacing='0' height='0' bgcolor=''>
<tr bgcolor='white'> 


";

//include_once('find_transection_left.php');

print"





<td align='center' valign='top' width='1050'> 




<table align='center' width='1050' cellpadding='0' cellspacing='0' bgcolor='white'>

<tr> 
<td width='1200' height='320' bgcolor='' valign='top'> 

<table align='center' width='400' cellpadding='0' cellspacing='0' bgcolor=''>
<tr> <td align='center' height='40' id='td5'> <font face='arial' size='5'> <b> Bank Transaction </b>  </font> </td> </tr>
<tr> <td align='center' height='1' bgcolor=''> </td> </tr>
</table>

";














print"

<table align='center' width='1200' cellpadding='0' cellspacing='1'>

<tr bgcolor=''>
<td align='left' HEIGHT='30'> <font size='5' face='arial'>  </font> </td>
</tr>

<tr bgcolor=''>
<td align='left' HEIGHT='30'> <font size='5' face='arial'>  <b>  Date :  $dat1-$mon1-$yer1 To $dat2-$mon2-$yer2 </b>   </font> </td>
</tr>



<tr bgcolor=''>
<td align='left' HEIGHT='30'> <font size='5' face='arial'> Bank Name :  $suppliern </font> </td>
</tr>

<tr bgcolor=''>
<td align='left' HEIGHT='30'> <font size='5' face='arial'>  </font> </td>
</tr>

</table>




<table align='center' width='1200' cellpadding='5' cellspacing='1' bgcolor='black'>

";

print"
<tr bgcolor='F2F2F2'>
<td align='center' height='20' width='170'>  <font face='arial' size='5' color=''> Date</font> </td> 
<td align='center' height='' width='80'>  <font face='arial' size='5' color=''> Money_ID</font> </td> 
<td align='center' height='' width='600'>  <font face='arial' size='5' color=''> Comments </font> </td> 
<td width='80' align='center'>              <font face='arial' size='5'> Debit</font> </td>

<td width='80' align='center'>              <font face='arial' size='5'>  </font> </td>


<td width='80' align='center'>              <font face='arial' size='5'> Credit</font> </td>

<td width='100' align='center'>              <font face='arial' size='5'> Balance </font> </td>

</tr>
";





//$nn=
//$mm=






if($supplier!="")
{
$result = mysql_query("SELECT * FROM `bank_refill` where  bank_name='$supplier' && adat<'$mdate' ORDER BY `user_id` ASC ");
}

if($supplier=="")
{
$result = mysql_query("SELECT * FROM `bank_refill` where   adat<'$mdate' ORDER BY `user_id` ASC ");
}

while ($a_row = mysql_fetch_row($result)) {

	foreach ($a_row as $field) {
		
	}





if($a_row[2]==1)
{

$dr=$dr+$a_row[3];
}


if($a_row[2]==2)
{
$cr=$cr+$a_row[3];
}



}







$balancee=$dr-$cr;




$balancee= number_format($balancee, 2);
$balancee=str_replace(",","","$balancee");


$balancee_up= number_format($balancee, 2);

//print"$balancee -";


//print"$balance <br>";




print"
<tr bgcolor='WHITE'>
<td align='center' height='20' width='80'>  <font face='arial' size='5' color=''> </font> </td> 
<td align='center' height='' width='80'>  <font face='arial' size='5' color=''> </font> </td> 
<td align='center' height='' width='180'>  <font face='arial' size='5' color=''>  </font> </td> 

<td width='80' align='center'>              <font face='arial' size='5'> </font> </td>


<td width='80' align='center'>              <font face='arial' size='5'> </font> </td>
<td width='80' align='center'>              <font face='arial' size='5'> Opening</font> </td>

<td width='100' align='right'>              <font face='arial' size='5'> $balancee_up </font> </td>

</tr>
";





$dr=0;
$cr=0;


$cr=0;

$balance=0;

//$result = mysql_query("SELECT * FROM salememo");



if($supplier!="")
{
$result = mysql_query("SELECT * FROM `bank_refill` where  bank_name='$supplier' && adat>='$mdate' && adat<='$ndate' ORDER BY `adat` ASC ,`user_id` ASC");
}


if($supplier=="")
{
$result = mysql_query("SELECT * FROM `bank_refill` where   adat>='$mdate' && adat<='$ndate' ORDER BY `adat` ASC ,`user_id` ASC ");
}



while ($a_row = mysql_fetch_row($result)) {

	foreach ($a_row as $field) {
		
	}

print"
<tr bgcolor='white'>
<td align='center' height='30' width=''>  <font face='arial' size='5' color=''> $a_row[5]-$a_row[6]-$a_row[7]</font> </td> 


<td align='center' height='30' width='80'>  <font face='arial' size='5' color=''> $a_row[8] </font> </td>


<td align='left' height='30' width=''>  <font face='arial' size='5' color=''> $a_row[4] </font> </td> 



";



$a_row[3]= number_format($a_row[3], 2);
$a_row[3]=str_replace(",","","$a_row[3]");


$a_row_up= number_format($a_row[3], 2);



if($a_row[2]==1)
{

print"
<td width='' align='right'>              <font face='arial' size='5'> $a_row_up </font> </td>
";


print"
<td width='' align='center'>              <font face='arial' size='5'> </font> </td>
";

print"
<td width='' align='center'>              <font face='arial' size='5'> </font> </td>
";

$dr=$dr+$a_row[3];

}


if($a_row[2]==2)
{

print"
<td width='80' align='center'>              <font face='arial' size='5'> </font> </td>
";

print"
<td width='' align='center'>              <font face='arial' size='5'> </font> </td>
";

print"
<td width='' align='right'>              <font face='arial' size='5'>  $a_row_up </font> </td>
";

$cr=$cr+$a_row[3];

}










$balance=$dr-$cr;
$balance_new=$balancee+$balance;



$balance_new= number_format($balance_new, 2);
$balance_new=str_replace(",","","$balance_new");
$balance_new_up= number_format($balance_new, 2);




print"

<td width='100' align='right'>              <font face='arial' size='5'> $balance_old $balance_new_up </font> </td>

";

print"
</tr>
";

}



$bal=$balance+$balancee;



$dr= number_format($dr, 2);
$dr=str_replace(",","","$dr");
$dr_up= number_format($dr, 2);



$cr= number_format($cr, 2);
$cr=str_replace(",","","$cr");
$cr_up= number_format($cr, 2);



print"
<tr bgcolor='white'>
<td align='center' height='20' width='80'>  <font face='arial' size='5' color=''> </font> </td> 
<td align='center' height='' width='80'>  <font face='arial' size='5' color=''> </font> </td> 
<td align='right' height='' width='180'>  <font face='arial' size='5' color=''> Total Debit </font> </td> 
<td width='80' align='right'>              <font face='arial' size='5'> $dr_up </font> </td>
<td width='80' align='center'>              <font face='arial' size='5'> Total Credit </font> </td>
<td width='80' align='right'>              <font face='arial' size='5'> $cr_up  </font> </td>

<td width='100' align='center'>              <font face='arial' size='5'> $balance_old </font> </td>

</tr>
";



$bal= number_format($bal, 2);
$bal=str_replace(",","","$bal");
$bal_up= number_format($bal, 2);

/*
print"
<tr bgcolor='white'>
<td align='center' height='20' width='80'>  <font face='arial' size='5' color=''> </font> </td> 
<td align='center' height='' width='80'>  <font face='arial' size='5' color=''> </font> </td> 
<td align='center' height='' width='180'>  <font face='arial' size='5' color=''>  </font> </td> 
<td width='80' align='center'>              <font face='arial' size='5'> Closing Balance </font> </td>
<td width='80' align='right'>              <font face='arial' size='5'> $bal_up </font> </td>
<td width='80' align='center'>              <font face='arial' size='5'>  </font> </td>
<td width='100' align='center'>              <font face='arial' size='5'>  </font> </td>
<td width='100' align='center'>              <font face='arial' size='5'>  </font> </td>

</tr>
";


$tot_d=$bal+$dr;

$tot_dd=$balancee+$cr;



$tot_d= number_format($tot_d, 2);
$tot_d=str_replace(",","","$tot_d");
$tot_d_up= number_format($tot_d, 2);


$tot_dd= number_format($tot_dd, 2);
$tot_dd=str_replace(",","","$tot_dd");
$tot_dd_up= number_format($tot_dd, 2);


print"
<tr bgcolor='F2F2F2'>
<td align='center' height='20' width='80'>  <font face='arial' size='5' color=''> </font> </td> 
<td align='center' height='' width='80'>  <font face='arial' size='5' color=''> </font> </td> 
<td align='center' height='' width='180'>  <font face='arial' size='5' color=''>  </font> </td> 
<td width='80' align='center'>              <font face='arial' size='5'> Total </font> </td>
<td width='80' align='right'>              <font face='arial' size='5'> $tot_d_up </font> </td>
<td width='80' align='center'>              <font face='arial' size='5'>  Total </font> </td>
<td width='100' align='right'>              <font face='arial' size='5'> $tot_dd_up  </font> </td>
<td width='100' align='center'>              <font face='arial' size='5'>  </font> </td>

</tr>
";


*/



print"
</table>
<br>
<br>
<br>
";



include_once('sign_cost.php');





























print"



</td>


</tr>
</table>




</body>

</html>


";


?>