<?php
include_once('dbconnection.php');
session_start();

/*
$result = mysql_query("SELECT * FROM salememo");
$num_rows = mysql_num_rows($result);
*/




$supplier=trim($_POST['supplier']);
$transfer2=trim($_POST['transfer2']);


if($supplier=="")
{
$supplier=(int)$_GET['sup'];	
}


if($transfer2=="")
{
$transfer2=(int)$_GET['transfer2'];	
}


$supplier=10000000000;


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
if($a_row[36]==$supplier)
{
$q=$q+$a_row[6];
}


if($a_row[2]==$supplier)
{
$q1=$q1+$a_row[6];


}


}

$tfh++;

$tf1[$tfh]=$q;
$tf2[$tfh]=$q1;




}



//print"$tf1[1] - $tf1[2] ";


$tfh=0;

$q=0;
$q1=0;







$result = mysql_query("SELECT * FROM `salememo`  ORDER BY `money_id` DESC  LIMIT 0 , 1 ");

while ($a_row = mysql_fetch_row($result)) {

	foreach ($a_row as $field) {
		
	}

$num=$a_row[1];

}





$me=$num;
$me=$me+1;


$me= time().$u_idd;



$ser=trim($_POST['ser']);


$vat=trim($_POST['vat']);
$tax2=trim($_POST['tax2']);




$less=trim($_POST['less']);
$payment=trim($_POST['payment']);
$payment_mode=trim($_POST['payment_mode']);
$paymenttype=trim($_POST['paymenttype']);


/*


if($supplier==1)
{
include_once('connection1.php');
}

if($supplier==2)
{
include_once('connection2.php');
}

if($supplier==3)
{
include_once('connection3.php');
}

if($supplier==4)
{
include_once('connection4.php');
}

if($supplier==5)
{
include_once('connection5.php');
}

if($supplier==6)
{
include_once('connection6.php');
}







*/








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


$result = mysql_query("SELECT * FROM `saleproduct_transfer` where supplier_id='$supplier' && product_id='$p_id[$i]' ORDER BY `user_id` DESC  LIMIT 0 , 2");


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


////////////////////////////////////////////

//$q=$q+$stp[$ew];


////////////////////////////////////


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



$sql="SELECT * FROM `godawn_new` WHERE user_id='$supplier' ";
$result=mysql_query($sql);
$arrs=mysql_fetch_array($result);
$suppliern=$arrs[1];




$sql="SELECT * FROM `godawn_new` WHERE user_id='$transfer2' ";
$result=mysql_query($sql);
$arrst=mysql_fetch_array($result);
$transfer2n=$arrst[1];
















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





$rty=0;
$rkk=0;


$id2=trim($_POST['product_id2']);

$idn2=strlen($id2);

for($lk=0;$lk<=$idn2;$lk++)
{
if($id2[$lk]=='=')
{
$rty++;	
}

if($rty==1)
{
	$rkk++;
	if($rkk>1)
	{
$idvalue2="$idvalue2$id2[$lk]";
	}	
}
	
}



$product_id2=$idvalue2;
















if($price=="")
{

$sql="SELECT * FROM `product_name` WHERE user_id='$product_id' ";
$result=mysql_query($sql);
$arrpo=mysql_fetch_array($result);
$price=$arrpo[4];	
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



$adate="$yer$mon$dat";







if($transfer2>0 && $product_id>0 && $product_id2>0 &&  $qty>0 && $ser>0)
{

$supplier_id=10000000;

$final_price=$price;

$money_id=0;
$money_id2=$me;
$arrp[20]=$price;
$product_tf1=1;
$product_tf2=2;




$sql="SELECT * FROM `product_name` WHERE user_id='$product_id'";
$result=mysql_query($sql);
$arrrname1=mysql_fetch_array($result);
$product_name1=$arrrname1[2];


$sql="SELECT * FROM `product_name` WHERE user_id='$product_id2'";
$result=mysql_query($sql);
$arrrname2=mysql_fetch_array($result);
$product_name2=$arrrname2[2];



$com1="Branch $transfer2n <br> $product_name1  <br> Transfer To <br> $product_name2 ";

$qty1="-$qty";






$sql = "INSERT INTO `buyproduct` (`user_id`, `money_id`, `supplier_id`, `supplier_name`, `product_id`, `product_name`, `qty`, `price`, `total`, `dat`, `mon`, `yer`, `adat`, `t4`, `m_type`, `m_id`, `p_type`, `p_id`, `user`, `commission`, `unit`, `final_price`, `money_id2`, `u_id2`, `model`, `brand`, `capacity`, `origion`, `branch_id`, `branch_using_id`, `comments`, `com1`, `product_tf`) VALUES ('','$money_id','$supplier','$suppliern','$product_id','$product_name1','$qty1','$arrp[20]','$total','$dat','$mon','$yer','$adate','$t4','$arrpm[1]','$arrpm[0]','$name[1]','$arrpt[0]','$u_namee','$arrp_new[19]','$arrp_new[22]','$final_price','$money_id2','$u_idd','$arrp_new[3]','$arrp_new[30]','$arrp_new[31]','$arrp_new[32]','$transfer2','$go_id_new','$comments','$com1','$product_tf1')";
mysql_query($sql);






$sql = "INSERT INTO `buyproduct` (`user_id`, `money_id`, `supplier_id`, `supplier_name`, `product_id`, `product_name`, `qty`, `price`, `total`, `dat`, `mon`, `yer`, `adat`, `t4`, `m_type`, `m_id`, `p_type`, `p_id`, `user`, `commission`, `unit`, `final_price`, `money_id2`, `u_id2`, `model`, `brand`, `capacity`, `origion`, `branch_id`, `branch_using_id`, `comments`, `com1`, `product_tf`) VALUES ('','$money_id','$supplier','$suppliern','$product_id2','$product_name2','$qty','$arrp[20]','$total','$dat','$mon','$yer','$adate','$t4','$arrpm[1]','$arrpm[0]','$name[1]','$arrpt[0]','$u_namee','$arrp_new[19]','$arrp_new[22]','$final_price','$money_id2','$u_idd','$arrp_new[3]','$arrp_new[30]','$arrp_new[31]','$arrp_new[32]','$transfer2','$go_id_new','$comments','$com1','$product_tf2')";
mysql_query($sql);




//print" $transfer2  -  $product_id  - $qty -  $product_id2 - $ser  - $price - $comments - $adate - $com1 -";

//print"ok";

include_once('s.php');
}
else
{
include_once('w5.php');
}







}











