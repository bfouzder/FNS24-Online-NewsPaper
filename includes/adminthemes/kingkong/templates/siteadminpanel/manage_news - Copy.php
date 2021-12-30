
<?php 
   $resultCategory=$db->select("SELECT * FROM bn_bas_category WHERE Deletable=1 ORDER BY Priority");
	$resultSpecCat=$db->select("SELECT Specialcat_id, SpecialCategoryName FROM bn_bas_specialcategory ORDER BY Specialcat_id");
	$resultDisticts=$db->select("SELECT DistrictID, DistrictName, DistrictNameBN FROM bas_district ORDER BY DistrictName"); 
 //pre($edit);
?>

<!-- TinyMCE -->
<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
<script>//tinymce.init({  selector: '#description' /* selector:'textarea'*/ });
tinymce.init({
  selector: 'textarea',
  height: 400,
  theme: 'modern',
  plugins: [
    'advlist autolink lists link image charmap print preview hr anchor pagebreak',
    'searchreplace wordcount visualblocks visualchars code fullscreen',
    'insertdatetime media nonbreaking save table contextmenu directionality',
    'emoticons template paste textcolor colorpicker textpattern imagetools','image'
  ],
  menubar: "false" , 
  toolbar1: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
  toolbar2: 'print preview media | forecolor backcolor emoticons',
  image_advtab: true,
  templates: [
    { title: 'Test template 1', content: 'Test 1' },
    { title: 'Test template 2', content: 'Test 2' }
  ],
  content_css: [
    '//fast.fonts.net/cssapi/e6dc9b99-64fe-4292-ad98-6974f93cd2a2.css',
    '//www.tinymce.com/css/codepen.min.css'
  ]
 });
