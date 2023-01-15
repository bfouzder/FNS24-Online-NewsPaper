<?php

include_once('dbconnection.php');





if($user_name1=="superadmin" || $pas_type==1)
{
print"
<table align='center' width='1200' cellpadding='0' cellspacing='0'>
<tr> 
<td align='center' valign='top'>  

<table align='center' width='1200' cellpadding='0' cellspacing='0'>
<tr> 
<td height='5'> </td>
</tr>
</table>


<table align='center' width='1200' cellpadding='0' cellspacing='0' bgcolor='#C5B991' height=''>
<tr> <td height='5'> </td> </tr>
";
print"
<tr> 
<td width='5'> </td>
<td align='center'  width='100'  height='35' id='button' bgcolor='#014D4B'  onMouseOver=\"this.bgColor='006F70'\" onMouseOut=\"this.bgColor='#014D4B'\">  <a href='create.php'> <div id='head'> Create  </div> </a> </td>

<td align='center'  width='10'>   </td>


<td align='center'  width='100'  height='35' id='button' bgcolor='#014D4B'  onMouseOver=\"this.bgColor='006F70'\" onMouseOut=\"this.bgColor='#014D4B'\"><a href='edit.php'>  <div id='head'> Edit </div>  </a> </td>
<td align='center'  width='10'>   </td>
";


print"
<td align='center'  width='150'  height='35' id='button' bgcolor='#014D4B'  onMouseOver=\"this.bgColor='006F70'\" onMouseOut=\"this.bgColor='#014D4B'\"> <a href='stock_issu.php'> <div id='head'> Stock In / Out </div>  </a> </td>
<td align='center'  width='10'>   </td>
";

print"
<td align='center'  width='150'  height='35' id='button' bgcolor='#014D4B'  onMouseOver=\"this.bgColor='006F70'\" onMouseOut=\"this.bgColor='#014D4B'\"> <a href='sales_order.php'> <div id='head'> Order </div>  </a> </td>
<td align='center'  width='10'>   </td>
";


print"
<td align='center'  width='150'  height='35' id='button' bgcolor='#014D4B'  onMouseOver=\"this.bgColor='006F70'\" onMouseOut=\"this.bgColor='#014D4B'\"> <a href='purchase.php'> <div id='head'> Purchase </div>  </a> </td>
<td align='center'  width='10'>   </td>


<td align='center'  width='100'  height='35' id='button' bgcolor='#014D4B'  onMouseOver=\"this.bgColor='006F70'\" onMouseOut=\"this.bgColor='#014D4B'\"> <a href='sales.php'> <div id='head'> Sales </div> </a> </td>
<td align='center'  width='10'>   </td>
";

/*
print"
<td align='center'  width='100'  height='35' id='button' bgcolor='#014D4B'  onMouseOver=\"this.bgColor='006F70'\" onMouseOut=\"this.bgColor='#014D4B'\"> <a href='replace.php'> <div id='head'> Replace </div> </a> </td>
<td align='center'  width='10'>   </td>
";
*/


print"
<td align='center'  width='100'  height='35' id='button' bgcolor='#014D4B'  onMouseOver=\"this.bgColor='006F70'\" onMouseOut=\"this.bgColor='#014D4B'\"> <a href='challan.php'> <div id='head'> Challan </div> </a> </td>
<td align='center'  width='10'>   </td>



";

/*
print"
<td align='center'  width='100'  height='35' id='button' bgcolor='#014D4B'  onMouseOver=\"this.bgColor='006F70'\" onMouseOut=\"this.bgColor='#014D4B'\"> <a href='challan_q.php'> <div id='head'> Quotation </div> </a> </td>
<td align='center'  width='10'>   </td>

";
*/





/*
<td align='center'  width='200'  height='35' id='button' bgcolor='#014D4B'  onMouseOver=\"this.bgColor='006F70'\" onMouseOut=\"this.bgColor='#014D4B'\"> <a href='sales_commission.php'> <div id='head'> Sales Commission </div> </a> </td>
<td align='center'  width='10'>   </td>
*/







}


