<?php
include_once('dbconnection.php');
session_start();


if($ser=="")
{
$bbb=time(); 
$d=date("m/d/y",$bbb); 
$mon="$d[0]$d[1]";
$dat="$d[3]$d[4]";
$yer="20$d[6]$d[7]";

$mdate="$yer$mon$dat";

}




print"

<html>

<head>
<title> Sales </title>
<base target='_parent' /> 
";

//<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
?>






  <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  
  
  <script src="jquery-1.10.2.js"></script>
  <script src="jquery-ui.js"></script>
  <link rel="stylesheet" href="/resources/demos/style.css">


  
<script language='javascript'>


function ree()
{
document.fu.submit();	
}

</script>





<?php


include_once('style.php');

include_once('jw.php');


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


<tr> <td height='30' width='200' bgcolor='green'> &nbsp;&nbsp;&nbsp;  <span id='child'> <b> <font color='white'> Purchase </font> </b> </span>  </td></tr>

<tr> <td height='7'> </td></tr>





";


include_once('sales_left.php');


print"



<td align='center' valign='top' width='980'>  


<form action='chalan_print.php' method='POST' target='a_blank'>

<table align='center' width='950' cellpadding='0' cellspacing='0' bgcolor='F2F2F2'>
<tr> <td height='30' align='center'> <font size='4' face='arial' color='blue'> Create Chalan  </font> </td> </tr>
</table>




<br><br>



<table align='center' width='950' cellpadding='0' cellspacing='0' bgcolor='F2F2F2'>

<tr> <td height='60'> </td> </tr>

<tr> <td height='30' align='center'> <font size='4' face='arial' color='blue'> 


<textarea rows='15' cols='40' id='elm1' name='chalan'> </textarea>




  </font> </td> </tr>

  
  <tr> <td align='center' height='40'> <input type='submit' value='Save & Print'> </td> </tr>
  
  </table>



</td>
</tr>

</table>

</form>

";






















print"

</td>


</tr>
</table>




</body>

</html>


";


?>