<?php
#===========================================================================
#= Script : phpFile
#= File   : file.class.php
#= Version: 0.1
#= Author : Mike Leigh
#= Email  : mike@mikeleigh.com
#= Website: http://www.mikeleigh.com/scripts/phpfile
#= Support: http://www.mikeleigh.com/forum
#===========================================================================
#= Copyright (c) 2006 Mike Leigh
#= You are free to use and modify this script as long as this header
#= section stays intact
#=
#= This file is part of phpFile.
#=
#= phpFile is free software; you can redistribute it and/or modify
#= it under the terms of the GNU General Public License as published by
#= the Free Software Foundation; either version 2 of the License, or
#= (at your option) any later version.
#=
#= phpFile is distributed in the hope that it will be useful,
#= but WITHOUT ANY WARRANTY; without even the implied warranty of
#= MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
#= GNU General Public License for more details.
#=
#= You should have received a copy of the GNU General Public License
#= along with DownloadCounter; if not, write to the Free Software
#= Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
#===========================================================================
class phpFile {

	var $attributes = array();

	function phpFile($attributes = array()) {
		$attribute = &$this->attributes;
		$attribute['file']['current'] = 0;
		$attribute['file']['max_length'] = 8192;
		$attribute['file'][0]['stream'] = false;
		$attribute['file'][0]['file'] = '';
		$attribute['file'][0]['mode'] = '';
		$attribute['file'][0]['offset'] = '';
		$attribute['buffer']['data'] = '';
		$attribute['buffer']['length'] = 0;
		if(count($attributes) >= 1) {
			foreach($attributes as $key => $value) {
				$this->setAttribute($attribute[$key], $value);
			}
		}
	}

	function setMode($mode) {
		$stream = &$this->attributes['file'];
		$current_stream = &$stream['current'];
		if(($mode == 'r') || ($mode == 'w') || ($mode == 'a')) {
			$this->setAttribute($stream[$current_stream]['mode'], $mode.'b+');
		}
	}

	function setFile($filepath) {
		$stream = &$this->attributes['file'];
		$current_stream = &$stream['current'];
		$this->setAttribute($stream[$current_stream]['file'], $filepath);
	}

	function setOffset($offset) {
		$stream = &$this->attributes['file'];
		$current_stream = &$stream['current'];
		$this->setAttribute($stream[$current_stream]['offset'], $offset);
	}

	function open($filepath = '', $mode = '') {
		//opens a stream
		$stream = &$this->attributes['file'];
		$current_stream = $this->getCurrent();
		if($filepath <> '') {
			$this->setFile($filepath);
		}
		if($mode <> '') {
			$this->setMode($mode);
		}
		$old_mode = $mode;
		$mode = $this->getAttribute('mode', $stream[$current_stream]);
		if($mode == 'ab+') {
			$this->setMode('r');
		}
		$this->setAttribute($stream[$current_stream]['stream'], fopen($stream[$current_stream]['file'], $mode));
		if($stream[$current_stream]['stream'] == false) {
			//write an error and return false as the open has failed
			print "error opening file\n";
		}
		if($old_mode == 'a') {	//fixes the problem with append not working with fseek
			$stat = fstat($stream[$current_stream]['stream']);
			$stream[$current_stream]['offset'] = $stat['size'];
			$this->seek($stream[$current_stream]['offset']);
		} else {
			$stream[$current_stream]['offset'] = 0;
		}
	
	}

	function write($string) {
		$buffer = &$this->attributes['buffer'];
		$buffer['data'] = ($buffer['data'].$string);
		$buffer['length'] = $buffer['length'] + strlen($string);
	}

	function save() {
		$stream = &$this->attributes['file'];
		$current_stream = &$stream['current'];
		$buffer = &$this->attributes['buffer'];
		$steps = ceil($buffer['length'] / $stream['max_length']);
		for($i = 0; $i <= $steps - 1; $i++) {
			fwrite($stream[$current_stream]['stream'], substr($buffer['data'], ($i * $stream['max_length']), $stream['max_length']));
		}
		$buffer['data'] = '';
		$buffer['length'] = 0;
	}

	function insert($offset) {
		$stream = &$this->attributes['file'];
		$source = &$stream[0];
		$target = &$stream[1];
		$stream['current'] = 0;
		$this->seek($offset);
		$stream['current'] = 1;
		$this->open(md5(time()), 'w');
		while(!feof($source['stream'])) {
			$data = fread($source['stream'], $stream['max_length']);
			fwrite($target['stream'], $data);
		}
		$stream['current'] = 0;
		$this->seek($offset);
		$this->save();
		$stream['current'] = 1;
		$this->seek(0);
		while(!feof($target['stream'])) {
			$data = fread($target['stream'], $stream['max_length']);
			fwrite($source['stream'], $data);
		}
		$stream['current'] = 0;
		fclose($target['stream']);
		unlink($target['file']);
	}

	function remove($from, $to) {
		$stream = &$this->attributes['file'];
		$source = &$stream[0];
		$target = &$stream[1];
		$stream['current'] = 0;
		$this->seek($to);
		$stream['current'] = 1;
		$this->open(md5(time()), 'w');
		while(!feof($source['stream'])) {
			$data = fread($source['stream'], $stream['max_length']);
			fwrite($target['stream'], $data);
		}
		$stream['current'] = 0;
		$this->truncate($from);
		$this->seek($from);
		$this->save();
		$stream['current'] = 1;
		$this->seek(0);
		while(!feof($target['stream'])) {
			$data = fread($target['stream'], $stream['max_length']);
			fwrite($source['stream'], $data);
		}
		$stream['current'] = 0;
		fclose($target['stream']);
		unlink($target['file']);
	}

	function close() {
		$stream = &$this->attributes['file'];
		$current_stream = &$stream['current'];
		$file = &$stream[$current_stream]['stream'];
		if($file <> false) {
			fclose($file);
		}
	}

	function truncate($size) {
		//truncates the file to size
		$stream = &$this->attributes['file'];
		$current_stream = &$stream['current'];
		ftruncate($stream[$current_stream]['stream'], $size);
	}

	function seek($offset) {
		$stream = &$this->attributes['file'];
		$current_stream = &$stream['current'];
		fseek($stream[$current_stream]['stream'], $offset, SEEK_SET);
	}

	function getCurrent() {
		return $this->getAttribute('current', $this->attributes['file']);
	}

	/*
	  Private Function
	 */
	function getAttribute($needle, &$haystack) {
		return $haystack[$needle];
	}
	
	/*
	  Private Function
	 */
	function setAttribute(&$haystack, $value) {
		$haystack = $value;
	}
}
?>