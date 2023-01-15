<?php

include_once('dbconnection.php');


$ser=trim($_POST['ser']);

$s=trim($_POST['s']);


$dat1=trim($_POST['dat1']);
$mon1=trim($_POST['mon1']);
$yer1=trim($_POST['yer1']);

$memo_no=trim($_POST['memo_no']);



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



$result = mysql_query("DELETE FROM salememo WHERE user_id=$du");
$result = mysql_query("DELETE FROM saleproduct WHERE money_id=$m_id");
$result = mysql_query("DELETE FROM buyproduct WHERE money_id=$m_id");




$mdate="$yer1$mon1$dat1";
$ndate="$yer2$mon2$dat2";

}








print"

<html>

<head>
<title> Daily Transfer </title>
";


include_once('style.php');


print"
</head>


<body>
";


//include_once('header.php');


print"
<table align='center' width='1200' cellpadding='0' cellspacing='0' height='' bgcolor=''>
<tr bgcolor='white'> 


";

//include_once('find_transection_left.php');

print"





<td align='center' valign='top' width='980'> 


";

include_once('address.php');

print"

<table align='center' width='1000' cellpadding='0' cellspacing='1' bgcolor='#FAF1F1'>

<tr> 
<td width='1000' height='320' bgcolor='white' valign='top'> 


";







print"

<table align='center' width='1000' cellpadding='0' cellspacing='1' bgcolor=''>

<tr> 
<td width='1000' height='320' bgcolor='' valign='top'> 

<table align='center' width='1000' cellpadding='0' cellspacing='0' bgcolor=''>
<tr> <td align='center' height='40'> <font face='arial' size='2'> Daily Transfer  </font> </td> </tr>
<tr> <td align='center' height='1' bgcolor=''> </td> </tr>
</table>





<table align='center' width='1100' cellpadding='0' cellspacing='0' bgcolor=''>



<tr> 

<form action='daily_transfer.php' method='POST'>

<td align='center' height='40'> 

<font face='arial' size='2'> Transfer no: <input type='text' name='memo_no' size='15'> &nbsp;&nbsp; </font>



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


<input type='hidden' name='ser' value='7'>

<input type='submit' value='Search'>

</td> 


</form>

</tr>


<tr> <td align='center' height='1' bgcolor=''> </td> </tr>
</table>












<table align='center' width='1200' cellpadding='3' cellspacing='1' bgcolor='black'>

<tr bgcolor='#FAF1F1'>


 
<td align='center' height='30' width='100'>  <font face='arial' size='2' color=''> Trans._ID </font> </td> 


<td align='center' height='30' width='100'>  <font face='arial' size='2' color=''> Operate By </font> </td> 


<td align='center' height='30' width='380'>  <font face='arial' size='2' color=''> Transfer to Transfer </font> </td> 

<td width='100' align='center'>              <font face='arial' size='2'> Pro_Item</font> </td>
";


/*
<td width='100' align='center'>              <font face='arial' size='2'> Total </font> </td>
<td width='50' align='center'>              <font face='arial' size='2'> Commission </font> </td>
<td width='100' align='center'>              <font face='arial' size='2'> Total </font> </td>
<td width='100' align='center'>              <font face='arial' size='2'> Carring Cost </font> </td>
<td width='100' align='center'>              <font face='arial' size='2'> Subtotal </font> </td>

<td width='50' align='center'>              <font face='arial' size='2'> Vat </font> </td>
<td width='50' align='center'>              <font face='arial' size='2'> Tax </font> </td>
<td width='120' align='center'>              <font face='arial' size='2'> Subtotal </font> </td>



<td width='50' align='center'>              <font face='arial' size='2'> Cash </font> </td>
<td width='50' align='center'>              <font face='arial' size='2'> Due </font> </td>
*/


print"
<td width='100' align='center'>             <font face='arial' size='2'> Date</font> </td>
<td width='200' align='center'>              <font face='arial' size='2'>  Address </font> </td>
<td width='200' align='center'>              <font face='arial' size='2'>  Comments </font> </td>
<td width='100' align='center'>              <font face='arial' size='2'>  View </font> </td>

<td width='100' align='center'>              <font face='arial' size='2'>  Edit </font> </td>

<td width='100' align='center'>              <font face='arial' size='2'>  Delete </font> </td>



</tr>
";







//$result = mysql_query("SELECT * FROM buymemo");

if($pas_type==2)
{
if($memo_no=="")
{
$result = mysql_query("SELECT * FROM `salememo` where adat>='$mdate' && adat<='$ndate'  && pas_type='$pas_type' && tf='1' ORDER BY `adat` ASC ");
}
else
{
$result = mysql_query("SELECT * FROM `salememo` where money_id='$memo_no'&& b_code='$b_code' && pas_type='$pas_type' || po_no='$memo_no' || d_no='$memo_no' && tf='1' ORDER BY `adat` ASC ");	
}

}

