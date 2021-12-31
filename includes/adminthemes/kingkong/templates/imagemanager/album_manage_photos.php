<?php 
$table_name='images';
$primary_key='id';

$max_width=1800;
$max_height=1350;

$type=trim($db->get_post('type'));
$type_id=trim($db->get_post('type_id'));
if(!$type && $type_id){die('Wrong access');}
$type_info=$db->getRowArray($type,$type_id);
//pre($type_info);
$type_title=$type_info['album_title'];
$fec_image=$type_info['fec_image'];

$page=$db->get('page');
$link = $this->controller."/manageAlbumPhotos/?type=$type&type_id=$type_id&";
//phpinfo();

$allow_extention=array('jpg','jpeg','gif','png');
$en_ids=$db->get('ids');
$image_ids=array();
if($en_ids){
	$ids=urldecode($en_ids);
	$image_ids=explode(",",$ids);
//	foreach($image_id as $k=>$v){$image_id[$v]=$v;}
}

$tmp_upload_dir = IMAGE_DIR .'tmp/';
$tmp_upload_url = IMAGE_DIR .'tmp/';

/*
$upload_dir = IMAGE_DIR .$type.'/';
if(!is_dir($upload_dir)){mkdir($upload_dir, 0777);}
$upload_url = IMAGE_URL .$type.'/';
*/
if($type='image_albums'){
  $upload_dir = IMAGE_DIR.'/gallery/';
  $upload_url = IMAGE_DIR.'/gallery/';  
}else{
 $upload_dir = IMAGE_DIR;
 $upload_url = IMAGE_URL;   
}


//MULSTIPLE POST ACTION
if($db->post('checkSubmitted')){	
   $ids = $db->post('ids');
   $post_action = $db->post('action');
   #pre($_POST);
  	if($ids){
  		foreach($ids as $id){
  		    $image_info=$db->getRowArray($table_name,array('id'=>$id));
  		    switch($post_action){		  	
	            case 'Delete':
								$sql = "DELETE FROM $table_name WHERE $primary_key='$id'";
				  		        if($db->delete($sql)){
				  		             $file_path=$upload_dir.$image_info['image_name'];
				  		             unlink($file_path);  
				  		        }                                
		  		                break;
				 case 'UpdateCaption':
							$fecImage =$_POST['fecImage'];
							$img_info=array();
							$img_info['id']=$id;	  
							$img_info['image_caption']=$_POST['image_captions'][$id];	
                            $img_info['slider_image']=$_POST['slider_images'][$id];  		
                            $img_info['slider_image']=$_POST['fecImage'][$id];  
						
							$id=$db->bindPOST("images","id", $img_info);   
							if($fecImage){
								//pre($img_info);
								//echo "UPDATE image_albums SET `fec_image`='$fecImage' WHERE album_id='$type_id'";
								$db->edit("UPDATE image_albums SET `fec_image`='$fecImage' WHERE album_id='$type_id'");
							}
							
							break;		
				 case 'Update':
							$img_info=array();
							$img_info['id']=$id;	  
							$img_info['image_caption']=$_POST['image_captions'][$id];	
                            $img_info['slider_image']=$_POST['slider_images'][$id];  		
							$id=$db->bindPOST("images","id", $img_info);                                
							break;								
  	         }//switch	
  		 }//foreach         
         $type_info=$db->getRowArray($type,$type_id);
		 $fec_image=$type_info['fec_image'];
  	  }//ids
	  

  }



//upload
 	
