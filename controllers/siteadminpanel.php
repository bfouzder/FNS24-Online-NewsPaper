<?php
/**
 * AR_PHPMVC
 *
 * @package		PHPMVC_SCRIPT
 * @author		Aditya
 * @copyright	Copyright (c) 2017, TheARSoft.
 * @version 4.0
 */
	class siteadminpanel{
		
		var $db;
		var $session;
		var $user_id;
		var $admin_id;
		var $controller;
		
		function __construct()
		{
			global $lang,$db,$session;
			#load_page_lang('login');
			
			$this->db = $db;
			$this->session = $session;								
			$this->controller = 'siteadminpanel';
			$this->user_id = state('AR_admin_id'); 
			$this->admin_id = state('AR_admin_id'); 
			$this->member_level = (state('AR_admin_level'))?state('AR_admin_level'):state('AR_member_level');
			$this->session_id = session_id();
		}
		
		function index($params = array()){
			if(!$this->user_id){ $this->login();exit; }
			$this->dashboard();	
		}
		
		function dashboard($params = array()){
			if(!$this->user_id){ $this->login();exit; }
    		 global $db;
            $user_id = $this->user_id;
            $user_info = getUserInfo($user_id);
            $SHOW_DATEPICKER = true;
		

			//SHOW PAGES
			require(ADMIN_GET_TEMPLATE_DIRECTORY.'/header.php');
			require(ADMIN_TEMPLATE_STORE.$this->controller . DS .'dashboard.php');  
			require(ADMIN_GET_TEMPLATE_DIRECTORY.'/footer.php');				
		}
#Users		
	
        
        
		 function manageUsers($params = array()) {
            global $db, $session;
	        if(!$this->user_id){ $this->login();exit; }
            $SHOW_DATEPICKER = true;

            //echo ADMIN_TEMPLATE_STORE.$this->controller . DS .'users/manage_users.php';exit;
            require(ADMIN_GET_TEMPLATE_DIRECTORY . '/header.php');
            require(ADMIN_TEMPLATE_STORE .  DS . 'users' . DS . 'users_list.php');
            require(ADMIN_GET_TEMPLATE_DIRECTORY . '/footer.php');
        }
		
		 function edituser($params = array()) {
            global $db, $session;
			if(!$this->user_id){ $this->login();exit; }
		//	pre($_REQUEST); 
			 
			
		require(ADMIN_GET_TEMPLATE_DIRECTORY . '/header-common.php');
		require(ADMIN_TEMPLATE_STORE .  DS . 'users' . DS . 'editUser.php');
		require(ADMIN_GET_TEMPLATE_DIRECTORY . '/footer-common.php');
		}
        
#AdminUsers		
		 function manageAdminUsers($params = array()) {
            global $db, $session;
	        if(!$this->user_id){ $this->login();exit; }
            $SHOW_DATEPICKER = true;

            //echo ADMIN_TEMPLATE_STORE.$this->controller . DS .'users/manage_users.php';exit;
            require(ADMIN_GET_TEMPLATE_DIRECTORY . '/header.php');
            require(ADMIN_TEMPLATE_STORE . $this->controller . DS . 'manage_admin.php');
            require(ADMIN_GET_TEMPLATE_DIRECTORY . '/footer.php');
        }
			
	
        
		
        function addClient(){
            
			global $db;
			
			if($this->member_level!=1){ 
				die('You don\'t have enough permission');
				//redirect($this->controller.'/login/'.base64UrlEncode(CURRENT_URL));
			}	
			
			$actionid=$db->get('actionid');
            
            
			require(ADMIN_GET_TEMPLATE_DIRECTORY.'/header.php');
			require(ADMIN_TEMPLATE_STORE.$this->controller . DS .'add_edit_client.php');  
			require(ADMIN_GET_TEMPLATE_DIRECTORY.'/footer.php');		
		}
        function editClient(){
			global $db;
			
			if($this->member_level!=1){ 
				die('You don\'t have enough permission');
				//redirect($this->controller.'/login/'.base64UrlEncode(CURRENT_URL));
			}	
			
			$actionid=$db->get('actionid');
            
            
			require(ADMIN_GET_TEMPLATE_DIRECTORY.'/header.php');
			require(ADMIN_TEMPLATE_STORE.$this->controller . DS .'add_edit_client.php');  
			require(ADMIN_GET_TEMPLATE_DIRECTORY.'/footer.php');		
		}
        
        
    
    	function manageTopics($params=array(),$main_link ="siteadminpanel/manageTopics/?"){
		global $db;
			if(!$this->user_id){ $this->login();exit; }	
		$primary_key = 'topic_id';
		$table_name = 'topics';
		$ImageType='catarticles';


		$page = $db->get('page');
		  
		$link =$main_link;    
		$parent=$db->get_post('parent');

		$view = $db->get('view');
		$get_action = $db->get('action');
		$cat_id = $db->get('cat_id');
		$topic_id = $db->get('topic_id');
        
        $back_url=SCRIPT_URL.$main_link;
        
		if($get_action){
			
		$qstring= substr($_SERVER['QUERY_STRING'], 0, strpos($_SERVER['QUERY_STRING'], '&action')); 
	//	$back_url=SCRIPT_URL.$link; 
        

		switch ($get_action){

			case 'Edit':			 	
					$edit = $db->getRowArray($table_name , array($primary_key=>$topic_id));
					break;
			case 'Delete':
					$db->delete("DELETE FROM $table_name WHERE $primary_key=".$topic_id);
					break;
			case 'active':
					$db->update("UPDATE $table_name SET status='1' WHERE $primary_key=".$topic_id);
					break;
                    
			case 'inactive':
					$db->update("UPDATE $table_name SET status='0' WHERE $primary_key=".$topic_id);
					break;
                    
            case 'unfeatured':
                            $sql = "UPDATE $table_name SET featured = '0' WHERE $primary_key='$topic_id'"; // unfeatured
                            $db->edit($sql);
                            break; 
            case 'featured':
                            $sql = "UPDATE $table_name SET featured = '1' WHERE $primary_key='$topic_id'"; // featured
                            $db->edit($sql);
                            break;         
			}

		if($get_action!='Edit')urlredirect($back_url);
		}
	
        			
		if($db->post('formSubmitted'))
		{	
			#Assign Post value				  
			$topic_name= $db->db_prepare_input($db->post('topic_name'));
			$seo_title=$_POST['seo_title'];
			$seo_title=($seo_title)?$seo_title:makeurl($topic_name);
			$topic_id=$_POST['topic_id'];

			#validate Post value
			$err = array(); 
			if(!$topic_name)array_push($err,"Enter the Topic name");
			if(!$seo_title)array_push($err,"Enter the seo name");
            
			if(!$topic_id){
				$_POST['active']='0';
				$_POST['seo_title']=$seo_title;
				if($this->db->checkExists($table_name,array("topic_name" => $topic_name)))
				array_push($err,"Topics already exist");
			}
			if($err){
			 $error = implode("<br />",$err);
			}else{
    		                
                 if(isset($_FILES['avatar']['name']) && !empty($_FILES['avatar']['name'])){
                    $_POST['avatar']=upload_avater($image_type=$table_name, $width=213,$height=143);
                 }
                 
				$cid= $db->bindPOST($table_name , $primary_key);
				$message ="Successfully Submitted";	
                urlredirect($back_url);		
			}
		}	                   

		 
		//echo $sql;
		  
			$q=trim($_REQUEST['q']);
			if($q){
				$q=str_replace("\\","",$q);        
				$sql_query="SELECT * FROM `$table_name` WHERE $primary_key !='' AND topic_name LIKE '%$q%' OR seo_title LIKE '%$q%' ";
				$link .="q=$q&";
			}else{	   
			   $sql_query="SELECT *FROM $table_name WHERE $primary_key !='' ";       
			}
		   
			 if($view){    
                if($view=='featured'){
                     $sql_query .= "  AND `featured` =1 ";
                     $link .="view=$view&";
                }elseif($view=='pending'){          
                   $sql_query .= "  AND status='0' AND `featured` =0 ";
                    $link .="view=$view&";
                }
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

	//echo $sql_query;
			
		//SHOW PAGES
		require(ADMIN_GET_TEMPLATE_DIRECTORY. DS .'header.php');
		require(ADMIN_TEMPLATE_STORE.$this->controller . DS .'manage_topics.php');  
		require(ADMIN_GET_TEMPLATE_DIRECTORY. DS .'footer.php');			
	}    
	
    	function manageKeywords($params=array(),$main_link ="siteadminpanel/manageKeywords/?"){
		global $db;
			if(!$this->user_id){ $this->login();exit; }	
		$primary_key = 'keyword_id';
		$table_name = 'keywords';
		$ImageType='keywords';


		$page = $db->get('page');
		  
		$link =$main_link;    
		$parent=$db->get_post('parent');

		$view = $db->get('view');
		$get_action = $db->get('action');
	
		$keyword_id = $db->get('keyword_id');
        
        $back_url=SCRIPT_URL.$main_link;
        
		if($get_action){
			
		$qstring= substr($_SERVER['QUERY_STRING'], 0, strpos($_SERVER['QUERY_STRING'], '&action')); 
	//	$back_url=SCRIPT_URL.$link; 
        

		switch ($get_action){

			case 'Edit':			 	
					$edit = $db->getRowArray($table_name , array($primary_key=>$keyword_id));
					break;
			case 'Delete':
					$db->delete("DELETE FROM $table_name WHERE $primary_key=".$keyword_id);
					break;
			case 'active':
					$db->update("UPDATE $table_name SET status='1' WHERE $primary_key=".$keyword_id);
					break;
                    
			case 'inactive':
					$db->update("UPDATE $table_name SET status='0' WHERE $primary_key=".$keyword_id);
					break;
                    
            case 'unfeatured':
                            $sql = "UPDATE $table_name SET featured = '0' WHERE $primary_key='$keyword_id'"; // unfeatured
                            $db->edit($sql);
                            break; 
            case 'featured':
                            $sql = "UPDATE $table_name SET featured = '1' WHERE $primary_key='$keyword_id'"; // featured
                            $db->edit($sql);
                            break;         
			}

		if($get_action!='Edit')urlredirect($back_url);
		}
	
        			
		if($db->post('formSubmitted'))
		{	
			#Assign Post value				  
			$keyword_name= $db->db_prepare_input($db->post('keyword_name'));
			$seo_title=$_POST['seo_title'];
			$seo_title=($seo_title)?$seo_title:makeurl($keyword_name);
			$keyword_id=$_POST['keyword_id'];

			#validate Post value
			$err = array(); 
			if(!$keyword_name)array_push($err,"Enter the keyword");
			if(!$seo_title)array_push($err,"Enter the seo name");
            
			if(!$keyword_id){
				$_POST['active']='0';
				$_POST['seo_title']=$seo_title;
				if($this->db->checkExists($table_name,array("keyword_name" => $keyword_name)))
				array_push($err,"keyword  already exist");
			}
			if($err){
			 $error = implode("<br />",$err);
			}else{
    		                
                 if(isset($_FILES['avatar']['name']) && !empty($_FILES['avatar']['name'])){
                    $_POST['avatar']=upload_avater($image_type=$table_name, $width=213,$height=143);
                 }
                 
				$cid= $db->bindPOST($table_name , $primary_key);
				$message ="Successfully Submitted";	
                urlredirect($back_url);		
			}
		}	                   

		 
		//echo $sql;		  
        $q=trim($_REQUEST['q']);
        if($q){
        	$q=str_replace("\\","",$q);        
        	$sql_query="SELECT * FROM `$table_name` WHERE $primary_key !='' AND keyword_name LIKE '%$q%' OR seo_title LIKE '%$q%' ";
        	$link .="q=$q&";
        }else{	   
           $sql_query="SELECT *FROM $table_name WHERE $primary_key !='' ";       
        }
        
          if($view){    
                if($view=='featured'){
                     $sql_query .= "  AND `featured` =1 ";
                     $link .="view=$view&";
                }elseif($view=='pending'){          
                   $sql_query .= "  AND status='0' AND `featured` =0 ";
                    $link .="view=$view&";
                }
            }
            
              
			if($parent){				
			   $sql_query .= "  AND parent='$parent' ";	
			   $link .="parent=$parent&";
			}
			
			$pages = make_pagination($sql_query,$page,35);
			if(!$q){
				$sql_query .= " ORDER BY menu_order";
			}
			$sql_query .= " LIMIT ".$pages['start_form'].",".$pages['per_page'];
			$rows = $db->select($sql_query);
	//echo $sql_query;
			
		//SHOW PAGES
		require(ADMIN_GET_TEMPLATE_DIRECTORY. DS .'header.php');
		require(ADMIN_TEMPLATE_STORE.$this->controller . DS .'manage_keywords.php');  
		require(ADMIN_GET_TEMPLATE_DIRECTORY. DS .'footer.php');			
	}
    	
	function manageNewsCategory($params=array()){
	   		global $db;     
               	if(!$this->user_id){ $this->login();exit; } 
        #Assign Basic Table Info 
            $tableName='bn_bas_category';
            $primaryKey='CategoryID';
            $page = $db->get_post('page');
            $redirect_url ="siteadminpanel/manageNewsCategory/";
            $link ="siteadminpanel/manageNewsCategory/?";
            
            
            $get_action = $db->get('action');
        	$action_id = $db->get('action_id');
            	
            	
            #add/edit Table data
            	if($db->post('formSubmitted')){
            	   
            		$allow_extention=array('jpg','jpeg','png'); 
					$upload_dir = IMAGE_DIR.'catimage/';
				    $upload_url = IMAGE_URL.'catimage/';
					
		        	$_POST['parent']=($_POST['parent'])?$_POST['parent']:'0';
            		$entry_id=$db->bindPOST($tableName, $primaryKey);
                    $zone_id=($action_id)?$action_id:$entry_id;
                    if($zone_id){
                       // pre($_FILES);
                       	if($_FILES){
    						foreach($_FILES as $file_field_name => $file_info){
    						 if($file_info["name"]){
    						   $file_name=$file_info["name"];
    						   $file_tmp_name=$file_info["tmp_name"];
    						   $file_ext=strtolower(end(explode(".",$file_name)));
    						   $new_file_name=$zone_id.'_'.$file_field_name.'_'.$file_name;							
    						   if(in_array($file_ext,$allow_extention)){
    							   $upload_to=$upload_dir. $new_file_name;
    							   $image_url=$upload_url. $new_file_name;
    								if(@move_uploaded_file($file_tmp_name, $upload_to)){
    								    $db->edit("UPDATE $tableName SET `$file_field_name`='$image_url' WHERE $primaryKey='$zone_id'");
    								}
    							  }
    							}//if file name
    						}//	foreach file
    						
    					}//if files   
                    }//if news_id
                    
                    
                    if(!$get_action){
                     	redirect($redirect_url);   
                    }
            	
            	}
              
                        	
                #get/post action for list data 
                if($get_action)
                {
            		//echo '$get_action'.$get_action;
            	    switch($get_action)
            	    {
                        case 'approve':
                            echo $sql = "UPDATE $tableName SET status = '1' WHERE $primaryKey='$action_id'";
                            $db->update($sql);
                            break;
                        case 'disapprove':
                            $sql = "UPDATE $tableName SET status = '0' WHERE $primaryKey='$action_id'";
                            $db->update($sql);
                            break;
                        
                       case 'edit':
                            $edit = $db->select_single("SELECT * FROM ".$tableName." where $primaryKey=".$action_id);
                        break;	  
                        case 'delete':
                            $sql = "DELETE FROM $tableName WHERE $primaryKey='$action_id'";
                            $db->delete($sql);
                        break;	                 
            
            	    }
                    
                    if($get_action!='edit')
            	    redirect($redirect_url);
                }
            	
            	 if($db->post('formSubmittedROWS'))   ////////////manage post data
            	  {
            	  	
            	   $ids = $db->post('action_ids');
            	   $post_action = $db->post('action');
            	   
            		
            	  	if($ids)
            	  	{
            			//	echo '$post_action'.$post_action;
            	  		foreach($ids as $action_id)
            	  		{
            	  		    switch($post_action)
            	  	        {
            			  		case 'approve':
            			    	                $sql = "UPDATE $tableName SET status = '1' WHERE $primaryKey='$action_id'";
            			  		                $db->edit($sql);
            			  		                break;
            			  	   	case 'disapprove':
            			    	                $sql = "UPDATE $tableName SET status = '0' WHERE $primaryKey='$action_id'";
            			  		                $db->edit($sql);
            			  		                break;
            			  		                
            		            case 'delete':
                            					$sql = "DELETE FROM $tableName WHERE $primaryKey='$action_id'";
                            					$db->delete($sql);    
            			  		                break;            
            	  	         }	
            	  		 }
            	  	  }
            		
                  }
            	
            	
             
               #query for list of data 
                
             
             	$sql_query="SELECT * FROM $tableName WHERE $primaryKey !='' ";
                
                
                
               if($db->get_post('sparent')){
                $sparent=$db->get_post('sparent');
                $sql_query.="AND parent='$sparent'";
                $link .="sparent=$sparent&";
               }
                
                #for search
            	if($db->get_post('q')){
            		$q=$db->get_post('q');
            		if(is_numeric($q)){
            			$sql_query .= "  AND $primaryKey='$q' ";
            		}elseif(is_string($q)){
            				$sql_query .= "  AND CategoryName LIKE '%".$db->db_input($q)."%' OR CatRemarks LIKE '%".$db->db_input($q)."%' ";
            		}
            
                    $link .="sq=$q&";
            	}
                
                	                         
            	$pages = make_pagination($sql_query,$page,10);
            	$sql_query .= " ORDER BY $primaryKey DESC";
            	$sql_query .= " LIMIT ".$pages['start_form'].",".$pages['per_page'];
            	//echo $sql_query;
            	$rows = $db->select($sql_query);
            
            
       
       
       
	  	//SHOW PAGES
		require(ADMIN_GET_TEMPLATE_DIRECTORY. DS .'header.php');
		require(ADMIN_TEMPLATE_STORE.$this->controller . DS .'manage_news_categories.php');  
		require(ADMIN_GET_TEMPLATE_DIRECTORY. DS .'footer.php'); 
       
	}
    function manageZones($params=array()){
	   		global $db;      
            	if(!$this->user_id){ $this->login();exit; }
            #Assign Basic Table Info 
                $tableName='bas_district';
                $primaryKey='DistrictID';
                $page = $db->get_post('page');
                $redirect_url ="siteadminpanel/manageZones/";
                $link ="siteadminpanel/manageZones/?";
                
                
                $f_division = $db->get('f_division');
                $get_action = $db->get('action');
            	$action_id = $db->get('action_id');
                	
                    
                    
                    
                $allow_extention=array('jpg','jpeg','png'); 	
                         
                $get_action = $db->get('action');
            	$action_id = $db->get('action_id');
                	
                	
                	#add/edit Table data
                	if($db->post('formSubmitted')){
                		
    					$upload_dir = IMAGE_DIR.'zone/';
    				    $upload_url = IMAGE_URL.'zone/';
    					
    			//	pre($_POST);//exit;
    					
                		$entry_id=$db->bindPOST($tableName, $primaryKey);
                        $zone_id=($action_id)?$action_id:$entry_id;
                        if($zone_id){
                           // pre($_FILES);
                           	if($_FILES){
        						foreach($_FILES as $file_field_name => $file_info){
        						 if($file_info["name"]){
        						   $file_name=$file_info["name"];
        						   $file_tmp_name=$file_info["tmp_name"];
        						   $file_ext=strtolower(end(explode(".",$file_name)));
        						   $new_file_name=$zone_id.'_'.$file_field_name.'_'.$file_name;							
        						   if(in_array($file_ext,$allow_extention)){
        							   $upload_to=$upload_dir. $new_file_name;
        							   $image_url=$upload_url. $new_file_name;
        							    $up_img_sql="UPDATE $tableName SET `$file_field_name`='$image_url' WHERE $primaryKey='$zone_id'";
        								if(@move_uploaded_file($file_tmp_name, $upload_to)){
        								   
        								    if($db->update($up_img_sql)){
        								        echo "successfully updated the image";
        								    }else{
        								        echo "Failed to update";
        								    }
        								}else{
        								   echo "Failed: ";
        								}
        							  }
        							}//if file name
        						}//	foreach file
        						
        					}//if files   
        				//	redirect($redirect_url);   
                        }//if news_id
                        
                	   if(!$get_action){
                         	redirect($redirect_url);   
                        }
                	}
                  
                
                  
                            	
                    #get/post action for list data 
                    if($get_action)
                    {
                		//echo '$get_action'.$get_action;
                	    switch($get_action)
                	    {
                            case 'approve':
                                echo $sql = "UPDATE $tableName SET status = '1' WHERE $primaryKey='$action_id'";
                                $db->update($sql);
                                break;
                            case 'disapprove':
                                $sql = "UPDATE $tableName SET status = '0' WHERE $primaryKey='$action_id'";
                                $db->update($sql);
                                break;
                            
                           case 'edit':
                               //echo "SELECT * FROM ".$tableName." where $primaryKey=".$action_id;
                                $edit = $db->select_single("SELECT * FROM ".$tableName." where $primaryKey=".$action_id);
                                //pre($edit);
                            break;	  
                            case 'delete':
                                $sql = "DELETE FROM $tableName WHERE $primaryKey='$action_id'";
                                $db->delete($sql);
                            break;	                 
                
                	    }
                        
                        if($get_action!='edit')
                	    redirect($redirect_url);
                    }
                	
                	 if($db->post('formSubmittedROWS'))   ////////////manage post data
                	  {
                	  	
                	   $ids = $db->post('action_ids');
                	   $post_action = $db->post('action');
                	   
                		
                	  	if($ids)
                	  	{
                			//	echo '$post_action'.$post_action;
                	  		foreach($ids as $action_id)
                	  		{
                	  		    switch($post_action)
                	  	        {
                			  		case 'approve':
                			    	                $sql = "UPDATE $tableName SET status = '1' WHERE $primaryKey='$action_id'";
                			  		                $db->edit($sql);
                			  		                break;
                			  	   	case 'disapprove':
                			    	                $sql = "UPDATE $tableName SET status = '0' WHERE $primaryKey='$action_id'";
                			  		                $db->edit($sql);
                			  		                break;
                			  		                
                		            case 'delete':
                                					$sql = "DELETE FROM $tableName WHERE $primaryKey='$action_id'";
                                					$db->delete($sql);    
                			  		                break;            
                	  	         }	
                	  		 }
                	  	  }
                		
                      }
                	
                	
                 
                   #query for list of data 
                    
                 
                 	$sql_query="SELECT * FROM $tableName WHERE $primaryKey !='' ";
                    if($f_division){
                        $sparent=$db->get_post('sparent');
                        $sql_query.="AND DivisionID='$f_division'";
                        $link .="f_division=$f_division&";
                    }
                   
                   if($db->get_post('sparent')){
                    $sparent=$db->get_post('sparent');
                    $sql_query.="AND parent='$sparent'";
                    $link .="sparent=$sparent&";
                   }
                    
                    #for search
                	if($db->get_post('q')){
                		$q=$db->get_post('q');
                		if(is_numeric($q)){
                			$sql_query .= "  AND $primaryKey='$q' ";
                		}elseif(is_string($q)){
                				$sql_query .= "  AND DistrictName LIKE '%".$db->db_input($q)."%' OR DistrictNameBN LIKE '%".$db->db_input($q)."%' ";
                		}
                
                        $link .="q=$q&";
                	}
                    
                    	                         
                	$pages = make_pagination($sql_query,$page,30);
                	$sql_query .= " ORDER BY $primaryKey DESC";
                	$sql_query .= " LIMIT ".$pages['start_form'].",".$pages['per_page'];
                	//echo $sql_query;
                	$rows = $db->select($sql_query);           
           
           
    	  	//SHOW PAGES
    		require(ADMIN_GET_TEMPLATE_DIRECTORY. DS .'header.php');
    		require(ADMIN_TEMPLATE_STORE.$this->controller . DS .'manage_zones.php');  
    		require(ADMIN_GET_TEMPLATE_DIRECTORY. DS .'footer.php'); 
           
    	}
    
	
function manageTempNews($params=array()){
	   		global $db, $session;      
            	if(!$this->user_id){ $this->login();exit; }
        #Assign Basic Table Info 
            $tableName='all_news_temp';
            $primaryKey='news_id_temp';
            $page = $db->get_post('page');
            $redirect_url ="siteadminpanel/manageTempNews/";
            $link ="siteadminpanel/manageTempNews/?";
            $doaction=$db->get('doaction');
           	$allow_extention=array('jpg','jpeg','png','pdf'); 	
                     
            $get_action = $db->get('action');
        	$action_id = $db->get('action_id');
            		
            	
            	#add/edit Table data
            	if($db->post('formSubmitted')){
            		
					$upload_dir = IMAGE_DIR;
					$upload_url = IMAGE_URL;
					
			
					$_POST['DateTimeUpdated']=date('Y-m-d H:i:s');
                    $top_news=$db->post('top_news');
                    $_POST['top_news']=($top_news)?$top_news:'0'; 
                    
            		$entry_id=$db->bindPOST($tableName, $primaryKey);
                    $news_id=($action_id)?$action_id:$entry_id;
                    if($news_id){
                       // pre($_FILES);
                       	if($_FILES){
    						foreach($_FILES as $file_field_name => $file_info){
    						 if($file_info["name"]){
    						   $file_name=$file_info["name"];
    						   $file_tmp_name=$file_info["tmp_name"];
    						   $file_ext=strtolower(@end(explode(".",$file_name)));
    						   $new_file_name=$news_id.'_'.$file_field_name.'_'.$file_name;							
    						   if(in_array($file_ext,$allow_extention)){
    							   $upload_to=$upload_dir. $new_file_name;
    							   //echo $file_tmp_name .'='. $upload_to;
                                   $image_url=$upload_url. $new_file_name;
    								if(@move_uploaded_file($file_tmp_name, $upload_to)){
    								    //echo "UPDATE $tableName SET `$file_field_name`='$image_url' WHERE $primaryKey='$news_id'";
    									$db->edit("UPDATE $tableName SET `$file_field_name`='$image_url' WHERE $primaryKey='$news_id'");
    								}
    							  }
    							}//if file name
    						}//	foreach file
    						
    					}//if files   
                    }//if news_id
                    
            		if($get_action!='edit'){
						 $session->flashmessage('successMessage','News Added successfully.');
						redirect($redirect_url.'?doaction=add');	
					}
            	    
            	}
              
                        	
                #get/post action for list data 
                if($get_action)
                {
            		//echo '$get_action'.$get_action;
            	    switch($get_action)
            	    {
                        case 'approve':
                            $edit = $db->select_single("SELECT * FROM ".$tableName." where $primaryKey=".$action_id);
                            if($edit['status'] ==0){
                                $date_added=date('Y-m-d H:i:s');
                                $edit['status']=1;
                                $edit['date_added']=$date_added;
                                $edit['DateTimeUpdated']=$date_added;
                               $news_id=$db->bindPOST('all_news','news_id',$edit);
                                if($news_id){
                                $sql = "UPDATE $tableName SET status = '$news_id' WHERE $primaryKey='$action_id'";
                                $db->update($sql);   
                                }
                            }
                            break;
                        case 'disapprove':
                            $sql = "UPDATE $tableName SET status = '0' WHERE $primaryKey='$action_id'";
                            $db->update($sql);
                            break;
                        
                       case 'edit':
					       $doaction=true; 
                            $edit = $db->select_single("SELECT * FROM ".$tableName." where $primaryKey=".$action_id);
                        break;	  
                        case 'delete':
                            $sql = "DELETE FROM $tableName WHERE $primaryKey='$action_id'";
                            $db->delete($sql);
                        break;	                 
            
            	    }
                    
                    if($get_action!='edit')
            	    redirect($redirect_url);
                }
            	
            	 if($db->post('formSubmittedROWS'))   ////////////manage post data
            	  {
            	  	
            	   $ids = $db->post('action_ids');
            	   $post_action = $db->post('action');
            	   
            		
            	  	if($ids)
            	  	{
            			//	echo '$post_action'.$post_action;
            	  		foreach($ids as $action_id)
            	  		{
            	  		    switch($post_action)
            	  	        {
            			  		case 'approve':
                                    $edit = $db->select_single("SELECT * FROM ".$tableName." where $primaryKey=".$action_id);
                                    if($edit['status'] ==0){
                                         $date_added=date('Y-m-d H:i:s');
                                          $edit['status']=1;
                                         $edit['date_added']=$date_added;
                                         $edit['DateTimeUpdated']=$date_added;
                                
                                       $news_id=$db->bindPOST('all_news','news_id',$edit);
                                        if($news_id){
                                        $sql = "UPDATE $tableName SET status = '$news_id' WHERE $primaryKey='$action_id'";
                                        $db->update($sql);   
                                        }
                                    }

            			  		                break;
            			  	   	case 'disapprove':
            			    	                $sql = "UPDATE $tableName SET status = '0' WHERE $primaryKey='$action_id'";
            			  		                $db->edit($sql);
            			  		                break;
                                                
                                                
                                case 'add_top_4':
            			    	                $sql = "UPDATE $tableName SET top_news = '4' WHERE $primaryKey='$action_id'";
            			  		                $db->edit($sql);
            			  		                break;
            			  	   	case 'remove_top_4':
            			    	                $sql = "UPDATE $tableName SET top_news = '0' WHERE $primaryKey='$action_id'";
            			  		                $db->edit($sql);
            			  		                break;
                                                
                                                
                                case 'add_top_3':
            			    	                $sql = "UPDATE $tableName SET top_news = '3' WHERE $primaryKey='$action_id'";
            			  		                $db->edit($sql);
            			  		                break;
            			  	   	case 'remove_top_3':
            			    	                $sql = "UPDATE $tableName SET top_news = '0' WHERE $primaryKey='$action_id'";
            			  		                $db->edit($sql);
            			  		                break;
                               
                                 case 'add_top_2':
            			    	                $sql = "UPDATE $tableName SET top_news = '2' WHERE $primaryKey='$action_id'";
            			  		                $db->edit($sql);
            			  		                break;
            			  	   	case 'remove_top_2':
            			    	                $sql = "UPDATE $tableName SET top_news = '0' WHERE $primaryKey='$action_id'";
            			  		                $db->edit($sql);
            			  		                break;                                   
                                
                                 case 'add_to_footer_news':
            			    	                $sql = "UPDATE $tableName SET footer_news = '1' WHERE $primaryKey='$action_id'";
            			  		                $db->edit($sql);
            			  		                break;
            			  	   	case 'remove_from_footer_news':
            			    	                $sql = "UPDATE $tableName SET footer_news = '0' WHERE $primaryKey='$action_id'";
            			  		                $db->edit($sql);
            			  		                break; 
                                case 'add_to_slider':
            			    	                $sql = "UPDATE $tableName SET slider_news = '1' WHERE $primaryKey='$action_id'";
            			  		                $db->edit($sql);
            			  		                break;
            			  	   	case 'remove_from_slider':
            			    	                $sql = "UPDATE $tableName SET slider_news = '0' WHERE $primaryKey='$action_id'";
            			  		                $db->edit($sql);
            			  		                break;  
                                case 'add_to_breaking':
            			    	                $sql = "UPDATE $tableName SET breaking = '1' WHERE $primaryKey='$action_id'";
            			  		                $db->edit($sql);
            			  		                break;
            			  	   	case 'remove_from_breaking':
            			    	                $sql = "UPDATE $tableName SET breaking = '0' WHERE $primaryKey='$action_id'";
            			  		                $db->edit($sql);
            			  		                break;     
                                                                                                                                                                  
            			  	   case 'add_to_spot_light':
            			    	                $sql = "UPDATE $tableName SET spot_light = '1' WHERE $primaryKey='$action_id'";
            			  		                $db->edit($sql);
            			  		                break;
                                                
            			  	   	case 'remove_from_spot_light':
            			    	                $sql = "UPDATE $tableName SET spot_light = '0' WHERE $primaryKey='$action_id'";
            			  		                $db->edit($sql);
            			  		                break;     
                                                                  
            		            case 'delete':
                            					$sql = "DELETE FROM $tableName WHERE $primaryKey='$action_id'";
                            					//$db->delete($sql);    
            			  		                break;            
            	  	         }	
            	  		 }
            	  	  }
            		
                  }
            	
            	
             
               #query for list of data 
           $rows = array();     
           if(! $doaction){
			   
             	$sql_query="SELECT * FROM $tableName WHERE $primaryKey > 1 ";
              
               if($db->get_post('catID')){
               	 $catID=$db->get_post('catID');
                $sql_query.="AND cat_id='$catID'";
                $link .="catID=$catID&";
               }
                
                
                $filterBy=$db->get('filterBy');
                if($filterBy){
                     $link .="filterBy=$filterBy&";
                    if($filterBy == 'top_news'){
                        $position=$db->get('position');
                        	$sql_query .=" AND top_news ='$position' ";
                         $link .="position=$position&";	
                    }elseif($filterBy == 'spot_light'){
                        $sql_query .=" AND spot_light ='1' ";
                          
                    }elseif($filterBy == 'footer_news'){
                         $sql_query .=" AND footer_news ='1' ";
                    }elseif($filterBy == 'breaking'){
                        $sql_query .=" AND breaking ='1' ";
                    }elseif($filterBy == 'slider_news'){
                        $sql_query .=" AND slider_news ='1' "; 
                    }elseif($filterBy == 'footer_news'){
                        $sql_query .=" AND footer_news !='0' ";
                    }elseif($filterBy == 'waiting_for_migrate'){
                        $sql_query .=" AND status ='0' ";
                    }elseif($filterBy == 'migrated'){
                        $sql_query .=" AND status !='0' ";
                    }elseif($filterBy == 'AuthorID'){
						$author=$db->get('author');
                        $sql_query .=" AND user_id ='$author' ";
                    }
                }
                
                #for search
            	if($db->get_post('q')){
            		$q=$db->get_post('q');
            		if(is_numeric($q)){
            			$sql_query .= "  AND $primaryKey='$q' ";
            		}elseif(is_string($q)){
            				$sql_query .= "  AND news_title LIKE '%".$db->db_input($q)."%' OR news_details LIKE '%".$db->db_input($q)."%' ";
            		}
            
                    $link .="sq=$q&";
            	}
                
                                       
            	$pages = make_pagination($sql_query,$page,10);
                 //pre($pages);	 
            	$sql_query .= " ORDER BY $primaryKey DESC";
            	$sql_query .= " LIMIT ".$pages['start_form'].",".$pages['per_page'];
            //	echo $sql_query;
            	$rows = $db->select($sql_query);
            
		   }
       
       
       
	  	//SHOW PAGES
		require(ADMIN_GET_TEMPLATE_DIRECTORY. DS .'header.php');
		require(ADMIN_TEMPLATE_STORE.$this->controller . DS .'manage_news_temp.php');  
		require(ADMIN_GET_TEMPLATE_DIRECTORY. DS .'footer.php'); 
       
	}

    function manageBooks($params=array()){
			global $db, $session;      
            	if(!$this->user_id){ $this->login();exit; }
        #Assign Basic Table Info 
            $tableName='all_news';
            $primaryKey='news_id';
            $page = $db->get_post('page');
            $redirect_url ="siteadminpanel/manageBooks/";
            $link ="siteadminpanel/manageBooks/?";
            $doaction=$db->get('doaction');
           	$allow_extention=array('jpg','jpeg','png','pdf'); 	
                     
            $get_action = $db->get('action');
        	$action_id = $db->get('action_id');
            		
            	
            	#add/edit Table data
            	if($db->post('formSubmitted')){
            		
					$upload_dir = IMAGE_DIR;
					$upload_url = IMAGE_URL;

					$upload_dir_book = RESOURCE_STORE.'books/';
					$upload_url_book = WWW_RESOURCE_STORE.'books/';
					
			        $top_news=$db->post('top_news');
			        $_POST['top_news']=($top_news)?$top_news:'0'; 
                    $_POST['DistrictID']=($_POST['DistrictID'])?$_POST['DistrictID']:'0'; 
					$_POST['DateTimeUpdated']=date('Y-m-d H:i:s');
					
					if($action_id){
					  $_POST['updated_by']=$this->user_id;  //from table admin
					}else{
					  $_POST['uploaded_by']=$this->user_id;    
					}
					
            		$entry_id=$db->bindPOST($tableName, $primaryKey);
                    $news_id=($action_id)?$action_id:$entry_id;
                    if($news_id){
                       // pre($_FILES);
                       	if($_FILES){
    						foreach($_FILES as $file_field_name => $file_info){
    						 if($file_info["name"]){
    						   $file_name=$file_info["name"];
    						   $file_tmp_name=$file_info["tmp_name"];
    						   $file_ext=strtolower(@end(explode(".",$file_name)));
    						   $new_file_name=$news_id.'_'.$file_field_name.'_'.$file_name;		
							   if($file_field_name =='book_pdf'){
								$upload_dir = $upload_dir_book;
								$upload_url = $upload_url_book;
							   }
							   
    						   if(in_array($file_ext,$allow_extention)){
    							   $upload_to=$upload_dir. $new_file_name;
    							   //echo $file_tmp_name .'='. $upload_to;
                                   $image_url=$upload_url. $new_file_name;
    								if(@move_uploaded_file($file_tmp_name, $upload_to)){
    								    //echo "UPDATE $tableName SET `$file_field_name`='$image_url' WHERE $primaryKey='$news_id'";
    									$db->edit("UPDATE $tableName SET `$file_field_name`='$image_url' WHERE $primaryKey='$news_id'");
    								}
    							  }
    							}//if file name
    						}//	foreach file
    						
    					}//if files   
                    }//if news_id
                    
            		if($get_action!='edit'){
						 $session->flashmessage('successMessage','Book Added successfully.'. $news_id);
						redirect($redirect_url.'?doaction=add');	
					}
            	    
            	}
              
                        	
                #get/post action for list data 
                if($get_action)
                {
            		//echo '$get_action'.$get_action;
            	    switch($get_action)
            	    {
                        case 'approve':
                            echo $sql = "UPDATE $tableName SET status = '1' WHERE $primaryKey='$action_id'";
                            $db->update($sql);
                            break;
                        case 'disapprove':
                            $sql = "UPDATE $tableName SET status = '0' WHERE $primaryKey='$action_id'";
                            $db->update($sql);
                            break;
                        
                       case 'edit':
					       $doaction=true; 
                            $edit = $db->select_single("SELECT * FROM ".$tableName." where $primaryKey=".$action_id);
                        break;	  
                        case 'delete':
                            $sql = "DELETE FROM $tableName WHERE $primaryKey='$action_id'";
                            $db->delete($sql);
                        break;	                 
            
            	    }
                    
                    if($get_action!='edit')
            	    redirect($redirect_url);
                }
            	
            	 if($db->post('formSubmittedROWS'))   ////////////manage post data
            	  {
            	  	
            	   $ids = $db->post('action_ids');
            	   $post_action = $db->post('action');
            	   
            		
            	  	if($ids)
            	  	{
            			//	echo '$post_action'.$post_action;
            	  		foreach($ids as $action_id)
            	  		{
            	  		    switch($post_action)
            	  	        {
            			  		case 'approve':
            			    	                $sql = "UPDATE $tableName SET status = '1' WHERE $primaryKey='$action_id'";
            			  		                $db->edit($sql);
            			  		                break;
            			  	   	case 'disapprove':
            			    	                $sql = "UPDATE $tableName SET status = '0' WHERE $primaryKey='$action_id'";
            			  		                $db->edit($sql);
            			  		                break;
                                                
                                case 'add_top_16':
            			    	                $sql = "UPDATE $tableName SET top_news = '16' WHERE $primaryKey='$action_id'";
            			  		                $db->edit($sql);
            			  		                break;
            			  	   	case 'remove_top_16':
            			    	                $sql = "UPDATE $tableName SET top_news = '0' WHERE $primaryKey='$action_id'";
            			  		                $db->edit($sql);
            			  		                break;
												
                                case 'add_top_4':
            			    	                $sql = "UPDATE $tableName SET top_news = '4' WHERE $primaryKey='$action_id'";
            			  		                $db->edit($sql);
            			  		                break;
            			  	   	case 'remove_top_4':
            			    	                $sql = "UPDATE $tableName SET top_news = '0' WHERE $primaryKey='$action_id'";
            			  		                $db->edit($sql);
            			  		                break;
                                                
                                                
                                case 'add_top_3':
            			    	                $sql = "UPDATE $tableName SET top_news = '3' WHERE $primaryKey='$action_id'";
            			  		                $db->edit($sql);
            			  		                break;
            			  	   	case 'remove_top_3':
            			    	                $sql = "UPDATE $tableName SET top_news = '0' WHERE $primaryKey='$action_id'";
            			  		                $db->edit($sql);
            			  		                break;
                               
                                 case 'add_top_2':
            			    	                $sql = "UPDATE $tableName SET top_news = '2' WHERE $primaryKey='$action_id'";
            			  		                $db->edit($sql);
            			  		                break;
            			  	   	case 'remove_top_2':
            			    	                $sql = "UPDATE $tableName SET top_news = '0' WHERE $primaryKey='$action_id'";
            			  		                $db->edit($sql);
            			  		                break;                                   
                                
                                 case 'add_to_footer_news':
            			    	                $sql = "UPDATE $tableName SET footer_news = '1' WHERE $primaryKey='$action_id'";
            			  		                $db->edit($sql);
            			  		                break;
            			  	   	case 'remove_from_footer_news':
            			    	                $sql = "UPDATE $tableName SET footer_news = '0' WHERE $primaryKey='$action_id'";
            			  		                $db->edit($sql);
            			  		                break; 
                                case 'add_to_slider':
            			    	                $sql = "UPDATE $tableName SET slider_news = '1' WHERE $primaryKey='$action_id'";
            			  		                $db->edit($sql);
            			  		                break;
            			  	   	case 'remove_from_slider':
            			    	                $sql = "UPDATE $tableName SET slider_news = '0' WHERE $primaryKey='$action_id'";
            			  		                $db->edit($sql);
            			  		                break;  
                                case 'add_to_breaking':
            			    	                $sql = "UPDATE $tableName SET breaking = '1' WHERE $primaryKey='$action_id'";
            			  		                $db->edit($sql);
            			  		                break;
            			  	   	case 'remove_from_breaking':
            			    	                $sql = "UPDATE $tableName SET breaking = '0' WHERE $primaryKey='$action_id'";
            			  		                $db->edit($sql);
            			  		                break;     
                                                                                                                                                                  
            			  	   case 'add_to_spot_light':
            			    	                $sql = "UPDATE $tableName SET spot_light = '1' WHERE $primaryKey='$action_id'";
            			  		                $db->edit($sql);
            			  		                break;
                                                
            			  	   	case 'remove_from_spot_light':
            			    	                $sql = "UPDATE $tableName SET spot_light = '0' WHERE $primaryKey='$action_id'";
            			  		                $db->edit($sql);
            			  		                break;     
                                                                  
            		            case 'delete':
                            					$sql = "DELETE FROM $tableName WHERE $primaryKey='$action_id'";
                            					//$db->delete($sql);    
            			  		                break;            
            	  	         }	
            	  		 }
            	  	  }
            		
                  }
            	
            	
             
               #query for list of data 
           $rows = array();     
           if(! $doaction){
			   
             	$sql_query="SELECT * FROM $tableName WHERE $primaryKey > 1 ";
              
               if($db->get_post('catID')){
               	 $catID=$db->get_post('catID');
                $sql_query.="AND cat_id='$catID'";
                $link .="catID=$catID&";
               }else{
				$sql_query.="AND cat_id IN(20,23,24,25)";
			   }
               
				if($db->get_post('uploaderID')){
               	 $uploaderID=$db->get_post('uploaderID');
                $sql_query.="AND uploaded_by='$uploaderID'";
                $link .="uploaderID=$uploaderID&";
               }
			   
                #for search
            	if($db->get_post('q')){
            		$q=$db->get_post('q');
            		if(is_numeric($q)){
            			$sql_query .= "  AND $primaryKey='$q' ";
            		}elseif(is_string($q)){
            				$sql_query .= "  AND news_title LIKE '%".$db->db_input($q)."%' OR news_details LIKE '%".$db->db_input($q)."%' ";
            		}
            
                    $link .="sq=$q&";
            	}
            	
                $filterBy=$db->get('filterBy');
                if($filterBy){
                     $link .="filterBy=$filterBy&";
                    if($filterBy == 'top_news'){
                        $position=$db->get('position');
                        	$sql_query .=" AND top_news ='$position' ";
                         $link .="position=$position&";	
                    }elseif($filterBy == 'spot_light'){
                        $sql_query .=" AND spot_light ='1' ";
                          
                    }elseif($filterBy == 'footer_news'){
                         $sql_query .=" AND footer_news ='1' ";
                    }elseif($filterBy == 'breaking'){
                        $sql_query .=" AND breaking ='1' ";
                    }elseif($filterBy == 'slider_news'){
                        $sql_query .=" AND slider_news ='1' "; 
                    }elseif($filterBy == 'footer_news'){
                        $sql_query .=" AND footer_news !='0' ";
                    }
                }else{
                
                    if(!$db->get_post('q')){
                      //  $sql_query .=" AND news_id >150000 ";  
                      
                     //$total_query= str_replace('*', 'count(news_id) as total_data_count',$sql_query);
                    }
                
                } 
                
               // echo 'ffff'. $total_query;
                $total_query= str_replace('*', 'count(news_id) as total_data_count',$sql_query);
                $total_data = $db->select_single($total_query);
                $total_data_count=$total_data['total_data_count'];
               // echo '<br/>$total_data_count ='.$total_data_count;
               // echo $sql_query;
                //exit;
                                       
            	$pages = make_pagination($sql_query,$page,10, $total_data_count);
                 //pre($pages);	 
            	$sql_query .= " ORDER BY $primaryKey DESC";
            	$sql_query .= " LIMIT ".$pages['start_form'].",".$pages['per_page'];
            //	echo $sql_query;
            	$rows = $db->select($sql_query);
            
		   }
       
       
       
	  	//SHOW PAGES
		require(ADMIN_GET_TEMPLATE_DIRECTORY. DS .'header.php');
		require(ADMIN_TEMPLATE_STORE.$this->controller . DS .'manage_books_home.php');  
		require(ADMIN_GET_TEMPLATE_DIRECTORY. DS .'footer.php'); 
		}

    	function manageNews($params=array()){
	   		global $db, $session;      
            	if(!$this->user_id){ $this->login();exit; }
        #Assign Basic Table Info 
            $tableName='all_news';
            $primaryKey='news_id';
            $page = $db->get_post('page');
            $redirect_url ="siteadminpanel/manageNews/";
            $link ="siteadminpanel/manageNews/?";
            $doaction=$db->get('doaction');
           	$allow_extention=array('jpg','jpeg','png','pdf'); 	
                     
            $get_action = $db->get('action');
        	$action_id = $db->get('action_id');
            		
            	
            	#add/edit Table data
            	if($db->post('formSubmitted')){
            		
					$upload_dir = IMAGE_DIR;
					$upload_url = IMAGE_URL;
					
			        $top_news=$db->post('top_news');
			        $_POST['top_news']=($top_news)?$top_news:'0'; 
                    $_POST['DistrictID']=($_POST['DistrictID'])?$_POST['DistrictID']:'0'; 
					$_POST['DateTimeUpdated']=date('Y-m-d H:i:s');
					
					if($action_id){
					  $_POST['updated_by']=$this->user_id;  //from table admin
					}else{
					  $_POST['uploaded_by']=$this->user_id;    
					}
					
            		$entry_id=$db->bindPOST($tableName, $primaryKey);
                    $news_id=($action_id)?$action_id:$entry_id;
                    if($news_id){
                       // pre($_FILES);
                       	if($_FILES){
    						foreach($_FILES as $file_field_name => $file_info){
    						 if($file_info["name"]){
    						   $file_name=$file_info["name"];
    						   $file_tmp_name=$file_info["tmp_name"];
    						   $file_ext=strtolower(@end(explode(".",$file_name)));
    						   $new_file_name=$news_id.'_'.$file_field_name.'_'.$file_name;							
    						   if(in_array($file_ext,$allow_extention)){
    							   $upload_to=$upload_dir. $new_file_name;
    							   //echo $file_tmp_name .'='. $upload_to;
                                   $image_url=$upload_url. $new_file_name;
    								if(@move_uploaded_file($file_tmp_name, $upload_to)){
    								    //echo "UPDATE $tableName SET `$file_field_name`='$image_url' WHERE $primaryKey='$news_id'";
    									$db->edit("UPDATE $tableName SET `$file_field_name`='$image_url' WHERE $primaryKey='$news_id'");
    								}
    							  }
    							}//if file name
    						}//	foreach file
    						
    					}//if files   
                    }//if news_id
                    
            		if($get_action!='edit'){
						 $session->flashmessage('successMessage','News Added successfully.');
						redirect($redirect_url.'?doaction=add');	
					}
            	    
            	}
              
                        	
                #get/post action for list data 
                if($get_action)
                {
            		//echo '$get_action'.$get_action;
            	    switch($get_action)
            	    {
                        case 'approve':
                            echo $sql = "UPDATE $tableName SET status = '1' WHERE $primaryKey='$action_id'";
                            $db->update($sql);
                            break;
                        case 'disapprove':
                            $sql = "UPDATE $tableName SET status = '0' WHERE $primaryKey='$action_id'";
                            $db->update($sql);
                            break;
                        
                       case 'edit':
					       $doaction=true; 
                            $edit = $db->select_single("SELECT * FROM ".$tableName." where $primaryKey=".$action_id);
                        break;	  
                        case 'delete':
                            $sql = "DELETE FROM $tableName WHERE $primaryKey='$action_id'";
                            $db->delete($sql);
                        break;	                 
            
            	    }
                    
                    if($get_action!='edit')
            	    redirect($redirect_url);
                }
            	
            	 if($db->post('formSubmittedROWS'))   ////////////manage post data
            	  {
            	  	
            	   $ids = $db->post('action_ids');
            	   $post_action = $db->post('action');
            	   
            		
            	  	if($ids)
            	  	{
            			//	echo '$post_action'.$post_action;
            	  		foreach($ids as $action_id)
            	  		{
            	  		    switch($post_action)
            	  	        {
            			  		case 'approve':
            			    	                $sql = "UPDATE $tableName SET status = '1' WHERE $primaryKey='$action_id'";
            			  		                $db->edit($sql);
            			  		                break;
            			  	   	case 'disapprove':
            			    	                $sql = "UPDATE $tableName SET status = '0' WHERE $primaryKey='$action_id'";
            			  		                $db->edit($sql);
            			  		                break;
                                                
                                case 'add_top_16':
            			    	                $sql = "UPDATE $tableName SET top_news = '16' WHERE $primaryKey='$action_id'";
            			  		                $db->edit($sql);
            			  		                break;
            			  	   	case 'remove_top_16':
            			    	                $sql = "UPDATE $tableName SET top_news = '0' WHERE $primaryKey='$action_id'";
            			  		                $db->edit($sql);
            			  		                break;
												
                                case 'add_top_4':
            			    	                $sql = "UPDATE $tableName SET top_news = '4' WHERE $primaryKey='$action_id'";
            			  		                $db->edit($sql);
            			  		                break;
            			  	   	case 'remove_top_4':
            			    	                $sql = "UPDATE $tableName SET top_news = '0' WHERE $primaryKey='$action_id'";
            			  		                $db->edit($sql);
            			  		                break;
                                                
                                                
                                case 'add_top_3':
            			    	                $sql = "UPDATE $tableName SET top_news = '3' WHERE $primaryKey='$action_id'";
            			  		                $db->edit($sql);
            			  		                break;
            			  	   	case 'remove_top_3':
            			    	                $sql = "UPDATE $tableName SET top_news = '0' WHERE $primaryKey='$action_id'";
            			  		                $db->edit($sql);
            			  		                break;
                               
                                 case 'add_top_2':
            			    	                $sql = "UPDATE $tableName SET top_news = '2' WHERE $primaryKey='$action_id'";
            			  		                $db->edit($sql);
            			  		                break;
            			  	   	case 'remove_top_2':
            			    	                $sql = "UPDATE $tableName SET top_news = '0' WHERE $primaryKey='$action_id'";
            			  		                $db->edit($sql);
            			  		                break;                                   
                                
                                 case 'add_to_footer_news':
            			    	                $sql = "UPDATE $tableName SET footer_news = '1' WHERE $primaryKey='$action_id'";
            			  		                $db->edit($sql);
            			  		                break;
            			  	   	case 'remove_from_footer_news':
            			    	                $sql = "UPDATE $tableName SET footer_news = '0' WHERE $primaryKey='$action_id'";
            			  		                $db->edit($sql);
            			  		                break; 
                                case 'add_to_slider':
            			    	                $sql = "UPDATE $tableName SET slider_news = '1' WHERE $primaryKey='$action_id'";
            			  		                $db->edit($sql);
            			  		                break;
            			  	   	case 'remove_from_slider':
            			    	                $sql = "UPDATE $tableName SET slider_news = '0' WHERE $primaryKey='$action_id'";
            			  		                $db->edit($sql);
            			  		                break;  
                                case 'add_to_breaking':
            			    	                $sql = "UPDATE $tableName SET breaking = '1' WHERE $primaryKey='$action_id'";
            			  		                $db->edit($sql);
            			  		                break;
            			  	   	case 'remove_from_breaking':
            			    	                $sql = "UPDATE $tableName SET breaking = '0' WHERE $primaryKey='$action_id'";
            			  		                $db->edit($sql);
            			  		                break;     
                                                                                                                                                                  
            			  	   case 'add_to_spot_light':
            			    	                $sql = "UPDATE $tableName SET spot_light = '1' WHERE $primaryKey='$action_id'";
            			  		                $db->edit($sql);
            			  		                break;
                                                
            			  	   	case 'remove_from_spot_light':
            			    	                $sql = "UPDATE $tableName SET spot_light = '0' WHERE $primaryKey='$action_id'";
            			  		                $db->edit($sql);
            			  		                break;     
                                                                  
            		            case 'delete':
                            					$sql = "DELETE FROM $tableName WHERE $primaryKey='$action_id'";
                            					//$db->delete($sql);    
            			  		                break;            
            	  	         }	
            	  		 }
            	  	  }
            		
                  }
            	
            	
             
               #query for list of data 
           $rows = array();     
           if(! $doaction){
			   
             	$sql_query="SELECT * FROM $tableName WHERE $primaryKey > 1 ";
              
               if($db->get_post('catID')){
               	 $catID=$db->get_post('catID');
                $sql_query.="AND cat_id='$catID'";
                $link .="catID=$catID&";
               }
               
				if($db->get_post('uploaderID')){
               	 $uploaderID=$db->get_post('uploaderID');
                $sql_query.="AND uploaded_by='$uploaderID'";
                $link .="uploaderID=$uploaderID&";
               }
			   
                #for search
            	if($db->get_post('q')){
            		$q=$db->get_post('q');
            		if(is_numeric($q)){
            			$sql_query .= "  AND $primaryKey='$q' ";
            		}elseif(is_string($q)){
            				$sql_query .= "  AND news_title LIKE '%".$db->db_input($q)."%' OR news_details LIKE '%".$db->db_input($q)."%' ";
            		}
            
                    $link .="sq=$q&";
            	}
            	
                $filterBy=$db->get('filterBy');
                if($filterBy){
                     $link .="filterBy=$filterBy&";
                    if($filterBy == 'top_news'){
                        $position=$db->get('position');
                        	$sql_query .=" AND top_news ='$position' ";
                         $link .="position=$position&";	
                    }elseif($filterBy == 'spot_light'){
                        $sql_query .=" AND spot_light ='1' ";
                          
                    }elseif($filterBy == 'footer_news'){
                         $sql_query .=" AND footer_news ='1' ";
                    }elseif($filterBy == 'breaking'){
                        $sql_query .=" AND breaking ='1' ";
                    }elseif($filterBy == 'slider_news'){
                        $sql_query .=" AND slider_news ='1' "; 
                    }elseif($filterBy == 'footer_news'){
                        $sql_query .=" AND footer_news !='0' ";
                    }
                }else{
                
                    if(!$db->get_post('q')){
                      //  $sql_query .=" AND news_id >150000 ";  
                      
                     //$total_query= str_replace('*', 'count(news_id) as total_data_count',$sql_query);
                    }
                
                } 
                
               // echo 'ffff'. $total_query;
                $total_query= str_replace('*', 'count(news_id) as total_data_count',$sql_query);
                $total_data = $db->select_single($total_query);
                $total_data_count=$total_data['total_data_count'];
               // echo '<br/>$total_data_count ='.$total_data_count;
                //echo $sql_query;
                //exit;
                                       
            	$pages = make_pagination($sql_query,$page,10, $total_data_count);
                 //pre($pages);	 
            	$sql_query .= " ORDER BY $primaryKey DESC";
            	$sql_query .= " LIMIT ".$pages['start_form'].",".$pages['per_page'];
            //	echo $sql_query;
            	$rows = $db->select($sql_query);
            
		   }
       
       
       
	  	//SHOW PAGES
		require(ADMIN_GET_TEMPLATE_DIRECTORY. DS .'header.php');
		require(ADMIN_TEMPLATE_STORE.$this->controller . DS .'manage_news.php');  
		require(ADMIN_GET_TEMPLATE_DIRECTORY. DS .'footer.php'); 
       
	}
    
    
	function manageCategory($params=array(),$main_link ="siteadminpanel/manageCategory/?"){
		global $db;
			if(!$this->user_id){ $this->login();exit; }	
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
			$cat_name= $db->db_prepare_input($db->post('cat_name'));
            $parentId = $db->post('parent');
			$_POST['article_title']=$cat_name;
			$seo_title=$_POST['seo_title'];
			$seo_title=($seo_title)?$seo_title:makeurl($cat_name);
			$cat_id=$_POST['cat_id'];

			#validate Post value
			$err = array(); 
			if(!$cat_name)array_push($err,"Enter the cat name");
			if(!$seo_title)array_push($err,"Enter the seo name");
			if(!$cat_id){
				$_POST['status']='0';
				$_POST['seo_title']=$seo_title;
				if($this->db->checkExists($table_name,array("cat_name" => $cat_name, "parent"=>$parentId)))
				array_push($err,"Category already exist");
			}
			if($err){
			 $error = implode("<br />",$err);
			}else{
				$cid= $db->bindPOST($table_name , $primary_key);
				if($cat_id){                  
				}
				$message ="Successfully added the category";			
			}
		}	                   

		 
		//echo $sql;
		  
			$q=trim($_REQUEST['q']);
			if($q){
				$q=str_replace("\\","",$q);        
				$sql_query="SELECT * FROM `$table_name` WHERE $primary_key !='' AND cat_name LIKE '%$q%' OR seo_title LIKE '%$q%' OR description LIKE '%$q%'  ";
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
			// echo $sql_query;
			$rows = $db->select($sql_query);

	
			
		//SHOW PAGES
		require(ADMIN_GET_TEMPLATE_DIRECTORY. DS .'header.php');
		require(ADMIN_TEMPLATE_STORE.$this->controller . DS .'manage_category.php');  
		require(ADMIN_GET_TEMPLATE_DIRECTORY. DS .'footer.php');			
	}
#Authentication Area*****************************************************		
		
		
	function login($params = array()){
		global $db,$session;

		/*
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
		 
		  if(state('AR_admin_id')){
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
		  */
	  require(ADMIN_TEMPLATE_STORE.$this->controller . DS .'index.php');  		
	 
	   /*
        require(ADMIN_GET_TEMPLATE_DIRECTORY.'/header.php');
		require(ADMIN_TEMPLATE_STORE.$this->controller . DS .'login_new.php');  
    	require(ADMIN_GET_TEMPLATE_DIRECTORY.'/footer.php');	
        */	
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

#send a Notify Email to Clientity
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
		require(TEMPLATE_STORE.$this->controller . DS .'signup.php');  
		require(ADMIN_GET_TEMPLATE_DIRECTORY.'/footer.php');
	}      
	
	function changepassword($params=array()){
		global $db;
		if(!$this->user_id){redirect('siteadminpanel/login/'.base64UrlEncode(CURRENT_URL));}
		$admin_id=($_GET['admin_id'])?$_GET['admin_id']:$this->user_id;
		$member_info = $this->db->getRowArray('admin',$admin_id);
				
		 $admin_full_name=$member_info['fname'].' '.$member_info['lname'];
		
		
		 if($this->db->post('formSubmitted')){
			$current_password = $this->db->db_prepare_input($this->db->post('current_password'));
			$current_password = $this->_encode($current_password);
			
			$err = array(); 
			
			
			$user_old_pass=$member_info['admin_pass'];
			
			$user_password = $this->db->db_prepare_input($this->db->post('user_password'));
			$user_rawpass = $user_password;
			$user_repassword = $this->db->db_prepare_input($this->db->post('user_repassword'));
			if(isset($_GET['admin_id'])){
				
			}else{
				if($current_password!= $user_old_pass ){
					array_push($err,'Wrong Current Password'); 
				}	
			}
			
			
			if(strlen(trim($user_password)) < 3 || strlen(trim($user_password)) > 32){
				array_push($err,'Password should be at least 4 letters long');
			}elseif($user_password != $user_repassword){
				array_push($err,'Password and retype password do not match');
			}
				
			if($err)
			 $data['error'] = implode("<br />",$err);
			else
			{
			 $user_password = $this->_encode($user_password);
				 if($this->db->edit("UPDATE admin SET admin_pass='$user_password' WHERE admin_id ='".$admin_id."'")){
					//send_emailer($mailer);
					$message = "Password has been changed successfully.";
				 
				 
				    #ADD_TO_SCRIPT_LOG
					$log_info = 'Changed The OLD Password ['.$this->db->post('current_password').']';	
					$log_text = 'From IP: '.$_SERVER['REMOTE_ADDR'];				 
					//addToScriptLog($type='change_pass', $type_id=$admin_id, $log_info, $log_text); 
				  
				 }
			}
		 }
		

		require(GET_TEMPLATE_DIRECTORY . '/header-common.php');
		require(ADMIN_TEMPLATE_STORE .  DS . $this->controller .  DS . 'changepassword.php');
		require(GET_TEMPLATE_DIRECTORY . '/footer-common.php');
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
	   
		$user_id=state('AR_admin_id');
		
		$user = array(
			'AR_admin_id'			=> '',
			'AR_admin'				=> FALSE,    			
			'AR_logged_in'			=> FALSE
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
			
						//WRITE SESSION		
						$this->_set_member_session($member_info);
						
						//UPDATE USER LAST LOGIN TIME                  
						  $now=date("Y-m-d H:i:s");
						  $sql = "UPDATE admin SET `admin_lastlogin` = '$now'  WHERE admin_id= ".$member_info['admin_id'];
						  $this->db->edit($sql);    
							
							 #ADD_TO_SCRIPT_LOG
							 $log_info = 'Login into the system as a member: '.$member_info['admin_name'];	
							 $log_text = 'From IP: '.$_SERVER['REMOTE_ADDR'];				 
							 addToScriptLog($type='member_login', $type_id=$member_info['admin_id'], $log_info, $log_text); 

							
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
			'AR_admin_id'			=> $member_info['admin_id'],
			'AR_member_name'		=> $member_info['admin_name'],
			'AR_member_fname'		=> $member_info['fname'],
			'AR_member_level'		=> $member_info['admin_level'],
			'AR_admin_level'		=> $member_info['admin_level'],
			'AR_session_id'			=> $session_id,
			'AR_admin'				=> TRUE,    			
			'AR_logged_in'			=> TRUE
		);
					
	   $this->session->set_userdata($member);
	}
	
	
	/*bof Script LOGs */	
	function scriptLogs($params = array()){
		global $lang,$db,$session;  
 	   if($this->member_level!=1){ 
			die('You don\'t have enough permission');
			//redirect($this->controller.'/login/'.base64UrlEncode(CURRENT_URL));
			}	
	    
		$popup=true;
		$page = isset($params['2'])?$params['2']:1;
		$link =$params['0'].'/'.$params['1'];

		$sql_query="SELECT * FROM `script_log`  ";
	
		
    $pages = make_pagination_all($sql_query,$page,$p_limit=40);
	$sql_query .= " ORDER BY id DESC ";
	$sql_query .= " LIMIT ".$pages['start_form'].",".$pages['per_page'];
	$script_logs = $db->select($sql_query);
            
	  //SHOW PAGES
        require(ADMIN_GET_TEMPLATE_DIRECTORY.'/header.php');
        require(ADMIN_TEMPLATE_STORE.$this->controller . DS .'script_log.php');     
        require(ADMIN_GET_TEMPLATE_DIRECTORY.'/footer.php');	
	}
	
	function popup_scriptLogByType($params = array()){
		global $lang,$db,$session;  
	   if($this->member_level!=1){ 
			die('You don\'t have enough permission');
			//redirect($this->controller.'/login/'.base64UrlEncode(CURRENT_URL));
			}	
	     $type_id=$params['1'];
		$popup=true;
		$page = isset($params['2'])?$params['2']:1;
		$link =$params['0'].'/'.$params['1'];
		
		
	$sql_query="SELECT * FROM `script_log` ";
	if( $type_id){	
		$sql_query .=" WHERE type_id= $type_id";
	}		
    $pages = make_pagination_all($sql_query,$page,$p_limit=400);
	$sql_query .= " ORDER BY id DESC ";
	$sql_query .= " LIMIT ".$pages['start_form'].",".$pages['per_page'];
	//echo $sql_query;
	$script_logs = $db->select($sql_query);
            
	  //SHOW PAGES
        require(ADMIN_GET_TEMPLATE_DIRECTORY.'/header-common.php');
        require(TEMPLATE_STORE.$this->controller . DS .'script_log.php');     
        require(ADMIN_GET_TEMPLATE_DIRECTORY.'/footer-common.php');	
	}
	function popup_scriptLogByMember($params = array()){
		global $lang,$db,$session;  
	   if($this->member_level!=1){ 
			die('You don\'t have enough permission');
			//redirect($this->controller.'/login/'.base64UrlEncode(CURRENT_URL));
			}	
	     $user_id=$params['1'];
		$popup=true;
		$page = isset($params['2'])?$params['2']:1;
		$link ='siteadminpanel/popup_scriptLogByMember/'.$params['0'].'/'.$params['1'];
		
		
	$sql_query="SELECT * FROM `script_log` ";
	if( $user_id){	
		$sql_query .=" WHERE user_id= $user_id";
	}		
    $pages = make_pagination_all($sql_query,$page,$p_limit=50);
	$sql_query .= " ORDER BY id DESC ";
	$sql_query .= " LIMIT ".$pages['start_form'].",".$pages['per_page'];
	//echo $sql_query;
	$script_logs = $db->select($sql_query);
            
	  //SHOW PAGES
        require(ADMIN_GET_TEMPLATE_DIRECTORY.'/header-common.php');
        require(TEMPLATE_STORE.$this->controller . DS .'script_log.php');     
        require(ADMIN_GET_TEMPLATE_DIRECTORY.'/footer-common.php');	
	}
	function scriptLogDetail($params = array()){
		global $lang,$db,$session;  
	   if($this->member_level!=1){ 
			die('You don\'t have enough permission');
			//redirect($this->controller.'/login/'.base64UrlEncode(CURRENT_URL));
			}	
			
		$log_id=$params['0']; 
		$log_info=$db->select_single("SELECT * FROM script_log WHERE id='$log_id'");
					
	  //SHOW PAGES
		require(COMMON_TEMPLATES.'header-common.php');
		require(TEMPLATE_STORE.$this->controller . DS .'script_log_detail.php');
		require(COMMON_TEMPLATES.'footer-common.php');
	} 
	
	function settings($params = array()){
		global $db,$session;
		if(!$this->admin_id){redirect('siteadminpanel/login/'.base64UrlEncode(CURRENT_URL));}
		$page_url=ADMIN_URL.'settings/';
		
		
	    require(ADMIN_GET_TEMPLATE_DIRECTORY.'/header.php');
	    require(ADMIN_TEMPLATE_STORE.$this->controller . DS .'siteSettings.php');
	    require(ADMIN_GET_TEMPLATE_DIRECTORY.'/footer.php');
	}
    
        function cachemanager($params = array()){
		global $db,$session;
		if(!$this->admin_id){redirect('siteadminpanel/login/'.base64UrlEncode(CURRENT_URL));}
	    
       // pre($params);
        
        //SHOW PAGES
		//require(COMMON_TEMPLATES.'header-common.php');
		if($params[0]=='deleteCache'){
		 echo '<center><h2>All cache files have been cleaned!!! </h2></center>';  
		 ar_deleteCache();
		}
        if($params[0]=='generateCache'){
          echo '<center><h2>Cache Files successfully generated.</h2></center>';   
		 ar_generateCache();
    	}
        
		//require(COMMON_TEMPLATES.'footer-common.php');	
	}
    
    	#PageManager		
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
			$link ="siteadminpanel/pageManager/?";
					
			$qstring= substr($_SERVER['QUERY_STRING'], 0, strpos($_SERVER['QUERY_STRING'], '&action')); 
			$back_url=ADMIN_URL.'pageManager'; 


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
//Client Type Manager
	function clientTypesManager($params = array()) {
            global $db, $session;

            #Assign Basic Table Info 
            $tableName='client_types';
            $primaryKey='type_id';
            $page = $db->get_post('page');
            $redirect_url ="siteadminpanel/clientTypesManager/";
            $link ="siteadminpanel/clientTypesManager/?";
            
            
            $get_action = $db->get('action');
        	$action_id = $db->get('action_id');
            	
            	
            	#add/edit Table data
            	if($db->post('formSubmitted')){
            				
            		$entry_id=$db->bindPOST($tableName, $primaryKey);
            		redirect($redirect_url);
            	}
              
                        	
                #get/post action for list data 
                if($get_action)
                {
            		//echo '$get_action'.$get_action;
            	    switch($get_action)
            	    {
                        case 'approve':
                            echo $sql = "UPDATE $tableName SET status = '1' WHERE $primaryKey='$action_id'";
                            $db->update($sql);
                            break;
                        case 'disapprove':
                            $sql = "UPDATE $tableName SET status = '0' WHERE $primaryKey='$action_id'";
                            $db->update($sql);
                            break;
                        
                       case 'edit':
                            $edit = $db->select_single("SELECT * FROM ".$tableName." where $primaryKey=".$action_id);
                        break;	  
                        case 'delete':
                            $sql = "DELETE FROM $tableName WHERE $primaryKey='$action_id'";
                            $db->delete($sql);
                        break;	                 
            
            	    }
                    
                    if($get_action!='edit')
            	    redirect($redirect_url);
                }
            	
            	 if($db->post('formSubmittedROWS'))   ////////////manage post data
            	  {
            	  	
            	   $ids = $db->post('action_ids');
            	   $post_action = $db->post('action');
            	   
            		
            	  	if($ids)
            	  	{
            			//	echo '$post_action'.$post_action;
            	  		foreach($ids as $action_id)
            	  		{
            	  		    switch($post_action)
            	  	        {
            			  		case 'approve':
            			    	                $sql = "UPDATE $tableName SET status = '1' WHERE $primaryKey='$action_id'";
            			  		                $db->edit($sql);
            			  		                break;
            			  	   	case 'disapprove':
            			    	                $sql = "UPDATE $tableName SET status = '0' WHERE $primaryKey='$action_id'";
            			  		                $db->edit($sql);
            			  		                break;
            			  		                
            		            case 'delete':
                            					$sql = "DELETE FROM $tableName WHERE $primaryKey='$action_id'";
                            					$db->delete($sql);    
            			  		                break;            
            	  	         }	
            	  		 }
            	  	  }
            		
                  }
            	
            	
             
               #query for list of data 
                
             
             	$sql_query="SELECT * FROM $tableName WHERE $primaryKey !='' ";
                
               if($db->get_post('type_name')){
                $type_name=$db->get_post('type_name');
                $sql_query.="AND type_name='$type_name'";
                $link .="stype_name=$type_name&";
               }
                
                #for search
            	if($db->get_post('q')){
            		$q=$db->get_post('q');
            		if(is_numeric($q)){
            			$sql_query .= "  AND $primaryKey='$q' ";
            		}elseif(is_string($q)){
            				$sql_query .= "  AND type_name='".$db->db_input($q)."' OR type_title LIKE '%".$db->db_input($q)."%' ";
            		}
            
                    $link .="sq=$q&";
            	}
                
                	                         
            	$pages = make_pagination($sql_query,$page,10);
            	$sql_query .= " ORDER BY $primaryKey DESC";
            	$sql_query .= " LIMIT ".$pages['start_form'].",".$pages['per_page'];
            	// echo $sql_query;
            	$rows = $db->select($sql_query);
            
            
                  
            
            /*
            //SHOW PAGES assign Values
			$view_data['rows'] = $rows;
			showAdminPage($view_data);
            */

            //echo ADMIN_TEMPLATE_STORE.$this->controller . DS .'users/manage_users.php';exit;
            require(ADMIN_GET_TEMPLATE_DIRECTORY . '/header.php');
            require(ADMIN_TEMPLATE_STORE.$this->controller . DS .'manage_client_types.php');  
            require(ADMIN_GET_TEMPLATE_DIRECTORY . '/footer.php');
        }

    function packagesManager($params = array()) {
        global $db, $session;

       
        #Assign Basic Table Info 
        $tableName='packages';
        $primaryKey='package_id';
        $page = $db->get_post('page');
        $redirect_url ="siteadminpanel/packagesManager/";
        $link ="siteadminpanel/packagesManager/?";
        
        
        $get_action = $db->get('action');
    	$action_id = $db->get('action_id');
        	
        	
        	#add/edit Table data
        	if($db->post('formSubmitted')){
        		$entry_id=$db->bindPOST($tableName, $primaryKey);
        		redirect($redirect_url);
        	}
          
                    	
            #get/post action for list data 
            if($get_action)
            {
        		//echo '$get_action'.$get_action;
        	    switch($get_action)
        	    {
                    case 'approve':
                        echo $sql = "UPDATE $tableName SET status = '1' WHERE $primaryKey='$action_id'";
                        $db->update($sql);
                        break;
                    case 'disapprove':
                        $sql = "UPDATE $tableName SET status = '0' WHERE $primaryKey='$action_id'";
                        $db->update($sql);
                        break;
                    
                   case 'edit':
                        $edit = $db->select_single("SELECT * FROM ".$tableName." where $primaryKey=".$action_id);
                    break;	  
                    case 'delete':
                        $sql = "DELETE FROM $tableName WHERE $primaryKey='$action_id'";
                        $db->delete($sql);
                    break;	                 
        
        	    }
                
                if($get_action!='edit')
        	    redirect($redirect_url);
            }
        	
        	 if($db->post('formSubmittedROWS'))   ////////////manage post data
        	  {
        	  	
        	   $ids = $db->post('action_ids');
        	   $post_action = $db->post('action');
        	   
        		
        	  	if($ids)
        	  	{
        			//	echo '$post_action'.$post_action;
        	  		foreach($ids as $action_id)
        	  		{
        	  		    switch($post_action)
        	  	        {
        			  		case 'approve':
        			    	                $sql = "UPDATE $tableName SET status = '1' WHERE $primaryKey='$action_id'";
        			  		                $db->edit($sql);
        			  		                break;
        			  	   	case 'disapprove':
        			    	                $sql = "UPDATE $tableName SET status = '0' WHERE $primaryKey='$action_id'";
        			  		                $db->edit($sql);
        			  		                break;
        			  		                
        		            case 'delete':
                        					$sql = "DELETE FROM $tableName WHERE $primaryKey='$action_id'";
                        					$db->delete($sql);    
        			  		                break;            
        	  	         }	
        	  		 }
        	  	  }
        		
              }
        	
        	
         
           #query for list of data 
            
         
         	$sql_query="SELECT * FROM $tableName WHERE $primaryKey !='' ";
            
           
            if($db->get_post('package_type')){
                	$type = $db->get_post('package_type');
                	$sql_query .=" AND package_type ='$type' ";
                	$link .="package_type=$type&";
                }
            #for search
        	if($db->get_post('q')){
        		$q=$db->get_post('q');
        		if(is_numeric($q)){
        			$sql_query .= "  AND $primaryKey='$q' ";
        		}elseif(is_string($q)){
        				$sql_query .= "  AND package_type='".$db->db_input($q)."' OR package_name LIKE '%".$db->db_input($q)."%' ";
        		}
        
                $link .="sq=$q&";
        	}
            
            	                         
        	$pages = make_pagination($sql_query,$page,10);
        	$sql_query .= " ORDER BY $primaryKey DESC";
        	$sql_query .= " LIMIT ".$pages['start_form'].",".$pages['per_page'];
        	// echo $sql_query;
        	$rows = $db->select($sql_query);
        
        
              
        
        /*
        //SHOW PAGES assign Values
		$view_data['rows'] = $rows;
		showAdminPage($view_data);
        */

        //echo ADMIN_TEMPLATE_STORE.$this->controller . DS .'users/manage_users.php';exit;
        require(ADMIN_GET_TEMPLATE_DIRECTORY . '/header.php');
        require(ADMIN_TEMPLATE_STORE.$this->controller . DS .'manage_packages.php');  
        require(ADMIN_GET_TEMPLATE_DIRECTORY . '/footer.php');
    }
        
    function todoListManager($params = array()) {
            global $db, $session;

           
            #Assign Basic Table Info 
            $tableName='todolist';
            $primaryKey='id';
            $page = $db->get_post('page');
            $redirect_url ="siteadminpanel/todoListManager/";
            $link ="siteadminpanel/todoListManager/?";
            
            
            $get_action = $db->get('action');
        	$action_id = $db->get('action_id');
            	
            	
            	#add/edit Table data
            	if($db->post('formSubmitted')){
            		$entry_id=$db->bindPOST($tableName, $primaryKey);
            		redirect($redirect_url);
            	}
              
                        	
                #get/post action for list data 
                if($get_action)
                {
            		//echo '$get_action'.$get_action;
            	    switch($get_action)
            	    {
                        case 'approve':
                            echo $sql = "UPDATE $tableName SET status = '1' WHERE $primaryKey='$action_id'";
                            $db->update($sql);
                            break;
                        case 'disapprove':
                            $sql = "UPDATE $tableName SET status = '0' WHERE $primaryKey='$action_id'";
                            $db->update($sql);
                            break;
                        
                       case 'edit':
                            $edit = $db->select_single("SELECT * FROM ".$tableName." where $primaryKey=".$action_id);
                        break;	  
                        case 'delete':
                            $sql = "DELETE FROM $tableName WHERE $primaryKey='$action_id'";
                            $db->delete($sql);
                        break;	                 
            
            	    }
                    
                    if($get_action!='edit')
            	    redirect($redirect_url);
                }
            	
            	 if($db->post('formSubmittedROWS'))   ////////////manage post data
            	  {
            	  	
            	   $ids = $db->post('action_ids');
            	   $post_action = $db->post('action');
            	   
            		
            	  	if($ids)
            	  	{
            			//	echo '$post_action'.$post_action;
            	  		foreach($ids as $action_id)
            	  		{
            	  		    switch($post_action)
            	  	        {
            			  		case 'approve':
            			    	                $sql = "UPDATE $tableName SET status = '1' WHERE $primaryKey='$action_id'";
            			  		                $db->edit($sql);
            			  		                break;
            			  	   	case 'disapprove':
            			    	                $sql = "UPDATE $tableName SET status = '0' WHERE $primaryKey='$action_id'";
            			  		                $db->edit($sql);
            			  		                break;
            			  		                
            		            case 'delete':
                            					$sql = "DELETE FROM $tableName WHERE $primaryKey='$action_id'";
                            					$db->delete($sql);    
            			  		                break;            
            	  	         }	
            	  		 }
            	  	  }
            		
                  }
            	
            	
             
               #query for list of data 
                
             
             	$sql_query="SELECT * FROM $tableName WHERE $primaryKey !='' ";
                
               
                #for filterring
                if($db->get_post('employee')){
                    $employee = $db->get_post('employee');
                    $sql_query .= "AND user_id='$employee'";
                    $link .="employee=$employee&";
               }
                #for search
            	if($db->get_post('q')){
            		$q=$db->get_post('q');
            		if(is_numeric($q)){
            			$sql_query .= "  AND $primaryKey='$q' OR user_id LIKE '%".$db->db_input($q)."%' ";
            		}elseif(is_string($q)){
            				$sql_query .= "  AND e_date='".$db->db_input($q)."' OR date_added LIKE '%".$db->db_input($q)."%' ";
            		}
            
                    $link .="sq=$q&";
            	}
                
                	                         
            	$pages = make_pagination($sql_query,$page,10);
            	$sql_query .= " ORDER BY $primaryKey DESC";
            	$sql_query .= " LIMIT ".$pages['start_form'].",".$pages['per_page'];
            	// echo $sql_query;
                $todoUsers = $db->select("SELECT * FROM users");
            	$rows = $db->select($sql_query);
            
            
                  
            
            /*
            //SHOW PAGES assign Values
			$view_data['rows'] = $rows;
			showAdminPage($view_data);
            */

            //echo ADMIN_TEMPLATE_STORE.$this->controller . DS .'users/manage_users.php';exit;
            require(ADMIN_GET_TEMPLATE_DIRECTORY . '/header.php');
            require(ADMIN_TEMPLATE_STORE.$this->controller . DS .'manage_todoLists.php');  
            require(ADMIN_GET_TEMPLATE_DIRECTORY . '/footer.php');
        }

    function clientHistoryManager($params = array()) {
            global $db, $session;

           
            #Assign Basic Table Info 
            $tableName='client_history';
            $primaryKey='client_history_id';
            $page = $db->get_post('page');
            $redirect_url ="siteadminpanel/clientHistoryManager/";
            $link ="siteadminpanel/clientHistoryManager/?";
            
            
            $get_action = $db->get('action');
        	$action_id = $db->get('action_id');
            	
            	
            	#add/edit Table data
            	if($db->post('formSubmitted')){
            		$entry_id=$db->bindPOST($tableName, $primaryKey);
            		redirect($redirect_url);
            	}
              
                        	
                #get/post action for list data 
                if($get_action)
                {
            		//echo '$get_action'.$get_action;
            	    switch($get_action)
            	    {
                        case 'approve':
                            echo $sql = "UPDATE $tableName SET status = '1' WHERE $primaryKey='$action_id'";
                            $db->update($sql);
                            break;
                        case 'disapprove':
                            $sql = "UPDATE $tableName SET status = '0' WHERE $primaryKey='$action_id'";
                            $db->update($sql);
                            break;
                        
                       case 'edit':
                            $edit = $db->select_single("SELECT * FROM ".$tableName." where $primaryKey=".$action_id);
                        break;	  
                        case 'delete':
                            $sql = "DELETE FROM $tableName WHERE $primaryKey='$action_id'";
                            $db->delete($sql);
                        break;	                 
            
            	    }
                    
                    if($get_action!='edit')
            	    redirect($redirect_url);
                }
            	
            	 if($db->post('formSubmittedROWS'))   ////////////manage post data
            	  {
            	  	
            	   $ids = $db->post('action_ids');
            	   $post_action = $db->post('action');
            	   
            		
            	  	if($ids)
            	  	{
            			//	echo '$post_action'.$post_action;
            	  		foreach($ids as $action_id)
            	  		{
            	  		    switch($post_action)
            	  	        {
            			  		case 'approve':
            			    	                $sql = "UPDATE $tableName SET status = '1' WHERE $primaryKey='$action_id'";
            			  		                $db->edit($sql);
            			  		                break;
            			  	   	case 'disapprove':
            			    	                $sql = "UPDATE $tableName SET status = '0' WHERE $primaryKey='$action_id'";
            			  		                $db->edit($sql);
            			  		                break;
            			  		                
            		            case 'delete':
                            					$sql = "DELETE FROM $tableName WHERE $primaryKey='$action_id'";
                            					$db->delete($sql);    
            			  		                break;            
            	  	         }	
            	  		 }
            	  	  }
            		
                  }
            	
            	
             
               #query for list of data 
                
             
             	$sql_query="SELECT * FROM $tableName WHERE $primaryKey !='' ";
                
               
                if($db->get_post('type')){
                	$type = $db->get_post('type');
                	$sql_query .=" AND history_type ='$type' ";
                	$link .="type=$type&";
                }

                #for search
            	if($db->get_post('q')){
            		$q=$db->get_post('q');
            		if(is_numeric($q)){
            			$sql_query .= "  AND $primaryKey='$q' ";
            		}elseif(is_string($q)){
            				$sql_query .= "  AND client_name='".$db->db_input($q)."' OR client_zone LIKE '%".$db->db_input($q)."%' ";
            		}
            
                    $link .="sq=$q&";
            	}
                
                	                         
            	$pages = make_pagination($sql_query,$page,10);
            	$sql_query .= " ORDER BY $primaryKey DESC";
            	$sql_query .= " LIMIT ".$pages['start_form'].",".$pages['per_page'];
            	// echo $sql_query;
            	$rows = $db->select($sql_query);
            
            
                  
            
            /*
            //SHOW PAGES assign Values
			$view_data['rows'] = $rows;
			showAdminPage($view_data);
            */

            //echo ADMIN_TEMPLATE_STORE.$this->controller . DS .'users/manage_users.php';exit;
            require(ADMIN_GET_TEMPLATE_DIRECTORY . '/header.php');
            require(ADMIN_TEMPLATE_STORE.$this->controller . DS .'manage_client_history.php');  
            require(ADMIN_GET_TEMPLATE_DIRECTORY . '/footer.php');
        }

    function clientManager($params = array()) {
            global $db, $session;

            #Assign Basic Table Info 
            $tableName='clients';
            $primaryKey='client_id';
            $page = $db->get_post('page');
            $redirect_url ="siteadminpanel/clientManager/";
            $link ="siteadminpanel/clientManager/?";
            
            
            $get_action = $db->get('action');
        	$action_id = $db->get('action_id');
            	
            	$user_options='';
            	$client_options='';
            	$zone_options='';
            	$area_options='';


            	#add/edit Table data
            	if($db->post('formSubmitted')){

            		$client_zone=$db->post('client_zone');
            		if(is_numeric($client_zone)){
            			$_POST['client_zone']=getZoneList($client_zone);
            		}

            		$entry_id=$db->bindPOST($tableName, $primaryKey);
            		redirect($redirect_url);
            	}
              
                        	
                #get/post action for list data 
                if($get_action)
                {
            		//echo '$get_action'.$get_action;
            	    switch($get_action)
            	    {
                        case 'approve':
                            echo $sql = "UPDATE $tableName SET status = '1' WHERE $primaryKey='$action_id'";
                            $db->update($sql);
                            break;
                        case 'disapprove':
                            $sql = "UPDATE $tableName SET status = '0' WHERE $primaryKey='$action_id'";
                            $db->update($sql);
                            break;
                        
                       case 'edit':
                            $edit = $db->select_single("SELECT * FROM ".$tableName." where $primaryKey=".$action_id);
							//for user
							$u_info=getUserInfo($edit['user_id']);
							$users=$db->select("SELECT * FROM users WHERE user_role = ".$u_info['user_role']);
							if($users){
							foreach($users as $k=>$uinfo){
								$sel=($uinfo['user_id'] == $edit['user_id'])?' selected':'';
									$user_options .= '<option value="'.$uinfo['user_id'].'"'.$sel.'>'.$uinfo['user_fname'].' '.$uinfo['user_lname'].'('.$uinfo['link3_id'].' )'.'</option>'."\n";

								}
							}

							//for client
							$clients=$db->select("SELECT * FROM client_types WHERE user_role = ".$u_info['user_role']);
							if($clients){
							foreach($clients as $k=>$cinfo){
								$sel=($cinfo['type_name'] == $edit['client_type'])?' selected':'';
									$client_options .= '<option value="'.$cinfo['type_name'].'"'.$sel.'>'.$cinfo['type_title'].'('.$cinfo[type_id].' )'.'</option>'."\n";

								}
							}
/*
							$zones=$db->select("SELECT * FROM mis_zone");
							if($zones){
								$zone_options .= '<option value="'.$edit['client_zone'].'" >'.$edit['client_zone'].'</option>'."\n";
								foreach($zones as $k=>$zinfo){
									$sel =($zinfo['ZoneName'] == $edit['client_zone'])?' selected':'';
									$zone_options .= '<option value="'.$zinfo['ZoneID'].'"'.$sel.'>'.$zinfo['ZoneName'].'</option>'."\n";
								}
							}

*/
							// $zones=getZoneList();	
							// if($zones){
							// 	$zone_options .= '<option value="'.$edit['client_zone'].'" >'.$edit['client_zone'].'</option>'."\n";
							// 	foreach($zones as $ZoneID=>$ZoneName){
							// 		$sel =($zinfo['ZoneName'] == $edit['client_zone'])?' selected':'';
							// 		$zone_options .= '<option value="'.$ZoneID.'"'.$sel.'>'.$ZoneName.'</option>'."\n";
							// 	}
							// }

							//second test
							$zones=getZoneList();	
							if($zones){
								$zone_options .= '<option value="'.$edit['client_zone'].'" >'.$edit['client_zone'].'</option>'."\n";
								foreach($zones as $ZoneID=>$ZoneName){
									$sel =($zinfo['ZoneName'] == $edit['client_zone'])?' selected':'';
									$zone_options .= '<option value="'.$ZoneID.'"'.$sel.'>'.$ZoneName.'</option>'."\n";
								}
							}

							//end second test


							$areas = $db->select("SELECT * FROM mis_area_group");
							$area_options .= '<option value="'.$edit['client_area'].'"'.$sel.'>'.$edit['client_area'].'</option>'."\n";
							if($areas){
								foreach($areas as $k=>$ainfo){
									$sel=($ainfo['AreaName'] == $edit['client_area'])?' selected':'';
									$area_options .= '<option value="'.$ainfo['AreaName'].'"'.$sel.'>'.$ainfo['AreaName'].'</option>'."\n";
								}
							}


                        break;	  
                        case 'delete':
                            $sql = "DELETE FROM $tableName WHERE $primaryKey='$action_id'";
                            $db->delete($sql);
                        break;	                 
            
            	    }
                    
                    if($get_action!='edit')
            	    redirect($redirect_url);
                }
            	
            	 if($db->post('formSubmittedROWS'))   ////////////manage post data
            	  {
            	  	
            	   $ids = $db->post('action_ids');
            	   $post_action = $db->post('action');
            	   
            		
            	  	if($ids)
            	  	{
            			//	echo '$post_action'.$post_action;
            	  		foreach($ids as $action_id)
            	  		{
            	  		    switch($post_action)
            	  	        {
            			  		case 'approve':
            			    	                $sql = "UPDATE $tableName SET status = '1' WHERE $primaryKey='$action_id'";
            			  		                $db->edit($sql);
            			  		                break;
            			  	   	case 'disapprove':
            			    	                $sql = "UPDATE $tableName SET status = '0' WHERE $primaryKey='$action_id'";
            			  		                $db->edit($sql);
            			  		                break;
            			  		                
            		            case 'delete':
                            					$sql = "DELETE FROM $tableName WHERE $primaryKey='$action_id'";
                            					$db->delete($sql);    
            			  		                break;            
            	  	         }	
            	  		 }
            	  	  }
            		
                  }
            	
            	
             
               #query for list of data 
             $sql_query="SELECT * FROM $tableName WHERE $primaryKey !='' ";
                
               if($db->get_post('client_type')){
	               	$client_type = $db->get_post('client_type');
	               	$sql_query .= "AND client_type='$client_type'";
	               	$link .="client_type=$client_type&";
               }
                #for search
            	if($db->get_post('q')){
            		$q=$db->get_post('q');
            		if(is_numeric($q)){
            			$sql_query .= "  AND $primaryKey='$q' ";
            		}elseif(is_string($q)){
            				$sql_query .= "  AND client_name='".$db->db_input($q)."' OR client_type LIKE '%".$db->db_input($q)."%' OR client_email LIKE '%".$db->db_input($q)."%' ";
            		}
            
                    $link .="sq=$q&";
            	}

            	$pages = make_pagination($sql_query,$page,10);
            	$sql_query .= " ORDER BY $primaryKey DESC";
            	$sql_query .= " LIMIT ".$pages['start_form'].",".$pages['per_page'];
            	// echo $sql_query;
            	$rows = $db->select($sql_query);
            /*
            //SHOW PAGES assign Values
			$view_data['rows'] = $rows;
			showAdminPage($view_data);
            */

            //echo ADMIN_TEMPLATE_STORE.$this->controller . DS .'users/manage_users.php';exit;
            require(ADMIN_GET_TEMPLATE_DIRECTORY . '/header.php');
            require(ADMIN_TEMPLATE_STORE.$this->controller . DS .'manage_clients.php');  
            require(ADMIN_GET_TEMPLATE_DIRECTORY . '/footer.php');
        }

	function manageEmployees($params = array()) {
            global $db, $session;

			$SHOW_DATEPICKER = true;
            #Assign Basic Table Info 
            $tableName='users';
            $primaryKey='user_id';
            $page = $db->get_post('page');
            $redirect_url ="siteadminpanel/manageEmployees/";
            $link ="siteadminpanel/manageEmployees/?";
            
            
            $get_action = $db->get('action');
        	$action_id = $db->get('action_id');
        	$parent_options='';
        	$state_options='';
        	$city_options='';
        	$thana_options='';
            	
            	
            	#add/edit Table data
            	if($db->post('formSubmitted')){

            		$user_password = $this->db->db_prepare_input($this->db->post('user_password'));
					if($user_password){   
						$_POST['user_rawpass']=$user_password;
						$user_password = $this->_encode($user_password);
						$_POST['user_password']=$user_password;
            		}
            		$entry_id=$db->bindPOST($tableName, $primaryKey);
            		redirect($redirect_url);
            	}
              
                        	
                #get/post action for list data 
                if($get_action)
                {
            		//echo '$get_action'.$get_action;
            	    switch($get_action)
            	    {
                        case 'approve':
                            echo $sql = "UPDATE $tableName SET user_status = '1' WHERE $primaryKey='$action_id'";
                            $db->update($sql);
                            break;
                        case 'disapprove':
                            $sql = "UPDATE $tableName SET user_status = '0' WHERE $primaryKey='$action_id'";
                            $db->update($sql);
                            break;
                        
                       case 'edit':
                            $edit = $db->select_single("SELECT * FROM ".$tableName." where $primaryKey=".$action_id);

                            $u_info=getUserInfo($edit['user_id']);

                            $parents =$db->select("SELECT * FROM users WHERE user_role=".$u_info['user_role']);
                            
                            
                            if($parents){
                            	foreach ($parents as $key => $p_info) {
                            		$sel=($p_info['user_id'] == $edit['parent_id'])?' selected':'';
                   
                            		$parent_options .= '<option value="'.$p_info['user_id'].'"'.$sel.'>'.$p_info['user_fname'].' '.$p_info['user_lname'].', '.$p_info['designation'].', '.$p_info['link3_id'].'</option>'."\n";
                            	}
                            }

                            $states = $db->select("SELECT DISTINCT Divisin_Name FROM bdthana");
                            if($states){
                            	foreach($states as $state){
                            		$sel=($state['Divisin_Name']==$edit['user_state'])?'selected':'';
                            		$state_options.='<option value="'.$state['Divisin_Name'].'"'.$sel.'>'.$state['Divisin_Name'].'</option>'."\n";
                            	}
                            }

                            $cities = $db->select("SELECT DISTINCT District_Name FROM bdthana");
                             if($cities){
                            	foreach($cities as $city){
                            		$sel=($city['District_Name']==$edit['user_city'])?'selected':'';

                            		$city_options.='<option value="'.$city['District_Name'].'"'.$sel.'>'.$city['District_Name'].'</option>'."\n";
                            		
                            	}
                            }

                            $thanas = $db->select("SELECT DISTINCT Thana_Name FROM bdthana");
                             if($thanas){
                            	foreach($thanas as $thana){
                            		$sel=($thana['Thana_Name']==$edit['user_thana'])?'selected':'';

                            		$thana_options.='<option value="'.$thana['Thana_Name'].'"'.$sel.'>'.$thana['Thana_Name'].'</option>'."\n";
                            		
                            	}
                            }


                        break;

                        case 'delete':
                            $sql = "DELETE FROM $tableName WHERE $primaryKey='$action_id'";
                             $sql = "";
                            if($db->delete($sql)){
                            	//delete from log 
                            	//delete from history 
                            	//	
                            }
                            break;	
                                    
            
            	    }
                    
                    if($get_action!='edit')
            	    redirect($redirect_url);
                }
            	
            	 if($db->post('formSubmittedROWS'))   ////////////manage post data
            	  {
            	  	
            	   $ids = $db->post('action_ids');
            	   $post_action = $db->post('action');
            	   
            		
            	  	if($ids)
            	  	{
            			//	echo '$post_action'.$post_action;
            	  		foreach($ids as $action_id)
            	  		{
            	  		    switch($post_action)
            	  	        {
            			  		case 'approve':
            			    	                $sql = "UPDATE $tableName SET user_status = '1' WHERE $primaryKey='$action_id'";
            			  		                $db->edit($sql);
            			  		                break;
            			  	   	case 'disapprove':
            			    	                $sql = "UPDATE $tableName SET user_status = '0' WHERE $primaryKey='$action_id'";
            			  		                $db->edit($sql);
            			  		                break;
            			  		                
            		            case 'delete':
                            					$sql = "DELETE FROM $tableName WHERE $primaryKey='$action_id'";
                            					$db->delete($sql);    
            			  		                break;            
            	  	         }	
            	  		 }
            	  	  }
            		
                  }
            	
            	
             
               #query for list of data 
                
             
             	$sql_query="SELECT * FROM $tableName WHERE $primaryKey !='' ";
                
               #
               
               if($db->get_post('user_role')){
                $user_role = $db->get_post('user_role');
                $sql_query.="AND user_role = '$user_role'";
                $link.="user_role=$user_role&";
               }
                
                #for search
            	if($db->get_post('q')){
            		$q=$db->get_post('q');
            		if(is_numeric($q)){
            			$sql_query .= "  AND $primaryKey='$q' ";
            		}elseif(is_string($q)){
            				$sql_query .= "  AND user_name='".$db->db_input($q)."' OR link3_id='".$db->db_input($q)."' OR user_email LIKE '%".$db->db_input($q)."%' ";
            		}
            
                    $link .="q=$q&";
            	}
                
                	                         
            	$pages = make_pagination($sql_query,$page,10);
            	$sql_query .= " ORDER BY $primaryKey DESC";
            	$sql_query .= " LIMIT ".$pages['start_form'].",".$pages['per_page'];
            	// echo $sql_query;
            	$rows = $db->select($sql_query);
            
            
                  
            
            /*
            //SHOW PAGES assign Values
			$view_data['rows'] = $rows;
			showAdminPage($view_data);
            */

            //echo ADMIN_TEMPLATE_STORE.$this->controller . DS .'manage_employees.php';exit;
            require(ADMIN_GET_TEMPLATE_DIRECTORY . '/header.php');
            require(ADMIN_TEMPLATE_STORE.$this->controller . DS .'manage_employees.php');  
            require(ADMIN_GET_TEMPLATE_DIRECTORY . '/footer.php');
        }

    function scriptLogManager($params = array()) {
            global $db, $session;

            #Assign Basic Table Info 
            $tableName='script_log';
            $primaryKey='id';
            $page = $db->get_post('page');
            $redirect_url ="siteadminpanel/scriptLogManager/";
            $link ="siteadminpanel/scriptLogManager/?";
            
            
            $get_action = $db->get('action');
        	$action_id = $db->get('action_id');
            	
            	
            	#add/edit Table data
            	if($db->post('formSubmitted')){
            				
            		$entry_id=$db->bindPOST($tableName, $primaryKey);
            		redirect($redirect_url);
            	}
              
                        	
                #get/post action for list data 
                if($get_action)
                {
            		//echo '$get_action'.$get_action;
            	    switch($get_action)
            	    {
                        case 'approve':
                            echo $sql = "UPDATE $tableName SET status = '1' WHERE $primaryKey='$action_id'";
                            $db->update($sql);
                            break;
                        case 'disapprove':
                            $sql = "UPDATE $tableName SET status = '0' WHERE $primaryKey='$action_id'";
                            $db->update($sql);
                            break;
                        
                       case 'edit':
                            $edit = $db->select_single("SELECT * FROM ".$tableName." where $primaryKey=".$action_id);
                        break;	  
                        case 'delete':
                            $sql = "DELETE FROM $tableName WHERE $primaryKey='$action_id'";
                            $db->delete($sql);
                        break;	                 
            
            	    }
                    
                    if($get_action!='edit')
            	    redirect($redirect_url);
                }
            	
            	 if($db->post('formSubmittedROWS'))   ////////////manage post data
            	  {
            	  	
            	   $ids = $db->post('action_ids');
            	   $post_action = $db->post('action');
            	   
            		
            	  	if($ids)
            	  	{
            			//	echo '$post_action'.$post_action;
            	  		foreach($ids as $action_id)
            	  		{
            	  		    switch($post_action)
            	  	        {
            			  		case 'approve':
            			    	                $sql = "UPDATE $tableName SET status = '1' WHERE $primaryKey='$action_id'";
            			  		                $db->edit($sql);
            			  		                break;
            			  	   	case 'disapprove':
            			    	                $sql = "UPDATE $tableName SET status = '0' WHERE $primaryKey='$action_id'";
            			  		                $db->edit($sql);
            			  		                break;
            			  		                
            		            case 'delete':
                            					$sql = "DELETE FROM $tableName WHERE $primaryKey='$action_id'";
                            					$db->delete($sql);    
            			  		                break;            
            	  	         }	
            	  		 }
            	  	  }
            		
                  }
            	
            	
             
               #query for list of data 
                
             
             	$sql_query="SELECT * FROM $tableName WHERE $primaryKey !='' ";
                
               if($db->get_post('script_type')){
                	$script_type = $db->get_post('script_type');
                	$sql_query .=" AND type ='$script_type' ";
                	$link .="script_type=$script_type&";
                }
                
                #for search
            	if($db->get_post('q')){
            		$q=$db->get_post('q');
            		if(is_numeric($q)){
            			$sql_query .= "  AND $primaryKey='$q' OR user_id LIKE '%".$db->db_input($q)."%'";
            		}elseif(is_string($q)){
            				$sql_query .= "  AND log_text='".$db->db_input($q)."' OR log_link LIKE '%".$db->db_input($q)."%' ";
            		}
            
                    $link .="sq=$q&";
            	}
                
                	                         
            	$pages = make_pagination($sql_query,$page,10);
            	$sql_query .= " ORDER BY $primaryKey DESC";
            	$sql_query .= " LIMIT ".$pages['start_form'].",".$pages['per_page'];
            	// echo $sql_query;
            	$rows = $db->select($sql_query);
            
            
                  
            
            /*
            //SHOW PAGES assign Values
			$view_data['rows'] = $rows;
			showAdminPage($view_data);
            */

            //echo ADMIN_TEMPLATE_STORE.$this->controller . DS .'users/manage_users.php';exit;
            require(ADMIN_GET_TEMPLATE_DIRECTORY . '/header.php');
            require(ADMIN_TEMPLATE_STORE.$this->controller . DS .'manage_script_log.php');  
            require(ADMIN_GET_TEMPLATE_DIRECTORY . '/footer.php');
        }

    function LogView($params = array()) {
            global $db, $session;


            #Assign Basic Table Info 
            $tableName='script_log';
            $primaryKey='id';
            $page = $db->get_post('page');
            $redirect_url ="siteadminpanel/LogView/";
            $link ="siteadminpanel/LogView/?";
            
            
            $user = $db->get('user');
            $u_info=getUserInfo( $user);
            if(!$u_info){die('Wrong access');}
            $type_id=$u_info['user_id'];
            $link .="user=". $user.'&';
            	
             
               #query for list of data 
                
             
             	$sql_query="SELECT * FROM $tableName WHERE user_id =' $type_id' ";  
                	                         
            	$pages = make_pagination($sql_query,$page,10);
            	$sql_query .= " ORDER BY $primaryKey DESC";
            	$sql_query .= " LIMIT ".$pages['start_form'].",".$pages['per_page'];
            	// echo $sql_query;
            	$rows = $db->select($sql_query);
            
            //pre($rows);
                  
            /*
            //SHOW PAGES assign Values
			$view_data['rows'] = $rows;
			showAdminPage($view_data);
            */

            //echo ADMIN_TEMPLATE_STORE.$this->controller . DS .'users/manage_users.php';exit;
            require(ADMIN_GET_TEMPLATE_DIRECTORY . '/header-common.php');
            require(ADMIN_TEMPLATE_STORE.$this->controller . DS .'manage_script_log_view.php');  
            require(ADMIN_GET_TEMPLATE_DIRECTORY . '/footer-common.php');
        }

    function misZoneManager($params = array()) {
            global $db, $session;

            #Assign Basic Table Info 
            $tableName='mis_zone';
            $primaryKey='ZoneID';
            $page = $db->get_post('page');
            $redirect_url ="siteadminpanel/misZoneManager/";
            $link ="siteadminpanel/misZoneManager/?";
            
            
            $get_action = $db->get('action');
        	$action_id = $db->get('action_id');
            	
            	
            	#add/edit Table data
            	if($db->post('formSubmitted')){
            				
            		$entry_id=$db->bindPOST($tableName, $primaryKey);
            		redirect($redirect_url);
            	}
              
                        	
                #get/post action for list data 
                if($get_action)
                {
            		//echo '$get_action'.$get_action;
            	    switch($get_action)
            	    {
                        case 'approve':
                            echo $sql = "UPDATE $tableName SET status = '1' WHERE $primaryKey='$action_id'";
                            $db->update($sql);
                            break;
                        case 'disapprove':
                            $sql = "UPDATE $tableName SET status = '0' WHERE $primaryKey='$action_id'";
                            $db->update($sql);
                            break;
                        
                       case 'edit':
                            $edit = $db->select_single("SELECT * FROM ".$tableName." where $primaryKey=".$action_id);
                        break;	  
                        case 'delete':
                            $sql = "DELETE FROM $tableName WHERE $primaryKey='$action_id'";
                            $db->delete($sql);
                        break;	                 
            
            	    }
                    
                    if($get_action!='edit')
            	    redirect($redirect_url);
                }
            	
            	 if($db->post('formSubmittedROWS'))   ////////////manage post data
            	  {
            	  	
            	   $ids = $db->post('action_ids');
            	   $post_action = $db->post('action');
            	   
            		
            	  	if($ids)
            	  	{
            			//	echo '$post_action'.$post_action;
            	  		foreach($ids as $action_id)
            	  		{
            	  		    switch($post_action)
            	  	        {
            			  		case 'approve':
            			    	                $sql = "UPDATE $tableName SET status = '1' WHERE $primaryKey='$action_id'";
            			  		                $db->edit($sql);
            			  		                break;
            			  	   	case 'disapprove':
            			    	                $sql = "UPDATE $tableName SET status = '0' WHERE $primaryKey='$action_id'";
            			  		                $db->edit($sql);
            			  		                break;
            			  		                
            		            case 'delete':
                            					$sql = "DELETE FROM $tableName WHERE $primaryKey='$action_id'";
                            					$db->delete($sql);    
            			  		                break;            
            	  	         }	
            	  		 }
            	  	  }
            		
                  }
            	
            	
             
               #query for list of data 
                
             
             	$sql_query="SELECT * FROM $tableName WHERE $primaryKey !='' ";
                
               
                
                #for search
            	if($db->get_post('q')){
            		$q=$db->get_post('q');
            		if(is_numeric($q)){
            			$sql_query .= "  AND $primaryKey='$q' ";
            		}elseif(is_string($q)){
            				$sql_query .= "  AND ZoneName='".$db->db_input($q)."'";
            		}
            
                    $link .="sq=$q&";
            	}
                
                	                         
            	$pages = make_pagination($sql_query,$page,10);
            	$sql_query .= " ORDER BY $primaryKey";
            	$sql_query .= " LIMIT ".$pages['start_form'].",".$pages['per_page'];
            	// echo $sql_query;
            	$rows = $db->select($sql_query);
            
            
                  
            
            /*
            //SHOW PAGES assign Values
			$view_data['rows'] = $rows;
			showAdminPage($view_data);
            */

            //echo ADMIN_TEMPLATE_STORE.$this->controller . DS .'users/manage_users.php';exit;
            require(ADMIN_GET_TEMPLATE_DIRECTORY . '/header.php');
            require(ADMIN_TEMPLATE_STORE.$this->controller . DS .'manage_mis_zone.php');  
            require(ADMIN_GET_TEMPLATE_DIRECTORY . '/footer.php');
        }
    
    function misAreaGroupManager($params = array()) {
            global $db, $session;

            #Assign Basic Table Info 
            $tableName='mis_area_group';
            $primaryKey='ID';
            $page = $db->get_post('page');
            $redirect_url ="siteadminpanel/misAreaGroupManager/";
            $link ="siteadminpanel/misAreaGroupManager/?";
            
            
            $get_action = $db->get('action');
        	$action_id = $db->get('action_id');
            	
            	
            	#add/edit Table data
            	if($db->post('formSubmitted')){
            				
            		$entry_id=$db->bindPOST($tableName, $primaryKey);
            		redirect($redirect_url);
            	}
              
                        	
                #get/post action for list data 
                if($get_action)
                {
            		//echo '$get_action'.$get_action;
            	    switch($get_action)
            	    {
                        case 'approve':
                            echo $sql = "UPDATE $tableName SET status = '1' WHERE $primaryKey='$action_id'";
                            $db->update($sql);
                            break;
                        case 'disapprove':
                            $sql = "UPDATE $tableName SET status = '0' WHERE $primaryKey='$action_id'";
                            $db->update($sql);
                            break;
                        
                       case 'edit':
                            $edit = $db->select_single("SELECT * FROM ".$tableName." where $primaryKey=".$action_id);
                        break;	  
                        case 'delete':
                            $sql = "DELETE FROM $tableName WHERE $primaryKey='$action_id'";
                            $db->delete($sql);
                        break;	                 
            
            	    }
                    
                    if($get_action!='edit')
            	    redirect($redirect_url);
                }
            	
            	 if($db->post('formSubmittedROWS'))   ////////////manage post data
            	  {
            	  	
            	   $ids = $db->post('action_ids');
            	   $post_action = $db->post('action');
            	   
            		
            	  	if($ids)
            	  	{
            			//	echo '$post_action'.$post_action;
            	  		foreach($ids as $action_id)
            	  		{
            	  		    switch($post_action)
            	  	        {
            			  		case 'approve':
            			    	                $sql = "UPDATE $tableName SET status = '1' WHERE $primaryKey='$action_id'";
            			  		                $db->edit($sql);
            			  		                break;
            			  	   	case 'disapprove':
            			    	                $sql = "UPDATE $tableName SET status = '0' WHERE $primaryKey='$action_id'";
            			  		                $db->edit($sql);
            			  		                break;
            			  		                
            		            case 'delete':
                            					$sql = "DELETE FROM $tableName WHERE $primaryKey='$action_id'";
                            					$db->delete($sql);    
            			  		                break;            
            	  	         }	
            	  		 }
            	  	  }
            		
                  }
            	
            	
             
               #query for list of data 
                
             
             	$sql_query="SELECT * FROM $tableName WHERE $primaryKey !='' ";
                
               
                
                #for search
            	if($db->get_post('q')){
            		$q=$db->get_post('q');
            		if(is_numeric($q)){
            			$sql_query .= "  AND $primaryKey='$q' ";
            		}elseif(is_string($q)){
            				$sql_query .= "  AND AreaGroupName='".$db->db_input($q)."' OR AreaName LIKE '%".$db->db_input($q)."%' ";
            		}
            
                    $link .="sq=$q&";
            	}
                                       
            	$pages = make_pagination($sql_query,$page,10);
            	$sql_query .= " ORDER BY $primaryKey";
            	$sql_query .= " LIMIT ".$pages['start_form'].",".$pages['per_page'];
            	// echo $sql_query;
            	$rows = $db->select($sql_query);
            
            
                  
            
            /*
            //SHOW PAGES assign Values
			$view_data['rows'] = $rows;
			showAdminPage($view_data);
            */

            //echo ADMIN_TEMPLATE_STORE.$this->controller . DS .'users/manage_users.php';exit;
            require(ADMIN_GET_TEMPLATE_DIRECTORY . '/header.php');
            require(ADMIN_TEMPLATE_STORE.$this->controller . DS .'manage_area_group.php');  
            require(ADMIN_GET_TEMPLATE_DIRECTORY . '/footer.php');
        }

    function adminLogManager($params = array()) {
            global $db, $session;

            #Assign Basic Table Info 
            $tableName='admin_log';
            $primaryKey='id';
            $page = $db->get_post('page');
            $redirect_url ="siteadminpanel/adminLogManager/";
            $link ="siteadminpanel/adminLogManager/?";
            
            
            $get_action = $db->get('action');
        	$action_id = $db->get('action_id');
            	
            	
            	#add/edit Table data
            	if($db->post('formSubmitted')){
            				
            		$entry_id=$db->bindPOST($tableName, $primaryKey);
            		redirect($redirect_url);
            	}
              
                        	
                #get/post action for list data 
                if($get_action)
                {
            		//echo '$get_action'.$get_action;
            	    switch($get_action)
            	    {
                        case 'approve':
                            echo $sql = "UPDATE $tableName SET status = '1' WHERE $primaryKey='$action_id'";
                            $db->update($sql);
                            break;
                        case 'disapprove':
                            $sql = "UPDATE $tableName SET status = '0' WHERE $primaryKey='$action_id'";
                            $db->update($sql);
                            break;
                        
                       case 'edit':
                            $edit = $db->select_single("SELECT * FROM ".$tableName." where $primaryKey=".$action_id);
                        break;	  
                        case 'delete':
                            $sql = "DELETE FROM $tableName WHERE $primaryKey='$action_id'";
                            $db->delete($sql);
                        break;	                 
            
            	    }
                    
                    if($get_action!='edit')
            	    redirect($redirect_url);
                }
            	
            	 if($db->post('formSubmittedROWS'))   ////////////manage post data
            	  {
            	  	
            	   $ids = $db->post('action_ids');
            	   $post_action = $db->post('action');
            	   
            		
            	  	if($ids)
            	  	{
            			//	echo '$post_action'.$post_action;
            	  		foreach($ids as $action_id)
            	  		{
            	  		    switch($post_action)
            	  	        {
            			  		case 'approve':
            			    	                $sql = "UPDATE $tableName SET status = '1' WHERE $primaryKey='$action_id'";
            			  		                $db->edit($sql);
            			  		                break;
            			  	   	case 'disapprove':
            			    	                $sql = "UPDATE $tableName SET status = '0' WHERE $primaryKey='$action_id'";
            			  		                $db->edit($sql);
            			  		                break;
            			  		                
            		            case 'delete':
                            					$sql = "DELETE FROM $tableName WHERE $primaryKey='$action_id'";
                            					$db->delete($sql);    
            			  		                break;            
            	  	         }	
            	  		 }
            	  	  }
            		
                  }
            	
            	
             
               #query for list of data 
                
             
             	$sql_query="SELECT * FROM $tableName WHERE $primaryKey !='' ";
                
               
                
                #for search
            	if($db->get_post('q')){
            		$q=$db->get_post('q');
            		if(is_numeric($q)){
            			$sql_query .= "  AND $primaryKey='$q'";
            		}elseif(is_string($q)){
            				$sql_query .= "  AND admin_name='".$db->db_input($q)."' OR admin_ip LIKE '%".$db->db_input($q)."%'";
            		}
            
                    $link .="sq=$q&";
            	}
                
                	                         
            	$pages = make_pagination($sql_query,$page,10);
            	$sql_query .= " ORDER BY $primaryKey DESC";
            	$sql_query .= " LIMIT ".$pages['start_form'].",".$pages['per_page'];
            	// echo $sql_query;
            	$rows = $db->select($sql_query);
            
            
                  
            
            /*
            //SHOW PAGES assign Values
			$view_data['rows'] = $rows;
			showAdminPage($view_data);
            */

            //echo ADMIN_TEMPLATE_STORE.$this->controller . DS .'users/manage_users.php';exit;
            require(ADMIN_GET_TEMPLATE_DIRECTORY . '/header.php');
            require(ADMIN_TEMPLATE_STORE.$this->controller . DS .'manage_admin_log.php');  
            require(ADMIN_GET_TEMPLATE_DIRECTORY . '/footer.php');
        } 

    function adminLogView($params = array()) {
            global $db, $session;


            #Assign Basic Table Info 
            $tableName='admin_log';
            $primaryKey='admin_name';
            $page = $db->get_post('page');
            $redirect_url ="siteadminpanel/adminLogView/";
            $link ="siteadminpanel/adminLogView/?";
         
            
            
            $admin_name = $db->get('admin_name');
            if(!$admin_name){die('Wrong access');}
            $link .="user=". $user.'&';
            	
             
               #query for list of data 
                
             
             	$sql_query="SELECT * FROM $tableName WHERE $primaryKey ='$admin_name' ";  

                         
            	$pages = make_pagination($sql_query,$page,10);
            	$sql_query .= " ORDER BY $primaryKey";
            	$sql_query .= " LIMIT ".$pages['start_form'].",".$pages['per_page'];
            	// echo $sql_query;
            	$data['admin_name']=$admin_name;
            	$rows = $db->select($sql_query);
            	// pre($rows);
            
            //pre($rows);
                  
            /*
            //SHOW PAGES assign Values
			$view_data['rows'] = $rows;
			showAdminPage($view_data);
            */

            //echo ADMIN_TEMPLATE_STORE.$this->controller . DS .'users/manage_users.php';exit;
            require(ADMIN_GET_TEMPLATE_DIRECTORY . '/header-common.php');
            require(ADMIN_TEMPLATE_STORE.$this->controller . DS .'manage_admin_log_view.php');  
            require(ADMIN_GET_TEMPLATE_DIRECTORY . '/footer-common.php');
        }   

    function kpiManager($params = array()) {
            global $db, $session;

            #Assign Basic Table Info 
            $tableName='kpimanager';
            $primaryKey='kpi_id';
            $page = $db->get_post('page');
            $redirect_url ="siteadminpanel/kpiManager/";
            $link ="siteadminpanel/kpiManager/?";
            
            
            $get_action = $db->get('action');
        	$action_id = $db->get('action_id');
            	
            	
            	#add/edit Table data
            	if($db->post('formSubmitted')){
            				
            		$entry_id=$db->bindPOST($tableName, $primaryKey);
            		redirect($redirect_url);
            	}
              
                        	
                #get/post action for list data 
                if($get_action)
                {
            		//echo '$get_action'.$get_action;
            	    switch($get_action)
            	    {
                        case 'approve':
                            echo $sql = "UPDATE $tableName SET status = '1' WHERE $primaryKey='$action_id'";
                            $db->update($sql);
                            break;
                        case 'disapprove':
                            $sql = "UPDATE $tableName SET status = '0' WHERE $primaryKey='$action_id'";
                            $db->update($sql);
                            break;
                        
                       case 'edit':
                            $edit = $db->select_single("SELECT * FROM ".$tableName." where $primaryKey=".$action_id);
                        break;	  
                        case 'delete':
                            $sql = "DELETE FROM $tableName WHERE $primaryKey='$action_id'";
                            $db->delete($sql);
                        break;	                 
            
            	    }
                    
                    if($get_action!='edit')
            	    redirect($redirect_url);
                }
            	
            	 if($db->post('formSubmittedROWS'))   ////////////manage post data
            	  {
            	  	
            	   $ids = $db->post('action_ids');
            	   $post_action = $db->post('action');
            	   
            		
            	  	if($ids)
            	  	{
            			//	echo '$post_action'.$post_action;
            	  		foreach($ids as $action_id)
            	  		{
            	  		    switch($post_action)
            	  	        {
            			  		case 'approve':
            			    	                $sql = "UPDATE $tableName SET status = '1' WHERE $primaryKey='$action_id'";
            			  		                $db->edit($sql);
            			  		                break;
            			  	   	case 'disapprove':
            			    	                $sql = "UPDATE $tableName SET status = '0' WHERE $primaryKey='$action_id'";
            			  		                $db->edit($sql);
            			  		                break;
            			  		                
            		            case 'delete':
                            					$sql = "DELETE FROM $tableName WHERE $primaryKey='$action_id'";
                            					$db->delete($sql);    
            			  		                break;            
            	  	         }	
            	  		 }
            	  	  }
            		
                  }
            	
            	
             
               #query for list of data 
                
             
             	$sql_query="SELECT * FROM $tableName WHERE $primaryKey !='' ";


                if($db->get_post('s_session')){
                	$s_session = $db->get_post('s_session');
                	$sql_query .=" AND kpi_session ='$s_session' ";
                	$link .="s_session=$s_session&";
                }

                
                #for search
            	if($db->get_post('q')){
            		$q=$db->get_post('q');
            		if(is_numeric($q)){
            			$sql_query .= "  AND $primaryKey='$q' OR user_id LIKE '%".$db->db_input($q)."%'";
            		}elseif(is_string($q)){
            				$sql_query .= "  AND kpi_session='".$db->db_input($q)."' OR kpi_month LIKE '%".$db->db_input($q)."%' ";
            		}
            
                    $link .="sq=$q&";
            	}

                	                         
            	$pages = make_pagination($sql_query,$page,10);
            	$sql_query .= " ORDER BY $primaryKey DESC";
            	$sql_query .= " LIMIT ".$pages['start_form'].",".$pages['per_page'];
            	// echo $sql_query;
            	$rows = $db->select($sql_query);
            	foreach($rows as $row){
    				   $data = $row;   
            	}
            	$user = getUserInfo($data['user_id']);
            /*
            //SHOW PAGES assign Values
			$view_data['rows'] = $rows;
			showAdminPage($view_data);
            */

            //echo ADMIN_TEMPLATE_STORE.$this->controller . DS .'users/manage_users.php';exit;
            require(ADMIN_GET_TEMPLATE_DIRECTORY . '/header.php');
            require(ADMIN_TEMPLATE_STORE.$this->controller . DS .'manage_kpi.php');  
            require(ADMIN_GET_TEMPLATE_DIRECTORY . '/footer.php');
        }
    
    function kpiView($params = array()) {
            global $db, $session;


            #Assign Basic Table Info 
            $tableName='kpimanager';
            $primaryKey='kpi_id';
            $page = $db->get_post('page');
            $redirect_url ="siteadminpanel/kpiView/";
            $link ="siteadminpanel/kpiView/?";
            
            
            $user = $db->get('user');
            // echo $user;
            // echo $user;
            $u_info=getUserInfo( $user);
            if(!$u_info){die('Wrong access');}
            $user_id=$u_info['user_id'];
            // echo $user_id;
            $link .="user=". $user.'&';
            	
             
               #query for list of data 
                
             
             	$sql_query="SELECT * FROM $tableName WHERE user_id ='$user_id'";
             	
             	// if($db->get_post('s_session')){
             	// 	// echo $user;
              //   	$s_session = $db->get_post('s_session');
              //   	$sql_query .=" AND kpi_session ='$s_session' ";
              //   	$link .="s_session=$s_session&";
              //   }

                
             //    #for search
            	// if($db->get_post('q')){
            	// 	$q=$db->get_post('q');
            	// 	if(is_numeric($q)){
            	// 		$sql_query .= "  AND $primaryKey='$q' OR user_id LIKE '%".$db->db_input($q)."%'";
            	// 	}elseif(is_string($q)){
            	// 			$sql_query .= "  AND kpi_session='".$db->db_input($q)."' OR kpi_month LIKE '%".$db->db_input($q)."%' ";
            	// 			echo $sql_query;
            	// 	}
            
             //        $link .="sq=$q&";
            	// }
                	                         
            	$pages = make_pagination($sql_query,$page,12);
            	$sql_query .= " ORDER BY $primaryKey";
            	$sql_query .= " LIMIT ".$pages['start_form'].",".$pages['per_page'];
            	// echo $sql_query;
            	$rows = $db->select($sql_query);

            //echo ADMIN_TEMPLATE_STORE.$this->controller . DS .'users/manage_users.php';exit;
            require(ADMIN_GET_TEMPLATE_DIRECTORY . '/header-common.php');
           require(ADMIN_TEMPLATE_STORE.$this->controller . DS .'manage_kpi_view.php');  
            require(ADMIN_GET_TEMPLATE_DIRECTORY . '/footer-common.php');
        }

    function TodoListView($params = array()) {
            global $db, $session;

            #Assign Basic Table Info 
            $tableName='todolist';
            $primaryKey='id';
            $page = $db->get_post('page');
            $redirect_url ="siteadminpanel/TodoListView/";
            $link ="siteadminpanel/TodoListView/?";
            
            
            $user_id = $db->get('user_id');
            $u_info=getUserInfo( $user_id);
            if(!$u_info){die('Wrong access');}
            $link .="user_id=". $user_id.'&';
                
             
               #query for list of data 
            $sql_query="SELECT * FROM $tableName WHERE user_id =' $user_id'"; 

            // if($db->get_post('employee')){
            //         $employee = $db->get_post('employee');
            //         $sql_query .= "AND user_id='$employee'";
            //         $link .="employee=$employee&";
            //    }
                #for search
                // if($db->get_post('q')){
                //     $q=$db->get_post('q');
                //     if(is_numeric($q)){
                //         $sql_query .= "  AND $primaryKey='$q' OR user_id LIKE '%".$db->db_input($q)."%' ";
                //     }elseif(is_string($q)){
                //             $sql_query .= "  AND e_date='".$db->db_input($q)."' OR date_added LIKE '%".$db->db_input($q)."%' ";
                //     }
            
                //     $link .="sq=$q&";
                // }
             
                 
                                             
                $pages = make_pagination($sql_query,$page,10);
                $sql_query .= " ORDER BY $primaryKey";
                $sql_query .= " LIMIT ".$pages['start_form'].",".$pages['per_page'];
                // echo $sql_query;
                $rows = $db->select($sql_query);

            //echo ADMIN_TEMPLATE_STORE.$this->controller . DS .'users/manage_users.php';exit;
            require(ADMIN_GET_TEMPLATE_DIRECTORY . '/header-common.php');
            require(ADMIN_TEMPLATE_STORE.$this->controller . DS .'manage_todoList_view.php');  
            require(ADMIN_GET_TEMPLATE_DIRECTORY . '/footer-common.php');
        } 

    function MonthlySalesManager($params = array()) {
            global $db, $session;

            $SHOW_DATEPICKER= true;

            #Assign Basic Table Info 
            $tableName='client_history';
            $primaryKey='client_history_id';
            $page = $db->get_post('page');
            $redirect_url ="siteadminpanel/MonthlySalesManager/";
            $link ="siteadminpanel/MonthlySalesManager/?";
              
               #query for list of data 

               $sql_query="SELECT * FROM $tableName WHERE history_type = 'po_order'";
               $date_from=$db->get_post('date_from');
               $date_to=$db->get_post('date_to');

               //Total Amount
               /*
               $otc_amount="SELECT SUM(po_otc_amount) AS po_otc FROM client_history WHERE history_type = 'po_order' ";
               $mrc_amount="SELECT SUM(po_mrc_amount) AS po_mrc FROM client_history WHERE history_type = 'po_order' ";
               $yrc_amount="SELECT SUM(po_yrc_amount) AS po_yrc FROM client_history WHERE history_type = 'po_order' ";
               $ttl_amount="SELECT SUM(po_total_amount) AS po_ttl FROM client_history WHERE history_type = 'po_order' ";
               */

               if($db->get_post('user_id')){
                    $user_id=$db->get_post('user_id');
                    $sql_query.="AND user_id='$user_id'";
                    /*
                    $otc_amount.="AND user_id='$user_id' ";
                    $mrc_amount.="AND user_id='$user_id' ";
                    $yrc_amount.="AND user_id='$user_id' ";
                    $ttl_amount.="AND user_id='$user_id' ";
                    */
                    $link .="user_id=$user_id&";
               }

               if($date_from && $date_to){
                    $sql_query.="AND e_date between '$date_from' AND '$date_to'";
                    /*
                    $otc_amount.="AND e_date between '$date_from' AND '$date_to'";
                    $mrc_amount.="AND e_date between '$date_from' AND '$date_to'";
                    $yrc_amount.="AND e_date between '$date_from' AND '$date_to'";
                    $ttl_amount.="AND e_date between '$date_from' AND '$date_to'";
                    */
                    $link .="date_from=$date_from&date_to=$date_to&";
               }

                                             
                $pages = make_pagination($sql_query,$page,400);
                $sql_query .= " ORDER BY $primaryKey DESC";
                $sql_query .= " LIMIT ".$pages['start_form'].",".$pages['per_page'];
                $rows = $db->select($sql_query);

                //total amount
                /*
                $total_otc=$db->select_single($otc_amount);
                $total_mrc=$db->select_single($mrc_amount);
                $total_yrc=$db->select_single($yrc_amount);
                $total_amount=$db->select_single($ttl_amount);
                */
                
            /*
            //SHOW PAGES assign Values
            $view_data['rows'] = $rows;
            showAdminPage($view_data);
            */

            //echo ADMIN_TEMPLATE_STORE.$this->controller . DS .'users/manage_users.php';exit;
            require(ADMIN_GET_TEMPLATE_DIRECTORY . '/header.php');
            require(ADMIN_TEMPLATE_STORE.$this->controller . DS .'manage_monthly_sales.php');  
            require(ADMIN_GET_TEMPLATE_DIRECTORY . '/footer.php');
        }  

    function MonthlyDefaultSalesManager($params = array()) {
            global $db, $session;

            $SHOW_DATEPICKER= true;

            #Assign Basic Table Info 
            $tableName='client_history';
            $primaryKey='client_history_id';
            $page = $db->get_post('page');
            $redirect_url ="siteadminpanel/MonthlyDefaultSalesManager/";
            $link ="siteadminpanel/MonthlyDefaultSalesManager/?";
            
              
               #query for list of data 

               $sql_query="SELECT * FROM $tableName WHERE history_type = 'po_order' ";
               $month=$db->get_post('month');
               $year=$db->get_post('year');
               $date_from = $year.'-'.$month.'-01';
               $date_to= date("Y-m-t", strtotime($date_from));

               //Total Amount
               /*
               $otc_amount="SELECT SUM(po_otc_amount) AS po_otc FROM client_history WHERE history_type = 'po_order' ";
               $mrc_amount="SELECT SUM(po_mrc_amount) AS po_mrc FROM client_history WHERE history_type = 'po_order' ";
               $yrc_amount="SELECT SUM(po_yrc_amount) AS po_yrc FROM client_history WHERE history_type = 'po_order' ";
               $ttl_amount="SELECT SUM(po_total_amount) AS po_ttl FROM client_history WHERE history_type = 'po_order' ";
               */

               if($db->get_post('user_id')){
                    $user_id=$db->get_post('user_id');
                    $sql_query.="AND user_id='$user_id' ";
                    /*
                    $otc_amount.="AND user_id='$user_id' ";
                    $mrc_amount.="AND user_id='$user_id' ";
                    $yrc_amount.="AND user_id='$user_id' ";
                    $ttl_amount.="AND user_id='$user_id' ";
                    */
                    $link .="user_id=$user_id&";
               }

               if($month && $year){
                    $sql_query.="AND e_date between '$date_from' AND '$date_to' ";
                    /*
                    $otc_amount.="AND e_date between '$date_from' AND '$date_to' ";
                    $mrc_amount.="AND e_date between '$date_from' AND '$date_to' ";
                    $yrc_amount.="AND e_date between '$date_from' AND '$date_to' ";
                    $ttl_amount.="AND e_date between '$date_from' AND '$date_to' ";
                    */
                    $link .="month=$month&year=$year&";
               }

                                             
                $pages = make_pagination($sql_query,$page,400);
                $sql_query .= " ORDER BY $primaryKey DESC";
                $sql_query .= " LIMIT ".$pages['start_form'].",".$pages['per_page'];
                $rows = $db->select($sql_query);

                //total amount
                /*
                $total_otc=$db->select_single($otc_amount);
                $total_mrc=$db->select_single($mrc_amount);
                $total_yrc=$db->select_single($yrc_amount);
                $total_amount=$db->select_single($ttl_amount);
                */
                
            /*
            //SHOW PAGES assign Values
            $view_data['rows'] = $rows;
            showAdminPage($view_data);
            */

            //echo ADMIN_TEMPLATE_STORE.$this->controller . DS .'users/manage_users.php';exit;
            require(ADMIN_GET_TEMPLATE_DIRECTORY . '/header.php');
            require(ADMIN_TEMPLATE_STORE.$this->controller . DS .'manage_default_monthly_sales.php');  
            require(ADMIN_GET_TEMPLATE_DIRECTORY . '/footer.php');
        }     

    function election($params = array()) {
            global $db, $session;

            #Assign Basic Table Info 
    
            /*
            //SHOW PAGES assign Values
            $view_data['rows'] = $rows;
            showAdminPage($view_data);
            */

            //echo ADMIN_TEMPLATE_STORE.$this->controller . DS .'users/manage_users.php';exit;
            require(ADMIN_GET_TEMPLATE_DIRECTORY . '/header.php');
            require(ADMIN_TEMPLATE_STORE.$this->controller . DS .'election_manager.php');  
            // require(ADMIN_TEMPLATE_STORE.$this->controller . DS .'add_edit_author.php');  
            require(ADMIN_GET_TEMPLATE_DIRECTORY . '/footer.php');
        }

    function electionParty($params = array()) {
            global $db, $session;

            #Assign Basic Table Info 
            
            
            /*
            //SHOW PAGES assign Values
            $view_data['rows'] = $rows;
            showAdminPage($view_data);
            */

            //echo ADMIN_TEMPLATE_STORE.$this->controller . DS .'users/manage_users.php';exit;
            require(ADMIN_GET_TEMPLATE_DIRECTORY . '/header.php');
            require(ADMIN_TEMPLATE_STORE.$this->controller . DS .'election_manage_parties.php');  
            // require(ADMIN_TEMPLATE_STORE.$this->controller . DS .'add_edit_author.php');  
            require(ADMIN_GET_TEMPLATE_DIRECTORY . '/footer.php');
        }

    function electionCandidates($params = array()) {
            global $db, $session;

            
            
            
                  
            
            /*
            //SHOW PAGES assign Values
            $view_data['rows'] = $rows;
            showAdminPage($view_data);
            */

            //echo ADMIN_TEMPLATE_STORE.$this->controller . DS .'users/manage_users.php';exit;
            require(ADMIN_GET_TEMPLATE_DIRECTORY . '/header.php');
            require(ADMIN_TEMPLATE_STORE.$this->controller . DS .'election_manage_candidates.php');  
            // require(ADMIN_TEMPLATE_STORE.$this->controller . DS .'add_edit_author.php');  
            require(ADMIN_GET_TEMPLATE_DIRECTORY . '/footer.php');
        }

    function electionResults($params = array()) {
            global $db, $session;

    
            //echo ADMIN_TEMPLATE_STORE.$this->controller . DS .'users/manage_users.php';exit;
            require(ADMIN_GET_TEMPLATE_DIRECTORY . '/header.php');
            require(ADMIN_TEMPLATE_STORE.$this->controller . DS .'election_results.php');  
            require(ADMIN_GET_TEMPLATE_DIRECTORY . '/footer.php');
        }
//Requisition Product
    function requisitionProductManager($params = array()) {
        global $db, $session;

        #Assign Basic Table Info
        $tableName='products';
        $primaryKey='product_id';
        $page = $db->get_post('page');
        $redirect_url ="siteadminpanel/requisitionProductManager/";
        $link ="siteadminpanel/requisitionProductManager/?";


        $get_action = $db->get('action');
        $action_id = $db->get('action_id');


        #add/edit Table data
        if($db->post('formSubmitted')){

            $cat_name=$_POST['category'];
            $cat_data=$db->select_single("SELECT `category_id` FROM `product_category` WHERE `category_name`='$cat_name' ");
            $_POST['category_id']=$cat_data['category_id'];

            $entry_id=$db->bindPOST($tableName, $primaryKey);
            redirect($redirect_url);
        }


        #get/post action for list data
        if($get_action)
        {
            //echo '$get_action'.$get_action;
            switch($get_action)
            {
                case 'approve':
                    echo $sql = "UPDATE $tableName SET status = '1' WHERE $primaryKey='$action_id'";
                    $db->update($sql);
                    break;
                case 'disapprove':
                    $sql = "UPDATE $tableName SET status = '0' WHERE $primaryKey='$action_id'";
                    $db->update($sql);
                    break;

                case 'edit':
                    $edit = $db->select_single("SELECT * FROM ".$tableName." where $primaryKey=".$action_id);
                    break;
                case 'delete':
                    $sql = "DELETE FROM $tableName WHERE $primaryKey='$action_id'";
                    $db->delete($sql);
                    break;

            }

            if($get_action!='edit')
                redirect($redirect_url);
        }

        if($db->post('formSubmittedROWS'))   ////////////manage post data
        {

            $ids = $db->post('action_ids');
            $post_action = $db->post('action');


            if($ids)
            {
                foreach($ids as $action_id)
                {
                    switch($post_action)
                    {
                        case 'approve':
                            $sql = "UPDATE $tableName SET status = '1' WHERE $primaryKey='$action_id'";
                            $db->edit($sql);
                            break;
                        case 'disapprove':
                            $sql = "UPDATE $tableName SET status = '0' WHERE $primaryKey='$action_id'";
                            $db->edit($sql);
                            break;

                        case 'delete':
                            $sql = "DELETE FROM $tableName WHERE $primaryKey='$action_id'";
                            $db->delete($sql);
                            break;
                    }
                }
            }

        }

        #query for list of data
        $sql_query="SELECT * FROM $tableName WHERE $primaryKey !='' ";

        if($db->get_post('category')){
            $category=$db->get_post('category');
            $sql_query.="AND category='$category'";
            $link .="category=$category&";
        }


        #for search
        if($db->get_post('q')){
            $q=$db->get_post('q');
            if(is_numeric($q)){
                $sql_query .= "  AND $primaryKey='$q' OR sn='".$q."' OR category_id='".$q."'";
            }elseif(is_string($q)){
                $sql_query .= "  AND product_name LIKE '%".$db->db_input($q)."%' OR category LIKE '%".$db->db_input($q)."%' ";
            }
            $link .="q=$q&";
        }

        $pages = make_pagination($sql_query,$page,10);
        $sql_query .= " ORDER BY $primaryKey DESC";
        $sql_query .= " LIMIT ".$pages['start_form'].",".$pages['per_page'];
        // echo $sql_query;
        $rows = $db->select($sql_query);

        require(ADMIN_GET_TEMPLATE_DIRECTORY . '/header.php');
        require(ADMIN_TEMPLATE_STORE.$this->controller . DS .'manage_requisition_product.php');
        require(ADMIN_GET_TEMPLATE_DIRECTORY . '/footer.php');
    }

    //Product Category

    function requisitionProductCategory($params = array()) {
        global $db, $session;

        #Assign Basic Table Info
        $tableName='product_category';
        $primaryKey='category_id';
        $page = $db->get_post('page');
        $redirect_url ="siteadminpanel/requisitionProductCategory/";
        $link ="siteadminpanel/requisitionProductCategory/?";


        $get_action = $db->get('action');
        $action_id = $db->get('action_id');


        #add/edit Table data
        if($db->post('formSubmitted')){

            $entry_id=$db->bindPOST($tableName, $primaryKey);
            redirect($redirect_url);
        }


        #get/post action for list data
        if($get_action)
        {
            //echo '$get_action'.$get_action;
            switch($get_action)
            {
                case 'approve':
                    echo $sql = "UPDATE $tableName SET status = '1' WHERE $primaryKey='$action_id'";
                    $db->update($sql);
                    break;
                case 'disapprove':
                    $sql = "UPDATE $tableName SET status = '0' WHERE $primaryKey='$action_id'";
                    $db->update($sql);
                    break;

                case 'edit':
                    $edit = $db->select_single("SELECT * FROM ".$tableName." where $primaryKey=".$action_id);
                    break;
                case 'delete':
                    $sql = "DELETE FROM $tableName WHERE $primaryKey='$action_id'";
                    $db->delete($sql);
                    break;

            }

            if($get_action!='edit')
                redirect($redirect_url);
        }

        if($db->post('formSubmittedROWS'))   ////////////manage post data
        {

            $ids = $db->post('action_ids');
            $post_action = $db->post('action');


            if($ids)
            {
                foreach($ids as $action_id)
                {
                    switch($post_action)
                    {
                        case 'approve':
                            $sql = "UPDATE $tableName SET status = '1' WHERE $primaryKey='$action_id'";
                            $db->edit($sql);
                            break;
                        case 'disapprove':
                            $sql = "UPDATE $tableName SET status = '0' WHERE $primaryKey='$action_id'";
                            $db->edit($sql);
                            break;

                        case 'delete':
                            $sql = "DELETE FROM $tableName WHERE $primaryKey='$action_id'";
                            $db->delete($sql);
                            break;
                    }
                }
            }

        }

        #query for list of data
        $sql_query="SELECT * FROM $tableName WHERE $primaryKey !='' ";

        if($db->get_post('category')){
            $category=$db->get_post('category');
            $sql_query.="AND category_name='$category'";
            $link .="category=$category&";
        }


        #for search
        if($db->get_post('q')){
            $q=$db->get_post('q');
            if(is_numeric($q)){
                $sql_query .= "  AND $primaryKey='$q'";
            }elseif(is_string($q)){
                $sql_query .= "  AND category_name LIKE '%".$db->db_input($q)."%' OR category_title LIKE '%".$db->db_input($q)."%' ";
            }
            $link .="q=$q&";
        }

        $pages = make_pagination($sql_query,$page,10);
        $sql_query .= " ORDER BY $primaryKey DESC";
        $sql_query .= " LIMIT ".$pages['start_form'].",".$pages['per_page'];
        // echo $sql_query;
        $rows = $db->select($sql_query);

        require(ADMIN_GET_TEMPLATE_DIRECTORY . '/header.php');
        require(ADMIN_TEMPLATE_STORE.$this->controller . DS .'manage_requisition_product_category.php');
        require(ADMIN_GET_TEMPLATE_DIRECTORY . '/footer.php');
    }

//Requisition Forms
    function requisitionFormManager($params = array()) {
        global $db, $session;

        #Assign Basic Table Info
        $tableName='forms';
        $primaryKey='form_id';
        $page = $db->get_post('page');
        $redirect_url ="siteadminpanel/requisitionFormManager/";
        $link ="siteadminpanel/requisitionFormManager/?";


        $get_action = $db->get('action');
        $action_id = $db->get('action_id');


        #add/edit Table data
        if($db->post('formSubmitted')){

            $entry_id=$db->bindPOST($tableName, $primaryKey);
            redirect($redirect_url);
        }


        #get/post action for list data
        if($get_action)
        {
            //echo '$get_action'.$get_action;
            switch($get_action)
            {
                case 'approve':
                    echo $sql = "UPDATE $tableName SET status = '1' WHERE $primaryKey='$action_id'";
                    $db->update($sql);
                    break;
                case 'disapprove':
                    $sql = "UPDATE $tableName SET status = '0' WHERE $primaryKey='$action_id'";
                    $db->update($sql);
                    break;

                case 'edit':
                    $edit = $db->select_single("SELECT * FROM ".$tableName." where $primaryKey=".$action_id);
                    break;
                case 'delete':
                    $sql = "DELETE FROM $tableName WHERE $primaryKey='$action_id'";
                    $db->delete($sql);
                    break;

            }

            if($get_action!='edit')
                redirect($redirect_url);
        }

        if($db->post('formSubmittedROWS'))   ////////////manage post data
        {

            $ids = $db->post('action_ids');
            $post_action = $db->post('action');


            if($ids)
            {
                foreach($ids as $action_id)
                {
                    switch($post_action)
                    {
                        case 'approve':
                            $sql = "UPDATE $tableName SET status = '1' WHERE $primaryKey='$action_id'";
                            $db->edit($sql);
                            break;
                        case 'disapprove':
                            $sql = "UPDATE $tableName SET status = '0' WHERE $primaryKey='$action_id'";
                            $db->edit($sql);
                            break;

                        case 'delete':
                            $sql = "DELETE FROM $tableName WHERE $primaryKey='$action_id'";
                            $db->delete($sql);
                            break;
                    }
                }
            }

        }

        #query for list of data
        $sql_query="SELECT * FROM $tableName WHERE $primaryKey !='' ";

        if($db->get_post('form_type')){
            $form_type=$db->get_post('form_type');
            $sql_query.="AND form_type='$form_type'";
            $link .="form_type=$form_type&";
        }


        #for search
        if($db->get_post('q')){
            $q=$db->get_post('q');
            if(is_numeric($q)){
                $sql_query .= "  AND $primaryKey='$q'";
            }elseif(is_string($q)){
                $sql_query .= "  AND form_name LIKE '%".$db->db_input($q)."%' OR form_group LIKE '%".$db->db_input($q)."%' OR form_type LIKE '%".$db->db_input($q)."%' OR url LIKE '%".$db->db_input($q)."%' OR colorCode LIKE '%".$db->db_input($q)."%'";
            }
            $link .="q=$q&";
        }

        $pages = make_pagination($sql_query,$page,10);
        $sql_query .= " ORDER BY $primaryKey DESC";
        $sql_query .= " LIMIT ".$pages['start_form'].",".$pages['per_page'];
        // echo $sql_query;
        $rows = $db->select($sql_query);

        require(ADMIN_GET_TEMPLATE_DIRECTORY . '/header.php');
        require(ADMIN_TEMPLATE_STORE.$this->controller . DS .'manage_requisition_form.php');
        require(ADMIN_GET_TEMPLATE_DIRECTORY . '/footer.php');
    }

    // Form Applicants
    function formApplicantsManager($params = array()) {
        global $db, $session;

        #Assign Basic Table Info
        $tableName='form_applicants';
        $primaryKey='app_id';
        $page = $db->get_post('page');
        $redirect_url ="siteadminpanel/formApplicantsManager/";
        $link ="siteadminpanel/formApplicantsManager/?";


        $get_action = $db->get('action');
        $action_id = $db->get('action_id');



        #add/edit Table data
        if($db->post('formSubmitted')){
            $file_error='';
            $app_id=$_POST['app_id'];
            if($_FILES){
                $upload_dir = 'link3_maincrm/framework/resources/files/attached/';
                $upload_url = 'link3_maincrm/framework/resources/files/attached/';
                $allow_extention=array('jpg','jpeg','png','pdf','docx','doc','xls');

                $file_name=$_FILES['attached_file']["name"];
                if($file_name){
                    $file_tmp_name=$_FILES['attached_file']["tmp_name"];
                    $file_ext=strtolower(end(explode('.', $file_name)));
                    $new_file_name=$app_id.'_'.$file_name;
                    if(in_array($file_ext,$allow_extention)){

                        $upload_to=$upload_dir. $new_file_name;

                        $upload_to_url=$upload_url. $new_file_name;
                        if(@move_uploaded_file($file_tmp_name, $upload_to)){
                            $_POST['attached_file'] = $upload_to_url;                                  //echo $upload_to_url;
                        }else{
                            $file_error='Failed to upload the attachment';
                        }
                    }else{
                        $file_error='File type does not support';
                    }
                }//filename

                if( $file_error){die($file_error);}
            }
            #eof File Attached


            $entry_id=$db->bindPOST($tableName, $primaryKey);
            redirect($redirect_url);
        }


        #get/post action for list data
        if($get_action)
        {
            //echo '$get_action'.$get_action;
            switch($get_action)
            {
                case 'approve':
                    echo $sql = "UPDATE $tableName SET status = '1' WHERE $primaryKey='$action_id'";
                    $db->update($sql);
                    break;
                case 'disapprove':
                    $sql = "UPDATE $tableName SET status = '0' WHERE $primaryKey='$action_id'";
                    $db->update($sql);
                    break;

                case 'edit':
                    $edit = $db->select_single("SELECT * FROM ".$tableName." where $primaryKey=".$action_id);
                    break;
                case 'delete':
                    $sql = "DELETE FROM $tableName WHERE $primaryKey='$action_id'";
                    $db->delete($sql);
                    break;

            }

            if($get_action!='edit')
                redirect($redirect_url);
        }

        if($db->post('formSubmittedROWS'))   ////////////manage post data
        {
            $ids = $db->post('action_ids');
            $post_action = $db->post('action');

            if($ids)
            {
                foreach($ids as $action_id)
                {
                    switch($post_action)
                    {
                        case 'approve':
                            $sql = "UPDATE $tableName SET status = '1' WHERE $primaryKey='$action_id'";
                            $db->edit($sql);
                            break;
                        case 'disapprove':
                            $sql = "UPDATE $tableName SET status = '0' WHERE $primaryKey='$action_id'";
                            $db->edit($sql);
                            break;

                        case 'delete':
                            $sql = "DELETE FROM $tableName WHERE $primaryKey='$action_id'";
                            $db->delete($sql);
                            break;
                    }
                }
            }

        }

        #query for list of data
        $sql_query="SELECT * FROM $tableName WHERE $primaryKey !='' ";

        if($db->get_post('form_type')){
            $form_type=$db->get_post('form_type');
            $sql_query.="AND form_type='$form_type'";
            $link .="form_type=$form_type&";
        }


        #for search
        if($db->get_post('q')){
            $q=$db->get_post('q');
            if(is_numeric($q)){
                $sql_query .= "  AND $primaryKey='$q' OR leave_Earn='$q'";
            }elseif(is_string($q)){
                $sql_query .= "  AND type LIKE '%".$db->db_input($q)."%' OR semester LIKE '%".$db->db_input($q)."%' ";
            }
            $link .="q=$q&";
        }

        $pages = make_pagination($sql_query,$page,10);
        $sql_query .= " ORDER BY $primaryKey DESC";
        $sql_query .= " LIMIT ".$pages['start_form'].",".$pages['per_page'];
        // echo $sql_query;
        $rows = $db->select($sql_query);

        require(ADMIN_GET_TEMPLATE_DIRECTORY . '/header.php');
        require(ADMIN_TEMPLATE_STORE.$this->controller . DS .'manage_form_applicants.php');
        require(ADMIN_GET_TEMPLATE_DIRECTORY . '/footer.php');
    }

    function departmentManager($params = array()) {
        global $db, $session;

        #Assign Basic Table Info
        $tableName='departments';
        $primaryKey='dept_id';
        $page = $db->get_post('page');
        $redirect_url ="siteadminpanel/DepartmentManager/";
        $link ="siteadminpanel/DepartmentManager/?";


        $get_action = $db->get('action');
        $action_id = $db->get('action_id');


        #add/edit Table data
        if($db->post('formSubmitted')){

            $entry_id=$db->bindPOST($tableName, $primaryKey);
            redirect($redirect_url);
        }

        if($get_action)
        {
            switch($get_action)
            {
                case 'approve':
                    echo $sql = "UPDATE $tableName SET status = '1' WHERE $primaryKey='$action_id'";
                    $db->update($sql);
                    break;
                case 'disapprove':
                    $sql = "UPDATE $tableName SET status = '0' WHERE $primaryKey='$action_id'";
                    $db->update($sql);
                    break;

                case 'edit':
                    $edit = $db->select_single("SELECT * FROM ".$tableName." where $primaryKey=".$action_id);
                    break;
                case 'delete':
                    $sql = "DELETE FROM $tableName WHERE $primaryKey='$action_id'";
                    $db->delete($sql);
                    break;

            }

            if($get_action!='edit')
                redirect($redirect_url);
        }

        if($db->post('formSubmittedROWS'))  //manage post data
        {

            $ids = $db->post('action_ids');
            $post_action = $db->post('action');


            if($ids)
            {
                //	echo '$post_action'.$post_action;
                foreach($ids as $action_id)
                {
                    switch($post_action)
                    {
                        case 'approve':
                            $sql = "UPDATE $tableName SET status = '1' WHERE $primaryKey='$action_id'";
                            $db->edit($sql);
                            break;
                        case 'disapprove':
                            $sql = "UPDATE $tableName SET status = '0' WHERE $primaryKey='$action_id'";
                            $db->edit($sql);
                            break;

                        case 'delete':
                            $sql = "DELETE FROM $tableName WHERE $primaryKey='$action_id'";
                            $db->delete($sql);
                            break;
                    }
                }
            }

        }

        $sql_query="SELECT * FROM $tableName WHERE $primaryKey !='' ";

        if($db->get_post('dept_id')){
            $dept_id=$db->get_post('dept_id');
            $sql_query.="AND `dept_id`='$dept_id'";
            $link .="dept_id=$dept_id&";
        }

        #for search
        if($db->get_post('q')){
            $q=$db->get_post('q');
            if(is_numeric($q)){
                $sql_query .= "  AND $primaryKey='$q' ";
            }elseif(is_string($q)){
                $sql_query .= "  AND dept_name='".$db->db_input($q)."' OR dept_code LIKE '%".$db->db_input($q)."%' ";
            }
            $link .="q=$q&";
        }

        $pages = make_pagination($sql_query,$page,10);
        $sql_query .= " ORDER BY $primaryKey DESC";
        $sql_query .= " LIMIT ".$pages['start_form'].",".$pages['per_page'];
        // echo $sql_query;
        $rows = $db->select($sql_query);

        require(ADMIN_GET_TEMPLATE_DIRECTORY . '/header.php');
        require(ADMIN_TEMPLATE_STORE.$this->controller . DS .'manage_department.php');
        require(ADMIN_GET_TEMPLATE_DIRECTORY . '/footer.php');
    }

#ImageManager
    function imagemanager($params = array()) {
        global $db, $session;

        	if(!$this->user_id){ $this->login();exit; }

        require(ADMIN_GET_TEMPLATE_DIRECTORY . '/header.php');
        require(ADMIN_TEMPLATE_STORE.'imagemanager' . DS .'dashboard.php');
        require(ADMIN_GET_TEMPLATE_DIRECTORY . '/footer.php');
    }
    function manageImageCategory($params=array(),$main_link ="siteadminpanel/manageImageCategory/?"){
		global $db;
		if(!$this->user_id){ $this->login();exit; }
			
		$primary_key = 'cat_id';
		$table_name = 'image_categories';
		$ImageType='catimages';


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
					$db->delete("DELETE FROM image_categories WHERE $primary_key=".$cat_id);
					 $result=deletImages($ImageType,$cat_id);
					$db->delete("DELETE FROM articles WHERE $primary_key=".$cat_id);
				   
					break;
			case 'active':
					$db->update("UPDATE image_categories SET active='1' WHERE $primary_key=".$cat_id);
					
					break;
			case 'inactive':
					$db->update("UPDATE image_categories SET active='0' WHERE $primary_key=".$cat_id);
					
					break;
			}

		if($get_action!='Edit')urlredirect($back_url);
		}
					
		if($db->post('formSubmitted'))
		{	

			#Assign Post value				  
			$menu_text= $db->db_prepare_input($db->post('menu_text'));
			$_POST['image_title']=$menu_text;
			$seo_title=$_POST['seo_title'];
			$_POST['seo_title']=$seo_title=($seo_title)?$seo_title:makeurl($menu_text);
			$cat_id=$_POST['cat_id'];

			#validate Post value
			$err = array(); 
			if(!$menu_text)array_push($err,"Enter the cat name");
			if(!$seo_title)array_push($err,"Enter the seo name");
			if(!$cat_id){
				$_POST['active']='0';
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
				if($cid){
				$message ="Successfully added the category";			
				
				}else{
					$error ="Failed to update";			
					
				}	
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
			
			$pages = make_pagination($sql_query,$page,15);
			if(!$q){
					$sql_query .= " ORDER BY menu_order ";
			}
			
			$sql_query .= " LIMIT ".$pages['start_form'].",".$pages['per_page'];
			
            //echo $sql_query;
            
            $rows = $db->select($sql_query);

	
			
				 //SHOW PAGES
		require(ADMIN_GET_TEMPLATE_DIRECTORY.'/header.php');
		require(ADMIN_TEMPLATE_STORE.'imagemanager' . DS .'manage_image_category.php');  
		require(ADMIN_GET_TEMPLATE_DIRECTORY.'/footer.php');	
	}
	function addAlbum($params=array()){
		global $db;
		if(!$this->user_id){ $this->login();exit; }

		$user_id=$this->user_id;
		$user_info=getUserInfo($user_id); 
		//if(!$user_info){die('Not allowed');}
		$allow_extention=array('jpg','jpeg','png','pdf','docx','doc'); 	
		//pre($_FILES);pre($_POST);

		if($db->post('doSubmit')){
			
			
			#Assign Form Value
			$album_title= $this->db->db_prepare_input($this->db->post('album_title'));
			$description= $this->db->db_prepare_input($this->db->post('description'));
			$reporter= $this->db->db_prepare_input($this->db->post('reporter'));
			$album_cats= $this->db->db_prepare_input($this->db->post('album_cats'));			
			
			$seo_title=$_POST['seo_title'];
			$_POST['seo_title']=($seo_title)?$seo_title:makeurl($album_title);
			
			
			#Error Checkup
			if(!$album_title){
				$error = "Enter Album Name";
			}elseif($this->db->checkExists('image_albums',array("album_title" => $album_title))){
				$error = "This album already Exists";
			}else{
			#Insert To DB
				$_POST['user_id'] = $user_id;	
				$_POST['cat_id'] =$album_cats;	
				$album_id= $db->bindPOST('image_albums','album_id');
				if($album_id){
					redirect('siteadminpanel/manageAlbumPhotos/?type=image_albums&type_id='.$album_id);
				}//album_id
			}//if not error				
		}//if form submitted


		 //SHOW PAGES
		require(ADMIN_GET_TEMPLATE_DIRECTORY.'/header.php');
		require(ADMIN_TEMPLATE_STORE.'imagemanager' . DS .'album_add.php');  
		require(ADMIN_GET_TEMPLATE_DIRECTORY.'/footer.php');		
	}
	function manageAlbumPhotos($params=array()){
		global $db;
		if(!$this->user_id){ $this->login();exit; }

		$user_id=$this->user_id;
		//$album_id=$params['0']; 
		//$album_info=$db->select_single("SELECT * FROM image_albums WHERE album_id='$album_id'");

		//SHOW PAGES
		require(ADMIN_GET_TEMPLATE_DIRECTORY.'/header.php');
		require(ADMIN_TEMPLATE_STORE.'imagemanager' . DS .'album_manage_photos.php');  
		require(ADMIN_GET_TEMPLATE_DIRECTORY.'/footer.php');		
	}
	
    function addAlbumList($params=array()){
		global $db;
		if(!$this->user_id){ $this->login();exit; }

		$user_id=$this->user_id;
		$user_info=getUserInfo($user_id); 
		//if(!$user_info){die('Not allowed');}
		$allow_extention=array('jpg','jpeg','png','pdf','docx','doc'); 	
		//pre($_FILES);pre($_POST);

		if($db->post('doSubmit')){
			
			
			#Assign Form Value
			$album_title= $this->db->db_prepare_input($this->db->post('album_title'));
			$description= $this->db->db_prepare_input($this->db->post('description'));
			$reporter= $this->db->db_prepare_input($this->db->post('reporter'));
			$album_cats= $this->db->db_prepare_input($this->db->post('album_cats'));			
			$albumimages= $this->db->db_prepare_input($this->db->post('albumimages'));
			
			$seo_title=$_POST['seo_title'];
			$_POST['seo_title']=($seo_title)?$seo_title:makeurl($album_title);
			
			
			#Error Checkup
			if(!$album_title){
				$error = "Enter Album Name";
			}elseif($this->db->checkExists('image_albums',array("album_title" => $album_title))){
				$error = "This album already Exists";
			}else{
			#Insert To DB
				$_POST['user_id'] = $user_id;	
			//	$_POST['cat_id'] = implode(",",$album_cats);	
				$_POST['cat_id'] =$album_cats;	
				//$_POST['albumimages'] = ar_serialize($albumimages);
				$album_id= $db->bindPOST('image_albums','album_id');
				if($album_id){
					
						$upload_dir = IMAGE_DIR.'gallery/';
						$upload_url = IMAGE_URL.'gallery/';
						
						if($_FILES){
							foreach($_FILES['albumimages']['name']['image_name'] as $img_key => $file_name){
							 if($file_name){
							   $file_name=$_FILES['albumimages']['name']['image_name'][$img_key];
							   $file_tmp_name=$_FILES['albumimages']['tmp_name']['image_name'][$img_key];
							   $image_caption= $_POST['albumimages']['image_caption'][$img_key];
//$album_cover= $_POST['albumimages']['album_cover'][$img_key];
							   $slider_image= $_POST['albumimages']['slider_image'][$img_key];
							   $slider_image= ($slider_image)?$slider_image:0;
							   
							   
							   $file_ext=strtolower(@end(explode(".",$file_name)));
							   $new_file_name=date("Y_m_d").'_'.$album_id.'_'.$file_name;							
							   
							   list($width, $height, $type, $attr) = getimagesize($file_tmp_name);
							   
							   
							   if(in_array($file_ext,$allow_extention)){
								   $upload_to=$upload_dir. $new_file_name;
								  // echo $file_tmp_name .'='. $upload_to.'<br/>';
								   
								   
									if(@move_uploaded_file($file_tmp_name, $upload_to)){
										 $image_path=$upload_url. $new_file_name;
										 $imageinfo=array();
										 $imageinfo['type']='image_albums';
										 $imageinfo['type_id']=$album_id;
										 $imageinfo['image_name']=$new_file_name;
										 $imageinfo['image_caption']=$image_caption;
										 $imageinfo['slider_image']=$slider_image;
										 $imageinfo['image_path']=$image_path;
										 $imageinfo['width']=$width;
										 $imageinfo['height']=$height;
										 $imageinfo['image_ext']=$file_ext;
										 $image_id[]=$db->bindPOST('images','id',$imageinfo);
										 
										 #bof cover Image
										 if($_POST['albumimage']['cover_image'] == $img_key){
											// echo "UPDATE image_albums SET `fec_image`='$image_path' WHERE album_id='$album_id'";
											$db->edit("UPDATE image_albums SET `fec_image`='$image_path' WHERE album_id='$album_id'");   
										 }//
  								   }else{
									  $error .="Failed to upload $file_field_name";
								   }
								  }
								}//if file name
							}//	foreach file
						}//if files 
					
				 //echo "<br/>album id=".$album_id;	
				 $message ="Successfully Uploaded:: $album_id";
				}//album_id
			}//if not error				
		}//if form submitted


		 //SHOW PAGES
		require(ADMIN_GET_TEMPLATE_DIRECTORY.'/header.php');
		require(ADMIN_TEMPLATE_STORE.'imagemanager' . DS .'album_list_add.php');  
		require(ADMIN_GET_TEMPLATE_DIRECTORY.'/footer.php');		
	}
    
    function editAlbumList($params = array()){
		global $lang,$db,$session;
       
       	if(!$this->user_id){ $this->login();exit; }
	
        $user_id=$this->user_id;
        $album_id=$params['0']; 
		$album_info=$db->select_single("SELECT * FROM image_albums WHERE album_id='$album_id'");
	
		
		$allow_extention=array('jpg','jpeg','png','pdf','docx','doc'); 	
		//pre($_FILES);pre($_POST);

		if($db->post('doSubmit')){
			
			
			#Assign Form Value
			$album_title= $this->db->db_prepare_input($this->db->post('album_title'));
			$description= $this->db->db_prepare_input($this->db->post('description'));
			$reporter= $this->db->db_prepare_input($this->db->post('reporter'));
			$album_cats= $this->db->db_prepare_input($this->db->post('album_cats'));			
			$albumimages= $this->db->db_prepare_input($this->db->post('albumimages'));
			
			$seo_title=$_POST['seo_title'];
			$_POST['seo_title']=($seo_title)?$seo_title:makeurl($album_title);
			
			
			#Error Checkup
			if(!$album_title){
				$error = "Enter Album Name";
			}else{
			#Insert To DB
				$_POST['user_id'] = $user_id;	
				//$_POST['cat_id'] = implode(",",$album_cats);	
				$_POST['cat_id'] = $album_cats;	
				//$_POST['albumimages'] = ar_serialize($albumimages);
				$edit_id= $db->bindPOST('image_albums','album_id');
				if($album_id){
					
						$upload_dir = IMAGE_DIR.'gallery/';
						$upload_url = IMAGE_URL.'gallery/';
						
						if($_FILES){
							foreach($_FILES as $file_field_name => $file_info){
							 if($file_info["name"]){
							   $file_name=$file_info["name"];
							   $file_tmp_name=$file_info["tmp_name"];
							   $image_caption= $description;
							   
							   
							   $file_ext=strtolower(end(explode(".",$file_name)));
							   $new_file_name=date("Y_m_d").'_'.$album_id.'_cover_'.$file_name;							
							   
							   if(in_array($file_ext,$allow_extention)){
								   $upload_to=$upload_dir. $new_file_name;
								  // echo $file_tmp_name .'='. $upload_to.'<br/>';
								   
								   
									if(@move_uploaded_file($file_tmp_name, $upload_to)){
										 $image_path=$upload_url. $new_file_name;
										// echo "UPDATE image_albums SET `fec_image`='$image_path' WHERE album_id='$album_id'";
										 #bof cover Image
										 $db->edit("UPDATE image_albums SET `fec_image`='$image_path' WHERE album_id='$album_id'");   
										
  								   }else{
									  $error .="Failed to upload $file_field_name";
								   }
								  }
								}//if file name
							}//	foreach file
						}//if files 
					
				 //echo "<br/>album id=".$album_id;	
				 $message ="Successfully Updated:: $album_id";
				}//album_id
			}//if not error				
		}//if form submitted
 
 
 
		$album_info=$db->select_single("SELECT * FROM image_albums WHERE album_id='$album_id'");
		
		
        //SHOW PAGES
		require(ADMIN_GET_TEMPLATE_DIRECTORY.'/header.php');
		require(ADMIN_TEMPLATE_STORE.'imagemanager' . DS .'album_list_edit.php');  
		require(ADMIN_GET_TEMPLATE_DIRECTORY.'/footer.php');
	}
function photosAlbums($params = array()){
		global $lang,$db,$session;
  	    if(!$this->user_id){ $this->login();exit; }
        
        
            $tableName='image_albums';
            $primaryKey='album_id';
            $page = $db->get_post('page');
            $redirect_url ="siteadminpanel/photosAlbums/";
            $link ="siteadminpanel/photosAlbums/?";
            $doaction=$db->get('doaction');
            $allow_extention=array('jpg','jpeg','png'); 	
                     
            $get_action = $db->get('action');
        	$action_id = $db->get('action_id');
            
                     
            $get_action = $db->get('action');
        	$action_id = $db->get('action_id');
            #get/post action for list data 
                if($get_action)
                {
            		//echo '$get_action'.$get_action;
            	    switch($get_action)
            	    {
                        case 'approve':
                            echo $sql = "UPDATE $tableName SET status = '1' WHERE $primaryKey='$action_id'";
                            $db->update($sql);
                            break;
                        case 'disapprove':
                            $sql = "UPDATE $tableName SET status = '0' WHERE $primaryKey='$action_id'";
                            $db->update($sql);
                            break;
                        
                       case 'edit':
                             redirect('siteadminpanel/editAlbumList/'.$action_id);
					       $doaction=true; 
                            $edit = $db->select_single("SELECT * FROM ".$tableName." where $primaryKey=".$action_id);
                        break;	  
                        case 'delete':
                            $sql = "DELETE FROM $tableName WHERE $primaryKey='$action_id'";
                            $db->delete($sql);
                        break;	                 
            
            	    }
                    
                    if($get_action!='edit')
            	    redirect($redirect_url);
                }
            	
            	 if($db->post('formSubmittedROWS'))   ////////////manage post data
            	  {
            	  	
            	   $ids = $db->post('action_ids');
            	   $post_action = $db->post('action');
            	   
            		
            	  	if($ids)
            	  	{
            			//	echo '$post_action'.$post_action;
            	  		foreach($ids as $action_id)
            	  		{
            	  		    switch($post_action)
            	  	        {
            			  		case 'approve':
            			    	                $sql = "UPDATE $tableName SET status = '1' WHERE $primaryKey='$action_id'";
            			  		                $db->edit($sql);
            			  		                break;
            			  	   	case 'disapprove':
            			    	                $sql = "UPDATE $tableName SET status = '0' WHERE $primaryKey='$action_id'";
            			  		                $db->edit($sql);
            			  		                break;
                                                                  
            		            case 'delete':
                            					$sql = "DELETE FROM $tableName WHERE $primaryKey='$action_id'";
                            					//$db->delete($sql);    
            			  		                break;            
            	  	         }	
            	  		 }
            	  	  }
            		
                  }
            	
            
		#Images

		
	    $cat_name=$db->get('catID');
		
		if($cat_name){
		$sql_query="SELECT * FROM $tableName where cat_id like '%$cat_name%'";
         $link .="siteadminpanel/photosAlbums/?catID=".$cat_name;
		}else{
		$sql_query="SELECT * FROM $tableName";
		}
		
		$pages = make_pagination_all($sql_query,$page,$p_limit=16);
		$sql_query .= " ORDER BY $primaryKey DESC";
		$sql_query .= " LIMIT ".$pages['start_form'].",".$pages['per_page'];
	   $album_lists = $rows = $db->select($sql_query);
       
        require(ADMIN_GET_TEMPLATE_DIRECTORY.'/header.php');
	    require(ADMIN_TEMPLATE_STORE.'imagemanager' . DS .'manage_photo_albums.php');
	    require(ADMIN_GET_TEMPLATE_DIRECTORY.'/footer.php');	
	}
	
	function viewAlbum($params = array()){
		global $lang,$db,$session;
      	if(!$this->user_id){ $this->login();exit; }
      

		#album info
        $album_id=$params['0']; 
		$album_info=$db->select_single("SELECT * FROM image_albums WHERE album_id='$album_id' ");
		
		
		#Images
		$page = isset($params['2'])?$params['2']:1;
		$link = 'siteadminpanel/viewAlbum/'.$params['0'].'/'.$params['1'];
		
		
		$ImageType='image_albums';
		$sql_query = "SELECT * FROM images WHERE type='$ImageType' AND type_id='$album_id'";
		$pages = make_pagination_all($sql_query,$page,$p_limit=1);
		$sql_query .= " ORDER BY id ";
		$sql_query .= " LIMIT ".$pages['start_form'].",".$pages['per_page'];
		$album_images = $db->select($sql_query);
		//echo $sql_query;
	
	
		#view count
		/*
        $comment_post_id=$album_info['album_id'];
		if(state('vid')!=$comment_post_id){
			$db->update("UPDATE image_albums SET `viewed` = viewed+1 WHERE album_id=$comment_post_id");
			state('vid',$comment_post_id);
		}
		*/
			
       
       	require(COMMON_TEMPLATES.'header-common.php');
		//require(TEMPLATE_STORE.$this->controller . DS .'album_detail.php');
		require(ADMIN_TEMPLATE_STORE.'imagemanager' . DS .'album_detail.php');
	    require(COMMON_TEMPLATES.'footer-common.php');	
	}
    
    function popup_imagemanager($params = array()){
			global $lang,$db,$session;
		
			//if(!$this->user_id){ $this->login();exit; }
            
			require(COMMON_TEMPLATES.'header-common.php');
			require(ADMIN_TEMPLATE_STORE.$this->controller . DS .'popup_imagemanager.php');
			require(COMMON_TEMPLATES.'footer-common.php');	
   }
   
   function managePublicUsers($params = array()) {
            global $db, $session;

			$SHOW_DATEPICKER = true;
            #Assign Basic Table Info 
            $tableName='users';
            $primaryKey='user_id';
            $page = $db->get_post('page');
            $redirect_url ="siteadminpanel/manageUsers/";
            $link ="siteadminpanel/manageUsers/?";
            
            
            $get_action = $db->get('action');
        	$action_id = $db->get('action_id');
        	$parent_options='';
        	$state_options='';
        	$city_options='';
        	$thana_options='';
            	
            	
            	#add/edit Table data
            	if($db->post('formSubmitted')){

            		$user_password = $this->db->db_prepare_input($this->db->post('user_password'));
					if($user_password){   
						$_POST['user_rawpass']=$user_password;
						$user_password = $this->_encode($user_password);
						$_POST['user_password']=$user_password;
            		}
            		$entry_id=$db->bindPOST($tableName, $primaryKey);
            		redirect($redirect_url);
            	}
              
                        	
                #get/post action for list data 
                if($get_action)
                {
            		//echo '$get_action'.$get_action;
            	    switch($get_action)
            	    {
                        case 'approve':
                            echo $sql = "UPDATE $tableName SET user_status = '1' WHERE $primaryKey='$action_id'";
                            $db->update($sql);
                            break;
                        case 'disapprove':
                            $sql = "UPDATE $tableName SET user_status = '0' WHERE $primaryKey='$action_id'";
                            $db->update($sql);
                            break;
                        
                       case 'edit':
                            $edit = $db->select_single("SELECT * FROM ".$tableName." where $primaryKey=".$action_id);

                            $u_info=getUserInfo($edit['user_id']);

                            $parents =$db->select("SELECT * FROM users WHERE user_role=".$u_info['user_role']);
                            
                            
                            if($parents){
                            	foreach ($parents as $key => $p_info) {
                            		$sel=($p_info['user_id'] == $edit['parent_id'])?' selected':'';
                   
                            		$parent_options .= '<option value="'.$p_info['user_id'].'"'.$sel.'>'.$p_info['user_fname'].' '.$p_info['user_lname'].', '.$p_info['designation'].', '.$p_info['link3_id'].'</option>'."\n";
                            	}
                            }

                            $states = $db->select("SELECT DISTINCT Divisin_Name FROM bdthana");
                            if($states){
                            	foreach($states as $state){
                            		$sel=($state['Divisin_Name']==$edit['user_state'])?'selected':'';
                            		$state_options.='<option value="'.$state['Divisin_Name'].'"'.$sel.'>'.$state['Divisin_Name'].'</option>'."\n";
                            	}
                            }

                            $cities = $db->select("SELECT DISTINCT District_Name FROM bdthana");
                             if($cities){
                            	foreach($cities as $city){
                            		$sel=($city['District_Name']==$edit['user_city'])?'selected':'';

                            		$city_options.='<option value="'.$city['District_Name'].'"'.$sel.'>'.$city['District_Name'].'</option>'."\n";
                            		
                            	}
                            }

                            $thanas = $db->select("SELECT DISTINCT Thana_Name FROM bdthana");
                             if($thanas){
                            	foreach($thanas as $thana){
                            		$sel=($thana['Thana_Name']==$edit['user_thana'])?'selected':'';

                            		$thana_options.='<option value="'.$thana['Thana_Name'].'"'.$sel.'>'.$thana['Thana_Name'].'</option>'."\n";
                            		
                            	}
                            }


                        break;

                        case 'delete':
                            $sql = "DELETE FROM $tableName WHERE $primaryKey='$action_id'";
                             $sql = "";
                            if($db->delete($sql)){
                            	//delete from log 
                            	//delete from history 
                            	//	
                            }
                            break;	
                                    
            
            	    }
                    
                    if($get_action!='edit')
            	    redirect($redirect_url);
                }
            	
            	 if($db->post('formSubmittedROWS'))   ////////////manage post data
            	  {
            	  	
            	   $ids = $db->post('action_ids');
            	   $post_action = $db->post('action');
            	   
            		
            	  	if($ids)
            	  	{
            			//	echo '$post_action'.$post_action;
            	  		foreach($ids as $action_id)
            	  		{
            	  		    switch($post_action)
            	  	        {
            			  		case 'approve':
            			    	                $sql = "UPDATE $tableName SET user_status = '1' WHERE $primaryKey='$action_id'";
            			  		                $db->edit($sql);
            			  		                break;
            			  	   	case 'disapprove':
            			    	                $sql = "UPDATE $tableName SET user_status = '0' WHERE $primaryKey='$action_id'";
            			  		                $db->edit($sql);
            			  		                break;
            			  		                
            		            case 'delete':
                            					$sql = "DELETE FROM $tableName WHERE $primaryKey='$action_id'";
                            					$db->delete($sql);    
            			  		                break;            
            	  	         }	
            	  		 }
            	  	  }
            		
                  }
            	
            	
             
               #query for list of data 
                
             
             	$sql_query="SELECT * FROM $tableName WHERE $primaryKey !='' ";
                
               #
               
               if($db->get_post('user_role')){
                $user_role = $db->get_post('user_role');
                $sql_query.="AND user_role = '$user_role'";
                $link.="user_role=$user_role&";
               }
                
                #for search
            	if($db->get_post('q')){
            		$q=$db->get_post('q');
            		if(is_numeric($q)){
            			$sql_query .= "  AND $primaryKey='$q' ";
            		}elseif(is_string($q)){
            				$sql_query .= "  AND user_name='".$db->db_input($q)."' OR link3_id='".$db->db_input($q)."' OR user_email LIKE '%".$db->db_input($q)."%' ";
            		}
            
                    $link .="q=$q&";
            	}
                
                	                         
            	$pages = make_pagination($sql_query,$page,10);
            	$sql_query .= " ORDER BY $primaryKey DESC";
            	$sql_query .= " LIMIT ".$pages['start_form'].",".$pages['per_page'];
            	// echo $sql_query;
            	$rows = $db->select($sql_query);
            
            
                  
            
            /*
            //SHOW PAGES assign Values
			$view_data['rows'] = $rows;
			showAdminPage($view_data);
            */

            //echo ADMIN_TEMPLATE_STORE.$this->controller . DS .'manage_employees.php';exit;
            require(ADMIN_GET_TEMPLATE_DIRECTORY . '/header.php');
            require(ADMIN_TEMPLATE_STORE.$this->controller . DS .'manage_users.php');  
            require(ADMIN_GET_TEMPLATE_DIRECTORY . '/footer.php');
        }
		
		
		function reports($params=array()){
			global $db;
			if(!$this->user_id){ $this->login();exit; }	




			//SHOW PAGES
			require(ADMIN_GET_TEMPLATE_DIRECTORY. DS .'header.php');
			require(ADMIN_TEMPLATE_STORE.$this->controller . DS .'report_user_wise_news_count.php');  
			require(ADMIN_GET_TEMPLATE_DIRECTORY. DS .'footer.php');			
		}
    
}//eof class siteadminpanel
?>
