<?php 
$error="";
 if($db->post('formSubmitted'))
 {
	  if($db->post('do_login')){
		$stats = checkPublicUserLogin(); //login  
	  }else{
		$stats = checkPublicUserReg(); //THIS  Fuction return an array regarding error info if user authentication failed    
	  }
	 
	 //pre($stats);
	 if(is_array($stats)){ 
		 switch($stats['stats']){
		 	
	 	 	case "invalid":	 	 	               
	 	 	               $error .="<p class='font1 ar_close'>Invalid Login  or Password</p>";
		                   break;
			case "exist":	 	 	               
	 	 	               $error .="<p class='font1 ar_close'>Email or Phone Already Exist, please login</p>";
		                   break;			   
            case "inactive":
						   $error .="<p class='font1 ar_close'>Inactive Login! Currently you are not permited to enter.</p>";
		                   break;
	 	 }
	 	
		
	
	 }else{
		// pre($_SESSION);
		  if(state('AR_user_id')){
		      redirect("publicnews/add"); 
		 }
	 } 
 }
 //LOGOUT
 if($db->get('type')=='logout'){
 
		$session->sess_destroy();
		redirect();
 }
 
//if user already logged in then redirect to myfiles
 if(state('AR_user_id')){
	  redirect("publicnews/add"); 
 }else{
	 
 }
 
 function checkPublicUserLogin($user_log=true){
		global $session,$db;
       
      
		
		$now=date("Y-m-d H:i:s");
		$user_mobile = $db->db_prepare_input($db->post('user_mobile'));
		$user_email = $db->db_prepare_input($db->post('user_email'));
		echo $user_rawpass = $db->db_prepare_input($db->post('user_password'));
		$user_password = _encode($user_rawpass);
	
		#bof To prevent SQL INJECTION :: ' or 0=0 # 
		if(strpos($user_email, $findme='0=0') !== false){
			die('<center><font color="red" size="10"><br/><br/><br/>Don\'t try to be smart, you will be block very soon::'. $_SERVER['REMOTE_ADDR'].'<br/><br/><br/></center>');
		}elseif(strpos($user_email, $findme="'") !== false){
			die('<center><font color="red" size="10"><br/><br/><br/>Invalid character ::'. $_SERVER['REMOTE_ADDR'].'<br/><br/><br/></center>');
		}
		#eof To prevent SQL INJECTION :: ' or 0=0 #
		

		$data=array("user_mobile"=>$user_mobile);
	#	echo "select * from users where user_password ='$user_password' AND user_email='$user_email'";
	    $uinfo = $db->select_single("select * from users where user_password ='$user_password' AND user_email='$user_email'");
       	if($uinfo){
			if($uinfo['user_id']!=""){
				
				$public_user_session = array(
					'AR_user_id'			=> $uinfo['user_id'],
					'AR_user_name'			=> $uinfo['user_name'],
					'AR_user_mobile'		=> $uinfo['user_mobile'],
					'AR_user_email'		    => $uinfo['user_email'],
				);
				
				state('AR_public_user',$uinfo['user_id']);
				$session->set_userdata($public_user_session);
				//Admin LOG
				
				return $uinfo['user_id'];
                
			}else{	
				$status['stats']="invalid";
				return 	$status;
			}
            
		}else{	
			    $status['stats']="invalid";
				return 	$status;
		}
	}
	
 function checkPublicUserReg($user_log=true){
		global $session,$db;
       
      
		
		$now=date("Y-m-d H:i:s");
		$user_name = $db->db_prepare_input($db->post('user_name'));
		$user_mobile = $db->db_prepare_input($db->post('user_mobile'));
		$user_email = $db->db_prepare_input($db->post('user_email'));
		$user_rawpass = $db->db_prepare_input($db->post('user_rawpass'));
		$user_password = _encode($user_rawpass);
	
		#bof To prevent SQL INJECTION :: ' or 0=0 # 
		if(strpos($user_name, $findme='0=0') !== false){
			die('<center><font color="red" size="10"><br/><br/><br/>Don\'t try to be smart, you will be block very soon::'. $_SERVER['REMOTE_ADDR'].'<br/><br/><br/></center>');
		}elseif(strpos($user_name, $findme="'") !== false){
			die('<center><font color="red" size="10"><br/><br/><br/>Invalid character ::'. $_SERVER['REMOTE_ADDR'].'<br/><br/><br/></center>');
		}
		#eof To prevent SQL INJECTION :: ' or 0=0 #
		

		$data=array("user_mobile"=>$user_mobile);
	    $uinfo = $db->select_single("select * from users where user_mobile ='$user_mobile' OR user_email='$user_email'");
        if(!$uinfo){
			$_POST['user_password'] = $user_password;
            $user_id=$db->bindPOST('users','user_id');
            $uinfo= getUserInfo($user_id);
            
			$_POST['user_password'] = $user_rawpass;
			return checkPublicUserLogin();
        }else{	
			    $status['stats']="exist";
				return 	$status;
		}
	}
