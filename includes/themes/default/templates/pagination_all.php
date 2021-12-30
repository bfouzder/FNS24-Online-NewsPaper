<?php
if($pages['total_page'] > 1){?>
<nav>
<ul class="pagination">

                <?php
		echo '<li><a href="'.SCRIPT_URL.$link.'/'.$pages['first'].'">First</a> </li>';
		 if(isset($pages['prev_page'])){
    		echo '<li><a href="'.SCRIPT_URL.$link.'/'.$pages['prev_page'].'" aria-label="Previous"><span aria-hidden="true">&laquo;</span></a></li>';
    	}
	 	foreach($pages['page_list'] as $k=>$v){
			echo '<li><a href="'.SCRIPT_URL.$link.'/'.$k.'"><span><span>'.$k.'</span></span></a> </li>';
		} 
		
		if(isset($pages['next_page'])){
    		echo '<li><a href="'.SCRIPT_URL.$link.'/'.$pages['next_page'].'" aria-label="Next"><span aria-hidden="true">&raquo;</span></a></li>';
    	}
		echo ' <li><a href="'.SCRIPT_URL.$link.'/'.$pages['last'].'">Last</a> </li>';
	?>
<li><a>Showing Page: <?=$pages['curr_page']?> / <?=$pages['total_page']?></a></li>
</ul>
<!--bof Page shift-->
<script type="text/javascript"> var p_link='<?=SCRIPT_URL.$link?>/'; var p_total=<?=$pages['total_page']?>; function pagi_goto(ffff){var p_no=$('#pn').val(); if($.isNumeric( p_no ) && p_no<=p_total ){ location=p_link+p_no;} return false;}</script>
<!--<center><form action="" onsubmit="return pagi_goto(this)"><table cellpadding="2" style="clear: both;width:60%;"><tr><td style="color:#606060;">Or Jumpto Page: <input type="text" name="pn" id="pn" value="" maxlength="3" size="3" style="padding:2px; border:1px solid #ccc;"/><input type="submit" name="pn" value="GO" maxlength="3"/></td></tr></table></form> </center>-->
<!--eof Page shift--> 
</nav>   
<?php 
	}
?>