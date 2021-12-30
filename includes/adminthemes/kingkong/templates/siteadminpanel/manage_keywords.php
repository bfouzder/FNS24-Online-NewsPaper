<div class="clearfix"></div> 
<?php include(TEMPLATE_STORE.'displaymessage.php');?>
<a onclick="jQuery('#editdiv').toggle();" class="btn btn-danger pull-right"><i class="fa fa-plus-circle"></i> &nbsp; Add New keyword </a> 
<div style="display:<?=isset($edit[$primary_key])?"block":isset($_GET['actionid'])=='add'?"block":"none";?>" id="editdiv">
<!--bof Entry Form-->
<?php
$panel_title="Add New keyword";
if($edit){ 
$panel_title="Update keyword";
} 
?> 
 
<div class="row">
 <div class="col-md-12 col-sm-12 col-xs-12">
	<div class="x_panel">
	  <div class="x_title">
		<h2><?=$panel_title?></h2>                    
		<div class="clearfix"></div>
	  </div>
	  <div class="x_content">
		<br />
        <?php require(ADMIN_TEMPLATE_STORE.'displaymessage.php'); ?>
        <form id="demo-form2" class="form-horizontal form-label-left" method="POST"  enctype="multipart/form-data">
        <input type="hidden" name="formSubmitted" value="1" >
       <?php if($edit['keyword_id']){?>
			<input type="hidden" name="keyword_id" value="<?=$edit['keyword_id']?>" />&nbsp;                   
               <? } ?>    
    
        <div class="row">	
            <div class="col-md-8 col-sm-9 col-xs-12">	         
                <div class="panel panel-default2">        
                    <div class="panel-body">
                  
                        <!--<div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Parent<em>*</em></label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                        <?php
                        $parent=($edit['parent'])?$edit['parent']:$parent;
                        ?>
                        <?//=ShowSelectBoxQuotekeywordTree($parent);?>
                        </div>
                        </div>-->

    	                  
                        <div class="form-group">
                			<label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Title:<em>*</em></label>
                			<div class="col-md-9 col-sm-9 col-xs-12">
                		      	 <input type="text" name="keyword_name" value="<?= $edit['keyword_name'] ?>" required="" class="form-control col-md-7 col-xs-12">
                			</div>
                		</div>
                          
                          
            		
                       
                         <?php if($edit['seo_title']){?>
                         <div class="form-group">
                			<label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Nice Name:<em>*</em></label>
                			<div class="col-md-9 col-sm-9 col-xs-12">
                		      	 <input type="text" name="seo_title" value="<?= $edit['seo_title'] ?>" required="" class="form-control col-md-7 col-xs-12">
                			</div>
                		</div>
            			  <?php } ?>
            			  
                           <div class="form-group">
                			<label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Display Order:<em>*</em></label>
                			<div class="col-md-9 col-sm-9 col-xs-12">
                		      	 <input type="text" name="menu_order" value="<?= $edit['menu_order'] ?>" required="" class="form-control col-md-7 col-xs-12">
                			</div>
                		</div>
                 
                    </div><!--/panel-body-->
                </div><!--/panel-->	      
            </div>	
            <div class="col-md-4 col-sm-9 col-xs-12">       
                <?php 
                $avatar_image_src=($edit['avatar'])?IMAGE_URL.'keywords/medium_'.$edit['avatar']:GET_TEMPLATE_DIRECTORY_URI.'/images/blank_author.png';
                ?>
                
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Avater</h3>
                    </div>
                   <div class="panel-body">
                    <div class="file-upload-block clearfix">
                        <div class="profile-preview" id="profile_preview"><img src="<?php echo $avatar_image_src; ?>" id="img_preview" alt="profile preview" width="210"></div>
                        <div class="form-group">
                            <input  id="uploadFile" class="form-disable" disabled="disabled"/>
                            <div class="fileUpload btn btn-primary btn-sm">
                                <span  id="uploadBtnSpan">Browse</span>
                                <input id="uploadBtn" type="file" name="avatar" class="upload"/>
                            </div>
                        </div>
                        <p>Allowed extention <b>jpg, jpeg, png</b></p>
                     </div>   
                </div><!--/panel-body-->
                </div><!--/panel-->	
        
            </div><!--/col3-->	
        </div><!--/row--> 
                           
		
            <div class="form-group submit_sec">
			<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
			    <button type="submit" class="btn btn-success">Submit</button>
				  <button type="reset" class="btn btn-primary">Reset</button>
				  <a class="btn btn-danger" href="<?=$back_url?>">Cancel</a>
			</div>
		  </div>
		</form>
        
        </div> <!--x_content-->
        
	  </div>
	</div>
  </div>
  
</div>


