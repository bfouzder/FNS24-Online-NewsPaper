<?php
function getPageInfo($page_id_name){
	global $db;	
	
	if(is_numeric($page_id_title)){
		$row=$db->getRowArray('pagemanager',array('page_id'=>$page_id_name));
	}else{
		$row=$db->getRowArray('pagemanager',array('page_name'=>$page_id_name));
	}		
	return $row;
}
	
function getPageName($page_id){
	global $db;	
	if(!$page_id){return 'Main';}
	
	$row=$db->getRowArray('pagemanager',array('page_id'=>$page_id),'page_name');
	return $row['page_name'];
}

function getPages($parent='0',$checkActive=false){
	global $db;		
	if($checkActive){
		$pages=$db->select("SELECT * FROM pagemanager WHERE  active=1 AND `parent`='$parent'  ORDER BY short");
	}else{
		$pages=$db->select("SELECT * FROM pagemanager WHERE `parent`='$parent'  ORDER BY short");
	}	
	return $pages;
}

function getAllPages(){
	global $db;	
	
    $pages=$db->select("SELECT * FROM pagemanager ORDER BY short ");

	return $pages;
}


function ShowSelectBoxPageTree_($edit_id=false,$separator='&raquo;'){ 
$showpage_tree='<select name="parent" class="form-control"><option value="0" > Main Page </option>';

 $static_pages=getPages(0);
  if($static_pages){
   	  
  	foreach($static_pages as $page){
  	  $select=($edit_id && ($page['page_id']==$edit_id))?'selected="selected"':'';	
  	    $showpage_tree.= '<option value="'.$page['page_id'].'" '.$select.' >'.$page['page_title'].'</option>';
        
        $sub_static_pages=getPages($page['page_id']);
		if($sub_static_pages){	  
			foreach($sub_static_pages as $k=>$page){
			   $select=($edit_id && ($page['page_id']==$edit_id))?'selected="selected"':'';	  
				$showpage_tree.= '<option value="'.$page['page_id'].'" '.$select.' >&nbsp;&nbsp;'.$separator.$separator. $page['page_title'].'</option>';
                $sub_static_pages2=getPages($page['page_id']);
    			if($sub_static_pages2){	  
    				foreach($sub_static_pages2 as $kk=>$page){
    				      $select=($edit_id && ($page['page_id']==$edit_id))?'selected="selected"':'';	  
    					$showpage_tree.= '<option value="'.$page['page_id'].'" '.$select.' >&nbsp;&nbsp;&nbsp;&nbsp;'.$separator.$separator.$separator.$separator.$page['page_title'].'</option>';
    				}
    			}//$sub_static_pages2 
                
			}
		}//$sub_static_pages 	
  	}//eof foreach  
      
  
  }		   
    $showpage_tree ='</select>';
}

function ShowSelectBoxPageTree($edit_id=false,$spaces='|__',$separator='&raquo;'){ 
    $showpage_tree='<select name="parent" class="form-control"><option value="0" > Main Page </option>';
    
    $showpage_tree .=getOptionPageTree($edit_id,$spaces,$separator);
    $showpage_tree .='</select>';    
    return $showpage_tree;
}

