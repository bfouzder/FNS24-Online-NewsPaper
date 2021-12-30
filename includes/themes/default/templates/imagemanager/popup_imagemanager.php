<?php 
$table_name='images';
$primary_key='id';

$max_width=1800;
$max_height=1350;

$type=trim($db->get_post('type'));
$type_id=trim($db->get_post('type_id'));
if(!$type && $type_id){die('Wrong access');}
$type_info=$db->getRowArray($type,$type_id);

$type_title=$type_info['album_title'];

$page=$db->get('page');
$link = $this->controller."/popup_imagemanager/?type=$type&type_id=$type_id&";
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
$upload_dir = FILE_DIR;
$upload_url = FILE_URL;

//MULSTIPLE POST ACTION
if($db->post('checkSubmitted')){	
   $ids = $db->post('ids');
   $post_action = $db->post('action');
   //pre($_POST);
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
							$_POST['id']=$id;	  
							$_POST['image_caption']=$_POST['image_captions'][$id];	  		
							$id=$db->bindPOST("images","id");                             
							break;		
				 case 'Update':
							$_POST['id']=$id;	  
							$_POST['image_caption']=$_POST['image_captions'][$id];	  		
							$id=$db->bindPOST("images","id");                             
							break;								
  	         }//switch	
  		 }//foreach         
         
  	  }//ids
  }



//upload
if($db->post('formSubmitted')){
$err=array();	
if($_POST['image_url']=="" && $_FILES["item_image"]["name"]==""){
	array_push($err,"Browse Images Or Enter Image Url");
}else{
		if($_FILES["item_image"]["name"]){
				$img_name=$_FILES["item_image"]["name"];
				$item_image_ext=strtolower(end(explode(".",$_FILES["item_image"]["name"])));
        		 if(!in_array($item_image_ext,$allow_extention)){				
        		  	array_push($err," .$item_image_ext type of Image doesn't support enter only ".implode(",",$allow_extention));
        		 }
		}elseif($_POST['image_url']){
			$img_name = basename($_POST['image_url']);
			if($img_name ==""){
				array_push($err,"Enter valid image url");	
			}else{
				$item_image_ext=strtolower(end(explode(".",$img_name)));
				 if(!in_array($item_image_ext,$allow_extention)){				
        		  	array_push($err," .$item_image_ext type of Image doesn't support enter only ".implode(",",$allow_extention));
        		 }	
			}	
		}
}	
if($err){
 $error = implode("<br />",$err);
}else{
					
				  		
			$_POST['type']=$type;	  		
			$_POST['type_id']=$type_id;	  		
			$id=$db->bindPOST("images","id");
			if($id){
				$item_image=$id.'-'.$type_id.'.'.$item_image_ext;
			     $upload_to=$tmp_upload_dir.$item_image;
              
				//IMAGE UP 
					if($_FILES["item_image"]["name"]){
						   if(@move_uploaded_file($_FILES["item_image"]["tmp_name"], $upload_to)){
						   		    $imgurl = $tmp_upload_url.$item_image;    								   	
                                    $imageinfo = upload_image($upload_dir,$imgurl,$item_image,$max_width,$max_width); 
    								if($imageinfo){
    								    $imageinfo['id']=$id;
										$db->bindPOST('images','id',$imageinfo);
                                        state('up_succ',"  Successfully uploaded");
                                        @unlink($upload_to);
								   	}else{
								   	    $db->deleteField('images',$id); @unlink($upload_to);
								   	   	state('up_error',"  failed to resize image ");
								    }
						   }else{
						   	   	 $db->deleteField('images',$id); @unlink($upload_to);
							     state('up_error',"  failed to move image ");
						   }
					}elseif($_POST['image_url']){
					  
                                $imgurl = trim($_POST['image_url']);    								   	
                                $imageinfo = upload_image($upload_dir,$imgurl,$item_image,1024,1024); 
								if($imageinfo){
								    $imageinfo['id']=$id;
									$db->bindPOST('images','id',$imageinfo);
                                    state('up_succ',"  Successfully uploaded");
							   	}else{
							   	    //$db->deleteField('images',$id); @unlink($upload_to);
							   	   	state('up_error',"  failed to resize image ");
							    }   	
						  
					}else{
					 $db->deleteField('images',$id); @unlink($upload_to);
				      state('up_error',"  failed to image upload from url");
					}
					
			} 			
	  		redirect($link);
  	}
}
$link .='&';

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

