<!--bof Pagination-->
<?php include(ADMIN_GET_TEMPLATE_DIRECTORY.'/templates/displaymessage.php'); ?>	
<!--bof Pagination-->

<!--eof Entry Panel-->
<a onclick="toggle();" class="btn btn-danger btn-sx pull-right btn-lg2 btn-block2"><i class="fa fa-plus-circle"></i> &nbsp; Add New <?=$PageTitle?> </a> 
<div style="display:<?=isset($edit[$primary_key])?"block":"none";?>" id="editdiv">
<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12">
		<div class="panel panel-info">
			<div class="panel-heading">
			  <h3 class="panel-title">Add/Edit <?=$PageTitle?></h3>
			</div>
			<div class="panel-body">  			
				<form method="post" action="" onsubmit="return checkSubmission(this);" enctype="multipart/form-data">
				<input type="hidden" name="postAction" value="true" />	

				<div class="form-group">
					<label class="col-sm-12 control-label">Parent<em>*</em></label>
					<div class="col-sm-4">
						<?=ShowSelectBoxPageTree($edit['parent']);?>
					</div>
					<label class="col-sm-12 control-label">Name<em>*</em></label>
					<div class="col-sm-4">
						<input type="text"  name="page_name" value="<?=$edit['page_name'];?>" class="form-control"  placeholder="page-name" required="required">//seo formate 
					</div>
				</div>
				<div class="form-group">
					<label for="inputEmail3" class="col-sm-12 control-label">Title<em>*</em></label>
					<div class="col-sm-12">
						<input type="text"  name="page_title" value="<?=$edit['page_title'];?>" class="form-control"  placeholder="Page Title" required="required">
					</div>
				</div>
				<div class="clearfix"></div>
				<div class="form-group">
					<label for="inputEmail3" class="col-sm-12 control-label">Sub Title<em>*</em></label>
					<div class="col-sm-12">
						<input type="text"  name="page_subtitle" value="<?=$edit['page_subtitle'];?>" class="form-control"  placeholder="Page Title" required="required">
					</div>
				</div>
				<div class="clearfix"></div>
				<div class="form-group">
					<label for="inputEmail3" class="col-sm-12 control-label">Browser Title<em>*</em></label>
					<div class="col-sm-12">
						<input type="text"  name="page_browser_title" value="<?=$edit['page_browser_title'];?>" class="form-control"  placeholder="Page Title" required="required">
					</div>
				</div>
				
				<div class="clearfix"></div>
				<div class="form-group">
					<label for="inputEmail3" class="col-sm-12 control-label">Content<em>*</em></label>
					<div class="col-sm-12">
						<textarea id="description" name="page_content"  rows="15" cols="80" style="width: 80%" class="tinymce" required><?=$edit['page_content']?>&nbsp;</textarea>       
					</div>
				</div>  
				<div class="clearfix"></div> 
				
				<div class="form-group">
					<label for="inputEmail3" class="col-sm-12 control-label">Show Ads<em>*</em></label>
					<div class="col-sm-12">
						 <?php  if(isset($edit)){?>
						<input type="checkbox" name="topbanner" value="1" <?=($edit['topbanner'])?'checked="checked"':""?> />&nbsp;Top Ad&nbsp;
						<input type="checkbox" name="middle_topbanner" value="1" <?=($edit['middle_topbanner'])?'checked="checked"':""?> />&nbsp;Ads bellow Title&nbsp;
						<input type="checkbox" name="middlebanner" value="1" <?=($edit['middlebanner'])?'checked="checked"':""?> />&nbsp;Ads in Content&nbsp;
						<input type="checkbox" name="rightbanner" value="1" <?=($edit['rightbanner'])?'checked="checked"':""?>/>&nbsp;Right Ad&nbsp; 
						<?php  }else{?>
						<input type="checkbox" name="topbanner" value="1" checked="checked" />&nbsp;Top Ad&nbsp;
						<input type="checkbox" name="middle_topbanner" value="1" checked="checked" />&nbsp;Ads bellow Title&nbsp;
						<input type="checkbox" name="middlebanner" value="1" checked="checked" />&nbsp;Ads in Content&nbsp;
						<input type="checkbox" name="rightbanner" value="1" checked="checked" />&nbsp;Right Ad&nbsp; 
						<?php }?>
					</div>
				</div>		
				<div class="clearfix"></div>
				
	
		
			<div class="row">
				<div class="col-xs-12 col-sm-6 col-md-6">
					<div class="panel panel-default">
						<div class="panel-heading">
						  <h3 class="panel-title">For SEO Meta Setttings</h3>
						</div>
						<div class="panel-body"> 
						<div class="clearfix"></div>
						<div class="form-group">
							<label for="inputEmail3" class="col-sm-12 control-label">Featured Image</label>
							<div class="col-sm-12">
								<input type="file"  name="fec_image" class="form-control2"  placeholder="Sample PDF/Image" >
							</div>
						</div>
						<div class="clearfix"></div>
						<div class="form-group">
							<label for="inputEmail3" class="col-sm-12 control-label">Banner Image</label>
							<div class="col-sm-12">
								<input type="file"  name="banner_image" class="form-control2"  placeholder="Sample PDF/Image" >
								<br/> Allowed Only 'jpg','jpeg','png','gif','pdf'
							</div>
						</div>
						<div class="clearfix"></div> 
						</div><!--/panel body-->
					</div><!--/panel-->		
					<div class="clearfix"></div> 
				</div>
				<div class="col-xs-12 col-sm-6 col-md-6">
					<div class="panel panel-default">
						<div class="panel-heading">
						  <h3 class="panel-title">For SEO Meta Setttings</h3>
						</div>
						<div class="panel-body"> 
							<div class="form-group">
								<label for="inputEmail3" class="col-sm-12 control-label">Meta Key</label>
								<div class="col-sm-12">
									<input type="text"  name="meta_kw" value="<?=$edit['meta_kw'];?>" class="form-control"  placeholder="Meta Keywords" required="required">
								</div>
							</div>
							<div class="clearfix"></div>
							<div class="form-group">
								<label for="inputEmail3" class="col-sm-12 control-label">Meta Descriptions</label>
								<div class="col-sm-12">
									<input type="text"  name="meta_desc" value="<?=$edit['meta_desc'];?>" class="form-control"  placeholder="Meta Descriptions" required="required">
								</div>
							</div>
						</div><!--/panel body-->
					</div><!--/panel-->					
				</div>	
			</div>	
			<div class="clearfix"></div>
				
						
				<div class="form-group">
					<label for="inputEmail3" class="col-sm-12 control-label">Open Date<em>*</em></label>
					<div class="col-sm-12">
						<input type="text"  name="open_date" value="<?=$edit['open_date'];?>" id="datepicker"  class="datetimepicker form-control"   size="40" required="required">
					</div>
				</div>	
				<div class="clearfix"></div>
				<div class="form-group">
					<div class="col-sm-offset-1 col-sm-7">
						<?php if($edit['page_id']){?>
						<input type="submit" class="btn btn-info" name="formSubmitted" value="Update" />
						<input type="hidden" name="page_id" value="<?=$edit['page_id']?>" />&nbsp;                 
						<input type="reset" class="btn btn-default" value="Reset" />&nbsp;
						<input type="button" class="btn btn-warning" onclick="window.location.href='<?=$back_url?>'" value="Cancle"/> 
						<?php }else{ ?>
						<input type="submit" class="btn btn-info" name="formSubmitted" value="Save" /> 
						<? } ?>
					</div>
				</div>			 
				</form><!--/Form-->	 

			</div><!--panel-body-->
		  </div>
		</div>
	 </div><!--row-->
	<div class="clearfix"></div> 
