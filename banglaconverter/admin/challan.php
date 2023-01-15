<?php
include_once('dbconnection.php');
session_start();

/*
$result = mysql_query("SELECT * FROM salememo");
$num_rows = mysql_num_rows($result);
*/

//$p_des=trim($_POST['p_des']);
//$p_des=str_replace("'","`","$p_des");












$other=trim($_POST['other']);




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























$p_des=trim($_POST['p_des']);


$inn='\"';
$inn2='"';

$p_des=str_replace("$inn","$inn2","$p_des");

$p_des=str_replace("'","`","$p_des");




$result = mysql_query("SELECT * FROM `salememo_challan`  ORDER BY `money_id` DESC  LIMIT 0 , 1 ");

while ($a_row = mysql_fetch_row($result)) {

	foreach ($a_row as $field) {
		
	}

$num=$a_row[1];

}




$me=$num;
$me=$me+1;


$ser=trim($_POST['ser']);
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





$transport_name=str_replace("'","`","$transport_name");
$contact_name=str_replace("'","`","$contact_name");

$contact_name1=str_replace("'","`","$contact_name1");


$sales_order=str_replace("'","`","$sales_order");
$comments=str_replace("'","`","$comments");










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


if($comments=="")
{
$comments=$_GET['comments'];	
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




/////////////




/*
$result = mysql_query("SELECT * FROM `product_name`");	



while ($a_row = mysql_fetch_row($result)) {

	foreach ($a_row as $field) {
		
	}

$w++;
$p_id[$w]=$a_row[0];
$p_n[$w]=$a_row[2];
$p[$w]=$a_row[4];


}


*/


$q=0;
$total_price_sale=0;
$preo=0;











$q=0;

$total_price_sale=0;
$preo=0;






for($i=1;$i<=$w;$i++)

{
	
$total_price_sale=0;
$result = mysql_query("SELECT * FROM `product_name` where  user_id='$p_id[$i]' ORDER BY `user_id` ");


//$result = mysql_query("SELECT * FROM `saleproduct` where adat<='$mdate'  && product_id='$p_id[$i]' ORDER BY `adat` ");


while ($a_row = mysql_fetch_row($result)) {

	foreach ($a_row as $field) {
		
	}

//$q=$q+$a_row[6];
$psingle=$a_row[4];
//print"$a_row[6] <br>";
}

$awqs++;
//$q_wsale[$wqs]=$q;
$p_single[$awqs]=$psingle;

//print"$psingle <br>";


$q=0;
$t=0;
$tax=0;
$profit=0;
$ptyy=0;
$pty=0;
}









for($i=1;$i<=$w;$i++)

{
	
$total_price_sale=0;

$result = mysql_query("SELECT * FROM `saleproduct` where adat>='$ndate' && adat<='$mdate'  && product_id='$p_id[$i]' ORDER BY `adat` ");

 

//$result = mysql_query("SELECT * FROM `saleproduct` where adat<='$mdate'  && product_id='$p_id[$i]' ORDER BY `adat` ");


while ($a_row = mysql_fetch_row($result)) {

	foreach ($a_row as $field) {
		
	}


$tq++;

$q=$q+$a_row[6];

$tax=$tax+$a_row[15];


$aui=$a_row[8]/$a_row[6];

$aui = number_format($aui, 3);
$aui=str_replace(",","","$aui");




$pty=$aui-$a_row[14];


//$pty=$a_row[7]-$a_row[14];


$pty=$pty*$a_row[6];




$ptyy=$ptyy+$pty;



$profit=$profit+$a_row[16];

$ppp=$a_row[7];

$mtt=$a_row[17];
$ptt=$a_row[19];

$preo=$a_row[8]-$a_row[25];





$total_price_sale=$total_price_sale+$a_row[8];


}


$tp20=$tp20+$total_price_sale;
$t=$ppp*$q;







$qs++;
$q_sale[$qs]=$q;
$q_price[$qs]=$total_price_sale;

$prrp[$qs]=$ptyy;



$tax1=$tax1+$tax;
$t1=$t1+$t;
$profit1=$profit1+$profit;
$q10=$q10+$q;


$q=0;
$t=0;

$tax=0;
$profit=0;
$ptyy=0;
$pty=0;




}























$q=0;
$t=0;
$q1=0;





for($i=1;$i<=$w;$i++)

{

$total_price=0;




//$result = mysql_query("SELECT * FROM `buyproduct` where   adat>=$ndate &&  adat<='$mdate'  && product_id='$p_id[$i]' ");


$result = mysql_query("SELECT * FROM `buyproduct` where  adat<='$mdate'  && product_id='$p_id[$i]' ");


while ($a_row = mysql_fetch_row($result)) {

	foreach ($a_row as $field) {
		
	}


$q=$q+$a_row[6];

$aaa=$a_row[14];
$bbb=$a_row[16];
$ppp=$a_row[7];

$total_price=$total_price+$a_row[8];

}


$ew++;





$total_price=$total_price+$stp_price[$ew];

$q=$q+$stp[$ew];





///

$tp=$tp+$total_price;
$t=$ppp*$q;


if($total_price>0)
{
$single=$total_price/$q;	
}
else
{
$single=0;	
}



//$ppp=$ppp+$stp_price[$ew];


$w8++;
$stock_q=$q-$q_sale[$ew];

$pry[$w8]=$stock_q;

//print"$pry[$w8] <br>";


$stock_p=$stock_q*$single;





$stock_qq=$stock_qq+$stock_q;

$stock_pp=$stock_pp+$stock_p;





$per_product=$total_price/$q;

$per_product = number_format($per_product, 3);
$per_product=str_replace(",","","$per_product");


/*

$sql= "UPDATE  `saleproduct` SET `buy`='$per_product' WHERE `product_id`='$p_id[$i]' &&  adat<='$mdate' && adat>=$ndate";
mysql_query($sql);

*/

/*

$sql = "INSERT INTO `create_new5` (`user_id`, `product_id`, `stock`, `value`, `date`) VALUES ('','$p_id[$i]','$stock_qq','$stock_pp','$mdate')";
mysql_query($sql);



*/







$per_sale_product= $q_price[$ew]/$q_sale[$ew];

$per_sale_product = number_format($per_sale_product, 3);
$per_sale_product=str_replace(",","","$per_sale_product");


$prot=$per_sale_product-$per_product;



$profit_t=$q_sale[$ew]*$prot;



/*
$sql= "UPDATE  `saleproduct` SET `profit`='$profit_t' WHERE `product_id`='$p_id[$i]' &&  adat<='$mdate' && adat>=$ndate";
mysql_query($sql);


*/


//$profit_t = number_format($profit_t, 3);
//$profit_t=str_replace(",","","$profit_t");




$profit_total=$profit_total+$profit_t;




$total_q=$total_q+$q;
$total_t=$total_t+$t;

$tpyy=$tpyy+$prrp[$ew];



$q=0;
$t=0;






}


































































///////////////





//print" - $supplier - ";


if($supplier=="")
{
//$supplier=(int)$_GET['sup'];	
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

$mobiles=$arrs[3];
$addresss=$arrs[5];

/*
if($ser=="")
{
$mobiles=$arrs[3];
$addresss=$arrs[5];
}
else
{
$mobiles=$new_mobile;
$addresss=$new_address;
}
*/
















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

unset($_SESSION['cart_other']);


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
$comments=str_replace("@","#","$comments");




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
	   
	 	
						   $_SESSION['cart_other'][$product_id]=$_SESSION['cart_other'][$product_id]=$other;
	
						
						
						
						
						
						
						
						
						
						
						
                        

                break;


		case "remove":

                       unset($_SESSION['cart'] [$product_id]);
					   unset($_SESSION['cart_price'][$product_id]);
					   unset($_SESSION['cart_unit'][$product_id]);
					   unset($_SESSION['cart_com'][$product_id]);
					   unset($_SESSION['cart_local'][$product_id]);
unset($_SESSION['cart_other'][$product_other]);


             
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
unset($_SESSION['cart_other'][$product_id]);


             
                break;

                }






}


