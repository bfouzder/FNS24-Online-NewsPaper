<div class="request-left-top"><?=$type?> Report </div>
       <div class="request-left-med">

<div class="movie-details">
   <div class="table-format">
  <b>showing report with total : <?=$total_data?> data</b> 
<form  id="myForm" name="myForm"  method="post" action="" target="_new">   
<table id="travel">
<thead> 
<tr>
    <th scope="col" width="5%" valign="center"># SL</th>
    <th scope="col" width="13%">Category</th>
    <th scope="col" width="42%">Name</th>
    <th scope="col" width="15%">Access By</th>
    <th scope="col" width="25%">Time</th>
</tr>        
</thead>
<tbody>
<? 
foreach($rows as $k=> $finfo){
    if($type!='download'){
     $article_name=$finfo['article_name'];
     $article_id=$finfo['article_id'];
     $user_id=$finfo['user_id'];
     $created=$finfo['created'];
    }else{
     
     $article_id=$finfo['item_id'];
     $user_id=$finfo['download_by'];
     $created=$finfo['added'];
       
    }
     
     
     $article_info=getArticleInfo($article_id);
     $cat_info=getArticleCategoryInfo($article_info['cat_id']);
     $access_by=getUserName($user_id);
     $article_url=__article_url($article_info);
    
if($pages['curr_page'] >1){
$a_index=((($pages['curr_page'] *  $pages['per_page']) - $pages['per_page']) + ($k+1));
}else{
$a_index=($k+1);
}

      echo '<tr class="'.$light_dark.'">
            <td>'.($a_index).'</td>            
            <td>'.$cat_info['menu_text'].'</b></td>
            <td><a href="'.$article_url.'" target="_blank">'.$article_info['menu_text'].'</a></td>
            <td><a href="'.SCRIPT_URL.'profile/'.$access_by.'">'.$access_by.'</a></td>
            <td>'.$created.'</td>
        </tr>';
       } 
    ?>
</tbody>  
</table>
</form>

<? require(COMMON_TEMPLATES.'pagination_all.php');	?>
   </div> 
</div>
<!--eof downloads-->
  
</div>