?>

<section class="section-block clearfix">
	<div class="row">
		<div class="col-xs-12 col-sm-12">
			<h2 class="nav-page-title">Public News</h2>
			<div class="page-breadcrumb clearfix">
			    <ol class="breadcrumb">
        		   <li><a href="<?=SCRIPT_URL?>"><i class="fa fa-home"></i> প্রচ্ছদ</a></li>
        		   <li class="active">ধাপ ১ :  তোমার ইনফরমেশন </li>
        		 </ol>
			</div>
		<!--eof top heading-->	

    
     <div class="user_login" style="border: 2px solid #fff;"> 
    
    <h1 class="news_main_title" style="text-align: center;margin: 20px;">আপনার যে কোনো সংবাদ/লেখা  প্রকাশ করতে সাইলে রেজিস্টার করে সাবমিট করুন </h1>
      
	  <div class="rows" style="margin: 40px auto;">
	   <div class="col-md-5">
		  <div class="panel panel-danger">
		  
	  <div class="panel-heading"> লগইন  করুন </div>
		<div class="panel-body">
		
          <form class="form-signin" method="post" action="">
			<input type="hidden" name="formSubmitted" value="1">
			<div class="form-group">
			<label for="user_email">ইমেইল : </label>
			<input type="email" name="user_email"  class="form-control" placeholder="Email" required>
			</div>
			<div class="form-group">
			<label for="user_password">পাসওয়ার্ড  : </label>
			<input type="password" name="user_password"  class="form-control" placeholder="Password" required>
			</div>
			<input type="submit" name="do_login" value="লগইন" class="btn btn-danger">
		</form>
      <div class="checkbox">
  <label>
	<a href="<?=SCRIPT_URL?>auth/forgotpassword" >Forgot your password?</a>
  </label>
</div>
        </div>
        </div>
        </div>
      
	  
	  <div class="col-md-1"></div>
	  
	  <div class="col-md-6">
	  <div class="panel panel-success">
	  <div class="panel-heading"> রেজিস্টার  করুন </div>
		<div class="panel-body">
     
	     <?php if(strlen($error)>0){?> 
          			<p ><?=$error;?></p>		 
		 		  <?php }?>	
      <form class="form-signin" method="post" action="">
	   <input type="hidden" name="formSubmitted" value="1">
        <div class="form-group">
		<label for="user_name" class="sr_only sr-only">নাম : </label>       
        <input type="text" id="user_name" name="user_name" class="form-control" value="" placeholder="নাম" required>
         </div>
		 <div class="form-group">
		<label for="user_mobile" class="sr_only sr-only">মোবাইল : </label>
        <input type="text" id="user_mobile" name="user_mobile"  class="form-control" value="" placeholder="মোবাইল" required>
         </div>
		<div class="form-group">
		<label for="user_email" class="sr-only">ইমেইল : </label>
        <input type="email" id="user_email" name="user_email"  class="form-control" value="" placeholder="ইমেইল" required>
        </div>
        <div class="form-group">
		<label for="user_rawpass" class="sr-only">পাসওয়ার্ড  : </label>
        <input type="password" autocomplete="off" id="user_rawpass" name="user_rawpass"  class="form-control" placeholder="পাসওয়ার্ড " required>
        </div>
	    <input type="submit" value="রেজিস্টার" class="btn btn-success">
      </form>
        </div>
        </div>
        </div>
       
    </div>	
    <p></p><p></p><p></p><p></p>
<div class="clearfix"></div>	
    </div>			
	</div>
	</div>
</section>
 