$adate="$yer$mon$dat";




$ps=$_SESSION['color'];


//if($ps==123 && $ser!="")
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
<title> Challan Create </title>
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
 $( "#tags2_c" ).autocomplete({
  source: 'new.php'

 });
});




$(function() 
{
 $( "#tags" ).autocomplete({
  source: 'p.php'

 });
});









  
  


  

function ree()
{
document.fu.submit();	
}



function rnew()
{

var tbr=saletages.length;

//document.fuu.price.value=tbr;

for(i=0;i<=tbr;i++)
{

if(availableTags[i]==document.fuu.product_id.value)
{
document.fuu.sale_price.value=saletages[i];
document.fuu.sale_stock.value=stooo[i];

}


}


}


function rneww()
{
document.fuu.product_id.value='';	
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
width:200px;
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

<tr> <td height='0'> </td></tr>


<tr> <td height='30' width='200' bgcolor='green'>  <span id='child'> <b> <font color='white'> Challan </font> </b> </span>  </td></tr>

<tr> <td height='7'> </td></tr>





";


include_once('challan_left.php');


print"



<td align='center' valign='top' width='980' bgcolor='#F2F2F2'>  



	

<table align='center' width='200' cellpadding='0' cellspacing='0' bgcolor='F2F2F2'>
<tr> <td height='10' align='center' >   </td> </tr>
<tr> <td height='40' align='center' id='saa'>  <b> Challan Invoice </b> </td> </tr>
</table>



	
	


<table align='center' width='880' cellpadding='0' cellspacing='0' bgcolor='F2F2F2'>

<tr> <td height='5'> </td> </tr>

<tr> 

<td width='880' bgcolor='' align='center' valign='top' height='900'>

<table align='center' width='885' cellpadding='0' cellspacing='0'>


<tr> 

<form name='fuu' action='challan.php' method='POST'>


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

<tr> <td height='1'> </td> </tr>





<tr> 

<td width='130' bgcolor=''>
<font size='2' face='arial' color='black'> <b> Challan  Date </b> </font>
";




print"

</td>
<td align='left' width='755'>

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











?>



<?php

print"

</td>


</tr>
<tr>  <td height='8'> </td> </tr>
";





print"
<tr> 
<td align='left'>  
";


print"
<font size='2' face='arial' color='black'> <b>
Challan No
</b>
</font>

</td>

<td align='left'>

: <input type='text' name='memo_no' id='txt_c' value='$me' readonly size='10'> 
&nbsp;
";

print"
</font> </td>

</tr>



<tr>
<td height='8'> </td>
</tr>
";


















print"

<tr> 

<td width='130' bgcolor=''>
<font size='2' face='arial' color='black'> <b> Customer Name </b> </font>
";




print"

</td>
<td align='left'>
";


print"
: 

<input type='text' id='tags2_c' name='supplier' value='$id_supplier' size='30'>
";










print"
</span>
";


print"
";
?>

<?php

print"

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
<font face='arial' size='2' color='716E6E'> 
<b> Name </b> </font> </td>
<td width='left'> : <input type='text' name='new_customer' value='$new_customer' size='15' id='txt'>  &nbsp; 
 
</font>
</td>
</tr>
";

}

