<script language="javascript" type="text/javascript">
	function poptastic(url){
		var newwindow;
		newwindow=window.open(url,'popupWindow','toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=yes,copyhistory=no,width=400,height=300,screenX=150,screenY=150,top=100,left=50');
		if (window.focus) {newwindow.focus()}
	}


function  checkLogin(form){
	$("#errordata_block").css('display','block');
	if(form.user_name.value=="" || form.user_name.value.length < 3)
	    $('#errordata').html("Username cann't be null");
    else if(form.user_name.value.length  > 32)
	    $('#errordata').html("Username must be less than 32 letters long");
    else if(!form.user_name.value.match(/^([a-zA-Z0-9_\-])+$/))
	    $('#errordata').html("Invalid Username format");	 
    else if(form.user_password.value=="" || form.user_password.value.length < 4 )
		$('#errordata').html("Password cann't be null");
	else if(form.user_password.value.length > 32)
	    $('#errordata').html("Password should be less than 32 letters long");
   	else
		  return true;
  
  return false;
}
</script>
<?php
 /*
//bof cromo
?>
<script src="http://www.google.com/jsapi"></script>
<script type="text/javascript" charset="utf-8">
 google.load("jquery", "1.3.2");
 google.load("jqueryui", "1.7.2");
</script>

<script src="<?=SCRIPT_URL?>includes/js/chroma-hash/chroma-hash.js" type="text/javascript" charset="utf-8"></script>
<script type="text/javascript" charset="utf-8">
  $(document).ready(function() {
  $("input:password").chromaHash({number: 6});
  $("#username").focus();
});
</script>
<?php
//eof cromo 
*/
?>
<style>
ul.signup li{list-style-type:none;}
</style>
<center><h3>Welcome to EWU e-Tender System</h3></center>
<div class="row">
	<div class="col-xs-6 col-sm-6 col-md-6">
		<div class="panel panel-primary">
			<div class="panel-heading">
			  <h3 class="panel-title">Login</h3>
			</div>
			<div class="panel-body">
<p>If you already have an account, you can login below.<br/>
</p>

<?php require(TEMPLATE_STORE.'displaymessage.php');?>   	

<?php if(isset($viewFiles['reason'])>0){?> 
<p class="error"> <font color="#000000"> Banned Resign:</b></font> <br /> <?= $viewFiles['reason'] ?></p> 
<?php } ?>

<form  name="login_form" action="<?=SCRIPT_URL?>auth/login" method="post" onsubmit="return checkLogin(this)">
<input name="doLogin" value="true" type="hidden" />
  <div class="form-group">
    <label for="exampleInputEmail1">User name</label>
    <input type="text" name="user_name" class="form-control" id="exampleInputEmail1" placeholder="Login name">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" name="user_password" class="form-control" id="exampleInputPassword1" placeholder="Password">
  </div>
  <div class="checkbox">
    <label>
      <input type="checkbox"> Remember me
    </label>
  </div>
  <button type="submit" class="btn btn-primary">Login</button>  
  <span class="help-block"><a href="<?=SCRIPT_URL?>auth/forgotpassword">Forgot your password?</a></span>
</form>

		</div><!--panel-body-->
	  </div>
	</div>
	
	<div class="col-xs-6 col-sm-6 col-md-6">
		<div class="panel panel-primary">
			<div class="panel-heading">
			  <h3 class="panel-title">Supplier Benefits</h3>
			</div>
			<div class="panel-body">
				<ul class="benefits">
							<li>New Clients: Access clients in the advanced stage of purchasing process</li>
							<li>Cost of sale: Efficiently manage clients, quotations and timelines</li>
							<li>New Markets: Access clients in new markets segments / demographics</li>
							<li>Manage Tenders: Set email notices, download details and plans, contact clients</li>
							<li>Free Registration: Register for free, only pay to unlock tenders of interest.</li>
					</ul>
					<p>If you don't have an account, you can <a href="<?= THE_URL ?>auth/signup"><b class="label label-success">register here</b></a>!</b></p>
			</div>
		</div>
	</div>	
</div><!--row-->	