<?php
print"
<td align='center' valign='top' width='220' bgcolor='#C5B991'>  
<table align='center' width='200' cellpadding='0' cellspacing='0' height=''>
<tr> <td height='10'> </td></tr>


<tr> <td height='30' width='200' bgcolor='green'>   <div id='child'> <b> <font color='white'> Find Reports </font> </b> </div>  </td></tr>
<tr> <td height='7'> </td></tr>
";




if($pas_type==2)
{
	
print"
<tr> <td height='7'> </td></tr>
<tr> <td height='30' width='200' align='left' id='button2' bgcolor='C5B577'  onMouseOver=\"this.bgColor='96884F'\" onMouseOut=\"this.bgColor='C5B577'\" >  <a href='daily_sales.php' target='popup'><div id='child'> Daily Sales </div> </a> </td></tr>
<tr> <td height='7'> </td></tr>
";

print"
<tr> <td height='30' width='200' bgcolor='C5B577'  onMouseOver=\"this.bgColor='96884F'\" onMouseOut=\"this.bgColor='C5B577'\" align='left' id='button2'>  <a href='daily_order.php' target='popup'> <div id='child'> Daily Sales Order  </div> </a> </td></tr>
<tr> <td height='7'> </td></tr>
";



print"
<tr> <td height='30' width='200' align='left' id='button2' bgcolor='C5B577'  onMouseOver=\"this.bgColor='96884F'\" onMouseOut=\"this.bgColor='C5B577'\" >  <a href='daily_sales_person.php' target='popup'><div id='child'> Daily Sales By Person </div> </a> </td></tr>
<tr> <td height='7'> </td></tr>
";


	
}



