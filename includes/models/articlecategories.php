<?php
function getSectionPath($cat_id_seotitle,$default=""){
	global $db;	
    
	$section_info=getSectionInfo($cat_id_seotitle);
	$url=""; 
    if($section_info['parent']=='0'){
        $url.=$section_info['seo_title'].'/';    
    }else{
        $section_info1=getSectionInfo($section_info['parent']);
        if($section_info1['parent']=='0'){            
             $url.=$section_info1['seo_title'].'/'.$section_info['seo_title'].'/'; 
        }else{
            $section_info2=getSectionInfo($section_info1['parent']);
            if($section_info2['parent']=='0'){
                 $url.=$section_info2['seo_title'].'/'.$section_info1['seo_title'].'/'.$section_info['seo_title'].'/'; 
            }else{
                $section_info3=getSectionInfo($section_info2['parent']);
                if($section_info3['parent']=='0'){
                     $url.=$section_info3['seo_title'].'/'.$section_info2['seo_title'].'/'.$section_info1['seo_title'].'/'.$section_info['seo_title'].'/'; 
                }else{
                    $section_info4=getSectionInfo($section_info3['parent']);
                    if($section_info4['parent']=='0'){
                         $url.=$section_info4['seo_title'].'/'.$section_info3['seo_title'].'/'.$section_info2['seo_title'].'/'.$section_info1['seo_title'].'/'.$section_info['seo_title'].'/'; 
                    }else{
                        $section_info5=getSectionInfo($section_info3['parent']);
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


function getAdminSectionPath($cat_id_seotitle){
	global $db;	
    
	$section_info=getSectionInfo($cat_id_seotitle);
	$url2=""; 
	$url=""; 
    if($section_info['parent']=='0'){
        $url.=$section_info['seo_title'].'/';    
        $url2.=$section_info['menu_text'];    
    }else{
        $section_info1=getSectionInfo($section_info['parent']);
        if($section_info1['parent']=='0'){            
             $url.=$section_info1['seo_title'].'/'.$section_info['seo_title'].'/'; 
             $url2.=$section_info1['menu_text'].'->'.$section_info['menu_text']; 
        }else{
            $section_info2=getSectionInfo($section_info1['parent']);
            if($section_info2['parent']=='0'){
                 $url.=$section_info2['seo_title'].'/'.$section_info1['seo_title'].'/'.$section_info['seo_title'].'/'; 
                 $url2.=$section_info2['menu_text'].'->'.$section_info1['menu_text'].'->'.$section_info['menu_text']; 
            }else{
                $section_info3=getSectionInfo($section_info2['parent']);
                if($section_info3['parent']=='0'){
                     $url.=$section_info3['seo_title'].'/'.$section_info2['seo_title'].'/'.$section_info1['seo_title'].'/'.$section_info['seo_title'].'/'; 
                      $url2.=$section_info3['menu_text'].'->'.$section_info2['menu_text'].'->'.$section_info1['menu_text'].'->'.$section_info['menu_text']; 
                }else{
                    $section_info4=getSectionInfo($section_info3['parent']);
                    if($section_info4['parent']=='0'){
                         $url.=$section_info4['seo_title'].'/'.$section_info3['seo_title'].'/'.$section_info2['seo_title'].'/'.$section_info1['seo_title'].'/'.$section_info['seo_title'].'/'; 
                          $url2.=$section_info4['menu_text'].'->'.$section_info3['menu_text'].'->'.$section_info2['menu_text'].'->'.$section_info1['menu_text'].'->'.$section_info['menu_text']; 
                    }else{
                        $section_info5=getSectionInfo($section_info3['parent']);
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


function getSeoSectionsArray($url){ 
    $url=trim($url); 
    if(!strstr($url,'/content/'))die('wrong urlss'.$url);    
    if(!strstr($url,'.aspx'))die('wrong article url'.$url);    
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

function getUrlType($url){ 
    $url=trim($url); 
    if(!strstr($url,'/content/'))return false;    
    if(!strstr($url,'.aspx'))return false;    
    $path = parse_url($url, PHP_URL_PATH);
    if(!$path)return false; 
    $path=str_replace("/content/","",$path);
    $path=str_replace(".aspx","",$path);    
    $path_array = explode('/',$path);     
    if(end($path_array) =='default'){
       $type = 'catarticles';
    }else{
      $type= 'articles';
    }         
    return $type;
}

function getArticleCategoryInfo($cat_id_seotitle){
	global $db;	
	
	if(is_numeric($cat_id_seotitle)){
		$row=$db->getRowArray('article_categories',array('cat_id'=>$cat_id_seotitle));
	}else{
		$row=$db->getRowArray('article_categories',array('seo_title'=>$cat_id_seotitle));
	}		
	return $row;
}
function getSectionInfo($cat_id_seotitle){
    global $db;	
    
    if(is_numeric($cat_id_seotitle)){
		$row=$db->getRowArray('article_categories',array('cat_id'=>$cat_id_seotitle));
	}else{
		$row=$db->getRowArray('article_categories',array('seo_title'=>$cat_id_seotitle));
	}		
	return $row;
}

function getSectionId($seo_title){
    global $db;	
    $row=$db->getRowArray('article_categories',array('seo_title'=>$seo_title),'cat_id');
    return  $row['cat_id'];
}

function getCatInfo($cat_id_seotitle,$parant=false){
    global $db;	
    if($parant){
        
        if(is_numeric($cat_id_seotitle)){
    		$row=$db->getRowArray('article_categories',array('cat_id'=>$cat_id_seotitle,'parent'=>$parant));
    	}else{
    		$row=$db->getRowArray('article_categories',array('seo_title'=>$cat_id_seotitle,'parent'=>$parant));
    	}
    
    }else{
            if(is_numeric($cat_id_seotitle)){
        		$row=$db->getRowArray('article_categories',array('cat_id'=>$cat_id_seotitle));
        	}else{
        		$row=$db->getRowArray('article_categories',array('seo_title'=>$cat_id_seotitle));
        	}
    
    }
    		
	return $row;
}
function getCatId($seo_title,$parant=false){
    global $db;	
  if($parant){      
        $row=$db->getRowArray('article_categories',array('seo_title'=>$seo_title,'parent'=>$parant),'cat_id');  
    }else{
         $row=$db->getRowArray('article_categories',array('seo_title'=>$seo_title),'cat_id');   
    }

    return  $row['cat_id'];
}

function getSectionMenuText($cat_id_seo_title){
	global $db;	
	
    if(is_numeric($cat_id_seotitle)){
		$row=$db->getRowArray('article_categories',array('cat_id'=>$cat_id_seotitle),'menu_text');
	}else{
		$row=$db->getRowArray('article_categories',array('seo_title'=>$cat_id_seotitle),'menu_text');
	}
	return $row['menu_text'];
}

function getArticleCategoryMenuText($cat_id){
	global $db;	
	if(!$cat_id){return 'Top Level Section';}
	
	$row=$db->getRowArray('article_categories',array('cat_id'=>$cat_id),'menu_text');
	return $row['menu_text'];
}
	
function getArticleCategoryTitle($cat_id){
	global $db;	
	if(!$cat_id){return 'Top Level Section';}
	
	$row=$db->getRowArray('article_categories',array('cat_id'=>$cat_id),'seo_title');
	return $row['seo_title'];
}
function getArticleCategorySeoTitle($cat_id){
	global $db;	
	if(!$cat_id){return 'Main';}
	
	$row=$db->getRowArray('article_categories',array('cat_id'=>$cat_id),'seo_title');
	return $row['title'];
}

function getArticleCategories($parent='0',$checkActive=false){
	global $db;		
	if($checkActive){
		$categories=$db->select("SELECT * FROM article_categories WHERE  active=1 AND `parent`='$parent' ORDER BY menu_order");
	}else{
		$categories=$db->select("SELECT * FROM article_categories WHERE `parent`='$parent' ORDER BY menu_order");
	}	
	return $categories;
    
}

function getMainCategories($parent='0',$checkActive=false){
	global $db;	
    $maincategories=state('maincategories');
    if($maincategories == false){
       	$maincategories=getArticleCategories('0',$checkActive);
        
        state('maincategories',$maincategories);
    }	
	
	return $maincategories;    
}

function getSubSections($cat_id,$limit=10){
	global $db;		

	$categories=$db->select("SELECT * FROM article_categories WHERE  active=1 AND `parent`='$cat_id' ORDER BY menu_order LIMIT  $limit");
		
	return $categories;
    
}

function getAllArticleCategories(){
	global $db;	
	
    $categories=$db->select("SELECT * FROM article_categories  ");
    
	return $categories;
}

function getOptionSubCatagoryTree($edit_id=false,$spaces='|__',$separator='&raquo;',$check_active=false){ 
 $showcategory_tree="";
 
 $category_info=getSectionInfo($edit_id);
 if(!$category_info)return false;

 if($category_info['parent']){
    $categories=getArticleCategories($category_info['parent'],$check_active); 
 }else{
    $categories=getArticleCategories($category_info['cat_id'],$check_active);
 } 
    $categories=($categories)?$categories:getArticleCategories(0,$check_active);
  if($categories){
   	  
  	foreach($categories as $category){
  	  $select=($edit_id && ($category['cat_id']==$edit_id))?'selected="selected"':'';	
  	    $showcategory_tree.= '<option value="'.$category['cat_id'].'" '.$select.' >'.$category['menu_text'].'</option>';
        
        $sub_categories=getArticleCategories($category['cat_id'],$check_active);
		if($sub_categories){	  
			foreach($sub_categories as $k=>$category){
			   $select=($edit_id && ($category['cat_id']==$edit_id))?'selected="selected"':'';	  
				$showcategory_tree.= '<option value="'.$category['cat_id'].'" '.$select.' >'.$spaces.$separator. $category['menu_text'].'</option>';
                $sub_categories2=getArticleCategories($category['cat_id'],$check_active);
    			if($sub_categories2){	  
    				foreach($sub_categories2 as $kk=>$category){
    				      $select=($edit_id && ($category['cat_id']==$edit_id))?'selected="selected"':'';	  
    					$showcategory_tree.= '<option value="'.$category['cat_id'].'" '.$select.' >'.$spaces.$spaces.$separator.$category['menu_text'].'</option>';
                        
                        $sub_categories3=getArticleCategories($category['cat_id'],$check_active);
            			if($sub_categories3){	  
            				foreach($sub_categories3 as $kkk=>$category){
            				      $select=($edit_id && ($category['cat_id']==$edit_id))?'selected="selected"':'';	  
            					$showcategory_tree.= '<option value="'.$category['cat_id'].'" '.$select.' >'.$spaces.$spaces.$spaces.$separator.$category['menu_text'].'</option>';
            			
                                $sub_categories4=getArticleCategories($category['cat_id'],$check_active);
                    			if($sub_categories4){	  
                    				foreach($sub_categories4 as $kkkk=>$category){
                    				      $select=($edit_id && ($category['cat_id']==$edit_id))?'selected="selected"':'';	  
                    					$showcategory_tree.= '<option value="'.$category['cat_id'].'" '.$select.' >'.$spaces.$spaces.$spaces.$spaces.$separator.$category['menu_text'].'</option>';
                    				    
                                        $sub_categories5=getArticleCategories($category['cat_id'],$check_active);
                            			if($sub_categories5){	  
                            				foreach($sub_categories5 as $kkkkk=>$category){
                            				      $select=($edit_id && ($category['cat_id']==$edit_id))?'selected="selected"':'';	  
                            					$showcategory_tree.= '<option value="'.$category['cat_id'].'" '.$select.' >'.$spaces.$spaces.$spaces.$spaces.$spaces.$separator.$category['menu_text'].'</option>';
                            				
                                                $sub_categories6=getArticleCategories($category['cat_id'],$check_active);
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


function getOptionCatagoryTree($edit_id=false,$spaces='|__',$separator='&raquo;',$check_active=false){ 
 $showcategory_tree="";
 $categories=getArticleCategories(0,$check_active);
  if($categories){
   	  
  	foreach($categories as $category){
  	  $select=($edit_id && ($category['cat_id']==$edit_id))?'selected="selected"':'';	
  	    $showcategory_tree.= '<option value="'.$category['cat_id'].'" '.$select.' >'.$category['menu_text'].'</option>';
        
        $sub_categories=getArticleCategories($category['cat_id'],$check_active);
		if($sub_categories){	  
			foreach($sub_categories as $k=>$category){
			   $select=($edit_id && ($category['cat_id']==$edit_id))?'selected="selected"':'';	  
				$showcategory_tree.= '<option value="'.$category['cat_id'].'" '.$select.' >'.$spaces.$separator. $category['menu_text'].'</option>';
                $sub_categories2=getArticleCategories($category['cat_id'],$check_active);
    			if($sub_categories2){	  
    				foreach($sub_categories2 as $kk=>$category){
    				      $select=($edit_id && ($category['cat_id']==$edit_id))?'selected="selected"':'';	  
    					$showcategory_tree.= '<option value="'.$category['cat_id'].'" '.$select.' >'.$spaces.$spaces.$separator.$category['menu_text'].'</option>';
                        
                        $sub_categories3=getArticleCategories($category['cat_id'],$check_active);
            			if($sub_categories3){	  
            				foreach($sub_categories3 as $kkk=>$category){
            				      $select=($edit_id && ($category['cat_id']==$edit_id))?'selected="selected"':'';	  
            					$showcategory_tree.= '<option value="'.$category['cat_id'].'" '.$select.' >'.$spaces.$spaces.$spaces.$separator.$category['menu_text'].'</option>';
            			
                                $sub_categories4=getArticleCategories($category['cat_id'],$check_active);
                    			if($sub_categories4){	  
                    				foreach($sub_categories4 as $kkkk=>$category){
                    				      $select=($edit_id && ($category['cat_id']==$edit_id))?'selected="selected"':'';	  
                    					$showcategory_tree.= '<option value="'.$category['cat_id'].'" '.$select.' >'.$spaces.$spaces.$spaces.$spaces.$separator.$category['menu_text'].'</option>';
                    				    
                                        $sub_categories5=getArticleCategories($category['cat_id'],$check_active);
                            			if($sub_categories5){	  
                            				foreach($sub_categories5 as $kkkkk=>$category){
                            				      $select=($edit_id && ($category['cat_id']==$edit_id))?'selected="selected"':'';	  
                            					$showcategory_tree.= '<option value="'.$category['cat_id'].'" '.$select.' >'.$spaces.$spaces.$spaces.$spaces.$spaces.$separator.$category['menu_text'].'</option>';
                            				
                                                $sub_categories6=getArticleCategories($category['cat_id'],$check_active);
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


function ShowSelectBoxArticleCategoryTree($edit_id=false,$spaces='|__',$separator='&raquo;'){ 
    $showarticlecategory_tree='<select name="parent" class="form-control reg-select"><option value="0" > Main Section </option>';
    
    $showarticlecategory_tree .=getOptionCatagoryTree($edit_id,$spaces,$separator);
    $showarticlecategory_tree .='</select>';    
    return $showarticlecategory_tree;
}

function ShowSelectBoxArticleCategoryTree2($edit_id=false,$spaces='|__',$separator='&raquo;'){ 
    $showarticlecategory_tree='<select name="cat_id" class="form-control reg-select"><option value="0" > Choose Section </option>';
    $showarticlecategory_tree .=getOptionCatagoryTree($edit_id,$spaces,$separator);
    $showarticlecategory_tree .='</select>';    
    return $showarticlecategory_tree;
}

function ShowSelectBoxArticleSubCategoryTree2($edit_id=false,$spaces='|__',$separator='&raquo;'){ 
    $showarticlecategory_tree='<select name="cat_id" class="form-control reg-select"><option value="0" > Choose Section </option>';
    $showarticlecategory_tree .=getOptionSubCatagoryTree($edit_id,$spaces,$separator);
    $showarticlecategory_tree .='</select>';    
    return $showarticlecategory_tree;
}


function ShowSelectBoxArticleCategoryTreeWithOnChange($edit_id=false,$spaces='|__',$separator='&raquo;'){ 
    $showarticlecategory_tree='<select name="cat_id" class="form-control reg-select" onchange="submit(this);"><option value="0" > Choose Section </option>'."\n";
    $showarticlecategory_tree .=getOptionCatagoryTree($edit_id,$spaces,$separator);
    $showarticlecategory_tree .='</select>';    
    return $showarticlecategory_tree;
}




function ShowArticleCategoryTree($checkActive=true){   
	$article_categories=getArticleCategories(0,$checkActive);
	if($article_categories){
		$showarticlecategory_tree='<ul class="pagetree">';   
		foreach($article_categories as $k=>$category){
			$showarticlecategory_tree .= '<li><b><a href="'.SCRIPT_URL.'page/'.$category['seo_title'].'" title="'.$category['title'].'">'.$category['title'].'</a></b></li>';
			$sub_article_categories=getArticleCategories($category['cat_id'],$checkActive);
			if($sub_article_categories){	  
				foreach($sub_article_categories as $k=>$category){
					$showarticlecategory_tree .= '<li>&nbsp;&nbsp;&nbsp;&raquo;<a href="'.SCRIPT_URL.'page/'.$category['seo_title'].'" title="'.$category['title'].'">'.$category['page_title'].'</a></b></li>';
                    
                        $sub_article_categories2=getArticleCategories($category['cat_id'],$checkActive);
            			if($sub_article_categories2){	  
            				foreach($sub_article_categories2 as $kk=>$category){
            					$showarticlecategory_tree .= '<li>&nbsp;&nbsp;&nbsp;&raquo;<a href="'.SCRIPT_URL.'page/'.$category['seo_title'].'" title="'.$category['title'].'">'.$category['title'].'</a></b></li>';
            				}
            			}
				}
			}
		}
		$showarticlecategory_tree .=  '</ul>';   
	}
	return $showarticlecategory_tree;
}

?>	