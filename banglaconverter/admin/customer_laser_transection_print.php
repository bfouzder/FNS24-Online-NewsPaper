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


$sql="SELECT * FROM `customer` WHERE user_id='$supplier' ";
$result=mysql_query($sql);
$arrs=mysql_fetch_array($result);
$suppliern=$arrs[1];
$mobile=$arrs[3];
$address=$arrs[5];




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
<title> Customer Transaction </title>
";


include_once('style.php');


print"
</head>


<body onload='window.print()'>
";


//include_once('header.php');


print"
<table align='center' width='' cellpadding='0' cellspacing='' height='' bgcolor=''>
<tr bgcolor='white'> 


";

//include_once('find_transection_left.php');

print"





<td align='center' valign='top' width='1000'> 

";

include_once('address.php');


print"


<table align='center' width='1200' cellpadding='0' cellspacing='0' bgcolor=''>

<tr> 
<td width='1000' height='320' bgcolor='' valign='top'> 

<table align='center' width='400' cellpadding='0' cellspacing='0' bgcolor=''>
<tr> <td align='center' height='40' id='td5'> <font face='arial' size='4'> <b> Customer Ledger Transaction </b>  </font> </td> </tr>
<tr> <td align='center' height='1' bgcolor=''> </td> </tr>
</table>

";














print"
<table align='center' width='1400' cellpadding='0' cellspacing='0' bgcolor=''>
<tr> <td align='center' height='1' bgcolor=''> </td> </tr>
</table>



<table align='center' width='1400' cellpadding='0' cellspacing='1'>

<tr bgcolor=''>
<td align='left' HEIGHT='30'> <font size='4' face='arial'> &nbsp;  Date :  $dat1-$mon1-$yer1 To $dat2-$mon2-$yer2   </font> </td>
</tr>




<tr bgcolor=''>
<td align='left' HEIGHT='30'> <font size='4' face='arial'> &nbsp;  Customer name: $suppliern   </font> </td>
</tr>


<tr bgcolor=''>
<td align='left' HEIGHT='30'> <font size='4' face='arial'> &nbsp;  Address: $address   </font> </td>
</tr>


<tr bgcolor=''>
<td align='left' HEIGHT='30'> <font size='4' face='arial'> &nbsp;  Mobile: $mobile  </font> </td>
</tr>

</table>



<table align='center' width='1200' cellpadding='0' cellspacing='1'>

<tr bgcolor=''>
<td align='left' HEIGHT='30'> <font size='2' face='arial'>  </font> </td>
</tr>

</table>




<table align='center' width='1400' cellpadding='2' cellspacing='1' bgcolor='black'>

";

print"
<tr bgcolor='F2F2F2'>
<td align='center' height='20' width='110'>  <font face='arial' size='3' color=''>  Date </font> </td> 
";

print"
<td align='center' height='' width='80'>  <font face='arial' size='3' color=''>  Memo No </font> </td> 
";


print"
<td align='center' height='' width='380'>  <font face='arial' size='3' color=''>  Comments </font> </td> 





<td align='center' height='' width='50'>  <font face='arial' size='3' color=''>  Total </font> </td> 
<td align='center' height='' width='50'>  <font face='arial' size='3' color=''>  Commission </font> </td>
<td align='center' height='' width='50'>  <font face='arial' size='3' color=''> Total  </font> </td>
<td align='center' height='' width='50'>  <font face='arial' size='3' color=''>  Carring Cost </font> </td>

<td align='center' height='' width='50'>  <font face='arial' size='3' color=''>  Vat </font> </td> 
<td align='center' height='' width='50'>  <font face='arial' size='3' color=''>  Tax </font> </td> 


<td width='80' align='center'>              <font face='arial' size='3'>  Debit </font> </td>
<td width='80' align='center'>              <font face='arial' size='3'>  Tk. </font> </td>
<td width='80' align='center'>              <font face='arial' size='3'>  Credit </font> </td>
<td width='100' align='center'>              <font face='arial' size='3'>  Tk.  </font> </td>
<td width='100' align='center'>              <font face='arial' size='3'>  Balance </font> </td>

";


print"
</tr>
";





//$nn=
//$mm=






