<?php
function getImageSectionPath($cat_id_seotitle,$default=""){
	global $db;	
    
	$section_info=getImageSectionInfo($cat_id_seotitle);
	$url=""; 
    if($section_info['parent']=='0'){
        $url.=$section_info['seo_title'].'/';    
    }else{
        $section_info1=getImageSectionInfo($section_info['parent']);
        if($section_info1['parent']=='0'){            
             $url.=$section_info1['seo_title'].'/'.$section_info['seo_title'].'/'; 
        }else{
            $section_info2=getImageSectionInfo($section_info1['parent']);
            if($section_info2['parent']=='0'){
                 $url.=$section_info2['seo_title'].'/'.$section_info1['seo_title'].'/'.$section_info['seo_title'].'/'; 
            }else{
                $section_info3=getImageSectionInfo($section_info2['parent']);
                if($section_info3['parent']=='0'){
                     $url.=$section_info3['seo_title'].'/'.$section_info2['seo_title'].'/'.$section_info1['seo_title'].'/'.$section_info['seo_title'].'/'; 
                }else{
                    $section_info4=getImageSectionInfo($section_info3['parent']);
                    if($section_info4['parent']=='0'){
                         $url.=$section_info4['seo_title'].'/'.$section_info3['seo_title'].'/'.$section_info2['seo_title'].'/'.$section_info1['seo_title'].'/'.$section_info['seo_title'].'/'; 
                    }else{
                        $section_info5=getImageSectionInfo($section_info3['parent']);
                        if($section_info5['parent']=='0'){
                             $url.=$section_info5['seo_title'].'/'.$section_info4['seo_title'].'/'.$section_info3['seo_title'].'/'.$section_info2['seo_title'].'/'.$section_info1['seo_title'].'/'.$section_info['seo_title'].'/'; 
                        } 
                    }//4   
                }//3    
            }//2   
        }//1    
    }//0 
    if($default){
        	return $url.$default;
    }
   	return $url;
}


function getAdminImageSectionPath($cat_id_seotitle){
	global $db;	
    
	$section_info=getImageSectionInfo($cat_id_seotitle);
	$url2=""; 
	$url=""; 
    if($section_info['parent']=='0'){
        $url.=$section_info['seo_title'].'/';    
        $url2.=$section_info['menu_text'];    
    }else{
        $section_info1=getImageSectionInfo($section_info['parent']);
        if($section_info1['parent']=='0'){            
             $url.=$section_info1['seo_title'].'/'.$section_info['seo_title'].'/'; 
             $url2.=$section_info1['menu_text'].'->'.$section_info['menu_text']; 
        }else{
            $section_info2=getImageSectionInfo($section_info1['parent']);
            if($section_info2['parent']=='0'){
                 $url.=$section_info2['seo_title'].'/'.$section_info1['seo_title'].'/'.$section_info['seo_title'].'/'; 
                 $url2.=$section_info2['menu_text'].'->'.$section_info1['menu_text'].'->'.$section_info['menu_text']; 
            }else{
                $section_info3=getImageSectionInfo($section_info2['parent']);
                if($section_info3['parent']=='0'){
                     $url.=$section_info3['seo_title'].'/'.$section_info2['seo_title'].'/'.$section_info1['seo_title'].'/'.$section_info['seo_title'].'/'; 
                      $url2.=$section_info3['menu_text'].'->'.$section_info2['menu_text'].'->'.$section_info1['menu_text'].'->'.$section_info['menu_text']; 
                }else{
                    $section_info4=getImageSectionInfo($section_info3['parent']);
                    if($section_info4['parent']=='0'){
                         $url.=$section_info4['seo_title'].'/'.$section_info3['seo_title'].'/'.$section_info2['seo_title'].'/'.$section_info1['seo_title'].'/'.$section_info['seo_title'].'/'; 
                          $url2.=$section_info4['menu_text'].'->'.$section_info3['menu_text'].'->'.$section_info2['menu_text'].'->'.$section_info1['menu_text'].'->'.$section_info['menu_text']; 
                    }else{
                        $section_info5=getImageSectionInfo($section_info3['parent']);
                        if($section_info5['parent']=='0'){
                             $url.=$section_info5['seo_title'].'/'.$section_info4['seo_title'].'/'.$section_info3['seo_title'].'/'.$section_info2['seo_title'].'/'.$section_info1['seo_title'].'/'.$section_info['seo_title'].'/';
                           
                             $url2.=  $section_info5['menu_text'].'->'.$section_info4['menu_text'].'->'.$section_info3['menu_text'].'->'.$section_info2['menu_text'].'->'.$section_info1['menu_text'].'->'.$section_info['menu_text']; 
                     
                        } 
                    }//4   
                }//3    
            }//2   
        }//1    
    }//0 

    
   	return array('seotitle'=>$url,'menutext'=>$url2);
}


