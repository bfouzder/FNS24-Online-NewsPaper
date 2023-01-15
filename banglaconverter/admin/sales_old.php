<?php
include_once('dbconnection.php');
session_start();

/*
$result = mysql_query("SELECT * FROM salememo");
$num_rows = mysql_num_rows($result);
*/




$id=trim($_POST['product_id']);

$idn=strlen($id);

for($lk=0;$lk<=$idn;$lk++)
{
if($id[$lk]=='=')
{
$rty++;	
}

if($rty==1)
{
	$rkk++;
	if($rkk>1)
	{
$idvalue="$idvalue$id[$lk]";
	}	
}
	
}



$product_id=$idvalue;



$rty=0;
$rkk=0;
















$id_supplier=trim($_POST['supplier']);

$idn_s=strlen($id_supplier);

for($lk=0;$lk<=$idn_s;$lk++)
{
if($id_supplier[$lk]=='=')
{
$rty++;	
}

if($rty==1)
{
	$rkk++;
	if($rkk>1)
	{
$idvalue_s="$idvalue_s$id_supplier[$lk]";
	}	
}
	
}



$supplier=$idvalue_s;


$rty=0;
$rkk=0;





if($id_supplier=="")
{
$id_supplier=$_GET['sup'];	

$idn_s=strlen($id_supplier);

for($lk=0;$lk<=$idn_s;$lk++)
{
if($id_supplier[$lk]=='=')
{
$rty++;	
}

if($rty==1)
{
	$rkk++;
	if($rkk>1)
	{
$idvalue_s="$idvalue_s$id_supplier[$lk]";
	}	
}
	
}


}



$id_supplier=str_replace("&","and","$id_supplier");
$id_supplier=str_replace("#","hash","$id_supplier");

$supplier=$idvalue_s;


$rty=0;
$rkk=0;




$result = mysql_query("SELECT * FROM `salememo`  ORDER BY `money_id` DESC  LIMIT 0 , 1 ");

while ($a_row = mysql_fetch_row($result)) {

	foreach ($a_row as $field) {
		
	}

$num=$a_row[1];

}


/*
$me=$num;
$me=$me+1;
*/


//$me=100;

$me= time().$u_idd;


$ser=trim($_POST['ser']);

$wa=trim($_POST['wa']);



$vat=trim($_POST['vat']);
$tax2=trim($_POST['tax2']);




$less=trim($_POST['less']);
$payment=trim($_POST['payment']);
$payment_mode=trim($_POST['payment_mode']);
$paymenttype=trim($_POST['paymenttype']);


//$supplier=trim($_POST['supplier']);


$comments=trim($_POST['comments']);
$transport_name=trim($_POST['transport_name']);

$contact_name=trim($_POST['contact_name']);
$contact_name1=trim($_POST['contact_name1']);

$sales_order=trim($_POST['sales_order']);

$p_des=trim($_POST['p_des']);


$inn='\"';
$inn2='"';

$p_des=str_replace("$inn","$inn2","$p_des");

$p_des=str_replace("'","","$p_des");



$project_name=trim($_POST['project_name']);

$service=trim($_POST['service']);


$comission_to=trim($_POST['comission_to']);
$comission_amount=trim($_POST['comission_amount']);








$dcl=trim($_POST['dcl']);
$tin=trim($_POST['tin']);




$dcl=str_replace("'","`","$dcl");
$tin=str_replace("'","`","$tin");




$transport_name=str_replace("'","`","$transport_name");

$contact_name=str_replace("'","`","$contact_name");
$contact_name1=str_replace("'","`","$contact_name1");



$sales_order=str_replace("'","`","$sales_order");
$comments=str_replace("'","`","$comments");

$project_name=str_replace("'","`","$project_name");












if($transport_name=="")
{
$transport_name=$_GET['transport_name'];	
}

if($contact_name=="")
{
$contact_name=$_GET['contact_name'];	
}

if($contact_name1=="")
{
$contact_name1=$_GET['contact_name1'];	
}


if($sales_order=="")
{
$sales_order=$_GET['sales_order'];	
}


if($project_name=="")
{
$project_name=$_GET['project_name'];	
}




if($dcl=="")
{
$dcl=$_GET['dcl'];	
}

if($tin=="")
{
$tin=$_GET['tin'];	
}





$less_new=trim($_POST['less_new']);
$check_no=trim($_POST['check_no']);
$check_amount=trim($_POST['check_amount']);



$dat=trim($_POST['dat']);
$mon=trim($_POST['mon']);
$yer=trim($_POST['yer']);


$mdate="$yer$mon$dat";



if($ser=="")
{
$bbb=time(); 
$d=date("m/d/y",$bbb); 
$mon="$d[0]$d[1]";
$dat="$d[3]$d[4]";
$yer="20$d[6]$d[7]";

$mdate="$yer$mon$dat";

}











































































///////////////





//print" - $supplier - ";



/*
if($supplier=="")
{
$supplier=(int)$_GET['sup'];	
}
*/






if($ser=="")
{
$ser=$_GET['ser'];	
}





$new_customer=trim($_POST['new_customer']);
$new_address=trim($_POST['new_address']);
$new_mobile=trim($_POST['new_mobile']);



if($new_customer=="")
{
$new_customer=$_GET['new_customer'];	
}

if($new_address=="")
{
$new_address=$_GET['new_address'];	
}

if($new_customer=="")
{
$new_customer=$_GET['new_customer'];	
}

if($new_mobile=="")
{
$new_mobile=$_GET['new_mobile'];	
}









$sql="SELECT * FROM `bank` WHERE user_id='$payment_mode' ";
$result=mysql_query($sql);
$arrsp=mysql_fetch_array($result);
$payment_moden=$arrsp[1];


if($payment_mode=="")
{
$payment_moden="Cash";
}




$sql="SELECT * FROM `customer` WHERE user_id='$supplier' ";
$result=mysql_query($sql);
$arrs=mysql_fetch_array($result);
$suppliern=$arrs[7];


//if($ser=="")
//{
$mobiles=$arrs[3];
$addresss=$arrs[5];

//}
//else
//{
//$mobiles=$new_mobile;
//$addresss=$new_address;
//}








$sql="SELECT * FROM `contact` WHERE user_id='$contact_name' ";
$result=mysql_query($sql);
$arrsco=mysql_fetch_array($result);
$contact_namen=$arrsco[1];


$mobile_contact=$arrsco[3];
$address_contact=$arrsco[5];



$sql="SELECT * FROM `contact1` WHERE user_id='$contact_name1' ";
$result=mysql_query($sql);
$arrsco1=mysql_fetch_array($result);
$contact_namen1=$arrsco1[1];


$mobile_contact1=$arrsco1[3];
$address_contact1=$arrsco1[5];



































if($ser=="" && $supplier=="")
{
unset($_SESSION['cart']);
unset($_SESSION['cart_price']);
unset($_SESSION['cart_unit']);
unset($_SESSION['cart_com']);
unset($_SESSION['cart_local']);
unset($_SESSION['cart_wa']);

	
}



if($ser!=6)
{
$paymenttype="Cash";
}


//print" $paymenttype  - $supplier ";


if($ser==6)

{

$b=0;


if($supplier=="" && $b==0)
{
include_once('sup.php');
$b=1;
}


if($payment=="" && $b==0)
{
include_once('pay.php');
$b=1;
}








}



$action = $_GET['action']; 


