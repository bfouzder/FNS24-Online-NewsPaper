<?php
$table_name='articles';
$primary_key='article_id';
$page = $db->get_post('page');
$redirect_url ="siteadminpanel/manageQuotes/";
$link ="siteadminpanel/manageQuotes/?";

if($db->post('formSubmitted'))
	{

        $article_title= $db->post('article_title');
        $cat_id= $db->post('cat_id');
        $menu_text= $db->post('menu_text');
		$seo_title= $db->db_prepare_input($db->post('seo_title'));
        $seo_title=($seo_title)?$seo_title:makeurl($menu_text);
		echo $menu_text .'<br>seo_title '. $seo_title .'<br/>cat_id'.  $cat_id;
		
		if($menu_text && $seo_title && $cat_id){
		  $_POST['article_title']=$menu_text;
		  $_POST['browser_title']=$menu_text;
  
          $_POST['topbanner']=isset($_POST['topbanner'])?'1':'0';
          $_POST['rightbanner']=isset($_POST['rightbanner'])?'1':'0';
          $_POST['middlebanner']=isset($_POST['middlebanner'])?'1':'0';
          $_POST['middle_topbanner']=isset($_POST['middle_topbanner'])?'1':'0';
    

			#pre($_POST);exit;
			$article_id=$_POST['article_id'];
			$_POST['seo_title']=$seo_title;
			$db->bindPOST($table_name , $primary_key);
            redirect($redirect_url);          
		   
		  }else{
			   echo $error ="Section ,Quote Title, MenuText,  SEO cann't be empty";		  	
		  }
	}	


if($db->get('actionid') == 'edit'){
$id=$db->get('id');
$article_info= $edit = $db->getRowArray($table_name , array($primary_key=>$id));
    			;
//pre($article_info);
}
?>
<div class="row" id="add_edit_block"  style="display:block">
<?php
 if($db->get('actionid')=='add'){ 
$panel_title="Add New Quote";
 }elseif($edit){ 
$panel_title="Update Quote";
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
		<form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="POST" >
		 <input type="hidden" name="formSubmitted" value="1" >
		 <?php if($edit){ ?>
		 <input type="hidden" name="<?=$primary_key?>" value="<?=$edit[$primary_key]?>" >
		 <?php } ?>

			
<div class="panel panel-success">
	<div class="panel-heading">
	  <h3 class="panel-title">Quote Information</h3>
	</div>
	<div class="panel-body">		
		<div class="form-group">
			<label class="control-label col-md-2 col-sm-3 col-xs-12" for="name">Quote Types:</label>
			<div class="col-md-9 col-sm-9 col-xs-12">
			  <?=ShowSelectBoxArticleCategoryTree2($edit['cat_id']);?>
			</div>
		</div>
		
		<div class="form-group">
			<label class="control-label col-md-2 col-sm-3 col-xs-12" for="name">Title:</label>
			<div class="col-md-9 col-sm-9 col-xs-12">
			  <input type="text" name="menu_text" value="<?=$edit['menu_text']?>" required="required" class="form-control col-md-7 col-xs-12">
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-md-2 col-sm-3 col-xs-12" for="name">SEO URL:</label>
			<div class="col-md-9 col-sm-9 col-xs-12">
			  <input type="text" name="seo_title"  value="<?=$edit['seo_title']?>" class="form-control col-md-7 col-xs-12">
			</div>
		</div>
		
		<div class="form-group">
			<label class="control-label col-md-2 col-sm-3 col-xs-12" for="name">Quote:</label>
			<div class="col-md-9 col-sm-9 col-xs-12">
					  <textarea id="editor"  name="description" class="form-control"><?=$edit['description']?></textarea>
			</div>
		</div>
		<div class="form-group">
			<label for="FirstName" class="col-xs-12 col-sm-2 control-label">Template Type:</label>
			<div class="col-md-9 col-sm-9 col-xs-12">
				<select  name="file_type" class="form-control">
					<option value="">Choose Template</option>
					<option value="black" <? if($article_info['file_type'] =='black'){?>  selected="selected" <? } ?>>Black</option>
					<option value="red" <? if($article_info['file_type'] =='red'){?>  selected="selected" <? } ?>>Red</option>
					<option value="green" <? if($article_info['file_type'] =='green'){?>  selected="selected" <? } ?>>Green</option>
					<option value="blue" <? if($article_info['file_type'] =='blue'){?>  selected="selected" <? } ?>>Blue</option>
					<option value="violet" <? if($article_info['file_type'] =='violet'){?>  selected="selected" <? } ?>>Violet</option>
					<option value="orange" <? if($article_info['file_type'] =='orange'){?>  selected="selected" <? } ?>>Orange</option>
					<option value="pink"<? if($article_info['file_type'] =='pink'){?>  selected="selected" <? } ?>>Pink</option>
				</select>
			</div>
		</div>
		<div class="form-group">
			<label for="SelectAuthor" class="col-xs-12 col-sm-2 control-label"> Author:</label>
			<div class="col-md-9 col-sm-9 col-xs-12">		
				<select name="user_id" class="form-control">
					<option value="">Select Author</option>
					<?php 
					$all_authors =$db->select("select * from users where user_status =1 order by user_name");
					if($all_authors){
					foreach($all_authors as $k=>$u_info){
					$sel=($edit['user_id'] ==$u_info['user_id'] )?' selected="selected"':'';	
					echo '<option value="'.$u_info['user_id'].'"'.$sel.'>'.$u_info['user_fname'].' '.$u_info['user_lname'].'</option>'."\n";	
					}}?>
				</select>	
			</div>
		</div>			  
	</div><!--/panel-body-->
</div><!--/panel-->	
<div class="panel panel-success">
	<div class="panel-heading">
	<h3 class="panel-title">Meta Information</h3>
	</div>
	<div class="panel-body">
		<div class="form-group">
			<label class="control-label col-md-2 col-sm-3 col-xs-12" for="name">Meta Keyword:</label>
			<div class="col-md-9 col-sm-9 col-xs-12">
			  <input type="text" name="meta_kw" value="<?= $edit['meta_kw'] ?>"  class="form-control col-md-7 col-xs-12">
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-md-2 col-sm-3 col-xs-12" for="name">Meta description:</label>
			<div class="col-md-9 col-sm-9 col-xs-12">
			  <input type="text" name="meta_desc" value="<?= $edit['meta_desc'] ?>" class="form-control col-md-7 col-xs-12">
			 
			</div>
		</div>
	</div><!--/panel-body-->
</div><!--/panel-->		  
		  <div class="form-group submit_sec">
			<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
			    <button type="submit" name="submit" class="btn btn-success">Submit</button>
				  <button type="reset" class="btn btn-primary">Reset</button>
				  <a class="btn btn-danger" href="<?=$redirect_url?>">Cancel</a>
			</div>
		  </div>
		</form>
	  </div>
	</div>
  </div>
</div>