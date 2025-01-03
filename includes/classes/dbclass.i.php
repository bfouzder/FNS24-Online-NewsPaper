<?php
/**
 * RAW PHP SCRIPT
 *
 * @package		RAWPHPSCRIPT
 * @author		Aditya(bfouzder@yahoo.com).
 * @copyright	Copyright (c) 2015, TheARSoft.com, Ltd.
 * @version 3.0
 */
 
 
class dbclass
{
		
    	 var $SHOW_ERROR = TRUE; //TRUE TO DISPLAY ANY MYSQL ERROR, FALSE TO DO NOTHING
    
        // Need to set these constant variables:
        var $DBASE  = DB_DATABASE;
        var $USER   = DB_SERVER_USERNAME;
        var $PASS   = DB_SERVER_PASSWORD;
        var $SERVER = DB_SERVER;
    
        // Declare $CONN property explicitly
        var $CONN;

        //function dbclass(){
        function __construct(){

                $user = $this->USER;
                $pass = $this->PASS;
                $server = $this->SERVER;
                $dbase = $this->DBASE;
                $conn = mysqli_connect($server,$user,$pass,$dbase);
               // @mysqli_query("SET AUTOCOMMIT=0");
                @mysqli_query($conn, "SET AUTOCOMMIT=0");
				if (mysqli_connect_errno()){
				  $this->error("Failed to connect to MySQLi: " . mysqli_connect_error());
				}
                 if(!@mysqli_select_db($conn,$dbase)) { $this->error("Database Select failed"); }else{
					#For Bangla
					@mysqli_query($conn,"SET CHARACTER SET utf8");
					@mysqli_query($conn,"SET SESSION collation_connection='utf8_general_ci'"); 
				} 
                $this->CONN = $conn;
				
                return true;
        }
		
        function close(){
                $conn = $this->CONN ;
                $close = mysqli_close($conn);
                if(!$close){
                    $this->error("Connection close failed");
                }
                return true;
        }

        function error($text=false){
        	 $conn = $this->CONN ;
	        	if($this->SHOW_ERROR){
			    echo "<br/><i>&raquo;&raquo;&nbsp; SQL-ERROR &raquo;&raquo;&nbsp;" .mysqli_errno( $conn) ."&nbsp;&raquo;&raquo;&nbsp; ". mysqli_error( $conn)." &nbsp;&laquo;&laquo;<br/>&raquo;&raquo;&nbsp; ".$text." &nbsp;&laquo;&laquo;</i>";
	            exit;
	           }
        }

		

		
		
		function getRowsArray($tableName,$where=false, $select = "*"){
		
			if ($select){
				$select=(is_array($select))? implode(',', $select) : $select;
				$sql = "SELECT ".$select;
			}
			
			$sql.= " FROM ".$tableName;
			
			if (is_array($where)){
				$sql .= " WHERE ";		
				$i=0;
				foreach($where as $k=>$val){
					if($i==0){
					$sql .= " `$k` ='$val'";	
					}else{
					$sql .= " AND `$k` ='$val'";	
					}
					
					$i++;
				}
			}elseif (is_numeric($where)) {
				$sql .= " WHERE ";		
				$sql .= $this->primary($tableName).' = ' . $this->escape($where);
			}elseif(is_string($where)){
			
				$sql .= " WHERE ";		
				$sql .= $where;
			}else{
				//no operation
			}
			
			//echo $sql;
			
			
			return $this->select($sql);
			
		} 
		
		function getRowArray($tableName,$where=false, $select = "*"){
		
			if ($select){
				$select=(is_array($select))? implode(',', $select) : $select;
				$sql = "SELECT ".$select;
			}
			
			$sql.= " FROM ".$tableName;
			
			if (is_array($where)){
				$sql .= " WHERE ";		
				$i=0;
				foreach($where as $k=>$val){
					if($i==0){
					$sql .= " `$k` ='$val'";	
					}else{
					$sql .= " AND `$k` ='$val'";	
					}
					
					$i++;
				}
			}elseif (is_numeric($where)) {
				$sql .= " WHERE ";		
				$sql .= $this->primary($tableName).' = ' . $where;
			}elseif(is_string($where)){
			
				$sql .= " WHERE ";		
				$sql .= $where;
			}else{
				//no operation
			}
			
		//	echo $sql;
			return $this->select_single($sql);
		}
		
