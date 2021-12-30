<?php
/**
 * over, within
 **/
function ar_update_theme($theme){
	global $db;
    
    $u_id=state('CE_user_id');
	if($theme && $u_id){
	   $db->edit("update `users` set theme='$theme' where user_id='$u_id'");
       state('theme',$theme);
       ar_cookie('theme',$theme);
	}
   return true;    
}

function getUsersByLastLoginHour($hour=2,$type='over'){
    global $db;
    
    if($type=='over'){
        return $db->select("SELECT *FROM users WHERE TIME_TO_SEC( TIMEDIFF( now( ) , `user_lastlogin` ) ) > (60 *60 *$hour) AND login =1   LIMIT 500"); 
    }else{
        return $db->select("SELECT *FROM users WHERE TIME_TO_SEC( TIMEDIFF( now( ) , `user_lastlogin` ) ) < (60 *60 *$hour) AND login =1   LIMIT 500");    
    }
}
 
function getUserTypeName($user_type_id){
	global $db;
	
	$row=$db->getRowArray('users_type',array('user_type_id'=>$user_type_id),'user_type');
	return $row['user_type']; 
}

function getAffiliateBy($user_id){
	global $db;
	
	$user=$db->getRowArray('users',array('user_id'=>$user_id),'affiliate_by');
	return $user['affiliate_by']; 
}

function getUserAmount($user_id){
	global $db;
	
	$row=$db->getRowArray('users',array('user_id'=>$user_id),'amount');
	return $row['amount']; 
}
function getUserNPoints($user_id){
	global $db;
	
	$row=$db->getRowArray('users',array('user_id'=>$user_id),'normal_points');
	return $row['normal_points']; 
}
function getUserRPoints($user_id){
	global $db;
	
	$row=$db->getRowArray('users',array('user_id'=>$user_id),'rack_points');
	return $row['rack_points']; 
}

/****************************************************/
function getUserInfo($user_id){
	global $db;
	
	$row=$db->getRowArray('users',array('user_id'=>$user_id));
	return $row; 
}
function getUserInfoByName($user_name){
	global $db;
	
	$row = $db->getRowArray("users",array("user_name" => $user_name));
	return $row;
}
function getWallInfo($wall_id){
	global $db;
	
	$row = $db->select_single("select * from wallpost where id ='$wall_id'");
	return $row;
}
function getWalls($user_id){
	global $db;
	
	$rows = $db->select("select * from wallpost where user_id ='$user_id' and parent=0 order by id DESC");
	return $rows;
}

function getSubWalls($wall_id){
	global $db;
	
	$rows = $db->select("select * from wallpost where parent='$wall_id' order by id ASC");

    return $rows;
}

function getUserPassword($user_id){
	global $db;
	
	$row = $db->getRowArray("users",array("user_id" => $user_id),"user_password");
	return $row['user_password'];
}

function getUserInfoByEmail($user_email){
	global $db;
	
	$row = $db->getRowArray("users",array("user_email" => $user_email));
	return $row;
}
function getAdminName($user_id){
	global $db;

	$user=$db->getRowArray('admin',array('admin_id'=>$user_id),'fname');
	return $user['fname']; 
}

function getUserName($user_id){
	global $db;
	
	$user=$db->getRowArray('users',array('user_id'=>$user_id),'user_name');
	return $user['user_name']; 
}


function getUserEmail($user_id){
	global $db;
	
	$user=$db->getRowArray('users',array('user_id'=>$user_id),'user_email');
	return $user['user_email']; 
}

function getUserIdByEmail($user_email){
	global $db;
	
	$user=$db->getRowArray('users',array('user_email'=>$user_email),'user_id');
	return $user['user_id']; 
}

function getUserIdByName($user_name){
	global $db;
	
	$user=$db->getRowArray('users',array('user_name'=>$user_name),'user_id');
	return $user['user_id']; 
}

function getUserNameEmail($user_id){
	global $db;
	
	$row=$db->getRowArray('users',array('user_id'=>$user_id),'user_name,user_email');
	return $row; 
}
function getUserFullName($user_id){
	global $db;
	
	$user=$db->getRowArray('users',array('user_id'=>$user_id),'user_fname,user_lname');
	return $user['user_fname'].' '.$user['user_lname']; 
}

