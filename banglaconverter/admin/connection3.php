<?php

$host="localhost";
$dbuser="root";
$pw="";
$db ="g2";

$link=mysql_connect($host,$dbuser,$pw)or die("could not connect mysql".mysql_error());
if($link)
{
mysql_select_db($db)or die("could not connect databasae $db".mysql_error());
}



?>