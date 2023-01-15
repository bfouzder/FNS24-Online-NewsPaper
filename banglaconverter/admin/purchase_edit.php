<?php
include_once('dbconnection.php');
//session_start();

/*
$sql="TRUNCATE TABLE create_new_final";
mysql_query($sql);
*/


$go_g=trim($_POST['go_g']);


$s45=trim($_POST['s45']);

if($s45=="")
{
$s45=(int)$_GET['s45'];
$temp=1;
}

$result = mysql_query("SELECT * FROM `buymemo` where user_id='$s45' ORDER BY `user_id` ASC ");	

while ($a_row = mysql_fetch_row($result)) {

	foreach ($a_row as $field) {
		
	}
	
	$dat=$a_row[9];
	$mon=$a_row[10];
	$yer=$a_row[11];
	$invoice_no=$a_row[1];
	$supplier=$a_row[2];	
	$mdate="$yer$mon$dat";
	$balance=$a_row[28];
	//$due="$yer$mon$dat";
	$discount_less=$a_row[27];
        $less=$a_row[6];
        $payment=$a_row[7];	
        $sales_order=$a_row[33];
	$contact_name=$a_row[35];
	$transport_name=$a_row[34];
	$memo_no2=$a_row[23];

	
	
	$discount=$a_row[25];
	$adjust=$a_row[26];
	
	$payment=$payment-$adjust;
	
}





$me=$invoice_no;









$ser=trim($_POST['ser']);













if($ser=="" && $temp!=1)
{
	
	//print"ok ok ";
	

unset($_SESSION['cart_unique']);
unset($_SESSION['cart_go']);
	
unset($_SESSION['cart']);
unset($_SESSION['cart_price']);
unset($_SESSION['cart_unit']);
unset($_SESSION['cart_com']);
unset($_SESSION['cart_local']);



	

$result = mysql_query("SELECT * FROM `buyproduct` where money_id='$invoice_no' ORDER BY `user_id` ASC ");	

while ($a_row = mysql_fetch_row($result)) {

	foreach ($a_row as $field) {
		
	}
	
	
	
	$product_id=$a_row[4];
	$qty=$a_row[6];
	$price=$a_row[7];
	$unit=$a_row[29];
	$com=$a_row[25];
	
	
	
	    $product_id_unique= time().$a_row[0];

            $go_g=$a_row[28];


           $_SESSION['cart_unique'][$product_id_unique]=$_SESSION['cart_unique'][$product_id_unique]+$qty;
           $_SESSION['cart_go'][$product_id_unique]=$_SESSION['cart_go'][$product_id_unique]=$go_g;
           $_SESSION['cart'][$product_id_unique]=$_SESSION['cart'][$product_id_unique]=$product_id;


	


       $_SESSION['cart_price'][$product_id_unique]=$_SESSION['cart_price'][$product_id_unique]+$price;
       $_SESSION['cart_unit'][$product_id_unique]=$_SESSION['cart_unit'][$product_id_unique]+$unit;
       $_SESSION['cart_com'][$product_id_unique]=$_SESSION['cart_com'][$product_id_unique]+$com;
						
						
}



	
}
























if($ser=="")
{
$ser=(int)$_GET['ser'];	
}





if($ser==5)
{
$less=trim($_POST['less']);
$payment=trim($_POST['payment']);

$discount=trim($_POST['discount']);
$adjust=trim($_POST['adjust_amount']);


}




//$less=trim($_POST['less']);
//$payment=trim($_POST['payment']);

$less_new=trim($_POST['less_new']);
$check_no=trim($_POST['check_no']);


$qty=trim($_POST['qty']);
$payment_mode=trim($_POST['payment_mode']);
$paymenttype=trim($_POST['paymenttype']);
//$supplier=trim($_POST['supplier']);



$comments=trim($_POST['comments']);

$comments=str_replace("'","`","$comments");
$check_no=str_replace("'","`","$check_no");







