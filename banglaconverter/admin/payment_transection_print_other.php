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


$sql="SELECT * FROM `payment_laser` WHERE user_id='$supplier' ";
$result=mysql_query($sql);
$arrs=mysql_fetch_array($result);
$suppliern=$arrs[1];

$address=$arrs[4];




$mdate="$yer1$mon1$dat1";

$ndate="$yer2$mon2$dat2";


//print"$mdate -";


if($supplier=="")
{
$suppliern="All";
}




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
<title> Payment Transaction </title>
";


include_once('style.php');


print"
</head>


<body>
";


//include_once('header.php');


print"
<table align='center' width='1200' cellpadding='0' cellspacing='' height='' bgcolor=''>
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

<table align='center' width='400' cellpadding='0' cellspacing='0' bgcolor=''>
<tr> <td align='center' height='40' id='td5'> <font face='arial' size='4'> Payment Ledger Transaction  </font> </td> </tr>
<tr> <td align='center' height='1' bgcolor=''> </td> </tr>
</table>

";





$sup_office=1;



print"

<table align='center' width='1200' cellpadding='0' cellspacing='1'>

<tr bgcolor=''>
<td align='left' HEIGHT='30'> <font size='4' face='arial'> &nbsp; <b>  Date :  $dat1-$mon1-$yer1 To $dat2-$mon2-$yer2 </b>   </font> </td>
</tr>


<tr bgcolor=''>
<td align='left' HEIGHT='30'> <font size='4' face='arial'> &nbsp; Payment Ledger name: $suppliern Address: $address $mobile </font> </td>
</tr>
</table>


<table align='center' width='750' cellpadding='0' cellspacing='1'>

<tr bgcolor=''>
<td align='left' HEIGHT='30'> <font size='4' face='arial'>  </font> </td>
</tr>

</table>




<table align='center' width='1200' cellpadding='3' cellspacing='1' bgcolor='black'>

";

print"
<tr bgcolor='#F2F2F2'>
<td align='center' height='20' width='80'>  <font face='arial' size='4' color=''> Date</font> </td> 
<td align='center' height='' width='80'>  <font face='arial' size='4' color=''> Money id</font> </td> 
<td align='center' height='' width='180'>  <font face='arial' size='4' color=''> Comments </font> </td> 
<td width='80' align='center'>              <font face='arial' size='4'> Debit</font> </td>

<td width='80' align='center'>              <font face='arial' size='4'> Tk.</font> </td>


<td width='80' align='center'>              <font face='arial' size='4'> Credit</font> </td>
<td width='100' align='center'>              <font face='arial' size='4'> Tk. </font> </td>
<td width='100' align='center'>              <font face='arial' size='4'> Balance </font> </td>

</tr>
";





//$nn=
//$mm=






if($supplier!="")
{
$result = mysql_query("SELECT * FROM `payment_transection` where  bank_name='$supplier' && adat<'$mdate' ORDER BY `adat` ASC,`user_id` ASC ");
}

if($supplier=="")
{
$result = mysql_query("SELECT * FROM `payment_transection` where   bank_name!='$sup_office'  &&   adat<'$mdate' ORDER BY `adat` ASC,`user_id` ASC ");
}

while ($a_row = mysql_fetch_row($result)) {

	foreach ($a_row as $field) {
		
	}





if($a_row[2]==2)
{

$dr=$dr+$a_row[3];
}


if($a_row[2]==1)
{
$cr=$cr+$a_row[3];
}



}







$balancee=$dr-$cr;




//print"$balancee -";


//print"$balance <br>";


print"
<tr bgcolor='white'>
<td align='center' height='20' width='80'>  <font face='arial' size='4' color=''> </font> </td> 
<td align='center' height='' width='80'>  <font face='arial' size='4' color=''> </font> </td> 
<td align='center' height='' width='180'>  <font face='arial' size='4' color=''>  </font> </td> 

<td width='80' align='center'>              <font face='arial' size='4'> </font> </td>


<td width='80' align='center'>              <font face='arial' size='4'> </font> </td>
<td width='80' align='center'>              <font face='arial' size='4'> Opening</font> </td>
<td width='100' align='center'>              <font face='arial' size='4'> $balancee </font> </td>
<td width='100' align='right'>              <font face='arial' size='4'> $balancee   </font> </td>

</tr>
";





$dr=0;
$cr=0;


$cr=0;

$balance=0;

//$result = mysql_query("SELECT * FROM salememo");



if($supplier!="")
{
$result = mysql_query("SELECT * FROM `payment_transection` where  bank_name='$supplier' && adat>='$mdate' && adat<='$ndate' ORDER BY `adat` ASC,`user_id` ASC ");
}


