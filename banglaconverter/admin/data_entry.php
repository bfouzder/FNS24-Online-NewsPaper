<?php
include_once('dbconnection.php');



$ser=trim($_POST['ser']);

$wrong=trim($_POST['wrong']);
$right=trim($_POST['right']);
$button=trim($_POST['button']);







if($ser==1)
{
	
$a=0;

if($wrong=="" && a==0)
{
include_once('w.php');
$a=1;
}




if($a==0)
{
	
	
	
$sql = "INSERT INTO `right_word` (`user_id`, `wrong`, `right_w`, `button`) VALUES ('','$wrong','$right','$button')";
mysql_query($sql);


include_once('s.php');

}


}





print"

<html>

<head>
<title> Data Entry Wrong Word </title>
";


include_once('style.php');


print"
</head>


<body>
";



include_once('header.php');


include_once('ppp.php');



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

<form action='data_entry.php' method='POST'>


<table align='center' width='400' cellpadding='0' cellspacing='0'>
<tr> <td height='100'>  </td> </tr>
</table>








<table align='center' width='600' cellpadding='0' cellspacing='0' bgcolor='EFEBEB' border='0'>





<tr> <td height='20'> </td> </tr>





<tr>
<td align='center' height='30' bgcolor='' width='200'> <font face='arial' size='4'> Wrong </font>   </td> 
<td align='center' width='200'> <font face='arial' size='4'> Right  </font></td> 
<td align='center' width='100'> <font face='arial' size='4'> Button </font> </td> 
</tr>




<tr> <td height='10'> </td> </tr>



<tr> 
     <td  bgcolor='' align='right' height='0'>
     <input type='text'  name='wrong' size='25'>  </td>
     <td align='center'> 
     
     <input type='text'  name='right' size='25'> </td> 
     
          <td align='center'> 
          
          <input type='text'  name='button' size='5'> </td> 
          
</tr>



<tr> <td height='20'> </td> </tr>









<tr> 
     <td height='20' bgcolor='' align='right' valign='top'>   </td>
     <td align='left'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

<input type='hidden'  name='ser' value='1'>

<input type='hidden'  name='pas' value='$pas'>

 <input type='Submit' id='qq' value='Save'>  


</td> 


<td> </td>


</tr>
</tr>



<tr> <td align='center' height='30' bgcolor=''>   </td> <td> </td> </tr>

</table>








</form>




</td>


</tr>
</table>




</body>

</html>


";


?>