*/



print"
<tr>
<td height='8'> </td>
</tr>
";









?>



<?php

/*
print"
Stock: $up3
";
*/

print"
</td>
</tr>



<tr> 
<td align='left'> <font face='arial' size='2'> 
<font size='2' face='arial' color='black'> <b> Address </font>
</td>

<td align='left'>
:
<input type='text' name='new_address' id='text_d' value='$addresss'  size='35'>
	
</font> </td>
</tr>



<tr>
<td height='8'> </td>
</tr>





<tr> 
<td align='left'> <font face='arial' size='2'> 
<font size='2' face='arial' color='black'> <b> Mobile </font>
</td>

<td align='left'>

: <input type='text' name='new_mobile' value='$mobiles' id='text_d' size='15'> 
  
</td>
</tr>



<tr>
<td height='8'> </td>
</tr>
";










print"

<tr>
<td width='0' align='left'> <font size='2' face='arial' color='black'> <b> Receiver Person  </b> </font> </td>
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


<tr> <td height='8'> </td> </tr>

<tr> 
<td align='left'> <font face='arial' size='2'> 

<font size='2' face='arial' color='black'> <b> Note </b>
</font> 
</td>
<td align='left'>

: 

<input type='text' name='comments' id='text_d' value='$comments' size='25'>