if($supplier=="")
{
$supplier=(int)$_GET['sup'];	
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








if($a==0 && $supplier!=0 && $product_id!="")
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
	   	
						
						
						
                        

                break;


		case "remove":


          unset($_SESSION['cart_unique'] [$product_id_unique]);
          unset($_SESSION['cart_go'] [$product_id_unique]);


	                                   unset($_SESSION['cart'] [$product_id_unique]);
					   unset($_SESSION['cart_price'][$product_id_unique]);
					   unset($_SESSION['cart_unit'][$product_id_unique]);
					   unset($_SESSION['cart_com'][$product_id_unique]);
					 
             
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
					   

             
                break;

                }






}




$ps=$_SESSION['color'];


if($ser!="")
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


*/






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




if($ser!="")
{

$dat=trim($_POST['dat']);
$mon=trim($_POST['mon']);
$yer=trim($_POST['yer']);

}



if($dat=="")
{
$dat= $_GET[dat]; 
}

if($mon=="")
{
$mon= $_GET[mon]; 
}

if($yer=="")
{
$yer= $_GET[yer]; 
}




$idat=trim($_POST['idat']);
$imon=trim($_POST['imon']);
$iyer=trim($_POST['iyer']);



/*
if($ser=="")
{
$bbb=time(); 
$d=date("m/d/y",$bbb); 
$mon="$d[0]$d[1]";
$dat="$d[3]$d[4]";
$yer="20$d[6]$d[7]";
}

*/



$adate="$yer$mon$dat";

$ar='"';


?>



<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Edit  Purchase </title>
  <meta http-equiv='content-type' content='text/html;charset=utf-8' />

  <link rel="stylesheet" href="jquery-ui-themes-1.11.4/themes/smoothness/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
 
  
  
  <script src="jquery-1.10.2.js"></script>
  <script src="jquery-ui.js"></script>
  
  

  <script type="text/javascript">





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

</script>


</head>

<?php
include_once('style.php');print"

<style>

