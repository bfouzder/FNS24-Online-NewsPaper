<?php
$host="localhost";
$dbuser= "fns24ban_fouzder";
$pw="]LSuxQ4Vg9[w";
$db = "fns24bangla_converterdbnew";


#BANGLA CONVERTER 
$host="localhost";
$dbuser="bangla786_fconverter";
$pw="BY2C-;xLGVSb";
$db ="bangla786_fns_converter";

date_default_timezone_set("Asia/Dhaka");



/*
$link=mysql_connect($host,$dbuser,$pw)or die("could not connect mysql".mysql_error());
if($link)
{
mysql_select_db($db)or die("could not connect databasae $db".mysql_error());
}

*/


$con_db = mysqli_connect("$host","$dbuser","$pw","$db");
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }else{
     //   echo "Connect to MySQL: $db";
  }







/*

$host="localhost";
$dbuser="ourbqjwl_fns_converter";
$pw="8GVq8K[TOYF_";
$db ="ourbqjwl_fns_converter";

$link=mysql_connect($host,$dbuser,$pw)or die("could not connect mysql".mysql_error());
if($link)
{
mysql_select_db($db)or die("could not connect databasae $db".mysql_error());
}

*/



?>