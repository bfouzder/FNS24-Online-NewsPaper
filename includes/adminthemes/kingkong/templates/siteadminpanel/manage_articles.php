<?php
$table_name=$tableName='articles';
$primary_key=$primaryKey='article_id';
$page = $db->get_post('page');
$redirect_url ="siteadminpanel/manageQuotes/";
$link ="siteadminpanel/manageQuotes/?";
$cat_id=$db->get_post('cat_id');

    $get_action = $db->get('action');
	$article_id = $db->get('article_id');
	if($db->post('formSubmittedROWS')){
	   $ids = $db->post($primary_key);
	   $post_action = $db->post('action');
	  	if($ids){  	
 
	  		foreach($ids as $id){
	  		    switch($post_action){
 					case 'approve':
			    	                $sql = "UPDATE $table_name SET active = '1' WHERE $primary_key='$id'";
			  		                $db->edit($sql);
									
                                    #bof news Feed 
                                    $a_info= getArticleInfo($id);
                                    $newsfeed =array('type'=>'articles','type_id'=>$id,'user_id'=>$a_info['user_id'],'news_text'=>$a_info['menu_text'],'news_link'=>$news_link);
                                    $ide=$db->bindPOST('newsfeed','id',$newsfeed);
                                    #eof news Feed  
			  		                break;
									
			  	   	case 'pending':
			    	                $sql = "UPDATE $table_name SET active = '0' WHERE $primary_key='$id'";
			  		                $db->edit($sql);
			  		                break;
		                case 'delete':									
									 $article_del_res=$db->delete("DELETE FROM $table_name WHERE active = '0' AND $primary_key='$id'");//only pending file should be delete
									 if($article_del_res){
									 $article_del_img_res=$db->delete("DELETE FROM `images` WHERE type='$ImageType' AND type_id='$id'");
									 $article_del_file_res=$db->delete("DELETE FROM `files` WHERE type='$ImageType' AND type_id='$id'"); 									
									}
			  		                break;
                  	
                                  
                  	case 'unfeatured':
                                    $sql = "UPDATE $table_name SET featured = '0' WHERE $primary_key='$id'"; // blacklisted
              		                $db->edit($sql);
              		                break; 
                  	case 'featured':
                                   echo  $sql = "UPDATE $table_name SET featured = '1' WHERE $primary_key='$id'"; // featured
              		                $db->edit($sql);
              		                break; 
                  	case 'hiderightads':
                	                $sql = "UPDATE $table_name SET rightbanner = '0' WHERE $primary_key='$id'";
              		                $db->edit($sql);
              		                break;                              
                    
                                      
	  	         }//switch	
	  		 }//foreach
	  	  }//ids
      }

    if($get_action){
           
             
        switch ($get_action){
    		case 'Edit':                           
    	   		  $edit = $db->getRowArray($table_name , array($primary_key=>$article_id));
    			  break;
    
    		case 'active':
    				$db->update("UPDATE articles SET active='1' WHERE $primary_key=".$article_id);    
                    #bof news Feed 
                      $a_info= getArticleInfo($article_id);
                      $newsfeed =array('type'=>'articles','type_id'=>$article_id,'user_id'=>$a_info['user_id'],'news_text'=>$a_info['menu_text'],'news_link'=>$news_link);
                      $ide=$db->bindPOST('newsfeed','id',$newsfeed);
                    #eof news Feed  
                                 
    				break;    	
    		case 'inactive':
    				$db->update("UPDATE $table_name SET active='0' WHERE $primary_key=".$article_id);                   
    				break;
           
           case 'featured':
		   
            	$db->update("UPDATE $table_name SET featured='1' WHERE $primary_key=".$article_id);                   
    			break;        
           case 'unfeatured':
            	$db->update("UPDATE $table_name SET featured='0' WHERE $primary_key=".$article_id);                   
    			break;
           case 'delete':
				$db->delete("DELETE FROM $table_name WHERE $primary_key=".$article_id);                   
				break;             
    	}
        
       redirect($redirect_url);
    }
 
	
	#ROWS
	$sql_query="SELECT * FROM `articles` WHERE article_id !='' ";
	$view=$db->db_prepare_input($db->get('view'));
	if($db->get_post('sq')){
		$q=$db->get_post('sq');
		if(is_numeric($q)){
			$sql_query .= "  AND article_id='$q' ";
		}elseif(is_string($q)){
				$sql_query .= "  AND menu_text='".$db->db_input($q)."' OR article_title LIKE '%".$db->db_input($q)."%' ";
		}
        $link .="sq=$q&";
	}
	 if($cat_id){
	   $sql_query .= "  AND cat_id='$cat_id' ";		
       $link .="cat_id=$cat_id&";
    }
    
	
