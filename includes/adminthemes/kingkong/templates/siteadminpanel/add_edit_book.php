<?php
$table_name='books';
$primary_key='book_id';
$page = $db->get_post('page');
$redirect_url ="siteadminpanel/manageBooks/";
$link ="siteadminpanel/manageBooks/?";
$book_id=$db->get('id');
	   $error="";
if($db->post('formSubmitted'))
	{

       
	   	$title= $db->db_prepare_input($db->post('title'));
		if(!$title){
		  $error ="Enter title";
		 }elseif(!$book_id){
		      if(getBookInfoByName($title)){
		         $error ="This Occation already exist";  
		      }
          
		 }
            
	     if(!$error){
             if(isset($_FILES['avatar']['name']) && !empty($_FILES['avatar']['name'])){
                $_POST['avatar']=upload_avater($image_type=$table_name);
             }             
		      $id=$db->bindPOST($table_name , $primary_key);
              redirect($redirect_url);
		  }
	}	


if($db->get('id')){
$id=$book_id;
$edit = $db->getRowArray($table_name , array($primary_key=>$book_id));
//pre($edit);
}
?>
<div class="row" id="add_edit_block"  style="display:block">
<?php
$panel_title="Add New Book";
if($edit){ 
$panel_title="Update Book";
} 
?> 
 <div class="col-md-12 col-sm-12 col-xs-12">
	<div class="x_panel">
	  <div class="x_title">
		<h2><?=$panel_title?></h2>                    
		<div class="clearfix"></div>
	  </div>
	  <div class="x_content">
		<br />
        <?php require(ADMIN_TEMPLATE_STORE.'displaymessage.php'); ?>
		<form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="POST" enctype="multipart/form-data">
		 <input type="hidden" name="formSubmitted" value="1" >
		 <?php if($edit){ ?>
		 <input type="hidden" name="<?=$primary_key?>" value="<?=$edit[$primary_key]?>" >
		 <?php } ?>
         
    <div class="row">	
        <div class="col-md-8 col-sm-9 col-xs-12">	
            <div class="panel  panel-default2">
                <div class="panel-body">
      		
            		<div class="form-group">
            			<label class="control-label col-md-2 col-sm-3 col-xs-12" for="name">Title:</label>
            			<div class="col-md-9 col-sm-9 col-xs-12">
            		      	 <input type="text" name="title" value="<?= $edit['title'] ?>" required="" class="form-control col-md-7 col-xs-12">
            			</div>
            		</div>
                    <div class="form-group">
            			<label class="control-label col-md-2 col-sm-3 col-xs-12" for="name">Author:</label>
            			<div class="col-md-9 col-sm-9 col-xs-12">
            		      	 <input type="text" name="book_author" value="<?= $edit['book_author'] ?>" class="form-control col-md-7 col-xs-12">
            			</div>
            		</div>
                    <div class="form-group">
            			<label class="control-label col-md-2 col-sm-3 col-xs-12" for="name">ISBN:</label>
            			<div class="col-md-9 col-sm-9 col-xs-12">
            		      	 <input type="text" name="isbn_no" value="<?= $edit['isbn_no'] ?>" class="form-control col-md-7 col-xs-12">
            			</div>
            		</div>
                    <div class="form-group">
            			<label class="control-label col-md-2 col-sm-3 col-xs-12" for="name">Type:</label>
            			<div class="col-md-9 col-sm-9 col-xs-12">
            		      	 <input type="text" name="book_type" value="<?= $edit['book_type'] ?>" class="form-control col-md-7 col-xs-12">
            			</div>
            		</div>
                     <div class="form-group">
            			<label class="control-label col-md-2 col-sm-3 col-xs-12" for="name">Release Date:</label>
            			<div class="col-md-9 col-sm-9 col-xs-12">
            		      	 <input type="text" id="single_cal2" name="book_release_date" value="<?= $edit['book_release_date'] ?>"  class="form-control col-md-7 col-xs-12">
            			</div>
            		</div>  
        
                </div><!--/panel-body-->
            </div><!--/panel-->	      
        </div>	
        <div class="col-md-4 col-sm-9 col-xs-12">
             <?php 
            $avatar_image_src=($edit['avatar'])?IMAGE_URL.'books/medium_'.$edit['avatar']:GET_TEMPLATE_DIRECTORY_URI.'/images/blank_author.png';
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
			    <button type="submit" name="submit" class="btn btn-success">Submit</button>
				  <button type="reset" class="btn btn-primary">Reset</button>
				  <a class="btn btn-danger" href="<?=$redirect_url?>">Cancel</a>
			</div>
		  </div>
		</form>
        
        </div> <!--x_content-->
        
	  </div>
	</div>
  </div>
  


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