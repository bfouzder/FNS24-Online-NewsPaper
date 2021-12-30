<?php 
		//$redirect_url='admin/users.php';
		$redirect_url='siteadminpanel/manageUsers';
		$user_id = $db->get('user_id');
		$user_name = $db->get('user_name');
		if($user_id){
			$user_info = getUserInfo($user_id);
		}else{
			 $user_info = getUserInfoByName($user_name);
		}
		//pre($user_info);
		if(!$user_info)	{die('No data found');}
		 $user_id = $user_info['user_id'];
		 $user_name = $user_info['user_name'];

 if($db->post('formSubmitted')){  
 	
	 $error="";
 	 	//UPDATE USER TYPE
 		$user_id=$db->post('user_id');
 		$user_name_new= $this->db->db_prepare_input($this->db->post('user_name'));
				  
        $_POST['user_birthdate']=$_POST['user_birthdate_year'].'-'.$_POST['user_birthdate_month'].'-'.$_POST['user_birthdate_day'];
						 
        $user_rawpass=trim($db->post('user_rawpass'));
        if($user_info['user_rawpass']!=$user_rawpass){
            
        }
        
     	$user_password = _encode($user_rawpass);
    	$_POST['user_password']=$user_password;
		if($user_name !=$user_name_new){
			 $user_info_exist = getUserInfoByName($user_name_new);
			 if($user_info_exist){
				$error="User name already exist"; 
			 }
		}
					                
        if(!$error){
			$db->bindPOST('users','user_id');	

			$upload_dir = PROFILE_IMG_DIR;
			$upload_url = PROFILE_IMG_URL;
			 
			 if($_FILES){
				foreach($_FILES as $file_field_name => $file_info){
				 if($file_info["name"]){
				   $file_name=$file_info["name"];
				   $file_tmp_name=$file_info["tmp_name"];
				   $file_ext=strtolower(end(explode(".",$file_name)));
				   $new_file_name=$user_id.'_'.$file_field_name.'_'.$file_name;							
				   if(in_array($file_ext,$allow_extention)){
					   $upload_to=$upload_dir. $new_file_name;
					   //echo $file_tmp_name .'='. $upload_to;
						if(@move_uploaded_file($file_tmp_name, $upload_to)){
							$db->edit("UPDATE users SET `$file_field_name`='$new_file_name' WHERE user_id='$user_id'");
						}else{
							 $data['error'] ="Failed to upload $file_field_name";
						}
					  }
					}//if file name
				}//	foreach file
				
			}//if files 
			//redirect($redirect_url);
			  $message = 'Successfully updated.';
		}//not error  
 	  
	
 }
 
 
 $author_info= $user_info = getUserInfo($user_id);
 //$author_image=__profile_img_src($author_info['user_id'],$author_info['user_picture'],$width= 145, $height=155,$zc=1);
?>

<section class="inner-section-blocks section-blocks clearfix">
	<div class="container">
		
<?php include(TEMPLATE_STORE.'displaymessage.php');?>
  <form class="form-horizontal" name="signup_form" method="post" enctype="multipart/form-data" onsubmit="return checkSignUp(this)">
   <input type="hidden" name="formSubmitted" value="true"/>
	<input type="hidden" name="user_id" value="<?=$user_info['user_id']?>"/>
	
           <div class="file-upload-block clearfix">
                <div class="profile-preview"><img src="<?php echo $author_image;?>" id="img_preview" alt="profile preview"></div>
                <div class="form-group">
                    <h6>Upload Your Profile Image</h6>
                    <input  id="uploadFile" class="form-disable" disabled="disabled"/>
                    <div class="fileUpload btn btn-primary">
                        <span>Browse</span>
                        <input id="uploadBtn" type="file" name="user_picture" class="upload"/>
                    </div>
                </div>
                <p>Profile image thuumb size 154x175px and allowed extention <b>jpg, jpeg, png</b></p>
             </div>

                <div class="form-group">
                    <label for="FirstName" class="col-xs-12 col-sm-2 control-label">First Name<em>*</em>:</label>
                    <div class="col-xs-12 col-sm-10">
                        <input type="text" name="user_fname" value="<?=$user_info['user_fname'];?>" class="form-control" id="FirstName" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="LastName" class="col-xs-12 col-sm-2 control-label">Last Name<em>*</em>:</label>
                    <div class="col-xs-12 col-sm-10">
                        <input type="text" name="user_lname" value="<?=$user_info['user_lname'];?>" class="form-control" id="LastName" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="EmailAddress" class="col-xs-12 col-sm-2 control-label">Email ID<em>*</em>:</label>
                    <div class="col-xs-12 col-sm-10">
                        <input type="email" name="user_email" value="<?=$user_info['user_email'];?>" class="form-control" id="EmailAddress" required>
                    </div>
                </div>
				
              <div class="form-group">
                    <label class="col-xs-12 col-sm-2 control-label">Date of Birth<em>*</em>:</label>
                    <div class="col-xs-4 col-sm-3">
                        <select name="user_birthdate_day">
                            <option value="" selected required>Date</option>
						<?php
						$user_birthdate_day = $user_info['user_birthdate_day'];						
						for ($i=1 ; $i<=31; $i++){ 
						$sel=($user_birthdate_day == $i)?' selected="selected"':'';
						?>	
                            <option value="<?=$i?>"<?=$sel?>><?=$i?></option>
						<?php } ?>
                        </select>
                    </div>
				<?php 