if($pas_type==2)
{
	
print"
<table align='center' width='1200' cellpadding='0' cellspacing='0'>
<tr> 
<td align='center' valign='top'>  

<table align='center' width='1200' cellpadding='0' cellspacing='0'>
<tr> 
<td height='5'> </td>
</tr>
</table>


<table align='center' width='1200' cellpadding='0' cellspacing='0' bgcolor='#C5B991' height=''>
<tr> <td height='5'> </td> </tr>
";	
	
print"
<tr> 
<td width='5'> </td>
<td align='center'  width='100'  height='35' id='button' bgcolor='#014D4B'  onMouseOver=\"this.bgColor='006F70'\" onMouseOut=\"this.bgColor='#014D4B'\">  <a href='create.php'> <div id='head'> Creat</div> </a> </td>

<td align='center'  width='10'>   </td>


<td align='center'  width='100'  height='35' id='button' bgcolor='#014D4B'  onMouseOver=\"this.bgColor='006F70'\" onMouseOut=\"this.bgColor='#014D4B'\"><a href='edit.php'>  <div id='head'> Edit </div>  </a> </td>
<td align='center'  width='10'>   </td>
";
	

print"
<td align='center'  width='150'  height='35' id='button' bgcolor='#014D4B'  onMouseOver=\"this.bgColor='006F70'\" onMouseOut=\"this.bgColor='#014D4B'\"> <a href='sales_order.php'> <div id='head'> Order </div>  </a> </td>
<td align='center'  width='10'>   </td>
";

	
	
print"
<td align='center'  width='100'  height='35' id='button' bgcolor='#014D4B'  onMouseOver=\"this.bgColor='006F70'\" onMouseOut=\"this.bgColor='#014D4B'\"> <a href='sales.php'> <div id='head'> Sales </div> </a> </td>
<td align='center'  width='10'>   </td>

";


/*
print"
<td align='center'  width='100'  height='35' id='button' bgcolor='#014D4B'  onMouseOver=\"this.bgColor='006F70'\" onMouseOut=\"this.bgColor='#014D4B'\"> <a href='replace.php'> <div id='head'> Replace </div> </a> </td>
<td align='center'  width='10'>   </td>
";
*/	


print"
<td align='center'  width='100' height='35' id='button' bgcolor='#014D4B'  onMouseOver=\"this.bgColor='006F70'\" onMouseOut=\"this.bgColor='#014D4B'\">  <a href='report.php'><div id='head'> Reports </div> </a>  </td>
<td align='center'  width='10'>   </td>
";



print"
<td width='5'> </td>
<td align='center'  width='200'  height='35' id='button' bgcolor='#014D4B'  onMouseOver=\"this.bgColor='006F70'\" onMouseOut=\"this.bgColor='#014D4B'\"> <a href='refill.php'> <div id='head'> Payment / Collection </div> </a>  </td>
<td align='center'  width='10'>   </td>
";

print"
<td align='center'  width='200'  height='35' id='button' bgcolor='#014D4B'  onMouseOver=\"this.bgColor='006F70'\" onMouseOut=\"this.bgColor='#014D4B'\">  <a href='index.php'> <div id='head'> Log out ($go_new)  </div> </a>  </td>
<td align='center'  width='10'>   </td>
";

print"
<td width='600'> </td>
";


}



if($user_name1=="superadmin" || $pas_type==1)
{
	
print"
<td align='center'  width='100'  height='35' id='button' bgcolor='#014D4B'  onMouseOver=\"this.bgColor='006F70'\" onMouseOut=\"this.bgColor='#014D4B'\"> <a href='find_due.php'> <div id='head'> Find Due </div> </a>  </td>
<td align='center'  width='10'>   </td>



<td align='center'  width='180'  height='35' id='button' bgcolor='#014D4B'  onMouseOver=\"this.bgColor='006F70'\" onMouseOut=\"this.bgColor='#014D4B'\">  <a href='find_transection.php'> <div id='head'> Find Transaction </div> </a>  </td>
<td align='center'  width='10'>   </td>
";


print"
<td align='center'  width='100' height='35' id='button' bgcolor='#014D4B'  onMouseOver=\"this.bgColor='006F70'\" onMouseOut=\"this.bgColor='#014D4B'\">  <a href='report.php'><div id='head'> Reports </div> </a>  </td>
<td align='center'  width='10'>   </td>
";



print"
<td align='center'  width='120' height='35' id='button' bgcolor='#014D4B'  onMouseOver=\"this.bgColor='006F70'\" onMouseOut=\"this.bgColor='#014D4B'\"> <a href='cash_book.php'> <div id='head'> Cash Book </div> </a>  </td>
<td align='center'  width='10'>   </td>


<td align='center'  width='100'  height='35' id='button' bgcolor='#014D4B'  onMouseOver=\"this.bgColor='006F70'\" onMouseOut=\"this.bgColor='#014D4B'\"> <a href='problem.php' target='a_blank'> <div id='head'> Comments  </div>  </a> </td>
<td align='center'  width='10'>   </td>


<td align='center'  width='170'  height='35' id='button' bgcolor='#014D4B'  onMouseOver=\"this.bgColor='006F70'\" onMouseOut=\"this.bgColor='#014D4B'\"> <a href='inventory.php' target=''> <div id='head'> Inventory </div>  </a> </td>
<td align='center'  width='10'>   </td>
</tr>
<tr> <td height='5'> </td> </tr>
";


}



print"

</table>

";





