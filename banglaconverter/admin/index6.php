<?php

include_once('dbconnection.php');



$ser=trim($_POST['ser']);


$but=trim($_POST['but']);
$page=trim($_POST['page']);


$wrong=trim($_POST['wrong']);
$right=trim($_POST['right']);
$button=trim($_POST['button']);


$word_search=trim($_POST['word_search']);





$s=trim($_POST['s']);


$d=$_GET['dell'];

//print" $category_name - $details ";



if($ser==10)
{


$sql= "UPDATE  `right_word` SET `wrong`='$wrong' WHERE `user_id`='$s'";
mysqli_query($con_db,$sql);

$sql= "UPDATE  `right_word` SET `right_w`='$right' WHERE `user_id`='$s'";
mysqli_query($con_db,$sql);

$sql= "UPDATE  `right_word` SET `button`='$button' WHERE `user_id`='$s'";
mysqli_query($con_db,$sql);

include_once('s.php');
}




if($d!="")
{

$result = mysqli_query($con_db,"DELETE FROM right_word WHERE user_id=$d");

	
}








print"

<html>

<head>
<title> Edit Wrong Word </title>
";


include_once('style_new.php');


print"
</head>


<body>
";


print"
<table align='center' width='100%' cellpadding='10' cellspacing='0' height='50' bgcolor='#9260F6'>
<tr> 
<td align='left'> <a href='index5.php'> <font color='white'> Home  </font></a> </td>

<td align='right'>  <font color='white'> Hi  $go_new    &nbsp; | &nbsp; </font> <a href='index.php'> <font color='white'> Logout </font> </a>  &nbsp;&nbsp; </td>


</tr>
</table>




<table align='center' width='100%' cellpadding='4' cellspacing='0' height='50' bgcolor='gray'>
<tr> 
<td align='center' width='10%' height='800' bgcolor='#38363C' valign='top'>

<table align='center' width='100%' cellpadding='0' cellspacing='0' height='50' bgcolor=''>


<tr>
<td height='30'></td>
</tr>



<tr>
<td height='15'></td>
</tr>



<tr>
<td><a href='upload.php'> <font color='white' size='2' face='arial'>   Upload  </font></a> 
</td>
</tr>


<tr>
<td height='15'></td>
</tr>



<tr>
<td><a href='index5.php'> <font color='white' size='2' face='arial'> Ad Word  </font></a> 
</td>
</tr>


<tr>
<td height='15'></td>
</tr>



<tr>
<td><a href='index6.php'> <font color='white' size='2' face='arial'> Edit Word  </font></a> 
</td>
</tr>


<tr>
<td height='15'></td>
</tr>



<tr>
<td><a href='backup.php'> <font color='white' size='2' face='arial'>   Backup  </font></a> 
</td>
</tr>



</table>

</td>





<td align='center' width='90%' bgcolor='#F2F2F2' valign='top'> 




<table align='center' width='900' cellpadding='0' cellspacing='0'>
<tr> <td align='center' height='28'>  <font face='arial' color='black' size='2'> <b> Edit Wrong To Right Word   </b> </font> </td> </tr>
</table>


<br>
<br>






<form action='index6.php' method='POST'>


<table align='center' width='900' cellpadding='0' cellspacing='0'>
<tr> <td align='center' height='38' bgcolor='white'>  




<font face='arial' color='black' size='2'> 
<b>
Word Search :
</b>

<input type='text' name='word_search' value='$word_search' size='20'>

&nbsp;&nbsp;

<b> Select Page :  </font> 

<select name='page'>
<option>$page<option>
";

for($i=1;$i<=100;$i++)
{
print"
<option>$i</option>
";
}

print"
</select>


&nbsp;&nbsp;&nbsp;


<font face='arial' color='black' size='2'> <b> Select Button :   </font>

<select name='but'>
<option>$but<option>
";

for($i=1;$i<=13;$i++)
{
print"
<option>$i</option>
";
}



print"
<option value='20'> Bijoy to Unicode </option>
";


print"
<option value='21'>   Unicode to Bijoy </option>
";


print"
</select>


&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;


<input type='submit' value='Search'>


</b> </font> </td> </tr>
</table>

</form>


<br>


<table align='center' width='900' cellpadding='1' cellspacing='1' bgcolor='EFEBEB'>




<tr bgcolor='gray' height='40'> 
     <td  bgcolor='' align='center' height='0' width=''> <font face='arial' size='2'> Wrong </font> </td>
     <td align='center' width=''> <font face='arial' size='2'> Right </font> </td>
        <td align='center' width=''> <font face='arial' size='2'> Button </font> </td>  
     
	 <td align='center' width=''> <font face='arial' size='2'> Edit </font> </td>
	 
	 ";
	 
	 if($user_name1=="superadmin")
{
	 print"
	 <td align='center' width=''> <font face='arial' size='2'> Delete </font> </td>
	 ";
}
	 
print"
</tr>
";


$d=11;

//$result = mysql_query("SELECT * FROM product_category");


if($word_search=="")
{
$result = mysqli_query($con_db,"SELECT * FROM `right_word`  where button='$but' ORDER BY `user_id` ASC  LIMIT 0 , 6000000 ");
}

else
{
$result = mysqli_query($con_db,"SELECT * FROM `right_word`  where wrong='$word_search' || right_w='$word_search' ORDER BY `user_id` ASC  LIMIT 0 , 6000000 ");
    
}


while ($a_row = mysqli_fetch_row($result)) {

	foreach ($a_row as $field) {
		
	}


print"
<tr bgcolor='white' height='40'> 

<form action='index6.php' method='POST'>
     <td  bgcolor='' align='center' height='0' width='180'> <font face='arial' size='2'> <input type='text' name='wrong' value='$a_row[1]' size='30'>  </font> </td>
     <td align='center' width='180'> <font face='arial' size='2'> <input type='text' name='right' value='$a_row[2]' size='30'> </font> </td> 
	 
     <td align='center' width='180'> <font face='arial' size='2'> <input type='text' name='button' value='$a_row[3]' size='10'> </font> </td> 
	 	 
		
	 <td align='center' width='70'> 
	 <input type='hidden' name='ser' value='10'>
	 <input type='hidden' name='s' value='$a_row[0]'>
	 <font face='arial' size='2'> <input type='submit' value='Edit'> </font>


	 </td>
	 </form>
	 
";

	 if($user_name1=="superadmin")
{
print"
	 <td align='center' width='70'> <a onClick=\"javascript: return confirm('Are you confirm to delete Please Call 01686797756');\" href=\"index6.php?dell=".$a_row[0]."\"> <div id='del'><font face='arial' size='2'> Delete  </font> </div>  </a> </td>
	 ";
	 
}
	 
print"
</tr>
";


}









print"
<tr> <td align='center' height='30' bgcolor=''>   </td> <td> </td> </tr>

</table>





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