if($action=="remove")
{

$transport_name=str_replace("@","#","$transport_name");
$contact_name=str_replace("@","#","$contact_name");
$contact_name1=str_replace("@","#","$contact_name1");

$sales_order=str_replace("@","#","$sales_order");


$dcl=str_replace("@","#","$dcl");
$tin=str_replace("@","#","$tin");



$dat=$_GET['dat'];
$mon=$_GET['mon'];
$yer=$_GET['yer'];

$mdate="$yer$mon$dat";

}








if($ser==1)
{
//unset($_SESSION['cart']);

/*
$ky=trim($_POST['ky']);
for($i=1;$i<=$ky;$i++)	
{
$qty=1;
$pik=trim($_POST['nu'.$i]);

print"$pik <br>";

}

*/


}






if($ser==1)
{

$a=0;




$product=trim($_POST['product']);

$price=trim($_POST['price']);

//print"  $price  ";
//print"$product";
//$product_id=trim($_POST['product_id']);









if($product_id=="")
{
$product_id=$product;
}



if($price=="")
{

$sql="SELECT * FROM `product_name` WHERE user_id='$product_id' ";
$result=mysql_query($sql);
$arrpo=mysql_fetch_array($result);
$price=$arrpo[5];	

}
else
{
$price=$price;
}





if($price!="")
{
	
	
$total_price_new=0;
$q_new=0;

$result = mysql_query("SELECT * FROM `buyproduct` where adat<='$mdate'  && product_id='$product_id' ");


while ($a_row = mysql_fetch_row($result)) {

	foreach ($a_row as $field) {
		
	}


$q_new=$q_new+$a_row[6];
$total_price_new=$total_price_new+$a_row[8];

}


if($total_price_new>0)
{
$single=$total_price_new/$q_new;	
}
else
{
$single=0;	
}


















$sql= "UPDATE  `product_name` SET `buy_new`='$single' WHERE `user_id`='$product_id'";
mysql_query($sql);
	

$sql= "UPDATE  `product_name` SET `sale_new`='$price' WHERE `user_id`='$product_id'";
mysql_query($sql);


}






$sql= "UPDATE  `product_name` SET `less`='$less_new' WHERE `user_id`='$product_id'";
mysql_query($sql);



$sql= "UPDATE  `product_name` SET `p_des`='$p_des' WHERE `user_id`='$product_id'";
mysql_query($sql);


$box=trim($_POST['box']);


if($box!="")
{
$sql="SELECT * FROM `product_name` WHERE user_id='$product_id' ";
$result=mysql_query($sql);
$arrpo_box=mysql_fetch_array($result);
$boxx=$arrpo_box[33];	

}







$qty=trim($_POST['qty']);

if($qty=="")
{
$qty=0;
}



if($boxx!="")
{
$qty1=$box*$boxx;
}



$qty=$qty1+$qty;


$sale_stock=trim($_POST['sale_stock']);

$sk=trim($_POST['sk']);

/*
if($sk==1)
{

if($sale_stock<$qty)
{
$product_id="";
include_once('ne.php');
}

}

*/


//////////////////////////////////////////////////////////////////////




















if($qty=="")
{
$qty=0;
}


$up3=$up1-$up2;

$up3=$stock_q;




/*



if($up3<$qty)
{
$ppp="";	
}
else
{
$ppp="sdfsjdh";	
}






if($ppp=="")
{
$a=1;
include_once('n.php');
}


*/



if($supplier==0)
{
include_once('cus.php');
}

if($a==0 && $supplier!=0 && $product_id!="")
{



if($qty=="")
{
$qty=0;
}


//print" $product_id - $qty ";

$action="en";










switch($action) {	



		case "en":

                        $_SESSION['cart'][$product_id]=$_SESSION['cart'][$product_id]+$qty;
                        $ps=123;
                        $_SESSION['color']="$ps";
                        

						
						
	   $_SESSION['cart_price'][$product_id]=$_SESSION['cart_price'][$product_id]=$price;
       $_SESSION['cart_unit'][$product_id]=$_SESSION['cart_unit'][$product_id]+$unit;
	   $_SESSION['cart_com'][$product_id]=$_SESSION['cart_com'][$product_id]=$less_new;
	   $_SESSION['cart_local'][$product_id]=$_SESSION['cart_local'][$product_id]=$p_des;
	   $_SESSION['cart_wa'][$product_id]=$_SESSION['cart_wa'][$product_id]=$wa;
	   
	   
	 
	   

						
						
						
						
                break;


		case "remove":

                       unset($_SESSION['cart'] [$product_id]);
					   unset($_SESSION['cart_price'][$product_id]);
					   unset($_SESSION['cart_unit'][$product_id]);
					   unset($_SESSION['cart_com'][$product_id]);
					   unset($_SESSION['cart_local'][$product_id]);
					   unset($_SESSION['cart_wa'][$product_id]);
					   

             
                break;

                }










}


}





$action = $_GET[action]; 


if($action=="remove")
{


/*
$dat=$_GET['dat'];
$mon=$_GET['mon'];
$yer=$_GET['yer'];

$mdate="$yer$mon$dat";
*/


$product_id = $_GET[i1d];

switch($action) {	



		case "en":

                        $_SESSION['cart'][$product_id]=$_SESSION['cart'][$product_id]+$qty;

                break;


		case "remove":
 
                       unset($_SESSION['cart'] [$product_id]);
					   unset($_SESSION['cart_price'][$product_id]);
					   unset($_SESSION['cart_unit'][$product_id]);
					   unset($_SESSION['cart_com'][$product_id]);
					   unset($_SESSION['cart_local'][$product_id]);
					   unset($_SESSION['cart_wa'][$product_id]);
					   
					   

             

             
                break;

                }






}


$adate="$yer$mon$dat";




$ps=$_SESSION['color'];


//if($ser!="")
//{
foreach($_SESSION['cart'] as $product_id => $quantity)
{

$e++;

 
}

//}












$result = mysql_query("SELECT * FROM product_name");

while ($a_row = mysql_fetch_row($result)) {

	foreach ($a_row as $field) {
		
	}

$pe++;
$productname[$pe]=$a_row[2];
$productid[$pe]=$a_row[0];
$product_measurement[$pe]=$a_row[14];
$product_type[$pe]=$a_row[15];


        }









$result = mysql_query("SELECT * FROM product_category");

while ($a_row = mysql_fetch_row($result)) {

	foreach ($a_row as $field) {
		
	}

$l++;
$pi[$l]=$a_row[0];
$pnn[$l]=$a_row[1];

}



$result = mysql_query("SELECT * FROM `product_sub_category`  ORDER BY `user_id` ASC  LIMIT 0 , 60000 ");

while ($a_row = mysql_fetch_row($result)) {

	foreach ($a_row as $field) {
		
	}
	
	$rd++;
	$ca_id[$rd]=$a_row[1];
	$cas_id[$rd]=$a_row[0];
	$can_id[$rd]=$a_row[2];
	
	
	
}




$idat=trim($_POST['idat']);
$imon=trim($_POST['imon']);
$iyer=trim($_POST['iyer']);







$ar='"';



print"

<html>

<head>
<title> Sales </title>
<meta http-equiv='content-type' content='text/html;charset=utf-8' />

<base target='_parent' /> 
";

?>





  <link rel="stylesheet" href="jquery-ui-themes-1.11.4/themes/smoothness/jquery-ui.css">
  
  
  
  <script src="jquery-1.10.2.js"></script>
  <script src="jquery-ui.js"></script>
  
 
