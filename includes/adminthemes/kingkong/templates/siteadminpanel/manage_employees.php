
<!--bofof Data entry Form--->
<?php
//pre($edit);
 if($db->get('doaction')=='add'){
$panel_title="Add New Employee";
?>
<div class="row" id="add_edit_block"  style="display:block">
<?php }elseif($edit){ 
$panel_title="Update Employee";
?>
<div class="row" id="add_edit_block" <?=($edit)?' style="display:block"':' style="display:none"';?>>
<?php }else{ ?>

<div class="row" id="add_edit_block" style="display:none">
<?php } ?> 

 <div class="col-md-12 col-sm-12 col-xs-12">
	<div class="x_panel">
	  <div class="x_title">
		<h2><?=$panel_title?></h2>                    
		<div class="clearfix"></div>
	  </div>
	  <div class="x_content">
		<br />
		<form id="demo-form2" class="form-horizontal form-label-left" method="POST" >
		 <input type="hidden" name="formSubmitted" value="1" >
		 <?php if($edit){ ?>
		 <input type="hidden" name="<?=$primaryKey?>" value="<?=$edit[$primaryKey]?>" >
		 <?php } ?>

		
<div class="panel panel-success">
	<div class="panel-heading">
	  <h3 class="panel-title">Employee Information</h3>
	</div>
	<div class="panel-body">
		
		
		<div class="form-group">
		<label class="control-label col-md-2 col-sm-3 col-xs-12" for="name">Link3 ID:</label>
		<div class="col-md-9 col-sm-9 col-xs-12">
		  <input type="text" name="link3_id" value="<?=$edit['link3_id']?>" class="form-control col-md-7 col-xs-12">
		</div>
		</div>

		<div class="form-group">
		<label class="control-label col-md-2 col-sm-3 col-xs-12" for="name">User Role:</label>
		<div class="col-md-9 col-sm-9 col-xs-12">
		  <select name="user_role" class="form-control">
		  	<option value="">--select one--</option>
		  	<?=__getUserRole($edit['user_role']);?>
		  </select>
		</div>
		</div>

		<div class="form-group">
		<label class="control-label col-md-2 col-sm-3 col-xs-12" for="name">Name:</label>
		<div class="col-md-5 col-sm-5 col-xs-6">
		  <input type="text" name="user_fname" value="<?=$edit['user_fname']?>" placeholder="First Name" class="form-control col-md-7 col-xs-12">
		 
		</div>
		<div class="col-md-4 col-sm-4 col-xs-6">
		 
		   <input type="text" name="user_lname" value="<?=$edit['user_lname']?>" placeholder="Last Name" class="form-control col-md-7 col-xs-12">
		</div>
		</div>

        <div class="form-group">
		<label class="control-label col-md-2 col-sm-3 col-xs-12" for="name">User Email:</label>
		<div class="col-md-9 col-sm-9 col-xs-12">
		  <input type="text" name="user_email" value="<?=$edit['user_email']?>" class="form-control col-md-7 col-xs-12">
		</div>
		</div>

		<div class="form-group">
		<label class="control-label col-md-2 col-sm-3 col-xs-12" for="name">Mobile No:</label>
		<div class="col-md-9 col-sm-9 col-xs-12">
		  <input type="text" name="user_mobile" value="<?= $edit['user_mobile'] ?>" class="form-control col-md-7 col-xs-12">
		</div>
		</div>
		
	  <div class="form-group">
		<label class="control-label col-md-2 col-sm-3 col-xs-12" for="name">IP Phone:(Num/Ext)</label>
		<div class="col-md-9 col-sm-9 col-xs-12">
		  <input type="text" name="user_ipphone" value="<?= $edit['user_ipphone'] ?>" class="form-control col-md-7 col-xs-12">
		</div>
		</div>

		<?php if($parent_options){ ?>
		<div class="form-group">
		<label class="control-label col-md-2 col-sm-3 col-xs-12" for="name">Reporting Boss:</label>
		<div class="col-md-9 col-sm-9 col-xs-12">
		  <select name="parent_id" class="form-control">
		  	<option value="">--select one--</option>
		  	<?=$parent_options?>
		  </select>
		</div>
		</div>
		<?php } ?>

		
      
       
        
               
        
		<div class="form-group">
		<label class="control-label col-md-2 col-sm-3 col-xs-12" for="name">Designation:</label>
		<div class="col-md-9 col-sm-9 col-xs-12">
            <select name="designation" class="form-control" id="designation" >
            <option value="">Select Designation</option> 
            <?= getDesignationOptions($edit['designation']);?>
            </select>
		</div>
		</div>


		<div class="form-group">
    		<label class="control-label col-md-2 col-sm-3 col-xs-12" for="name">Department:</label>
    		<div class="col-md-9 col-sm-9 col-xs-12">
    		   <select name="department" class="form-control" id="department" >
                <option value="">Select Department</option> 
                <?= getDepartmentOptions($edit['department']);?>
                </select>               
    		</div>
		</div>
        
    
        
        
       	<div class="form-group">
		<label class="control-label col-md-2 col-sm-3 col-xs-12" for="name">Section:</label>
		<div class="col-md-9 col-sm-9 col-xs-12">
		  <input type="text" name="section" value="<?=$edit['section']?>" class="form-control col-md-7 col-xs-12">
		</div>
		</div>
        
            <div class="form-group">
		<label class="control-label col-md-2 col-sm-3 col-xs-12" for="name">Dept Group:</label>
		<div class="col-md-9 col-sm-9 col-xs-12">
		  <input type="text" name="dept_group" value="<?=$edit['dept_group']?>" class="form-control col-md-7 col-xs-12">
		</div>
		</div>
        
  
        <div class="form-group">
    		<label class="control-label col-md-2 col-sm-3 col-xs-12" for="name">Working Zone:</label>
    		<div class="col-md-9 col-sm-9 col-xs-12">
    		  <select name="working_zone" class="form-control" id="working_zone"  >
                <option value="">Select your working Zone</option> 
                <?= getZoneOptions($edit['working_zone']);?>
                <option value="BANGLADESH" <?=($edit['working_zone']=='BANGLADESH')?' selected="selected"':'';?>>Whole Bangladesh**</option>
                </select>            
    		</div>
		</div>
        <div class="form-group">
		<label class="control-label col-md-2 col-sm-3 col-xs-12" for="name">Working Area:</label>
		<div class="col-md-9 col-sm-9 col-xs-12">
		  <input type="text" name="working_area" value="<?=$edit['working_area']?>" class="form-control col-md-7 col-xs-12">
		</div>
		</div>
        
		<div class="form-group">
		<label class="control-label col-md-2 col-sm-3 col-xs-12" for="name">Gender:</label>
		<div class="col-md-9 col-sm-9 col-xs-12">
		  <select class="form-control col-md-7 col-xs-12" name="user_gender">
		  	<?php if($edit['user_gender']){?>
		  	<option value="<?=$edit['user_gender']?>"><?=$edit['user_gender']?></option>

		  	<?php if($edit['user_gender']=="Female"){?>
		  	<option value="Male">Male</option> <?php }else{?>
		  	<option value="Female">Female</option><?php }?>


		  	<?php }else{?>
		  		<option value="Male">Male</option>
		  		<option value="Female">Female</option> <?php }?>
		  </select>
		</div>
		</div>


		<div class="form-group">
		<label class="control-label col-md-2 col-sm-3 col-xs-12" for="name">Blood Group:</label>
		<div class="col-md-9 col-sm-9 col-xs-12">
		  <input type="text" name="blood_group" value="<?=$edit['blood_group']?>" class="form-control col-md-7 col-xs-12">
		</div>
		</div>

		<div class="form-group">
		<label class="control-label col-md-2 col-sm-3 col-xs-12" for="name">Date of Birth:</label>
		<div class="col-md-9 col-sm-9 col-xs-12">
		  <input type="text" name="user_birthdate" value="<?=$edit['user_birthdate']?>" class="form-control col-md-7 col-xs-12">
		</div>
		</div>

		<h2 style="margin-left: 45%">Address</h2>

		<div class="form-group">
		<label class="control-label col-md-2 col-sm-3 col-xs-12" for="name">Address</label>
		<div class="col-md-9 col-sm-9 col-xs-12">
		  <input type="text" name="user_address" value="<?=$edit['user_address']?>" class="form-control col-md-7 col-xs-12">
		</div>
		</div>

		<div class="form-group">
		<label class="control-label col-md-2 col-sm-3 col-xs-12" for="name">Country:</label>
		<div class="col-md-9 col-sm-9 col-xs-12">
		  <input type="text" name="user_country" value="<?=$edit['user_country']?>" class="form-control col-md-7 col-xs-12">
		</div>
		</div>

		<?php if($state_options){ ?>
		<div class="form-group">
		<label class="control-label col-md-2 col-sm-3 col-xs-12" for="name">State:</label>
		<div class="col-md-9 col-sm-9 col-xs-12">
		  <select name="user_state" id="state_dropdown"  class="form-control col-md-7 col-xs-12">
		  	<option value="">Select State</option>
		  	<?= $state_options ?>
		  </select>
		</div>
		</div>
		

		<div class="form-group">
		<label class="control-label col-md-2 col-sm-3 col-xs-12" for="name">City:</label>
		<div class="col-md-9 col-sm-9 col-xs-12">
		  <select name="user_city" id="city_dropdown" class="form-control col-md-7 col-xs-12">
		  	<option value="">Select City</option>
		  	<?php if($city_options){ ?>
		  	<?= $city_options ?>
		  	<?php } ?>
		  	
		  </select>
		</div>
		</div>

		<div class="form-group">
		<label class="control-label col-md-2 col-sm-3 col-xs-12" for="name">Thana:</label>
		<div class="col-md-9 col-sm-9 col-xs-12">
		  <select name="user_thana" id="thana_dropdown"  class="form-control col-md-7 col-xs-12">
		  	<option value="">Select Thana</option>
		  	<?php if($thana_options){ ?>
		  	<?= $thana_options ?>
		  	<?php } ?>
		  	
		  </select>
		</div>
		</div>
		<?php } ?>
		

		<div class="form-group">
		<label class="control-label col-md-2 col-sm-3 col-xs-12" for="name">Zip Code:</label>
		<div class="col-md-9 col-sm-9 col-xs-12">
		  <input type="text" name="user_zipcode" value="<?=$edit['user_zipcode']?>" class="form-control col-md-7 col-xs-12">
		</div>
		</div>

		<div class="form-group">
		<label class="control-label col-md-2 col-sm-3 col-xs-12" for="name">Class:</label>
		<div class="col-md-9 col-sm-9 col-xs-12">
		  <input type="text" name="class" value="<?=$edit['class']?>" class="form-control col-md-7 col-xs-12">
		</div>
		</div>

		<div class="form-group">
		<label class="control-label col-md-2 col-sm-3 col-xs-12" for="name">Section:</label>
		<div class="col-md-9 col-sm-9 col-xs-12">
		  <input type="text" name="section" value="<?=$edit['section']?>" class="form-control col-md-7 col-xs-12">
		</div>
		</div>

		<div class="form-group">
		<label class="control-label col-md-2 col-sm-3 col-xs-12" for="name">O Location:</label>
		<div class="col-md-9 col-sm-9 col-xs-12">
		  <input type="text" name="o_location" value="<?=$edit['o_location']?>" class="form-control col-md-7 col-xs-12">
		</div>
		</div>

		<div class="form-group">
		<label class="control-label col-md-2 col-sm-3 col-xs-12" for="name">Signature:</label>
		<div class="col-md-9 col-sm-9 col-xs-12">
		  <input type="text" name="signature" value="<?=$edit['signature']?>" class="form-control col-md-7 col-xs-12">
		</div>
		</div>

		<div class="form-group">
		<label class="control-label col-md-2 col-sm-3 col-xs-12" for="name">User IP:</label>
		<div class="col-md-9 col-sm-9 col-xs-12">
		  <input type="text" name="user_ip" value="<?=$edit['user_ip']?>" class="form-control col-md-7 col-xs-12">
		</div>
		</div>


		<div class="form-group">
		<label class="control-label col-md-2 col-sm-3 col-xs-12" for="name">User Banned:</label>
		<div class="col-md-9 col-sm-9 col-xs-12">
		  <input type="text" name="user_banned" value="<?=$edit['user_banned']?>" class="form-control col-md-7 col-xs-12">
		</div>
		</div>

		<div class="form-group">
		<label class="control-label col-md-2 col-sm-3 col-xs-12" for="name">Banned Reason:</label>
		<div class="col-md-9 col-sm-9 col-xs-12">
		  <input type="text" name="user_banned_reason" value="<?=$edit['user_banned_reason']?>" class="form-control col-md-7 col-xs-12">
		</div>
		</div>

		<div class="form-group">
		<label class="control-label col-md-2 col-sm-3 col-xs-12" for="name">Validate Code:</label>
		<div class="col-md-9 col-sm-9 col-xs-12">
		  <input type="text" name="validate_code" value="<?=$edit['validate_code']?>" class="form-control col-md-7 col-xs-12">
		</div>
		</div>

		<div class="form-group">
		<label class="control-label col-md-2 col-sm-3 col-xs-12" for="name">User Status:</label>
		<div class="col-md-9 col-sm-9 col-xs-12">
			<label class="radio-inline">
 				<input type="radio" name="user_status" <?= ($edit['user_status']=='1')?' checked="checked"':''; ?> value="1"> Yes</label>
			<label class="radio-inline">
			<input type="radio" name="user_status" value="0" <?= ($edit['user_status']=='0')?' checked="checked"':''; ?> > No	</label>
		</div>
		</div>

		<div class="form-group">
		<label class="control-label col-md-2 col-sm-3 col-xs-12" for="name">Module Allowed:</label>
		<div class="col-md-9 col-sm-9 col-xs-12">
			<label class="radio-inline">
 				<input type="radio" name="module_allowed" <?= ($edit['module_allowed']=='1')?' checked="checked"':''; ?> value="1"> Yes</label>
			<label class="radio-inline">
			<input type="radio" name="module_allowed" value="0" <?= ($edit['module_allowed']=='0')?' checked="checked"':''; ?> > No	</label>
		</div>
		</div>

		<h2 style="margin-left: 45%">Login Information</h2>
		<div class="form-group">
		<label class="control-label col-md-2 col-sm-3 col-xs-12" for="name">User Name:</label>
		<div class="col-md-9 col-sm-9 col-xs-12">
		  <input type="text" name="user_name" value="<?=$edit['user_name']?>" class="form-control col-md-7 col-xs-12">
		</div>
		</div>

		<div class="form-group">
		<label class="control-label col-md-2 col-sm-3 col-xs-12" for="name">User Password:</label>
		<div class="col-md-9 col-sm-9 col-xs-12">
		  <input type="password" name="user_password" value="" class="form-control col-md-7 col-xs-12">
		</div>
		</div>

		<div class="form-group">
		<label class="control-label col-md-2 col-sm-3 col-xs-12" for="name">User Lastlogin:</label>
		<div class="col-md-9 col-sm-9 col-xs-12">
		  <input type="text" name="user_lastlogin" value="<?= $edit['user_lastlogin']?>" class="form-control col-md-7 col-xs-12">
		</div>
		</div>
		
		  
	</div><!--/panel-body-->
