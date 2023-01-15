<?php
include_once('dbconnection.php');
session_start();

/*
$result = mysql_query("SELECT * FROM salememo");
$num_rows = mysql_num_rows($result);
*/




$id_sus=$_GET['id_sus'];
$sus_m=$_GET['sus_m'];


if($sus_m=="")
{
$sus_m=trim($_POST['sus_m']);
}

if($id_sus=="")
{
$id_sus=trim($_POST['id_sus']);	
}

$rty=0;

$other=trim($_POST['other']);

$id=trim($_POST['tags']);

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


$rty=0;
$rkk=0;













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




$result = mysql_query("SELECT * FROM `salememo` where tf!='1'  ORDER BY `money_id` DESC  LIMIT 0 , 1 ");

while ($a_row = mysql_fetch_row($result)) {

	foreach ($a_row as $field) {
		
	}

$num=$a_row[1];

}



$me=$num;
$me=$me+1;



//$me=100;

//$me= time().$u_idd;


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


$bbb=time(); 
$d=date("m/d/y",$bbb); 
$mon="$d[0]$d[1]";
$dat="$d[3]$d[4]";
$yer="20$d[6]$d[7]";

$mdate="$yer$mon$dat";



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


unset($_SESSION['cart_unique']);
unset($_SESSION['cart_go']);


unset($_SESSION['cart']);
unset($_SESSION['cart_price']);
unset($_SESSION['cart_unit']);
unset($_SESSION['cart_com']);
unset($_SESSION['cart_local']);
unset($_SESSION['cart_wa']);
unset($_SESSION['cart_other']);


	
}







if($id_sus>0 && $sus_m!="")
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


$result = mysql_query("SELECT * FROM `saleproduct_order` where money_id='$sus_m' ORDER BY `user_id` ASC ");	

while ($a_row = mysql_fetch_row($result)) {

	foreach ($a_row as $field) {
		
	}
	

	
	$product_id=$a_row[4];
	$qty=$a_row[6];
	$price=$a_row[7];
	$unit=$a_row[29];
	
    $supplier=$a_row[2];
    $id_supplier="$a_row[3]=$supplier";


          $go_g=$a_row[42];
	
	  $product_id_unique= time().$a_row[0]; 




               $_SESSION['cart_unique'][$product_id_unique]=$_SESSION['cart_unique'][$product_id_unique]+$qty;
               $_SESSION['cart_go'][$product_id_unique]=$_SESSION['cart_go'][$product_id_unique]=$go_g;
               $_SESSION['cart'][$product_id_unique]=$_SESSION['cart'][$product_id_unique]=$product_id;



	       $_SESSION['cart_price'][$product_id_unique]=$_SESSION['cart_price'][$product_id_unique]=$price;
               $_SESSION['cart_unit'][$product_id_unique]=$_SESSION['cart_unit'][$product_id_unique]+$unit;
	       $_SESSION['cart_com'][$product_id_unique]=$_SESSION['cart_com'][$product_id_unique]=$less_new;
	       $_SESSION['cart_local'][$product_id_unique]=$_SESSION['cart_local'][$product_id_unique]=$p_des;

}

	
	
	
}











if($walk>0)
{
if($ser=="" && $supplier=="")
{
$id_supplier="Walk In Customer=$walk";	
}
}










