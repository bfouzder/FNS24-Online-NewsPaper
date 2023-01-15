<?php
include_once('dbconnection.php');
session_start();

/*
$result = mysql_query("SELECT * FROM salememo");
$num_rows = mysql_num_rows($result);
*/

//$p_des=trim($_POST['p_des']);
//$p_des=str_replace("'","`","$p_des");


$go_g=trim($_POST['go_g']);

$comission_to=trim($_POST['comission_to']);
$comission_amount=trim($_POST['comission_amount']);



$other=trim($_POST['other']);






$p_des=trim($_POST['p_des']);


$inn='\"';
$inn2='"';

$p_des=str_replace("$inn","$inn2","$p_des");

$p_des=str_replace("'","`","$p_des");




$wa=trim($_POST['wa']);
$wa=str_replace("'","`","$wa");



$s45=trim($_POST['s45']);

if($s45=="")
{
$s45=(int)$_GET['s45'];
$temp=1;
}

$result = mysql_query("SELECT * FROM `salememo` where user_id='$s45' ORDER BY `user_id` ASC ");	

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
	
	$mobiles=$a_row[18];
	$address=$a_row[43];

	$comments=$a_row[14];

	
	$new_mobile=$a_row[18];
	$new_address=$a_row[43];
	$new_customer=$a_row[3];
	
	$service=$a_row[44];
	
	$contact_name=$a_row[35];

	$mobile_contact=$a_row[51];
	$address_contact=$a_row[52];
	
	

	$contact_name1=$a_row[53];
	$mobile_contact1=$a_row[54];
	$address_contact1=$a_row[55];
	
	
	
	
	
$new_name1=$a_row[3];
$new_mobile1=$a_row[18];
$new_address1=$a_row[43];
	
	
	
	
	
	
	
	if($a_row[42]=="")
	{
	$discount_less2=$a_row[27];
	}
	else
	{
	$discount_less2=$a_row[42];
	$kff=123;
	
	
	}
	

	$dcl=$a_row[45];
	$tin=$a_row[46];
	$adjust=$a_row[47];
	$comission_to=$a_row[48];
	$comission_amount=$a_row[49];

	
	
    $less=$a_row[6];
    $payment=$a_row[7];

    $payment=$payment-$adjust;
	
	$vat=$a_row[38];
	$tax2=$a_row[39];
	

	
        $sales_order=$a_row[33];
	
	$transport_name=$a_row[34];
	
	$m_id2=$a_row[37];
	
	
}




//print" $s45 - $dat - $balance <br>";




/*
$result = mysql_query("SELECT * FROM `salememo`  ORDER BY `user_id` DESC  LIMIT 0 , 1 ");

while ($a_row = mysql_fetch_row($result)) {

	foreach ($a_row as $field) {
		
	}

$num=$a_row[0];

}
*/


$me=$invoice_no;


//$me=$me+1;


$ser=trim($_POST['ser']);




if($ser!="")
{
$new_name1=trim($_POST['new_name1']);
$new_mobile1=trim($_POST['new_mobile1']);
$new_address1=trim($_POST['new_address1']);

$new_name1=str_replace("'","`","$new_name1");
$new_mobile1=str_replace("'","`","$new_mobile1");
$new_address1=str_replace("'","`","$new_address1");


}




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
unset($_SESSION['cart_wa']);
unset($_SESSION['cart_other']);



	

$result = mysql_query("SELECT * FROM `saleproduct` where money_id='$invoice_no' ORDER BY `user_id` ASC ");	

while ($a_row = mysql_fetch_row($result)) {

	foreach ($a_row as $field) {
		
	}
	
	
	
	$product_id=$a_row[4];
	$qty=$a_row[6];
	$price=$a_row[7];
	$unit=$a_row[29];
	
$other=$a_row[42];
	
	
	if($a_row[35]=="")
	{
	$com=$a_row[25];
	}
	else
	{
	$com=$a_row[35];
	}

	
	$p_des=$a_row[34];
	$wa=$a_row[36];
        $go_g=$a_row[43];
	$product_id_unique= time().$a_row[0]; 

	

	   $_SESSION['cart_unique'][$product_id_unique]=$_SESSION['cart_unique'][$product_id_unique]+$qty;

           $_SESSION['cart'][$product_id_unique]=$_SESSION['cart'][$product_id_unique]=$product_id;
           $_SESSION['cart_go'][$product_id_unique]=$_SESSION['cart_go'][$product_id_unique]=$go_g;

	   $_SESSION['cart_price'][$product_id_unique]=$_SESSION['cart_price'][$product_id_unique]+$price;
           $_SESSION['cart_unit'][$product_id_unique]=$_SESSION['cart_unit'][$product_id_unique]+$unit;
	   $_SESSION['cart_com'][$product_id_unique]=$_SESSION['cart_com'][$product_id_unique]=$com;
	   $_SESSION['cart_local'][$product_id_unique]=$_SESSION['cart_local'][$product_id_unique]=$p_des;
	   $_SESSION['cart_wa'][$product_id_unique]=$_SESSION['cart_wa'][$product_id_unique]=$wa;
	   $_SESSION['cart_other'][$product_id_unique]=$_SESSION['cart_other'][$product_id_unique]=$other;

	   
						
						
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

$service=trim($_POST['service']);


$vat=trim($_POST['vat']);
$tax2=trim($_POST['tax2']);






$comission_to=trim($_POST['comission_to']);
$comission_amount=trim($_POST['comission_amount']);

$adjust=trim($_POST['adjust_amount']);









}



