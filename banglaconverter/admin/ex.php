<?php
include_once('dbconnection.php');



/*
$sql="SELECT * FROM `product_category` WHERE user_id='$category' ";
$result=mysql_query($sql);
$arr=mysql_fetch_array($result);
$category_name=$arr[1];
*/

$ct=0;

$queryexport = ("SELECT * FROM `customer` WHERE user_id>='$ct' ");

$row = mysql_fetch_array($queryexport);

$result = mysql_query($queryexport);



$header = '';

for ($i = 0; $i < $count; $i++){
   $header .= mysql_field_name($result, $i)."\t";
   }

while($row = mysql_fetch_row($result)){
   $line = '';
   foreach($row as $value){
          if(!isset($value) || $value == ""){
                 $value = "\t";
          }else{
                 $value = str_replace('"', '""', $value);
                 $value = '"' . $value . '"' . "\t";
                 }
          $line .= $value;
          }
   $data .= trim($line)."\n";
   $data = str_replace("\r", "", $data);

if ($data == "") {
   $data = "\nno matching records found\n";
   }
}
header("Content-type: application/vnd.ms-excel; name='excel'");
header("Content-Disposition: attachment; filename=exportfile.xls");
header("Pragma: no-cache");
header("Expires: 0");
?>