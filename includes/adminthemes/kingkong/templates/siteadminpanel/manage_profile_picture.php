<?php
   $user_id=$user_info['user_id'];
   $user_name=$user_info['user_name'];
   $user_picture=$user_info['user_picture'];
   
?>
<div class="request-left-top"><?=$user_name?>' Profile Picture</div>
<div class="request-left-med">
<?php 
//only assign a new timestamp if the session variable is empty
if (!$user_picture){
    $p_rand=ce_create_random_value(4);
    state('random_key',$p_rand); //assign the timestamp to the session variable
	state('user_file_ext','');
}
#########################################################################################################
# CONSTANTS																								#
# You can alter the options below																		#
#########################################################################################################
$upload_dir = PROFILE_IMG_DIR;				// The directory for the images to be saved in
$upload_path = $upload_dir."thumb/";				// The path to where the image will be saved
$upload_thumb_path = $upload_dir."thumbsmall/";				// The path to where the image will be saved
$upload_url = PROFILE_IMG_URL."thumb/";				// The path to where the image will be saved
$upload_thumb_url = PROFILE_IMG_URL."thumbsmall/";				// The path to where the image will be saved

$large_image_prefix = "$user_name_"; 			// The prefix name to large image
$thumb_image_prefix = "$user_name_";			// The prefix name to the thumb image

if (!$user_picture){
$large_image_name = $large_image_prefix. state('random_key');     // New name of the large image (append the timestamp to the filename)
$thumb_image_name = $thumb_image_prefix.state('random_key');     // New name of the thumbnail image (append the timestamp to the filename)
}else{
$large_image_name = $thumb_image_name = $user_picture;     // New name of the thumbnail image (append the timestamp to the filename)
   
}

$max_file = "3"; 							// Maximum file size in MB
$max_width = "500";							// Max width allowed for the large image
$thumb_width = "100";						// Width of thumbnail image
$thumb_height = "100";						// Height of thumbnail image
// Only one of these image types should be allowed for upload
$allowed_image_types = array('image/pjpeg'=>"jpg",'image/jpeg'=>"jpg",'image/jpg'=>"jpg",'image/png'=>"png",'image/x-png'=>"png",'image/gif'=>"gif");
$allowed_image_ext = array_unique($allowed_image_types); // do not change this
$image_ext = "";	// initialise variable, do not change this.
foreach ($allowed_image_ext as $mime_type => $ext) {
    $image_ext.= strtoupper($ext)." ";
}




//Image Locations
$large_image_location = $upload_path.$large_image_name;
$thumb_image_location = $upload_thumb_path.$thumb_image_name;

//Create the upload directory with the right permissions if it doesn't exist
if(!is_dir($upload_dir)){
	mkdir($upload_dir, 0777);
	chmod($upload_dir, 0777);
}

//Check to see if any images with the same name already exist
if (file_exists($large_image_location)){
	if(file_exists($thumb_image_location)){
		$thumb_photo_exists = "<img src=\"".$upload_thumb_url.$large_image_name."\" alt=\"Thumbnail Image\"/>";
	}else{
		$thumb_photo_exists = "";
	}
   	$large_photo_exists = "<img src=\"".$upload_url.$large_image_name."\" alt=\"Large Image\"/>";
} else {
   	$large_photo_exists = "";
	$thumb_photo_exists = "";
}