</div><!--/panel-->	

	
		  
		  <div class="form-group submit_sec">
			<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
			    <button type="submit" name="submit" class="btn btn-success">Submit</button>
				  <button type="button" class="btn btn-primary">Reset</button>
				  <a class="btn btn-danger" href="<?=$redirect_url?>">Cancel</a>
			</div>
		  </div>
		</form>
	  </div>
	</div>
  </div>
</div>

<!--/eof Data entry Form--->



<!--Listing-->	


<?php $edit=($db->get('doaction')=='add')?true:$edit;?>        
 
<div class="row" id="add_edit_block_list" <?=($edit)?' style="display:none"':' style="display:block"';?>>

	<div class="col-xs-12 col-sm-12 col-md-12">	           
            
    <div class="x_panel">
	  <div class="x_title">
		<h2><i class="fa fa-th-list"></i> List of Employees</h2>                    
		<div class="clearfix"></div>
	  </div>
	  <div class="x_content">
             
<!--bof topBAR-->
<div class="table-responsive">	
    <table class="table table-bordered">
        <thead>
            <tr>
            <th>  
            <!--bof search Panel-->
            <?php $sq=($q)?$q:"Search here";?>
            <form class="form-inline" method="get" onsubmit="return checkSearch(this)">
            	<div class="form-group">
            		<label class="sr-only" for="exampleInputAmount">Search</label>
            		<div class="input-group">
            			<!--<div class="input-group-addon">Search</div>-->
            			<input type="text" class="form-control" name="q" value="<?=$q?>"   placeholder="<?=$sq?>">
            		</div>
            	</div>
            	<button type="submit" class="btn btn-primary">GO</button>
            </form>
            <!--eof search Panel-->	 
            </th>
            <th><form action="" method="get"> 
            		<select name="user_role" class="form-control" id="user_role" onchange="submit(this);">
					     <option value="">Filter by User Role</option> 
					      <?=__getUserRole($db->get_post('user_role'));?>
				  	</select>
				</form> 
			</th>
            </tr>
        </thead>
    </table>