$idat=trim($_POST['idat']);
$imon=trim($_POST['imon']);
$iyer=trim($_POST['iyer']);







$ar='"';



print"

<html>

<head>
<title> Product To Transfer  </title>
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
 $( "#tags" ).autocomplete({
  source: 'p.php'

 });
});



$(function() 
{
 $( "#tags2" ).autocomplete({
  source: 'p2.php'

 });
});



</script>


  




<script language='javascript'>


function rneww()
{
document.fuu.product_id.value='';	
}


</script>






<?php

include_once('style.php');


print"
<style>
#tags2
{
width:465px;
height:25px;
}

#enter
{
width:200px;

}
</style>

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

<tr>
<td align='center' valign='top' width='220' bgcolor='#C5B991'>  

<table align='center' width='200' cellpadding='0' cellspacing='0' height=''>

<tr> <td height=''> </td></tr>




";


include_once('stock_left.php');


print"
</table>
</td>
";




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

<form name='fu' action='product_to_product.php' method='POST'> 


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


<tr> <td height='8'> </td> </tr>

<tr>

<td id='' width='150' bgcolor='' id='' align='left'>
<font size='2' face='arial' color='716E6E'> <b>&nbsp; Branch  </b> </font>

</td>

<td align='left'>

 :

";

print"
<select name='transfer2' id='new_sup1'>
<option value='$transfer2'> $transfer2n </option>
";


//$result = mysql_query("SELECT * FROM `customer`  ORDER BY `user_id` ASC  LIMIT 0 , 60000 ");

$result = mysql_query("SELECT * FROM `godawn_new`  ORDER BY `user_id` ASC ");



while ($a_row = mysql_fetch_row($result)) {

	foreach ($a_row as $field) {
		
	}
print"
	<option value='$a_row[0]'> $a_row[1] - Address - $a_row[2] </option>
";

}

print"
</select>
";


print"
</td>



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
<option name='2018'>2018</option>
<option name='2019'>2019</option>
<option name='2020'>2020</option>
<option name='2021'>2021</option>
<option name='2022'>2022</option>


</select>

&nbsp;&nbsp;&nbsp;&nbsp;


<font face='arial' size='3' color='#716E6E'> &nbsp;  Transfer No :  </font>  

 <input type='text' name='memo_no' value='$me' readonly size='15' id='txt2'>


";


?>



<?php


print"

</td>

<tr>

";


/*

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


*/







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


/*

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
*/




/*
print"
Contact Name: <input type='text' name='contact_name' value='$contact_name' size='15'>  

&nbsp;
 
Transport Name: <input type='text' name='transport_name' value='$transport_name' size='15'> 
</font> 
*/







print"

<tr>
<td height='4'> </td>
</tr>


<tr> 

<td width='left'> 
<font face='arial' size='2' color='716E6E'> 
&nbsp; <b> Product  </b> </font> </td>
<td width='left'> : 

<label for='tags'> </label>
<input type='text' id='tags' name='product_id' size='30' onblur='rnew()' onclick='rneww()'>
";

/*
print"
<font size='2' face='arial' color='716E6E'> Price: </font> <input type='text' name='price' size='10' id='txt2'> 
";
*/

print"
<font size='2' face='arial' color='716E6E'> Qty: </font> <input type='text' name='qty' size='4' id='txt2'> 
";

/*

if($set_discount==1)
{
print"
<font size='2' face='arial' color='716E6E'>  Commi : </font> <input type='text' name='less_new' size='4' id='txt2'> 
";
}
*/


print"


</td>
</tr>
";















print"

<tr>
<td height='4'> </td>
</tr>


<tr> 

<td width='left'> 
<font face='arial' size='2' color='716E6E'> 
&nbsp; <b> Transfer To Product  </b> </font> </td>
<td width='left'> : 

<label for='tags'> </label>
<input type='text' id='tags2' name='product_id2' size='30' onblur='rnew()' onclick='rneww()'>
";







print"
<input type='hidden' name='ser' value='1'>

<input type='hidden' name='ky' value='$kju'>

&nbsp;&nbsp;
<input type='submit' value='Enter to Save' id='enter'>  
 


</td>

</tr>


<tr>
<td height='4'> </td>
</tr>

<tr>
<td align='left'>
<font face='arial' size='2' color='716E6E'> 
&nbsp; <b> Comments  </b> </font
</td>

<td align='left'>
:
<textarea name='comments' rows='3' cols='30'></textarea>
</td>
</form>
</tr>

";









print"
<tr>
<td height='2'> </td>
</tr>

";

/*
print"
<tr> 
<td width='left'> 
<font face='arial' size='2' color='716E6E'> 
&nbsp; <b> Local Products </b> </font> </td>
<td width='left'> : <input type='text' name='p_des'  size='15' id='txt'>    &nbsp; 
</td>
</tr>
";
*/


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
";








print"
<table align='center' width='1000' cellpadding='0' cellspacing='0'>
<tr> <td height='20'> </td> </tr>
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