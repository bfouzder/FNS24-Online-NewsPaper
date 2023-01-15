<?php

include_once('dbconnection.php');




$ar='"';


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
$id_supplier=$_GET['supplier'];	

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







$ser=trim($_POST['ser']);
$s=trim($_POST['s']);


$dat1=trim($_POST['dat1']);
$mon1=trim($_POST['mon1']);
$yer1=trim($_POST['yer1']);


$memo_no=trim($_POST['memo_no']);



$dat2=trim($_POST['dat2']);
$mon2=trim($_POST['mon2']);
$yer2=trim($_POST['yer2']);









$mdate="$yer1$mon1$dat1";

$ndate="$yer2$mon2$dat2";






if($ser=="")
{


$bbb=time(); 

$d=date("m/d/y",$bbb); 

$mon="$d[0]$d[1]";
$dat="$d[3]$d[4]";
$yer="20$d[6]$d[7]";

$dat1=$dat;
$mon1=$mon;
$yer1=$yer;


$dat2=$dat;
$mon2=$mon;
$yer2=$yer;


$mdate="$yer1$mon1$dat1";

$ndate="$yer2$mon2$dat2";




}













if($ser==5)
{



$sql="SELECT * FROM `buymemo` WHERE user_id='$s' ";


$result=mysql_query($sql);
$arra=mysql_fetch_array($result);

$memo_id=$arra[1];



$result = mysql_query("SELECT * FROM `buyproduct` where money_id='$memo_id' ");

while ($a_row = mysql_fetch_row($result)) {

	foreach ($a_row as $field) {
		
	}

$k++;
$p_id[$k]=$a_row[4];
$qty[$k]=$a_row[6];
$uid[$k]=$a_row[0];



}



for($i=1;$i<=$k;$i++)
{



$sql="SELECT * FROM `productname` WHERE user_id='$p_id[$i]' ";


$result=mysql_query($sql);
$arrb=mysql_fetch_array($result);

$st=$arrb[11];

$st=$st-$qty[$i];


$sql= "UPDATE  `productname` SET `total_product`='$st' WHERE `user_id`='$p_id[$i]'";
mysql_query($sql);



$result = mysql_query("DELETE FROM buyproduct WHERE user_id=$uid[$i]");




}


$result = mysql_query("DELETE FROM buymemo WHERE user_id=$s");


include_once('d.php');

}




include_once('ppp.php');



print"

<html>

<head>
<title> Daily purchase </title>
";
?>



  <link rel="stylesheet" href="jquery-ui-themes-1.11.4/themes/smoothness/jquery-ui.css">
  
  <script src="jquery-1.10.2.js"></script>
  <script src="jquery-ui.js"></script>
  
 
  
  <script>
  
  var availableTags;

  var availableTags2;

  
  var saletags;
  
  var stooo;
  
  
  var sale_price1;
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  


  
  
  $(function() {
	  
	  
	  
 availableTags2 = [

	<?php
	

	

	
$result = mysql_query("SELECT * FROM `supplier`  ORDER BY `customer_name` ASC ");



while ($a_row = mysql_fetch_row($result)) {

	foreach ($a_row as $field) {
		
	}

$cq='"';	
$cq = mb_ereg_replace("$cq","*", $a_row[1]);

$cq10='"';
$cq10 = mb_ereg_replace("$cq10","*", $a_row[5]);



print"


${ar}$cq  - $cq10 - $a_row[3]=$a_row[0]$ar, 

 ";


	}
?>

      "Testing"

    ];
    $( "#tags2" ).autocomplete({
      source: availableTags2
    });
  });
  



function cl()
{
document.p.supplier.value="";
}  
  
  
 </script>





 <?php

include_once('style.php');


print"


<style>

.list1 tr:hover{
background-color:pink;
}

</style>



</head>


<body>
";


//include_once('header.php');


print"
<table align='center' width='1200' cellpadding='0' cellspacing='1' height='800' bgcolor=''>
<tr bgcolor='white'> 


";

//include_once('find_transection_left.php');

print"





<td align='center' valign='top' width='980'> 

";

include_once('address.php');

print"

<table align='center' width='1000' cellpadding='0' cellspacing='1' bgcolor='#FAF1F1'>

<tr> 
<td width='1000' height='320' bgcolor='' valign='top'> 


";







print"

<table align='center' width='1400' cellpadding='0' cellspacing='1' bgcolor='#FAF1F1'>

<tr> 
<td width='1000' height='320' bgcolor='' valign='top'> 

<table align='center' width='1400' cellpadding='0' cellspacing='0' bgcolor='#FAF1F1'>
<tr> <td align='center' height='40'> <font face='arial' size='2'> Daily Purchase  </font> </td> </tr>
<tr> <td align='center' height='1' bgcolor='F9F4D8'> </td> </tr>
</table>





<table align='center' width='1400' cellpadding='0' cellspacing='0' bgcolor='F3F3F3'>



<tr> 

<form action='daily_purchase.php' method='POST'>

