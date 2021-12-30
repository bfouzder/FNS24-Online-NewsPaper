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

<section class="inner-section-blocks section-blocks clearfix" style="background:#fff;">
	<div class="container">
		
<?php include(TEMPLATE_STORE.'displaymessage.php');?>
  <form class="form-horizontal" name="signup_form" method="post" enctype="multipart/form-data" onsubmit="return checkSignUp(this)">
   <input type="hidden" name="formSubmitted" value="true"/>
	<input type="hidden" name="user_id" value="<?=$user_info['user_id']?>"/>
	
   

                <div class="form-group">
                    <label for="FirstName" class="col-xs-12 col-sm-2 control-label">First Name<em>*</em>:</label>
                    <div class="col-xs-12 col-sm-10">
                        <input type="text" name="user_fname" value="<?=($user_info['user_fname'])?$user_info['user_fname']:$user_info['user_name'];?>" class="form-control" id="FirstName" required>
                    </div>
                </div>
               
                <div class="form-group">
                    <label for="EmailAddress" class="col-xs-12 col-sm-2 control-label">Email ID<em>*</em>:</label>
                    <div class="col-xs-12 col-sm-10">
                        <input type="email" name="user_email" value="<?=$user_info['user_email'];?>" class="form-control" id="EmailAddress" required>
                    </div>
                </div>
				
              
                <div class="form-group">
                    <label for="Mobile" class="col-xs-12 col-sm-2 control-label">Mobile :</label>
                    <div class="col-xs-12 col-sm-10">
                        <input type="text" name="user_mobile" value="<?=$user_info['user_mobile'];?>" class="form-control" id="Mobile" maxlength="10" required>
                    </div>
                </div>
                
			  <div class="form-group">
                    <label for="Username" class="col-xs-12 col-sm-2 control-label">Username: </label>
                    <div class="col-xs-12 col-sm-10">
                        <input type="text" name="user_name" value="<?=$user_info['user_name'];?>"  class="form-control" id="username" required>
                    </div>
                </div>				
				<div class="form-group">
                    <label for="Username" class="col-xs-12 col-sm-2 control-label">Passward: </label>
                    <div class="col-xs-12 col-sm-10">
                        <input type="text" name="user_rawpass" value="<?=$user_info['user_rawpass'];?>"  class="form-control"  required>
                    </div>
                </div>	
			 
			
			<div class="form-group">
                    <div class="form-group-btn-right">
						<input type="hidden" name="formSubmitted" value="true"/>
						<input type="hidden" name="user_id" value="<?=$user_info['user_id']?>"/>
                       
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