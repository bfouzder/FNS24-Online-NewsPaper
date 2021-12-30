<?php
$table_name=$tableName='books';
$primary_key=$primaryKey='book_id';
$page = $db->get_post('page');
$redirect_url ="siteadminpanel/manageBooks/";
$link ="siteadminpanel/manageBooks/?";

$get_action = $db->get('action');
$book_id = $db->get('book_id');
if($db->post('formSubmittedROWS')){
   $ids = $db->post($primary_key);
   $post_action = $db->post('action');
  	if($ids){  	

  		foreach($ids as $id){
  		    switch($post_action){
				case 'approve':
		    	                $sql = "UPDATE $table_name SET status = '1' WHERE $primary_key='$id'";
		  		                $db->edit($sql);
								
                               
		  		                break;
								
		  	   	case 'pending':
		    	                $sql = "UPDATE $table_name SET status = '0' WHERE $primary_key='$id'";
		  		                $db->edit($sql);
		  		                break;
	                case 'delete':									
								 $article_del_res=$db->delete("DELETE FROM $table_name WHERE  $primary_key='$id'");//only pending file should be delete
								 
		  		                break;
              	
                              
              	case 'unfeatured':
                                $sql = "UPDATE $table_name SET featured = '0' WHERE $primary_key='$id'"; // blacklisted
          		                $db->edit($sql);
          		                break; 
              	case 'featured':
                               echo  $sql = "UPDATE $table_name SET featured = '1' WHERE $primary_key='$id'"; // featured
          		                $db->edit($sql);
          		                break; 
              
                                  
  	         }//switch	
  		 }//foreach
  	  }//ids
  }

if($get_action){
    switch ($get_action){
		case 'Edit':                           
	   		  $edit = $db->getRowArray($table_name , array($primary_key=>$book_id));
			  break;

		case 'approve':
				$db->update("UPDATE books SET status='1' WHERE $primary_key=".$book_id);    
                                                 
				break;    	
		case 'pending':
				$db->update("UPDATE $table_name SET status='0' WHERE $primary_key=".$book_id);                   
				break;       
     
       case 'delete':
			$db->delete("DELETE FROM $table_name WHERE $primary_key=".$book_id);                   
			break;             
	}
    
   redirect($redirect_url);
}


#ROWS
$sql_query="SELECT * FROM `books` WHERE book_id !='' ";
$view=$db->db_prepare_input($db->get('view'));
if($db->get_post('sq')){
	$q=$db->get_post('sq');
	if(is_numeric($q)){
		$sql_query .= "  AND book_id='$q' ";
	}elseif(is_string($q)){
			$sql_query .= "  AND title='".$db->db_input($q)."' OR title LIKE '%".$db->db_input($q)."%' ";
	}

$link .="sq=$q&";
}



if($view){    
if($view=='featured'){
     $sql_query .= "  AND `featured` =1 ";
     $link .="view=$view&";
}elseif($view=='pending'){          
   $sql_query .= "  AND status='0' AND `featured` =0 ";
    $link .="view=$view&";
}
}

	                         
$pages = make_pagination($sql_query,$page);
$sql_query .= " ORDER BY book_id DESC";
$sql_query .= " LIMIT ".$pages['start_form'].",".$pages['per_page'];
//echo $sql_query;
$rows = $db->select($sql_query);
//pre($rows);
 
  ?>   

<div class="page-title">
              <div class="title_left">
                <h3>Manage Books <small>Book manager</small></h3>
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
			  <h3 class="panel-title">Manage Books</h3>
			</div>
			<div class="panel-body">	 
 <form action="" method="post"  class="form-inline"  onsubmit="return check_action()">	  
 <table class="table table-bordered">
	<thead>
        <thead class="thead">
          <tr>
          	<th width="5%"><input type="checkbox" id="check_uncheck_top" value="all" onclick="__checkAll(<?= $rows?count($rows): 0 ?>,'check_uncheck_top')" /></th>
          	<th>Title</th>
			<th>Author</th> 
			<th>ISBN</th> 
			<th>Release Date</th> 
            <th>Type</th>
            <th>Avatar</th>
            <th>Status</th>
	        <th width="20%">Action</th>
          </tr>
        </thead>
        <tbody class="tbody">
          <?php 
		if($rows){
          $i=0;
		  foreach($rows as $key => $value){
		
			$book_id=$value['book_id'];
			$book_release_date=$value['book_release_date'];
			$book_author=$value['book_author'];
			$book_type=$value['book_type'];
			$isbn_no=$value['isbn_no'];
			$avatar=$value['avatar'];
			$title=$value['title'];
		     $occasion_url = __occasion_url($value);
			$class=(($i%2)==0)?'col':'col1';


            
		?>
		  <tr class="<?=$class;?>" >
		  	<td>
			  <input type="checkbox" name="book_id[]" id="checksingle<?php echo $key; ?>" value="<?= $value['book_id'] ?>" />
            </td>
			<td><a href="<?=$book_url?>" target="_blank"><?=$title?></a></td>
			<td><?=$book_author?></td>
			<td><?=$isbn_no?></td>
            <td><?=$book_release_date?></td>			
			<td><?=$book_type?></td>
			<td><?php if($value['avatar']){ 
                //echo IMAGE_URL.$table_name.'/thumb_'.$value['avatar'];
                echo '<img src="'.IMAGE_URL.$table_name.'/medium_'.$value['avatar'].'" alt="'.$value['avatar'].'" width="80">';
            }
            ?></td>
			<td>
				<?php if( $value['status'] == 1){ ?>
				<a href="<?=SCRIPT_URL.$redirect_url?>?action=disapprove&book_id=<?= $value['book_id'] ?>" title="Disapprove" class="label label-success"><i class="fa fa-check" aria-hidden="true"></i> Approved</a>
				<?php }else{ ?>
				<a href="<?=SCRIPT_URL.$redirect_url?>?action=approve&book_id=<?= $value['book_id'] ?>" title="Approve"  class="label label-default"><i class="fa fa-circle" aria-hidden="true"></i> Pending</a>
				<?php } ?>
			</td>
			
		

			<td>
				<table border="0" cellpadding="2" cellspacing="2">
						 <tr>
							<td><a href="<?=SCRIPT_URL.$redirect_url.'?actionid=edit&id='.$value['book_id'].'&page='.$pages['curr_page']?>" title="Edit" class="btn btn-default btn-xs"><i class="fa fa-pencil-square-o"> EDIT</i></a></td>
						   <td><a href="<?=SCRIPT_URL.$redirect_url?>?action=delete&book_id=<?= $value['book_id'] ?>" title="Delete" onclick="return confirm('Are You Sure You want to delete?')" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"> DEL</i> </a></td>
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