if($ser!="")
{

$supplier=trim($_POST['supplier']);
$transport_name=trim($_POST['transport_name']);

$contact_name=trim($_POST['contact_name']);
$mobile_contact=trim($_POST['mobile_contact']);
$address_contact=trim($_POST['address_contact']);

$contact_name1=trim($_POST['contact_name1']);
$mobile_contact1=trim($_POST['mobile_contact1']);
$address_contact1=trim($_POST['address_contact1']);




$sales_order=trim($_POST['sales_order']);





$dcl=trim($_POST['dcl']);
$tin=trim($_POST['tin']);




$dcl=str_replace("'","`","$dcl");
$tin=str_replace("'","`","$tin");



if($supplier=="")
{
$supplier=(int)$_GET['supplier'];	
}

if($transport_name=="")
{
$transport_name=$_GET['transport_name'];	
}

if($contact_name=="")
{
$contact_name=$_GET['contact_name'];	
}


if($mobile_contact=="")
{
$mobile_contact=$_GET['mobile_contact'];	
}

if($address_contact=="")
{
$address_contact=$_GET['address_contact'];	
}



if($contact_name1=="")
{
$contact_name1=$_GET['contact_name1'];	
}


if($mobile_contact1=="")
{
$mobile_contact1=$_GET['mobile_contact1'];	
}

if($address_contact1=="")
{
$address_contact1=$_GET['address_contact1'];	
}




if($sales_order=="")
{
$sales_order=$_GET['sales_order'];	
}



if($dcl=="")
{
$dcl=$_GET['dcl'];	
}

if($tin=="")
{
$tin=$_GET['tin'];	
}




}






$payment_mode=trim($_POST['payment_mode']);
$paymenttype=trim($_POST['paymenttype']);



if($ser==5)
{
$comments=trim($_POST['comments']);
$comments=str_replace("'","`","$comments");
}

$less_new=trim($_POST['less_new']);
$check_no=trim($_POST['check_no']);
$check_amount=trim($_POST['check_amount']);






$transport_name=str_replace("'","`","$transport_name");
$contact_name=str_replace("'","`","$contact_name");
$sales_order=str_replace("'","`","$sales_order");




//$comments=str_replace("'","`","$comments");


















if($ser!="")
{

$dat=trim($_POST['dat']);
$mon=trim($_POST['mon']);
$yer=trim($_POST['yer']);


$mdate="$yer$mon$dat";
}

/*
if($ser=="")
{
$bbb=time(); 
$d=date("m/d/y",$bbb); 
$mon="$d[0]$d[1]";
$dat="$d[3]$d[4]";
$yer="20$d[6]$d[7]";

$mdate="$yer$mon$dat";

}
*/





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




/*

for($i=1;$i<=$w;$i++)

{
	
$total_price_sale=0;
$result = mysql_query("SELECT * FROM `find_stock` where adat<='$mdate'   && product_id='$p_id[$i]' ORDER BY `adat` ");


//$result = mysql_query("SELECT * FROM `saleproduct` where adat<='$mdate'  && product_id='$p_id[$i]' ORDER BY `adat` ");


while ($a_row = mysql_fetch_row($result)) {

	foreach ($a_row as $field) {
		
	}

//$q=$q+$a_row[6];
$psingle=$a_row[6];
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





*/












$supplier_dbid=1;



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