function getSeoImageSectionsArray($url){ 
    $url=trim($url); 
    if(!strstr($url,'/content/'))die('wrong urlss'.$url);    
    if(!strstr($url,'.aspx'))die('wrong Image url'.$url);    
    $path = parse_url($url, PHP_URL_PATH);
    if(!$path)return false; 
    $path=str_replace("/content/","",$path);
    $path=str_replace(".aspx","",$path);    
    $path_array = explode('/',$path);     
    if(end($path_array) =='default'){
        unset($path_array[count($path_array)-1]);
    }         
    return $path_array;
}

function getImageUrlType($url){ 
    $url=trim($url); 
    if(!strstr($url,'/content/'))return false;    
    if(!strstr($url,'.aspx'))return false;    
    $path = parse_url($url, PHP_URL_PATH);
    if(!$path)return false; 
    $path=str_replace("/content/","",$path);
    $path=str_replace(".aspx","",$path);    
    $path_array = explode('/',$path);     
    if(end($path_array) =='default'){
       $type = 'catImages';
    }else{
      $type= 'Images';
    }         
    return $type;
}

function getImageCategoryInfo($cat_id_seotitle){
	global $db;	
	
	if(is_numeric($cat_id_seotitle)){
		$row=$db->getRowArray('image_categories',array('cat_id'=>$cat_id_seotitle));
	}else{
		$row=$db->getRowArray('image_categories',array('seo_title'=>$cat_id_seotitle));
	}		
	return $row;
}
function getImageSectionInfo($cat_id_seotitle){
    global $db;	
    
    if(is_numeric($cat_id_seotitle)){
		$row=$db->getRowArray('image_categories',array('cat_id'=>$cat_id_seotitle));
	}else{
		$row=$db->getRowArray('image_categories',array('seo_title'=>$cat_id_seotitle));
	}		
	return $row;
}

function getImageSectionId($seo_title){
    global $db;	
    $row=$db->getRowArray('image_categories',array('seo_title'=>$seo_title),'cat_id');
    return  $row['cat_id'];
}

function getImageCatInfo($cat_id_seotitle,$parant=false){
    global $db;	
    if($parant){
        
        if(is_numeric($cat_id_seotitle)){
    		$row=$db->getRowArray('image_categories',array('cat_id'=>$cat_id_seotitle,'parent'=>$parant));
    	}else{
    		$row=$db->getRowArray('image_categories',array('seo_title'=>$cat_id_seotitle,'parent'=>$parant));
    	}
    
    }else{
            if(is_numeric($cat_id_seotitle)){
        		$row=$db->getRowArray('image_categories',array('cat_id'=>$cat_id_seotitle));
        	}else{
        		$row=$db->getRowArray('image_categories',array('seo_title'=>$cat_id_seotitle));
        	}
    
    }
    		
	return $row;
}
function getImageCatId($seo_title,$parant=false){
    global $db;	
  if($parant){      
        $row=$db->getRowArray('image_categories',array('seo_title'=>$seo_title,'parent'=>$parant),'cat_id');  
    }else{
         $row=$db->getRowArray('image_categories',array('seo_title'=>$seo_title),'cat_id');   
    }

    return  $row['cat_id'];
}

function getImageSectionMenuText($cat_id_seo_title){
	global $db;	
	
    if(is_numeric($cat_id_seotitle)){
		$row=$db->getRowArray('image_categories',array('cat_id'=>$cat_id_seotitle),'menu_text');
	}else{
		$row=$db->getRowArray('image_categories',array('seo_title'=>$cat_id_seotitle),'menu_text');
	}
	return $row['menu_text'];
}

function getImageCategoryMenuText($cat_id){
	global $db;	
	if(!$cat_id){return 'Top Level Section';}
	
	$row=$db->getRowArray('image_categories',array('cat_id'=>$cat_id),'menu_text');
	return $row['menu_text'];
}
	
