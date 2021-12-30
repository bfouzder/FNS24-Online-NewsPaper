<script language="javascript" type="text/javascript">
function poptastic(url){

		var newwindow;
		newwindow=window.open(url,'popupWindow','toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=yes,copyhistory=no,width=600,height=400,screenX=150,screenY=150,top=80,left=30');
		if (window.focus) {newwindow.focus()}
	}
function __checkAll( row, check_id ){
	var ar_checked=document.getElementById(check_id).checked;
	if(row) {
		 for( var i=0; i<row; i++ ){
				var single = 'checksingle'+i;
				document.getElementById(single).checked = ar_checked;
		 }
	}
}      
function check_action()
{
	var action = document.getElementById('p_action').value;
   
    if(action =='')
     {
     	alert("Please Select An Action");
     	return false;
     }
    else if(action =='delete')
    {
     
	 var x = confirm('Are You Sure You Want to Delete?');
	 if(!x)
	  return false;
    }
	return true;
}
function checkSearch(form){
    
    if(form.client.value=="" || form.client.value=="Enter clientname, email or id here" ){
        return false;
    }
    	return true;
}
</script>
<?php 
$display_type=($type=='person')?'Clients':ucfirst($type).'s';
?>
<div class="page-title">
      <div class="title_left">
        <h3>Manage <?=$display_type?> <small>Total : <?=$pages['total_data']?></small></h3>
      </div>
      <div class="title_right">
       
        <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
		<form class="" method="get" onsubmit="return checkSearch(this)">
	     <div class="input-group">
            <input type="text" name="client"   class="form-control" placeholder="Search for...">
            <span class="input-group-btn">
              <button class="btn btn-default" type="submit">Go!</button>
            </span>
          </div>
		 </form>		 
        </div>
      </div>
    </div>

    <div class="clearfix"></div>
	  
<table class="table table-bordered">
<thead>
<tr>
<th bgcolor="#fff" style="border-left:none;border-right:none;" valign="top">
	<a href="<?=ADMIN_URL.'manageClients/'?>?type=<?=$type?>&view=featured">
	<button type="button" class="btn btn-warning pull-right"style="margin-bottom:0"><i class="fa fa-bullseye" aria-hidden="true"></i> Show Featured </button></a>
</th>
<th bgcolor="#fff" style="border-left:none" valign="top">
	<a href="<?=ADMIN_URL.'manageClients/'?>?type=<?=$type?>">
	<button type="button" class="btn btn-default pull-right"style="margin-bottom:0"><i class="fa fa-refresh" aria-hidden="true"></i> Show All </button></a>
</th>
</tr>
</thead>
</table>
<br style="clear:both"/>
<div class="row">
 <div class="col-xs-12 col-sm-12 col-md-12">
	<div class="panel panel-success">
		<div class="panel-heading">
		  <h3 class="panel-title">Manage <?=$display_type;?></h3>
		</div>
		<div class="panel-body">

