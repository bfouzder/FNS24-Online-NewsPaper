<style>.footer{clear:both;width:100%;padding:20px 0px;position:absolute;bottom:0px; margin:20px opx;}.signature{float:left;width:130px;border-top:1px dashed #929292;padding-top:5px;text-align:center;}.Sig_mar_med{margin:0px 145px;}img#banner_image{display:none;}</style>
<style media="print">.no_print,title,header{display:none;} @page {size: auto; margin: 0mm;} .panel-body,.table-responsive tr td,.table-responsive tr th{font-size:12px;}.row{margin:35px 10px 5px 10px !important;}</style>

<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12">
		<div class="panel panel-primary">
			<div class="panel-heading">
			  <h3 class="panel-title"><img src="<?=SCRIPT_URL?>includes/themes/default/images/EWULogo.png" width="40">East West University Audit Log History</h3>     
<p class="pull-right no_print"><button class="btn btn-info" onclick="window.print();"><span class="icon-right"><i class="fa fa-print"></i> &nbsp;Print</span></button></p>
		
			</div>
			<div class="panel-body">
			<h3>Member:  <font color="red"><?=$params[0]?></font></h3>
			<div class="table-responsive">
			  <table class="table table-bordered">
					<thead>
					  <tr>
						<th>#</th>
						<th>Date &amp; Time </th>
						<th>Log info</th>
					  </tr>
					</thead>
					<tbody>
<?php 
$tr_html='';
if($script_logs){
	foreach($script_logs as $k=> $log_info){	
		$k=$k+1;
	    $view_log_url=SCRIPT_URL.'siteadminpanel/scriptLogDetail/'.$log_info['id'];

		   $view_log_btn='<a href="'.$view_log_url.'" title="'.$article_info['bv_no'].'" class="fancybox fancybox.iframe no_print"><button type="button" class="btn btn-info btn-sm">View Detail</button></a>';		
			$tr_html .='<tr>
						<td>'.($k+($pages['per_page'] * ($pages['curr_page'] - 1) )).'</td>
						<td>'.date_time($log_info['date_added'],true).'</td>
						<td><b>'.$log_info['log_link'].'</b><br/>'.$log_info['log_text'].'</td>						
					
				  </tr>'."\n";
	}
}
echo $tr_html;
?>					 
					</tbody>
				  </table>
				 </div> 
<?php include(TEMPLATE_STORE.'pagination_all.php');?>
 
			</div><!--panel-body-->
	  </div>
	</div>
</div>