if($view){    
	if($view=='featured'){
         $sql_query .= "  AND `featured` =1 ";
         $link .="view=$view&";
    }elseif($view=='pending'){          
	   $sql_query .= "  AND active='0' AND `featured` =0 ";
        $link .="view=$view&";
    }
}
	
    	                         
	$pages = make_pagination($sql_query,$page);
	$sql_query .= " ORDER BY article_id DESC";
	$sql_query .= " LIMIT ".$pages['start_form'].",".$pages['per_page'];
	//echo $sql_query;
	$rows = $db->select($sql_query);
  //pre($rows);
	 
  ?>   

<div class="page-title">
              <div class="title_left">
                <h3>Manage Quotes <small>Quote manager</small></h3>
              </div>

              <div class="title_right">
               
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
				<form class="" method="get" onsubmit="return checkSearch(this)">
			     <div class="input-group">
                    <input type="text" name="sq"  class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                      <button class="btn btn-default" type="submit">Go!</button>
                    </span>
                  </div>
				 </form>		 
                </div>
              </div>
            </div>

            <div class="clearfix"></div>
  
<!--bof search Panel-->  
<table class="table table-bordered"  width="50%" bgcolor="#fff">
	<thead>
		<tr>
			<th bgcolor="#fff" style="border-right:none" valign="top">
				<form action="" method="get">
				  <?=ShowSelectBoxArticleCategoryTreeWithOnChange($cat_id);?>
				</form> 
			</th>
			<th bgcolor="#fff" style="border-left:none;border-right:none;" valign="top">
				<a href="<?=SCRIPT_URL.$redirect_url?>?view=featured">
				<button type="button" class="btn btn-warning pull-right"style="margin-bottom:0"><i class="fa fa-bullseye" aria-hidden="true"></i> Show Featured Quotes </button></a>
			</th>
			<th bgcolor="#fff" style="border-left:none" valign="top">
				<a href="<?=$redirect_url?>">
				<button type="button" class="btn btn-default pull-right"style="margin-bottom:0"><i class="fa fa-refresh" aria-hidden="true"></i> Show All </button></a>
			</th>
		</tr>
	</thead>
