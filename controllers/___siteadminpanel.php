<?php
/**
 * RAW PHP SCRIPT
 *
 * @package		RAWPHPSCRIPT
 * @author		Aditya(bfouzder@yahoo.com).
 * @copyright	Copyright (c) 2015
 * @version 2.0
 */
	class siteadminpanel{
		
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
			$this->controller = 'siteadminpanel';
			$this->user_id = state('CE_admin_id');
			$this->member_level = state('CE_member_level');
			$this->session_id = session_id();
		}
		
		function index($params = array()){
			
			if(!$this->user_id){ $this->login();exit; }
				
			$this->dashboard();	
		}
		
		function dashboard($params = array()){
			if(!$this->user_id){ $this->login();exit; }
			
			//redirect('member');
			
			
			//SHOW PAGES
			require(ADMIN_GET_TEMPLATE_DIRECTORY.'/header.php');
			require(ADMIN_TEMPLATE_STORE.$this->controller . DS .'dashboard.php');  
			require(ADMIN_GET_TEMPLATE_DIRECTORY.'/footer.php');				
		}
		function memberManager($params = array()){
			if(!$this->user_id){ $this->login();exit; }
			global $db, $session;
		
			     
			$SHOW_TINYMCE=TRUE;$SHOW_DATEPICKER= TRUE;

			$primary_key = 'member_id';
			$table_name = 'member_directory';
			$PageTitle="Member Directory";
			$ImageType='members';
			$FileType='members';
			$allow_extention=array('jpg','jpeg','png','gif','pdf'); 	

			$page = $db->get('page');
			$page_limit=3;
			$link ="siteadminpanel/memberManager/?";
			$cat_id=$db->get_post('cat_id');


		
			$sql_query="SELECT *FROM $table_name WHERE $primary_key !='' "; 
			$pages = make_pagination($sql_query,$page,$page_limit);
			$sql_query .= " LIMIT ".$pages['start_form'].",".$pages['per_page'];
			$rows = $db->select($sql_query);
			//pre($rows );
			//pre($pages);
			
			
			
			//SHOW PAGES
			require(ADMIN_GET_TEMPLATE_DIRECTORY.'/header.php');
			require(ADMIN_TEMPLATE_STORE.$this->controller . DS .'manage_members.php');  
			require(ADMIN_GET_TEMPLATE_DIRECTORY.'/footer.php');				
		}
	
		function articleManager($params = array()){
			if(!$this->user_id){ $this->login();exit; }
			global $db, $session;
		
			     
			$SHOW_TINYMCE=TRUE;$SHOW_DATEPICKER= TRUE;

			$primary_key = 'article_id';
			$table_name = 'articles';
			$PageTitle="Articles";
			$ImageType='articles';
			$FileType='articles';
			$allow_extention=array('jpg','jpeg','png','gif','pdf'); 	

			$page = $db->get('page');
			$page_limit=3;
			$link ="siteadminpanel/articleManager/?";
			$cat_id=$db->get_post('cat_id');


			#bof get Action
				$get_action = $db->get('action');
				$article_id = $db->get('article_id');
				if($get_action){
					   
					  $qstring= substr($_SERVER['QUERY_STRING'], 0, strpos($_SERVER['QUERY_STRING'], '&action')); 
					 echo  $back_url=ADMIN_URL.'articleManager/?'.$qstring; 
						
						
						 
					switch ($get_action){
						case 'Edit':                           
							  $edit = $db->getRowArray($table_name , array($primary_key=>$article_id));
							  $file_types=explode(",",$edit['file_type']);
							  break;
						case 'Delete':
								$db->delete("DELETE FROM articles WHERE $primary_key=".$article_id);
								break;
						case 'active':
								$db->update("UPDATE articles SET active='1' WHERE $primary_key=".$article_id);    
							   
											 
								break;    	
						case 'inactive':
								$db->update("UPDATE articles SET active='0' WHERE $primary_key=".$article_id);                   
								break;
						case 'blacklisted':
							$db->update("UPDATE articles SET delicious='1' WHERE $primary_key=".$article_id);                   
							break;        
					   case 'unblacklisted':
							$db->update("UPDATE articles SET delicious='0' WHERE $primary_key=".$article_id);                   
							break;
				  
					}
					
					if($get_action!='Edit')urlredirect($back_url);				
				}
			#eof get Action
	
			#bof Form Data Entry=================
			if($db->post('formSubmitted'))
			{
			
				$article_title= $db->post('article_title');
				$file_type= $db->post('file_type');
				$cat_id= $db->post('cat_id');
				$_POST['menu_text'] =$_POST['browser_title']= $menu_text= $article_title;
				$seo_title=makeurl($menu_text);
				if($menu_text){
		  
				   $_POST['file_type'] = $file_type = implode(",",$file_type);

					//tpre($_POST);exit;
					$article_id=$_POST['article_id'];
					$_POST['seo_title']=$seo_title;
					$insert_id= $db->bindPOST($table_name , $primary_key);
					
					if($_REQUEST['article_id']){
					//  echo "UPDATE $table_name set description='$description' WHERE $primary_key=".$_REQUEST['cat_id'];
						 $description= trim($_POST['description']);  
						 $db->edit("UPDATE $table_name set description='$description' WHERE $primary_key=".$_REQUEST['article_id']);   
					}           
					#bof upload featured image
					$article_id=$db->get_post('article_id');
					$article_id=($insert_id)?$insert_id:$article_id;
					if($article_id){
						$upload_dir = IMAGE_DIR;
						$upload_url = IMAGE_URL;

						if($_FILES){
							foreach($_FILES as $file_field_name => $file_info){
							 if($file_info["name"]){
							   $file_name=$file_info["name"];
							   $file_tmp_name=$file_info["tmp_name"];
							   $file_ext=strtolower(end(explode(".",$file_name)));
							   $new_file_name=$article_id.'_'.$file_field_name.'_'.$file_name;							
							   if(in_array($file_ext,$allow_extention)){
								   $upload_to=$upload_dir. $new_file_name;
									$file_tmp_name .'='. $upload_to;
									if(@move_uploaded_file($file_tmp_name, $upload_to)){
										//echo "UPDATE articles SET `$file_field_name`='$new_file_name' WHERE article_id='$article_id'";
										$db->edit("UPDATE articles SET `$file_field_name`='$new_file_name' WHERE article_id='$article_id'");
									}else{
									echo "upload failed";	
									}
								  }
								}//if file name
							}//	foreach file
							
						}//if files	
					}
					#eof upload featured image
				
					 if($insert_id){
						$session->flashmessage('successMessage','Data has successfully been Added!');	
					 }else{
						$session->flashmessage('successMessage','Data has successfully been Updated!');	
					 }	 
				   
				   
					#bof Script LOG-----------
					if($ENABLE_SCRIPT_LOG){
						if($_POST['article_id']){
							#ADD_TO_SCRIPT_LOG
							 $log_info = 'Updated the Tender : '.$article_title;	
							 $log_text = $article_title;				 
							 addToScriptLog($type='post_tender', $type_id=$_POST['article_id'], $log_info, $log_text); 
						}else{
							 #ADD_TO_SCRIPT_LOG
							 $log_info = 'Post a New Tender : '.$article_title;	
							 $log_text = $article_title;				 
							 addToScriptLog($type='post_tender', $type_id=$article_id, $log_info, $log_text); 
						}
					}//ENABLE_SCRIPT_LOG
					#eof Script LOG-----------
				    urlredirect($back_url);
				  }else{
					   echo $error ="Category, Title can't be empty";		  	
				  }
				  
			 
			}
			#eof Form Data Entry=================
			
			
			

				
			$sql_query="SELECT *FROM $table_name WHERE $primary_key !='' "; 
			$pages = make_pagination($sql_query,$page,$page_limit);
			$sql_query .= " LIMIT ".$pages['start_form'].",".$pages['per_page'];
			$rows = $db->select($sql_query);
			//pre($rows );
			//pre($pages);
			
			
			
			//SHOW PAGES
			require(ADMIN_GET_TEMPLATE_DIRECTORY.'/header.php');
			require(ADMIN_TEMPLATE_STORE.$this->controller . DS .'manage_articles.php');  
			require(ADMIN_GET_TEMPLATE_DIRECTORY.'/footer.php');				
		}
		
		function pageManager($params = array()){
			if(!$this->user_id){ $this->login();exit; }
			global $db,$session;
		
			     
			$SHOW_TINYMCE=TRUE;$SHOW_DATEPICKER= TRUE;

			$primary_key = 'page_id';
			$table_name = 'pagemanager';
			$PageTitle="page Manager";
			$ImageType='pagemanager';
			$FileType='pagemanager';
			$allow_extention=array('jpg','jpeg','png','gif','pdf'); 	

			$page = $db->get('page');
			$page_limit=3;
			$link ="pagemanager/?";
					
			$qstring= substr($_SERVER['QUERY_STRING'], 0, strpos($_SERVER['QUERY_STRING'], '&action')); 
			$back_url=ADMIN_URL.''.$link; 


			#bof get Action

	$parent=$db->get_post('parent');
    $get_action = $db->get('action');
	$page_id = $db->get('page_id');

	
					
    switch ($get_action){


		case 'Edit':
				$page_id = $_GET['page_id'];   	
	   			$edit = $db->getRowArray($table_name , array('page_id'=>$page_id));
				break;
		case 'Delete':
				$db->delete("DELETE FROM pagemanager WHERE page_id=".$page_id);
            
				break;
		case 'active':
				$db->update("UPDATE pagemanager SET active='1' WHERE page_id=".$page_id);
         
				break;
		case 'inactive':
				$db->update("UPDATE pagemanager SET active='0' WHERE page_id=".$page_id);
     
				break;
	}
			
	if($db->post('formSubmitted'))
	{

		$page_name= $db->post('page_name');
		if($page_name){
			#pre($_POST);exit;
            
          $_POST['topbanner']=isset($_POST['topbanner'])?'1':'0';
          $_POST['rightbanner']=isset($_POST['rightbanner'])?'1':'0';
          $_POST['middlebanner']=isset($_POST['middlebanner'])?'1':'0';
          $_POST['middle_topbanner']=isset($_POST['middle_topbanner'])?'1':'0';  
            
			$insert_id=$page_id=$db->bindPOST($table_name , $primary_key);		
			if($page_id==0) $page_id = $db->post('page_id');
			 
			if($_FILES["header_image"]["name"]){
			   $upload_dir= RESOURCE_STORE.'header_images/';
			   
			   $picture_ext=end(explode(".",$_FILES["header_image"]["name"]));
			   $picture_ext=strtolower($picture_ext);
			   $picture=$page_id.'_'.$page_name.'.'.$picture_ext;
			   
			   $allow_extention=array('jpg','jpeg','gif','png');
			   if(in_array($picture_ext,$allow_extention)){ 		   
			
			   	 if(move_uploaded_file($_FILES["header_image"]["tmp_name"], $upload_dir.$picture)){ 
			   	 	$db->edit("UPDATE pagemanager SET header_image='$picture' WHERE page_id='$page_id'");
				 }		   	
			  }else{
			  	echo $error =" .$picture_ext type of Image doesn't support enter only ".implode(",",$allow_extention);		  	
			  }
			}
			if($insert_id){
				$session->flashmessage('successMessage','Data has successfully been Added!');	
			 }else{
				$session->flashmessage('successMessage','Data has successfully been Updated!');	
			 }	 
				   
			  }else{
				  echo $error ="page name can not be empty";		  	
			  }
   		 urlredirect($back_url);
	}	                   

  if($parent){
    $sql_query="SELECT *FROM `pagemanager` WHERE parent='".$parent."' ";
  } else {
    $sql_query="SELECT *FROM pagemanager ";
  }
  
//echo $sql;
  
	$pages=$db->select($sql); 
	if($db->get_post('q')){
		$q=trim($db->post('q'));
		if(is_numeric($q)){
			$sql_query .= "  where page_id='$q' ";
		}elseif(is_string($q)){
			$sql_query .= "  where page_name like '%".$db->db_input($q)."%' OR  page_title like '%".$db->db_input($q)."%'";
		}
	}                        
	
	$sql_query .=" ORDER BY  `short` ";
	$rows = $db->select($sql_query);
			
			
			
			//SHOW PAGES
			require(ADMIN_GET_TEMPLATE_DIRECTORY.'/header.php');
			require(ADMIN_TEMPLATE_STORE.$this->controller . DS .'manage_pages.php');
			require(ADMIN_GET_TEMPLATE_DIRECTORY.'/footer.php');				
		}
		
		function categoryManager($params=array(),$main_link ="siteadminpanel/categoryManager/?"){
		global $db;
		//if(!$this->admin_id){redirect('siteadminpanel/login/'.base64UrlEncode(CURRENT_URL));}
			
		$primary_key = 'cat_id';
		$table_name = 'article_categories';
		$ImageType='catarticles';


		$page = $db->get('page');
		  
		$link =$main_link;    
		$parent=$db->get_post('parent');

		$get_action = $db->get('action');
		$cat_id = $db->get('cat_id');
		if($get_action){
			
		$qstring= substr($_SERVER['QUERY_STRING'], 0, strpos($_SERVER['QUERY_STRING'], '&action')); 
		$back_url=SCRIPT_URL.$link; 

		switch ($get_action){

			case 'Edit':			 	
					$edit = $db->getRowArray($table_name , array($primary_key=>$cat_id));
					break;
			case 'Delete':
					$db->delete("DELETE FROM article_categories WHERE $primary_key=".$cat_id);
					 $result=deletImages($ImageType,$cat_id);
					$db->delete("DELETE FROM articles WHERE $primary_key=".$cat_id);
				   
					break;
			case 'active':
					$db->update("UPDATE article_categories SET active='1' WHERE $primary_key=".$cat_id);
					
					break;
			case 'inactive':
					$db->update("UPDATE article_categories SET active='0' WHERE $primary_key=".$cat_id);
					
					break;
			}

		if($get_action!='Edit')urlredirect($back_url);
		}
					
		if($db->post('formSubmitted'))
		{	
			#Assign Post value				  
			$menu_text= $db->db_prepare_input($db->post('menu_text'));
			$_POST['article_title']=$menu_text;
			$seo_title=$_POST['seo_title'];
			$seo_title=($seo_title)?$seo_title:makeurl($menu_text);
			$cat_id=$_POST['cat_id'];

			#validate Post value
			$err = array(); 
			if(!$menu_text)array_push($err,"Enter the cat name");
			if(!$seo_title)array_push($err,"Enter the seo name");
			if(!$cat_id){
				$_POST['active']='0';
				$_POST['seo_title']=$seo_title;
				if($this->db->checkExists($table_name,array("menu_text" => $menu_text)))
				array_push($err,"Category already exist");
			}
			if($err){
			 $error = implode("<br />",$err);
			}else{
				$cid= $db->bindPOST($table_name , $primary_key);
				if($cat_id){                  
					$description= trim($_POST['description']);  
					$db->edit("UPDATE $table_name set description='$description' WHERE $primary_key=".$_REQUEST['cat_id']);   
					urlredirect($back_url);
					}
				$message ="Successfully added the category";			
			}
		}	                   

		 
		//echo $sql;
		  
			$q=trim($_REQUEST['q']);
			if($q){
				$q=str_replace("\\","",$q);        
				$sql_query="SELECT * FROM `$table_name` WHERE $primary_key !='' AND menu_text LIKE '%$q%' OR seo_title LIKE '%$q%' OR description LIKE '%$q%'  ";
				$link .="q=$q&";
			}else{	   
			   $sql_query="SELECT *FROM $table_name WHERE $primary_key !='' ";       
			}
		   
			  
			if($parent){
				
			   $sql_query .= "  AND parent='$parent' ";	
			   $link .="parent=$parent&";
			}
			
			$pages = make_pagination($sql_query,$page,35);
			if(!$q){
					$sql_query .= " ORDER BY menu_order ";
			}
			
			$sql_query .= " LIMIT ".$pages['start_form'].",".$pages['per_page'];
			$rows = $db->select($sql_query);

	
			
		//SHOW PAGES
		require(COMMON_TEMPLATES.'header.php');
		require(TEMPLATE_STORE.$this->controller . DS .'manage_category.php');  
		require(COMMON_TEMPLATES.'footer.php');			
	}
		
		function addMember(){
		global $db;

			
		$error=$data['error'];
		$message=$data['message'];
		require(ADMIN_GET_TEMPLATE_DIRECTORY.'/header.php');
		require(ADMIN_TEMPLATE_STORE.$this->controller . DS .'add_member.php');  
		require(ADMIN_GET_TEMPLATE_DIRECTORY.'/footer.php');
	} 
		
		function manage_users(){
			global $db;
			
			if($this->member_level!=1){ 
			die('You don\'t have enough permission');
			//redirect($this->controller.'/login/'.base64UrlEncode(CURRENT_URL));
			}	
				
			 //SHOW PAGES
			require(ADMIN_GET_TEMPLATE_DIRECTORY.'/header.php');
			require(ADMIN_TEMPLATE_STORE.$this->controller . DS .'manage_users.php');  
			require(ADMIN_GET_TEMPLATE_DIRECTORY.'/footer.php');		
		}
		
			
		

		
