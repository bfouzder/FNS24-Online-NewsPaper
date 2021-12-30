<?php
function get_driver_type(){
	global $db;
 
	  $sql="SELECT DISTINCT driver_type FROM driver_table";	
	  $rows=$db->select($sql);
	  return $rows; 		
}
function get_drivers_by_type($driver_type){
	global $db;
 
	  $sql="SELECT *FROM driver_table WHERE driver_type='$driver_type'";	
	  $rows=$db->select($sql);
	  return $rows; 		
}
?>