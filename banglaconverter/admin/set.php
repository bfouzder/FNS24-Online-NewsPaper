<?php
include_once('dbconnection.php');




$ser=trim($_POST['ser']);

$page_height=trim($_POST['page_height']);
$font_size=trim($_POST['font_size']);
$font_color=trim($_POST['font_color']);
$bg_color=trim($_POST['bg_color']);
$radius=trim($_POST['radius']);
$wd=trim($_POST['wd']);

$pto=trim($_POST['pto']);
$discount=trim($_POST['discount']);
$bill_ledger=trim($_POST['bill_ledger']);
$sms=trim($_POST['sms']);

$pad=trim($_POST['pad']);

$branch_control=trim($_POST['branch_control']);

$go_1=trim($_POST['go_1']);

$wa=trim($_POST['wa']);

$service=trim($_POST['service']);



$cwp1=trim($_POST['cwp1']);
$cwp11=trim($_POST['cwp11']);

$cwp2=trim($_POST['cwp2']);
$cwp22=trim($_POST['cwp22']);


$cwp3=trim($_POST['cwp3']);
$cwp33=trim($_POST['cwp33']);


$cwp4=trim($_POST['cwp4']);
$cwp44=trim($_POST['cwp44']);

$box=trim($_POST['box']);

$other=trim($_POST['other']);












$s=1;

if($ser==1)
{
	

	
$sql= "UPDATE  `sett` SET `height`='$page_height' WHERE `user_id`='$s'";
mysql_query($sql);



	
$sql= "UPDATE  `sett` SET `font_size`='$font_size' WHERE `user_id`='$s'";
mysql_query($sql);



	
$sql= "UPDATE  `sett` SET `font_color`='$font_color' WHERE `user_id`='$s'";
mysql_query($sql);



	
$sql= "UPDATE  `sett` SET `bg_color`='$bg_color' WHERE `user_id`='$s'";
mysql_query($sql);

	
$sql= "UPDATE  `sett` SET `radius`='$radius' WHERE `user_id`='$s'";
mysql_query($sql);



$sql= "UPDATE  `sett` SET `wd`='$wd' WHERE `user_id`='$s'";
mysql_query($sql);




$sql= "UPDATE  `sett` SET `pto`='$pto' WHERE `user_id`='$s'";
mysql_query($sql);


$sql= "UPDATE  `sett` SET `discount`='$discount' WHERE `user_id`='$s'";
mysql_query($sql);



$sql= "UPDATE  `sett` SET `bill_ledger_show`='$bill_ledger' WHERE `user_id`='$s'";
mysql_query($sql);



$sql= "UPDATE  `sett` SET `sms`='$sms' WHERE `user_id`='$s'";
mysql_query($sql);


$sql= "UPDATE  `sett` SET `pad`='$pad' WHERE `user_id`='$s'";
mysql_query($sql);


$sql= "UPDATE  `sett` SET `b`='$branch_control' WHERE `user_id`='$s'";
mysql_query($sql);



$sql= "UPDATE  `sett` SET `go_1`='$go_1' WHERE `user_id`='$s'";
mysql_query($sql);


$sql= "UPDATE  `sett` SET `wa`='$wa' WHERE `user_id`='$s'";
mysql_query($sql);



$sql= "UPDATE  `sett` SET `service`='$service' WHERE `user_id`='$s'";
mysql_query($sql);


$sql= "UPDATE  `sett` SET `cwp1`='$cwp1' WHERE `user_id`='$s'";
mysql_query($sql);
$sql= "UPDATE  `sett` SET `cwp11`='$cwp11' WHERE `user_id`='$s'";
mysql_query($sql);


$sql= "UPDATE  `sett` SET `cwp2`='$cwp2' WHERE `user_id`='$s'";
mysql_query($sql);
$sql= "UPDATE  `sett` SET `cwp22`='$cwp22' WHERE `user_id`='$s'";
mysql_query($sql);


$sql= "UPDATE  `sett` SET `cwp3`='$cwp3' WHERE `user_id`='$s'";
mysql_query($sql);
$sql= "UPDATE  `sett` SET `cwp33`='$cwp33' WHERE `user_id`='$s'";
mysql_query($sql);


$sql= "UPDATE  `sett` SET `cwp4`='$cwp4' WHERE `user_id`='$s'";
mysql_query($sql);


$sql= "UPDATE  `sett` SET `cwp44`='$cwp44' WHERE `user_id`='$s'";
mysql_query($sql);


$sql= "UPDATE  `sett` SET `box`='$box' WHERE `user_id`='$s'";
mysql_query($sql);


$sql= "UPDATE  `sett` SET `other`='$other' WHERE `user_id`='$s'";
mysql_query($sql);







include_once('s.php');

}



