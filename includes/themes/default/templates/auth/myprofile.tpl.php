	
	<script type="text/javascript">
		function change_password()
		{
			$('#alter_password').show('slow');
		}
		
		function alter_password()
		{
			var old_pass = $('#old_pass').val();
			var new_pass = $('#new_pass').val();
			var retype_pass = $('#retype_pass').val();
			
			if(old_pass=="" || old_pass.length < 4 )
				alert("Old password Required");
			
			else if(new_pass=="" || new_pass.length < 4 )
				alert("New Passwored Required");
				
			else if(retype_pass=="" || retype_pass.length < 4 )
				alert("Please Retype The New Password");
			else if(new_pass != retype_pass)
				alert("New Password & Retype Password Not Matched");		
			else
			{
				var url = '<?=SCRIPT_URL?>ajax/ajax_code.php';
				$.post(url,{action:'AlterPassword',old_pass:old_pass , new_pass: new_pass},			
				function(data){  
						alert(data.msg);
					 	//$('#err').html(data.msg);					 	
					 }					
				,'json');
			}
			return false;
		}
	
	</script>
	
	<div id="content">
	
            <div class="round-block"><div class="round-t"><div><div></div></div></div>
               <div class="block-conten">
                   <div class="headline-block-1"> 
                     <div class="arw1"></div>
                     <h2 class="headline-block-title-1 left">My Profile</h2>
                      
                   <span class="clear"></span>  
                 </div>
               
       <?php
	   		if($msg)
	   			echo $msg;
   			else
	   		{	
	   			echo $err;
	   ?>        
               
               
	   <div class="inner-box-form">
	   		<?php
					if($this->user_id)
					{
						?>
							<a href="<?=THE_URL?>auth/logout">Logout</a>
						<?php
					}
				?> 
            <form action="" method="post" onsubmit="return checkSignUp(this);">
              <ul class="input-form1">
                
				<li class="input-label1">First Name</li>
                <li class="input-box1">
                  <input type="text" name="first_name" id="first_name" value="<?=$user_info['first_name']?>" class="input-textbox1" size="54" onblur="checkDuplicateUserName()"/>
                </li>
                
                <li class="input-label1">Last Name</li>
                <li class="input-box1">
                  <input type="text" name="last_name" id="last_name" value="<?=$user_info['last_name']?>" class="input-textbox1" size="54" onblur="checkDuplicateUserName()"/>
                </li>
                
                
                <li class="input-label1">&nbsp;</li>
                <li class="input-box1">
                 	<input type="submit" name="formSubmitted" value="Save" class="button-small" />
				  	<a href="javascript:void(0);" onclick="change_password()">Change Password</a>
                </li>
				 
                <li class="input-label1">&nbsp;</li>
                <li class="input-box1">
                 <span id="err"><?=$err?></span> 
                </li>
              </ul>
             </form>
			  
             <span class="clear"></span>
				 <div id="alter_password" style="display:none">
				 	<h3>Change My Password</h3>
				 	<form onsubmit="return alter_password();">
					 <ul class="input-form1">
					 	<li class="input-label1">Old Password</li>
		                <li class="input-box1">
		                  <input type="password" name="old_pass" id="old_pass" value="" class="input-textbox1" size="54" />
		                </li>
					 	<li class="input-label1">New Password</li>
		                <li class="input-box1">
		                  <input type="password" name="new_pass" id="new_pass" value="" class="input-textbox1" size="54" />
		                </li>
					 	<li class="input-label1">Retype</li>
		                <li class="input-box1">
		                  <input type="password" name="retype_pass" id="retype_pass" value="" class="input-textbox1" size="54" />
		                </li>
		                
						<li class="input-label1">&nbsp;</li>
		                <li class="input-box1">
		                 	<input type="submit" name="" value="Save" class="button-small" />						  	
		                </li>
		             </ul>   
				 </div>  
            </div>
              
            <?php } ?>  
              
               <span class="clear"></span>  
            </div>
            
            
          <div class="round-b"><div><div></div></div></div></div>  


	</div>