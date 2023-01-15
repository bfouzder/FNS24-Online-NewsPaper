<?php
include_once('dbconnection.php');
session_start();






$result = mysql_query("SELECT * FROM `salememo`  ORDER BY `money_id` DESC  LIMIT 0 , 1 ");

while ($a_row = mysql_fetch_row($result)) {

	foreach ($a_row as $field) {
		
	}

$num=$a_row[1];

}



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





print"

<html>

<head>
<title> Sales </title>
<meta http-equiv='content-type' content='text/html;charset=utf-8' />

<base target='_parent' /> 
";

//<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
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






function faka()
{
$( "#supplier" ).val("");
}

function faka2()
{
$( "#tags" ).val("");
}




function pp()
{
document.fuu.submit();
document.fuu.reset();

}





function find()
{
var tweet_txt=$('#supplier').val();

  if($.trim(tweet_txt)!='')
{
$.ajax ({
url:"new_n.php",
method:"POST",
data:{supplier:tweet_txt},
dataType:"text",
success:function(data)
{
//alert(data);
//document.fuu.supplier.value=data;
}

});

$('#ttt').load("new3.php").fadeIn("slow");
}
}







function ck1()
{
var tags_txt=$('#tags').val();

  if($.trim(tags_txt)!='')
{
$.ajax ({
url:"new_tags.php",
method:"POST",
data:{tags:tags_txt},
dataType:"text",
success:function(data)
{

}

});

$('#tttt').load("new3_tags.php").fadeIn("slow");
}
}


















</script>
  
 



<?php

include_once('style.php');

print"
<style>

#enter
{
height:32px;
}

#tags2_sales
{
width:430px;
height:23px;
}









#dat1
{
height:17px;
}





</style>

";


print"

<script language='javascript'>


if($ser==5)
{

function mnnn()
{
	
document.nf.mk.focus();
}

	

}
</script>
";







print"

<style>

#tags
{
width:290px;
}
</style>


</head>



<body  bgcolor='black' onload='cll()'>
";


//include_once('header2.php');

print"
<table align='center' width='1206' cellpadding='0' cellspacing='0' height='0' bgcolor='#A1BBD7'>
<tr bgcolor=''> 
<td align='left' height='25'> <font size='2'> <b>  &nbsp;&nbsp; <a href='create.php'> <b> Home </b> </a> &nbsp; | &nbsp; <a href='sales7.php'> <b> Sales </b> </a>  | </font> </td>
</tr>
</table>

";


print"
<table align='center' width='1200' cellpadding='0' cellspacing='1' height='' bgcolor='gray'>
<tr bgcolor='white'> 
";



print"



<td align='center' valign='top' width='900' bgcolor='white'>  

<table align='center' width='900' cellpadding='0' cellspacing='0' bgcolor='#F2F2F2'>

<tr> <td height='2'> </td> </tr>

<tr> 

<td width='900' bgcolor='' align='center' valign='top' height='900'>

<table align='center' width='900' cellpadding='0' cellspacing='0'>


<tr> 

<form name='fuu' action='salememo.php' target='popup' method='POST'> 

<td height='0'> </td> </tr>




";
/*
<tr> <td height='5' align='left'>

 &nbsp;&nbsp;New Custo : 
 <input type='text' name='new_customer' size='20' value='$new_customer'> 
 &nbsp; Address: 
 <input type='text' name='new_address' size='20' value='$new_address'> 
  &nbsp; Mobile: 
 <input type='text' name='new_mobile' size='20' value='$new_mobile'> 
 
 
 </td> </tr>

*/










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

/*
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

<select name='dat'>
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

<select name='mon'>
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

<select name='yer'>
<option name='$yer'>$yer</option>

";

include_once('year.php');

print"

</select>
";








print"
&nbsp;&nbsp;&nbsp;&nbsp;
";
*/

?>






<?php
/*

<a href="#"  onclick="window.open('product_entry.php','name','width=700,height=520,toolbar=no,location=no,directories=no,status=no,menubar=no, scrollbars=no, left=300,top=140,resizable=no, copyhistory=no,titlebar=no')"> <font color='black'> <b> Create New Product </b> </font> </a>

*/
/*
print"

<a href='#' >  <font color='red'> <b> Due ($balance)   </b> </font> </a>



</td>



</tr>
";

*/



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
<td width='left'> : <input type='text' name='new_customer' value='$new_customer' size='15'>  &nbsp; 
 
</font>
</td>
</tr>
";


}

*/







print"

<tr> <td height='4'> </td> </tr>

<tr>
<td width='0' align='left'> <font size='2' face='arial' color='black'> <b> &nbsp; Invoice No  </b> </font> </td>
<td align='left'> 
";


print"
: 

<input type='text' name='memo_no' value='$me' readonly size='15'>
";
print"


<font face='arial' size='2' color='black'> 
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

<b> PO NO : </b> </font> 


<input type='text' name='sales_order' value='$sales_order'  size='5'>

&nbsp;


<font face='arial' size='2' color='black'> 
<b> DCL NO : </b> </font> 



<input type='text' name='dcl' value='$dcl'  size='5'>

