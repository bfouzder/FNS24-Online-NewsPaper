<?php
include_once('dbconnection.php');
print"

<html>

<head>
<title> Refill </title>
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


<tr> <td height='30' width='200' bgcolor='green'>   <span id='child'> <b> <font color='white'> Payment / Collection </font> </b> </span>  </td></tr>

<tr> <td height='7'> </td></tr>

";


include_once('refill_left.php');





print"
</td>
















<td align='center' valign='top' width='980'>  </td>


</tr>
</table>




</body>

</html>


";


?>