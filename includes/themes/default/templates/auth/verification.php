<script language="javascript" type="text/javascript">
function checkFrom(form){
	$("#errordata_block").css('display','block');
	if(form.validate_code.value==""){
			$('#errordata').html("Enter verification Code");
			return false;
	}
}
</script>
<div class="row">
	<div class="col-xs-12 col-sm-8 col-md-6">
		<div class="panel panel-primary">
			<div class="panel-heading">
			  <h3 class="panel-title">Registration Verification</h3>
			</div>
			<div class="panel-body">
				<?php require(TEMPLATE_STORE.'displaymessage.php');?>
				
				<?php if(!isset($message)){ ?>
				<p>To have the email verification , enter your varification code that mailed to you in the field below.</p>
				<form  name="login_form" method="post" onsubmit="return checkFrom(this)">
					<input name="formSubmitted" value="true" type="hidden" />
					
					 <div class="form-group">
						<label for="inputEmail3" class="col-sm-3 control-label">Verify Code</label>
						<div class="col-sm-8">
						  <input type="text"  name="validate_code" value="<?=$user_info['user_email'];?>" class="form-control" maxlength="5" required>
						</div>
					  </div>
					 
					  <div class="form-group"> 
						<div class="col-sm-offset-3 col-sm-8"><br/>
						  <button type="submit" class="btn btn-primary">Verify</button>						  
						  <a href="<?=SCRIPT_URL?>auth/resendverification/" class="btn btn-link">Resend Verification!</a>   
						</div>
					  </div>			   
				</form>	         
				<?php } ?> 
				
		</div><!--panel-body-->
	  </div>
	</div>                            
</div><!--row-->