<?php
function getNameOfForm($id){
	global $db;
	$name = $db->select_single("Select * from forms where form_id=".$id);
	return $name['form_name'];
}

#DELETE 
$action = $db->get_post('action');
if( $action =='delete' ){
	$app_id = $db->get_post('app_id'); 
	$del_query = "DELETE FROM form_applicants WHERE app_id='$app_id'";
	if($db->delete( $del_query )){
		$db->delete( "DELETE FROM form_applicants_statuslog WHERE app_id='$app_id'");
	}
}

$form_status_array=array('Pending'=>'0','Forwarded'=>'3','Rejected'=>'2','Approved'=>'1');
$view_app_status=0;
$user_id=$user_info['user_id'];		

	$sql_query = "SELECT * FROM form_applicants WHERE app_id!='' ";
	//echo $sql_query;
	$sq = $db->get('sq');


		$page = $db->get('page'); 
		$page = isset($params['0'])?$params['0']:1;
		$page = $db->get('page');
		$link ="faculty/allapplications/?";
		
		//pre($params);
		$sq=$db->get_post('sq');
	
		if($sq){
		 $sq=trim($sq);
         $typeids=$db->select("Select user_id from users WHERE department ='$sq'");
          //pre($typeids);
          
		 $sql_query .= " AND type_id IN(SELECT user_id from users WHERE department ='$sq')"; 
		 $link .='sq='.$sq.'&';
		}
		$form_id=$db->get_post('form_id');
		if($form_id){
		 $sql_query .= " AND form_id='$form_id'"; 
		 $link .='form_id='.$form_id.'&';
		}
		
       	$app_status=$db->get_post('app_status');
		if($app_status){
		  $app_status_value=$form_status_array[$app_status];
		 $sql_query .= " AND status_id='$app_status_value'"; 
		 $link .='app_status='.$app_status.'&';
		}
        
		$df=$db->get_post('df');
		$dt=$db->get_post('dt');
		if($df && $dt ){
			$dts=explode("-",$dt);
			$dtsq=  date("Y-m-d",mktime(0, 0, 0, $dts[1]  , ($dts[2]+1), $dts[0]));		
			$sql_query .= " AND date_added between date('$df') AND date('$dtsq') "; 

			$pages = make_pagination_all($sql_query,$page,$p_limit=5000);
			$sql_query .= " ORDER BY date(`date_added`) ASC ";
			$sql_query .= " LIMIT ".$pages['start_form'].",".$pages['per_page'];
			$link .='dt='.$dt.'&df='.$df.'&';

		}else{
			$pages = make_pagination_all($sql_query,$page,$p_limit=35);
			$sql_query .= " ORDER BY `date_added` DESC ";	
			$sql_query .= " LIMIT ".$pages['start_form'].",".$pages['per_page'];
		}
		
	
	//echo $sql_query;
	
	
	$rows = $db->select($sql_query);
	
	$html='';
	
