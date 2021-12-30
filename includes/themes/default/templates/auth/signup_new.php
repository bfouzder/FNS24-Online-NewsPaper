<?php
 $captcha_mode= getSettings('CAPTCHA_MODE');   //CHECK CAPTCH MODE IS ON OR OFF
 if($captcha_mode){
 	require_once(BASE_DIR."includes/3rdParty/vimage/vImage.php");
    $vImage = new vImage();	
 }
?>

<?php //bof FORM CHECK  ?>
<script language="javascript" type="text/javascript">
function  checkSignUp(form){
	var date = '<?=date("Y-m-d", mktime(0, 0, 0, date("m"), date("d"),   date("Y")-18))?>'; 
	 $("#errordata_block").css('display','block');     
     if(form.user_email.value=="" ||  !form.user_email.value.match(/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/) )
		$('#errordata').html("Valid e-mail required");
    else if(form.user_password.value=="" || form.user_password.value.length < 4 )
		$('#errordata').html("Password should be at least 4 letters long");
	else if(form.user_password.value.length > 32)
	    $('#errordata').html("Password should be less than 32 letters long");
    else if(form.user_password.value != form.user_repassword.value)
		$('#errordata').html("Password and retype password do not match");
	else if(form.vImageCodP.value=="")
	   	$('#errordata').html("Enter captch code");   	 
   	else
		  return true;
  
  return false;
}
</script>

<link href="<?=SCRIPT_URL?>includes/datepicker/ui.all.css" rel="stylesheet" type="text/css"/>
<script src="<?=SCRIPT_URL?>includes/datepicker/ui.core.js" type="text/javascript"></script>
<script src="<?=SCRIPT_URL?>includes/datepicker/ui.datepicker.js" type="text/javascript"></script>

<script type="text/javascript">
	$(function() {
		$("#datepicker").datepicker();
		$('#datepicker').datepicker('option', {dateFormat: 'yy-mm-dd'}); 
				
		$("#datepicker2").datepicker();
		$('#datepicker2').datepicker('option', {dateFormat: 'yy-mm-dd'}); 
	});