if($supplier!="")
{
$result = mysql_query("SELECT * FROM `customer_laser` where  bank_name='$supplier' && adat<'$mdate' ORDER BY `adat` ASC ");
}

if($supplier=="")
{
$result = mysql_query("SELECT * FROM `customer_laser` where   adat<'$mdate' ORDER BY `adat` ASC ");
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




$balancee_u= number_format($balancee, 2);



print"
<tr bgcolor='white'>
<td align='center' height='20' width='80'>  <font face='arial' size='3' color=''> </font> </td>
";

print"
<td align='center' height='' width='80'>  <font face='arial' size='3' color=''> </font> </td> 
";

print"

<td align='left' height='' width='180'>  <font face='arial' size='3' color=''>  Opening  </font> </td> 

<td align='center' height='' width=''>  <font face='arial' size='3' color=''>   </font> </td> 
<td align='center' height='' width=''>  <font face='arial' size='3' color=''>   </font> </td> 




<td width='80' align='center'>              <font face='arial' size='3'> </font> </td>
<td width='80' align='center'>              <font face='arial' size='3'> </font> </td>
<td width='80' align='center'>              <font face='arial' size='3'> </font> </td>
<td width='80' align='center'>              <font face='arial' size='3'> </font> </td>







<td width='80' align='center'>              <font face='arial' size='3'> </font> </td>


<td width='80' align='center'>              <font face='arial' size='3'> </font> </td>
<td width='80' align='center'>              <font face='arial' size='3'> <b>  </b></font> </td>
";

print"
<td width='100' align='right'>              <font face='arial' size='3'>  $balancee_u  </font> </td>
";

print"
<td width='100' align='right'>              <font face='arial' size='3'>  $balancee_u    </font> </td>

";


print"
</tr>
";







$dr=0;
$cr=0;


$cr=0;

$balance=0;



//$result = mysql_query("SELECT * FROM salememo");



if($supplier!="")
{
$result = mysql_query("SELECT * FROM `customer_laser` where  bank_name='$supplier' && adat>='$mdate' && adat<='$ndate' ORDER BY `adat`  ASC,`user_id`  ASC");
}


if($supplier=="")
{
$result = mysql_query("SELECT * FROM `customer_laser` where   adat>='$mdate' && adat<='$ndate' ORDER BY `adat`  ASC,`user_id`  ASC ");
}



while ($a_row = mysql_fetch_row($result)) {

	foreach ($a_row as $field) {
		
	}

print"
<tr bgcolor='white'>
<td align='center' height='30' width=''>  <font face='arial' size='3' color=''>  $a_row[5]-$a_row[6]-$a_row[7] 

$a_row_old[8]

 </b> </font> </td> 

";

print"
<td align='center' height='30' width='80'>  <font face='arial' size='3' color=''> $a_row[8]  </font> </td>
";


$c5=str_replace("$suppliern","","$a_row[4]");
$c5=str_replace("- On puchase","Sales","$c5");
$c5=str_replace("-","","$c5");






print"
<td align='left' height='30' width=''>  <font face='arial' size='3' color=''>   $c5  </font> </td> 
";

$vat=$vat+$a_row[21];
$tax=$tax+$a_row[22];






if($a_row[15]==1)
{


if($a_row[12]!="" || $a_row[13]!="" || $a_row[14]!="")
{
	

$final_com=$a_row[14];

$final_com_sum=$final_com_sum+$final_com;


$final_com_u= number_format($final_com, 2);


print"
<td align='center' height='' width='50'>  <font face='arial' size='2' color=''>  </font> </td> 

<td align='right' height='' width='50'>  <font face='arial' size='3' color=''>  $final_com_u   </font> </td>

<td align='center' height='' width='50'>  <font face='arial' size='2' color=''>    </font> </td>

<td align='center' height='' width='50'>  <font face='arial' size='2' color=''>  </font> </td>
";



}
else
{
print"
<td align='center' height='' width=''>  <font face='arial' size='2' color=''>  </font> </td> 

<td align='center' height='' width=''>  <font face='arial' size='2' color=''>  </font> </td>

<td align='center' height='' width=''>  <font face='arial' size='2' color=''>  </font> </td>

<td align='center' height='' width=''>  <font face='arial' size='2' color=''> </font> </td>
";	
	
}





}

else
{

if($a_row[12]!="" || $a_row[13]!="")
{
	

$t55=$a_row[3]-$a_row[12];	
$t5=$t55+$a_row[13];


$ft5=$ft5+$t5;
$fcom=$fcom+$a_row[13];
$ft55=$ft55+$t55;
$fship=$fship+$a_row[12];



$t5_final=$t5+$a_row[14];
$final_com=$a_row[13]+$a_row[14];
$t55_final=$t5_final-$final_com;




$t5_final_sum=$t5_final_sum+$t5_final;
$final_com_sum=$final_com_sum+$final_com;
$t55_final_sum=$t55_final_sum+$t55_final;




$t5_final_u= number_format($t5_final, 2);
$final_com_u= number_format($final_com, 2);

$t55_final_u= number_format($t55_final, 2);

$ar12= number_format($a_row[12], 2);



print"
<td align='center' height='' width='50'>  <font face='arial' size='3' color=''>   $t5_final_u  </font> </td> 

<td align='center' height='' width='50'>  <font face='arial' size='3' color=''>  $final_com_u  </font> </td>

<td align='center' height='' width='50'>  <font face='arial' size='3' color=''>  $t55_final_u   </font> </td>

<td align='center' height='' width='50'>  <font face='arial' size='3' color=''>  $ar12 </font> </td>
";
}
else
{
print"
<td align='center' height='' width=''>  <font face='arial' size='2' color=''>  </font> </td> 

<td align='center' height='' width=''>  <font face='arial' size='2' color=''>  </font> </td>

<td align='center' height='' width=''>  <font face='arial' size='2' color=''>  </font> </td>

<td align='center' height='' width=''>  <font face='arial' size='2' color=''> </font> </td>
";	
	
}




}






if($a_row[2]==1)
{

$ar33= number_format($a_row[3] , 2);



print"
<td align='center' height='' width=''>  <font face='arial' size='3' color=''>  </font> </td> 
<td align='center' height='' width=''>  <font face='arial' size='3' color=''>   </font> </td> 
";



print"
<td width='' align='right'>              <font face='arial' size='3'> $ar33  </font> </td>
";


print"
<td width='' align='center'>              <font face='arial' size='3'> </font> </td>
";




print"
<td width='' align='center'>              <font face='arial' size='3'> </font> </td>
";

$dr=$dr+$a_row[3];

}


if($a_row[2]==2)
{

$ar33= number_format($a_row[3] , 2);








print"
<td align='center' height='' width=''>  <font face='arial' size='3' color=''> $a_row[21]  </font> </td> 
<td align='center' height='' width=''>  <font face='arial' size='3' color=''> $a_row[22]  </font> </td> 
";



print"
<td width='80' align='center'>              <font face='arial' size='3'> </font> </td>
";

print"
<td width='' align='center'>              <font face='arial' size='3'> </font> </td>
";










print"
<td width='' align='right'>              <font face='arial' size='3'>   $ar33  </font> </td>
";





$cr=$cr+$a_row[3];

}












$balance=$dr-$cr;



$balance_new=$balancee+$balance;


//$balance=$balance+$balance_new;

//$balancee=0;

$balance_u= number_format($balance, 2);
$b4alance_u= number_format($b4alance, 2);


$balance_new_u= number_format($balance_new, 2);





print"
<td width='' align='center'>              <font face='arial' size='3'>  $b4alance_u_old </font> </td>
<td width='100' align='right'>              <font face='arial' size='3'>  $balance_u_old $balance_new_u  </font> </td>

";

	


print"

";

print"
</tr>
";

}



$bal=$balance+$balancee;





//$bal=$balance;




$bal_u= number_format($bal, 2);


$t5_final_sum_u= number_format($t5_final_sum, 2);

$final_com_sum_u= number_format($final_com_sum, 2);


$t55_final_sum_u= number_format($t55_final_sum, 2);

$fship_u= number_format($fship, 2);


$dr_u= number_format($dr, 2);
$cr_u= number_format($cr, 2);

$balance_u= number_format($balance, 2);




print"
<tr bgcolor='F2F2F2'>
<td align='center' height='20' width='80'>  <font face='arial' size='3' color=''> </font> </td>
";

print" 
<td align='center' height='' width='80'>  <font face='arial' size='3' color=''> </font> </td> 
";

print"
<td align='center' height='' width='180'>  <font face='arial' size='3' color=''>  </font> </td> 




<td align='right' height='' width=''>  <font face='arial' size='3' color=''>  $t5_final_sum_u </font> </td> 













<td align='right' height='' width=''>  <font face='arial' size='3' color=''>  $final_com_sum_u  </font> </td>
<td align='right' height='' width=''>  <font face='arial' size='3' color=''>  $t55_final_sum_u  </font> </td>
<td align='right' height='' width=''>  <font face='arial' size='3' color=''>  $fship_u  </font> </td>


<td align='right' height='' width=''>  <font face='arial' size='3' color=''> $vat  </font> </td>
<td align='right' height='' width=''>  <font face='arial' size='3' color=''> $tax </font> </td> 






<td width='80' align='center'>              <font face='arial' size='3'>  Total Debit  </font> </td>
<td width='80' align='right'>              <font face='arial' size='3'>  $dr_u  </font> </td>
<td width='80' align='center'>              <font face='arial' size='3'>  Total_Credit  </font> </td>
<td width='100' align='right'>              <font face='arial' size='3'>  $cr_u  </font> </td>
<td width='100' align='center'>              <font face='arial' size='3'>  $balance_u_old   </font> </td>

";


print"
</tr>
";

/*

print"
<tr bgcolor='F2F2F2'>
<td align='center' height='20' width='80'>  <font face='arial' size='3' color=''> </font> </td> 
";



print"

<td align='center' height='' width='180'>  <font face='arial' size='3' color=''>  </font> </td> 



<td align='center' height='' width=''>  <font face='arial' size='3' color=''>  </font> </td>
<td align='center' height='' width=''>  <font face='arial' size='3' color=''>  </font> </td> 


<td align='center' height='' width=''>  <font face='arial' size='3' color=''>  </font> </td> 
<td align='center' height='' width=''>  <font face='arial' size='3' color=''>  </font> </td>
<td align='center' height='' width=''>  <font face='arial' size='3' color=''>  </font> </td>
<td align='center' height='' width=''>  <font face='arial' size='3' color=''>  </font> </td>







<td width='80' align='center'>              <font face='arial' size='3'>  Clo. Balance  </font> </td>
<td width='80' align='right'>              <font face='arial' size='3'>  $bal_u  </font> </td>
<td width='80' align='center'>              <font face='arial' size='3'>  </font> </td>
<td width='100' align='center'>              <font face='arial' size='3'>  </font> </td>
<td width='100' align='center'>              <font face='arial' size='3'>   </font> </td>

";



print"
</tr>
";


$tot_d=$bal+$dr;
$tot_dd=$balancee+$cr;


$tot_d_u= number_format($tot_d, 2);

$tot_dd_u= number_format($tot_dd, 2);



print"
<tr bgcolor='F2F2F2'>
<td align='center' height='20' width='80'>  <font face='arial' size='3' color=''> </font> </td> 
";



print"

<td align='center' height='' width='180'>  <font face='arial' size='3' color=''>  </font> </td>
<td align='center' height='' width=''>  <font face='arial' size='3' color=''>  </font> </td> 

<td align='center' height='' width=''>  <font face='arial' size='3' color=''>  </font> </td>
<td align='center' height='' width=''>  <font face='arial' size='3' color=''>  </font> </td> 





<td align='center' height='' width=''>  <font face='arial' size='3' color=''>  </font> </td>
<td align='center' height='' width=''>  <font face='arial' size='3' color=''>  </font> </td>
<td align='center' height='' width=''>  <font face='arial' size='3' color=''>  </font> </td>




 
<td width='80' align='center'>              <font face='arial' size='3'>  Total </font> </td>
<td width='80' align='right'>              <font face='arial' size='3'>  $tot_d_u  </font> </td>
<td width='80' align='center'>              <font face='arial' size='3'>  Total  </font> </td>
<td width='100' align='right'>              <font face='arial' size='3'>  $tot_dd_u    </font> </td>

<td width='100' align='center'>              <font face='arial' size='3'>   </font> </td>
";

	

print"
</tr>
";
*/




print"
</table>
<br><br>
<br><br>
";


include_once('sign_p.php');


























print"



</td>


</tr>
</table>




</body>

</html>


";


?>