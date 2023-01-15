<?php
include_once('dbconnection.php');
session_start();



$sql="SELECT * FROM `product_name` WHERE user_id='1' ";
$result=mysql_query($sql);
$arrspg=mysql_fetch_array($result);
$agree=$arrspg[23];


$ser=trim($_POST['ser']);


$po_no=trim($_POST['po_no']);
$d_no=trim($_POST['d_no']);



$less=trim($_POST['less']);
$payment=trim($_POST['payment']);

$payment_mode=trim($_POST['payment_mode']);

$paymenttype=trim($_POST['paymenttype']);
$supplier=trim($_POST['supplier']);
$comments=trim($_POST['comments']);



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




//print" - $supplier - ";


if($supplier=="")
{
$supplier=(int)$_GET['sup'];	
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



$dat=$_GET['dat'];
$mon=$_GET['mon'];
$yer=$_GET['yer'];

$mdate="$yer$mon$dat";



}


if($ser==1)
{

$a=0;




$product=trim($_POST['product']);

$price=trim($_POST['price']);

//print"  $price  ";
//print"$product";
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




$qty=trim($_POST['qty']);


//////////////////////////////////////////////////////////////////////



$result = mysql_query("SELECT * FROM `product_name` where user_id='$product_id' ");	


while ($a_row = mysql_fetch_row($result)) {

	foreach ($a_row as $field) {
		
	}

$w++;
$p_id[$w]=$a_row[0];
$p_n[$w]=$a_row[2];
$p[$w]=$a_row[4];


}















$q=0;

$total_price_sale=0;
$preo=0;


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



$stock_q=$q-$q_sale[$ew];
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







//$per_sale_product= $q_price[$ew]/$q_sale[$ew];

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















///////////////////////////////////////////////////////////////////





/*

$sql="SELECT * FROM `product_name` WHERE user_id='$product_id' ";

$result=mysql_query($sql);
$arr=mysql_fetch_array($result);
//$ppp=$arr[0];

$up1=$arr[11];
$up2=$arr[12];


*/





















if($qty=="")
{
$qty=1;
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





if($a==0)
{



if($qty=="")
{
$qty=1;
}


//print" $product_id - $qty ";

$action="en";










switch($action) {	



		case "en":

                        $_SESSION['cart'][$product_id]=$_SESSION['cart'][$product_id]+$qty;
                        $ps=123;
                        $_SESSION['color']="$ps";
                        

                break;


		case "remove":

                       unset($_SESSION['cart'] [$product_id]);

             
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

             
                break;

                }






}


$adate="$yer$mon$dat";




$ps=$_SESSION['color'];


if($ps==123 && $ser!="")
{
foreach($_SESSION['cart'] as $product_id => $quantity)
{


$e++;

 
}

}












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
<title> Quotation  </title>
<base target='_parent' /> 
";

//<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
?>






  <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  
  
  <script src="jquery-1.10.2.js"></script>
  <script src="jquery-ui.js"></script>
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script>
  $(function() {
    var availableTags = [


	<?php
	

	
$result = mysql_query("SELECT * FROM `product_name`  ORDER BY `user_id` ASC  LIMIT 0 , 100000");

while ($a_row = mysql_fetch_row($result)) {

	foreach ($a_row as $field) {
		
	}
print" ${ar}$a_row[2]=$a_row[0]$ar, ";
	}
?>

      "Testing"

    ];
    $( "#tags" ).autocomplete({
      source: availableTags
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

include_once('jw.php');


print"
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


<tr> <td height='30' width='200' bgcolor='green'> &nbsp;&nbsp;&nbsp;  <span id='child'> <b> <font color='white'>  </font> </b> </span>  </td></tr>

<tr> <td height='7'> </td></tr>





";


include_once('sales_left.php');


print"



<td align='center' valign='top' width='980'>  



	





<table align='center' width='900' cellpadding='0' cellspacing='0' bgcolor='F2F2F2'>
<tr> <td height='30' align='center'> <font size='4' face='arial' color='blue'>  Quotation / Estimate  </font> </td> </tr>
</table>


<table align='center' width='900' cellpadding='0' cellspacing='0' bgcolor='F2F2F2'>

<tr> <td height='20'> </td> </tr>

<tr> 

<td width='900' bgcolor='' align='center' valign='top' height='900'>

<table align='center' width='900' cellpadding='0' cellspacing='0'>


<tr> 

<form name='fu' action='qsales.php' method='POST'> 


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

<td id='' width='100' bgcolor='' id=''>
<font size='2' face='arial' color='716E6E'> <b>&nbsp;&nbsp; Cus. Name: </b> </font>
";

print"
<span id='se'>
";

print"
<select name='supplier'>
<option value='$supplier'> $suppliern </option>
";


//$result = mysql_query("SELECT * FROM `customer`  ORDER BY `user_id` ASC  LIMIT 0 , 60000 ");

$result = mysql_query("SELECT * FROM `customer`  ORDER BY `customer_name` ASC ");



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


print"
</span>
";

print"
<span id='hide' onmouseover='re()'>
</span>

&nbsp;  Date:

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
<option name='2015'>2015</option>
<option name='2016'>2016</option>
<option name='2017'>2017</option>

</select>

&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;
";

/*

<a href="#"  onclick="window.open('customer_new.php','name','width=600,height=400,toolbar=no,location=no,directories=no,status=no,menubar=no, scrollbars=no, left=300,top=140,resizable=no, copyhistory=no,titlebar=no')"> <font color='red'> <b> Create New customer </b> </a>



*/

?>



<?php


print"
Stock: $up3
";

print"



</td>
</tr>

<tr>
<td height='15'> </td>
</tr>


";



/*

<tr> 
<td align='left'>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;	
<font size='2' face='arial' color='black'> P/O NO: </font> <input type='text' name='po_no' size='15' value='$po_no'> 
&nbsp;
<font size='2' face='arial' color='black'> Delivery Challan No: </font> <input type='text' name='d_no' size='15' value='$d_no'> 

</td>
</tr>
*/

print"

<tr>
<td height='15'> </td>
</tr>





<tr> 
<td width='400' align='left'> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;	
<font size='2' face='arial' color='black'> Product: </font> 



<label for='tags'> </label>
<input type='text' id='tags' name='product_id' size='20>





<font size='2' face='arial' color='716E6E'> Price: </font> <input type='text' name='price' size='10'> 



<font size='2' face='arial' color='716E6E'> Qty: </font> <input type='text' name='qty' size='4'> 
";




/*"

<font size='2' face='arial' color='716E6E'> Comission: </font> <input type='text' name='less_new' size='4'> 

*/



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

	


<input type='hidden' name='ser' value='1'>

</td>

<td width='80' align='left'> <input type='submit' value='Enter'>  </td>
</form
</tr>



</table>







<br>


<table align='center' width='880' cellpadding='0' cellspacing='1' bgcolor='E4DBDB'>

<tr bgcolor='FAFAFA'>
 <td height='25' bgcolor='' width='100' align='center'> <font face='arial' color='716E6E' size='2'> Remove </font> </td>
 <td height='25' bgcolor='' width='250' align='center'> <font face='arial' color='716E6E' size='2'> Description  </font> </td>
 

 
 <td height='25' bgcolor='' width='50' align='center'> <font face='arial' color='716E6E' size='2'> Qty </font> </td>
  <td height='25' bgcolor='' width='100' align='center'> <font face='arial' color='716E6E' size='2'> Unit </font> </td>
 
  <td height='25' bgcolor='' width='100' align='center'> <font face='arial' color='716E6E' size='2'> Rate </font> </td>

 
";


/* 
 <td height='25' bgcolor='' width='100' align='center'> <font face='arial' color='716E6E' size='2'> Commission </font> </td>
 */
 
 
 print"
 
 <td height='25' bgcolor='' width='100' align='center'> <font face='arial' color='716E6E' size='2'> Total </font> </td>
</tr>
";


if($ps==123 && $product_id>=1)

{
	
/*	
if($dat>30 && $mon>5)
{
exit;	
}
*/


foreach($_SESSION['cart'] as $product_id => $quantity)
{


 
$sql="SELECT * FROM `product_name` WHERE user_id='$product_id' ";


$result=mysql_query($sql);
$arrp=mysql_fetch_array($result);


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
 <td height='30'  width='100' align='center' bgcolor=''> <a href=\"sales.php?action=remove&i1d=$arrp[0]&sup=$supplier&dat=$dat&mon=$mon&yer=$yer\">  <img src='picture/remove.gif'> </a> $sew </td>
 <td height='30' bgcolor='' width='250' align='center'> <font face='arial' color='716E6E' size='2'> $arrp[2] - $name[1] </font> </td>
 
 
 <td height='30' bgcolor='' width='50' align='center'> <font face='arial' color='716E6E' size='2'> $quantity </font> </td>
 
 <td height='30' bgcolor='' width='100' align='center'> <font face='arial' color='716E6E' size='2'> $arrp[22] </font> </td>
 
 <td height='30' bgcolor='' width='100' align='center'> <font face='arial' color='716E6E' size='2'> $arrp[21] </font> </td>
 
 ";
 
 /*
 <td height='30' bgcolor='' width='100' align='center'> <font face='arial' color='716E6E' size='2'> $arrp[19] </font> </td>
 */
 
 
 print"
 
 
 <td height='30' bgcolor='' width='100' align='center'> <font face='arial' color='716E6E' size='2'> $total </font> </td>
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

<tr> <td height='30'> </td> </tr>







<tr> 

<td width='190' align='right'> <font color='black' face='arial' size='2'> Discount : &nbsp; </font>
</td>

<form action='sales.php' method='POST'>
<td width='220' align='left'> 

<input type='text' name='discount_less' value='$discount_less' size='10'> tk
<input type='hidden' name='ser' value='5'>

</td>

</tr>



<tr> <td height='5'>  </td>  </tr>




<tr> 

<td width='190' align='right'> <font color='blue' face='arial' size='2'> Freight Charge : &nbsp; </font>
</td>

<td width='220' align='left'> 

<input type='text' name='less' value='$less' size='10'> tk
<input type='hidden' name='ser' value='5'>

</td>

</tr>




<tr> 

<td width='190' align='right'> <font color='716E6E' face='arial' size='2'> &nbsp; Payment : &nbsp; </font></td>
<td width='220' height='30' align='left'> 
<input type='text' name='payment' value='$payment' size='10'> tk
</td>
</tr>


<tr> 

<td width='190' align='right'> <font color='716E6E' face='arial' size='2'> Payment mode : &nbsp;</font> </td>
<td width='220' height='30' align='left'> 
<select name='payment_mode'>

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

<td width='140' align='right'> <font color='716E6E' face='arial' size='2'> Check No:  &nbsp; </font></td>

<td width='270' height='30' align='left' valign='top'> 
<input type='text' name='check_no' value='$check_no'>


</td>


</tr>







<tr> 

<td width='140' align='right'> <font color='716E6E' face='arial' size='2'> Check Amount:  &nbsp; </font></td>

<td width='270' height='30' align='left' valign='top'> 
<input type='text' name='check_amount' value='$check_amount'>


</td>


</tr>










<tr> 

<td width='140' align='right'> <font color='716E6E' face='arial' size='2'> Check Issu Date:  &nbsp; </font></td>
<td width='270' height='30' align='left' valign='top'> 

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
<option name='2015'>2015</option>
<option name='2016'>2016</option>
<option name='2017'>2017</option>

</select>

</td>
</tr>









<tr> 

<td width='140' align='right'> <font color='716E6E' face='arial' size='2'> Comments:  &nbsp; </font></td>

<td width='270' height='30' align='left' valign='top'> 
<input type='hidden' name='supplier' value='$supplier'>

<input type='hidden' name='dat' value='$dat'>
<input type='hidden' name='mon' value='$mon'>
<input type='hidden' name='yer' value='$yer'>




<input type='hidden' name='new_customer' value='$new_customer'>
<input type='hidden' name='new_address' value='$new_address'>
<input type='hidden' name='new_mobile' value='$new_mobile'>





<input type='text' name='comments' value='$comments' size='20'>
<input type='submit' value='Add To Payment ' ID='PR'>
</td>

</form>
</tr>












</table>

</td>





";

/////////////////////////////////////////////////

print"


<td width='480' valign='top' align='center'>
<table align='center' width='380' cellpadding='5' cellspacing='1' bgcolor='cccccc'>

<tr bgcolor='white'>
<td bgcolor='' height='30' width='334' align='right'> <font size='2' face='arial' color='716E6E'>Total: </font> </td> 
<td bgcolor='' height='30' width='146' align='center'><font size='2' face='arial' color='716E6E'>$subtotal tk </font> </td> 
</tr>
";



if($discount_less>0)

{

print"
<tr bgcolor='white'>
<td bgcolor='' height='30' width='334' align='right'> <font size='2' face='arial' color='716E6E'>Discount: </font> </td> 
<td bgcolor='' height='30' width='146' align='center'><font size='2' face='arial' color='716E6E'>$discount_less tk </font> </td> 
</tr>
";



print"
<tr bgcolor='white'>
<td bgcolor='' height='30' width='334' align='right'> <font size='2' face='arial' color='716E6E'>Total: </font> </td> 
<td bgcolor='' height='30' width='146' align='center'><font size='2' face='arial' color='716E6E'>$subtotal_last tk </font> </td> 
</tr>
";

}




if($less>0)

{

print"
<tr bgcolor='white'> 
<td bgcolor='' height='30' width='334' align='right'> <font size='2' face='arial' color='716E6E'> Freight Charge : </font> </td> 
<td bgcolor='' height='30' width='146' align='center'><font size='2' face='arial' color='716E6E'>$less tk </font> </td> 
</tr>



<tr bgcolor='white'> 
<td bgcolor='' height='30' width='334' align='right'> <font size='2' face='arial' color='716E6E'>Sub Total: </font> </td> 
<td bgcolor='' height='30' width='146' align='center'><font size='2' face='arial' color='716E6E'> $stotal tk </font> </td> 
</tr>
";

}


if($payment>0)

{

print"
<tr bgcolor='white'> 
<td bgcolor='' height='30' width='334' align='right'> <font size='2' face='arial' color='716E6E'> Payment: </font> </td> 
<td bgcolor='' height='30' width='146' align='center'><font size='2' face='arial' color='716E6E'>$payment tk </font> </td> 
</tr>
";

}



/*
print"
<tr bgcolor='white'> 
<td bgcolor='' height='30' width='334' align='right'> <font size='2' face='arial' color='716E6E'> Due: </font> </td> 
<td bgcolor='' height='30' width='146' align='center'><font size='2' face='arial' color='716E6E'>$due tk </font> </td> 
</tr>
";
*/







print"
</table>
</td>
</tr>

</table>

<table align='center' width='900' cellpadding='0' cellspacing='0'>
<tr>
<td> </td>


<form action='qsalememo.php' method='POST' target='a_blank'>
<td align='left'> 

<br> <br>

Agreement: 
<textarea rows='10' cols='40' id='elm1' name='agree'> $agree </textarea>

<br>
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


<input type='hidden' name='new_customer' value='$new_customer'>
<input type='hidden' name='new_address' value='$new_address'>
<input type='hidden' name='new_mobile' value='$new_mobile'>
<input type='hidden' name='check_amount' value='$check_amount'>



<input type='hidden' name='po_no' value='$po_no'>
<input type='hidden' name='d_no' value='$po_no'>




";


	print"
<input type='submit' value='Print'>
";

print"
</td>

</form>
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