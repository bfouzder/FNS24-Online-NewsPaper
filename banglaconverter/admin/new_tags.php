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


$m_tags=$_POST["tags"];

$_SESSION['pk_tags']="$m_tags";


?>