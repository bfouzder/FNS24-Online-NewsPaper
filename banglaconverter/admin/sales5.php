
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

$wa=trim($_POST['wa']);



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


$inn='\"';
$inn2='"';

$p_des=str_replace("$inn","$inn2","$p_des");

$p_des=str_replace("'","","$p_des");



$project_name=trim($_POST['project_name']);

$service=trim($_POST['service']);



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



//if($ser=="")
//{
$bbb=time(); 
$d=date("m/d/y",$bbb); 
$mon="$d[0]$d[1]";
$dat="$d[3]$d[4]";
$yer="20$d[6]$d[7]";

$mdate="$yer$mon$dat";

//}




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


$sql="SELECT * FROM `product_name` WHERE user_id='$p_id[$i]' ";
$result=mysql_query($sql);
$a_suba=mysql_fetch_array($result);
$sub_category=$a_suba[18];



$sql="SELECT * FROM `product_sub_category` WHERE user_id='$sub_category' ";
$result=mysql_query($sql);
$a_sub=mysql_fetch_array($result);
$sub_category_name=$a_sub[2];




$p_sub_name[$a_sale_price2]="$sub_category_name";

//print"$p_sub_name[$a_sale_price2] <br>";


}








$supplier_dbid=$b_code;



for($i=1;$i<=$w;$i++)

{
	
$total_price_sale=0;
$q=0;
$q1=0;

$result = mysql_query("SELECT * FROM `saleproduct_transfer` where   product_id='$p_id[$i]' ORDER BY `adat` ");

 
//$result = mysql_query("SELECT * FROM `saleproduct` where adat<='$mdate'  && product_id='$p_id[$i]' ORDER BY `adat` ");


while ($a_row = mysql_fetch_row($result)) {

	foreach ($a_row as $field) {
		
	}


$tq_tr++;
if($a_row[36]==$supplier_dbid)
{
$q=$q+$a_row[6];
}


if($a_row[2]==$supplier_dbid)
{
$q1=$q1+$a_row[6];


}


}

$tfh++;


$tf1[$tfh]=$q;
$tf2[$tfh]=$q1;



}


$tfh=0;











for($i=1;$i<=$w;$i++)
{	
$q_return=0;
$total_return=0;


$result = mysql_query("SELECT * FROM `saleproduct_return` where  adat<='$mdate' && product_id='$p_id[$i]' ORDER BY `adat` ");

while ($a_row = mysql_fetch_row($result)) {

	foreach ($a_row as $field) {
		
	}
$q_return=$q_return+$a_row[6];
$total_return=$total_return+$a_row[25];
}
$wqs_return++;
$q_wsale_return[$wqs_return]=$q_return;
$total_price_return[$wqs_return]=$total_return;

$q_return=0;
$total_return=0;
}














for($i=1;$i<=$w;$i++)
{	
$q_purchase_return=0;
$total_purchase_return=0;

$result = mysql_query("SELECT * FROM `buyproduct_return` where  adat<='$mdate' && product_id='$p_id[$i]' ORDER BY `adat` ");

while ($a_row = mysql_fetch_row($result)) {

	foreach ($a_row as $field) {
		
	}
$q_purchase_return=$q_purchase_return+$a_row[6];
$total_purchase_return=$total_purchase_return+$a_row[8];

}
$wqs_purchase_return++;
$q_wsale_purchase_return[$wqs_purchase_return]=$q_purchase_return;
$total_price_purchase_return[$wqs_purchase_return]=$total_purchase_return;
$q_purchase_return=0;
$total_purchase_return=0;

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



$tfn=$tf1[$ew]-$tf2[$ew];

$stock_q=$stock_q+$tfn;


$stock_q=$stock_q+$q_wsale_return[$ew];
$stock_q=$stock_q-$q_wsale_purchase_return[$ew];




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





if($ser=="")
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

/*
if($supplier=="" && $b==0)
{
include_once('sup.php');
$b=1;
}
*/



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
$product_id=trim($_POST['barcode_id']);

$sql="SELECT * FROM `product_name` WHERE product_id='$product_id' ";
$result=mysql_query($sql);
$arrssp=mysql_fetch_array($result);
$product_id=$arrssp[0];


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
//include_once('cus.php');
}

if($a==0 && $product_id!="")
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

$cq10='"';
$cq10 = mb_ereg_replace("$cq10","*", $a_row[3]);



print" ${ar}$p_sub_name[$e9] $cq - $cq10=$a_row[0]$ar, ";


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

//document.fuu.sale_price1.value=sale_price1[i];

document.fuu.sale_stock.value=stooo[i];

}


}


}


