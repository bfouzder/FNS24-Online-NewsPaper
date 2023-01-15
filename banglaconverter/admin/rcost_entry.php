<?php
include_once('dbconnection.php');


//session_start();

$cost_name=trim($_POST['cost_name']);
$amount=trim($_POST['amount']);
$details=trim($_POST['details']);
$no_cash=trim($_POST['no_cash']);



$details=str_replace("'","`","$details");

$cost_name=trim($_POST['cost_name']);
$ledger=trim($_POST['ledger']);





//print" $cost_name - $amount - $details ";


if($no_cash==1)
{
$cas="Checked";
}


if($payment_mode=="")
{
$payment_moden="Cash";
}



$ser=trim($_POST['ser']);


if($ser=="")
{
$ser=$_GET['ser'];
}




if($ser=="")
{

unset($_SESSION['cart']);
unset($_SESSION['cart_price']);
unset($_SESSION['cart_unit']);
unset($_SESSION['cart_com']);
unset($_SESSION['cart_id']);
unset($_SESSION['cart_local']);
}



$dat=trim($_POST['dat']);
$mon=trim($_POST['mon']);
$yer=trim($_POST['yer']);



if($dat=="")
{
$dat=$_GET['dat'];
$mon=$_GET['mon'];
$yer=$_GET['yer'];
	
}



if($ledger=="")
{
$ledger=$_GET['sup'];
}



$sql="SELECT * FROM `receipt_laser` WHERE user_id='$ledger' ";

$result=mysql_query($sql);
$arrl=mysql_fetch_array($result);
$ledgern=$arrl[1];




if($ser=="")
{
$bbb=time(); 
$d=date("m/d/y",$bbb); 
$mon="$d[0]$d[1]";
$dat="$d[3]$d[4]";
$yer="20$d[6]$d[7]";
}



/*
*/




if($ser==1)
{

if($amount!="")
{
$sql= "UPDATE  `rexpendature_sub` SET `money_count`='$amount' WHERE `user_id`='$cost_name'";
mysql_query($sql);
}


if($details!="")
{
$sql= "UPDATE  `rexpendature_sub` SET `details`='$details' WHERE `user_id`='$cost_name'";
mysql_query($sql);
}


}



if($ser!="")
{

$a=0;

$product_id=trim($_POST['cost_name']);
$qty=trim($_POST['qty']);

$sql="SELECT * FROM `rexpendature_sub` WHERE user_id='$product_id' ";
$result=mysql_query($sql);
$arr=mysql_fetch_array($result);
$ppp=$arr[0];



if($ppp=="" || $ledger=="")
{
$a=1;
//include_once('n.php');
}


if($a==0 && $amount>0)
{



if($qty=="")
{
$qty=1;
}














$sql="SELECT * FROM `rexpendature_sub` WHERE user_id='$cost_name' ";


$result=mysql_query($sql);
$arrc=mysql_fetch_array($result);
$cost_namen=$arrc[2];




//print" $ledgern - $cost_namen <br> ";

//print" $cost_name - $ledger ";




//print" $product_id - $qty ";

$action="en";










switch($action) {	



		case "en":

                        $_SESSION['cart'][$product_id]=$_SESSION['cart'][$product_id]+$qty;
                        $ps=123;
                        $_SESSION['color']="$ps";
						
	   $_SESSION['cart_price'][$product_id]=$_SESSION['cart_price'][$product_id]=$amount;
	   $_SESSION['cart_local'][$product_id]=$_SESSION['cart_local'][$product_id]=$details;
						
                        

                break;


		case "remove":

unset($_SESSION['cart'] [$product_id]);
unset($_SESSION['cart']);
unset($_SESSION['cart_price']);
unset($_SESSION['cart_unit']);
unset($_SESSION['cart_com']);
unset($_SESSION['cart_id']);
unset($_SESSION['cart_local']);
             
                break;

                }










}


}





$action = $_GET[action]; 


if($action=="remove")
{



$product_id = $_GET[i1d];

switch($action) {	



		case "en":

                        $_SESSION['cart'][$product_id]=$_SESSION['cart'][$product_id]+$qty;

                break;


		case "remove":

             unset($_SESSION['cart'] [$product_id]);
             unset($_SESSION['cart'] [$product_id]);
			 unset($_SESSION['cart_price'][$product_id]);
			 unset($_SESSION['cart_unit'][$product_id]);
			 unset($_SESSION['cart_com'][$product_id]);
			 unset($_SESSION['cart_local'][$product_id]);

             
                break;

                }






}




$ps=$_SESSION['color'];


if($ps==123 && $ser!="")
{

foreach($_SESSION['cart'] as $product_id => $quantity)


{


$e++;

 
}

}













