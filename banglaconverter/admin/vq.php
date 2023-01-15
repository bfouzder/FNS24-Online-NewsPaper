<?php

include_once('dbconnection.php');



$ser=trim($_POST['ser']);

$s=trim($_POST['s']);

$m_no=trim($_POST['m_no']);

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

$mobile=$arrs[2];
$address=$arrs[4];




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













$d=$_GET['dell'];


$du=$d;

if($d!="")
{
	
	
$dat1=$_GET['dat1'];
$mon1=$_GET['mon1'];
$yer1=$_GET['yer1'];


$dat2=$_GET['dat2'];
$mon2=$_GET['mon2'];
$yer2=$_GET['yer2'];


$supplier=$_GET['supplier'];



	
$sql="SELECT * FROM `salememo` WHERE user_id='$d' ";

$result=mysql_query($sql);
$arr_m=mysql_fetch_array($result);
$m_id=$arr_m[1];












$result = mysql_query("SELECT * FROM `saleproduct` where money_id='$m_id' ");

while ($a_row = mysql_fetch_row($result)) {

	foreach ($a_row as $field) {
		
	}

$k++;
$p_id[$k]=$a_row[4];
$qty[$k]=$a_row[6];
$uid[$k]=$a_row[0];



}



for($i=1;$i<=$k;$i++)
{



$sql="SELECT * FROM `product_name` WHERE user_id='$p_id[$i]' ";


$result=mysql_query($sql);
$arrb=mysql_fetch_array($result);

$st=$arrb[12];

$st=$st-$qty[$i];


$sql= "UPDATE  `product_name` SET `sale_product`='$st' WHERE `user_id`='$p_id[$i]'";
mysql_query($sql);

$result = mysql_query("DELETE FROM saleproduct WHERE user_id=$uid[$i]");

}















$sql="SELECT * FROM `customer` WHERE user_id='$supplier' ";






$result=mysql_query($sql);
$arrss=mysql_fetch_array($result);
$suppliern=$arrss[1];

$mobile=$arrss[2];
$address=$arrss[4];




$result = mysql_query("DELETE FROM qsalememo WHERE user_id=$du");

$result = mysql_query("DELETE FROM cash_book WHERE money_id=$m_id");
$result = mysql_query("DELETE FROM qsaleproduct WHERE money_id=$m_id");
$result = mysql_query("DELETE FROM customer_laser WHERE money_id=$m_id");
$result = mysql_query("DELETE FROM bank_refill WHERE money_id=$m_id");





$mdate="$yer1$mon1$dat1";
$ndate="$yer2$mon2$dat2";

}




















print"

<html>

<head>
<title> View Quotation / Estimate </title>
";


include_once('style.php');


print"
</head>


<body>
";


//include_once('header.php');


print"
<table align='center' width='1200' cellpadding='0' cellspacing='1' height='800' bgcolor='gray'>
<tr bgcolor='white'> 


";

//include_once('find_transection_left.php');

print"





<td align='center' valign='top' width='980'> 

";

include_once('address.php');

print"


<table align='center' width='1000' cellpadding='0' cellspacing='1' bgcolor='F9F4D8'>

<tr> 
<td width='1000' height='320' bgcolor='ECE9D8' valign='top'> 


";







print"

<table align='center' width='1000' cellpadding='0' cellspacing='1' bgcolor='F9F4D8'>

<tr> 
<td width='1000' height='320' bgcolor='ECE9D8' valign='top'> 

<table align='center' width='1000' cellpadding='0' cellspacing='0' bgcolor='F7D3F2'>
<tr> <td align='center' height='40'> <font face='arial' size='2'> Customer Transaction  </font> </td> </tr>
<tr> <td align='center' height='1' bgcolor='F9F4D8'> </td> </tr>
</table>








<table align='center' width='1000' cellpadding='0' cellspacing='0' bgcolor='F3F3F3'>



<tr> 

<form action='vq.php' method='POST'>

<td align='center' height='40'> 

<font face='arial' size='2'> Memo_id: </font>

<input type='text' name='m_no' size='20'>

<font face='arial' size='2'> Atten:   </font>

<select name='supplier' id='cust'>

<option value='$supplier'> $suppliern id- $supplier  </option>

<option value=''> All  </option>

";



//$result = mysql_query("SELECT * FROM customer");


$result = mysql_query("SELECT * FROM `customer`  ORDER BY `customer_name` ASC ");


