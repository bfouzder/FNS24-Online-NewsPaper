    <script src="<?php echo GET_VENDORS_DIRECTORY_URI; ?>/vendors/js/bootstrap.min.js"></script>
	
	<!-- bootstrap progress js -->
	<script src="<?php echo GET_VENDORS_DIRECTORY_URI; ?>/vendors/js/progressbar/bootstrap-progressbar.min.js"></script>
	<script src="<?php echo GET_VENDORS_DIRECTORY_URI; ?>/vendors/js/nicescroll/jquery.nicescroll.min.js"></script>
   <?php if ($SHOW_DATEPICKER) : ?>
    <!-- daterangepicker -->
        <script type="text/javascript" src="<?php echo GET_VENDORS_DIRECTORY_URI; ?>/vendors/js/moment/moment.min.js"></script>
        <script type="text/javascript" src="<?php echo GET_VENDORS_DIRECTORY_URI; ?>/vendors/js/datepicker/daterangepicker.js"></script>
  <?php endif; ?>   
    	<!-- select2 -->
	<script src="<?php echo GET_VENDORS_DIRECTORY_URI; ?>/vendors/js/select/select2.full.js"></script>
	<!-- form validation -->
	<script type="text/javascript" src="<?php echo GET_VENDORS_DIRECTORY_URI; ?>/vendors/js/parsley/parsley.min.js"></script>

	<!-- Custom Theme Scripts -->
    <script src="<?php echo GET_VENDORS_DIRECTORY_URI; ?>/vendors/js/custom.js"></script>


    
   
  <script>
  /*
      $(document).ready(function() {
       
      $('.datepicker').daterangepicker({
          singleDatePicker: true,
          format: 'YYYY-MM-DD',
          calender_style: "picker_4"
        }, function(start, end, label) {
      
        });

		 $('.date-picker').daterangepicker({
          singleDatePicker: true,
          format: 'DD-MM-YYYY',
          calender_style: "picker_4"
        }, function(start, end, label) {
      
        });

		 $('#single_cal2').daterangepicker({
          singleDatePicker: true,
		    format: 'DD-MM-YYYY',
          calender_style: "picker_4"
        }, function(start, end, label) {
			
        });
		
		 $('#single_cal3').daterangepicker({
          singleDatePicker: true,
		    format: 'DD-MM-YYYY',
          calender_style: "picker_4"
        }, function(start, end, label) {
         
        });
        
         $('#single_cal4').daterangepicker({
          singleDatePicker: true,
		      format: 'DD-MM-YYYY',
          calender_style: "picker_4"
        }, function(start, end, label) {
         
        });
        
         $('#single_cal5').daterangepicker({
          singleDatePicker: true,
		      format: 'DD-MM-YYYY',
          calender_style: "picker_4"
        }, function(start, end, label) {
         
        });
        
      });
      */
    </script>
     <!-- Select2 -->
    <script>
      $(document).ready(function() {
        $(".select2_single").select2({
          placeholder: "Select a state",
          allowClear: true
        });
        $(".select2_group").select2({});
        $(".select2_multiple").select2({
          maximumSelectionLength: 40,
          //placeholder: "With Max Selection limit 4",
          allowClear: true
        });
      });
    </script>
    <!-- /Select2 -->
    <!-- /Starrr -->
	
	
	
<!--bof facybox-->
<script type="text/javascript" src="<?php echo GET_VENDORS_DIRECTORY_URI; ?>/vendors/fancyapps/source/jquery.fancybox.js?v=2.1.5"></script>
<link rel="stylesheet" type="text/css" href="<?php echo GET_VENDORS_DIRECTORY_URI; ?>/vendors/fancyapps/source/jquery.fancybox.css?v=2.1.5" media="screen"/>
<script type="text/javascript">
    jQuery(document).ready(function () {
        jQuery('.fancybox').fancybox();
    });
</script>
<!--/eof facybox-->

</body>
</html>