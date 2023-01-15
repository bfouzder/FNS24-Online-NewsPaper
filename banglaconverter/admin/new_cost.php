<?php
include_once('dbconnection.php');



$head_cost=$_POST["head_cost"];



$users_arr = array();

    $users_arr[] = array("id" => " ", "name" => " ");


$result = mysql_query("SELECT * FROM `expendature_sub` where category='$head_cost'   ORDER BY `product_name` ASC ");


while ($a_row = mysql_fetch_row($result)) {

	foreach ($a_row as $field) {
		
	}


    $users_arr[] = array("id" => $a_row[0], "name" => $a_row[2]);

}


echo json_encode($users_arr);


?>
