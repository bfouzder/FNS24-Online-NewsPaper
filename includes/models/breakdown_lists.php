<?php
function get_breakdown_composit_lists_Info($bv_no){
	global $db;
	$breakdown_composit_info=$db->select_single("SELECT * FROM composit_lists WHERE bv_no='$bv_no'");
	return $breakdown_composit_info;
}

function get_breakdown_lists_Info_by_id($id){
	global $db;
	$breakdown_list_info=$db->select_single("SELECT * FROM breakdown_lists WHERE id='$id'");
	return $breakdown_list_info;
}
function get_breakdown_lists_Info($bv_no){
	global $db;
	$breakdown_list_info=$db->select_single("SELECT * FROM breakdown_lists WHERE bv_no='$bv_no'");
	return $breakdown_list_info;
}

function get_standard_tests_group($check_active=false){
	global $db;
	
	if($check_active){
	$rows= $db->select("SELECT * FROM article_categories WHERE active =1 AND parent =0 ORDER BY menu_order ASC");
	}else{
	$rows= $db->select("SELECT * FROM article_categories WHERE  parent =0 ORDER BY menu_order ASC");
	}
	return 	$rows;
}
function get_selected_standard_tests($bklist){
	global $db;
	$standard_tests=array();
	$selected_standard_test= call_user_func_array('array_merge', $bklist['standard_tests']);
	$selected_standard_tests= array_unique($selected_standard_test);
	foreach($selected_standard_tests as $k=>$test_name){
		$cat_info=getSectionInfo($test_name);
		$standard_tests[$cat_info['cat_id']]=$cat_info;
	}	
	return $standard_tests;
}

function get_standard_tests($check_active=false){
	global $db;
	
	if($check_active){
	$rows= $db->select("SELECT * FROM article_categories WHERE active =1 AND parent !=0 ORDER BY menu_order ASC");
	}else{
	$rows= $db->select("SELECT * FROM article_categories WHERE parent !=0 ORDER BY menu_order ASC");
	}
	return 	$rows;
}

function displayBVLIstTable($bv_no, $echo=true, $bv_header=true, $only_selected_tests=true){
		global $db;
		$breakdown_list_info=get_breakdown_lists_Info($bv_no);
		if(!$breakdown_list_info){
			return false;
		}
		
		$user_id=$breakdown_list_info['user_id'];
		$user_info=getUserInfo($user_id);
	    $bklist = ar_unserialize($breakdown_list_info['bklist']);	

	#vertical table header	
		$standard_test_html='';
		
		if($only_selected_tests){
			$standard_tests= get_selected_standard_tests($bklist);
		}else{
			$standard_tests= get_standard_tests();
		}
		
		if($standard_tests){
			foreach ($standard_tests as $k=>$test_info){
				$test_title= $test_info['menu_text'];	
				$test_name= $test_info['seo_title'];				
				$standard_test_text="<div class='vertical-text'><p>$test_title</p></div>";
				$standard_test_html.="<td id='vt_$k'>$standard_test_text</td>"."\n";
			}
		}
$html="";

if($bv_header){		
#header part
$html .='<div class="form-group">
	<div class="col-sm-3">
		<label for="inputEmail3" class="control-label">BV No:</label>
		'.$breakdown_list_info['bv_no'].'
	</div>
	<div class="col-sm-3">
		<label for="inputEmail3" class="control-label">Type:</label>
		'.$breakdown_list_info['list_type'].'
	</div>
	<div class="col-sm-3">
		<label for="inputEmail3" class="control-label">Result Due Date:</label>
		'.$breakdown_list_info['due_date'].'
	</div>
	<div class="col-sm-3">
		<label for="inputEmail3" class="control-label">Prepared By:</label>
		'.$breakdown_list_info['prepared_by'].'
	</div>
</div><div class="clearfix"></div>'."\n";
}
		
#tabular part		
		$html.='<div class="table-responsive">
		<table class="table table-bordered table-hover">
		<thead> 
			<tr>
				<th>#</th>
				<th>Sample Description</th>
				<th>Material Type</th>
				<th colspan="'.count($standard_tests).'">Standard Test</th>
			</tr>
		</thead>
		<tbody>
		<tr> 
			<td style="height:200px;">&nbsp;</td>
			<td style="height:200px;">&nbsp;</td>
			<td style="height:200px;">&nbsp;</td>
			'.$standard_test_html.'
		</tr>'."\n";

		if($bklist['sample_description']){
		foreach($bklist['sample_description'] as $key=>$val){
		$row_index=	($key+1);
		
		$test_items="";
		$sel_items=$bklist['standard_tests'][$key];
		$not_applicable_tests=($bklist['standard_tests_not_applicable'][$key])?$bklist['standard_tests_not_applicable'][$key]:array();
	
		if($standard_tests){
			$test_check_box_items=array();
			foreach ($standard_tests as $k=>$test_info){
				$test_title= $test_info['menu_text'];	
				$test_name= $test_info['seo_title'];	
				if (in_array($test_name, $sel_items)) {
					$test_check_box_cats[$test_name][$row_index][]=$test_title;
					
					#not Applicable check	
					if (in_array($test_name, $not_applicable_tests)) {
						$test_check_box_items[]='<td title="'.$test_title.'"><i class="fa fa-lock"></i></td>';
					}else{
						$test_check_box_items[]='<td title="'.$test_title.'"><i class="fa fa-check-square-o"></i></td>';
					}
					
				}else{
				$test_check_box_items[]='<td title="'.$test_title.'"><i class="fa fa-square-o"></i></td>';
				}
			}
			
		  $test_items=implode("",$test_check_box_items);	
		}
		
		
		$show_row_index='T'.$row_index;
		$show_row_index_td='TD'.$row_index;

		/*
				$html .='<tr> 
				<td onClick="SelectAll(\''.$show_row_index_td.'\');" ><input type="text" id="'.$show_row_index_td.'" value=" '.$show_row_index.' " style="border:0px; width:40px;" readonly/></td>
				<td onClick="SelectAll(\''.$show_row_index.'\');" ><input type="text" id="'.$show_row_index.'" value="'.$bklist['sample_description'][$key].'" style="border:0px;" readonly/></td>
				<td>'.$bklist['material_type'][$key].'</td>
				'.$test_items.'
			</tr>'."\n";
		*/	
		$html .='<tr> 
				<td onClick="SelectAll(\''.$show_row_index_td.'\');" id="'.$show_row_index_td.'">'.$show_row_index.'</td>
				<td onClick="SelectAll(\''.$show_row_index.'\');" id="'.$show_row_index.'">'.$bklist['sample_description'][$key].'</td>
				<td>'.$bklist['material_type'][$key].'</td>
				'.$test_items.'
			</tr>'."\n";
			
		 }
		}
		 $html .='</tbody> 
		</table>
		</div>'."\n";
		
	if($echo){
		echo $html;
	}else{
		return $html;
	}	
}

