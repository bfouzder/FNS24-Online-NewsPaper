<?php 
$primary_key = 'admin_id';
$table_name = 'admin';
function getAdminRoleArray(){
	$role_array=array(
	'4'=>'Comment Moderator',
	'3'=>'Quote Moderator',
	'2'=>'Editor',
	'1'=>'Administrator',//Supper Administrator
	);
	return $role_array;
}	
$role_array=getAdminRoleArray();	
$q=trim($_REQUEST['q']);	
$q=($q)?$q:date('Y-m-d');	
?>

<?php
	$redurect_url ="reports/user-wise-news-count/";    
	$link ="siteadminpanel/reports/user-wise-news-count/?";    
	$parent=$db->get_post('parent');
	
  	$action  = $db->get('action');
  	$admin_id  = $db->get('eid');
  	if($action){
		  	switch($action){
		  		case 'edit':
		  					$edit=$db->getRowArray('admin',$admin_id);
		  					break;
	  		   	case 'delete':
	    	                 $sql = "DELETE FROM admin WHERE admin_id='$admin_id' AND admin_id!=1";
	  		                 $db->delete($sql);
	  		                 redirect($redurect_url);
	  		                 break;                
		  	}
		
  	}

  
    
?>



<div class="row">
<div class="col-xs-12 col-sm-12 col-md-12">
		<div class="panel panel-primary">
			<div class="panel-heading">
			  <h3 class="panel-title">Day wise news upload</h3>
			</div>
			<div class="panel-body">

<!--Listing-->	


<table class="table table-bordered">
<thead>
	<tr>
		<th style="text-align:center;">
		<!--bof search Panel-->	  
		<?php $sq=($q)?$q:"Enter search keywords here";?>
		<form class="form-inline" method="get" onsubmit="return checkSearch(this)">
			<div class="form-group">
				<label class="sr-only" for="exampleInputAmount">Search</label>
				<div class="input-group">
					<div class="input-group-addon">Select Date</div>
					<input type="date" class="form-control" name="q" value="<?=$q?>"   placeholder="<?=$sq?>" width="80%">
				</div>
			</div>
			<button type="submit" class="btn btn-info">GO</button>
		</form>
		<!--eof search Panel-->	 
		</th>
			</tr>
</thead>
</table>			
<div class="clearfix"></div>
<?php
$page = $db->get('page');
$link =$redurect_url."?";
	
		                   
	$sql_query="SELECT * FROM `admin` WHERE admin_id !=1 ";
	
	$pages = make_pagination($sql_query,$page);
	$sql_query .= " ORDER BY admin_id desc";
	$sql_query .= " LIMIT ".$pages['start_form'].",".$pages['per_page'];
	//echo $sql_query;
	$rows = $db->select($sql_query);
  //pre($rows);
?>	
<div class="clearfix"></div>	
<center>
	<table cellpadding="1" cellspacing="1" class="table table-bordered"  width="80%">
		<thead class="thead">
		<tr>
            <th width="30%">User </th>       
            <th>News Count</th> 
        </tr>
        </thead>
		
<tbody class="tbody">	
<?php
if($rows){
$i=0;
foreach ($rows as $val){
	$class=(($i%2)==0)?'col':'col1';
	//echo "select news_id from all_news where date(`date_added`)= '$q'";
	$uploaded_by=$val['admin_id'];
	$news_count=$db->affected("select news_id from all_news where uploaded_by = $uploaded_by AND  date(`date_added`)= '$q'");
?>	
	<tr class="<?=$class;?>">
		<td align="left"><b><?=$val['fname'];?> <?=$val['lname'];?></b>
		<br/><?=($role_array[$val['admin_level']]);?></td>
        <td><h3><?=($news_count);?></h3></td>
        		
		<!--  <td><a href="<?=SCRIPT_URL?>siteadminpanel/popup_scriptLogByMember/<?=$val['admin_name'];?>/<?=$val['admin_id'];?>" title="Log History"  class="fancybox fancybox.iframe" target="_blank"><button type="button" class="btn btn-info btn-xs"><i class="fa fa-history"></i> Log History</button></a></td>-->
		
	</tr>	
<?php
		$i++;					  
	}   /// end foreach	
}else{
?>	
	<tr class="<?=$class;?>"><td colspan="6">No User submitted</td></tr>
<?php
}
?>	
 </tbody>
        <tfoot class="tfoot">
          <tr>
            <td colspan="5">&nbsp;</td>
         </tr>
        </tfoot>    
</table>
</center>
<div class="datatbl">
<?php include(ADMIN_DIR.'templates/common/pagination.php'); ?>	
</div>
   
		</div><!--panel-body-->
	  </div>
	</div>
</div>