</div>
<!--eof Entry Panel-->






<!--bof Listing-->	
<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12">
		<div class="panel panel-success">
			<div class="panel-heading">
			  <h3 class="panel-title"><i class="fa fa-th-list"></i> List of <?=$PageTitle?></h3>
			</div>
			<div class="panel-body"> 
			
<table class="table table-bordered">
<thead>
<tr>
<th>
<!--bof search Panel-->	  
<?php $sq=($q)?$q:"Search by ID or Name";?>
<form class="form-inline" method="get" onsubmit="return checkSearch(this)">
	<div class="form-group">
		<label class="sr-only" for="exampleInputAmount">Search</label>
		<div class="input-group">
			<div class="input-group-addon">Search</div>
			<input type="text" class="form-control" name="q" value="<?=$sq?>"   placeholder="<?=$sq?>" width="80%">
		</div>
	</div>
	<button type="submit" class="btn btn-info">GO</button>
</form>
<!--eof search Panel-->	 
</th>
<th>
<form action="" method="get">   
	<div class="form-group">
		<label for="inputEmail3" class="col-sm-3 control-label">Filter by</label>
		<div class="col-sm-8">
			<select name="parent" class="form-control" id="type" onchange="submit(this);"   >
				<option value=""> Choose Parent Pages </option> 
				  <?php
					 $pages = getPages(0);
					 if($pages){
					   foreach($pages as $value){
						if($db->get_post('parent')==$value['page_id']) $select = 'selected="selected"';  else $select = ''; 
						 echo '<option value="'.$value['page_id'].'" '.$select.'>'.$value['page_title'].'</option>';
					   }	
					 }
				  ?>
			  </select>
		</div>
	</div>	