if($ser!="")
{
$_SESSION['pkk']="$supplier";
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
$qty=1;
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

                        $_SESSION['cart'][$product_id_unique]=$_SESSION['cart'][$product_id_unique]=$product_id;

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


$adate="$yer$mon$dat";




$ps=$_SESSION['color'];


//if($ser!="")
//{
foreach($_SESSION['cart'] as $product_id => $quantity)
{

$e++;

 
}

//}










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

?>





  <link rel="stylesheet" href="jquery-ui-themes-1.11.4/themes/smoothness/jquery-ui.css">
  
  
  
  <script src="jquery-1.10.2.js"></script>
  <script src="jquery-ui.js"></script>
  
 
<script type="text/javascript">


$(function() 
{
 $( "#supplier" ).autocomplete({
  source: 'new.php'

 });
});




$(function() 
{
 $( "#tags" ).autocomplete({
  source: 'p.php'

 });
});








function ck1()
{
var tags_txt=$('#tags').val();

if($.trim(tags_txt)!='')
{
$.ajax ({
url:"new3_tags.php",
method:"POST",
data:{tags:tags_txt},
dataType:"text",
success:function(data)
{
document.fuu.sale_stock.value=data;


 var str = document.fuu.sale_stock.value; 
 var res = str.split(" ");
 var len=res.length;
 var tags_txt5;



var g=0;
var mj=0;

for(g=0;g<=len;g++)
{
if(res[g]=="Rate")
{
mj=g+1;
document.fuu.price.value=res[mj];

}
}






}

});



//$('#tttt').load("new3_tags.php").fadeIn("slow");
}

}















function faka1()
{
document.fuu.supplier.value='';
}


function faka()
{
document.fuu.tags.value='';
}




function pp()
{
document.f.submit();
}


function sus()
{
document.fk.submit();
}

<?php
if($auto_payment==1)
{
print"
function onk()
{
document.fuu.tags.focus();
chc();
mj();
}
";
}
else
{
print"
function onk()
{
document.fuu.tags.focus();
mj();
}
";
	
}
?>

function mj()
{

$( "#tags" ).keypress(function( event ) {
  if ( event.which == 37) {
      pp();
  }
});

}

function onh()
{
document.fuu.tags.focus();

$( "#tags" ).keypress(function( event ) {
  if ( event.which == 37 ) {
    alert('please add product');
  }
});


}


function chc()
{

var cx1;
var ti;
var tii;

var nt;


ti=document.f.discount_lessp.value;


nt=document.f.less.value;



if(document.f.discount_lessp.value>0)
{
tii=document.f.subtotal.value*ti;
document.f.discount_less.value=tii/100;
}




document.f.stotal1.value=document.f.subtotal.value - document.f.discount_less.value;



if(document.f.less.value>0)
{
document.f.stotal1.value=parseFloat(document.f.stotal1.value)+parseFloat(document.f.less.value);
}



cx1=document.f.stotal1.value*document.f.vat.value;
cx1=cx1/100;

document.f.vat_tk.value=cx1;

if(cx1>0)
{
document.f.stotal.value=parseFloat(document.f.stotal1.value)+parseFloat(cx1);
}
else
{
document.f.stotal.value=document.f.stotal1.value;
}

var lj=document.f.service.value;
if(lj>0)
{
document.f.stotal.value=parseFloat(document.f.stotal.value)+parseFloat(document.f.service.value);
}


document.f.payment.value=document.f.stotal.value;

document.f.due.value=document.f.stotal.value-document.f.payment.value;

	
}
















function cpp()
{

document.f.payment.value=document.f.payment.value;
document.f.due.value=document.f.stotal.value-document.f.payment.value;
st();
if(document.f.due.value>0)
{

}





}




</script>


<?php


include_once('style.php');


print"

<style>

#tags
{
width:200px;
height:30px;
}


#gd
{
width:100px;
height:26px;
}


#y1
{
width:42px;
}

#y2
{
width:42px;
}

#y3
{
width:60px;
}

#cuss
{
width:153px;
height:23px;
}


</style>


</head>
";


if($ser!="" || $id_sus>0)
{
print"
<body onload='onk()'>
";
}
else
{
print"
<body onload='onh()'>
";
}


//include_once('header2.php');



print"
<table align='center' width='1205' cellpadding='0' cellspacing='0' height='0' bgcolor='#A1BBD7'>
<tr bgcolor=''> 
<td align='left' height='25'> <font size='2'> <b>  &nbsp;&nbsp; <a href='create.php'> <b> Home </b> </a> 

&nbsp; | &nbsp; <a href='sales_return.php'> <b> Sales Return </b>  </a>

&nbsp; | &nbsp; <a href='sales.php'> <b> Sales </b> </a>  | </font>

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;


<font face='arial' size='5'> Sales Invoice </font>
</td>
";
if($suspension==1)
{
print"
<td>
      <ul id='menutop' class='menutop'>
        <li><a href='#'> <font color='white' size='3'> Pending Lists  </font> </a>
          <ul class='sub-menutop'>
		 "; 

$act=0;
$bbb=time(); 
$dd=date("m/d/y",$bbb); 
$mon_n="$dd[0]$dd[1]";
$dat_n="$dd[3]$dd[4]";
$yer_n="20$dd[6]$dd[7]";

$mdate_new="$yer_n$mon_n$dat_n";
$ndate_new="$yer_n$mon_n$dat_n";


		 
$result = mysql_query("SELECT * FROM `salememo_order` where adat>='$mdate_new' && adat<='$ndate_new'  && confirm='$act' ORDER BY `user_id` DESC ");
while ($a_row = mysql_fetch_row($result)) {

	foreach ($a_row as $field) {
		
	}
	
	$t55=$a_row[5]+$a_row[26];

	
print"
<li> 
<a href=\"sales.php?id_sus=$a_row[0]&sus_m=$a_row[1]\"> <font color='white' size='2'> $a_row[3]  Total  - $t55 </font> </a>
</li>		  
"; 
	
	}
 
		 





print"
          </ul>
        </li>
      </ul>


 </td>
 ";
}

print"
</tr>
</table>
";


print"
<table align='center' width='1200' cellpadding='0' cellspacing='1' height='800' bgcolor='gray'>
<tr bgcolor='white'> 
";

print"
<td align='center' valign='top' width='900' bgcolor='F2F2F2'>  

<table align='center' width='900' cellpadding='0' cellspacing='0' bgcolor='F2F2F2'>

<tr> <td height='10'> </td> </tr>

<tr> 

<td width='900' bgcolor='' align='center' valign='top' height='900'>

<table align='center' width='900' cellpadding='0' cellspacing='0'>


<tr> 

<form name='fuu' action='sales.php' method='POST'> 

<td height='0'> </td> </tr>
";












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













print"
<tr> <td height='8'> </td> </tr>
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
&nbsp;&nbsp;

<b> PO NO : </b> </font> 


<input type='text' name='sales_order' value='$sales_order'  size='10'>

&nbsp;

<b> Stock : </b>

<input type='text' name='sale_stock' value=''  size='40'>


";



/*
<font face='arial' size='2' color='black'> 
<b> DCL NO : </b> </font> 

<input type='text' name='dcl' value='$dcl'  size='10'>

&nbsp;


<font face='arial' size='2' color='black'> 
<b> TIN NO : </b> </font> 


<input type='text' name='tin' value='$tin'  size='10'>

";
*/


?>




<?php

print"

</td>

<tr>

";

























print"

<tr> <td height='8'> </td> </tr>

<tr>
<td width='0' align='left'> <font size='2' face='arial' color='black'> <b> &nbsp; Customer Name  </b> </font> </td>
<td align='left'> 
";






print"
:
<span class='ui-widget'>
  <input type='text' id='supplier' name='supplier' value='$id_supplier' onclick='faka1()'>
";



?>



<?php

print"


<font size='2' face='arial' color='black'> <b> &nbsp; Address  </b> </font>

: <input type='text' name='new_address'  value='$addresss'    size='8'>
";




print"

<font size='2' face='arial' color='black'> <b> &nbsp; Mobile  </b> </font>
: <input type='text' name='new_mobile'  value='$mobiles'  size='8'>



<font face='arial' size='2' color='red'> Due ($balance) </font>

";

print"
</td>

<tr>

";







/*
print"

<tr> <td height='8'> </td> </tr>

<tr>
<td width='0' align='left'> <font size='2' face='arial' color='black'> <b> &nbsp; Address  </b> </font> </td>
<td align='left'> 
";




print"
: <input type='text' name='new_address'  value='$addresss'    size='35'>
";

*/
?>



<?php


print"

</td>

<tr>

";










/*
print"

<tr> <td height='8'> </td> </tr>
<tr>
<td width='0' align='left'> <font size='2' face='arial' color='black'> <b> &nbsp; Mobile  </b> </font> </td>
<td align='left'> 
";

print"
: <input type='text' name='new_mobile'  value='$mobiles'  size='35'>

<font size='2' face='arial' color='black'> <b> P_Rate : </b> </font> <input type='text' name='sale_price1' id='pr2' readonly size='2'> 
<font size='2' face='arial' color='black'> <b> Box : </b> </font> <input type='text' name='boxq' id='pr2' readonly size='3'> 
<font size='2' face='arial' color='black'> <b> Rate : </b> </font> <input type='text' name='sale_price' id='pr2' readonly size='3'> 

&nbsp;
<font size='2' face='arial' color='black'> <b> Stock : </b> </font> <input type='text' name='sale_stock' id='pr2' readonly size='3'> 
</font> 




";
print"
</td>
<tr>
";

*/



print"
<tr>
<td height='8'> </td>
</tr>
";





print"
<tr> 

<td width='left'> 
<font face='arial' size='2' color='black'> 
&nbsp; <b> Product </b> </font> </td>
<td width='left'> : 
";

/*
<label for='tags'> </label>
<input type='text' id='tags' name='product_id' size='30' onblur='rnew()' onclick='rneww()'>
*/



print"
<span class='ui-widget'>
  <input type='text' id='tags' name='tags'  onclick='faka()' onblur='ck1()'>
</span>
";


if($other_set==1)
{
print"
<font size='2' face='arial' color='black'> <b>  </b> </font> <input type='text' name='other' size='3' id='txx_b_other'> 
";

}

print"
<font size='2' face='arial' color='black'> <b> Price : </b> </font> <input type='text' name='price' size='3' id='txx_b'> 
";


if($box_set==1)
{
print"
<font size='2' face='arial' color='black'>  <b> Box : </b></font> <input type='text' name='box' size='3' id='txx_b'> 
";
}

print"
<font size='2' face='arial' color='black'>  <b> Qty : <b> </font> <input type='text' name='qty' size='3' id='txx_q'> 
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


if($set_wa==1)
{
print"
<font size='2' face='arial' color='black'>  Warranty : </font> <input type='text' name='wa' size='4' id='txx'> 
";
}

if($set_discount==1)
{
print"
<font size='2' face='arial' color='black'>  Dis : </font> <input type='text' name='less_new' size='4' id='txx'> 
";
}


print"




<input type='hidden' name='ser' value='1'>

<input type='hidden' name='sk' value='1'>

<input type='hidden' name='id_sus' value='$id_sus'>




<input type='hidden' name='ky' value='$kju'>

&nbsp; 


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
<font face='arial' size='2' color='black'> 
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
 <td height='25' bgcolor='' width='100' align='center'> <font face='arial' color='black' size='2'> <b> Discount </b> </font> </td>
 ";
 
}
 
 
print"
 
 <td height='25' bgcolor='' width='100' align='center'> <font face='arial' color='black' size='2'>  <b> Total </b> </font> </td>
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


