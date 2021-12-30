<link href="<?=SCRIPT_URL?>includes/datepicker/ui.all.css" rel="stylesheet" type="text/css"/>
<script src="<?=SCRIPT_URL?>includes/datepicker/ui.core.js" type="text/javascript"></script>
<script src="<?=SCRIPT_URL?>includes/datepicker/ui.datepicker.js" type="text/javascript"></script>
<script type="text/javascript">
	jQuery(function() {
		jQuery("#datepicker").datepicker();
		jQuery('#datepicker').datepicker('option', {dateFormat: 'yy-mm-dd'}); 
		
		jQuery("#datepicker2").datepicker();
		jQuery('#datepicker2').datepicker('option', {dateFormat: 'yy-mm-dd'}); 
		
		jQuery("#datepicker3").datepicker();
		jQuery('#datepicker3').datepicker('option', {dateFormat: 'yy-mm-dd'}); 
	});
</script>
