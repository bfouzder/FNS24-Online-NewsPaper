<?php 
if(!$this->is_home){
?>
<section class="adv-block clearfix">
	<div class="adv-full"><a href="#"><img src="<?php echo GET_TEMPLATE_DIRECTORY_URI; ?>/images/adv1.png" alt=""></a></div>
</section>
<!--bof select division & district wise news-->
<section class="section-block clearfix">
<table class="table table-bordered">
<tr><td valign="top" align="left" class="tdLocation" colspan="2">আপনার পছন্দের এলাকার সংবাদ</td></tr>
<tr><td valign="top" align="left" class="tdLocationSelect" colspan="2">
<form method="post" name="frmDivision" action="district.php">
	পড়তে চাই:
	<select name="cboDivision" id="cboDivision" onchange="getDistrict(this.value)">
	<option value="0">বিভাগ</option>
		<?php 
		$all_divisions=$db->select("SELECT DivisionID, DivisionNameBN FROM bas_division LIMIT 1,8");
		if($all_divisions){
			foreach($all_divisions as $k=>$rsDivision){
			$division_wise_districts=$db->select('SELECT DistrictID, DistrictNameBN FROM bas_district WHERE DivisionID='.$rsDivision["DivisionID"].' ORDER BY DistrictNameBN ASC');
			$division_url=SCRIPT_URL.'division/'.$rsDivision["DivisionID"].'/'.$rsDivision["DivisionNameBN"];
			?>	
			<option value="<?php echo $rsDivision["DivisionID"] ?>"><?php echo $rsDivision["DivisionNameBN"]; ?></option>
			<?php	
			}
		}//all_divisions 
		?>
	</select>
	<select name="nttl" id="nttl">
		<option value="0">জেলা</option>
	</select>

	<input type="submit" value="সংবাদ" name="btnSubmit" id="btnSubmit" />
</form>
</td></tr>
</table>
<script>
function getDistrict(iDivisionID){
	var xmlhttp;
	if(window.XMLHttpRequest){
		//code for IE7+, Firefox, Chrome, Opera, Safari
		xmlhttp=new XMLHttpRequest();
	}else{
		//Code for IE6, IE5
		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange=function(){
		if(xmlhttp.readyState==4 && xmlhttp.status==200){
			document.getElementById("nttl").innerHTML=xmlhttp.responseText;
		}
	}
	sURL="<?=SCRIPT_URL?>ajax/getDistrict.php?DivisionID="+iDivisionID;
	xmlhttp.open("GET",sURL,true);
	xmlhttp.send();
}
</script>
</section><!--eof select division & district wise news-->
<?php } ?>



		 </div><!--container-fluid main-wrapper-->
    </div>
</div>
<footer class="footer">
    <div class="wrapper">
        <div class="container-fluid">
            <nav class="navbar">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#footer-navbar-collapse" aria-expanded="false">
                        <span class="sr-only">Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                <div class="collapse navbar-collapse" id="footer-navbar-collapse">
                    <ul class="nav navbar-nav">
						<li class="active"><a href="#">প্রচ্ছদ</a></li>               
						<li><a href="<?=SCRIPT_URL?>mofossol.php">সারা বাংলা</a></li>
						<li><a href="<?=SCRIPT_URL?>category.php?contenttype=1">জাতীয়</a></li>
						<li><a href="<?=SCRIPT_URL?>category.php?contenttype=2">রাজনীতি</a></li>
						<li><a href="<?=SCRIPT_URL?>category.php?contenttype=3">অর্থনীতি</a></li>
						<li><a href="<?=SCRIPT_URL?>category.php?contenttype=4">বিদেশ</a></li>
						<li><a href="<?=SCRIPT_URL?>category.php?contenttype=5">খেলা</a></li>
						<li><a href="<?=SCRIPT_URL?>category.php?contenttype=6">বিনোদন</a></li>
						<li><a href="<?=SCRIPT_URL?>category.php?contenttype=7">লাইফস্টাইল</a></li>
						<li><a href="<?=SCRIPT_URL?>category.php?contenttype=8">তথ্য-প্রযুক্তি</a></li>
						<li><a href="<?=SCRIPT_URL?>category.php?contenttype=9">স্বাস্থ্য</a></li>
						<li><a href="<?=SCRIPT_URL?>category.php?contenttype=10">মুক্তমত</a></li>
						<li><a href="<?=SCRIPT_URL?>category.php?contenttype=11">প্রবাস</a></li>
						<li><a href="<?=SCRIPT_URL?>photo.php">গ্যালারি</a></li>
						<li><a href="#top-block">টপ <i class="fa fa-angle-double-up"></i></a></li>
                    </ul>
                </div>
            </nav>
            <div class="row">
            
                <div class="col-xs-12 col-sm-12 col-md-12">
				<p>সকল প্রকাশিত/প্রচারিত কোনো সংবাদ, তথ্য, ছবি, আলোকচিত্র, রেখাচিত্র, ভিডিওচিত্র, অডিও কনটেন্ট কপিরাইট আইনে পূর্বানুমতি ছাড়া ব্যবহার করা যাবে না।  Fairnews24.com, starting the journey from 2010, one of the most read bangla daily online newspaper worldwide. Fairnews24.com has the highest journalist among all the Bangladeshi newspapers. Fairnews24.com also has news service and providing hourly news to the highest number of online and print edition news media. Daily more then 1, 00,000 readers read Fairnews24.com online news. Fairnews24.com is considered to be the most influencing news service brand of Bangladesh. The online portal of Fairnews24.com (www.fairnews24.com) brings latest bangla news online on the go.</p>
				</div>	
					<div class="col-xs-12 col-sm-2 col-md-2">
					  <div class="f-logo">
                        <a href="<?=SCRIPT_URL?>"><img src="<?php echo GET_TEMPLATE_DIRECTORY_URI; ?>/images/f-logo.png" alt="f-logo"></a>
						<div class="clearfix"></div>				
						<span>Copyright @ <?=date('Y')?> FNS Ltd</span>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-10">
						<p>৪৮/১, উত্তর কমলাপুর, মতিঝিল, ঢাকা-১০০০ <br/>ফোন : +৮৮ ০২ ৯৩৩৫৭৬৪</p>
                    <ul class="navbar-left nav-list">
                        <li><a href="#">About the FNS</a></li>
                        <li><a href="#">Privacy Policy</a></li>
                        <li><a href="#">Newsletter Subscribe</a></li>
                        <li><a href="#">Archive</a></li>
                        <li><a href="#">Contact the FNS</a></li>
                    </ul>


					<div class="social-blocks clearfix">
                        <ul>
                            <li><a href="#"><img src="<?php echo GET_TEMPLATE_DIRECTORY_URI; ?>/images/facebook.png" alt=""></a></li>
                            <li><a href="#"><img src="<?php echo GET_TEMPLATE_DIRECTORY_URI; ?>/images/twitter.png" alt=""></a></li>
                            <li><a href="#"><img src="<?php echo GET_TEMPLATE_DIRECTORY_URI; ?>/images/youtube.png" alt=""></a></li>
                            <li><a href="#"><img src="<?php echo GET_TEMPLATE_DIRECTORY_URI; ?>/images/plus.png" alt=""></a></li>
                            <li><a href="#"><img src="<?php echo GET_TEMPLATE_DIRECTORY_URI; ?>/images/linkedin.png" alt=""></a></li>
                  
                        </ul>
                    </div>
                    <div class="right-panel nav-list">
                        
                        <span>Website Developped By <a href="http://thearsoft.com" target="_blank">TheARSoft.com</a> </span>
                    </div>
                </div>
               
            </div>
        </div>
    </div>
</footer>
<?php include('footer-common.php')?>