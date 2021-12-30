<?php 
/* 
#POPUP MODAL
?>
<div class="modal fade" tabindex="-1" role="dialog" id="pagemodal">
  <div class="modal-dialog" role="document">
    <div class="modal-content"> 
       <div class="modal-header" style="border:0;">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
       </div>
       <div class="modal-body">
        <img src="https://fns24.com/resources/ads/Big%20Screen%20Add.jpg" alt="adv">
       </div> 
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<?php */?>
<script type="text/javascript" src="<?php echo GET_TEMPLATE_DIRECTORY_URI; ?>/js/jquery-1.11.1.min.js"></script>
<script type="text/javascript"> $=jQuery;</script>
<script defer type="text/javascript" src="<?php echo GET_TEMPLATE_DIRECTORY_URI; ?>/js/bootstrap.js"></script>
<script defer type="text/javascript" src="<?php echo GET_TEMPLATE_DIRECTORY_URI; ?>/js/jquery.li-scroller.1.0.js"></script>
<!--<script type="text/javascript" src="<?php echo GET_TEMPLATE_DIRECTORY_URI; ?>/js/jssor.script.js"></script>-->
<script defer type="text/javascript" src="<?php echo GET_TEMPLATE_DIRECTORY_URI; ?>/js/owl.carousel.js"></script>
<script defer type="text/javascript" src="<?php echo GET_TEMPLATE_DIRECTORY_URI; ?>/js/script.js"></script>
<?php if(isset($is_home_page)):?>
<script type="text/javascript">
    jQuery(document).ready(function () {
        //jQuery('#pagemodal').modal('show');
     });	
</script>
<?php endif;?>
<!--bof Footer code-->
<?=getSettings('AR_FOOTER_CODE');?>
<!--eof Footer code-->
<?php $db->close();?>
</body>
</html>