<?php
function getImages($type,$type_id){
	global $db;
    /*TYPE
    *catarticles
    *articles
    *
    */    
    $type=trim($type);
    $type_id=trim($type_id);
    if(!$type && !$type_id){return false;}
     #echo "SELECT * FROM  `images` WHERE type='$type' AND type_id='$type_id'";  
    $images=$db->select("SELECT * FROM  `images` WHERE type='$type' AND type_id='$type_id'");
	return $images;
}

function getFileInfo($file_id){
	global $db;
 
    $images=$db->select_single("SELECT * FROM  `files` WHERE  id='$file_id'");
	return $images;
}

function getFiles($type,$type_id){
	global $db;
    /*TYPE
    *catarticles
    *articles
    *
    */    
if(!$type_id) return false;
    $type=trim($type);
    $type_id=trim($type_id);
    if(!$type && !$type_id){return false;}
   //echo "SELECT * FROM  `files` WHERE file_name!='' AND type='$type' AND type_id='$type_id'";return;
    $images=$db->select("SELECT * FROM  `files` WHERE file_name!='' AND type='$type' AND type_id='$type_id' order by id");
    return $images;
}
function deletImages($type,$type_id){
	global $db;       
    $images=getImages($type,$type_id);
    if($images){ 
         foreach($images as $image_info){
                $id=$image_info['id'];	                           
  		        if($db->delete("DELETE FROM `images`  WHERE id='$id'")){
  		            $file_path=BASE_DIR.$image_info['image_path'].$image_info['image_name'];
  		             unlink($file_path);  
  		        }
        }
        return true;
     }
    return false;
}

function InsertIntoImages($type,$type_id,$image_url){
    global $db;
    $allow_extention=array('jpg','jpeg','gif','png');
    if(!$type && ! $type_id && !$image_url) return false;
    
	$img_name = basename($image_url);
	if(!$img_name)return false;	

	$item_image_ext=strtolower(end(explode(".",$img_name)));
	if(!in_array($item_image_ext,$allow_extention))return false;	

    $_POST['type']=$type;	  		
    $_POST['type_id']=$type_id;	
    $id=$db->bindPOST("images","id");
    if(!$id)return false;
    
    $upload_dir = IMAGE_DIR .$type.'/';
    if(!is_dir($upload_dir)){mkdir($upload_dir, 0777);}
    $upload_url = IMAGE_URL .$type.'/';
    
    $item_image=$id.'-'.$type_id.'.'.$item_image_ext;
    $upload_to=$tmp_upload_dir.$item_image;
    
    //IMAGE UP 
    $imgurl = trim($image_url);    								   	
    $imageinfo = upload_image($upload_dir,$imgurl,$item_image,250,165); 
    if($imageinfo){
        $imageinfo['id']=$id;
    	$db->bindPOST('images','id',$imageinfo);
        return $item_image;
    }else{
     $db->delete("DELETE FROM images WHERE id='$id'");
    }    
    return false;
}
	
	
function upload_image($upload_dir,$image_url_path,$image_name,$newwidth=336,$newheight=280){    
    
		$imageurl = trim(htmlspecialchars(strip_tags($image_url_path)));
		
		if(@copy($imageurl, $upload_dir.$image_name)){
		
		///////////////////new block 
		$ext=substr($image_name,strrpos($image_name,".")+1,strlen($image_name));
		$uploadedfile = $upload_dir.$image_name;
		//creates the new image using the appropriate function from gd library
		if(!strcasecmp("jpg",$ext) || !strcasecmp("jpeg",$ext))
		$src_img=@imagecreatefromjpeg($uploadedfile);
		
		if(!strcmp("png",$ext))
		$src_img=@imagecreatefrompng($uploadedfile);
		
		if(!strcmp("gif",$ext))
		$src_img=@ImageCreateFromGIF($uploadedfile);
		
		//gets the dimmensions of the image
		$old_x=@imageSX($src_img);
		$old_y=@imageSY($src_img);
		
		
	
		$new_image_name = $image_name;
		$filename = $upload_dir.$new_image_name;
		
		//CALCULATE NEW RATION 
		if( ($old_x>$newwidth ) || ($old_y>$newheight) ){
			
			if($old_x>$old_y){
					$newwidth=$newwidth;
					$newheight=($old_y/$old_x)*$newwidth;
			}else{
				$newheight=$newheight;
				$newwidth=($old_x/$old_y)*$newheight;
			}
			
		}else{
			
			$newwidth=$old_x;
			$newheight=$old_y;
		}		
		
				
		
		// we create a new image with the new dimmensions
		$dst_img=@ImageCreateTrueColor($newwidth,$newheight);
		
		// resize the big image to the new created one
		@imagecopyresampled($dst_img,$src_img,0,0,0,0,$newwidth,$newheight,$old_x,$old_y);
		
		// output the created image to the file. Now we will have the thumbnail into the file named by $filename
		if(!strcasecmp("png",$ext)){
			if(@imagepng($dst_img,$filename))
			 $status = true;
		 }elseif(!strcasecmp("gif",$ext)){
			if(@ImageGIF($dst_img,$filename))
			 $status = true;
		}else{
		   if(@imagejpeg($dst_img,$filename))
		    $status = true;	
		}		
		
		//destroys source and destination images.
		@imagedestroy($dst_img);
		@imagedestroy($src_img);
		
		///////////end new block
		
		$image_path=	str_replace(BASE_DIR,SCRIPT_URL,$filename);
		/*
		#adding text 
		$text ='Aditya Photography';
		$url = $image_path;		
		Header('Content-Type: image/png');
		imagepng(pixelfuck($url, $text, 1, 6));
		#adding text 
		*/
		
	if($status){
	   $result=array();
	   $result['width']=$newwidth;
	   $result['height']=$newheight;
	   $result['image_name']=$image_name;
	   $result['image_path']=$image_path;
       
       return $result;
       
       //pre($result);exit;
         
	}else{
	   return false;
	}
    
	}else{
	 	die('Coppy failed from'.$imageurl.' to '. $upload_dir.$image_name);
	}
}