</table>
<!--eof search Panel--> 
<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12">
		<div class="panel panel-success">
			<div class="panel-heading">
			  <h3 class="panel-title">Manage Quotes</h3>
			</div>
			<div class="panel-body">	 
 <form action="" method="post"  class="form-inline"  onsubmit="return check_action()">	  
 <table class="table table-bordered">
	<thead>
        <thead class="thead">
          <tr>
          	<th width="5%"><input type="checkbox" id="check_uncheck_top" value="all" onclick="__checkAll(<?= $rows?count($rows): 0 ?>,'check_uncheck_top')" /></th>
          	<th>Title</th>
          	<th>Quote</th>
			<th>Author</th> 
            <th>Topics  </th>
            <th>Status</th>
			<th>Featured</th>
	        <th width="20%">Action</th>
          </tr>
        </thead>
        <tbody class="tbody">
          <?php 
		if($rows){
          $i=0;
		  foreach($rows as $key => $value){
		
			$article_id=$value['article_id'];
			$menu_text=$value['menu_text'];
			$user_fullname=$value['page_titlle'].' '.$value['user_lname'];
			$class=(($i%2)==0)?'col':'col1';

			$submit_by=getUserName($value['user_id']);
			$cat_info=getSectionInfo($value['cat_id']);
			$cat_name=$cat_info['menu_text'];
		?>
		  <tr class="<?=$class;?>" >
		  	<td>
			  <input type="checkbox" name="article_id[]" id="checksingle<?php echo $key; ?>" value="<?= $value['article_id'] ?>" />
            </td>
			<td><?= $value['menu_text']; ?></td>
			<td><?= $value['description']; ?></td>
			<td><?=$submit_by; ?></td>
			<td><?=$cat_name; ?></td>

			<td>
				<?php if( $value['active'] == 1){ ?>
				<a href="<?=SCRIPT_URL.$redirect_url?>?action=disapprove&article_id=<?= $value['article_id'] ?>" title="Disapprove User" class="label label-success"><i class="fa fa-check" aria-hidden="true"></i> Approved</a>
				<?php }else{ ?>
				<a href="<?=SCRIPT_URL.$redirect_url?>?action=approve&article_id=<?= $value['article_id'] ?>" title="Approve User"  class="label label-default"><i class="fa fa-circle" aria-hidden="true"></i> Pending</a>
				<?php } ?>
			</td>
			
			<td width="7%"> 
				<?php if($value['featured']==1){?> 
				<a href="<?= SCRIPT_URL.$link.'page='.$pages['curr_page']?>&action=unfeatured&<?=$primary_key.'='.$value[$primary_key]?>" class="btn btn-warning btn-xs" title="Remove featured"  /><i class="fa fa-bullseye" aria-hidden="true"></i> Featured</a> 
				<?php	}else{ ?>
				<a href="<?= SCRIPT_URL.$link.'page='.$pages['curr_page']?>&action=featured&<?=$primary_key.'='.$value[$primary_key]?>" class="btn btn-default btn-xs">Make Featured</a>
				<?php	} ?>     
			</td> 

			<td>
				<table border="0" cellpadding="2" cellspacing="2">
						 <tr>
							<td><a href="<?=SCRIPT_URL.$redirect_url?>?actionid=edit&id=<?= $value['article_id'] ?>" title="Edit" class="btn btn-default btn-xs"><i class="fa fa-pencil-square-o"> EDIT</i></a></td>
						   <td><a href="<?=SCRIPT_URL.$redirect_url?>?action=delete&article_id=<?= $value['article_id'] ?>" title="Delete" onclick="return confirm('Are You Sure You want to delete?')" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"> DEL</i> </a></td>
						 </tr>
				 </table>	
			</td>
          </tr>
          <?php
				$i++;					  
				}   /// end foreach
			}else{
		  ?>
		  <tr class="col" >
            <td colspan="8">No Result Found.</td>
          </tr>
          <?php
          }
		  ?>

          <tr>
		     <th align="left"><input type="checkbox" id="check_uncheck_bottom" value="all" onclick="__checkAll(<?= $rows?count($rows): 0 ?>,'check_uncheck_bottom')" /></td>
         	
			 <td colspan="10" align="left">
					<div class="form-group">
						<select name="action" class="form-control" id="p_action" required="required">
							<option value="">Select Action</option>
							<optgroup label="Approve Pending Delete">
								<option value="approve" <?php if($db->post('action')=='approve'){ ?> selected="selected" <?php } ?>>Make Approve</option>
								<option value="pending" <?php if($db->post('action')=='pending'){ ?> selected="selected" <?php } ?>>Make Pending</option>
								
								<option value="delete" <?php if($db->post('action')=='delete'){ ?> selected="selected" <?php } ?>>Make Delete</option>
							</optgroup>  
							
							
						   <optgroup label="Featured OR Not*">    
							   <option value="featured" <?php if($db->post('action')=='featured'){ ?> selected="selected" <?php } ?>>Featured (For Home Slider)</option>
							   <option value="unfeatured" <?php if($db->post('action')=='unfeatured'){ ?> selected="selected" <?php } ?>>Remove from Home Slider</option>
							</optgroup>    
    	          
						</select>
					</div>
					<input type="submit" value="Submit" name="" class="btn btn-success"  style="position:relative; top:3px;"/>
					
            <input type="hidden" value="true" name="formSubmittedROWS"/>
           </td>
          </tr>
    	</tbody>
      
      </table>
    </form>
	
  <?php 
 // echo ADMIN_TEMPLATE_STORE.'pagination_all.php';
  require(ADMIN_TEMPLATE_STORE.'pagination_raw.php');	?> 
			</div><!--panel-body-->
	  </div>
	</div>
</div>
<script language="javascript" type="text/javascript">
function __checkAll( row, check_id ){
	var ar_checked=document.getElementById(check_id).checked;
	if(row) {
		 for( var i=0; i<row; i++ ){
				var single = 'checksingle'+i;
				document.getElementById(single).checked = ar_checked;
		 }
	}
}       
</script>