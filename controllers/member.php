<?php
/**
 * RAW PHP SCRIPT
 *
 * @package		RAWPHPSCRIPT
 * @author		Aditya(bfouzder@yahoo.com).
 * @copyright	Copyright (c) 2015
 * @version 2.0
 */
class member
{	
	var $db;
	var $session;
	var $admin_id;
	var $controller;
			
	function __construct()
	{
		global $lang,$db,$session;
		
		$this->db = $db;
		$this->session = $session;								
		$this->controller = 'member';
		$this->admin_id = state('CE_user_id');
	}
			
	function index($params = array()){
		

			if(!$this->admin_id){
				$this->login();
			}else{
				
				$this->dashboard();
			}
			
	} 

	
		
	function dashboard(){
			global $db;
		 if(!$this->admin_id){redirect('siteadminpanel');}	
		//Level 4	
	
		 //SHOW PAGES
		require(GET_TEMPLATE_DIRECTORY.'/header.php');
		require(TEMPLATE_STORE.$this->controller . DS .'dashboard.php');  
		require(GET_TEMPLATE_DIRECTORY.'/footer.php');		
	}
	
	function addList($params=array()){
			global $db;
		if(!$this->admin_id){redirect('siteadminpanel/login/'.base64UrlEncode(CURRENT_URL));}				
	
	
        $user_id=$this->user_id;
		$user_info=getUserInfo($user_id); 
        if(!$user_info){die('Not allowed');}
		
		$to_name=$user_info['user_fname'];
		$to_email=$user_info['user_email'];
		if($db->post('doSubmit')){
			
	$bv_no=$_POST['bv_no'];	

	$_POST['user_id'] = $user_id;
	$_POST['bklist'] = ar_serialize($_POST['bklist']);
	$bdl_id = $db->bindPOST('breakdown_lists','id');
	if($bdl_id){

#send a Notify Email 
$to_name=$user_info['user_fname'];
$to_email=$user_info['user_email'];
	
$mailer=array();	
$mailer['to_name']=$to_name;
$mailer['to_email']=$to_email;
$mailer['subject']="BreakDown List Submissiontion: successfully";
$mailer['message']="Dear Mr. $to_name,<br/>
You have successfully submitted your BreakDown List for. <b>$bv_no</b><br/>

Thank You<br/>". getSettings('EMAIL_SIGNATURE');
send_emailer($mailer);


#send a Notify Email to Authority
$to_authority_name=getSettings('SITE_ADMIN_NAME');
$to_authority_email=getSettings('SITE_ADMIN_EMAIL');

$mailer=array();	
$mailer['to_name']=$to_authority_name;
$mailer['to_email']=$to_authority_email;
$mailer['subject']="$to_name are successfully submitted EWU BreakDown List :$bv_no ";
$mailer['message']="<b>$to_name</b> are successfully submitted for :
<b>BreakDown List: $bv_no <br/> 
Contact Person:  $to_name<br/> 
Designation :  ".$user_info['user_designation']."<br/> 
Contact Number: ".$user_info['user_mobile']."<br/> 
Email ID : $to_email<br/> 
</b>";
send_emailer($mailer);	
urlredirect(CURRENT_URL);	
			}//tenderbox_id
		}//if form submitted
		
	
		$submit_info= $db->select_single("SELECT * FROM breakdown_lists WHERE bv_id='$bv_no' AND user_id='$user_id' ");
		if($submit_info){
		$message="<b>You have successfully added your list. @".date_time($submit_info['submit_date'])."</b>";	
		}	
				
		 //SHOW PAGES
		require(GET_TEMPLATE_DIRECTORY.'/header.php');
		require(TEMPLATE_STORE.$this->controller . DS .'submit_composite_list.php');  
		require(GET_TEMPLATE_DIRECTORY.'/footer.php');		
	}
	
	function allEmployees($params=array()){
		global $db;
		if(!$this->admin_id){redirect('siteadminpanel/login/'.base64UrlEncode(CURRENT_URL));}
			
		//SHOW PAGES
		require(GET_TEMPLATE_DIRECTORY.'/header.php');
		require(TEMPLATE_STORE.$this->controller . DS .'users_list.php');  
		require(GET_TEMPLATE_DIRECTORY.'/footer.php');		
	}
	
	function manage_lists($params=array()){
			global $db;
		if(!$this->admin_id){redirect('siteadminpanel/login/'.base64UrlEncode(CURRENT_URL));}
		
   
		$limit=2;
		//$user_info=getUserInfo($this->user_id);	       

		$popup=true;
		
		$profile_url='<a href="'.SCRIPT_URL.'profile/'.$user_name.'">'.$user_info['user_name'].'</a>';
		$page = isset($params['2'])?$params['2']:1;
		$link =$params['0'].'/'.$params['1'];

					
		$sql_query="SELECT * FROM `breakdown_lists`";

		$pages = make_pagination_all($sql_query,$page,$p_limit=20);
		$sql_query .= " ORDER BY date(`date_added`) DESC ";
		$sql_query .= " LIMIT ".$pages['start_form'].",".$pages['per_page'];
		
		$onlinearticles = $db->select($sql_query);
     
            
	  //SHOW PAGES
        require(GET_TEMPLATE_DIRECTORY.'/header.php');
        require(TEMPLATE_STORE.'home' . DS .'all_lists_admin.php');     
        require(GET_TEMPLATE_DIRECTORY.'/footer.php');	
	}
	
