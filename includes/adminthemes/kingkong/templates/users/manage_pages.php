<?php
$tableName='pagemanager';
$primaryKey='page_id';
$page = $db->get_post('page');
$redirect_url ="siteadminpanel/pageManager/";
$link ="siteadminpanel/pageManager/?";

function getMenu($pid){
	global $db;
	$drops = $db->select("Select * From pagemanager where parent=0");
	$drop='<option value="0">Main Page</option>';
	foreach($drops as $value){
		$sel=($pid==$value['page_id'])? ' selected="selected"':'';
		$drop.='<option value="'.$value['page_id'].'" '.$sel.'>'.$value['page_title'].'</option>';
		 $dtwo = $db->select("Select * From pagemanager where parent=".$value['page_id']);
		if($dtwo != ''){
		foreach($dtwo as $val){
			$sel=($pid==$val['page_id'])? ' selected="selected"':'';
			$drop.='<option value="'.$val['page_id'].'" '.$sel.'>|__'.$val['page_title'].'</option>';
		} 
	}
	
}
	return $drop;
}	
function getPageSectionMenu2($pid){
	global $db;
	$drops = $db->select("Select * From pagemanager where parent=0");

	foreach($drops as $value){
		$sel=($pid==$value['page_id'])? ' selected="selected"':'';
		$drop.='<option value="'.$value['page_id'].'" '.$sel.'>'.$value['page_title'].'</option>';
	}
	$drop.='<option value="">Show All Pages</option>';
	$drop.='<option value="0">Show All Section</option>';
	return $drop;
} 


    $get_action = $db->get('action');
	$page_id = $db->get('page_id');
	
	
	
	
	
	#add/updatePage
	if($db->post('formSubmitted')){
		$page_name = $db->post('page_name');
		$page_title = $db->post('page_title');
		$_POST['page_name'] = ($page_name)?$page_name:make_seo($page_title);
		$page_content = $db->post('page_content');
		
		$short = $db->post('short');
		$meta_kw = $db->post('meta_kw');
		$meta_desc = $db->post('meta_desc');		
		$page_id=$db->bindPOST($tableName, 'page_id');
		redirect($redirect_url);
	}
  
  if($db->get('actionid') == 'edit'){
	  $id=$db->get('id');
		$edit = $db->select_single("Select * From ".$tableName." where page_id=".$id);
	
	}
	
	
	
	
	
	
	
	
	
	
	 if($db->post('formSubmittedROWS'))   ////////////manage post data
	  {
	  	
	   $page_id = $db->post('page_id');
	   $post_action = $db->post('action');
	   
		
	  	if($page_id)
	  	{
			//	echo '$post_action'.$post_action;
	  		foreach($page_id as $value)
	  		{
	  		    switch($post_action)
	  	        {
			  		case 'approve':
			    	                $sql = "UPDATE pagemanager SET active = '1' WHERE page_id='$value'";
			  		                $db->edit($sql);
			  		                break;
			  	   	case 'disapprove':
			    	                $sql = "UPDATE pagemanager SET active = '0' WHERE page_id='$value'";
			  		                $db->edit($sql);
			  		                break;
			  		                case 'disapprove':
			    	                $sql = "UPDATE pagemanager SET active = '0' WHERE page_id='$value'";
			  		                $db->edit($sql);
			  		                break;
		            case 'delete':
					$sql = "DELETE FROM pagemanager WHERE page_id='$page_id'";
					$db->delete($sql);    
			  		                break;
			  		                
                         


	  	         }	
	  		 }
	  	  }
		
      }
	
	
	
	
	
	
	if($get_action)
    {
		//echo '$get_action'.$get_action;
	    switch($get_action)
	    {
	    	case 'approve':
	    	                $sql = "UPDATE pagemanager SET active = '1' WHERE page_id='$page_id'";
	  		                $db->edit($sql);

	  		                break;
	  	   	case 'disapprove':
	    	                $sql = "UPDATE pagemanager SET active = '0' WHERE page_id='$page_id'";
	  		                $db->edit($sql);
	  		                break;
            case 'unbanned':
	    	                 $sql = "UPDATE pagemanager SET sq_banned = '0' WHERE page_id='$page_id'";
                             $db->edit($sql);
                             break;
   
            case 'delete':
            $sql = "DELETE FROM pagemanager WHERE page_id='$page_id'";
			$db->delete($sql);
	 						
	  		                break;	                 

	    }
	    redirect($redirect_url);
    }
 
    
 
	$parent=$db->get('parent');
	if($parent !='0'){
	$sql_query="SELECT * FROM `pagemanager` WHERE parent !='0' ";
	}else{
	$sql_query="SELECT * FROM `pagemanager` WHERE parent ='0' ";
	}	                   
	if($parent){
		$sql_query .= "  AND parent='$parent' ";
	}
	if($db->get_post('q')){
		$q=$db->get_post('q');
		if(is_numeric($q)){
			$sql_query .= "  AND page_id='$q' ";
		}elseif(is_string($q)){
				$sql_query .= "  AND page_name='".$db->db_input($q)."' OR page_title LIKE '%".$db->db_input($q)."%' ";
		}

   $link .="sq=$q&";
	}
    
    	                         
	$pages = make_pagination($sql_query,$page,10);
	$sql_query .= " ORDER BY parent,short";
	$sql_query .= " LIMIT ".$pages['start_form'].",".$pages['per_page'];
	//echo $sql_query;
	$rows = $db->select($sql_query);
  //pre($rows);
	 
  ?>

