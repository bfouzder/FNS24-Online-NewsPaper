<?php if(!isset($this->newspapers)):?>	

<?php if(!$this->is_home){ ?>

<!--bof select division & district wise news-->
<section class="section-block location_drop_block clearfix"> 
    <form method="get" name="frmDivision" action="<?=SCRIPT_URL?>allnews/">
	আপনার পছন্দের এলাকার সংবাদ পড়তে চাই:

		<span class="xs-custom-box"><select name="division" id="cboDivision" onchange="getDistrict(this.value)">
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
	<select name="dist" id="nttl">
		<option value="0">জেলা</option>
	</select> 
	<input type="submit" value="সংবাদ"  id="btnSubmit" /> </span>
</form> 

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


<section class="section-block section-single clearfix">
    <div class="owl-list">
         <?=ar_showFooterNews($limit =18)?>
    </div> 
</section>

<?php endif; ?>	
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
						<li class="active"><a href="<?=SCRIPT_URL?>">প্রচ্ছদ</a></li>               
						<li><a href="<?=SCRIPT_URL?>mofossol">সারা বাংলা</a></li>
						<li><a href="<?=SCRIPT_URL?>newscategory/27/বাংলাদেশ">বাংলাদেশ</a></li>
						<li><a href="<?=SCRIPT_URL?>newscategory/3/অর্থনীতি">অর্থনীতি</a></li>
						<li><a href="<?=SCRIPT_URL?>newscategory/4/বিশ্ব">বিশ্ব</a></li>
						<li><a href="<?=SCRIPT_URL?>newscategory/5/খেলা">খেলা</a></li>
						<li><a href="<?=SCRIPT_URL?>newscategory/6/বিনোদন">বিনোদন</a></li>
						<li><a href="<?=SCRIPT_URL?>newscategory/7/লাইফস্টাইল">লাইফস্টাইল</a></li>
						<li><a href="<?=SCRIPT_URL?>newscategory/8/প্রযুক্তি">প্রযুক্তি</a></li>
						<li><a href="<?=SCRIPT_URL?>newscategory/9/স্বাস্থ্য">স্বাস্থ্য</a></li>
						<li><a href="<?=SCRIPT_URL?>newscategory/10/মুক্তমত">মুক্তমত</a></li>
						<li><a href="<?=SCRIPT_URL?>newscategory/11/প্রবাস">প্রবাস</a></li>
						<li><a href="<?=SCRIPT_URL?>photo">ছবি</a></li>
						<li><a href="#top-block">টপ <i class="fa fa-angle-double-up"></i></a></li>
                    </ul>
                </div>
            </nav>
            <div class="row">
            
                <div class="col-xs-12 col-sm-12 col-md-12">
				<p>সকল প্রকাশিত/প্রচারিত কোনো সংবাদ, তথ্য, ছবি, আলোকচিত্র, রেখাচিত্র, ভিডিওচিত্র, অডিও কনটেন্ট কপিরাইট আইনে পূর্বানুমতি ছাড়া ব্যবহার করা যাবে না।  </p>
				</div>	
					<div class="col-xs-12 col-sm-2 col-md-2">
					  <div class="f-logo">
                        <a href="<?=SCRIPT_URL?>"><img src="<?php echo GET_TEMPLATE_DIRECTORY_URI; ?>/images/f-logo.png" alt="f-logo"></a>
						<div class="clearfix"></div>				
						<span>Copyright @ <?=date('Y')?> FNS24 Ltd</span>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-10">
				<p><?=getSettings('AR_FOOTER_ADDRESS');?></p>
<!--<p>ফেয়ার নিউজ সার্ভিস লিমিটেড। <br/>
Ayeesha Akter Bhobon.<br/>
10th Floor, Flat No.10-A,<br/>
24/D Topkhana Road,<br/>
Segun Bagicha 
ঢাকা - ১০০০।<br/>
মোবাইল: ০১৭৮১৯০৬০৫২, ০১৭৯৭৫৬৯৬০৬। ফোন : ০২ ৪৭১২০৭৭৯-৮৩ <br/>
ইমেইল: <a href="mailto:fnspress@gmail.com">fnspress@gmail.com</a>
</p>-->
                    <ul class="navbar-left nav-list">
                        <li><a href="#">About the FNS</a></li>
                        <li><a href="#">Privacy Policy</a></li>
                        <li><a href="#">Newsletter Subscribe</a></li>
                        <li><a href="<?=SCRIPT_URL?>archive">Archive</a></li>
                    </ul>


					<div class="social-blocks clearfix">
                        <ul>
                            <li><a href="https://www.facebook.com/Fns24/" target="_blank"><img src="<?php echo GET_TEMPLATE_DIRECTORY_URI; ?>/images/facebook.png" alt="facebook"></a></li>
                            <li><a href="#"><img src="<?php echo GET_TEMPLATE_DIRECTORY_URI; ?>/images/twitter.png" alt="twitter"></a></li>
                            <li><a href="#"><img src="<?php echo GET_TEMPLATE_DIRECTORY_URI; ?>/images/youtube.png" alt="youtube"></a></li>
                            <li><a href="#"><img src="<?php echo GET_TEMPLATE_DIRECTORY_URI; ?>/images/plus.png" alt="plus"></a></li>
                            <li><a href="#"><img src="<?php echo GET_TEMPLATE_DIRECTORY_URI; ?>/images/linkedin.png" alt="linkedin"></a></li>
                  
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