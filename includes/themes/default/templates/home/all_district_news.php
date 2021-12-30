<section class="section-block clearfix">
	<div class="row">
		<div class="col-xs-12 col-sm-9">
			<h2 class="nav-page-title">All Districts News</h2>


	        <div class="page-breadcrumb clearfix">
			    <ol class="breadcrumb">
        		    <li><a href="<?=SCRIPT_URL?>"><i class="fa fa-home"></i> প্রচ্ছদ</a></li>
        		   <li>জেলার-সংবাদ/</li>
        		 </ol>
			</div>
			
		  <!--eof top heading-->
		  
		  
		  <!--bof menu list dist-->
		  <div class="clearfix"  style="background: rgba(34, 43, 70, 1);padding: 15px;color:#fff;">
		  <ul>
					<?php 
					$all_divisions=$db->select("SELECT DivisionID, DivisionNameBN FROM bas_division LIMIT 1,8");
					if($all_divisions){
					foreach($all_divisions as $k=>$rsDivision){
					$division_wise_districts=$db->select('SELECT DistrictID, DistrictNameBN FROM bas_district WHERE DivisionID='.$rsDivision["DivisionID"].' ORDER BY DistrictNameBN ASC');
					$division_url=SCRIPT_URL.'division/'.$rsDivision["DivisionID"].'/'.$rsDivision["DivisionNameBN"];
					?>
					 <li class="dropdown">
                                    <a href="<?=$division_url?>"><?php echo $rsDivision["DivisionNameBN"]; ?></a> 
						<?php 
							if($division_wise_districts){
							echo '<ul class="dropdown-menu22">';
							foreach($division_wise_districts as $k=>$rsDistrict){ 
							$district_url=SCRIPT_URL.'district/'.$rsDistrict["DistrictID"].'/'.$rsDistrict["DistrictNameBN"];
							?>
								<li><a href="<?=$district_url?>"><?php echo $rsDistrict["DistrictNameBN"]; ?></a></li>
							<?php }
							echo "</ul>\n";
							}
						?>
					</li>
					<?php	
					}
					}//all_divisions ?>
							
				   <li><a href="<?=SCRIPT_URL?>mofossol">মফস্বলের সব খবর</a></li>
				</ul>
		  <!--eof menu list dist-->
		  
          </div>
		
		</div>
		
	</div>
</section>