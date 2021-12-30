<!-- Put All Javascripts Codes Here -->
<script type="text/javascript">
	
	function closeIt(id){
		var selectedEffect = 'blind';
		$('#'+id).hide(selectedEffect,{},700);
	}
	function closeMessage(id){
		var selectedEffect = 'explode';
		$('#'+id).hide(selectedEffect,{},700);
	}

</script>
<!-- End All Javascripts Codes -->

<?php
$arguments=$params;
$action = "";

if($arguments){
	$action = $arguments[0];
}

//edit functionality
if($db->post('formSubmitted')){
 	if($db->post('addedit')){
 		$return = $db->bindPOST('settings','id');
 		if($return){
 			$session->flashmessage('successMessage','Option has successfully been edited!');
            
            urlredirect($page_url);
 		}
 	} 	
}

switch($action){

	case 'edit':	
				$edit_id = $arguments[1];
				break;													
}

//prepare edit data
if(isset($edit_id)){
	 $edit_data = $db->getRowArray('settings','id='.$edit_id);

}

$warning = $session->flashmessage('warningMessage');
$error = $session->flashmessage('errorMessage');
$success = $session->flashmessage('successMessage');

?>
<script>
 $('form').validate({
        rules: {
            title: {
                minlength: 3,
                maxlength: 15,
                required: true
            },
            value: {
                minlength: 3,
                maxlength: 15,
                required: true
            }
        },
        highlight: function(element) {
            $(element).closest('.form-group').addClass('has-error');
        },
        unhighlight: function(element) {
            $(element).closest('.form-group').removeClass('has-error');
        },
        errorElement: 'span',
        errorClass: 'help-block',
        errorPlacement: function(error, element) {
            if(element.parent('.input-group').length) {
                error.insertAfter(element.parent());
            } else {
                error.insertAfter(element);
            }
        }
    });
</script>
<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12">
	
<div class="round-block-gra" id="addedit" <?php if(!isset($edit_id) && $action != 'add'){ ?> style="display:none;" <?php } ?> >
  	
<!--bof Add Settings Form-->	
<div class="panel panel-primary">
	<div class="panel-heading">
	  <h3 class="panel-title">Add Edit Options</h3>
	</div>
	<div class="panel-body">
	<div class="row">
	<div class="col-xs-12 col-sm-8 col-md-8">
	<?php include(TEMPLATE_STORE.'displaymessage.php');?>
	<form class="form-horizontal" action="" method="post">
	<input type="hidden" name="formSubmitted" value="1"/>
	<input type="hidden" name="addedit" value="true"/>
		<div class="form-group">
			<label class="col-sm-3 control-label">Key</label>
			<div class="col-sm-8">
				<p class="form-control-static control-label"><b><?=$edit_data['key'];?></b></p>
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-3 control-label">Option Name</label>
			<div class="col-sm-8">
			<input type="text"  name="title" value="<?php if(isset($edit_id)){echo $edit_data['title'];}?>" class="form-control"  placeholder="Option title" required="required">
			</div>
		</div> 
		<?php 
		if($edit_data['opt_group']=='ads' ||$edit_data['opt_group']=='adsense'|| $edit_data['opt_group']=='meta'|| $edit_data['opt_group']=='address' ){
		?>
		<div class="form-group">
			<label class="col-sm-3 control-label">Option Value</label>
			<div class="col-sm-8">
			<textarea name="value" class="form-control"><?php if(isset($edit_id)){echo $edit_data['value'];}?></textarea>
			</div>
		</div> 
		<?php }elseif($edit_data['opt_group']=='show-hide'){ ?>
		<div class="form-group">
			<label class="col-sm-3 control-label">Display </label>
			<div class="col-sm-8">
			<input type="radio"  name="value" value="ON" <?php if(isset($edit_id) && $edit_data['value'] =='ON'){ echo 'checked="checked" ';}?>required="required"> ON 
			<input type="radio"  name="value" value="OFF" <?php if(isset($edit_id) && $edit_data['value'] =='OFF'){ echo 'checked="checked" ';}?>required="required"> OFF
			</div>
		</div> 
		<?php }else{ ?>
		<div class="form-group">
			<label class="col-sm-3 control-label">Option Value</label>
			<div class="col-sm-8">
			<input type="text"  name="value" value="<?php if(isset($edit_id)){echo $edit_data['value'];}?>" class="form-control"  placeholder="Option Value" required="required">
			</div>
		</div> 
		<?php } ?>
		<div class="clearfix"></div> 
			
		<div class="form-group submit_sec">
			<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
			    
					<?php if(isset($edit_id)){ ?>
					<input type="hidden" name="id" value="<?=$edit_id?>" />
					<button type="submit" name="submit" class="btn btn-success">Update</button>

					<?php }else{ ?>
					<button type="submit" name="submit" class="btn btn-success">Submit</button>
					<?php } ?>
				  <button type="reset" class="btn btn-primary">Reset</button>
				  <a class="btn btn-danger" href="<?=SCRIPT_URL?>siteadminpanel/settings/">Cancel</a>
			</div>
		  </div>
		  
		</form>
			</div>
		</div>
		
		
	</div><!--eof panel body-->
