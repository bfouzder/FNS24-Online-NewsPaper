<?php error_reporting(0);
$HTTP_POST_VARS["form_1"]=$_POST["form_data"];
// www.prothom-alo.com
if (isset($HTTP_POST_VARS["form_1"])) 
    {
    $form_1=$HTTP_POST_VARS['form_1'];
    
    $form_1=str_replace("\\","",$form_1);
    
    $form_1=str_replace("<?xml","<?/*<?xml",$form_1);
    
    $form_1=str_replace("/>","/>*/?>",$form_1);
    
    
	
	$form_1=str_replace("W়v","ov",$form_1);
	$form_1=str_replace("Ww়","wo",$form_1);
	$form_1=str_replace("W‡়","‡o",$form_1);
	$form_1=str_replace("W়","o",$form_1);

	
	$form_1=str_replace("X়v","pv",$form_1);
	$form_1=str_replace("Xw়","wp",$form_1);
	$form_1=str_replace("X‡়","‡p",$form_1);
	$form_1=str_replace("X়","p",$form_1);

	
	
	$form_1=str_replace("h়v","qv",$form_1);
	$form_1=str_replace("hw়","wq",$form_1);
	$form_1=str_replace("h‡়","‡q",$form_1);
	$form_1=str_replace("h়","q",$form_1);
	
	

	$form_1=str_replace("","",$form_1);
	$form_1=str_replace("","",$form_1);
	$form_1=str_replace("","",$form_1);
	$form_1=str_replace("","",$form_1);
	$form_1=str_replace("","",$form_1);
	$form_1=str_replace("","",$form_1);
	$form_1=str_replace("","",$form_1);
	$form_1=str_replace("","",$form_1);
	$form_1=str_replace("","",$form_1);
	$form_1=str_replace("","",$form_1);
	$form_1=str_replace("","",$form_1);
	$form_1=str_replace("","",$form_1);

	


	
	
 

    

    
    
    /*
    $handle=fopen("content.php", "w");
    fwrite($handle, $form_1);
    fclose($handle);
    require('display.php');
    */
    }else $form_1 = "There are some errors!";
    
echo $form_1; 
?> 