<?php
include_once('dbconnection.php');
//session_start();

/*
$sql="TRUNCATE TABLE create_new_final";
mysql_query($sql);
*/


$go_g=trim($_POST['go_g']);



$result = mysql_query("SELECT * FROM `buyproduct` where tf!='1'   ORDER BY `money_id` DESC  LIMIT 0 , 1 ");

while ($a_row = mysql_fetch_row($result)) {

	foreach ($a_row as $field) {
		
	}

$num=$a_row[1];

}


$me=$num;
$me=$me+1;



/*

$result = mysql_query("SELECT * FROM `product_name`");	

//$result = mysql_query("SELECT * FROM `product_name` where user_id='$product_id' ");	


while ($a_row = mysql_fetch_row($result)) {

	foreach ($a_row as $field) {
		
	}

$w++;
$p_id[$w]=$a_row[0];
$p_n[$w]=$a_row[2];
$p[$w]=$a_row[4];


}




*/




















for($i=1;$i<=$w;$i++)

{
	
$total_price_sale=0;
$result = mysql_query("SELECT * FROM `product_name` where  user_id='$p_id[$i]' ORDER BY `user_id` ");


while ($a_row = mysql_fetch_row($result)) {

	foreach ($a_row as $field) {
		
	}

//$psingle=$a_row[4];
}

$a_sale_price2++;
$q=0;
$t=0;

$profit=0;
$ptyy=0;
$pty=0;




$sql="SELECT * FROM `product_name` WHERE user_id='$p_id[$i]' ";
$result=mysql_query($sql);
$a_suba=mysql_fetch_array($result);
$sub_category=$a_suba[18];




$sql="SELECT * FROM `product_sub_category` WHERE user_id='$sub_category' ";
$result=mysql_query($sql);
$a_sub=mysql_fetch_array($result);
$sub_category_name=$a_sub[2];


$p_sub_name[$a_sale_price2]="$sub_category_name";



}
















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

//print"$id_supplier";

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





$a_sale_price2=0;







for($i=1;$i<=$w;$i++)

{
	
$total_price_sale=0;
$scc=0;
$sale_p2="0";
$sale_p3="0";
$iy=0;

//$result = mysql_query("SELECT * FROM `product_name` where  user_id='$p_id[$i]' ORDER BY `user_id` ");


$result = mysql_query("SELECT * FROM `buyproduct` where supplier_id='$supplier' && product_id='$p_id[$i]' ORDER BY `user_id` DESC  LIMIT 0 , 1");


while ($a_row = mysql_fetch_row($result)) {

	foreach ($a_row as $field) {
		
	}
	$iy++;
	if($iy==1)
	{
$sale_p2=$a_row[7];

	}

	
	
	
}


if($sale_p2==0)
{
$sale_p2="";
}



$a_sale_price2++;
$p_sale_price2[$a_sale_price2]=$sale_p2;

}











$ser=trim($_POST['ser']);
$less=trim($_POST['less']);

$less_new=trim($_POST['less_new']);
$check_no=trim($_POST['check_no']);



$qty=trim($_POST['qty']);

$payment=trim($_POST['payment']);

$payment_mode=trim($_POST['payment_mode']);

$paymenttype=trim($_POST['paymenttype']);


//$supplier=trim($_POST['supplier']);

$comments=trim($_POST['comments']);



$comments=str_replace("'","`","$comments");

$check_no=str_replace("'","`","$check_no");



$discount=trim($_POST['discount']);

$car=trim($_POST['car']);





/*

if($supplier=="")
{
$supplier=(int)$_GET['sup'];	
}

*/



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




$sql="SELECT * FROM `bank` WHERE user_id='$payment_mode' ";
$result=mysql_query($sql);
$arrsp=mysql_fetch_array($result);
$payment_moden=$arrsp[1];


if($payment_mode=="")
{
$payment_moden="Cash";
}



$sql="SELECT * FROM `supplier` WHERE user_id='$supplier' ";
$result=mysql_query($sql);
$arrs=mysql_fetch_array($result);
$suppliern=$arrs[1];
$mobilen=$arrs[3];
$addressn=$arrs[5];



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