function getOptionPageTree($edit_id=false,$spaces='|__',$separator='&raquo;'){ 
 $showcategory_tree="";
 $pages=getPages(0);
  if($pages){
   	  
  	foreach($pages as $page){
  	  $select=($edit_id && ($page['page_id']==$edit_id))?'selected="selected"':'';	
  	    $showcategory_tree.= '<option value="'.$page['page_id'].'" '.$select.' >'.$page['page_title'].'</option>';
        
        $sub_pages=getPages($page['page_id']);
		if($sub_pages){	  
			foreach($sub_pages as $k=>$page){
			   $select=($edit_id && ($page['page_id']==$edit_id))?'selected="selected"':'';	  
				$showcategory_tree.= '<option value="'.$page['page_id'].'" '.$select.' >'.$spaces.$separator. $page['page_title'].'</option>';
                $sub_pages2=getPages($page['page_id']);
    			if($sub_pages2){	  
    				foreach($sub_pages2 as $kk=>$page){
    				      $select=($edit_id && ($page['page_id']==$edit_id))?'selected="selected"':'';	  
    					$showcategory_tree.= '<option value="'.$page['page_id'].'" '.$select.' >'.$spaces.$spaces.$separator.$page['page_title'].'</option>';
                        
                        $sub_pages3=getPages($page['page_id']);
            			if($sub_pages3){	  
            				foreach($sub_pages3 as $kkk=>$page){
            				      $select=($edit_id && ($page['page_id']==$edit_id))?'selected="selected"':'';	  
            					$showcategory_tree.= '<option value="'.$page['page_id'].'" '.$select.' >'.$spaces.$spaces.$spaces.$separator.$page['page_title'].'</option>';
            			
                                $sub_pages4=getPages($page['page_id']);
                    			if($sub_pages4){	  
                    				foreach($sub_pages4 as $kkkk=>$page){
                    				      $select=($edit_id && ($page['page_id']==$edit_id))?'selected="selected"':'';	  
                    					$showcategory_tree.= '<option value="'.$page['page_id'].'" '.$select.' >'.$spaces.$spaces.$spaces.$spaces.$separator.$page['page_title'].'</option>';
                    				    
                                        $sub_pages5=getPages($page['page_id']);
                            			if($sub_pages5){	  
                            				foreach($sub_pages5 as $kkkkk=>$page){
                            				    $select=($edit_id && ($page['page_id']==$edit_id))?'selected="selected"':'';	  
                            					$showcategory_tree.= '<option value="'.$page['page_id'].'" '.$select.' >'.$spaces.$spaces.$spaces.$spaces.$spaces.$separator.$page['page_title'].'</option>';
                            				
                                                $sub_pages6=getPages($page['page_id']);
                                    			if($sub_pages6){	  
                                    				foreach($sub_pages6 as $kkkkkk=>$page){
                                    				      $select=($edit_id && ($page['page_id']==$edit_id))?'selected="selected"':'';	  
                                    					$showcategory_tree.= '<option value="'.$page['page_id'].'" '.$select.' >'.$spaces.$spaces.$spaces.$spaces.$spaces.$spaces.$separator.$page['page_title'].'</option>';
                                    				}
                                    			}//$sub_pages5 
                                            
                                            }
                            			}//$sub_pages5 
                                    
                                    }
                    			}//$sub_pages4 
                        
                        	}
            			}//$sub_pages3 
    				}
    			}//$sub_pages2 
                
			}
		}//$sub_pages 	
  	}//eof foreach        
    
  }	
    return $showcategory_tree;
}


function ShowPageTree($checkActive=true){   
	$static_pages=getPages(0,$checkActive);
	if($static_pages){
		$showpage_tree='<ul class="pagetree">';   
		foreach($static_pages as $k=>$page){
			$showpage_tree .= '<li><b><a href="'.SCRIPT_URL.'page/'.$page['page_name'].'" title="'.$page['page_title'].'">'.$page['page_title'].'</a></b></li>';
			$sub_static_pages=getPages($page['page_id'],$checkActive);
			if($sub_static_pages){	  
				foreach($sub_static_pages as $k=>$page){
					$showpage_tree .= '<li>&nbsp;&nbsp;&nbsp;&raquo;<a href="'.SCRIPT_URL.'page/'.$page['page_name'].'" title="'.$page['page_title'].'">'.$page['page_title'].'</a></b></li>';
                    
                        $sub_static_pages2=getPages($page['page_id'],$checkActive);
            			if($sub_static_pages2){	  
            				foreach($sub_static_pages2 as $kk=>$page){
            					$showpage_tree .= '<li>&nbsp;&nbsp;&nbsp;&raquo;<a href="'.SCRIPT_URL.'page/'.$page['page_name'].'" title="'.$page['page_title'].'">'.$page['page_title'].'</a></b></li>';
            				}
            			}
				}
			}
		}
		$showpage_tree .=  '</ul>';   
	}
	return $showpage_tree;
}


function ShowPages($parent='0'){
	
	$static_pages=getPages($parent);
	if($static_pages){
		echo '<ul>';   
		foreach($static_pages as $k=>$page){
			echo '<li><a href="'.SCRIPT_URL.'page/'.$page['page_name'].'" title="'.$page['page_title'].'">'.$page['page_title'].'</a></li>';
		}
		echo '</ul>';   
	}
}



