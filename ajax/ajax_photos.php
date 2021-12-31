<?php 
include('../includes/config.php');
global $db;
$action = $db->get_post('action');
$album_id = $db->get_post('album_id');
$allow_extention=array('jpg','jpeg','png','pdf','docx','doc'); 	
$allow_extention=array('jpg','jpeg','png'); 	
$error="";
$output=array();
$output['message']='Ajax call';
$image_ids=array();
if($album_id){
					
$upload_dir = IMAGE_DIR.'gallery/';
$upload_url = IMAGE_URL.'gallery/';

if($_FILES){
	foreach($_FILES['file']['name'] as $img_key => $file_name){
	 if($file_name){
	   $file_tmp_name=$_FILES['file']['tmp_name'][$img_key];
	   $image_caption= "";
	   $slider_image= 0;
	   
	   
	   $file_ext=strtolower(@end(explode(".",$file_name)));
	   $new_file_name=date("Y_m_d").'_'.$album_id.'_'.$file_name;							
	   
	   list($width, $height, $type, $attr) = getimagesize($file_tmp_name);
	   
	   
	   if(in_array($file_ext,$allow_extention)){
		   $upload_to=$upload_dir. $new_file_name;
		  // echo $file_tmp_name .'='. $upload_to.'<br/>';
		   
		   
			if(@move_uploaded_file($file_tmp_name, $upload_to)){
				 $image_path=$upload_url. $new_file_name;
				 $imageinfo=array();
				 $imageinfo['type']='image_albums';
				 $imageinfo['type_id']=$album_id;
				 $imageinfo['image_name']=$new_file_name;
				 $imageinfo['image_caption']=$image_caption;
				 $imageinfo['slider_image']=$slider_image;
				 $imageinfo['image_path']=$image_path;
				 $imageinfo['width']=$width;
				 $imageinfo['height']=$height;
				 $imageinfo['image_ext']=$file_ext;
				 $image_ids[]=$imageid=$db->bindPOST('images','id',$imageinfo);
				 $output['Message']=$imageid;
				 #bof cover Image
				/*  if($_POST['albumimage']['cover_image'] == $img_key){
					// echo "UPDATE image_albums SET `fec_image`='$image_path' WHERE album_id='$album_id'";
					$db->edit("UPDATE image_albums SET `fec_image`='$image_path' WHERE album_id='$album_id'");   
				 }// */
		   }else{
			  $error.="Failed to upload $file_field_name";
		   }
		  }else{
			  $error.="$file_ext does not support";
		  }
		}//if file name
	}//	foreach file
	
	if($image_ids){
		//$message ="Success :".count($image_id)." Photos under album $album_id . " . $error;
	 $output['message']='Success';
	}else{
	  $output['error']=$error;
	}
}//if files 

}else{
$output['message']=" missing album";	
}//album_id

	
echo json_encode($output); 
die;