<td align='center' height='40'> 


<font face='arial' size='2'> Memo no: <input type='text' name='memo_no' size='15'> &nbsp;&nbsp; </font>





<font face='arial' size='2'> Supplier name </font>
";






print"
: 
<label for='tags2'> </label>
<input type='text' id='tags2' name='supplier' value='$id_supplier' size='30' onclick='cl()'>
";





print"
<select name='dat1'>

<option>$dat1</option>
<option>01</option>
<option>01</option>
<option>02</option>
<option>03</option>
<option>04</option>
<option>05</option>
<option>06</option>
<option>07</option>
<option>08</option>
<option>09</option>
<option>10</option>
<option>11</option>
<option>12</option>
<option>13</option>
<option>14</option>
<option>15</option>
<option>16</option>
<option>17</option>
<option>18</option>
<option>19</option>
<option>20</option>
<option>21</option>
<option>22</option>
<option>23</option>
<option>24</option>
<option>25</option>
<option>26</option>
<option>27</option>
<option>28</option>
<option>29</option>
<option>30</option>
<option>31</option>
</select>


<select name='mon1'>
<option>$mon1</option>
<option>01</option>
<option>01</option>
<option>02</option>
<option>03</option>
<option>04</option>
<option>05</option>
<option>06</option>
<option>07</option>
<option>08</option>
<option>09</option>
<option>10</option>
<option>11</option>
<option>12</option>

</select>



<select name='yer1'>
<option>$yer1</option>
";

include_once('year.php');

print"
</select>

&nbsp;&nbsp;&nbsp; <font face='arial' size='2'>To </font>&nbsp;&nbsp;&nbsp;


<select name='dat2'>
<option>$dat2</option>
<option>01</option>
<option>01</option>
<option>02</option>
<option>03</option>
<option>04</option>
<option>05</option>
<option>06</option>
<option>07</option>
<option>08</option>
<option>09</option>
<option>10</option>
<option>11</option>
<option>12</option>
<option>13</option>
<option>14</option>
<option>15</option>
<option>16</option>
<option>17</option>
<option>18</option>
<option>19</option>
<option>20</option>
<option>21</option>
<option>22</option>
<option>23</option>
<option>24</option>
<option>25</option>
<option>26</option>
<option>27</option>
<option>28</option>
<option>29</option>
<option>30</option>
<option>31</option>
</select>


<select name='mon2'>
<option>$mon2</option>
<option>01</option>
<option>01</option>
<option>02</option>
<option>03</option>
<option>04</option>
<option>05</option>
<option>06</option>
<option>07</option>
<option>08</option>
<option>09</option>
<option>10</option>
<option>11</option>
<option>12</option>

</select>



<select name='yer2'>
<option>$yer2</option>
";

include_once('year1.php');

print"
</select>


<input type='hidden' name='ser' value='7'>

<input type='submit' value='Search'>

</td> 


</form>

</tr>


<tr> <td align='center' height='1' bgcolor='F9F4D8'> </td> </tr>
</table>












<table align='center' width='1400' cellpadding='3' cellspacing='1' class='list1'>

<tr bgcolor='#CDC7C7'>


 
<td align='center' height='30' width='100'>  <font face='arial' size='2' color=''> Memo_ID</font> </td> 
<td align='center' height='30' width='180'>  <font face='arial' size='2' color=''> Supplier Name - Id</font> </td> 

<td width='100' align='center'>              <font face='arial' size='2'> Pro_Item</font> </td>



<td width='50' align='center'>              <font face='arial' size='2'> Adjust  </font> </td>
<td width='100' align='center'>              <font face='arial' size='2'> Total </font> </td>
<td width='100' align='center'>              <font face='arial' size='2'> Discount </font> </td>



<td width='100' align='center'>              <font face='arial' size='2'> Carring Cost </font> </td>
<td width='100' align='center'>              <font face='arial' size='2'> Subtotal </font> </td>





<td width='50' align='center'>              <font face='arial' size='2'> Cash </font> </td>
<td width='50' align='center'>              <font face='arial' size='2'> Due </font> </td>






<td width='100' align='center'>             <font face='arial' size='2'> Date</font> </td>



<td width='100' align='center'>              <font face='arial' size='2'>  Comments </font> </td>

<td width='100' align='center'>              <font face='arial' size='2'>  View </font> </td>


<td width='100' align='center'>              <font face='arial' size='2'>  Edit  </font> </td>



</tr>
";













//$result = mysql_query("SELECT * FROM buymemo");



$ckk=0;

if($memo_no!="")
{
$result = mysql_query("SELECT * FROM `buymemo` where money_id='$memo_no'   && tf!='1' ORDER BY `adat` ASC,`user_id` ASC ");
$ckk=1;
}

if($memo_no=="" && $ckk==0 && $supplier=="")
{
$result = mysql_query("SELECT * FROM `buymemo` where adat>='$mdate' && adat<='$ndate' && total_money!=''   && tf!='1' ORDER BY `adat` ASC,`user_id` ASC ");
$ckk=1;
}