/*	
--
-- Table structure for table `pagemanager`
--

DROP TABLE IF EXISTS `pagemanager`;
CREATE TABLE IF NOT EXISTS `pagemanager` (
  `page_id` tinyint(4) NOT NULL auto_increment,
  `lang` varchar(255) NOT NULL default 'en',
  `parent` int(11) NOT NULL default '0',
  `page_name` varchar(255) NOT NULL,
  `page_title` text character set utf8 NOT NULL,
  `page_content` mediumtext character set utf8 NOT NULL,
  `short` int(11) NOT NULL,
  `active` int(2) NOT NULL default '1',
  PRIMARY KEY  (`page_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `pagemanager`
--

INSERT INTO `pagemanager` (`page_id`, `lang`, `parent`, `page_name`, `page_title`, `page_content`, `short`, `active`) VALUES
(1, 'en', 0, 'privacy', 'Privacy Policy', '<p style="font-weight: bold; margin-bottom: 20px;">This FILERACK Service Agreement (the "Agreement") describes the terms and conditions on which FILERACK ("we") offer services to you ("User"). By using our services, User agrees to be bound by the following terms and conditions:</p>\r\n<p>All kinds: from your party photos to an important document. The only restrictions are for pornography, nudity, sexual images and any kind offensive material, and, of course, copyrighted material.<br />Please refer to our <a href="http://www.file-rack.com/tos.php">TOS</a> for more info on FILERACK terms of service.</p>\r\n<p>FILERACK is not liable for your images, videos or files or any lost business due to the unavailability or loss of the website. We make no claims of future reliability in serving, hosting or storing your images, videos or files.</p>\r\n<p>FILERACK is commited to cooperate with any and all legal authorities if an investigation should arise.</p>', 0, 1),
(2, 'en', 0, 'tos', 'Terms of Service', '<p>This FILERACK Service Agreement (the "Agreement") describes the terms and conditions on which FILERACK ("we") offer services to you ("User"). By using our services, User agrees to be bound by the following terms and conditions:</p>\r\n<ul>\r\n<li>We reserve the right to disable direct linking on user accounts that are using excessive bandwidth or otherwise abusing the system. </li>\r\n<li>Pornography, nudity, sexual images and any kind offensive images or videos are prohibited. Copyrighted material are also strictly prohibited. We reserve the right to decide appropriate content and can delete images or videos at any time without User notification. </li>\r\n<li>Users must agree to comply with all laws which apply to their location, including copyright and trademark laws. Images, videos and files that violate copyrights or trademarks are not allowed. If someone has an infringement claim against you, you will be asked to remove the copyrighted file until the issue is resolved. If there is a dispute between participants on this site, FILERACK is under no obligation to become involved. </li>\r\n<li>FILERACK is not liable for your images, videos or files or any lost business due to the unavailability or loss of the website. We make no claims of future reliability in serving, hosting or storing your images, videos or files. </li>\r\n</ul>\r\n<p><br /> FILERACK is commited to cooperate with any and all legal authorities if an investigation should arise. 	<br /><br />Abuse report: <a href="mailto:abuse@file-rack.com">abuse@file-rack.com</a></p>', 0, 1),
(3, 'en', 0, 'about', 'About Us', '<p>ashdjash doads</p>\r\n<p>asdoi asd</p>\r\n<p>ashdjash doads</p>\r\n<p>asdoi asd</p>\r\n<p>asdpo iyasd</p>\r\n<p>o pasydpiuasd</p>\r\n<p>asdopi yasd</p>\r\n<p>asd oy</p>\r\n<p>ashdjash doads</p>\r\n<p>asdoi asd</p>\r\n<p>asdpo iyasd</p>\r\n<p>o pasydpiuasd</p>\r\n<p>asdopi yasd</p>\r\n<p>asd oy</p>\r\n<p>ashdjash doads</p>\r\n<p>asdoi asd</p>\r\n<p>asdpo iyasd</p>\r\n<p>o pasydpiuasd</p>\r\n<p>asdopi yasd</p>\r\n<p>asd oy</p>\r\n<p>asdpo iyasd</p>\r\n<p>o pasydpiuasd</p>\r\n<p>asdopi yasd</p>\r\n<p>asd oy</p>', 0, 1);

*/
?>	