/*

  $_SESSION['cart_price'][$product_id]=$_SESSION['cart_price'][$product_id]+$price;
  $_SESSION['cart_unit'][$product_id]=$_SESSION['cart_unit'][$product_id]+$unit;
  $_SESSION['cart_com'][$product_id]=$_SESSION['cart_com'][$product_id]+$com;
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

foreach($_SESSION['cart_wa'] as $product_id_unique => $wa)
{
$qeu++;
$local_wa[$qeu]=$wa;
}


$qeu=0;

foreach($_SESSION['cart_other'] as $product_id_unique => $wa_other)
{
$qeu++;
$local_other[$qeu]=$wa_other;
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


$qv=$qv+$quantity;



print"
<tr bgcolor='FFFFFF'>
 <td height='30'  width='100' align='center' bgcolor=''> <a href=\"sales.php?action=remove&i1d=$product_id_unique&sup=$id_supplier&dat=$dat&mon=$mon&yer=$yer&contact_name=$contact_name11&contact_name1=$contact_name111&transport_name=$transport_name1&sales_order=$sales_order1&project_name=$project_name&new_customer=$new_customer&new_mobile=$new_mobile&new_address=$new_address&ser=$ser&dcl=$dcl&tin=$tin&id_sus=$id_sus\">  <img src='picture/remove.gif'> </a> $sew </td>
 ";



 
 print"
 <td height='30' bgcolor='' width='250' align='left'> <font face='arial' color='black' size='2'> &nbsp;

 
 ";
 

 print"
 $arrp_new[2]   
";

if($go_show==1)
{
print"
($go_other[$qg])
";
}


print"
$local_other[$sew]

";




print"
$arrp[29] 	
"; 
 


print"
 $name_old[1] </font> </td>
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
 <td height='30' bgcolor='' width='50' align='center'> <font face='arial' color='black' size='2'> $quantity </font> </td>


 <td height='30' bgcolor='' width='' align='center'> <font face='arial' color='black' size='2'> $arrp_new[22] </font> </td>





 ";
 
if($set_wa==1)
{	
print"
 <td height='25' bgcolor='' width='' align='center'> <font face='arial' color='black' size='2'> $local_wa[$sew] </font> </td>
";
}

$arow8= number_format($arrp[21], 2);


print"
 
 <td height='30' bgcolor='' width='' align='center'> <font face='arial' color='black' size='2'> $arow8 </font> </td>
 
 

 
 ";
 
 /*
 print"
 <td height='30' bgcolor='' width='100' align='center'> <font face='arial' color='black' size='2'> $total3 </font> </td>
 ";
*/

