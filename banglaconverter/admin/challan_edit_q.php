<?php
include_once('dbconnection.php');
session_start();

/*
$result = mysql_query("SELECT * FROM salememo");
$num_rows = mysql_num_rows($result);
*/






$s45=trim($_POST['s45']);

if($s45=="")
{
$s45=(int)$_GET['s45'];
$temp=1;
}





$result = mysql_query("SELECT * FROM `salememo_challan_q` where user_id='$s45' ORDER BY `user_id` ASC ");	

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
	
	
	
	$mobiles=$a_row[18];
	$address=$a_row[36];
	$new_customer=$a_row[3];
	
	
	$new_mobile=$a_row[18];
	$new_address=$a_row[36];
	$new_customer=$a_row[3];
	
	
	

	
    $sales_order=$a_row[33];
	$contact_name=$a_row[35];
	$transport_name=$a_row[34];
	$comments=$a_row[14];
	
	
	
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




if($ser=="" && $temp!=1)
{
	
	//print"ok ok ";
	
	
unset($_SESSION['cart']);
unset($_SESSION['cart_price']);
unset($_SESSION['cart_unit']);
unset($_SESSION['cart_com']);
unset($_SESSION['cart_re']);
unset($_SESSION['cart_local']);





	

$result = mysql_query("SELECT * FROM `saleproduct_challan_q` where money_id='$invoice_no' ORDER BY `user_id` ASC ");	

while ($a_row = mysql_fetch_row($result)) {

	foreach ($a_row as $field) {
		
	}
	
	
	
	$product_id=$a_row[4];
	$qty=$a_row[6];
	$price=$a_row[7];
	$unit=$a_row[29];
	$com=$a_row[25];
	$re=$a_row[32];
	$p_des=$a_row[32];
	
	
	

	
	
	
       $_SESSION['cart'][$product_id]=$_SESSION['cart'][$product_id]+$qty;
	   $_SESSION['cart_price'][$product_id]=$_SESSION['cart_price'][$product_id]+$price;
       $_SESSION['cart_unit'][$product_id]=$_SESSION['cart_unit'][$product_id]+$unit;
	   $_SESSION['cart_com'][$product_id]=$_SESSION['cart_com'][$product_id]+$com;
	   $_SESSION['cart_re'][$product_id]=$_SESSION['cart_re'][$product_id]+$re;
	   $_SESSION['cart_local'][$product_id]=$_SESSION['cart_local'][$product_id]=$p_des;
	   
       $sql= "UPDATE  `product_name` SET `p_des`='$re' WHERE `user_id`='$product_id'";
       mysql_query($sql);
						
						
}








	
}











if($ser=="")
{
$ser=(int)$_GET['ser'];	
}



if($ser>0)
	
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




if($ser==5)
{
$less=trim($_POST['less']);
$payment=trim($_POST['payment']);
}



if($ser!="")
{

$supplier=trim($_POST['supplier']);
$transport_name=trim($_POST['transport_name']);
$contact_name=trim($_POST['contact_name']);
$sales_order=trim($_POST['sales_order']);
$comments=trim($_POST['comments']);


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

if($sales_order=="")
{
$sales_order=$_GET['sales_order'];	
}


if($comments=="")
{
$comments=$_GET['comments'];	
}




}






$payment_mode=trim($_POST['payment_mode']);
$paymenttype=trim($_POST['paymenttype']);
$less_new=trim($_POST['less_new']);
$check_no=trim($_POST['check_no']);
$check_amount=trim($_POST['check_amount']);






$transport_name=str_replace("'","`","$transport_name");
$contact_name=str_replace("'","`","$contact_name");
$sales_order=str_replace("'","`","$sales_order");
$comments=str_replace("'","`","$comments");










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
$comments=str_replace("@","#","$comments");



$dat=$_GET['dat'];
$mon=$_GET['mon'];
$yer=$_GET['yer'];

