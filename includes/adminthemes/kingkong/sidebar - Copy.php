            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>Navigation</h3>
                <ul class="nav side-menu">
                  <li><a><i class="fa fa-home"></i> Home <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?=ADMIN_URL?>dashboard">Dashboard</a></li>
				   </ul>
                  </li>				 
				
                 
               
				   <li><a><i class="fa fa-user"></i> Manage Clients<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
					  <li><a href="<?=ADMIN_URL?>addClient" >Add Author</a></li> 
					  <li><a href="<?=ADMIN_URL?>manageClients/?type=person">Home</a></li> 
					  <li><a href="<?=ADMIN_URL?>manageClients/?type=movie">Retail</a></li> 
					  <li><a href="<?=ADMIN_URL?>manageClients/?type=proverb">Soho</a></li> 
					  <li><a href="<?=ADMIN_URL?>manageClients/">All Clients</a></li>
                    </ul>
                  </li>
				    <li><a><i class="fa fa-user"></i> Manage Employees <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
					  <li><a href="<?=ADMIN_URL?>addUser" >Add Employee</a></li> 
					  <li><a href="<?=ADMIN_URL?>manageUsers/">All Employees</a></li>
                    </ul>
                  </li>
				  <li><a><i class="fa fa-user"></i> Manage Admin Users<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
					 
					<?php
					$role_array=array(
						'4'=>'Comment Moderators',
						'3'=>'Quote Moderators',
						'2'=>'Editors',
						'1'=>'Administrators',//Supper Administrator
					);

					foreach ($role_array as $role_id=>$role_name){
					$sel = ($edit['admin_level']==$role_id)?' selected="selected"':'';		
					echo ' <li><a href="'.ADMIN_URL.'manageAdminUsers/?type='.$role_name.'&parent='.$role_id.'">'.$role_name.'</a></li>'."\n";                                                   				
					}
					?>	
					 <li><a href="<?=ADMIN_URL?>manageAdminUsers/">Show All </a></li>
                    </ul>
                  </li>
				  <li><a><i class="fa fa-edit"></i> Manage Pages<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?=ADMIN_URL?>pageManager/?doaction=add">Add New Page</a></li> 					 
                      <li><a href="<?=ADMIN_URL?>pageManager">All Pages</a></li> 					 
                    </ul>
                  </li>
                
				 
				  
                </ul>
              </div>
              

            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              <a href="<?=ADMIN_URL?>settings/" data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
              </a>
              <a href="<?=ADMIN_URL?>logout/" data-toggle="tooltip" data-placement="top" title="Logout">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <img src="<?= PROFILE_IMG_URL.'noimage.jpg' ?>" alt="welcome"/>Welcome <?=state('AR_adminname')?>
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li><a href="<?=ADMIN_URL?>changepassword" class="fancybox fancybox.iframe"><i class="fa fa-key pull-right"></i> Change Password</a></li>
                    <li><a href="<?=SCRIPT_URL?>" target="_blank"><i class="fa fa-sign-out pull-right"></i> Visit Site</a></li>
                    <li><a href="<?=SCRIPT_URL?>auth/logout/"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                  </ul>
                </li>

               
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->
		<div class="right_col" role="main">