<?php

if($user_name1=="superadmin" || $pas_type==1)
{
	
	
	if($g_1==1)
	{
print"
<tr> <td height='30' width='200' bgcolor='C5B577'  onMouseOver=\"this.bgColor='96884F'\" onMouseOut=\"this.bgColor='C5B577'\" align='left' id='button2'>  <a href='ecreate_godawn.php'> <div id='child'> Edit Branch / Godawn  </div> </a> </td></tr>
<tr> <td height='7'> </td></tr>
";
	}


print"
<tr> <td height='30' width='200' bgcolor='C5B577'  onMouseOver=\"this.bgColor='96884F'\" onMouseOut=\"this.bgColor='C5B577'\" align='left' id='button2'>  <a href='eproduct_category.php'> <div id='child'> Edit Product Category </div> </a> </td></tr>
<tr> <td height='7'> </td></tr>


<tr> <td height='30' width='200' bgcolor='C5B577'  onMouseOver=\"this.bgColor='96884F'\" onMouseOut=\"this.bgColor='C5B577'\" align='left' id='button2'>  <a href='eproduct_sub_category.php'> <div id='child'> Edit Product Sub Category </div> </a> </td></tr>

<tr> <td height='7'> </td></tr>


<tr> <td height='30' width='200' align='left' id='button2' bgcolor='C5B577'  onMouseOver=\"this.bgColor='96884F'\" onMouseOut=\"this.bgColor='C5B577'\" >  <a href='eproduct_type.php'><div id='child'> Edit Product Unit Name </div> </a> </td></tr>

<tr> <td height='7'> </td></tr>

<tr> <td height='30' width='200' align='left' id='button2' bgcolor='C5B577'  onMouseOver=\"this.bgColor='96884F'\" onMouseOut=\"this.bgColor='C5B577'\" >  <a href='eproduct_name.php'><div id='child'> Edit Product Name </div> </a> </td></tr>

<tr> <td height='7'> </td></tr>





<tr> <td height='30' width='200' align='left' id='button2' bgcolor='C5B577'  onMouseOver=\"this.bgColor='96884F'\" onMouseOut=\"this.bgColor='C5B577'\" >  <a href='eproduct_name_group.php'><div id='child'> Edit Product Name [Group] </div> </a> </td></tr>

<tr> <td height='7'> </td></tr>


<tr> <td height='30' width='200' align='left' id='button2' bgcolor='C5B577'  onMouseOver=\"this.bgColor='96884F'\" onMouseOut=\"this.bgColor='C5B577'\" >  <a href='eproduct_name_sub.php'><div id='child'> Edit Product Name All(Sub)  </div> </a> </td></tr>

<tr> <td height='7'> </td></tr>




<tr> <td height='30' width='200'  align='left' id='button2' bgcolor='C5B577'  onMouseOver=\"this.bgColor='96884F'\" onMouseOut=\"this.bgColor='C5B577'\" >  <a href='ecreate_area.php'> <div id='child'> Edit Area Name </div> </a> </td></tr>

<tr> <td height='7'> </td></tr>







<tr> <td height='30' width='200'  align='left' id='button2' bgcolor='C5B577'  onMouseOver=\"this.bgColor='96884F'\" onMouseOut=\"this.bgColor='C5B577'\" >  <a href='ecustomer.php'> <div id='child'> Edit Customer Name </div> </a> </td></tr>

<tr> <td height='7'> </td></tr>


<tr> <td height='30' width='200'  align='left' id='button2' bgcolor='C5B577'  onMouseOver=\"this.bgColor='96884F'\" onMouseOut=\"this.bgColor='C5B577'\" >  <a href='ecustomer_search.php'> <div id='child'> Edit Search By Customer Name </div> </a> </td></tr>

<tr> <td height='7'> </td></tr>


";



print"
<tr> <td height='30' width='200'  align='left' id='button2' bgcolor='C5B577'  onMouseOver=\"this.bgColor='96884F'\" onMouseOut=\"this.bgColor='C5B577'\" >  <a href='econtact.php'> <div id='child'> Edit Sales Person  </div> </a> </td></tr>
<tr> <td height='7'> </td></tr>
";


print"
<tr> <td height='30' width='200'  align='left' id='button2' bgcolor='C5B577'  onMouseOver=\"this.bgColor='96884F'\" onMouseOut=\"this.bgColor='C5B577'\" >  <a href='econtact1.php'> <div id='child'> Edit Receiver Person  </div> </a> </td></tr>
<tr> <td height='7'> </td></tr>
";


}