function getImageCategoryTitle($cat_id){
	global $db;	
	if(!$cat_id){return 'Top Level Section';}
	
	$row=$db->getRowArray('image_categories',array('cat_id'=>$cat_id),'seo_title');
	return $row['seo_title'];
}
function getImageCategorySeoTitle($cat_id){
	global $db;	
	if(!$cat_id){return 'Main';}
	
	$row=$db->getRowArray('image_categories',array('cat_id'=>$cat_id),'seo_title');
	return $row['title'];
}

function getImageCategories($parent='0',$checkActive=false){
	global $db;		
	if($checkActive){
		$categories=$db->select("SELECT * FROM image_categories WHERE  active=1 AND `parent`='$parent' ORDER BY menu_order");
	}else{
		$categories=$db->select("SELECT * FROM image_categories WHERE `parent`='$parent' ORDER BY menu_order");
	}	
	return $categories;
    
}

function getMainImageCategories($parent='0',$checkActive=false){
	global $db;	
    $maincategories=state('maincategories');
    if($maincategories == false){
       	$maincategories=getImageCategories('0',$checkActive);
        
        state('maincategories',$maincategories);
    }	
	
	return $maincategories;    
}

function getImageSubSections($cat_id,$limit=10){
	global $db;		

	$categories=$db->select("SELECT * FROM image_categories WHERE  active=1 AND `parent`='$cat_id' ORDER BY menu_order LIMIT  $limit");
		
	return $categories;
    
}

function getAllImageCategories(){
	global $db;	
	
    $categories=$db->select("SELECT * FROM image_categories  ");
    
	return $categories;
}

function getOptionSubImageCatagoryTree($edit_id=false,$spaces='|__',$separator='&raquo;',$check_active=false){ 
 $showcategory_tree="";
 
 $category_info=getImageSectionInfo($edit_id);
 if(!$category_info)return false;

 if($category_info['parent']){
    $categories=getImageCategories($category_info['parent'],$check_active); 
 }else{
    $categories=getImageCategories($category_info['cat_id'],$check_active);
 } 
    $categories=($categories)?$categories:getImageCategories(0,$check_active);
  if($categories){
   	  
  	foreach($categories as $category){
  	  $select=($edit_id && ($category['cat_id']==$edit_id))?'selected="selected"':'';	
  	    $showcategory_tree.= '<option value="'.$category['cat_id'].'" '.$select.' >'.$category['menu_text'].'</option>';
        
        $sub_categories=getImageCategories($category['cat_id'],$check_active);
		if($sub_categories){	  
			foreach($sub_categories as $k=>$category){
			   $select=($edit_id && ($category['cat_id']==$edit_id))?'selected="selected"':'';	  
				$showcategory_tree.= '<option value="'.$category['cat_id'].'" '.$select.' >'.$spaces.$separator. $category['menu_text'].'</option>';
                $sub_categories2=getImageCategories($category['cat_id'],$check_active);
    			if($sub_categories2){	  
    				foreach($sub_categories2 as $kk=>$category){
    				      $select=($edit_id && ($category['cat_id']==$edit_id))?'selected="selected"':'';	  
    					$showcategory_tree.= '<option value="'.$category['cat_id'].'" '.$select.' >'.$spaces.$spaces.$separator.$category['menu_text'].'</option>';
                        
                        $sub_categories3=getImageCategories($category['cat_id'],$check_active);
            			if($sub_categories3){	  
            				foreach($sub_categories3 as $kkk=>$category){
            				      $select=($edit_id && ($category['cat_id']==$edit_id))?'selected="selected"':'';	  
            					$showcategory_tree.= '<option value="'.$category['cat_id'].'" '.$select.' >'.$spaces.$spaces.$spaces.$separator.$category['menu_text'].'</option>';
            			
                                $sub_categories4=getImageCategories($category['cat_id'],$check_active);
                    			if($sub_categories4){	  
                    				foreach($sub_categories4 as $kkkk=>$category){
                    				      $select=($edit_id && ($category['cat_id']==$edit_id))?'selected="selected"':'';	  
                    					$showcategory_tree.= '<option value="'.$category['cat_id'].'" '.$select.' >'.$spaces.$spaces.$spaces.$spaces.$separator.$category['menu_text'].'</option>';
                    				    
                                        $sub_categories5=getImageCategories($category['cat_id'],$check_active);
                            			if($sub_categories5){	  
                            				foreach($sub_categories5 as $kkkkk=>$category){
                            				      $select=($edit_id && ($category['cat_id']==$edit_id))?'selected="selected"':'';	  
                            					$showcategory_tree.= '<option value="'.$category['cat_id'].'" '.$select.' >'.$spaces.$spaces.$spaces.$spaces.$spaces.$separator.$category['menu_text'].'</option>';
                            				
                                                $sub_categories6=getImageCategories($category['cat_id'],$check_active);
                                    			if($sub_categories6){	  
                                    				foreach($sub_categories6 as $kkkkkk=>$category){
                                    				      $select=($edit_id && ($category['cat_id']==$edit_id))?'selected="selected"':'';	  
                                    					$showcategory_tree.= '<option value="'.$category['cat_id'].'" '.$select.' >'.$spaces.$spaces.$spaces.$spaces.$spaces.$spaces.$separator.$category['menu_text'].'</option>';
                                    				}
                                    			}//$sub_categories5 
                                            
                                            }
                            			}//$sub_categories5 
                                    
                                    }
                    			}//$sub_categories4 
                        
                        	}
            			}//$sub_categories3 
    				}
    			}//$sub_categories2 
                
			}
		}//$sub_categories 	
  	}//eof foreach        
    
  }	
    return $showcategory_tree;
}