<script type="text/javascript">
$(function() 
{
 $( "#supplier" ).autocomplete({
  source: 'new.php'

 });
});




$(function() 
{
 $( "#tags" ).autocomplete({
  source: 'p.php'

 });
});

</script>


<?php


include_once('style.php');


print"

<style>

#tags
{
width:190px;
}
</style>


</head>



<body onload='mnnn()'>
";


//include_once('header2.php');


print"
<table align='center' width='1200' cellpadding='0' cellspacing='1' height='800' bgcolor='gray'>
<tr bgcolor='white'> 
<td align='center' valign='top' width='220' bgcolor='#C5B991'>  

<table align='center' width='200' cellpadding='0' cellspacing='0' height=''>

<tr> <td height=''> </td></tr>

<tr> <td height='30' width='200' bgcolor='green'>   <span id='child'> <b> <font color='white'> Sales </font> </b> </span>  </td></tr>
<tr> <td height='7'> </td></tr>
";


//include_once('sales_left.php');


print"



<td align='center' valign='top' width='980' bgcolor='F2F2F2'>  





<table align='center' width='200' cellpadding='0' cellspacing='0' bgcolor='F2F2F2'>
<tr> <td height='10' align='center' >   </td> </tr>
<tr> <td height='40' align='center' id='saa'>  <b> Sales Invoice </b> </td> </tr>
</table>





<table align='center' width='900' cellpadding='0' cellspacing='0' bgcolor='F2F2F2'>

<tr> <td height='10'> </td> </tr>

<tr> 

<td width='900' bgcolor='' align='center' valign='top' height='900'>

<table align='center' width='900' cellpadding='0' cellspacing='0'>


<tr> 

<form name='fuu' action='sales.php' method='POST'> 

<td height='0'> </td> </tr>
";












$dr_advance=0;
$cr_advance=0;


$result = mysql_query("SELECT * FROM `customer_advance` where  bank_name='$supplier'  ORDER BY `adat` ASC ");

while ($a_row = mysql_fetch_row($result)) {

	foreach ($a_row as $field) {
		
	}

if($a_row[2]==2)
{
$dr_advance=$dr_advance+$a_row[3];
}


if($a_row[2]==1)
{
$cr_advance=$cr_advance+$a_row[3];
}

}


$adjust=$cr_advance-$dr_advance;



if($ser==5)
{
$adjust=trim($_POST['adjust_amount']);
}
















$result = mysql_query("SELECT * FROM `customer_laser` where  bank_name='$supplier' && adat<='$adate' ORDER BY `adat` ASC ");

while ($a_row = mysql_fetch_row($result)) {

	foreach ($a_row as $field) {
		
	}

if($a_row[2]==2)
{
$dr=$dr+$a_row[3];
}


if($a_row[2]==1)
{
$cr=$cr+$a_row[3];
}

}


$balance=$cr-$dr;






$transport_name1=str_replace("#","@","$transport_name");
$contact_name11=str_replace("#","@","$contact_name");
$contact_name111=str_replace("#","@","$contact_name1");

$sales_order1=str_replace("#","@","$sales_order");






print"
<tr> <td height='1'> </td> </tr>
";


print"

<tr> <td height='1'> </td> </tr>



<tr> 

<td id='' width='150' bgcolor='' id='' align='left'>
<font size='2' face='arial' color='black'> <b>&nbsp; Invoice Date   </b> </font>

</td>

<td width='750' align='left'>
";


print"

:

<select name='dat' id='dat1'>
<option name='$dat'>$dat</option>
<option name='01'>01</option>
<option name='02'>02</option>
<option name='03'>03</option>
<option name='04'>04</option>
<option name='05'>05</option>
<option name='06'>06</option>
<option name='07'>07</option>
<option name='08'>08</option>
<option name='09'>09</option>
<option name='10'>10</option>
<option name='11'>11</option>
<option name='12'>12</option>
<option name='13'>13</option>
<option name='14'>14</option>
<option name='15'>15</option>
<option name='16'>16</option>
<option name='17'>17</option>
<option name='18'>18</option>
<option name='19'>19</option>
<option name='20'>20</option>
<option name='21'>21</option>
<option name='22'>22</option>
<option name='23'>23</option>
<option name='24'>24</option>
<option name='25'>25</option>
<option name='26'>26</option>
<option name='27'>27</option>
<option name='28'>28</option>
<option name='29'>29</option>
<option name='30'>30</option>
<option name='31'>31</option>
</select>

<select name='mon' id='mon1'>
<option name='$mon'>$mon</option>
<option name='01'>01</option>
<option name='02'>02</option>
<option name='03'>03</option>
<option name='04'>04</option>
<option name='05'>05</option>
<option name='06'>06</option>
<option name='07'>07</option>
<option name='08'>08</option>
<option name='09'>09</option>
<option name='10'>10</option>
<option name='11'>11</option>
<option name='12'>12</option>
</select>

<select name='yer' id='yer1'>
<option name='$yer'>$yer</option>

";

include_once('year.php');

print"

</select>
";








print"
&nbsp;&nbsp;&nbsp;&nbsp;
";

?>







<a href="#"  onclick="window.open('customer_new.php','name','width=600,height=400,toolbar=no,location=no,directories=no,status=no,menubar=no, scrollbars=no, left=300,top=140,resizable=no, copyhistory=no,titlebar=no')"> <font color='black'> <b> Create New Customer </b> </font> </a>

&nbsp;




&nbsp;




<?php

/*

<a href="#"  onclick="window.open('product_entry.php','name','width=700,height=520,toolbar=no,location=no,directories=no,status=no,menubar=no, scrollbars=no, left=300,top=140,resizable=no, copyhistory=no,titlebar=no')"> <font color='black'> <b> Create New Product </b> </font> </a>

*/

print"

<a href='#' >  <font color='red'> <b> Due ($balance)   </b> </font> </a>



</td>



</tr>
";




/*
if($supplier==1)
{
print"

<tr>
<td height='8'> </td>
</tr>


<tr> 

<td width='left'> 
<font face='arial' size='2' color='black'> 
&nbsp; <b> Name </b> </font> </td>
<td width='left'> : <input type='text' name='new_customer' value='$new_customer' size='15' id='txt'>  &nbsp; 
 
</font>
</td>
</tr>
";


}

*/







print"

<tr> <td height='8'> </td> </tr>

<tr>
<td width='0' align='left'> <font size='2' face='arial' color='black'> <b> &nbsp; Invoice No  </b> </font> </td>
<td align='left'> 
";


print"
: 

<input type='text' name='memo_no' value='$me' readonly size='15' id='txt2_in'>
";
print"


<font face='arial' size='2' color='black'> 
&nbsp;&nbsp;
&nbsp;&nbsp;
&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp; &nbsp;



<b> PO NO : </b> </font> 


<input type='text' name='sales_order' value='$sales_order'  size='15' id='txt2'>

&nbsp;


<font face='arial' size='2' color='black'> 
<b> DCL NO : </b> </font> 



<input type='text' name='dcl' value='$dcl'  size='15' id='txt2'>

&nbsp;


<font face='arial' size='2' color='black'> 
<b> TIN NO : </b> </font> 


<input type='text' name='tin' value='$tin'  size='15' id='txt2'>

";


?>



<?php


print"

</td>

<tr>

";

























print"

<tr> <td height='8'> </td> </tr>

<tr>
<td width='0' align='left'> <font size='2' face='arial' color='black'> <b> &nbsp; Customer Name  </b> </font> </td>
<td align='left'> 
";