&nbsp;


<font face='arial' size='2' color='black'> 
<b> TIN NO : </b> </font> 


<input type='text' name='tin' value='$tin'  size='5'>

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

<font size='2' face='arial' color='black'> <b> Stock : </b> </font> <input type='text' name='sale_stock'  readonly size='1'> 
</font> 

";


?>



<?php


print"

</td>

<tr>

";

























print"

<tr> <td height='4'> </td> </tr>

<tr>
<td width='0' align='left'> <font size='2' face='arial' color='black'> <b> &nbsp; Customer Name  </b> </font> </td>
<td align='left'> 
";





/*
print"
: 
<label for='tags2'> </label>
<input type='text' id='tags2_sales' name='supplier' value='$id_supplier' size='10' onblur='ro()'>
";
*/




print"
:
<span class='ui-widget'>
  <input type='text' id='supplier' name='supplier' onclick='faka()' onblur='find()'>
";




/*
print"
&nbsp;&nbsp;
<font size='2' face='arial' color='black'> <b> P_Rate : </b> </font> <input type='text' name='sale_price1'  readonly size='1'> 
&nbsp;&nbsp;&nbsp;&nbsp;
<font size='2' face='arial' color='black'> <b> Box : </b> </font> <input type='text' name='boxq'  readonly size='1'> 
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<font size='2' face='arial' color='black'> <b> Rate : </b> </font> <input type='text' name='sale_price'  readonly size='1'> 
";
*/


?>



<?php


print"
</span>

<span id='ttt'>

</span>


<span id='tttt'>

</span>

</td>

<tr>

";





/*
print"
<tr> <td height='2'> </td> </tr>
<tr>
<td width='0' align='left'> <font size='2' face='arial' color='black'> <b> &nbsp; Sales Person  </b> </font> </td>
<td align='left'> 
";

print"
: 
";





print"









<font size='2' face='arial' color='black'> <b> Mobile : </b> </font> <input type='text' name='mobile_contact' value='$mobile_contact' id='pr5'  size='2'> 
<font size='2' face='arial' color='black'> <b> Address : </b> </font> <input type='text' name='address_contact' value='$address_contact' id='pr5' size='3'> 




";
print"
</td>
<tr>
";
*/











/*

print"

<tr> <td height='2'> </td> </tr>
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
*/












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



print"
<tr>
<td height='4'> </td>
</tr>
";





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
<input type='text' id='tags' name='product_id' size='30'>
*/



print"
<span class='ui-widget'>
  <input type='text' id='tags' name='tags' onblur='ck1()' onclick='faka2()'>
</span>
";


print"
<font size='2' face='arial' color='black'> <b> Price : </b> </font> <input type='text' name='price' size='3' id='txx_b'> 
";

/*
<font size='2' face='arial' color='black'>  <b> Box : </b></font> <input type='text' name='box' size='3' id='txx_b'> 
*/

print"
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


<input type='button' value='Enter' id='enter' onclick='bl()'>  
 ";



//<input type='button' value='Enter' id='enter' onclick='on_new()'>  
 
print"
&nbsp;

<input type='reset' value='Clear' id='enter'  onclick='cll()'>


</td>

</tr>
";


print"
<tr>
<td height='2'> </td>

</tr>
";





print"
</table>







<br>


<table align='center' width='880' cellpadding='3' cellspacing='1' bgcolor='E4DBDB'>

<tr bgcolor='cccccc'>
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












print"
</table>

";







print"
<table align='center' width='' cellpadding='0' cellspacing='0'>
<tr> <td height='10'> </td> </tr>
</table>
";













print"
</td>


<td width='1' bgcolor='#D1D1D1'> .</td>

<td width='300' bgcolor='' valign='top'> 



<table align='center' width='300' cellpadding='0' cellspacing='0'>
<tr> 
<td align='center' height='40' bgcolor='#DDDDDD'> 
";
?>

<a href="#"  onclick="window.open('customer_new.php','name','width=600,height=400,toolbar=no,location=no,directories=no,status=no,menubar=no, scrollbars=no, left=300,top=140,resizable=no, copyhistory=no,titlebar=no')"> <font size='3' color='black'> <b> Create New Customer </b> </font>  </a>

<?php
print"

</td> 
</tr>

</table>

<table align='center' width='300' cellpadding='4' cellspacing='0'>


<tr>
<td align='left' width='121'>

<font face='arial' color='#716E6E' size='2'> <b>  Date </b> </font>

</td>

<td align='left' width='179'>
:
<select name='dat'>
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

<select name='mon'>
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

<select name='yer'>
<option name='$yer'>$yer</option>

";

include_once('year.php');

print"

</select>
</td>
</tr>




<tr>

<td align='left'> <font face='arial' color='#716E6E' size='2'>  <b> Sales Person    </b> </font> 
</td>
<td align='left'>
:
<div id='se'>
";


/*
print"	 
<select  name='contact_name'  id='cus'>

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
";
*/

print"
</div>
";

/*
print"
<div id='se'>
";



print"
</div>
";
*/
print"
</td> 
</tr>
";


