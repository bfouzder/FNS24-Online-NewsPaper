<?php


  
$host="localhost";
$dbuser="root";
$pw="";
$db ="mama_inventory2";

$link=mysql_connect($host,$dbuser,$pw)or die("could not connect mysql".mysql_error());
if($link)
{
mysql_select_db($db)or die("could not connect databasae $db".mysql_error());
}
  
  
$selectdb=mysql_select_db($db) or die("Database could not be selected"); 
$result=mysql_select_db($database)
  
  
/*  
  
$connection=mysql_connect($host,$uname,$pass); 
or die("Database Connection Failed");
$selectdb=mysql_select_db($database) or die("Database could not be selected"); 
$result=mysql_select_db($database)
or die("database cannot be selected <br>");
*/


$filename =aircell_air.sql;


$templine = '';
$lines = file($filename); // Read entire file
foreach ($lines as $line){

if (substr($line, 0, 2) == '--' || $line == '') // Skip all comments
$templine .= $line;
if (substr(trim($line), -1, 1) == ';'){
	mysql_query($templine) or print('Error: '.mysql_error() . '<br >');
$templine = '';
}
}

?>