else
{
	
if($memo_no=="")
{
$result = mysql_query("SELECT * FROM `salememo` where adat>='$mdate' && adat<='$ndate' && tf='1'  ORDER BY `adat` ASC ");
}
else
{
$result = mysql_query("SELECT * FROM `salememo` where money_id='$memo_no' || po_no='$memo_no' || d_no='$memo_no' && tf='1'   ORDER BY `adat` ASC ");	
}	
	
}

while ($a_row = mysql_fetch_row($result)) {

	foreach ($a_row as $field) {
		
	}



	$serial++;
	
	
$t55=$a_row[5]+$a_row[26];

$t55_total=$t55_total+$t55;
$comm=$comm+$a_row[26];
$tot=$tot+$a_row[5];
$ship=$ship+$a_row[6];
$t66=$a_row[5]+$a_row[6];

$stot=$stot+$t66;

	
	



print"
<tr bgcolor='white'> 

 
<td align='center' height='30' width='50'>  <font face='arial' size='2' color=''> $a_row[1]  </font> </td> 


<td align='center' height='30' width=''>  <font face='arial' size='2' color=''> $a_row[22]  </font> </td> 

<td align='left' height='30' width='180'>  <font face='arial' size='2' color=''> $a_row[3]  To $a_row[60]   </font> </td> 

<td width='50' align='center'>              <font face='arial' size='2'> $a_row[4] </font> </td>


";

$total_comm=$a_row[26]+$a_row[27];
$total_s=$t55-$total_comm;
$total_subs=$total_s+$a_row[6];


$total_comm_final=$total_comm_final+$total_comm;
$total_s_final=$total_s_final+$total_s;
$total_sub_final=$total_sub_final+$total_subs;

/*
print"

<td width='150' align='center'>              <font face='arial' size='2'> $t55   </font> </td>

<td width='150' align='center'>              <font face='arial' size='2'> 
 $total_comm </font> </td>

<td width='150' align='center'>              <font face='arial' size='2'> 

 $total_s   </font> </td>


<td width='50' align='center'>              <font face='arial' size='2'> $a_row[6] </font> </td>


<td width='50' align='center'>              <font face='arial' size='2'>  $total_subs    </font> </td>
";

*/

$total_subs_new=$total_subs+$a_row[40]+$a_row[41];

$total_subs_new1=$total_subs_new1+$total_subs_new;
$vat=$vat+$a_row[40];
$tax=$tax+$a_row[41];

/*
print"
<td width='' align='center'>              <font face='arial' size='2'> $a_row[40] </font> </td>
<td width='' align='center'>              <font face='arial' size='2'> $a_row[41] </font> </td>
<td width='' align='center'>              <font face='arial' size='2'> $total_subs_new </font> </td>
";
*/



/*
print"
<td width='50' align='center'>              <font face='arial' size='2'> $a_row[7] </font> </td>
<td width='50' align='center'>              <font face='arial' size='2'> $a_row[8] </font> </td>
";
*/


print"

<td width='100' align='center'>             <font face='arial' size='2'> $a_row[9]-$a_row[10]-$a_row[11]</font> </td>
<td width='150' align='center'>              <font face='arial' size='2'> $a_row[15] $a_row[16] </font> </td>
<td width='100' align='center'>              <font face='arial' size='2'>  $a_row[14]  </font> </td>


<form action='transfer_view.php' method='POST' target='a_blank'>

<td width='100' align='center'>  


<input type='hidden' name='s' value='$a_row[0]'>      

<input type='submit' value='View'>

</td>

</form>
";


if($user_name1=="superadmin")
{
print"
<form action='transfer_edit.php' method='POST' target='a_blank'>
<td width='100' align='center'>  
<input type='hidden' name='s45' value='$a_row[0]'>      
<input type='submit' value='Edit'>
</td>
</form>
";
}
else
{
print"
<td> </td>
";
}




	 if($user_name1=="superadmin")
{
print"
<td align='center' width='70'> <a onClick=\"javascript: return confirm('Are you confirm to delete');\" href=\"daily_transfer.php?dell=$a_row[0]&supplier=$supplier&dat1=$dat1&mon1=$mon1&yer1=$yer1&dat2=$dat2&mon2=$mon2&yer2=$yer2 \"> <div id='del'><font face='arial' size='2'> Delete  </font> </div>  </a> </td>
";
}
else
{
print"<td> </td>";
}



print"
</tr>

";

$total_money=$total_money+$a_row[5];
$total_less=$total_less+$a_row[6];
$total_joma=$total_joma+$a_row[7];
$total_due=$total_due+$a_row[8];


}



print"

</table>
";





//   total sale $tyuu=$total_joma+$total_due;










print"




</td>


</tr>
</table>




</body>

</html>


";


?>