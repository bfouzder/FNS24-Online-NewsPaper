<?php
global $db;
require_once(BASE_DIR."includes/3rdParty/vimage/vImage.php");
$vImage = new vImage();	

if($db->post('docomment')){
    $user_id=state('CE_user_id');   
    if(!$user_id){redirect('auth/login/'.base64UrlEncode(CURRENT_URL));}
	$vImage->loadCodes();
	if($vImage->sessionCode != $vImage->postCode){
		 $error="Captcha doesn't match.Try again....";
	}else{
	    $_POST['user_id'] = $user_id;
		$comment_id = $db->bindPOST('comments','id');
		state('cm_message',"Thank you for your comment");
		urlredirect(CURRENT_URL);	
	}
}
?>
<script type="text/javascript">
function checkform(form){ 
   	if(form.comment.value==""){
   		$("#errordata").css('display','block');  $("#errordata").html(" Please enter your comments");	
   	}else if(form.vImageCodP.value==''){
   	    $("#errordata").css('display','block'); $("#errordata").html("Enter verify code");	 
	}else{
	   return true;
	}
 return false; 	
}

function slideSwitch() {
    var $active = $('#slideshow IMG.active');
    if ( $active.length == 0 ) $active = $('#slideshow IMG:last');
    var $next =  $active.next().length ? $active.next()
        : $('#slideshow IMG:first');
    $active.addClass('last-active');
    $next.css({opacity: 0.0})
        .addClass('active')
        .animate({opacity: 1.0}, 1000, function() {
            $active.removeClass('active last-active');
        });
}
$(function() {setInterval( "slideSwitch()", 25000 );});
</script>
<style type="text/css">
#slideshow {position:relative;width:249px; height:160px;}
#slideshow IMG {position:absolute;top:0;z-index:8;opacity:0.0;}
#slideshow IMG.active {z-index:10;opacity:1.0;}
#slideshow IMG.last-active {z-index:9;}
tr.f_thead td{ font-weight:bold; font-size: 14px; color:orange;}
</style>