function pixelfuck($url, $chars='ewk34543§G§$§$Tg34g4g', $shrpns=1, $size=4,$weight=2)
{
    list($w, $h, $type) = getimagesize($url);
    $resource = imagecreatefromstring(file_get_contents($url));
    $img = imagecreatetruecolor($w*$size,$h*$size);

    $cc = strlen($chars);
    for($y=0;$y <$h;$y+=$shrpns)
        for($x=0;$x <$w;$x+=$shrpns)
            imagestring($img,$weight,$x*$size,$y*$size, $chars{@++$p%$cc}, imagecolorat($resource, $x, $y));
    return $img;
}

function aaupload_image($image_array){
    pre($image_array);
    $image_url=$image_array['image_url'];
    $image_name=$image_array['image_name'];
    $upload_to=$image_array['upload_to'];
    $newwidth=$image_array['width'];
    $newheight=$image_array['height'];
    
		
	$imageurl = trim(htmlspecialchars(strip_tags($image_url)));

	if(@copy($imageurl, $upload_to)){
	
	///////////////////new block 
	$ext=substr($image_name,strrpos($image_name,".")+1,strlen($image_name));
	//creates the new image using the appropriate function from gd library
	if(!strcasecmp("jpg",$ext) || !strcasecmp("jpeg",$ext))
	$src_img=imagecreatefromjpeg($upload_to);
	
	if(!strcmp("png",$ext))
	$src_img=imagecreatefrompng($upload_to);
	
	if(!strcmp("gif",$ext))
	$src_img=ImageCreateFromGIF($upload_to);
	
	//gets the dimmensions of the image
	$old_x=imageSX($src_img);
	$old_y=imageSY($src_img);

	if($newwidth && $newheight){	   
        	//CALCULATE NEW RATION 
            	if( ($old_x>$newwidth ) || ($old_y>$newheight) ){            		
            		if($old_x>$old_y){
            				$newwidth=$newwidth;
            				$newheight=($old_y/$old_x)*$newwidth;
            		}else{
            			$newheight=$newheight;
            			$newwidth=($old_x/$old_y)*$newheight;
            		}            		
            	}else{            		
            		$newwidth=$old_x;
            		$newheight=$old_y;
            	}	   
	}else{
		$newwidth=$old_x;
		$newheight=$old_y;
	}
	
	echo $newwidth."sssssssssss".$newheight;
	// we create a new image with the new dimmensions
    $dst_img = imagecreatetruecolor($newwidth,$newheight) or die('Cannot Initialize new GD image stream');

	
	// resize the big image to the new created one
	imagecopyresampled($dst_img,$src_img,0,0,0,0,$newwidth,$newheight,$old_x,$old_y);
	$status=false;
	// output the created image to the file. Now we will have the thumbnail into the file named by $filename
	if(!strcasecmp("png",$ext)){
		if(imagepng($dst_img,$upload_to))
		 $status = true;
	 }elseif(!strcasecmp("gif",$ext)){
		if(ImageGIF($dst_img,$upload_to))
		 $status = true;
	}else{
	   if(imagejpeg($dst_img,$upload_to))
	    $status = true;	
	}
	
	//destroys source and destination images.
	@imagedestroy($dst_img);
	@imagedestroy($src_img);
	
	///////////end new block
	
    
	if($status){
	   $result=array();
	   $result['width']=$newwidth;
	   $result['height']=$newwidth;
	   $result['image_name']=$image_name;
	   $result['image_path']=str_replace(BASE_DIR,"",$upload_to);
	}else{
	   return false;
	}
    
	}else{
	 	die('coppy failed'.$imageurl.' to '.$upload_to);
	}
}
    
