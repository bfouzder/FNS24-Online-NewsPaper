<?php


$host="localhost";
$dbuser="switchgeardynami_fnsdata";
$pw="Yo)Sb6%}(Xat";
$db ="switchgeardynami_fnsdata";

$link=mysql_connect($host,$dbuser,$pw)or die("could not connect mysql".mysql_error());
if($link)
{
mysql_select_db($db)or die("could not connect databasae $db".mysql_error());
}






$ck=str_replace("hh","k","hhello world!");

print"$ck - ";





$str=trim($_POST['convert']);



$keywords = "$str";
$keywords = explode(" ", $keywords);


foreach ($keywords as $value)
{
    
    
$result = mysql_query("SELECT * FROM `right_word` where wrong='$value'  ORDER BY `user_id` ASC  LIMIT 0 ,1");

while ($a_row = mysql_fetch_row($result)) {

	foreach ($a_row as $field) {
		
	}
	
	$value=$a_row[2];
}    
    
    
$v_out="$v_out $value";

}



print"$v_out";

?>


