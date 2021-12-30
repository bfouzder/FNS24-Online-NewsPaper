<div class="request-right" style="margin:0px;padding:0px;">
<?
 if($uploader){ ?>
<?=showRecentArticlesBy($uploader['user_id'],$cat_id, $limit='4', $wiget_title="$uploaded_by's Files");?>
<br style="clear: both;"/>
<br style="clear: both;"/>
<? } ?>
<?=showRecentArticles($limit='10', $wiget_title='Recently uploaded Files');?>
   <br style="clear: both;"/>
</div>