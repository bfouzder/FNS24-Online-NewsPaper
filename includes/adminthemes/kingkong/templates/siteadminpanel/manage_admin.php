<?php 
$primary_key = 'admin_id';
$table_name = 'admin';
function getAdminRoleArray(){
	$role_array=array(
	'4'=>'Comment Moderator',
	'3'=>'Quote Moderator',
	'2'=>'Editor',
	'1'=>'Administrator',//Supper Administrator
	);
	return $role_array;
}	
$role_array=getAdminRoleArray();	
	
?>

<?php
	$redurect_url ="siteadminpanel/manageAdminUsers";    
	$link ="siteadminpanel/manageAdminUsers?";    
	$parent=$db->get_post('parent');
	
  	$action  = $db->get('action');
  	$admin_id  = $db->get('eid');
  	if($action){
		  	switch($action){
		  		case 'edit':
		  					$edit=$db->getRowArray('admin',$admin_id);
		  					break;
	  		   	case 'delete':
	    	                 $sql = "DELETE FROM admin WHERE admin_id='$admin_id' AND admin_id!=1";
	  		                 $db->delete($sql);
	  		                 redirect($redurect_url);
	  		                 break;                
		  	}
		
  	}

  
     


	if($db->post('formSubmitted')){ 	
		   $err = array(); 
		   $admin_name= $db->db_prepare_input($db->post('admin_name'));
		   $admin_email = $db->db_prepare_input($db->post('admin_email'));
		   $admin_phone = $db->db_prepare_input($db->post('admin_phone'));
		   $admin_password = $db->db_prepare_input($db->post('admin_pass'));
		   $admin_repassword = $db->db_prepare_input($db->post('admin_re_pass'));
		   $fname = $db->db_prepare_input($db->post('fname'));
		   $lname = $db->db_prepare_input($db->post('lname'));
		   $admin_level = $db->db_prepare_input($db->post('admin_level'));
 
		   // validate data now
		    if(strlen(trim($admin_name)) < 3 || strlen(trim($admin_name)) > 32)
			  	array_push($err,"Login Must be between 3-32 letters long");
		    if(!valid_email($admin_email))
			  	array_push($err,"Invalid Email Provided");
			
	if($admin_id){
		
		
	}else{
		
		if(strlen(trim($admin_password)) < 3 || strlen(trim($admin_password)) > 32)
			  	array_push($err,"Password Must be between 4-32 letters long");
			if($admin_password != $admin_repassword)
				array_push($err,"Password not match");
			
		
		if($db->checkExist('admin',array("admin_name" => $admin_name)))
			array_push($err,"Duplicate Login Name");
		if($db->checkExist('admin',array("admin_email" => $admin_email )))
			array_push($err,"Duplicate Email");	
	}
		    
			if($err)
			 $error =implode("<br />",$err);
			else
			{
				 $now=date("Y-m-d H:i:s");
				 if($admin_password){
					 $_POST['admin_pass'] = _encode($admin_password);	 
				 }
			
				 
				 $insert_id = $db->bindPOST('admin','admin_id');
				 if( $insert_id){
						$message = "Seccess"; 
				 }else{
						$error = "Failed to add"; 
				 }
			
		   }
	}
?>

<script type="text/javascript">    
     function toggle(){
     	$("#editdiv").toggle();
     } 