if($set_discount==1)
{
 
 if($f_p[$f_u]=='%')
 {
print"
 <td height='30' bgcolor='' width='100' align='left'> <font face='arial' color='black' size='2'> $f_pp % = $arrp[19] </font> </td>
";

 }
 else
 {
print"
 <td height='30' bgcolor='' width='100' align='left'> <font face='arial' color='black' size='2'> $arrp[19] </font> </td>
";
	 
 }


} 


$total_f= number_format($total, 2);

	 
print" 
<td height='30' bgcolor='' width='100' align='center'> <font face='arial' color='black' size='2'> $total_f </font> </td>
</tr>
";





$total7=$total7+$total3;
$lesst=$lesst+$arrp[19];



}





}





print"


<tr bgcolor='FFFFFF'>
 <td height='30'  width='100' align='center' bgcolor=''>  </td>
 <td height='30' bgcolor='' width='250' align='center'> <font face='arial' color='black' size='2'>  </font> </td>
";


if($cwp1==1)
{
print"
<td> </td>
";
}


if($cwp2==1)
{
print"
<td> </td>
";
}


if($cwp3==1)
{
print"
<td>  </td>
";
}


if($cwp4==1)
{
print"
<td>  </td>
";
}


print"
 <td height='30' bgcolor='' width='100' align='center'> <font face='arial' color='black' size='2'> $qv  </font> </td>
 


 <td> </td>

 ";

