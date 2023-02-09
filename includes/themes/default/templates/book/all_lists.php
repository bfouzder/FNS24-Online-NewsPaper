<?php
$tr_html='';
if($onlinearticles){
	
	foreach($onlinearticles as $k=> $article_info){		
		$section_info =getSectionInfo($article_info['cat_id']);
		
		$article_url=SCRIPT_URL.'viewBreakDownList/'.$article_info['bv_no'];
		$edit_url=SCRIPT_URL.'editBreakDownList/'.$article_info['bv_no'];
		
		$log_url=SCRIPT_URL.'popup_scriptLogByType/'.$article_info['id'];
		
		$article_composit_url=SCRIPT_URL.'viewBreakDownList/'.$article_info['bv_no'].'/composit/';

		$popup_article_url=SCRIPT_URL.'popup_BreakDownList/'.$article_info['bv_no'];
		$popup_article_composit_url=SCRIPT_URL.'popup_BreakDownList/'.$article_info['bv_no'].'/composit/';

		if($popup){	
			$view_article_btn='<a href="'.$popup_article_url.'" title="'.$article_info['bv_no'].'" class="fancybox fancybox.iframe"><button type="button" class="btn btn-warning btn-sm">Breakdown List</button></a>';
			$view_article_composit_btn='<a href="'.$popup_article_composit_url.'" title="'.$article_info['bv_no'].'" class="fancybox fancybox.iframe"><button type="button" class="btn btn-info btn-sm">Composite List</button></a>';
		}else{
			$view_article_btn='<a href="'.$article_url.'" title="Breakdown List of  '.$article_info['bv_no'].'" ><button type="button" class="btn btn-warning btn-sm">Breakdown List</button></a>';
			$view_article_composit_btn='<a href="'.$article_composit_url.'" title="Composite List of '.$article_info['bv_no'].'" ><button type="button" class="btn btn-info btn-sm">Composite List</button></a>';
		}
		
		$view_article_edit_link='<a href="'.$edit_url.'" title="Edit of '.$article_info['bv_no'].'" ><button type="button" class="btn btn-default btn-sx">Edit</button></a>';
		$view_article_log_link='&nbsp; <a href="'.$log_url.'" title="Log of '.$article_info['bv_no'].'" class="fancybox fancybox.iframe"><button type="button" class="btn btn-info btn-sx">View Log</button></a>';
		
		
		$tr_html .='<tr>
						<td>'.($k+1).'</td>
						<td><a href="'.$article_url.'" title="'.$article_info['bv_no'].'"><strong class="text-info">'.strtoupper($article_info['bv_no']).'</strong></a></td>
						<td>'.date_time($article_info['due_date'],false).'</td>
						<td>'.$article_info['prepared_by'].'</td>
		
					<td>'.$view_article_btn.'</td>
					<td>'.$view_article_composit_btn.'</td>
					<td>'.$view_article_edit_link . $view_article_log_link. '</td>
				  </tr>'."\n";
	}
	
}

$Latest_title ='Latest';
$Latest_title ='';
?>
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
						<th>BV No</th>
						<th>Due date</th>
						<th>Prepared By</th>
						<th>Breakdown</th>
						<th>Composite</th>
						<th>Action</th>
					  </tr>
					</thead>
					<tbody>
					 <?=$tr_html?>
					</tbody>
				  </table>
				 </div> 
<?php include(TEMPLATE_STORE.'pagination_all.php');?>
 
			</div><!--panel-body-->
	  </div>
	</div>
</div>