</script>
<!-- /TinyMCE -->
<!--bofof Data entry Form--->
<?php
//pre($edit);
 if($db->get('doaction')=='add'){
$panel_title="Add News";
?>
<div class="row" id="add_edit_block"  style="display:block">
<?php }elseif($edit){ 
$panel_title="Update News";
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
		<form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="POST" enctype="multipart/form-data" >
		 <input type="hidden" name="formSubmitted" value="1" >
		 <?php if($edit){ ?>
		 <input type="hidden" name="<?=$primaryKey?>" value="<?=$edit[$primaryKey]?>" >
		 <?php } ?>

		
<div class="panel panel-success">
	<div class="panel-heading">
	  <h3 class="panel-title">News Cat, Type & Source/Reporter Panel </h3>
	</div>
	<div class="panel-body">
		<div class="form-group">
    		<label class="control-label col-md-2 col-sm-3 col-xs-12" for="name">Category:<em>*</em></label>
    		<div class="col-md-9 col-sm-9 col-xs-12">
    		  <select name="cat_id" class="form-control" id="cat_id" onchange="checkcat(this.value);"   >
    					     <option value="">Select Category</option> 
    					      <?=__getNewsCatOptions($edit['cat_id']);?>
    				  	</select>
    		</div>
		</div>
        <?php 
        $display_attr=($edit['DistrictID'])?'block':'none';
        ?>
		<div class="form-group" id="section_DistrictID" style="display: <?=$display_attr?>;">
			<label class="control-label col-md-2 col-sm-3 col-xs-12" for="name">District: </label>
			<div class="col-md-9 col-sm-9 col-xs-12">
			<select name="DistrictID" id="DistrictID" class="form-control">
			<option value="">--Select--</option>
			<?php foreach($resultDisticts as  $rsDistict){

				$sel=($edit['DistrictID']==$rsDistict["DistrictID"])?' selected="selected"':'';
			?>
				<option value="<?php echo $rsDistict["DistrictID"]; ?>"<?=$sel?>><?php echo  $rsDistict["DistrictName"].'('.$rsDistict['DistrictNameBN'].')'; ?></option>
			<?php } ?>
			</select>
			</div>
		</div>
		
		<div class="form-group">
		<label class="control-label col-md-2 col-sm-3 col-xs-12" for="name">Title:<em>*</em></label>
		<div class="col-md-9 col-sm-9 col-xs-12">
		  <input type="text" name="news_title" required="required" value="<?=$edit['news_title']?>" class="form-control col-md-7 col-xs-12">
		</div>
		</div>
		<div class="form-group">
		<label class="control-label col-md-2 col-sm-3 col-xs-12" for="name">Sub Title:</label>
		<div class="col-md-9 col-sm-9 col-xs-12">
		  <input type="text" name="news_subheading"  value="<?=$edit['news_subheading']?>" class="form-control col-md-7 col-xs-12">
		</div>
		</div>	
        	<div class="form-group">
		<label class="control-label col-md-2 col-sm-3 col-xs-12" for="name">Writer:<em>*</em></label>
		<div class="col-md-9 col-sm-9 col-xs-12">
		  <input type="text" name="Writers" required="required" value="<?=$edit['Writers']?>" class="form-control col-md-7 col-xs-12">
		</div>
		</div>
        
		<div class="form-group">
		<label class="control-label col-md-2 col-sm-3 col-xs-12" for="name">Content:<em>*</em></label>
		<div class="col-md-9 col-sm-9 col-xs-12">
		  <textarea name="news_details" class="form-control"><?=$edit['news_details']?></textarea>
		</div>
		</div>
        

	</div><!--/panel-body-->
</div><!--/panel-->	
<div class="panel panel-info">
	<div class="panel-heading">
	<h3 class="panel-title">Set Attributes</h3>
	</div>
	<div class="panel-body">	
<?php 
$top_news=array(
'4'=> 'Top 4 News', 
'3'=> 'Top 3 News(Under Slider)',
'2'=> 'Top 2 News(Beside slider)',
'6'=> 'Footer News',
);

?>    	
	<div class="row">	
    	<div class="col-md-8 col-sm-8 col-xs-12">
        		<div class="form-group">
            		<label class="control-label col-md-2 col-sm-3 col-xs-12" for="name">Display On:</label>
            		<div class="col-md-9 col-sm-9 col-xs-12">
        				<select name="top_news" class="form-control">
        					<option value="" selected="selected">NONE</option>
        					<?php foreach ($top_news as $i=>$p_title){  
        					$sel=($edit['top_news']==$i)?' selected="selected"':'';
        					echo '<option value="'.$i.'"'.$sel.'>'.$p_title.'</option>'."\n";
        					}
        					?>
        				</select>
            		</div>
        		</div>                      
               
                <div class="form-group">
                  <label>Slide</label>
                  &nbsp;&nbsp;&nbsp;&nbsp;
                  <input type="radio" name="slider_news" value="1"<?= ($edit['slider_news']==1)?' checked="checked"':'';?>/>&nbsp;Yes&nbsp;&nbsp;
                  <input type="radio" name="slider_news" value="0"<?= ($edit['slider_news']==0)?' checked="checked"':'';?>/> &nbsp;No
                </div>                        
                
                <div class="form-group">
                  <label>Breaking/Taza News</label>
                  &nbsp;&nbsp;&nbsp;&nbsp;
                  <input type="radio" name="breaking" value="1"<?= ($edit['breaking']==1)?' checked="checked"':'';?>>&nbsp;Yes&nbsp;&nbsp;
                  <input type="radio" name="breaking" value="0"<?= ($edit['breaking']==0)?' checked="checked"':'';?>>&nbsp;No
                </div>
                 <div class="form-group">
                  <label>Sotlight News</label>
                  &nbsp;&nbsp;&nbsp;&nbsp;
                  <input type="radio" name="spot_light" value="1" <?= ($edit['spot_light']==1)?' checked="checked"':'';?>>&nbsp;Yes&nbsp;&nbsp;
                  <input type="radio" name="spot_light" value="0" <?= ($edit['spot_light']==0)?' checked="checked"':'';?>>&nbsp;No
                </div>
                 
        		
        	
        		<div class="form-group">
            		<label class="control-label col-md-2 col-sm-3 col-xs-12" for="name">Footer News:</label>
            		<div class="col-md-9 col-sm-9 col-xs-12">
        				<select name="footer_news" class="form-control">
        					<option value="" selected="selected">NONE</option>
        					<?php for ($i=1; $i<=5; $i++){  
        					$sel=($edit['footer_news']==$i)?' selected="selected"':'';
        					echo '<option value="'.$i.'"'.$sel.'>Position '.$i.'</option>'."\n";
        					}
        					?>
        				</select>
            		</div>
        		</div>
        </div>	
    	<div class="col-md-4 col-sm-4 col-xs-12">
        	<div class="form-group">
    		<label class="control-label col-md-2 col-sm-3 col-xs-12" for="name">Image</label>
    		<div class="col-md-9 col-sm-9 col-xs-12">
    	       	<input type="file" name="image_url">
    		</div>
    		<div class="col-md-12 col-sm-12 col-xs-12" id="imgPreview">
            		 <?php 
                     //pre($edit);
            		 if($edit){
            			$image_url=getNewsFecImageURL($edit);
            			if($image_url){
            			 	echo '<img src="'.$image_url.'" class="img-thumbnail" alt="img"/>';
            			}
            		
            		  } 
            		  ?>
        		</div>
    		</div>
        </div>		
	</div>
	
		  
	</div><!--/panel-body-->
</div><!--/panel-->	
<div class="panel panel-warning">
	<div class="panel-heading">
	<h3 class="panel-title">Meta Info</h3>
	</div>
	<div class="panel-body">
	
		<div class="form-group">
			<label class="control-label col-md-2 col-sm-3 col-xs-12" for="name">News Tags:</label>
			<div class="col-md-9 col-sm-9 col-xs-12">
			  <input type="text" name="news_tag" value="<?= $edit['news_tag'] ?>" class="form-control col-md-7 col-xs-12">
			 
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-md-2 col-sm-3 col-xs-12" for="name">Meta data:</label>
			<div class="col-md-9 col-sm-9 col-xs-12">
			  <input type="text" name="meta_kw" value="<?= $edit['meta_desc'] ?>"  class="form-control col-md-7 col-xs-12">
			</div>
		</div>
		
	</div><!--/panel-body-->
</div><!--/panel-->	
	
		  
		  <div class="form-group submit_sec">
			<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
			    <button type="submit" name="submit" class="btn btn-success">Submit</button>
				  <button type="button" class="btn btn-primary">Reset</button>
				  <a class="btn btn-danger" href="<?=SCRIPT_URL.$redirect_url?>">Cancel</a>
			</div>
		  </div>
		</form>
	  </div>
	</div>
  </div>
</div>

<!--/eof Data entry Form--->



<!--Listing-->	
<?php 

if(!$doaction):
?>
<a href="<?=SCRIPT_URL?>/siteadminpanel/manageNews/?doaction=add" class="btn btn-success"><i class="fa fa-pdf"></i>Add News</a>
<?php endif?>


<?php $edit=($db->get('doaction')=='add')?true:$edit;?>        
 
<div class="row" id="add_edit_block_list" <?=($edit)?' style="display:none"':' style="display:block"';?>>

	<div class="col-xs-12 col-sm-12 col-md-12">	           
            
    <div class="x_panel">
	  <div class="x_title">
		<h2><i class="fa fa-th-list"></i> News</h2>                    
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
            <th><form action="" method="get"> 
            		<select name="catID" class="form-control" id="CategoryName" onchange="submit(this);"   >
					     <option value="">Filter by Category</option> 
					      <?=__getNewsCatOptions($db->get_post('catID'));?>
				  	</select>
				</form> 
			</th>
            </tr>
        </thead>
    </table>
</div><!--table Responsive-->
<div class="clear"></div>
<!--eof topBAR-->     
      
<!--bof Listing---------------------------->	
<form action="" method="post"  class="form-inline"  onsubmit="return check_action()">
 <input type="hidden" value="true" name="formSubmittedROWS"/>	 
  
 <div class="table-responsive">
 <table class="table table-bordered">
	<thead>
        <thead class="thead">
          <tr>
          	<th width="5%"><input type="checkbox" id="check_uncheck_top" value="all" onclick="__checkAll(<?= $rows?count($rows): 0 ?>,'check_uncheck_top')" /></th>
          	
            <th width="5%">ID</th>
          	<th>Title</th>           
            <th>Status</th>
            <th>Action</th>
             </tr>
        </thead>
        <tbody class="tbody">
        <?php if($rows): ?> 
        
        <?php foreach($rows as $key => $value):
            
            $class=(($i%2)==0)?'col':'col1';
            #set action_urls
                $action_id=$value[$primaryKey];
                $active_url=SCRIPT_URL.$redirect_url.'?action_id='.$action_id.'&action=disapprove';
                $inactive_url=SCRIPT_URL.$redirect_url.'?action_id='.$action_id.'&action=approve';
                $edit_url=SCRIPT_URL.$redirect_url.'?action_id='.$action_id.'&action=edit';
                $del_url=SCRIPT_URL.$redirect_url.'?action_id='.$action_id.'&action=delete';
        $news_article_info=$value;
		
               $news_article_url= __bn_getArticleURL($news_article_info);	
		      //pre($value);
	        
            
        ?>
         
         
            <tr class="<?=$class;?>" >
                <td><input type="checkbox" name="action_ids[]" id="checksingle<?php echo $key; ?>" value="<?=$action_id?>" /></td>
                <td><?= $value[$primaryKey]; ?></td>
                <td><?= $value['news_title']; ?></td>
                
                
                <td class="action_active_inactive">
                    <?php if( $value['status'] == 1){ ?>
                        <a href="<?=$active_url?>" class="label label-success"><i class="fa fa-check" aria-hidden="true"></i> Approved</a>
                    <?php }else{ ?>
                    <a href="<?=$inactive_url?>"   class="label label-warning"><i class="fa fa-circle" aria-hidden="true"></i> Pending</a>	
                    <?php } ?> 
                </td>      
                <td  class="action_edit_delete">
                    <a href="<?=$edit_url?>" title="Edit" class="btn btn-default btn-xs"><i class="fa fa-pencil-square-o"> EDIT</i></a>
                    &nbsp;
					      <a href="<?=$news_article_url?>" title="View" class="btn btn-info btn-xs" target="_blank"><i class="fa fa-eye"> View</i> </a>
                    &nbsp;
                    <a href="<?=$del_url?>" title="Delete" onclick="return confirm('Are You Sure You want to delete?')" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"> DEL</i> </a>
                </td>
            </tr>
            
            <?php endforeach; ?>
            <?php else: ?>
            <tr class="col"><td colspan="8">No Result Found.</td></tr>
            <?php endif; ?>
          
        </tbody>  
        <tfoot class="tfoot">
          <tr>
		     <td align="left"><input type="checkbox" id="check_uncheck_bottom" value="all" onclick="__checkAll(<?= $rows?count($rows): 0 ?>,'check_uncheck_bottom')" /></td>
         	 <td align="left">
					<div class="form-group">
						<select name="action" class="form-control" id="p_action">
							<option value="" selected="selected">Select Action</option>
							<option value="approve" <?php if($db->post('action')=='approve'){ ?> selected="selected" <?php } ?>>Approve</option>
							<option value="disapprove" <?php if($db->post('action')=='disapprove'){ ?> selected="selected" <?php } ?>>disapprove</option>
							<option value="delete" <?php if($db->post('action')=='delete'){ ?> selected="selected" <?php } ?>>Delete</option>
						</select>
					</div>
              </td>
              <td align="left">      
					<input type="submit" value="Submit" name="" class="btn btn-success"  style="margin-top:2px;"/>
				
             </td>
          </tr>
         </tfoot>  
      </table>
</div><!--table Responsive-->
</form>
    
<?php include(TEMPLATE_STORE.'pagination_raw.php');?>
<!--/eof Listing---------------------------->


			</div><!--/end panel-body-->
	  </div>
	</div>
</div><!--/end row-->
<script>
function checkcat(catID){
    if(catID ==14){
        $('#section_DistrictID').show();
        $('#DistrictID').attr('required', 'required');
    }else{
        $('#section_DistrictID').hide();
      $('#DistrictID').removeAttr('required');   
    }
	return false;
}
</script>
<?php 
	function __getNewsCatOptions($parentID=false){
		global $db;
		$types=$db->select("SELECT * FROM bn_bas_category WHERE parent=0");
		foreach($types as $type){
			$sel = ($type['CategoryID'] == $parentID)? 'selected="selected"':'';
			$option.='<option value="'.$type['CategoryID'].'"'.$sel.'>'.$type['CategoryName'].'</option>';
		}
		return $option;
	}
?>