<?php

include_once('dbconnection.php');


$ser=trim($_POST['ser']);
$s=trim($_POST['s']);
$comments=trim($_POST['comments']);
$active=trim($_POST['active']);
$type=trim($_POST['type']);


$dat=trim($_POST['dat']);
$mon=trim($_POST['mon']);
$yer=trim($_POST['yer']);


$dat1=trim($_POST['dat1']);
$mon1=trim($_POST['mon1']);
$yer1=trim($_POST['yer1']);




$idat=trim($_POST['idat']);
$imon=trim($_POST['imon']);
$iyer=trim($_POST['iyer']);



$day=trim($_POST['day']);



if($day=="")
{
$day=$_GET['day'];
}





if($day=="")
{
$day=2;
}

if($day==1)
{
$day_check="checked";
}

if($day==2)
{
$day_check1="checked";
}






if($type=="")
{
$typen="Ready cheque";	
}


if($type==1)
{
$typen="Active Cheque";	
}

if($type==2)
{
$typen="Bounch Cheque";	
}







	
if($ser=="")
{

$bbb=time(); 
$d=date("m/d/y",$bbb); 
$mon="$d[0]$d[1]";
$dat="$d[3]$d[4]";
$yer="20$d[6]$d[7]";


$mon1="$d[0]$d[1]";
$dat1="$d[3]$d[4]";
$yer1="20$d[6]$d[7]";



}




$adat="$yer$mon$dat";
$adat1="$yer1$mon1$dat1";











if($ser==12)
{


//print"$comments - $type - $typen ";


$idat=trim($_POST['idat']);
$imon=trim($_POST['imon']);
$iyer=trim($_POST['iyer']);



$iadat="$iyer$imon$idat";


$check1=0;

$sql="SELECT * FROM `check_entry` WHERE user_id='$s' ";
$result=mysql_query($sql);
$arrma=mysql_fetch_array($result);
$check1=$arrma[16];



//print"$check1";



$sql= "UPDATE  `check_payment` SET `comments`='$comments' WHERE `user_id`='$s'";
mysql_query($sql);


$sql= "UPDATE  `check_payment` SET `idat`='$idat' WHERE `user_id`='$s'";
mysql_query($sql);


$sql= "UPDATE  `check_payment` SET `imon`='$imon' WHERE `user_id`='$s'";
mysql_query($sql);


$sql= "UPDATE  `check_payment` SET `iyer`='$iyer' WHERE `user_id`='$s'";
mysql_query($sql);


$sql= "UPDATE  `check_payment` SET `iadat`='$iadat' WHERE `user_id`='$s'";
mysql_query($sql);



$sql= "UPDATE  `check_payment` SET `active`='$active' WHERE `user_id`='$s'";
mysql_query($sql);




if($check1==0 && $active==1)
{
$sql="SELECT * FROM `check_payment` WHERE user_id='$s' ";
$result=mysql_query($sql);
$arrmaa=mysql_fetch_array($result);
$customer_id=$arrmaa[2];
$customer_name=$arrmaa[1];

$bank_name=$arrmaa[5];
$check_no=$arrmaa[6];
$amount=$arrmaa[7];

$money_id=$arrmaa[19];

$money_id2=$arrmaa[22];



$bbb=time(); 
$d=date("m/d/y",$bbb); 
$mon3="$d[0]$d[1]";
$dat3="$d[3]$d[4]";
$yer3="20$d[6]$d[7]";
$adat3="$yer3$mon3$dat3";
$com="Payment By Cheque $bank_name ";

$credit=2;



/*
$sql = "INSERT INTO `customer_laser` (`user_id`, `bank_name`,`credit`, `amount`,`comments`,`dat`, `mon`, `yer`, `money_id`, `adat`, `user`,`discount_less`,`sal`,`money_id2`,`u_id2`) VALUES ('','$customer_id','$credit','$amount','$com','$dat3','$mon3','$yer3','$money_id','$adat3','$u_namee','$amount6','$sal4','$money_id2','$u_idd')";
mysql_query($sql);


$credit=1;

$com="$customer_name - Payment By Cheque $bank_name ";

$credit=1;
*/



/*
$sql = "INSERT INTO `cash_book` (`user_id`, `money_id`, `dat`, `mon`, `yer`, `adat`, `time`, `comments`, `debit`, `credit`, `balance`, `user`, `money_id2`, `u_id2`) VALUES ('','$money_id','$dat3','$mon3','$yer3','$adat3','$time','$com','$debit','$credit','$amount','$u_namee','$money_id2','$u_idd')";
mysql_query($sql);
*/

/*
$sql = "INSERT INTO `bank_refill` (`user_id`, `bank_name`,`credit`, `amount`,`comments`,`dat`, `mon`, `yer`, `money_id`, `adat`, `user`, `money_id2`, `u_id2`) VALUES ('','$bank_id','$credit','$amount','$com','$dat3','$mon3','$yer3','$money_id','$adat3','$u_namee','$money_id2','$u_idd')";
mysql_query($sql);
*/



	
}



include_once('s.php');
}


