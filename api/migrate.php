<?php
echo date('F, j Y g:i a');exit;

include('../includes/config.php');
$csv_file='D:/xampp/htdocs/Document/MemberList/';


/*$csv_file .='2.Army_Major_General.csv';
$csv_file .='3.Army_Brig_General.csv';
$csv_file .='4.Army_Colonel.csv';
$csv_file .='5.Army_Lt_Colonel.csv';
$csv_file .='6.Army_Major.csv';
$csv_file .='7.Navy_Captain.csv';
$csv_file .='8.Navy_Lieutenant_Commandar.csv';
$csv_file .='9.Air_Commodore.csv';
$csv_file .='9.Air_Group_Captain.csv';
$csv_file .='10.Air_Wing_Commander.csv';
$csv_file .='11.Air_Squadron_Leader.csv';
*/
$results_array=readCSVFiles($csv_file,$excluding_first_line=true);
pre($results_array);
/*
//'Army','Navy','Air Force'
  [0] => Array
        (
            [0] => RANK
            [1] => NAME
            [2] => NAME OF SPOUSE
            [3] => NAMES OF CHILDREN
            [4] => HOUSE NO
            [5] => LANE NO
            [6] => TEL
            [7] => OFFICE
            [8] => MOBILE
            [9] => E-MAIL
        )
*/
if($results_array){
	foreach($results_array as $k=>$results){
		
		$member_d=array();
		$member_d['rank_type']='Navy';
		$member_d['rank_id']=$results[0];
		$member_d['Name']=$results[1];
		$member_d['Spouse']=$results[2];
		$member_d['Children']=$results[3];
		$member_d['House_No']=$results[4];
		$member_d['Lane_No']=$results[5];
		$member_d['Phone']=$results[6];
		$member_d['Office_Phone']=$results[7];
		$member_d['Mobile']=$results[8];
		$member_d['Email']=strtolower(str_replace(' ','',$results[9]));
		if($results[0]){
		
		
		}
		}//
pre($member_list);	
}
?>