if (isset($_POST["upload"])) { 
	//Get the file information
	$userfile_name = $_FILES['image']['name'];
	$userfile_tmp = $_FILES['image']['tmp_name'];
	$userfile_size = $_FILES['image']['size'];
	$userfile_type = $_FILES['image']['type'];
	$filename = basename($_FILES['image']['name']);
	$file_ext = strtolower(substr($filename, strrpos($filename, '.') + 1));
	
	//Only process if the file is a JPG, PNG or GIF and below the allowed limit
	if((!empty($_FILES["image"])) && ($_FILES['image']['error'] == 0)) {
		
		foreach ($allowed_image_types as $mime_type => $ext) {
			//loop through the specified image types and if they match the extension then break out
			//everything is ok so go and check file size
			if($file_ext==$ext && $userfile_type==$mime_type){
				$error = "";
				break;
			}else{
				$error = "Only <strong>".$image_ext."</strong> images accepted for upload<br />";
			}
		}
		//check if the file size is above the allowed limit
		if ($userfile_size > ($max_file*1048576)) {
			$error.= "Images must be under ".$max_file."MB in size";
		}
		
	}else{
		$error= "Select an image for upload";
	}
	//Everything is ok, so we can upload the image.
	if (strlen($error)==0){
		
		if (isset($_FILES['image']['name'])){
			//this file could now has an unknown file extension (we hope it's one of the ones set above!)
		
             $p_rand=ce_create_random_value(4);
        	 $user_picture=$user_name.'_'.$p_rand.'.'.$file_ext;
            
            $large_image_location = $upload_path.$user_picture;
			$thumb_image_location = $upload_thumb_path.$user_picture;
                
            
			//put the file ext in the session so we know what file to look for once its uploaded
			$_SESSION['user_file_ext']=".".$file_ext;
			
			if(move_uploaded_file($userfile_tmp, $large_image_location)){
			 	chmod($large_image_location, 0777);
			
    			$width = getWidth($large_image_location);
    			$height = getHeight($large_image_location);
    			//Scale the image if it is greater than the width set above
    			if ($width > $max_width){
    				$scale = $max_width/$width;
    				$uploaded = resizeImage($large_image_location,$width,$height,$scale);
    			}else{
    				$scale = 1;
    				$uploaded = resizeImage($large_image_location,$width,$height,$scale);
    			}
                
                $db->edit("UPDATE users SET user_picture='$user_picture' WHERE user_id='$user_id'");
                
                
                #ADD TO NEW FEED
                $user_picture_url= $upload_url.$user_picture;
                $n_link=SCRIPT_URL.'profile/'.$user_info['user_name'].'/'.$p_rand;   
                $news_text= '<a href="'.$user_picture_url.'" class="fancybox">'.ar_timthumb_image($user_picture_url,380,400,$zc=3).'</a>';   
                addToNewsFeed($type='profile_picture',$user_id,$news_text,$n_link);  
                                   
                
                
    			//Delete the thumbnail file so the user can create a new one
    			if (file_exists($thumb_image_location)) {
    				unlink($thumb_image_location);
    			}
			}//
		
		}
		//Refresh the page to show the new uploaded image
		header("location:".CURRENT_URL);
		exit();
	}
}

if (isset($_POST["upload_thumbnail"]) && strlen($large_photo_exists)>0) {
	//Get the new coordinates to crop the image.
	$x1 = $_POST["x1"];
	$y1 = $_POST["y1"];
	$x2 = $_POST["x2"];
	$y2 = $_POST["y2"];
	$w = $_POST["w"];
	$h = $_POST["h"];
	//Scale the image to the thumb_width set above
	$scale = $thumb_width/$w;
	$cropped = resizeThumbnailImage($thumb_image_location, $large_image_location,$w,$h,$x1,$y1,$scale);
	//Reload the page again to view the thumbnail
	header("location:".CURRENT_URL);
	exit();
}


if (isset($_POST["change_thumbnail"]) && strlen($large_photo_exists)>0) {
//get the file locations 
	if (file_exists($large_image_location)) {
		//unlink($large_image_location);
	}
	if (file_exists($thumb_image_location)) {
		unlink($thumb_image_location);
	}
	header("location:".CURRENT_URL);
	exit(); 
}
?>


<script type="text/javascript" src="<?=SCRIPT_URL?>includes/upload_crop/js/jquery-pack.js"></script>
<script type="text/javascript" src="<?=SCRIPT_URL?>includes/upload_crop/js/jquery.imgareaselect.min.js"></script>