</form> 
</th>
</tr>
</thead>
</table>			

  
<div class="clearfix"></div>

	  <form action="" method="post" onsubmit="return check_action()">
        <input type="hidden" value="true" name="allSubmitted"/>
       <table cellpadding="1" cellspacing="1" class="table table-bordered">
        <thead class="thead">
          <tr>
          	<th><input type="checkbox"  id="checkuncheckall"  onclick="check_uncheck_all(<?=($rows)?count($rows): 0 ?>)"/></th>
            <th width="20">ID#</th>        
          	<th>Parent</th>                        
          	<th>Page Name</th>                        
          	<th>Page Title</th>
			<th>Order </th>                       
            <th>Action</th>
          </tr>
        </thead>
        <tbody class="tbody">
          <?php 
		if($rows){
		  $main_link='siteadminpanel/pageManager';
		  $i=0;
		  foreach($rows as $key => $value){		  	
		  $class=(($i%2)==0)?'col':'col1';
		 ?>
		  <tr class="<?=$class;?>">
		  <td><input type="checkbox" name="ids[]" id="checksingle<?=$key?>" value="<?= $value['page_id'] ?>" /></td>
            
            <td><?=$value['page_id']?></td>         
            <td style="text-align:left;"><?=getPageName($value['parent']);?></td>            
            <td style="text-align:left;"><?=$value['page_name']?><br/> <b>Viewed: <?=$value['viewed']?></b></td>            
            <td style="text-align:left;"><?=$value['page_title']?><br/>
			<?php if($value['header_image']){ ?>
				<a href="<?=WWW_RESOURCE_STORE.'header_images/'.$value['header_image']?>" target="_blank"> <b>Image:</b><?=$value['header_image'];?> </a>
				<?php } ?>
			</td>            
            <td><?=$value['short'];?></td>          
            <td>
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
            <td colspan="7">No result found.</td>
          </tr>
          <?php
          }
		  ?>
        </tbody>
         <tfoot class="tfoot">
          <tr>
		  <td colspan="2" align="right"> 
                <select name="action" class="form-control" id="p_action">
	                <option value="" selected="selected">Select Action</option>
                    <optgroup label="Approve Pending Delete">
    	                <option value="approve" <?php if($db->post('action')=='approve'){ ?> selected="selected" <?php } ?>>Make Approve</option>
    	                <option value="pending" <?php if($db->post('action')=='pending'){ ?> selected="selected" <?php } ?>>Make Pending</option>
    	                
    	                <option value="delete" <?php if($db->post('action')=='delete'){ ?> selected="selected" <?php } ?>>Make Delete</option>
    	            </optgroup> 
	              </select>
          </td>
		  <td colspan="10" align="right">
            <input type="button" value="Check all" name="" class="btn btn-info" onclick="check_all(<?=($rows)?count($rows): 0 ?>)"/> 
            <input type="button" value="Uncheck" name="" class="btn btn-info" onclick="uncheck_all(<?=($rows)?count($rows): 0 ?>)" /> 
            <input type="submit" value="Submit" name="" class="btn btn-info"/>

           </td>
          </tr>
        </tfoot>
      </table>
</form>
<div class="clearfix"></div>
<!--bof Pagination-->
<?php include(ADMIN_GET_TEMPLATE_DIRECTORY.'/templates/pagination_raw.php'); ?>	
<!--bof Pagination-->
<div class="clearfix"></div>
   
		</div><!--panel-body-->
	  </div>
	</div>
 </div><!--row-->
 
 
