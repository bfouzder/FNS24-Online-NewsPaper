<div class="clearfix"></div> 
<?php include(TEMPLATE_STORE.'displaymessage.php');?>
<a onclick="jQuery('#editdiv').toggle();" class="btn btn-info btn-lg btn-block"><i class="fa fa-plus-circle"></i> &nbsp; Add New Category </a> 
<div style="display:<?=isset($edit[$primary_key])?"block":"none";?>" id="editdiv">
<!--bof Entry Form-->
<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12">
		<div class="panel panel-danger">
			<div class="panel-heading">
			  <h3 class="panel-title"><i class="fa fa-plus-square"></i> Add/Edit New Category</h3>
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
				<?=ShowSelectBoxImageCategoryTree($parent);?>
			  </div>
			  </div> 
			  <div class="clearfix"></div>	
			  <div class="form-group">
				<label for="Title" class="col-sm-12 control-label">Title<em>*</em></label>
				<div class="col-sm-12">
				  <input type="text"  name="menu_text" value="<?=$edit['menu_text'];?>" class="form-control"  placeholder="Title" required="required">
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
				  <input type="text"  name="menu_order" value="<?=$edit['menu_order'];?>" class="form-control"  placeholder="Display Order" required="required">
				</div>
			  </div>
 				
    		
            
<br/> <br/> <br/>
 <div class="clearfix"></div> 
  <div class="form-group">
	<div class="col-sm-offset-2 col-sm-7">
	
	 <?php if($edit['cat_id']){?>
                      <input type="submit" class="btn btn-info" name="formSubmitted" value="Update" />
                      <input type="hidden" name="cat_id" value="<?=$edit['cat_id']?>" />&nbsp;                   
                      <input type="reset" class="btn btn-default" value="Reset" />&nbsp;
                      <input type="button" class="btn btn-warning" onclick="window.location.href='<?=$back_url?>'" value="Back"/> 
                      <?php }else{ ?>
                       <input type="submit" class="btn btn-info btn-lg btn-block" name="formSubmitted" value="Save" /> 
                      <? } ?>
	 
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
					   <?=getOptionImageCatagoryTree($db->get_post('parent'));?>
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
          	<th>Section Info</th>  

			<th nowrap="nowrap">Display Order</th>  			
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
          $images=getImages($ImageType,$cat_id);
          $section_arr=getAdminImageSectionPath($value['cat_id']);
          $cat_url=__section_url($value['seo_title'])
      	  
		 ?>
		  <tr class="<?=$class;?>">
            <td><?=($key+1)?></td>     
			<td style="text-align:left;">
               <b><?='<a href="#" title="click to view this section"  >'.$value['menu_text'].'</a>'?></b> 
               
            </td> 			
            <td style="text-align:left;"><?=$section_arr['menutext']?></td>
             
			<td style="text-align:left;"><?=$value['menu_order']?></td> 			
            <td  nowrap="nowrap">
	            <?php if($value['active']==1){?> 
	            	<a href="<?=SCRIPT_URL.$main_link?>action=inactive&<?=$primary_key.'='.$value[$primary_key]?>"><i class="fa fa-check-circle text-success" title="Click to Inactive"></i></a>&nbsp; 
				<?php	}else{ ?>
	            	<a href="<?=SCRIPT_URL.$main_link?>action=active&<?=$primary_key.'='.$value[$primary_key]?>"><i class="fa fa-circle text-danger" title="Click to active"></i></a>&nbsp; 
				<?php	} ?> 
	               &nbsp;
				<a href="<?=SCRIPT_URL.$main_link?>action=Delete&<?=$primary_key.'='.$value[$primary_key] ?>" onclick="return confirm('Are You Sure You want to delete?')"><i class="fa fa-trash" title="Delete"></i></a>
				 &nbsp;&nbsp;
			  	<a href="<?= SCRIPT_URL.$link.'page='.$pages['curr_page'] ?>&action=Edit&<?=$primary_key.'='.$value[$primary_key] ?>"><i class="fa fa-pencil-square-o text-info" title="Edit"></i></a>
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