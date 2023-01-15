<?php
include_once('dbconnection.php');
print"

<html>

<head>
<title> Find Due </title>
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

<tr> <td height='5'> </td></tr>


<tr> <td height='30' width='200' bgcolor='green'>   <span id='child'> <b> <font color='white'> Find Due </font> </b> </span>  </td></tr>

<tr> <td height='7'> </td></tr>
";

if($advance100==100)
{
print"
<tr> <td height='30' width='200' bgcolor='C5B577'  onMouseOver=\"this.bgColor='96884F'\" onMouseOut=\"this.bgColor='C5B577'\" align='left' id='button2'>  <a href='customer_advance.php' target='a_blank'> <div id='child'> Customer Advance List </div> </a> </td></tr>
<tr> <td height='7'> </td></tr>
";
}


print"
<tr> <td height='30' width='200' bgcolor='C5B577'  onMouseOver=\"this.bgColor='96884F'\" onMouseOut=\"this.bgColor='C5B577'\" align='left' id='button2'>  <a href='customer_due.php' target='a_blank'> <div id='child'> Customer Due List </div> </a> </td></tr>

<tr> <td height='7'> </td></tr>
";



if($advance100==100)
{

print"
<tr> <td height='30' width='200' align='left' id='button2' bgcolor='C5B577'  onMouseOver=\"this.bgColor='96884F'\" onMouseOut=\"this.bgColor='C5B577'\" >  <a href='supplier_advance_list.php' target='_blank'><div id='child'> Supplier Advance List </div> </a> </td></tr>
<tr> <td height='7'> </td></tr>
";
}


print"
<tr> <td height='30' width='200' align='left' id='button2' bgcolor='C5B577'  onMouseOver=\"this.bgColor='96884F'\" onMouseOut=\"this.bgColor='C5B577'\" >  <a href='supplier_due.php' target='_blank'><div id='child'> Supplier Due List </div> </a> </td></tr>
<tr> <td height='7'> </td></tr>
";

print"
<tr> <td height='30' width='200' align='left' id='button2' bgcolor='C5B577'  onMouseOver=\"this.bgColor='96884F'\" onMouseOut=\"this.bgColor='C5B577'\" >  <a href='bank_balance.php' target='_blank'><div id='child'> Bank Balance  </div> </a> </td></tr>
<tr> <td height='7'> </td></tr>
";



print"
<tr> <td height='30' width='200' align='left' id='button2' bgcolor='C5B577'  onMouseOver=\"this.bgColor='96884F'\" onMouseOut=\"this.bgColor='C5B577'\" >  <a href='pf_due.php' target='_blank'><div id='child'> Provident Fund Due List </div> </a> </td></tr>
<tr> <td height='7'> </td></tr>
";

/*

<tr> <td height='30' width='200'  align='left' id='button2' bgcolor='C5B577'  onMouseOver=\"this.bgColor='96884F'\" onMouseOut=\"this.bgColor='C5B577'\" >  <a href='payment_due.php' target='_blank'> <div id='child'> Payment Ledger Due </div> </a> </td></tr>

<tr> <td height='7'> </td></tr>

";



<tr> <td height='30' width='200' align='left' id='button2' bgcolor='C5B577'  onMouseOver=\"this.bgColor='96884F'\" onMouseOut=\"this.bgColor='C5B577'\" > &nbsp;&nbsp;&nbsp; <a href='#'> <span id='child'> Receipt Laser Due </span> </a> </td></tr>

<tr> <td height='7'> </td></tr>
*/

print"


</table>


</td>
















<td align='center' valign='top' width='980'>  </td>


</tr>
</table>




</body>

</html>


";


?>