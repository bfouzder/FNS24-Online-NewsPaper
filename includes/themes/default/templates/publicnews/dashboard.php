<?php  
$u_info=$db->getRowArray('users',state('AR_user_id')); 
?>

<section class="section-block clearfix">
	<div class="row">
		<div class="col-xs-12 col-sm-12">
			<h2 class="nav-page-title">Public News</h2>
			<div class="page-breadcrumb clearfix">
			    <ol class="breadcrumb">
        		   <li><a href="<?=SCRIPT_URL?>"><i class="fa fa-home"></i> প্রচ্ছদ</a></li>
        		   <li class="active">Dashboard</li>
        		 </ol>
			</div>
		<!--eof top heading-->	
            
     <div class="user_login" style="border: 2px solid orange;"> 
        
<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12">
		<div class="panel panel-info" style="border: none;">
			<div class="panel-body">
				 				
							<h1>Welcome <?=ucwords($u_info['user_name'])?>!</h1>
							<h2><i class="fa fa-envelope"></i> <?=$u_info['user_email']?> &nbsp; <i class="fa fa-phone"></i> <?=$u_info['user_mobile']?></h2>		
					
                    
                    <br />
                    <br />
                    <a href="<?=SCRIPT_URL?>publicnews/add/" class="btn btn-info btn-info">Add News</a>
                    <a href="<?=SCRIPT_URL?>publicnews/manageNews/" class="btn btn-danger">Show My News</a>
                    <a href="<?=SCRIPT_URL?>publicnews/logout/" class="btn btn-default">Logout</a>
                    <br />
                    <br />
                    <br />
                    <br />
                    <br />
                    <br />
                    <br />
                    <br />
                    <br />
                    <br />
                    <br />
                
			</div><!--panel-body-->
	   </div>   
	</div>
</div><!--row-->
 <br/>
      <br/>
    </div>			
    </div>			
	</div>
	</div>
</section>