/*
print"
: 
<label for='tags2'> </label>
<input type='text' id='tags2_sales' name='supplier' value='$id_supplier' size='30' onblur='ro()'>
";

print"

";
*/


print"
:
<span class='ui-widget'>
  <input type='text' id='supplier' name='supplier' value='$id_supplier'>
";



?>



<?php


print"

</td>

<tr>

";








print"

<tr> <td height='8'> </td> </tr>

<tr>
<td width='0' align='left'> <font size='2' face='arial' color='black'> <b> &nbsp; Address  </b> </font> </td>
<td align='left'> 
";




print"
: <input type='text' name='new_address' id='text_d' value='$addresss'    size='35'>
";


?>



<?php


print"

</td>

<tr>

";











print"

<tr> <td height='8'> </td> </tr>
<tr>
<td width='0' align='left'> <font size='2' face='arial' color='black'> <b> &nbsp; Mobile  </b> </font> </td>
<td align='left'> 
";

print"
: <input type='text' name='new_mobile' id='text_mobile' value='$mobiles'  size='35'>

<font size='2' face='arial' color='black'> <b> P_Rate : </b> </font> <input type='text' name='sale_price1' id='pr2' readonly size='2'> 
<font size='2' face='arial' color='black'> <b> Box : </b> </font> <input type='text' name='boxq' id='pr2' readonly size='3'> 
<font size='2' face='arial' color='black'> <b> Rate : </b> </font> <input type='text' name='sale_price' id='pr2' readonly size='3'> 

&nbsp;
<font size='2' face='arial' color='black'> <b> Stock : </b> </font> <input type='text' name='sale_stock' id='pr2' readonly size='3'> 
</font> 




";
print"
</td>
<tr>
";










print"

<tr> <td height='8'> </td> </tr>
<tr>
<td width='0' align='left'> <font size='2' face='arial' color='black'> <b> &nbsp; Sales Person  </b> </font> </td>
<td align='left'> 
";

print"

: 


	 
<select  name='contact_name'  id='text_mobile'>

<option value='$contact_name'> $contact_namen </option>
";

//$result = mysql_query("SELECT * FROM product_category");


$result = mysql_query("SELECT * FROM `contact`  ORDER BY `customer_name` ASC  LIMIT 0 , 60000 ");


while ($a_row = mysql_fetch_row($result)) {

	foreach ($a_row as $field) {
		
	}

print"
<option value='$a_row[0]'> $a_row[1] </option>
";
}


print"
</select>















<font size='2' face='arial' color='black'> <b> Mobile : </b> </font> <input type='text' name='mobile_contact' value='$mobile_contact' id='pr5'  size='2'> 
<font size='2' face='arial' color='black'> <b> Address : </b> </font> <input type='text' name='address_contact' value='$address_contact' id='pr5' size='3'> 




";
print"
</td>
<tr>
";













print"

<tr> <td height='8'> </td> </tr>
<tr>
<td width='0' align='left'> <font size='2' face='arial' color='black'> <b> &nbsp; Receiver Person  </b> </font> </td>
<td align='left'> 
";

print"

: 


	 
<select  name='contact_name1'  id='text_mobile'>

<option value='$contact_name1'> $contact_namen1 </option>
";

//$result = mysql_query("SELECT * FROM product_category");


$result = mysql_query("SELECT * FROM `contact1`  ORDER BY `customer_name` ASC  LIMIT 0 , 60000 ");


while ($a_row = mysql_fetch_row($result)) {

	foreach ($a_row as $field) {
		
	}

print"
<option value='$a_row[0]'> $a_row[1] </option>
";
}


print"
</select>















<font size='2' face='arial' color='black'> <b> Mobile : </b> </font> <input type='text' name='mobile_contact1' value='$mobile_contact1' id='pr5'  size='2'> 
<font size='2' face='arial' color='black'> <b> Address : </b> </font> <input type='text' name='address_contact1' value='$address_contact1' id='pr5' size='3'> 




";
print"
</td>
<tr>
";












print"
<tr>
<td height='8'> </td>
</tr>
";

/*
print"
<tr> 
<td width='left'> 
<font face='arial' size='2' color='black'> 
&nbsp; <b> Project Name: </b> </font> </td>
<td width='left'> : <input type='text' name='project_name' value='$project_name' size='15' id='txt'>    &nbsp; 
</td>
</tr>
";
*/


/*
print"
<tr> 
<td width='left'> 
<font face='arial' size='2' color='black'> 
&nbsp; <b> Contact Person </b> </font> </td>
<td width='left'> : 

<input type='text' name='contact_name' value='$contact_name' size='15' id='txt'>    &nbsp; 

</td>
</tr>
";
*/









/*
print"
Contact Name: <input type='text' name='contact_name' value='$contact_name' size='15'>  

&nbsp;
 
Transport Name: <input type='text' name='transport_name' value='$transport_name' size='15'> 
</font> 
*/







print"


<tr> 

<td width='left'> 
<font face='arial' size='2' color='black'> 
&nbsp; <b> Product </b> </font> </td>
<td width='left'> : 
";

/*
<label for='tags'> </label>
<input type='text' id='tags' name='product_id' size='30' onblur='rnew()' onclick='rneww()'>
*/


print"
<span class='ui-widget'>
  <input type='text' id='tags' name='product_id'>
</span>
";


print"
<font size='2' face='arial' color='black'> <b> Price : </b> </font> <input type='text' name='price' size='3' id='txx_b'> 


<font size='2' face='arial' color='black'>  <b> Box : </b></font> <input type='text' name='box' size='3' id='txx_b'> 



<font size='2' face='arial' color='black'>  <b> Qty : <b> </font> <input type='text' name='qty' size='3' id='txx_q'> 

";

if($set_wa==1)
{
print"
<font size='2' face='arial' color='black'>  Warranty : </font> <input type='text' name='wa' size='4' id='txx'> 
";
}

if($set_discount==1)
{
print"
<font size='2' face='arial' color='black'>  Commi : </font> <input type='text' name='less_new' size='4' id='txx'> 
";
}


print"




<input type='hidden' name='ser' value='1'>

<input type='hidden' name='sk' value='1'>





<input type='hidden' name='ky' value='$kju'>

&nbsp;&nbsp;&nbsp;


<input type='submit' value='Enter' id='enter'>  
 


</td>

</tr>
";


print"
<tr>
<td height='8'> </td>
</form>
</tr>
";

/*
print"
<tr> 
<td width='left'> 
<font face='arial' size='2' color='black'> 
&nbsp; <b> Local Products </b> </font> </td>
<td width='left'> : <input type='text' name='p_des'  size='15' id='txt'>    &nbsp; 
</td>
</tr>
";
*/




/*

&nbsp;
<select name='product' id='bangla'>
";







for($i=1;$i<=$l;$i++)

{
print"
<option value=''> $pnn[$i] </option>
";

	for($j=1;$j<=$rd;$j++)
	{
		
	if($pi[$i]==$ca_id[$j])
	
	{
print"
<option value=''> &nbsp; $can_id[$j] </option>
";


$result = mysql_query("SELECT * FROM `product_name`  where sub_category_id='$cas_id[$j]'  ORDER BY `user_id` ASC  LIMIT 0 , 100000");

while ($a_row = mysql_fetch_row($result)) {

	foreach ($a_row as $field) {
		
	}
print"
<option value='$a_row[0]'> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  $a_row[2] -  Id-$a_row[0] </option>
";
}


}


	}
}


print"


</select>



*/


print"
</table>







