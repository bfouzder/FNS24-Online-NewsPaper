<style>img#banner_image{display:none;}</style>
<style media="print">.no_print{display:none;} title{display:none;} @page {size: auto;   margin: 0mm; } .panel-body,.table-responsive tr td,.table-responsive tr th{font-size:12px;}</style>

<!--bof bidder_info-->
<div class="row">
<div class="col-xs-12 col-sm-7 col-md-7">
		<div class="panel panel-primary">
			<div class="panel-heading">
			  <h3 class="panel-title">Basic Information</h3>
			</div>
			<div class="panel-body"> 
<div class="table-responsive">
<table class="table table-striped table-bordered">	     
<tr><td>Name</td><td><?=$bidder_info['user_fname'];?></td></tr>
<tr><td>Email</td><td><?=$bidder_info['user_email'];?></td></tr>
<tr><td>Designation</td><td><?=$bidder_info['user_designation'];?></td></tr>
<tr><td>Mobile Number</td><td><?=$bidder_info['user_mobile'];?></td></tr>
<tr><td>Birth Date</td><td><?=$bidder_info['user_birthdate'];?></td></tr>
<tr><td>Gender</td><td><?=$bidder_info['user_gender'];?></td></tr>
</table>

 </div>
 
  </div><!--panel-body-->
  </div>
</div>
<div class="col-xs-12 col-sm-5 col-md-5">
	<div class="panel panel-primary">
		<div class="panel-heading">
		  <h3 class="panel-title">Profile Picture</h3>
		</div>
		<div class="panel-body"> 
<div class="table-responsive">
<table class="table table-striped table-bordered">			
<tr><td colspan="2"><img src="<?=FILE_URL.$bidder_info['user_picture']?>" width="250"></td></tr>

</table>
		</div>
	</div><!--panel-body-->		
</div>
</div>
</div><!--row-->