function getOptionImageCatagoryTree($edit_id=false,$spaces='|__',$separator='&raquo;',$check_active=false){ 
 $showcategory_tree="";
 $categories=getImageCategories(0,$check_active);
  if($categories){
   	  
  	foreach($categories as $category){
  	  $select=($edit_id && ($category['cat_id']==$edit_id))?'selected="selected"':'';	
  	    $showcategory_tree.= '<option value="'.$category['cat_id'].'" '.$select.' >'.$category['menu_text'].'</option>';
        
        $sub_categories=getImageCategories($category['cat_id'],$check_active);
		if($sub_categories){	  
			foreach($sub_categories as $k=>$category){
			   $select=($edit_id && ($category['cat_id']==$edit_id))?'selected="selected"':'';	  
				$showcategory_tree.= '<option value="'.$category['cat_id'].'" '.$select.' >'.$spaces.$separator. $category['menu_text'].'</option>';
                $sub_categories2=getImageCategories($category['cat_id'],$check_active);
    			if($sub_categories2){	  
    				foreach($sub_categories2 as $kk=>$category){
    				      $select=($edit_id && ($category['cat_id']==$edit_id))?'selected="selected"':'';	  
    					$showcategory_tree.= '<option value="'.$category['cat_id'].'" '.$select.' >'.$spaces.$spaces.$separator.$category['menu_text'].'</option>';
                        
                        $sub_categories3=getImageCategories($category['cat_id'],$check_active);
            			if($sub_categories3){	  
            				foreach($sub_categories3 as $kkk=>$category){
            				      $select=($edit_id && ($category['cat_id']==$edit_id))?'selected="selected"':'';	  
            					$showcategory_tree.= '<option value="'.$category['cat_id'].'" '.$select.' >'.$spaces.$spaces.$spaces.$separator.$category['menu_text'].'</option>';
            			
                                $sub_categories4=getImageCategories($category['cat_id'],$check_active);
                    			if($sub_categories4){	  
                    				foreach($sub_categories4 as $kkkk=>$category){
                    				      $select=($edit_id && ($category['cat_id']==$edit_id))?'selected="selected"':'';	  
                    					$showcategory_tree.= '<option value="'.$category['cat_id'].'" '.$select.' >'.$spaces.$spaces.$spaces.$spaces.$separator.$category['menu_text'].'</option>';
                    				    
                                        $sub_categories5=getImageCategories($category['cat_id'],$check_active);
                            			if($sub_categories5){	  
                            				foreach($sub_categories5 as $kkkkk=>$category){
                            				      $select=($edit_id && ($category['cat_id']==$edit_id))?'selected="selected"':'';	  
                            					$showcategory_tree.= '<option value="'.$category['cat_id'].'" '.$select.' >'.$spaces.$spaces.$spaces.$spaces.$spaces.$separator.$category['menu_text'].'</option>';
                            				
                                                $sub_categories6=getImageCategories($category['cat_id'],$check_active);
                                    			if($sub_categories6){	  
                                    				foreach($sub_categories6 as $kkkkkk=>$category){
                                    				      $select=($edit_id && ($category['cat_id']==$edit_id))?'selected="selected"':'';	  
                                    					$showcategory_tree.= '<option value="'.$category['cat_id'].'" '.$select.' >'.$spaces.$spaces.$spaces.$spaces.$spaces.$spaces.$separator.$category['menu_text'].'</option>';
                                    				}
                                    			}//$sub_categories5 
                                            
                                            }
                            			}//$sub_categories5 
                                    
                                    }
                    			}//$sub_categories4 
                        
                        	}
            			}//$sub_categories3 
    				}
    			}//$sub_categories2 
                
			}
		}//$sub_categories 	
  	}//eof foreach        
    
  }	
    return $showcategory_tree;
}


