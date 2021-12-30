<?php
$log_user_info=getUserInfo($log_info['user_id']);
$breakdown_list_info=ar_unserialize($log_info['log_text']);
?>

<?php $bklist = ar_unserialize($breakdown_list_info['bklist']); ?>
<style>.footer{clear:both;width:100%;padding:20px 0px;position:absolute;bottom:0px; margin:20px opx;}.signature{float:left;width:130px;border-top:1px dashed #929292;padding-top:5px;text-align:center;}.Sig_mar_med{margin:0px 145px;}img#banner_image{display:none;}</style>
<style media="print">.no_print,title,header{display:none;} @page {size: auto; margin: 0mm;} .panel-body,.table-responsive tr td,.table-responsive tr th{font-size:12px;}.row{margin:35px 10px 5px 10px !important;}</style>

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
		<div class="panel panel-primary">
			<div class="panel-heading">
			  <h3 class="panel-title">View Log For <?=$log_user_info['user_fname']?> <b>Date :</b> <?=$log_info['date_added']?></h3>
			</div>
			<div class="panel-body">
			
<p>
		<b>BV No: </b><?=$breakdown_list_info['bv_no']?> &nbsp; <b>Prepared By: </b><?=$breakdown_list_info['prepared_by']?> <b>Due Date:</b> <?=$breakdown_list_info['due_date']?><br/>
		
</p>


<?php if($view_composite){ ?>
<div class="clearfix"></div>
<!--bof Composite List-->
<h4>COMPOSITE LIST</h4>
<div class="table-responsive">
	<table id="ar_price_quote_table" class="table table-bordered">
		<thead> 
			<tr>
				<th>Test Name</th>
				<th>Test Iteam</th>
			</tr>
		</thead>
		<tbody> 
		<?php $CompositeLists = getCompositeList($bv_no);
		if($CompositeLists){
			foreach($CompositeLists as $copposite_list=>$copposite_list_index){
				$cl_test_name= $copposite_list;
				$cl_test_item= 'T'.implode(" + T", $copposite_list_index);
				echo '<tr>
				<td>'.$cl_test_name.'</td>
				<td>'.$cl_test_item.'</td>
			</tr>'."\n";
				
			}
		}
		?>
		</tbody>
	</table>
</div>
<!--eof Composite List-->
<?php }else{ ?>
<div class="clearfix"></div>
<!--bof testitem breakdown-->
<div class="table-responsive">
<table id="ar_price_quote_table" class="table table-bordered">
<thead> 
	<tr>
		<th>#</th>
		<th>Sample Description</th>
		<th>Material Type</th>
		<th>Standard Test</th>
	</tr>
</thead>
<tbody> 
<?php 
if($bklist['sample_description']){
foreach($bklist['sample_description'] as $key=>$val){
$row_index=	($key+1);
$items=view_standardTest_items($bklist['standard_tests'][$key],$row_index);
?> 
	<tr> 
		<td>T<?=($row_index)?></td>
		<td><?=$bklist['sample_description'][$key]?></td>
		<td><?=$bklist['material_type'][$key]?></td>
		<td><ul class="list-unstyled"><?=$items?></ul></td>
	</tr>
<?php }
}
?>

 </tbody> 
</table>
</div>
<!--eof testitem breakdown-->

<?php } ?>

<button class="btn btn-info no_print" onclick="window.print();"><span class="icon-right"><i class="fa fa-print"></i> &nbsp;Print</span></button>				

              
		</div><!--panel-body-->
	  </div>
	</div>
</div><!--row-->
<?php 
function getCompositeList($bv_no){
	global $db;
	
	$breakdown_list_info=$db->select_single("SELECT * FROM breakdown_lists WHERE bv_no='$bv_no' ");
	
	$composit_list=array();
	$bklist = ar_unserialize($breakdown_list_info['bklist']);
	
	if($bklist['sample_description']){
		foreach($bklist['sample_description'] as $key=>$val){
			$row_index=	($key+1);
			#creat Composite List
			if($bklist['standard_tests'][$key] ){
				foreach($bklist['standard_tests'][$key] as $k=>$val){
					$composit_list[$val][]=$row_index;
				}
			}
		}
	}
	return $composit_list;
}

function view_standardTest_items($sel_items=array(),$row_index){
	global $db;
	$test_check_box_items=array();	
	$all_tests= $db->select("SELECT * FROM article_categories WHERE active =1 AND parent =0 ORDER BY menu_order ASC");
	if($all_tests){
		foreach ($all_tests as $k=>$test_info){
			$parent=$test_info['cat_id'];
			$test_title= $test_info['menu_text'];	
			$test_parent_name= $test_info['seo_title'];
			
			#bof optgroup
			$test_check_box_items[]='<li><b>'.$test_title.'</b></li>';
			
				$all_sub_tests= $db->select("SELECT * FROM article_categories WHERE active =1 AND parent =$parent ORDER BY menu_order ASC");
				if($all_sub_tests){
					foreach ($all_sub_tests as $k=>$test_info){
						$test_title= $test_info['menu_text'];	
						$test_name= $test_info['seo_title'];	
						if (in_array($test_name, $sel_items)) {
							$test_check_box_cats[$test_name][$row_index][]=$test_title;
							$test_check_box_items[]='<li>'.$test_title.'</li>';
						}
					}
				}
			
			#eof optgroup
		}	
	}
	
	$test_check_box_html=implode("",$test_check_box_items);	
	return $test_check_box_html;
}
?>