if($pas_type==2)
{
	
print"
<tr> <td height='7'> </td></tr>
<tr> <td height='30' width='200'  align='left' id='button2' bgcolor='C5B577'  onMouseOver=\"this.bgColor='96884F'\" onMouseOut=\"this.bgColor='C5B577'\" >  <a href='ecustomer.php'> <div id='child'> Edit Customer Name </div> </a> </td></tr>

<tr> <td height='7'> </td></tr>
";	
	
	
	
print"
<tr> <td height='30' width='200' align='left' id='button2' bgcolor='C5B577'  onMouseOver=\"this.bgColor='96884F'\" onMouseOut=\"this.bgColor='C5B577'\" >  <a href='ecreate_password.php'> <div id='child'> Edit Account </div> </a></td></tr>

<tr> <td height='3'> </td></tr>
";
}




if($user_name1=="superadmin" || $pas_type==1)
{
print"
<tr> <td height='30' width='200' align='left' id='button2' bgcolor='C5B577'  onMouseOver=\"this.bgColor='96884F'\" onMouseOut=\"this.bgColor='C5B577'\" >  <a href='esupplier.php'> <div id='child'> Edit Supplier Name </div> </a> </td></tr>

<tr> <td height='7'> </td></tr>




<tr> <td height='30' width='200' align='left' id='button2' bgcolor='C5B577'  onMouseOver=\"this.bgColor='96884F'\" onMouseOut=\"this.bgColor='C5B577'\" >  <a href='epayment_laser.php'> <div id='child'> Edit Payment Ledger </div> </a> </td></tr>
<tr> <td height='7'> </td></tr>
";



/*
<tr> <td height='30' width='200'  align='left' id='button2' bgcolor='C5B577'  onMouseOver=\"this.bgColor='96884F'\" onMouseOut=\"this.bgColor='C5B577'\" >  <a href='ereceipt_laser.php'> <div id='child'> Receipt Ledger </div> </a> </td></tr>
<tr> <td height='7'> </td></tr>
*/





print"
<tr> <td height='30' width='200' align='left' id='button2' bgcolor='C5B577'  onMouseOver=\"this.bgColor='96884F'\" onMouseOut=\"this.bgColor='C5B577'\" >  <a href='eexpendature_head.php'> <div id='child'> Edit Expenditure Head </div> </a> </td></tr>

<tr> <td height='7'> </td></tr>



<tr> <td height='30' width='200' align='left' id='button2' bgcolor='C5B577'  onMouseOver=\"this.bgColor='96884F'\" onMouseOut=\"this.bgColor='C5B577'\" >  <a href='eexpendature_sub.php'> <div id='child'> Edit Expenditure Sub Head </div> </a></td></tr>

<tr> <td height='7'> </td></tr>
";










print"
<tr> <td height='30' width='200'  align='left' id='button2' bgcolor='C5B577'  onMouseOver=\"this.bgColor='96884F'\" onMouseOut=\"this.bgColor='C5B577'\" >  <a href='ereceipt_laser.php'> <div id='child'> Edit Others Income Ledger </div> </a> </td></tr>
<tr> <td height='7'> </td></tr>
";


print"
<tr> <td height='30' width='200' align='left' id='button2' bgcolor='C5B577'  onMouseOver=\"this.bgColor='96884F'\" onMouseOut=\"this.bgColor='C5B577'\" >  <a href='reexpendature_head.php'> <div id='child'> Edit Receipt Collection Head </div> </a> </td></tr>
<tr> <td height='7'> </td></tr>



<tr> <td height='30' width='200' align='left' id='button2' bgcolor='C5B577'  onMouseOver=\"this.bgColor='96884F'\" onMouseOut=\"this.bgColor='C5B577'\" >  <a href='reexpendature_sub.php'> <div id='child'> Edit  Receipt Sub Head </div> </a></td></tr>
<tr> <td height='7'> </td></tr>
";













if($s_sheet==1)
{
print"
<tr> <td height='30' width='200' align='left' id='button2' bgcolor='C5B577'  onMouseOver=\"this.bgColor='96884F'\" onMouseOut=\"this.bgColor='C5B577'\" >  <a href='edit_employee.php'> <div id='child'> Edit Employee Profile </div> </a></td></tr>
<tr> <td height='7'> </td></tr>


<tr> <td height='30' width='200' align='left' id='button2' bgcolor='C5B577'  onMouseOver=\"this.bgColor='96884F'\" onMouseOut=\"this.bgColor='C5B577'\" >  <a href='esalary_sheet.php' target='_blank'> <div id='child'> Edit Salary Sheet </div> </a></td></tr>
<tr> <td height='7'> </td></tr>
";
}

/*
<tr> <td height='30' width='200' align='left' id='button2' bgcolor='C5B577'  onMouseOver=\"this.bgColor='96884F'\" onMouseOut=\"this.bgColor='C5B577'\" >  <a href='reexpendature_head.php'> <div id='child'> Receipt Collection Head </div> </a> </td></tr>
<tr> <td height='7'> </td></tr>



<tr> <td height='30' width='200' align='left' id='button2' bgcolor='C5B577'  onMouseOver=\"this.bgColor='96884F'\" onMouseOut=\"this.bgColor='C5B577'\" >  <a href='reexpendature_sub.php'> <div id='child'> Receipt Sub Head </div> </a></td></tr>
<tr> <td height='7'> </td></tr>
*/



print"
<tr> <td height='30' width='200' align='left' id='button2' bgcolor='C5B577'  onMouseOver=\"this.bgColor='96884F'\" onMouseOut=\"this.bgColor='C5B577'\" >  <a href='ebank.php'> <div id='child'> Edit Bank Account </div> </a></td></tr>

<tr> <td height='7'> </td></tr>
";



print"
<tr> <td height='30' width='200' align='left' id='button2' bgcolor='C5B577'  onMouseOver=\"this.bgColor='96884F'\" onMouseOut=\"this.bgColor='C5B577'\" >  <a href='ecreate_password.php'> <div id='child'> Edit Account </div> </a></td></tr>
<tr> <td height='3'> </td></tr>
";







/*
print"
<tr> <td height='30' width='200' align='left' id='button2' bgcolor='C5B577'  onMouseOver=\"this.bgColor='96884F'\" onMouseOut=\"this.bgColor='C5B577'\" >  <a href='daily_purchase.php' target='_blank'> <div id='child'> Edit Purchase  </div> </a></td></tr>
<tr> <td height='3'> </td></tr>
";


print"
<tr> <td height='30' width='200' align='left' id='button2' bgcolor='C5B577'  onMouseOver=\"this.bgColor='96884F'\" onMouseOut=\"this.bgColor='C5B577'\" >  <a href='daily_sales.php' target='_blank'> <div id='child'> Edit Sales  </div> </a></td></tr>
<tr> <td height='3'> </td></tr>
";




print"
<tr> <td height='30' width='200' align='left' id='button2' bgcolor='C5B577'  onMouseOver=\"this.bgColor='96884F'\" onMouseOut=\"this.bgColor='C5B577'\" >  <a href='challan_view.php' target='_blank'> <div id='child'> Edit Challan  </div> </a></td></tr>
<tr> <td height='3'> </td></tr>
";




print"
<tr> <td height='30' width='200' align='left' id='button2' bgcolor='C5B577'  onMouseOver=\"this.bgColor='96884F'\" onMouseOut=\"this.bgColor='C5B577'\" >  <a href='challan_view_q.php' target='_blank'> <div id='child'> Edit Quotation  </div> </a></td></tr>
<tr> <td height='3'> </td></tr>
";
*/


print"
<tr> <td height='30' width='200' align='left' id='button2' bgcolor='C5B577'  onMouseOver=\"this.bgColor='96884F'\" onMouseOut=\"this.bgColor='C5B577'\" >  <a href='edit_cash_book.php' target='_blank'> <div id='child'> Edit Opening Cash Book  </div> </a></td></tr>
<tr> <td height='3'> </td></tr>
";




}


print"

</table>


</td>
";

?>