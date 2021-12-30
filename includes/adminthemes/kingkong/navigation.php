<div class="navbar-header">
	<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#nav-bar-collapse">
		<span class="sr-only">Navigation</span>
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
	</button>
</div>
<div class="collapse navbar-collapse" id="nav-bar-collapse">
	<ul class="nav navbar-nav">
		<li<?=(CURRENT_URL==ADMIN_URL)?' class="active"':'';?>><a href="<?=ADMIN_URL?>"><i class="fa fa-home"></i> Home <span class="sr-only">(current)</span></a></li>
		<li class="active"><a href="<?=ADMIN_URL?>member">Dashboard</a></li>			
		<li<?=(strpos(CURRENT_URL, 'notices') !== false)?' class="active"':'';?>><a href="<?=ADMIN_URL?>page/notices">Notices</a></li>
		<li><a href="<?=SCRIPT_URL?>" target="_blank"><i class="fa fa-eye"></i>Settings</a></li>
		<li><a href="<?=SCRIPT_URL?>" target="_blank"><i class="fa fa-eye"></i>ViewSite</a></li>
	</ul>
</div>
