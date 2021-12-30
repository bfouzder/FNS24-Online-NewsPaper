
<link href="<?=SCRIPT_URL?>includes/datepicker/ui.all.css" rel="stylesheet" type="text/css"/>
<script src="<?=SCRIPT_URL?>includes/datepicker/ui.core.js" type="text/javascript"></script>
<script src="<?=SCRIPT_URL?>includes/datepicker/ui.datepicker.js" type="text/javascript"></script>

<script type="text/javascript">
$=jQuery;
	$(function() {
		$("#datepicker").datepicker();
		$('#datepicker').datepicker('option', {dateFormat: 'yy-mm-dd'}); 
				
		$("#datepicker2").datepicker();
		$('#datepicker2').datepicker('option', {dateFormat: 'yy-mm-dd'}); 
	});


function  checkEditform(form){
    
	 var err=new Array();
   
   if(form.user_fname.value==""  ){
        err.push("Name can't be empty"); form.user_fname.focus( );  
    }else if(form.user_mobile.value=="" || form.user_mobile.value.length < 11 ){
		 err.push("Enter your mobile number");form.user_mobile.focus( ); 
    }else if ( ( document.signup_form.user_gender[0].checked == false ) && ( document.signup_form.user_gender[1].checked == false ) ){
        err.push( "Please choose your Gender: Male or Female" );      
    }
    
   if(err.length>0){ 
        $("#errordata_block").css('display','block');
        $('#errordata').html(err.join('\n'));
       // alert(err.join('\n')); 
        return false;
    }else{
        return true;
    }
   	
  
  return true;
}
</script>
<style>
ul.signup li{list-style-type:none;}
#ui-datepicker-div{display:none;}
</style>
<div class="row">
 <div class="col-xs-6 col-sm-6 col-md-7">
		<div class="panel panel-success">
			<div class="panel-heading">
			  <h3 class="panel-title">Edit Profile Info</h3>
			</div>
			<div class="panel-body">
  <?php include(TEMPLATE_STORE.'displaymessage.php');
$user_id=$user_info['user_id'];
?>

<form class="form-horizontal" method="post" class="information" enctype="multipart/form-data" onsubmit="return checkEditform(this)">
    <input type="hidden" name="formSubmitted" value="true"/>
    <input type="hidden" name="user_id" value="<?=$user_info['user_id']?>"/>
 <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Name</label>
    <div class="col-sm-10">
      <input type="text"  name="user_fname" value="<?=$user_info['user_fname'];?>" class="form-control"  placeholder="your name">
    </div>
  </div>
   <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Company</label>
    <div class="col-sm-10">
      <input type="text"  name="company_name" value="<?=$user_info['company_name'];?>" class="form-control"  placeholder="company name">
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
    <div class="col-sm-10">
      <input type="email"  name="user_email" value="<?=$user_info['user_email'];?>" class="form-control" id="inputEmail3" placeholder="Email">
    </div>
  </div>
   <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Phone</label>
    <div class="col-sm-10">
      <input type="text"  name="user_mobile" value="<?=$user_info['user_mobile'];?>" class="form-control"  placeholder="company name">
    </div>
  </div>
   <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Birth Date</label>
    <div class="col-sm-10">
      <input type="text"  name="user_birthdate" value="<?=$user_info['user_birthdate']?>"  id="datepicker" class="form-control"  placeholder="company name">
    </div>
  </div>
  <div class="form-group">
    <label for="inputPassword3" class="col-sm-2 control-label">Gender</label>
    <div class="col-sm-10">
        <label class="radio-inline">
          <input type="radio" name="user_gender" id="inlineRadio1" value="Male" <?php if($user_info['user_gender']=='Male') echo 'checked="checked"'; ?>> Male
        </label>
        <label class="radio-inline">
          <input type="radio" name="user_gender" id="inlineRadio2" value="Female" <?php if($user_info['user_gender']=='Female') echo 'checked="checked"'; ?>> Female
        </label>
    </div>
  </div>
   <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Country</label>
    <div class="col-sm-10">
            <select name="user_country" id="user_country" class="form-control">
            	<option value="">&lt; Select Country &gt;</option>
            		 <?php
            		 
            		  $countries=$db->select("SELECT * FROM country ORDER BY country_name");
            		  foreach($countries as $country){
            		  	$country_name=$country['country_name'];
            		  	$country_code=$country['country_code'];
            		  		$sltd = ($country_code == $user_info['user_country'])?"selected='selected'": "";						  	
            		  	
            		  echo " <option value='$country_code' $sltd >$country_name &nbsp;&nbsp;&nbsp; </option>\n";	
            		  } 
            		 ?>
            </select>
    </div>
  </div>

  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <div class="checkbox">
        <label>
          <input type="checkbox" name="newsletter" value="1" <?php if($user_info['newsletter']=='1') echo 'checked="checked"'; ?> />  I would like to receive EWU eTender Newsletter, and I understand that it has an anti spam policy.
        </label>
      </div>
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-primary">Update</button>     
    </div>
  </div>
</form>
</div><!--panel-body-->
	  </div>
	</div>
	
	<div class="col-xs-6 col-sm-6 col-md-4">
		<div class="panel panel-primary">
			<div class="panel-heading">
			  <h3 class="panel-title">Change Profile Picture</h3>
			</div>
			<div class="panel-body">
            <div class="col-sm-offset-2 col-sm-10">
             <?php showProfileImg($user_info['user_id'],$user_info['user_picture']);?>
            </div>
             <form class="form-horizontal" method="post" class="information" enctype="multipart/form-data" onsubmit="return checkEditform(this)">
                <input type="hidden" name="formSubmitted" value="true"/>
                <input type="hidden" name="user_id" value="<?=$user_info['user_id']?>"/>
                  
                   <div class="form-group">
                       <label for="exampleInputFile" class="col-sm-2 control-label">&nbsp;</label>
                       <div class="col-sm-offset-2 col-sm-10">
                        <input type="file"  type="file" name="user_picture" id="user_picture">
                        <p class="help-block">Allowed Extention: 'jpg','jpeg','png'.</p>
                      </div>
                   </div>  
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" class="btn btn-default">Upload</button>
                      
                    </div>
                  </div>            	     
              </form>
			
			</div>
		</div>
	</div>
	
</div><!--row-->	