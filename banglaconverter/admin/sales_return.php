<?php
include_once('dbconnection.php');
session_start();



$ret=trim($_POST['ret']);


$go_g=trim($_POST['go_g']);
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

















$ser=trim($_POST['ser']);
$less=trim($_POST['less']);
$payment=trim($_POST['payment']);
$payment_mode=trim($_POST['payment_mode']);
$paymenttype=trim($_POST['paymenttype']);
//$supplier=trim($_POST['supplier']);
$comments=trim($_POST['comments']);
$sales_invoice=trim($_POST['sales_invoice']);

$p_des=trim($_POST['p_des']);
$p_des=str_replace("'","`","$p_des");





$sales_invoice=str_replace("'","`","$sales_invoice");
$comments=str_replace("'","`","$comments");


















//print" - $supplier - ";


if($supplier=="")
{
$supplier=(int)$_GET['sup'];	
}



if($ret==1)
{

unset($_SESSION['cart_unique']);
unset($_SESSION['cart_go']);


unset($_SESSION['cart']);
unset($_SESSION['cart_price']);
unset($_SESSION['cart_unit']);
unset($_SESSION['cart_com']);
unset($_SESSION['cart_id']);
unset($_SESSION['cart_local']);
unset($_SESSION['cart_wa']);



$result = mysql_query("SELECT * FROM `saleproduct` where money_id='$sales_invoice' ORDER BY `user_id` ASC ");	

while ($a_row = mysql_fetch_row($result)) {

	foreach ($a_row as $field) {
		
	}
	

	
	$product_id=$a_row[4];
	$qty=$a_row[6];
	$price=$a_row[7];
	$unit=$a_row[29];
	
         $supplier=$a_row[2];
         $id_supplier="$a_row[3]=$supplier";

         $product_id_unique= time().$a_row[0];
         $go_g=$a_row[43];

          $_SESSION['cart_unique'][$product_id_unique]=$_SESSION['cart_unique'][$product_id_unique]+$qty;
          $_SESSION['cart_go'][$product_id_unique]=$_SESSION['cart_go'][$product_id_unique]=$go_g;


           $_SESSION['cart'][$product_id_unique]=$_SESSION['cart'][$product_id_unique]=$product_id;
	   $_SESSION['cart_price'][$product_id_unique]=$_SESSION['cart_price'][$product_id_unique]=$price;
           $_SESSION['cart_unit'][$product_id_unique]=$_SESSION['cart_unit'][$product_id_unique]+$unit;
	   $_SESSION['cart_com'][$product_id_unique]=$_SESSION['cart_com'][$product_id_unique]=$less_new;
	   $_SESSION['cart_local'][$product_id_unique]=$_SESSION['cart_local'][$product_id_unique]=$p_des;

}




}
else
{
if($supplier=="")
{

unset($_SESSION['cart_unique']);
unset($_SESSION['cart_go']);
	
unset($_SESSION['cart']);
unset($_SESSION['cart_price']);
unset($_SESSION['cart_unit']);
unset($_SESSION['cart_com']);
unset($_SESSION['cart_local']);
}
}

if($sales_invoice=="")
{
$sales_invoice=(int)$_GET['sales_invoice'];	
}



$new_customer=trim($_POST['new_customer']);
$new_address=trim($_POST['new_address']);
$new_mobile=trim($_POST['new_mobile']);







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
$suppliern=$arrs[1];

$mobiles=$arrs[3];
$addresss=$arrs[5];



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





if($ser==1)
{

$a=0;




$product=trim($_POST['product']);

$price=trim($_POST['price']);

//print"  $price  ";
//print"$product";
//$product_id=trim($_POST['product_id']);


$rty=0;


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




if($rty==0)
{

if($id!="")
{
$sql="SELECT * FROM `product_name` WHERE barcode_id='$id' ";
$result=mysql_query($sql);
$arrpo_m=mysql_fetch_array($result);
$product_id=$arrpo_m[0];
}
	
}




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
$sql= "UPDATE  `product_name` SET `sale_new`='$price' WHERE `user_id`='$product_id'";
mysql_query($sql);
}







$qty=trim($_POST['qty']);
$sql="SELECT * FROM `product_name` WHERE user_id='$product_id' ";
$result=mysql_query($sql);
$arr=mysql_fetch_array($result);
$ppp=$arr[0];



if($ppp=="")
{
$a=1;
//include_once('n.php');
}