<? if(getSettings('REMOVE_CONTENT_HREF')=='yes'){ ?>
<? if($info['rm_href']){ ?>
<style type="text/css">.main a{color:#5a555a;font-weight:normal;text-decoration:none;}</style>
<? } ?>
<? } ?>

<div class="main">
<h2><?=utf8_encode($info['article_title'])?></h2>
<? if($uploaded_by){ ?>
<p>Uploaded by: <?=$uploaded_by?> </p>
<? } ?>




<?php
$comments = getComments($comment_type,$comment_post_id); 
if($images){   
$view_image='<div class="slideshowcls">';
$slideShow=(count($images)>1)?true:false;

foreach($images as $k=>$image_info){
     $image_src=SCRIPT_URL.$image_info['image_path'].$image_info['image_name'];
    if($k=='0'){
     $view_image .='<img src="'.$image_src.'" alt="" width="244"  class="active" >';
    }else{
      $view_image .='<img src="'.$image_src.'" alt="" width="244" >';
    }
}
$view_image .='</div>';
if($slideShow){  
    $view_image='<div id="slideshow">'.$view_image.'</div>';
}
}else{
   $view_image ='<div class="slideshowcls"><img src="'.$img_srccc.'" alt="" width="244" ></div>'; 
} 
?> 

        

  
<?php
$description=formatDescription($info);
/*** bof middle banner ads**/
if($info['middlebanner']){
        #$google_code=showGoogleAds(2);
        $left_con_content='<div class="left-con">'.$view_image.'</div>';
  
}//if allow middle ads   

 
     
    $pos=getPosition($description);      
    $description = substr_replace($description, $left_con_content, $pos, 0) . "<br />\n";

/*** eof middle banner ads**/
echo $description;
?>       
<br style="clear: both;"/><br/>
<? if($files){
    $file_html='<table border="0" width="100%" cellpading="4" cellspacing="1" style="border:1px solid #eee;">';
    $file_html .='<tr class="f_thead">
            <td style="height:50px;font-weight:bold;" align="center">#SL</td>
            <td align="center">Name</td>
            <td align="center">Size</td>
             <td align="center">Download</td>
            </tr align="center">'."\n";
            
 foreach($files as $k =>$finfo){
    
    $dl_link='<a href="'.$finfo['file_path'].'"><img src="'.WWW_RESOURCE_STORE.'images/free down.png" height="45"></a>';
    $name=$finfo['file_name'];
    $color=(($k%2)==0)?'#E7EEF4':'#FFF';
     $file_html .='<tr bgcolor="'.$color.'"><td align="center">'.($k+1).'</td>
            <td align="center">'.$name.'</td>
            <td align="center">'.($finfo['file_size']/1000).' KB </td>
            <td align="center">'.$dl_link.'</td>
           
            </tr>'."\n";
 }
  $file_html .='</table>'."\n";
  echo $file_html;
     
}
?>
<br/><br/>

<?php
if($comment_type=="catarticles"){
$submitarticle_link=SCRIPT_URL.'submitarticle/section/'.$info['seo_title'];
    echo '<div align="left" style="float:left;"><a href="'.$submitarticle_link.'" title="Click here to upload a file into '.$info['menu_text'].' section"><i>Click here to submit an article into the <b>'.$info['menu_text'].'</b> section</i></a></div>';
}else{
$submitarticle_link=SCRIPT_URL.'submitarticle/section/'.$section_info['seo_title'];
    echo '<div align="left" style="float:left;"><a href="'.$submitarticle_link.'" title="Click here to upload a file into '.$section_info['menu_text'].' section"><i>Click here to submit an article into the <b>'.$section_info['menu_text'].'</b> section</i></a></div>';
}
?>
<p>&nbsp;</p>


<div class="clear"></div>
<?

if($info['cat_id']){

$subsections= ar_showSubMenu($info['cat_id']);    
if($subsections){
    echo  '<h>Choose</h1>'. $subsections;
}
}
?>

<div class="clear"></div>

<script>
function addRating(rateno){
   var rateno =parseInt(rateno);
   var ratimage='<li style="cursor: pointer;"><img src="<?=SCRIPT_URL?>includes/css/images/star/rate'+rateno+'.jpg" alt="star_1" title="1"/></li>';
   $('.content_rating').html(ratimage);
}
</script>

<ul class="content_rating">
    <li style="cursor: pointer;" onclick="addRating(1)"><img src="<?=SCRIPT_URL?>includes/css/images/star/star_0ff.jpg" alt="star_1" title="1"/></li>
    <li style="cursor: pointer;" onclick="addRating(2)"><img src="<?=SCRIPT_URL?>includes/css/images/star/star_0ff.jpg" alt="star_2" title="2"/></li>
    <li style="cursor: pointer;" onclick="addRating(3)"><img src="<?=SCRIPT_URL?>includes/css/images/star/star_0ff.jpg" alt="star_3" title="3"/></li>
    <li style="cursor: pointer;" onclick="addRating(4)"><img src="<?=SCRIPT_URL?>includes/css/images/star/star_0ff.jpg" alt="star_4" title="4"/></li>
    <li style="cursor: pointer;" onclick="addRating(5)"><img src="<?=SCRIPT_URL?>includes/css/images/star/star_0ff.jpg" alt="star_5" title="5"/></li>
</ul>
<div class="clear"></div>
<br/>
<br/>

<div align="right" style="float:right;width:168px;margin-top:2px;" >
<!-- AddThis Button BEGIN -->
<script type="text/javascript">var addthis_config = {"data_track_clickback":true};</script>
<div class="addthis_toolbox addthis_default_style" style="width: 165px;float:left;">
<a href="http://addthis.com/bookmark.php?v=250&amp;username=bfouzder" class="addthis_button_compact">Share</a>
<span class="addthis_separator">|</span>
<a class="addthis_button_facebook"></a><a class="addthis_button_myspace"></a><a class="addthis_button_googlebuzz"></a><a class="addthis_button_twitter"></a>
</div>
<script type="text/javascript" src="http://s7.addthis.com/js/250/addthis_widget.js#username=bfouzder"></script>
<!-- AddThis Button END -->
</div>

<div class="clear"></div>
<br/>
<div class="coment"><div class="coment-l"><div class="coment-r"><span class="comment-value">Viewed: <?=$info['viewed'];?> </span></div></div></div> 
<div class="coment"><div class="coment-l"><div class="coment-r"><span class="comment-value"><?php if($comments) echo count($comments); else echo "No";  ?> Comments</span></div></div></div> 
<div class="comment-area" style="margin-left:1px; width: 700px;">                    
<h2 class="response"> Comments </h2>
  <?php
  

	if($comments){ foreach($comments as $c=> $value){ 
	   
		  $comment_author=getUserName($value['user_id']);
          $cmtclass=($c%2==0)?'traceback-box':'alt-traceback-box';
          $comment_text=trunc_string(clean_html($value['comment']),800,false);
          $comment_text=wordwrap($comment_text, 25, "\n", true);
          ?>
          <div class="<?=$cmtclass?>">
             <h2 class="gavarter"> <?=$comment_author?> <span class="say">says:</span></h2>
             <div class="time1"><?=date("F j, Y, g:i a",strtotime($value['created']))?></div>
             <p><?=$comment_text;?></p>
              <span class="clear"></span>
          </div>
  <? } } ?>  
  <div class="comment-box"> 
<?php 	if(state('cm_message')){ $message=state('cm_message'); } include(TEMPLATE_STORE.'displaymessage.php'); ?>                    
    <form action="" method="post" onsubmit="return checkform(this)" >
       <input type="hidden" name="docomment" value="true" />
    	<input type="hidden" name="comment_type" value="<?=$comment_type?>" />
        <input type="hidden" name="post_id" value="<?=$comment_post_id?>" />
    
        <ul class="form">
        <li><label>Message</label><textarea name="comment" cols="75" rows="6" class="input-textarea"><?=$db->post('comment');?></textarea></li>
	    <li><label>Verify Code</label>
        		<div style="float:left;width: 123px;"><?php echo "<img src='".SCRIPT_URL."includes/3rdParty/vimage/img.php?size=4' />";?></div>
                <div style="float:left;width: 160px;">
        		<?php $vImage->showCodBox(1,"required='yes' validate='text' message='Enter Image Varification Text (case sensitive)' size='14' class='input-text-box'");?><br />
        		<?php echo "(case sensitive)"; ?></div> <span class="clear"></span>
		</li>
       <li>
			<label>&nbsp;</label>
			<input type="submit" name="" value="Submit" class="button" />  
            <?php if(!state('CE_user_id')){ ?>                                             
              &nbsp;  Only register user can do it, <a href="<?=THE_URL?>auth/login"> Login!</a>              
             <?php } ?>
		</li>
      </ul>	      
    </form>
    <span class="clear"></span>
  </div>
  <span class="clear"></span>
</div>
<? if($GASS['GASS_AROUND_COMMENT'] =='yes' ) { echo "\n".'<!-- google_ad_section_end -->'; } ?>


<? state('cm_message',''); ?>
<span class="clear"></span>






 
<script type="text/javascript">
function showgads(gac){
    var tlen=gac.length;
    for(var i=0; i<tlen;i++){
    var giddd=gac[i];
	setTimeout("Func1("+giddd+")", 1000);
    //document.getElementById('giddd'+giddd).style.display='block';
    }
}
function  Func1(giddd){
    //alert(giddd);
    $("#g"+giddd).css('display','block');
    return true;
}
$(document).ready(function() {showgads(gac);}); 
</script>
</div>