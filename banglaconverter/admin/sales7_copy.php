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




/////////////



$result = mysql_query("SELECT * FROM `product_name2` ");	

//$result = mysql_query("SELECT * FROM `product_name2` where user_id='$product_id' ");	


while ($a_row = mysql_fetch_row($result)) {

	foreach ($a_row as $field) {
		
	}

$w++;
$p_id[$w]=$a_row[0];
$p_n[$w]=$a_row[2];
$p[$w]=$a_row[4];

}








//exit;



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

//$result = mysql_query("SELECT * FROM `product_name2` where  user_id='$p_id[$i]' ORDER BY `user_id` ");


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


$sql="SELECT * FROM `product_name2` WHERE user_id='$p_id[$i]' ";
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
$result = mysql_query("SELECT * FROM `product_name2` where  user_id='$p_id[$i]' ORDER BY `user_id` ");


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

$sql="SELECT * FROM `product_name2` WHERE user_id='$product_id' ";
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


















$sql= "UPDATE  `product_name2` SET `buy_new`='$single' WHERE `user_id`='$product_id'";
mysql_query($sql);
	

$sql= "UPDATE  `product_name2` SET `sale_new`='$price' WHERE `user_id`='$product_id'";
mysql_query($sql);


}






$sql= "UPDATE  `product_name2` SET `less`='$less_new' WHERE `user_id`='$product_id'";
mysql_query($sql);



$sql= "UPDATE  `product_name2` SET `p_des`='$p_des' WHERE `user_id`='$product_id'";
mysql_query($sql);


$box=trim($_POST['box']);