</script>
<style>
.inputform li{list-style-type:none;}
.search-form{margin-right:20px;}
.search-header{background:#F4EFE7; padding:10px !important; color:#000; border-radius:4px;}
.toggle_button{ width:200px; text-align:center; border:3px solid #000;  padding:3px 4px; font-weight:bold;font-size:14px; display:block; border-radius:4px; background:Orange; color:#fff;}
.toggle_button:hover{background:red; color:#fff; border:3px solid #d94f1e; }
</style> 

<div class="row">
<div class="col-xs-12 col-sm-12 col-md-12">
		<div class="panel panel-primary">
			<div class="panel-heading">
			  <h3 class="panel-title">Manage Authors (Total : <?=$pages['total_data']?>)</h3>
			</div>
			<div class="panel-body">
<?php include(TEMPLATE_STORE.'displaymessage.php');?>
<div class="clearfix"></div> 
<?php if(!isset($edit)){?>
 
<a onclick="toggle();" class="btn btn-danger  pull-right"><i class="fa fa-plus-circle"></i> &nbsp; Add New Member </a><div class="clearfix"><br/></div> 
	<?php } ?>
<div style="display:<?=isset($edit[$primary_key])?"block":"none";?>" id="editdiv" class="clearfix">
<!--bof Entry Form-->

		<div class="panel panel-danger">
			<div class="panel-heading">
			  <h3 class="panel-title">Add/Edit New Admin User</h3>
			</div>
			<div class="panel-body">  
     
         <form method="post" action="" onsubmit="return CheckForm(this);" >
				  <div class="form-group">
						<label> Name : </label>
						<input type="text" class="form-control" name="fname" value="<?php if(isset($edit)) echo $edit['fname']?>" size="40"/> </li>
				 </div>
				 <div class="form-group"><label> Email : </label> 					
					  <input type="text" class="form-control" name="admin_email"  value="<?php if(isset($edit)) echo $edit['admin_email']?>" size="40"/>
				 </div>
				 <div class="form-group"><label> Phone : </label> 					
					  <input type="text" class="form-control" name="admin_phone"  value="<?php if(isset($edit)) echo $edit['admin_phone']?>" size="40"/>
					 </div>
				 <div class="form-group"><label> Login Name : </label> 
				 <input type="text" class="form-control" name="admin_name" value="<?php if(isset($edit)) echo $edit['admin_name']?>" size="30"/>
					 </div>
					 
				<?php if(!$edit[$primary_key]){ ?>	 
				 <div class="form-group"><label> Password : </label>					
						<input type="password" name="admin_pass"  class="form-control"  size="30" value="" />
					 </div>
				 <div class="form-group"><label> Confirm Password: </label>					
						<input type="password" name="admin_re_pass"  class="form-control"  size="30" value="" />
					 </div>
				<?php } ?>	 
				 <div class="form-group"><label> Assign Role : </label> 
						<select name="admin_level" class="form-control">
						<option value="">--- Choose ---</option>
						<?php 
						foreach ($role_array as $role_id=>$role_name){
						$sel = ($edit['admin_level']==$role_id)?' selected="selected"':'';		
						echo '<option value="'.$role_id.'" '.$sel.'>'.$role_name.'</option>'."\n";                                                   				
						}
						?>
						</select>
					 </div>
				 <div class="form-group"><label> &nbsp; </label>

					 	<input name="formSubmitted" value="true" type="hidden" />
						<?php if(isset($edit) && $edit['admin_id']){?>
						<input name="admin_id" value="<?=$edit['admin_id']?>" type="hidden" />
						<input type="submit" class="btn btn-info" value="Update"/> 
						<?php }else{ ?>
						<input type="submit" class="btn btn-info" value="Submit"/>  
						<?php } ?>
						<a class="btn btn-danger" href="<?=$redurect_url?>">Cancle</a>
					  
					</div>
			 </form>       
       
     

	 </div><!--panel-body-->
	</div><!--panel-danger-->
 </div><!--editdiv-->
 
<!--Listing-->	


<table class="table table-bordered">
<thead>
<tr>
<th>
<!--bof search Panel-->	  
<?php $sq=($q)?$q:"Enter search keywords here";?>
<form class="form-inline" method="get" onsubmit="return checkSearch(this)">
	<div class="form-group">
		<label class="sr-only" for="exampleInputAmount">Search</label>
		<div class="input-group">
			<div class="input-group-addon">Search</div>
			<input type="text" class="form-control" name="q" value="<?=$q?>"   placeholder="<?=$sq?>" width="80%">
	<?php if($parent){ ?> <input type="hidden" name="parent" value="<?=$parent?>"/> <?php } ?>
			
	</div>
	</div>
	<button type="submit" class="btn btn-info">GO</button>
</form>
<!--eof search Panel-->	 
</th>
<th>

<form action="" method="get">
                 <?php if($q || $parent){ ?>
                    <input type="hidden" name="q" value="<?=$q?>"/>
                    <input type="button" class="btn btn-warning" onclick="window.location.href='<?=$redurect_url?>'" value="Show All"/>
                 <?php } ?>
          <div class="form-group">      
                  <select name="parent" class="form-control"  id="type" onchange="submit(this);"  style="width:200px;" >
				     <option value="">Choose any</option> 
					   <?php 
					   foreach ($role_array as $role_id=>$role_name){
						$sel = ($db->get_post('parent')==$role_id)?' selected="selected"':'';		
						echo '<option value="'.$role_id.'" '.$sel.'>'.$role_name.'</option>'."\n";                                                   				
						}
					  ?>
				  </select>
				 </div>
              </form></th>
</tr>
</thead>
</table>			
<div class="clearfix"></div>
<?php
$page = $db->get('page');
$link =$redurect_url."?";
	
		                   
	$sql_query="SELECT * FROM `admin` WHERE admin_id !=1 ";
	$q=trim($_REQUEST['q']);
    if($q){
	$q=str_replace("\\","",$q);        
$sql_query="(SELECT * FROM `$table_name` WHERE $primary_key !='1' AND admin_name LIKE '%$q%' OR admin_email LIKE '%$q%' ) ";
      $link .="q=$q&";
	}else{	   
	   $sql_query="SELECT *FROM $table_name WHERE $primary_key !='1' ";       
	}
	
	$parent_title="";
	if($parent){        
	   $sql_query .= "  AND admin_level='$parent' ";	
       $link .="parent=$parent&";
	   $parent_title=' <font color="green">:: '.$role_array[$parent].'</font>';
	}                         
	$pages = make_pagination($sql_query,$page);
	$sql_query .= " ORDER BY admin_id";
	$sql_query .= " LIMIT ".$pages['start_form'].",".$pages['per_page'];
	//echo $sql_query;
	$rows = $db->select($sql_query);
  //pre($rows);
?>	
<div class="clearfix"></div>	
	<table cellpadding="1" cellspacing="1" class="table table-bordered">
		<thead class="thead">
		<tr>
            <th>Full Name</th>            
            <th>Email &amp; Phone</th>
			<th>LoginName</th>
            <th>Role</th>            
            <th>Action</th>
        </tr>
        </thead>
		
<tbody class="tbody">	
<?php
if($rows){
$i=0;
foreach ($rows as $val){
	$class=(($i%2)==0)?'col':'col1';
?>	
	<tr class="<?=$class;?>">
		<td align="left"><b><?=$val['fname'];?> <?=$val['lname'];?></b> </td>
		
		<td>
		<?=$val['admin_email'];?><br/>
		Phone: <?=$val['admin_phone'];?></td>
		<td align="left"><b><?=$val['admin_name'];?></b> </td>
        <td><?=($role_array[$val['admin_level']]);?>
		
		      	
		</td>
        		
		<td>         		
		    <a href="<?=$redurect_url?>?action=edit&eid=<?=$val['admin_id'];?>" title="Edit"><button type="button" class="btn btn-default  btn-xs"> <i class="fa fa-pencil-square-o"></i>edit</button> </a>
		    <a href="<?=$redurect_url?>?action=delete&eid=<?=$val['admin_id'];?>" onclick="return confirm('Are you sure you want to delete?');" title="Delete"><button type="button" class="btn btn-danger btn-xs"><i class="fa fa-times"></i>del</button></a>
           <a href="<?=ADMIN_URL?>changepassword?admin_id=<?=$val['admin_id'];?>" title="ChangePass" class="fancybox fancybox.iframe"><button type="button" class="btn btn-warning btn-xs"><i class="fa fa-key"></i>Change Pass</button></a> 
           <a href="<?=ADMIN_URL?>adminLogView?admin_name=<?=$val['admin_name'];?>" title="LogView" class="fancybox fancybox.iframe"><button type="button" class="btn btn-success btn-xs"><i class="fa fa-eye"></i>View Log</button></a> 
       </td>
		<!--  <td><a href="<?=SCRIPT_URL?>siteadminpanel/popup_scriptLogByMember/<?=$val['admin_name'];?>/<?=$val['admin_id'];?>" title="Log History"  class="fancybox fancybox.iframe" target="_blank"><button type="button" class="btn btn-info btn-xs"><i class="fa fa-history"></i> Log History</button></a></td>-->
		
	</tr>	
<?php
		$i++;					  
	}   /// end foreach	
}else{
?>	
	<tr class="<?=$class;?>"><td colspan="6">No User submitted</td></tr>
<?php
}
?>	
 </tbody>
        <tfoot class="tfoot">
          <tr>
            <td colspan="5">&nbsp;</td>
         </tr>
        </tfoot>    
</table>
<div class="datatbl">
<?php include(ADMIN_DIR.'templates/common/pagination.php'); ?>	
</div>
   
		</div><!--panel-body-->
	  </div>
	</div>
</div>