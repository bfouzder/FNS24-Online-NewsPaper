<div id="leftbar">
	        <div class="welcome">
			  
               <?php
               $img_srccc=IMAGE_URL.'catarticles/580-1.jpg'; 
               ?>
           <div class="welcome-snap"> <img src="<?=$img_srccc;?>" alt="" /></div>
               
               
<div class="search-form" style="width:165px;">
		   <form action="<?=SCRIPT_URL?>search" method="post" onsubmit="return checkSearchForm(this)">
		    <ul>
			  <li><input type="text" name="q" value="search site.." class="input_search" style="width:131px;" onfocus="if (this.value == 'search site..') this.value = '';" onblur="if (this.value == '') this.value = 'search site..';" /></li>
			  <li><input type="submit" value="" class="go" /></li>			
		    </ul>
		   </form>
	     </div>
<br/>
<?php
/*
?>              
              <div id="google_translate_element"></div><script>
function googleTranslateElementInit() {
  new google.translate.TranslateElement({
    pageLanguage: 'en'
  }, 'google_translate_element');
}
</script><script src="http://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
		
<?php
*/
?> 
	</div>
             
		
		 <?=(isset($show_section_article_tree))?$show_section_article_tree:showAllMainSection($params,10);?>  
			  
            
			<div class="block">			 
				<?=showPopularArticles(7)?>
			  <span class="clear"></span>
	        </div>
        
            
		
			<div class="block">			 
				<?=showRecentArticles(5)?>
			  <span class="clear"></span>
	        </div>

	       <span class="clear"></span>
	    </div>