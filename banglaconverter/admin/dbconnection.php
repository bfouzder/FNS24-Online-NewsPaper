<?php

error_reporting(0);



$host="localhost";
$dbuser="ourbqjwl_fns_converter";
$pw="8GVq8K[TOYF_";
$db ="ourbqjwl_fns_converter";


date_default_timezone_set("Asia/Dhaka");



/*
$link=mysql_connect($host,$dbuser,$pw)or die("could not connect mysql".mysql_error());
if($link)
{
mysql_select_db($db)or die("could not connect databasae $db".mysql_error());
}

*/


$con_db = mysqli_connect("$host","$dbuser","$pw","$db");
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

/*

$host="localhost";
$dbuser="ourbqjwl_fns_converter";
$pw="8GVq8K[TOYF_";
$db ="ourbqjwl_fns_converter";



$link=mysql_connect($host,$dbuser,$pw)or die("could not connect mysql".mysql_error());
if($link)
{
mysql_select_db($db)or die("could not connect databasae $db".mysql_error());
}

*/







session_start();

$user_name=$_SESSION['color1'];
$password=$_SESSION['color2'];

date_default_timezone_set("Asia/Dhaka");


//include_once('dbconnection.php');


$sql="SELECT * FROM `create_password` WHERE user_name='$user_name' && password='$password' ";


$result=mysqli_query($con_db,$sql);
$arr=mysqli_fetch_array($result);

$user_name1=$arr[3];
$password1=$arr[4];

$u_namee=$arr[1];
$pas_type=$arr[7];
$u_idd=$arr[0];
$sales_id=$arr[8];

$go_id_new=$arr[9];
$sql="SELECT * FROM `godawn_new` WHERE user_id='$go_id_new' ";
$result=mysqli_query($con_db,$sql);
$arrug=mysqli_fetch_array($result);
$go_new=$arrug[1];





//print" $u_namee  - $pas_type ";


$n=$arr[1];

if($user_name1!=$user_name && $password1!=$password)
{

//include_once('../khan/index.php');

include_once('index.php');

//header("Location: http://74.91.27.226/~ssss/rv/index.php");

exit;


}



function GetVolumeLabel($drive) {
if (preg_match('#Volume Serial Number is (.*)\n#i', shell_exec('dir '.$drive.':'), $m)) {
$volname = ' ('.$m[1].')';
} else {
$volname = '';
}
return $volname;
}
$sk5= str_replace("(","",str_replace(")","",GetVolumeLabel("c")));

$lenu=strlen($sk5);



//print"$sk5";




if($lenu==10 && $sk5==" 3C22-0D7C")
{

}
else
{
//exit;	
}




if($user_name=="" || $password=="")
{

//include_once('../khan/index.php');

include_once('index.php');



//header("Location: http://74.91.27.226/~ssss/rv/index.php");

exit;


}



$b_code=1;


$sey=1;



$sql="SELECT * FROM `sett` WHERE user_id='$sey' ";
$result=mysqli_query($con_db,$sql);
$arrset=mysqli_fetch_array($result);
$set_p=$arrset[1];
$set_vat=$arrset[2];

$set_font_size=$arrset[4];
$set_height=$arrset[3];
$set_font_color=$arrset[5];
$set_bg_color=$arrset[6];
$set_radius=$arrset[7];
$set_wd=$arrset[8];

$set_pto=$arrset[9];
$set_discount=$arrset[10];

$set_bill_ledger=$arrset[11];
$set_sms=$arrset[12];
$set_pad=$arrset[13];

$branch_control=$arrset[14];

$g_1=$arrset[15];

$set_wa=$arrset[16];
$set_in=$arrset[17];


$cwp1=$arrset[18];
$cwp11=$arrset[19];
$cwp2=$arrset[20];
$cwp22=$arrset[21];
$cwp3=$arrset[22];
$cwp33=$arrset[23];
$cwp4=$arrset[24];
$cwp44=$arrset[25];

$box_set=$arrset[26];

$other_set=$arrset[27];


$stock_issu_new=1;

$stock_issu_customer=1;

$suspension=1;
$walk=2;

$auto_payment=12;
$s_sheet=1;

$g_active=1;
$go_show=1;








$address_off=0;





?>