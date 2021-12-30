<?php
$table_name='clients';
$primary_key='client_id';
$page = $db->get_post('page');
$redirect_url ="siteadminpanel/manageClients/";
$link ="siteadminpanel/manageClients/?";
$back_url=ADMIN_URL.'manageClients';
if($db->post('formSubmitted'))
	{
	   $error="";
       
	   	$title= $db->db_prepare_input($db->post('title'));
		if(!$title){
		  $error ="Enter title";
		 }else{
		    $_POST['client_name']=$client_name= str_replace('-','',makeurl($title));
          
    		if(!$db->get('client_id')){
                   $client_info=getClientInfoByName($client_name);
                   if($client_info){
                    $error ="Client Already Exist";
                   }
            }	 		  	
		}		 
            
	     if(!$error){
	         if(isset($_FILES['avatar']['name']) && !empty($_FILES['avatar']['name'])){
                $_POST['avatar']=upload_avater($image_type=$table_name);
             }
                         
		      $client_id=$db->bindPOST($table_name , $primary_key);
              redirect($redirect_url);
		  }
	}	


if($db->get('client_id')){
$id=$db->get('client_id');
$edit = $db->getRowArray($table_name , array($primary_key=>$id));
}
?>

<?php
$panel_title="Add New Client";
if($edit){ 
$panel_title="Update Client";
} 
?> 

<div class="row">
 <div class="col-md-12 col-sm-12 col-xs-12">
	<div class="x_panel">
	  <div class="x_title">
		<h2><?=$panel_title?></h2>                    
		<div class="clearfix"></div>
	  </div>
	  <div class="x_content">
		<br />
        <?php require(ADMIN_TEMPLATE_STORE.'displaymessage.php'); ?>
        <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left"  method="POST"  enctype="multipart/form-data">
        <input type="hidden" name="formSubmitted" value="1" >
        <?php if($edit){ ?>
        <input type="hidden" name="<?=$primary_key?>" value="<?=$edit[$primary_key]?>" >
        <?php } ?>
    
        <div class="row">	
            <div class="col-md-9 col-sm-9 col-xs-12">	         
                <div class="panel panel-default2">        
                    <div class="panel-body">
      	
          <div class="form-group">
               <label class="control-label col-md-2 col-sm-3 col-xs-12" for="name">Type:</label>
		      	<div class="col-md-9 col-sm-9 col-xs-12">
                <select  name="client_type" class="form-control" onchange="change_field(this.value)" required="">
                    <option value="">Choose Type</option>
                    <option value="HOME" <?php if($edit['client_type'] =='HOME'){?>  selected="selected" <? } ?>>HOME</option>
                    <option value="CORPORATE" <?php if($edit['client_type'] =='CORPORATE'){?>  selected="selected" <? } ?>>CORPORATE</option>
                    <option value="SOHO" <?php if($edit['client_type'] =='SOHO'){?>  selected="selected" <? } ?>>SOHO</option>
                </select>
                </div>
            </div>
          	
		<div class="form-group">
			<label class="control-label col-md-2 col-sm-3 col-xs-12" for="name">Title:</label>
			<div class="col-md-9 col-sm-9 col-xs-12">
		      	 <input type="text" name="title" value="<?= $edit['title'] ?>"  class="form-control col-md-7 col-xs-12" required="">
			</div>
		</div>
         <div class="form-group">
			<label class="control-label col-md-2 col-sm-3 col-xs-12" for="name">Country:</label>
			<div class="col-md-9 col-sm-9 col-xs-12">
			  <select name="country" id="country" class="form-control">
            	<option value="">Select Country</option>
            		 <?php            		 
                		  $countries=$db->select("SELECT * FROM country ORDER BY country_name");
                		  foreach($countries as $country){
                		  	$country_name=$country['country_name'];
                		  	$country_code=$country['country_code'];
                		  		$sltd = ($country_name == $edit['country'])?"selected='selected'": "";						  	
                		  	
                		  echo " <option value='$country_name' $sltd >$country_name &nbsp;&nbsp;&nbsp; </option>\n";	
                		  } 
                		 ?>
                </select>
			</div>
		</div>
        
    <!--bof persondata-->    
      <div id="person" class="client_type">   
       <div class="form-group">
			<label class="control-label col-md-2 col-sm-3 col-xs-12" for="name">Date of birth:</label>
			<div class="col-md-9 col-sm-9 col-xs-12">
		      	 <input type="text" id="single_cal2" name="date_of_birth" value="<?= $edit['date_of_birth'] ?>"  class="form-control col-md-7 col-xs-12">
			</div>
		</div>
        <div class="form-group">
			<label class="control-label col-md-2 col-sm-3 col-xs-12" for="name">Date of died:</label>
			<div class="col-md-9 col-sm-9 col-xs-12">
		      	 <input type="text" id="single_cal3" name="date_of_died" value="<?= $edit['date_of_died'] ?>"  class="form-control col-md-7 col-xs-12">
			</div>
		</div>
         <div class="form-group">
			<label class="control-label col-md-2 col-sm-3 col-xs-12" for="name">Profession:</label>
			<div class="col-md-9 col-sm-9 col-xs-12">
		      	 <input type="text" name="profession" value="<?= $edit['profession'] ?>"  class="form-control col-md-7 col-xs-12">
			</div>
		</div>	
     </div>
     <div id="movie" class="client_type">      
        <!--bof movie-->      
        
		<div class="form-group">
			<label class="control-label col-md-2 col-sm-3 col-xs-12" for="name">Language :</label>
			<div class="col-md-9 col-sm-9 col-xs-12">
			  <input type="text" name="language" value="<?= $edit['language'] ?>" class="form-control col-md-7 col-xs-12">
			</div>
		</div>
        <div class="form-group">
			<label class="control-label col-md-2 col-sm-3 col-xs-12" for="name">Realse Date :</label>
			<div class="col-md-9 col-sm-9 col-xs-12">
			  <input type="text" name="movie_realse_date"  id="single_cal4" value="<?= $edit['movie_realse_date'] ?>" class="form-control col-md-7 col-xs-12">
			</div>
		</div>
        <div class="form-group">
			<label class="control-label col-md-2 col-sm-3 col-xs-12" for="name">Genres :</label>
			<div class="col-md-9 col-sm-9 col-xs-12">
			  <input type="text" name="movie_genres" value="<?= $edit['movie_genres'] ?>" class="form-control col-md-7 col-xs-12">
			</div>
		</div>
        <div class="form-group">
			<label class="control-label col-md-2 col-sm-3 col-xs-12" for="name">Directors :</label>
			<div class="col-md-9 col-sm-9 col-xs-12">
			  <input type="text" name="movie_directors" value="<?= $edit['movie_directors'] ?>" class="form-control col-md-7 col-xs-12">
			</div>
		</div>
        
        <div class="form-group">
			<label class="control-label col-md-2 col-sm-3 col-xs-12" for="name">Stars :</label>
			<div class="col-md-9 col-sm-9 col-xs-12">
			  <input type="text" name="movie_stars" value="<?= $edit['movie_stars'] ?>" class="form-control col-md-7 col-xs-12">
			</div>
		</div>
     </div>
     <div id="proverb" class="client_type"> 
     </div>    
		
                </div><!--/panel-body-->
            </div><!--/panel-->	      
        </div>	
        <div class="col-md-3 col-sm-9 col-xs-12">
       