<script language="javascript" type="text/javascript">
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
function showForm(){
	
	$('#add_edit_block').toggle();
	$('#add_edit_block_list').toggle();
}
function checkSearch(form){
    
    if(form.user.value=="" || form.user.value=="Enter username, email or id here" ){
        return false;
    }
    	return true;
}
</script>

<?php
//pre($edit);
 if($db->get('doaction')=='add'){ 
$panel_title="Add New Page";
?>
<div class="row" id="add_edit_block"  style="display:block">
<?php }elseif($edit){ 
$panel_title="Update Page";
?>
<div class="row" id="add_edit_block" <?=($edit)?' style="display:block"':' style="display:none"';?>>
<?php }else{ ?>

<div class="row" id="add_edit_block" style="display:none">
<?php } ?> 
 <div class="col-md-12 col-sm-12 col-xs-12">
	<div class="x_panel">
	  <div class="x_title">
		<h2><?=$panel_title?></h2>                    
		<div class="clearfix"></div>
	  </div>
	  <div class="x_content">
		<br />
		<form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="POST" >
		 <input type="hidden" name="formSubmitted" value="1" >
		 <?php if($edit){ ?>
		 <input type="hidden" name="<?=$primaryKey?>" value="<?=$edit[$primaryKey]?>" >
		 <?php } ?>

			
<div class="panel panel-success">
	<div class="panel-heading">
	  <h3 class="panel-title">Page Information</h3>
	</div>
	<div class="panel-body">
		
		<div class="form-group">
		<label class="control-label col-md-2 col-sm-3 col-xs-12" for="name">Section/Parent:</label>
		<div class="col-md-9 col-sm-9 col-xs-12">
		  <select class="form-control" name="parent">
			  <?= $drops=getMenu($edit['parent']); ?>
		  </select>
		</div>
		</div>
		
		
		<div class="form-group">
		<label class="control-label col-md-2 col-sm-3 col-xs-12" for="name">Page Title:<em>*</em></label>
		<div class="col-md-9 col-sm-9 col-xs-12">
		  <input type="text" name="page_title" required="required" value="<?=$edit['page_title']?>" class="form-control col-md-7 col-xs-12">
		</div>
		</div>
		
		<div class="form-group">
		<label class="control-label col-md-2 col-sm-3 col-xs-12" for="name">Slug:</label>
		<div class="col-md-9 col-sm-9 col-xs-12">
		  <input type="text" name="page_name" value="<?=$edit['page_name']?>" class="form-control col-md-7 col-xs-12">
		</div>
		</div>
		
		<div class="form-group">
		<label class="control-label col-md-2 col-sm-3 col-xs-12" for="name">Page Content:</label>
		<div class="col-md-9 col-sm-9 col-xs-12">
		          <textarea  id="editor"  name="page_content" class="form-control"><?=$edit['page_content']?></textarea>
		</div>
		</div>
		<div class="form-group">
		<label class="control-label col-md-2 col-sm-3 col-xs-12" for="name">External URL:</label>
		<div class="col-md-9 col-sm-9 col-xs-12">
		  <input type="text" name="external_url"  value="<?= $edit['external_url'] ?>" class="form-control col-md-7 col-xs-12">
		</div>
		</div>
		<div class="form-group">
		<label class="control-label col-md-2 col-sm-3 col-xs-12" for="name">Short:<em>*</em></label>
		<div class="col-md-9 col-sm-9 col-xs-12">
		  <input type="text" name="short" required="required" value="<?= $edit['short'] ?>" class="form-control col-md-7 col-xs-12">
		</div>
		</div>
		
		  
	</div><!--/panel-body-->
</div><!--/panel-->	
	<div class="panel panel-success">
	<div class="panel-heading">
	<h3 class="panel-title">Meta Information</h3>
	</div>
	<div class="panel-body">
	<div class="form-group">
		<label class="control-label col-md-2 col-sm-3 col-xs-12" for="name">Meta Keyword:</label>
		<div class="col-md-9 col-sm-9 col-xs-12">
		  <input type="text" name="meta_kw" value="<?= $edit['meta_kw'] ?>"  class="form-control col-md-7 col-xs-12">
		</div>
		
	</div>
	<div class="form-group">
		
		<label class="control-label col-md-2 col-sm-3 col-xs-12" for="name">Meta Description:</label>
		<div class="col-md-9 col-sm-9 col-xs-12">
		  <input type="text" name="meta_desc" value="<?= $edit['meta_desc'] ?>" class="form-control col-md-7 col-xs-12">
		 
		</div>
	</div>

	</div><!--/panel-body-->
	</div><!--/panel-->		  
		  <div class="form-group submit_sec">
			<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
			    <button type="submit" name="submit" class="btn btn-success">Submit</button>
				  <button type="button" class="btn btn-primary">Reset</button>
				  <a class="btn btn-danger" href="<?=$redirect_url?>">Cancel</a>
			</div>
		  </div>
		</form>
	  </div>
	</div>
  </div>
