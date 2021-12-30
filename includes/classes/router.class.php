<?php
/**
 * RAW PHP SCRIPT
 *
 * @package		RAWPHPSCRIPT
 * @author		Aditya(bfouzder@yahoo.com).
 * @copyright	Copyright (c) 2009, ARSoft, Ltd.
 * @version 2.0
 */
 
class Router {
	var $module_path;
	var $segments = array();
	var $module = 'default';
	var $action = 'default';
	var $args = false;
	var $request;
	var $ignore = array();

	//function Router($request) {
	 function __construct($request) {
		global $module_path;	
		$this->request = $request;
		
		$browse_page= str_replace('','',basename($_SERVER['SCRIPT_FILENAME']));
		
		if($this->RouterInStr($request,$browse_page)=== TRUE){
			$browse_page_character_count = strlen($browse_page);		
	     	$new_url = substr($request,strrpos($request, $browse_page)+$browse_page_character_count+1);
		}else{
			$new_url = '';
		}
		$new_url_array = explode('/', $new_url);
		
		$this->segments = array_filter($new_url_array);

		$this->ignore = array('Application', 'Views', 'Modules');

		$this->args = $this->setArgs();

		
		$this->module_path = $module_path.$this->module.'';
		if ($this->isExecuteable()) {
		}
	}
	
	function setArgs() {
		if (count($this->segments) >= 1) {
			return $output = $this->segments;
		}
		else {
			return false;
		}
	}
	
	function isExecuteable() {
		if (in_array($this->module, $this->ignore)) {
			return false;
		}
		else {
			return true;
		}
	}
	function RouterInStr($String,$Find,$CaseSensitive = false)
	{
		$i=0;
		while (strlen($String)>=$i)
		{
		unset($substring);
		if ($CaseSensitive)
		{
		$Find=strtolower($Find);
		$String=strtolower($String);
		}
		$substring=substr($String,$i,strlen($Find));
		if ($substring==$Find) return true;
		$i++;
		}
		return false; 	
	} 
	function Execute() {
		//if ($this->isExecuteable()) {
//			require_once($this->module_path);
//			$classname = $this->module.'Module';
//			$module = new $classname($this->action, $this->args);
//		}
	}
}
?>