	function manage_tests($params=array()){
		if(!$this->admin_id){redirect('siteadminpanel/login/'.base64UrlEncode(CURRENT_URL));}
		$this->manage_category($params);
	}
	
	function manage_category($params=array(),$main_link ="member/manage_category/?"){
		global $db;
		if(!$this->admin_id){redirect('siteadminpanel/login/'.base64UrlEncode(CURRENT_URL));}
			
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
		require(COMMON_TEMPLATES.'header-common.php');
		require(TEMPLATE_STORE.$this->controller . DS .'manage_category.php');  
		require(COMMON_TEMPLATES.'footer-common.php');			
	}
	
	function employee($params = array()){
		global $lang,$db,$session;
		//if(!state('CE_admin_level')){ die('wrong access');}   
		//pre($params);
		$user_id=$params['0'];
		$user_info=getUserInfo($user_id);
		if(!$user_info){die('Wrong access');}
		
	    require(COMMON_TEMPLATES.'header-common.php');
	    require(TEMPLATE_STORE.$this->controller . DS .'user_info.php');
	    require(COMMON_TEMPLATES.'footer-common.php');	
	}
	
	
	function print_all_bidders($params = array()){
		global $db;
		if(!$this->admin_id){redirect('siteadminpanel/login/'.base64UrlEncode(CURRENT_URL));}
		
		//pre($params);		
		$tender_id=$params[0];
	    $tender_info =getArticleInfo($tender_id);
		if(state('CE_admin_level')==2){ //evaluation
		$sql_query="SELECT * FROM `tenderbox` where type_id='$tender_id' AND status !=0 ORDER BY sub_total ASC" ; 
		}else{
			$sql_query="SELECT * FROM `tenderbox` where type_id='$tender_id' AND status =0 ORDER BY sub_total ASC" ; 
		}
		$rows=$db->select($sql_query);
		$tr_html='';	
		if($rows){	
			foreach($rows as $k=> $tender_box_info){
				$article_info =getArticleInfo($tender_box_info['type_id']);
				$tender_name=$article_info['menu_text'];
				$article_url= __article_url($article_info);			
				$bidder_info =getUserInfo($tender_box_info['user_id']);
				$company_name = $bidder_info['company_name'];
				
				$bidder_public_profile=SCRIPT_URL.'bidder/'.$bidder_info['user_id'].'/'.$bidder_info['company_name'];
				$bidder_bid_info=SCRIPT_URL.'bidder_wise_bid_info/'.$bidder_info['user_id'].'/'.$tender_box_info['id'].'/'.$tender_name;
				
				$tr_html .='<tr>
								<td>'.($k+1).'</td>
								<td><h5>'.$bidder_info['company_name'].'</h5></td>
								<td><b>Tk. '.number_format($tender_box_info['sub_total']).'</b></td>
								<td>'.date_time($tender_box_info['submit_date']).'</td>
							  </tr>'."\n";
			}
		}

		//SHOW PAGES
		if(!$tender_info){die('Wrong access');}
		
	    require(COMMON_TEMPLATES.'header-common.php');
	    require(TEMPLATE_STORE.$this->controller . DS .'print_tender_wise_bidder_list.php');
	    require(COMMON_TEMPLATES.'footer-common.php');
	}
	
	function settings($params = array()){
		global $db,$session;
		if(!$this->admin_id){redirect('siteadminpanel/login/'.base64UrlEncode(CURRENT_URL));}
		$page_url=SCRIPT_URL.'member/settings/';
		
		
	    require(COMMON_TEMPLATES.'header.php');
	    require(TEMPLATE_STORE.$this->controller . DS .'siteSettings.php');
	    require(COMMON_TEMPLATES.'footer.php');
	}
	 function form_validate($params = array()){
		global $db,$session;
		
		
	    require(COMMON_TEMPLATES.'header.php');
	    require(TEMPLATE_STORE.$this->controller . DS .'form_validate.php');
	    require(COMMON_TEMPLATES.'footer.php');
	}
	 
#authentication 		 
	function login($params = array()){
		global $db;
		$error="";	
		 if($this->admin_id){
				getAdminRolewiseBoard();
		 }else{
			redirect("siteadminpanel/login");  
		 }
	}
	function signup(){
		if($this->admin_id){
				getAdminRolewiseBoard();
		 }else{
			redirect("siteadminpanel/signup");  
		 }
	}
	
}//eof class auth
?>