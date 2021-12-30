<?php
 $captcha_mode= getSettings('CAPTCHA_MODE');   //CHECK CAPTCH MODE IS ON OR OFF
 if($captcha_mode){
 	require_once(BASE_DIR."includes/3rdParty/vimage/vImage.php");
    $vImage = new vImage();	
 }
?>
<?php //bof FORM CHECK  ?>
<script language="javascript" type="text/javascript">
function  checkSignUp(form){
	var date = '<?=date("Y-m-d", mktime(0, 0, 0, date("m"), date("d"),   date("Y")-18))?>'; 
	 $("#errordata_block").css('display','block');     
     if(form.user_email.value=="" ||  !form.user_email.value.match(/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/) )
		$('#errordata').html("Valid e-mail required");
	else if(form.user_name.value=="" || form.user_name.value.length < 3)
	    $('#errordata').html("Username cann't be null or at least 3 charecter");
    else if(form.user_name.value.length  > 32)
	    $('#errordata').html("Username must be less than 32 letters long");
    else if(!form.user_name.value.match(/^([a-zA-Z0-9_\-])+$/))
	    $('#errordata').html("Invalid Username format");	 
    else if(form.user_password.value=="" || form.user_password.value.length < 4 )
		$('#errordata').html("Password should be at least 4 letters long");
	else if(form.user_password.value.length > 32)
	    $('#errordata').html("Password should be less than 32 letters long");
    else if(form.user_password.value != form.user_repassword.value)
		$('#errordata').html("Password and retype password do not match");
	else if(form.vImageCodP.value=="")
	   	$('#errordata').html("Enter captch code");   	 
   	else
		  return true;
  
  return false;
}
</script>

<link href="<?=SCRIPT_URL?>includes/datepicker/ui.all.css" rel="stylesheet" type="text/css"/>
<script src="<?=SCRIPT_URL?>includes/datepicker/ui.core.js" type="text/javascript"></script>
<script src="<?=SCRIPT_URL?>includes/datepicker/ui.datepicker.js" type="text/javascript"></script>

<script type="text/javascript">
	$(function() {
		$("#datepicker").datepicker();
		$('#datepicker').datepicker('option', {dateFormat: 'yy-mm-dd'}); 
				
		$("#datepicker2").datepicker();
		$('#datepicker2').datepicker('option', {dateFormat: 'yy-mm-dd'}); 
	});
</script>
<?php //eof FORM CHECK  ?>
<style>
ul.signup li{list-style-type:none;}
#ui-datepicker-div{display:none;}
</style>
<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-7">
		<div class="panel panel-primary">
			<div class="panel-heading">
			  <h3 class="panel-title">Create account</h3>
			</div>
			<div class="panel-body">  