#tags
{
padding:5px;
width:245px;
height:17px;
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


<tr> <td height='30' width='200' bgcolor='green'>   <span id='child'> <b> <font color='white'> Purchase Edit </font> </b> </span>  </td></tr>

<tr> <td height='7'> </td></tr>





";


include_once('purchase_left.php');












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
<tr> <td height='40' align='center' id='saa'>  <b> Purchase  Edit </b> </td> </tr>
</table>


<table align='center' width='900' cellpadding='0' cellspacing='0' bgcolor='F2F2F2'>

<tr> <td height='20'> </td> </tr>

<tr> 

<td width='880' bgcolor='' align='center' valign='top' height='900'>

<table align='center' width='885' cellpadding='0' cellspacing='0'>

<tr> <td height='0'> </td> </tr>


<tr>

<form name='f' action='purchase_edit.php' method='POST'>

<td align='left' width='130'> <font size='2' face='arial' color='black'> <b> Purchase Date  </b> </font>
 </td>

 
<td align='left' width='755'> :


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


</td>
</tr>

<tr> <td height='5'> </td> </tr>
";




print"


<tr>
<td width='0' align='left'> <font size='2' face='arial' color='black'> <b> Purch Invoice No  </b> </font> </td>
<td align='left'> 
";


print"
: 

<input type='text' name='' value='$me' readonly  id='txt3_in'>
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
<td width='' left>
<font size='2' face='arial' color='black'> <b> Supplier Name </b> </font>
</td>

<td width='' align='left'>

:
<select name='supplier' id='p_tags'>
<option value='$supplier'> $suppliern </option>
";



//$result = mysql_query("SELECT * FROM supplier");


$result = mysql_query("SELECT * FROM `supplier`  ORDER BY `customer_name` ASC ");


while ($a_row = mysql_fetch_row($result)) {

	foreach ($a_row as $field) {
		
	}

print"
<option value='$a_row[0]'>$a_row[1] </option>
";

}

print"


</select>




</td>
</tr>



<tr> <td height='5'> </td> </tr>



<tr> 
<td align='left'>
<font size='2' face='arial' color='black'> <b>
Address
</b>

</font>
</td>

<td align='left'> 

: 
<input type='text' value='$addressn' id='text_d_p'>



</td>
</tr>

<tr>
<td height='5'> </td>
</tr>


<tr> 
<td align='left'>
<font size='2' face='arial' color='black'> <b>
Mobile
</b>

</font>
</td>

<td align='left'> 

: 
<input type='text' value='$mobilen' id='text_d_p'>

</td>
</tr>

<tr>
<td height='5'> </td>
</tr>




















<tr> 

<td width='' align='left'> 	
<font size='2' face='arial' color='black'> <b> Product </b>	 </font>
</td>
<td align='left'>
:
<label for='tags'> </label>
<input type='text' id='tags' name='product_id' size='20'>




<font size='2' face='arial' color='black'> <b> Price: <b> </font> <input type='text' name='price' id='tx3' size='16'> 
";


if($box_set==1)
{
print"
<font size='2' face='arial' color='black'> Box: </font> <input type='text' name='box' id='tx3' size='4'> 
";
}


print"
<font size='2' face='arial' color='black'> Qty: </font> <input type='text' name='qty' id='tx3' size='4'> 






";








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











/*

<font size='2' face='arial' color='716E6E'> Comission: </font> <input type='text' name='less_new' size='4'> 



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




<input type='hidden' name='ser' value='1'>




<input type='hidden' name='s45' value='$s45'>
<input type='hidden' name='supplier' value='$supplier'>


<input type='submit' value='Enter' id='enter'> 

</td>


</form




</tr>

</table>







<br>


<table align='center' width='880' cellpadding='3' cellspacing='1' bgcolor='E4DBDB'>

<tr bgcolor='FAFAFA'>
 <td height='25' bgcolor='' width='100' align='center'> <font face='arial' color='black' size='2'> <b> Remove </b> </font> </td>
 <td height='25' bgcolor='' width='250' align='center'> <font face='arial' color='black' size='2'>  <b> Product Name </b> </font> </td>
 ";
 
 
 
 include_once('mm2.php');
 
 
 print"
 <td height='25' bgcolor='' width='50' align='center'> <font face='arial' color='black' size='2'>  <b> Qty </b></font> </td>
 
 <td height='25' bgcolor='' width='50' align='center'> <font face='arial' color='black' size='2'>  <b> Unit </b> </font> </td>

 <td height='25' bgcolor='' width='100' align='center'> <font face='arial' color='black' size='2'> <b>  Rate </b> </font> </td>

 
 ";
 
 
 /*
 <td height='25' bgcolor='' width='100' align='center'> <font face='arial' color='716E6E' size='2'> Comission </font> </td>
 */
 
 print"
 
 
 
 <td height='25' bgcolor='' width='100' align='center'> <font face='arial' color='black' size='2'>  <b> Total </b> </font> </td>
</tr>
";




if($e>=0)

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

$arrp[20]=$price_a[$sew];




$total=$arrp[20]*$quantity;
$total3=$arrp[20]*$quantity;

$total=$total-$arrp_new[19];

$lesst=$lesst+$arrp_new[19];

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
 <td height='30'  width='100' align='center' bgcolor=''> <a href=\"purchase_edit.php?action=remove&i1d=$product_id_unique&sup=$supplier&s45=$s45&dat=$dat&mon=$mon&yer=$yer&ser=$ser\">  <img src='picture/remove.gif'> </a>  <b> $sew </b> </td>
 <td height='30' bgcolor='' width='250' align='left'> <font face='arial' color='716E6E' size='2'> $arrp_new[2]  
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
 <td height='25' bgcolor='' width='' align='center'> <font face='arial' color='716E6E' size='2'> $arrp_new[3] </font> </td>
 ";
}

if($cwp2==1)
{
 print"
 <td height='25' bgcolor='' width='' align='center'> <font face='arial' color='716E6E' size='2'> $arrp_new[30] </font> </td>
 ";
}
 

if($cwp3==1)
{
 print"
 <td height='25' bgcolor='' width='' align='center'> <font face='arial' color='716E6E' size='2'> $arrp_new[31] </font> </td>
 ";
}
 