function ShowSelectBoxImageCategoryTree($edit_id=false,$spaces='|__',$separator='&raquo;'){ 
    $showImagecategory_tree='<select name="parent" class="form-control reg-select"><option value="0" > Main Section </option>';
    
    $showImagecategory_tree .=getOptionImageCatagoryTree($edit_id,$spaces,$separator);
    $showImagecategory_tree .='</select>';    
    return $showImagecategory_tree;
}

function ShowSelectBoxImageCategoryTree2($edit_id=false,$spaces='|__',$separator='&raquo;'){ 
    $showImagecategory_tree='<select name="cat_id" class="form-control reg-select"><option value="0" > Choose Section </option>';
    $showImagecategory_tree .=getOptionImageCatagoryTree($edit_id,$spaces,$separator);
    $showImagecategory_tree .='</select>';    
    return $showImagecategory_tree;
}

function ShowSelectBoxImageSubCategoryTree2($edit_id=false,$spaces='|__',$separator='&raquo;'){ 
    $showImagecategory_tree='<select name="cat_id" class="form-control reg-select"><option value="0" > Choose Section </option>';
    $showImagecategory_tree .=getOptionSubImageCatagoryTree($edit_id,$spaces,$separator);
    $showImagecategory_tree .='</select>';    
    return $showImagecategory_tree;
}


function ShowSelectBoxImageCategoryTreeWithOnChange($edit_id=false,$spaces='|__',$separator='&raquo;'){ 
    $showImagecategory_tree='<select name="cat_id" class="form-control reg-select" onchange="submit(this);"><option value="0" > Choose Section </option>'."\n";
    $showImagecategory_tree .=getOptionImageCatagoryTree($edit_id,$spaces,$separator);
    $showImagecategory_tree .='</select>';    
    return $showImagecategory_tree;
}




function ShowImageCategoryTree($checkActive=true){   
	$Image_categories=getImageCategories(0,$checkActive);
	if($Image_categories){
		$showImagecategory_tree='<ul class="pagetree">';   
		foreach($Image_categories as $k=>$category){
			$showImagecategory_tree .= '<li><b><a href="'.SCRIPT_URL.'page/'.$category['seo_title'].'" title="'.$category['title'].'">'.$category['title'].'</a></b></li>';
			$sub_Image_categories=getImageCategories($category['cat_id'],$checkActive);
			if($sub_Image_categories){	  
				foreach($sub_Image_categories as $k=>$category){
					$showImagecategory_tree .= '<li>&nbsp;&nbsp;&nbsp;&raquo;<a href="'.SCRIPT_URL.'page/'.$category['seo_title'].'" title="'.$category['title'].'">'.$category['page_title'].'</a></b></li>';
                    
                        $sub_Image_categories2=getImageCategories($category['cat_id'],$checkActive);
            			if($sub_Image_categories2){	  
            				foreach($sub_Image_categories2 as $kk=>$category){
            					$showImagecategory_tree .= '<li>&nbsp;&nbsp;&nbsp;&raquo;<a href="'.SCRIPT_URL.'page/'.$category['seo_title'].'" title="'.$category['title'].'">'.$category['title'].'</a></b></li>';
            				}
            			}
				}
			}
		}
		$showImagecategory_tree .=  '</ul>';   
	}
	return $showImagecategory_tree;
}

?>	