function  MakeClose(){
    window.opener.location.reload();
    window.close();
}
function  checkForm(form){
	$("#errordata").css('display','block');
	if(form.site_id.value=="")
	    $('#errordata').html("Select Site");
	else if(form.title.value=="")
	    $('#errordata').html("Enter Title");
	else if(form.url.value=="")
	    $('#errordata').html("Enter Url");
	else if(form.type_id.value=="")
	    $('#errordata').html("Choose Type");	    
   	else
		  return true;
  return false;
}
</script>
<center><h2 style="color: orange;">Image Upload Panel</h2>
<h3><?=$type_title?></h3>
</center>	

<!--<img src="<?=SCRIPT_URL?>resources/files/gen_image.php?nome=FNS24.COM" alt="ssssssssssssssssssss" width="200"/>-->
	 
<div class="valid" ><?=$message.state('up_success')?></div>
<div class="invalid"><?=$error.state('up_error')?></div>
<div id="errordata"></div>
<form action="" method="post"  onsubmit="return checkUploadImageForm(this);" enctype="multipart/form-data">
<input type="hidden" name="formSubmitted" value="true"/>
<table border="0" cellpadding="3" cellspacing="4">		
    <tr>
        <td>Image:</td><td><input  type="file" name="item_image" /></td>
        <td>Caption:</td><td><input  type="text" class="form-control"  name="image_caption" value=""/></td>
        <td><input type="submit" name="" value="Upload" class="btn btn-info" />&nbsp;&nbsp;<!--<input type="button" value="Close" onclick="MakeClose();"/>--></td></tr>
</table>	  
</form>


<?php

$limit=($db->get('limit'))?$db->get('limit'):12;
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
?>

<?php
if($rows){
?>
<hr/>
<em>*Choose any image to delete</em>
<!--<form action="" method="get"  onsubmit="return checkSearchForm();" >
 <input type="hidden" name="type" value="<?=$type?>"/><input type="hidden" name="type_id" value="<?=$type_id?>"/>   
	<table border="0" cellpadding="3" cellspacing="4">
		<tr><td><strong>List of images</strong></td>
			<td><input type="text" id="ssquery" name="q" value="Search images.." onfocus="this.value=''" onblur="this.value='Search images..'"/></td>
			<td>
                <input type="submit" value="search"/>
               
            <input type="button" value="Clear" onclick="window.location.href='imagemanager.php?type=<?=$type?>&type_id=<?=$type_id?>'"/></td>
		</tr>
	</table>
</form>-->
<div class="table-responsive">
<form action="" method="post" onsubmit="return check_action()">
<input type="hidden" value="true" name="checkSubmitted"/>
<div class="rows">		
	
		<?php
		$i=1;
		foreach($rows as $key=>$image_info){
		  
		?>
		   <div class="col-xs-6 col-sm-3 col-md-3">
                <input type="checkbox" name="ids[]"  id="checksingle<?=$key?>" value="<?= $image_info['id'] ?>"/>
				<img src="<?=$image_info['image_path']?>" title="<?=$image_info['image_name']?>" alt="<?=$image_info['image_name']?>"  class="img-responsive img-thumbnail"/>  
				<input  type="text"  class="form-control"  name="image_captions[<?=$image_info['id'] ?>]" value="<?=$image_info['image_caption']?>">	
			</div>
		<?php
			//if($i%3 == 0){echo '</tr><tr>';}
		$i++;
		}
		?>
</div>
<div class="clearfix"></div>
<hr/>
<div class="rows">
	<div class="col-xs-12 col-sm-12 col-md-3">
			<p class="pull-right"> 
						<input type="button" value="Check all" name="" class="btn btn-link" onclick="check_all(<?=($rows)?count($rows): 0 ?>)"/> &nbsp;&nbsp;
						<input type="button" value="Uncheck" name="" class="btn btn-link" onclick="uncheck_all(<?=($rows)?count($rows): 0 ?>)" /> &nbsp;&nbsp;
					  <input type="submit" value="UpdateCaption" name="action" class="btn btn-default"  />
					  <input type="submit" value="Delete" name="action" class="btn btn-danger"  onclick="return confirm('Are you sure you want to delete?');"/>
			<p>
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
    
state('up_success','');
state('up_error','');
?>