		function deleteField($tableName , $where = false)
	    {
	    	
	    	$sql.= "DELETE FROM ".$tableName;
				
				if (is_array($where)){
					$sql .= " WHERE ";		
					$i=0;
					foreach($where as $k=>$val){
						if($i==0){
						$sql .= " `$k` ='$val'";	
						}else{
						$sql .= " AND `$k` ='$val'";	
						}
						
						$i++;
					}
				}elseif (is_numeric($where)) {
					$sql .= " WHERE ";		
					$sql .= $this->primary($tableName).' = ' . $where;
				}elseif(is_string($where)){
				
					$sql .= " WHERE ";		
					$sql .= $where;
				}else{
					//no operation
				}
				
	    	$this->delete($sql);
	    }
		
		
		function select ($sql="")
        {	#	echo $sql;
                if(empty($sql)) { return false; }

                if(!preg_match("/(^select)|(^\(select)/i",$sql)){
						$this->error(" SELECT is Misspeling");
                        return false;
                }

                if(empty($this->CONN)) { return false; }
                $conn = $this->CONN;
                //echo $sql;
                $results = mysqli_query($conn,$sql);
                if( (!$results) or (empty($results)) ) {
                        return false;
                }
                $count = 0;
                $data = array();
                while ( $row = mysqli_fetch_array($results, MYSQLI_ASSOC))
                {
                        $data[$count] = $row;
                        $count++;
                }
                mysqli_free_result($results);
				return $data;
        }
		
		function select_single($sql){
			$rows=$this->select($sql);
			if($rows){
			return $rows[0];
			}else{
			return false;	
			}	
		}
		
        function affected($sql="")
        {
           // echo $sql;
                if(empty($sql)) { return false; }
                 if(!preg_match("/(^select)|(^\(select)/i",$sql)){
						$this->error(" SELECT is Misspeling");
                        return false;
                }

                if(empty($this->CONN)) { return false; }
                $conn = $this->CONN;
                $results = @mysqli_query($conn,$sql);
                if( (!$results) or (empty($results)) ) {
                        return false;
                }
                $tot=0;
                $tot=mysqli_affected_rows($conn);
                return $tot;
        }

        function insert ($sql="")
        {
                if(empty($sql)) { return false; }
                if(!preg_match("/^insert/i",$sql))
                {
					$this->error(" INSERT is Misspeling");                     
					 return false;
                }
                if(empty($this->CONN))
                {
						$this->error();
                        return false;
                }

                $conn = $this->CONN;

                $results = @mysqli_query($conn,$sql);

                if(!$results) 
                {
					$this->error($sql);
                    return 0;
                }
                $id = mysqli_insert_id($conn);
                return $id;
        }

        function edit($sql="")
        {
            
                if(empty($sql)) { return false; }
                if(!preg_match("/^update/i",$sql))
                {
						$this->error(" UPDATE is Misspeling");
                        return false;
                }
                if(empty($this->CONN))
                {
                       	$this->error(" DB CONNECTION Failed"); 
						return false;
                }
                $conn = $this->CONN;
                $results =@mysqli_query($conn,$sql);
                if(!$results) 
                {
						$this->error($sql);
                        return 0;
                }
                $rows = 0;
                $rows = mysqli_affected_rows($conn);
                return $rows;
        }
		function delete($sql="")
        {	
                if(empty($sql)) { return false; }
                if(!preg_match("/^delete/i",$sql))
                {
						$this->error(" DELETE is Misspeling");
                        return false;
                }
                if(empty($this->CONN))
                {
                       	$this->error(" DB CONNECTION Failed");  
						return false;
                }
                $conn = $this->CONN;
                $results =@mysqli_query($conn,$sql);
                if(!$results) 
                {
						$this->error($sql);
                        return false;
                }else return true;
        }

