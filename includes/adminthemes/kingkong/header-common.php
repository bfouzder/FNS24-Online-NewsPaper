<!DOCTYPE HTML>
<?php
error_reporting(0);
?>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <meta name="author" content="aditya.fouzder@link3.net"/>
    <title><?=isset($meta_title)?makeMetaTitle($meta_title):SITE_TITLE?></title>
	<link rel="icon" href="<?php echo SCRIPT_URL; ?>images/favicon.ico" type="image/x-icon" />
	<link rel="shortcut icon" href="<?php echo SCRIPT_URL; ?>images/favicon.ico" type="image/x-icon" />

	
	 <!-- Bootstrap core CSS -->
  <link href="<?php echo GET_VENDORS_DIRECTORY_URI; ?>/vendors/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?php echo GET_VENDORS_DIRECTORY_URI; ?>/vendors/fonts/css/font-awesome.min.css" rel="stylesheet">
  <link href="<?php echo GET_VENDORS_DIRECTORY_URI; ?>/vendors/css/animate.min.css" rel="stylesheet">

  <!-- Custom styling plus plugins -->
  <link href="<?php echo GET_VENDORS_DIRECTORY_URI; ?>/vendors/css/custom.css" rel="stylesheet">
  <link href="<?php echo GET_VENDORS_DIRECTORY_URI; ?>/vendors/css/maps/jquery-jvectormap-2.0.3.css" rel="stylesheet" type="text/css" />
  <link href="<?php echo GET_VENDORS_DIRECTORY_URI; ?>/vendors/css/icheck/flat/green.css" rel="stylesheet" />
  <link href="<?php echo GET_VENDORS_DIRECTORY_URI; ?>/vendors/css/floatexamples.css" rel="stylesheet" type="text/css" />
   
  <script src="<?php echo GET_VENDORS_DIRECTORY_URI; ?>/vendors/js/jquery.min.js"></script>
  <script src="<?php echo GET_VENDORS_DIRECTORY_URI; ?>/vendors/js/nprogress.js"></script>
<script>
function __checkAll( row, check_id ){
	var ar_checked=document.getElementById(check_id).checked;
	if(row) {
		 for( var i=0; i<row; i++ ){
				var single = 'checksingle'+i;
				document.getElementById(single).checked = ar_checked;
		 }
	}
}       
function check_action()
{
	var action = document.getElementById('p_action').value;
   
    if(action =='')
     {
     	alert("Please Select An Action");
     	return false;
     }
    else if(action =='delete')
    {
     
	 var x = confirm('Are You Sure You Want to Delete?');
	 if(!x)
	  return false;
    }
	return true;
}
function showForm(){
	
	$('#add_edit_block').toggle();
	$('#add_edit_block_list').toggle();
}
function checkSearch(form){
    
    if(form.user.value=="" || form.user.value=="Enter username, email or id here" ){
        return false;
    }
    	return true;
}
</script>
   </head>
  <body class="nav-md">