if($cwp4==1)
{
 print"
 <td height='25' bgcolor='' width='' align='center'> <font face='arial' color='716E6E' size='2'> $arrp_new[32] </font> </td>
 ";
}
 
 
 
 
 
 print"
 <td height='30' bgcolor='' width='50' align='center'> <font face='arial' color='716E6E' size='2'> $quantity </font> </td>
 <td height='30' bgcolor='' width='100' align='center'> <font face='arial' color='716E6E' size='2'> $arrp_new[22] </font> </td>
<td height='30' bgcolor='' width='100' align='center'> <font face='arial' color='716E6E' size='2'> $arrp[20] </font> </td>
 
 
 ";
 
 
 /*
 
<td height='30' bgcolor='' width='100' align='center'> <font face='arial' color='716E6E' size='2'> $arrp[19] </font> </td>
 */
 
 
 print"

 <td height='30' bgcolor='' width='100' align='center'> <font face='arial' color='716E6E' size='2'> $total </font> </td>
</tr>
";



}





}




/*


print"
<tr bgcolor='FAFAFA'>
 <td height='25' bgcolor='' width='100' align='center'> <font face='arial' color='716E6E' size='2'>  </font> </td>
 <td height='25' bgcolor='' width='250' align='center'> <font face='arial' color='716E6E' size='2'>  </font> </td>
 <td height='25' bgcolor='' width='100' align='center'> <font face='arial' color='716E6E' size='2'>  </font> </td>
 
 <td height='25' bgcolor='' width='100' align='center'> <font face='arial' color='716E6E' size='2'> </font> </td>
 
 
  <td height='25' bgcolor='' width='100' align='center'> <font face='arial' color='716E6E' size='2'>  </font> </td>
 
 <td height='25' bgcolor='' width='50' align='center'> <font face='arial' color='716E6E' size='2'> $lesst </font> </td>
 
 
 
 <td height='25' bgcolor='' width='100' align='center'> <font face='arial' color='716E6E' size='2'>  </font> </td>
</tr>
";



*/









$stotal=$subtotal+$less;

$tax=0.00;


$stotal=$stotal-$discount;


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
<td width='170' align='left'> <font color='716E6E' face='arial' size='2'> Discount  &nbsp; </font>
</td>

<form action='purchase_edit.php' method='POST'>

<td width='470' align='left'> 

:
<input type='text' name='discount' value='$discount' size='25'> Tk.
</td>
</tr>


<tr> <td height='5'> </td> </tr>




<tr> 

<td width='' align='left'> <font color='716E6E' face='arial' size='2'> Carring Cost  </font>
</td>

<td width='' align='left'> 
:
<input type='text' name='less' value='$less' size='25'> Tk.
<input type='hidden' name='ser' value='5'>

</td>

</tr>




<tr> 

<td width='' align='left'> <font color='716E6E' face='arial' size='2'>  Payment  </font></td>
<td width='' height='30' align='left'> 

:
<input type='text' name='payment' value='$payment' size='25'> Tk.
</td>
</tr>







<tr> 
<td width='' align='left'> <font color='716E6E' face='arial' size='2'>  Adjust Amount  </font></td>
<td width='' height='30' align='left'>

:
 
<input type='text' name='adjust_amount' value='$adjust' size='25'> Tk.
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

<td width='' align='left'> <font color='716E6E' face='arial' size='2'> Cheque No </font></td>

<td width='' height='30' align='left' valign='top'> 

:

<input type='text' name='check_no' value='$check_no' size='25'>


</td>


</tr>




<tr> 

<td width='' align='left'> <font color='716E6E' face='arial' size='2'> Cheque Issu Date  </font></td>
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

<td width='' align='left'> <font color='716E6E' face='arial' size='2'> Note  </font></td>

<td width='' height='30' align='left' valign='top'>

:
 
<input type='hidden' name='supplier' value='$supplier'>

<input type='hidden' name='dat' value='$dat'>
<input type='hidden' name='mon' value='$mon'>
<input type='hidden' name='yer' value='$yer'>

