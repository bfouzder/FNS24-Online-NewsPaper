<?php




if($pas_type==2)
{

print"
<tr> <td height='30' width='200' align='left' id='button2' bgcolor='C5B577'  onMouseOver=\"this.bgColor='96884F'\" onMouseOut=\"this.bgColor='C5B577'\" >  <a href='billtocollection.php'><div id='child'> Bill To Bill Collection </div> </a> </td></tr>
<tr> <td height='7'> </td></tr>
";

if($advance100==100)
{
print"
<tr> <td height='30' width='200' align='left' id='button2' bgcolor='C5B577'  onMouseOver=\"this.bgColor='96884F'\" onMouseOut=\"this.bgColor='C5B577'\" >  <a href='customer_refill_advance.php'><div id='child'> Customer Advance  Collection </div> </a> </td></tr>
<tr> <td height='7'> </td></tr>
";
}


print"
<tr> <td height='30' width='200' align='left' id='button2' bgcolor='C5B577'  onMouseOver=\"this.bgColor='96884F'\" onMouseOut=\"this.bgColor='C5B577'\" >  <a href='customer_refill.php'><div id='child'> Customer Due Collection </div> </a> </td></tr>
<tr> <td height='7'> </td></tr>
";





}
 



if($user_name1=="superadmin" || $pas_type==1)
{




print"
<tr> <td height='30' width='200' align='left' id='button2' bgcolor='C5B577'  onMouseOver=\"this.bgColor='96884F'\" onMouseOut=\"this.bgColor='C5B577'\" >  <a href='billtocollection.php'><div id='child'> Bill To Bill Collection </div> </a> </td></tr>
<tr> <td height='7'> </td></tr>
";



if($advance100==100)
{

print"
<tr> <td height='30' width='200' align='left' id='button2' bgcolor='C5B577'  onMouseOver=\"this.bgColor='96884F'\" onMouseOut=\"this.bgColor='C5B577'\" >  <a href='customer_refill_advance.php'><div id='child'> Customer Advance  Collection </div> </a> </td></tr>
<tr> <td height='7'> </td></tr>
";
}


print"
<tr> <td height='30' width='200' align='left' id='button2' bgcolor='C5B577'  onMouseOver=\"this.bgColor='96884F'\" onMouseOut=\"this.bgColor='C5B577'\" >  <a href='customer_refill.php'><div id='child'> Customer Due Collection </div> </a> </td></tr>
<tr> <td height='7'> </td></tr>
";







print"
<tr> <td height='30' width='200' align='left' id='button2' bgcolor='C5B577'  onMouseOver=\"this.bgColor='96884F'\" onMouseOut=\"this.bgColor='C5B577'\" >  <a href='billtopayment.php'><div id='child'> Bill To Bill Payment </div> </a> </td></tr>
<tr> <td height='7'> </td></tr>
";


if($advance100==100)
{

print"
<tr> <td height='30' width='200' align='left' id='button2' bgcolor='C5B577'  onMouseOver=\"this.bgColor='96884F'\" onMouseOut=\"this.bgColor='C5B577'\" >  <a href='supplier_advance.php'><div id='child'> Supplier Advance Payment  </div> </a> </td></tr>
<tr> <td height='7'> </td></tr>
";
}




print"
<tr> <td height='30' width='200'  align='left' id='button2' bgcolor='C5B577'  onMouseOver=\"this.bgColor='96884F'\" onMouseOut=\"this.bgColor='C5B577'\" >  <a href='supplier_refill.php'> <div id='child'> Supplier Due Payment </div> </a> </td></tr>

<tr> <td height='7'> </td></tr>

<tr> <td height='30' width='200' bgcolor='C5B577'  onMouseOver=\"this.bgColor='96884F'\" onMouseOut=\"this.bgColor='C5B577'\" align='left' id='button2'>  <a href='bank_refill.php'> <div id='child'> Bank </div> </a> </td></tr>
<tr> <td height='7'> </td></tr>



<tr> <td height='30' width='200' bgcolor='C5B577'  onMouseOver=\"this.bgColor='96884F'\" onMouseOut=\"this.bgColor='C5B577'\" align='left' id='button2'>  <a href='bank_transfer.php'> <div id='child'> Bank To Bank Transfer  </div> </a> </td></tr>
<tr> <td height='7'> </td></tr>

";



print"
<tr> <td height='30' width='200' align='left' id='button2' bgcolor='C5B577'  onMouseOver=\"this.bgColor='96884F'\" onMouseOut=\"this.bgColor='C5B577'\" >  <a href='rcost_entry.php'><div id='child'> Others Income Collection </div> </a> </td></tr>
<tr> <td height='7'> </td></tr>
";

}


print"
</table>


</td>
";

?>