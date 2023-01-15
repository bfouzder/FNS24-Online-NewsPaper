<?php
include_once('db.php');

require_once 'bijoy2unicode.php';
$demo=trim($_POST['convert']);



$value=$demo;


$result = mysqli_query($con_db,"SELECT * FROM `right_word` where  button='1'  ORDER BY `user_id` ASC  LIMIT 0 ,10000000000000000");

while ($a_row = mysqli_fetch_row($result)) {

	foreach ($a_row as $field) {
		
	}
	
$value=str_replace("$a_row[1]","$a_row[2]","$value");
	
}    




$demo=$value;

$converted = convertBijoyToUnicode($demo);


$data_final=$converted;


$value=$data_final;





$result = mysqli_query($con_db,"SELECT * FROM `right_word` where button='20'   ORDER BY `user_id` ASC  LIMIT 0 ,10000000000000000");

while ($a_row = mysqli_fetch_row($result)) {

	foreach ($a_row as $field) {
		
	}
	
$value=str_replace("$a_row[1]","$a_row[2]","$value");
	
}    






$data_final=$value;



print"$data_final";





//print"$converted";



?>