function view_standardTest_items2($sel_items=array(),$row_index){
	global $db;
	$test_check_box_items=array();	
	$all_tests= $db->select("SELECT * FROM article_categories WHERE active =1 AND parent =0 ORDER BY menu_order ASC");
	if($all_tests){
		foreach ($all_tests as $k=>$test_info){
			$parent=$test_info['cat_id'];
			$test_title= $test_info['menu_text'];	
			$test_parent_name= $test_info['seo_title'];
			
			#bof optgroup
					
				$all_sub_tests= $db->select("SELECT * FROM article_categories WHERE active =1 AND parent =$parent ORDER BY menu_order ASC");
				if($all_sub_tests){
					foreach ($all_sub_tests as $k=>$test_info){
						$test_title= $test_info['menu_text'];	
						$test_name= $test_info['seo_title'];	
						if (in_array($test_name, $sel_items)) {
							$test_check_box_cats[$test_name][$row_index][]=$test_title;
							$test_check_box_items[]='<td title="'.$test_title.'"><i class="fa fa-check-square-o"></i></td>';
						}else{
						$test_check_box_items[]='<td title="'.$test_title.'"><i class="fa fa-square-o"></i></td>';
						}
					}
				}
			
			#eof optgroup
		}	
	}
	
	$test_check_box_html=implode("",$test_check_box_items);	
	return $test_check_box_html;
}
function view_standardTest_items($sel_items=array(),$row_index){
	global $db;
	$test_check_box_items=array();	
	$all_tests= $db->select("SELECT * FROM article_categories WHERE active =1 AND parent =0 ORDER BY menu_order ASC");
	if($all_tests){
		foreach ($all_tests as $k=>$test_info){
			$parent=$test_info['cat_id'];
			$test_title= $test_info['menu_text'];	
			$test_parent_name= $test_info['seo_title'];
			
			#bof optgroup
			$test_check_box_items[]='<li><b>'.$test_title.'</b></li>';
			
				$all_sub_tests= $db->select("SELECT * FROM article_categories WHERE active =1 AND parent =$parent ORDER BY menu_order ASC");
				if($all_sub_tests){
					foreach ($all_sub_tests as $k=>$test_info){
						$test_title= $test_info['menu_text'];	
						$test_name= $test_info['seo_title'];	
						if (in_array($test_name, $sel_items)) {
							$test_check_box_cats[$test_name][$row_index][]=$test_title;
							$test_check_box_items[]='<li>'.$test_title.'</li>';
						}
					}
				}
			
			#eof optgroup
		}	
	}
	
	$test_check_box_html=implode("",$test_check_box_items);	
	return $test_check_box_html;
}
function getCompositeList($bv_no){
	global $db;
	
	$breakdown_list_info=get_breakdown_lists_Info($bv_no);
	$composit_list=array();
	$bklist = ar_unserialize($breakdown_list_info['bklist']);
	
	if($bklist['sample_description']){
		foreach($bklist['sample_description'] as $key=>$val){
			$row_index=	($key+1);
			#creat Composite List
			if($bklist['standard_tests'][$key] ){
				foreach($bklist['standard_tests'][$key] as $k=>$val){
					$composit_list[$val][]=$row_index;
				}
			}
		}
	}
	return $composit_list;
}
?>