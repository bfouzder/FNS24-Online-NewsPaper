<?php 
include('../includes/config.php');
global $db;
$action = $db->get_post('action');

switch($action){
    
case 'add_to_playlist':
$user_id =state('CE_user_id');
$files=$_POST['files'];
$ids="";
if($user_id){
    if($files){
        
        $playlist_cat_id=$_POST['playlist_cat_id'];
        $playlist_cat_title=$_POST['playlist_cat_title'];
        
        if(!$playlist_cat_id){
            $catdata=array();
            $catdata['user_id']=$user_id;
            $catdata['title']=$playlist_cat_title;
            $playlist_cat_id = $db->bindPOST("playlist_category","playlist_cat_id",$catdata);
        }
        
        if(!$playlist_cat_id){ echo ""; break; }
        
        foreach($files as $file){
        	$file_path=FILE_URL.$file;                  
            $fname=explode('-',basename($file));
            $file_id=$fname[0];
            $data=array();
            $data['user_id']=$user_id;
            $data['file_id']=$file_id;
            $data['playlist_cat_id']=$playlist_cat_id;
            $data['file_path']=$file_path;
            
            $playlist_id=$db->bindPOST("playlist","id",$data);
            if($playlist_id){
               $ids .='__'.$playlist_id; 
            }
        }
        
        ar_createMyPlaylist($user_id,$playlist_cat_id);
    }//if files
}//if user id
echo $ids;
break; 
    
case 'remove_from_playlist':
$user_id =state('CE_user_id');
$files=$_POST['files'];
$ids="";
if($user_id){
    if($files){
            
        foreach($files as $file){
        	$file_path=FILE_URL.$file;                  
            $fname=explode('-',basename($file));
            $file_id=$fname[0];
            
            $playlist_id=$db->delete("DELETE FROM playlist WHERE  `user_id`='$user_id' AND `file_id`='$file_id'");
            if($playlist_id){
               $ids .='__'.$playlist_id; 
            }
        }
        if($ids){
         ar_createMyPlaylist($user_id);   
        }
         
    }//if files
}//if user id
echo $ids;
break;

case 'do_delete_newsfeed':
$del_by =state('CE_user_id');
if($del_by){ 
$feed_id =$_POST['feed_id'];
$db->delete("delete from newsfeed WHERE id=".$feed_id);
echo '777';
}else{
echo 'only login user can do this';exit;
} 
break; 

case 'do_delete_comments':
$like_by =state('CE_user_id');
if($like_by){ 
$item_id =$_POST['item_id'];
$db->delete("delete from comments WHERE  id=".$item_id);
echo '777';
}else{
echo 'only login user can do this';exit;
} 
break; 
    
case 'do_delete_wallfiles':
$like_by =state('CE_user_id');
if($like_by){ 
$item_id =$_POST['item_id'];
$db->delete("delete from wallpost WHERE id=".$item_id);
$db->delete("delete from wallpost WHERE parent=".$item_id);
echo '777';
}else{
echo 'only login user can do this';exit;
} 
break; 
case 'do_delete_requestedfiles':
$like_by =state('CE_user_id');
if($like_by){ 
$item_id =$_POST['item_id'];
$db->delete("delete from requestfiles WHERE id=".$item_id);
$db->delete("delete from requestfiles WHERE parent=".$item_id);
echo '777';
}else{
echo 'only login user can do this';exit;
} 
break;    
    
case 'do_like':
$like_by =$_POST['like_by']=state('CE_user_id');
if($like_by){ 
$type =$_POST['type'];
$item_id =$_POST['item_id'];
$like =$_POST['like']=1;
$id=$db->bindPOST('highfives','id');
if($id){ sendLikeEmail($id); echo $total_like =getTotalLike($type,$item_id,$like=1); exit; }else{echo 'Already Liked it';exit;}
}else{
echo 'only login user can do this';exit;
} 
break;

case 'do_unlike':
$like_by =$_POST['like_by']=state('CE_user_id');
if($like_by){ 
$type =$_POST['type'];
$item_id =$_POST['item_id'];
$like =$_POST['like']=1;
$id=$db->delete("delete from `highfives` where `type`='$type' AND `like_by`='$like_by' AND `item_id`='$item_id' AND `like` =1");
echo $total_like =getTotalLike($type,$item_id,$like=1); exit;
}else{
echo 'only login user can do this';exit;
} 
break;

case 'do_dislike':
$like_by =$_POST['like_by']=state('CE_user_id');
if($like_by){ 
$type =$_POST['type'];
$item_id =$_POST['item_id'];
$like =$_POST['like']=0;
$id=$db->bindPOST('highfives','id');

if($id){echo $total_like =getTotalLike($type,$item_id,$like=0);exit; }else{echo 'Already DisLiked it';exit;}
}else{
echo 'only login user can do this';exit;
} 
break;	
case 'autosearch_users':
            $articles_view="";
            $qq = $db->get_post('q');
            if(!$qq){return '';}
            $sql_query="SELECT * FROM `users` WHERE user_status=1 AND user_name LIKE '$qq%' ORDER BY user_name LIMIT 100";		
            $users = $db->select($sql_query);
          //  pre($users);
            if($users){
            $articles_view ='<table border="1" summary="Summary Here" cellpadding="0" cellspacing="0" id="utable"><tbody>
                    <tr><td onclick="$(\'#utable\').hide();" align="right" style="color:#ccc; border:none; cursor:pointer;">X(close)</td></tr>';
            
            foreach($users as $k=> $user_info){
                
            $by_img= getProfileImg2($user_info['user_id'],$user_info['user_picture'],$profile_image_width=30,$profile_image_height=30);
            $uname=$user_info['user_name'];
            $uid=$user_info['user_id'];
            $class=(($k%2)==0)?'light':'dark';            
            $articles_view .= '<tr class="'.$class.'">
                                 <td onclick="showUName(\''.$uname.'\',\''.$uid.'\');" style="cursor:pointer;" valign="top"><div style="float:left;">'.$by_img.'</div>'.$user_info['user_name'].'</td>                
                              </tr>';	
            }
            $articles_view .= '</tbody>
            </table>';   
            
            }      
        echo $articles_view;		
			break;	
case 'autosearch':
            $articles_view="";
            $qq = $db->get_post('q');
            if(!$qq){return '';}
            if(strlen($qq) < 2 ){return '';}
            
            if(strlen($qq) < 4 ){
            $sql_query="SELECT * FROM `articles` WHERE active=1 AND menu_text LIKE '$qq%'";    
            }else{
                $sql_query="SELECT * FROM `articles` WHERE active=1 AND menu_text LIKE '%$qq%'";
            }
            
            
            $sql_query .= " ORDER BY cat_id, menu_text LIMIT 30";	
            //echo  $sql_query;	
            $onlinearticles = $db->select($sql_query);
            if($onlinearticles){
            $articles_view ='<div style="clear:both;border:10px solid #231F20;border-radius:6px; padding:0px; margin:0px;"><table summary="Summary Here" cellpadding="4" cellspacing="2"><tbody>';
            $articles_view .= '<tr bgcolor="231F20">
                <td colspan="1" style="color:#fff; font-weight:bold;border-style:none;">Total '.count($onlinearticles).' data found</td>      
                <td colspan="4" onclick="close_qsearch();" style="color:#fff; font-weight:bold;cursor:pointer;border-style:none;" align="right">( X )Close</td>
              </tr>';  
            foreach($onlinearticles as $k=> $article_info){
               // pre($article_info);exit;
            $article_url=__article_url($article_info);
            
            $cat_name="";

$section_info =getSectionInfo($article_info['cat_id']);
if($section_info){
$caturl=SCRIPT_URL.'net/section/'.$section_info['seo_title'].'/onlineContent.aspx';
$cat_name='<a href="'.$caturl.'">'.$section_info['menu_text'].'</a>';   
}

 $author=getUserName($article_info['user_id']);
 $uploaded_author= 'By: <a href="'.SCRIPT_URL.'profile/'.$author.'">'.$author.'</a>';

$f_size=array();
$downloadable_files=getFiles('articles',$article_info['article_id']);
if($downloadable_files){ 
    foreach($downloadable_files as $k=> $finfo){
        $f_size[]=$finfo['file_size'];
    }
}
$total_size= array_sum($f_size);

$login_user_id=state('CE_user_id');

$allow_users=array(2993,2988,1); //aditya, shamim, admin
$del_icon= (in_array($login_user_id,$allow_users))?'<a href="'.SCRIPT_URL.'deleteArticle/'.$article_info['article_id'].'" target="_blank">Delete</a>':'';

        
            $file_quality =($article_info['file_quality'])?'<a href="'.SCRIPT_URL.'quality/'.$article_info['file_quality'].'">'.$article_info['file_quality'].'</a>':'';
            $articles_view_link = '<a href="'.$article_url.'" >View detail</a>'; 
            $class=(($k%2)==0)?'light':'dark';
            $articles_view .= '<tr class="'.$class.'">
                <td><a href="'.$article_url.'" style="font-size:16px;disply:block;color:#799EB1">'.utf8_encode($article_info['menu_text']).'</a>
                 <br/><span>'.$uploaded_author.', Viewed: '.$article_info['viewed'].', Download: '.$article_info['dl'].'</span>
                </td>
                 <td>Size: '.viewSize($total_size).'</td>
                <td><a href="'.$article_url.'"><b>'.ucwords(utf8_encode($cat_name)).'</b></a></td>      
                <td>'.$del_icon.'</td>
                        
              </tr>';	
            }

$articles_view .= '<tr bgcolor="231F20">
<td colspan="1" style="color:#fff; font-weight:bold;border-style:none;">Total '.count($onlinearticles).' data found</td>      
                <td colspan="4" onclick="close_qsearch();" style="color:#fff; font-weight:bold;cursor:pointer;border-style:none;" align="right">( X )Close</td>
              </tr>';  

            $articles_view .= '</tbody>
            </table></div>';               
            }  
              
        echo $articles_view;		
			break;	
            
    
    case 'autosearch_old':
            $articles_view="";
            $qq = $db->get_post('q');
            if(!$qq){return '';}
            $sql_query="(SELECT * FROM `articles` WHERE active=1 AND article_title LIKE '$qq%' OR file_quality LIKE '$qq%')
            UNION
            (SELECT * FROM `articles` WHERE active=1 AND menu_text LIKE '$qq%' )";
            $sql_query .= " ORDER BY menu_text LIMIT 100";		
            $onlinearticles = $db->select($sql_query);
            if($onlinearticles){
            $articles_view ='<table summary="Summary Here" cellpadding="0" cellspacing="0">
            <thead>
              <tr>
                <th>#SL</th>
                <th>Name</th>
                <th>viewed</th>
                <th>Quality</th>
                <th>action</th>
              </tr>
            </thead>
            <tbody>';
            
            foreach($onlinearticles as $k=> $article_info){
            $article_url=__article_url($article_info);
            
            $file_quality =($article_info['file_quality'])?'<a href="'.SCRIPT_URL.'quality/'.$article_info['file_quality'].'">'.$article_info['file_quality'].'</a>':'';
            $articles_view_link = '<a href="'.$article_url.'" > View detail</a>'; 
            $class=(($k%2)==0)?'light':'dark';
            $articles_view .= '<tr class="'.$class.'">
                <td>'.($k+1).'</td>
                <td><a href="'.$article_url.'">'.utf8_encode($article_info['menu_text']).'</a></td>
                <td>'.$article_info['viewed'].'</td>
                <td>'.$file_quality.'</td>
                <td>'.$articles_view_link.'</td>
              </tr>';	
            }
            $articles_view .= '</tbody>
            </table>';   
            
            }      
        echo $articles_view;		
			break;
            
  
    case 'chatPanel':
            $user_id = $sender_id= $_POST['sender_id']=state('CE_user_id');
            $receiver_id=$_POST['receiver_id'];
            $receiver_id=(int) $receiver_id;
            $show_hide =false;
            if($receiver_id){
                    $csession_id=checkExistChatSession($user_id, $receiver_id);
                    if(!$csession_id){
                        $csession_id=$db->bindPOST('chatbox_session','csession_id');    
                    }
                    
               $show_hide=true;     
               $chat_panel=getChatPanel($user_id,$show_hide,$csession_id);
               echo json_encode($chat_panel);  
              
            }else{
              $chat_panel=getChatPanels($user_id,$show_hide);
              echo json_encode($chat_panel);  
            }
            
			break;	
        case 'chattNewPanel':
            $user_id = $sender_id= $_POST['sender_id']=state('CE_user_id');
            $csession__ids = $_POST['csessionids'];
           
            $chat_panel=getNewChatPanels($user_id,$csession__ids);
            //pre($chat_panel);
            echo json_encode($chat_panel);
			break;	
            
       case 'getUnreadChatcount':
            $receiver_id= $_POST['receiver_id']=state('CE_user_id');
            $csession_id = $_POST['csession_id'];
            $rows= $db->select("select id,sender_id from chatbox WHERE csession_id='$csession_id' AND receiver_id='$receiver_id' AND `rd`=0");
            if($rows){
                $count =count($rows);
                $sender_info=getUserInfo($rows[0]['sender_id']);
                $sender_name= $sender_info['user_name'];   
                $arr = array('c_count'=>$count,'c_sender'=>$sender_name);
            }else{
                 $arr = array('c_count'=>'','c_sender'=>''); 
            }
            echo json_encode($arr);            
			break;
       case 'updateChatcount':
            $receiver_id= $_POST['receiver_id']=state('CE_user_id');
            $csession_id = $_POST['csession_id'];
           $db->edit("UPDATE chatbox SET `rd`=1 WHERE csession_id='$csession_id' AND receiver_id='$receiver_id'");
            echo 'done';
			break;    
                  
    case 'saveChats':
            $sender_id= $_POST['sender_id']=state('CE_user_id');
            $receiver_id=$_POST['receiver_id'];
            $csession_id=$_POST['csession_id'];
            $id=$db->bindPOST('chatbox','id');
            mysql_query("UPDATE `chatbox_session` SET `status`='1' WHERE csession_id =$csession_id");
            echo $id;		
			break;	
                    
    case 'getChats':
            $chat_view="";
            $csession_id=$db->get_post('csession_id');
            $chat_view= getRunningChat($csession_id);      
            #$articles_view= getRunningChat_OLD($user_id, $receiver_id);      
            echo $chat_view;		
			break;	
   case 'chat_panel_close':
            $user_id = $sender_id= $_POST['sender_id']=state('CE_user_id');
            $csession_id=$db->get_post('csession_id');
            mysql_query("UPDATE chatbox SET `rd`=1 WHERE csession_id='$csession_id' AND receiver_id='$user_id'");
            mysql_query("UPDATE `chatbox_session` SET `status`='0' WHERE csession_id =$csession_id");
           
           	break; 
   case 'getChatUsers':
            $chat_users=showChatUsersHTMLwithTooltip();
            if(!$chat_users){
              $chat_users = array('tt_online'=>'0','online_users'=>'','tooltip_contents'=>'');
            }
            echo json_encode($chat_users); 
            	
			break;
            
      case 'getChatUsers':
            $chat_users=showChatUsersHTMLwithTooltip();
            if(!$chat_users){
              $chat_users = array('tt_online'=>'0','online_users'=>'','tooltip_contents'=>'');
            }
            echo json_encode($chat_users); 
            	
			break;	
                     	
                                        			
	default:
			echo "";
			break;
}
exit;
?>	