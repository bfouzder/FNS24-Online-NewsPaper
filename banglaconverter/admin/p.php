<?php
session_start();

include_once('dbconnection.php');



/*
$host="localhost";
$dbuser="ssss_c2";
$pw="!DV{GG(grPbr";
$db ="ssss_c2";



$link=mysql_connect($host,$dbuser,$pw)or die("could not connect mysql".mysql_error());
if($link)
{
mysql_select_db($db)or die("could not connect databasae $db".mysql_error());
}

*/

$searchTerm=$_GET['term'];

//$_SESSION['pk']="$m";



$result = mysql_query("SELECT * FROM `product_name` where product_name LIKE '%".$searchTerm."%' || user_id LIKE '%".$searchTerm."%' || product_id LIKE '%".$searchTerm."%'|| brand LIKE '%".$searchTerm."%' || capacity LIKE '%".$searchTerm."%' || orr LIKE '%".$searchTerm."%' || barcode_id LIKE '%".$searchTerm."%'  ");

while ($a_row = mysql_fetch_row($result)) {

	foreach ($a_row as $field) {
		
	}
	
	
$data[] =" $a_row[2] $a_row[3] $a_row[31] $a_row[30] $a_row[32]  $a_row[36]  =$a_row[0]";
	
	
}




echo json_encode($data);


/*
$sql = "INSERT INTO `customer` (`user_id`, `customer_name`, `customer_id`, `mobile`, `email`, `address`, `area`, `company_name`) VALUES ('','$m','$customer_id','$mobile','$email','$address','$category','$company_name')";
mysql_query($sql);
*/



//echo $_POST["tweet"];

/*
print"
<select name='contact_name5' onchange='om()'>
<option value='$supplier'> $suppliern </option>
";


$result = mysql_query("SELECT * FROM `customer`  ORDER BY `user_id` ASC  LIMIT 0 , 60000 ");

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


?>