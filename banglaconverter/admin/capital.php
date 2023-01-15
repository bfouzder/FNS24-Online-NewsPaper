<?php

include_once('dbconnection.php');

/*
for($i=1;$i<=12;$i++)
{

$customer_id=2025;
$customer_name="$i";
$sql = "INSERT INTO `capital` (`user_id`, `customer_name`, `customer_id`, `mobile`, `email`, `address`, `area`, `company_name`) VALUES ('','$customer_name','$customer_id','$mobile','$email','$address','$category','$company_name')";
mysql_query($sql);
}

*/


$ser=trim($_POST['ser']);

$yer1=trim($_POST['yer1']);


$customer_name=trim($_POST['customer_name']);
$customer_id=trim($_POST['customer_id']);
$mobile=trim($_POST['mobile']);
$email=trim($_POST['email']);
$address=trim($_POST['address']);
$company_name=trim($_POST['company_name']);






$customer_name=str_replace("'","`","$customer_name");
$company_name=str_replace("'","`","$company_name");
$mobile=str_replace("'","`","$mobile");
$email=str_replace("'","`","$email");
$address=str_replace("'","`","$address");
$category=str_replace("'","`","$category");
$company_name=$customer_name;





$s=trim($_POST['s']);
$d=$_GET['dell'];

//print" $category_name - $details ";



if($ser==10)
{





$sql= "UPDATE  `capital` SET `mobile`='$mobile' WHERE `user_id`='$s'";
mysql_query($sql);




include_once('s.php');
}




if($d!="")
{

//$result = mysql_query("DELETE FROM asset WHERE user_id=$d");
	
}





print"

<html>

<head>
<title> Capital </title>
";


include_once('style.php');


print"
</head>


<body>
";


include_once('header2.php');


print"
<table align='center' width='1200' cellpadding='0' cellspacing='1' height='800' bgcolor='gray'>
<tr bgcolor='white'> 
<td align='center' valign='top' width='220' bgcolor='#C5B991'>  

<table align='center' width='200' cellpadding='0' cellspacing='0' height=''>

<tr> <td height='10'> </td></tr>

<tr> <td height='30' width='200' bgcolor='green'>   <span id='child'> <b> <font color='white'> Create </font> </b> </span>  </td></tr>

<tr> <td height='7'> </td></tr>





";


include_once('create_left.php');


print"
















<td align='center' valign='top' width='980'>  



<table align='center' width='900' cellpadding='0' cellspacing='0'>
<tr> <td height='10'>  </td> </tr>
</table>



<table align='center' width='900' cellpadding='0' cellspacing='0'>
<tr> <td align='center' height='48' bgcolor='#7087A3' id='tda'>  <font face='arial' color='white' size='5'> <b> Monthly Capital Entry </b> </font> </td> </tr>
</table>










<form action='capital.php' method='POST'>
<table align='center' width='900' cellpadding='0' cellspacing='0'>
<tr> <td align='center' height='68'>  <font face='arial' color='black' size='4'> 

<b> Select Year : </b> </font>

<select name='yer1' id='ye'>
<option>$yer1</option>
";

include_once('year.php');

print"
</select>

&nbsp;&nbsp;

<input type='submit' value='Search' id='pr'>

 </td> </tr>
</table>
</form>




<table align='center' width='900' cellpadding='1' cellspacing='1' bgcolor='EFEBEB'>




<tr bgcolor='white' height='40'> 
     <td  bgcolor='' align='center' height='0' width=''> <font face='arial' size='4'>  Name Of Month </font> </td>
    
	 <td align='center' width=''> <font face='arial' size='4'> Capital Amount  </font> </td>
	 
	 ";
	 
	



print"
</tr>
";






$d=11;



$result = mysql_query("SELECT * FROM `capital` where customer_id='$yer1' ORDER BY `user_id` ASC  LIMIT 0 , 60000 ");


while ($a_row = mysql_fetch_row($result)) {

	foreach ($a_row as $field) {
		
	}

$eqq++;

$ku++;

print"
<tr bgcolor='white' height='40'> 

<form action='capital.php' method='POST'>

	
	    <td  bgcolor='' align='center' height='0' width='100'> 
		
		<font face='arial' size='2'> <b> $ku_old </b> 
";


$iz=$a_row[1];


if($iz==1)
{
$mon_name="January";	
}
if($iz==2)
{
$mon_name="February";	
}
if($iz==3)
{
$mon_name="March";	
}
if($iz==4)
{
$mon_name="April";	
}
if($iz==5)
{
$mon_name="May";	
}
if($iz==6)
{
$mon_name="June";	
}
if($iz==7)
{
$mon_name="July";	
}
if($iz==8)
{
$mon_name="August";	
}
if($iz==9)
{
$mon_name="September";	
}
if($iz==10)
{
$mon_name="October";	
}
if($iz==11)
{
$mon_name="Nobember";	
}
if($iz==12)
{
$mon_name="December";	
}



print"

		<input type='text' name='customer_name' value='$mon_name' size='30'>  </font> </td>
		
	    
	    <td  bgcolor='' align='center' height='0' width='40'> <font face='arial' size='2'> <input type='text' name='mobile' value='$a_row[3]' size='10'>  </font> </td>
		
				";
				
				$amount_asset=$amount_asset+$a_row[3];
				
		
		
		print"
	 
		
	 <td align='center' width='70'> 
	 <input type='hidden' name='ser' value='10'>
	 <input type='hidden' name='s' value='$a_row[0]'>
	 <input type='hidden' name='yer1' value='$yer1'>
	 
	 
	 <font face='arial' size='2'> <input type='submit' value='Edit'> </font>


	 </td>
	 </form>
	 
";



print"
</tr>
";


}














print"

<tr bgcolor='white'> 
<td align='center' height='30' bgcolor=''> <font face='arial' size='4'> <b> </b> </font> </td> 

<td align='center'> <font face='arial' size='4'> <b>  </b> </font></td> 
<td> </td> 

</tr>



<tr> <td align='center' height='30' bgcolor=''>   </td> <td> </td> </tr>

</table>

<br>
<br>
<br>
<br>





<table align='center' width='900' cellpadding='0' cellspacing='0'>
<tr> <td align='center' height='28' bgcolor='#7087A3' id='tdt'>  <font face='arial' color='white' size='2'> <b>   </b> </font> </td> </tr>
</table>









</td>


</tr>
</table>




</body>

</html>


";


?>