$sql="SELECT * FROM `sett` WHERE user_id='$s' ";
$result=mysql_query($sql);
$arr=mysql_fetch_array($result);
$ch=$arr[1];



$page_height=$arr[3];
$font_size=$arr[4];
$font_color=$arr[5];
$bg_color=$arr[6];
$radius=$arr[7];
$wd=$arr[8];

$pto=$arr[9];

$discount=$arr[10];


$bill_ledger=$arr[11];
$sms=$arr[12];
$pad=$arr[13];
$branch_control=$arr[14];
$go_1=$arr[15];

$wa=$arr[16];
$service=$arr[17];


$cwp1=$arr[18];
$cwp11=$arr[19];

$cwp2=$arr[20];
$cwp22=$arr[21];

$cwp3=$arr[22];
$cwp33=$arr[23];

$cwp4=$arr[24];
$cwp44=$arr[25];

$box=$arr[26];

$other=$arr[27];













print"

<html>

<head>
<title> Settings  </title>
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


<tr> <td height='30' width='200' bgcolor='green'> &nbsp;&nbsp;&nbsp;  <span id='child'> <b> <font color='white'>Create</font> </b> </span>  </td></tr>

<tr> <td height='7'> </td></tr>





";


include_once('create_left.php');


print"
















<td align='center' valign='top' width='980'>  



<br>


<form action='set.php' method='POST'>

<table align='center' width='400' cellpadding='0' cellspacing='0'>
<tr> <td align='center' height='28' bgcolor='#7087A3' id='tda'>  <font face='arial' color='white' size='2'> <b>  Set Font Page Height </b> </font> </td> </tr>
</table>





<table align='center' width='400' cellpadding='0' cellspacing='0' bgcolor='F2F2F2'>
<tr> <td align='center' height='20' bgcolor=''>   </td> <td> </td> </tr>




<tr> <td height='10'> </td> </tr>


<tr> 
     <td height='20' bgcolor='' align='right'> <font face='arial' size='2'> Font Size  </font>   </td>
     <td align='left'>&nbsp;

	:  <input type='text' name='font_size' value='$font_size'>
	 
	 </td> 
</tr>


<tr> <td height='8'> </td> </tr>










<tr> 
     <td height='20' bgcolor='' align='right'> <font face='arial' size='2'> Font Color  </font>   </td>
     <td align='left'>&nbsp;

	:  <input type='text' name='font_color' value='$font_color'>
	 
	 </td> 
</tr>


<tr> <td height='8'> </td> </tr>






<tr> 
     <td height='20' bgcolor='' align='right'> <font face='arial' size='2'> Background Color  </font>   </td>
     <td align='left'>&nbsp;

	:  <input type='text' name='bg_color' value='$bg_color'>
	 
	 </td> 
</tr>


<tr> <td height='8'> </td> </tr>



<tr> 
     <td height='20' bgcolor='' align='right'> <font face='arial' size='2'> Page Height </font>   </td>
     <td align='left'>&nbsp;

	:  <input type='text' name='page_height' value='$page_height'>
	 
	 </td> 
</tr>


<tr> <td height='8'> </td> </tr>






<tr> 
     <td height='20' bgcolor='' align='right'> <font face='arial' size='2'> Radius  </font>   </td>
     <td align='left'>&nbsp;

	:  <input type='text' name='radius' value='$radius'>
	 
	 </td> 
</tr>


<tr> <td height='8'> </td> </tr>








<tr> 
     <td height='20' bgcolor='' align='right'> <font face='arial' size='2'> Width   </font>   </td>
     <td align='left'>&nbsp;

	:  <input type='text' name='wd' value='$wd'>
	 
	 </td> 
</tr>


<tr> <td height='8'> </td> </tr>





<tr> 
     <td height='20' bgcolor='' align='right'> <font face='arial' size='2'> P.T.O   </font>   </td>
     <td align='left'>&nbsp;

	:  <input type='text' name='pto' value='$pto'>
	 
	 </td> 
</tr>


<tr> <td height='8'> </td> </tr>





<tr> 
     <td height='20' bgcolor='' align='right'> <font face='arial' size='2'> Product Wise Discount   </font>   </td>
     <td align='left'>&nbsp;

	:  <input type='text' name='discount' value='$discount'>
	 
	 </td> 
</tr>


<tr> <td height='15'> </td> </tr>



<tr> 
     <td height='20' bgcolor='' align='right'> <font face='arial' size='2'> Bill Ledger Show  </font>   </td>
     <td align='left'>&nbsp;

	:  <input type='text' name='bill_ledger' value='$bill_ledger'>
	 
	 </td> 
</tr>


<tr> <td height='8'> </td> </tr>



<tr> 
     <td height='20' bgcolor='' align='right'> <font face='arial' size='2'> Sms  </font>   </td>
     <td align='left'>&nbsp;

	:  <input type='text' name='sms' value='$sms'>
	 
	 </td> 
