<?php
$sql_query="select *from admin where `admin_id`=".$log_info['user_id'];
$log_member_info = $this->db->select_single($sql_query);
?>

<?php $bklist = ar_unserialize($breakdown_list_info['bklist']); ?>
<style>.footer{clear:both;width:100%;padding:20px 0px;position:absolute;bottom:0px; margin:20px opx;}.signature{float:left;width:130px;border-top:1px dashed #929292;padding-top:5px;text-align:center;}.Sig_mar_med{margin:0px 145px;}img#banner_image{display:none;}</style>
<style media="print">.no_print,title,header{display:none;} @page {size: auto; margin: 0mm;} .panel-body,.table-responsive tr td,.table-responsive tr th{font-size:12px;}.row{margin:35px 10px 5px 10px !important;}</style>

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
		<div class="panel panel-primary">
			<div class="panel-heading">
			  <h3 class="panel-title">View Log For <?=$log_member_info['admin_name']?> <b>Date :</b> <?=$log_info['date_added']?></h3>
			</div>
			<div class="panel-body">

<div class="table-responsive">
<table class="table table-bordered">
<thead> 
	<tr>
		<th colspan="2">Log info</th>
		<th>Date</th>
	</tr>
</thead>
<tbody> 
	<tr> 
		<td><?=$log_info['log_link']?></td>
		<td><?=$log_info['log_text']?></td>
		<td><?=date_time($log_info['date_added'],true)?></td>
	</tr>
 </tbody> 
</table>
</div>
<!--eof testitem breakdown-->


<button class="btn btn-info no_print" onclick="window.print();"><span class="icon-right"><i class="fa fa-print"></i> &nbsp;Print</span></button>				

              
		</div><!--panel-body-->
	  </div>
	</div>
</div><!--row-->