<?php if($_GET['actionid']!='add'){ ?>
<!--Listing-->	
    <div class="page-title">
              <div class="title_left">
                <h3>Manage keyword <small>keyword Manager</small></h3>
              </div>
              <div class="title_right">              
        <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
		<?php $sq=($q)?$q:"Search here";?>
        <form method="get" onsubmit="return checkSearch(this)">
	     <div class="input-group">
            <input type="text" name="q" value="<?=$q?>"  class="form-control" placeholder="<?=$sq?>">
            <span class="input-group-btn">
              <button class="btn btn-default" type="submit">Go!</button>
            </span>
          </div>
		 </form>		 
        </div>
      </div>
    </div>

            <div class="clearfix"></div>             
<!--bof topBAR-->
<table class="table table-bordered"  width="50%" bgcolor="#fff">
	<thead>
		<tr>
			<th bgcolor="#fff" style="border-right:none" valign="top">
            <form action="" method="get"> <select name="parent" class="form-control" id="type" onchange="submit(this);"   >
				     <option value="">Select Category</option> 
					   <?//=getOptionkeywordsTree($db->get_post('parent'));?>
				  </select></form> </th>                  
            <th bgcolor="#fff" style="border-left:none;border-right:none;" valign="top">
            	<a href="<?=SCRIPT_URL.'siteadminpanel/managekeywords/'?>?view=featured">
            	<button type="button" class="btn btn-warning pull-right"style="margin-bottom:0"><i class="fa fa-bullseye" aria-hidden="true"></i>Featured keywords </button></a>
            </th>   
            <th bgcolor="#fff" style="border-left:none" valign="top">
            	<a href="<?=SCRIPT_URL.'siteadminpanel/managekeywords/'?>">
            	<button type="button" class="btn btn-default pull-right"style="margin-bottom:0"><i class="fa fa-refresh" aria-hidden="true"></i> Show All </button></a>
            </th>              
        </tr>
    </thead>
</table>
<!--eof topBAR-->     
      
<!--eof search Panel--> 
<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12">
		<div class="panel panel-success">
			<div class="panel-heading">
			  <h3 class="panel-title">Manage keyword</h3>
			</div>
			<div class="panel-body">
       <table cellpadding="1" cellspacing="1" class="table"> 
        <thead class="thead">
          <tr>
          	<th width="20">ID#</th>        
          	<th nowrap="nowrap">Name</th>
			<th nowrap="nowrap">Display Order</th>  
			<th nowrap="nowrap">Avatar</th>  
        	<th nowrap="nowrap">Status</th>  			
        	<th nowrap="nowrap">Fec</th>  			
            <th>Action</th>
          </tr>
        </thead>
        <tbody class="tbody">
          <?php 
		if($rows){
		  $i=0;
		  foreach($rows as $key => $value){		  	
	
    	  $class=(($i%2)==0)?'default':'warning';
          $keyword_id=$value['keyword_id'];
         // $keyword_path=getkeywordPath($value['keyword_id']);
          $keyword_name=$value['keyword_name'];
          $keyword_url=__keyword_url($value['seo_title']);
      	  
		 ?>
		  <tr class="<?=$class;?>">
            <td><?=($key+1)?></td>     
						
            <td style="text-align:left;"><a href="<?=$keyword_url?>" target="_blank"><?=$keyword_name?></a></td>
        	<td style="text-align:left;"><?=$value['menu_order']?></td> 
            <td style="text-align:left;">
            <?php if($value['avatar']){ 
                //echo IMAGE_URL.$table_name.'/thumb_'.$value['avatar'];
                echo '<img src="'.IMAGE_URL.$table_name.'/thumb_'.$value['avatar'].'" alt="'.$value['avatar'].'" width="80">';
            }
            ?>
            
            </td> 	
            <td>
            	<?php if( $value['status'] == 1){ ?>
            	<a href="<?=$main_link?>action=inactive&<?=$primary_key.'='.$value[$primary_key]?>" title="Disapprove User" class="label label-success"><i class="fa fa-check" aria-hidden="true"></i> Approved</a>
            	<?php }else{ ?>
            	<a href="<?=$main_link?>action=active&<?=$primary_key.'='.$value[$primary_key]?>" title="Approve User"  class="label label-default"><i class="fa fa-circle" aria-hidden="true"></i> Pending</a>
            	<?php } ?>
            </td>
            <td width="7%"> 
				<?php if($value['featured']==1){?> 
				<a href="<?= $main_link?>&action=unfeatured&<?=$primary_key.'='.$value[$primary_key]?>" class="btn btn-warning btn-xs" title="Remove featured"  /><i class="fa fa-bullseye" aria-hidden="true"></i> Featured</a> 
				<?php	}else{ ?>
				<a href="<?= $main_link?>&action=featured&<?=$primary_key.'='.$value[$primary_key]?>" class="btn btn-default btn-xs">Make Featured</a>
				<?php	} ?>     
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
<?php } ?>


<script type="text/javascript">
  
  function change_field(author_type){
jQuery('.author_type').hide();
jQuery('#'+author_type).show();
  }
 <?php if( $edit['author_type']) { ?>  
   change_field('<?=$edit['author_type']?>');
  <?php } ?>   
    document.getElementById("uploadBtnSpan").onclick = function() {
         $('#uploadBtn').click(); 
    }
    document.getElementById("profile_preview").onclick = function() {
	    $('#uploadBtn').click();
    };
	
    document.getElementById("uploadBtn").onchange = function () {
	    document.getElementById("uploadFile").value = this.value;
        readURL(this);
    };
	
	function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                /*
                $('#img_preview')
                    .attr('src', e.target.result)
                    .width(154)
                    .height(174);
                  */
                    $('#img_preview')
                    .attr('src', e.target.result)
                    .width(250);  
                    
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
<style>
#ui-datepicker-div{display:block;}
.fileUpload input.upload {
    position: absolute;
    top: -1px;
    right: 0;
    margin: 0;
    padding: 0;
    cursor: pointer;
    opacity: 0;
    filter: alpha(opacity=0);
}
input[type="file"] {
    display: block;
}
</style>