if($supplier=="")
{
$result = mysql_query("SELECT * FROM `payment_transection` where  bank_name!='$sup_office'  &&  adat>='$mdate' && adat<='$ndate' ORDER BY `adat` ASC,`user_id` ASC ");
}



while ($a_row = mysql_fetch_row($result)) {

	foreach ($a_row as $field) {
		
	}

print"
<tr bgcolor='white'>
<td align='center' height='30' width=''>  <font face='arial' size='4' color=''> $a_row[5]-$a_row[6]-$a_row[7]</font> </td> 


<td align='center' height='30' width='80'>  <font face='arial' size='4' color=''> $a_row[8] </font> </td>


<td align='left' height='30' width=''>  <font face='arial' size='4' color=''> $a_row[4] </font> </td> 



";



if($a_row[2]==2)
{

print"
<td width='' align='right'>              <font face='arial' size='4'> $a_row[3]  </font> </td>
";


print"
<td width='' align='center'>              <font face='arial' size='4'> </font> </td>
";

print"
<td width='' align='center'>              <font face='arial' size='4'> </font> </td>
";

$dr=$dr+$a_row[3];

}


if($a_row[2]==1)
{

print"
<td width='80' align='center'>              <font face='arial' size='4'> </font> </td>
";

print"
<td width='' align='center'>              <font face='arial' size='4'> </font> </td>
";

print"
<td width='' align='right'>              <font face='arial' size='4'>  $a_row[3] </font> </td>
";

$cr=$cr+$a_row[3];

}










$balance=$dr-$cr;

$balance_new=$balancee+$balance;



print"
<td width='' align='center'>              <font face='arial' size='4'> $b4alance </font> </td>
<td width='100' align='right'>              <font face='arial' size='4'> $balance_old  $balance_new  </font> </td>

";

print"
</tr>
";

}



$bal=$balance+$balancee;



print"
<tr bgcolor='F2F2F2'>
<td align='center' height='20' width='80'>  <font face='arial' size='4' color=''> </font> </td> 
<td align='center' height='' width='80'>  <font face='arial' size='4' color=''> </font> </td> 
<td align='center' height='' width='180'>  <font face='arial' size='4' color=''>  </font> </td> 
<td width='80' align='center'>              <font face='arial' size='4'> Total Debit </font> </td>
<td width='80' align='right'>              <font face='arial' size='4'> $dr </font> </td>
<td width='80' align='center'>              <font face='arial' size='4'> Total_Credit </font> </td>
<td width='100' align='right'>              <font face='arial' size='4'> $cr </font> </td>
<td width='100' align='right'>              <font face='arial' size='4'> $balance_mis   </font> </td>

</tr>
";


/*
print"
<tr bgcolor='F2F2F2'>
<td align='center' height='20' width='80'>  <font face='arial' size='4' color=''> </font> </td> 
<td align='center' height='' width='80'>  <font face='arial' size='4' color=''> </font> </td> 
<td align='center' height='' width='180'>  <font face='arial' size='4' color=''>  </font> </td> 
<td width='80' align='center'>              <font face='arial' size='4'> Clo. Balance </font> </td>
<td width='80' align='right'>              <font face='arial' size='4'> $bal </font> </td>
<td width='80' align='center'>              <font face='arial' size='4'>  </font> </td>
<td width='100' align='center'>              <font face='arial' size='4'>  </font> </td>
<td width='100' align='center'>              <font face='arial' size='4'>   </font> </td>

</tr>
";


$tot_d=$bal+$dr;

$tot_dd=$balancee+$cr;


print"
<tr bgcolor='F2F2F2'>
<td align='center' height='20' width='80'>  <font face='arial' size='4' color=''> </font> </td> 
<td align='center' height='' width='80'>  <font face='arial' size='4' color=''> </font> </td> 
<td align='center' height='' width='180'>  <font face='arial' size='4' color=''>  </font> </td> 
<td width='80' align='center'>              <font face='arial' size='4'> Total </font> </td>
<td width='80' align='center'>              <font face='arial' size='4'> $tot_d </font> </td>
<td width='80' align='center'>              <font face='arial' size='4'>  Total </font> </td>
<td width='100' align='center'>              <font face='arial' size='4'> $tot_dd   </font> </td>

<td width='100' align='center'>              <font face='arial' size='4'>   </font> </td>


</tr>
";

*/




print"
</table>
";


















print"<br><br><br>";



include_once('sign_cost.php');









print"



</td>


</tr>
</table>




</body>

</html>


";


?>