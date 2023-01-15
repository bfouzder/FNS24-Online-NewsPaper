<?php
include_once('dbconnection.php');
session_start();

/*
$result = mysql_query("SELECT * FROM salememo");
$num_rows = mysql_num_rows($result);
*/

$result = mysql_query("SELECT * FROM `salememo`  ORDER BY `money_id` DESC  LIMIT 0 , 1 ");

while ($a_row = mysql_fetch_row($result)) {

	foreach ($a_row as $field) {
		
	}

$num=$a_row[1];

}


$me=$num;
$me=$me+1;

$ser=trim($_POST['ser']);


$vat=trim($_POST['vat']);
$tax2=trim($_POST['tax2']);




$less=trim($_POST['less']);
$payment=trim($_POST['payment']);
$payment_mode=trim($_POST['payment_mode']);
$paymenttype=trim($_POST['paymenttype']);
$supplier=trim($_POST['supplier']);
$comments=trim($_POST['comments']);
$transport_name=trim($_POST['transport_name']);
$contact_name=trim($_POST['contact_name']);
$sales_order=trim($_POST['sales_order']);

$p_des=trim($_POST['p_des']);
$p_des=str_replace("'","`","$p_des");



$project_name=trim($_POST['project_name']);


$transport_name=str_replace("'","`","$transport_name");
$contact_name=str_replace("'","`","$contact_name");



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

if($sales_order=="")
{
$sales_order=$_GET['sales_order'];	
}