</td>
</tr>
";




/*

<tr> 
<td align='left'> <font face='arial' size='2'> 

<font size='2' face='arial' color='716E6E'> <b> Contact Person </b>
</font> 

</td>

<td align='left'>

: <input type='text' name='contact_name' id='txt' value='$contact_name' size='15'>  

&nbsp;
 
<font size='2' face='arial' color='716E6E'> <b> Comments : </b> </font> <input type='text' name='comments' id='txt' value='$comments' size='25'> 
</font> </td>

</tr>
*/


print"


<tr>
<td height='8'> </td>
</tr>




<tr> 



<td width='' align='left'> 	
<font size='2' face='arial' color='black'> <b> Product </b> </font> 
</td>

<td align='left'>

:


<input type='text' id='tags' name='product_id' size='30' onblur='rnew()' onclick='rneww()'>
";

if($other_set==1)
{
print"
<font size='2' face='arial' color='black'> <b>  </b> </font> <input type='text' name='other' size='3' id='txx_b_other'> 
";

}

print"
<font size='2' face='arial' color='black'> <b> Price : </b> </font> <input type='text' name='price' id='tx4' size='10'> 
";




if($box_set==1)
{
print"
<font size='2' face='arial' color='black'> <b> Box : </b> </font> <input type='text' name='box' id='tx4' size='3'> 
";
}


print"
<font size='2' face='arial' color='black'> <b> Qty : </b> </font> <input type='text' name='qty' id='tx4' size='3'> 
";


/*
<font size='2' face='arial' color='black'> Comission: </font> <input type='text' id='txx4' name='less_new' size='4'> 
*/






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
	
	
	print"


<input type='hidden' name='ser' value='1'>


<input type='hidden' name='ky' value='$kju'>
<input type='submit' value='Enter' id='enter'> 

</td>

";






print" 
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
<font face='arial' size='2' color='716E6E'> 
<b> Local Products </b> </font> </td>
<td width='left'> : <input type='text' name='p_des'  size='15' id='txt'>    &nbsp; 
</td>

</tr>
";
*/



print"
</table>
";



print"
<br>


<table align='center' width='880' cellpadding='4' cellspacing='1' bgcolor='E4DBDB'>

<tr bgcolor='FAFAFA'>
 <td height='25' bgcolor='' width='100' align='center'> <font face='arial' color='black' size='2'> <b> Remove </b>


 <td height='25' bgcolor='' width='70' align='center'> <font face='arial' color='black' size='2'> <b> Product Name </b>  </font> </td>
 ";
 
 include_once('mm2.php');

print"
 <td height='25' bgcolor='' width='50' align='center'> <font face='arial' color='black' size='2'> <b> Qty  </b> </font> </td>
 <td height='25' bgcolor='' width='100' align='center'> <font face='arial' color='black' size='2'> <b> Unit </b> </font> </td>
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







$transport_name1=str_replace("#","@","$transport_name");
$contact_name1=str_replace("#","@","$contact_name1");
$sales_order1=str_replace("#","@","$sales_order");
$comments1=str_replace("#","@","$comments");






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