if($supplier!="")
{
$result = mysql_query("SELECT * FROM `buymemo` where adat>='$mdate' && adat<='$ndate' &&  supplier_id='$supplier'   && tf!='1' ORDER BY `adat` ASC,`user_id` ASC ");
$ckk=1;
}





/*
if($memo_no=="")
{
$result = mysql_query("SELECT * FROM `buymemo` where adat>='$mdate' && adat<='$ndate' && total_money!='' ");
}
else
{
$result = mysql_query("SELECT * FROM `buymemo` where money_id='$memo_no' ");	
}
*/






while ($a_row = mysql_fetch_row($result)) {

	foreach ($a_row as $field) {
		
	}


$t55=$a_row[5]+$a_row[21];


$t55_total=$t55_total+$t55;
$comm=$comm+$a_row[21];


$a_row[5]=$a_row[5]+$a_row[6];

$a_row[5]=$a_row[5]-$a_row[25];

$tot=$tot+$a_row[5];




$ship=$ship+$a_row[6];

$t66=$t66+$a_row[5];





$cash1=$cash1+$a_row[7];

$adjust=$adjust+$a_row[26];
$carring=$carring+$a_row[6];
$discount=$discount+$a_row[25];




$stot=$stot+$a_row[8];



print"
<tr bgcolor='white'> 

 
<td align='center' height='30' width='50'>  <font face='arial' size='2' color=''> $a_row[1]</font> </td> 
<td align='left' height='30' width='180'>  <font face='arial' size='2' color=''> $a_row[3]  - $a_row[2]</font> </td> 

<td width='50' align='center'>              <font face='arial' size='2'> $a_row[4]  </font> </td>




<td width='150' align='center'>              <font face='arial' size='2'> $a_row[26]  </font> </td>


<td width='150' align='center'>              <font face='arial' size='2'> $t55    </font> </td>

<td width='150' align='center'>              <font face='arial' size='2'> $a_row[25]   </font> </td>


<td width='50' align='center'>              <font face='arial' size='2'> $a_row[6]  </font> </td>
";

print"
<td width='50' align='center'>              <font face='arial' size='2'> $a_row[5]   </font> </td>



<td width='50' align='center'>              <font face='arial' size='2'> $a_row[7] </font> </td>


<td width='50' align='center'>              <font face='arial' size='2'> $a_row[8] </font> </td>





<td width='100' align='center'>             <font face='arial' size='2'> $a_row[9]-$a_row[10]-$a_row[11]</font> </td>





<td width='100' align='left'>              <font face='arial' size='2'>  $a_row[14]  </font> </td>


<form action='buyreceitview2.php' method='POST' target='_blank'>

<td width='100' align='center'>  


<input type='hidden' name='s' value='$a_row[0]'>      

<input type='submit' value='View'>

</td>

</form>
";


if($user_name1=="superadmin")
{
print"
<form action='purchase_edit.php' method='POST' target='_blank'>
<td width='100' align='center'>  
<input type='hidden' name='s45' value='$a_row[0]'>      
<input type='submit' value='Edit'>
</td>
</form>
";
}
else
{
print"
<td> </td>
";
}

print"
</tr>

";

$a_row[5]=$a_row[5]+$a_row[25];
$a_row[5]=$a_row[5]-$a_row[6];


$total_money=$total_money+$a_row[5];


$total_less=$total_less+$a_row[6];


$total_joma=$total_joma+$a_row[7];



$total_due=$total_due+$a_row[8];


}



print"









<tr bgcolor='F2F2F2'>


 
<td align='center' height='30' width='100'>  <font face='arial' size='2' color=''>  </font> </td> 
<td align='center' height='30' width='180'>  <font face='arial' size='2' color=''>  </font> </td> 

<td width='100' align='center'>              <font face='arial' size='2'>  </font> </td>




<td width='100' align='center'>              <font face='arial' size='2'> $adjust </font> </td>

<td width='100' align='center'>              <font face='arial' size='2'> $t55_total </font> </td>

<td width='100' align='center'>              <font face='arial' size='2'> $discount </font> </td>


<td width='100' align='center'>              <font face='arial' size='2'> $carring </font> </td>

<td width='100' align='center'>              <font face='arial' size='2'> $tot </font> </td>


<td width='50' align='center'>              <font face='arial' size='2'>  $cash1</font> </td>


<td width='100' align='center'>              <font face='arial' size='2'> $stot  </font> </td>
















<td width='100' align='center'>             <font face='arial' size='2'>  </font> </td>


<td width='200' align='center'>              <font face='arial' size='2'>   </font> </td>

<td width='100' align='center'>              <font face='arial' size='2'>   </font> </td>

<td width='100' align='center'>              <font face='arial' size='2'>   </font> </td>


<td>  </td>

</tr>



</table>
";





  //  This is the total purchase  $tyuu=$total_joma+$total_due;










print"




</td>


</tr>
</table>




</body>

</html>


";


?>