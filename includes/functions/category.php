<?php
//CATEGORY
function getCategories($parent_id=false){
	global $db;
	$categories= $db->getRowsArray('category',array("parent_id"=>$parent_id));
	return $categories;
}
function getCategoryName($cat_id){
	global $db;
	$row= $db->getRowArray('category',array("cat_id"=>$cat_id),"cat_name");
	return $row['group_cat_name'];
}
function getCategoryId($cat_name){
	global $db;
	$row= $db->getRowArray('group_category',array("cat_name"=>$cat_name),"cat_id");
	return $row['cat_id'];
}

function getSubCategories($cat_name){
	global $db;
	$sub_categories= $db->getRowsArray('sub_category',array("cat_name"=>$cat_name));
	return $sub_categories;
}

function getSubCategoryName($sub_cat_id){
	global $db;
	$row= $db->getRowArray('sub_category',array("sub_cat_id"=>$sub_cat_id),"sub_cat_name");
	return $row['sub_cat_name'];
}
function getSubCategoryId($sub_cat_name){
	global $db;
	$row= $db->getRowArray('sub_category',array("sub_cat_name"=>$sub_cat_name),"sub_cat_id");
	return $row['sub_cat_id'];
}

?>