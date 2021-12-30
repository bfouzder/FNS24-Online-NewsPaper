<?php
	function getMemberInfo($member_id){
		global $db;
		
		$member_info = $db->getRowArray('member_directory',array('member_id'=>$member_id));
		return $member_info;
	}
?>