$d=(int)$_GET['dell'];



if($d!="")
{


$type=$_GET['type'];

$dat=$_GET['dat'];
$mon=$_GET['mon'];
$yer=$_GET['yer'];

$dat1=$_GET['dat1'];
$mon1=$_GET['mon1'];
$yer1=$_GET['yer1'];



$adat="$yer$mon$dat";
$adat1="$yer1$mon1$dat1";



if($type=="")
{
$typen="Ready Cheque";	
}


if($type==1)
{
$typen="Active Cheque";	
}

if($type==2)
{
$typen="Bounch Cheque";	
}





$sql="SELECT * FROM `check_payment` WHERE user_id='$d' ";
$result=mysql_query($sql);
$arrm=mysql_fetch_array($result);
$money_id=$arrm[19];
$money_id2=$arrm[22];




$result = mysql_query("DELETE FROM check_payment WHERE user_id=$d");

}





print"

<html>

<head>
<title> Payment Cheque View </title>
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
<td align='center' valign='top' width='220' bgcolor='#C5B991'>  

<table align='center' width='200' cellpadding='0' cellspacing='0' height=''>

<tr> <td height='10'> </td></tr>


<tr> <td height='7'> </td></tr>
";


//include_once('check_report_left.php');


print"
















<td align='center' valign='top' width='1200' bgcolor='white'>  


<form action='check_payment_view.php' method='POST'>
<table align='center' width='1200' cellpadding='0' cellspacing='0'>
<tr> <td height='20'>  </td>  </tr>

<tr> <td align='center' height='28' bgcolor='' id='tda'>  <font face='arial' color='black' size='4'> <b> 


Find Cheque Report : 



<select name='type'>
<option value='$type'>$typen </option>
<option value=''> Reday Cheque</option>
<option value='1'>Active Cheque</option>
<option value='2'>Bounch Cheque</option>
</select>
&nbsp;&nbsp;

Issu Date: 
<input type='radio' name='day'  $day_check value='1'>
&nbsp;

Active Date: 
<input type='radio' name='day' $day_check1 value='2'>

&nbsp;


&nbsp;&nbsp;

<select name='dat'>
<option name='$dat'>$dat</option>
<option name='01'>01</option>
<option name='02'>02</option>
<option name='03'>03</option>
<option name='04'>04</option>
<option name='05'>05</option>
<option name='06'>06</option>
<option name='07'>07</option>
<option name='08'>08</option>
<option name='09'>09</option>
<option name='10'>10</option>
<option name='11'>11</option>
<option name='12'>12</option>
<option name='13'>13</option>
<option name='14'>14</option>
<option name='15'>15</option>
<option name='16'>16</option>
<option name='17'>17</option>
<option name='18'>18</option>
<option name='19'>19</option>
<option name='20'>20</option>
<option name='21'>21</option>
<option name='22'>22</option>
<option name='23'>23</option>
<option name='24'>24</option>
<option name='25'>25</option>
<option name='26'>26</option>
<option name='27'>27</option>
<option name='28'>28</option>
<option name='29'>29</option>
<option name='30'>30</option>
<option name='31'>31</option>
</select>

<select name='mon'>
<option name='$mon'>$mon</option>
<option name='01'>01</option>
<option name='02'>02</option>
<option name='03'>03</option>
<option name='04'>04</option>
<option name='05'>05</option>
<option name='06'>06</option>
<option name='07'>07</option>
<option name='08'>08</option>
<option name='09'>09</option>
<option name='10'>10</option>
<option name='11'>11</option>
<option name='12'>12</option>
</select>

<select name='yer'>
<option name='$yer'>$yer</option>
";

include_once('year.php');

print"
</select>


To