<?php 
$avatar_image_src=($edit['avatar'])?IMAGE_URL.'clients/thumb_'.$edit['avatar']:GET_TEMPLATE_DIRECTORY_URI.'/images/blank-profile.png';
?>

<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">Avater</h3>
    </div>
    <div class="panel-body">
        <div class="file-upload-block clearfix">
            <div class="profile-preview" id="profile_preview"><img src="<?php echo $avatar_image_src; ?>" id="img_preview" alt="profile preview" width="210"></div>
            <div class="form-group">
                <h6>Upload Your Profile Image</h6>
                <input  id="uploadFile" class="form-disable" disabled="disabled"/>
                 <div class="fileUpload btn btn-primary btn-sm">
                    <span  id="uploadBtnSpan">Browse</span>
                    <input id="uploadBtn" type="file" name="avatar" class="upload"/>
                </div>
            </div>
            <p>Allowed extention <b>jpg, jpeg, png</b></p>
         </div>   
    </div><!--/panel-body-->
</div><!--/panel-->	  
        

  
    
        </div><!--/col3-->	
        </div><!--/row-->
	  
		  <div class="form-group submit_sec">
			<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
			    <button type="submit" name="submit" class="btn btn-success">Submit</button>
				  <button type="reset" class="btn btn-primary">Reset</button>
				  <a class="btn btn-danger" href="<?=$back_url?>">Cancel</a>
			</div>
		  </div>
		</form>
        
        </div> <!--x_content-->
        
	  </div>
	</div>


<script type="text/javascript">
  $=jQuery;
  function change_field(client_type){
jQuery('.client_type').hide();
jQuery('#'+client_type).show();
  }
 <?php if( $edit['client_type']) { ?>  
   change_field('<?=$edit['client_type']?>');
  <?php } ?>   
    document.getElementById("uploadBtnSpan").onclick = function() {
         $('#uploadBtn').click(); 
    }
    document.getElementById("profile_preview").onclick = function() {
	    $('#uploadBtn').click();
    };
	
    document.getElementById("uploadBtn").onchange = function () {
	    document.getElementById("uploadFile").value = this.value;
        readURL(this);
    };
	
	function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                /*
                $('#img_preview')
                    .attr('src', e.target.result)
                    .width(154)
                    .height(174);
                  */
                    $('#img_preview')
                    .attr('src', e.target.result)
                    .width(250);  
                    
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
<style>
#ui-datepicker-div{display:block;}
.fileUpload input.upload {
    position: absolute;
    top: -1px;
    right: 0;
    margin: 0;
    padding: 0;
    cursor: pointer;
    opacity: 0;
    filter: alpha(opacity=0);
}
input[type="file"] {
    display: block;
}
</style>
    
  </div>
