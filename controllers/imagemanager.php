<?php
/**
 * RAW PHP SCRIPT
 *
 * @package		RAWPHPSCRIPT
 * @author		Aditya(bfouzder@yahoo.com).
 * @copyright	Copyright (c) 2015.
 * @version 2.0
 */
	
class imagemanager{
	
	var $db;
	var $session;
	var $controller;	
			
	function __construct()
	{
		global $lang,$db,$session;
		
		$this->db = $db;
		$this->session = $session;								
		$this->controller = 'imagemanager';
		$this->user_id = state('CE_user_id');
		$this->admin_id = state('CE_member_id');
        
       
	}
			
	function index($params = array()){
		global $lang,$db,$session;
        				
		 
		 //SHOW PAGES
         require(GET_TEMPLATE_DIRECTORY.'/header.php');
		
		 if(!$this->user_id){
			require(TEMPLATE_STORE.$this->controller . DS .'dashboard.php'); 
		 }else{
			require(TEMPLATE_STORE.$this->controller . DS .'dashboard.php');  
		 }		
        require(GET_TEMPLATE_DIRECTORY.'/footer.php');		
	}
	function manage_category($params=array(),$main_link ="imagemanager/manage_category/?"){
		global $db;
		if(!$this->admin_id){redirect('siteadminpanel/login/'.base64UrlEncode(CURRENT_URL));}
			
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
			$rows = $db->select($sql_query);

	
			
		//SHOW PAGES
		require(COMMON_TEMPLATES.'header-common.php');
		require(TEMPLATE_STORE.$this->controller . DS .'manage_image_category.php');  
		require(COMMON_TEMPLATES.'footer-common.php');			
	} 
function addAlbumList($params=array()){
		global $db;
		//if(!$this->user_id){redirect('auth/login/'.base64UrlEncode(CURRENT_URL));}

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
			}elseif(!$description){
				$error = "Enter Description";
			}elseif($this->db->checkExists('image_albums',array("album_title" => $album_title))){
				$error = "This album already Exists";
			}else{
			#Insert To DB
				$_POST['user_id'] = $user_id;	
				$_POST['cat_id'] = implode(",",$album_cats);	
				//$_POST['albumimages'] = ar_serialize($albumimages);
				$album_id= $db->bindPOST('image_albums','album_id');
				if($album_id){
					
						$upload_dir = FILE_DIR;
						$upload_url = FILE_URL;
						
						if($_FILES){
							foreach($_FILES['albumimages']['name']['image_name'] as $img_key => $file_name){
							 if($file_name){
							   $file_name=$_FILES['albumimages']['name']['image_name'][$img_key];
							   $file_tmp_name=$_FILES['albumimages']['tmp_name']['image_name'][$img_key];
							   $image_caption= $_POST['albumimages']['image_caption'][$img_key];
							   
							   
							   $file_ext=strtolower(end(explode(".",$file_name)));
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
		require(GET_TEMPLATE_DIRECTORY.'/header.php');
		require(TEMPLATE_STORE.$this->controller . DS .'album_list_add.php');  
		require(GET_TEMPLATE_DIRECTORY.'/footer.php');		
	}
	
	function editAlbumList($params = array()){
		global $lang,$db,$session;
       
       
		
        $album_id=$params['0']; 
		$album_info=$db->select_single("SELECT * FROM image_albums WHERE album_id='$album_id' AND user_id='$user_id' ");
		
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
			}elseif(!$description){
				$error = "Enter Description";
			}else{
			#Insert To DB
				$_POST['user_id'] = $user_id;	
				$_POST['cat_id'] = implode(",",$album_cats);	
				//$_POST['albumimages'] = ar_serialize($albumimages);
				$edit_id= $db->bindPOST('image_albums','album_id');
				if($album_id){
					
						$upload_dir = FILE_DIR;
						$upload_url = FILE_URL;
						
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
										 echo "UPDATE image_albums SET `fec_image`='$image_path' WHERE album_id='$album_id'";
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
 
 
 
		$album_info=$db->select_single("SELECT * FROM image_albums WHERE album_id='$album_id' AND user_id='$user_id' ");
		
		
        require(COMMON_TEMPLATES.'header.php');
		require(TEMPLATE_STORE.$this->controller . DS .'album_list_edit.php');
	    require(COMMON_TEMPLATES.'footer.php');	
	}
	
	function viewAlbum($params = array()){
		global $lang,$db,$session;
      

		#album info
        $album_id=$params['0']; 
		$album_info=$db->select_single("SELECT * FROM image_albums WHERE album_id='$album_id' ");
		
		
		#Images
		$page = isset($params['2'])?$params['2']:1;
		$link = 'imagemanager/viewAlbum/'.$params['0'].'/'.$params['1'];
		
		
		$ImageType='image_albums';
		$sql_query = "SELECT * FROM images WHERE type='$ImageType' AND type_id='$album_id'";
		$pages = make_pagination_all($sql_query,$page,$p_limit=1);
		$sql_query .= " ORDER BY id ";
		$sql_query .= " LIMIT ".$pages['start_form'].",".$pages['per_page'];
		$album_images = $db->select($sql_query);
		//echo $sql_query;
	
	
		#view count
		$comment_post_id=$album_info['album_id'];
		if(state('vid')!=$comment_post_id){
			mysql_query("UPDATE image_albums SET `viewed` = viewed+1 WHERE album_id=$comment_post_id");
			state('vid',$comment_post_id);
		}
		
			
       
        require(COMMON_TEMPLATES.'header.php');
		require(TEMPLATE_STORE.$this->controller . DS .'album_detail.php');
	    require(COMMON_TEMPLATES.'footer.php');	
	}
	
	function albums($params = array()){
		global $lang,$db,$session;
  
		#Images
		$page = isset($params['1'])?$params['1']:1;
		$link = 'imagemanager/albums/'.$params['0'];
		
	    $cat_name=$params[0];
		
		if($cat_name){
		$sql_query="SELECT * FROM image_albums where cat_id like '%$cat_name%'";
		}else{
		$sql_query="SELECT * FROM image_albums";
		}
		
		$pages = make_pagination_all($sql_query,$page,$p_limit=16);
		$sql_query .= " ORDER BY album_id ";
		$sql_query .= " LIMIT ".$pages['start_form'].",".$pages['per_page'];
		//echo $sql_query;
		$album_lists = $db->select($sql_query);
       
        require(COMMON_TEMPLATES.'header.php');
		require(TEMPLATE_STORE.$this->controller . DS .'cat_albums.php');
	    require(COMMON_TEMPLATES.'footer.php');	
	}
	
	function popup_AlbumList($params = array()){
		global $lang,$db,$session;
      	if(!state('CE_admin')){
			if(!$this->user_id){redirect('auth/login/'.base64UrlEncode(CURRENT_URL));}  
			$user_id=$this->user_id;			
        }
		
		
        $album_id=$params['1']; 
		$view_composite= $params['2'];
 
		$album_list_info=$db->select_single("SELECT * FROM image_albums WHERE album_id='$album_id'");
		
		if(!$album_list_info){
			die('<br/>To View Tender:: Invalid access');
		}
	
		$user_id=$album_list_info['user_id'];
		$user_info=getUserInfo($user_id);		
       
       require(COMMON_TEMPLATES.'header-common.php');
	   require(TEMPLATE_STORE.$this->controller . DS .'breakdown_list_view.php');
	   require(COMMON_TEMPLATES.'footer-common.php');
	}
	
	
	function popup_imagemanager($params = array()){
			global $lang,$db,$session;
		
			
			require(COMMON_TEMPLATES.'header-common.php');
			require(TEMPLATE_STORE.$this->controller . DS .'popup_imagemanager.php');
			require(COMMON_TEMPLATES.'footer-common.php');	
   }
	
 
}
?>