		function getColumns($tableName){
		       $conn = $this->CONN;
			$columns = array();
			$query = mysqli_query($conn, 'DESC ' . $tableName);
			while($row=mysqli_fetch_array($query)){
				$columns[] = $row['Field'];
			}
			
			return $columns;
		}
		
		function primary($table = ''){	
		
			$fields = $this->getColumns($table);
			if ( ! is_array($fields))
			{
				return FALSE;
			}
			return current($fields);
		}
		
/*************bof HANDEL POST GET DATA**************************************/
	
	function db_input($string) {
	    return addslashes(trim($string));
	  }

	  function db_prepare_input($string) {
	    if (is_string($string)) {
	      return trim(stripslashes($string));
	    } elseif (is_array($string)) {
	      reset($string);
	      while (list($key, $value) = each($string)) {
	        $string[$key] = $this->db_prepare_input($value);
	      }
	      return $string;
	    } else {
	      return $string;
	    }
	  }
	/**
	 * Fetch an item from the GET array
	 *
	 * @access	public
	 * @param	string
	 * @param	bool
	 * @return	string
	 */
	function get($index = '', $xss_clean = FALSE)
	{
		return $this->_fetch_from_array($_GET, $index, $xss_clean);
	}

	// --------------------------------------------------------------------

	/**
	 * Fetch an item from the POST array
	 *
	 * @access	public
	 * @param	string
	 * @param	bool
	 * @return	string
	 */
	function post($index = '', $xss_clean = FALSE)
	{
		return $this->_fetch_from_array($_POST, $index, $xss_clean);
	}

	// --------------------------------------------------------------------

	/**
	 * Fetch an item from either the GET array or the POST
	 *
	 * @access	public
	 * @param	string	The index key
	 * @param	bool	XSS cleaning
	 * @return	string
	 */
	function get_post($index = '', $xss_clean = FALSE)
	{		
		if ( ! isset($_POST[$index]) )
		{
			return $this->get($index, $xss_clean);
		}
		else
		{
			return $this->post($index, $xss_clean);
		}		
	}
	
/*************************************eof HANDEL POST GET DATA****************************************************************************/	

	/**
	 * Clean Input Data
	 *
	 * This is a helper function. It escapes data and
	 * standardizes newline characters to \n
	 *
	 * @access	private
	 * @param	string
	 * @return	string
	 */
	function _clean_input_data($str)
	{
		if (is_array($str))
		{
			$new_array = array();
			foreach ($str as $key => $val)
			{
				$new_array[$this->_clean_input_keys($key)] = $this->_clean_input_data($val);
			}
			return $new_array;
		}

		// We strip slashes if magic quotes is on to keep things consistent
		if (get_magic_quotes_gpc())
		{
			$str = stripslashes($str);
		}

		// Should we filter the input data?
		if ($this->use_xss_clean === TRUE)
		{
			$str = $this->xss_clean($str);
		}

		// Standardize newlines
		if (strpos($str, "\r") !== FALSE)
		{
			$str = str_replace(array("\r\n", "\r"), "\n", $str);
		}
		
		return $str;
	}

	// --------------------------------------------------------------------

	/**
	 * Clean Keys
	 *
	 * This is a helper function. To prevent malicious users
	 * from trying to exploit keys we make sure that keys are
	 * only named with alpha-numeric text and a few other items.
	 *
	 * @access	private
	 * @param	string
	 * @return	string
	 */
	function _clean_input_keys($str)
	{
		 if ( ! preg_match("/^[a-z0-9:_\/-]+$/i", $str))
		 {
			exit('Disallowed Key Characters.');
		 }

		return $str;
	}

	// --------------------------------------------------------------------
	