function rneww()
{
document.fuu.product_id.value='';	
}


function fin()
{
document.fuu.barcode_id.focus();	
}

</script>














<script>
$(document).ready(function(){
	
	
          fin();
	
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





<script language='javascript'>



function ampm()
{
	var currentTime = new Date()
	var hours = currentTime.getHours()
	var minutes = currentTime.getMinutes()
        var n = currentTime.getSeconds(); 

	if (minutes < 10)
	minutes = "0" + minutes

	var suffix = "AM";
	if (hours >= 12) {
	suffix = "PM";
	hours = hours - 12;
	}
	if (hours == 0) {
	hours = 12;
	}

	
   var month = new Array();
    month[0] = "January";
    month[1] = "February";
    month[2] = "March";
    month[3] = "April";
    month[4] = "May";
    month[5] = "June";
    month[6] = "July";
    month[7] = "August";
    month[8] = "September";
    month[9] = "October";
    month[10] = "November";
    month[11] = "December";

    var d = new Date();
    var nn = month[d.getMonth()];

    var dn = d.getDate();
    var ynn = d.getFullYear();

document.p.tn.value=""+ hours + ":" + minutes + ":"+ n + ":" + suffix + "";

//document.f.clock.value=100;

}



function chc()
{

var cx1;

document.p.stotal1.value=document.p.subtotal.value-document.p.discount_less.value;


cx1=document.p.stotal1.value*document.p.vat.value;
cx1=cx1/100;

document.p.vat_tk.value=cx1;

if(cx1>0)
{
document.p.stotal.value=parseFloat(document.p.stotal1.value)+parseFloat(cx1);
}
else
{
document.p.stotal.value=document.p.stotal1.value;
}



document.p.due.value=document.p.stotal.value-document.p.payment.value;

	
}


function pp()
{
	
var c=1;

document.p.submit();	

}
</script>







<?php


include_once('style.php');


print"
<style>

#cus
{
width:150px;
height:25px;
font-size:15px;	
}


#cus1
{
width:110px;
height:25px;
font-size:15px;	
}


#pr
{
width:130px;
height:35px;
font-size:18px;	
}


#tags
{
width:300px;
height:30px;
font-size:18px;	
}

#price1
{
width:70px;
height:30px;
font-size:18px;	
}


#qty1
{
width:70px;
height:30px;
font-size:18px;	
}


#pr1
{
width:100px;
height:35px;
font-size:18px;	
}





</style>

";

?>


<script language='javascript'>

function foo()
{
	
document.fop.submit();	
}

var q11=0;

var p1;
var p2;
var p3;
var p4;
var p5;
var p6;
var p7;
var p8;
var p9;
var p10;

function adf()
{

var q1;




q11++;

q1=document.fop.serial2.value;

if(q11==1)
{
document.fop.serial.value=q1;
p1=q1;

}


if(q11==2)
{
p2=q1;
document.fop.serial.value=p1+","+q1;
}

if(q11==3)
{
p3=q1;
document.fop.serial.value=p1+","+p2 +","+q1;
}


if(q11==4)
{
p4=q1;
document.fop.serial.value=p1+","+p2 +","+p3 +","+q1;
}


if(q11==5)
{
p5=q1;
document.fop.serial.value=p1+","+p2 +","+p3 +","+p4+ ","+q1;
}


}

</script>



<?php
















print"

</head>


<body onload='ampm()'>
";




print"

<table align='center' width='1213' cellpadding='0' cellspacing='0' height='0' bgcolor='#A1BBD7'>
<tr bgcolor=''> 
<td align='left' height='40'> <font size='4'> <b>  &nbsp;&nbsp; <a href='report.php'> <b> Home </b> </a> &nbsp; | &nbsp; <a href='sales5.php'> <b> Sales </b> </a> </font> </td>
</tr>
</table>

<table align='center' width='1200' cellpadding='5' cellspacing='0' height='0' bgcolor=''>
<tr bgcolor='white'> 
";

print"

<td align='center' valign='top' width='900'>  

<table align='center' width='900' cellpadding='0' cellspacing='0' bgcolor='F2F2F2'>

<tr> <td height='10'> </td> </tr>

<tr> 

<td width='900' bgcolor='' align='center' valign='top' height='900'>

<table align='center' width='900' cellpadding='0' cellspacing='0'>


<tr> 
<form name='fuu' action='sales5.php' method='POST'> 
<td height='0'> </td> </tr>
";



print"
<tr> <td height='1'> </td> </tr>




<tr> 
<td width='900' align='left'> &nbsp;	
<font size='2' face='arial' color='black'> <b> Search Product	:  </b> </font>

<label for='tags'> </label>
<input type='text' id='tags' name='product_id' size='30' onblur='rnew()' onclick='rneww()'>


<font face='arial' size='3' color='716E6E'> &nbsp; Invoice:</font>  <input type='text' name='memo_no' value='$me' readonly size='15' id='txt2'> 
</font>


<font size='2' face='arial' color='716E6E'> <b> Rate :</b> </font> <input type='text'  name='sale_price' readonly size='5'> 


<font size='2' face='arial' color='716E6E'> <b> Stock :</b> </font> <input type='text'  name='sale_stock' readonly size='5'> 
</font> 


</td>
</tr>

<tr> <td height='10'> </td> </tr>


<tr> 
<td width='900' align='left'> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;	
<font size='2' face='arial' color='black'> <b> Barcode :  </b> </font>
<input type='text' id='tags' name='barcode_id' size='30' onload='fin()'>


";





print"

<font size='2' face='arial' color='716E6E'> <b> Qty: </b> </font> <input type='text' name='qty' id='qty1' size='4'> 


<font size='2' face='arial' color='716E6E'> <b>Price: </b> </font> <input type='text' name='price' id='price1' size='4'> 


&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;



<input type='submit' id='pr1' value='Enter'>

";








print"
</td>
<td width='80' align='left'>   


<input type='hidden' name='ser' value='1'>

</td>

</form>







<form name='p' action='salememo.php' method='POST' target='_blank'>

</tr>


</table>





<br>

<table align='center' width='880' cellpadding='3' cellspacing='1' bgcolor='E4DBDB'>

<tr bgcolor='FAFAFA'>
 <td height='35' bgcolor='' width='100' align='center'> <font face='arial' color='716E6E' size='2'> <b> Remove </b> </font> </td>
 <td height='' bgcolor='' width='250' align='left'> &nbsp;&nbsp; <font face='arial' color='716E6E' size='2'> <b> Product name </b> </font> </td>
 <td height='' bgcolor='' width='50' align='center'> <font face='arial' color='716E6E' size='2'> <b> Qty </b> </font> </td>
 
 <td height='' bgcolor='' width='50' align='center'> <font face='arial' color='716E6E' size='2'> <b> Unit </b> </font> </td>
 
 <td height='' bgcolor='' width='50' align='center'> <font face='arial' color='716E6E' size='2'> <b> Price </b> </font> </td>
 <td height='' bgcolor='' width='100' align='center'> <font face='arial' color='716E6E' size='2'> <b> Total </b> </font> </td>
</tr>
";












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


















if($ps==123)

{
	
	

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



/*
$sql="SELECT * FROM `serial` WHERE serial='$product_id' ";
$result=mysql_query($sql);


$arrp=mysql_fetch_array($result);
$total=$arrp[5]*$quantity;
$subtotal=$subtotal+$total;
*/






print"
<tr bgcolor='FFFFFF'>
 <td height='30'  width='100' align='center' bgcolor=''> <a href=\"sales5.php?action=remove&i1d=$arrp_new[0]&sup=$supplier&dat=$dat&mon=$mon&yer=$yer&contact_name=$contact_name1&transport_name=$transport_name1&sales_order=$sales_order1&project_name=$project_name&new_customer=$new_customer&new_mobile=$new_mobile&new_address=$new_address&ser=$ser\">  <img src='picture/remove.gif'> </a> $sew </td>
 ";

print"
 <td height='' bgcolor='' width='250' align='left'> <font face='arial' color='716E6E' size='2'> 

 $arrp_new[2] $arrp[29]  <br>
 
 $arrp_new[3]
 
";

print"
</font> 
</td>
 

<td height='' bgcolor='' width='50' align='center'> <font face='arial' color='716E6E' size='2'> $quantity </font> </td>

<td height='' bgcolor='' width='50' align='center'> <font face='arial' color='716E6E' size='2'> $arrp_new[22] </font> </td>

<td height='' bgcolor='' width='100' align='center'> <font face='arial' color='716E6E' size='2'> $arrp[21] </font> </td>


<td height='' bgcolor='' width='50' align='center'> <font face='arial' color='716E6E' size='2'> $total </font> </td>

</tr>
";



}





}






print"
</table>
";









$less="";
$stotal="";
$payment="";
$due="";

$stotal=$subtotal-$less;
$due=$stotal-$payment;











print"
</td>


<td width='1' valign='top' bgcolor='#DDDDDD'>
&nbsp;
</td>

<td width='299' valign='top'>
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




<tr> 
<td height='40'> </td>
</tr>


<tr>
<td>

&nbsp;
&nbsp;
&nbsp;
&nbsp;


<font face='arial' color='#716E6E' size='2'> <b>  Date </b> </font>

&nbsp;
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
</td>
</tr>


<tr> 
<td height='10'> </td>
</tr>


<tr> <td align='left'> <font face='arial' color='#716E6E' size='2'> &nbsp; <b> Customer :  </b> </font> 
";
print"
<select name='supplier' id='cus'>
<option value='$supplier'> $suppliern </option>
";


$result = mysql_query("SELECT * FROM `customer`  ORDER BY `customer_name` ASC  LIMIT 0 , 60000 ");

while ($a_row = mysql_fetch_row($result)) {

	foreach ($a_row as $field) {
		
	}
print"
	<option value='$a_row[0]'> $a_row[1] - ID - $a_row[2] - Address - $a_row[5]</option>
";

}

print"
</select>
";

print"
</td> 
</tr>

<tr> <td height='10'> </td> </tr>



<tr> 
<td align='left'> 
<font face='arial' color='#716E6E' size='2'>  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <b> Name : </b> </font> 
<input type='text' name='new_customer' id='cus' size='3'>
</td> 
</tr>


<tr> <td height='40'> </td> </tr>



<tr> <td height='1' bgcolor='#B3B3B3'> </td> </tr>

<tr> <td height='10'> </td> </tr>

<tr>
<td valign='top'>
<table align='center' width='295' cellpadding='0' cellspacing='0'>




<tr> <td height='12'> </td> </tr>


<tr> 
<td align='left' width='120'> 
<font face='arial' color='716E6E' size='2'> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  Total : &nbsp;  </font> 
</td>
<td align='left' width='165'>
<input type='text' name='subtotal'  id='cus1' value='$subtotal' readonly  size='3' onblur='chc()'>
</td> 
</tr>

<tr> <td height='12'> </td> </tr>

<tr> 
<td align='left'> 
<font face='arial' color='716E6E' size='2'> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  Discount : &nbsp;  </font> 
</td>
<td align='left'>
<input type='text' name='discount_less'  value='' id='cus1' size='3' onblur='chc()'>
</td> 
</tr>


<tr> <td height='12'> </td> </tr>


<tr> 
<td align='left'> 
<font face='arial' color='716E6E' size='2'> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  Total : &nbsp;  </font> 
</td>
<td align='left'>
<input type='text' name='stotal1' value='$stotal' readonly id='cus1' size='3' onblur='chc()'>
</td> 
</tr>

<tr> <td height='12'> </td> </tr>


<tr> 
<td align='left'> 
<font face='arial' color='716E6E' size='2'> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  Vat : &nbsp;  </font> 
</td>
<td align='left'>

<input type='text' name='vat'  id='cus3' size='1' onblur='chc()'> %

<input type='text' name='vat_tk'  id='cus3' size='1' onblur='chc()'>

 tk.
 
</td> 
</tr>

<tr> <td height='12'> </td> </tr>



<tr> 
<td align='left'> 
<font face='arial' color='716E6E' size='2'> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  Subtotal : &nbsp;  </font> 
</td>
<td align='left'>
<input type='text' name='stotal' value='$stotal' readonly id='cus1' size='3' onblur='chc()'>
</td> 
</tr>

<tr> <td height='12'> </td> </tr>




<tr> 
<td align='left'> 
<font face='arial' color='716E6E' size='2'> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  Payment : &nbsp;  </font> 
</td>
<td align='left'>
<input type='text' name='payment'  value='$payment' id='cus1' size='3' onblur='chc()'>
</td> 
</tr>


<tr> <td height='12'> </td> </tr>



<tr> 
<td align='left'> 
<font face='arial' color='716E6E' size='2'> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  Due : &nbsp;  </font> 
</td>
<td align='left'>
<input type='text' name='due'  value='$due' id='cus1' readonly size='3' onblur='chc()'>
</td> 
</tr>
<tr> <td height='12'> </td> </tr>


<tr> 
<td align='left'> 
<font face='arial' color='716E6E' size='2'> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  Comments : &nbsp;  </font> 
</td>
<td align='left'>
<input type='text' name='comments'   id='cus1'  size='3' onblur='chc()'>
</td> 
</tr>



<tr> <td height='22'> </td> </tr>




<tr> 
<td align='left'> 
</td>
<td align='left'>

<input type='hidden' name='tn'>

<input type='hidden' name='memo_no' value='$me'>




<input type='button' id='pr' value='Print' onmouseover='chc()' onclick='pp()'>
</td> 
</tr>



</table>
</td>
</tr>


<table>
</td>

</form>

</tr>
</table>




</body>

</html>


";


?>