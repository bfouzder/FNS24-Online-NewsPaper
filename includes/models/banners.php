<?php
function getBannerLocationInfo($id){
	global $db;
    $row= $db->getRowArray('bannerpackage',array('id'=>$id));
    return  $row;
}

function getBannerLocations(){
	global $db;
    $rows= $db->getRowsArray('bannerpackage');
    return  $row;
}
?>	