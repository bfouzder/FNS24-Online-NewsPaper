

<div class="request-left-top">Edit Profile Picture</div>
   <div class="request-left-med">
<?php include(TEMPLATE_STORE.'displaymessage.php');
$user_id=$user_info['user_id'];

?>
<div class="edit-reg">
    <form  name="signup_form" method="post" class="information" enctype="multipart/form-data" >
	      <ul class="inputform">
			<li>
			  <label>Avatar: </label> 
			 <?php showProfileImg($user_id,$user_info['user_picture']);?>	        
	           <input type="file" name="user_picture"/>
			</li>
             <li>
        		<label>&nbsp;</label>	 
            	<input type="hidden" name="formSubmitted" value="true"/>
            	<input type="hidden" name="user_id" value="<?=$user_info['user_id']?>"/>
        		<input type="submit" name="" value="Update"  class="reg-sub" />        	
              </li> 
    </ul>
  </form>
</div>
</div> 		 