if($a==0 && $supplier!="" && $product_id>0)
{
	
if($qty=="")
{
$qty=1;
}

//print" $product_id - $qty ";

$action="en";







switch($action) {	



		case "en":

          $product_id_unique= time().$product_id;
          $_SESSION['cart_unique'][$product_id_unique]=$_SESSION['cart_unique'][$product_id_unique]+$qty;
          $_SESSION['cart_go'][$product_id_unique]=$_SESSION['cart_go'][$product_id_unique]=$go_g;
          $_SESSION['cart'][$product_id_unique]=$_SESSION['cart'][$product_id_unique]=$product_id;



                        $ps=123;
                        $_SESSION['color']="$ps";
						
						
						
						
	   $_SESSION['cart_price'][$product_id_unique]=$_SESSION['cart_price'][$product_id_unique]=$price;
           $_SESSION['cart_unit'][$product_id_unique]=$_SESSION['cart_unit'][$product_id_unique]+$unit;
	   $_SESSION['cart_com'][$product_id_unique]=$_SESSION['cart_com'][$product_id_unique]=$less_new;
	   $_SESSION['cart_local'][$product_id_unique]=$_SESSION['cart_local'][$product_id_unique]=$p_des;

						
						
						
						
						
						
						
						
						
						
						
						
						
						
						
						
                        

                break;


		case "remove":

                      	                   unset($_SESSION['cart_unique'] [$product_id_unique]);
	                                   unset($_SESSION['cart_go'] [$product_id_unique]);
	                                   unset($_SESSION['cart'] [$product_id_unique]);
					   unset($_SESSION['cart_price'][$product_id_unique]);
					   unset($_SESSION['cart_unit'][$product_id_unique]);
					   unset($_SESSION['cart_com'][$product_id_unique]);
					   unset($_SESSION['cart_local'][$product_id_unique]);
             
                break;

                }










}


}





$action = $_GET[action]; 


if($action=="remove")
{



$product_id_unique = $_GET[i1d];

switch($action) {	



		case "en":

                       // $_SESSION['cart'][$product_id]=$_SESSION['cart'][$product_id]+$qty;

                break;


		case "remove":
                                           unset($_SESSION['cart_unique'] [$product_id_unique]); 
                                           unset($_SESSION['cart_go'] [$product_id_unique]);                                                                      

                                           unset($_SESSION['cart'] [$product_id_unique]);
					   unset($_SESSION['cart_price'][$product_id_unique]);
					   unset($_SESSION['cart_unit'][$product_id_unique]);
					   unset($_SESSION['cart_com'][$product_id_unique]);
					   unset($_SESSION['cart_local'][$product_id_unique]);

             
                break;

                }






}




$ps=$_SESSION['color'];


if($ps==123 && $ser!="")
{
foreach($_SESSION['cart'] as $product_id_unique => $quantity)
{


//$e++;

 
}

}











/*
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


*/

$dat=trim($_POST['dat']);
$mon=trim($_POST['mon']);
$yer=trim($_POST['yer']);





if($ser=="")
{
$ser=$_GET['ser'];
}



if($dat=="")
{
$dat=$_GET['dat'];
}


if($mon=="")
{
$mon=$_GET['mon'];
}

if($yer=="")
{
$yer=$_GET['yer'];
}
















if($ser=="")
{
$bbb=time(); 
$d=date("m/d/y",$bbb); 
$mon="$d[0]$d[1]";
$dat="$d[3]$d[4]";
$yer="20$d[6]$d[7]";
}




$ar='"';



print"

<html>

<head>
<title> Sales Return  </title>
<meta http-equiv='content-type' content='text/html;charset=utf-8' />

<base target='_parent' /> 
";

//<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
?>






 <link rel="stylesheet" href="jquery-ui-themes-1.11.4/themes/smoothness/jquery-ui.css">
 <link rel="stylesheet" href="/resources/demos/style.css"> 
  
  <script src="jquery-1.10.2.js"></script>
  <script src="jquery-ui.js"></script>
  
  



  
  
  
  <script type="text/javascript">





