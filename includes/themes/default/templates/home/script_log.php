<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12">
		<div class="panel panel-primary">
			<div class="panel-heading">
			  <h3 class="panel-title">Live Breakdown List Iteams </h3>
			</div>
			<div class="panel-body">
			<div class="table-responsive">
			  <table class="table table-bordered">
					<thead>
					  <tr>
						<th>#</th>
						<th>Log info</th>
						<th>Date added</th>
						<th>View</th>
					  </tr>
					</thead>
					<tbody>
<?php 
$tr_html='';
if($script_logs){
	foreach($script_logs as $k=> $log_info){	
	
	    $view_log_url=SCRIPT_URL.'scriptLogDetail/'.$log_info['id'];

		   $view_log_btn='<a href="'.$view_log_url.'" title="'.$article_info['bv_no'].'" class="fancybox fancybox.iframe"><button type="button" class="btn btn-info btn-sm">View Detail</button></a>';		
			$tr_html .='<tr>
						<td>'.($k+1).'</td>
						<td>'.$log_info['log_link'].'</td>
						<td>'.date_time($log_info['date_added'],true).'</td>
						<td>'.$view_log_btn.'</td>
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
