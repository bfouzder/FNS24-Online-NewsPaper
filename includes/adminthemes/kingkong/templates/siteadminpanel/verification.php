<script language="javascript" type="text/javascript">
function  checkFrom(form){
	$("#errordata").css('display','block');
	if(form.validate_code.value==""){
			$('#errordata').html("Enter verification Code");
			return false;
	}
}
</script>
<div class="request-left-top">Registration Verification</div>
<div class="request-left-med">
<div class="edit-reg">

 <?php require(TEMPLATE_STORE.'displaymessage.php');?> 
     
<?php if(!isset($message)){ ?>

<p>To have the email verification , enter your varification code that mailed to you in the field below.</p>
<p><span class="star">*</span> indicates required fields</p><span class="clear"></span> 
    <form  name="login_form" method="post" onsubmit="return checkFrom(this)">
     <input name="formSubmitted" value="true" type="hidden" />
                    
        	<ul>
	<li><span class="reg-title">Verify Code:  <b>*</b></span><span> 
                    <input type="text" name="validate_code" class="reg-inpt" maxlength="5"/></span></li>
     
                   <li><span class="reg-title" style="height:30px;"></span><span style="padding-right:20px;"><input type="submit" value="Verify" class="reg-sub"/></span><span><a href="http://www.cinehub24.com/auth/resendverification/" style="cursor:pointer;">Resend Verification</a></span></li>							
			 </ul>
			</form>                              
        
 
			         
 <?php } ?> 
</div> 
</div>