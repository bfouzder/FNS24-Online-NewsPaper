<?php
session_start();


$host="localhost";
$dbuser="switchgeardynami_fnsdata";
$pw="Yo)Sb6%}(Xat";
$db ="switchgeardynami_fnsdata";

$link=mysql_connect($host,$dbuser,$pw)or die("could not connect mysql".mysql_error());
if($link)
{
mysql_select_db($db)or die("could not connect databasae $db".mysql_error());
}





//$id_supplier=trim($_POST['supplier']);
$id_supplier=$_SESSION['pk'];

$rty=0;
$rkk=0;


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





$result = mysql_query("SELECT * FROM `customer`  where user_id='$supplier' ORDER BY `user_id` ASC  LIMIT 0 , 60000 ");


while ($a_row = mysql_fetch_row($result)) {

	foreach ($a_row as $field) {
		
	}

$r++;
$b[$r]=$a_row[1];
print" <font face='arial' color='red' size='3'> <b> ( Due : $a_row[1] ) </b> </font>";
}



/*
print"
<input type='hidden' name='bo' value='$b[1]'>
";
*/




/*
$qty=1;
$_SESSION['cart'][$mm]=$_SESSION['cart'][$mm]+$qty;


foreach($_SESSION['cart'] as $product_id => $quantity)
{
print"$quantity <br>";
}

for($i=1;$i<=100;$i++)
{
print"$b[$i] $i - $mm <br>";
}
*/

?>