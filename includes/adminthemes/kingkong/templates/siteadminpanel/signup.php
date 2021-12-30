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
     if(form.admin_email.value=="" ||  !form.admin_email.value.match(/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/) )
		$('#errordata').html("Valid e-mail required");
	else if(form.admin_name.value=="" || form.admin_name.value.length < 3)
	    $('#errordata').html("Username cann't be null or at least 3 charecter");
    else if(form.admin_name.value.length  > 32)
	    $('#errordata').html("Username must be less than 32 letters long");
    else if(!form.admin_name.value.match(/^([a-zA-Z0-9_\-])+$/))
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


<?php //eof FORM CHECK  ?>
<style>
ul.signup li{list-style-type:none;}
</style>
<div class="row">
	<div class="col-xs-6 col-sm-6 col-md-8">
		<div class="panel panel-primary">
			<div class="panel-heading">
			  <h3 class="panel-title">Become a member.</h3>
			</div>
			<div class="panel-body">  

<?php include(TEMPLATE_STORE.'displaymessage.php');?>
	
  <form  name="signup_form" method="post" onsubmit="return checkSignUp(this)">
   <input type="hidden" name="formSubmitted" value="true"/>
	   
	 <div class="form-group">
		<label class="col-sm-3 control-label"></label>
		<div class="col-sm-8">
		  <p class="form-control-static"><b><i>Basic Information</i></b></p>
		</div>
	  </div>
       
	<div class="form-group">
        <label for="inputEmail3" class="col-sm-3 control-label">Name</label>
        <div class="col-sm-8">
          <input type="text"  name="fname" value="<?=$user_info['fname'];?>" class="form-control"  placeholder="Your name">
        </div>
      </div>
      <div class="form-group">
        <label for="inputEmail3" class="col-sm-3 control-label">Email</label>
        <div class="col-sm-8">
          <input type="email"  name="admin_email" value="<?=$user_info['admin_email'];?>" class="form-control" id="inputEmail3" placeholder="Email">
        </div>
      </div>
      
       <div class="form-group">
        <label for="inputEmail3" class="col-sm-3 control-label">Phone</label>
        <div class="col-sm-8">
          <input type="text"  name="admin_phone" value="<?=$user_info['admin_phone'];?>" class="form-control"  placeholder="Contact No.">
        </div>
      </div>
      
      
      
       <div class="form-group">
		<label class="col-sm-3 control-label"></label>
		<div class="col-sm-8">
		  <p class="form-control-static control-label"><b><i>Login Information</i></b></p>
		</div>
	  </div>
          
       <div class="form-group">
        <label class="col-sm-3 control-label">Login Name</label>
        <div class="col-sm-8">
          <input type="text"  name="admin_name" value="" class="form-control"  placeholder="Login ID">
        </div>
      </div>      
      <div class="form-group">
        <label for="inputPassword3" class="col-sm-3 control-label">Password</label>
        <div class="col-sm-8">
          <input type="password"  name="user_password" value="" class="form-control"  placeholder="Password">
        </div>
      </div>
      
      <div class="form-group">
        <label for="inputEmail3" class="col-sm-3 control-label">Retype Password</label>
        <div class="col-sm-8">
          <input type="password"  name="user_repassword" value="" class="form-control" placeholder="Retype Password">
        </div>
      </div>
      
      <?php if($captcha_mode){ //show captcha if enabled ?>
	  <div class="form-group">
        <label for="inputEmail3" class="col-sm-3 control-label">Security Code</label>
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
	<div class="form-group">
		<label class="col-sm-3 control-label"></label>
		<div class="col-sm-8">
		  <p class="form-control-static control-label"><b><i></i></b></p>
		</div>
	  </div>
          
      <div class="form-group">
        <div class="col-sm-offset-3 col-sm-8">
          <button type="submit" class="btn btn-primary">Submit</button>  
           <label class="font6"><a href="<?=SCRIPT_URL.$this->controller?>/login" class="btn btn_link"> Do you have an account? Login!</a></label>   
        </div>
      </div>
  </form>
  
  </div><!--panel-body-->
  </div>
</div>
</div><!--row-->	