if($user_name1=="superadmin" || $pas_type==1)
{


print"
<tr> <td height='30' width='200' bgcolor='C5B577'  onMouseOver=\"this.bgColor='96884F'\" onMouseOut=\"this.bgColor='C5B577'\" align='left' id='button2'>  <a href='daily_order.php' target='popup'> <div id='child'> Daily Sales Order  </div> </a> </td></tr>
<tr> <td height='7'> </td></tr>
";


print"
<tr> <td height='30' width='200' bgcolor='C5B577'  onMouseOver=\"this.bgColor='96884F'\" onMouseOut=\"this.bgColor='C5B577'\" align='left' id='button2'>  <a href='daily_purchase.php' target='popup'> <div id='child'> Daily Purchase  </div> </a> </td></tr>

<tr> <td height='7'> </td></tr>
";

print"
<tr> <td height='30' width='200' align='left' id='button2' bgcolor='C5B577'  onMouseOver=\"this.bgColor='96884F'\" onMouseOut=\"this.bgColor='C5B577'\" >  <a href='daily_sales.php' target='popup'><div id='child'> Daily Sales </div> </a> </td></tr>
<tr> <td height='7'> </td></tr>
";


print"
<tr> <td height='30' width='200' align='left' id='button2' bgcolor='C5B577'  onMouseOver=\"this.bgColor='96884F'\" onMouseOut=\"this.bgColor='C5B577'\" >  <a href='daily_sales_person.php' target='popup'><div id='child'> Daily Sales By Person </div> </a> </td></tr>
<tr> <td height='7'> </td></tr>
";




print"
<tr> <td height='30' width='200' align='left' id='button2' bgcolor='C5B577'  onMouseOver=\"this.bgColor='96884F'\" onMouseOut=\"this.bgColor='C5B577'\" >  <a href='product_transfer_product.php' target='popup'><div id='child'> Product to Product Transfer </div> </a> </td></tr>
<tr> <td height='7'> </td></tr>
";



/*
print"
<tr> <td height='30' width='200' align='left' id='button2' bgcolor='C5B577'  onMouseOver=\"this.bgColor='96884F'\" onMouseOut=\"this.bgColor='C5B577'\" >  <a href='daily_replace.php' target='popup'><div id='child'> Daily Replace </div> </a> </td></tr>
<tr> <td height='7'> </td></tr>
";
*/



	if($g_1==1)
	{
print"
<tr> <td height='30' width='200' align='left' id='button2' bgcolor='C5B577'  onMouseOver=\"this.bgColor='96884F'\" onMouseOut=\"this.bgColor='C5B577'\" >  <a href='daily_transfer.php' target='popup'><div id='child'> Daily Transfer </div> </a> </td></tr>
<tr> <td height='7'> </td></tr>
";

	}









print"

<tr> <td height='30' width='200'  align='left' id='button2' bgcolor='C5B577'  onMouseOver=\"this.bgColor='96884F'\" onMouseOut=\"this.bgColor='C5B577'\" >  <a href='product_store.php'> <div id='child'> Daily Product Store </div> </a> </td></tr>
<tr> <td height='7'> </td></tr>




<tr> <td height='30' width='200'  align='left' id='button2' bgcolor='C5B577'  onMouseOver=\"this.bgColor='96884F'\" onMouseOut=\"this.bgColor='C5B577'\" >  <a href='product_sale.php'> <div id='child'> Daily Product Sales </div> </a> </td></tr>
<tr> <td height='7'> </td></tr>
";


/*
<tr> <td height='30' width='200'  align='left' id='button2' bgcolor='C5B577'  onMouseOver=\"this.bgColor='96884F'\" onMouseOut=\"this.bgColor='C5B577'\" >  <a href='product_replace.php'> <div id='child'> Product Replacement </div> </a> </td></tr>
<tr> <td height='7'> </td></tr>

*/







print"




<tr> <td height='30' width='200'  align='left' id='button2' bgcolor='C5B577'  onMouseOver=\"this.bgColor='96884F'\" onMouseOut=\"this.bgColor='C5B577'\" >  <a href='customer_money_receipt.php' target='_blank'> <div id='child'> Cust. Money Rece.  View </div> </a> </td></tr>

<tr> <td height='7'> </td></tr>



<tr> <td height='30' width='200'  align='left' id='button2' bgcolor='C5B577'  onMouseOver=\"this.bgColor='96884F'\" onMouseOut=\"this.bgColor='C5B577'\" >  <a href='supplier_money_payment.php' target='_blank'> <div id='child'> Supplier Payment  View </div> </a> </td></tr>

<tr> <td height='7'> </td></tr>





<tr> <td height='30' width='200'  align='left' id='button2' bgcolor='C5B577'  onMouseOver=\"this.bgColor='96884F'\" onMouseOut=\"this.bgColor='C5B577'\" >  <a href='cost_payment.php' target='_blank'> <div id='child'> Costing Payment  View </div> </a> </td></tr>

<tr> <td height='7'> </td></tr>


















<tr> <td height='30' width='200'  align='left' id='button2' bgcolor='C5B577'  onMouseOver=\"this.bgColor='96884F'\" onMouseOut=\"this.bgColor='C5B577'\" >  <a href='challan_view_q.php' target='a_blank'> <div id='child'> Quotation View </div> </a> </td></tr>

<tr> <td height='7'> </td></tr>



<tr> <td height='30' width='200'  align='left' id='button2' bgcolor='C5B577'  onMouseOver=\"this.bgColor='96884F'\" onMouseOut=\"this.bgColor='C5B577'\" >  <a href='challan_view.php' target='a_blank'> <div id='child'> Challan View </div> </a> </td></tr>

<tr> <td height='7'> </td></tr>







<tr> <td height='30' width='200' bgcolor='C5B577'  onMouseOver=\"this.bgColor='96884F'\" onMouseOut=\"this.bgColor='C5B577'\" align='left' id='button2'>  <a href='daily_purchase_return.php' target='popup'> <div id='child'> Purchase Return  </div> </a> </td></tr>

<tr> <td height='7'> </td></tr>


<tr> <td height='30' width='200' bgcolor='C5B577'  onMouseOver=\"this.bgColor='96884F'\" onMouseOut=\"this.bgColor='C5B577'\" align='left' id='button2'>  <a href='daily_sales_return.php' target='popup'> <div id='child'> Sales Return  </div> </a> </td></tr>

<tr> <td height='7'> </td></tr>


";


/*
<tr> <td height='30' width='200'  align='left' id='button2' bgcolor='C5B577'  onMouseOver=\"this.bgColor='96884F'\" onMouseOut=\"this.bgColor='C5B577'\" >  <a href='party_sale.php'> <div id='child'> Party Product Sales </div> </a> </td></tr>

<tr> <td height='7'> </td></tr>
*/


print"
<tr> <td height='30' width='200'  align='left' id='button2' bgcolor='C5B577'  onMouseOver=\"this.bgColor='96884F'\" onMouseOut=\"this.bgColor='C5B577'\" >  <a href='sms.php'> <div id='child'> Send Menual Sms </div> </a> </td></tr>

<tr> <td height='7'> </td></tr>


<tr> <td height='30' width='200'  align='left' id='button2' bgcolor='C5B577'  onMouseOver=\"this.bgColor='96884F'\" onMouseOut=\"this.bgColor='C5B577'\" >  <a href='sms_count.php'> <div id='child'>  Sms Count </div> </a> </td></tr>

<tr> <td height='7'> </td></tr>







<tr> <td height='30' width='200'  align='left' id='button2' bgcolor='C5B577'  onMouseOver=\"this.bgColor='96884F'\" onMouseOut=\"this.bgColor='C5B577'\" >  <a href='today_report.php'> <div id='child'> Today's Transaction  </div> </a> </td></tr>

<tr> <td height='7'> </td></tr>





<tr> <td height='30' width='200'  align='left' id='button2' bgcolor='C5B577'  onMouseOver=\"this.bgColor='96884F'\" onMouseOut=\"this.bgColor='C5B577'\" >  <a href='cost_report.php'> <div id='child'> Daily Cost  </div> </a> </td></tr>

<tr> <td height='7'> </td></tr>



<tr> <td height='30' width='200'  align='left' id='button2' bgcolor='C5B577'  onMouseOver=\"this.bgColor='96884F'\" onMouseOut=\"this.bgColor='C5B577'\" >  <a href='cost_summary.php'> <div id='child'> Cost Summary  Reports  </div> </a> </td></tr>

<tr> <td height='7'> </td></tr>

";






print"
<tr> <td height='30' width='200'  align='left' id='button2' bgcolor='C5B577'  onMouseOver=\"this.bgColor='96884F'\" onMouseOut=\"this.bgColor='C5B577'\" >  <a href='rcost_report.php'> <div id='child'> Daily Others Income  </div> </a> </td></tr>

<tr> <td height='7'> </td></tr>



<tr> <td height='30' width='200'  align='left' id='button2' bgcolor='C5B577'  onMouseOver=\"this.bgColor='96884F'\" onMouseOut=\"this.bgColor='C5B577'\" >  <a href='rcost_summary.php'> <div id='child'> Other Income Summary    </div> </a> </td></tr>

<tr> <td height='7'> </td></tr>
";




print"
<tr> <td height='30' width='200'  align='left' id='button2' bgcolor='C5B577'  onMouseOver=\"this.bgColor='96884F'\" onMouseOut=\"this.bgColor='C5B577'\" >  <a href='byp_product.php'> <div id='child'>  <font size='2'> Search By Purchase . product </font> </div> </a> </td></tr>

<tr> <td height='7'> </td></tr>



<tr> <td height='30' width='200'  align='left' id='button2' bgcolor='C5B577'  onMouseOver=\"this.bgColor='96884F'\" onMouseOut=\"this.bgColor='C5B577'\" >  <a href='by_product.php'> <div id='child'> <font size='2'> Search By Sales product </font>  </div> </a> </td></tr>

<tr> <td height='7'> </td></tr>


<tr> <td height='30' width='200'  align='left' id='button2' bgcolor='C5B577'  onMouseOver=\"this.bgColor='96884F'\" onMouseOut=\"this.bgColor='C5B577'\" >  <a href='by_product_q.php'> <div id='child'> <font size='2'> Party wise sales quantity </font>  </div> </a> </td></tr>
<tr> <td height='7'> </td></tr>





<tr> <td height='30' width='200'  align='left' id='button2' bgcolor='C5B577'  onMouseOver=\"this.bgColor='96884F'\" onMouseOut=\"this.bgColor='C5B577'\" >  <a href='party_wise_purchase.php'> <div id='child'>  <font size='2'> Party Wise Purchase Product  </font> </div> </a> </td></tr>

<tr> <td height='7'> </td></tr>




<tr> <td height='30' width='200'  align='left' id='button2' bgcolor='C5B577'  onMouseOver=\"this.bgColor='96884F'\" onMouseOut=\"this.bgColor='C5B577'\" >  <a href='party_wise_sales.php'> <div id='child'>  <font size='2'> Party Wise Sales Product  </font> </div> </a> </td></tr>
<tr> <td height='7'> </td></tr>



<tr> <td height='30' width='200'  align='left' id='button2' bgcolor='C5B577'  onMouseOver=\"this.bgColor='96884F'\" onMouseOut=\"this.bgColor='C5B577'\" >  <a href='party_wise_sales1.php'> <div id='child'>  <font size='2'> Party Wise Bill Product  </font> </div> </a> </td></tr>
<tr> <td height='7'> </td></tr>



";



/*
print"
<tr> <td height='30' width='200'  align='left' id='button2' bgcolor='C5B577'  onMouseOver=\"this.bgColor='96884F'\" onMouseOut=\"this.bgColor='C5B577'\" >  <a href='party_wise_replace.php'> <div id='child'>  <font size='2'> Party Wise Replacement Product  </font> </div> </a> </td></tr>
<tr> <td height='7'> </td></tr>
";
*/


	if($g_1==1)
	{
print"
<tr> <td height='30' width='200'  align='left' id='button2' bgcolor='C5B577'  onMouseOver=\"this.bgColor='96884F'\" onMouseOut=\"this.bgColor='C5B577'\" >  <a href='transfer_g.php'> <div id='child'>  <font size='2'> Godawn Wise Transfer Product  </font> </div> </a> </td></tr>
<tr> <td height='7'> </td></tr>
";
	}


print"
<tr> <td height='30' width='200'  align='left' id='button2' bgcolor='C5B577'  onMouseOver=\"this.bgColor='96884F'\" onMouseOut=\"this.bgColor='C5B577'\" >  <a href='bank_balance.php' target='a_blank'> <div id='child'> Bank Balance  </div> </a> </td></tr>

<tr> <td height='7'> </td></tr>



<tr> <td height='30' width='200'  align='left' id='button2' bgcolor='C5B577'  onMouseOver=\"this.bgColor='96884F'\" onMouseOut=\"this.bgColor='C5B577'\" >  <a href='stock_out_only.php' target='a_blank'> <div id='child'> Stock Out Only  </div> </a> </td></tr>

<tr> <td height='7'> </td></tr>



<tr> <td height='30' width='200'  align='left' id='button2' bgcolor='C5B577'  onMouseOver=\"this.bgColor='96884F'\" onMouseOut=\"this.bgColor='C5B577'\" >  <a href='stock_in_only.php' target='a_blank'> <div id='child'> Stock In Only  </div> </a> </td></tr>

<tr> <td height='7'> </td></tr>




<tr> <td height='30' width='200'  align='left' id='button2' bgcolor='C5B577'  onMouseOver=\"this.bgColor='96884F'\" onMouseOut=\"this.bgColor='C5B577'\" >  <a href='sd_list.php' target='a_blank'> <div id='child'> Stock Product List   </div> </a> </td></tr>

<tr> <td height='7'> </td></tr>



<tr> <td height='30' width='200'  align='left' id='button2' bgcolor='C5B577'  onMouseOver=\"this.bgColor='96884F'\" onMouseOut=\"this.bgColor='C5B577'\" >  <a href='sd6.php' target='a_blank'> <div id='child'> All Stock Report </div> </a> </td></tr>
<tr> <td height='7'> </td></tr>


<tr> <td height='30' width='200'  align='left' id='button2' bgcolor='C5B577'  onMouseOver=\"this.bgColor='96884F'\" onMouseOut=\"this.bgColor='C5B577'\" >  <a href='sd7.php' target='a_blank'> <div id='child'> Group Wise Stock Report </div> </a> </td></tr>
<tr> <td height='7'> </td></tr>








<tr> <td height='30' width='200'  align='left' id='button2' bgcolor='C5B577'  onMouseOver=\"this.bgColor='96884F'\" onMouseOut=\"this.bgColor='C5B577'\" >  <a href='only.php' target='a_blank'> <div id='child'> Only Stock Product </div> </a> </td></tr>
<tr> <td height='7'> </td></tr>


<tr> <td height='30' width='200'  align='left' id='button2' bgcolor='C5B577'  onMouseOver=\"this.bgColor='96884F'\" onMouseOut=\"this.bgColor='C5B577'\" >  <a href='sales_report.php' target='a_blank'> <div id='child'> Daily Sales Report Summary </div> </a> </td></tr>
<tr> <td height='7'> </td></tr>

<tr> <td height='30' width='200'  align='left' id='button2' bgcolor='C5B577'  onMouseOver=\"this.bgColor='96884F'\" onMouseOut=\"this.bgColor='C5B577'\" >  <a href='monthly_sales_report.php' target='a_blank'> <div id='child'> Monthly Sales Report </div> </a> </td></tr>
<tr> <td height='7'> </td></tr>


<tr> <td height='30' width='200'  align='left' id='button2' bgcolor='C5B577'  onMouseOver=\"this.bgColor='96884F'\" onMouseOut=\"this.bgColor='C5B577'\" >  <a href='capital_reports.php' target='a_blank'> <div id='child'> Capital Report & Graph </div> </a> </td></tr>
<tr> <td height='7'> </td></tr>


";


/*

<tr> <td height='30' width='200'  align='left' id='button2' bgcolor='C5B577'  onMouseOver=\"this.bgColor='96884F'\" onMouseOut=\"this.bgColor='C5B577'\" >  <a href='sd2.php'.php' target='a_blank'> <div id='child'> Calculate  </div> </a> </td></tr>
<tr> <td height='7'> </td></tr>


<tr> <td height='30' width='200'  align='left' id='button2' bgcolor='C5B577'  onMouseOver=\"this.bgColor='96884F'\" onMouseOut=\"this.bgColor='C5B577'\" >  <a href='m_profit.php' target='a_blank'> <div id='child'> Monthly Profit </div> </a> </td></tr>
<tr> <td height='7'> </td></tr>



";
*/


/*





<tr> <td height='30' width='200'  align='left' id='button2' bgcolor='C5B577'  onMouseOver=\"this.bgColor='96884F'\" onMouseOut=\"this.bgColor='C5B577'\" >  <a href='capital_report.php' target='popup' onclick=\"window.open('capital_report.php','name','width=1200,height=1000')\"> <div id='child'> Financial  Reports  </div> </a> </td></tr>

<tr> <td height='7'> </td></tr>
";

*/


}





print"
</table>


</td>




";

?>