$ar_month_array=array('01'=>'January','02'=>'February','03'=>'March','04'=>'April','05'=>'May','06'=>'June','07'=>'July','08'=>'August','09'=>'September','10'=>'October','11'=>'November','12'=>'December');
?>					
                    <div class="col-xs-4 col-sm-3">
                        <select name="user_birthdate_month" required>
                            <option value="">Select Month</option>
                        <?php
						$user_birthdate_month = $user_info['user_birthdate_month'];
						foreach ($ar_month_array as $k=>$month){
						$sel=($user_birthdate_month == $k)?' selected="selected"':'';
						?>	
                            <option value="<?=$k?>"<?=$sel?>><?=$month?> = <?=$user_birthdate_month?></option>
						<?php } ?>
                        </select>
                    </div>
                    <div class="col-xs-4 col-sm-3">
                        <select name="user_birthdate_year">
                            <option value="" selected>Year</option>
						<?php
						$user_birthdate_year = $user_info['user_birthdate_year'];
						for ($i=2010; $i>=1950; $i--){
						$sel=($user_birthdate_year == $i)?' selected="selected"':'';
						?>	
                            <option value="<?=$i?>"<?=$sel?>><?=$i?></option>
						<?php } ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="Mobile" class="col-xs-12 col-sm-2 control-label">Mobile :</label>
                    <div class="col-xs-3 col-sm-1">
                        <span>+880</span>
                    </div>
                    <div class="col-xs-9 col-sm-9">
                        <input type="text" name="user_mobile" value="<?=$user_info['user_mobile'];?>" class="form-control" id="Mobile" maxlength="10">
                    </div>
                </div>
                <div class="form-group">
                    <label for="Address" class="col-xs-12 col-sm-2 control-label">Address :</label>
                    <div class="col-xs-12 col-sm-5">
                        <input type="text" class="form-control" value="<?=$user_info['user_address'];?>" name="user_address" id="Address">
                    </div>
                    <label for="City" class="col-xs-12 col-sm-1 control-label">City :</label>
                    <div class="col-xs-12 col-sm-4">
                        <input type="text"  name="user_city" value="<?=$user_info['user_city'];?>" class="form-control center-control" id="City">
                    </div>
                </div>
                <div class="form-group">
                    <label for="About" class="col-xs-12 col-sm-2 control-label">About you :</label>
                    <div class="col-xs-12 col-sm-10">
                        <textarea rows="5" name="user_about" cols="" class="form-control" id="About"><?=$user_info['user_about'];?></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label for="Website" class="col-xs-12 col-sm-2 control-label">Website :</label>
                    <div class="col-xs-12 col-sm-10">
                        <input type="text" name="user_web" value="<?=$user_info['user_web'];?>" class="form-control" id="Website">
                    </div>
                </div>
                <div class="form-group">
                    <label for="Facebook" class="col-xs-12 col-sm-2 control-label">Facebook :</label>
                    <div class="col-xs-12 col-sm-10">
                        <input type="text" name="user_fb" value="<?=$user_info['user_fb'];?>"  class="form-control" id="Facebook">
                    </div>
                </div>
                <div class="form-group">
                    <label for="Twitter" class="col-xs-12 col-sm-2 control-label">Twitter :</label>
                    <div class="col-xs-12 col-sm-10">
                        <input type="text" name="user_tw" value="<?=$user_info['user_tw'];?>"  class="form-control" id="Twitter">
                    </div>
                </div>
				<div class="form-group">
                    <label for="Twitter" class="col-xs-12 col-sm-2 control-label">Instagram :</label>
                    <div class="col-xs-12 col-sm-10">
                        <input type="text" name="user_instagram" value="<?=$user_info['user_instagram'];?>"  class="form-control" id="Instagram">
                    </div>
                </div>
				<div class="form-group">
                    <label for="Twitter" class="col-xs-12 col-sm-2 control-label">Linkadin :</label>
                    <div class="col-xs-12 col-sm-10">
                        <input type="text" name="user_linkedin" value="<?=$user_info['user_linkedin'];?>"  class="form-control" id="Linkadin">
                    </div>
                </div>
				<div class="form-group">
                    <label for="Twitter" class="col-xs-12 col-sm-2 control-label">YouTube :</label>
                    <div class="col-xs-12 col-sm-10">
                        <input type="text" name="user_youtube" value="<?=$user_info['user_youtube'];?>"  class="form-control" id="YouTube">
                    </div>
                </div>
				<h3>Login Info</h3>				
                <div class="form-group">
                    <label for="Username" class="col-xs-12 col-sm-2 control-label">Username: </label>
                    <div class="col-xs-12 col-sm-10">
                        <input type="text" name="user_name" value="<?=$user_info['user_name'];?>"  class="form-control" id="YouTube">
                    </div>
                </div>				
				<div class="form-group">
                    <label for="Username" class="col-xs-12 col-sm-2 control-label">Passward: </label>
                    <div class="col-xs-12 col-sm-10">
                        <input type="text" name="user_rawpass" value="<?=$user_info['user_rawpass'];?>"  class="form-control" id="YouTube">
                    </div>
                </div>	
			 
			
			<div class="form-group">
                    <div class="form-group-btn-right">
						<input type="hidden" name="formSubmitted" value="true"/>
						<input type="hidden" name="user_id" value="<?=$user_info['user_id']?>"/>
                        <a href="<?=$redirect_url?>"class="btn btn-primary">Cancel</a>
                        <button type="submit" class="btn btn-default">Update</button>
                    </div>
                </div>
            </form>
        </div>
    </section>
<script type="text/javascript">
    document.getElementById("uploadBtn").onchange = function () {
	    document.getElementById("uploadFile").value = this.value;
        readURL(this);
    };
	
	function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#img_preview')
                    .attr('src', e.target.result)
                    .width(154)
                    .height(174);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
<style>
#ui-datepicker-div{display:none;}
</style>