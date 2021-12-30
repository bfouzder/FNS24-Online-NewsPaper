<?php
#===========================================================================
#= Script : phpCSV
#= File   : csv.class.php
#= Version: 0.3
#= Author : Mike Leigh
#= Email  : mike@mikeleigh.com
#= Website: http://www.mikeleigh.com/scripts/phpcsv
#= Support: http://www.mikeleigh.com/forum
#===========================================================================
#= Copyright (c) 2006 Mike Leigh
#= You are free to use and modify this script as long as this header
#= section stays intact
#=
#= This file is part of phpCSV.
#=
#= phpCSV is free software; you can redistribute it and/or modify
#= it under the terms of the GNU General Public License as published by
#= the Free Software Foundation; either version 2 of the License, or
#= (at your option) any later version.
#=
#= phpCSV is distributed in the hope that it will be useful,
#= but WITHOUT ANY WARRANTY; without even the implied warranty of
#= MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
#= GNU General Public License for more details.
#=
#= You should have received a copy of the GNU General Public License
#= along with DownloadCounter; if not, write to the Free Software
#= Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
#===========================================================================
include(BASE_DIR."includes/classes/file.class.php");
class phpCSV extends phpFile {

	var $attributes = array('csv' => array());

	function phpCSV() {
		$csv = &$this->attributes['csv'];
		$this->setAttribute($csv['result'], array());
		$this->setAttribute($csv['result']['heading'], array());
		$this->setAttribute($csv['result']['data'], array());
		$this->setAttribute($this->attributes['csv']['current_line'], 1);
		$this->setEOF(false);
		$this->setFetchLimit(50);
		$this->setFirstRowContainsColumnHeadings(true);
		phpFile::phpFile();
	}

	function setFirstRowContainsColumnHeadings($boolean) {
		$csv = &$this->attributes['csv'];
		$this->setAttribute($csv['first_row_headings'], $boolean);
	}

	function setFetchLimit($value) {
		$csv = &$this->attributes['csv'];
		$this->setAttribute($csv['fetch_limit'], $value);
	}

	function setDelimiter($value) {
		$a = &$this->attributes['delimiter'];
		$this->setAttribute($a, $value);
	}

	function setEOF($value) {
		$a = &$this->attributes['eof'];
		$this->setAttribute($a, $value);
	}

	function getEOF() {
		return $this->getAttribute('eof', $this->attributes);
	}

	function getValue($row, $column) {
		return $this->attributes['csv']['result']['data'][$row][$column];
	}

	function incrementLineNumber() {
		$this->attributes['csv']['current_line']++;
	}

	function decrementLineNumber() {
		$this->attributes['csv']['current_line']--;
	}

	function getCurrentLineNumber() {
		return $this->getAttribute('current_line', $this->attributes['csv']);
	}

	function fetch($limit = 0) {
		if($limit > 0) {
			$this->setFetchLimit($limit);
		}
		$csv = $this->getAttribute('csv', $this->attributes);
		$file = $this->getAttribute('file', $this->attributes);
		$heading = &$this->attributes['csv']['result']['heading'];
		$data = &$this->attributes['csv']['result']['data'];
		$current_line = $this->getCurrentLineNumber();
		$data = array();
		//Populate Column Headings
		if($current_line == 1) {
			if($csv['first_row_headings'] == true) {
				if(PHP_VERSION >= '4.3.0') {
					$line = fgetcsv($file[0]['stream'], $file['max_length'], ",", "\"");
				} else {
					//fgetcsv string encapsulation parameter is not available in versions < 4.3.0.  This code falls back to using the default double quote encapsulation.
					$line = fgetcsv($file[0]['stream'], $file['max_length'], ",");
				}
				$this->setAttribute($heading[0], $line);
				$this->incrementLineNumber();
			}
		}
		//Populate CSV Data
		$lines = 0;
		for($i = 0; $i <= ($csv['fetch_limit'] - 1); $i++) {
			if(PHP_VERSION >= '4.3.0') {
				$line = fgetcsv($file[0]['stream'], $file['max_length'], ",", "\"");
			} else {
				//fgetcsv string encapsulation parameter is not available in versions < 4.3.0.  This code falls back to using the default double quote encapsulation.
				$line = fgetcsv($file[0]['stream'], $file['max_length'], ",");
			}
			$this->setAttribute($data[$this->getCurrentLineNumber()], $line);
			if(is_array($line)) {
				$length = 0;
				for($j = 0; $j <= count($line) - 1; $j++) {
					$length = $length + strlen($line[$j]);
				}
				if($length == 0) {
					unset($data[$this->getCurrentLineNumber()]);
					$this->decrementLineNumber();
				} else {
					$lines++;
				}
			} else {
				unset($data[$this->getCurrentLineNumber()]);
				$this->decrementLineNumber();
			}
			$this->incrementLineNumber();
		}
		if(feof($file[0]['stream'])) {
			$this->setEOF(true);
		}
		if($lines <> 0) {
			return true;
		}
		return false;
	}

	function getAttribute($needle, &$haystack) {
		return $haystack[$needle];
	}
	
	function setAttribute(&$haystack, $value) {
		$haystack = $value;
	}
}
?>