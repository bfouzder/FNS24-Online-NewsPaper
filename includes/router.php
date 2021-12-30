<?php
/* Caution: Please Don't Change Anyting On This File.' */
	function getSupportedLanguage($lang_dir=false){
		
		$lang_dir=($lang_dir)? $lang_dir:DIR_LANGUAGES;
		$dirs=scandir($lang_dir);

		if($dirs){
			unset($dirs[0]);
			unset($dirs[1]);
		}
		return $dirs;
	}

	function make_route($https=true)
	{	
	   $language_array=getSupportedLanguage();
       # pre($language_array);
		$HTTP_HOST = $_SERVER['HTTP_HOST'];
		$REQUEST_URI = $_SERVER['REQUEST_URI'];
		if($HTTP_HOST == 'localhost'){
		$HOST_URI = 'https://'.$HTTP_HOST.$REQUEST_URI; 
		}else{
			if($https){
				$HOST_URI = 'https://'.$HTTP_HOST.$REQUEST_URI; 	
			}else{
				$HOST_URI = 'http://'.$HTTP_HOST.$REQUEST_URI; 
			}
		}
		
		$HOST_URI = rtrim($HOST_URI , '/');
		$HOST_URI = str_replace('.html' , '' , $HOST_URI);
		$HOST_URI = str_replace('.htm' , '' , $HOST_URI);
		$HOST_URI = str_replace('.php' , '' , $HOST_URI);
		

		$x = substr($HOST_URI , strlen(SCRIPT_URL) , strlen($HOST_URI));	
		
		
		
		//echo $x;
		$x = preg_replace('#^/(.*)#', "$1", $x );
		
        
        
		$url_data = explode("?", $x);
		$url_part = $url_data[0];
      
        
		$query_part = "";
		$query_parms = array();
		
		if(count($url_data) > 1){
			$query_part = $url_data[1];
		}
		$url_part = urldecode ($url_part);
		
		//
		
		
		// parse url part 
		$temp_url_parts = explode("/", $url_part);
		
		if($temp_url_parts)
		{
			foreach($temp_url_parts as $key=>$value)
			{				 
				$temp_url_parts[$key] = str_replace("'", "", _remove_invisible_characters($value));
			}
		}
		
		
	   $args=array();
	   $ln =  "";
	   $action =  "";
	   $count_temp_url_parts=count($temp_url_parts);
        
		if($count_temp_url_parts)
		{	
			if(in_array($temp_url_parts[0],$language_array))
			{
				$ln = $temp_url_parts[0];
				if ($count_temp_url_parts > 1)$controller = $temp_url_parts[1];
				if ($count_temp_url_parts > 2)$action = $temp_url_parts[2];				
				if ($count_temp_url_parts > 3)
				{
					for($i=3 ; $i<$count_temp_url_parts ; $i++)
					{
						$args[] = $temp_url_parts[$i];
					}
				}
			}
			else
			{
				$controller = $temp_url_parts[0];
				if ($count_temp_url_parts > 1)$action = $temp_url_parts[1];				
				if ($count_temp_url_parts > 2)
				{
					for($i=2 ; $i<$count_temp_url_parts; $i++)
					{
						$args[] = $temp_url_parts[$i];
					}
				}
			}
		}//if count
		
		
		
		// parse query params
		if (count($url_data) > 1){
			$query_part = $url_data[1];
			
			$temp_query_parts = explode("&", $query_part);
			foreach($temp_query_parts as $q){
				$temp = explode("=", $q);
				$key = $temp[0];
				$value = $temp[1];
				$query_parms[$key] = $value;
			}
		}
		
		$parms = array(
			"ln" => $ln,
			"controller" => $controller,
			"action" => $action,
			"args" => $args,
			"get" => $query_parms,
			"post" => $_POST,
			"gerbage" => $temp_url_parts
		);
		
		//pre($parms);
		return $parms;	
	}
	
	
	function make_url($params = NULL)
	{
		if($params != NULL)
		{
			$param_list = implode('/' , $params);
			
			return SCRIPT_URL.$param_list;
		}
	}
	

	function _remove_invisible_characters($str)
	{
		static $non_displayables;
		
		if ( ! isset($non_displayables))
		{
			// every control character except newline (dec 10), carriage return (dec 13), and horizontal tab (dec 09),
			$non_displayables = array(
										'/%0[0-8bcef]/',			// url encoded 00-08, 11, 12, 14, 15
										'/%1[0-9a-f]/',				// url encoded 16-31
										'/[\x00-\x08]/',			// 00-08
										'/\x0b/', '/\x0c/',			// 11, 12
										'/[\x0e-\x1f]/'				// 14-31
									);
		}

		do
		{
			$cleaned = $str;
			$str = preg_replace($non_displayables, '', $str);
		}
		while ($cleaned != $str);

		return $str;
	}
    
    
  function cookielogin(){
        global $db,$session;
        
		if(isset($_COOKIE['blrm'])){
		    $user_ip=IP_TO_LONG($_SERVER['REMOTE_ADDR']);
            $frip = $_COOKIE['blrm']['blip'];
            if($user_ip == $frip){
                $user_name = $_COOKIE['blrm']['blun'];
                $user_password = $_COOKIE['blrm']['blup'];
    			$user_info = $db->getRowArray('users',array("user_name"=>$user_name,"user_password"=>$user_password,'user_status'=>1,'user_banned'=>0));
                if($user_info){
                    // Set session data array
        			$user = array(						
        				'AR_user_id'			=> $user_info['user_id'],
        				'AR_user_name'			=> $user_info['user_name'],
        				'AR_email'				=> $user_info['user_email'],
        				'AR_admin'				=> FALSE,            	
            			'AR_logged_in'			=> TRUE
        			);
        			$session->set_userdata($user);
                    
                      $frcookie=base64_encode(serialize($user));
            
                        $domain='.peumind.com';
                        
                        $exp_time= time()+3600*24*30;
                        //bool setcookie ( string $name [, string $value [, int $expire=0 [, string $path [, string $domain [, bool $secure=false [, bool $httponly=false ]]]]]] )
                        
            	 		if($frcookie){
            	 			setcookie("fouzder",$frcookie,$exp_time,'/',$domain,false,false);
            	 		}
                    if($user_info['user_id']){
    				//UPDATE USER LAST LOGIN TIME
    			 	$sql = "UPDATE users SET `user_lastlogin` = '$now' WHERE user_id= ".$user_info['user_id'];
    				$db->edit($sql);
                    return true;	
					}  
                }
            }
		}
        
        return false;
	}
	
?>