if($set_wa==1)
{	
print"
 <td> </td>
";
}


print"
 <td height='30' bgcolor='' width='50' align='center'> <font face='arial' color='black' size='2'>  </font> </td>
";

/*
print"
 <td height='30' bgcolor='' width='100' align='center'> <font face='arial' color='black' size='2'> $total7 </font> </td>
 ";
 */
 
 
 
 if($set_discount==1)
{
	print"
 <td height='30' bgcolor='' width='100' align='left'> <font face='arial' color='black' size='2'> $lesst </font> </td>
 ";
}


print"
 
 
 <td height='30' bgcolor='' width='100' align='center'> <font face='arial' color='black' size='2'> $sub_total </font> </td>
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


$due=$stotal2-$payment;


$due=$due-$adjust;






print"
</table>
";







print"
<table align='center' width='' cellpadding='0' cellspacing='0'>
<tr> <td height='10'> </td> </tr>
</table>
";






$pui=$balance+$stotal2;

$new_pui=$pui-$payment;




if($suspension==1)
{
print"
<br>
<br>
<br>

<table align='center' width='600' cellpadding='0' cellspacing='0'>
<tr> 
<form name='fk' action='salememo_order.php' method='POST' target='_blank'>
<td align='center'> 

<input type='hidden' name='memo_no' value='$me'>

<input type='hidden' name='my' value='100'>


<input type='hidden' name='supplier' value='$supplier'>
<input type='hidden' name='sales_order' value='$sales_order'  size='10'>
";

/*
<input type='button' id='pr3' value='Pending' onclick='sus()'>
*/

print"
</td>
</form>
</tr>

</table>
";

}








print"
</td>
";








print"
<td width='1' bgcolor='#D1D1D1'> .</td>

<td width='300' bgcolor='' valign='top'> 



<table align='center' width='300' cellpadding='0' cellspacing='0'>
<tr> 
<td align='center' height='40' bgcolor='#DDDDDD'> 
";
?>