if($user_name1=="superadmin" || $pas_type==1)
{

print"
<table align='center' width='1200' cellpadding='0' cellspacing='0' bgcolor='#C5B991' height=''>
";


print"

<tr> 
<td width='5'> </td>
<td align='center'  width='200'  height='35' id='button' bgcolor='#014D4B'  onMouseOver=\"this.bgColor='006F70'\" onMouseOut=\"this.bgColor='#014D4B'\"> <a href='refill.php'> <div id='head'> Payment / Collection </div> </a>  </td>

<td align='center'  width='10'>   </td>




<td width='5'> </td>
<td align='center'  width='120'  height='35' id='button' bgcolor='#014D4B'  onMouseOver=\"this.bgColor='006F70'\" onMouseOut=\"this.bgColor='#014D4B'\"> <a href='cost_entry.php'> <div id='head'> Cost Entry </div> </a>  </td>

<td align='center'  width='10'>   </td>



<td align='center'  width='200'  height='35' id='button' bgcolor='#014D4B'  onMouseOver=\"this.bgColor='006F70'\" onMouseOut=\"this.bgColor='#014D4B'\"> <a href='check_report.php'> <div id='head'> Cheque Report </div> </a> </td>
<td align='center'  width='10'>   </td>
";

/*

<td align='center'  width='200'  height='35' id='button' bgcolor='#014D4B'  onMouseOver=\"this.bgColor='006F70'\" onMouseOut=\"this.bgColor='#014D4B'\"> <a href='sales_commission.php'> <div id='head'> Sales Commission </div> </a> </td>
<td align='center'  width='10'>   </td>
*/



print"
<td align='center'  width='220'  height='35' id='button' bgcolor='#014D4B'  onMouseOver=\"this.bgColor='006F70'\" onMouseOut=\"this.bgColor='#014D4B'\">  <a href='opening_balance.php'> <div id='head'> Opening Balance  </div> </a>  </td>
<td align='center'  width='10'>   </td>
";

/*

<td align='center'  width='200'  height='35' id='button' bgcolor='#014D4B'  onMouseOver=\"this.bgColor='006F70'\" onMouseOut=\"this.bgColor='#014D4B'\"> <a href='capital_report.php' target='a_blank'> <div id='head'> Financial Reports </div> </a> </td>

<td align='center'  width='10'>   </td>

*/


print"

<td align='center'  width='170'  height='35' id='button' bgcolor='#014D4B'  onMouseOver=\"this.bgColor='006F70'\" onMouseOut=\"this.bgColor='#014D4B'\">  <a href='profit_new.php' target='a_blank'> <div id='head'> Profit & Loss </div> </a>  </td>
<td align='center'  width='10'>   </td>


<td align='center'  width='100'  height='35' id='button' bgcolor='#014D4B'  onMouseOver=\"this.bgColor='006F70'\" onMouseOut=\"this.bgColor='#014D4B'\">  <a href='backup.php'> <div id='head'> Backup </div> </a>  </td>
<td align='center'  width='10'>   </td>
";



print"

<td align='center'  width='200'  height='35' id='button' bgcolor='#014D4B'  onMouseOver=\"this.bgColor='006F70'\" onMouseOut=\"this.bgColor='#014D4B'\">  <a href='index.php'> <div id='head'> Log out ($go_new) </div> </a>  </td>
<td align='center'  width='10'>   </td>







<td align='center'  width='100'  height='35' id='button' bgcolor='#014D4B'  onMouseOver=\"this.bgColor='006F70'\" onMouseOut=\"this.bgColor='#014D4B'\"> 



      <ul id='menutop' class='menutop'>
        <li><a href='#'> <font color='white' size='3'> Settings </font> </a>
          <ul class='sub-menutop'>
		  
		  
<li> 
<a href='help.php'> <font color='white' size='2'> Help-Line </font> </a>
</li>		  

<li> 
<a href='create_password.php'> <font color='white' size='2'> Create Account </font> </a>
</li>
<li> 
<a href='create_memo.php'> <font color='white' size='2'> Set Address & Logo </font> </a>
</li>


<li> 
<a href='vat.php'> <font color='white' size='2'> Set Vat / Tax  </font> </a>
</li>

<li> 
<a href='bill.php'> <font color='white' size='2'> Prev. Due Show Or Not </font> </a>
</li>



<li> 
<a href='set.php'> <font color='white' size='2'> Page Settings  </font> </a>
</li>



<li> 
<a href='barcode/index.php' target='_blank'> <font color='white' size='2'> Barcode Generate1 </font> </a>
</li>

<li> 
<a href='barcode/run.php' target='_blank'> <font color='white' size='2'> Barcode Generate -2  </font> </a>
</li>





          </ul>
        </li>
      </ul>
    </div>
	


  </td>
<td align='center'  width='10'>   </td>




</tr>
<tr> <td height='5'> </td> </tr>

</table>
";

}

print"
</td> 
</tr>
</table>

";



?>