<br>


<table align='center' width='880' cellpadding='3' cellspacing='1' bgcolor='E4DBDB'>

<tr bgcolor='FAFAFA'>
 <td height='25' bgcolor='' width='100' align='center'> <font face='arial' color='black' size='2'> <b> Remove </b> </font> </td>
 <td height='25' bgcolor='' width='250' align='center'> <font face='arial' color='black' size='2'> <b> Product Name </b> </font> </td>
";

if($cwp1==1)
{
print"
 <td height='25' bgcolor='' width='70' align='center'> <font face='arial' color='black' size='2'> <b> $cwp11 </b>  </font> </td>
";
}

if($cwp2==1)
{
print"
 <td height='25' bgcolor='' width='70' align='center'> <font face='arial' color='black' size='2'> <b> $cwp22 </b> </font> </td>
";
}

if($cwp3==1)
{
print"
 <td height='25' bgcolor='' width='70' align='center'> <font face='arial' color='black' size='2'> <b> $cwp33 </b> </font> </td>
";
}

if($cwp4==1)
{
print"
 <td height='25' bgcolor='' width='70' align='center'> <font face='arial' color='black' size='2'> <b> $cwp44 </b>  </font> </td>
";
}


print"


  <td height='25' bgcolor='' width='50' align='center'> <font face='arial' color='black' size='2'> <b> Qty. </b> </font> </td>


 <td height='25' bgcolor='' width='30' align='center'> <font face='arial' color='black' size='2'> <b> Unit </b></font> </td>
";


if($set_wa==1)
{
print"
 <td height='25' bgcolor='' width='100' align='center'> <font face='arial' color='black' size='2'> <b> Warranty </b>  </font> </td>
";

}




print" 
 <td height='25' bgcolor='' width='100' align='center'> <font face='arial' color='black' size='2'> <b> Rate </b>  </font> </td>
 

 
";


/*
print" 
 
 <td height='25' bgcolor='' width='100' align='center'> <font face='arial' color='black' size='2'> <b> Total </b> </font> </td>
 
 ";
 */
 
 
 
 if($set_discount==1)
{
 
 print"
 <td height='25' bgcolor='' width='100' align='center'> <font face='arial' color='black' size='2'> <b> Commission </b> </font> </td>
 ";
 
}
 
 
print"
 
 <td height='25' bgcolor='' width='100' align='center'> <font face='arial' color='black' size='2'>  <b> Total </b> </font> </td>
</tr>

";


if($e>=1)

{
	
/*	
if($dat>30 && $mon>5)
{
exit;	
}
*/


/*

  $_SESSION['cart_price'][$product_id]=$_SESSION['cart_price'][$product_id]+$price;
  $_SESSION['cart_unit'][$product_id]=$_SESSION['cart_unit'][$product_id]+$unit;
  $_SESSION['cart_com'][$product_id]=$_SESSION['cart_com'][$product_id]+$com;
*/





$qeu=0;

foreach($_SESSION['cart_price'] as $product_id => $price)
{
$qeu++;
$price_a[$qeu]=$price;
}

$qeu=0;

foreach($_SESSION['cart_com'] as $product_id => $com)
{
$qeu++;
$com_a[$qeu]=$com;
}


$qeu=0;

foreach($_SESSION['cart_local'] as $product_id => $local)
{
$qeu++;
$local_a[$qeu]=$local;
}


$qeu=0;

foreach($_SESSION['cart_wa'] as $product_id => $wa)
{
$qeu++;
$local_wa[$qeu]=$wa;
}






foreach($_SESSION['cart'] as $product_id => $quantity)
{

$qg++;

$sql="SELECT * FROM `product_name` WHERE user_id='$product_id' ";
$result=mysql_query($sql);
$arrp_new=mysql_fetch_array($result);


$arrp[21]=$price_a[$qg];
$arrp[19]=$com_a[$qg];
$arrp[29]=$local_a[$qg];

$total=$arrp[21]*$quantity;
$total3=$total;



$f_p=$arrp[19];
$f_len=strlen($f_p);
$f_u=$f_len-1;
$f_pp=str_replace("%","","$f_p");


if($f_p[$f_u]=='%')
{
$tg=$total*$f_pp;
$tg=$tg/100;
$arrp[19]=$tg;
}
else
{

}











$total=$total-$arrp[19];
$subtotal=$subtotal+$total;

$sew++;

/*
$sql="SELECT * FROM `product_category` WHERE user_id='$arrp[1]' ";
$result=mysql_query($sql);
$name=mysql_fetch_array($result);
*/






/*

$sql="SELECT * FROM `measurement` WHERE user_id='$arrp[14]' ";
$result=mysql_query($sql);
$arrpm=mysql_fetch_array($result);

$sql="SELECT * FROM `product_type` WHERE user_id='$arrp[15]' ";
$result=mysql_query($sql);
$arrpt=mysql_fetch_array($result);

*/


$qv=$qv+$quantity;



print"
<tr bgcolor='FFFFFF'>
 <td height='30'  width='100' align='center' bgcolor=''> <a href=\"sales.php?action=remove&i1d=$arrp_new[0]&sup=$id_supplier&dat=$dat&mon=$mon&yer=$yer&contact_name=$contact_name11&contact_name1=$contact_name111&transport_name=$transport_name1&sales_order=$sales_order1&project_name=$project_name&new_customer=$new_customer&new_mobile=$new_mobile&new_address=$new_address&ser=$ser&dcl=$dcl&tin=$tin\">  <img src='picture/remove.gif'> </a> $sew </td>
 ";



 
 print"
 <td height='30' bgcolor='' width='250' align='left'> <font face='arial' color='black' size='2'> &nbsp;

 
 ";
 

 print"
 $arrp_new[2]   
";

print"
$arrp[29] 	
"; 
 


print"
 $name_old[1] </font> </td>
";



if($cwp1==1)
{
print"
 <td height='30' bgcolor='' width='' align='center'> <font face='arial' color='black' size='2'> $arrp_new[3] </font> </td>
";
}


if($cwp2==1)
{
print"
 <td height='30' bgcolor='' width='' align='center'> <font face='arial' color='black' size='2'> $arrp_new[30] </font> </td>
 ";
}


if($cwp3==1)
{
print"
 <td height='30' bgcolor='' width='' align='center'> <font face='arial' color='black' size='2'> $arrp_new[31] </font> </td>
";
}



if($cwp4==1)
{
print"
 <td height='30' bgcolor='' width='' align='center'> <font face='arial' color='black' size='2'> $arrp_new[32] </font> </td>
";
}





print"
 <td height='30' bgcolor='' width='50' align='center'> <font face='arial' color='black' size='2'> $quantity </font> </td>


 <td height='30' bgcolor='' width='' align='center'> <font face='arial' color='black' size='2'> $arrp_new[22] </font> </td>





 ";
 
if($set_wa==1)
{	
print"
 <td height='25' bgcolor='' width='' align='center'> <font face='arial' color='black' size='2'> $local_wa[$sew] </font> </td>
";
}

$arow8= number_format($arrp[21], 2);


print"
 
 <td height='30' bgcolor='' width='' align='center'> <font face='arial' color='black' size='2'> $arow8 </font> </td>
 
 

 
 ";
 
 /*
 print"
 <td height='30' bgcolor='' width='100' align='center'> <font face='arial' color='black' size='2'> $total3 </font> </td>
 ";
*/

if($set_discount==1)
{
 
 if($f_p[$f_u]=='%')
 {
print"
 <td height='30' bgcolor='' width='100' align='left'> <font face='arial' color='black' size='2'> $f_pp % = $arrp[19] </font> </td>
";

 }
 else
 {
print"
 <td height='30' bgcolor='' width='100' align='left'> <font face='arial' color='black' size='2'> $arrp[19] </font> </td>
";
	 
 }


} 


$total_f= number_format($total, 2);

	 
print" 
<td height='30' bgcolor='' width='100' align='center'> <font face='arial' color='black' size='2'> $total_f </font> </td>
</tr>
";





$total7=$total7+$total3;
$lesst=$lesst+$arrp[19];



}





}





