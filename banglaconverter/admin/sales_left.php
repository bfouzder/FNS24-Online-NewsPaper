<?php
print"
<tr> <td height='30' width='200' bgcolor='C5B577'  onMouseOver=\"this.bgColor='96884F'\" onMouseOut=\"this.bgColor='C5B577'\" align='left' id='button2'>  <a href='sales.php'> <div id='child'> Sales Invoice </div> </a> </td></tr>

<tr> <td height='7'> </td></tr>
";




print"
<tr> <td height='30' width='200' align='left' id='button2' bgcolor='C5B577'  onMouseOver=\"this.bgColor='96884F'\" onMouseOut=\"this.bgColor='C5B577'\" >  <a href='sales_return.php'><div id='child'> Sales Return Invoice </div> </a> </td></tr>
<tr> <td height='7'> </td></tr>
";



print"
<tr> <td height='30' width='200' align='left' id='button2' bgcolor='C5B577'  onMouseOver=\"this.bgColor='96884F'\" onMouseOut=\"this.bgColor='C5B577'\" >  <a href='daily_sales.php' target='_blank'><div id='child'> All Sales View  </div> </a> </td></tr>
<tr> <td height='7'> </td></tr>
";



print"
<tr> <td height='30' width='200' align='left' id='button2' bgcolor='C5B577'  onMouseOver=\"this.bgColor='96884F'\" onMouseOut=\"this.bgColor='C5B577'\" >  <a href='daily_sales_return.php' target='_blank'><div id='child'> All Sales Return View  </div> </a> </td></tr>
<tr> <td height='7'> </td></tr>
";




print"
<tr> <td height='30' width='200' align='left' id='button2' bgcolor='C5B577'  onMouseOver=\"this.bgColor='96884F'\" onMouseOut=\"this.bgColor='C5B577'\" >  <a href='billtocollection2.php'><div id='child'> Sales Bill To Bill Collection  </div> </a> </td></tr>
<tr> <td height='7'> </td></tr>
";




if($advance100==100)
{
print"
<tr> <td height='30' width='200' align='left' id='button2' bgcolor='C5B577'  onMouseOver=\"this.bgColor='96884F'\" onMouseOut=\"this.bgColor='C5B577'\" >  <a href='customer_refill_advance2.php'><div id='child'> Sales Advance Receive  </div> </a> </td></tr>
<tr> <td height='7'> </td></tr>
";
}



print"
<tr> <td height='30' width='200' align='left' id='button2' bgcolor='C5B577'  onMouseOver=\"this.bgColor='96884F'\" onMouseOut=\"this.bgColor='C5B577'\" >  <a href='customer_refill2.php'><div id='child'> Sales Due Collection  </div> </a> </td></tr>
<tr> <td height='7'> </td></tr>
";







print"
</table>


</td>
";

?>