<input type='hidden' name='memo_no' value='$me'>
<input type='hidden' name='s45' value='$s45'>






<input type='text' name='comments' value='$comments' size='25'>
</td>


</tr>


<tr> <td height='5'> </td> </tr>




<tr> 
<td width='' align='left'> <font color='716E6E' face='arial' size='2'>    </font></td>
<td width='' height='30' align='left'>

&nbsp;
 
 <input type='submit' value='Add To Payment ' ID='pr'>


 </td>
</form>
</tr>





<tr> <td height='5'> </td> </tr>








<tr>
<td> </td>

<form action='memoprint.php' method='POST' target='a_blank'>
<td align='left'> 


<input type='hidden' name='supplier' value='$supplier'>



<input type='hidden' name='dat' value='$dat'>
<input type='hidden' name='mon' value='$mon'>
<input type='hidden' name='yer' value='$yer'>

<input type='hidden' name='check_no' value='$check_no'>
<input type='hidden' name='idat' value='$idat'>
<input type='hidden' name='imon' value='$imon'>
<input type='hidden' name='iyer' value='$iyer'>


<input type='hidden' name='ddddd' value='100'>


<input type='hidden' name='memo_no' value='$me'>

<input type='hidden' name='car' value='$less'>
<input type='hidden' name='payment' value='$payment'>
<input type='hidden' name='comments' value='$comments'>
<input type='hidden' name='due' value='$due'>
<input type='hidden' name='balance' value='$balance'>
<input type='hidden' name='payment_mode' value='$payment_mode'>



<input type='hidden' name='discount' value='$discount'>
<input type='hidden' name='adjust_amount' value='$adjust'>


<input type='hidden' name='memo_no2' value='$memo_no2'>

&nbsp;
<input type='submit' value='Save & Print' id='enter2'>

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
<td bgcolor='' height='30' width='165' align='left'> <font size='2' face='arial' color='716E6E'>Total  </font> </td> 
<td bgcolor='' height='30' width='85' align='right'><font size='2' face='arial' color='716E6E'> $subtotal &nbsp;&nbsp;  </font> </td> 
</tr>





<tr bgcolor='white'> 
<td bgcolor='' height='' width='' align='left'> <font size='2' face='arial' color='716E6E'> Discount  </font> </td> 
<td bgcolor='' height='' width='' align='right'><font size='2' face='arial' color='716E6E'> $discount &nbsp;&nbsp; </font> </td> 
</tr>



<tr bgcolor='white'> 
<td bgcolor='' height='' width='' align='left'> <font size='2' face='arial' color='716E6E'> Carring cost  </font> </td> 
<td bgcolor='' height='' width='' align='right'><font size='2' face='arial' color='716E6E'>$less &nbsp;&nbsp; </font> </td> 
</tr>








<tr bgcolor='white'> 
<td bgcolor='' height='' width='' align='left'> <font size='2' face='arial' color='716E6E'>Sub Total  </font> </td> 
<td bgcolor='' height='' width='' align='right'><font size='2' face='arial' color='716E6E'> $stotal &nbsp;&nbsp; </font> </td> 
</tr>




<tr bgcolor='white'> 
<td bgcolor='' height='' width='' align='left'> <font size='2' face='arial' color='716E6E'> Payment  </font> </td> 
<td bgcolor='' height='' width='' align='right'><font size='2' face='arial' color='716E6E'>$payment &nbsp;&nbsp; </font> </td> 
</tr>


<tr bgcolor='white'> 
<td bgcolor='' height='' width='' align='left'> <font size='2' face='arial' color='716E6E'> Adjust Amount  </font> </td> 
<td bgcolor='' height='' width='' align='right'><font size='2' face='arial' color='716E6E'> $adjust &nbsp;&nbsp; </font> </td> 
</tr>




<tr bgcolor='white'> 
<td bgcolor='' height='' width='' align='left'> <font size='2' face='arial' color='716E6E'> Due </font> </td> 
<td bgcolor='' height='' width='' align='right'><font size='2' face='arial' color='716E6E'>$due &nbsp;&nbsp; </font> </td> 
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