$manage_images_link = SCRIPT_URL."siteadminpanel/manageAlbumPhotos/?type=image_albums&type_id=$type_id";
?>
<style type="text/css">ul li{list-style-type:none;}.page ul li{display:inline;} .page ul li{padding:4px;} .valid {color: green;} .invalid {color: #ff0000;} </style>

<script language="javascript" type="text/javascript">	
function checkSearchForm(){
    if(document.getElementById('ssquery').value==""){
    	alert('Enter search item');
    	return false;
    }
}
function showhide(id1) {if(document.getElementById(id1).style.display=='none') {document.getElementById(id1).style.display='block';} else {document.getElementById(id1).style.display='none';}}
function poptastic(url){
		var newwindow=window.open(url,'popupWindow','toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=yes,copyhistory=no,width=600,height=400,screenX=150,screenY=150,top=80,left=30');
		if(window.focus) {newwindow.focus()}
}	
function check_all(rows){if(rows){for( var i=0; i<rows; i++ ){var single = 'checksingle'+i;document.getElementById(single).checked = true;}}}
function uncheck_all(rows){if(rows){for( var i=0; i<rows; i++ ){var single = 'checksingle'+i;document.getElementById(single).checked = false;}}}
function check_action(){
	var action = document.getElementById('p_action').value;
    if(action ==''){alert("Please Select An Action");return false;}
    else if(action =='delete'){var x = confirm('Are You Sure You Want to Delete?');if(!x)return false;}
	return true;
}

</script>
<div class="containet">
	<div class="panel panel-primary">
	<div class="panel-heading">
	  <h3 class="panel-title">Photo Album :<?=$type_title?> </h3>
	</div>
	<div class="panel-body">
	<div class="alert" id="showMessage"></div>
	<!--bof Add Multi photos-->
	<style>
		#drop_file_zone {background-color: #EEE;	border: #999 5px dashed;width: 100%;height: 250px;padding: 8px;font-size: 18px;}
		#drag_upload_file { width:50%; margin:0 auto;}
		#drag_upload_file p { text-align: center;}
		#drag_upload_file #selectfile { display: none;}
		.img_block{ padding:10px;margin-bottom:20px;}
		.img_block img{ min-height:150px; width:auto; text-align:center;}
	</style>
	<form name="" action="" method="post" class="form-horizontal" enctype="multipart/form-data">
	<input type="hidden" name="doSubmit" value="true" />
	<input type="hidden" id="album_id" name="album_id" value="<?=$type_id?>" />
	<div class="form-group">
		<div class="col-sm-12">
			<div id="drop_file_zone" ondrop="upload_file(event)" ondragover="return false">
				<div id="drag_upload_file">
				<br/>
				<br/>
					<p>Drop Photo(s) here</p>
					<p>or</p>
					<p><input type="button" value="Select Photo(s)" onclick="file_explorer();" /></p>
					<input type="file" id="selectfile" multiple />
				</div>
			</div>
		</div>	
	</div>
	</form>
	<div class="clearfix"></div>  
	<script>
		///////////AJAX MULTIPLE PHOTON
		function upload_file(e) {
			e.preventDefault();
			ajax_file_upload(e.dataTransfer.files);
		}		  
		function file_explorer() {
			document.getElementById('selectfile').click();
			document.getElementById('selectfile').onchange = function() {
				files = document.getElementById('selectfile').files;
				ajax_file_upload(files);
			};
		}		  
		function ajax_file_upload(files_obj) {
			if(files_obj != undefined) {
				var form_data = new FormData();
				for(i=0; i<files_obj.length; i++) {
					form_data.append('file[]', files_obj[i]);
				}
				jQuery('#showMessage').html("Uploading..........");
				//Album
				form_data.append('album_id', jQuery('#album_id').val());
				var uploadURL='<?=SCRIPT_URL?>ajax/ajax_photos.php';
				var xhttp = new XMLHttpRequest();
				xhttp.open("POST", uploadURL, true);
				xhttp.onload = function(event) {
					if (xhttp.status == 200) {
						//var json = $.parseJSON(this.responseText);
						var json = JSON.parse(this.responseText); 
						if(json.message == 'Success'){
							location ='<?=$manage_images_link?>';
						}else{
						jQuery('#showMessage').html('<p style="color:red;">'+json.error+'</p>');
						//jQuery('#showMessage').html(this.responseText);
						}
						
					} else {
						//alert("Error " + xhttp.status + " occurred when trying to upload your file.");
						jQuery('#showMessage').html("Error " + xhttp.status + " occurred when trying to upload your file.");
					}
				}
		 
				xhttp.send(form_data);
			}
		}
	</script>
	<!--eof Add Multi photos-->	
	
	<a href="<?=ADMIN_URL?>manageAlbumPhotos/?type=image_albums&type_id=<?= $type_id?>" class="btn btn-danger pull-right">Refresh</a>
	<hr/>
<?php

$limit=($db->get('limit'))?$db->get('limit'):36;
$squery="";
$sql="SELECT * FROM images WHERE type='$type' and type_id='$type_id' ";

if($db->get('q')){
	if($db->get('q')){
	$squery=$db->db_prepare_input($db->get('q'));
	$sql .=" AND image_name LIKE '%".$db->db_input($squery)."%' ";
	$link .="q=$squery&";	
	}
}

$pages = make_pagination($sql,$page,$limit);
$sql .= " ORDER BY date(`created`) DESC  LIMIT ".$pages['start_form'].",".$pages['per_page'];

$rows=$db->select($sql);
if($rows){
?>

<form action="" method="post" onsubmit="return check_action()">
<input type="hidden" value="true" name="checkSubmitted"/>
<div class="row">		
	
		<?php
		$i=1;
		foreach($rows as $key=>$image_info){
		 //pre($image_info); 
		 $sel=($image_info['image_path'] ==$fec_image )?' checked="checked"':''; 
		?>
		   <div class="col-xs-3 col-sm-3 col-md-3">
		   <div class="img_block">
                <input type="checkbox" name="ids[]"  id="checksingle<?=$key?>" value="<?= $image_info['id'] ?>"/> <em><?=$image_info['image_name'] ?></em>
				<img src="<?=$image_info['image_path']?>" title="<?=$image_info['image_name']?>" alt="<?=$image_info['image_name']?>"  class="mg-fluid img-thumbnail rounded " title="<?=$image_info['image_name'] ?>"/>  
				<input  type="text"  class="form-control"  name="image_captions[<?=$image_info['id'] ?>]" value="<?=$image_info['image_caption']?>" placeholder ="Image caption..."/>	
			    <select  name="slider_images[<?=$image_info['id'] ?>]" class="form-control">
                    <option value="0"<?=($image_info['slider_image'] =="0")?' selected="selected"':''?>>--Select Slide--</option>
                    <option value="1"<?=($image_info['slider_image'] =="1")?' selected="selected"':''?> style="color:green">Home Gallery</option>
                </select>
				<input type="radio" name="fecImage" value="<?=$image_info['image_path']?>"<?=$sel?> required> Album Cover				
			</div>
			</div>
		<?php
			if($i%4 == 0){echo '</div><div class="row">';}
		$i++;
		}
		?>
</div>
<div class="clearfix"></div>
<hr/>
<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12">
			<p class="pull-right"> 
                <input type="button" value="Check all" name="" class="btn btn-link" onclick="check_all(<?=($rows)?count($rows): 0 ?>)"/> &nbsp;&nbsp;
                <input type="button" value="Uncheck" name="" class="btn btn-link" onclick="uncheck_all(<?=($rows)?count($rows): 0 ?>)" /> &nbsp;&nbsp;
                <input type="submit" value="UpdateCaption" name="action" class="btn btn-default"  />
                <input type="submit" value="Delete" name="action" class="btn btn-danger"  onclick="return confirm('Are you sure you want to delete?');"/>
			</p>
	</div>
</div>
</form>
<br style="clear:both"/>
<?php
if(isset($pages) && $pages['total_page'] > 1){?>  
    <div class="page"> 
        <ul class="pagination">
              <?php       
             	$links=(strstr($link, 'http:'))?$link:(SCRIPT_URL.$link);
          
				echo '<li><a href="'.$links.'page='.$pages['first'].'"><span><span>First</span></span></a></li>';
				
				 if(isset($pages['prev_page'])){		    		
		    		echo '<li><a href="'.$links.'page='.$pages['prev_page'].'"><span><span>&laquo; Previous</span></span></a></li>';
		    	}
			 	foreach($pages['page_list'] as $k=>$v){
					echo '<li><a href="'.$links.'page='.$k.'"><span><span>'.$v.'</span></span></a></li>';
				}
				
				if(isset($pages['next_page'])){
		    		echo '<li><a href="'.$links.'page='.$pages['next_page'].'" ><span><span>Next &raquo;</span></span></a></li>';
		    	}				
				echo '<li><a href="'.$links.'page='.$pages['last'].'"><span><span>Last</span></span></a></li>';
				
				?>
	 	<br/>
		 	<div class="visit">&raquo; You are Browsing Page <?=$pages['curr_page']?> of <b><?=$pages['total_page']?></div> 
       <span class="clear"></span> 
   </div>   
   <?php } ?>
   
   <br style="clear: both;"/>
</div>
   
<?php 
	}    
?>
</div>
</div>