</div>
<?php $edit=($db->get('doaction')=='add')?true:$edit;?>        
 <!--Listing-->	
<div class="row" id="add_edit_block_list" <?=($edit)?' style="display:none"':' style="display:block"';?>>

	<div class="col-xs-12 col-sm-12 col-md-12">	           
            
    <div class="x_panel">
	  <div class="x_title">
		<h2><i class="fa fa-th-list"></i> List of Pages</h2>                    
		<div class="clearfix"></div>
	  </div>
	  <div class="x_content">
             
<!--bof topBAR-->
<div class="table-responsive">	
<table class="table table-bordered">
<thead>
<tr>
<th>  
<!--bof search Panel-->
<?php $sq=($q)?$q:"Search here";?>
<form class="form-inline" method="get" onsubmit="return checkSearch(this)">
	<div class="form-group">
		<label class="sr-only" for="exampleInputAmount">Search</label>
		<div class="input-group">
			<!--<div class="input-group-addon">Search</div>-->
			<input type="text" class="form-control" name="q" value="<?=$q?>"   placeholder="<?=$sq?>">
		</div>
	</div>
	<button type="submit" class="btn btn-primary">GO</button>
</form>
<!--eof search Panel-->	 
</th>
<th><form action="" method="get"> <select name="parent" class="form-control" id="type" onchange="submit(this);"   >
				     <option value="">Filter by Section/Parent</option> 
					   <?=getPageSectionMenu2($db->get_post('parent'));?>
				  </select></form> </th>
</tr>
</thead>
</table>
</div><!--table Responsive-->
<div class="clear"></div>
<!--eof topBAR-->     
      
	
 <form action="" method="post"  class="form-inline"  onsubmit="return check_action()">	  
 <div class="table-responsive">
 <table class="table table-bordered">
	<thead>
        <thead class="thead">
          <tr>
          	<th width="5%"><input type="checkbox" id="check_uncheck_top" value="all" onclick="__checkAll(<?= $rows?count($rows): 0 ?>,'check_uncheck_top')" /></th>
          	<th>Page</th>
          	<th>Slug / ExternalUrl</th>
			<th>Section/Parent</th> 
            <th>Status</th>
            <th>Action</th>
             </tr>
        </thead>
        <tbody class="tbody">
          <?php 
		if($rows){
		  
          $i=0;
		  foreach($rows as $key => $value){
		     // pre($value);
		    $page_id=$value['page_id'];
            $page_slug=($value['external_url'])?$value['external_url']:$value['page_name'];
            $class=(($i%2)==0)?'col':'col1';
			$parent_info=getPageInfo($value['parent']);

		 ?>
		  <tr class="<?=$class;?>" >
		  	<td>
			  <input type="checkbox" name="page_id[]" id="checksingle<?php echo $key; ?>" value="<?= $value['page_id'] ?>" />
            </td>
       
          <td><?= $value['page_title']; ?></td>
          <td><?= $page_slug; ?></td>
            <td><?= $parent_info['page_title']; ?></td>
			<td><?php if( $value['active'] == 1){ ?>
			<a href="<?=SCRIPT_URL.$redirect_url?>?action=disapprove&page_id=<?= $value['page_id'] ?>" title="Disapprove User" class="label label-success"><i class="fa fa-check" aria-hidden="true"></i> Approved</a>
			<?php }else{ ?>
			<a href="<?=SCRIPT_URL.$redirect_url?>?action=approve&page_id=<?= $value['page_id'] ?>" title="Approve User"  class="label label-warning"><i class="fa fa-circle" aria-hidden="true"></i> Pending</a>
			<?php } ?>
            </td>
           
            <td>
            	<table border="0" cellpadding="2" cellspacing="2">
		            	 <tr>
							
							<td><a href="<?=SCRIPT_URL.$redirect_url?>?actionid=edit&id=<?= $value['page_id'] ?>" title="Edit" class="btn btn-default btn-xs"><i class="fa fa-pencil-square-o"> EDIT</i></a></td>
						
							<td>&nbsp;<a href="<?=SCRIPT_URL.$redirect_url?>?action=delete&page_id=<?= $value['page_id'] ?>" title="Delete" onclick="return confirm('Are You Sure You want to delete?')" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"> DEL</i> </a></td>
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
						<select name="action" class="form-control" id="p_action">
							<option value="" selected="selected">Select Action</option>
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
	

			</div><!--table Responsive-->
	  
<?php include(TEMPLATE_STORE.'pagination_raw.php');?>
			</div><!--panel-body-->
	  </div>
	</div>
</div>	 
			 

	 