function upload_image_exact($upload_dir,$image_url_path,$image_name,$newwidth=170,$newheight=250){
		
		$imageurl = trim(htmlspecialchars(strip_tags($image_url_path)));
		if(@copy($imageurl, $upload_dir.$image_name)){
		
		///////////////////new block
		$ext=substr($image_name,strrpos($image_name,".")+1,strlen($image_name));
		
		$uploadedfile = $upload_dir.$image_name;
		
		
		//creates the new image using the appropriate function from gd library
		if(!strcasecmp("jpg",$ext) || !strcasecmp("jpeg",$ext))
		$src_img=@imagecreatefromjpeg($uploadedfile);
		
		if(!strcmp("png",$ext))
		$src_img=@imagecreatefrompng($uploadedfile);
		
		if(!strcmp("gif",$ext))
		$src_img=@ImageCreateFromGIF($uploadedfile);
		
		//gets the dimmensions of the image
		$old_x=@imageSX($src_img);
		$old_y=@imageSY($src_img);
		
		
		//$new_image_name = "thumb_".$image_name;
		$new_image_name = $image_name;
		$filename = $upload_dir.$new_image_name;
		
		
		// we create a new image with the new dimmensions
		$dst_img=@ImageCreateTrueColor($newwidth,$newheight);
		
		// resize the big image to the new created one
		@imagecopyresampled($dst_img,$src_img,0,0,0,0,$newwidth,$newheight,$old_x,$old_y);
		
		// output the created image to the file. Now we will have the thumbnail into the file named by $filename
		if(!strcasecmp("png",$ext))
		 {
			if(@imagepng($dst_img,$filename))
			 $status = true;
		 }
		 
		elseif(!strcasecmp("gif",$ext))
		{
			if(@ImageGIF($dst_img,$filename))
			 $status = true;
		}
		 
		else
		{
		   if(@imagejpeg($dst_img,$filename))
		    $status = true;	
		}
		 
		
		
		//destroys source and destination images.
		@imagedestroy($dst_img);
		@imagedestroy($src_img);
		
		///////////end new block
		
		if($status)
		 return $filename;
		}else{
		 	return false;
		}
	}
?>	