<select name='dat1'>
<option name='$dat1'>$dat1</option>
<option name='01'>01</option>
<option name='02'>02</option>
<option name='03'>03</option>
<option name='04'>04</option>
<option name='05'>05</option>
<option name='06'>06</option>
<option name='07'>07</option>
<option name='08'>08</option>
<option name='09'>09</option>
<option name='10'>10</option>
<option name='11'>11</option>
<option name='12'>12</option>
<option name='13'>13</option>
<option name='14'>14</option>
<option name='15'>15</option>
<option name='16'>16</option>
<option name='17'>17</option>
<option name='18'>18</option>
<option name='19'>19</option>
<option name='20'>20</option>
<option name='21'>21</option>
<option name='22'>22</option>
<option name='23'>23</option>
<option name='24'>24</option>
<option name='25'>25</option>
<option name='26'>26</option>
<option name='27'>27</option>
<option name='28'>28</option>
<option name='29'>29</option>
<option name='30'>30</option>
<option name='31'>31</option>
</select>

<select name='mon1'>
<option name='$mon1'>$mon1</option>
<option name='01'>01</option>
<option name='02'>02</option>
<option name='03'>03</option>
<option name='04'>04</option>
<option name='05'>05</option>
<option name='06'>06</option>
<option name='07'>07</option>
<option name='08'>08</option>
<option name='09'>09</option>
<option name='10'>10</option>
<option name='11'>11</option>
<option name='12'>12</option>
</select>

<select name='yer1'>
<option name='$yer1'>$yer1</option>
";

include_once('year1.php');

print"
</select>

&nbsp;&nbsp;


<input type='hidden' name='ser' value='..'>

<input type='submit' value='Search'>

</b> </font> </td> </tr>
</table>



</form>







<table align='center' width='1200' cellpadding='0' cellspacing='0'>
<tr> <td height='10'>  </td> </tr>
</table>



<table align='center' width='1200' cellpadding='0' cellspacing='0'>
<tr> <td align='center' height='28' bgcolor='#7087A3' id='tda'>  <font face='arial' color='white' size='4'> <b> Cheque Payment View  </b> </font> </td> </tr>
</table>





<table align='center' width='1200' cellpadding='1' cellspacing='1' bgcolor='black' class='list1'>

<tr bgcolor='white' height='40'> 

<td  bgcolor='' align='center' height='0' width=''> <font face='arial' size='4'> SL. </font> </td>

<td  bgcolor='' align='center' height='0' width=''> <font face='arial' size='4'> Date </font> </td>
	 

     <td  bgcolor='' align='center' height='0' width=''> <font face='arial' size='4'>  Name </font> </td>
	 
	 
	 
     <td align='center' width=''> <font face='arial' size='4'> Mobile </font> </td> 
	 <td align='center' width=''> <font face='arial' size='4'> Address </font> </td>
	 <td align='center' width=''> <font face='arial' size='4'> Bank name </font> </td>
	 <td align='center' width=''> <font face='arial' size='4'> Amount </font> </td>
	 <td align='center' width=''> <font face='arial' size='4'> Active Date </font> </td>
	 <td align='center' width=''> <font face='arial' size='4'> Comments </font> </td>
	 <td align='center' width=''> <font face='arial' size='4'> Type </font> </td>
	 <td align='center' width=''> <font face='arial' size='4'> Edit </font> </td>
	 
	 
	 
	 
	 
	 
	 ";
	 
	 if($user_name1=="superadmin")
{
	 print"
	 <td align='center' width=''> <font face='arial' size='4'> Delete </font> </td>
	 ";
}
	 
print"
</tr>
";


$d=11;


if($day==2)
{
$result = mysql_query("SELECT * FROM `check_payment` where iadat>=$adat && iadat<=$adat1 && active='$type'  ORDER BY `user_id` ASC  LIMIT 0 , 60000 ");
}



if($day==1)
{
$result = mysql_query("SELECT * FROM `check_payment` where adat>=$adat && adat<=$adat1   ORDER BY `user_id` ASC  LIMIT 0 , 60000 ");
}





