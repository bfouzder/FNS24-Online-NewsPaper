<?php

function getPieDataArrayFormStatus(){
	
	$graph_data_array=array();
	$graph_data_array= CountAllFormStatus();
	//pre($graph_data_array);
	
	#don't touch ;
	$data_array=array();
	$backgroundColor_array=array();
	$labels_array=array();
	
	foreach($graph_data_array as $k=>$val){
		if($val['status_id']=='0'){
			$data_array[]=$val['status'];
			$backgroundColor_array[] = '#08284d';
			$labels_array[]='Pending';
		}elseif($val['status_id']=='1'){
			$data_array[]=$val['status'];
			$backgroundColor_array[] ='#5cb85c';
			$labels_array[]='Solved';
		}elseif($val['status_id']=='3'){
			$data_array[]=$val['status'];
			$backgroundColor_array[] ='#3c9bff';
			$labels_array[]='Forwarded';
		}else{
			$data_array[]=$val['status'];
			$backgroundColor_array[] = '#d9534f';
			$labels_array[]='Rejected';
		}
		
	}
	
	
	$result_graph_array=array();
	$result_graph_array['data_array']=$data_array;
	$result_graph_array['backgroundColor_array']=$backgroundColor_array;
	$result_graph_array['labels_array']=$labels_array;	
	
	
	return $result_graph_array;
}


$result_graph_pie_array_st=getPieDataArrayFormStatus();

// Pie chart for Form Submission 

function getPieDataArray(){
	
	$graph_data_array=array();
	$graph_data_array= countSubmittedFormsForGraph();
	//pre($graph_data_array);exit;
	#don't touch ;
	$data_array=array();
	$backgroundColor_array=array();
	$labels_array=array();
	
	foreach($graph_data_array as $k=>$val){
		$dt = explode(',',getLabelColorCode($val['form_id']));
		$data_array[]=$val['forms'];
		$backgroundColor_array[] = $dt[1];
		$labels_array[]=$dt[0];
	}
	
	
	$result_graph_array=array();
	$result_graph_array['data_array']=$data_array;
	$result_graph_array['backgroundColor_array']=$backgroundColor_array;
	$result_graph_array['labels_array']=$labels_array;	
	
	
	return $result_graph_array;
}


$result_graph_pie_array=getPieDataArray();
//pre($result_graph_pie_array);

function getBarDataArray(){
	global $db;
    
	$graph_data_array=array();
	$month_name_array=array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November","December");
    $month_name_array_numeric=array("2017-01", "2017-02", "2017-03", "2017-04", "2017-05", "2017-06", "2017-07", "2017-08", "2017-09", "2017-10", "2017-11", "2017-12");
    

     $lavel_array= $db->select("SELECT * FROM forms WHERE status=1");
     foreach($lavel_array as $k=>$form_info){
 		
 		$form_id=$form_info['form_id'];
 		$graph_data_array[$k]['data']=getDatamonthWise($month_name_array_numeric,$form_id);
 		$graph_data_array[$k]['backgroundColor']=$form_info['colorCode'];
		$graph_data_array[$k]['labels']=$form_info['form_name'];
		
	}


        
//$graph_data_array[0]['data']=getDatamonthWise($month_name_array_numeric,$form_id=8);
//$graph_data_array[0]['backgroundColor']='#26B99A';
//$graph_data_array[0]['labels']='Leave';
//
//
//$graph_data_array[1]['data']=getDatamonthWise($month_name_array_numeric,$form_id=9);
//$graph_data_array[1]['backgroundColor']='#03586A';
//$graph_data_array[1]['labels']='Requisition';
// 	
//

//pre($graph_data_array);
	
	$d='';
	foreach($graph_data_array as $k=>$val){
	
	$d .='{';	
		
		$d.='label:"'.$val['labels'].'",';
		$d.='backgroundColor:"'.$val['backgroundColor'].'",';
		$d.='data:['.implode(',',$val['data']).']';
		
	$d.='},';
	}
	
	$result_graph_array=array();
	$result_graph_array['labelss']=$month_name_array;
	$result_graph_array['data']=$d;
	
	return $result_graph_array;
}