#Authentication Area*****************************************************		
		
		
		
	function login($params = array()){
		global $db,$session;

		$redirect="";
		if(isset($params['0'])){
			$redirect = base64UrlDecode($params['0']);
		}    
			 
		if($this->db->post('doLogin')){
			
			 $stats = $this->checkMemberAuth(); //this fuction return an array regarding error info if user siteadminpanelentication failed
			 if(is_array($stats))
			 {
				 switch($stats['stats'])
				 {
					case "invalid":
								   $data['error'] ="Invalid Login or Password";
								   break;
					case "inactive":
								   $data['error'] ="You are still not verified, <a href=\"". SCRIPT_URL ."siteadminpanel/verification/".$stats['user_name']."\">Click here to verify</b></a>, remember a verification code was sent to your email please check that email and collect the varification code from there ,If you are still waiting to receive your verification email, <a href=\"". SCRIPT_URL ."siteadminpanel/resendverification\">click here to resend</a> it. ";
								   break;
					case "banned":
								   $data['error'] ="You are banned Please Contact the siteadminpanel";
								   $data['reason'] =$stats['reason'];
								   break;
					
				 }
				
			 }
		 }
		 $error=$data['error'];
		 
		  if(state('CE_member_id')){
			if(strstr($redirect, 'http:')){
				urlredirect($redirect);
			}else{
			  if($redirect){
				redirect($redirect);  
			  }else{
			   redirect($this->controller.'/dashboard');  
			  }
			}
		  }

	 //SHOW PAGES
		require(ADMIN_GET_TEMPLATE_DIRECTORY.'/header.php');
		require(ADMIN_TEMPLATE_STORE.$this->controller . DS .'login_new.php');  
		require(ADMIN_GET_TEMPLATE_DIRECTORY.'/footer.php');		
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
	  

			   $user_name= $this->db->db_prepare_input($this->db->post('admin_name'));
			   $user_email = $this->db->db_prepare_input($this->db->post('admin_email'));
			   $user_password = $this->db->db_prepare_input($this->db->post('user_password'));
			   $user_repassword = $this->db->db_prepare_input($this->db->post('user_repassword'));
		

  
			   // validate data now
				if(!valid_email($user_email))
					array_push($err,"Invalid Email Provided");
				if(strlen(trim($user_password)) < 3 || strlen(trim($user_password)) > 32)
					array_push($err,"Password Must be between 4-32 letters long");
				if($user_password != $user_repassword)
					array_push($err,"Password not match");
				if($this->db->checkExists('admin',array("admin_name" => $user_name)))
					array_push($err,"Duplicate Login Name");
				if($this->db->checkExists('admin',array("admin_email" => $user_email )))
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
							 array_push($err," For $file_field_name:  upload your file");
						}//if file name
					}//	foreach file							
				}
				
				
				if($err){
				 $data['error'] = implode("<br />",$err);
				}else{
				 $user_raw_password=$user_password;
				 $user_password = $this->_encode($user_password);
				 $user_ip=IP_TO_LONG($_SERVER['REMOTE_ADDR']);
					
				
				  $_POST['admin_pass']=$user_password;
				  $_POST['admin_created']=date("Y-m-d H:i:s");
				  $_POST['admin_level']=3;
											
				 $member_id = $this->db->bindPOST('admin','admin_id');
				 if($member_id){
					$user_info=$this->db->checkExists('admin',$member_id);
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
					 
$to_name=$user_info['fname'];
$to_email=$user_info['admin_email'];
				 
					
/// setting the mailer
$mailer=array();
$mailer['to_name']= $to_name;
$mailer['to_email']= $to_email;
$mailer['subject']= "Member Registration & Verification";
$mailer['message']= "<b>Dear Mr. ".$to_name."</b>,<br/>
You have successfuly registered with us.<br/>
<b>Login Information:<br/>
LoginID: $user_name<br/>
Pass: $user_raw_password<br/></b>


Thank You<br/>". getSettings('EMAIL_SIGNATURE');

					
//now check  user-verification on register is enabled or not 
send_emailer($mailer);					   

#send a Notify Email to Authority
$to_siteadminpanelority_name=getSettings('SITE_ADMIN_NAME');
$to_siteadminpanelority_email=getSettings('SITE_ADMIN_EMAIL');					

$mailer=array();	
$mailer['to_name']=$to_siteadminpanelority_name;
$mailer['to_email']=$to_siteadminpanelority_email;
$mailer['subject']="$to_name successfully registered with us.";
$mailer['message']="<b>Name:  $to_name<br/> 
Contact Number: ".$user_info['user_mobile']."<br/> 
Email ID : $to_email<br/> 
</b>";
send_emailer($mailer);	
		 
$data['message'] = "Registration Success. A Confirmation email has been  sent to your E-mail"; 					      
				   
				 }//if user_id
			}
		 }//if submit	    		
								
  
		
		$error=$data['error'];
		$message=$data['message'];
		require(ADMIN_GET_TEMPLATE_DIRECTORY.'/header.php');
		require(ADMIN_TEMPLATE_STORE.$this->controller . DS .'signup.php');  
		require(ADMIN_GET_TEMPLATE_DIRECTORY.'/footer.php');
	}      
	
	function changepassword(){
		
		if(!$this->user_id){redirect('siteadminpanel/login/'.base64UrlEncode(CURRENT_URL));}
		
		 if($this->db->post('formSubmitted')){
			$current_password = $this->db->db_prepare_input($this->db->post('current_password'));
			$current_password = $this->_encode($current_password);
			
			$member_info = $this->db->getRowArray('admin',$this->user_id);
			
			$user_old_pass=$member_info['admin_pass'];
			
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
			 $error = implode("<br />",$err);
			else
			{
			 $user_password = $this->_encode($user_password);
		
			 $member_info = $this->db->getRowArray('admin',$this->user_id);
			 $user_email =  $member_info['admin_email'];
			 $user_name =  $member_info['admin_name'];
			 $user_fname =  $member_info['fname'];
				
				$login_link=SCRIPT_URL ."siteadminpanel/login";
				$subject = "New Account Password Information";
				$msg = "Dear ".$user_fname.", \nYou have successfuly changed your pasword. \n New Password : ".$user_repassword."\n  visit the link for login \n ". $login_link."\n\n". getSettings('EMAIL_SIGNATURE');
				
									
				//////// setting the mailer
				$mailer['to_name']= $user_info['fname'];
				$mailer['to_email']= $user_email;
				$mailer['subject']= $subject;
				$mailer['message']= nl2br($msg);
				$mailer['mailtype']= "html";
			 
				 if($this->db->edit("UPDATE admin SET admin_pass='$user_password' WHERE admin_id ='".$this->user_id."'")){
					send_emailer($mailer);
					$message = "You have successfully changed your password and new password also sended to your mail.";
				 }
			}
		 }
		
	
		
	 //SHOW PAGES
		require(ADMIN_GET_TEMPLATE_DIRECTORY.'/header.php');
		require(ADMIN_TEMPLATE_STORE.$this->controller . DS .'changepassword.php');  
		require(ADMIN_GET_TEMPLATE_DIRECTORY.'/footer.php');
	}		
	
	function forgotpassword(){
	global $db;
	if($this->db->post('formSubmitted'))
		 {	
			$user_email=$this->db->db_prepare_input($this->db->post('user_email'));
			$is_valid = valid_email($user_email);
			if($is_valid){
			  $sql = "SELECT * FROM admin WHERE admin_email = '".$user_email."'";
			  $member_info=  $res = $this->db->select_single($sql);
			  if($res){				
				$admin_name = $res['admin_name'];
				$user_rawpass = create_random_value(5);	 
					
				$new_password = $user_rawpass; 
				$enc_password = $this->_encode($user_rawpass);

				$upd_sql = "UPDATE admin SET admin_pass='$enc_password' WHERE admin_email = '$user_email' "; 
				$this->db->edit($upd_sql);
		   
				
	$to_name=$member_info['fname'];
	$to_email=$member_info['admin_email'];
	$login_link=SCRIPT_URL ."siteadminpanel/login";
					
	/// setting the mailer
	$mailer=array();
	$mailer['to_name']= $to_name;
	$mailer['to_email']= $to_email;
	$mailer['subject']= 'EWU E-Tender Member Login ID and Password';
	$mailer['message']= "<p>Dear Mr. $to_name,<br/>
	Your Login details.<br/>
	<b>EmailID: $email<br/>
	Password: $new_password</b><br/>
	<br/>Visit the link for login<br/>
	<b>$login_link</b><br/>
	</p>
	Thank You\n".getSettings('EMAIL_SIGNATURE')."\n";
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
			$data['contentView'] = $this->controller . DS .'password-forgotten_new.php';
			showPage($data);
		}
	
	function logout(){
	   global $db,$session;
	   
		$user_id=state('CE_member_id');
		
		$user = array(
			'CE_member_id'			=> '',
			'CE_admin'				=> FALSE,    			
			'CE_logged_in'			=> FALSE
		);	
	   
		$this->session->sess_destroy();	    
		urlredirect(SCRIPT_URL);
	}	
   
	
	
	function checkMemberAuth(){
		global $db;
		
		$now=date("Y-m-d H:i:s");
		
				
		$user_name_email= $this->db->db_prepare_input($this->db->post('admin_name_email'));
		$user_name= $this->db->db_prepare_input($this->db->post('admin_name'));
		$user_email= $this->db->db_prepare_input($this->db->post('admin_email'));
		
		$password=$this->db->db_prepare_input($this->db->post('admin_pass'));
		$user_password = _encode($password);//from user_auth function
		//$user_password = $this->_encode($password);

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
				 $data=array("admin_email"=>$user_email,"admin_pass"=>$user_password);
				 $member_info = $this->db->getRowArray('admin',$data);
				}elseif($user_name){
				 $data=array("admin_name"=>$user_email,"admin_pass"=>$user_password);
				 $member_info = $this->db->getRowArray('admin',$data);
				}else{
				$sql_query="select *from admin where (admin_name='$user_name_email' or admin_email='$user_email' ) and `admin_pass`='$user_password'";
				$member_info = $this->db->select_single($sql_query);
				}
				
				//pre($member_info);
				if($member_info){		
					/*
						if($member_info['admin_level']==0)
						{	
						 $status['stats'] = "inactive";						
						 $status['user_name'] = $member_info['admin_name'];
						 return $status;	
						}
						
						if($member_info['admin_level']==1)
						{
						 $status['reason'] = "Invalid panel";
						 $status['stats'] = "banned";						
						 $status['user_name'] = $member_info['admin_name'];
						 return $status;	
						}
			*/
						//WRITE SESSION		
						$this->_set_member_session($member_info);
						
						//UPDATE USER LAST LOGIN TIME                  
						  $now=date("Y-m-d H:i:s");
						  $sql = "UPDATE admin SET `admin_lastlogin` = '$now'  WHERE admin_id= ".$member_info['admin_id'];
						  $this->db->edit($sql);    
															
						return $user_info['admin_id'];
					
				}else{
						$status['stats']="invalid";
						return 	$status;
				}
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

	function _set_member_session($member_info){
		$session_id=session_id();
		// Set session data array
		$member = array(
			'CE_member_id'			=> $member_info['admin_id'],
			'CE_admin_id'			=> $member_info['admin_id'],
			'CE_member_name'		=> $member_info['admin_name'],
			'CE_member_fname'		=> $member_info['fname'],
			'CE_member_level'		=> $member_info['admin_level'],
			'CE_admin_level'		=> $member_info['admin_level'],
			'CE_session_id'			=> $session_id,
			'CE_admin'				=> TRUE,    			
			'CE_logged_in'			=> TRUE
		);
					
	   $this->session->set_userdata($member);
	}
	
}//eof class siteadminpanel
?>