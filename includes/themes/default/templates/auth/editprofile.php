<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-9">
		<div class="panel panel-primary">
			<div class="panel-heading">
			  <h3 class="panel-title">Bidder Edit Detail's</h3>
			</div>
			<div class="panel-body">  

<?php include(TEMPLATE_STORE.'displaymessage.php');?>
<form  name="signup_form" method="post" onsubmit="return checkSignUp(this)" enctype="multipart/form-data">
   <input type="hidden" name="formSubmitted" value="true"/>
    <input type="hidden" name="user_id" value="<?=$user_info['user_id']?>"/>
	   
	  
	  <div class="form-group">
		<label class="col-sm-3 control-label">&nbsp;</label>
		<div class="col-sm-8">
		  <p class="form-control-static"><b><i>Basic Information</i></b></p>
		</div>
	  </div>
       <div class="clearfix"></div>  
	<div class="form-group">
        <label for="inputEmail3" class="col-sm-3 control-label">Name<em>*</em></label>
        <div class="col-sm-8">
          <input type="text"  name="user_fname" value="<?=$user_info['user_fname'];?>" class="form-control"  placeholder="your name">
        </div>
      </div>
	    <div class="clearfix"></div>
      <div class="form-group">
        <label for="inputEmail3" class="col-sm-3 control-label">Email<em>*</em></label>
        <div class="col-sm-8">
          <input type="email"  name="user_email" value="<?=$user_info['user_email'];?>" class="form-control" id="inputEmail3" placeholder="Email">
        </div>
      </div>
        <div class="clearfix"></div>
       <div class="form-group">
        <label for="inputEmail3" class="col-sm-3 control-label">Phone<em>*</em></label>
        <div class="col-sm-8">
          <input type="text"  name="user_mobile" value="<?=$user_info['user_mobile'];?>" class="form-control"  placeholder="Contact No.">
        </div>
      </div>
	    <div class="clearfix"></div>
	   <div class="form-group">
        <label for="inputEmail3" class="col-sm-3 control-label">Birth Date<em>*</em></label>
        <div class="col-sm-8">
          <input type="text"  name="user_birthdate" value="<?=$user_info['user_birthdate']?>"  id="datepicker" class="form-control"  placeholder="Date of Birth">
        </div>
      </div>
	    <div class="clearfix"></div>
       <div class="form-group">
        <label  class="col-sm-3 control-label">Gender<em>*</em></label>
        <div class="col-sm-8">
            <label class="radio-inline">
              <input type="radio" name="user_gender" id="inlineRadio1" value="Male" <?php if($user_info['user_gender']=='Male') echo 'checked="checked"'; ?>> Male
            </label>
            <label class="radio-inline">
              <input type="radio" name="user_gender" id="inlineRadio2" value="Female" <?php if($user_info['user_gender']=='Female') echo 'checked="checked"'; ?>> Female
            </label>
        </div>
      </div>

	  <div class="clearfix"></div>
      <div class="form-group">
        <label for="inputEmail3" class="col-sm-3 control-label">Designation<em>*</em></label>
        <div class="col-sm-8">
          <input type="text"  name="user_designation" value="<?=$user_info['user_designation'];?>" class="form-control"  placeholder="Designation" required="required">
        </div>
      </div>
      
        
	  
	  <div class="clearfix"></div>
       <div class="form-group">
		<label class="col-sm-3 control-label">&nbsp;</label>
		<div class="col-sm-8">
		  <p class="form-control-static control-label"><b><i>Profile Picture</i></b></p>
		</div>
	  </div>
        <div class="clearfix"></div>
      <div class="form-group">
        <label for="inputEmail3" class="col-sm-3 control-label">Photo<em>*</em></label>
        <div class="col-sm-8">
          <input type="file"  name="user_picture"  placeholder="Passport size photo">
        </div>
      </div>

	

      <div class="form-group">
        <div class="col-sm-offset-3 col-sm-8">
          <button type="submit" class="btn btn-primary">Update</button>  
             
        </div>
      </div>
  </form>
 
  
  </div><!--panel-body-->
	  </div>
	</div>
	
	<div class="col-xs-12 col-sm-12 col-md-3">
		<div class="panel panel-success">
			<div class="panel-heading">
			  <h3 class="panel-title"><?=$user_info['user_fname']?></h3>
			</div>
				<div class="panel-body">      
					<img src="<?=FILE_URL.$user_info['user_picture']?>" width="200" />
						 
					<ul>
						<li><a href="<?=SCRIPT_URL?>auth/editprofile" title="" class="btn btn-link">Edit Profile</a></li>
						<li><a href="<?=SCRIPT_URL?>auth/changepassword" title="" class="btn btn-link">Change Password</a></li>
					</ul>	
				</div><!--panel-body-->
		  </div>
	</div>	
</div><!--row-->	