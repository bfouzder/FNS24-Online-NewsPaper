 <style type="text/css">
  .login_cntain{background-image:url(<?php echo GET_TEMPLATE_DIRECTORY_URI; ?>/css/images/login-main-bg2.jpg);}
  .login_hldr{background:rgba(255,255,255,0.9); display: block;
    float: none;
    height: auto;
    margin: 0px auto;
    padding: 20px;
    text-align: center;
    top: 40px;
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
		
<h2 class="form-signin-heading">Sign In (Public News Publisher)</h2>
<?php require(TEMPLATE_STORE.'displaymessage.php');?>   	

<?php if(isset($viewFiles['reason'])>0){?> 
<p class="error"> <font color="#000000"> Banned Resign:</b></font> <br /> <?= $viewFiles['reason'] ?></p> 
<?php } ?>
<form class="form-signin" name="login_form" action="" method="post" onsubmit="return checkLogin(this)">
<input name="doLogin" value="true" type="hidden" />

<label for="inputEmail" class="sr-only">User Email</label>
<input type="email" name="user_email"  class="form-control" placeholder="Email address" required>
<label for="inputPassword" class="sr-only">Password</label>
<input type="password" name="user_password" class="form-control" placeholder="Password"  required>

 <button class="btn btn-lg btn-primary" type="submit">Sign in</button>
</form>
<div class="checkbox">
  <label>
	<a href="<?=SCRIPT_URL?>auth/forgotpassword" >Forgot your password?</a>
  </label>
</div>

			</div>

			</div>
	   </div>
	</div>
  </div>
</div>	
<br/>
<br/>
<br/>
<br/>
<br/>