<?php
//Only display the javacript if an image has been uploaded
if(strlen($large_photo_exists)>0){
	$current_large_image_width = getWidth($large_image_location);
	$current_large_image_height = getHeight($large_image_location);?>
<script type="text/javascript">
function preview(img, selection) { 
	var scaleX = <?php echo $thumb_width;?> / selection.width; 
	var scaleY = <?php echo $thumb_height;?> / selection.height; 
	
	$('#thumbnail + div > img').css({ 
		width: Math.round(scaleX * <?php echo $current_large_image_width;?>) + 'px', 
		height: Math.round(scaleY * <?php echo $current_large_image_height;?>) + 'px',
		marginLeft: '-' + Math.round(scaleX * selection.x1) + 'px', 
		marginTop: '-' + Math.round(scaleY * selection.y1) + 'px' 
	});
	$('#x1').val(selection.x1);
	$('#y1').val(selection.y1);
	$('#x2').val(selection.x2);
	$('#y2').val(selection.y2);
	$('#w').val(selection.width);
	$('#h').val(selection.height);
} 

$(document).ready(function () { 
	$('#save_thumb').click(function() {
		var x1 = $('#x1').val();
		var y1 = $('#y1').val();
		var x2 = $('#x2').val();
		var y2 = $('#y2').val();
		var w = $('#w').val();
		var h = $('#h').val();
		if(x1=="" || y1=="" || x2=="" || y2=="" || w=="" || h==""){
			alert("You must make a selection first");
			return false;
		}else{
			return true;
		}
	});
}); 

$(window).load(function () { 
	$('#thumbnail').imgAreaSelect({ aspectRatio: '1:<?php echo $thumb_height/$thumb_width;?>', onSelectChange: preview }); 
});

</script>
<?php }?>






<style>
.edit-reg h1{color:orange;font-size:18px; text-transform:uppercase;}
.edit-reg h2{color:green;font-size:14px; padding:2px 0px;}
</style>
<div class="edit-reg">
  <h1>Photo Upload and Crop</h1>
<?php
//Display error message if there are any
if(strlen($error)>0){
	echo "<ul><li><strong>Error!</strong></li><li>".$error."</li></ul>";
}
if(strlen($large_photo_exists)>0){
    $thumb_img_path=$upload_thumb_path.$large_image_name;
    $thmub_image_url=(file_exists($thumb_img_path))?$upload_thumb_url.$large_image_name:'';
    ?>
		<h2>Create Thumbnail</h2>
<p>Please choose/create your desired thumb image</p>
		<div align="center">
			<img src="<?php echo $upload_url.$large_image_name;?>" style="float: left; margin-right: 10px;" id="thumbnail" alt="Create Thumbnail" />
			<?php if(!$thmub_image_url){?>
            <div style="border:1px #e5e5e5 solid; float:left; position:relative; overflow:hidden; width:<?php echo $thumb_width;?>px; height:<?php echo $thumb_height;?>px;">
				<img src="<?php echo $upload_url.$large_image_name;?>" style="position: relative;" alt="Thumbnail Preview" />
			</div>
            <br style="clear:both;"/>
			<form name="thumbnail" action="<?php echo CURRENT_URL;?>" method="post">
            <input type="hidden" name="formSubmitted" value="true"/>
            		<input type="hidden" name="user_id" value="<?=$user_info['user_id']?>"/>
				<input type="hidden" name="x1" value="" id="x1" />
				<input type="hidden" name="y1" value="" id="y1" />
				<input type="hidden" name="x2" value="" id="x2" />
				<input type="hidden" name="y2" value="" id="y2" />
				<input type="hidden" name="w" value="" id="w" />
				<input type="hidden" name="h" value="" id="h" />
				<input type="submit" name="upload_thumbnail" value="Save Thumbnail" id="save_thumb" />
			</form>
  	        <?php }else{ ?>
            <div style="border:1px #e5e5e5 solid; float:left; position:relative; overflow:hidden; width:<?php echo $thumb_width;?>px; height:<?php echo $thumb_height;?>px;">
				<img src="<?php echo $thmub_image_url;?>" style="position: relative;" alt="Thumbnail Preview" />
			</div>
             <br style="clear:both;"/>
            <form name="thumbnail" action="<?php echo CURRENT_URL;?>" method="post">
				<input type="submit" name="change_thumbnail" value="Delete current Thumbnail" />
			</form>
            <? } ?>
            
		</div>
<h2>OR</h2><hr/>	
	<?php 	} ?>

	

