<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-6">
		<div class="panel panel-info">
			<div class="panel-heading">
			  <h3 class="panel-title">Change Password( <?=$admin_full_name?>)</h3>
			</div>
			<div class="panel-body">
			
<?php require(TEMPLATE_STORE.'displaymessage.php');?>   

<form  name="login_form" method="post" onsubmit="return checkPassword(this)">
	 <input name="formSubmitted" value="true" type="hidden" />

<?php
 if(isset($_GET['admin_id']) && $_GET['admin_id']){ ?>

<?php }else{ ?>	 
  <div class="form-group">
    <label for="exampleInputEmail1">Current Password<b>*</b></label>
   <input type="password" name="current_password" value='' placeholder="Current Password"  class="form-control" required/>
  </div>
<?php } ?>

  <div class="form-group">
    <label for="exampleInputEmail1">New Password<b>*</b></label>
    <input type="password" name="user_password" value='' placeholder="New Password"  class="form-control"  required/>
  </div>
  
  <div class="form-group">
    <label for="exampleInputPassword1">Confirm Password<b>*</b></label>
    <input type="password" name="user_repassword" placeholder="Confirm Password" class="form-control" required/>
  </div>        

 <button type="submit" class="btn btn-primary">Update</button> 
</form>

         </div><!--panel-body-->
	  </div>
	</div>
</div><!--row--> 		