<form action="" method="post"  class="form-inline"  onsubmit="return check_action()">	  
 	  
 <table class="table table-bordered">
	<thead>
        <thead class="thead">
          <tr>
          	<th width="5%"><input type="checkbox" id="check_uncheck_top" value="all" onclick="__checkAll(<?= $rows?count($rows): 0 ?>,'check_uncheck_top')" /></th>
          	<th>Avatar</th>
          	<th>Title</th>
    
            <th>Status</th>
            <th>Featured</th>
            <th>Create Date</th>
	        <th width="160"></th>
          </tr>
        </thead>
        <tbody class="tbody">
          <?php 
		if($rows){
		  
          $i=0;
		  foreach($rows as $key => $value){
		     // pre($value);
		    $client_id=$value['client_id'];
            $client_name=$value['client_name'];
            $client_fullname=$value['contact_person'];
            $client_url=__client_url($value);
            
		    $class=(($i%2)==0)?'col':'col1';

        $theme=($value['theme']=="" || $value['theme']=='default' )?'orange':$value['theme'];
		 ?>
		  <tr class="<?=$class;?>" >
		  	<td>
			  <input type="checkbox" name="client_id[]" id="checksingle<?php echo $key; ?>" value="<?= $value['client_id'] ?>" />
            </td>
            <td width="6%">
				<?=($value['avatar'])?client_img($value['client_id'],$value['avatar']):'';?><br/>
				
                <br/>
			
		   </td>            
            <td>
                <b><a href="<?=$client_url?>" target="_blank"><?=$client_fullname;?></a></b>
            <br/>ID: <?=$client_id?>
            </td>
			
           
			<td><?php if( $value['status'] == 1){ ?>
			<a href="<?= SCRIPT_URL ?>siteadminpanel/manageClients/?action=disapprove&client_id=<?= $value['client_id'] ?>" title="Disapprove User" class="label label-success"><i class="fa fa-check" aria-hidden="true"></i> Approved</a>
			<?php }else{ ?>
			<a href="<?= SCRIPT_URL ?>siteadminpanel/manageClients/?action=approve&client_id=<?= $value['client_id'] ?>" title="Approve User"  class="label label-warning"><i class="fa fa-circle" aria-hidden="true"></i> Pending</a>
			<?php } ?>
            </td>
            
            <td width="7%"> 
				<?php if($value['featured']==1){?> 
				<a href="<?= SCRIPT_URL.$link.'page='.$pages['curr_page']?>&action=unfeatured&<?=$primary_key.'='.$value[$primary_key]?>" class="btn btn-warning btn-xs" title="Remove featured"  /><i class="fa fa-bullseye" aria-hidden="true"></i> Featured</a> 
				<?php	}else{ ?>
				<a href="<?= SCRIPT_URL.$link.'page='.$pages['curr_page']?>&action=featured&<?=$primary_key.'='.$value[$primary_key]?>" class="btn btn-default btn-xs">Make Featured</a>
				<?php	} ?>     
			</td> 
            
            <td><?=date_time($value['date_added'])?> <br /> <?=($value['client_lastlogin'])?date_time($value['client_lastlogin']):'';?></td>
            <td>
            	<table border="0" cellpadding="2" cellspacing="2">
		            	 <tr>
							<td><a href="<?= SCRIPT_URL ?>siteadminpanel/editclient/?client_id=<?=$value['client_id']?>&client_name=<?=$value['client_name']?>" title="Edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</a></td>
							<td>&nbsp;<a href="<?=SCRIPT_URL ?>siteadminpanel/manageClients/?action=delete&client_id=<?= $value['client_id'] ?>" title="Delete" onclick="return confirm('Are You Sure You want to delete?')"  class="label label-danger"><i class="fa fa-times" aria-hidden="true"></i> Del</a></td>
						
							
						 </tr>
				 </table>	
			</td>
          </tr>
          <?php
				$i++;					  
				}   /// end foreach
			}else{
		  ?>
		  <tr class="col" >
            <td colspan="8">No Result Found.</td>
          </tr>
          <?php
          }
		  ?>
        <tr>
		     <th align="left"><input type="checkbox" id="check_uncheck_bottom" value="all" onclick="__checkAll(<?= $rows?count($rows): 0 ?>,'check_uncheck_bottom')" /></td>
         	
			 <td colspan="10" align="left">
					<div class="form-group">
						 <select name="action" class="select form-control" style="width:150px" id="p_action">
						<option value="" selected="selected">Select Action</option>
						<option value="unfeatured"  <?php if($db->post('action')=='unfeatured'){ ?> selected="selected" <?php } ?>>Un Featured</option>
						<option value="featured" <?php if($db->post('action')=='featured'){ ?> selected="selected" <?php } ?> >Featured</option>
						<option value="approve" <?php if($db->post('action')=='approve'){ ?> selected="selected" <?php } ?>>Approve</option>
						<option value="disapprove" <?php if($db->post('action')=='disapprove'){ ?> selected="selected" <?php } ?>>disapprove</option>
					   <option value="delete" <?php if($db->post('action')=='delete'){ ?> selected="selected" <?php } ?>>Delete</option>
					  </select>
					</div>
					<input type="submit" value="Submit" name="" class="btn btn-success"  style="margin-top:2px;"/>
					
            <input type="hidden" value="true" name="formSubmittedROWS"/>
           </td>
          </tr>
    	</tbody>
      </table>
    </form>
	
  <?php 
 // echo ADMIN_TEMPLATE_STORE.'pagination_all.php';
  require(ADMIN_TEMPLATE_STORE.'pagination_raw.php');	?> 
			</div><!--panel-body-->
	  </div>
	</div>
</div>