<a href="#"  onclick="window.open('customer_new.php','name','width=600,height=400,toolbar=no,location=no,directories=no,status=no,menubar=no, scrollbars=no, left=300,top=140,resizable=no, copyhistory=no,titlebar=no')"> <font size='3' color='black'> <b>  New Customer </b> </font>  </a>

|

<a href="#"  onclick="window.open('product_entry.php','name','width=700,height=520,toolbar=no,location=no,directories=no,status=no,menubar=no, scrollbars=no, left=300,top=140,resizable=no, copyhistory=no,titlebar=no')"> <font color='black' size='3'> <b> New Product </b> </font> </a>



<?php
print"

</td> 
</tr>

</table>

<table align='center' width='300' cellpadding='4' cellspacing='0'>


<tr>
<td align='left' width='126'>

<form action='salememo.php' name='f' method='POST' target='_blank'>

<font face='arial' color='black' size='2'> <b>  Date </b> </font>

</td>

<td align='left' width='172'>
:
<select name='dat' id='y1'>
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

<select name='mon' id='y2'>
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

<select name='yer' id='y3'>
<option name='$yer'>$yer</option>

";

include_once('year.php');

print"

</select>
</td>
</tr>
";




print"
<tr>
<td align='left'> <font face='arial' color='black' size='2'> <b>  Sales Person   </b>  </font> 
</td>
<td align='left'>
:

";



print"	 
<select  name='contact_name'  id='cuss'>
";


if($sales_id==0)
{
print"
<option value='$contact_name'> $contact_namen </option>
";
}


if($sales_id!=0)
{

$result = mysql_query("SELECT * FROM `contact` where user_id='$sales_id'  ORDER BY `customer_name` ASC  LIMIT 0 , 1 ");
}
else
{
$result = mysql_query("SELECT * FROM `contact`  ORDER BY `customer_name` ASC  LIMIT 0 , 60000 ");

}


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
</td> 
</tr>
";




print"
</table>


<table align='center' width='295' cellpadding='0' cellspacing='0'>
<tr>
<td valign='top'>
<table align='center' width='295' cellpadding='1' cellspacing='0'>



<tr> <td height='1'> </td> </tr>
";

//if($supplier==$walk && $walk>0)
//{
print"
<tr> 
<td align='left' width='120'> 
<font face='arial' color='black' size='2'>  Name  </font> 
</td>
<td align='left' width='165'>
:

<input type='text' name='new_name' id='cuss'>
</td> 
</tr>


<tr> <td height='1'> </td> </tr>
";
print"
<tr> 
<td align='left' width='120'> 
<font face='arial' color='black' size='2'>  Mobile  </font> 
</td>
<td align='left' width='165'>
:

<input type='text' name='new_mobile' id='cuss'>
</td> 
</tr>


<tr> <td height='1'> </td> </tr>
";

print"
<tr> 
<td align='left' width='120'> 
<font face='arial' color='black' size='2'>  Address  </font> 
</td>
<td align='left' width='165'>
:

<input type='text' name='new_address' id='cuss'>
</td> 
</tr>


<tr> <td height='7'> </td> </tr>
";


//}

print"
<tr> 
<td align='left' width='120'> 
<font face='arial' color='black' size='2'>  Total  </font> 
</td>
<td align='left' width='165'>
:

<input type='text' name='subtotal' value='$stotal'  readonly  id='cuss' onblur='chc()' onkeyup='chc()'>
</td> 
</tr>


<tr> <td height='3'> </td> </tr>



<tr> 
<td align='left'> 
<font face='arial' color='black' size='2'>   Special Discount   </font> 
</td>
<td align='left'>
:

<input type='text' name='discount_lessp'  value='' id='cus3' size='2' onblur='chc()' onkeyup='chc()' >
%

<input type='text' name='discount_less'  value='' id='cus3' size='3' onblur='chc()' onkeyup='chc()'>
Tk.

</td> 
</tr>





<tr> <td height='3'> </td> </tr>





<tr> 
<td align='left'> 
<font face='arial' color='black' size='2'>    Carring Cost   </font> 
</td>
<td align='left'>
:
<input type='text' name='less'  id='cuss' onblur='chc()' onkeyup='chc()'> 

</td> 
</tr>