foreach($_SESSION['cart_other'] as $product_id => $local_other)
{
$qeu++;
$local_other[$qeu]=$local_other;
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

$total=$total-$arrp[19];
$subtotal=$subtotal+$total;

$sew++;

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
 <td height='30'  width='100' align='center' bgcolor=''> <a href=\"challan.php?action=remove&i1d=$arrp_new[0]&sup=$id_supplier&dat=$dat&mon=$mon&yer=$yer&contact_name=$contact_name1&transport_name=$transport_name1&sales_order=$sales_order1&comments=$comments1&new_customer=$new_customer&new_mobile=$new_mobile&new_address=$new_address&ser=$ser&contact_name1=$contact_name1\">  <img src='picture/remove.gif'> </a> $sew </td>
 <td height='30' bgcolor='' width='250' align='left'> <font face='arial' color='716E6E' size='2'>  $arrp_new[2]  $local_other[$qg] $arrp[29]  </font> </td> 
";


if($cwp1==1)
{
print"
 <td height='30' bgcolor='' width='' align='center'> <font face='arial' color='716E6E' size='2'> $arrp_new[3] </font> </td>
 ";
}
 

if($cwp2==1)
{
 print"
 <td height='30' bgcolor='' width='' align='center'> <font face='arial' color='716E6E' size='2'> $arrp_new[30] </font> </td>
 ";
}


if($cwp3==1)
{
 print"
 <td height='30' bgcolor='' width='' align='center'> <font face='arial' color='716E6E' size='2'> $arrp_new[31] </font> </td>
 ";
}


if($cwp4==1)
{
 print"
 <td height='30' bgcolor='' width='' align='center'> <font face='arial' color='716E6E' size='2'> $arrp_new[32] </font> </td>
";
}







print"
 <td height='30' bgcolor='' width='50' align='center'> <font face='arial' color='716E6E' size='2'> $quantity </font> </td>
 <td height='30' bgcolor='' width='50' align='center'> <font face='arial' color='716E6E' size='2'> $arrp_new[22] </font> </td>
 

</tr>
";


$total7=$total7+$total3;
$lesst=$lesst+$arrp[19];

}





}



/*

print"
<tr bgcolor='FFFFFF'>
 <td height='30'  width='100' align='center' bgcolor=''>  </td>
 <td height='30' bgcolor='' width='250' align='center'> <font face='arial' color='716E6E' size='2'>  </font> </td>
 <td height='30' bgcolor='' width='100' align='center'> <font face='arial' color='716E6E' size='2'>  </font> </td>
 <td height='30' bgcolor='' width='50' align='center'> <font face='arial' color='716E6E' size='2'>  </font> </td>
 <td height='30' bgcolor='' width='100' align='center'> <font face='arial' color='716E6E' size='2'> $total7 </font> </td>
 <td height='30' bgcolor='' width='100' align='center'> <font face='arial' color='716E6E' size='2'> $lesst </font> </td>
 <td height='30' bgcolor='' width='100' align='center'> <font face='arial' color='716E6E' size='2'> $sub_total </font> </td>
</tr>
";

*/


//print" $less - $stotal dfddf";
 
$less=trim($_POST['less']);

$discount_less=trim($_POST['discount_less']);


$subtotal_last=$subtotal-$discount_less;




//$sdq1=($discount*$subtotal);


$stotal=$subtotal_last+$less;
$tax=0.00;
$due=$stotal-$payment;
print"
</table>
";







print"
<table align='center' width='1000' cellpadding='0' cellspacing='0'>
<tr> <td height='20'> </td> </tr>
</table>
";

if($payment=="")
{
$payment="0.00";
}




















$pui=$balance+$stotal;

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
<td width='150'  align='center'> <font face='arial' size='3'> Purchase (Tk) </font> </td>
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
<td width='150'  align='center'> <font face='arial' size='3'> $stotal (Tk) </font> </td>
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
<td width='700' bgcolor='' align='center' valign='top'> 
<table align='center' width='880' cellpadding='0' cellspacing='0' bgcolor='F2F2F2'>
<tr>
<form action='salememo_challan.php' method='POST' target='a_blank'>
<td align='right'> 

<br> <br>
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


<input type='hidden' name='discount_less' value='$discount_less'>
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



";

//if($subtotal>0)
//{
	print"
<input type='submit' value='Save & Print Challan' id='enter3'>
";
//}
print"
</td>
</form>
</tr>
</table>
</td>





";




/////////////////////////////////////////////////


print"
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