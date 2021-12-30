<?php
/**
 * RAW PHP SCRIPT
 *
 * @package		RAWPHPSCRIPT
 * @author		Aditya(bfouzder@yahoo.com).
 * @copyright	Copyright (c) 2015
 * @version 2.0
 */
	class auth{
		
		var $db;
		var $session;
		var $user_id;
		var $controller;
		
		function __construct()
		{
			global $lang,$db,$session;
			#load_page_lang('login');
			
			$this->db = $db;
			$this->session = $session;								
			$this->controller = 'auth';
			$this->user_id = state('AR_user_id');
			$this->session_id = session_id();
		}
		
		function index($params = array()){
			
				if(!$this->user_id){
					$this->login();
				}else{
					redirect();
				}
		}
		
      
        
        
		function login($params = array()){
			global $db,$session;
             

            $redirect="";
			if(isset($params['0'])){
				$redirect = base64UrlDecode($params['0']);
			}
            
            #bof update currently login 
             $hour=5;
             //$db->edit("UPDATE users SET `login`=0 WHERE TIME_TO_SEC( TIMEDIFF( now( ) , `user_lastlogin` ) ) > (60 *60 *$hour) AND login =1");
			#eof update currently login
           
                 
			if($this->db->post('doLogin')){
			 	
				 $stats = $this->checkUserAuth(); //this fuction return an array regarding error info if user authentication failed
				 if(is_array($stats))
				 {
					 switch($stats['stats'])
				 	 {
				 	 	case "invalid":
				 	 	               $data['error'] ="Invalid Login or Password";
					                   break;
			            case "inactive":
				 	 	               $data['error'] ="You are still not verified, <a href=\"". SCRIPT_URL ."auth/verification/".$stats['user_name']."\">Click here to verify</b></a>, remember a verification code was sent to your email please check that email and collect the varification code from there ,If you are still waiting to receive your verification email, <a href=\"". SCRIPT_URL ."auth/resendverification\">click here to resend</a> it. ";
					                   break;
			            case "banned":
				 	 	               $data['error'] ="You are banned Please Contact the administrator";
				 	 	               $data['reason'] =$stats['reason'];
					                   break;
			            
				 	 }
				 	
				 }
			 }
             $error=$data['error'];
			 
              if(state('AR_user_id')){
              	if(strstr($redirect, 'http:')){
			  		urlredirect($redirect);
			  	}else{
			  	  if($redirect){
			  	    redirect($redirect);  
			  	  }else{
			  	    //redirect('profile/'.state('AR_user_name'));  
			  	    redirect('publicnews/profile/'.state('AR_user_name'));  
					//redirect('newsfeed/');  
			  	  }
			  	}
			  }
            		
		 //SHOW PAGES
			require(GET_TEMPLATE_DIRECTORY.'/header.php');
			require(TEMPLATE_STORE.$this->controller . DS .'login_new.php');  
			require(GET_TEMPLATE_DIRECTORY.'/footer.php');		
		}
	
		function noticeboard(){
			require(COMMON_TEMPLATES.'header.php');
			echo '<style>.request-left{float:none; margin:auto;}</style><div class="request-left-top">Notice Board</div><div class="request-left-med"><p style="padding:20px;font-size:40px;font-family:verdana;text-align:center;margin:auto;">Sorry! You Are Not Allowed  To Access This Site.<br/><a href="http://www.cinehub24.com/contactus/?sub=Cinehub24 Subscription">Contact with Administrator</><br/></p></div>';
			require(COMMON_TEMPLATES.'footer_nosidebar.php');exit;		
		}
		function registration(){		  
			redirect('auth/signup');
		}
		function signup(){
			global $db;

				$captcha_mode= getSettings('CAPTCHA_MODE');   
				if($captcha_mode){
				require_once(BASE_DIR."includes/3rdParty/vimage/vImage.php");
				$vImage = new vImage();	
				}


			$allow_extention=array('jpg','jpeg','png','pdf','docx','doc'); 	
			if($this->db->post('formSubmitted')){
	 	
				    $err = array(); 
					if($captcha_mode){
					    $vImage->loadCodes();
						if($captcha_mode && $vImage->sessionCode != $vImage->postCode){
							array_push($err,"Code Didn't Matched !! Try Again !!");
						}
					}
		  
				  
				   $user_name= $this->db->db_prepare_input($this->db->post('user_name'));
				   $user_email = $this->db->db_prepare_input($this->db->post('user_email'));
				   $user_password = $this->db->db_prepare_input($this->db->post('user_password'));
				   $user_repassword = $this->db->db_prepare_input($this->db->post('user_repassword'));
				   $user_fname= $this->db->db_prepare_input($this->db->post('user_fname'));
				   $user_mobile= $this->db->db_prepare_input($this->db->post('user_mobile'));
	  
				   // validate data now
				 
				     if(!$user_name)
					  	array_push($err,"Enter login name");
				     if(!$user_fname)
					  	array_push($err,"Enter your name");
					  if(!$user_mobile)
					  	array_push($err,"Enter contact person mobile");
				    if(!valid_email($user_email))
					  	array_push($err,"Invalid Email Provided");
					if(strlen(trim($user_password)) < 3 || strlen(trim($user_password)) > 32)
					  	array_push($err,"Password Must be between 4-32 letters long");
					if($user_password != $user_repassword)
						array_push($err,"Password not match");
					if($this->db->checkExists('users',array("user_name" => $user_name)))
					    array_push($err,"Duplicate Login Name");
					if($this->db->checkExists('users',array("user_email" => $user_email )))
					    array_push($err,"Duplicate Email");
					
					if($_FILES){
						foreach($_FILES as $file_field_name => $file_info){
							if($file_info["name"]){
							   $file_name=$file_info["name"];
							   $file_tmp_name=$file_info["tmp_name"];
							   $file_ext=strtolower(end(explode(".",$file_name)));
							   if(!in_array($file_ext,$allow_extention)){
									 array_push($err," For $file_field_name:  <em>.$file_ext</em> type of file doesn't support enter only ".implode(",",$allow_extention));
							 }
							}else{
								if($file_info["name"] !='extra_file_1' && $file_info["name"] !='extra_file_2' ){
									array_push($err," For $file_field_name:  upload your file");
								}
							}//if file name
						}//	foreach file							
					}else{
					 array_push($err,"  upload your files");
					}//if files 
					
					
					if($err){
					 $data['error'] = implode("<br />",$err);
					}else{
					 $_POST['user_rawpass']=$user_password;
					 $user_password = $this->_encode($user_password);
					 $user_ip=IP_TO_LONG($_SERVER['REMOTE_ADDR']);
                        
                    
                      $_POST['user_password']=$user_password;
                      $_POST['user_ip']=$user_ip;                        
                                                
					 $user_id = $this->db->bindPOST('users','user_id');
					 if($user_id){
					    $user_info=getUserInfo($user_id);
						$upload_dir = FILE_DIR;
						$upload_url = FILE_URL;
						
						if($_FILES){
							foreach($_FILES as $file_field_name => $file_info){
							 if($file_info["name"]){
							   $file_name=$file_info["name"];
							   $file_tmp_name=$file_info["tmp_name"];
							   $file_ext=strtolower(end(explode(".",$file_name)));
							   $new_file_name=$user_id.'_'.$file_field_name.'_'.$file_name;							
							   if(in_array($file_ext,$allow_extention)){
								   $upload_to=$upload_dir. $new_file_name;
								   //echo $file_tmp_name .'='. $upload_to;
									if(@move_uploaded_file($file_tmp_name, $upload_to)){
										$db->edit("UPDATE users SET `$file_field_name`='$new_file_name' WHERE user_id='$user_id'");
									}else{
										 $data['error'] ="Failed to upload $file_field_name";
									}
								  }
								}//if file name
							}//	foreach file
							
						}//if files 					
						 
$to_name=$user_info['user_fname'];
$to_email=$user_info['user_email'];
$company_name=$user_info['company_name'];						 
					  	
/// setting the mailer
$mailer=array();
$mailer['to_name']= $to_name;
$mailer['to_email']= $to_email;
$mailer['subject']= "Breakdown Registration & Verification";
$mailer['message']= "<b>Dear Mr. ".$to_name."</b>,<br/>
You have successfuly registered with us.<br/>
Thank You<br/>". getSettings('EMAIL_SIGNATURE');

					 	
//now check  user-verification on register is enabled or not 
if(getSettings('REGISTER_VALIDATION')){
$validate_code = create_random_value(4);
$upd_sql = "UPDATE users SET validate_code ='$validate_code', user_status ='0' WHERE user_id ='$user_id'"; //set user_status to not validated
$this->db->edit($upd_sql);
$mailer['message']= "<b>Dear Mr. ".$to_name."</b>,<br/>
You have successfuly registered with us.<br/>
Click on the link bellow to confirm your resgistration: <br/>
<a href=\"". SCRIPT_URL ."auth/verification/".$user_name ."/". $validate_code ."\" >Confirm Now</a><br/>
Or vistis the link bellow\n ". SCRIPT_URL ."auth/verification/".$user_name." and put this code: ".$validate_code."<br/>
Thank You<br/>". getSettings('EMAIL_SIGNATURE');
}//if verify required
send_emailer($mailer);					   

#send a Notify Email to Authority
$to_authority_name=getSettings('SITE_ADMIN_NAME');
$to_authority_email=getSettings('SITE_ADMIN_EMAIL');					

$mailer=array();	
$mailer['to_name']=$to_authority_name;
$mailer['to_email']=$to_authority_email;
$mailer['subject']="$company_name are successfully registered with us.";
$mailer['message']="<b>Organization Name:  $company_name<br/> 
Contact Person:  $to_name<br/> 
Designation :  ".$user_info['user_designation']."<br/> 
Contact Number: ".$user_info['user_mobile']."<br/> 
Email ID : $to_email<br/> 
</b>";
send_emailer($mailer);	
			 
$data['message'] = "Registration Success. A Confirmation email has been  sent to your E-mail"; 					      
					   
					 }//if user_id
				}
			 }//if submit	
    		
			
           
		   $error= $data['error'];
           $message= $data['message'];
		   
			//SHOW PAGES
			$data['contentView'] = $this->controller . DS .'signup.php';
			showPage($data);
		}
		function popup_signup(){
			global $db;

				$captcha_mode= getSettings('CAPTCHA_MODE');   
				if($captcha_mode){
				require_once(BASE_DIR."includes/3rdParty/vimage/vImage.php");
				$vImage = new vImage();	
				}


			$allow_extention=array('jpg','jpeg','png','pdf','docx','doc'); 	
			if($this->db->post('formSubmitted')){
	 	
				    $err = array(); 
					if($captcha_mode){
					    $vImage->loadCodes();
						if($captcha_mode && $vImage->sessionCode != $vImage->postCode){
							array_push($err,"Code Didn't Matched !! Try Again !!");
						}
					}
		  
				  
				   $user_name= $this->db->db_prepare_input($this->db->post('user_name'));
				   $user_email = $this->db->db_prepare_input($this->db->post('user_email'));
				   $user_password = $this->db->db_prepare_input($this->db->post('user_password'));
				   $user_repassword = $this->db->db_prepare_input($this->db->post('user_repassword'));
				   $user_fname= $this->db->db_prepare_input($this->db->post('user_fname'));
				   $user_mobile= $this->db->db_prepare_input($this->db->post('user_mobile'));
	  
				   // validate data now
				 
				     if(!$user_name)
					  	array_push($err,"Enter login name");
				     if(!$user_fname)
					  	array_push($err,"Enter your name");
					  if(!$user_mobile)
					  	array_push($err,"Enter contact person mobile");
				    if(!valid_email($user_email))
					  	array_push($err,"Invalid Email Provided");
					if(strlen(trim($user_password)) < 3 || strlen(trim($user_password)) > 32)
					  	array_push($err,"Password Must be between 4-32 letters long");
					if($user_password != $user_repassword)
						array_push($err,"Password not match");
					if($this->db->checkExists('users',array("user_name" => $user_name)))
					    array_push($err,"Duplicate Login Name");
					if($this->db->checkExists('users',array("user_email" => $user_email )))
					    array_push($err,"Duplicate Email");
					
					if($_FILES){
						foreach($_FILES as $file_field_name => $file_info){
							if($file_info["name"]){
							   $file_name=$file_info["name"];
							   $file_tmp_name=$file_info["tmp_name"];
							   $file_ext=strtolower(end(explode(".",$file_name)));
							   if(!in_array($file_ext,$allow_extention)){
									 array_push($err," For $file_field_name:  <em>.$file_ext</em> type of file doesn't support enter only ".implode(",",$allow_extention));
							 }
							}else{
								if($file_info["name"] !='extra_file_1' && $file_info["name"] !='extra_file_2' ){
									array_push($err," For $file_field_name:  upload your file");
								}
							}//if file name
						}//	foreach file							
					}else{
					 array_push($err,"  upload your files");
					}//if files 
					
					
					if($err){
					 $data['error'] = implode("<br />",$err);
					}else{
					 $_POST['user_rawpass']=$user_password;
					 $user_password = $this->_encode($user_password);
					 $user_ip=IP_TO_LONG($_SERVER['REMOTE_ADDR']);
                        
                    
                      $_POST['user_password']=$user_password;
                      $_POST['user_ip']=$user_ip;                        
                                                
					 $user_id = $this->db->bindPOST('users','user_id');
					 if($user_id){
					    $user_info=getUserInfo($user_id);
						$upload_dir = FILE_DIR;
						$upload_url = FILE_URL;
						
						if($_FILES){
							foreach($_FILES as $file_field_name => $file_info){
							 if($file_info["name"]){
							   $file_name=$file_info["name"];
							   $file_tmp_name=$file_info["tmp_name"];
							   $file_ext=strtolower(end(explode(".",$file_name)));
							   $new_file_name=$user_id.'_'.$file_field_name.'_'.$file_name;							
							   if(in_array($file_ext,$allow_extention)){
								   $upload_to=$upload_dir. $new_file_name;
								   //echo $file_tmp_name .'='. $upload_to;
									if(@move_uploaded_file($file_tmp_name, $upload_to)){
										$db->edit("UPDATE users SET `$file_field_name`='$new_file_name' WHERE user_id='$user_id'");
									}else{
										 $data['error'] ="Failed to upload $file_field_name";
									}
								  }
								}//if file name
							}//	foreach file
							
						}//if files 					
						 
$to_name=$user_info['user_fname'];
$to_email=$user_info['user_email'];
$company_name=$user_info['company_name'];						 
					  	
/// setting the mailer
$mailer=array();
$mailer['to_name']= $to_name;
$mailer['to_email']= $to_email;
$mailer['subject']= "Breakdown Registration & Verification";
$mailer['message']= "<b>Dear Mr. ".$to_name."</b>,<br/>
You have successfuly registered with us.<br/>
Thank You<br/>". getSettings('EMAIL_SIGNATURE');

					 	
//now check  user-verification on register is enabled or not 
if(getSettings('REGISTER_VALIDATION')){
$validate_code = create_random_value(4);
$upd_sql = "UPDATE users SET validate_code ='$validate_code', user_status ='0' WHERE user_id ='$user_id'"; //set user_status to not validated
$this->db->edit($upd_sql);
$mailer['message']= "<b>Dear Mr. ".$to_name."</b>,<br/>
You have successfuly registered with us.<br/>
Click on the link bellow to confirm your resgistration: <br/>
<a href=\"". SCRIPT_URL ."auth/verification/".$user_name ."/". $validate_code ."\" >Confirm Now</a><br/>
Or vistis the link bellow\n ". SCRIPT_URL ."auth/verification/".$user_name." and put this code: ".$validate_code."<br/>
Thank You<br/>". getSettings('EMAIL_SIGNATURE');
}//if verify required
send_emailer($mailer);					   

			 
$data['message'] = "Successfully Registered: $user_name"; 					      
					   
					 }//if user_id
				}
			 }//if submit	
    		
			
           
		   $error= $data['error'];
           $message= $data['message'];
		   
			require(COMMON_TEMPLATES.'header-common.php');
			require(TEMPLATE_STORE.$this->controller . DS .'signup.php');
			require(COMMON_TEMPLATES.'footer-common.php');
		}
        
		function signup_new(){
			global $db;

				$captcha_mode= getSettings('CAPTCHA_MODE');   
				if($captcha_mode){
				require_once(BASE_DIR."includes/3rdParty/vimage/vImage.php");
				$vImage = new vImage();	
				}


			$allow_extention=array('jpg','jpeg','png','pdf','docx','doc'); 	
			if($this->db->post('formSubmitted')){
	 	
				    $err = array(); 
					if($captcha_mode){
					    $vImage->loadCodes();
						if($captcha_mode && $vImage->sessionCode != $vImage->postCode){
							array_push($err,"Code Didn't Matched !! Try Again !!");
						}
					}
		  
				   $_POST['user_name']= $_POST['user_fname'].'-'.$_POST['company_name'];
				   $user_name= $this->db->db_prepare_input($this->db->post('user_name'));
				   $user_email = $this->db->db_prepare_input($this->db->post('user_email'));
				   $user_password = $this->db->db_prepare_input($this->db->post('user_password'));
				   $user_repassword = $this->db->db_prepare_input($this->db->post('user_repassword'));
				   $user_fname= $this->db->db_prepare_input($this->db->post('user_fname'));
				   $user_mobile= $this->db->db_prepare_input($this->db->post('user_mobile'));
	  
				   // validate data now
				     if(!$user_fname)
					  	array_push($err,"Enter contact person name");
					  if(!$user_mobile)
					  	array_push($err,"Enter contact person mobile");
				    if(!valid_email($user_email))
					  	array_push($err,"Invalid Email Provided");
					if(strlen(trim($user_password)) < 3 || strlen(trim($user_password)) > 32)
					  	array_push($err,"Password Must be between 4-32 letters long");
					if($user_password != $user_repassword)
						array_push($err,"Password not match");
					if($this->db->checkExists('users',array("user_name" => $user_name)))
					    array_push($err,"Duplicate Login Name");
					if($this->db->checkExists('users',array("user_email" => $user_email )))
					    array_push($err,"Duplicate Email");
					
					if($_FILES){
						foreach($_FILES as $file_field_name => $file_info){
							if($file_info["name"]){
							   $file_name=$file_info["name"];
							   $file_tmp_name=$file_info["tmp_name"];
							   $file_ext=strtolower(end(explode(".",$file_name)));
							   if(!in_array($file_ext,$allow_extention)){
									 array_push($err," For $file_field_name:  <em>.$file_ext</em> type of file doesn't support enter only ".implode(",",$allow_extention));
							 }
							}else{
								if($file_info["name"] !='extra_file_1' && $file_info["name"] !='extra_file_2' ){
									array_push($err," For $file_field_name:  upload your file");
								}
							}//if file name
						}//	foreach file							
					}else{
					 array_push($err,"  upload your files");
					}//if files 
					
					
					if($err){
					 $data['error'] = implode("<br />",$err);
					}else{
					 $_POST['user_rawpass']=$user_password;
					 $user_password = $this->_encode($user_password);
					 $user_ip=IP_TO_LONG($_SERVER['REMOTE_ADDR']);
                        
                    
                      $_POST['user_password']=$user_password;
                      $_POST['user_ip']=$user_ip;                        
                                                
					 $user_id = $this->db->bindPOST('users','user_id');
					 if($user_id){
					    $user_info=getUserInfo($user_id);
						$upload_dir = FILE_DIR;
						$upload_url = FILE_URL;
						
						if($_FILES){
							foreach($_FILES as $file_field_name => $file_info){
							 if($file_info["name"]){
							   $file_name=$file_info["name"];
							   $file_tmp_name=$file_info["tmp_name"];
							   $file_ext=strtolower(end(explode(".",$file_name)));
							   $new_file_name=$user_id.'_'.$file_field_name.'_'.$file_name;							
							   if(in_array($file_ext,$allow_extention)){
								   $upload_to=$upload_dir. $new_file_name;
								   //echo $file_tmp_name .'='. $upload_to;
									if(@move_uploaded_file($file_tmp_name, $upload_to)){
										$db->edit("UPDATE users SET `$file_field_name`='$new_file_name' WHERE user_id='$user_id'");
									}else{
										 $data['error'] ="Failed to upload $file_field_name";
									}
								  }
								}//if file name
							}//	foreach file
							
						}//if files 					
						 
$to_name=$user_info['user_fname'];
$to_email=$user_info['user_email'];
$company_name=$user_info['company_name'];						 
					  	
/// setting the mailer
$mailer=array();
$mailer['to_name']= $to_name;
$mailer['to_email']= $to_email;
$mailer['subject']= "Breakdown Registration & Verification";
$mailer['message']= "<b>Dear Mr. ".$to_name."</b>,<br/>
You have successfuly registered with us.<br/>
Thank You<br/>". getSettings('EMAIL_SIGNATURE');

					 	
//now check  user-verification on register is enabled or not 
if(getSettings('REGISTER_VALIDATION')){
$validate_code = create_random_value(4);
$upd_sql = "UPDATE users SET validate_code ='$validate_code', user_status ='0' WHERE user_id ='$user_id'"; //set user_status to not validated
$this->db->edit($upd_sql);
$mailer['message']= "<b>Dear Mr. ".$to_name."</b>,<br/>
You have successfuly registered with us.<br/>
Click on the link bellow to confirm your resgistration: <br/>
<a href=\"". SCRIPT_URL ."auth/verification/".$user_name ."/". $validate_code ."\" >Confirm Now</a><br/>
Or vistis the link bellow\n ". SCRIPT_URL ."auth/verification/".$user_name." and put this code: ".$validate_code."<br/>
Thank You<br/>". getSettings('EMAIL_SIGNATURE');
}//if verify required
send_emailer($mailer);					   

#send a Notify Email to Authority
$to_authority_name=getSettings('SITE_ADMIN_NAME');
$to_authority_email=getSettings('SITE_ADMIN_EMAIL');					

$mailer=array();	
$mailer['to_name']=$to_authority_name;
$mailer['to_email']=$to_authority_email;
$mailer['subject']="$company_name are successfully registered with us.";
$mailer['message']="<b>Organization Name:  $company_name<br/> 
Contact Person:  $to_name<br/> 
Designation :  ".$user_info['user_designation']."<br/> 
Contact Number: ".$user_info['user_mobile']."<br/> 
Email ID : $to_email<br/> 
</b>";
send_emailer($mailer);	
			 
$data['message'] = "Registration Success. A Confirmation email has been  sent to your E-mail"; 					      
					   
					 }//if user_id
				}
			 }//if submit	
    		
			
             
			//SHOW PAGES
			$data['contentView'] = $this->controller . DS .'signup_new.php';
			showPage($data);
		}
		
		function mywishlist($params = array()){
		  global $db;
			if(!$this->user_id){redirect('auth/login/'.base64UrlEncode(CURRENT_URL));}
             $user_info=getUserInfo($this->user_id);
         
                $online_article_title="My wish List";
        
        		 $page = isset($params['1'])?$params['1']:1;
                
                $link ='auth/mywishlist';
                
                if($_GET['delete']){
                    mysql_query("DELETE FROM `wishlist` WHERE id=".$_GET['delete']);
                    redirect($link.'/');
                }
              
                
              
                $sql_query="SELECT * FROM `wishlist` WHERE wishlist_type='articles' AND user_id=".$user_info['user_id'];
                
                $pages = make_pagination_all($sql_query,$page,20);
        		$sql_query .= " ORDER BY date(`created`) DESC ";
        		$sql_query .= " LIMIT ".$pages['start_form'].",".$pages['per_page'];
        		//echo $sql_query;
        		$onlinearticles = $db->select($sql_query);
           
        
          # echo $sql_query;
                 require(COMMON_TEMPLATES.'header.php');
                  require(TEMPLATE_STORE.'home' . DS .'wishlist.php');
    		    require(COMMON_TEMPLATES.'footer.php');	
		}
 

       
        
		function editprofile(){
			global $db;
			if(!$this->user_id){redirect('auth/login/'.base64UrlEncode(CURRENT_URL));}
            
			$user_id=$this->user_id;
        	$allow_extention=array('jpg','jpeg','png','pdf','docx','doc'); 	
			if($this->db->post('formSubmitted')){
				
					 $update = $this->db->bindPOST('users','user_id');
					
					
						$upload_dir = FILE_DIR;
						$upload_url = FILE_URL;
						
						if($_FILES){
							foreach($_FILES as $file_field_name => $file_info){
							 if($file_info["name"]){
							   $file_name=$file_info["name"];
							   $file_tmp_name=$file_info["tmp_name"];
							   $file_ext=strtolower(end(explode(".",$file_name)));
							   $new_file_name=$user_id.'_'.$file_field_name.'_'.$file_name;							
							   if(in_array($file_ext,$allow_extention)){
								   $upload_to=$upload_dir. $new_file_name;
								   //echo $file_tmp_name .'='. $upload_to;
									if(@move_uploaded_file($file_tmp_name, $upload_to)){
										$db->edit("UPDATE users SET `$file_field_name`='$new_file_name' WHERE user_id='$user_id'");
									}else{
										 $data['error'] ="Failed to upload $file_field_name";
									}
								  }
								}//if file name
							}//	foreach file
							
						}//if files 
						
					 $data['message'] = "Update Successfully";  
					 #Send Notification To Admin
								
			 }//if submit	
			
			$data['user_info'] = getUserInfo($this->user_id);
			$data['contentView'] = $this->controller . DS .'editprofile.php';
			showPage($data);
		}
		
		function changepassword(){
			@require_once(BASE_DIR.'includes/email_template.php');
			
			if(!$this->user_id){redirect('auth/login/'.base64UrlEncode(CURRENT_URL));}
			
			 if($this->db->post('formSubmitted')){
			 	$current_password = $this->db->db_prepare_input($this->db->post('current_password'));
			 	$current_password = $this->_encode($current_password);
			 	
			 	$user_old_pass=getUserPassword($this->user_id);
			 	
			 	$user_password = $this->db->db_prepare_input($this->db->post('user_password'));
				$user_rawpass = $user_password;
				$user_repassword = $this->db->db_prepare_input($this->db->post('user_repassword'));
				 $err = array(); 
				if($current_password!= $user_old_pass ){
			 		array_push($err,'Wrong Current Password'); 
			 	}elseif(strlen(trim($user_password)) < 3 || strlen(trim($user_password)) > 32){
			 		array_push($err,'Password should be at least 4 letters long');
			 	}elseif($user_password != $user_repassword){
					array_push($err,'Password and retype password do not match');
				}
					
				if($err)
				 $data['error'] = implode("<br />",$err);
				else
				{
				 $user_password = $this->_encode($user_password);
				 $user_info=getUserInfo(state('AR_user_id'));
				 $user_email = state('AR_user_email');
				 $user_name = state('AR_user_name');
			    	/*
			    	$subject = "New Account Password Information";
			  		$msg = "Dear ".$user_name.", \nYou have successfuly changed your pasword. \n New Password : ".$user_repassword."\n  visit the link for login \n ". SCRIPT_URL ."auth/login"."\n\n". getSettings('EMAIL_SIGNATURE');
					*/
                    
                     
                    $login_link=SCRIPT_URL ."auth/login";
                    $subject =MAIL_SUB_CHANGE_PASSWORD;
					$msg=sprintf(MAIL_BODY_CHANGE_PASSWORD,$user_name,$user_repassword,$login_link);
					$msg.=EMAIL_SIGNATURE;
                    
                    
					//////// setting the mailer
				    $mailer['to_name']= $user_info['user_fname'];
	                $mailer['to_email']= $user_email;
				    $mailer['subject']= $subject;
	                $mailer['message']= nl2br($msg);
	                $mailer['mailtype']= "html";
				 
					 if($this->db->edit("UPDATE users SET user_password='$user_password',user_rawpass='$user_rawpass' WHERE user_id ='".$this->user_id."'")){
					 	
						send_emailer($mailer);
					 	$data['message'] = "You have successfully changed your password and new password also sended to your mail.";
					 }
				}
			 }
			
			
			$data['contentView'] = $this->controller . DS .'changepassword.php';
			showPage($data);
		}
		
		function verification($params=false){
			@require_once(BASE_DIR.'includes/email_template.php');
			if(is_array($params)){
				$user_name=$params['0'];
				$validate_code=isset($params['1'])?$params['1']:$this->db->post('validate_code');
                            $validate_code=trim($validate_code);
				if($validate_code){
			
			      $sql = "SELECT * FROM users WHERE user_name = '".$user_name."'";
				  $user_info = $this->db->select_single($sql);
				  if(!$user_info){
				  	urlredirect(THE_URL.'auth/registration');
				  }elseif($validate_code != $user_info['validate_code']){
				  		$data['error'] = 'Worng varification code';  
				  }else{
					   $sql = "UPDATE users SET user_status ='1' WHERE user_name ='$user_name' AND validate_code ='$validate_code'";
					   if($this->db->edit($sql)){					   	
					     $data['message'] = "Congratulation! You have successfully verified your account. <a href=\"". SCRIPT_URL ."auth/login\" class='btn btn-primary'>Click here to Login Now</b></a>"; 
					   }else{
					   	$data['error'] = 'Wrong! varification code or you have aleady verified';  
					   }
				  }
				}//if varification code
			}
			$data['contentView'] = $this->controller . DS .'verification.php';
			showPage($data);
		}
		
		function resendverification(){
			
			@require_once(BASE_DIR.'includes/email_template.php');
			if($this->db->post('formSubmitted'))
			 {	
			 	
			 	$user_email=$this->db->db_prepare_input($this->db->post('user_email'));
			 	$is_valid = valid_email($user_email);
				if($is_valid){
			      $sql = "SELECT * FROM users WHERE user_email = '".$this->db->post('user_email')."'";
				  $res = $this->db->select_single($sql);
				  if($res){
				  	
				  	
					  $user_email = $res['user_email'];
					  $user_name = $res['user_name'];
					  $user_id = $res['user_id'];
					
					  	$validate_code = create_random_value(4);
				    	$upd_sql = "UPDATE users SET validate_code ='$validate_code', user_status ='0' WHERE user_id ='$user_id'"; //set user_status to not validated
				    	
				    	/*
				    	$subject = "Resend Verification Code";
				  		$msg = "Dear ".$user_name.", \nYou have successfuly registered with us. \n Click the link bellow to confirm your resgistration: \n"."<a href=\"". SCRIPT_URL ."auth/verification/".$user_name ."/". $validate_code."\" >Confirm Now</a>\n\nOr vistis the link bellow\n ". SCRIPT_URL ."auth/verification/".$user_name."\nand put this code: ".$validate_code."\n\n". getSettings('EMAIL_SIGNATURE');
						*/
                        
                        $validate_link1=SCRIPT_URL ."auth/verification/".$user_name."/".$validate_code;
                        $validate_link2=SCRIPT_URL ."auth/verification/".$user_name;
                        $subject =MAIL_SUB_VALIDATE_REGISTRATION_RESEND;
						$msg=sprintf(MAIL_BODY_VALIDATE_REGISTRATION_RESEND,$user_name,$validate_link1,$validate_link2,$validate_code);
						$msg.=EMAIL_SIGNATURE;
                        
						//////// setting the mailer
					    $mailer['to_name']= $user_name;
		                $mailer['to_email']= $user_email;
					    $mailer['subject']= $subject;
		                $mailer['message']= nl2br($msg);
		                $mailer['mailtype']= "html";
						
				    	//pre($mailer);	
					    if(send_emailer($mailer)){
						   $this->db->edit($upd_sql);
						   $data['message'] = "Thank you. Confirmation link is sent to your Email";  
				         }else{				         
				         	//echo nl2br($msg);
				         	//$this->db->edit($upd_sql);	
                            $data['error'] = 'Failed to send email.';  
				         }
					  
				  }else{
					$data['error'] = 'There is no user in the system with that email address. Please <a href="'.THE_URL.'">click here </a> to return to the home page.';  
				  }
				  
				}else{
					$data['error'] = 'Enter correct email address';  
				}
			 }
			
			$data['contentView'] = $this->controller . DS .'resend-verification.php';
			showPage($data);
		}
		
		
	function forgotpassword(){
	global $db;
	if($this->db->post('formSubmitted'))
		 {	
			$user_email=$this->db->db_prepare_input($this->db->post('user_email'));
			$is_valid = valid_email($user_email);
			if($is_valid){
			  $sql = "SELECT * FROM users WHERE user_email = '".$user_email."'";
			  $user_info=  $res = $this->db->select_single($sql);
			  if($res){
				  $email = $res['user_email'];
				  $user_name = $res['user_name'];
				  $user_rawpass = $res['user_rawpass'];
				  if(!$user_rawpass){
					 $user_rawpass = create_random_value(5);	                    
				  }
				 $new_password = $user_rawpass; 
				 $enc_password = $this->_encode($user_rawpass);
				  
				
				  $upd_sql = "UPDATE users SET user_password='$enc_password',user_rawpass='$user_rawpass' WHERE user_email = '$email' "; 
				  $this->db->edit($upd_sql);
		   
				
$to_name=$user_info['user_fname'];
$to_email=$user_info['user_email'];
$company_name=$user_info['company_name'];	
$login_link=SCRIPT_URL ."auth/login";

					
/// setting the mailer
$mailer=array();
$mailer['to_name']= $to_name;
$mailer['to_email']= $to_email;
$mailer['subject']= 'FNS24.COM PublicNews Login ID and Password';
$mailer['message']= "<p>Dear Mr. $to_name,<br/>
Your Login details.<br/>
<b>EmailID: $email<br/>
Password: $new_password</b><br/>
<br/>Visit the link for login<br/>
<b>$login_link</b><br/>
</p>
Thank You\nFNS24.COM\n";
send_emailer($mailer);
$data['message'] = 'Password has been sent to your email';
				  
			  }else{
				$data['error'] = 'There is no user in the system with that email address. Please <a href="'.SCRIPT_URL.'">click here </a> to return to the home page.';  
			  }			  
			}else{
				$data['error'] = 'Enter correct email address';  
			}
		 }
			 
			
			
			//SHOW PAGES
			//$data['contentView'] = $this->controller . DS .'password-forgotten.php';
			$data['contentView'] = $this->controller . DS .'password-forgotten_new.php';
			showPage($data);
		}
		
		function logout(){
		   global $db,$session;
           
            $user_id=state('AR_user_id');
       	$theme=state('theme');
            $user = array(
				'AR_user_id'			=> '',
				'AR_admin'				=> FALSE,    			
    			'AR_logged_in'			=> FALSE
			);		
		   

            //UPDATE USER LAST LOGIN TIME
            if($user_id){
                $sql = "UPDATE users SET `login`= '0'  WHERE user_id= ".$user_id;
                $db->edit($sql);
            }
            $this->session->sess_destroy();
	     //state('theme',$theme);
            //$this->session->set_userdata($user);
            urlredirect(SCRIPT_URL);
		}
		
        function __cookielogin(){
            global $db,$session;
             return false;
			if(isset($_COOKIE['frrm'])){
			    $user_ip=IP_TO_LONG($_SERVER['REMOTE_ADDR']);
                $frip = $_COOKIE['blrm']['blip'];
                if($user_ip == $frip){
                    $user_name = $_COOKIE['blrm']['blun'];
                    $user_password = $_COOKIE['blrm']['blup'];
        			$user_info = $db->getRowArray('users',array("user_name"=>$user_name,"user_password"=>$user_password,'user_status'=>1,'user_banned'=>0));
                    if($user_info){
                        // Set session data array
            			$user = array(						
            				'AR_user_id'			=> $user_info['user_id'],
            				'AR_user_name'			=> $user_info['user_name'],
            				'AR_email'				=> $user_info['user_email'],
            				'AR_admin'				=> FALSE,                		
                			'AR_logged_in'			=> TRUE
            			);
            			$session->set_userdata($user);
                        
        				//UPDATE USER LAST LOGIN TIME
                        if($user_info['user_id']){
                         $now=date("Y-m-d H:i:s");
                        $sql = "UPDATE users SET `user_lastlogin` = '$now', `login`= 1  WHERE user_id= ".$user_info['user_id'];
        				$db->edit($sql);
                        }
        			    return true;  
                    }
                }
			}
            
            return false;
		}
        
        
		function checkUserAuth(){
		global $db;
		
			$now=date("Y-m-d H:i:s");
                
				$user_name_email= $this->db->db_prepare_input($this->db->post('user_name_email'));
				$user_name= $this->db->db_prepare_input($this->db->post('user_name'));
				$user_email= $this->db->db_prepare_input($this->db->post('user_email'));
				
				$password=$this->db->db_prepare_input($this->db->post('user_password'));
				$user_password = $this->_encode($password);


	    #bof To prevent SQL INJECTION :: ' or 0=0 # 
		if(strpos($user_name_email, $findme='0=0') !== false){
			die('<center><font color="red" size="10"><br/><br/><br/>Don\'t try to be smart, you will be block very soon::'. $_SERVER['REMOTE_ADDR'].'<br/><br/><br/></center>');
		}
		
		if(strpos($user_name, $findme='0=0') !== false){
			die('<center><font color="red" size="10"><br/><br/><br/>Don\'t try to be smart, you will be block very soon::'. $_SERVER['REMOTE_ADDR'].'<br/><br/><br/></center>');
		}elseif(strpos($user_name, $findme="'") !== false){
			die('<center><font color="red" size="2"><br/>Invalid character <br/><br/><br/></center>');
		}
		if(strpos($user_email, $findme='0=0') !== false){
			die('<center><font color="red" size="10"><br/><br/><br/>Don\'t try to be smart, you will be block very soon::'. $_SERVER['REMOTE_ADDR'].'<br/><br/><br/></center>');
		}elseif(strpos($user_email, $findme="'") !== false){
			die('<center><font color="red" size="2"><br/>Invalid character <br/><br/><br/></center>');
		}
		#eof To prevent SQL INJECTION :: ' or 0=0 #

				
				if($user_email){
				//$login_info=array("user_email"=>$user_email,"user_password"=>$user_password);
				$sql_query="select *from users where user_email='$user_email' and `user_password`='$user_password'";
				}elseif($user_name){
				$sql_query="select *from users where user_name='$user_name' AND `user_password`='$user_password'";
				//$login_info=array("user_name"=>$user_name,"user_password"=>$user_password);
				}else{
				$sql_query="select *from users where (user_name='$user_name_email' or user_email='$user_email' ) and `user_password`='$user_password'";
				}
				//echo $sql_query;
               //$user_info = $this->db->getRowArray('users',$login_info);
                $user_info = $this->db->select_single($sql_query);
				//pre($user_info);
				if($user_info){
					
					if($user_info['user_id']!=""){
						
						if($user_info['user_status']==0)
						{
						 
						 $status['stats'] = "inactive";
						 $status['user_id'] = $user_info['user_id'];
						 $status['user_name'] = $user_info['user_name'];
						 $status['company_name'] = $user_info['company_name'];
						 return $status;	
						}
						
						if($user_info['user_banned']==1)
						{
						 $status['reason'] = $user_info['user_banned_reason'];
						 $status['stats'] = "banned";
						 $status['user_id'] = $user_info['user_id'];
						 $status['user_name'] = $user_info['user_name'];
						 $status['company_name'] = $user_info['company_name'];
						 return $status;	
						}
					
			
						//WRITE SESSION		
						$this->_set_session($user_info);
                       
                                               
                        
						//UPDATE USER LAST LOGIN TIME
                        if($user_info['user_id']){
						  $now=date("Y-m-d H:i:s");
                          $sql = "UPDATE users SET `user_lastlogin` = '$now', `login`= 1  WHERE user_id= ".$user_info['user_id'];
						  $this->db->edit($sql);    
                        }
										
						return $user_info['user_id'];
					}else{	
						$status['stats']="invalid";
						return 	$status;
					}
				}else{	
					    $status['stats']="invalid";
						return 	$status;
				}
			}
            
            
            
    	function __set_cookie($username,$password,$user_id){
       	    return ;
        	$user_ip=IP_TO_LONG($_SERVER['REMOTE_ADDR']);
            $domain='.link3.net';
            $exp_time= time()+3600*24*30;
            //bool setcookie ( string $name [, string $value [, int $expire=0 [, string $path [, string $domain [, bool $secure=false [, bool $httponly=false ]]]]]] )
	 		if($username && $password){
	 			setcookie("blrm[blip]",$user_ip,$exp_time,'/',$domain,false,false);
	 			setcookie("blrm[blun]",$username,$exp_time,'/',$domain,false,false);
	 			setcookie("blrm[blup]",$password,$exp_time,'/',$domain,false,false);
	 			setcookie("blrm[blid]",$user_id,$exp_time,'/',$domain,false,false);
	 		}
		}       
    
        
        function __delete_cookie(){
            
            $domain='.link3.net';
        	setcookie("blrm[blip]",'',1,'/',$domain);
 			setcookie("blrm[blun]",'',1,'/',$domain);
 			setcookie("blrm[blup]",'',1,'/',$domain);
 			setcookie("blrm[blid]",'',1,'/',$domain);
            setcookie("fouzder",'',1,'/',$domain);
		}
			
		function _encode($password){
			
			$majorsalt = '6174A13A7BE5995B05BA7D4C62F75B2D37DD0CFA1CF7037CAE13A37FCD5D8620';
			// if PHP5
			if (function_exists('str_split')){
				$_pass = str_split($password);
			}
			// if PHP4
			else{
			$_pass = array();
				if (is_string($password)){
					
					for ($i = 0; $i < strlen($password); $i++){
						array_push($_pass, $password[$i]);
					}
				}
			}
			
			// encrypts every single letter of the password
			foreach ($_pass as $_hashpass){
				$majorsalt .= md5($_hashpass);
			}
			
			// encrypts the string combinations of every single encrypted letter
			// and finally returns the encrypted password
			return md5($majorsalt);	
		}

		function _set_session($user_info){
            $session_id=session_id();
			// Set session data array
			$user = array(
				'AR_user_id'			=> $user_info['user_id'],
				'AR_user_name'			=> $user_info['user_name'],
				'AR_user_email'			=> $user_info['user_email'],
				'AR_user_mobile'		=> $uinfo['user_mobile'],
				'AR_public_user'		=> $uinfo['user_id'],
				'AR_session_id'			=> $session_id,
				'AR_admin'				=> FALSE,    			
    			'AR_logged_in'			=> TRUE
			);
                        
           $this->session->set_userdata($user);
		}
        
        function __set_frcookie($user){
            
            $frcookie=base64_encode(serialize($user));            
            $domain='.ewubd.edu';            
            $exp_time= time()+3600*24*30;
            if($frcookie){
	 			setcookie("fouzder",$frcookie,$exp_time,'/',$domain,false,false);
	 		}
            return true;
		}
		
	}//eof class auth
?>