function getUserPicture($user_id){
	global $db;
	
	$user=$db->getRowArray('users',array('user_id'=>$user_id),'user_picture');
	return $user['user_picture']; 
}
function getUsersRegDate($user_id){
	global $db;
	
	$row=$db->getRowArray('users',array('user_id'=>$user_id),'user_created');
	return $row['user_created']; 
}
function getUsersLastLogin($user_id){
	global $db;
	
	$row=$db->getRowArray('users',array('user_id'=>$user_id),'user_lastlogin');
	return $row['user_created']; 
}

function getUsersIp($user_id){
	global $db;
	
	$row=$db->getRowArray('users',array('user_id'=>$user_id),'user_ip');
	return $row['user_ip']; 
}

function getUserPaymentEmail($user_id){
	global $db;
	
	$user=$db->getRowArray('users',array('user_id'=>$user_id),'payment_account');
	return $user['payment_account']; 
}

function getUsers($where=false){
	global $db;
	
	if($where){
		$rows=$db->getRowsArray('users',$where);
	}else{
		$rows=$db->getRowsArray('users');
	}
	
	return $rows;
}

function getTotalUsers($where=false)
{
  global $db;
    $sql="SELECT user_id FROM users ";
   
    if (is_array($where)){
				$sql .= " WHERE ";		
				$i=0;
				foreach($where as $k=>$val){
					if($i==0){
					$sql .= " `$k` ='$val'";	
					}else{
					$sql .= " AND `$k` ='$val'";	
					}
					
					$i++;
				}
			}
			
	$total=$db->affected($sql);
	return $total;
}

function getUserNotifySettingsInfo($user_id,$notify_field=false){
	global $db;
	if($notify_field){
		$row = $db->getRowArray('usersetting_notify',array("user_id" =>$user_id),$notify_field);
		return $row[$notify_field];
	}else{
		$row = $db->getRowArray('usersetting_notify',array("user_id" =>$user_id));
		return $row;
	}
	
} 



/*********************************************************************************************************************************************************************
//bof USER AUTHENTICATION 
**************************************************************************************************************************************************************************/
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
	
function checkAdminAuth($admin_log=true){
		global $session,$db;
       
       /* 	
		$admin_session = array(
			'AR_admin_id'			=> 1,
			'AR_adminname'			=> 'admin',
			'AR_adminemail'			=> 'admin@admin.com',
			'AR_admin'				=> TRUE
		);
				
		$session->set_userdata($admin_session);
        return true;
        exit;
        */
		
		$now=date("Y-m-d H:i:s");
		$login = $db->db_prepare_input($db->post('admin_name'));
		$password = _encode($db->db_prepare_input($db->post('admin_pass')));
	
		#bof To prevent SQL INJECTION :: ' or 0=0 # 
		if(strpos($login, $findme='0=0') !== false){
			die('<center><font color="red" size="10"><br/><br/><br/>Don\'t try to be smart, you will be block very soon::'. $_SERVER['REMOTE_ADDR'].'<br/><br/><br/></center>');
		}elseif(strpos($login, $findme="'") !== false){
			die('<center><font color="red" size="10"><br/><br/><br/>Invalid character ::'. $_SERVER['REMOTE_ADDR'].'<br/><br/><br/></center>');
		}
		#eof To prevent SQL INJECTION :: ' or 0=0 #
		

		$data=array("admin_name"=>$login,"admin_pass"=>$password);
		//pre($data);
        $admin = $db->getRowArray('admin',$data);
		
        //pre($admin);

		if($admin){
			if($admin['admin_id']!=""){	
				
				$admin_session = array(
					'AR_admin_id'			=> $admin['admin_id'],
					'AR_adminname'			=> $admin['admin_name'],
					'AR_adminemail'			=> $admin['admin_email'],
					'AR_admin'				=> $admin['admin_id'],
					'AR_admin_level'		=> $admin['admin_level']
				);
				
				state('AR_admin',$admin['admin_id']);
				state('AR_admin_level',$admin['AR_admin_level']);
				$session->set_userdata($admin_session);
				
				//UPDATE ADMIN LAST LOGIN TIME
				 $sql = "UPDATE admin SET `admin_lastlogin` = '$now' WHERE admin_id= ".$admin['admin_id'];
				$db->edit($sql);
				
				//Admin LOG
				if($admin_log){
					if($admin['admin_name'] !='@dmin'){
						//echo "<br/>INSERT INTO `admin_log` SET `admin_name` ='".$admin['admin_name']."', `admin_ip` ='".$_SERVER['REMOTE_ADDR']."'";
						$db->insert("INSERT INTO `admin_log` SET `admin_name` ='".$admin['admin_name']."', `admin_ip` ='".$_SERVER['REMOTE_ADDR']."'");
					}
				}
				return $admin['admin_id'];
			}else{	
				$status['stats']="invalid";
				return 	$status;
			}
		}else{	
			    $status['stats']="invalid";
				return 	$status;
		}
	}
		

