<?php 
$error="";
 if($db->post('formSubmitted'))
 {
	 
	 $stats = checkAdminAuth(); //THIS  Fuction return an array regarding error info if user authentication failed
	 pre($stats);
	 if(is_array($stats)){ 
		 switch($stats['stats']){
		 	
	 	 	case "invalid":	 	 	               
	 	 	               $error .="<p class='font1 ar_close'>Invalid Login  or Password</p>";
		                   break;
            case "inactive":
						   $error .="<p class='font1 ar_close'>Inactive Login! Currently you are not permited to enter.</p>";
		                   break;
	 	 }
	 	
		
	
	 }else{
		 //pre($_SESSION);
		  if(state('AR_admin')){
		  	redirect("siteadminpanel");
		 }
	 } 
 }
 //LOGOUT
 if($db->get('type')=='logout'){
 
		$session->sess_destroy();
		redirect('admin');
 }
 
//if user already logged in then redirect to myfiles
 if(state('AR_admin')){
	  redirect("siteadminpanel"); 
 }else{
	  if($_GET['ref'] != 'crmadminpanel'){
		//redirect();  
	  }
 }
?>
<!DOCTYPE html>
<html lang="en">
  <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    

    <title>Signin</title>

    <!-- Bootstrap core CSS -->
     <link rel="stylesheet" type="text/css" href="<?=ADMIN_GET_TEMPLATE_DIRECTORY_URI?>/theme_new/css/bootstrap.css">

    <!-- Custom styles for this template -->
    <link href="<?=ADMIN_GET_TEMPLATE_DIRECTORY_URI?>/theme_new/css/signin.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
	<script src="<?=ADMIN_GET_TEMPLATE_DIRECTORY_URI?>/theme_new/js/jquery-1.11.2.min.js" type="text/javascript"></script>	
	<style>
	p.font1{ padding:4px 10px; background:red; border-radius:4px; color:#fff; font-weight:bold; }
	</style>
	
  </head>

  <body>

    <div class="container">
     
     <div class="user_login">
	 
     <div class="site_logo"><img src="<?=ADMIN_GET_TEMPLATE_DIRECTORY_URI?>/theme_new/images/logo.png" alt=""/></div>
	     <?php if(strlen($error)>0){?> 
          			<p ><?=$error;?></p>		 
		 		  <?php }?>	
      <form class="form-signin" method="post" action="">
	   <input type="hidden" name="formSubmitted" value="1">
        <h2 class="form-signin-heading">Admin Panel</h2>
        <label for="admin_name" class="sr-only">LoginID</label>       
        <input type="text" id="admin_name" name="admin_name" class="form-control" placeholder="Login ID" required autofocus>
        <label for="admin_pass" class="sr-only">Password</label>
        <input type="password" id="admin_pass" name="admin_pass"  class="form-control" placeholder="Password" required>
        <div class="checkbox">
          <label>
            <input type="checkbox" value="remember-me"> Remember me
          </label>
        </div>
        <button class="btn btn-lg btn-info btn-block" type="submit">Sign in</button>
      </form>
    </div>
    </div> <!-- /container -->
<script>
	jQuery('.ar_close').click(function() {		
		jQuery(this).toggle('slow');
	});
</script>
  </body>
</html>