//$price=$price/$qty;

//$price = number_format($price, 3);
//$price=str_replace(",","","$price");



$rty=0;


//$product_id=trim($_POST['product_id']);


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
$price=$arrpo[4];


$sql= "UPDATE  `product_name` SET `buy_new`='$price' WHERE `user_id`='$product_id'";
mysql_query($sql);	
}
else
{
$price=$price;
}












if($price!="")
{
$sql= "UPDATE  `product_name` SET `buy_new`='$price' WHERE `user_id`='$product_id'";
mysql_query($sql);
}




$sql= "UPDATE  `product_name` SET `less`='$less_new' WHERE `user_id`='$product_id'";
mysql_query($sql);







$sql="SELECT * FROM `product_name` WHERE user_id='$product_id' ";


$result=mysql_query($sql);
$arr=mysql_fetch_array($result);
$ppp=$arr[0];



if($ppp=="")
{
$a=1;
//include_once('n.php');
}


if($a==0)
{



if($qty=="")
{
$qty=0;
}






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

                        //$_SESSION['cart'][$product_id]=$_SESSION['cart'][$product_id]+$qty;

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


foreach($_SESSION['cart_unique'] as $product_id_unique => $quantity)



{


$e++;

 
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






$idat=trim($_POST['idat']);
$imon=trim($_POST['imon']);
$iyer=trim($_POST['iyer']);




if($ser=="")
{
$bbb=time(); 
$d=date("m/d/y",$bbb); 
$mon="$d[0]$d[1]";
$dat="$d[3]$d[4]";
$yer="20$d[6]$d[7]";
}



$adate="$yer$mon$dat";

$ar='"';


?>



<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title> Purchase </title>
  
  <meta http-equiv='content-type' content='text/html;charset=utf-8' />

  
  <link rel="stylesheet" href="jquery-ui-themes-1.11.4/themes/smoothness/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
 
  
  
  <script src="jquery-1.10.2.js"></script>
  <script src="jquery-ui.js"></script>
  
  
  
  <script type="text/javascript">





$(function() 
{
 $( "#tags2_sales_p" ).autocomplete({
  source: 'new_supp.php'

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

function fu()
{
document.f.submit();	
}



function rneww()
{
document.f.product_id.value='';	
}

</script>


</head>

<?php
include_once('style.php');


print"

<style>

#tags
{
padding:5px;
width:242px;
height:18px;
}

</style>

";


print"
</head>


<body>



";


include_once('header.php');


print"
<table align='center' width='1200' cellpadding='0' cellspacing='1' height='800' bgcolor='gray'>
<tr bgcolor='white'> 
<td align='center' valign='top' width='220' bgcolor='#C5B991'>  

<table align='center' width='200' cellpadding='0' cellspacing='0' height=''>

<tr> <td height=''> </td></tr>


<tr> <td height='30' width='200' bgcolor='green'>  <span id='child'> <b> <font color='white'> Purchase  </font> </b> </span>  </td></tr>

<tr> <td height='7'> </td></tr>





";


include_once('purchase_left.php');



$dr_b=0;
$cr_b=0;




$result = mysql_query("SELECT * FROM `supplier_advance` where  bank_name='$supplier'  ORDER BY `adat` ASC ");



while ($a_row = mysql_fetch_row($result)) {

	foreach ($a_row as $field) {
		
	}





if($a_row[2]==2)
{
$dr_b=$dr_b+$a_row[3];
}


if($a_row[2]==1)
{
$cr_b=$cr_b+$a_row[3];
}




}


$adjust=$cr_b-$dr_b;


if($ser==5)
{
$adjust=trim($_POST['adjust_amount']);	
}






$result = mysql_query("SELECT * FROM `supplier_laser` where  bank_name='$supplier' && adat<='$adate' ORDER BY `adat` ASC ");



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















print"





<td align='center' valign='top' width='980' bgcolor='#F2F2F2'>  



	
<table align='center' width='200' cellpadding='0' cellspacing='0' bgcolor='F2F2F2'>
<tr> <td height='10' align='center' >   </td> </tr>
<tr> <td height='40' align='center' id='saa'>  <b> Purchase Invoice </b> </td> </tr>
</table>





<table align='center' width='900' cellpadding='0' cellspacing='0' bgcolor='F2F2F2'>

<tr> <td height='10'> </td> </tr>

<tr> 
<form name='f' action='purchase.php' method='POST'>

<td width='880' bgcolor='' align='center' valign='top' height='900'>

<table align='center' width='885' cellpadding='0' cellspacing='0'>


<tr> <td height='0'> </td> </tr>






<tr>
<td align='left'>
<font size='2' face='arial' color='black'> <b> Purchase Date </b> </font>
</td>
<td align='left'>
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


<font size='2' face='arial' color='red'> 

 &nbsp;&nbsp;&nbsp;
 &nbsp;&nbsp;&nbsp;
 &nbsp;&nbsp;&nbsp;
 &nbsp;&nbsp;&nbsp;


 &nbsp;&nbsp;&nbsp;
 &nbsp;&nbsp;&nbsp;
 &nbsp;&nbsp;&nbsp;
 &nbsp;&nbsp;&nbsp;

 &nbsp;&nbsp;&nbsp;
 &nbsp;&nbsp;&nbsp;
 &nbsp;&nbsp;&nbsp;
 &nbsp;&nbsp;&nbsp;


 &nbsp;&nbsp;&nbsp;
 &nbsp;&nbsp;&nbsp;
 &nbsp;&nbsp;&nbsp;
 &nbsp;&nbsp;&nbsp;


 <b> Due : ( $balance ) </b> 

</font>

</td>
</tr>

<tr>
<td height='5'> </td>
</tr>
";





print"


<tr>
<td width='0' align='left'> <font size='2' face='arial' color='black'> <b> Purch Invoice No  </b> </font> </td>
<td align='left'> 
";


print"
: 

<input type='text' name='memo_no' value='$me' readonly  id='txt3_in'>
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

<td width='130'>
<font size='2' face='arial' color='black'> <b> Supplier Name  </b> </font>
</td>

<td width='755' align='left'>
";

print"
: 
<input type='text' id='tags2_sales_p' name='supplier' value='$id_supplier'>
";


print"
</td>
</tr>




<tr>
<td height='5'> </td>
</tr>

";



print"
<tr> 

<td align='left'>
<font size='2' face='arial' color='black'> <b>
Address
</td>

<td align='left'>

: 

<input type='text' value='$addressn' id='text_d_p'>




</td>
</tr>

<tr>
<td height='5'> </td>
</tr>
";




print"

<tr> 

<td align='left'>
<font size='2' face='arial' color='black'> <b>

Mobile
</td>

<td align='left'>

: 
<input type='text' value='$mobilen' id='text_d_p'>


</td>
</tr>

<tr>
<td height='5'> </td>
</tr>
";









print"
<tr> 
<td width='' align='left'> 	
<font size='2' face='arial' color='black'> <b> Product </b>	 </font>
</td>

<td width='' align='left'>
:
<input type='text' id='tags' name='product_id' size='' onclick='rneww()'>

<font size='2' face='arial' color='black'> <b> Price: <b> </font> <input type='text' id='tx3' name='price' size='16'> 
";


if($box_set==1)
{
print"
<font size='2' face='arial' color='black'> <b> Box: </b> </font> <input type='text' id='tx3' name='box' size='4'> 
";
}


print"
<font size='2' face='arial' color='black'> <b> Qty: </b> </font> <input type='text' id='tx3' name='qty' size='4'> 

";



/*

<font size='2' face='arial' color='black'> Comission: </font> <input type='text' name='less_new' size='4'> 



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




 <input type='submit' value='Enter' id='enter'>  

</td>

</form
</tr>
";



print"
</table>







<br>


<table align='center' width='880' cellpadding='3' cellspacing='1' bgcolor='E4DBDB'>

<tr bgcolor='FAFAFA'>
 <td height='25' bgcolor='' width='100' align='center'> <font face='arial' color='black' size='2'> <b> Remove </b> </font> </td>
 <td height='25' bgcolor='' width='250' align='center'> <font face='arial' color='black' size='2'> <b> Product Name </b>  </font> </td>
"; 
 

 include_once('mm2.php');
 
 print"
 <td height='25' bgcolor='' width='50' align='center'> <font face='arial' color='black' size='2'>  <b> Qty. </ b> </font> </td>
 
 <td height='25' bgcolor='' width='50' align='center'> <font face='arial' color='black' size='2'> <b> Unit </b> </font> </td>

 <td height='25' bgcolor='' width='100' align='center'> <font face='arial' color='black' size='2'> <b> Rate </b> </font> </td>

 
 ";
 
 
 /*
 <td height='25' bgcolor='' width='100' align='center'> <font face='arial' color='black' size='2'> <b> Commission </b> </font> </td>
 */
 
 print"
 
 
 
 <td height='25' bgcolor='' width='100' align='center'> <font face='arial' color='black' size='2'> <b> Total </b> </font> </td>
</tr>
";




if($ps==123)

{


/*	
if($adate>20161231)
{
exit;	
}
*/





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

$sew++;

$product_id=$product_id_other[$sew];

 
$sql="SELECT * FROM `product_name` WHERE user_id='$product_id' ";


$result=mysql_query($sql);
$arrp_new=mysql_fetch_array($result);


//$arrp[21]=$price_a[$qg];
//$arrp[19]=$com_a[$qg];
//$arrp[29]=$local_a[$qg];


$arrp[20]=$price_a[$sew];






$total=$arrp[20]*$quantity;
$total3=$arrp[20]*$quantity;

$total=$total-$arrp[19];
$lesst=$lesst+$arrp[19];

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
 <td height='30'  width='' align='center' bgcolor=''> <a href=\"purchase.php?action=remove&i1d=$product_id_unique&sup=$id_supplier&dat=$dat&mon=$mon&yer=$yer&ser=$ser\">  <img src='picture/remove.gif'> </a>  <b> $sew </b> </td>
 <td height='30' bgcolor='' width='' align='left'> <font face='arial' color='black' size='2'> $arrp_new[2] 
";


if($go_show==1)
{
print"
($go_other[$sew])
";
}


print"
  $name_old[1] </font> </td>
 ";
 
 
 if($cwp1==1)
 {
 print"
 <td height='25' bgcolor='' width='' align='center'> <font face='arial' color='black' size='2'> $arrp_new[3] </font> </td>
 ";
}


 if($cwp2==1)
 {
print"
 <td height='25' bgcolor='' width='' align='center'> <font face='arial' color='black' size='2'> $arrp_new[30] </font> </td>
 ";
}


 if($cwp3==1)
 {
print"
 <td height='25' bgcolor='' width='' align='center'> <font face='arial' color='black' size='2'> $arrp_new[31] </font> </td>
 ";
 }
 
 if($cwp4==1)
 {
 print"
 <td height='25' bgcolor='' width='' align='center'> <font face='arial' color='black' size='2'> $arrp_new[32] </font> </td>
 ";
 }

print"
 
 <td height='30' bgcolor='' width='' align='center'> <font face='arial' color='black' size='2'> $quantity </font> </td>
 <td height='30' bgcolor='' width='' align='center'> <font face='arial' color='black' size='2'> $arrp_new[22] </font> </td>


<td height='30' bgcolor='' width='' align='center'> <font face='arial' color='black' size='2'> $arrp[20] </font> </td>
 
 
 ";
 
 
 /*
 
<td height='30' bgcolor='' width='100' align='center'> <font face='arial' color='black' size='2'> $arrp[19] </font> </td>
 */
 
 
 print"

 <td height='30' bgcolor='' width='' align='center'> <font face='arial' color='black' size='2'> $total </font> </td>
</tr>
";



}





}




/*

print"
<tr bgcolor='FAFAFA'>
 <td height='25' bgcolor='' width='100' align='center'> <font face='arial' color='black' size='2'>  </font> </td>
 <td height='25' bgcolor='' width='250' align='center'> <font face='arial' color='black' size='2'>  </font> </td>
 <td height='25' bgcolor='' width='100' align='center'> <font face='arial' color='black' size='2'>  </font> </td>
 
 <td height='25' bgcolor='' width='100' align='center'> <font face='arial' color='black' size='2'> </font> </td>
 
 
  <td height='25' bgcolor='' width='100' align='center'> <font face='arial' color='black' size='2'>  </font> </td>
 
 <td height='25' bgcolor='' width='50' align='center'> <font face='arial' color='black' size='2'> $lesst </font> </td>
 
 
 
 <td height='25' bgcolor='' width='100' align='center'> <font face='arial' color='black' size='2'>  </font> </td>
</tr>
";



*/








$stotal=$subtotal+$less;

$stotal=$stotal-$discount;


$stotal=$stotal+$car;

$tax=0.00;


$pa2=$payment+$adjust;

$due=$stotal-$pa2;





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
//$payment="0.00";
}












$result = mysql_query("SELECT * FROM `supplier_laser` where  bank_name='$supplier' && adat<='$adate' ORDER BY `adat` ASC ");



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

<td width='400' bgcolor='' align='center' valign='top'> 

<table align='center' width='500' cellpadding='0' cellspacing='0' bgcolor='F2F2F2'>


<tr> 
<td width='0'> </td>
<td width='170' align='left'> <font color='black' face='arial' size='2'> Discount  &nbsp; </font>
</td>
<form action='purchase.php' method='POST'>
<td width='470' align='left'> 
:
<input type='text' name='discount' value='$discount' size='25'> Tk.
<input type='hidden' name='ser' value='5'>

</td>
</tr>


<tr> <td height='5'> </td> </tr>














<tr> 
<td width='0'> </td>
<td width='170' align='left'> <font color='black' face='arial' size='2'> Carring Cost  &nbsp; </font>
</td>
<td width='470' align='left'> 
:
<input type='text' name='car' value='$car' size='25'> Tk.


</td>
</tr>


<tr> <td height='5'> </td> </tr>







";

/*

<tr> 
<td width='0'> </td>
<td width='' align='left'> <font color='black' face='arial' size='2'> Carring Cost  &nbsp; </font>
</td>

<td width='' align='left'> 
:
<input type='text' name='less' value='$less' size='25'> Tk.

</td>
</tr>
*/


print"
<tr> 
<td width='0'> </td>
<td width='' align='left'> <font color='black' face='arial' size='2'>  Payment Amount  &nbsp; </font></td>
<td width='' height='30' align='left'> 

:
<input type='text' name='payment' value='$payment' size='25'> Tk.
</td>
</tr>








<tr> 
<td width='0'> </td>
<td width='' align='left'> <font color='black' face='arial' size='2'>  Adjust Amount  &nbsp; </font></td>
<td width='' height='30' align='left'> 
:
<input type='text' name='adjust_amount' value='$adjust' size='25'> Tk.
</td>
</tr>








<tr> 
<td width='0'> </td>
<td width='' align='left'> <font color='black' face='arial' size='2'> Payment Mode  &nbsp;</font> </td>
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
<td width='0'> </td>
<td width='' align='left'> <font color='black' face='arial' size='2'> Cheque No   &nbsp; </font></td>
<td width='' height='30' align='left' valign='top'> 
: 
<input type='text' name='check_no' value='$check_no' size='25'>


</td>


</tr>




<tr> 
<td width='0'> </td>
<td width='' align='left'> <font color='black' face='arial' size='2'> Cheque Issu Date   &nbsp; </font></td>
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

<td width='0'> </td>
<td width='' align='left'> <font color='black' face='arial' size='2'> Note  &nbsp; </font></td>
<td width='' height='30' align='left' valign='top'>

:
 
<input type='hidden' name='supplier' value='$id_supplier'>

<input type='hidden' name='dat' value='$dat'>
<input type='hidden' name='mon' value='$mon'>
<input type='hidden' name='yer' value='$yer'>

	

<input type='text' name='comments' value='$comments' size='25'>

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






<tr> <td height='5'> </td> </tr>









<tr>
<td width='0'> </td>
<td> </td>
<form action='memoprint.php' method='POST' target='a_blank'>
<td align='left'> 

&nbsp;

<input type='hidden' name='supplier' value='$supplier'>



<input type='hidden' name='dat' value='$dat'>
<input type='hidden' name='mon' value='$mon'>
<input type='hidden' name='yer' value='$yer'>

<input type='hidden' name='check_no' value='$check_no'>
<input type='hidden' name='idat' value='$idat'>
<input type='hidden' name='imon' value='$imon'>
<input type='hidden' name='iyer' value='$iyer'>



<input type='hidden' name='discount' value='$discount'>
<input type='hidden' name='car' value='$car'>


<input type='hidden' name='adjust_amount' value='$adjust'>


<input type='hidden' name='memo_no' value='$me'>


<input type='hidden' name='less' value='$less'>
<input type='hidden' name='payment' value='$payment'>
<input type='hidden' name='comments' value='$comments'>
<input type='hidden' name='due' value='$due'>
<input type='hidden' name='balance' value='$balance'>
<input type='hidden' name='payment_mode' value='$payment_mode'>
";

if($ser==5)
{
print"
<input type='submit' value='Save & Print' id='enter2'>
";
}

print"
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
<td bgcolor='' height='30' width='165' align='left'> <font size='2' face='arial' color='black'> Total Amount  </font> </td> 
<td bgcolor='' height='30' width='85' align='right'><font size='2' face='arial' color='black'> $subtotal &nbsp;&nbsp;  </font> </td> 
</tr>





<tr bgcolor='white'> 
<td bgcolor='' height='30' width='' align='left'> <font size='2' face='arial' color='black'> Discount  </font> </td> 
<td bgcolor='' height='30' width='' align='right'><font size='2' face='arial' color='black'> $discount &nbsp;&nbsp;  </font> </td> 
</tr>



<tr bgcolor='white'> 
<td bgcolor='' height='30' width='' align='left'> <font size='2' face='arial' color='black'> Carring Cost  </font> </td> 
<td bgcolor='' height='30' width='' align='right'><font size='2' face='arial' color='black'> $car &nbsp;&nbsp;  </font> </td> 
</tr>



";

/*

<tr bgcolor='white'> 
<td bgcolor='' height='30' width='' align='left'> <font size='2' face='arial' color='black'> Carring Cost  </font> </td> 
<td bgcolor='' height='30' width='' align='right'><font size='2' face='arial' color='black'> $less &nbsp;&nbsp;  </font> </td> 
</tr>
*/






print"
<tr bgcolor='white'> 
<td bgcolor='' height='30' width='' align='left'> <font size='2' face='arial' color='black'>Sub Total  </font> </td> 
<td bgcolor='' height='30' width='' align='right'><font size='2' face='arial' color='black'> $stotal  &nbsp;&nbsp; </font> </td> 
</tr>




<tr bgcolor='white'> 
<td bgcolor='' height='30' width='' align='left'> <font size='2' face='arial' color='black'> Payment Amount  </font> </td> 
<td bgcolor='' height='30' width='' align='right'><font size='2' face='arial' color='black'> $payment  &nbsp;&nbsp;  </font> </td> 
</tr>


<tr bgcolor='white'> 
<td bgcolor='' height='30' width='' align='left'> <font size='2' face='arial' color='black'> Adjust Amount  </font> </td> 
<td bgcolor='' height='30' width='' align='right'><font size='2' face='arial' color='black'> $adjust  &nbsp;&nbsp;  </font> </td> 
</tr>





<tr bgcolor='white'> 
<td bgcolor='' height='30' width='' align='left'> <font size='2' face='arial' color='black'> Due Amount  </font> </td> 
<td bgcolor='' height='30' width='' align='right'><font size='2' face='arial' color='black'> $due &nbsp;&nbsp;  </font> </td> 
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