if($project_name=="")
{
$project_name=$_GET['project_name'];	
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





$q=0;
$total_price_sale=0;
$preo=0;











$q=0;

$total_price_sale=0;
$preo=0;





$q=0;
$t=0;

$profit=0;
$ptyy=0;
$pty=0;




for($i=1;$i<=$w;$i++)

{
	
$total_price_sale=0;
$scc=0;
$sale_p2="0";
$sale_p3="0";
$iy=0;

//$result = mysql_query("SELECT * FROM `product_name` where  user_id='$p_id[$i]' ORDER BY `user_id` ");


$result = mysql_query("SELECT * FROM `saleproduct` where supplier_id='$supplier' && product_id='$p_id[$i]' ORDER BY `user_id` DESC  LIMIT 0 , 2");


while ($a_row = mysql_fetch_row($result)) {

	foreach ($a_row as $field) {
		
	}
	$iy++;
	if($iy==1)
	{
$sale_p2=$a_row[7];
	}

	if($iy==2)
	{
$sale_p3=$a_row[7];
	}
		
	
	
}

$a_sale_price2++;
$p_sale_price2[$a_sale_price2]=$sale_p2;
$p_sale_price3[$a_sale_price2]=$sale_p3;


$q=0;
$t=0;

$profit=0;
$ptyy=0;
$pty=0;


}

























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
$suppliern=$arrs[7];

$mobiles=$arrs[3];
$addresss=$arrs[5];


if($ser=="" && $supplier=="")
{
unset($_SESSION['cart']);
unset($_SESSION['cart_price']);
unset($_SESSION['cart_unit']);
unset($_SESSION['cart_com']);
unset($_SESSION['cart_local']);
	
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
$sales_order=str_replace("@","#","$sales_order");


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



$sql= "UPDATE  `product_name` SET `p_des`='$p_des' WHERE `user_id`='$product_id'";
mysql_query($sql);




$qty=trim($_POST['qty']);


//////////////////////////////////////////////////////////////////////




















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



if($supplier==0)
{
include_once('cus.php');
}

if($a==0 && $supplier!=0 && $product_id!="")
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
                        

						
						
	   $_SESSION['cart_price'][$product_id]=$_SESSION['cart_price'][$product_id]=$price;
       $_SESSION['cart_unit'][$product_id]=$_SESSION['cart_unit'][$product_id]+$unit;
	   $_SESSION['cart_com'][$product_id]=$_SESSION['cart_com'][$product_id]=$less_new;
	   $_SESSION['cart_local'][$product_id]=$_SESSION['cart_local'][$product_id]=$p_des;
	   
	 
	   

						
						
						
						
                break;


		case "remove":

                       unset($_SESSION['cart'] [$product_id]);
					   unset($_SESSION['cart_price'][$product_id]);
					   unset($_SESSION['cart_unit'][$product_id]);
					   unset($_SESSION['cart_com'][$product_id]);
					   unset($_SESSION['cart_local'][$product_id]);

             
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
<base target='_parent' /> 
";

//<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
?>





  <link rel="stylesheet" href="jquery-ui-themes-1.11.4/themes/smoothness/jquery-ui.css">
  
  
  
  <script src="jquery-1.10.2.js"></script>
  <script src="jquery-ui.js"></script>
  
 
  
  <script>
  
  var availableTags;
  
  var saletags;
  
  var stooo;
  
  
  var sale_price1;
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
    sale_price1 = [


	<?php
	

	
//$result = mysql_query("SELECT * FROM `product_name`  ORDER BY `user_id` ASC  LIMIT 0 , 100000");


$result = mysql_query("SELECT * FROM `product_name`");	


while ($a_row = mysql_fetch_row($result)) {

	foreach ($a_row as $field) {
		
	}
	$es91++;
print" ${ar}$p_sale_price3[$es91] -  $p_sale_price2[$es91]$ar, ";
	}
?>

    ];
  
  

  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  



    stooo = [


	<?php
	

	
//$result = mysql_query("SELECT * FROM `product_name`  ORDER BY `user_id` ASC  LIMIT 0 , 100000");


$result = mysql_query("SELECT * FROM `product_name`");	


while ($a_row = mysql_fetch_row($result)) {

	foreach ($a_row as $field) {
		
	}
	$es9++;
print" ${ar}$pry[$es9]$ar, ";
	}
?>

    ];
  
  
  
  
  
  
  
  
  
  
	  
    saletages = [


	<?php
	

	
//$result = mysql_query("SELECT * FROM `product_name`  ORDER BY `user_id` ASC  LIMIT 0 , 100000");


$result = mysql_query("SELECT * FROM `product_name`");	


while ($a_row = mysql_fetch_row($result)) {

	foreach ($a_row as $field) {
		
	}
print" ${ar}$a_row[5]$ar, ";
	}
?>

    ];
  
  
  
  
  
  
  
  
  
  
  
  
  $(function() {
	  
	  
	  
    availableTags = [

	<?php
	

	
//$result = mysql_query("SELECT * FROM `product_name`  ORDER BY `user_id` ASC  LIMIT 0 , 100000");


$result = mysql_query("SELECT * FROM `product_name`");	


while ($a_row = mysql_fetch_row($result)) {

	foreach ($a_row as $field) {
		
	}

$e9++;


$cq='"';	
$cq = mb_ereg_replace("$cq","*", $a_row[2]);
print" ${ar}$cq=$a_row[0]$ar, ";


//print" ${ar}$cq-Cost- $p_single[$e9]=$a_row[0]$ar, ";


	}
?>

      "Testing"

    ];
    $( "#tags" ).autocomplete({
      source: availableTags
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

document.fuu.sale_price1.value=sale_price1[i];

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

<script language='javascript'>


if($ser==5)
{

function mnnn()
{
	
document.bv.comments.focus();
}

	

}
</script>
";







print"
</head>



<body onload='mnnn()'>
";


include_once('header2.php');


print"
<table align='center' width='1200' cellpadding='0' cellspacing='1' height='800' bgcolor='gray'>
<tr bgcolor='white'> 
<td align='center' valign='top' width='220' bgcolor='#C5B991'>  

<table align='center' width='200' cellpadding='0' cellspacing='0' height=''>

<tr> <td height='10'> </td></tr>


<tr> <td height='30' width='200' bgcolor='green'> &nbsp;&nbsp;&nbsp;  <span id='child'> <b> <font color='white'> Purchase </font> </b> </span>  </td></tr>

<tr> <td height='7'> </td></tr>





";


include_once('sales_left.php');


print"



<td align='center' valign='top' width='980' bgcolor='F2F2F2'>  



	


<table align='center' width='900' cellpadding='0' cellspacing='0' bgcolor='F2F2F2'>
<tr> <td height='20' align='center'>  </td> </tr>
</table>





<table align='center' width='900' cellpadding='0' cellspacing='0' bgcolor='F2F2F2'>

<tr> <td height='0'> </td> </tr>

<tr> 

<td width='900' bgcolor='' align='center' valign='top' height='900'>

<table align='center' width='900' cellpadding='0' cellspacing='0'>


<tr> 

<form name='fu' action='sales.php' method='POST'> 


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
$contact_name1=str_replace("#","@","$contact_name");
$sales_order1=str_replace("#","@","$sales_order");






print"

<tr> <td height='1'> </td> </tr>



<tr> 

<td id='' width='150' bgcolor='' id='' align='left'>
<font size='2' face='arial' color='716E6E'> <b>&nbsp; Customer  Name </b> </font>

</td>

<td width='750' align='left'>
";

print"
<span id='se'>
:
";

print"
<select name='supplier' id='new_sup1' onchange='ree()'>
<option value='$supplier'> $suppliern </option>
";


//$result = mysql_query("SELECT * FROM `customer`  ORDER BY `user_id` ASC  LIMIT 0 , 60000 ");

$result = mysql_query("SELECT * FROM `customer`  ORDER BY `company_name` ASC ");



while ($a_row = mysql_fetch_row($result)) {

	foreach ($a_row as $field) {
		
	}
print"
	<option value='$a_row[0]'> $a_row[7] - ID - $a_row[2] - Address - $a_row[5] </option>
";

}

print"
</select>
";

print"
</span>




";

print"
&nbsp;&nbsp;&nbsp;&nbsp;
";

?>


<a href="#"  onclick="window.open('customer_new.php','name','width=600,height=400,toolbar=no,location=no,directories=no,status=no,menubar=no, scrollbars=no, left=300,top=140,resizable=no, copyhistory=no,titlebar=no')"> <font color='red'> <b> Create New customer </b> </font> </a>

&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;


<font size='4' face='arial' color='blue'> Product Sales Form </font>
<?php



print"

</td>
</form>

<form name='fuu' action='sales.php' method='POST'> 

</tr>
";

print"

<tr> <td height='8'> </td> </tr>

<tr>
<td width='0' align='left'> <font size='2' face='arial' color='716E6E'> <b> &nbsp; Date  </b> </font> </td>

<td align='left'> 
";




print"


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
<option name='2015'>2015</option>
<option name='2016'>2016</option>
<option name='2017'>2017</option>

</select>

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

<b> Due : $balance  </b>

";


?>



<?php


print"

</td>

<tr>

";




print"

<tr>
<td height='8'> </td>
</tr>


<tr> 

<td width='left'> 
<font face='arial' size='2' color='716E6E'> 
&nbsp; <b> Custom. Mobile </b> </font> </td>
<td width='left'> : <input type='text' name='sales_ordertt' value='$mobiles' size='15' id='txt'>  &nbsp; 
<font face='arial' size='3' color='716E6E'>   Address:  </font> <input type='text' name='memo_noddd' id='txt' value='$addresss' readonly size='35'> 
</font>
</td>
</tr>
";




print"

<tr>
<td height='8'> </td>
</tr>


<tr> 

<td width='left'> 
<font face='arial' size='2' color='716E6E'> 
&nbsp; <b> Sales Order </b> </font> </td>
<td width='left'> : <input type='text' name='sales_order' value='$sales_order' size='15' id='txt2'>   &nbsp; 
<font face='arial' size='3' color='716E6E'>  Invoice No :  </font>  <input type='text' name='memo_no' value='$me' readonly size='15' id='txt2'> 
</font>





<font size='2' face='arial' color='716E6E'> <b> Previous Rate : </b> </font> <input type='text' name='sale_price1' readonly size='5'> 
&nbsp;


&nbsp;
<font size='2' face='arial' color='716E6E'> <b> Sale Rate : </b> </font> <input type='text' name='sale_price' readonly size='5'> 
&nbsp;




<font size='2' face='arial' color='716E6E'> <b> Stock : </b> </font> <input type='text' name='sale_stock' readonly size='5'> 
</font> 


</td>
</tr>
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
<font face='arial' size='2' color='716E6E'> 
&nbsp; <b> Project Name: </b> </font> </td>
<td width='left'> : <input type='text' name='project_name' value='$project_name' size='15' id='txt'>    &nbsp; 
</td>
</tr>
";
*/



print"
<tr> 
<td width='left'> 
<font face='arial' size='2' color='716E6E'> 
&nbsp; <b> Contact Person </b> </font> </td>
<td width='left'> : 

<input type='text' name='contact_name' value='$contact_name' size='15' id='txt'>    &nbsp; 

</td>
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
<td height='8'> </td>
</tr>


<tr> 

<td width='left'> 
<font face='arial' size='2' color='716E6E'> 
&nbsp; <b> Product: </b> </font> </td>
<td width='left'> : 

<label for='tags'> </label>
<input type='text' id='tags' name='product_id' size='30' onblur='rnew()' onclick='rneww()'>




<font size='2' face='arial' color='716E6E'> Price: </font> <input type='text' name='price' size='10' id='txt2'> 

<font size='2' face='arial' color='716E6E'> Qty: </font> <input type='text' name='qty' size='4' id='txt2'> 

<font size='2' face='arial' color='716E6E'> Commi : </font> <input type='text' name='less_new' size='4' id='txt2'> 

<input type='hidden' name='ser' value='1'>
<input type='hidden' name='supplier' value='$supplier'>

<input type='hidden' name='ky' value='$kju'>

&nbsp;&nbsp;
<input type='submit' value='Enter' id='enter'>  
 


</td>

</tr>
";


print"
<tr>
<td height='8'> </td>
</tr>


<tr> 
<td width='left'> 
<font face='arial' size='2' color='716E6E'> 
&nbsp; <b> Local Products </b> </font> </td>
<td width='left'> : <input type='text' name='p_des'  size='15' id='txt'>    &nbsp; 
</td>

</form>
</tr>
";

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
 <td height='25' bgcolor='' width='100' align='center'> <font face='arial' color='716E6E' size='2'> Remove </font> </td>
 <td height='25' bgcolor='' width='250' align='center'> <font face='arial' color='716E6E' size='2'> Product name </font> </td>


 <td height='25' bgcolor='' width='100' align='center'> <font face='arial' color='716E6E' size='2'> Unit </font> </td>

 <td height='25' bgcolor='' width='100' align='center'> <font face='arial' color='716E6E' size='2'> Price </font> </td>
 

 
 <td height='25' bgcolor='' width='50' align='center'> <font face='arial' color='716E6E' size='2'> Qty </font> </td>
 
 
 <td height='25' bgcolor='' width='100' align='center'> <font face='arial' color='716E6E' size='2'> Total </font> </td>
 
 
 
 <td height='25' bgcolor='' width='100' align='center'> <font face='arial' color='716E6E' size='2'> Commission </font> </td>
 
 
 
 
 <td height='25' bgcolor='' width='100' align='center'> <font face='arial' color='716E6E' size='2'> Total </font> </td>
</tr>
</table>
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

$pto++;

if($pto==1)
{
print"
<table align='center' width='880' cellpadding='3' cellspacing='1' bgcolor='E4DBDB'>
";
}

if($pto<=5)
	
{
print"
<tr bgcolor='FFFFFF'>
 <td height='30'  width='100' align='center' bgcolor=''> <a href=\"sales.php?action=remove&i1d=$arrp_new[0]&sup=$supplier&dat=$dat&mon=$mon&yer=$yer&contact_name=$contact_name1&transport_name=$transport_name1&sales_order=$sales_order1&project_name=$project_name\">  <img src='picture/remove.gif'> </a> $sew </td>
 <td height='30' bgcolor='' width='250' align='left'> <font face='arial' color='716E6E' size='2'> &nbsp; $arrp_new[2]  $arrp[29]  $name_old[1] </font> </td>
 <td height='30' bgcolor='' width='100' align='center'> <font face='arial' color='716E6E' size='2'> $arrp_new[22] </font> </td>
 <td height='30' bgcolor='' width='100' align='center'> <font face='arial' color='716E6E' size='2'> $arrp[21] </font> </td>
 <td height='30' bgcolor='' width='50' align='center'> <font face='arial' color='716E6E' size='2'> $quantity </font> </td>
 <td height='30' bgcolor='' width='100' align='center'> <font face='arial' color='716E6E' size='2'> $total3 </font> </td>
 ";
 
 if($f_p[$f_u]=='%')
 {
print"
 <td height='30' bgcolor='' width='100' align='left'> <font face='arial' color='716E6E' size='2'> $f_pp % = $arrp[19] </font> </td>
";

 }
 else
 {
print"
 <td height='30' bgcolor='' width='100' align='left'> <font face='arial' color='716E6E' size='2'> $arrp[19] </font> </td>
";
	 
 }
	 
	 
print" 
<td height='30' bgcolor='' width='100' align='center'> <font face='arial' color='716E6E' size='2'> $total </font> </td>
</tr>
";
}


if($pto==5)
{
print"</table>";
include_once('address.php');	
$pto=0;
}




$total7=$total7+$total3;
$lesst=$lesst+$arrp[19];

}





}





print"

<table align='center' width='880' cellpadding='3' cellspacing='1' bgcolor='E4DBDB'>

<tr bgcolor='FFFFFF'>
 <td height='30'  width='100' align='center' bgcolor=''>  </td>
 <td height='30' bgcolor='' width='250' align='center'> <font face='arial' color='716E6E' size='2'>  </font> </td>
 <td height='30' bgcolor='' width='100' align='center'> <font face='arial' color='716E6E' size='2'>  </font> </td>
<td> </td>
 <td height='30' bgcolor='' width='50' align='center'> <font face='arial' color='716E6E' size='2'>  </font> </td>
 <td height='30' bgcolor='' width='100' align='center'> <font face='arial' color='716E6E' size='2'> $total7 </font> </td>
 <td height='30' bgcolor='' width='100' align='left'> <font face='arial' color='716E6E' size='2'> $lesst </font> </td>
 <td height='30' bgcolor='' width='100' align='center'> <font face='arial' color='716E6E' size='2'> $sub_total </font> </td>
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





$pui=$balance+$stotal2;

$new_pui=$pui-$payment;




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










print"

<table align='center' width='880' cellpadding='0' cellspacing='0'>

<tr bgcolor='white'> 

<td width='400' bgcolor='' align='center' valign='top'> 



<table align='center' width='500' cellpadding='0' cellspacing='0' bgcolor='F2F2F2'>

<tr> <td height='30'> </td> </tr>







<tr> 

<td width='190' align='right'> <font color='black' face='arial' size='2'> Discount : &nbsp; </font>
</td>

<form  name='bv' action='sales.php' method='POST'>
<td width='220' align='left'> 
<input type='text' name='discount_less' value='$discount_less2' size='10'> tk
<input type='hidden' name='ser' value='5'>

</td>

</tr>



<tr> <td height='5'>  </td>  </tr>




<tr> 
<td width='190' align='right'> <font color='black' face='arial' size='2'> Carring Cost : &nbsp; </font>
</td>
<td width='220' align='left'> 
<input type='text' name='less' value='$less' size='10'> tk
</td>
</tr>


<tr> <td height='5'> </td> </tr>

";


if($set_vat==1)

{
print"

<tr> 
<td width='190' align='right'> <font color='black' face='arial' size='2'> Vat : &nbsp; </font>
</td>
<td width='220' align='left'> 
<input type='text' name='vat' value='$vat' size='10'> % tk
</td>
</tr>

<tr> <td height='5'> </td> </tr>



<tr> 
<td width='190' align='right'> <font color='black' face='arial' size='2'> Tax : &nbsp; </font>
</td>
<td width='220' align='left'> 
<input type='text' name='tax2' value='$tax2' size='10'> % tk
</td>
</tr>


<tr> <td height='5'> </td> </tr>
";
}




print"


<tr> 

<td width='190' align='right'> <font color='716E6E' face='arial' size='2'> &nbsp; Pay : &nbsp; </font></td>
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

<td width='140' align='right'> <font color='716E6E' face='arial' size='2'> Cheque No:  &nbsp; </font></td>

<td width='270' height='30' align='left' valign='top'> 
<input type='text' name='check_no' value='$check_no'>


</td>


</tr>







<tr> 

<td width='140' align='right'> <font color='716E6E' face='arial' size='2'> Cheque Amount:  &nbsp; </font></td>

<td width='270' height='30' align='left' valign='top'> 
<input type='text' name='check_amount' value='$check_amount'>


</td>


</tr>










<tr> 

<td width='140' align='right'> <font color='716E6E' face='arial' size='2'> Cheque Issu Date:  &nbsp; </font></td>
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

<input type='hidden' name='transport_name' value='$transport_name'>
<input type='hidden' name='contact_name' value='$contact_name'>
<input type='hidden' name='memo_no' value='$me'>
<input type='hidden' name='sales_order' value='$sales_order'>



<input type='hidden' name='new_customer' value='$new_customer'>
<input type='hidden' name='new_address' value='$new_address'>
<input type='hidden' name='new_mobile' value='$new_mobile'>


<input type='hidden' name='project_name' value='$project_name'>





<input type='text' name='comments' value='$comments' size='20'>
<input type='submit' value='Add To Payment ' ID='PR'>
</td>

</form>
</tr>






<tr> 

<td> </td>
<form  action='salememo_demo.php' method='POST' target='a_blank'>
<td align='left'> 

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
<input type='hidden' name='discount_less' value='$discount_less2'>
<input type='hidden' name='balance' value='$balance'>


<input type='hidden' name='transport_name' value='$transport_name'>
<input type='hidden' name='contact_name' value='$contact_name'>
<input type='hidden' name='memo_no' value='$me'>
<input type='hidden' name='sales_order' value='$sales_order'>



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
<td> </td>

<form action='salememo.php' method='POST' target='a_blank'>
<td align='left'> 

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


<input type='hidden' name='discount_less' value='$discount_less2'>

<input type='hidden' name='balance' value='$balance'>


<input type='hidden' name='transport_name' value='$transport_name'>
<input type='hidden' name='contact_name' value='$contact_name'>
<input type='hidden' name='memo_no' value='$me'>
<input type='hidden' name='sales_order' value='$sales_order'>



<input type='hidden' name='new_customer' value='$new_customer'>
<input type='hidden' name='new_address' value='$new_address'>
<input type='hidden' name='new_mobile' value='$new_mobile'>
<input type='hidden' name='check_amount' value='$check_amount'>

<input type='hidden' name='project_name' value='$project_name'>

<input type='hidden' name='vat' value='$vat'>
<input type='hidden' name='tax2' value='$tax2'>





";

//if($subtotal>0)
//{


if($ser==5)
{
print"
<input type='submit' value='Save & Print' id='enter2'>
";
}
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


<td width='480' valign='top' align='center'>
<table align='center' width='380' cellpadding='5' cellspacing='1' bgcolor='cccccc'>

<tr bgcolor='white'>
<td bgcolor='' height='30' width='334' align='right'> <font size='2' face='arial' color='716E6E'>Total: </font> </td> 
<td bgcolor='' height='30' width='146' align='center'><font size='2' face='arial' color='716E6E'>$subtotal tk </font> </td> 
</tr>


<tr bgcolor='white'>
";

if($f_p_dis[$f_u_dis]=='%')
{
print"
<td bgcolor='' height='30' width='334' align='right'> <font size='2' face='arial' color='716E6E'>Discount $f_ppe_dis: </font> </td> 
";
}
else
{
print"
<td bgcolor='' height='30' width='334' align='right'> <font size='2' face='arial' color='716E6E'>Discount: </font> </td> 
";
}
	




print"
<td bgcolor='' height='30' width='146' align='center'><font size='2' face='arial' color='716E6E'>$discount_less tk </font> </td> 
</tr>


<tr bgcolor='white'>
<td bgcolor='' height='30' width='334' align='right'> <font size='2' face='arial' color='716E6E'>Total: </font> </td> 
<td bgcolor='' height='30' width='146' align='center'><font size='2' face='arial' color='716E6E'>$subtotal_last tk </font> </td> 
</tr>




<tr bgcolor='white'> 
<td bgcolor='' height='30' width='334' align='right'> <font size='2' face='arial' color='716E6E'> Carring cost: </font> </td> 
<td bgcolor='' height='30' width='146' align='center'><font size='2' face='arial' color='716E6E'>$less tk </font> </td> 
</tr>







<tr bgcolor='white'> 
<td bgcolor='' height='30' width='334' align='right'> <font size='2' face='arial' color='716E6E'>Sub Total: </font> </td> 
<td bgcolor='' height='30' width='146' align='center'><font size='2' face='arial' color='716E6E'> $stotal tk </font> </td> 
</tr>
";

if($vat!="")
{
print"
<tr bgcolor='white'> 
<td bgcolor='' height='30' width='334' align='right'> <font size='2' face='arial' color='716E6E'>Vat $vat % : </font> </td> 
<td bgcolor='' height='30' width='146' align='center'><font size='2' face='arial' color='716E6E'> $vat_tk tk </font> </td> 
</tr>
";
}

if($tax2!="")
{
print"
<tr bgcolor='white'> 
<td bgcolor='' height='30' width='334' align='right'> <font size='2' face='arial' color='716E6E'> Tax $tax2 % : </font> </td> 
<td bgcolor='' height='30' width='146' align='center'><font size='2' face='arial' color='716E6E'> $tax2_tk tk </font> </td> 
</tr>
";
}


if($vat!="" || $tax2!="")
{
print"
<tr bgcolor='white'> 
<td bgcolor='' height='30' width='334' align='right'> <font size='2' face='arial' color='716E6E'> Subtotal : </font> </td> 
<td bgcolor='' height='30' width='146' align='center'><font size='2' face='arial' color='716E6E'> $stotal2 tk </font> </td> 
</tr>
";
}


print"
<tr bgcolor='white'> 
<td bgcolor='' height='30' width='334' align='right'> <font size='2' face='arial' color='716E6E'> Payment: </font> </td> 
<td bgcolor='' height='30' width='146' align='center'><font size='2' face='arial' color='716E6E'>$payment tk </font> </td> 
</tr>





<tr bgcolor='white'> 
<td bgcolor='' height='30' width='334' align='right'> <font size='2' face='arial' color='716E6E'> Due: </font> </td> 
<td bgcolor='' height='30' width='146' align='center'><font size='2' face='arial' color='716E6E'>$due tk </font> </td> 
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