$result_graph_bar_array=getBarDataArray();
//pre($result_graph_bar_array);
//$p_info=getUserInfo(state('AR_user_id'));
?>
<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12">
		<div class="panel panel-primary">
			<div class="panel-heading">
			  <h3 class="panel-title">Statistic Dashboard</h3>
			</div>
			<div class="panel-body"> 
	
				<div class="content-block dashboard">
				  <div class="row">
			
					<div class="col-md-12 col-sm-12 col-xs-12">
					<div class="x_panel">
					  <div class="x_title">
						<h2>At a Glance Statistics <small>&nbsp;</small></h2>
					    <div class="clearfix"></div>
					  </div>
					  <div class="x_content">

						<table class="table text-bordered">
						  <thead>
							<tr>
							  <th>Applications</th>
							  <th>Total</th>
							  <th>Pending</th>
							  <th>Forwarded</th>
							  <th>Solved</th>
							  <th>Rejected</th>
							</tr>
						  </thead>
						  <tbody>
						  <?php $s = countSubmittedFormsForGraph(); 
						
								foreach($s as $value){
								$form_name_and_color = explode(',',getLabelColorCode($value['form_id']));
								echo '<tr><td>'.$form_name_and_color[0].'</td>
								<td>'.$value['forms'].'</td>
								<td>'.getTotalPending($value['form_id']).'</td><td>'.getTotalForwarded($value['form_id']).'</td><td>'.getTotalSolved($value['form_id']).'</td><td>'.getTotalCenceled($value['form_id']).'</td></tr>';
								}
						  
						  ?>
							</tbody>
						</table>
					  </div>
					</div>
              </div>
			  
					
					<div class="col-md-6 col-sm-6 col-xs-12">
						<div class="x_panel">
                  <div class="x_title">
                    <h2>Pie Chart <small>Form Submission</small></h2>
                   
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <canvas id="pieChart"></canvas>
					<?php foreach($result_graph_pie_array['labels_array'] as $k=>$Form_Submission_Label){ ?>
								<p><i style="Color:<?=$result_graph_pie_array['backgroundColor_array'][$k]?>" class="fa fa-square blue"></i>&nbsp;&nbsp;<?=$Form_Submission_Label?> (<?=$result_graph_pie_array['data_array'][$k]?>)</p>
								<?php } ?>
			
                  </div>
                </div>
					</div>
					
				  <div class="col-md-6 col-sm-6 col-xs-12">
						<div class="x_panel">
							  <div class="x_title">
								<h2>Pie Chart <small>Form Status</small></h2>
							   
								</ul>
								<div class="clearfix"></div>
							  </div>
							  <div class="x_content">
								<canvas id="pchartforFormStatus"></canvas>
								<?php
								foreach($result_graph_pie_array_st['labels_array'] as $k=>$Form_status_Label){ ?>
								<p><i style="Color:<?=$result_graph_pie_array_st['backgroundColor_array'][$k]?>" class="fa fa-square blue"></i>&nbsp;&nbsp;<?=$Form_status_Label?> (<?=$result_graph_pie_array_st['data_array'][$k]?>)</p>
								<?php } ?>
							  </div>
						</div>
					</div>
					
					
					
					<!--<div class="col-md-6 col-sm-6 col-xs-12">
						<div class="x_panel">
							  <div class="x_title">
								<h2>Bar Chart <small>Form Submission</small></h2>
							   
								</ul>
								<div class="clearfix"></div>
							  </div>
							  <div class="x_content">
								<canvas id="mybarChart"></canvas>
								
							
								
							 </div>
						</div>
					</div>-->
				  </div>
				</div>
				
		
			</div><!--panel-body-->
	   </div>
	</div>
</div><!--row-->


 <script src="<?php echo ADMIN_GET_TEMPLATE_DIRECTORY_URI; ?>/vendors/Chart.js/dist/Chart.min.js"></script>
	
	 <!-- Chart.js -->
    <script>
	 Chart.defaults.global.legend = {
        enabled: false
      };
	 // Pie chart for Form Status
     var ctxx = document.getElementById("pchartforFormStatus");
      var data = {
        datasets: [{
          data: [<?=implode(',',$result_graph_pie_array_st['data_array'])?>],
          backgroundColor: ["<?=implode('", "',$result_graph_pie_array_st['backgroundColor_array'])?>"],
        }],
        labels: ["<?=implode('", "',$result_graph_pie_array_st['labels_array'])?>"]
      }; 
	   // Graph_Pie chart
    

      var pieChart = new Chart(ctxx, {
        data: data,
        type: 'pie',
        otpions: {
          legend: false
        }
      });

      Chart.defaults.global.legend = {
        enabled: false
      };

      // Pie chart
     var ctx = document.getElementById("pieChart");
      var data = {
        datasets: [{
          data: [<?=implode(',',$result_graph_pie_array['data_array'])?>],
          backgroundColor: ["<?=implode('", "',$result_graph_pie_array['backgroundColor_array'])?>"],
        }],
        labels: ["<?=implode('", "',$result_graph_pie_array['labels_array'])?>"]
      }; 
	  
	  
	  
	   // Graph_Pie chart
    

      var pieChart = new Chart(ctx, {
        data: data,
        type: 'pie',
        otpions: {
          legend: false
        }
      });

      // Bar chart
      var ctx = document.getElementById("mybarChart");
      var mybarChart = new Chart(ctx, {
        type: 'bar',
		
        data: {
          labels: ["<?=implode('", "',$result_graph_bar_array['labelss'])?>"],
          datasets: [<?= $result_graph_bar_array['data']; ?>]
        },

        options: {
          scales: {
            yAxes: [{
              ticks: {
                beginAtZero: true
              }
            }]
          }
        }
      });
      

      

    </script>	