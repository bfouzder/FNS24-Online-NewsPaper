<?php
include_once('dbconnection.php');
session_start();

//$cw=trim($_POST['cw'.$j]);



$i=111;
$j=212;

$new_val=1234;

$_SESSION['co1'.$new_val]="abcd";


$user_1=$_SESSION['co1'.$new_val];

print" Before $user_1 <br>";
unset($_SESSION['co1'.$new_val]);

$user_1=$_SESSION['co1'.$new_val];


print" After $user_1";





?>