$csv_data='DATE,NAME,FORM'."\n";

	
	//pre($rows);
	if($rows){
		
		$th_html =' <th  width="1%">#</th>
					<th class="column-title"  width="40%">Applied By</th>
					<th class="column-title"  width="5%">Status</th>
					<th class="column-title" width="30%" colspan="2">Application Info</th>
					<th class="column-title"width="15%">Submit Date</th>
					<th class="column-title no-link last"><span class="nobr">Action</span>
					</th>';
		$i=0;
		foreach($rows as $k=>$application_info){
		  
          
          if($application_info['leave_type']){
			  
			 $day_days=($application_info['leave_total_days']>1)?'Days':'Day'; 
		     $form_result= '<b>From</b> '.date_time($application_info['start_date'],false).' <br/><b>To</b> '.date_time($application_info['end_date'],false);
		     $form_result .= '<br/><b>Total '.$application_info['leave_total_days'].' '.$day_days.'</b>';
		  }elseif($application_info['form_id'] == 9){
			  
			    $re_specifications = ar_unserialize($application_info['re_specifications']);
                //pre($re_specifications);
                $product_id=$re_specifications['re_product'][0];
                $productInfo = getProductInfo($product_id);
                $productName = $productInfo['product_name'];
                $productCategory=$productInfo['category'];
                $form_result= 'Category: '.$productCategory.' Product:  '.$productName;
		  }else{
		      $form_result= '';  
		  }
          
			
			$cls = ($i%2==0? "even pointer":"odd pointer");
			$app_id=$application_info['app_id'];
			$form_id=$application_info['form_id'];
			$status=$application_info['status_id'];
			$status_id=$application_info['status_id']+1;
			$uinfo=getUserInfo($application_info['type_id']);
			$uname = getUserFullName($application_info['type_id']);
			$uname =strtoupper($uname);
			$form_info = getFormInfo($application_info['form_id']);
			
			$form_view_url=str_replace('formentry','formview',$form_info['url']);
			//$username = $application_info['type_id'];
            
			
						
			if($form_id==8){
				$approve_text='Approved';
			}else{
				$approve_text='Completed';
			}
            
			if($status == 1){
				$form_status='<b style="color:#26B99A"><i class="fa fa-check-circle" aria-hidden="true"></i> '.$approve_text.'</b>';
			}elseif($status == 2){
				$form_status='<b style="color:#ff0000"><i class="fa fa-minus-circle" aria-hidden="true"></i> REJECTED</b>';
			}elseif($status == 3){
				$form_status=' <b><i class="fa fa-forward" aria-hidden="true"></i> Forwarded</b>';
			}else{
				$form_status=' <b>Pending</b>';
			}
			
			
			
			
			
            $form_del= '';
            if(state('AR_user_name') == 'ataul'){
                $del_url=ADMIN_URL.'allapplications/?action=delete&app_id='.$app_id;
                $form_del= '<form action="" method="post"><input type="hidden" name="action" value="delete"><input type="hidden" name="app_id" value="'.$app_id.'"><button type="submit" onclick="return confirm(\'Are your sure you want to delete\')" ><i class="fa fa-minus-square" aria-hidden="true"></i> DEL</button></form>'; 
            }
            
			$html .='<tr class="'.$cls.'">
                            <td class="a-center ">
                              <br/>
                              '.($k+1).'
                            </td>
                           
                            <td width="25%">
                            <h4>'.$uname.' </h4>
							<strong>Designation:</strong> '.$uinfo['user_designation'].' <br/>
                            <strong>Department:</strong> '.$uinfo['department'].' <br/> 
                            <strong>Email:</strong> '.$uinfo['user_email'].' <br/> 
                            <strong>E-TokenId:</strong><br/> 
                            <strong>#'.__ETokenId($app_id).'</strong>
                            </td>
                            <td width="15%">'.$form_status.'</td>
                            <td>'.$form_info['form_name'].'</td>
                            <td>'.$form_result.'</td>
                         
							<td>'.$application_info['date_added'].'</td>
							
							<td>

<a href="'.SCRIPT_URL.'faculty/'.$form_view_url.'/print?app_id='.$application_info['app_id'].'" class="fancybox fancybox.iframe btn btn-info btn-xs"><i class="fa fa-eye" aria-hidden="true" title="VIEW"></i> View</a>
<a href="'.SCRIPT_URL.'faculty/getLogs/print?app_id='.$application_info['app_id'].'" class="fancybox fancybox.iframe btn btn-warning btn-xs">LOG STATUS</button></a>
'.$form_del.'
</td>
                          </tr>'."\n";
			
			/////////////
			$csv_data .=$application_info['date_added'] .','.
			$uname.','.
			$form_info['form_name']."\n"; 
		
		if($df && $dt ){
		$login_user_id=$user_info['user_name'];
		$ar_csv_path=FILE_DIR.'csvreport/';
		$ar_csv_url=FILE_URL.'csvreport/';
		$csv_file_name=$login_user_id.'_'.date("Y-m-d_h").'.csv';
		@file_put_contents($ar_csv_path.$csv_file_name,$csv_data);
		$csv_download_url=$ar_csv_url.$csv_file_name;
		}
			/////////////
			
			
				
		$i++;}//foreach
		
	}//if

?>




<div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12">
  
<div class="x_panel">
	  <div class="x_title">
		<h2>All Applications<small> with customize report total <?=$pages['total_data']?></small></h2>                    
		<div class="clearfix"></div>
	  </div>
	  <div class="x_content">
		<br />
        <!--bof search Panel-->	  

<link rel="stylesheet" type="text/css" href="<?php echo SCRIPT_URL; ?>/includes/scripts/sortable/bootstrap-sortable.css">
<script src="<?php echo SCRIPT_URL; ?>/includes/scripts/sortable/bootstrap-sortable.js"></script>
<?php include(TEMPLATE_STORE.'displaymessage.php');
//echo "SELECT * FROM users WHERE user_role='$HH_officeid'";
?>

<link href="<?=SCRIPT_URL?>includes/datepicker/ui.all.css" rel="stylesheet" type="text/css"/>
<script src="<?=SCRIPT_URL?>includes/datepicker/ui.datepicker.js" type="text/javascript"></script>