if($box!="")
{
$sql="SELECT * FROM `product_name2` WHERE user_id='$product_id' ";
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

                       
	   

						
						
						
						
                break;


		case "remove":

                      
					   

             
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



                break;


		case "remove":
 

					   
					   

             

             
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












$result = mysql_query("SELECT * FROM product_name2");

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

//<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
?>





  <link rel="stylesheet" href="jquery-ui-themes-1.11.4/themes/smoothness/jquery-ui.css">
  
  
  
  <script src="jquery-1.10.2.js"></script>
  <script src="jquery-ui.js"></script>
  
 
  
  <script>
  
  var availableTags;

  var availableTags2;



  var names;
  var brands;
  var grades;
  var models;
  var colors;
  var units;
  var dids;






  
  var saletags;
  
  var stooo;
  

  var address_o;
  var mobile_o;

  
  
  
  var sale_price1;
  
  var boxxx;
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
    sale_price1 = [


	<?php
	

	
//$result = mysql_query("SELECT * FROM `product_name`  ORDER BY `user_id` ASC  LIMIT 0 , 100000");


$result = mysql_query("SELECT * FROM `product_name2`");	


while ($a_row = mysql_fetch_row($result)) {

	foreach ($a_row as $field) {
		
	}
	$es91++;
print" ${ar}$p_sale_price3[$es91] -  $p_sale_price2[$es91]$ar, ";
	}
?>

    ];
  
  

  
  
  
  
  
  
  
  
  
  
  
  
  
    boxxx = [


	<?php
	

	
//$result = mysql_query("SELECT * FROM `product_name`  ORDER BY `user_id` ASC  LIMIT 0 , 100000");


$result = mysql_query("SELECT * FROM `product_name2`");	


while ($a_row = mysql_fetch_row($result)) {

	foreach ($a_row as $field) {
		
	}
	
print" ${ar}$a_row[33]$ar, ";
	}
?>

    ];
  
  

  
  

  
  
  
  
  
  
  
  



    stooo = [


	<?php
	
$es9=0;
	
//$result = mysql_query("SELECT * FROM `product_name`  ORDER BY `user_id` ASC  LIMIT 0 , 100000");


$result = mysql_query("SELECT * FROM `product_name2`");	


while ($a_row = mysql_fetch_row($result)) {

	foreach ($a_row as $field) {
		
	}
	$es9++;
print" ${ar}$pry[$es9]$ar, ";
	}
?>

    ];
  














    names = [


	<?php
	
$es9=0;
	
//$result = mysql_query("SELECT * FROM `product_name`  ORDER BY `user_id` ASC  LIMIT 0 , 100000");


$result = mysql_query("SELECT * FROM `product_name2`");	


while ($a_row = mysql_fetch_row($result)) {

	foreach ($a_row as $field) {
		
	}
	


$cqn='"';	
$cqn = mb_ereg_replace("$cqn","*", $a_row[2]);


print" ${ar}$cqn$ar, ";
	}
?>

    ];
  
















    brands = [


	<?php
	
$es9=0;
	
//$result = mysql_query("SELECT * FROM `product_name`  ORDER BY `user_id` ASC  LIMIT 0 , 100000");


$result = mysql_query("SELECT * FROM `product_name2`");	


while ($a_row = mysql_fetch_row($result)) {

	foreach ($a_row as $field) {
		
	}
	


$cqn1='"';	
$cqn1 = mb_ereg_replace("$cqn1","*", $a_row[3]);


print" ${ar}$cqn1$ar, ";
	}
?>

    ];
  




  






    grades = [


	<?php
	
$es9=0;
	
//$result = mysql_query("SELECT * FROM `product_name`  ORDER BY `user_id` ASC  LIMIT 0 , 100000");


$result = mysql_query("SELECT * FROM `product_name2`");	


while ($a_row = mysql_fetch_row($result)) {

	foreach ($a_row as $field) {
		
	}
	


$cqn11='"';	
$cqn11 = mb_ereg_replace("$cqn11","*", $a_row[30]);


print" ${ar}$cqn11$ar, ";
	}
?>

    ];
  



  
  
  
  
  





    models = [


	<?php
	
$es9=0;
	
//$result = mysql_query("SELECT * FROM `product_name`  ORDER BY `user_id` ASC  LIMIT 0 , 100000");


$result = mysql_query("SELECT * FROM `product_name2`");	


while ($a_row = mysql_fetch_row($result)) {

	foreach ($a_row as $field) {
		
	}
	


$cqn111='"';	
$cqn111 = mb_ereg_replace("$cqn111","*", $a_row[31]);


print" ${ar}$cqn111$ar, ";
	}
?>

    ];
  



















    colors = [


	<?php
	
$es9=0;
	
//$result = mysql_query("SELECT * FROM `product_name`  ORDER BY `user_id` ASC  LIMIT 0 , 100000");


$result = mysql_query("SELECT * FROM `product_name2`");	


while ($a_row = mysql_fetch_row($result)) {

	foreach ($a_row as $field) {
		
	}
	


$cqn100='"';	
$cqn100 = mb_ereg_replace("$cqn100","*", $a_row[32]);


print" ${ar}$cqn100$ar, ";
	}
?>

    ];
  


















    units = [


	<?php
	
$es9=0;
	
//$result = mysql_query("SELECT * FROM `product_name`  ORDER BY `user_id` ASC  LIMIT 0 , 100000");


$result = mysql_query("SELECT * FROM `product_name2`");	


while ($a_row = mysql_fetch_row($result)) {

	foreach ($a_row as $field) {
		
	}
	


$cqn100='"';	
$cqn100 = mb_ereg_replace("$cqn100","*", $a_row[22]);


print" ${ar}$cqn100$ar, ";
	}
?>

    ];
  

  
  












    dids = [


	<?php
	
$es9=0;
	
//$result = mysql_query("SELECT * FROM `product_name`  ORDER BY `user_id` ASC  LIMIT 0 , 100000");


$result = mysql_query("SELECT * FROM `product_name2`");	


while ($a_row = mysql_fetch_row($result)) {

	foreach ($a_row as $field) {
		
	}
	


$cqn100='"';	
$cqn100 = mb_ereg_replace("$cqn100","*", $a_row[0]);


print" ${ar}$cqn100$ar, ";
	}
?>

    ];
  















	  
    saletages = [


	<?php
	

	
//$result = mysql_query("SELECT * FROM `product_name`  ORDER BY `user_id` ASC  LIMIT 0 , 100000");


$result = mysql_query("SELECT * FROM `product_name2`");	


while ($a_row = mysql_fetch_row($result)) {

	foreach ($a_row as $field) {
		
	}
print" ${ar}$a_row[5]$ar, ";
	}
?>

    ];
  
  
  
  
  



  
  
  $(function() {
	  
	  
	  
 availableTags2 = [

	<?php
	

	

	
$result = mysql_query("SELECT * FROM `customer`  ORDER BY `company_name` ASC LIMIT 0 , 10000");



while ($a_row = mysql_fetch_row($result)) {

	foreach ($a_row as $field) {
		
	}

$cq='"';	
$cq = mb_ereg_replace("$cq","*", $a_row[7]);

$cq = mb_ereg_replace("&","and", $cq);

$cq10='"';
$cq10 = mb_ereg_replace("$cq10","*", $a_row[5]);



print"


${ar}$cq  - $cq10 - $a_row[3]=$a_row[0]$ar, 

 ";


	}
?>

      "Testing"

    ];
    $( "#tags2_sales" ).autocomplete({
      source: availableTags2
    });
  });
  











 $(function() {
	  
	  
	  
 availableTags = [

	<?php
	

$result = mysql_query("SELECT * FROM `product_name2`");	

while ($a_row = mysql_fetch_row($result)) {

	foreach ($a_row as $field) {
		
	}
	
$es++;


$cq='"';	



$cq = mb_ereg_replace("$cq","*", $a_row[2]);
$cq10='"';
$cq10 = mb_ereg_replace("$cq10","*", $a_row[3]);


if($cq10!="")
{
$cq10="-$cq10";
}


$cqz='"';

$a_row[31]= mb_ereg_replace("$cqz","*", $a_row[31]);


$cqz='"';
$a_row[32]= mb_ereg_replace("$cqz","*", $a_row[32]);



if($a_row[31]!="")
{
$a_row[31]="- $a_row[31]";
}


$a_row[30]= mb_ereg_replace("$cqz","*", $a_row[30]);


if($a_row[30]!="")
{
$a_row[30]="- $a_row[30]";
}



if($a_row[32]!="")
{
$a_row[32]="- $a_row[32]";
}


print"
${ar}$p_sub_name[$es] - $cq   $cq10  $a_row[31]  $a_row[30] $a_row[32] -  (P_Value $a_row[4])=$a_row[0]$ar, 
";



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



var tbr=saletages.length;


function rnew()
{


//document.fuu.price.value=tbr;

for(i=0;i<=tbr;i++)
{

if(availableTags[i]==document.fuu.product_id.value)
{
document.fuu.sale_price.value=saletages[i];

document.fuu.sale_price1.value=sale_price1[i];

document.fuu.sale_stock.value=stooo[i];

document.fuu.boxq.value=boxxx[i];


}


}


}






var jm=0;








function cll()
{

fuu.reset();
jm=0;
a1.style.display='none';
a2.style.display='none';
a3.style.display='none';
a4.style.display='none';
a5.style.display='none';	


a6.style.display='none';
a7.style.display='none';
a8.style.display='none';
a9.style.display='none';
a10.style.display='none';	

a11.style.display='none';
a12.style.display='none';
a13.style.display='none';
a14.style.display='none';
a15.style.display='none';	

a16.style.display='none';
a17.style.display='none';
a18.style.display='none';
a19.style.display='none';
a20.style.display='none';	







document.fuu.d1.value=0;
document.fuu.d2.value=0;
document.fuu.d3.value=0;
document.fuu.d4.value=0;
document.fuu.d5.value=0;


document.fuu.d6.value=0;
document.fuu.d7.value=0;
document.fuu.d8.value=0;
document.fuu.d9.value=0;
document.fuu.d10.value=0;


document.fuu.d11.value=0;
document.fuu.d12.value=0;
document.fuu.d13.value=0;
document.fuu.d14.value=0;
document.fuu.d15.value=0;



document.fuu.d16.value=0;
document.fuu.d17.value=0;
document.fuu.d18.value=0;
document.fuu.d19.value=0;
document.fuu.d20.value=0;


}





function on_new()
{

jm++;

if(jm==1)
{

for(i=0;i<=tbr;i++)
{

if(availableTags[i]==document.fuu.product_id.value)
{
document.fuu.p1.value=names[i];
document.fuu.brand1.value=brands[i];
document.fuu.grade1.value=grades[i];
document.fuu.model1.value=models[i];
document.fuu.color1.value=colors[i];
document.fuu.unit1.value=units[i];
document.fuu.d1.value=dids[i];

}

}

document.fuu.pr1.value=document.fuu.price.value;
document.fuu.q1.value=document.fuu.qty.value;
document.fuu.pq1.value=document.fuu.price.value*document.fuu.qty.value;
a1.style.display='';

s();
}









if(jm==2)
{

for(i=0;i<=tbr;i++)
{

if(availableTags[i]==document.fuu.product_id.value)
{
document.fuu.p2.value=names[i];
document.fuu.brand2.value=brands[i];
document.fuu.grade2.value=grades[i];
document.fuu.model2.value=models[i];
document.fuu.color2.value=colors[i];
document.fuu.unit2.value=units[i];
document.fuu.d2.value=dids[i];

}

}

document.fuu.pr2.value=document.fuu.price.value;
document.fuu.q2.value=document.fuu.qty.value;
document.fuu.pq2.value=document.fuu.price.value*document.fuu.qty.value;
a2.style.display='';
s();
}














if(jm==3)
{

for(i=0;i<=tbr;i++)
{

if(availableTags[i]==document.fuu.product_id.value)
{
document.fuu.p3.value=names[i];
document.fuu.brand3.value=brands[i];
document.fuu.grade3.value=grades[i];
document.fuu.model3.value=models[i];
document.fuu.color3.value=colors[i];
document.fuu.unit3.value=units[i];
document.fuu.d3.value=dids[i];

}

}

document.fuu.pr3.value=document.fuu.price.value;
document.fuu.q3.value=document.fuu.qty.value;
document.fuu.pq3.value=document.fuu.price.value*document.fuu.qty.value;
a3.style.display='';
s();
}





if(jm==4)
{

for(i=0;i<=tbr;i++)
{

if(availableTags[i]==document.fuu.product_id.value)
{
document.fuu.p4.value=names[i];
document.fuu.brand4.value=brands[i];
document.fuu.grade4.value=grades[i];
document.fuu.model4.value=models[i];
document.fuu.color4.value=colors[i];
document.fuu.unit4.value=units[i];
document.fuu.d4.value=dids[i];

}

}

document.fuu.pr4.value=document.fuu.price.value;
document.fuu.q4.value=document.fuu.qty.value;
document.fuu.pq4.value=document.fuu.price.value*document.fuu.qty.value;
a4.style.display='';
s();
}






if(jm==5)
{

for(i=0;i<=tbr;i++)
{

if(availableTags[i]==document.fuu.product_id.value)
{
document.fuu.p5.value=names[i];
document.fuu.brand5.value=brands[i];
document.fuu.grade5.value=grades[i];
document.fuu.model5.value=models[i];
document.fuu.color5.value=colors[i];
document.fuu.unit5.value=units[i];
document.fuu.d5.value=dids[i];

}

}

document.fuu.pr5.value=document.fuu.price.value;
document.fuu.q5.value=document.fuu.qty.value;
document.fuu.pq5.value=document.fuu.price.value*document.fuu.qty.value;
a5.style.display='';
s();

}














if(jm==6)
{

for(i=0;i<=tbr;i++)
{

if(availableTags[i]==document.fuu.product_id.value)
{
document.fuu.p6.value=names[i];
document.fuu.brand6.value=brands[i];
document.fuu.grade6.value=grades[i];
document.fuu.model6.value=models[i];
document.fuu.color6.value=colors[i];
document.fuu.unit6.value=units[i];
document.fuu.d6.value=dids[i];

}

}


document.fuu.pr6.value=document.fuu.price.value;
document.fuu.q6.value=document.fuu.qty.value;
document.fuu.pq6.value=document.fuu.price.value*document.fuu.qty.value;
a6.style.display='';
s();

}








if(jm==7)
{

for(i=0;i<=tbr;i++)
{

if(availableTags[i]==document.fuu.product_id.value)
{
document.fuu.p7.value=names[i];
document.fuu.brand7.value=brands[i];
document.fuu.grade7.value=grades[i];
document.fuu.model7.value=models[i];
document.fuu.color7.value=colors[i];
document.fuu.unit7.value=units[i];
document.fuu.d7.value=dids[i];

}

}

document.fuu.pr7.value=document.fuu.price.value;
document.fuu.q7.value=document.fuu.qty.value;
document.fuu.pq7.value=document.fuu.price.value*document.fuu.qty.value;
a7.style.display='';
s();

}











if(jm==8)
{

for(i=0;i<=tbr;i++)
{

if(availableTags[i]==document.fuu.product_id.value)
{
document.fuu.p8.value=names[i];
document.fuu.brand8.value=brands[i];
document.fuu.grade8.value=grades[i];
document.fuu.model8.value=models[i];
document.fuu.color8.value=colors[i];
document.fuu.unit8.value=units[i];
document.fuu.d8.value=dids[i];

}

}


document.fuu.pr8.value=document.fuu.price.value;
document.fuu.q8.value=document.fuu.qty.value;
document.fuu.pq8.value=document.fuu.price.value*document.fuu.qty.value;
a8.style.display='';
s();

}











if(jm==9)
{

for(i=0;i<=tbr;i++)
{

if(availableTags[i]==document.fuu.product_id.value)
{
document.fuu.p9.value=names[i];
document.fuu.brand9.value=brands[i];
document.fuu.grade9.value=grades[i];
document.fuu.model9.value=models[i];
document.fuu.color9.value=colors[i];
document.fuu.unit9.value=units[i];
document.fuu.d9.value=dids[i];

}

}

document.fuu.pr9.value=document.fuu.price.value;
document.fuu.q9.value=document.fuu.qty.value;
document.fuu.pq9.value=document.fuu.price.value*document.fuu.qty.value;
a9.style.display='';
s();

}





if(jm==10)
{

for(i=0;i<=tbr;i++)
{

if(availableTags[i]==document.fuu.product_id.value)
{
document.fuu.p10.value=names[i];
document.fuu.brand10.value=brands[i];
document.fuu.grade10.value=grades[i];
document.fuu.model10.value=models[i];
document.fuu.color10.value=colors[i];
document.fuu.unit10.value=units[i];
document.fuu.d10.value=dids[i];

}

}


document.fuu.pr10.value=document.fuu.price.value;
document.fuu.q10.value=document.fuu.qty.value;
document.fuu.pq10.value=document.fuu.price.value*document.fuu.qty.value;
a10.style.display='';
s();

}













if(jm==11)
{

for(i=0;i<=tbr;i++)
{

if(availableTags[i]==document.fuu.product_id.value)
{
document.fuu.p11.value=names[i];
document.fuu.brand11.value=brands[i];
document.fuu.grade11.value=grades[i];
document.fuu.model11.value=models[i];
document.fuu.color11.value=colors[i];
document.fuu.unit11.value=units[i];
document.fuu.d11.value=dids[i];

}

}

document.fuu.pr11.value=document.fuu.price.value;
document.fuu.q11.value=document.fuu.qty.value;
document.fuu.pq11.value=document.fuu.price.value*document.fuu.qty.value;
a11.style.display='';
s();

}












if(jm==12)
{

for(i=0;i<=tbr;i++)
{

if(availableTags[i]==document.fuu.product_id.value)
{
document.fuu.p12.value=names[i];
document.fuu.brand12.value=brands[i];
document.fuu.grade12.value=grades[i];
document.fuu.model12.value=models[i];
document.fuu.color12.value=colors[i];
document.fuu.unit12.value=units[i];
document.fuu.d12.value=dids[i];

}

}

document.fuu.pr12.value=document.fuu.price.value;
document.fuu.q12.value=document.fuu.qty.value;
document.fuu.pq12.value=document.fuu.price.value*document.fuu.qty.value;
a12.style.display='';
s();

}











if(jm==13)
{

for(i=0;i<=tbr;i++)
{

if(availableTags[i]==document.fuu.product_id.value)
{
document.fuu.p13.value=names[i];
document.fuu.brand13.value=brands[i];
document.fuu.grade13.value=grades[i];
document.fuu.model13.value=models[i];
document.fuu.color13.value=colors[i];
document.fuu.unit13.value=units[i];
document.fuu.d13.value=dids[i];

}

}

document.fuu.pr13.value=document.fuu.price.value;
document.fuu.q13.value=document.fuu.qty.value;
document.fuu.pq13.value=document.fuu.price.value*document.fuu.qty.value;
a13.style.display='';
s();

}
















if(jm==14)
{

for(i=0;i<=tbr;i++)
{

if(availableTags[i]==document.fuu.product_id.value)
{
document.fuu.p14.value=names[i];
document.fuu.brand14.value=brands[i];
document.fuu.grade14.value=grades[i];
document.fuu.model14.value=models[i];
document.fuu.color14.value=colors[i];
document.fuu.unit14.value=units[i];
document.fuu.d14.value=dids[i];

}

}

document.fuu.pr14.value=document.fuu.price.value;
document.fuu.q14.value=document.fuu.qty.value;
document.fuu.pq14.value=document.fuu.price.value*document.fuu.qty.value;
a14.style.display='';

s();


}












if(jm==15)
{

for(i=0;i<=tbr;i++)
{

if(availableTags[i]==document.fuu.product_id.value)
{
document.fuu.p15.value=names[i];
document.fuu.brand15.value=brands[i];
document.fuu.grade15.value=grades[i];
document.fuu.model15.value=models[i];
document.fuu.color15.value=colors[i];
document.fuu.unit15.value=units[i];
document.fuu.d15.value=dids[i];

}

}

document.fuu.pr15.value=document.fuu.price.value;
document.fuu.q15.value=document.fuu.qty.value;
document.fuu.pq15.value=document.fuu.price.value*document.fuu.qty.value;
a15.style.display='';
s();


}

















if(jm==16)
{

for(i=0;i<=tbr;i++)
{

if(availableTags[i]==document.fuu.product_id.value)
{
document.fuu.p16.value=names[i];
document.fuu.brand16.value=brands[i];
document.fuu.grade16.value=grades[i];
document.fuu.model16.value=models[i];
document.fuu.color16.value=colors[i];
document.fuu.unit16.value=units[i];
document.fuu.d16.value=dids[i];

}

}

document.fuu.pr16.value=document.fuu.price.value;
document.fuu.q16.value=document.fuu.qty.value;
document.fuu.pq16.value=document.fuu.price.value*document.fuu.qty.value;
a16.style.display='';
s();


}












if(jm==17)
{

for(i=0;i<=tbr;i++)
{

if(availableTags[i]==document.fuu.product_id.value)
{
document.fuu.p17.value=names[i];
document.fuu.brand17.value=brands[i];
document.fuu.grade17.value=grades[i];
document.fuu.model17.value=models[i];
document.fuu.color17.value=colors[i];
document.fuu.unit17.value=units[i];
document.fuu.d17.value=dids[i];

}

}

document.fuu.pr17.value=document.fuu.price.value;
document.fuu.q17.value=document.fuu.qty.value;
document.fuu.pq17.value=document.fuu.price.value*document.fuu.qty.value;
a17.style.display='';
s();

}














if(jm==18)
{

for(i=0;i<=tbr;i++)
{

if(availableTags[i]==document.fuu.product_id.value)
{
document.fuu.p18.value=names[i];
document.fuu.brand18.value=brands[i];
document.fuu.grade18.value=grades[i];
document.fuu.model18.value=models[i];
document.fuu.color18.value=colors[i];
document.fuu.unit18.value=units[i];
document.fuu.d18.value=dids[i];

}

}

document.fuu.pr18.value=document.fuu.price.value;
document.fuu.q18.value=document.fuu.qty.value;
document.fuu.pq18.value=document.fuu.price.value*document.fuu.qty.value;
a18.style.display='';

s();

}












if(jm==19)
{

for(i=0;i<=tbr;i++)
{

if(availableTags[i]==document.fuu.product_id.value)
{
document.fuu.p19.value=names[i];
document.fuu.brand19.value=brands[i];
document.fuu.grade19.value=grades[i];
document.fuu.model19.value=models[i];
document.fuu.color19.value=colors[i];
document.fuu.unit19.value=units[i];
document.fuu.d19.value=dids[i];

}

}


document.fuu.pr19.value=document.fuu.price.value;
document.fuu.q19.value=document.fuu.qty.value;
document.fuu.pq19.value=document.fuu.price.value*document.fuu.qty.value;
a19.style.display='';

s();

}












if(jm==20)
{

for(i=0;i<=tbr;i++)
{

if(availableTags[i]==document.fuu.product_id.value)
{
document.fuu.p20.value=names[i];
document.fuu.brand20.value=brands[i];
document.fuu.grade20.value=grades[i];
document.fuu.model20.value=models[i];
document.fuu.color20.value=colors[i];
document.fuu.unit20.value=units[i];
document.fuu.d20.value=dids[i];

}

}


document.fuu.pr20.value=document.fuu.price.value;
document.fuu.q20.value=document.fuu.qty.value;
document.fuu.pq20.value=document.fuu.price.value*document.fuu.qty.value;
a20.style.display='';

s();

}














document.fuu.price.value="";
document.fuu.qty.value="";
document.fuu.product_id.value="";
document.fuu.product_id.focus();

}









var d1;
var d2;
var d3;
var d4;
var d5;
var d6;
var d7;
var d8;
var d9;
var d10;
var d11;
var d12;
var d13;
var d14;
var d15;
var d16;
var d17;
var d18;
var d19;
var d20;


function dl1()
{

document.fuu.d1.value=0;
document.fuu.p1.value=0;
document.fuu.pr1.value=0;
document.fuu.q1.value=0;
document.fuu.pq1.value=0;	
a1.style.display='none';
s();

}

function dl2()
{
document.fuu.d2.value=0;
document.fuu.p2.value=0;
document.fuu.pr2.value=0;
document.fuu.q2.value=0;
document.fuu.pq2.value=0;	
a2.style.display='none';
s();

}

function dl3()
{

document.fuu.d3.value=0;
document.fuu.p3.value=0;
document.fuu.pr3.value=0;
document.fuu.q3.value=0;
document.fuu.pq3.value=0;	
a3.style.display='none';
s();

}

function dl4()
{
document.fuu.d4.value=0;
document.fuu.p4.value=0;
document.fuu.pr4.value=0;
document.fuu.q4.value=0;
document.fuu.pq4.value=0;	
a4.style.display='none';
s();

}


function dl5()
{
document.fuu.d5.value=0;
document.fuu.p5.value=0;
document.fuu.pr5.value=0;
document.fuu.q5.value=0;
document.fuu.pq5.value=0;	
a5.style.display='none';
s();

}




function dl6()
{
document.fuu.d6.value=0;
document.fuu.p6.value=0;
document.fuu.pr6.value=0;
document.fuu.q6.value=0;
document.fuu.pq6.value=0;	
a6.style.display='none';
s();

}



function dl7()
{
document.fuu.d7.value=0;
document.fuu.p7.value=0;
document.fuu.pr7.value=0;
document.fuu.q7.value=0;
document.fuu.pq7.value=0;	
a7.style.display='none';
s();

}



function dl8()
{
document.fuu.d8.value=0;
document.fuu.p8.value=0;
document.fuu.pr8.value=0;
document.fuu.q8.value=0;
document.fuu.pq8.value=0;	
a8.style.display='none';
s();

}




function dl9()
{
document.fuu.d9.value=0;
document.fuu.p9.value=0;
document.fuu.pr9.value=0;
document.fuu.q9.value=0;
document.fuu.pq9.value=0;	
a9.style.display='none';
s();

}



function dl10()
{
document.fuu.d10.value=0;
document.fuu.p10.value=0;
document.fuu.pr10.value=0;
document.fuu.q10.value=0;
document.fuu.pq10.value=0;	
a10.style.display='none';
s();

}





function dl11()
{
document.fuu.d11.value=0;
document.fuu.p11.value=0;
document.fuu.pr11.value=0;
document.fuu.q11.value=0;
document.fuu.pq11.value=0;	
a11.style.display='none';
s();

}





function dl12()
{
document.fuu.d12.value=0;
document.fuu.p12.value=0;
document.fuu.pr12.value=0;
document.fuu.q12.value=0;
document.fuu.pq12.value=0;	
a12.style.display='none';
s();

}


function dl13()
{
document.fuu.d13.value=0;
document.fuu.p13.value=0;
document.fuu.pr13.value=0;
document.fuu.q13.value=0;
document.fuu.pq13.value=0;	
a13.style.display='none';
s();

}



function dl14()
{
document.fuu.d14.value=0;
document.fuu.p14.value=0;
document.fuu.pr14.value=0;
document.fuu.q14.value=0;
document.fuu.pq14.value=0;	
a14.style.display='none';
s();

}



function dl15()
{
document.fuu.d15.value=0;
document.fuu.p15.value=0;
document.fuu.pr15.value=0;
document.fuu.q15.value=0;
document.fuu.pq15.value=0;	
a15.style.display='none';
s();

}



function dl16()
{
document.fuu.d16.value=0;
document.fuu.p16.value=0;
document.fuu.pr16.value=0;
document.fuu.q16.value=0;
document.fuu.pq16.value=0;	
a16.style.display='none';
s();

}





function dl17()
{
document.fuu.d17.value=0;
document.fuu.p17.value=0;
document.fuu.pr17.value=0;
document.fuu.q17.value=0;
document.fuu.pq17.value=0;	
a17.style.display='none';
s();

}








function dl18()
{
document.fuu.d18.value=0;
document.fuu.p18.value=0;
document.fuu.pr18.value=0;
document.fuu.q18.value=0;
document.fuu.pq18.value=0;	
a18.style.display='none';
s();

}




function dl19()
{
document.fuu.d19.value=0;
document.fuu.p19.value=0;
document.fuu.pr19.value=0;
document.fuu.q19.value=0;
document.fuu.pq19.value=0;	
a19.style.display='none';
s();

}




function dl20()
{
document.fuu.d20.value=0;
document.fuu.p20.value=0;
document.fuu.pr20.value=0;
document.fuu.q20.value=0;
document.fuu.pq20.value=0;	
a20.style.display='none';
s();

}
































var t;

function s()
{

if(document.fuu.pq1.value=='')
{
document.fuu.pq1.value=0;
}



if(document.fuu.pq2.value=='')
{
document.fuu.pq2.value=0;
}	

if(document.fuu.pq3.value=='')
{
document.fuu.pq3.value=0;
}	

if(document.fuu.pq4.value=='')
{
document.fuu.pq4.value=0;
}	

if(document.fuu.pq5.value=='')
{
document.fuu.pq5.value=0;
}


if(document.fuu.pq6.value=='')
{
document.fuu.pq6.value=0;
}	

if(document.fuu.pq7.value=='')
{
document.fuu.pq7.value=0;
}	


if(document.fuu.pq8.value=='')
{
document.fuu.pq8.value=0;
}	

if(document.fuu.pq9.value=='')
{
document.fuu.pq9.value=0;
}	


if(document.fuu.pq10.value=='')
{
document.fuu.pq10.value=0;
}	

if(document.fuu.pq11.value=='')
{
document.fuu.pq11.value=0;
}

if(document.fuu.pq12.value=='')
{
document.fuu.pq12.value=0;
}	

if(document.fuu.pq13.value=='')
{
document.fuu.pq13.value=0;
}	


if(document.fuu.pq14.value=='')
{
document.fuu.pq14.value=0;
}

if(document.fuu.pq15.value=='')
{
document.fuu.pq15.value=0;
}	
	
if(document.fuu.pq16.value=='')
{
document.fuu.pq16.value=0;
}	


if(document.fuu.pq17.value=='')
{
document.fuu.pq17.value=0;
}	

if(document.fuu.pq18.value=='')
{
document.fuu.pq18.value=0;
}	


if(document.fuu.pq19.value=='')
{
document.fuu.pq19.value=0;
}	


if(document.fuu.pq20.value=='')
{
document.fuu.pq20.value=0;
}	






//document.fuu.subtotal.value=1000;
	


//document.fuu.subtotal.value=parseFloat(document.fuu.pq1.value);



	

	
document.fuu.subtotal.value=parseFloat(document.fuu.pq1.value)+parseFloat(document.fuu.pq2.value)+parseFloat(document.fuu.pq3.value)+parseFloat(document.fuu.pq4.value)+parseFloat(document.fuu.pq5.value)+parseFloat(document.fuu.pq6.value)+parseFloat(document.fuu.pq7.value)+parseFloat(document.fuu.pq8.value)+parseFloat(document.fuu.pq9.value)+parseFloat(document.fuu.pq10.value)+parseFloat(document.fuu.pq11.value)+parseFloat(document.fuu.pq12.value)+parseFloat(document.fuu.pq13.value)+parseFloat(document.fuu.pq14.value)+parseFloat(document.fuu.pq15.value)+parseFloat(document.fuu.pq16.value)+parseFloat(document.fuu.pq17.value)+parseFloat(document.fuu.pq18.value)+parseFloat(document.fuu.pq19.value)+parseFloat(document.fuu.pq20.value);



chc();
}














function chc()
{

var cx1;
var ti;
var tii;

var nt;


ti=document.fuu.discount_lessp.value;



nt=document.fuu.less.value;



if(document.fuu.discount_lessp.value>0)
{
tii=document.fuu.subtotal.value*ti;
document.fuu.discount_less.value=tii/100;
}





document.fuu.stotal1.value=document.fuu.subtotal.value-document.fuu.discount_less.value;




if(document.fuu.less.value>0)
{
document.fuu.stotal1.value=parseFloat(document.fuu.stotal1.value)+parseFloat(document.fuu.less.value);
}




cx1=document.fuu.stotal1.value*document.fuu.vat.value;
cx1=cx1/100;

document.fuu.vat_tk.value=cx1;

if(cx1>0)
{
document.fuu.stotal.value=parseFloat(document.fuu.stotal1.value)+parseFloat(cx1);
}
else
{
document.fuu.stotal.value=document.fuu.stotal1.value;
}


document.fuu.payment.value=document.fuu.stotal.value;

document.fuu.due.value=document.fuu.stotal.value-document.fuu.payment.value;

	
}
















function cpp()
{

document.fuu.payment.value=document.fuu.payment.value;
document.fuu.due.value=document.fuu.stotal.value-document.fuu.payment.value;
st();
if(document.fuu.due.value>0)
{
pl1.style.display='';
pl2.style.display='';
pl3.style.display='';
pl4.style.display='';
pl5.style.display='';
pl6.style.display='';
pl7.style.display='';
pl8.style.display='';
pl9.style.display='';
}



if(document.fuu.due.value<=0)
{
pl1.style.display='none';
pl2.style.display='none';
pl3.style.display='none';
pl4.style.display='none';
pl5.style.display='none';
pl6.style.display='none';
pl7.style.display='none';
pl8.style.display='none';
pl9.style.display='none';

document.fuu.per.value='';
document.fuu.install.value='';
}



}





function st()
{

if(document.fuu.install.value>0)
{
document.fuu.per.value=document.fuu.due.value/document.fuu.install.value;
}
}







function pp()
{
	
var c=1;
document.fuu.submit();	
cll();

}




function rneww()
{
document.fuu.product_id.value='';


 //$( "#se" ).load("new.php");	

 //$( "#se" ).load();	


}



</script>







<script>
$(document).ready(function(){
	
//alert('I am faka');





});



/*
$(document).ready(function(){
    $("#hide").click(function(){
	
        $( "#se" ).load( "new.php" );
		
    });

});
*/


function bl()
{
var hhh=$('#tags').val();

if($.trim(hhh)=='')
{
alert('I am faka');
}
else
{

//alert(hhh);

/*
$.ajax(
url:"new.php",
method:"POST",
data:{product_id:hhh},
dataType:"text",
success:function(data)
{
$('#tags').val()='';
}
)};
*/

//$('#tags').val("ttt");

$( "#se" ).load( "new.php" );


}

}
</script>


<?php

include_once('style.php');

print"

<style>

#px1
{
border:0px;
background-color:white;
}
#bx1
{
border:0px;
background-color:white;
}

#gx1
{
border:0px;
background-color:white;
}

#mx1
{
border:0px;
background-color:white;
}

#cx1
{
border:0px;
background-color:white;
}


#qx1
{
border:0px;
background-color:white;
}

#ux1
{
border:0px;
background-color:white;
}

#prx1
{
border:0px;
background-color:white;
}

#pqx1
{
border:0px;
background-color:white;
}










#px2
{
border:0px;
background-color:white;
}
#bx2
{
border:0px;
background-color:white;
}

#gx2
{
border:0px;
background-color:white;
}

#mx2
{
border:0px;
background-color:white;
}

#cx2
{
border:0px;
background-color:white;
}


#qx2
{
border:0px;
background-color:white;
}

#ux2
{
border:0px;
background-color:white;
}

#prx2
{
border:0px;
background-color:white;
}

#pqx2
{
border:0px;
background-color:white;
}









#px3
{
border:0px;
background-color:white;
}
#bx3
{
border:0px;
background-color:white;
}

#gx3
{
border:0px;
background-color:white;
}

#mx3
{
border:0px;
background-color:white;
}

#cx3
{
border:0px;
background-color:white;
}


#qx3
{
border:0px;
background-color:white;
}

#ux3
{
border:0px;
background-color:white;
}

#prx3
{
border:0px;
background-color:white;
}

#pqx3
{
border:0px;
background-color:white;
}





#px4
{
border:0px;
background-color:white;
}
#bx4
{
border:0px;
background-color:white;
}

#gx4
{
border:0px;
background-color:white;
}

#mx4
{
border:0px;
background-color:white;
}

#cx4
{
border:0px;
background-color:white;
}


#qx4
{
border:0px;
background-color:white;
}

#ux4
{
border:0px;
background-color:white;
}

#prx4
{
border:0px;
background-color:white;
}

#pqx4
{
border:0px;
background-color:white;
}





#px5
{
border:0px;
background-color:white;
}
#bx5
{
border:0px;
background-color:white;
}

#gx5
{
border:0px;
background-color:white;
}

#mx5
{
border:0px;
background-color:white;
}

#cx5
{
border:0px;
background-color:white;
}


#qx5
{
border:0px;
background-color:white;
}

#ux5
{
border:0px;
background-color:white;
}

#prx5
{
border:0px;
background-color:white;
}

#pqx5
{
border:0px;
background-color:white;
}









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



print"
: 
<label for='tags2'> </label>
<input type='text' id='tags2_sales' name='supplier' value='$id_supplier' size='10' onblur='ro()'>
";

print"

&nbsp;&nbsp;
<font size='2' face='arial' color='black'> <b> P_Rate : </b> </font> <input type='text' name='sale_price1'  readonly size='1'> 
&nbsp;&nbsp;&nbsp;&nbsp;
<font size='2' face='arial' color='black'> <b> Box : </b> </font> <input type='text' name='boxq'  readonly size='1'> 

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<font size='2' face='arial' color='black'> <b> Rate : </b> </font> <input type='text' name='sale_price'  readonly size='1'> 




";


?>



<?php


print"

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

<label for='tags'> </label>
<input type='text' id='tags' name='product_id' size='30' onblur='rnew()' onclick='rneww()'>


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
<tr bgcolor='white' id='a1'> 
<td width='80' height='20' align='center'> <input type='button' value='Delete' onclick='dl1()'> 
<input type='hidden' name='d1'>
</td>
<td width='' height='20' align='center'> <input type='text' id='px1' readonly  name='p1' size='4'> </td>
";
if($cwp1==1)
{
print"
<td width='' align='center'>  <input type='text'  id='bx1' name='brand1'  readonly  size='5'> </td>
";
}
else
{
print"
<input type='hidden' id='bx1' name='brand1'>
";
}

if($cwp2==1)
{
print"
<td width='' align='center'>  <input type='text'  id='gx1' name='grade1'  readonly size='5'> </td>
";
}
else
{
print"
<input type='hidden' id='gx1' name='grade1'>
";
}

if($cwp3==1)
{
print"
<td width='' align='center'>  <input type='text'  id='mx1' name='model1'  readonly size='5'> </td>
";
}
else
{
print"
<input type='hidden' id='mx1' name='model1'>
";

}


if($cwp4==1)
{
print"
<td width='' align='center'>  <input type='text'  id='cx1' name='color1'  readonly size='5'> </td>
";
}
else
{
print"
<input type='hidden' id='cx1' name='color1'>
";
}


print"
<td width='' align='center'>  <input type='text'  id='qx1' name='q1'      readonly size='5'> </td>
<td width='' align='center'> <input type='text'   id='ux1' name='unit1'   readonly size='5'> </td>
<td width='' align='center'>  <input type='text'  id='prx1' name='pr1'    readonly size='5'></td>
<td width='' align='center'>  <input type='text'  id='pqx1' name='pq1'     readonly size='5'> </td>
</tr>
";












print"
<tr bgcolor='white' id='a2'> 
<td width='80' height='20' align='center'> <input type='button' value='Delete' onclick='dl2()'> 
<input type='hidden' name='d2'>
</td>
<td width='' height='20' align='center'> <input type='text' id='px2' readonly  name='p2' size='4'> </td>
";
if($cwp1==1)
{
print"
<td width='' align='center'>  <input type='text'  id='bx2' name='brand2'  readonly  size='5'> </td>
";
}
else
{
print"
<input type='hidden' id='bx2' name='brand2'>
";
}

if($cwp2==1)
{
print"
<td width='' align='center'>  <input type='text'  id='gx2' name='grade2'  readonly size='5'> </td>
";
}
else
{
print"
<input type='hidden' id='gx2' name='grade2'>
";
}

if($cwp3==1)
{
print"
<td width='' align='center'>  <input type='text'  id='mx2' name='model2'  readonly size='5'> </td>
";
}
else
{
print"
<input type='hidden' id='mx2' name='model2'>
";

}


if($cwp4==1)
{
print"
<td width='' align='center'>  <input type='text'  id='cx2' name='color2'  readonly size='5'> </td>
";
}
else
{
print"
<input type='hidden' id='cx2' name='color2'>
";
}


print"
<td width='' align='center'>  <input type='text'  id='qx2' name='q2'      readonly size='5'> </td>
<td width='' align='center'> <input type='text'   id='ux2' name='unit2'   readonly size='5'> </td>
<td width='' align='center'>  <input type='text'  id='prx2' name='pr2'    readonly size='5'></td>
<td width='' align='center'>  <input type='text'  id='pqx2' name='pq2'     readonly size='5'> </td>
</tr>
";


print"
<tr bgcolor='white' id='a3'> 
<td width='80' height='20' align='center'> <input type='button' value='Delete' onclick='dl3()'> 
<input type='hidden' name='d3'>
</td>
<td width='' height='20' align='center'> <input type='text' id='px3' readonly  name='p3' size='4'> </td>
";

if($cwp1==1)
{
print"
<td width='' align='center'>  <input type='text'  id='bx3' name='brand3'  readonly  size='5'> </td>
";
}
else
{
print"
<input type='hidden' id='bx3' name='brand3'>
";
}

if($cwp2==1)
{
print"
<td width='' align='center'>  <input type='text'  id='gx3' name='grade3'  readonly size='5'> </td>
";
}
else
{
print"
<input type='hidden' id='gx3' name='grade3'>
";
}

if($cwp3==1)
{
print"
<td width='' align='center'>  <input type='text'  id='mx3' name='model3'  readonly size='5'> </td>
";
}
else
{
print"
<input type='hidden' id='mx3' name='model3'>
";

}


if($cwp4==1)
{
print"
<td width='' align='center'>  <input type='text'  id='cx3' name='color3'  readonly size='5'> </td>
";
}
else
{
print"
<input type='hidden' id='cx3' name='color3'>
";
}


print"
<td width='' align='center'>  <input type='text'  id='qx3' name='q3'      readonly size='5'> </td>
<td width='' align='center'> <input type='text'   id='ux3' name='unit3'   readonly size='5'> </td>
<td width='' align='center'>  <input type='text'  id='prx3' name='pr3'    readonly size='5'></td>
<td width='' align='center'>  <input type='text'  id='pqx3' name='pq3'     readonly size='5'> </td>
</tr>
";



print"
<tr bgcolor='white' id='a4'> 
<td width='80' height='20' align='center'> <input type='button' value='Delete' onclick='dl4()'> 
<input type='hidden' name='d4'>
</td>
<td width='' height='20' align='center'> <input type='text' id='px4' readonly  name='p4' size='4'> </td>
";







if($cwp1==1)
{
print"
<td width='' align='center'>  <input type='text'  id='bx4' name='brand4'  readonly  size='5'> </td>
";
}
else
{
print"
<input type='hidden' id='bx4' name='brand4'>
";
}

if($cwp2==1)
{
print"
<td width='' align='center'>  <input type='text'  id='gx4' name='grade4'  readonly size='5'> </td>
";
}
else
{
print"
<input type='hidden' id='gx4' name='grade4'>
";
}

if($cwp3==1)
{
print"
<td width='' align='center'>  <input type='text'  id='mx4' name='model4'  readonly size='5'> </td>
";
}
else
{
print"
<input type='hidden' id='mx4' name='model4'>
";

}


if($cwp4==1)
{
print"
<td width='' align='center'>  <input type='text'  id='cx4' name='color4'  readonly size='5'> </td>
";
}
else
{
print"
<input type='hidden' id='cx4' name='color4'>
";
}









print"
<td width='' align='center'>  <input type='text'  id='qx4' name='q4'      readonly size='5'> </td>
<td width='' align='center'> <input type='text'   id='ux4' name='unit4'   readonly size='5'> </td>
<td width='' align='center'>  <input type='text'  id='prx4' name='pr4'    readonly size='5'></td>
<td width='' align='center'>  <input type='text'  id='pqx4' name='pq4'     readonly size='5'> </td>
</tr>
";


print"
<tr bgcolor='white' id='a5'> 
<td width='80' height='20' align='center'> <input type='button' value='Delete' onclick='dl5()'> 
<input type='hidden' name='d5'>
</td>
<td width='' height='20' align='center'> <input type='text' id='px5' readonly  name='p5' size='4'> </td>
";


if($cwp1==1)
{
print"
<td width='' align='center'>  <input type='text'  id='bx5' name='brand5'  readonly  size='5'> </td>
";
}
else
{
print"
<input type='hidden' id='bx5' name='brand5'>
";
}

if($cwp2==1)
{
print"
<td width='' align='center'>  <input type='text'  id='gx5' name='grade5'  readonly size='5'> </td>
";
}
else
{
print"
<input type='hidden' id='gx5' name='grade5'>
";
}

if($cwp3==1)
{
print"
<td width='' align='center'>  <input type='text'  id='mx5' name='model5'  readonly size='5'> </td>
";
}
else
{
print"
<input type='hidden' id='mx5' name='model5'>
";

}


if($cwp4==1)
{
print"
<td width='' align='center'>  <input type='text'  id='cx5' name='color5'  readonly size='5'> </td>
";
}
else
{
print"
<input type='hidden' id='cx5' name='color5'>
";
}









print"
<td width='' align='center'>  <input type='text'  id='qx5' name='q5'      readonly size='5'> </td>
<td width='' align='center'> <input type='text'   id='ux5' name='unit5'   readonly size='5'> </td>
<td width='' align='center'>  <input type='text'  id='prx5' name='pr5'    readonly size='5'></td>
<td width='' align='center'>  <input type='text'  id='pqx5' name='pq5'     readonly size='5'> </td>
</tr>
";





print"
<tr bgcolor='white' id='a6'> 
<td width='80' height='20' align='center'> <input type='button' value='Delete' onclick='dl6()'> 
<input type='hidden' name='d6'>
</td>
<td width='' height='20' align='center'> <input type='text' id='px6' readonly  name='p6' size='4'> </td>
";



if($cwp1==1)
{
print"
<td width='' align='center'>  <input type='text'  id='bx6' name='brand6'  readonly  size='5'> </td>
";
}
else
{
print"
<input type='hidden' id='bx6' name='brand6'>
";
}

if($cwp2==1)
{
print"
<td width='' align='center'>  <input type='text'  id='gx6' name='grade6'  readonly size='5'> </td>
";
}
else
{
print"
<input type='hidden' id='gx6' name='grade6'>
";
}

if($cwp3==1)
{
print"
<td width='' align='center'>  <input type='text'  id='mx6' name='model6'  readonly size='5'> </td>
";
}
else
{
print"
<input type='hidden' id='mx6' name='model6'>
";

}


if($cwp4==1)
{
print"
<td width='' align='center'>  <input type='text'  id='cx6' name='color6'  readonly size='5'> </td>
";
}
else
{
print"
<input type='hidden' id='cx6' name='color6'>
";
}






print"
<td width='' align='center'>  <input type='text'  id='qx6' name='q6'      readonly size='5'> </td>
<td width='' align='center'> <input type='text'   id='ux6' name='unit6'   readonly size='5'> </td>
<td width='' align='center'>  <input type='text'  id='prx6' name='pr6'    readonly size='5'></td>
<td width='' align='center'>  <input type='text'  id='pqx6' name='pq6'     readonly size='5'> </td>
</tr>
";


print"
<tr bgcolor='white' id='a7'> 
<td width='80' height='20' align='center'> <input type='button' value='Delete' onclick='dl7()'> 
<input type='hidden' name='d7'>
</td>
<td width='' height='20' align='center'> <input type='text' id='px7' readonly  name='p7' size='4'> </td>
";



if($cwp1==1)
{
print"
<td width='' align='center'>  <input type='text'  id='bx7' name='brand7'  readonly  size='5'> </td>
";
}
else
{
print"
<input type='hidden' id='bx7' name='brand7'>
";
}

if($cwp2==1)
{
print"
<td width='' align='center'>  <input type='text'  id='gx7' name='grade7'  readonly size='5'> </td>
";
}
else
{
print"
<input type='hidden' id='gx7' name='grade7'>
";
}

if($cwp3==1)
{
print"
<td width='' align='center'>  <input type='text'  id='mx7' name='model7'  readonly size='5'> </td>
";
}
else
{
print"
<input type='hidden' id='mx7' name='model7'>
";

}


if($cwp4==1)
{
print"
<td width='' align='center'>  <input type='text'  id='cx7' name='color7'  readonly size='5'> </td>
";
}
else
{
print"
<input type='hidden' id='cx7' name='color7'>
";
}


print"
<td width='' align='center'>  <input type='text'  id='qx7' name='q7'      readonly size='5'> </td>
<td width='' align='center'> <input type='text'   id='ux7' name='unit7'   readonly size='5'> </td>
<td width='' align='center'>  <input type='text'  id='prx7' name='pr7'    readonly size='5'></td>
<td width='' align='center'>  <input type='text'  id='pqx7' name='pq7'     readonly size='5'> </td>
</tr>
";






print"
<tr bgcolor='white' id='a8'> 
<td width='80' height='20' align='center'> <input type='button' value='Delete' onclick='dl8()'> 
<input type='hidden' name='d8'>
</td>
<td width='' height='20' align='center'> <input type='text' id='px8' readonly  name='p8' size='4'> </td>
";




if($cwp1==1)
{
print"
<td width='' align='center'>  <input type='text'  id='bx8' name='brand8'  readonly  size='5'> </td>
";
}
else
{
print"
<input type='hidden' id='bx8' name='brand8'>
";
}

if($cwp2==1)
{
print"
<td width='' align='center'>  <input type='text'  id='gx8' name='grade8'  readonly size='5'> </td>
";
}
else
{
print"
<input type='hidden' id='gx8' name='grade8'>
";
}

if($cwp3==1)
{
print"
<td width='' align='center'>  <input type='text'  id='mx8' name='model8'  readonly size='5'> </td>
";
}
else
{
print"
<input type='hidden' id='mx8' name='model8'>
";

}


if($cwp4==1)
{
print"
<td width='' align='center'>  <input type='text'  id='cx8' name='color8'  readonly size='5'> </td>
";
}
else
{
print"
<input type='hidden' id='cx8' name='color8'>
";
}



print"
<td width='' align='center'>  <input type='text'  id='qx8' name='q8'      readonly size='5'> </td>
<td width='' align='center'> <input type='text'   id='ux8' name='unit8'   readonly size='5'> </td>
<td width='' align='center'>  <input type='text'  id='prx8' name='pr8'    readonly size='5'></td>
<td width='' align='center'>  <input type='text'  id='pqx8' name='pq8'     readonly size='5'> </td>
</tr>
";


print"
<tr bgcolor='white' id='a9'> 
<td width='80' height='20' align='center'> <input type='button' value='Delete' onclick='dl9()'> 
<input type='hidden' name='d9'>
</td>
<td width='' height='20' align='center'> <input type='text' id='px9' readonly  name='p9' size='4'> </td>
";




if($cwp1==1)
{
print"
<td width='' align='center'>  <input type='text'  id='bx9' name='brand9'  readonly  size='5'> </td>
";
}
else
{
print"
<input type='hidden' id='bx9' name='brand9'>
";
}

if($cwp2==1)
{
print"
<td width='' align='center'>  <input type='text'  id='gx9' name='grade9'  readonly size='5'> </td>
";
}
else
{
print"
<input type='hidden' id='gx9' name='grade9'>
";
}

if($cwp3==1)
{
print"
<td width='' align='center'>  <input type='text'  id='mx9' name='model9'  readonly size='5'> </td>
";
}
else
{
print"
<input type='hidden' id='mx9' name='model9'>
";

}


if($cwp4==1)
{
print"
<td width='' align='center'>  <input type='text'  id='cx9' name='color9'  readonly size='5'> </td>
";
}
else
{
print"
<input type='hidden' id='cx9' name='color9'>
";
}



print"
<td width='' align='center'>  <input type='text'  id='qx9' name='q9'      readonly size='5'> </td>
<td width='' align='center'> <input type='text'   id='ux9' name='unit9'   readonly size='5'> </td>
<td width='' align='center'>  <input type='text'  id='prx9' name='pr9'    readonly size='5'></td>
<td width='' align='center'>  <input type='text'  id='pqx9' name='pq9'     readonly size='5'> </td>
</tr>
";



print"
<tr bgcolor='white' id='a10'> 
<td width='80' height='20' align='center'> <input type='button' value='Delete' onclick='dl0()'> 
<input type='hidden' name='d10'>
</td>
<td width='' height='20' align='center'> <input type='text' id='px10' readonly  name='p10' size='4'> </td>
";



if($cwp1==1)
{
print"
<td width='' align='center'>  <input type='text'  id='bx10' name='brand10'  readonly  size='5'> </td>
";
}
else
{
print"
<input type='hidden' id='bx10' name='brand10'>
";
}

if($cwp2==1)
{
print"
<td width='' align='center'>  <input type='text'  id='gx10' name='grade10'  readonly size='5'> </td>
";
}
else
{
print"
<input type='hidden' id='gx10' name='grade10'>
";
}

if($cwp3==1)
{
print"
<td width='' align='center'>  <input type='text'  id='mx10' name='model10'  readonly size='5'> </td>
";
}
else
{
print"
<input type='hidden' id='mx10' name='model10'>
";

}


if($cwp4==1)
{
print"
<td width='' align='center'>  <input type='text'  id='cx10' name='color10'  readonly size='5'> </td>
";
}
else
{
print"
<input type='hidden' id='cx10' name='color10'>
";
}


print"
<td width='' align='center'>  <input type='text'  id='qx10' name='q10'      readonly size='5'> </td>
<td width='' align='center'> <input type='text'   id='ux10' name='unit10'   readonly size='5'> </td>
<td width='' align='center'>  <input type='text'  id='prx10' name='pr10'    readonly size='5'></td>
<td width='' align='center'>  <input type='text'  id='pqx10' name='pq10'     readonly size='5'> </td>
</tr>
";







print"
<tr bgcolor='white' id='a11'> 
<td width='80' height='20' align='center'> <input type='button' value='Delete' onclick='dl11()'> 
<input type='hidden' name='d11'>
</td>
<td width='' height='20' align='center'> <input type='text' id='px11' readonly  name='p11' size='4'> </td>
";




if($cwp1==1)
{
print"
<td width='' align='center'>  <input type='text'  id='bx11' name='brand11'  readonly  size='5'> </td>
";
}
else
{
print"
<input type='hidden' id='bx11' name='brand11'>
";
}

if($cwp2==1)
{
print"
<td width='' align='center'>  <input type='text'  id='gx11' name='grade11'  readonly size='5'> </td>
";
}
else
{
print"
<input type='hidden' id='gx11' name='grade11'>
";
}

if($cwp3==1)
{
print"
<td width='' align='center'>  <input type='text'  id='mx11' name='model11'  readonly size='5'> </td>
";
}
else
{
print"
<input type='hidden' id='mx11' name='model11'>
";

}


if($cwp4==1)
{
print"
<td width='' align='center'>  <input type='text'  id='cx11' name='color11'  readonly size='5'> </td>
";
}
else
{
print"
<input type='hidden' id='cx11' name='color11'>
";
}



print"
<td width='' align='center'>  <input type='text'  id='qx11' name='q11'      readonly size='5'> </td>
<td width='' align='center'> <input type='text'   id='ux11' name='unit11'   readonly size='5'> </td>
<td width='' align='center'>  <input type='text'  id='prx11' name='pr11'    readonly size='5'></td>
<td width='' align='center'>  <input type='text'  id='pqx11' name='pq11'     readonly size='5'> </td>
</tr>
";




print"
<tr bgcolor='white' id='a12'> 
<td width='80' height='20' align='center'> <input type='button' value='Delete' onclick='dl12()'> 
<input type='hidden' name='d12'>
</td>
<td width='' height='20' align='center'> <input type='text' id='px12' readonly  name='p12' size='4'> </td>
";




if($cwp1==1)
{
print"
<td width='' align='center'>  <input type='text'  id='bx12' name='brand12'  readonly  size='5'> </td>
";
}
else
{
print"
<input type='hidden' id='bx12' name='brand12'>
";
}

if($cwp2==1)
{
print"
<td width='' align='center'>  <input type='text'  id='gx12' name='grade12'  readonly size='5'> </td>
";
}
else
{
print"
<input type='hidden' id='gx12' name='grade12'>
";
}

if($cwp3==1)
{
print"
<td width='' align='center'>  <input type='text'  id='mx12' name='model12'  readonly size='5'> </td>
";
}
else
{
print"
<input type='hidden' id='mx12' name='model12'>
";

}


if($cwp4==1)
{
print"
<td width='' align='center'>  <input type='text'  id='cx12' name='color12'  readonly size='5'> </td>
";
}
else
{
print"
<input type='hidden' id='cx12' name='color12'>
";
}



print"
<td width='' align='center'>  <input type='text'  id='qx12' name='q12'      readonly size='5'> </td>
<td width='' align='center'> <input type='text'   id='ux12' name='unit12'   readonly size='5'> </td>
<td width='' align='center'>  <input type='text'  id='prx12' name='pr12'    readonly size='5'></td>
<td width='' align='center'>  <input type='text'  id='pqx12' name='pq12'     readonly size='5'> </td>
</tr>
";




print"
<tr bgcolor='white' id='a13'> 
<td width='80' height='20' align='center'> <input type='button' value='Delete' onclick='dl13()'> 
<input type='hidden' name='d13'>
</td>
<td width='' height='20' align='center'> <input type='text' id='px13' readonly  name='p13' size='4'> </td>
";




if($cwp1==1)
{
print"
<td width='' align='center'>  <input type='text'  id='bx13' name='brand13'  readonly  size='5'> </td>
";
}
else
{
print"
<input type='hidden' id='bx13' name='brand13'>
";
}

if($cwp2==1)
{
print"
<td width='' align='center'>  <input type='text'  id='gx13' name='grade13'  readonly size='5'> </td>
";
}
else
{
print"
<input type='hidden' id='gx13' name='grade13'>
";
}

if($cwp3==1)
{
print"
<td width='' align='center'>  <input type='text'  id='mx13' name='model13'  readonly size='5'> </td>
";
}
else
{
print"
<input type='hidden' id='mx13' name='model13'>
";

}


if($cwp4==1)
{
print"
<td width='' align='center'>  <input type='text'  id='cx13' name='color13'  readonly size='5'> </td>
";
}
else
{
print"
<input type='hidden' id='cx13' name='color13'>
";
}



print"
<td width='' align='center'>  <input type='text'  id='qx13' name='q13'      readonly size='5'> </td>
<td width='' align='center'> <input type='text'   id='ux13' name='unit13'   readonly size='5'> </td>
<td width='' align='center'>  <input type='text'  id='prx13' name='pr13'    readonly size='5'></td>
<td width='' align='center'>  <input type='text'  id='pqx13' name='pq13'     readonly size='5'> </td>
</tr>
";






print"
<tr bgcolor='white' id='a14'> 
<td width='80' height='20' align='center'> <input type='button' value='Delete' onclick='dl14()'> 
<input type='hidden' name='d14'>
</td>
<td width='' height='20' align='center'> <input type='text' id='px14' readonly  name='p14' size='4'> </td>
";



if($cwp1==1)
{
print"
<td width='' align='center'>  <input type='text'  id='bx14' name='brand14'  readonly  size='5'> </td>
";
}
else
{
print"
<input type='hidden' id='bx14' name='brand14'>
";
}

if($cwp2==1)
{
print"
<td width='' align='center'>  <input type='text'  id='gx14' name='grade14'  readonly size='5'> </td>
";
}
else
{
print"
<input type='hidden' id='gx14' name='grade14'>
";
}

if($cwp3==1)
{
print"
<td width='' align='center'>  <input type='text'  id='mx14' name='model14'  readonly size='5'> </td>
";
}
else
{
print"
<input type='hidden' id='mx14' name='model14'>
";

}


if($cwp4==1)
{
print"
<td width='' align='center'>  <input type='text'  id='cx14' name='color14'  readonly size='5'> </td>
";
}
else
{
print"
<input type='hidden' id='cx14' name='color14'>
";
}


print"
<td width='' align='center'>  <input type='text'  id='qx14' name='q14'      readonly size='5'> </td>
<td width='' align='center'> <input type='text'   id='ux14' name='unit14'   readonly size='5'> </td>
<td width='' align='center'>  <input type='text'  id='prx14' name='pr14'    readonly size='5'></td>
<td width='' align='center'>  <input type='text'  id='pqx14' name='pq14'     readonly size='5'> </td>
</tr>
";




print"
<tr bgcolor='white' id='a15'> 
<td width='80' height='20' align='center'> <input type='button' value='Delete' onclick='dl15()'> 
<input type='hidden' name='d15'>
</td>
<td width='' height='20' align='center'> <input type='text' id='px15' readonly  name='p15' size='4'> </td>
";



if($cwp1==1)
{
print"
<td width='' align='center'>  <input type='text'  id='bx15' name='brand15'  readonly  size='5'> </td>
";
}
else
{
print"
<input type='hidden' id='bx15' name='brand15'>
";
}

if($cwp2==1)
{
print"
<td width='' align='center'>  <input type='text'  id='gx15' name='grade15'  readonly size='5'> </td>
";
}
else
{
print"
<input type='hidden' id='gx15' name='grade15'>
";
}

if($cwp3==1)
{
print"
<td width='' align='center'>  <input type='text'  id='mx15' name='model15'  readonly size='5'> </td>
";
}
else
{
print"
<input type='hidden' id='mx15' name='model15'>
";

}


if($cwp4==1)
{
print"
<td width='' align='center'>  <input type='text'  id='cx15' name='color15'  readonly size='5'> </td>
";
}
else
{
print"
<input type='hidden' id='cx15' name='color15'>
";
}


print"
<td width='' align='center'>  <input type='text'  id='qx15' name='q15'      readonly size='5'> </td>
<td width='' align='center'> <input type='text'   id='ux15' name='unit15'   readonly size='5'> </td>
<td width='' align='center'>  <input type='text'  id='prx15' name='pr15'    readonly size='5'></td>
<td width='' align='center'>  <input type='text'  id='pqx15' name='pq15'     readonly size='5'> </td>
</tr>
";


print"
<tr bgcolor='white' id='a16'> 
<td width='80' height='20' align='center'> <input type='button' value='Delete' onclick='dl16()'> 
<input type='hidden' name='d16'>
</td>
<td width='' height='20' align='center'> <input type='text' id='px16' readonly  name='p16' size='4'> </td>
";



if($cwp1==1)
{
print"
<td width='' align='center'>  <input type='text'  id='bx16' name='brand16'  readonly  size='5'> </td>
";
}
else
{
print"
<input type='hidden' id='bx16' name='brand16'>
";
}

if($cwp2==1)
{
print"
<td width='' align='center'>  <input type='text'  id='gx16' name='grade16'  readonly size='5'> </td>
";
}
else
{
print"
<input type='hidden' id='gx16' name='grade16'>
";
}

if($cwp3==1)
{
print"
<td width='' align='center'>  <input type='text'  id='mx16' name='model16'  readonly size='5'> </td>
";
}
else
{
print"
<input type='hidden' id='mx16' name='model16'>
";

}


if($cwp4==1)
{
print"
<td width='' align='center'>  <input type='text'  id='cx16' name='color16'  readonly size='5'> </td>
";
}
else
{
print"
<input type='hidden' id='cx16' name='color16'>
";
}


print"
<td width='' align='center'>  <input type='text'  id='qx16' name='q16'      readonly size='5'> </td>
<td width='' align='center'> <input type='text'   id='ux16' name='unit16'   readonly size='5'> </td>
<td width='' align='center'>  <input type='text'  id='prx16' name='pr16'    readonly size='5'></td>
<td width='' align='center'>  <input type='text'  id='pqx16' name='pq16'     readonly size='5'> </td>
</tr>
";



print"
<tr bgcolor='white' id='a17'> 
<td width='80' height='20' align='center'> <input type='button' value='Delete' onclick='dl17()'> 
<input type='hidden' name='d17'>
</td>
<td width='' height='20' align='center'> <input type='text' id='px17' readonly  name='p17' size='4'> </td>
";



if($cwp1==1)
{
print"
<td width='' align='center'>  <input type='text'  id='bx17' name='brand17'  readonly  size='5'> </td>
";
}
else
{
print"
<input type='hidden' id='bx17' name='brand17'>
";
}

if($cwp2==1)
{
print"
<td width='' align='center'>  <input type='text'  id='gx17' name='grade17'  readonly size='5'> </td>
";
}
else
{
print"
<input type='hidden' id='gx17' name='grade17'>
";
}

if($cwp3==1)
{
print"
<td width='' align='center'>  <input type='text'  id='mx17' name='model17'  readonly size='5'> </td>
";
}
else
{
print"
<input type='hidden' id='mx17' name='model17'>
";

}


if($cwp4==1)
{
print"
<td width='' align='center'>  <input type='text'  id='cx17' name='color17'  readonly size='5'> </td>
";
}
else
{
print"
<input type='hidden' id='cx17' name='color17'>
";
}


print"
<td width='' align='center'>  <input type='text'  id='qx17' name='q17'      readonly size='5'> </td>
<td width='' align='center'> <input type='text'   id='ux17' name='unit17'   readonly size='5'> </td>
<td width='' align='center'>  <input type='text'  id='prx17' name='pr17'    readonly size='5'></td>
<td width='' align='center'>  <input type='text'  id='pqx17' name='pq17'     readonly size='5'> </td>
</tr>
";


print"

<tr bgcolor='white' id='a18'> 
<td width='80' height='20' align='center'> <input type='button' value='Delete' onclick='dl18()'> 
<input type='hidden' name='d18'>
</td>
<td width='' height='20' align='center'> <input type='text' id='px18' readonly  name='p18' size='4'> </td>
";




if($cwp1==1)
{
print"
<td width='' align='center'>  <input type='text'  id='bx18' name='brand18'  readonly  size='5'> </td>
";
}
else
{
print"
<input type='hidden' id='bx18' name='brand18'>
";
}

if($cwp2==1)
{
print"
<td width='' align='center'>  <input type='text'  id='gx18' name='grade18'  readonly size='5'> </td>
";
}
else
{
print"
<input type='hidden' id='gx18' name='grade18'>
";
}

if($cwp3==1)
{
print"
<td width='' align='center'>  <input type='text'  id='mx18' name='model18'  readonly size='5'> </td>
";
}
else
{
print"
<input type='hidden' id='mx18' name='model18'>
";

}


if($cwp4==1)
{
print"
<td width='' align='center'>  <input type='text'  id='cx18' name='color18'  readonly size='5'> </td>
";
}
else
{
print"
<input type='hidden' id='cx18' name='color18'>
";
}


print"
<td width='' align='center'>  <input type='text'  id='qx18' name='q18'      readonly size='5'> </td>
<td width='' align='center'> <input type='text'   id='ux18' name='unit18'   readonly size='5'> </td>
<td width='' align='center'>  <input type='text'  id='prx18' name='pr18'    readonly size='5'></td>
<td width='' align='center'>  <input type='text'  id='pqx18' name='pq18'     readonly size='5'> </td>
</tr>
";


print"

<tr bgcolor='white' id='a19'> 
<td width='80' height='20' align='center'> <input type='button' value='Delete' onclick='dl19()'> 
<input type='hidden' name='d19'>
</td>
<td width='' height='20' align='center'> <input type='text' id='px19' readonly  name='p19' size='4'> </td>
";




if($cwp1==1)
{
print"
<td width='' align='center'>  <input type='text'  id='bx19' name='brand19'  readonly  size='5'> </td>
";
}
else
{
print"
<input type='hidden' id='bx19' name='brand19'>
";
}

if($cwp2==1)
{
print"
<td width='' align='center'>  <input type='text'  id='gx19' name='grade19'  readonly size='5'> </td>
";
}
else
{
print"
<input type='hidden' id='gx19' name='grade19'>
";
}

if($cwp3==1)
{
print"
<td width='' align='center'>  <input type='text'  id='mx19' name='model19'  readonly size='5'> </td>
";
}
else
{
print"
<input type='hidden' id='mx19' name='model19'>
";

}


if($cwp4==1)
{
print"
<td width='' align='center'>  <input type='text'  id='cx19' name='color19'  readonly size='5'> </td>
";
}
else
{
print"
<input type='hidden' id='cx19' name='color19'>
";
}


print"
<td width='' align='center'>  <input type='text'  id='qx19' name='q19'      readonly size='5'> </td>
<td width='' align='center'> <input type='text'   id='ux19' name='unit19'   readonly size='5'> </td>
<td width='' align='center'>  <input type='text'  id='prx19' name='pr19'    readonly size='5'></td>
<td width='' align='center'>  <input type='text'  id='pqx19' name='pq19'     readonly size='5'> </td>
</tr>
";




print"
<tr bgcolor='white' id='a20'> 
<td width='80' height='20' align='center'> <input type='button' value='Delete' onclick='dl20()'> 
<input type='hidden' name='d20'>
</td>
<td width='' height='20' align='center'> <input type='text' id='px20' readonly  name='p20' size='4'> </td>
";


if($cwp1==1)
{
print"
<td width='' align='center'>  <input type='text'  id='bx20' name='brand20'  readonly  size='5'> </td>
";
}
else
{
print"
<input type='hidden' id='bx20' name='brand20'>
";
}

if($cwp2==1)
{
print"
<td width='' align='center'>  <input type='text'  id='gx20' name='grade20'  readonly size='5'> </td>
";
}
else
{
print"
<input type='hidden' id='gx20' name='grade20'>
";
}

if($cwp3==1)
{
print"
<td width='' align='center'>  <input type='text'  id='mx20' name='model20'  readonly size='5'> </td>
";
}
else
{
print"
<input type='hidden' id='mx20' name='model20'>
";

}


if($cwp4==1)
{
print"
<td width='' align='center'>  <input type='text'  id='cx20' name='color20'  readonly size='5'> </td>
";
}
else
{
print"
<input type='hidden' id='cx20' name='color20'>
";
}

print"
<td width='' align='center'>  <input type='text'  id='qx20' name='q20'      readonly size='5'> </td>
<td width='' align='center'> <input type='text'   id='ux20' name='unit20'   readonly size='5'> </td>
<td width='' align='center'>  <input type='text'  id='prx20' name='pr20'    readonly size='5'></td>
<td width='' align='center'>  <input type='text'  id='pqx20' name='pq20'     readonly size='5'> </td>
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