</tr>


<tr> <td height='8'> </td> </tr>



<tr> 
     <td height='20' bgcolor='' align='right'> <font face='arial' size='2'> Print on pad </font>   </td>
     <td align='left'>&nbsp;

	:  <input type='text' name='pad' value='$pad'>
	 
	 </td> 
</tr>


<tr> <td height='8'> </td> </tr>




<tr> 
     <td height='20' bgcolor='' align='right'> <font face='arial' size='2'> Total Branch  </font>   </td>
     <td align='left'>&nbsp;

	:  <input type='text' name='branch_control' value='$branch_control'>
	 
	 </td> 
</tr>


<tr> <td height='8'> </td> </tr>




<tr> 
     <td height='20' bgcolor='' align='right'> <font face='arial' size='2'> Godawn   </font>   </td>
     <td align='left'>&nbsp;

	:  <input type='text' name='go_1' value='$go_1'>
	 
	 </td> 
</tr>


<tr> <td height='8'> </td> </tr>




<tr> 
     <td height='20' bgcolor='' align='right'> <font face='arial' size='2'> Warranty   </font>   </td>
     <td align='left'>&nbsp;

	:  <input type='text' name='wa' value='$wa'>
	 
	 </td> 
</tr>


<tr> <td height='8'> </td> </tr>


<tr> 
     <td height='20' bgcolor='' align='right'> <font face='arial' size='2'> Service Charge  </font>   </td>
     <td align='left'>&nbsp;

	:  <input type='text' name='service' value='$service'>
	 
	 </td> 
</tr>


<tr> <td height='8'> </td> </tr>



<tr> 
     <td height='20' bgcolor='' align='right'> <font face='arial' size='2'> Column 1  </font>   </td>
     <td align='left'>&nbsp;

	:  <input type='text' name='cwp1' size='1' value='$cwp1'>
	  <input type='text' name='cwp11' value='$cwp11'>
	
	 
	 </td> 
</tr>


<tr> <td height='8'> </td> </tr>







<tr> 
     <td height='20' bgcolor='' align='right'> <font face='arial' size='2'> Column 2  </font>   </td>
     <td align='left'>&nbsp;

	:  <input type='text' name='cwp2' size='1' value='$cwp2'>
	  <input type='text' name='cwp22' value='$cwp22'>
	
	 
	 </td> 
</tr>


<tr> <td height='8'> </td> </tr>






<tr> 
     <td height='20' bgcolor='' align='right'> <font face='arial' size='2'> Column 3  </font>   </td>
     <td align='left'>&nbsp;

	:  <input type='text' name='cwp3' size='1' value='$cwp3'>
	  <input type='text' name='cwp33' value='$cwp33'>
	
	 
	 </td> 
</tr>


<tr> <td height='8'> </td> </tr>






<tr> 
     <td height='20' bgcolor='' align='right'> <font face='arial' size='2'> Column 4  </font>   </td>
     <td align='left'>&nbsp;

	:  <input type='text' name='cwp4' size='1' value='$cwp4'>
	
	
	  <input type='text' name='cwp44' value='$cwp44'>
	
	 
	 </td> 
</tr>


<tr> <td height='8'> </td> </tr>







<tr> 
     <td height='20' bgcolor='' align='right'> <font face='arial' size='2'> Box  </font>   </td>
     <td align='left'>&nbsp;

	:  
	
	
	  <input type='text' name='box' value='$box'>
	
	 
	 </td> 
</tr>


<tr> <td height='8'> </td> </tr>





<tr> 
     <td height='20' bgcolor='' align='right'> <font face='arial' size='2'> Other  </font>   </td>
     <td align='left'>&nbsp;

	:  
	
	
	  <input type='text' name='other' value='$other'>
	
	 
	 </td> 
</tr>


<tr> <td height='8'> </td> </tr>







<tr> <td height='30'> </td> </tr>




<tr> 
     <td height='20' bgcolor='' align='right' valign='top' width='150'>   </td>
     <td align='left'>
	 
	 
	 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

<input type='hidden'  name='ser' value='1'>
<input type='hidden'  name='pas' value='$pas'>



<input type='hidden' name='sy' value='1'>

 <input type='Submit' id='qq' value='Save'>  


</td> </tr></td> 
</tr>



<tr> <td align='center' height='20' bgcolor=''>   </td> <td> </td> </tr>

</table>






<table align='center' width='400' cellpadding='0' cellspacing='0'>
<tr> <td align='center' height='28' bgcolor='#7087A3' id='tdt'>  <font face='arial' color='white' size='2'> <b>   </b> </font> </td> </tr>
</table>

</form>



</td>


</tr>
</table>




</body>

</html>


";


?>