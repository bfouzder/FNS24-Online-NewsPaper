<?php
print"
<tr> <td height='25' width='200' bgcolor='C5B577'  onMouseOver=\"this.bgColor='96884F'\" onMouseOut=\"this.bgColor='C5B577'\" align='left' id='button2'>  <a href='purchase.php'> <div id='child'> Purchase Invoice </div> </a> </td></tr>
<tr> <td height='7'> </td></tr>
";



print"
<tr> <td height='25' width='200' align='left' id='button2' bgcolor='C5B577'  onMouseOver=\"this.bgColor='96884F'\" onMouseOut=\"this.bgColor='C5B577'\" >  <a href='purchase_return.php'><div id='child'> Purchase Return Invoice </div> </a> </td></tr>
<tr> <td height='7'> </td></tr>
";




print"
<tr> <td height='25' width='200' align='left' id='button2' bgcolor='C5B577'  onMouseOver=\"this.bgColor='96884F'\" onMouseOut=\"this.bgColor='C5B577'\" >  <a href='daily_purchase.php' target='_blank'><div id='child'> All Purchase View </div> </a> </td></tr>
<tr> <td height='7'> </td></tr>
";






print"
<tr> <td height='25' width='200' align='left' id='button2' bgcolor='C5B577'  onMouseOver=\"this.bgColor='96884F'\" onMouseOut=\"this.bgColor='C5B577'\" >  <a href='daily_purchase_return.php' target='_blank'><div id='child'> All Purchase Return View </div> </a> </td></tr>
<tr> <td height='7'> </td></tr>
";





print"
<tr> <td height='25' width='200' align='left' id='button2' bgcolor='C5B577'  onMouseOver=\"this.bgColor='96884F'\" onMouseOut=\"this.bgColor='C5B577'\" >  <a href='billtopayment2.php' ><div id='child'> Bill To Bill Payment </div> </a> </td></tr>
<tr> <td height='7'> </td></tr>
";




if($advance100==100)
{
print"
<tr> <td height='25' width='200' align='left' id='button2' bgcolor='C5B577'  onMouseOver=\"this.bgColor='96884F'\" onMouseOut=\"this.bgColor='C5B577'\" >  <a href='supplier_advance2.php' ><div id='child'> Purchase Advance Payment </div> </a> </td></tr>
<tr> <td height='7'> </td></tr>
";
}



print"
<tr> <td height='25' width='200' align='left' id='button2' bgcolor='C5B577'  onMouseOver=\"this.bgColor='96884F'\" onMouseOut=\"this.bgColor='C5B577'\" >  <a href='supplier_refill2.php'><div id='child'>  Purchase Due Payment </div> </a> </td></tr>
<tr> <td height='7'> </td></tr>
";










print"

</table>


</td>
";

?>