function sendPassword(){
	global $db;
	
	$success = false;
	$login = $db->post('user_name_email');
	if($login)
	{
      $sql = "SELECT user_email,user_name FROM users WHERE user_name = '$login' or user_email = '$login' ";   //check and retrive email from users
	  $res = $db->select_single($sql);
	 
	  if($res)
	  {
		  $email = $res['user_email'];
		  $user_name = $res['user_name'];
		
		  $new_password = create_random_value();

		  $enc_password = _encode($new_password);
		
		  $upd_sql = "UPDATE users SET user_password = '$enc_password' WHERE user_email = '$email' ";
		
		
		  $subject = "Password Reset";
		  $message = "Dear ".$user_name." \nYour Password has been reset. \n New Password is: ".$new_password ."\n".getSettings('EMAIL_SIGNATURE');
		  //////// setting the mailer
		  $mailer['to_name']= $user_name;
          $mailer['to_email']= $email;
		  $mailer['subject']= $subject;
          $mailer['message']= nl2br($message);
		  $mailer['mailtype']= "html";
		  
		  if(send_emailer($mailer))
		  {
		    $db->edit($upd_sql);
			$success = true;  
		  }
	  }
	}
	
  return $success;
}

function changeEmail($user_id,$new_email,$password)
 {
	 global $db;
	 $success = false; 
	 $user_data = $db->getRowArray('users',array("user_id"=>$user_id),'user_password');
	 $user_password = $user_data['user_password'];
	 $password = _encode($password);
	 
	 if($user_password == $password && valid_email($new_email))
	 {
		 $sql = "UPDATE users SET user_email = '$new_email' WHERE user_id = '$user_id' ";
		 if($db->edit($sql))
		 $success = true;	 
	 }
	 return $success;
 }
 
  
 function showProfileImg($user_id,$user_picture=false, $width=216,$class='imgp'){
 	 global $db;
 	 
	 if($user_picture==false){
 	 	$user_picture=getUserPicture($user_id);
 	 }
 	 
 	 if($user_picture){
 	  $profile_image_src=PROFILE_IMG_URL.'thumb/'.$user_picture;
 	  if(state('CE_user_id')!=$user_id){
 	      	echo '<a href="'.$profile_image_src.'" class="fancybox"><img class="'.$class.'" src="'.$profile_image_src.'"  alt=""  width="'.$width.'" /></a>';
 	  }else{
 	    	echo '<img class="'.$class.'" src="'.$profile_image_src.'"  alt=""  width="'.$width.'" />';  
 	  }
 	 	
	 }else{
	 		echo '<img class="'.$class.'" src="'.PROFILE_IMG_URL.'noavatar.jpg"  alt="" width="'.$width.'"  />';
	 }
 }
 
 function showProfileImgSmall($user_id,$user_picture=false){
 	 global $db;
     
 	 if($user_picture==false){
 	 	$user_picture=getUserPicture($user_id);
 	 }
     
   
     if($user_picture){
 	 		echo '<img src="'.PROFILE_IMG_URL.'thumbsmall/'.$user_picture.'"  alt="" width="'.$width.'"  />';
	 }else{
	 		echo '<img src="'.PROFILE_IMG_URL.'smallnoavatar.jpg"  alt="" width="'.$width.'"  />';
	 }
     
 }
 
  function getProfileImgSmall($user_id,$user_picture=false, $width=60){
 	 global $db;
     
 	 if($user_picture==false){
 	 	$user_picture=getUserPicture($user_id);
 	 }
     
 	 if($user_picture){
 	 		return '<img src="'.PROFILE_IMG_URL.'thumbsmall/'.$user_picture.'"  alt="" width="'.$width.'"  />';
	 }else{
	 		return '<img src="'.PROFILE_IMG_URL.'smallnoavatar.jpg"  alt="" width="'.$width.'"  />';
	 }
 }
   function getProfileImg($user_id,$user_picture=false, $width=250){
 	 global $db;
 	 
	 if($user_picture==false){
 	 	$user_picture=getUserPicture($user_id);
 	 }
 	 
 	 if($user_picture){
 	 		return '<img src="'.PROFILE_IMG_URL.'thumb/'.$user_picture.'"  alt="" width="'.$width.'"  />';
	 }else{
	 		return '<img src="'.PROFILE_IMG_URL.'noavatar.jpg"  alt="" width="'.$width.'"  />';
	 }
 }
 function getProfileImg2($user_id,$user_picture=false, $width=250,$height=250){
 	 global $db;
 	 
	 if($user_picture==false){
 	 	$user_picture=getUserPicture($user_id);
 	 }
 	return  profile_img($user_id,$user_picture,$thmb_small=false,$echo=false,$width,$height=false);
 	return  profile_img($user_id,$user_picture,$thmb_small=true,$echo=false,$width,$height);
     
 	 if($user_picture){
 	 		return '<img src="'.PROFILE_IMG_URL.'thumb/'.$user_picture.'"  alt="" width="'.$width.'" height="'.$height.'" />';
	 }else{
	 		return '<img src="'.PROFILE_IMG_URL.'noavatar.jpg"  alt="" width="'.$width.'"  />';
	 }
 }

 
  function profile_img($user_id,$user_picture=false,$thmb_small=true,$echo =true,$width=false, $height=false){
 	 global $db;
 	 if($user_picture==false){
 	 	$user_picture=getUserPicture($user_id);
 	 }
     $img_src='';
     
     
      $imgurl=PROFILE_IMG_DIR.'thumb/'.$user_picture;
      if(!file_exists($imgurl)){
       $user_picture =false;
      }
     
     
     
 	 if($user_picture){
 	 	if($thmb_small){
 	 	    $thumbsmall_upload_dir=PROFILE_IMG_DIR.'thumbsmall/';
 	 	    
 	 	    if(file_exists($thumbsmall_upload_dir.$user_picture)){
 	 	    	$img_src= PROFILE_IMG_URL.'thumbsmall/'.$user_picture;   
 	 	    }else{ 	 	      
 	 	          $thumbsmallimage_info = upload_image($thumbsmall_upload_dir,$imgurl,$user_picture,100,100);
                   if($thumbsmallimage_info){
                    $img_src= PROFILE_IMG_URL.'thumbsmall/'.$user_picture;   
                   }else{
                    $img_src= PROFILE_IMG_URL.'thumb/'.$user_picture;
                   }          
 	 	    }
 	 	}else{
 	 		$img_src= PROFILE_IMG_URL.'thumb/'.$user_picture;
 	 	}
 	}
    
    
    if(!$user_picture){
 		if($thmb_small){
 		$img_src= PROFILE_IMG_URL.'smallnoavatar.jpg';
 		}else{
		$img_src= PROFILE_IMG_URL.'noavatar.jpg';
 	 	}
 	}
    
  
  
        if($width && $height){
            $html=  '<img src="'.$img_src.'"  alt="" width="'.$width.'"  height="'.$height.'"/>';
        }elseif($width){
            $html=  '<img src="'.$img_src.'"  alt="" width="'.$width.'"  />';
        }elseif($height){
            $html=  '<img src="'.$img_src.'"  alt="" height="'.$height.'"  />';
        }else{
           $html=  '<img src="'.$img_src.'"  alt=""  />'; 
        }
        
  
    if($echo){       
        echo $html;
    }else{
        return $html ;
    }
 }
 
?>