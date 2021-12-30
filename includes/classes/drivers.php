<?php
/**
 * RAW PHP SCRIPT
 *
 * @package		RAWPHPSCRIPT
 * @author		Aditya(bfouzder@yahoo.com).
 * @copyright	Copyright (c) 2009, ARSoft, Ltd.
 * @version 2.0
 */

class drivers
{
	
	public $db;
	public $tableName;
	public $priColumn;
	public $priColumn2;
	
	
	
	//function drivers(){
	function __construct() {
	
		$this->_init();
	}
	
	function _init(){
		global $db;
		$this->db =$db;
		
		$this->tableName = 'drivers';
		$this->priColumn = 'group_name';
		$this->priColumn2 = 'id';
		
	}
	
  function getDriversAll()
   {
   	
   	 $res = $this->db->getRowsArray($this->tableName);
   	 return $res;
   }
   
   function getDriverVal($group,$id=false){
   	
   	if($group){
	   
			    if($id)
			   	   $res = $this->db->getRowArray($this->tableName,array($this->priColumn=>$group,$this->priColumn2=>$id));
			    else
			       $res = $this->db->getRowsArray($this->tableName,array($this->priColumn=>$group));
			   	
			   	return $res;
	   }
	   else
	    		return false;

  }
  
  function insertDriver($data){
   	
   	if(is_array($data)){
	   
			   $sql = "INSERT INTO ".$this->tableName." SET ";
			   foreach($data as $key=>$value)
			     $sql .= $key."='". $value ."',";
	           $sql = substr($sql,0,strlen($sql)-1); 
	           //echo $sql;
			   $id = $this->db->insert($sql);
			   
	   }
	   return $id;

  }
  
  function updateDriver($group,$id,$data){
   	
   	
  if($group && $id)
   	{
   		
   	
	   if(is_array($data)){
	   
			   $sql = "UPDATE ".$this->tableName." SET ";
			   foreach($data as $key=>$value)
			     $sql .= $key."='". $value ."',";
	           $sql .=" modified=NOW() WHERE  ".$this->priColumn ."='$group' AND ".$this->priColumn2 ."='$id'"; 
	           
			   if($this->db->edit($sql))
			     return true;
	           else
	             return false;
			   
	   }else
	   return false;
    }else
  return false;
  
  }
  
  
  function deleteDriver($group,$id)
   {
   	
   	if($group && $id)
   	{
   		$sql ="DELETE FROM ".$this->tableName ." WHERE ".$this->priColumn ."='$group' AND ".$this->priColumn2 ."='$id'";
   	    if($this->db->delete($sql))
   	     return true;
        else
         return false;
   	}else
    return false;
   	
   }
  
  function getFieldValue($group,$id,$filed_name)
  {
	
   	if($group && $id && $filed_name)
   	{
   		
   		$res = $this->db->getRowArray($this->tableName,array($this->priColumn=>$group,$this->priColumn2=>$id),$filed_name);
   	    if($res)
   	     return $res[$filed_name];
        else
         return false;
   	}else
    return false;
   	
 }
 
}
?>