<script language="javascript" type="text/javascript">
function checkFrom(form){
	$("#errordata_block").css('display','block');
	if(form.user_email.value=="" ||  !form.user_email.value.match(/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/)){
			$('#errordata').html("Valid e-mail required");
			return false;
	}
}
</script>
<div class="row">
	<div class="col-xs-6 col-sm-6 col-md-6">
		<div class="panel panel-primary">
			<div class="panel-heading">
			  <h3 class="panel-title">Resend Email Verification Code</h3>
			</div>
			<div class="panel-body">
				<p>To have the email verification resent, enter your email address in the field below.</p>
				<?php require(TEMPLATE_STORE.'displaymessage.php');?>
				<form  name="login_form" method="post" onsubmit="return checkFrom(this)">
					<input name="formSubmitted" value="true" type="hidden" />
					
					 <div class="form-group">
						<label for="inputEmail3" class="col-sm-3 control-label">Email Address</label>
						<div class="col-sm-8">
						  <input type="email"  name="user_email" value="<?=$user_info['user_email'];?>" class="form-control" id="inputEmail3" placeholder="Email Address" required>
						</div>
					  </div>
					 
					  <div class="form-group"> 
						<div class="col-sm-offset-3 col-sm-8"><br/>
						  <button type="submit" class="btn btn-primary">Resend</button>						  
						  <a href="<?=SCRIPT_URL?>auth/login" class="btn btn-link">Back to Login</a>   
						</div>
					  </div>			   
				</form>  
		</div><!--panel-body-->
	  </div>
	</div>                            
</div><!--row-->                           
           
			         