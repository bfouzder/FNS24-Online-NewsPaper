<?php
include_once('db.php');
$output='';
//$result = mysqli_query($con_db,"SELECT * FROM `right_word` where button='21'  ORDER BY `user_id` ASC  LIMIT 0 ,10000000000000000");
$results = ar_select($con_db,"SELECT * FROM `right_word` where button='21'  ORDER BY `user_id` ASC  LIMIT 0 ,30000");
require_once 'Unicode2Bijoy.php';
$str=trim($_POST['convert']);
$file = fopen("test5.txt","w");
fwrite($file,"$str");

$myfile = fopen("test5.txt", "r") or die("Unable to open file!");
//echo fread($myfile,filesize("test5.txt"));

$co=1;
while ($line = fgets($myfile)) {

//print"$line $co";
$str=$line;
$val=Unicode2Bijoy::convert($str);
//$val=dbReplace($results, $val,$co);
$output .=$val;
//print"$val";
 if($line=='')
 {   
 } 
 $co++;
} 
fclose($myfile);



$val = dbReplace($results, $output, $co=1);
print"$val";


################bof db correction##########################
function dbReplace($results, $value, $co){

   // echo '<br/>Line '.$co.'s = '.$value.'<hr/>';
    //print_r($results);
    foreach ($results as $a_row) {	
      $value=str_replace($a_row['wrong'],$a_row['right_w'],$value);
    }

    return $value;
}
################eof db correction##########################
function pre($value){ echo '<pre>'; print_r($value);echo '</pre>';}

function ar_select ($conn,$sql)
    {	    
    
      try { 
        $results = mysqli_query($conn,$sql, MYSQLI_USE_RESULT); 
      } catch (mysqli_sql_exception $e) { 
      var_dump($e);
      die("sqli_exception: ".$e );
      return false;
      }
        if( (!$results) or (empty($results)) ) {
              return false;
      }
      $count = 0;
      $data = array();
      while ( $row = mysqli_fetch_array($results, MYSQLI_ASSOC))
      {
              $data[$count] = $row;
              $count++;
      }
      mysqli_free_result($results);
    return $data;
    }
?>