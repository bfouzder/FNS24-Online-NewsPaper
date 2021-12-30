<?php  
$p_info=$db->getRowArray('admin',state('AR_admin_id')); 
?>
<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12">
		<div class="panel panel-info">
			<div class="panel-heading">
			  <h3 class="panel-title">Dashboard</h3>
			</div>
			<div class="panel-body">
				 <div class="row">
					<div class="col-md-5 col-sm-12 col-xs-12">					
							<h2><?=$p_info['fname']?> <?=$p_info['lname']?></h2>
							<h2><i class="fa fa-envelope"></i> <?=$p_info['admin_email']?> &nbsp; <i class="fa fa-phone"></i> <?=$p_info['admin_phone']?></h2>		
					
                    
                    <br />
                    <br />
                    <a href="<?=ADMIN_URL?>manageNews/?doaction=add" class="btn btn-danger btn-large">Add News</a>
                    <br />
                    <br />
                    </div>
					
					<div class="col-md-7 col-sm-12 col-xs-12">
                    									
						</div>	
				</div>
			</div><!--panel-body-->
	   </div>   
	</div>
</div><!--row-->
<?php //include('dashboard_statistic_graph.php');?>	
