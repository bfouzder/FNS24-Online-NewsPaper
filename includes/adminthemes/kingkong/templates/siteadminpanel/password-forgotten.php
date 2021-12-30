<script language="javascript" type="text/javascript">
function  checkFrom(form){
	$("#errordata").css('display','block');
	if(form.user_email.value=="" ||  !form.user_email.value.match(/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/) ){
			$('#errordata').html("Valid e-mail required");
			return false;
	}
}
</script>
<style>
ul.signup li{list-style-type:none;}
</style>
<div class="row">
	<div class="col-xs-6 col-sm-6 col-md-6">
		<div class="panel panel-primary">
			<div class="panel-heading">
			  <h3 class="panel-title">Resend Password</h3>
			</div>
			<div class="panel-body">		 
			
			<?php require(TEMPLATE_STORE.'displaymessage.php');?>   	
			<p>If you wish to retrive your password, enter your email here.</p>
			<form class="form-inline" method="post" onsubmit="return checkFrom(this)">
			 <input name="formSubmitted" value="true" type="hidden" />
				<div class="form-group">
					<label class="sr-only" for="exampleInputAmount">Email Address</label>
						<div class="input-group">
							<div class="input-group-addon">Email</div>
							<input type="text" class="form-control" id="exampleInputAmount" placeholder="Enter Email Address">
							<div class="input-group-addon"></div>
						</div>
				</div>
			<button type="submit" class="btn btn-primary">Resend Pass</button>
			</form>

		</div><!--panel-body-->
	  </div>
	</div>
	
	<div class="col-xs-6 col-sm-6 col-md-6">
		<div class="panel panel-primary">
			<div class="panel-heading">
			  <h3 class="panel-title">Login Features</h3>
			</div>
			<div class="panel-body">
				<form  name="login_form" action="<?=SCRIPT_URL?>auth/login" method="post" onsubmit="return checkLogin(this)">
					<input name="doLogin" value="true" type="hidden" />
					<ul class="signup">
						<li class="input-label">User name <em>*</em> </li>
						 <li class="input-box">
							<input  class="input-textbox" type="text" name="user_name" value="" /></li>
						<li class="input-label">Password:  <em>*</em> </li>
						  <li class="input-box">
							<input  class="input-textbox" type="password" name="user_password" value=""  /></li>
							  <li class="input-label"> &nbsp;</li>
						<li><input type="submit" value="Login" class="button"/>	</li>
					</ul>
					</form>
			</div>
		</div>
	</div>
	
</div><!--row-->	