print"


<tr bgcolor='FFFFFF'>
 <td height='30'  width='100' align='center' bgcolor=''>  </td>
 <td height='30' bgcolor='' width='250' align='center'> <font face='arial' color='black' size='2'>  </font> </td>
";


if($cwp1==1)
{
print"
<td> </td>
";
}


if($cwp2==1)
{
print"
<td> </td>
";
}


if($cwp3==1)
{
print"
<td>  </td>
";
}


if($cwp4==1)
{
print"
<td>  </td>
";
}


print"
 <td height='30' bgcolor='' width='100' align='center'> <font face='arial' color='black' size='2'> $qv  </font> </td>
 


 <td> </td>

 ";

if($set_wa==1)
{	
print"
 <td> </td>
";
}


print"
 <td height='30' bgcolor='' width='50' align='center'> <font face='arial' color='black' size='2'>  </font> </td>
";

/*
print"
 <td height='30' bgcolor='' width='100' align='center'> <font face='arial' color='black' size='2'> $total7 </font> </td>
 ";
 */
 
 
 
 if($set_discount==1)
{
	print"
 <td height='30' bgcolor='' width='100' align='left'> <font face='arial' color='black' size='2'> $lesst </font> </td>
 ";
}


print"
 
 
 <td height='30' bgcolor='' width='100' align='center'> <font face='arial' color='black' size='2'> $sub_total </font> </td>
</tr>
";



//print" $less - $stotal dfddf";
 
$less=trim($_POST['less']);
$discount_less=trim($_POST['discount_less']);
$discount_less2=trim($_POST['discount_less']);


$f_p_dis=$discount_less;
$f_len_dis=strlen($f_p_dis);
$f_u_dis=$f_len_dis-1;
$f_pp_dis=str_replace("%","","$f_p_dis");


if($f_p_dis[$f_u_dis]=='%')
{
$tg_dis=$subtotal*$f_pp_dis;
$tg_dis=$tg_dis/100;
$discount_less=$tg_dis;
$f_ppe_dis="$f_pp_dis%";
}
else
{
$f_ppe_dis="";
}





$subtotal_last=$subtotal-$discount_less;




//$sdq1=($discount*$subtotal);


$stotal=$subtotal_last+$less;

$stotal=$stotal+$service;

$stotal_vat=($vat*$stotal);
$stotal_vat=($stotal_vat/100);


$stotal_vat = number_format($stotal_vat, 2);
$vat_tk=str_replace(",","","$stotal_vat");



$stotal_tax=($tax2*$stotal);
$stotal_tax=($stotal_tax/100);


$stotal_tax = number_format($stotal_tax, 2);
$tax2_tk=str_replace(",","","$stotal_tax");



$stotal2=$stotal+$vat_tk+$tax2_tk;


$tax=0.00;


$due=$stotal2-$payment;


$due=$due-$adjust;






print"
</table>
";







print"
<table align='center' width='1000' cellpadding='0' cellspacing='0'>
<tr> <td height='10'> </td> </tr>
</table>
";

if($payment=="")
{
$payment="";
}





$pui=$balance+$stotal2;

$new_pui=$pui-$payment;



/*
print"
<table align='center' width='800' cellpadding='0' cellspacing='1' bgcolor='black'>
<tr> 
<td height='60' bgcolor='white'> 

<table align='center' width='800' cellpadding='0' cellspacing='0'>
<tr> 
<td width='20'> </td>
<td width='150' align='center'> <font face='arial' size='3'> Pre Bal (Tk) </font> </td>
<td width='50'  align='center'> <font face='arial' size='3'> + </font> </td>
<td width='150'  align='center'> <font face='arial' size='3'> Sales (Tk) </font> </td>
<td width='50'  align='center'> <font face='arial' size='3'> - </font> </td>
<td width='150'  align='center'> <font face='arial' size='3'> Payment (Tk) </font> </td>
<td width='50'  align='center'> <font face='arial' size='3'> = </font> </td>
<td width='150'  align='center'> <font face='arial' size='3'> New Bal (Tk) </font> </td>
<td width='20'> </td>
</tr>

<tr> 
<td width='20'> </td>
<td width='150' align='center'> <font face='arial' size='3'> $balance (Tk) </font> </td>
<td width='50'  align='center'> <font face='arial' size='3'>  </font> </td>
<td width='150'  align='center'> <font face='arial' size='3'> $stotal2 (Tk) </font> </td>
<td width='50'  align='center'> <font face='arial' size='3'>  </font> </td>
<td width='150'  align='center'> <font face='arial' size='3'> $payment (Tk) </font> </td>
<td width='50'  align='center'> <font face='arial' size='3'>  </font> </td>
<td width='150'  align='center'> <font face='arial' size='3'> $new_pui (Tk) </font> </td>
<td width='20'> </td>
</tr>



</table>

</td> 
</tr>
</table>
";


*/








print"

<table align='center' width='880' cellpadding='0' cellspacing='0'>

<tr bgcolor='white'> 

<td width='400'  align='center' valign='top' bgcolor='F2F2F2'> 



<table align='center' width='500' cellpadding='0' cellspacing='0' bgcolor='F2F2F2'>





<tr> 
<td width='0'> </td>
<td width='170' align='left'> <font color='black' face='arial' size='2'>  Commission To   </font>
</td>
<form  name='bv' action='sales.php' method='POST'>
<td width='430' align='left'> 
: 
<input type='text' name='comission_to' value='$comission_to' size='25'> 

</td>
</tr>



<tr> <td height='5'>  </td>  </tr>

";

print"
<tr> 


<td> </td>

<td width='' align='left'> <font color='black' face='arial' size='2'>  Commission Amount   </font>
</td>

<td width='' align='left'> : 
<input type='text' name='comission_amount' value='$comission_amount' size='25'> Tk.
</td>
</tr>



<tr> <td height='5'>  </td>  </tr>




<tr> 

<td> </td>
<td width='' align='left'> <font color='black' face='arial' size='2'> Discount  </font>
</td>

<td width='' align='left'> 
:
<input type='text' name='discount_less' value='$discount_less2' size='25'> Tk.
<input type='hidden' name='ser' value='5'>
</td>
</tr>

<tr> <td height='5'>  </td>  </tr>

";


if($set_in==1)
{
print"
<tr> 
<td> </td>
<td width='' align='left'> <font color='black' face='arial' size='2'> Installation Charge   </font>
</td>
<td width='' align='left'>

: 

<input type='text' name='service' value='$service' size='25'> Tk.
</td>
</tr>

<tr> <td height='5'> </td> </tr>
";
}


print"
<tr> 
<td> </td>
<td width='' align='left'> <font color='black' face='arial' size='2'> Carring Cost  </font>
</td>
<td width='' align='left'> 
:
<input type='text' name='less' value='$less' size='25'> Tk.
</td>
</tr>

<tr> <td height='5'> </td> </tr>







