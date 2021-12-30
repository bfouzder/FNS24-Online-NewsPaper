<?php
/**
 * AR_PHPMVC
 *
 * @package		PHPMVC_SCRIPT
 * @author		Aditya
 * @copyright	Copyright (c) 2017, TheARSoft.
 * @version 4.0
 */
	class publicnews{
		
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
			$this->controller = 'publicnews';
			$this->user_id = state('AR_user_id'); 
			$this->member_level = state('AR_user_id'); 
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
			require(GET_TEMPLATE_DIRECTORY.'/header.php');
			require(TEMPLATE_STORE.$this->controller . DS .'dashboard.php');  
			require(GET_TEMPLATE_DIRECTORY.'/footer.php');				
		}
#Users	
    function add($params=array()){
	   		global $db, $session;      
            	if(!$this->user_id){ $this->login();exit; }
                $user_id=$this->user_id;
                $u_info=getUserInfo($user_id);
        #Assign Basic Table Info 
            $tableName='all_news_temp';
            $primaryKey='news_id_temp';
            $page = $db->get_post('page');
            $redirect_url ="publicnews/add/";
            $link ="publicnews/add/?";
            $doaction='add';
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
            		$entry_id=$db->bindPOST($tableName, $primaryKey);
                    $news_id_temp=($action_id)?$action_id:$entry_id;
                    if($news_id_temp){
                       // pre($_FILES);
                       	if($_FILES){
    						foreach($_FILES as $file_field_name => $file_info){
    						 if($file_info["name"]){
    						   $file_name=$file_info["name"];
    						   $file_tmp_name=$file_info["tmp_name"];
    						   $file_ext=strtolower(@end(explode(".",$file_name)));
    						   $new_file_name=$news_id_temp.'_'.$file_field_name.'_'.$file_name;							
    						   if(in_array($file_ext,$allow_extention)){
    							   $upload_to=$upload_dir. $new_file_name;
    							   //echo $file_tmp_name .'='. $upload_to;
                                   $image_url=$upload_url. $new_file_name;
    								if(@move_uploaded_file($file_tmp_name, $upload_to)){
    								    //echo "UPDATE $tableName SET `$file_field_name`='$image_url' WHERE $primaryKey='$news_id_temp'";
    									$db->edit("UPDATE $tableName SET `$file_field_name`='$image_url' WHERE $primaryKey='$news_id_temp'");
    								}
    							  }
    							}//if file name
    						}//	foreach file
    						
    					}//if files   
                    }//if news_id_temp
                    
            		if($get_action!='edit'){
						 $session->flashmessage('successMessage','News Has been submitted successfully. it will be published after admin approval');
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
             
           
       
	  	//SHOW PAGES
	/*	require(ADMIN_GET_TEMPLATE_DIRECTORY. DS .'header.php');
		require(ADMIN_TEMPLATE_STORE.$this->controller . DS .'add_news.php');  
		require(ADMIN_GET_TEMPLATE_DIRECTORY. DS .'footer.php'); 
        */
        
        
            require(GET_TEMPLATE_DIRECTORY.'/header.php');
            require(TEMPLATE_STORE.$this->controller . DS .'add_news.php');  		
            require(GET_TEMPLATE_DIRECTORY.'/footer.php');
            
       
	}
    
    	function manageNews($params=array()){
	   		global $db, $session;      
            	if(!$this->user_id){ $this->login();exit; }
                
                 $user_id=$this->user_id;
                $u_info=getUserInfo($user_id);
                
        #Assign Basic Table Info 
            $tableName='all_news_temp';
            $primaryKey='news_id_temp';
            $page = $db->get_post('page');
            $redirect_url ="publicnews/manageNews/";
            $link ="publicnews/manageNews/?";
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
            		$entry_id=$db->bindPOST($tableName, $primaryKey);
                    $news_id_temp=($action_id)?$action_id:$entry_id;
                    if($news_id_temp){
                       // pre($_FILES);
                       	if($_FILES){
    						foreach($_FILES as $file_field_name => $file_info){
    						 if($file_info["name"]){
    						   $file_name=$file_info["name"];
    						   $file_tmp_name=$file_info["tmp_name"];
    						   $file_ext=strtolower(@end(explode(".",$file_name)));
    						   $new_file_name=$news_id_temp.'_'.$file_field_name.'_'.$file_name;							
    						   if(in_array($file_ext,$allow_extention)){
    							   $upload_to=$upload_dir. $new_file_name;
    							   //echo $file_tmp_name .'='. $upload_to;
                                   $image_url=$upload_url. $new_file_name;
    								if(@move_uploaded_file($file_tmp_name, $upload_to)){
    								    //echo "UPDATE $tableName SET `$file_field_name`='$image_url' WHERE $primaryKey='$news_id_temp'";
    									$db->edit("UPDATE $tableName SET `$file_field_name`='$image_url' WHERE $primaryKey='$news_id_temp'");
    								}
    							  }
    							}//if file name
    						}//	foreach file
    						
    					}//if files   
                    }//if news_id_temp
                    
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
			   
             	$sql_query="SELECT * FROM $tableName WHERE user_id = $user_id ";
              
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
       
       
       /*
	  	//SHOW PAGES
		require(ADMIN_GET_TEMPLATE_DIRECTORY. DS .'header.php');
		require(ADMIN_TEMPLATE_STORE.$this->controller . DS .'manage_news.php');  
		require(ADMIN_GET_TEMPLATE_DIRECTORY. DS .'footer.php'); 
       
       */
       	  	//SHOW PAGES
		require(GET_TEMPLATE_DIRECTORY. DS .'header.php');
		require(TEMPLATE_STORE.$this->controller . DS .'manage_news.php');  
		require(GET_TEMPLATE_DIRECTORY. DS .'footer.php');
       
	}
    
    
	function manageCategory($params=array(),$main_link ="publicnews/manageCategory/?"){
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
        
        

            #require(ADMIN_TEMPLATE_STORE.$this->controller . DS .'index.php');  		
            
            require(GET_TEMPLATE_DIRECTORY.'/header.php');
            require(TEMPLATE_STORE.$this->controller . DS .'index.php');  		
            require(GET_TEMPLATE_DIRECTORY.'/footer.php');
	   
	}
    
   
	
		
	
	
	
	function logout(){
	   global $db,$session;
	   
		$user_id=state('AR_admin_id');
		
		$user = array(
			'AR_user_id'			=> '',
			'AR_user_name'				=> FALSE,    			
			'AR_user_mobile'			=> FALSE
		);	
	   
		$this->session->sess_destroy();	    
		urlredirect(SCRIPT_URL);
	}	
   
	

    
#ImageManager
   
    
    
    function popup_imagemanager($params = array()){
			global $lang,$db,$session;
		
			if(!$this->user_id){ $this->login();exit; }
            
			require(COMMON_TEMPLATES.'header-common.php');
			require(ADMIN_TEMPLATE_STORE.$this->controller . DS .'popup_imagemanager.php');
			require(COMMON_TEMPLATES.'footer-common.php');	
   }
    
}//eof class publicnews
?>