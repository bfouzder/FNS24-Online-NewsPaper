<?php


include_once('dbconnection.php');

$branch_name=trim($_POST['branch_name']);
$branch_address=trim($_POST['branch_address']);


$ser=trim($_POST['ser']);

/*
$sender=trim($_POST['sender']);
$msg=trim($_POST['msg']);
$sendto=trim($_POST['to']);
*/



$spp=1;

$sql="SELECT * FROM `sms_p` WHERE user_id='$spp'";
$result=mysql_query($sql);
$arr_sp=mysql_fetch_array($result);

$sp_user=$arr_sp[1];
$sp_pass=$arr_sp[2];




    $res=0;

     $res_new=0;











if($ser==1)
{


if($set_sms==1)
	
	{

$bbb=time(); 

$d=date("m/d/y",$bbb); 

$mon="$d[0]$d[1]";
$dat="$d[3]$d[4]";
$yer="20$d[6]$d[7]";


$adat="$yer$mon$dat";


//print"$lp - $toty ";



$sender = urlencode($_POST["sender"]);
$sendto = $_POST["to"];

$msg =trim($_POST['msg']);

//print"$msg  <br>";

$msg=urlencode("$msg");


//print"$msg";

/*
$url='http://193.105.74.59/api/sendsms/plain?user=forhadalam&password=KeZlv6uU&sender='.$sender.'&SMSText='.$msg.'&GSM='.$sendto.'';
*/


$url='http://193.105.74.59/api/sendsms/plain?user='.$sp_user.'&password='.$sp_pass.'&sender='.$sender.'&SMSText='.$msg.'&GSM='.$sendto.'';

		
$curl = curl_init();
 
curl_setopt_array($curl, array(
    CURLOPT_RETURNTRANSFER => 1,
    CURLOPT_URL =>$url,
    CURLOPT_USERAGENT =>'jadukor IT Browser'
));
 
$resp = curl_exec($curl);
 
curl_close($curl);
 
if($resp > 0) {
  //echo 'SMS sent . Delivery id is '.$resp.'';

$res=1;
$res_new++;

$sql = "INSERT INTO `sms_count` (`user_id`, `mobile`, `dat`, `mon`, `yer`, `adat`, `det`, `active`) VALUES ('','$sendto','$dat','$mon','$yer','$adat','$msg','$res')";
mysql_query($sql);

} else {
    // echo 'not sent ,error code is '.$resp.'';
$res=0;
$sql = "INSERT INTO `sms_count` (`user_id`, `mobile`, `dat`, `mon`, `yer`, `adat`, `det`, `active`) VALUES ('','$sendto','$dat','$mon','$yer','$adat','$msg','$res')";
mysql_query($sql);
}


  











if($res_new>=1)
{
include_once('send.php');
}



}


}





//print"$branch_name  -  $branch_address";

/*
if($ser==1)
{

if($branch_name!="" && $branch_address!="")
{

$sql = "INSERT INTO `branch` (`user_id`, `branch_name`, `branch_address`) VALUES ('','$branch_name','$branch_address')";
mysql_query($sql);

include_once('s.php');
}
else
{
include_once('w.php');
}
}

*/

print"

<html>

<head>
<title> Sms status </title>
<meta http-equiv='content-type' content='text/html;charset=utf-8' />

";


include_once('style.php');


print"
</head>


<body>
";


include_once('header.php');


print"
<table align='center' width='1200' cellpadding='0' cellspacing='0' height='800' bgcolor='gray'>
<tr bgcolor='white'> 
";

//include_once('sms_left.php');












print"
<td align='center' valign='top' width='980'>  






<form action='sms.php' method='POST'>

<table align='center' width='1000' cellpadding='0' cellspacing='0' bgcolor='cccccc'>
<tr bgcolor='white'> 

<td align='center' width='210' height='400' valign='top'> 

<table align='center' width='200' cellpadding='3' cellspacing='0'>


<tr>
<td height='25'>  </td>
</tr>
";



//include_once('left-link2.php');





print"

<tr bgcolor=''>
<td height='25' align='left'>  </td>
</tr>





</table>

</td>





";

///////////////////////////////////////////////////////////////////////////////////

print"

  
<td align='center' width='790' valign='top'> 

<table align='center' width='700' cellpadding='0' cellspacing='0'>




<tr>
<td align='center' height='50'>
</tr>


<tr>
<td align='center' height='50'>





<table align='center' width='700' cellpadding='0' cellspacing='0'>
<tr> 
<td align='center' height='28' bgcolor='#7087A3' id='tda'> <a href='sms.php'> <font face='arial' size='2' color='white'>  <b> Menual Sms </b> </font> </a> </td>
<td width='5'> </td>
<td align='center' height='28' bgcolor='' id=''>   </td>
<td width='5'> </td>
<td align='center' height='28' bgcolor='#7087A3' id='tda'> <a href='#'> <font face='arial' size='2'  color='white'> <b>   </b> </font></a> </td>
<td width='5'> </td>
";
/*
<td align='center' height='28' bgcolor='#7087A3' id='tda'> <a href='sms_result.php'> <font face='arial' size='2'  color='white'>  <b> Result Sms </b> </font> </a> </td>
*/
print"
</tr>
</table>


<br>









<table align='center' width='700' cellpadding='0' cellspacing='0' bgcolor='F2F2F2'>
<tr> <td align='center' height='20' bgcolor=''>   </td> <td> </td> </tr>

";



print"

<tr> 
     <td height='20' bgcolor='' align='right'> <font face='arial' size='2'> Title name: </font>   </td>
     <td align='left'>&nbsp; <input type='text' size='50' name='sender'> </td> 
</tr>


<tr> <td height='10'> </td> </tr>


<tr> 
     <td height='20' bgcolor='' align='right' valign='top'> <font face='arial' size='2'> Message: </font>   </td>
     <td align='left'>&nbsp; <textarea rows='10' cols='58' name='msg'></textarea> </td> 
</tr>


<tr> <td height='10'> </td> </tr>



<tr> 
     <td height='20' bgcolor='' align='right' valign='top'> <font face='arial' size='2'> Number: </font>   </td>
     <td align='left'>&nbsp; <textarea rows='10' cols='58' name='to'></textarea> </td> 
</tr>


<tr> <td height='10'> </td> </tr>




<tr> 
     <td height='20' bgcolor='' align='right' valign='top'>   </td>
     <td align='left'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

<input type='hidden'  name='ser' value='1'>
<input type='hidden'  name='pas' value='$pas'>
<input type='Submit' id='qq' value='Send'>  

</td> </tr></td> 
</tr>



<tr> <td align='center' height='20' bgcolor=''>   </td> <td> </td> </tr>

</table>






<table align='center' width='700' cellpadding='0' cellspacing='0'>
<tr> <td align='center' height='28' bgcolor='#7087A3' id='tdt'>  <font face='arial' color='white' size='2'> <b>   </b> </font> </td> </tr>
</table>

</form>

";






















print"


</td>
</tr>

</table>

</td>  



</tr>
</table>

";





print"

</td>


</tr>
</table>




</body>

</html>


";


?>