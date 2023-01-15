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

$searchTerm=$_GET['term'];

//$_SESSION['pk']="$m";



$result = mysql_query("SELECT * FROM `customer` where customer_name LIKE '%".$searchTerm."%' || user_id LIKE '%".$searchTerm."%' || address LIKE '%".$searchTerm."%' || mobile LIKE '%".$searchTerm."%' ");


while ($a_row = mysql_fetch_row($result)) {

	foreach ($a_row as $field) {
		
	}
$data[] =" $a_row[1] - $a_row[5] - $a_row[3] =$a_row[0]";
}




echo json_encode($data);








?>