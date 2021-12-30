<?php
/**
 * RAW PHP SCRIPT
 *
 * @package		RAWPHPSCRIPT
 * @author		Aditya(bfouzder@yahoo.com).
 * @copyright	Copyright (c) 2015.
 * @version 2.0
 */
	
class newspapers{
	
	var $db;
	var $session;
	var $controller;	
			
	function __construct()
	{
		global $lang,$db,$session;
		
		$this->db = $db;
		$this->session = $session;								
		$this->controller = 'newspapers';
		$this->member_id = state('CE_member_id');
         $this->user_id = state('AR_admin_id'); 
		$this->admin_id = state('AR_admin_id'); 
        $this->newspapers=true;
	}
			
	function index($params = array()){
		global $lang,$db,$session;
   	    if($_SERVER['SERVER_NAME'] == 'fns24.com'){
   	      redirect();  
   	    }
//	pre($params);
	
        require(GET_TEMPLATE_DIRECTORY.'/header.php');
		require(TEMPLATE_STORE.$this->controller . DS .'index.php');  
	    require(GET_TEMPLATE_DIRECTORY.'/footer.php');		
	}
	function category($params = array()){
		global $lang,$db,$session;
   	
		//pre($params);
		$menu_id=$params[0];
		$news_cat_name=$params[1];
		$page = $db->get('page');
		$page_limit=1000;
		$link ="category/$menu_id/$news_cat_name/?";
		#category Info
		$sql_query="SELECT *FROM `np_menuname` WHERE menu_id ='$menu_id' "; 
		$menu_info=$db->select_single($sql_query);
		$menu_name=$menu_info['menuname'];
		if(!$menu_info)die('Wrong Access!');
		
		#News by category
		$sql_query="SELECT * FROM np_news WHERE paper_id>'0' && categories='$menu_id'  ORDER BY `serial` ASC"; 
		$pages = make_pagination($sql_query,$page,$page_limit);
		$sql_query .= " LIMIT ".$pages['start_form'].",".$pages['per_page'];
		$all_news = $db->select($sql_query);
		//echo $sql_query;
	
	
        require(GET_TEMPLATE_DIRECTORY.'/header.php');
		require(TEMPLATE_STORE.$this->controller . DS .'category.php');  
	    require(GET_TEMPLATE_DIRECTORY.'/footer.php');		
	}
	
	
	function adnewspaper($params=array()){
	global $lang,$db,$session;
		    $tableName='np_menuname';
            $primaryKey='menu_id';
         
            $redirect_url ="newspapers/adnewspaper/";
            $link ="newspapers/adnewspaper/?";
            
            
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
             
              
		require(GET_TEMPLATE_DIRECTORY.'/header.php');
		require(TEMPLATE_STORE.$this->controller . DS .'addnewspaper.php');  
	    require(GET_TEMPLATE_DIRECTORY.'/footer.php');	
	}
	
	## bof All News Papers
		function manageNewsMenus($params=array()){
	   		global $lang,$db,$session;
	   		
	   	   	if(!$this->user_id){ redirect('https://www.fns24.com/siteadminpanel/'); exit; } 
        #Assign Basic Table Info 
            $tableName='np_menuname';
            $primaryKey='menu_id';
            $page = $db->get_post('page');
            $redirect_url ="newspapers/manageNewsMenus/";
            $link ="newspapers/manageNewsMenus/?";
            
            
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
            				$sql_query .= "  AND menuname LIKE '%".$db->db_input($q)."%'";
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
		require(ADMIN_TEMPLATE_STORE.$this->controller . DS .'manage_news_menus.php');  
		require(ADMIN_GET_TEMPLATE_DIRECTORY. DS .'footer.php'); 
       
	}

	function manageNewsPaper($params=array()){
	   		global $db;     
	   	   	if(!$this->user_id){ redirect('siteadminpanel'); exit; } 
        #Assign Basic Table Info 
            $tableName='np_news';
            $primaryKey='paper_id';
            $page = $db->get_post('page');
            $redirect_url ="newspapers/manageNewsPaper/";
            $link ="newspapers/manageNewsPaper/?";
            
            
            $get_action = $db->get('action');
        	$action_id = $db->get('action_id');
            	
            	
            #add/edit Table data
            	if($db->post('formSubmitted')){
            	   
            		$allow_extention=array('jpg','jpeg','png'); 
					$upload_dir = '/home/fns24bangla/public_html/allnewspaper/admin/newspicture/';
				    $upload_url = 'https://www.fns24.com/allnewspaper/admin/newspicture/';
					
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
    							     $image_url=$new_file_name;
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
                $sql_query.="AND categories='$sparent'";
                $link .="sparent=$sparent&";
               }
                
                #for search
            	if($db->get_post('q')){
            		$q=$db->get_post('q');
            		if(is_numeric($q)){
            			$sql_query .= "  AND $primaryKey='$q' ";
            		}elseif(is_string($q)){
            				$sql_query .= "  AND newstitle LIKE '%".$db->db_input($q)."%'";
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
		require(ADMIN_TEMPLATE_STORE.$this->controller . DS .'manage_newspapers.php');  
		require(ADMIN_GET_TEMPLATE_DIRECTORY. DS .'footer.php'); 
       
	}
	#eof Admin
}
?>