<h2>Upload Photo</h2>
	<form name="photo" enctype="multipart/form-data" action="<?php echo CURRENT_URL;?>" method="post">
    <input type="hidden" name="formSubmitted" value="true"/>
            	<input type="hidden" name="user_id" value="<?=$user_info['user_id']?>"/>
	Photo <input type="file" name="image" size="30" /> <input type="submit" name="upload" value="Upload" />
	</form>
</div>

</div><!--mid-->

<?php
##########################################################################################################
# IMAGE FUNCTIONS																						 #
# You do not need to alter these functions																 #
##########################################################################################################
function resizeImage($image,$width,$height,$scale) {
	list($imagewidth, $imageheight, $imageType) = getimagesize($image);
	$imageType = image_type_to_mime_type($imageType);
	$newImageWidth = ceil($width * $scale);
	$newImageHeight = ceil($height * $scale);
	$newImage = imagecreatetruecolor($newImageWidth,$newImageHeight);
	switch($imageType) {
		case "image/gif":
			$source=imagecreatefromgif($image); 
			break;
	    case "image/pjpeg":
		case "image/jpeg":
		case "image/jpg":
			$source=imagecreatefromjpeg($image); 
			break;
	    case "image/png":
		case "image/x-png":
			$source=imagecreatefrompng($image); 
			break;
  	}
	imagecopyresampled($newImage,$source,0,0,0,0,$newImageWidth,$newImageHeight,$width,$height);
	
	switch($imageType) {
		case "image/gif":
	  		imagegif($newImage,$image); 
			break;
      	case "image/pjpeg":
		case "image/jpeg":
		case "image/jpg":
	  		imagejpeg($newImage,$image,90); 
			break;
		case "image/png":
		case "image/x-png":
			imagepng($newImage,$image);  
			break;
    }
	
	chmod($image, 0777);
	return $image;
}
//You do not need to alter these functions
function resizeThumbnailImage($thumb_image_name, $image, $width, $height, $start_width, $start_height, $scale){
	list($imagewidth, $imageheight, $imageType) = getimagesize($image);
	$imageType = image_type_to_mime_type($imageType);
	
	$newImageWidth = ceil($width * $scale);
	$newImageHeight = ceil($height * $scale);
	$newImage = imagecreatetruecolor($newImageWidth,$newImageHeight);
	switch($imageType) {
		case "image/gif":
			$source=imagecreatefromgif($image); 
			break;
	    case "image/pjpeg":
		case "image/jpeg":
		case "image/jpg":
			$source=imagecreatefromjpeg($image); 
			break;
	    case "image/png":
		case "image/x-png":
			$source=imagecreatefrompng($image); 
			break;
  	}
	imagecopyresampled($newImage,$source,0,0,$start_width,$start_height,$newImageWidth,$newImageHeight,$width,$height);
	switch($imageType) {
		case "image/gif":
	  		imagegif($newImage,$thumb_image_name); 
			break;
      	case "image/pjpeg":
		case "image/jpeg":
		case "image/jpg":
	  		imagejpeg($newImage,$thumb_image_name,90); 
			break;
		case "image/png":
		case "image/x-png":
			imagepng($newImage,$thumb_image_name);  
			break;
    }
	chmod($thumb_image_name, 0777);
	return $thumb_image_name;
}
//You do not need to alter these functions
function getHeight($image) {
	$size = getimagesize($image);
	$height = $size[1];
	return $height;
}
//You do not need to alter these functions
function getWidth($image) {
	$size = getimagesize($image);
	$width = $size[0];
	return $width;
}
?> 		 