</div><!--eof panel-->	
</div><!--eof panel-->	
<div class="clearfix"></div>
    
    <?php
	
	$groupList =  getSettingGroups();	
	foreach($groupList as $group){
	   
	$settingsByGroup = getSettingByGroups($group);
    
    if( $group== 'cache'){
       $panel_class='panel-danger'; 
    }elseif($group== 'pagination'){
       $panel_class='panel-success';
    }elseif($group== 'ads'){
       $panel_class='panel-default';
    }elseif($group== 'basic'){
       $panel_class='panel-warning';
    }else{
       $panel_class='panel-info'; 
    }
    	
	?>
	
 
<div class="panel <?=$panel_class?>">
	<div class="panel-heading">
	  <h3 class="panel-title">Manage <?=ucwords($group)?> Settings</h3>
	</div>
	<div class="panel-body">
	<div class="table-responsive">    
      <table class="table  table-striped table-bordered">
       <form action="" method="post" name="form1" >
        <thead class="thead">
          <tr>
            <th>Id</th>
            <th>Option Name</th>
            <th>Value</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody class="tbody">
        
        <?php $i=0; if(!empty($settingsByGroup)){ foreach($settingsByGroup as $key => $cat){ $class=(($i%2)==0)?'col':'col1'; $i++;	?>
        	
        	<tr class="<?=$class?>" >
	            <td><?=$cat['id']?></td>
	            <td nowrap="nowrap"><?=$cat['title']?></td>
	            <td>
	      <?php  if($cat['opt_group']=='ads' ||$cat['opt_group']=='adsense'|| $cat['opt_group']=='meta' ){ ?>
	              <textarea rows="2" class="form-control" style="border:0; background:transparent;" disabled><?=$cat['value']?></textarea>
	      <?php	}else{ ?>
	       <?=$cat['value']?>
	      <?php	} ?>
	      
	            </td>
	            <td>     
					<a href="<?=$page_url?>edit/<?=$cat['id']?>" ><button class="btn btn-danger btn-xs" type="button"><i class="fa fa-pencil-square" title="edit"></i>&nbsp; Edit</button></a>&nbsp;
				</td>
            </tr>
        	
        <?php } } ?>

        </tbody>
        <tfoot class="tfoot">
        </tfoot>
        </form>
      </table>

      <div class="clearfix"></div>
    </div>
    <?php if( $group== 'cache'){ 
       $cache_clean_url=ADMIN_URL.'cachemanager/deleteCache/';
       $cache_gen_url=ADMIN_URL.'cachemanager/generateCache/';
        
    echo '<a href="'.$cache_clean_url.'" class="btn btn-danger fancybox fancybox.iframe" target="_blank">Clean All Cache Files</a>'."\n";
    
	echo '<a href="'.$cache_clean_url.'" class="btn btn-success fancybox fancybox.iframe" target="_blank">Generate Cache Files</a>'."\n";
    
	} 
     ?>
    
	</div><!--eof panel body-->
</div><!--eof panel-->
<?php 	} ?>

  
</div>	
</div>	

					 