<!-- sidebar menu -->
<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
	<div class="menu_section">
		<h3>SALES-FORCE</h3>
		<ul class="nav side-menu">
			<li><a><i class="fa fa-home"></i> Home <span class="fa fa-group"></span></a>
				<ul class="nav child_menu" style="display: none">
					<li><a href="index.php">Dashboard</a></li>
				</ul>
			</li>
			
			<li><a><i class="fa fa-edit"></i> My Entry Forms <span class="fa fa-chevron-down"></span></a>
				<ul class="nav child_menu" style="display: none">
					<!--<li><a href="vas_form.php">ALL VAS Forms</a></li>	-->
					<li><a href="<?=SCRIPT_URL?>formentry/clientvisit/">Subscriber Information</a></li>				   
					<li><a href="<?=SCRIPT_URL?>formentry/followup/">Follow Up Form</a></li>	
					<li><a href="<?=SCRIPT_URL?>formentry/offer/">Offer Form</a></li>				   
					<li><a href="<?=SCRIPT_URL?>formentry/poorsignup/">PO Form</a></li>				   
				</ul>
			</li>	
			
			<li><a><i class="fa fa-table"></i> My Reports <span class="fa fa-chevron-down"></span></a>
				<ul class="nav child_menu" style="display: none">
					<li><a href="<?=SCRIPT_URL?>reports/?type=po_order">PO/Work Order Report</a>
					<li><a href="<?=SCRIPT_URL?>reports/?type=offer_letter">Offer Letter</a>
					<li><a href="<?=SCRIPT_URL?>reports/?type=client_visit">Client Visit</a>
					<li><a href="<?=SCRIPT_URL?>reports/?type=client_followup">Client Followup</a>
					</li>
				</ul>
			</li>
			
			<li><a><i class="fa fa-edit"></i>Manage Clients <span class="fa fa-chevron-down"></span></a>
				<ul class="nav child_menu" style="display: none">
					<li><a href="<?=SCRIPT_URL?>cliententry">Add New Client</a></li>				   
					<li><a href="<?=SCRIPT_URL?>manageclients">All Clients</a></li>   
				</ul>
			</li>
			
			<li><a><i class="fa fa-edit"></i> My TODO LIST <span class="fa fa-chevron-down"></span></a>
				<ul class="nav child_menu" style="display: none">
					<li><a href="<?=SCRIPT_URL?>todo/">All TODO List</a></li>				   
					<li><a href="<?=SCRIPT_URL?>todo/?action=deleted">Deleted TODO List</a></li>			   			   
				</ul>
			</li>
			
			<li><a href="<?=SCRIPT_URL?>auth/logout"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
			<!--<li><a><i class="fa fa-bar-chart-o"></i> Chart Reports <span class="fa fa-chevron-down"></span></a>
				<ul class="nav child_menu" style="display: none">
					<li><a href="chartjs.html">Chart JS</a>
					</li>
					<li><a href="chartjs2.html">Chart JS2</a>
					</li>
					<li><a href="morisjs.html">Moris JS</a>
					</li>
					<li><a href="echarts.html">ECharts </a>
					</li>
					<li><a href="other_charts.html">Other Charts </a>
					</li>
				</ul>
			</li>-->
		</ul>
	</div>
</div>
<!-- /sidebar menu -->
