<div class="clearfix"></div> 
<?php include(TEMPLATE_STORE.'displaymessage.php');?>
<a onclick="jQuery('#editdiv').toggle();" class="btn btn-danger pull-right"><i class="fa fa-plus-circle"></i> &nbsp; Add New Test </a> 
<div style="display:<?=isset($edit[$primary_key])?"block":"none";?>" id="editdiv">
<!--bof Entry Form-->
<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12">
		<div class="panel panel-danger">
			<div class="panel-heading">
			  <h3 class="panel-title">Add/Edit New Category</h3>
			</div>
			<div class="panel-body"> 		
		<form method="post" action="" onsubmit="return checkSubmission(this);" enctype="multipart/form-data">
		 <input type="hidden" name="formSubmitted" value="true" />	
			<div class="form-group">
			<label class="col-sm-12 control-label">Category<em>*</em></label>
			<div class="col-sm-12">			
               <?php
					$parent=($edit['parent'])?$edit['parent']:$parent;
				?>
				<?=ShowSelectBoxArticleCategoryTree($parent);?>
			  </div>
			  </div> 
			  <div class="clearfix"></div>	
			  <div class="form-group">
				<label for="Title" class="col-sm-12 control-label">Title<em>*</em></label>
				<div class="col-sm-12">
				  <input type="text"  name="cat_name" value="<?=$edit['cat_name'];?>" class="form-control"  placeholder="Title" required="required">
				</div>
			  </div>
	  <div class="clearfix"></div>
           
             <?php if($edit['seo_title']){?>
			 <div class="form-group">
				<label for="Title" class="col-sm-12 control-label">Nice Name<em>*</em></label>
				<div class="col-sm-12">
				  <input type="text"  name="seo_title" value="<?=$edit['seo_title'];?>" class="form-control"  placeholder="seo title" required="required">
				</div>
			  </div>
			  <?php } ?>
			  
			  <div class="clearfix"></div>	
			  <div class="form-group">
				<label for="Title" class="col-sm-12 control-label">Display Order<em>*</em></label>
				<div class="col-sm-12">
				  <input type="text"  name="menu_order" value="<?=$edit['menu_order'];?>" class="form-control"  placeholder="Display Order" required="required" style="width:50px" maxlength="3">
				</div>
			  </div>
 		
 <div class="clearfix"></div> 
  
  
	<div class="form-group submit_sec">
			<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
			<?php if($edit['cat_id']){?>
			<input type="hidden" name="cat_id" value="<?=$edit['cat_id']?>" />&nbsp;                   
               <? } ?>          
			    <button type="submit" name="formSubmitted" value="s" class="btn btn-success">Submit</button>
				  <button type="reset" class="btn btn-primary">Reset</button>
				  <a class="btn btn-danger" href="<?=$back_url?>">Cancel</a>
			</div>
		  </div>
  
  
		  </form> 			
		
   </div><!--panel-body-->
	  </div>
	</div>
 </div><!--row-->
<!--eof Entry Form-->	
	<div class="clearfix"></div> 
</div>



<!--Listing-->	
<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12">
		<div class="panel panel-success">
			<div class="panel-heading">
			  <h3 class="panel-title"><i class="fa fa-th-list"></i> List of Category</h3>
			</div>
			<div class="panel-body"> 
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
<th><b>Filter by: </b></th>
<th><form action="" method="get"> <select name="parent" class="form-control" id="type" onchange="submit(this);"   >
				     <option value="">Select Category</option> 
					   <?=getOptionCatagoryTree($db->get_post('parent'));?>
				  </select></form> </th>
</tr>
</thead>
</table>
</div><!--table Responsive-->
<div class="clear"></div>
<!--eof topBAR-->     
      
	<div class="table-responsive">
       <table cellpadding="1" cellspacing="1" class="table"> 
        <thead class="thead">
          <tr>
          	<th width="20">ID#</th>        
          	<th nowrap="nowrap">Name</th>
			<th nowrap="nowrap">Display Order</th>  
	        <th nowrap="nowrap">Status</th>  			
            <th>Action</th>
          </tr>
        </thead>
        <tbody class="tbody">
          <?php 
		if($rows){
		  $i=0;
		  foreach($rows as $key => $value){		  	
		  $class=(($i%2)==0)?'default':'warning';
          
          $cat_id=$value['cat_id'];
          //$images=getImages($ImageType,$cat_id);
          $section_arr=getAdminSectionPath($value['cat_id']);
          //	$section_arr array('seotitle'=>$url,'catname'=>$url2);
        // pre($section_arr);
          $cat_url='';
      	  
		 ?>
		  <tr class="<?=$class;?>">
            <td><?=($key+1)?></td>     
						
            <td style="text-align:left;"><?=$section_arr['catname']?></td>
             
			<td style="text-align:left;"><?=$value['menu_order']?></td> 	

            <td>
				<?php if( $value['active'] == 1){ ?>
				<a href="<?=$main_link?>action=inactive&<?=$primary_key.'='.$value[$primary_key]?>" title="Disapprove User" class="label label-success"><i class="fa fa-check" aria-hidden="true"></i> Approved</a>
				<?php }else{ ?>
				<a href="<?=$main_link?>action=active&<?=$primary_key.'='.$value[$primary_key]?>" title="Approve User"  class="label label-default"><i class="fa fa-circle" aria-hidden="true"></i> Pending</a>
				<?php } ?>
			</td>

			<td>
				<table border="0" cellpadding="2" cellspacing="2">
						 <tr>
							<td><a href="<?= SCRIPT_URL.$link.'page='.$pages['curr_page'] ?>&action=Edit&<?=$primary_key.'='.$value[$primary_key] ?>" title="Edit" class="btn btn-default btn-xs"><i class="fa fa-pencil-square-o"> EDIT</i></a></td>
						   <td><a href="<?=$main_link?>action=Delete&<?=$primary_key.'='.$value[$primary_key] ?>" title="Delete" onclick="return confirm('Are You Sure You want to delete?')" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"> DEL</i> </a></td>
						 </tr>
				 </table>	
			</td>
          </tr>
          <?php
				$i++;					  
				}   /// end foreach
			}else{
		  ?>
		  <tr class="col">
            <td colspan="7">No result found found.</td>
          </tr>
          <?php
          }
		  ?>
        </tbody>
        <tfoot class="tfoot">
          <tr>           
            <td colspan="5">&nbsp;	</td>
          </tr>
        </tfoot>
      </table>
</div><!--table Responsive-->
	  
<?php include(TEMPLATE_STORE.'pagination_raw.php');?>
			</div><!--panel-body-->
	  </div>
	</div>
</div>	  