</div><!--table Responsive-->
<div class="clear"></div>
<!--eof topBAR-->     
      
<!--bof Listing---------------------------->	
<form action="" method="post"  class="form-inline"  onsubmit="return check_action()">
 <input type="hidden" value="true" name="formSubmittedROWS"/>	 
  
 <div class="table-responsive">
 <table class="table table-bordered">
	<thead>
        <thead class="thead">
          <tr>
          	<th width="5%"><input type="checkbox" id="check_uncheck_top" value="all" onclick="__checkAll(<?= $rows?count($rows): 0 ?>,'check_uncheck_top')" /></th>
          	
          	<th>Link3 ID</th>
            <th>Name</th>
          	<th>User Email</th> 
          	<th>Phone No</th>          
            <th>Status</th>
            <th>Action</th>
             </tr>
        </thead>
        <tbody class="tbody">
        <?php if($rows): ?> 
        
        <?php foreach($rows as $key => $value):
            
            $class=(($i%2)==0)?'col':'col1';
            #set action_urls
                $action_id=$value[$primaryKey];
                $active_url=SCRIPT_URL.$redirect_url.'?action_id='.$action_id.'&action=disapprove';
                $inactive_url=SCRIPT_URL.$redirect_url.'?action_id='.$action_id.'&action=approve';
                $edit_url=SCRIPT_URL.$redirect_url.'?action_id='.$action_id.'&action=edit';
                $del_url=SCRIPT_URL.$redirect_url.'?action_id='.$action_id.'&action=delete';
                $view_url=$user_detail_url=__user_info_url($value['user_name']);
                $view_log_url=SCRIPT_URL.$this->controller.'/LogView/?user='.$value['user_name'];
                $view_kpi_url=SCRIPT_URL.$this->controller.'/kpiView/?user='.$value['user_name'];
                $view_todoList_url=SCRIPT_URL.$this->controller.'/TodoListView/?user_id='.$value['user_id'];

        
        
		     // pre($value);
	        
            
        ?>
         
         
            <tr class="<?=$class;?>" >
                <td><input type="checkbox" name="action_ids[]" id="checksingle<?php echo $key; ?>" value="<?=$action_id?>" /></td>


                <td><?= $value['link3_id']; ?></td>
                <td><?= $value['user_fname'].' '.$value['user_lname']; ?></td>
                <td><?= $value['user_email']; ?></td>
                <td><?= $value['user_mobile']; ?></td>
                
                <td class="action_active_inactive">
                    <?php if( $value['user_status'] == 1){ ?>
                        <a href="<?=$active_url?>" class="label label-success"><i class="fa fa-check" aria-hidden="true"></i> Approved</a>
                    <?php }else{ ?>
                    <a href="<?=$inactive_url?>"   class="label label-warning"><i class="fa fa-circle" aria-hidden="true"></i> Pending</a>	
                    <?php } ?> 
                </td>      
                <td  class="action_edit_delete">
                    <a href="<?=$edit_url?>" title="Edit" class="btn btn-default btn-xs"><i class="fa fa-pencil-square-o"> EDIT</i></a>
                    &nbsp;
                    <a href="<?=$del_url?>" title="Delete" onclick="return confirm('Are You Sure You want to delete?')" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"> DEL</i> </a>
                    &nbsp;
                    <a href="<?=$view_url?>" title="Edit" class="btn btn-info btn-xs fancybox fancybox.iframe" target="_blank" ><i class="fa fa-eye"> VIEW</i></a>
                    <a href="<?=$view_log_url?>" title="Log data" class="btn btn-default btn-xs fancybox fancybox.iframe" target="_blank" ><i class="fa fa-eye"> Log Data</i></a>
                    &nbsp;
                    <a href="<?=$view_kpi_url?>" title="KPI data" class="btn btn-default btn-xs fancybox fancybox.iframe" target="_blank" ><i class="fa fa-eye"> KPI Data</i></a>
                    &nbsp;
                    <a href="<?=$view_todoList_url?>" title="TodoList" class="btn btn-default btn-xs fancybox fancybox.iframe" target="_blank" ><i class="fa fa-eye"> TodoList</i></a>
                </td>
            </tr>
            
            <?php endforeach; ?>
            <?php else: ?>
            <tr class="col"><td colspan="8">No Result Found.</td></tr>
            <?php endif; ?>
          
        </tbody>  
        <tfoot class="tfoot">
          <tr>
		     <td align="left"><input type="checkbox" id="check_uncheck_bottom" value="all" onclick="__checkAll(<?= $rows?count($rows): 0 ?>,'check_uncheck_bottom')" /></td>
         	 <td align="left">
					<div class="form-group">
						<select name="action" class="form-control" id="p_action">
							<option value="" selected="selected">Select Action</option>
							<option value="approve" <?php if($db->post('action')=='approve'){ ?> selected="selected" <?php } ?>>Approve</option>
							<option value="disapprove" <?php if($db->post('action')=='disapprove'){ ?> selected="selected" <?php } ?>>disapprove</option>
							<option value="delete" <?php if($db->post('action')=='delete'){ ?> selected="selected" <?php } ?>>Delete</option>
						</select>
					</div>
              </td>
              <td align="left">      
					<input type="submit" value="Submit" name="" class="btn btn-success"  style="margin-top:2px;"/>
				
             </td>
          </tr>
         </tfoot>  
      </table>
