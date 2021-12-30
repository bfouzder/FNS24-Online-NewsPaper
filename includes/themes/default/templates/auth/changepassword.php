<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-6">
		<div class="panel panel-primary">
			<div class="panel-heading">
			  <h3 class="panel-title">Change your password</h3>
			</div>
			<div class="panel-body">
			
<p>If you wish to change your password, enter the new password here.  </p>

<?php require(TEMPLATE_STORE.'displaymessage.php');?>   

<form  name="login_form" method="post" onsubmit="return checkPassword(this)">
	 <input name="formSubmitted" value="true" type="hidden" />
	 
  <div class="form-group">
    <label for="exampleInputEmail1">Current Password<b>*</b></label>
   <input type="password" name="current_password" value='' placeholder="Current Password"  class="form-control" required/>
  </div>
  
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