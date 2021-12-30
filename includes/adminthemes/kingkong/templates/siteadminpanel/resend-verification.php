<script language="javascript" type="text/javascript">
function  checkFrom(form){
	$("#errordata").css('display','block');
	if(form.user_email.value=="" ||  !form.user_email.value.match(/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/)){
			$('#errordata').html("Valid e-mail required");
			return false;
	}
}
</script>

<h2 class="post-static-title">Resend Email Verification Code</h2>
<div class="hr"></div>
<p>
To have the email verification resent, enter your email address in the field below.
</p>

<div class="formbox">     
     <?php require(TEMPLATE_STORE.'displaymessage.php');?>
	<div class="markline right"><span class="star">*</span> indicates required fields</div>
        <form  name="login_form" method="post" onsubmit="return checkFrom(this)">
         <input name="formSubmitted" value="true" type="hidden" />
                        
            	<ul class="inputform">
					<li>
								  <label>Email Address: <em>*</em></label> 
                                <input type="text" name="user_email" class="inputtext" size="54"/>
                     </li>           
                    <li>
					<label>&nbsp;</label>
					<input type="submit" name="" value="Resend" class="login" />                                   
                    &nbsp;&nbsp;<a onclick="window.location.href='<?=THE_URL.'auth/login';?>'" style="cursor:pointer;">Login</a>  
				</li>								
			 </ul>
			</form>                              
           <span class="clear"></span> 
</div>  
			         