if($ser!="")
	
	{

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


$mobiles=$new_mobile;
$address=$new_address;


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




//$qty=trim($_POST['qty']);





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

$product_id_unique= time().$product_id;

                        $_SESSION['cart_unique'][$product_id_unique]=$_SESSION['cart_unique'][$product_id_unique]+$qty;

                        $_SESSION['cart'][$product_id_unique]=$_SESSION['cart'][$product_id_unique]=$product_id;

                        $_SESSION['cart_go'][$product_id_unique]=$_SESSION['cart_go'][$product_id_unique]=$go_g;

                        $ps=123;
                        $_SESSION['color']="$ps";
						
						
	   $_SESSION['cart_price'][$product_id_unique]=$_SESSION['cart_price'][$product_id_unique]=$price;
           $_SESSION['cart_unit'][$product_id_unique]=$_SESSION['cart_unit'][$product_id_unique]+$unit;
	   $_SESSION['cart_com'][$product_id_unique]=$_SESSION['cart_com'][$product_id_unique]=$less_new;
	   $_SESSION['cart_local'][$product_id_unique]=$_SESSION['cart_local'][$product_id_unique]=$p_des;
	   $_SESSION['cart_wa'][$product_id_unique]=$_SESSION['cart_wa'][$product_id_unique]=$wa;
	   $_SESSION['cart_other'][$product_id_unique]=$_SESSION['cart_other'][$product_id_unique]=$other;

	   
	   
	 		
						
						
						
                        

                break;


		case "remove":

                       
					   unset($_SESSION['cart_unique'] [$product_id_unique]);
					   unset($_SESSION['cart_go'] [$product_id_unique]);



					   unset($_SESSION['cart'] [$product_id_unique]);


					   unset($_SESSION['cart_price'][$product_id_unique]);
					   unset($_SESSION['cart_unit'][$product_id_unique]);
					   unset($_SESSION['cart_com'][$product_id_unique]);
					   unset($_SESSION['cart_local'][$product_id_unique]);
					   unset($_SESSION['cart_wa'][$product_id_unique]);
					   unset($_SESSION['cart_other'][$product_id_unique]);

					   

             
                break;

                }










}


}





$action = $_GET[action]; 








$sql="SELECT * FROM `contact` WHERE user_id='$contact_name' ";
$result=mysql_query($sql);
$arrsco=mysql_fetch_array($result);
$contact_namen=$arrsco[1];

$mobile_contact=$arrsco[3];
$address_contact=$arrsco[5];









if($action=="remove")
{


/*
$dat=$_GET['dat'];
$mon=$_GET['mon'];
$yer=$_GET['yer'];

$mdate="$yer$mon$dat";
*/


$product_id_unique = $_GET[i1d];

switch($action) {	



		case "en":

                        $_SESSION['cart'][$product_id_unique]=$_SESSION['cart'][$product_id_unique]+$qty;

                break;


		case "remove":

                                      unset($_SESSION['cart_unique'] [$product_id_unique]);
                                      unset($_SESSION['cart_go'] [$product_id_unique]);

                                      unset($_SESSION['cart'] [$product_id_unique]);


					   
					   unset($_SESSION['cart'] [$product_id_unique]);
					   unset($_SESSION['cart_price'][$product_id_unique]);
					   unset($_SESSION['cart_unit'][$product_id_unique]);
					   unset($_SESSION['cart_com'][$product_id_unique]);
					   unset($_SESSION['cart_local'][$product_id_unique]);
					   unset($_SESSION['cart_wa'][$product_id_unique]);
					   unset($_SESSION['cart_other'][$product_id_unique]);


             
                break;

                }






}


//print"$dat - $mon - $yer";

$adate="$yer$mon$dat";



$ps=$_SESSION['color'];