$mdate="$yer$mon$dat";



}


if($ser==1)
{

$a=0;




$product=trim($_POST['product']);

//$p_des=trim($_POST['p_des']);
//$p_des=str_replace("'","`","$p_des");


$p_des=trim($_POST['p_des']);


$inn='\"';
$inn2='"';

$p_des=str_replace("$inn","$inn2","$p_des");

$p_des=str_replace("'","`","$p_des");




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


//print"$dat - $mon - $yer";

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
<title> Quatation Edit </title>
<meta http-equiv='content-type' content='text/html;charset=utf-8' />

<base target='_parent' /> 
";

//<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
?>














<script type="text/javascript" src="jscripts/tiny_mce/tiny_mce.js"></script>

<script type="text/javascript">
	tinyMCE.init({
		// General options
		mode : "textareas",
		theme : "advanced",
		plugins : "openmanager,autolink,lists,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,wordcount,advlist,autosave,visualblocks",

		// Theme options
		theme_advanced_buttons1 : "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,styleselect,formatselect,fontselect,fontsizeselect",
		theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
		theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",
		theme_advanced_buttons4 : "insertlayer,moveforward,movebackward,absolute,|,styleprops,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,pagebreak,restoredraft,visualblocks,|,openmanager",
		theme_advanced_toolbar_location : "top",
		theme_advanced_toolbar_align : "left",
		theme_advanced_statusbar_location : "bottom",
		theme_advanced_resizing : true,
		
		//Open Manager Options
		file_browser_callback: "openmanager",
		//open_manager_upload_path: '../../../picture123/',

		open_manager_upload_path: '../../../../picture123/',

		// Example content CSS (should be your site CSS)
		content_css : "css/content.css",

		// Drop lists for link/image/media/template dialogs
		template_external_list_url : "lists/template_list.js",
		external_link_list_url : "lists/link_list.js",
		external_image_list_url : "lists/image_list.js",
		media_external_list_url : "lists/media_list.js",

		// Style formats
		style_formats : [
			{title : 'Bold text', inline : 'b'},
			{title : 'Red text', inline : 'span', styles : {color : '#ff0000'}},
			{title : 'Red header', block : 'h1', styles : {color : '#ff0000'}},
			{title : 'Example 1', inline : 'span', classes : 'example1'},
			{title : 'Example 2', inline : 'span', classes : 'example2'},
			{title : 'Table styles'},
			{title : 'Table row 1', selector : 'tr', classes : 'tablerow1'}
		],

		// Replace values for the template plugin
		template_replace_values : {
			username : "Some User",
			staffid : "991234"
		}
	});
</script>

















  <link rel="stylesheet" href="jquery-ui-themes-1.11.4/themes/smoothness/jquery-ui.css">
  
  <script src="jquery-1.10.2.js"></script>
  <script src="jquery-ui.js"></script>
  
  
  
  
  <script>
  
  var availableTags;
  
  var saletags;
  
  var stooo;
  



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

$cqz='"';
$a_row[31]= mb_ereg_replace("$cqz","*", $a_row[31]);
$a_row[30]= mb_ereg_replace("$cqz","*", $a_row[30]);



print"
${ar}$cq -  $cq10 - $a_row[31] - $a_row[30]- (P_Value $a_row[4])=$a_row[0]$ar, 
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


<tr> <td height='30' width='200' bgcolor='green'>   <span id='child'> <b> <font color='white'> Quotation </font> </b> </span>  </td></tr>
<tr> <td height='7'> </td></tr>


";


include_once('quotation_left.php');


print"



<td align='center' valign='top' width='980' bgcolor='#F2F2F2'>  



	



<table align='center' width='200' cellpadding='0' cellspacing='0' bgcolor='F2F2F2'>
<tr> <td height='10' align='center' >   </td> </tr>
<tr> <td height='40' align='center' id='saa'>  <b> Quotation Edit </b> </td> </tr>
</table>


<table align='center' width='900' cellpadding='0' cellspacing='0' bgcolor='F2F2F2'>

<tr> <td height='20'> </td> </tr>

<tr> 

<td width='900' bgcolor='' align='center' valign='top' height='900'>

<table align='center' width='900' cellpadding='0' cellspacing='0'>


<tr> 

<form name='fuu' action='challan_edit_q.php' method='POST'> 


<td height='0'> </td> </tr>




";



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

<tr>
<td align='left'>
<font face='arial' size='2' color='black'>
<b>
Date
</b>
</font>
</td>

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
";





print"

<tr> <td height='5'> </td> </tr>



<tr> 
<td align='left'> <font face='arial' size='2'> 

";



print"

<font face='arial' size='2' color='black'>
<b>
Quotation  No
</b>
</font>



</td>

<td align='left'>
:
<input type='text' name='memo_no' value='$me' id='txt_c' readonly size='15'> 
";

/*

&nbsp;
<font size='2' face='arial' color='716E6E'> Sale Rate : </font> <input type='text' name='sale_price' readonly size='5'> 


&nbsp;
<font size='2' face='arial' color='716E6E'> Stock : </font> <input type='text' name='sale_stock' readonly size='5'> 

*/

print"

</font> </td>

</tr>
";



print"

<tr> <td height='5'> </td> </tr>



<tr> 

<td  width='150' align='left'>
<font size='2' face='arial' color='black'> <b> Customer Name </b> </font>
</td>
<td width='750' align='left'>
";



print"

:

<select name='supplier' id='text_d'>
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

</td>
</tr>
";




print"

<tr>
<td height='5'> </td>
</tr>


<tr> 
<td align='left'> <font face='arial' size='2' color='black'> 
 <b> Address </b>
 
</td>

<td align='left'>


:  <input type='text' id='text_d' name='new_address' value='$address'  size='35'> 
	
</font> </td>

</tr>



<tr>
<td height='5'> </td>
</tr>
";



print"
<tr> 
<td align='left'> <font face='arial' size='2' color='black'> 
<b> Mobile </b>
</font>
</td>

<td align='left'>


: <input type='text' name='new_mobile' value='$mobiles' id='text_d' size='15'> 
 
	
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








/*
print"
<tr>
<td height='5'> </td>
</tr>








<tr> 
<td align='left'> <font face='arial' size='2'> 
Contact Name

</td>

<td align='left'>
:
<input type='text' name='contact_name' value='$contact_name' id='txt' size='15'>  

&nbsp;
 
</font> </td>

</tr>
";
*/




print"

<tr>
<td height='5'> </td>
</tr>




<tr> 
<td width='' align='left'> 
<font size='2' face='arial' color='black'> <b> Product </b> </font> 
</td>
<td align='left'>
:

<label for='tags'> </label>
<input type='text' id='tags' name='product_id' size='30' onblur='rnew()' onclick='rneww()'>

<font size='2' face='arial' color='black'> <b> Price : </b> </font> <input type='text' id='tx4' name='price' size='10'> 

<font size='2' face='arial' color='black'> <b> Qty : </b> </font> <input type='text' id='tx4' name='qty' size='4'> 
";

/*
print"
<font size='2' face='arial' color='black'> Comission: </font> <input type='text' name='less_new' size='4'> 

";
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
<input type='hidden' name='s45' value='$s45'>

&nbsp;&nbsp;&nbsp;&nbsp;

<input type='hidden' name='comments' value='$comments'>
<input type='submit' value='Enter' id='enter'>


</td>


</tr>

<tr>
<td height='8'> </td>
</tr>




<tr> 
<td width='' align='left'> 
<font size='2' face='arial' color='black'> <b>  Remarks </b> </font>
</td>
<td align='left'>
:
<input type='text' id='text_d' name='p_des' size='35'> 
</td>

</form>
 </tr>

</table>







<br>


<table align='center' width='890' cellpadding='3' cellspacing='1' bgcolor='E4DBDB'>

<tr bgcolor='FAFAFA'>
 <td height='25' bgcolor='' width='100' align='center'> <font face='arial' color='716E6E' size='2'> <b>  Remove  </b> </font> </td>
 <td height='25' bgcolor='' width='250' align='left'> <font face='arial' color='716E6E' size='2'>  <b> Product name </b> </font> </td>
 <td height='25' bgcolor='' width='100' align='center'> <font face='arial' color='716E6E' size='2'> <b> Unit  </b></font> </td>
 <td height='25' bgcolor='' width='50' align='center'> <font face='arial' color='716E6E' size='2'> <b> Rate  </b></font> </td>
 <td height='25' bgcolor='' width='50' align='left'> <font face='arial' color='716E6E' size='2'>  <b> Remarks </b> </font> </td>
 
 
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
$contact_name1=str_replace("#","@","$contact_name");
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






foreach($_SESSION['cart'] as $product_id => $quantity)
{

$sew++;
$sql="SELECT * FROM `product_name` WHERE user_id='$product_id' ";


$result=mysql_query($sql);
$arrp_new=mysql_fetch_array($result);



$arrp[21]=$price_a[$sew];
$arrp[19]=$com_a[$sew];
$arrp[29]=$local_a[$sew];




$total=$arrp[21]*$quantity;
$total3=$total;

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
 <td height='30'  width='100' align='center' bgcolor=''> <a href=\"challan_edit_q.php?action=remove&i1d=$arrp_new[0]&s45=$s45&dat=$dat&mon=$mon&yer=$yer&ser=$ser&supplier=$supplier&contact_name=$contact_name1&transport_name=$transport_name1&sales_order=$sales_order1&comments=$comments1&new_customer=$new_customer&new_mobile=$new_mobile&new_address=$new_address\">  <img src='picture/remove.gif'> </a> $sew </td>
 <td height='30' bgcolor='' width='250' align='left'> <font face='arial' color='716E6E' size='2'>  $arrp_new[2] $name_old[1] </font> </td>
 
 <td height='30' bgcolor='' width='100' align='center'> <font face='arial' color='716E6E' size='2'> $arrp_new[22]   </font> </td>
 <td height='30' bgcolor='' width='50' align='center'> <font face='arial' color='716E6E' size='2'> $arrp[21] </font> </td>
 <td height='30' bgcolor='' width='150' align='left'> <font face='arial' color='716E6E' size='2'>  $arrp[29] </font> </td>
 
 
 
 
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

if($ser==5)
{
$less=trim($_POST['less']);
$discount_less=trim($_POST['discount_less']);
}

$subtotal_last=$subtotal-$discount_less;




//$sdq1=($discount*$subtotal);


$stotal=$subtotal_last+$less;






$tax=0.00;


/*
$due=$stotal-$payment;
*/

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







print"
<table align='center' width='880' cellpadding='0' cellspacing='0'>
<tr> 
<td width='400' bgcolor='' align='center' valign='top'> 






<table align='center' width='890' cellpadding='0' cellspacing='0' bgcolor='F2F2F2'>
<tr>
<form action='salememo_challan_q.php' method='POST' target='_blank'>
<td align='left'>
<font face='arial' size='2' color='black'> <b> Terms & Condition :  </b> </font>
<textarea name='comments' id='nn' rows='10' cols='108'>$comments</textarea>
</td>
</tr>
</table>






<table align='center' width='890' cellpadding='0' cellspacing='0' bgcolor='F2F2F2'>
<tr>
<td align='right'> 

<br> 
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
<input type='hidden' name='due' value='$due'>

<input type='hidden' name='payment_mode' value='$payment_mode'>


<input type='hidden' name='discount_less' value='$discount_less'>

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

//if($subtotal>0)
//{
	print"
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


print"
</tr>


</table>


";






















print"






</body>

</html>


";


?>