	/**
	 * Fetch from array
	 *
	 * This is a helper function to retrieve values from global arrays
	 *
	 * @access	private
	 * @param	array
	 * @param	string
	 * @param	bool
	 * @return	string
	 */
	function _fetch_from_array(&$array, $index = '', $xss_clean = FALSE)
	{
		if ( ! isset($array[$index]))
		{
			return FALSE;
		}

		if ($xss_clean === TRUE)
		{
			return $this->xss_clean($array[$index]);
		}

		return $array[$index];
	}

	
	
	function escape($str)
	{	
		switch (gettype($str))
		{
			case 'string'	:	$str = "'".$this->escape_str($str)."'";
				break;
			case 'boolean'	:	$str = ($str === FALSE) ? 0 : 1;
				break;
			default			:	$str = ($str === NULL) ? 'NULL' : $str;
				break;
		}		
		return $str;
	}
	
	function escape_str($str)	
	{
		// Escape single quotes
		return str_replace("'", "''", $this->_remove_invisible_characters($str));
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
	

	/*
	NOTE: html_entity_decode() has a bug in some PHP versions when UTF-8 is the
	character set, and the PHP developers said they were not back porting the
	fix to versions other than PHP 5.x.
	*/
	function _html_entity_decode($str, $charset='UTF-8')
	{
		if (stristr($str, '&') === FALSE) return $str;

		// The reason we are not using html_entity_decode() by itself is because
		// while it is not technically correct to leave out the semicolon
		// at the end of an entity most browsers will still interpret the entity
		// correctly.  html_entity_decode() does not convert entities without
		// semicolons, so we are left with our own little solution here. Bummer.

		if (function_exists('html_entity_decode') && (strtolower($charset) != 'utf-8' OR version_compare(phpversion(), '5.0.0', '>=')))
		{
			$str = html_entity_decode($str, ENT_COMPAT, $charset);
			$str = preg_replace('~&#x(0*[0-9a-f]{2,5})~ei', 'chr(hexdec("\\1"))', $str);
			return preg_replace('~&#([0-9]{2,4})~e', 'chr(\\1)', $str);
		}

		// Numeric Entities
		$str = preg_replace('~&#x(0*[0-9a-f]{2,5});{0,1}~ei', 'chr(hexdec("\\1"))', $str);
		$str = preg_replace('~&#([0-9]{2,4});{0,1}~e', 'chr(\\1)', $str);

		// Literal Entities - Slightly slow so we do another check
		if (stristr($str, '&') === FALSE)
		{
			$str = strtr($str, array_flip(get_html_translation_table(HTML_ENTITIES)));
		}

		return $str;
	}

	// --------------------------------------------------------------------

	/**
	 * Random Hash for protecting URLs
	 *
	 * @access	public
	 * @return	string
	 */
	function xss_hash()
	{
		if ($this->xss_hash == '')
		{
			if (phpversion() >= 4.2)
				mt_srand();
			else
				mt_srand(hexdec(substr(md5(microtime()), -8)) & 0x7fffffff);

			$this->xss_hash = md5(time() + mt_rand(0, 1999999999));
		}

		return $this->xss_hash;
	}
	
		
	function checkExist($tableName,$where=false, $select = "*"){
		
			if ($select){
				$select=(is_array($select))? implode(',', $select) : $select;
				$sql = "SELECT ".$select;
			}
			
			$sql.= " FROM ".$tableName;
			
			if (is_array($where)){
				$sql .= " WHERE ";		
				$i=0;
				foreach($where as $k=>$val){
					if($i==0){
					$sql .= " `$k` ='$val'";	
					}else{
					$sql .= " AND `$k` ='$val'";	
					}
					$i++;
				}
			}elseif (is_numeric($where)) {
				$sql .= " WHERE ";		
				$sql .= $this->primary($tableName).' = ' . $where;
			}elseif(is_string($where)){
			
				$sql .= " WHERE ";		
				$sql .= $where;
			}else{
				//no operation
			}			
			//echo $sql;
			return $this->affected($sql);
	}
    
    function checkExists($tableName,$where=false, $select = "*"){
		
			if ($select){
				$select=(is_array($select))? implode(',', $select) : $select;
				$sql = "SELECT ".$select;
			}
			
			$sql.= " FROM ".$tableName;
			
			if (is_array($where)){
				$sql .= " WHERE ";		
				$i=0;
				foreach($where as $k=>$val){
					if($i==0){
					$sql .= " `$k` ='$val'";	
					}else{
					$sql .= " AND `$k` ='$val'";	
					}
					$i++;
				}
			}elseif (is_numeric($where)) {
				$sql .= " WHERE ";		
				$sql .= $this->primary($tableName).' = ' . $where;
			}elseif(is_string($where)){
			
				$sql .= " WHERE ";		
				$sql .= $where;
			}else{
				//no operation
			}			
			//echo $sql;
			return $this->affected($sql);
	}
//ends the class over here

	function doUpdate($data , $table_name , $where = '')
    {
		$conn=$this->CONN;
		
    	if(is_array($data))
    	{        		
    		$sql_do_update = "UPDATE " . $table_name . " SET ";
			
			foreach($data as $key=>$val)				
				$sql_do_update .= $key . " = '" . $val . "', ";	
			$sql_do_update = rtrim($sql_do_update , ', ');	
			$where = trim($where);
			if($where != '')$sql_do_update .= " where " . $where;
			@mysqli_query($conn, $sql_do_update);
			#return $sql_do_update;
			$affected_row = mysqli_affected_rows();
   			return $affected_row;	
    	}
    }
	
	function doInsert($data , $table_name)
    {
    	if(is_array($data))
    	{        		
    		//INSERT
					$sql ="INSERT INTO ".$table_name." SET ";
					$i=0;
					foreach($data as $key=>$value){
							
						$value = $this->db_prepare_input($value);
						if($i==0){
                            if(is_string($value)){
								$sql .= "`".$key ."` = '".$this->db_input($value)."'";
							}else{
								$sql .= "`".$key ."` = '".$value."'";
							}
						}else{
                            if(is_string($value)){
								$sql .= ", `".$key ."` = '".$this->db_input($value)."'";
							}else{
						      	$sql .= ", `".$key ."` = '".$value."'";
							}
						}
					$i++;
					}//foreach
				//echo $sql;
				return $this->insert($sql);	
    	}else return false;
    }
    
    
	
	function executeSingle($select = '*' , $table_name , $where = '' , $show=0)
    {  		
		$conn=$this->CONN;
	
    	$sql_select = "select " . $select . " from " . $table_name;
    	$where = trim($where);
		if($where != '')$sql_select .= " where " . $where . " limit 0,1";
    	if($show == 1)
    		echo $sql_select;
    	$result = @mysqli_query($conn,$sql_select);
    	if($result)
    	{
    		$row = mysqli_fetch_row($result);
    		
    		return $row[0];
    	}    	
    }
    

    
    
    function countTotal($table_name , $where = '')
    {  	
		$conn=$this->CONN;	
    	$sql_select = "select * from " . $table_name;
    	$where = trim($where);
		if($where != '')$sql_select .= " where " . $where;
    	
    	$result = @mysqli_query($conn,$sql_select);
    	
    	$affected_row = mysqli_affected_rows($conn);    	
    }
    
    function querySingle($select = '*' , $table_name , $where = '')
    {  
	  $conn=$this->CONN;	  	
    	$sql_select = "select " . $select . " from " . $table_name ." where " . $where . " limit 0,1";
    	    	
    	#echo $sql_select;exit;
    	$result = @mysqli_query($conn,$sql_select);
    	if($result)
    	{
    		$row = mysqli_fetch_array($result , MYSQLI_ASSOC);
    		return $row;
    	}    	
    }
    
    function dbQuery($select = '*' , $table_name , $where = '' , $order_by = '' , $limit = '',$show=0)
    {	
	
    	$sql_select = "select " . $select . " from " . $table_name;
    	$where = trim($where);
		if($where != '')$sql_select .= " where " . $where;
		$order_by = trim($order_by);
		if($order_by != '')$sql_select .= " order by " . $order_by;		
		$limit = trim($limit);
		if($limit != '')$sql_select .= " limit " . $limit;
		if($show!=0)
    		echo $sql_select;
    	return $this->select($sql_select);
    }

	function simpleSelect($sql_select)
    {	    	
    	 $conn=$this->CONN;
    	$sql_select = trim($sql_select);
    	$result = mysqli_query($conn, $sql_select);    	
    	if($result)
    	{	
    		while($row = mysqli_fetch_array($result , MYSQLI_ASSOC))    		
    			$result_arr[] = $row;
    		
    		return $result_arr;
    	}
		else die(mysqli_error($conn));    
			
    }

	function pickRow($table_name , $primary_key , $primary_key_val)
	{
		return $this->querySingle("*" , $table_name , $primary_key . " = '" . $primary_key_val . "'");
	}
	
	function deleteRow($table_name , $primary_key , $primary_key_val)
	{
			 $conn=$this->CONN;
		$sql = "delete from " . $table_name . " where " . $primary_key . " = '" . $primary_key_val . "'";
		@mysqli_query($conn,$sql);
		//return $this->querySingle("*" , $table_name , $primary_key . " = '" . $primary_key_val . "'");
	}

    
    
	function updatePOST($table_name, $priColumn=false, $post = false){
		if (!$post) $post = $_POST;			
		$data = $post;			
		if(count($post) >=1){
				//UPDATE
				$sql ="UPDATE ".$table_name." SET ";
				$i=0;
				foreach($data as $key=>$value){
					
					$value = $this->db_prepare_input($value);
					
					if($i==0){
						if(is_string($value)){
							$sql .= "`".$key ."` = '".$this->db_input($value)."'";
						}else{
							$sql .= "`".$key ."` = '".$value."'";
						}
					}else{
						if(is_string($value)){
							$sql .= ", `".$key ."` = '".$this->db_input($value)."'";
						}else{
							$sql .= ", `".$key ."` = '".$value."'";
						}
					}
				
				$i++;
				}//foreach
				
				$sql .= " WHERE ".$priColumn." = ".$data[$priColumn];
				//	echo $sql;
				return $this->edit($sql);
			
		}else return false;
				
	}
	function insertPOST($table_name, $priColumn, $post = false){
			if (!$post) $post = $_POST;			
    		$data = $post;			
    		if(count($post) >=1){
			//UPDATE
			$sql ="INSERT INTO ".$table_name." SET ";
				$i=0;
				foreach($data as $key=>$value){
					
					$value = $this->db_prepare_input($value);
					
					if($i==0){
						if(is_string($value)){
							$sql .= "`".$key ."` = '".$this->db_input($value)."'";
						}else{
							$sql .= "`".$key ."` = '".$value."'";
						}
					}else{
						if(is_string($value)){
							$sql .= ", `".$key ."` = '".$this->db_input($value)."'";
						}else{
							$sql .= ", `".$key ."` = '".$value."'";
						}
					}
				
				$i++;
				}//foreach	
				//echo $sql;
				return $this->insert($sql);				
				
			}else return false;					
		}
	
	function bindPOST($table_name, $priColumn=false, $post = false){
			if (!$post) $post = $_POST;
			
			$data = array();
			
			if(!$priColumn){
				$priColumn = $this->primary($table_name);
			}
			
			if(count($post) >=1){
					
				$columns = $this->getColumns($table_name);
				foreach ($post as $key => $value){
					if (in_array($key, $columns)){
						$data[$key] = $value;
					}
				}//foreach
				
				//AFTER PREPARE DATA ARRAY
				
				if (array_key_exists($priColumn, $data)){
					//UPDATE
					$sql ="UPDATE ".$table_name." SET ";
					$i=0;
					foreach($data as $key=>$value){
						
						$value = $this->db_prepare_input($value);
						
						if($i==0){
							if(is_string($value)){
								$sql .= "`".$key ."` = '".$this->db_input($value)."'";
							}else{
								$sql .= "`".$key ."` = '".$value."'";
							}
						}else{
							if(is_string($value)){
								$sql .= ", `".$key ."` = '".$this->db_input($value)."'";
							}else{
								$sql .= ", `".$key ."` = '".$value."'";
							}
						}
					
					$i++;
					}//foreach
					
					$sql .= " WHERE ".$priColumn." = ".$data[$priColumn];
						//echo $sql;
					return $this->edit($sql);
				
				}else{
					//INSERT
					$sql ="INSERT INTO ".$table_name." SET ";
					$i=0;
					foreach($data as $key=>$value){
							
						$value = $this->db_prepare_input($value);
						if($i==0){
							if(is_string($value)){
									$sql .= "`".$key ."` = '".$this->db_input($value)."'";
							}else{
								$sql .= "`".$key ."` = '".$value."'";
							}
						}else{
							
							if(is_string($value)){
								$sql .= ", `".$key ."` = '".$this->db_input($value)."'";
							}else{
						      	$sql .= ", `".$key ."` = '".$value."'";
							}
						}
					$i++;
					}//foreach
			//	echo $sql;
				return $this->insert($sql);
				}
				
			}else return false;
					
		}
	
	
	
	function Query($select = '*' , $table_name , $where = '' , $order_by = '' , $limit = '')
    {
    	$sql_select = "select " . $select . " from " . $table_name;
    	$where = trim($where);
		if($where != '')$sql_select .= " where " . $where;
		$order_by = trim($order_by);
		if($order_by != '')$sql_select .= " order by " . $order_by;		
		$limit = trim($limit);
		if($limit != '')$sql_select .= " limit " . $limit;
    	
    	
    	return $this->select($sql_select);	
    }
    
	function update($sql="")
        {
			
			$conn=$this->CONN;
                if(empty($sql)) { return false; }
                if(!preg_match("/^update/i",$sql))
                {
						$this->error(" UPDATE is Misspeling");
                        return false;
                }
                if(empty($this->CONN))
                {
                       	$this->error(" DB CONNECTION Failed"); 
						return false;
                }
                $conn = $this->CONN;
                $results =@mysqli_query($conn,$sql);
                if(!$results) 
                {
						$this->error($sql);
                        return 0;
                }
                $rows = 0;
                $rows = mysqli_affected_rows($conn);
                return $rows;
        }
        
        
        
        	// --------------------------------------------------------------------

	/**
	 * XSS Clean
	 *
	 * Sanitizes data so that Cross Site Scripting Hacks can be
	 * prevented.  This function does a fair amount of work but
	 * it is extremely thorough, designed to prevent even the
	 * most obscure XSS attempts.  Nothing is ever 100% foolproof,
	 * of course, but I haven't been able to get anything passed
	 * the filter.
	 *
	 * Note: This function should only be used to deal with data
	 * upon submission.  It's not something that should
	 * be used for general runtime processing.
	 *
	 * This function was based in part on some code and ideas I
	 * got from Bitflux: http://blog.bitflux.ch/wiki/XSS_Prevention
	 *
	 * To help develop this script I used this great list of
	 * vulnerabilities along with a few other hacks I've
	 * harvested from examining vulnerabilities in other programs:
	 * http://ha.ckers.org/xss.html
	 *
	 * @access	public
	 * @param	string
	 * @return	string
	 */
	function xss_clean($str, $is_image = FALSE)
	{
		/*
		 * Is the string an array?
		 *
		 */
		if (is_array($str))
		{
			while (list($key) = each($str))
			{
				$str[$key] = $this->xss_clean($str[$key]);
			}
	
			return $str;
		}	

		$str= htmlspecialchars(stripslashes(trim($str)));exit;
		
		return $str;
	}
}
?>