while ($a_row = mysql_fetch_row($result)) {

	foreach ($a_row as $field) {
		
	}

$zx++;

print"
<tr bgcolor='white' height='40'> 

<form action='check_payment_view.php' method='POST'>

<td align='center' width=''> <font face='arial' size='2'> $zx </font> </td> 
	 

     <td align='center' width=''> <font face='arial' size='2'> $a_row[8] - $a_row[9] - $a_row[10] </font> </td> 
	 

     <td  bgcolor='' align='center' height='0' width=''> <font face='arial' size='2'> $a_row[1] </font> </td>
     <td align='center' width=''> <font face='arial' size='2'> $a_row[3] </font> </td> 
	 
	 <td align='center' width=''> <font face='arial' size='2'> $a_row[4]  </font> </td>
	 <td align='center' width=''> <font face='arial' size='2'> $a_row[5] </font> </td>
	 <td align='center' width=''> <font face='arial' size='2'> $a_row[7] </font> </td>
	 <td align='center' width=''> <font face='arial' size='2'>


<select name='idat'>
<option name='$a_row[12]'>$a_row[12]</option>
<option name='01'>01</option>
<option name='02'>02</option>
<option name='03'>03</option>
<option name='04'>04</option>
<option name='05'>05</option>
<option name='06'>06</option>
<option name='07'>07</option>
<option name='08'>08</option>
<option name='09'>09</option>
<option name='10'>10</option>
<option name='11'>11</option>
<option name='12'>12</option>
<option name='13'>13</option>
<option name='14'>14</option>
<option name='15'>15</option>
<option name='16'>16</option>
<option name='17'>17</option>
<option name='18'>18</option>
<option name='19'>19</option>
<option name='20'>20</option>
<option name='21'>21</option>
<option name='22'>22</option>
<option name='23'>23</option>
<option name='24'>24</option>
<option name='25'>25</option>
<option name='26'>26</option>
<option name='27'>27</option>
<option name='28'>28</option>
<option name='29'>29</option>
<option name='30'>30</option>
<option name='31'>31</option>
</select>

<select name='imon'>
<option name='$a_row[13]'>$a_row[13]</option>
<option name='01'>01</option>
<option name='02'>02</option>
<option name='03'>03</option>
<option name='04'>04</option>
<option name='05'>05</option>
<option name='06'>06</option>
<option name='07'>07</option>
<option name='08'>08</option>
<option name='09'>09</option>
<option name='10'>10</option>
<option name='11'>11</option>
<option name='12'>12</option>
</select>

<select name='iyer'>
<option name='$a_row[14]'>$a_row[14]</option>
<option name='2015'>2015</option>
<option name='2016'>2016</option>
<option name='2017'>2017</option>
<option name='2018'>2018</option>
<option name='2019'>2019</option>
<option name='2020'>2020</option>

</select>
	 
	 
  </font> </td>
	 <td align='center' width=''> <font face='arial' size='2'> <input type='text' size='20' name='comments' value='$a_row[17]'> </font> </td>
	 <td align='center' width=''> <font face='arial' size='2'> <input type='text' size='3' name='active' value='$a_row[16]'> </font> </td>
	 
	 <td align='center' width=''> <font face='arial' size='2'> 
	 
	 
	 
	 
	 <input type='hidden' name='s' value='$a_row[0]'>
	 
	 <input type='hidden' name='dat' value='$dat'>
	 <input type='hidden' name='mon' value='$mon'>
	 <input type='hidden' name='yer' value='$yer'>
	 
	 <input type='hidden' name='dat1' value='$dat1'>
	 <input type='hidden' name='mon1' value='$mon1'>
	 <input type='hidden' name='yer1' value='$yer1'>
	 <input type='hidden' name='type' value='$type'>
         <input type='hidden' name='day' value='$day'>
	 
	 
	 
	 
	 <input type='hidden' name='ser' value='12'>
	 <input type='submit' value='Edit'>
	 
	 
	 </font> </td>
	 

	 </form>


";



	 if($user_name1=="superadmin")
{
print"
	 <td align='center' width='70'> <a onClick=\"javascript: return confirm('Are you confirm to delete');\" href=\"check_payment_view.php?dell=$a_row[0]&dat=$dat&mon=$mon&yer=$yer&dat1=$dat1&mon1=$mon1&yer1=$yer1&type=$type&day=$day\"> <div id='del'><font face='arial' size='2'> Delete  </font> </div>  </a> </td>
	 ";
	 
}
	 
print"
</tr>
";


}









print"

</table>

<br>
<br>


<table align='center' width='1200' cellpadding='0' cellspacing='0'>
<tr> <td align='center' height='28' bgcolor='' id=''> 


<form action='check_payment_view_print.php' method='POST' target='_blank'>

	 <input type='hidden' name='dat' value='$dat'>
	 <input type='hidden' name='mon' value='$mon'>
	 <input type='hidden' name='yer' value='$yer'>
	 
	 <input type='hidden' name='dat1' value='$dat1'>
	 <input type='hidden' name='mon1' value='$mon1'>
	 <input type='hidden' name='yer1' value='$yer1'>
	 <input type='hidden' name='type' value='$type'>
         <input type='hidden' name='day' value='$day'>


<input type='submit' value='Print' id='enter2'>


</form>

 </td> </tr>
</table>




<table align='center' width='1200' cellpadding='0' cellspacing='0'>
<tr> <td align='center' height='28' bgcolor='#7087A3' id='tdt'>  <font face='arial' color='white' size='2'> <b>   </b> </font> </td> </tr>
</table>









</td>


</tr>
</table>




</body>

</html>


";


?>