</script>
<?php //eof FORM CHECK  ?>
<style>
ul.signup li{list-style-type:none;}
em{color:#ff0000;}
</style>
<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-9">
		<div class="panel panel-primary">
			<div class="panel-heading">
			  <h3 class="panel-title">Bidder Registration Detail's</h3>
			</div>
			<div class="panel-body">  

<?php include(TEMPLATE_STORE.'displaymessage.php');?>
<p class="pull-right"><em>*</em> indicates the required field</p>
<div class="clearfix"></div>
  <form  name="signup_form" method="post" enctype="multipart/form-data" onsubmit="return checkSignUp(this)">
   <input type="hidden" name="formSubmitted" value="true"/>
	   <div class="form-group">
		<label class="col-sm-3 control-label"></label>
		<div class="col-sm-8">
		  <p class="form-control-static control-label"><b style="text-transform:uppercase;color:#337ab7;">Login Information</b></p>
		</div>
	  </div>
          
       <div class="form-group">
        <label class="col-sm-3 control-label">Email Address<em>*</em></label>
        <div class="col-sm-8">
          <input type="email"  name="user_email" value="" class="form-control"  placeholder="Email Address" required="required">
        </div>
      </div>      
      <div class="form-group">
        <label for="inputPassword3" class="col-sm-3 control-label">Password<em>*</em></label>
        <div class="col-sm-8">
          <input type="password"  name="user_password" value="" class="form-control" required="required">
        </div>
      </div>
      
      <div class="form-group">
        <label for="inputEmail3" class="col-sm-3 control-label">Confirm Password<em>*</em></label>
        <div class="col-sm-8">
          <input type="password"  name="user_repassword" value="" class="form-control" required="required">
        </div>
      </div>
	  
       <div class="clearfix"></div>
	   <div class="form-group">
		<label class="col-sm-3 control-label"></label>
		<div class="col-sm-8">
		  <p class="form-control-static"><b style="text-transform:uppercase;color:#337ab7;">Organization Information</b></p>
		</div>
	  </div>
        <div class="form-group">
        <label for="inputEmail3" class="col-sm-3 control-label">Name<em>*</em></label>
        <div class="col-sm-8">
          <input type="text"  name="company_name" value="<?=$user_info['company_name'];?>" class="form-control"  placeholder="Company name" required="required">
        </div>
      </div>
 	   <div class="form-group">
        <label for="inputEmail3" class="col-sm-3 control-label">Postal Address<em>*</em></label>
        <div class="col-sm-8">
          <input type="text"  name="user_address" value="<?=$user_info['user_address'];?>" class="form-control"  placeholder="Postal Address" required="required">
        </div>
      </div>
	  
      <div class="form-group">
        <label for="inputEmail3" class="col-sm-3 control-label">Email Address<em>*</em></label>
        <div class="col-sm-8">
          <input type="email"  name="company_email" value="<?=$user_info['company_email'];?>" class="form-control" id="inputEmail3" placeholder="Email" required="required">
        </div>
      </div>
      
       <div class="form-group">
        <label for="inputEmail3" class="col-sm-3 control-label">Phone Number<em>*</em></label>
        <div class="col-sm-8">
          <input type="text"  name="company_phone" value="<?=$user_info['company_phone'];?>" class="form-control"  placeholder="Contact No." required="required">
        </div>
      </div>
       <div class="form-group">
        <label for="inputEmail3" class="col-sm-3 control-label">Fax Number</label>
        <div class="col-sm-8">
          <input type="text"  name="user_fax" value="<?=$user_info['user_fax'];?>" class="form-control"  placeholder="Fax Number.">
        </div>
      </div>	  
	   <div class="form-group">
        <label for="inputEmail3" class="col-sm-3 control-label">Company Web URL</label>
        <div class="col-sm-8">
          <input type="text"  name="user_web" value="<?=$user_info['user_web'];?>" class="form-control"  placeholder="Company Web URL">
        </div>
      </div>
	  
	  <div class="form-group">
        <label for="inputEmail3" class="col-sm-3 control-label">TIN Number<em>*</em></label>
        <div class="col-sm-8">
          <input type="text"  name="company_tin" value="<?=$user_info['company_tin'];?>" class="form-control"  placeholder="TIN Number" required="required">
        </div>
      </div>
	  <div class="form-group">
        <label for="inputEmail3" class="col-sm-3 control-label">Trader License<em>*</em></label>
        <div class="col-sm-8">
          <input type="text"  name="company_trader_license" value="<?=$user_info['company_trader_license'];?>" class="form-control"  placeholder="Trader License Number" required="required">
        </div>
      </div>
	 <div class="form-group">
        <label for="inputEmail3" class="col-sm-3 control-label">VAT Number<em>*</em></label>
        <div class="col-sm-8">
          <input type="text"  name="company_vat" value="<?=$user_info['company_vat'];?>" class="form-control"  placeholder="VAT Number" required="required">
        </div>
      </div>
       <div class="clearfix"></div>
		 	  
	   <div class="form-group">
		<label class="col-sm-3 control-label"></label>
		<div class="col-sm-8">
		  <p class="form-control-static"><b style="text-transform:uppercase;color:#337ab7;">Upload Files</b></p>
		</div>
	  </div>
	  
	  
	   <div class="form-group">
        <label for="inputEmail3" class="col-sm-3 control-label">Trade Licence<em>*</em></label>
        <div class="col-sm-8">
          <input type="file"  name="trader_license_file" required="required">
        </div>
      </div>
	    <div class="clearfix"></div>
	  <div class="form-group">
        <label for="inputEmail3" class="col-sm-3 control-label">VAT certificate<em>*</em></label>
        <div class="col-sm-8">
          <input type="file"  name="vat_file" required="required">
        </div>
      </div>
	    <div class="clearfix"></div>
	  <div class="form-group">
        <label for="inputEmail3" class="col-sm-3 control-label">TIN certificate<em>*</em></label>
        <div class="col-sm-8">
          <input type="file"  name="tin_certificate_file" required="required">
        </div>
      </div>
      <div class="clearfix"></div>
	 <div class="form-group">
        <label for="inputEmail3" class="col-sm-3 control-label">Up to date<br/> TAX Clearance Certificate<em>*</em></label>
        <div class="col-sm-8"><br/>
          <input type="file"  name="tax_clearance_file"  required="required">
        </div>
      </div>	
     <div class="clearfix"></div>	  
	 <div class="form-group">
        <label for="inputEmail3" class="col-sm-3 control-label">Other File_1</label>
        <div class="col-sm-8">
          <input type="file"  name="extra_file_1">
        </div>
      </div>	
	    <div class="clearfix"></div>
       <div class="form-group">
        <label for="inputEmail3" class="col-sm-3 control-label">Other File_2</label>
        <div class="col-sm-8">
          <input type="file" name="extra_file_2">
        </div>
      </div>
        <div class="clearfix"></div>
        <div class="form-group">
		<label class="col-sm-3 control-label"></label>
		<div class="col-sm-8">
		  <p class="form-control-static"><b style="text-transform:uppercase;color:#337ab7;">Contact Person (signatory)</b></p>
		</div>
	  </div>
	  
	  <div class="form-group">
        <label for="inputEmail3" class="col-sm-3 control-label">Name<em>*</em></label>
        <div class="col-sm-8">
          <input type="text"  name="user_fname" value="<?=$user_info['user_fname'];?>" class="form-control"  placeholder="Contact Person Name" required="required">
        </div>
      </div>
 	   <div class="form-group">
        <label for="inputEmail3" class="col-sm-3 control-label">Designation<em>*</em></label>
        <div class="col-sm-8">
          <input type="text"  name="user_designation" value="<?=$user_info['user_designation'];?>" class="form-control"  placeholder="Designation" required="required">
        </div>
      </div>
	  
       <div class="form-group">
        <label for="inputEmail3" class="col-sm-3 control-label">Mobile Number<em>*</em></label>
        <div class="col-sm-8">
          <input type="text"  name="user_mobile" value="<?=$user_info['user_mobile'];?>" class="form-control"  placeholder="Mobile Number." required="required">
        </div>
      </div>
	  <div class="form-group">
        <label for="inputEmail3" class="col-sm-3 control-label">National ID Card<em>*</em></label>
        <div class="col-sm-8">
          <input type="text"  name="user_nid" value="<?=$user_info['user_nid'];?>" class="form-control"  placeholder="National ID No." required="required">
        </div>
      </div>
	   <div class="form-group">
        <label for="inputEmail3" class="col-sm-3 control-label">Email ID</label>
        <div class="col-sm-8">
          <input type="email"  name="user_public_email" value="<?=$user_info['user_public_email'];?>" class="form-control"  placeholder="Email ID.">
        </div>
      </div>
	  <div class="form-group">
        <label for="inputEmail3" class="col-sm-3 control-label">Passport size photo<em>*</em></label>
        <div class="col-sm-8">
          <input type="file"  name="user_picture"  placeholder="Passport size photo" required="required">
        </div>
      </div>
       <br style="clear:both"/>
       <br style="clear:both"/>
      
      <?php if($captcha_mode){ //show captcha if enabled ?>
	  <div class="form-group">
        <label for="inputEmail3" class="col-sm-3 control-label">Security Code</label>
        <div class="col-sm-8">
             <ul>
    			 <li><?php echo "<img src='".SCRIPT_URL."includes/3rdParty/vimage/img.php?size=4' />";?></li>
    	         <li>
    	          <div><?php $vImage->showCodBox(1,"required='yes' validate='text' message='Enter Image Varification Text (case sensitive)' size='14' class='input-textbox'");?></div>
    	          <div><?php echo "(case sensitive)"; ?></div>
    	         </li>  
         	 </ul>
        </div>
      </div>
	<?php } //end show captcha ?> 
	
	<div class="checkbox">
		<label>
		  <input type="checkbox" required> Please tick this box to show you have read and agree with our <a href="<?=SCRIPT_URL?>/page/terms-and-condition">"Terms & Conditions"</a>
		</label>
	</div>
      <div class="form-group">
        <div class="col-sm-offset-3 col-sm-6">
          <button type="submit" class="btn btn-primary">Submit</button>  
           <label class="font6">Do you have an account? <a href="<?=SCRIPT_URL?>auth/login"> Login!</a></label>   
        </div>
      </div>
  </form>
  
  </div><!--panel-body-->
	  </div>
	</div>
	
	<div class="col-xs-12 col-sm-12 col-md-3">
		<div class="panel panel-primary">
			<div class="panel-heading">
			  <h3 class="panel-title">Information</h3>
			</div>
			<div class="panel-body">			
			<p>Enter your details information as follows:</p>
				<ul class="benefits">
						<li>LOGIN Information. </li>
						<li>Organization Information. </li>
						<li>Upload Files (Trade License , VAT certificate , TIN certificate, Up-to-date, TAX clearance certificate.</li>
						<li>Contact Person (signatory) with photgraph. </li>
						<li>And then “SUBMIT”. </li>
				</ul>
			</div>
		</div>
	</div>	
</div><!--row-->	