<script language="javascript" type="text/javascript">
function  checkFrom(form){
	$("#errordata").css('display','block');
	if(form.user_email.value=="" ||  !form.user_email.value.match(/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/) ){
			$('#errordata').html("Valid e-mail required");
			return false;
	}
}
</script>
 <style type="text/css">
  .login_cntain{background-image:url(<?php echo GET_TEMPLATE_DIRECTORY_URI; ?>/css/images/login-main-sec2.jpg);}
  .login_hldr{background:rgba(255,255,255,0.9); display: block;
    float: none;
    height: auto;
    margin: 30px auto;
    padding: 20px;
    text-align: center;
    top: 20px;
	position:relative;
    width: 60%;border-radius:5px;}
	.form-control{display:inline-block;width:290px;}
	a.reg_bttn{left:330px;}
</style>
<div class="content-block">
  <div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12">
	   <div class="etander_login">
			<div class="etander_login_sec login_cntain">
			<div class="login_hldr">
	
<h2 class="form-signin-heading">Resend Password</h2>
<?php require(TEMPLATE_STORE.'displaymessage.php');?> 	
<p>If you wish to retrive your password, enter your email here.</p>
<form class="form-signin" name="login_form" action="" method="post" onsubmit="return checkLogin(this)">
<input name="formSubmitted" value="true" type="hidden" />

<label for="inputEmail" class="sr-only">Email Address</label>
<input type="email" name="user_email"  class="form-control" placeholder="Email address" required>

 <button class="btn btn-lg btn-primary" type="submit">Resend Password</button>
</form>
<div class="checkbox">
  <label>
	<a href="<?=SCRIPT_URL?>auth/login" class="btn btn-link">Back to Login!</a> 
  </label>
</div>
			</div>
			
			
		 </div><!--login_cntain-->
	   </div><!--content-block-->	
	</div>
  </div>
</div><!--content-block-->	
<br/>
<br/>
<br/>
<br/>
<br/>
