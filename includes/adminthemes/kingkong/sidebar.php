<?php
#$data = $db->select("Select * from form_applicants_statuslog where forwarded_to=$user_id order by slog_id desc limit 5");
$pending_datas =0;
$pending_total =  0;
?>
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
               
				   <li><a><i class="fa fa-table"></i> Manage News<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
					  <li><a href="<?=ADMIN_URL?>manageNews/?doaction=add">Add New News</a></li>      
                            
					  
                      
					  <li><a href="<?=ADMIN_URL?>manageNews/?filterBy=slider_news">Slider News</a></li>
                      
                      <li><a href="<?=ADMIN_URL?>manageNews/?filterBy=top_news&position=16">Top 16 News</a></li>
                      <li><a href="<?=ADMIN_URL?>manageNews/?filterBy=top_news&position=4">Top 4 News</a></li>
					  <li><a href="<?=ADMIN_URL?>manageNews/?filterBy=top_news&position=3">Top 3 News</a></li>
					  <li><a href="<?=ADMIN_URL?>manageNews/?filterBy=top_news&position=2">Top 2 News</a></li>
                      
					  <li><a href="<?=ADMIN_URL?>manageNews/?filterBy=spot_light">SpotLight News</a></li>
					  <li><a href="<?=ADMIN_URL?>manageNews/?filterBy=breaking">breaking News</a></li>
					  <li><a href="<?=ADMIN_URL?>manageNews/?filterBy=footer_news">Footer News</a></li>
					  <li><a href="<?=ADMIN_URL?>manageNews/">All News</a></li>
                    </ul>
                    
                  </li>

                  <li><a><i class="fa fa-book"></i> Manage Books<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?=ADMIN_URL?>manageBooks/?doaction=add">Add New Book</a></li>    					 
                      <li><a href="<?=ADMIN_URL?>manageBooks/">All Books</a></li>
                    </ul>
                  </li> 

				    <li><a><i class="fa fa-laptop"></i> Manage Category <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
            					  <li><a href="<?=ADMIN_URL?>manageNewsCategory/?doaction=add" >Add Category</a></li> 
            					  <li><a href="<?=ADMIN_URL?>manageNewsCategory/">All Categories</a></li>
                    </ul>
                    </li>
                     <li><a style="color:orange !important"><i class="fa fa-table"></i> Public News<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
					  
				    <!--	
                      <li><a href="<?=ADMIN_URL?>manageTempNews/?filterBy=slider_news">Slider News</a></li>
                      <li><a href="<?=ADMIN_URL?>manageTempNews/?filterBy=top_news&position=4">Top 4 News</a></li>
					  <li><a href="<?=ADMIN_URL?>manageTempNews/?filterBy=top_news&position=3">Top 3 News</a></li>
					  <li><a href="<?=ADMIN_URL?>manageTempNews/?filterBy=top_news&position=2">Top 2 News</a></li>
                      <li><a href="<?=ADMIN_URL?>manageTempNews/?filterBy=spot_light">SpotLight News</a></li>
					  <li><a href="<?=ADMIN_URL?>manageTempNews/?filterBy=breaking">breaking News</a></li>
					  <li><a href="<?=ADMIN_URL?>manageTempNews/?filterBy=footer_news">Footer News</a></li>
                    -->  
					  
					  <li><a href="<?=ADMIN_URL?>manageTempNews/?filterBy=waiting_for_migrate">Waiting for Migrate</a></li>
					  <li><a href="<?=ADMIN_URL?>manageTempNews/?filterBy=migrated">Migrated News</a></li>
					  <li><a href="<?=ADMIN_URL?>manageTempNews/">All Public News</a></li>
					  
					  <li><a href="<?=ADMIN_URL?>manageUsers/">Manage Author</a></li>
                    </ul>
                    
                  </li>
                    <li><a><i class="fa fa-desktop"></i> Manage Zones <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
            					  <li><a href="<?=ADMIN_URL?>manageZones/?doaction=add" >Add New</a></li> 
            					  <li><a href="<?=ADMIN_URL?>manageZones/">All Zones</a></li>
                        </ul>
                    </li>
                    
                    <li><a><i class="fa fa-windows"></i> Manage Photo Gallery<span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
    					  <li><a href="<?=ADMIN_URL?>manageImageCategory">Photo Categories</a></li> 
    					  <!--<li><a href="<?=ADMIN_URL?>addAlbumList">Add Photos</a></li>-->
    					  <li><a href="<?=ADMIN_URL?>addAlbum">Add Photos</a></li>
                       	  <li><a href="<?=ADMIN_URL?>photosAlbums">Manage Albums</a></li>
                        </ul>
                      </li>
                 <?php if(state('AR_admin_id') ==1 || state('AR_admin_level') == 1){?>   
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
					 
					  <li><a href="<?=ADMIN_URL?>reports/user-wise-news-count/">Date wise News Count by User</a></li>
                    </ul>
                  </li>
                  <?php } ?>
	        <li><a><i class="fa fa-bug"></i> Manage Pages<span class="fa fa-chevron-down"></span></a>
              <ul class="nav child_menu">
                <li><a href="<?=ADMIN_URL?>pageManager/?doaction=add">Add New Page</a></li> 					 
                <li><a href="<?=ADMIN_URL?>pageManager">All Pages</a></li> 					 
              </ul>
            </li>

            
           <!--bof NewsPapers--> 
           <li><a style="color:#337ab7 !important"><i class="fa fa-laptop"></i> ALL News Papers <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="<?=SCRIPT_URL?>newspapers/manageNewsPaper/?doaction=add" >Add NewsPaper</a></li> 
                         <li><a href="<?=SCRIPT_URL?>newspapers/manageNewsPaper/" >Show All News Papers</a></li> 
            					  <li><a href="<?=SCRIPT_URL?>newspapers/manageNewsMenus/?doaction=add" >Add News Menu</a></li> 
            					  <li><a href="<?=SCRIPT_URL?>newspapers/manageNewsMenus/">All News Menus</a></li>
                    </ul>
           </li>
             <!--eof NewsPapers--> 
                 
				    <li><a><i class="fa fa-edit"></i> Manage Script Log<span class="fa fa-chevron-down"></span></a>
              <ul class="nav child_menu">
                <li><a href="<?=ADMIN_URL?>scriptLogManager/?doaction=add">Add New </a></li>           
                <li><a href="<?=ADMIN_URL?>scriptLogManager">All List</a></li>           
              </ul>
            </li> 


            <li><a><i class="fa fa-edit"></i> Manage Admin Log<span class="fa fa-chevron-down"></span></a>
              <ul class="nav child_menu">
                <li><a href="<?=ADMIN_URL?>adminLogManager/?doaction=add">Add New </a></li>           
                <li><a href="<?=ADMIN_URL?>adminLogManager">All List</a></li>           
              </ul>
            </li>

          


        <!--///-->


        <!--///-->

          
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
                    Welcome <?=state('AR_adminname')?>
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li><a href="<?=ADMIN_URL?>changepassword" class="fancybox fancybox.iframe"><i class="fa fa-key pull-right"></i> Change Password</a></li>
                    <li><a href="<?=SCRIPT_URL?>" target="_blank"><i class="fa fa-sign-out pull-right"></i> Visit Site</a></li>
                    <li><a href="<?=SCRIPT_URL?>auth/logout/"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                  </ul>
                </li>

                <li role="presentation" class="dropdown">
                  <a href="<?=ADMIN_URL?>manageQuotes/?view=pending" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-envelope-o"></i>
                    <span class="badge bg-green"><?=$pending_total?></span>
                  </a>
                  <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
                    <?php
				if($pending_datas){ 
					foreach($pending_datas as $value){ 
                       //pre($data);
                     ?>
					<li>
                      <a href="<?=ADMIN_URL?>manageQuotes/?view=pending">
                        <span class="image"><img src="<?php echo ADMIN_GET_TEMPLATE_DIRECTORY_URI; ?>/images/img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span><?=$value['author']?></span>
                         
                        </span>
                        <span class="message">
                          <?=trunc_string($value['quote_text'])?> 
                        </span>
                      </a>
                    </li>
				<?php } } ?>
                    <li>
                      <div class="text-center">
                        <a href="<?=ADMIN_URL?>manageQuotes/?view=pending">
                          <strong>All pending quotes</strong>
                          <i class="fa fa-angle-right"></i>
                        </a>
                      </div>
                    </li>
                  </ul>
                </li>
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->
		
		<div class="right_col" role="main">