<script type="text/javascript">
	$(function() {
		$("#datepicker").datepicker();
		$('#datepicker').datepicker('option', {dateFormat: 'yy-mm-dd'}); 
				
		$("#datepicker2").datepicker();
		$('#datepicker2').datepicker('option', {dateFormat: 'yy-mm-dd'}); 
	});
</script>
<?php //eof FORM CHECK  ?>
<style>
ul.signup li{list-style-type:none;}
#ui-datepicker-div{display:none;}
</style>

<?php 
$sql="SELECT * FROM users WHERE user_type !='student'";
$sql .=" ORDER BY user_fname";	
$officers= $db->select($sql);
?>
	
<form class="form-inline" method="get" action="<?=ADMIN_URL.'allapplications/'?>" onsubmit="return checkSearch(this)">
	<div class="form-group">
		<div class="input-group">
        <?php $dept=$db->get('sq');?>
			<!--<div class="input-group-addon">Search</div>
			<input type="text" name="sq" class="form-control" placeholder="Search keywords" width="60%">-->
			<select name="sq" class="form-control" onchange="submit(this);" style="width:190px;margin-right:5px;">
				<option value="">--All Faculty--</option>
                	<?= department_options($dept); ?>
				<?php 
	/*
				if($officers){
					foreach ($officers as $k=>$uinfo){
						$user=$db->get('sq');
						$uinfo['user_fname']=($uinfo['user_fname'])?$uinfo['user_fname']:$uinfo['user_name'];
						$sel=($user ==$uinfo['user_id'] )?' selected="selected"':'';
						echo '<option value="'.$uinfo['user_id'].'"'.$sel.'>'.$uinfo['user_fname'].', ' .$uinfo['user_designation'].'</option>'."\n";
											
					}
				}
                */
				?>				
			</select>
            	<label class="sr-onlys" >&nbsp;</label>
			<select name="form_id" class="form-control" style="width:180px;margin-right:5px;">
				<option value="">--Select Application--</option>
				<?php 
				$forms = $db->select("Select * from forms where status='1'");
				if($forms){
					foreach ($forms as $k=>$finfo){
						$form_id=$db->get('form_id');
						$sel=($form_id ==$finfo['form_id'] )?' selected="selected"':'';
						echo '<option value="'.$finfo['form_id'].'"'.$sel.'>'.strtoupper($finfo['form_name']).'</option>'."\n";
											
					}
				}
				?>				
			</select>
		
         	<select name="app_status" class="form-control" style="width:160px;margin-right:5px;">
			<option value="">-App Status-</option>
			<?php 
			if($form_status_array){
				foreach ($form_status_array as $frm_status=>$frm_status_code){
					$app_status=$db->get('app_status');
					$sel=($frm_status ==$app_status )?' selected="selected"':'';
					echo '<option value="'.$frm_status.'"'.$sel.'>'.strtoupper($frm_status).'</option>'."\n";
				}
			}
			?>				
		</select>
        </div>

		
		<div class="input-group">
			<input type="text" id="datepicker" name="df" value="<?=$df?>" placeholder="From date" class="form-control">
		</div>
	
		<div class="input-group">
			<input type="text" id="datepicker2" name="dt" value="<?=$dt?>" placeholder="To date" class="form-control">
		</div>	
  
		<button type="submit" class="btn btn-info">GO</button>
		<a href="<?=ADMIN_URL.'allapplications/'?>"><button type="button" class="btn btn-default"><i class="fa fa-refresh" aria-hidden="true"></i></button></a>
	
    <?php
if($df && $dt ){
	if($csv_download_url){
	echo   $csv_download_link= '<a href="'.$csv_download_url.'" target="_blank" class="btn btn-danger btn-sm" style="float:right;"><i class="fa fa-arrow-circle-o-right" aria-hidden="true"></i> Download CSV Report </a>';
	}
} 
 ?>
 	</div>
</form>
<!--eof search Panel-->	 

                      <table class="table table-striped jambo_table bulk_action">
                        <thead>
                          <tr class="headings">
                           <?= $th_html; ?>
                            <th class="bulk-actions" colspan="13">
                              <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                            </th>
                          </tr>
                        </thead>

                        <tbody>
						<?= $html; ?>
                        </tbody>
                      </table>
					  
					  
					<?php include(TEMPLATE_STORE.'pagination_raw.php');?>  
                    </div><!--x_content-->
                  </div><!--x_panel-->
                </div>
              </div><!--row-->
		 </div>