</div><!--table Responsive-->
</form>
    
<?php include(TEMPLATE_STORE.'pagination_raw.php');?>
<!--/eof Listing---------------------------->


			</div><!--/end panel-body-->
	  </div>
	</div>
</div><!--/end row-->


<?php 
	function __getUserRole($user_role){
		global $db;
		$userRoleArray=array("1"=>"Supper", "2"=>"Retail", "3"=>"Corporate", "4"=>"Bank_NBF", "5"=>"Strategic", "6"=>"Customer Support", "7"=>"HR", "8"=>"Admin", "9"=>"VAS", "10"=>"Campaign", "11"=>"Technician", "12"=>"Office", "13"=>"Assistant");
		foreach($userRoleArray as $key=>$value){
			$sel = ($key == $user_role)? 'selected="selected"':'';
			$option.='<option value="'.$key.'"'.$sel.'>'.$value.'</option>';
		}
		return $option;
	}
?>


<script type="text/javascript">
	$("#state_dropdown").change(function(){
		var stateName = $("#state_dropdown").val();
		var url ='<?=SCRIPT_URL.'ajax/ajax_action.php'?>';
		$.post(url,{action:"getCity",stateName:stateName},function(data){
			$("#city_dropdown").html(data);
    	});
	});
</script>

<script type="text/javascript">
	$("#city_dropdown").change(function(){
		var cityName = $("#city_dropdown").val();
		var url ='<?=SCRIPT_URL.'ajax/ajax_action.php'?>';
		$.post(url,{action:"getThana",cityName:cityName},function(data){
			$("#thana_dropdown").html(data);
    	});
	});
	
</script>