if($ps==123 && $ser!="")
{
foreach($_SESSION['cart'] as $product_id_unique => $quantity)
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
<title> Sales Edit </title>
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
width:190px;
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


<tr> <td height='30' width='200' bgcolor='green'> &nbsp;&nbsp;&nbsp;  <span id='child'> <b> <font color='white'> Sales Edit </font> </b> </span>  </td></tr>

<tr> <td height='7'> </td></tr>





";


include_once('sales_left.php');


print"



<td align='center' valign='top' width='980' bgcolor='#F2F2F2'>  



	





<table align='center' width='200' cellpadding='0' cellspacing='0' bgcolor='F2F2F2'>
<tr> <td height='10' align='center' >   </td> </tr>
<tr> <td height='40' align='center' id='saa'>  <b> Sales Invoice Edit </b> </td> </tr>
</table>


<table align='center' width='900' cellpadding='0' cellspacing='0' bgcolor='F2F2F2'>

<tr> <td height='20'> </td> </tr>

<tr> 

<td width='900' bgcolor='' align='center' valign='top' height='900'>

<table align='center' width='900' cellpadding='0' cellspacing='0'>


<tr> 

<form name='fuu' action='sales_edit.php' method='POST'> 


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


/*

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


*/








print"
<tr> <td height='1'> </td> </tr>
";


print"

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











<?php

print"



</td>



</tr>
";









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
<tr>
<td height='5'> </td>
</tr>
";












print"
<tr> 

<td  width='' bgcolor='' align='left'>
<font size='2' face='arial' color='black'>&nbsp; <b> Customer Name </b> </font>
</td>
<td align='left' width=''>
";



print"
:

<select name='supplier' id='tags2_sales'>
<option value='$supplier'> $suppliern </option>
";


//$result = mysql_query("SELECT * FROM `customer`  ORDER BY `user_id` ASC  LIMIT 0 , 60000 ");

$result = mysql_query("SELECT * FROM `customer`  ORDER BY `company_name` ASC ");



while ($a_row = mysql_fetch_row($result)) {

	foreach ($a_row as $field) {
		
	}
print"
	<option value='$a_row[0]'> $a_row[7]  - Address - $a_row[5] </option>
";

}

print"
</select>
";

print"
</span>
";

print"
</td>
</tr>
<tr>
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
<td height='5'> </td>
</tr>
<tr> 
<td width='left'> 
<font face='arial' size='2' color='black'>&nbsp;
 <b>  Address </b> </font> </td>
<td width='left'> : <input type='text' name='new_address' id='text_d' value='$address'  size='35'> 
</font>
</td>
</tr>
";


print"
<tr>
<td height='5'> </td>
</tr>
<tr> 
<td width='left'> 
<font face='arial' size='2' color='black'>&nbsp;
 <b>  Mobile </b> </font> </td>
<td width='left'> : <input type='text' name='new_mobile' value='$mobiles' size='15' id='text_mobile2'>   
 
 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

";

/*	
<font size='2' face='arial' color='black'> <b> Sale Rate : </b> </font> <input type='text' name='sale_price' id='pr2' readonly size='5'> 


&nbsp;
<font size='2' face='arial' color='black'> <b> Stock : </b> </font> <input type='text' name='sale_stock' id='pr2' readonly size='5'> 
</font> 
*/
 
print"
</td>
</tr>
";







print"
<tr>
<td height='5'> </td>
</tr>
<tr> 
<td width='left'> 
<font face='arial' size='2' color='black'>&nbsp;
 <b>  For (Separate name) </b> </font> </td>
<td width='left'> : 

<input type='text' name='new_name1' value='$new_name1' size='15'>   

Mobile :

<input type='text' name='new_mobile1' value='$new_mobile1' size='15'>   

Address :

<input type='text' name='new_address1' value='$new_address1' size='15'>   
 
";

 
print"
</td>
</tr>
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












/*
print"

<tr> <td height='8'> </td> </tr>
<tr>
<td width='0' align='left'> <font size='2' face='arial' color='black'> <b> &nbsp; Receiver Person  </b> </font> </td>
<td align='left'> 
";

print"

: 

<input type='text' name='contact_name1' value='$contact_name1' id='text_mobile'>


<font size='2' face='arial' color='black'> <b> Mobile : </b> </font> <input type='text' name='mobile_contact1' value='$mobile_contact1' id='pr5'  size='2'> 
<font size='2' face='arial' color='black'> <b> Address : </b> </font> <input type='text' name='address_contact1' value='$address_contact1' id='pr5' size='3'> 




";
print"
</td>
<tr>
";










print"

<tr>
<td height='5'> </td>
</tr>
";


*/


print"
<tr> 



<td width='' align='left'> 
<font size='2' face='arial' color='black'>&nbsp; <b> Product </b> </font> </font> 
</td>

<td align='left'>

:

<label for='tags'> </label>


<input type='text' id='tags' name='product_id' size='30' onblur='rnew()' onclick='rneww()'>
";


if($other_set==1)
{
print"
<font size='2' face='arial' color='black'> <b>  </b> </font> <input type='text' name='other' size='3' id='txx_b_other'> 
";

}

print"
<font size='2' face='arial' color='black'> <b> Price : </b> </font> <input type='text' name='price' id='txx' size='10'> 
";



if($box_set==1)
{
print"
<font size='2' face='arial' color='black'> <b> Box : </b> </font> <input type='text' name='box' id='txx' size='4'> 
";
}

print"
<font size='2' face='arial' color='black'> <b> Qty : </b> </font> <input type='text' name='qty' id='txx' size='4'> 

";


if($set_wa==1)
{
print"
<font size='2' face='arial' color='716E6E'> Warranty : </font> <input type='text' name='wa' id='txx' size='4'> 
";
}


if($set_discount==1)
{
print"
<font size='2' face='arial' color='716E6E'> Comission: </font> <input type='text' id='tx4' name='less_new' size='4'> 
";
}

print"

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
<input type='hidden' name='s45' value='$s45'>
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


<table align='center' width='890' cellpadding='3' cellspacing='1' bgcolor='E4DBDB'>

<tr bgcolor='FAFAFA'>
 <td height='25' bgcolor='' width='100' align='center'> <font face='arial' color='black' size='2'> <b> Remove </b> </font> </td>
 <td height='25' bgcolor='' width='250' align='center'> <font face='arial' color='black' size='2'> <b> Product name </b> </font> </td>

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
 <td height='25' bgcolor='' width='50' align='center'> <font face='arial' color='black' size='2'> <b> Qty </b> </font> </td>
 
 <td height='25' bgcolor='' width='50' align='center'> <font face='arial' color='black' size='2'> <b> Unit </b> </font> </td>
 ";
 
 
 if($set_wa==1)
 {
 print"
 <td height='25' bgcolor='' width='50' align='center'> <font face='arial' color='black' size='2'> <b>  Warranty </b> </font> </td>
 ";
 }
 
 
 
 print"

 <td height='25' bgcolor='' width='100' align='center'> <font face='arial' color='black' size='2'> <b> Rate </b> </font> </td>
 
";

  if($set_discount==1)
{
 
 print"
 <td height='25' bgcolor='' width='100' align='center'> <font face='arial' color='black' size='2'> <b> Commission </b> </font> </td>
 ";
 
}

 
 
 print"
 <td height='25' bgcolor='' width='100' align='center'> <font face='arial' color='black' size='2'> <b> Total </b> </font> </td>
</tr>
";


if($s45!="")

{
	
/*	
if($dat>30 && $mon>5)
{
exit;	
}
*/




$transport_name1=str_replace("#","@","$transport_name");

//$contact_name1=str_replace("#","@","$contact_name");

$sales_order1=str_replace("#","@","$sales_order");







$w34=0;

foreach($_SESSION['cart_price'] as $product_id_unique=> $quantity_price)
{
$w34++;
$price_a[$w34]=$quantity_price;

}

$w34=0;

foreach($_SESSION['cart_unit'] as $product_id_unique => $quantity_unit)
{
$w34++;
$unit_a[$w34]=$quantity_unit;
}

$w34=0;

foreach($_SESSION['cart_com'] as $product_id_unique => $quantity_com)
{
$w34++;
$com_a[$w34]=$quantity_com;
}

$w34=0;

foreach($_SESSION['cart_local'] as $product_id_unique => $quantity_name)
{
$w34++;
$local_a[$w34]=$quantity_name;
}


$w34=0;

foreach($_SESSION['cart_wa'] as $product_id_unique => $quantity_wa)
{
$w34++;
$local_wa[$w34]=$quantity_wa;
}





$w34=0;

foreach($_SESSION['cart_other'] as $product_id_unique => $quantity_other)
{
$w34++;
$local_other[$w34]=$quantity_other;
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


$arrp[21]=$price_a[$sew];
$arrp[19]=$com_a[$sew];
$arrp[29]=$local_a[$sew];


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
 <td height='30'  width='100' align='center' bgcolor=''> <a href=\"sales_edit.php?action=remove&i1d=$product_id_unique&s45=$s45&dat=$dat&mon=$mon&yer=$yer&ser=$ser&supplier=$supplier&contact_name=$contact_name&transport_name=$transport_name1&sales_order=$sales_order1&new_customer=$new_customer&new_mobile=$new_mobile&new_address=$new_address&dcl=$dcl&tin=$tin&mobile_contact=$mobile_contact&address_contact=$address_contact&mobile_contact1=$mobile_contact1&address_contact1=$address_contact1&contact_name1=$contact_name1\">  <img src='picture/remove.gif'> </a> $sew </td>
 <td height='30' bgcolor='' width='' align='left'> <font face='arial' color='716E6E' size='2'> $arrp_new[2] 
";

if($go_show==1)
{
print"
($go_other[$sew])
";
}

print"
$local_other[$sew] $arrp[29]  $name[1] </font> </td>
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
 <td height='30' bgcolor='' width='' align='center'> <font face='arial' color='716E6E' size='2'> $quantity </font> </td>
 ";
 


 
 print"
 <td height='30' bgcolor='' width='' align='center'> <font face='arial' color='716E6E' size='2'> $arrp_new[22] </font> </td>
 ";
 
 
  if($set_wa==1)
 {
 print"
 <td height='30' bgcolor='' width='' align='center'> <font face='arial' color='716E6E' size='2'>  $local_wa[$sew] </font> </td>
 ";
 }
 
 
 print"
 <td height='30' bgcolor='' width='' align='center'> <font face='arial' color='716E6E' size='2'> $arrp[21]   </font> </td>
 ";
 
 /*
 print"
 <td height='30' bgcolor='' width='100' align='center'> <font face='arial' color='716E6E' size='2'> $total3 </font> </td>
 ";
 */
 
 
 
if($set_discount==1)
{

 
 
 if($f_p[$f_u]=='%')
 {
print"
 <td height='30' bgcolor='' width='' align='left'> <font face='arial' color='716E6E' size='2'> $f_pp % = $arrp[19] </font> </td>
";

 }
 else
 {
print"
 <td height='30' bgcolor='' width='' align='left'> <font face='arial' color='716E6E' size='2'> $arrp[19] </font> </td>
";
	 
 }


} 
	
 
 
print" 
 <td height='30' bgcolor='' width='' align='center'> <font face='arial' color='716E6E' size='2'> $total </font> </td>
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
 

<td> </td>
<td> </td>


<td> </td>
<td> </td>


<td height='30' bgcolor='' width='100' align='center'> <font face='arial' color='716E6E' size='2'>  </font> </td>
 <td height='30' bgcolor='' width='50' align='center'> <font face='arial' color='716E6E' size='2'>  </font> </td>
 ";
 
 if($set_wa==1)
 {
 print"
 <td> </td>
 ";
 }
 
 print"
 <td height='30' bgcolor='' width='100' align='center'> <font face='arial' color='716E6E' size='2'> $total7 </font> </td>
 <td height='30' bgcolor='' width='100' align='center'> <font face='arial' color='716E6E' size='2'> $lesst </font> </td>
 <td height='30' bgcolor='' width='100' align='center'> <font face='arial' color='716E6E' size='2'> $sub_total </font> </td>
</tr>
";

*/


//print" $less - $stotal dfddf";

if($ser==5)
{
$less=trim($_POST['less']);
$discount_less=trim($_POST['discount_less']);




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





$pa2=$payment+$adjust;



$due=$stotal2-$pa2;




//$tax=0.00;

//$due=$stotal-$payment;


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

<table align='center' width='890' cellpadding='0' cellspacing='0'>

<tr bgcolor='white'> 

<td width='400' bgcolor='' align='center' valign='top'> 

<table align='center' width='500' cellpadding='0' cellspacing='0' bgcolor='F2F2F2'>




<tr> 

<td width='170' align='left'> <font color='716E6E' face='arial' size='2'> Commission To  </font>
</td>

<form action='sales_edit.php' method='POST'>

<td width='430' align='left'> 
:
<input type='text' name='comission_to' value='$comission_to' size='25'> 

</td>
</tr>



<tr> <td height='5'>  </td>  </tr>



<tr> 
<td width='' align='left'> <font color='716E6E' face='arial' size='2'> Commission  </font>
</td>

<td width='' align='left'> 
:
<input type='text' name='comission_amount' value='$comission_amount' size='25'> Tk.
</td>
</tr>



<tr> <td height='5'>  </td>  </tr>







<tr> 

<td width='' align='left'> <font color='716E6E' face='arial' size='2'> Discount  </font>
</td>

<td width='' align='left'> 

:
<input type='text' name='discount_less' value='$discount_less2' size='25'> Tk.


</td>

</tr>

";





if($set_in==1)
{
print"
<tr> <td height='5'>  </td>  </tr>
<tr> 
<td width='' align='left'> <font color='716E6E' face='arial' size='2'> Installation Charger  </font>
</td>
<td width='' align='left'> 

:
<input type='text' name='service' value='$service' size='25'> Tk.
</td>
</tr>
";
}




print"


<tr> <td height='5'>  </td>  </tr>

<tr> 
<td width='' align='left'> <font color='716E6E' face='arial' size='2'> Carring Cost  </font>
</td>
<td width='' align='left'>
: 
<input type='text' name='less' value='$less' size='25'> Tk.
<input type='hidden' name='ser' value='5'>
</td>
</tr>






";



if($set_vat==1)

{
print"


<tr> <td height='5'> </td> </tr>



<tr> 
<td width='' align='left'> <font color='716E6E' face='arial' size='2'> Vat  </font>
</td>
<td width='' align='left'> 
:
<input type='text' name='vat' value='$vat' size='25'> % Tk.
</td>
</tr>

<tr> <td height='5'> </td> </tr>



<tr> 
<td width='' align='left'> <font color='716E6E' face='arial' size='2'> Tax  </font>
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

<td width='' align='left'> <font color='716E6E' face='arial' size='2'> Payment mode  </font> </td>
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

<td width='' align='left'> <font color='716E6E' face='arial' size='2'> Cheque No  </font></td>

<td width='' height='30' align='left' valign='top'> 
:
<input type='text' name='check_no' value='$check_no' size='25'>


</td>


</tr>







<tr> 

<td width='' align='left'> <font color='716E6E' face='arial' size='2'> Cheque Amount  </font></td>

<td width='' height='30' align='left' valign='top'> 
:

<input type='text' name='check_amount' value='$check_amount' size='25'>


</td>


</tr>










<tr> 

<td width='' align='left'> <font color='716E6E' face='arial' size='2'> Cheque Issu Date  </font></td>
<td width='' height='' align='left' valign='top'> 
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



<tr>  <td height='7'> </td></tr>





<tr> 

<td width='' align='left' height='30'> <font color='716E6E' face='arial' size='2'> Note  </font></td>

<td width='' height='30' align='left' valign='top'> 

:
<input type='hidden' name='supplier' value='$supplier'>

<input type='hidden' name='dat' value='$dat'>
<input type='hidden' name='mon' value='$mon'>
<input type='hidden' name='yer' value='$yer'>

<input type='hidden' name='transport_name' value='$transport_name'>

<input type='hidden' name='contact_name' value='$contact_name'>
<input type='hidden' name='mobile_contact' value='$mobile_contact'>
<input type='hidden' name='address_contact' value='$address_contact'>


<input type='hidden' name='contact_name1' value='$contact_name1'>
<input type='hidden' name='mobile_contact1' value='$mobile_contact1'>
<input type='hidden' name='address_contact1' value='$address_contact1'>


<input type='hidden' name='memo_no' value='$me'>
<input type='hidden' name='sales_order' value='$sales_order'>


<input type='hidden' name='s45' value='$s45'>



<input type='hidden' name='new_customer' value='$new_customer'>
<input type='hidden' name='new_address' value='$new_address'>
<input type='hidden' name='new_mobile' value='$new_mobile'>



<input type='hidden' name='new_name1' value='$new_name1'>
<input type='hidden' name='new_mobile1' value='$new_mobile1'>
<input type='hidden' name='new_address1' value='$new_address1'>



<input type='hidden' name='dcl' value='$dcl'>
<input type='hidden' name='tin' value='$tin'>





<input type='text' name='comments' value='$comments' size='25'>
</td>


</tr>


<tr> 

<td width='' align='left'> <font color='716E6E' face='arial' size='2'>   </font></td>

<td width='' height='30' align='left' valign='top'> 

&nbsp;
<input type='submit' value='Add To Payment ' ID='PR'>

</td>
</form>
</tr>





<tr> 

<td> </td>
<form action='salememo_demo.php' method='POST' target='a_blank'>
<td align='left'> 

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

<input type='hidden' name='supplier' value='$supplier'>

<input type='hidden' name='ddddd' value='100'>


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
<input type='hidden' name='mobile_contact' value='$mobile_contact'>
<input type='hidden' name='address_contact' value='$address_contact'>


<input type='hidden' name='contact_name1' value='$contact_name1'>
<input type='hidden' name='mobile_contact1' value='$mobile_contact1'>
<input type='hidden' name='address_contact1' value='$address_contact1'>



<input type='hidden' name='memo_no' value='$me'>
<input type='hidden' name='sales_order' value='$sales_order'>



<input type='hidden' name='new_customer' value='$new_customer'>




<input type='hidden' name='new_name' value='$new_name1'>
<input type='hidden' name='new_address' value='$new_address1'>
<input type='hidden' name='new_mobile' value='$new_mobile1'>






<input type='hidden' name='check_amount' value='$check_amount'>

<input type='hidden' name='m_id2' value='$m_id2'>


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
	print"
	
	&nbsp;
<input type='submit' value='Save & Print' id='enter2'>
";
//}
print"
<br>
<br>
<br>
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
<td bgcolor='' height='30' width='165' align='left'> <font size='2' face='arial' color='716E6E'> Total  </font> </td> 
<td bgcolor='' height='30' width='85' align='right'><font size='2' face='arial' color='716E6E'> $subtotal &nbsp;&nbsp; </font> </td> 
</tr>


<tr bgcolor='white'>
";




if($f_p_dis[$f_u_dis]=='%' || $kff==123)
{
	
if($kff==123 && $ser!=5)
{
$bq="$discount_less2";
}
else
{
$bq="";	
}


print"
<td bgcolor='' height='' width='' align='left'> <font size='2' face='arial' color='716E6E'>Discount $f_ppe_dis $bq  </font> </td> 
";
}
else
{
print"
<td bgcolor='' height='' width='' align='left'> <font size='2' face='arial' color='716E6E'>Discount  </font> </td> 
";
}


print"
<td bgcolor='' height='' width='' align='right'><font size='2' face='arial' color='716E6E'> $discount_less &nbsp;&nbsp;  </font> </td> 
</tr>


<tr bgcolor='white'>
<td bgcolor='' height='' width='' align='left'> <font size='2' face='arial' color='716E6E'>Total  </font> </td> 
<td bgcolor='' height='' width='' align='right'><font size='2' face='arial' color='716E6E'> $subtotal_last &nbsp;&nbsp;  </font> </td> 
</tr>
";

if($set_in==1)
{
print"
<tr bgcolor='white'> 
<td bgcolor='' height='' width='' align='left'> <font size='2' face='arial' color='716E6E'> Installation Charge  </font> </td> 
<td bgcolor='' height='' width='' align='right'><font size='2' face='arial' color='716E6E'>$service &nbsp;&nbsp; </font> </td> 
</tr>
";
}



print"
<tr bgcolor='white'> 
<td bgcolor='' height='' width='' align='left'> <font size='2' face='arial' color='716E6E'> Carring cost  </font> </td> 
<td bgcolor='' height='' width='' align='right'><font size='2' face='arial' color='716E6E'>$less  &nbsp;&nbsp; </font> </td> 
</tr>







<tr bgcolor='white'> 
<td bgcolor='' height='' width='' align='left'> <font size='2' face='arial' color='716E6E'>Sub Total  </font> </td> 
<td bgcolor='' height='' width='' align='right'><font size='2' face='arial' color='716E6E'> $stotal &nbsp;&nbsp;  </font> </td> 
</tr>
";




if($vat!="")
{
print"
<tr bgcolor='white'> 
<td bgcolor='' height='' width='' align='left'> <font size='2' face='arial' color='716E6E'>Vat $vat %  </font> </td> 
<td bgcolor='' height='' width='' align='right'><font size='2' face='arial' color='716E6E'> $vat_tk  &nbsp;&nbsp; </font> </td> 
</tr>
";
}

if($tax2!="")
{
print"
<tr bgcolor='white'> 
<td bgcolor='' height='' width='' align='left'> <font size='2' face='arial' color='716E6E'> Tax $tax2 %  </font> </td> 
<td bgcolor='' height='' width='' align='right'><font size='2' face='arial' color='716E6E'> $tax2_tk &nbsp;&nbsp; </font> </td> 
</tr>
";
}


if($vat!="" || $tax2!="")
{
print"
<tr bgcolor='white'> 
<td bgcolor='' height='' width='' align='left'> <font size='2' face='arial' color='716E6E'> Subtotal  </font> </td> 
<td bgcolor='' height='' width='' align='right'><font size='2' face='arial' color='716E6E'> $stotal2 nbsp;&nbsp;  </font> </td> 
</tr>
";
}






print"
<tr bgcolor='white'> 
<td bgcolor='' height='' width='' align='left'> <font size='2' face='arial' color='716E6E'> Payment  </font> </td> 
<td bgcolor='' height='' width='' align='right'><font size='2' face='arial' color='716E6E'>$payment &nbsp;&nbsp; </font> </td> 
</tr>


<tr bgcolor='white'> 
<td bgcolor='' height='' width='' align='left'> <font size='2' face='arial' color='716E6E'> Adjust Amount  </font> </td> 
<td bgcolor='' height='' width='' align='right'><font size='2' face='arial' color='716E6E'> $adjust &nbsp;&nbsp; </font> </td> 
</tr>



<tr bgcolor='white'> 
<td bgcolor='' height='' width='' align='left'> <font size='2' face='arial' color='716E6E'> Due  </font> </td> 
<td bgcolor='' height='' width='' align='right'><font size='2' face='arial' color='716E6E'> $due  &nbsp;&nbsp; </font> </td> 
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