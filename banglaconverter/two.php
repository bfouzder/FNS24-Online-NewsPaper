<?php



include_once('db.php');













$value=trim($_POST['convert']);

//$value="hh";



/*
$keywords = "$str";
$keywords = explode(" ", $keywords);
*/


    
    
$result = mysqli_query($con_db,"SELECT * FROM `right_word` where button='2'  ORDER BY `user_id` ASC  LIMIT 0 ,10000000000000000");

while ($a_row = mysqli_fetch_row($result)) {

	foreach ($a_row as $field) {
		
	}
	
	

	
$value=str_replace("$a_row[1]","$a_row[2]","$value");
	

}    
    
    
$v_out="$value";


print"$v_out";




?>