<?php include(TEMPLATE_STORE.'displaymessage.php');?>
	
  <form  name="signup_form" method="post" onsubmit="return checkSignUp(this)" enctype="multipart/form-data">
   <input type="hidden" name="formSubmitted" value="true"/>
	   
	  
	  <div class="form-group">
		<label class="col-sm-3 control-label">&nbsp;</label>
		<div class="col-sm-8">
		  <p class="form-control-static"><b><i>Basic Information</i></b></p>
		</div>
	  </div>

       <div class="clearfix"></div>  

	  <div class="form-group">
        <label for="inputEmail3" class="col-sm-3 control-label">Newspaper Name<em>*</em></label>
        <div class="col-sm-8">
          <input type="text"  name="company_name" value="<?=$user_info['company_name'];?>" class="form-control"  placeholder="Full Name">
        </div>
      </div>
	   <div class="clearfix"></div>  

	   <div class="form-group">
        <label for="inputEmail3" class="col-sm-3 control-label">Editor Name<em>*</em></label>
        <div class="col-sm-8">
          <input type="text"  name="user_fname" value="<?=$user_info['user_fname'];?>" class="form-control"  placeholder="Full Name">
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
        <label for="inputEmail3" class="col-sm-3 control-label">District<em>*</em></label>
        <div class="col-sm-8">
          <input type="text"  name="user_city" value="<?=$user_info['user_city'];?>" class="form-control"  placeholder="Contact No.">
        </div>
      </div>
	  
	   <div class="clearfix"></div>
       <div class="form-group">
        <label  class="col-sm-3 control-label">User type<em>*</em></label>
        <div class="col-sm-8">
            <label class="radio-inline">
              <input type="radio" name="user_gender" id="inlineRadio1" value="Paid" <?php if($user_info['user_gender']=='Paid') echo 'checked="checked"'; ?>> Paid
            </label>
            <label class="radio-inline">
              <input type="radio" name="user_gender" id="inlineRadio2" value="Free" <?php if($user_info['user_gender']=='Free') echo 'checked="checked"'; ?>> Free
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
		  <p class="form-control-static control-label"><b><i>Login Information</i></b></p>
		</div>
	  </div>
         <div class="clearfix"></div>   
       <div class="form-group">
        <label class="col-sm-3 control-label">User name<em>*</em></label>
        <div class="col-sm-8">
          <input type="text"  name="user_name" value="" class="form-control"  placeholder="Login name">
        </div>
      </div> 
  <div class="clearfix"></div>	  
      <div class="form-group">
        <label for="Password" class="col-sm-3 control-label">Password<em>*</em></label>
        <div class="col-sm-8">
          <input type="password"  name="user_password" value="" class="form-control">
        </div>
      </div>
        <div class="clearfix"></div>
      <div class="form-group">
        <label for="RePassword" class="col-sm-3 control-label">RePassword<em>*</em></label>
        <div class="col-sm-8">
          <input type="password"  name="user_repassword" value="" class="form-control">
        </div>
      </div>
	  
	  
	  <div class="clearfix"></div>
      <!--<div class="form-group">
        <label for="Role" class="col-sm-3 control-label">Role Setup<em>*</em></label>
        <div class="col-sm-8">
          <select name="user_role" class="form-control">
			<option value="">Choose</option>
			<?php 
			$role_array=getUserRoleArray();	
			foreach ($role_array as $role_id=>$role_name){
			$sel = ($user_info['user_role']==$role_id)?' selected="selected"':'';		
			echo '<option value="'.$role_id.'" '.$sel.'>'.$role_name.'</option>'."\n";                                                   				
			echo '<option value="'.$role_id.'" '.$sel.'>'.$role_name.'</option>'."\n";                                                   				
			}
			?>
			</select>
		  
        </div>
      </div>-->
	  
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
          <input type="file"  name="user_picture"  placeholder="Passport size photo" required="required">
        </div>
      </div>
	  <?php /*?>
	  <div class="form-group">
		<label for="inputEmail3" class="col-sm-3 control-label">&nbsp;</label>
        <div class="col-sm-8">
          <div class="checkbox">
				<label>
				  <input type="checkbox" required> Please tick this box to show you have read and agree with our <a href="<?=SCRIPT_URL?>/page/terms-and-condition">"Terms & Conditions"</a>
				</label>
			</div>
        </div>
	 </div> <?php */ ?>
	
      <?php if($captcha_mode){ //show captcha if enabled ?>
	  <div class="clearfix"></div>
	  <div class="form-group">
        <label for="inputEmail3" class="col-sm-3 control-label">Security Code<em>*</em></label>
        <div class="col-sm-8">
             <ul>
    			 <li><?php echo "<img src='".SCRIPT_URL."includes/3rdParty/vimage/img.php?size=4' />";?></li>
    	         <li>
    	          <div><?php $vImage->showCodBox(1,"required='yes' validate='text' message='Enter Image Varification Text (case sensitive)' size='14' class='input-textbox'");?></div>
    	          <div><?php echo "(case sensitive)"; ?></div>
    	         </li>  
         	 </ul>
        </div>
      </div>
	<?php } //end show captcha ?> 
	
	 <div class="clearfix"></div>
      <div class="form-group">
        <div class="col-sm-offset-3 col-sm-8"><br/>
<br/>          <button type="submit" class="btn btn-primary btn-lg btn-block">Submit</button>  
             
        </div>
      </div>
  </form>
  
  </div><!--panel-body-->
	  </div>
	</div>
	
	<div class="col-xs-12 col-sm-12 col-md-5">
		<div class="panel panel-primary">
			<div class="panel-heading">
			  <h3 class="panel-title">Information</h3>
			</div>
			<div class="panel-body">			
			<p>Enter your details information as follows:</p>
				<ul class="benefits">
						<li>Basic Information. </li>
						<li>LOGIN Information. </li>
						<li>Contact Person (signatory) with photgraph. </li>
						<li>And then “SUBMIT”. </li>
				</ul>
			</div>
		</div>
	</div>	
</div><!--row-->	