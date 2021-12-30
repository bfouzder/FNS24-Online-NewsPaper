<?php
global $session;	
$message=($message)?$message:$session->flashmessage('successMessage');
$error=($error)?$error:$session->flashmessage('errorMessage');
$warning=($warning)?$warning:$session->flashmessage('warningMessage');
 if(!empty($message) || !empty($error)){ ?>
<div data-example-id="dismissible-alert-js" class="bs-example bs-example-standalone">
   <?php if(!empty($message)){ ?>
    <div role="alert" class="alert alert-success alert-dismissible fade in">
      <button aria-label="Close" data-dismiss="alert" class="close" type="button"><span aria-hidden="true">X</span></button>
      <?=$message?>
    </div>
    <?php } ?>
       <?php if(!empty($error)){ ?>
    <div role="alert" class="alert alert-danger alert-dismissible fade in">
       <button aria-label="Close" data-dismiss="alert" class="close" type="button"><span aria-hidden="true">X</span></button>
       <p><?=$error?></p>    
    </div>
    <?php } ?>
</div>
<?php } ?>
<div id="errordata_block"  class="bs-example bs-example-standalone" style="display:none;" onclick="$(this).hide('slow');">
  <div role="alert" class="alert alert-danger alert-dismissible fade in">
     <button  class="close" type="button"><span aria-hidden="true">x</span></button>
       <div id="errordata"><?=$error?></div> 
    </div>
</div>