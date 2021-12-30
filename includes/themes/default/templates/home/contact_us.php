<script type="text/javascript">
function CheckForm(f)
{	
    var err=new Array();
    if(f.name.value=='')err.push("Your name required");
    if( !f.email.value.match(/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/) )err.push("Valid e-mail required");
    if(f.subject.value=='')err.push("Subject required");
    if(f.message.value.length<2)err.push("Message required");
    if(err.length>0){
		alert(err.join('\n'));return false;
	}
    return true;
}
</script>
<div class="row">
	<div class="col-xs-12 col-sm-8 col-md-8">
		<div class="panel panel-primary">
			<div class="panel-heading">
			  <h3 class="panel-title">Contact Us</h3>
			</div>
			<div class="panel-body">  


<?php include(TEMPLATE_STORE.'displaymessage.php');?>
<?
$disabled=(state('CE_user_id'))?' readonly="readonly"':'';
$sub=$db->get_post('sub');
$sub_disabled=($sub)?' readonly="readonly"':'';
$sub=($sub)?str_replace(' ','_',strtoupper($sub)):'';
?>

<form method="post" action="" onsubmit="return CheckForm(this);">
<input type="hidden" name="formSubmitted" value="true" />

	<div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">Name:</label>
        <div class="col-sm-10">
          <input type="text"  name="name" value="<?=$user_info['name'];?>" class="form-control"  placeholder="Your name">
        </div>
      </div>
      <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">Email:</label>
        <div class="col-sm-10">
          <input type="email"  name="email" value="<?=$user_info['email'];?>" class="form-control" id="inputEmail3" placeholder="Email">
        </div>
      </div>
      
       <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">Phone:</label>
        <div class="col-sm-10">
          <input type="text"  name="user_mobile" value="<?=$user_info['user_mobile'];?>" class="form-control"  placeholder="Contact No.">
        </div>
      </div>
	  <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">Subject:</label>
        <div class="col-sm-10">
          <input type="text"  name="subject" value="<?=$user_info['subject'];?>" class="form-control"  placeholder="Subject">
        </div>
      </div>
	   <div class="form-group">
		<label for="inputEmail3" class="col-sm-2 control-label">Message:</label>
		<div class="col-sm-10">
		  <textarea name="message" class="form-control" rows="3" placeholder="Message"><?=$db->post('message');?></textarea>
		</div>
	  </div>  

      <?php if($captcha_mode){ //show captcha if enabled ?>
      <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">Security Code</label>
        <div class="col-sm-10">       
            <div style="width:140px;float:left;"><?php echo "<img src='".SCRIPT_URL."includes/3rdParty/vimage/img.php?size=4' />";?> </div>                            	    
    	    <div style="width:150px;float:left;"><?php $vImage->showCodBox(1,"required='yes' validate='text' message='Enter Image Varification Text (case sensitive)' size='14' class='inputtext'");?>
    	     <?php echo "(case sensitive)"; ?></div>                                       	         
		</div>
      </div>
	<?php } //end show captcha ?> 
	
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
          <button type="submit" class="btn btn-primary">Send</button>
        </div>
      </div> 
</form>
  </div><!--panel-body-->
  </div>
</div>
<div class="col-xs-12 col-sm-4 col-md-4">
	<div class="panel panel-primary">
		<div class="panel-heading">
		  <h3 class="panel-title">Quick Contact</h3>
		</div>
		<div class="panel-body">
		
<p><b>Address here</b><br/>
A/2, Banani,Dhaka Dhaka-1212<br/> 
<b>Tel:</b>  xxxxxxxx,  Ext : 334<br/> 
<b>Email:</b> <a href="mailto: info@sitename.com"> info@sitename.com</a>

		</div>
	</div>
</div>		
 

</div> 