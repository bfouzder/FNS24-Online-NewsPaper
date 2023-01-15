<?php
//include_once('dbconnection.php');

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





$ser=trim($_POST['ser']);
session_start();


$user_name=trim($_POST['user_name']);
$ser=trim($_POST['ser']);
$password=trim($_POST['password']);

$go=trim($_POST['go']);


if($ser=="")
{
session_destroy();
}



if($ser=="")
{
  //include_once("../index.php");

//header("Location: http://74.91.27.230//~ssss//index.php");
//exit;
}


$go=1;

if($go==1)

{


if($ser==1)
{

$sql="SELECT * FROM `create_password` WHERE user_name='$user_name' && password='$password' ";


$result=mysqli_query($con_db,$sql);
$arr=mysqli_fetch_array($result);

$user_name1=$arr[3];
$password1=$arr[4];


$u_namee=$arr[1];
$pas_type=$arr[7];



$ae=1;

if($user_name1=="")
{
include_once('www.php');
$ae=0;
}

if($ae==1)
{


if($user_name1!=$user_name && $password1!=$password)
{

include_once('w.php');
$ae=0;

}


}






if($ae==1)
{

$_SESSION['color1']="$user_name";
$_SESSION['color2']="$password";

//include_once('create.php');


$nii="c4";
include_once("index5.php");


  //header("Location: http://74.91.27.230//~ssss//$nii/create.php");


exit;
}


}




}








if($go==2)

{



$link=mysql_connect($host,$dbuser,$pw)or die("could not connect mysql".mysql_error());
if($link)
{
mysql_select_db($db)or die("could not connect databasae $db".mysql_error());
}

if($ser==1)
{

$sql="SELECT * FROM `create_password` WHERE user_name='$user_name' && password='$password' ";


$result=mysql_query($sql);
$arr=mysql_fetch_array($result);

$user_name1=$arr[3];
$password1=$arr[4];


$u_namee=$arr[1];
$pas_type=$arr[7];



$ae=1;

if($user_name1=="")
{
include_once('www.php');
$ae=0;
}

if($ae==1)
{


if($user_name1!=$user_name && $password1!=$password)
{

include_once('w.php');
$ae=0;

}


}



if($ae==1)
{



$_SESSION['color1']="$user_name";
$_SESSION['color2']="$password";


include_once("index.php");

//header('Location: http://74.91.27.226//~ssss/rv//create.php');

exit;
}


}




}












?>


<!DOCTYPE html>
 <html lang="en"> <!--<![endif]-->
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <title> Login  </title>
  <link rel="stylesheet" href="css/style.css">

  
  
  <script>
window.location.hash="no-back-button";
window.location.hash="Again-No-back-button";//again because google chrome don't insert first hash into history
window.onhashchange=function(){window.location.hash="no-back-button";}
</script>


<style>

A:link {
    FONT-WEIGHT: normal; FONT-SIZE: 16px; COLOR: black; FONT-STYLE: normal; FONT-FAMILY: Arial; TEXT-DECORATION: none;
}

A:visited {
    FONT-WEIGHT: normal; FONT-SIZE: 16px; COLOR: black; FONT-STYLE: normal; FONT-FAMILY:  Arial; TEXT-DECORATION: none
}
A:active {
    FONT-WEIGHT: normal; FONT-SIZE: 16px; COLOR: black; FONT-STYLE: normal; FONT-FAMILY: Arial; TEXT-DECORATION: none;
}
A:hover {
    FONT-WEIGHT: normal; FONT-SIZE: 16px; COLOR: black; FONT-STYLE: normal; FONT-FAMILY: Arial; TEXT-DECORATION: underline;
}


</style>
  
</head>
<body>
<br>
<br>

<br><br><br>


  <form action="index.php" class="login" method='POST'>
    <h1>

<BR>

Fns Converter Admin

<BR> </h1>


<?php

/*
print"

<select name='go' class='login-input'>
<option> </option>
";


$result = mysql_query("SELECT * FROM `godawn`  ORDER BY `user_id` ASC ");



while ($a_row = mysql_fetch_row($result)) {

	foreach ($a_row as $field) {
		
	}
print"
	<option value='$a_row[0]'> $a_row[1]  - Address  $a_row[2]  </option>
";

}


print"
</select>

";
*/


?>


    <input type="" name="user_name" class="login-input" placeholder="User Name" autofocus>

    <input type="password" name="password" class="login-input" placeholder="Password">
	
	<input type='hidden' name='ser' value='1'>
	
	
<input type="submit" value="Login" class="login-submit">


<marquee> <font color='white'> Help: <a href='http://dynamicsolutionit.com/index.php' target='_blank'> <font color='white'>  Dynamic Solution IT </font> </a>

& <a href='http://dynamicscalebd.com/index.php' target='_blank'> <font color='white'>  Dynamic Scale BD </font> </a>
 </font> </marquee>
 
 
 
  </form>




</body>
</html>

<?php

?>