print"

<html>

<head>
<title> Others Income Collection Entry </title>
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


<tr> <td height='30' width='200' bgcolor='green'> &nbsp;&nbsp;&nbsp;  <span id='child'> <b> <font color='white'>   Income Collection Entry </font> </b> </span>  </td></tr>

<tr> <td height='7'> </td></tr>





<tr> <td height='30' width='200' bgcolor='C5B577'  onMouseOver=\"this.bgColor='96884F'\" onMouseOut=\"this.bgColor='C5B577'\" align='left' id='button2'> <a href='rcost_entry.php'> <div id='child'> Others Income Collection Entry </div> </a> </td></tr>

<tr> <td height='7'> </td></tr>

";



print"


</table>


</td>
















<td align='center' valign='top' width='980'>  


<br>



<table align='center' width='800' cellpadding='0' cellspacing='0'>

<tr>
<form action='rcost_entry.php' method='POST'>
<td align='center' bgcolor='F2F2F2	' height='10'>

";










print"
<table align='center' width='800' cellpadding='0' cellspacing='0' bgcolor='F2F2F2'>
<tr> <td height='28' align='center' id='tda' bgcolor='#7087A3'> <font size='4' face='arial' color='white'> Income Collection Entry    </font> </td> </tr>
</table>
";

$u1=0;


$u=0;


$result = mysql_query("SELECT * FROM rexpendature_head");

while ($a_row = mysql_fetch_row($result)) {

	foreach ($a_row as $field) {
		
	}
	

$u1++;

$expenduter_head_id[$u1]=$a_row[0];
$expenduter_head_name[$u1]=$a_row[1];



}




$result = mysql_query("SELECT * FROM rexpendature_sub");

while ($a_row = mysql_fetch_row($result)) {

	foreach ($a_row as $field) {
		
	}
$u++;
$expenduter_head[$u]=$a_row[1];
$expenduter_sub[$u]=$a_row[2];
$expenduter_sub_id[$u]=$a_row[0];
}


//array_multisort($expenduter_sub,$expenduter_sub_id,$expenduter_head,SORT_ASC);







print"
<table align='center' width='800' cellpadding='0' cellspacing='0' bgcolor='F2F2F2'>




<tr> <td height='35'> </td> </tr>




<tr> 
<td width='10'> </td>
<td height='28' align='left'> 
<font face='arial' size='2'>  Select Date &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</font>


:

<select name='dat' id='dat1'>
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

<select name='mon' id='mon1'>
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

<select name='yer' id='yer1'>
<option name='$yer'>$yer</option>
";

include_once('year.php');

print"

</select>




</td> 
</tr>

<tr> <td height='10'> </td> </tr>













<tr> 
<td width='10'> </td>
<td height='28' align='left'> 
<font face='arial' size='2'>  Select Ledger  &nbsp;&nbsp;</font>

:
<select name='ledger' id='new_sup1'>


<option value='$ledger'> $ledgern - $ledger </option>

";


//$result = mysql_query("SELECT * FROM payment_laser");


$result = mysql_query("SELECT * FROM `receipt_laser`  ORDER BY `customer_name` ASC ");


while ($a_row = mysql_fetch_row($result)) {

	foreach ($a_row as $field) {
		
	}

print"
<option value='$a_row[0]'> $a_row[1] - $a_row[0] </option>
";


}



print"
</select>




</td> 
</tr>
<tr> <td height='10'> </td> </tr>







<tr> 
<td width='10'> </td>
<td height='28' align='left'> 
<font face='arial' size='2'> &nbsp;&nbsp;  Income Head  : </font>

<select name='cost_name' id='new_sup1'>

<option value='$cost_name'> $cost_namen </option>

";


for($i=1;$i<=$u1;$i++)
                
{

print"
<option value='$expenduter_sub_id[$j]'> $expenduter_head_name[$i]</option>
";
for($j=1;$j<=$u;$j++)
{

if($expenduter_head[$j]==$expenduter_head_id[$i])
{
print"
<option value='$expenduter_sub_id[$j]'> &nbsp;&nbsp;&nbsp; $expenduter_sub[$j]</option>
";
}


}

}






print"
</select>

<input type='hidden' name='ser' value='1'>

 <font face='arial' size='2'> &nbsp; Amount: <input type='text' name='amount' id='arr'></font> 
";

/*
print"
<input type='checkbox' name='no_cash' $cas value='1'> <font color='black'> Without Cash </font>
";
*/




print"
</td> 
</tr>
<tr> <td height='10'> </td> </tr>