while ($a_row = mysql_fetch_row($result)) {

	foreach ($a_row as $field) {
		
	}

print"
<option value='$a_row[0]'>$a_row[1] - id -$a_row[0]</option>
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
<option>2014</option>
<option>2015</option>
<option>2016</option>
<option>2017</option>
<option>2018</option>
<option>2019</option>
<option>2020</option>
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
<option>2014</option>
<option>2015</option>
<option>2016</option>
<option>2017</option>
<option>2018</option>
<option>2019</option>
<option>2020</option>
</select>


<input type='hidden' name='ser' value='7'>

<input type='submit' value='Search'>

</td> 


</form>

</tr>


<tr> <td align='center' height='1' bgcolor='F9F4D8'> </td> </tr>
</table>







<table align='center' width='1000' cellpadding='0' cellspacing='1'>

<tr bgcolor='F2F2F2'>
<td align='left' HEIGHT='30'> <font size='2' face='arial'> Customer name: $suppliern Address: $address $mobile </font> </td>
</tr>

</table>




<table align='center' width='1000' cellpadding='0' cellspacing='1'>

<tr bgcolor='F677F2'>


 
<td align='center' height='30' width='100'>  <font face='arial' size='2' color=''> Memo_id</font> </td> 

<td align='center' height='30' width='100'>  <font face='arial' size='2' color=''> Saler </font> </td> 


<td align='center' height='30' width='180'>  <font face='arial' size='2' color=''> Customer Name </font> </td> 

<td width='100' align='center'>              <font face='arial' size='2'> Pro_Item</font> </td>





<td width='100' align='center'>              <font face='arial' size='2'> Total </font> </td>
<td width='50' align='center'>              <font face='arial' size='2'> Commission </font> </td>
<td width='100' align='center'>              <font face='arial' size='2'> Total </font> </td>
<td width='100' align='center'>              <font face='arial' size='2'> Carring Cost </font> </td>
<td width='100' align='center'>              <font face='arial' size='2'> Subtotal </font> </td>





<td width='50' align='center'>              <font face='arial' size='2'> Cash </font> </td>
<td width='50' align='center'>              <font face='arial' size='2'> Due </font> </td>








<td width='100' align='center'>             <font face='arial' size='2'> Date</font> </td>
";

/*
<td width='50' align='center'>              <font face='arial' size='2'> Counting Present Due </font> </td>
*/



print"
<td width='150' align='center'>              <font face='arial' size='2'>  Comments   </font> </td>

<td width='100' align='center'>              <font face='arial' size='2'>  View </font> </td>


";

	 if($user_name1=="superadmin")
{
print"
<td width='100' align='center'>              <font face='arial' size='2'>  Delete </font> </td>
";
}

print"
</tr>
";









$qt=0;

//$result = mysql_query("SELECT * FROM salememo");

if($m_no!="")
{
$result = mysql_query("SELECT * FROM `qsalememo` where  money_id='$m_no' || po_no='$m_no' || d_no='$m_no' ORDER BY `user_id` ASC ");
$qt=1;
}



if($supplier!="")
{
$result = mysql_query("SELECT * FROM `qsalememo` where adat>='$mdate' && adat<='$ndate' && supplier_id='$supplier' ORDER BY `adat` ASC ");
$qt=1;
}

if($qt==0)
{
$result = mysql_query("SELECT * FROM `qsalememo` where adat>='$mdate' && adat<='$ndate'  ORDER BY `adat` ASC ");
}



while ($a_row = mysql_fetch_row($result)) {

	foreach ($a_row as $field) {
		
	}



if($a_row[5]!="")

{





$t55=$a_row[5]+$a_row[26];

$t55_total=$t55_total+$t55;
$comm=$comm+$a_row[26];
$tot=$tot+$a_row[5];
$ship=$ship+$a_row[6];
$t66=$a_row[5]+$a_row[6];

$stot=$stot+$t66;









print"
<tr bgcolor='white'> 

<td align='center' height='30' width='50'>  <font face='arial' size='2' color=''> $a_row[1] </font> </td> 


<td align='center' height='30' width=''>  <font face='arial' size='2' color=''> $a_row[23] </font> </td> 




<td align='center' height='30' width='150'>  <font face='arial' size='2' color=''> $a_row[3] -  $a_row[2] </font> </td> 

<td width='50' align='center'>              <font face='arial' size='2'> $a_row[4]  </font> </td>





";

$total_comm=$a_row[26]+$a_row[27];
$total_s=$t55-$total_comm;
$total_subs=$total_s+$a_row[6];


$total_comm_final=$total_comm_final+$total_comm;
$total_s_final=$total_s_final+$total_s;
$total_sub_final=$total_sub_final+$total_subs;


print"

<td width='150' align='center'>              <font face='arial' size='2'> $t55   </font> </td>

<td width='150' align='center'>              <font face='arial' size='2'> 
 $total_comm </font> </td>

<td width='150' align='center'>              <font face='arial' size='2'> 

 $total_s   </font> </td>


<td width='50' align='center'>              <font face='arial' size='2'> $a_row[6] </font> </td>


<td width='50' align='center'>              <font face='arial' size='2'>  $total_subs  </font> </td>




<td width='50' align='center'>              <font face='arial' size='2'> $a_row[7] </font> </td>

<td width='50' align='center'>              <font face='arial' size='2'> $a_row[8] </font> </td>







<td width='100' align='center'>             <font face='arial' size='2'> $a_row[9]-$a_row[10]-$a_row[11]  </font> </td>








<td width='150' align='center'>     <font face='arial' size='2'> $a_row[14] </font> </td>



<form action='qsalereceitview1.php' method='POST'>

<td width='100' align='center'>  


<input type='hidden' name='s' value='$a_row[0]'>      

<input type='submit' value='View'>

</td>

</form>




";

	 if($user_name1=="superadmin")
{
print"
<td align='center' width='70'> <a onClick=\"javascript: return confirm('Are you confirm to delete');\" href=\"customer_transection.php?dell=$a_row[0]&supplier=$supplier&dat1=$dat1&mon1=$mon1&yer1=$yer1&dat2=$dat2&mon2=$mon2&yer2=$yer2 \"> <div id='del'><font face='arial' size='2'> Delete  </font> </div>  </a> </td>
";
}






print"
</tr>

";

$t11=$t11+$a_row[5];

$tax11=$tax11+$a_row[16];
$t1=$t1+$a_row[5];

$wtax11=$wtax11+$a_row[17];

$c11=$c11+$a_row[7];




$total_less=$total_less+$a_row[6];

$total_due=$total_due+$a_row[8];

$ta=$ta+$a_row[16];



}

else
{
print"
<tr bgcolor='F2F2F2'> 

<td align='center' height='30' width='50'>  <font face='arial' size='2' color=''> $a_row[1]</font> </td> 
<td align='center' height='30' width='150'>  <font face='arial' size='2' color=''> $a_row[3] -  $a_row[2] </font> </td> 





<td width='50' align='center'>              <font face='arial' size='2'> $a_row[4]</font> </td>
<td width='150' align='center'>              <font face='arial' size='2'> $a_row[5]  $a_row[21]</font> </td>
";


//<td width='50' align='center'>              <font face='arial' size='2'> $a_row[16]</font> </td>

//<td width='50' align='center'>              <font face='arial' size='2'> $a_row[17] 45 </font> </td>

print"


<td width='50' align='center'>              <font face='arial' size='2'> $a_row[6] </font> </td>



<td> </td>




<td width='50' align='center'>              <font face='arial' size='2'> $a_row[7] </font> </td>

<td width='50' align='center'>              <font face='arial' size='2'> $a_row[8] </font> </td>



<td width='100' align='center'>             <font face='arial' size='2'> $a_row[9]-$a_row[10]-$a_row[11]</font> </td>


<td width='220' align='center'>              <font face='arial' size='2'>  $a_row[19] - $a_row[7] = $a_row[20] </font> </td>





<td width='150' align='center'>              <font face='arial' size='2'> $a_row[14] </font> </td>



<form action='salememo2.php' method='POST'>

<td width='100' align='center'>  


<input type='hidden' name='s' value='$a_row[0]'>      

<input type='submit' value='View'>

</td>

</form>











<form action='customer_tran.php' method='POST'>

<td width='100' align='center'>    

<input type='hidden' name='ser' value='5'>

<input type='hidden' name='supplier' value='$supplier'>

<input type='hidden' name='s' value='$a_row[0]'>
<input type='hidden' name='dat1' value='$dat1'> 
<input type='hidden' name='mon1' value='$mon1'> 
<input type='hidden' name='yer1' value='$yer1'> 


<input type='hidden' name='dat2' value='$dat2'> 
<input type='hidden' name='mon2' value='$mon2'> 
<input type='hidden' name='yer2' value='$yer2'> 

<input type='submit' value='Delete'>

</td>

</form>




</tr>

";


$tax11=$tax11+$a_row[16];
$t1=$t1+$a_row[5];

$wtax11=$wtax11+$a_row[17];

$c11=$c11+$a_row[7];




$total_less=$total_less+$a_row[6];

$total_due=$total_due+$a_row[8];


}


}









$ty=$t11-$total_less;

$ddd=$ty-$c11;











print"





<tr bgcolor='white'> 

<td align='center' height='30' width='50'>  <font face='arial' size='2' color=''> </font> </td> 
<td align='center' height='30' width='180'>  <font face='arial' size='2' color=''>  </font> </td> 
<td width='50' align='center'>              <font face='arial' size='2'> </font> </td>

<td width='50' align='center'>              <font face='arial' size='2'> </font> </td>



<td width='100' align='center'>              <font face='arial' size='2'> $t55_total </font> </td>

<td width='100' align='center'>              <font face='arial' size='2'> $total_comm_final </font> </td>

<td width='100' align='center'>              <font face='arial' size='2'> $total_s_final </font> </td>


<td width='50' align='center'>              <font face='arial' size='2'> $total_less </font> </td>

<td width='100' align='center'>              <font face='arial' size='2'> $total_sub_final </font> </td>



<td width='50' align='center'>              <font face='arial' size='2'> $c11 </font> </td>


<td width='50' align='center'>              <font face='arial' size='2'>  $total_due  </font> </td>



































<td width='180' align='center'>              <font face='arial' size='2'>  </font> </td>
<td width='50' align='center'>              <font face='arial' size='2'>  </font> </td>
<td width='100' align='center'>  </td>



";

	 if($user_name1=="superadmin")
{
print"
<td width='100' align='center'>    </td>
";
}


print"


</tr>
















</table>
";










//   total sale $tyuu=$c11+$ddd;







print"

<br>
<br>


</td>


</tr>
</table>




</body>

</html>


";


?>