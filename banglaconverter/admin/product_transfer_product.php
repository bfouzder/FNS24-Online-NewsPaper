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

if($d!="")
{
	
$dat1=$_GET['dat1'];
$mon1=$_GET['mon1'];
$yer1=$_GET['yer1'];


$dat2=$_GET['dat2'];
$mon2=$_GET['mon2'];
$yer2=$_GET['yer2'];



$sql="SELECT * FROM `buyproduct` WHERE user_id='$d' ";

$result=mysql_query($sql);
$arr_m=mysql_fetch_array($result);
$m_id2=$arr_m[22];



$result = mysql_query("DELETE FROM buyproduct WHERE money_id2=$m_id2");



$mdate="$yer1$mon1$dat1";
$ndate="$yer2$mon2$dat2";


}



print"

<html>

<head>
<title> Product To Product Transfer  </title>
";


?>






  <link rel="stylesheet" href="jquery-ui-themes-1.11.4/themes/smoothness/jquery-ui.css">
  
  <script src="jquery-1.10.2.js"></script>
  <script src="jquery-ui.js"></script>
  
 

</script>



<?php







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

<table align='center' width='1000' cellpadding='0' cellspacing='1' bgcolor=''>

<tr> 
<td width='1000' height='320' bgcolor='white' valign='top'> 


";







print"

<table align='center' width='1000' cellpadding='0' cellspacing='1' bgcolor=''>

<tr> 
<td width='1000' height='320' bgcolor='' valign='top'> 

<table align='center' width='1000' cellpadding='0' cellspacing='0' bgcolor=''>
<tr> <td align='center' height='40'> <font face='arial' size='4'> Product To Product Transfer  </font> </td> </tr>
<tr> <td align='center' height='1' bgcolor=''> </td> </tr>
</table>





<table align='center' width='1000' cellpadding='0' cellspacing='0' bgcolor=''>



<tr> 

<form action='product_transfer_product.php' method='POST'>

<td align='center' height='40'> 


<font face='arial' size='2'> Memo no: <input type='text' name='memo_no' size='15'> &nbsp;&nbsp; </font>
";






print"
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


<tr> <td align='center' height='1' bgcolor='#FAF1F1'> </td> </tr>
</table>












<table align='center' width='1000' cellpadding='5' bgcolor='black' cellspacing='1'>

<tr bgcolor='#FAF1F1'>

<td align='center' height='3' width='100'>  <font face='arial' size='2' color=''> SN. </font> </td> 


<td align='center' height='30' width='100'>  <font face='arial' size='2' color=''> Memo_ID </font> </td> 

<td align='center' height='30' width='100'>  <font face='arial' size='2' color=''> Date </font> </td> 


<td align='center' height='30' width='280'>  <font face='arial' size='2' color=''> Details </font> </td> 

<td align='center' height='30' width='280'>  <font face='arial' size='2' color=''> Comments </font> </td> 


<td align='center' height='30' width='10'>  <font face='arial' size='2' color=''>  Qty  </font> </td> 


<td align='center' height='30' width='10'>  <font face='arial' size='2' color=''>  Delete   </font> </td> 

</tr>
";






$tff=2;


$ckk=0;

if($memo_no=="")
{
$result = mysql_query("SELECT * FROM `buyproduct` where adat>='$mdate' && adat<='$ndate' && product_tf='$tff'  ORDER BY `adat` 
ASC,`user_id` ASC ");
}
else
{
$result = mysql_query("SELECT * FROM `buyproduct` where adat>='$mdate' && adat<='$ndate' && product_tf='$tff' && money_id2='$memo_no'  ORDER BY `adat` 
ASC,`user_id` ASC ");

}



while ($a_row = mysql_fetch_row($result)) {

	foreach ($a_row as $field) {
		
	}

$zs++;


print"
<tr bgcolor='white'> 


<td align='center' height='30' width=''>  <font face='arial' size='2' color=''> $zs  </font> </td> 

 
<td align='center' height='30' width=''>  <font face='arial' size='2' color=''> $a_row[22]  </font> </td> 


<td align='center' height='30' width=''>  <font face='arial' size='2' color=''> $a_row[9]-$a_row[10]-$a_row[11]  </font> </td> 


<td align='left' height='30' width=''>  <font face='arial' size='2' color=''> $a_row[34]  </font> </td> 

<td align='left' height='30' width=''>  <font face='arial' size='2' color=''> $a_row[33]   </font> </td> 

<td align='left' height='30' width=''>  <font face='arial' size='2' color=''> $a_row[6]   </font> </td> 
";






	 if($user_name1=="superadmin")
{
print"
<td align='center' width='70'> <a onClick=\"javascript: return confirm('Are you confirm to delete');\" href=\"product_transfer_product.php?dell=$a_row[0]&supplier=$id_supplier&dat1=$dat1&mon1=$mon1&yer1=$yer1&dat2=$dat2&mon2=$mon2&yer2=$yer2 \"> <div id='del'><font face='arial' size='3'> Delete  </font> </div>  </a> </td>
";
}



print"

</tr>
";

$tq=$tq+$a_row[6];

}



print"
<tr bgcolor='F2F2F2'>

<td align='center' height='30' width=''>  <font face='arial' size='2' color=''>  </font> </td>  
<td align='center' height='30' width=''>  <font face='arial' size='2' color=''>  </font> </td> 
<td width='' align='center'>              <font face='arial' size='2'>  </font> </td>
<td align='center' height='30' width=''>  <font face='arial' size='2' color=''>  </font> </td>  
<td align='center' height='30' width=''>  <font face='arial' size='2' color=''>  </font> </td> 
<td width='' align='center'>              <font face='arial' size='2'> $tq </font> </td>

<td width='' align='center'>              <font face='arial' size='2'>  </font> </td>


</tr>



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