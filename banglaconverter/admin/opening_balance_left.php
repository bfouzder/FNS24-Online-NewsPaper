<?php

print"

<td align='center' valign='top' width='220' bgcolor='#C5B991'>  




<table align='center' width='200' cellpadding='0' cellspacing='0' height=''>

<tr> <td height='10'> </td></tr>


<tr> <td height='30' width='200' bgcolor='green'>   <div id='child'> <b> <font color='white' size='2'> Opening Balance Entry </font> </b> </div>  </td></tr>

<tr> <td height='7'> </td></tr>


<tr> <td height='30' width='200' align='left' id='button2' bgcolor='C5B577'  onMouseOver=\"this.bgColor='96884F'\" onMouseOut=\"this.bgColor='C5B577'\" >  <a href='opening_supplier.php'> <div id='child'> Supplier </div> </a> </td></tr>
<tr> <td height='7'> </td></tr>


<tr> <td height='30' width='200'  align='left' id='button2' bgcolor='C5B577'  onMouseOver=\"this.bgColor='96884F'\" onMouseOut=\"this.bgColor='C5B577'\" >  <a href='opening_customer.php'> <div id='child'> Customer </div> </a> </td></tr>
<tr> <td height='7'> </td></tr>
";


if($advance100==100)
{
print"
<tr> <td height='30' width='200'  align='left' id='button2' bgcolor='C5B577'  onMouseOver=\"this.bgColor='96884F'\" onMouseOut=\"this.bgColor='C5B577'\" >  <a href='opening_customer_advance.php'> <div id='child'> Customer Advance </div> </a> </td></tr>
<tr> <td height='7'> </td></tr>


<tr> <td height='30' width='200'  align='left' id='button2' bgcolor='C5B577'  onMouseOver=\"this.bgColor='96884F'\" onMouseOut=\"this.bgColor='C5B577'\" >  <a href='opening_supplier_advance.php'> <div id='child'> Supplier Advance </div> </a> </td></tr>
<tr> <td height='7'> </td></tr>
";
}



print"
<tr> <td height='30' width='200' align='left' id='button2' bgcolor='C5B577'  onMouseOver=\"this.bgColor='96884F'\" onMouseOut=\"this.bgColor='C5B577'\" >  <a href='opening_payment.php'> <div id='child'> Payment Ledger </div> </a> </td></tr>

<tr> <td height='7'> </td></tr>



<tr> <td height='30' width='200'  align='left' id='button2' bgcolor='C5B577'  onMouseOver=\"this.bgColor='96884F'\" onMouseOut=\"this.bgColor='C5B577'\" >  <a href='opening_cash_book.php'> <div id='child'> Cash Book </div> </a> </td></tr>

<tr> <td height='7'> </td></tr>




<tr> <td height='30' width='200' align='left' id='button2' bgcolor='C5B577'  onMouseOver=\"this.bgColor='96884F'\" onMouseOut=\"this.bgColor='C5B577'\" >  <a href='opening_bank.php'> <div id='child'> Bank </div> </a></td></tr>
<tr> <td height='3'> </td></tr>


<tr> <td height='30' width='200' align='left' id='button2' bgcolor='C5B577'  onMouseOver=\"this.bgColor='96884F'\" onMouseOut=\"this.bgColor='C5B577'\" >  <a href='opening_receipt.php'> <div id='child'> Others Income </div> </a></td></tr>
<tr> <td height='3'> </td></tr>


";


print"
<tr> <td height='30' width='200' align='left' id='button2' bgcolor='C5B577'  onMouseOver=\"this.bgColor='96884F'\" onMouseOut=\"this.bgColor='C5B577'\" >  <a href='pf.php'> <div id='child'> PF FUND </div> </a></td></tr>
<tr> <td height='3'> </td></tr>
";

print"
</table>


</td>
";


?>