";


if($set_vat==1)

{
print"

<tr> 

<td> </td>
<td width='' align='left'> <font color='black' face='arial' size='2'> Vat  </font>
</td>
<td width='' align='left'> 
:
<input type='text' name='vat' value='$vat' size='25'> % Tk.
</td>
</tr>

<tr> <td height='5'> </td> </tr>



<tr> 
<td> </td>
<td width='' align='left'> <font color='black' face='arial' size='2'> Tax  </font>
</td>
<td width='' align='left'> 
:
<input type='text' name='tax2' value='$tax2' size='25'> % Tk.
</td>
</tr>


<tr> <td height='5'> </td> </tr>
";
}




print"
<tr> 

<td> </td>
<td width='' align='left'> <font color='black' face='arial' size='2'>  Payment Amount  </font></td>
<td width='' height='30' align='left'> 

:

<input type='text' name='payment' value='$payment' size='25'> Tk.
</td>
</tr>


<tr> 

<td> </td>
<td width='' align='left'> <font color='black' face='arial' size='2'>  Adjust Amount  </font></td>
<td width='' height='30' align='left'> 

:

<input type='text' name='adjust_amount' value='$adjust' size='25'> Tk.
</td>
</tr>






<tr> 
<td> </td>
<td width='' align='left'> <font color='black' face='arial' size='2'> Payment Mode </font> </td>
<td width='' height='30' align='left'>
:
 
<select name='payment_mode' id='p_mode'>

<option value='$payment_mode'>$payment_moden</option>

";

print"
<option value=''> Cash</option>
";

//$result = mysql_query("SELECT * FROM `bank`   ORDER BY `user_id` ASC  LIMIT 0 , 1000");


$result = mysql_query("SELECT * FROM `bank`  ORDER BY `bank_name` ASC ");



while ($a_row = mysql_fetch_row($result)) {

	foreach ($a_row as $field) {
		
	}
print"
<option value='$a_row[0]'>  $a_row[1] </option>
";
}





print"
</select>
</td>
</tr>






<tr> 


<td> </td>
<td width='' align='left'> <font color='black' face='arial' size='2'> Cheque No  </font></td>
<td width='' height='30' align='left' valign='top'>

:
 
<input type='text' name='check_no' size='25' value='$check_no'>


</td>


</tr>







<tr> 

<td> </td>
<td width='' align='left'> <font color='black' face='arial' size='2'> Cheque Amount    </font></td>
<td width='' height='30' align='left' valign='top'> 

:

<input type='text' name='check_amount' size='25' value='$check_amount'>


</td>


</tr>










<tr> 

<td> </td>
<td width='' align='left'> <font color='black' face='arial' size='2'> Cheque Issu Date  </font></td>
<td width='' height='30' align='left' valign='top'> 
:

<select name='idat' id='crt'>
<option name='$idat'>$idat</option>
<option name='01'>01</option>
<option name='02'>02</option>
<option name='03'>03</option>
<option name='04'>04</option>
<option name='05'>05</option>
<option name='06'>06</option>
<option name='07'>07</option>
<option name='08'>08</option>
<option name='09'>09</option>
<option name='10'>10</option>
<option name='11'>11</option>
<option name='12'>12</option>
<option name='13'>13</option>
<option name='14'>14</option>
<option name='15'>15</option>
<option name='16'>16</option>
<option name='17'>17</option>
<option name='18'>18</option>
<option name='19'>19</option>
<option name='20'>20</option>
<option name='21'>21</option>
<option name='22'>22</option>
<option name='23'>23</option>
<option name='24'>24</option>
<option name='25'>25</option>
<option name='26'>26</option>
<option name='27'>27</option>
<option name='28'>28</option>
<option name='29'>29</option>
<option name='30'>30</option>
<option name='31'>31</option>
</select>

<select name='imon' id='crt'>
<option name='$imon'>$imon</option>
<option name='01'>01</option>
<option name='02'>02</option>
<option name='03'>03</option>
<option name='04'>04</option>
<option name='05'>05</option>
<option name='06'>06</option>
<option name='07'>07</option>
<option name='08'>08</option>
<option name='09'>09</option>
<option name='10'>10</option>
<option name='11'>11</option>
<option name='12'>12</option>
</select>

<select name='iyer' id='crt2'>
<option name='$iyer'>$iyer</option>
";

include_once('year1.php');

print"

</select>

</td>
</tr>









<tr> 

<td> </td>
<td width='' align='left'> <font color='black' face='arial' size='2'> Note  </font></td>
<td width='' height='30'  align='left' valign='top'>
:
 
<input type='hidden' name='supplier' value='$id_supplier'>

<input type='hidden' name='dat' value='$dat'>
<input type='hidden' name='mon' value='$mon'>
<input type='hidden' name='yer' value='$yer'>

<input type='hidden' name='transport_name' value='$transport_name'>

<input type='hidden' name='contact_name' value='$contact_name'>
<input type='hidden' name='contact_name1' value='$contact_name1'>



<input type='hidden' name='memo_no' value='$me'>
<input type='hidden' name='sales_order' value='$sales_order'>




<input type='hidden' name='dcl' value='$dcl'>
<input type='hidden' name='tin' value='$tin'>




<input type='hidden' name='new_customer' value='$new_customer'>
<input type='hidden' name='new_address' value='$new_address'>
<input type='hidden' name='new_mobile' value='$new_mobile'>


<input type='hidden' name='project_name' value='$project_name'>




<input type='text' size='25' name='comments' value='$comments' size='20'>



</td>

</tr>

<tr>
<td>
</td>


<td>
</td>

<td align='left'>

&nbsp;

<input type='submit' value='Add To Payment ' ID='pr'>
</td>

</form>
</tr>






<tr> 
<td> </td>
<td> </td>
<form  action='salememo_demo.php' method='POST' target='a_blank'>
<td align='left'> 



<input type='hidden' name='supplier' value='$supplier'>

<input type='hidden' name='dat' value='$dat'>
<input type='hidden' name='mon' value='$mon'>
<input type='hidden' name='yer' value='$yer'>

<input type='hidden' name='check_no' value='$check_no'>
<input type='hidden' name='idat' value='$idat'>
<input type='hidden' name='imon' value='$imon'>
<input type='hidden' name='iyer' value='$iyer'>


<input type='hidden' name='less' value='$less'>
<input type='hidden' name='payment' value='$payment'>
<input type='hidden' name='comments' value='$comments'>
<input type='hidden' name='due' value='$due'>

<input type='hidden' name='payment_mode' value='$payment_mode'>
<input type='hidden' name='discount_less' value='$discount_less2'>
<input type='hidden' name='balance' value='$balance'>


<input type='hidden' name='transport_name' value='$transport_name'>
<input type='hidden' name='contact_name' value='$contact_name'>
<input type='hidden' name='memo_no' value='$me'>
<input type='hidden' name='sales_order' value='$sales_order'>


<input type='hidden' name='dcl' value='$dcl'>
<input type='hidden' name='tin' value='$tin'>


<input type='hidden' name='new_customer' value='$new_customer'>
<input type='hidden' name='new_address' value='$new_address'>
<input type='hidden' name='new_mobile' value='$new_mobile'>
<input type='hidden' name='check_amount' value='$check_amount'>

";

/*
print"
<input type='submit' value='Demo Print'>
";
*/


print"
</td>
</form>

</tr>











<tr>
<td></td>
<td> </td>

<form  name='nf' action='salememo.php' method='POST' target='a_blank'>
<td align='left' bgcolor='#F2F2F2'> 