print"
<tr>
<td height='20'> </td>
</tr>

";

/*
<tr> 
<td align='left' width='100'> 
<font face='arial' color='#716E6E' size='2'>  <b> Name  </b> </font>
</td>

<td align='left' width='190'> :
<input type='text' name='new_customer' id='cus' size='7'>
</td> 
</tr>





<tr> 
<td align='left'> 
<font face='arial' color='#716E6E' size='2'>   <b> Mobile  </b> </font> 
</td>
<td align='left'>
:
<input type='text' name='new_mobile' id='cus' size='7'>
</td> 
</tr>





<tr> 
<td align='left'> 
<font face='arial' color='#716E6E' size='2'> 
<b> Address  </b> </font> 
</td>
<td align='left'>
:
<input type='text' name='new_address' id='cus' size='7'>
</td> 
</tr>


";

*/


print"
</table>


<table align='center' width='295' cellpadding='0' cellspacing='0'>
<tr>
<td valign='top'>
<table align='center' width='295' cellpadding='2' cellspacing='0'>



<tr> <td height='5'> </td> </tr>


<tr> 
<td align='left' width='120'> 
<font face='arial' color='black' size='2'>  Total   </font> 
</td>
<td align='left' width='165'>
:

<input type='text' name='subtotal'    readonly  size='13' onblur='chc()'>
</td> 
</tr>


<tr> 
<td align='left'> 
<font face='arial' color='black' size='2'>  Special Disc   </font> 
</td>
<td align='left'>
:

<input type='text' name='discount_lessp'  value='' id='cus3' size='1' onblur='chc()'>
%

<input type='text' name='discount_less'  value='' id='cus3' size='1' onblur='chc()'>
Tk.

</td> 
</tr>









<tr> 
<td align='left'> 
<font face='arial' color='black' size='2'>   Carring Cost   </font> 
</td>
<td align='left'>
:
<input type='text' name='less'  size='13' onblur='chc()'> 

</td> 
</tr>








<tr> 
<td align='left'> 
<font face='arial' color='black' size='2'>   Total   </font> 
</td>
<td align='left'>
:
<input type='text' name='stotal1' value='$stotal' readonly  size='13' onblur='chc()'>
</td> 
</tr>



<tr> 
<td align='left'> 
<font face='arial' color='black' size='2'>   Vat  </font> 
</td>
<td align='left'>
:
<input type='text' name='vat'  id='cus3' size='1' onblur='chc()'> %

<input type='text' name='vat_tk'  id='cus3' size='1' onblur='chc()'>

 Tk.
 
</td> 
</tr>




<tr> 
<td align='left'> 
<font face='arial' color='black' size='2'>   Subtotal   </font> 
</td>
<td align='left'>
:
<input type='text' name='stotal' value='$stotal' readonly  size='13' onblur='chc()'>
</td> 
</tr>





<tr> 
<td align='left'> 
<font face='arial' color='black' size='2'> 

 Pay Mode   </font> 
</td>
<td align='left'>
:

<select name='payment_mode' id='cus1'>
";

print"
<option value=''>Cash</option>
";



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


<tr> <td height='5'> </td> </tr>


<tr> 
<td align='left'> 
<font face='arial' color='black' size='2'>   Payment   </font> 
</td>
<td align='left'>

:

<input type='text' name='payment'  value='$payment' size='13' onblur='cpp()'>
</td> 
</tr>


<tr> <td height='5'> </td> </tr>



<tr> 
<td align='left'> 
<font face='arial' color='black' size='2'>   Due   </font> 
</td>
<td align='left'>
:

<input type='text' name='due'  value='$due'  readonly size='13' onblur='cpp()'>
</td> 
</tr>



";




print"
<tr> 
<td align='left' id='pl7'> 
<font face='arial' color='black' size='2'>  Cheque No   </font> 
</td>
<td align='left' id='pl8'>
:
<input type='text' name='check_no' size='13'> 
</td> 
</tr>


<tr> <td height='5' id='pl9'> </td> </tr>




















<tr> 
<td align='left' id='pl7'> 
<font face='arial' color='black' size='2'>   Cheque Issu Date  </font> 
</td>
<td align='left' id='pl8'>
:




<select name='idat'>
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

<select name='imon'>
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

<select name='iyer'>
<option name='$iyer'>$iyer</option>
";

include_once('year1.php');

print"

</select>

</td> 
</tr>


<tr> <td height='5' id='pl9'> </td> </tr>














<tr> 
<td align='left'> 
<font face='arial' color='black' size='2'>  Comments   </font> 
</td>
<td align='left'>

:
<input type='text' name='comments'    size='13' onblur='cpp()'>
</td> 
</tr>



<tr> <td height='8'> </td> </tr>




<tr> 
<td align='left'> 
</td>
<td align='left'>

<input type='hidden' name='sf' value='100'>


<input type='button' id='pr' value='Save & Print' onmouseover='cpp()' onclick='pp()'>
</td> 
</tr>



</table>
</td>

</form>
</tr>


<table>







</td>




</tr>
</table>




</body>

</html>


";


?>