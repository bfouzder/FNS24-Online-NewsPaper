<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-9">
		<div class="panel panel-primary">
			<div class="panel-heading">
			  <h3 class="panel-title">Bidder Edit Detail's</h3>
			</div>
			<div class="panel-body">  

<?php include(TEMPLATE_STORE.'displaymessage.php');?>


  <form  name="signup_form" method="post" enctype="multipart/form-data" onsubmit="return checkSignUp(this)">
   <input type="hidden" name="formSubmitted" value="true"/>
    <input type="hidden" name="user_id" value="<?=$user_info['user_id']?>"/>
	       	  
	   <div class="form-group">
		<label class="col-sm-3 control-label"></label>
		<div class="col-sm-8">
		  <p class="form-control-static"><b style="text-transform:uppercase;color:#337ab7;">Organization Information</b></p>
		</div>
	  </div>
   
 	   <div class="form-group">
        <label for="inputEmail3" class="col-sm-3 control-label">Postal Address</label>
        <div class="col-sm-8">
          <input type="text"  name="user_address" value="<?=$user_info['user_address'];?>" class="form-control"  placeholder="Postal Address" required="required">
        </div>
      </div>
	  
      <div class="form-group">
        <label for="inputEmail3" class="col-sm-3 control-label">Email Address</label>
        <div class="col-sm-8">
          <input type="email"  name="company_email" value="<?=$user_info['company_email'];?>" class="form-control" id="inputEmail3" placeholder="Email" required="required">
        </div>
      </div>
      
       <div class="form-group">
        <label for="inputEmail3" class="col-sm-3 control-label">Phone Number</label>
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
        <label for="inputEmail3" class="col-sm-3 control-label">TIN Number</label>
        <div class="col-sm-8">
          <input type="text"  name="company_tin" value="<?=$user_info['company_tin'];?>" class="form-control"  placeholder="TIN Number" required="required">
        </div>
      </div>
	  <div class="form-group">
        <label for="inputEmail3" class="col-sm-3 control-label">Trader License</label>
        <div class="col-sm-8">
          <input type="text"  name="company_trader_license" value="<?=$user_info['company_trader_license'];?>" class="form-control"  placeholder="Trader License Number" required="required">
        </div>
      </div>
	 <div class="form-group">
        <label for="inputEmail3" class="col-sm-3 control-label">VAT Number</label>
        <div class="col-sm-8">
          <input type="text"  name="company_vat" value="<?=$user_info['company_vat'];?>" class="form-control"  placeholder="VAT Number" required="required">
        </div>
      </div>
     
		 	  
	   <div class="form-group">
		<label class="col-sm-3 control-label"></label>
		<div class="col-sm-8">
		  <p class="form-control-static"><b style="text-transform:uppercase;color:#337ab7;">Uploaded Files</b></p>
		</div>
	  </div>
	  
	  
	   <div class="form-group">
        <label for="inputEmail3" class="col-sm-3 control-label">Trade Licence</label>
        <div class="col-sm-8">
          <input type="file"  name="trader_license_file">
		     <a href="<?=FILE_URL.$user_info['trader_license_file']?>" class="fancybox fancybox.iframe">View File</a>
        
        </div>
      </div>
	  
	  <div class="form-group">
        <label for="inputEmail3" class="col-sm-3 control-label">VAT certificate</label>
        <div class="col-sm-8">
          <input type="file"  name="vat_file">
		    <a href="<?=FILE_URL.$user_info['vat_file']?>" class="fancybox fancybox.iframe">View File</a>
        
        </div>
      </div>
	  
	  <div class="form-group">
        <label for="inputEmail3" class="col-sm-3 control-label">TIN certificate</label>
        <div class="col-sm-8">
          <input type="file"  name="tin_certificate_file">
		  <a href="<?=FILE_URL.$user_info['trader_license_file']?>" class="fancybox fancybox.iframe">View File</a>
        </div>
      </div>
      
	 <div class="form-group">
        <label for="inputEmail3" class="col-sm-3 control-label">Up-to-date <br>TAX clearance <br>certificate</label>
        <div class="col-sm-8"><br/>
          <input type="file"  name="tax_clearance_file">
		  <a href="<?=FILE_URL.$user_info['tax_clearance_file']?>" class="fancybox fancybox.iframe">View File</a>
        </div>
      </div>	
     <br style="clear:both"/>	  
	 <div class="form-group">
        <label for="inputEmail3" class="col-sm-3 control-label">Other File_1</label>
        <div class="col-sm-8">
          <input type="file"  name="extra_file_1">
		  <a href="<?=FILE_URL.$user_info['extra_file_1']?>" class="fancybox fancybox.iframe">View File</a>
        </div>
      </div>	
       <div class="form-group">
        <label for="inputEmail3" class="col-sm-3 control-label">Other File_2</label>
        <div class="col-sm-8">
          <input type="file" name="extra_file_2">
		  <a href="<?=FILE_URL.$user_info['extra_file_2']?>" class="fancybox fancybox.iframe">View File</a>
        </div>
      </div>
      
     <div class="form-group">
		<label class="col-sm-3 control-label"></label>
		<div class="col-sm-8">
		  <p class="form-control-static"><b style="text-transform:uppercase;color:#337ab7;">Contact Person (signatory)</b></p>
		</div>
	  </div>
	  
	  <div class="form-group">
        <label for="inputEmail3" class="col-sm-3 control-label">Name</label>
        <div class="col-sm-8">
          <input type="text"  name="user_fname" value="<?=$user_info['user_fname'];?>" class="form-control"  placeholder="Contact Person Name" required="required">
        </div>
      </div>
 	   <div class="form-group">
        <label for="inputEmail3" class="col-sm-3 control-label">Designation</label>
        <div class="col-sm-8">
          <input type="text"  name="user_designation" value="<?=$user_info['user_designation'];?>" class="form-control"  placeholder="Designation" required="required">
        </div>
      </div>
	  
       <div class="form-group">
        <label for="inputEmail3" class="col-sm-3 control-label">Mobile Number</label>
        <div class="col-sm-8">
          <input type="text"  name="user_mobile" value="<?=$user_info['user_mobile'];?>" class="form-control"  placeholder="Mobile Number." required="required">
        </div>
      </div>
	  <div class="form-group">
        <label for="inputEmail3" class="col-sm-3 control-label">National ID Card</label>
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
        <label for="inputEmail3" class="col-sm-3 control-label">Passport size photo</label>
        <div class="col-sm-8">
          <input type="file"  name="user_picture"  placeholder="Passport size photo">
        </div>
      </div>
       <br style="clear:both"/>
       <br style="clear:both"/>
      
      
	
	
      <div class="form-group">
        <div class="col-sm-offset-3 col-sm-6">
          <button type="submit" class="btn btn-primary">Update</button>  
              
        </div>
      </div>
  </form>
  
  </div><!--panel-body-->
	  </div>
	</div>
	
	<div class="col-xs-12 col-sm-12 col-md-3">
		<div class="panel panel-success">
			<div class="panel-heading">
			  <h3 class="panel-title"><?=$user_info['user_fname']?></h3>
			</div>
				<div class="panel-body">      
					<img src="<?=FILE_URL.$user_info['user_picture']?>" width="200" />
						 
					<ul>
						<li><a href="<?=SCRIPT_URL?>auth/editprofile" title="" class="btn btn-link">Edit Profile</a></li>
						<li><a href="<?=SCRIPT_URL?>auth/changepassword" title="" class="btn btn-link">Change Password</a></li>
					</ul>	
				</div><!--panel-body-->
		  </div>
	</div>	
</div><!--row-->	