<input type='hidden' name='supplier' value='$supplier'>


<input type='hidden' name='dat' value='$dat'>
<input type='hidden' name='mon' value='$mon'>
<input type='hidden' name='yer' value='$yer'>

<input type='hidden' name='check_no' value='$check_no'>
<input type='hidden' name='idat' value='$idat'>
<input type='hidden' name='imon' value='$imon'>
<input type='hidden' name='iyer' value='$iyer'>


<input type='hidden' name='less' value='$less'>
<input type='hidden' name='payment' value='$payment'>
<input type='hidden' name='comments' value='$comments'>
<input type='hidden' name='due' value='$due'>

<input type='hidden' name='payment_mode' value='$payment_mode'>


<input type='hidden' name='discount_less' value='$discount_less2'>

<input type='hidden' name='balance' value='$balance'>


<input type='hidden' name='transport_name' value='$transport_name'>
<input type='hidden' name='contact_name' value='$contact_name'>
<input type='hidden' name='contact_name1' value='$contact_name1'>




<input type='hidden' name='memo_no' value='$me'>
<input type='hidden' name='sales_order' value='$sales_order'>



<input type='hidden' name='new_customer' value='$new_customer'>
<input type='hidden' name='new_address' value='$new_address'>
<input type='hidden' name='new_mobile' value='$new_mobile'>
<input type='hidden' name='check_amount' value='$check_amount'>

<input type='hidden' name='project_name' value='$project_name'>

<input type='hidden' name='vat' value='$vat'>
<input type='hidden' name='tax2' value='$tax2'>

<input type='hidden' name='service' value='$service'>



<input type='hidden' name='dcl' value='$dcl'>
<input type='hidden' name='tin' value='$tin'>


<input type='hidden' name='adjust_amount' value='$adjust'>
<input type='hidden' name='comission_to' value='$comission_to'>
<input type='hidden' name='comission_amount' value='$comission_amount'>





";

//if($subtotal>0)
//{


if($ser==5)
{
print"
<br>

&nbsp;

<input type='submit' value='Save & Print' id='enter2'>
";
}
//}
print"
</td>





</tr>
";



print"

</table>


<input type='text' name='mk' id='mkk'>

</td>

</form>




";

/////////////////////////////////////////////////







$subtotal_f= number_format($subtotal, 2);

$discount_less_f= number_format($discount_less, 2);

$subtotal_last_f= number_format($subtotal_last, 2);
$less_f= number_format($less, 2);
$stotal_f= number_format($stotal, 2);


$vat_tk_f= number_format($vat_tk, 2);
$tax2_tk_f= number_format($tax2_tk, 2);
$stotal2_f= number_format($stotal2, 2);

$payment_f= number_format($payment, 2);
$adjust_f= number_format($adjust, 2);
$due_f= number_format($due, 2);








print"

<td width='130' bgcolor='#F2F2F2'> </td>

<td width='250' valign='top' align='center' bgcolor='#F2F2F2'>
<table align='center' width='250' cellpadding='5' cellspacing='1' bgcolor='cccccc'>
<tr bgcolor='white'>
<td bgcolor='' height='30' width='165' align='left'> <font size='2' face='arial' color='black'> Total Amount  </font> </td> 
<td bgcolor='' height='30' width='85' align='right'><font size='2' face='arial' color='black'> $subtotal_f &nbsp; </font> </td> 
</tr>


<tr bgcolor='white'>
";

if($f_p_dis[$f_u_dis]=='%')
{
print"
<td bgcolor='' height='30' width='' align='left'> <font size='2' face='arial' color='black'>Discount $f_ppe_dis  </font> </td> 
";
}
else
{
print"
<td bgcolor='' height='30' width='' align='left'> <font size='2' face='arial' color='black'> Discount  </font> </td> 
";
}
	




print"
<td bgcolor='' height='30' width='' align='right'><font size='2' face='arial' color='black'> $discount_less_f &nbsp; </font> </td> 
</tr>


<tr bgcolor='white'>
<td bgcolor='' height='30' width='' align='left'> <font size='2' face='arial' color='black'> Total  </font> </td> 
<td bgcolor='' height='30' width='' align='right'><font size='2' face='arial' color='black'> $subtotal_last_f &nbsp;  </font> </td> 
</tr>
";


if($set_in==1)
{
print"
<tr bgcolor='white'> 
<td bgcolor='' height='30' width='' align='left'> <font size='2' face='arial' color='black'> Installation Charge  </font> </td> 
<td bgcolor='' height='30' width='' align='right'><font size='2' face='arial' color='black'> $service  &nbsp; </font> </td> 
</tr>
";
}


print"
<tr bgcolor='white'> 
<td bgcolor='' height='30' width='' align='left'> <font size='2' face='arial' color='black'> Carring Cost  </font> </td> 
<td bgcolor='' height='30' width='' align='right'><font size='2' face='arial' color='black'> $less_f &nbsp;  </font> </td> 
</tr>







<tr bgcolor='white'> 
<td bgcolor='' height='30' width='' align='left'> <font size='2' face='arial' color='black'> Sub Total  </font> </td> 
<td bgcolor='' height='30' width='' align='right'><font size='2' face='arial' color='black'> $stotal_f &nbsp;  </font> </td> 
</tr>
";

if($vat!="")
{
print"
<tr bgcolor='white'> 
<td bgcolor='' height='30' width='' align='left'> <font size='2' face='arial' color='black'> Vat $vat %  </font> </td> 
<td bgcolor='' height='30' width='' align='right'><font size='2' face='arial' color='black'> $vat_tk_f   &nbsp; </font> </td> 
</tr>
";
}

if($tax2!="")
{
print"
<tr bgcolor='white'> 
<td bgcolor='' height='30' width='' align='left'> <font size='2' face='arial' color='black'> Tax $tax2 %  </font> </td> 
<td bgcolor='' height='30' width='' align='right'><font size='2' face='arial' color='black'> $tax2_tk_f &nbsp; </font> </td> 
</tr>
";
}


if($vat!="" || $tax2!="")
{
print"
<tr bgcolor='white'> 
<td bgcolor='' height='30' width='' align='left'> <font size='2' face='arial' color='black'> Subtotal  </font> </td> 
<td bgcolor='' height='30' width='' align='right'><font size='2' face='arial' color='black'> $stotal2_f &nbsp; </font> </td> 
</tr>
";
}


print"
<tr bgcolor='white'> 
<td bgcolor='' height='30' width='' align='left'> <font size='2' face='arial' color='black'> Payment Amount </font> </td> 
<td bgcolor='' height='30' width='' align='right'><font size='2' face='arial' color='black'>$payment_f  &nbsp; </font> </td> 
</tr>


<tr bgcolor='white'> 
<td bgcolor='' height='30' width='' align='left'> <font size='2' face='arial' color='black'> Adjust Amount   </font> </td> 
<td bgcolor='' height='30' width='' align='right'><font size='2' face='arial' color='black'> $adjust_f  &nbsp; </font> </td> 
</tr>






<tr bgcolor='white'> 
<td bgcolor='' height='30' width='' align='left'> <font size='2' face='arial' color='black'> Due Amount </font> </td> 
<td bgcolor='' height='30' width='' align='right'><font size='2' face='arial' color='black'> $due_f &nbsp; </font> </td> 
</tr>

</table> 
</td>
</tr>


</table>


";






















print"

</td>


</tr>
</table>




</body>

</html>


";


?>