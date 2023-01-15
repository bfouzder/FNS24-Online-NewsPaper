<?php

include_once('dbconnection.php');


//$bil=8; hs hardner
//$s=140;

//$bil=9;  ms hardner
//$s=149;

$bil=9;
$s=149;


$sql= "UPDATE  `buyproduct` SET `product_id`='$bil' WHERE `product_id`='$s'";
mysql_query($sql);


print"Success ---  ";




?>