<tr> <td height='3'> </td> </tr>



<tr> 
<td align='left'> 
<font face='arial' color='black' size='2'>    Total   </font> 
</td>
<td align='left'>
:
<input type='text' name='stotal1' value='$stotal' readonly  id='cuss' onblur='chc()' onkeyup='chc()'>
</td> 
</tr>


<tr> <td height='3'> </td> </tr>


<tr> 
<td align='left'> 
<font face='arial' color='black' size='2'>    Vat  </font> 
</td>
<td align='left'>
:
<input type='text' name='vat'  id='cus3' size='3' onblur='chc()' onkeyup='chc()'> %

<input type='text' name='vat_tk'  id='cus3' size='3' onblur='chc()' onkeyup='chc()'>

 Tk.
 
</td> 
</tr>
";


if($set_in==1)
{
print"


<tr> <td height='3'> </td> </tr>

<tr> 
<td align='left'> 
<font face='arial' color='black' size='2'>    Installation Charge   </font> 
</td>
<td align='left'>
:
<input type='text' name='service'  id='cuss' onblur='chc()' onkeyup='chc()'> 

</td> 
</tr>




";
}
else
{
	print"
<tr> <td height='3'> <input type='hidden' name='service'> </td> </tr>
	";
}

print"


<tr> 
<td align='left'> 
<font face='arial' color='black' size='2'>    Subtotal   </font> 
</td>
<td align='left'>
:
<input type='text' name='stotal' value='$stotal' readonly  id='cuss' onblur='chc()' onkeyup='chc()'>
</td> 
</tr>



<tr> <td height='3'> </td> </tr>



<tr> 
<td align='left'> 
<font face='arial' color='black' size='2'> 

 Payment Mode    </font> 
</td>
<td align='left'>
:

<select name='payment_mode' id='cuss'>
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


<tr> <td height='3'> </td> </tr>


<tr> 
<td align='left'> 
<font face='arial' color='black' size='2'>    Payment   </font> 
</td>
<td align='left'>

:

<input type='text' name='payment'  value='$payment' id='cuss' onblur='cpp()' onkeyup='cpp()'>
</td> 
</tr>


<tr> <td height='6'> </td> </tr>



<tr> 
<td align='left'> 
<font face='arial' color='black' size='2'>   Due    </font> 
</td>
<td align='left'>
:

<input type='text' name='due'  value='$due'  readonly id='cuss' onblur='cpp()' onkeyup='cpp()'>
</td> 
</tr>



<tr> <td height='3'> </td> </tr>


";




print"
<tr> 
<td align='left' id='pl7'> 
<font face='arial' color='black' size='2'>   Cheque No    </font> 
</td>
<td align='left' id='pl8'>
:
<input type='text' name='check_no' id='cuss'> 
</td> 
</tr>


<tr> <td height='3' id='pl9'> </td> </tr>









<tr> 
<td align='left' id='pl7'> 
<font face='arial' color='black' size='2'>   Cheque Issu Date   </font> 
</td>
<td align='left' id='pl8'>
:




<select name='idat' id='y1'>
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

<select name='imon' id='y2'>
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

<select name='iyer' id='y3'>
<option name='$iyer'>$iyer</option>
";

include_once('year1.php');

print"

</select>

</td> 
</tr>


<tr> <td height='3' id='pl9'> </td> </tr>


<tr> 
<td align='left'> 
<font face='arial' color='black' size='2'>   Note   </font> 
</td>
<td align='left'>

:
<input type='text' name='comments'    id='cuss'  onblur='cpp()' onkeyup='cpp()'>
</td> 
</tr>



<tr> <td height='3'> </td> </tr>




<tr> 
<td align='center'> 



</td>
<td align='center'>

<input type='hidden' name='memo_no' value='$me'>
<input type='hidden' name='supplier' value='$supplier'>
<input type='hidden' name='sales_order' value='$sales_order'  size='10'>

<input type='hidden' name='id_sus' value='$id_sus'  size='10'>


&nbsp;
<input type='button' id='pr' value='Save & Print' onmouseover='cpp()' onclick='pp()'>
</td> 
</tr>



</table>
</td>

</form>
</tr>
<table>



</td>
";








print"
</tr>
</table>


</body>
</html>


";


?>