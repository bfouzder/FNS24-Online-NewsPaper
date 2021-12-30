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
				  <?=ShowSelectBoxQuoteTopicTreeWithOnChange($topic_id);?>
				</form> 
			</th>
			<th bgcolor="#fff" style="border-left:none;border-right:none;" valign="top">
				<a href="<?=SCRIPT_URL.$redirect_url?>?view=featured">
				<button type="button" class="btn btn-warning pull-right"style="margin-bottom:0"><i class="fa fa-bullseye" aria-hidden="true"></i> Show Featured Quotes </button></a>
			</th>
			<th bgcolor="#fff" style="border-left:none" valign="top">
				<a href="<?=SCRIPT_URL.$redirect_url?>">
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
		
			$quote_id=$value['quote_id'];
			$quote_text=$value['quote_text'];
		
			$class=(($i%2)==0)?'col':'col1';


$topic_ids=$value['topic_ids'];
$topic_names_array=array();
if($topic_ids){
    $topicIds=explode(',',$topic_ids);
    if($topicIds){
        foreach($topicIds as $k=>$topic_id){
            $topic_info=getTopicInfo($topic_id);
             $topic_url=__topic_url($topic_info['seo_title']);
              $topic_names_array[$topic_id]= '<a href="'.$topic_url.'" target="_blank">'. $topic_info['topic_name'].'</a>';
        } 
    }
}

$topics=implode(', ',$topic_names_array);

            $author='';
            if($value['author_id']){
               	$author_info=getAuthorInfo($value['author_id']);
    			$author_url=__author_url($author_info);
                $author='<a href="'.$author_url.'" target="_blank">'.$author_info['title'].'</a>'; 
            }
		
			$quote_url=__quote_url($value);
            
		?>
		  <tr class="<?=$class;?>" >
		  	<td>
			  <input type="checkbox" name="quote_id[]" id="checksingle<?php echo $key; ?>" value="<?= $value['quote_id'] ?>" />
            </td>
			<td><a href="<?=$quote_url?>" target="_blank"><?= trunc_string($value['quote_text'],100,'...'); ?></a></td>
	
			<td><?=$author; ?></td>
			<td><?=$topics; ?></td>

			<td>
				<?php if( $value['status'] == 1){ ?>
				<a href="<?=SCRIPT_URL.$redirect_url?>?action=disapprove&quote_id=<?= $value['quote_id'] ?>" title="Disapprove User" class="label label-success"><i class="fa fa-check" aria-hidden="true"></i> Approved</a>
				<?php }else{ ?>
				<a href="<?=SCRIPT_URL.$redirect_url?>?action=approve&quote_id=<?= $value['quote_id'] ?>" title="Approve User"  class="label label-default"><i class="fa fa-circle" aria-hidden="true"></i> Pending</a>
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
							<td><a href="<?=ADMIN_URL.'editQuote/'.$value['quote_id'].'/?page='.$pages['curr_page']?>" title="Edit" class="btn btn-default btn-xs"><i class="fa fa-pencil-square-o"> EDIT</i></a></td>
						   <td><a href="<?=SCRIPT_URL.$redirect_url?>?action=delete&quote_id=<?= $value['quote_id'] ?>" title="Delete" onclick="return confirm('Are You Sure You want to delete?')" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"> DEL</i> </a></td>
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