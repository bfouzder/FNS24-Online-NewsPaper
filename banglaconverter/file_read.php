<?php
/*

$myfile = fopen("file.txt", "r") or die("Unable to open file!");
echo fread($myfile,filesize("file.txt"));
fclose($myfile);
*/

?>



<?php
$file = fopen("file.txt", "r") or exit("Unable to open file!");

while(!feof($file))
  {
  //echo fgets($file). "<br>";
  
  
  $f=fgets($file);
  
  
  //print"$f <br>";
  
  $key = explode("&", $f);

  $key[0]=trim($key[0]);
  $key[1]=trim($key[1]);
  $key[2]=trim($key[2]);
  
  
  
  print"$key[0] - $key[1] - $key[2]  <br>";
  
  
  }
fclose($file);
?>