$(function() 
{
 $( "#tags2_sales" ).autocomplete({
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

  
  
  
  
  
  
 
  
<script language='javascript'>


function ree()
{
document.fu.submit();	
}

</script>







<script>
$(document).ready(function(){
	
	      //  $( "#se" ).load( "new.php" );
	
	          

	      //  $( "#se" ).load("new.php");
			  
   // $("#hide").mouseover(function(){
	
     //   $( "#se" ).load("new.php");
		
		
		
   // });

});



/*
$(document).ready(function(){
    $("#hide").click(function(){
	
        $( "#se" ).load( "new.php" );
		
    });

});

*/

</script>


<?php


include_once('style.php');


print"

<style>

#tags
{
padding:5px;
width:224px;
height:28px;
}

</style>


</head>


<body>
";


include_once('header2.php');


print"
<table align='center' width='1200' cellpadding='0' cellspacing='1' height='800' bgcolor='gray'>
<tr bgcolor='white'> 
<td align='center' valign='top' width='220' bgcolor='#C5B991'>  

<table align='center' width='200' cellpadding='0' cellspacing='0' height=''>

<tr> <td height='10'> </td></tr>


<tr> <td height='30' width='200' bgcolor='green'>   <span id='child'> <b> <font color='white'> Sales </font> </b> </span>  </td></tr>

<tr> <td height='7'> </td></tr>





";


include_once('sales_left.php');


print"



<td align='center' valign='top' width='980' bgcolor='F2F2F2'>  



	





<table align='center' width='200' cellpadding='0' cellspacing='0' bgcolor='F2F2F2'>
<tr> <td height='10' align='center' >   </td> </tr>
<tr> <td height='40' align='center' id='saa'>  <b> Sales Return </b> </td> </tr>
</table>


<table align='center' width='900' cellpadding='0' cellspacing='0' bgcolor='F2F2F2'>

<tr> <td height='10'> </td> </tr>

<tr> 

<td width='900' bgcolor='' align='center' valign='top' height='900'>

<table align='center' width='900' cellpadding='0' cellspacing='0'>


<tr> 

<form name='fu' action='sales_return.php' method='POST'> 


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

print"

<tr>
<td align='left'>
<font size='2' face='arial' color='black'> <b> Date </b> </font>
</td>
<td align='left'>
<span id='hide' onmouseover='re()'>
</span>

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
?>




<?php
print"

</td>
</tr>

<tr>
<td height='5'> </td>
</tr>
";





print"
<tr> 
<td align='left'> <font face='arial' size='2' color='black'>  <b> Sales Invoice No </b> 
</td>

<td align='left'>
: 
<input type='text' name='sales_invoice' size='10' value='$sales_invoice' id='txt_c'>

&nbsp;&nbsp;

<input type='checkbox' name='ret' value='1'>

</font>  
</td>

</tr>



<tr>
<td height='5'> </td>
</tr>

";



print"
<tr> 

<td  width='150' bgcolor='' >
<font size='2' face='arial' color='black'> <b> Customer Name </b> </font>

</td>

<td width='750' align='left'>

";


print"
: 
<label for='tags2'> </label>
<input type='text' id='tags2_sales' name='supplier' value='$id_supplier' size='30' onblur='ro()'>
";


print"
</td>
</tr>
";




print"
<tr>
<td height='5'> </td>
</tr>
";



print"

<tr>
<td width='0' align='left'> <font size='2' face='arial' color='black'> <b>  Address  </b> </font> </td>
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

<tr> <td height='5'> </td> </tr>

<tr>
<td width='0' align='left'> <font size='2' face='arial' color='black'> <b>  Mobile  </b> </font> </td>
<td align='left'> 
";




print"
: <input type='text' name='new_mobile' id='text_d' value='$mobiles'  size='35'>

</td>
</tr>

<tr> <td height='5'> </td> </tr>

";











print"
<tr> 
<td width='' align='left'>	
<font size='2' face='arial' color='black'> <b> Product </b> </font> 
<td align='left'>

:

<label for='tags'> </label>
<input type='text' id='tags' name='product_id' size='25>





<font size='2' face='arial' color='black'> <b> Price : </b> </font> <input type='text' name='price' id='tx4'> 
<font size='2' face='arial' color='black'>  <b> Qty : </b> </font> <input type='text' name='qty' id='tx4'> 
";

/*
print"
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
";

	
*/




 if($g_active==1)
{
print"Go :
";

print"
<select name='go_g' id='gd'>

<option value='$go_id_new'>$go_new</option>

";

$result = mysql_query("SELECT * FROM `godawn_new`   ORDER BY `user_id` ASC  LIMIT 0 , 60000 ");

while ($a_row = mysql_fetch_row($result)) {

	foreach ($a_row as $field) {
		
	}
print"
<option value='$a_row[0]'>$a_row[1]</option>
";

}

print"
</select>
";
}



	
	print"

<input type='hidden' name='ser' value='1'>

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

<input type='submit' value='Enter'  id='enter'>

</td>
</form>

</tr>
";

/*
print"
<tr>
<td height='8'> </td>
</tr>


<tr> 
<td width='left'> 
<font face='arial' size='2' color='716E6E'> 
<b> Local Products </b> </font> </td>
<td width='left'> : <input type='text' name='p_des'  size='15' id='txt'>    &nbsp; 
</td>

</tr>
";

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
print" 
 <td height='25' bgcolor='' width='100' align='center'> <font face='arial' color='black' size='2'> <b> Rate </b>  </font> </td>
";
print"
<td height='25' bgcolor='' width='100' align='right'> <font face='arial' color='black' size='2'>  <b> Total &nbsp;&nbsp; </b> </font> </td>
</tr>

";



if(0==0)
{
	
	

$qeu=0;

foreach($_SESSION['cart_price'] as $product_id_unique => $price)
{
$qeu++;
$price_a[$qeu]=$price;
}

$qeu=0;

foreach($_SESSION['cart_com'] as $product_id_unique => $com)
{
$qeu++;
$com_a[$qeu]=$com;
}


$qeu=0;

foreach($_SESSION['cart_local'] as $product_id_unique => $local)
{
$qeu++;
$local_a[$qeu]=$local;
}



$qeu=0;

foreach($_SESSION['cart'] as $product_id_unique => $pp_id)
{
$qeu++;
$product_id_other[$qeu]=$pp_id;
}



$qeu=0;

foreach($_SESSION['cart_go'] as $product_id_unique => $gdd)
{
$qeu++;
$go_other[$qeu]=$gdd;
}





foreach($_SESSION['cart_unique'] as $product_id_unique => $quantity)
{


$qg++;

$product_id=$product_id_other[$qg];
 
$sql="SELECT * FROM `product_name` WHERE user_id='$product_id' ";
$result=mysql_query($sql);
$arrp_new=mysql_fetch_array($result);

$arrp[21]=$price_a[$qg];
$arrp[19]=$com_a[$qg];
$arrp[29]=$local_a[$qg];





$total=$arrp[21]*$quantity;
$subtotal=$subtotal+$total;



$sql="SELECT * FROM `product_category` WHERE user_id='$arrp[1]' ";
$result=mysql_query($sql);
$name=mysql_fetch_array($result);


/*

$sql="SELECT * FROM `measurement` WHERE user_id='$arrp[14]' ";
$result=mysql_query($sql);
$arrpm=mysql_fetch_array($result);


$sql="SELECT * FROM `product_type` WHERE user_id='$arrp[15]' ";
$result=mysql_query($sql);
$arrpt=mysql_fetch_array($result);

*/





print"
<tr bgcolor='FFFFFF'>
 <td height='30'  width='100' align='center' bgcolor=''> <a href=\"sales_return.php?action=remove&i1d=$product_id_unique&sup=$id_supplier&sales_invoice=$sales_invoice&dat=$dat&mon=$mon&yer=$yer&ser=$ser\">  <img src='picture/remove.gif'> </a> </td>
 <td height='30' bgcolor='' width='250' align='left'> <font face='arial' color='716E6E' size='2'> $arrp_new[2] 
";

if($go_show==1)
{
print"
($go_other[$qg])
";
}

print"
$arrp[29]  </font> </td>
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
 <td height='30' bgcolor='' width='50' align='center'> <font face='arial' color='716E6E' size='2'> $quantity </font> </td>
 <td height='25' bgcolor='' width='50' align='center'> <font face='arial' color='716E6E' size='2'> $arrp_new[22]  </font> </td>

 <td height='30' bgcolor='' width='100' align='center'> <font face='arial' color='716E6E' size='2'> $arrp[21]  </font> </td>


 <td height='30' bgcolor='' width='100' align='right'> <font face='arial' color='716E6E' size='2'> $total &nbsp;&nbsp; </font> </td>
</tr>
";



}





}




$stotal=$subtotal-$less;

$tax=0.00;

$due=$stotal-$payment;



/*

if($ser==6)
{



if($payment>$stotal)
{

$k=1;
include_once('www.php');
}
else
{

$k=0;
}


}

*/

print"



</table>



<table align='center' width='880' cellpadding='0' cellspacing='0'>

<tr bgcolor='white'> 

<td width='400' bgcolor='' align='center' valign='top'> 

<table align='center' width='500' cellpadding='0' cellspacing='0' bgcolor='F2F2F2'>
<tr> <td height='30'> </td> </tr>

<tr> 
<td width='170' align='left'> <font color='716E6E' face='arial' size='2'> Discount  </font>
</td>

<form action='sales_return.php' method='POST'>
<td width='430' align='left'> 
:

<input type='text' name='less' value='$less' size='25'> Tk.
<input type='hidden' name='ser' value='5'>

</td>

</tr>




<tr> 

<td width='' align='left'> <font color='716E6E' face='arial' size='2'>  Payment Amount  </font></td>
<td width='' height='30' align='left'> 

:

<input type='text' name='payment' value='$payment' size='25'> Tk.
</td>
</tr>


<tr> 

<td width='' align='left'> <font color='716E6E' face='arial' size='2'> Payment mode </font> </td>
<td width='' height='30' align='left'> 

:

<select name='payment_mode' id='p_mode'>

<option value='$payment_mode'>$payment_moden</option>

";

print"
<option value=''> Cash</option>
";

$result = mysql_query("SELECT * FROM `bank`   ORDER BY `user_id` ASC  LIMIT 0 , 1000");

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

<td width='' align='left'> <font color='716E6E' face='arial' size='2'> Note  </font></td>

<td width='' height='30' align='left' valign='top'> 

:
<input type='hidden' name='supplier' value='$id_supplier'>

<input type='hidden' name='dat' value='$dat'>
<input type='hidden' name='mon' value='$mon'>
<input type='hidden' name='yer' value='$yer'>

<input type='hidden' name='new_customer' value='$new_customer'>
<input type='hidden' name='new_address' value='$new_address'>
<input type='hidden' name='new_mobile' value='$new_mobile'>

<input type='hidden' name='sales_invoice' value='$sales_invoice'>






<input type='text' name='comments' value='$comments' size='25'>
</td>


</tr>


<tr>
<td> </td>
<td align='left'> 
&nbsp;
<input type='submit' value='Add To Payment ' ID='PR'>

</td>
</form>
</tr>


<tr>
<td> </td>

<form action='salememo_return.php' method='POST' target='a_blank'>
<td align='left'> 


<br>


<input type='hidden' name='supplier' value='$supplier'>
<input type='hidden' name='dat' value='$dat'>
<input type='hidden' name='mon' value='$mon'>
<input type='hidden' name='yer' value='$yer'>



<input type='hidden' name='less' value='$less'>
<input type='hidden' name='payment' value='$payment'>
<input type='hidden' name='comments' value='$comments'>
<input type='hidden' name='due' value='$due'>

<input type='hidden' name='payment_mode' value='$payment_mode'>


<input type='hidden' name='new_customer' value='$new_customer'>
<input type='hidden' name='new_address' value='$new_address'>
<input type='hidden' name='new_mobile' value='$new_mobile'>

<input type='hidden' name='sales_invoice' value='$sales_invoice'>



</td>


</tr>


<tr>
<td> </td>
<td align='left'>  &nbsp; <input type='submit' value='Save & Print' id='enter2'>
 </td>
</form>
</tr>



</table>

</td>





";

/////////////////////////////////////////////////

print"

<td width='130' bgcolor='#F2F2F2'> </td>


<td width='250' valign='top' align='center' bgcolor='#F2F2F2'>

<table align='center' width='250' cellpadding='5' cellspacing='1' bgcolor='cccccc'>

<tr bgcolor='white'>
<td bgcolor='' height='30' width='164' align='left'> <font size='2' face='arial' color='716E6E'>Total </font> </td> 
<td bgcolor='' height='30' width='86' align='right'><font size='2' face='arial' color='716E6E'>$subtotal &nbsp;&nbsp; </font> </td> 
</tr>








<tr bgcolor='white'> 
<td bgcolor='' height='' width='' align='left'> <font size='2' face='arial' color='716E6E'> Discount  </font> </td> 
<td bgcolor='' height='' width='' align='right'><font size='2' face='arial' color='716E6E'>$less &nbsp;&nbsp; </font> </td> 
</tr>







<tr bgcolor='white'> 
<td bgcolor='' height='30' width='' align='left'> <font size='2' face='arial' color='716E6E'>Sub Total </font> </td> 
<td bgcolor='' height='30' width='' align='right'><font size='2' face='arial' color='716E6E'> $stotal &nbsp;&nbsp; </font> </td> 
</tr>




<tr bgcolor='white'> 
<td bgcolor='' height='30' width='' align='left'> <font size='2' face='arial' color='716E6E'> Payment </font> </td> 
<td bgcolor='' height='30' width='' align='right'><font size='2' face='arial' color='716E6E'>$payment &nbsp;&nbsp; </font> </td> 
</tr>





<tr bgcolor='white'> 
<td bgcolor='' height='30' width='' align='left'> <font size='2' face='arial' color='716E6E'> Due </font> </td> 
<td bgcolor='' height='30' width='' align='right'><font size='2' face='arial' color='716E6E'>$due &nbsp;&nbsp; </font> </td> 
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