<tr> 
<td width='10'> </td>
<td  align='left' valign='top' height='50'> 
<font face='arial' size='2'> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Comments</font>

:
<input type='text' name='details' id='txt'>

&nbsp;&nbsp;   

<input type='submit' id='enter' value='Enter'>
</td> 
</form>
</tr>
<tr> <td height='5'> </td> </tr>


</table>
";


print"
<table align='center' width='650' cellpadding='0' cellspacing='1' bgcolor='cccccc'>

<tr bgcolor='F7E2E2'> 
<td height='25' align='center' width='60'> <font face='arial' size='2'> Delete </font> </td> 
<td height='' align='center' width='100'> <font face='arial' size='2'> Name </font> </td> 
<td height='' align='center' width='200'> <font face='arial' size='2'> Comments </font> </td> 
<td height='' align='center' width='100'> <font face='arial' size='2'> Amount </font> </td> 
</tr>
";






$qeu=0;

foreach($_SESSION['cart_price'] as $product_id => $amount)
{
$qeu++;
$amount_a[$qeu]=$amount;
}



$qeu=0;

foreach($_SESSION['cart_local'] as $product_id => $local)
{
$qeu++;
$local_a[$qeu]=$local;
}






















if($product_id>0)

{

foreach($_SESSION['cart'] as $product_id => $quantity)
{

$qw++;

$sql="SELECT * FROM `rexpendature_sub` WHERE user_id='$product_id' ";
$result=mysql_query($sql);
$arrp_new=mysql_fetch_array($result);


$arrp[3]=$local_a[$qw];
$arrp[4]=$amount_a[$qw];



print"
<tr bgcolor='white'> 
<td height='25' align='center' width='60'> <font face='arial' size='2'>  <a href=\"rcost_entry.php?action=remove&i1d=$arrp_new[0]&sup=$ledger&ser=$ser&dat=$dat&mon=$mon&yer=$yer\">  <img src='picture/remove.gif'> </a></font> </td> 
<td height='' align='center' width='100'> <font face='arial' size='2'> $arrp_new[2] </font> </td> 
<td height='' align='center' width='200'> <font face='arial' size='2'> $arrp[3] </font> </td> 
<td height='' align='center' width='100'> <font face='arial' size='2'> $arrp[4] </font> </td> 
</tr>
";



$total=$total+$arrp[4];
}


}



print"
<tr bgcolor='white'> 
<td height='25' align='center' width='60'> <font face='arial' size='2'>  </font> </td> 
<td height='' align='center' width='100'> <font face='arial' size='2'>  </font> </td> 
<td height='' align='center' width='200'> <font face='arial' size='2'> Total </font> </td> 
<td height='' align='center' width='100'> <font face='arial' size='2'> $total </font> </td> 
</tr>
";





print"
</table>
";



print"
<table>
<tr> <td height='5'> </td> </tr>
</table>
";

//include_once('convert3.php');

print"
<table width='600' cellpadding='0' cellspacing='0'>
<tr> 

<form action='rcost_memo.php' method='POST' target='a_blank'>

<td height='5' align='right'>  


Payment Mode :


<select name='payment_mode' id='new_sup1'>

<option value='$payment_mode'>$payment_moden</option>

";

print"
<option value=''> Cash</option>
";

//$result = mysql_query("SELECT * FROM `bank`   ORDER BY `user_id` ASC  LIMIT 0 , 1000");

$result = mysql_query("SELECT * FROM `bank`  ORDER BY `bank_name` ASC ");


while ($a_row = mysql_fetch_row($result)) {

	foreach ($a_row as $field) {
		
	}
print"
<option value='$a_row[0]'>  $a_row[1] </option>
";
}





print"
</select>




&nbsp;







<input type='hidden' name='ledger' value='$ledger'>



<input type='hidden' name='dat' value='$dat'>
<input type='hidden' name='mon' value='$mon'>
<input type='hidden' name='yer' value='$yer'>

<input type='hidden' name='no_cash' value='$no_cash'>


<input type='hidden' name='cost_name' value='$cost_name'>

<input type='hidden' name='comments' value='$details'>


<input type='submit' value=' Save & Print' id='enter2'> 

</td> 

</form>
</tr>
</table>
";


print"
<table width='600' cellpadding='0' cellspacing='0'>
<tr> <td height='8'>   </td> </tr>
</table>
";



print"
<table align='center' width='800' cellpadding='0' cellspacing='0'>
<tr> <td align='center' height='28' bgcolor='#7087A3' id='tdt'>  <font face='arial' color='white' size='2'> <b>   </b> </font> </td> </tr>
</table>











</td>


</tr>
</table>




</body>

</html>


";


?>