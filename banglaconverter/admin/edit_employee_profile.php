<?php

include_once('dbconnection.php');



$ser=trim($_POST['ser']);
$s=trim($_POST['s']);

$sl=trim($_POST['sl']);




if($ser==1)

{

$deg_name=trim($_POST['deg_name']);
$teacher_name=trim($_POST['teacher_name']);
$father_name=trim($_POST['father_name']);
$mother_name=trim($_POST['mother_name']);
$mobile_number=trim($_POST['mobile_number']);
$teacher_id=trim($_POST['teacher_id']);

$voter_id=trim($_POST['voter_id']);
$salary=trim($_POST['salary']);


$email=trim($_POST['email']);
$address=trim($_POST['address']);
$qualification=trim($_POST['qualification']);
$comments=trim($_POST['comments']);

$jdat=trim($_POST['jdat']);
$jmon=trim($_POST['jmon']);
$jyer=trim($_POST['jyer']);


$active=trim($_POST['active']);



$em_type=trim($_POST['em_type']);


//print" $deg_name  - $teacher_name - $father_name - $mother_name - $mobile_number - $teacher_id - $email - $address - $qualification - $comments  ";









$addpicture= $_FILES['addpicture']['name'];




$addpicturet= time().$addpicture['name'];

$fnn = $_FILES['addpicture']['type'];




$ii="$fnn";

$jj="image/jpeg";

$jj1="image/gif";




if($ii==$jj)
{
$addpicture="$addpicturet.jpg";
}





if($ii==$jj1)
{
$addpicture="$addpicturet.gif";
}




$upload_dir="employee";



$ser=trim($_POST['ser']);




if($ser==1)
{

if($teacher_name!="" && $deg_name!="")
{


$sql= "UPDATE  `teacher_profile` SET `deg_name`='$deg_name' WHERE `user_id`='$s'";
mysql_query($sql);

$sql= "UPDATE  `teacher_profile` SET `teacher_name`='$teacher_name' WHERE `user_id`='$s'";
mysql_query($sql);


$sql= "UPDATE  `teacher_profile` SET `father_name`='$father_name' WHERE `user_id`='$s'";
mysql_query($sql);


$sql= "UPDATE  `teacher_profile` SET `mother_name`='$mother_name' WHERE `user_id`='$s'";
mysql_query($sql);


$sql= "UPDATE  `teacher_profile` SET `mobile_number`='$mobile_number' WHERE `user_id`='$s'";
mysql_query($sql);


$sql= "UPDATE  `teacher_profile` SET `teacher_id`='$teacher_id' WHERE `user_id`='$s'";
mysql_query($sql);


$sql= "UPDATE  `teacher_profile` SET `email`='$email' WHERE `user_id`='$s'";
mysql_query($sql);


$sql= "UPDATE  `teacher_profile` SET `address`='$address' WHERE `user_id`='$s'";
mysql_query($sql);





$sql= "UPDATE  `teacher_profile` SET `qualification`='$qualification' WHERE `user_id`='$s'";
mysql_query($sql);


$sql= "UPDATE  `teacher_profile` SET `comments`='$comments' WHERE `user_id`='$s'";
mysql_query($sql);





$sql= "UPDATE  `teacher_profile` SET `jdat`='$jdat' WHERE `user_id`='$s'";
mysql_query($sql);
$sql= "UPDATE  `teacher_profile` SET `jmon`='$jmon' WHERE `user_id`='$s'";
mysql_query($sql);


$sql= "UPDATE  `teacher_profile` SET `jyer`='$jyer' WHERE `user_id`='$s'";
mysql_query($sql);



$sql= "UPDATE  `teacher_profile` SET `voter_id`='$voter_id' WHERE `user_id`='$s'";
mysql_query($sql);

$sql= "UPDATE  `teacher_profile` SET `salary`='$salary' WHERE `user_id`='$s'";
mysql_query($sql);



$sql= "UPDATE  `teacher_profile` SET `active`='$active' WHERE `user_id`='$s'";
mysql_query($sql);



$sql= "UPDATE  `teacher_profile` SET `type`='$em_type' WHERE `user_id`='$s'";
mysql_query($sql);



$sql= "UPDATE  `teacher_profile` SET `sl`='$sl' WHERE `user_id`='$s'";
mysql_query($sql);



if($addpicture!="")
{

$sql= "UPDATE  `teacher_profile` SET `picture`='$addpicture' WHERE `user_id`='$s'";
mysql_query($sql);

copy($_FILES['addpicture']['tmp_name'], "$upload_dir/$addpicture") or die("Couldn't copy");
}



include_once('s.php');
}
else
{
include_once('w.php');
}
}


}









if($ser==10 || $ser==1)
{


$sql="SELECT * FROM `teacher_profile` WHERE user_id='$s' ";
$result=mysql_query($sql);
$arrt=mysql_fetch_array($result);



$deg_name=$arrt[1];
$teacher_name=$arrt[2];
$father_name=$arrt[3];
$mother_name=$arrt[4];
$mobile_number=$arrt[5];
$teacher_id=$arrt[6];
$email=$arrt[7];
$address=$arrt[8];
$picture=$arrt[9];
$qualification=$arrt[10];
$comments=$arrt[11];

$jdat=$arrt[12];
$jmon=$arrt[13];
$jyer=$arrt[14];

$acc=$arrt[15];

$sl=$arrt[16];
$voter_id=$arrt[17];

$salary=$arrt[18];

$em_type=$arrt[19];



if($acc==1)
{
$chh="Checked";
}






}








if($em_type==1)
{
$em_typen="Head Office";
}

if($em_type==2)
{
$em_typen="Factory";
}








print"

<html>

<head>
<title> Edit Employee Entry </title>
";


include_once('style.php');



print"


<style>

#category

{

width:180px;	
}

</style>

</head>


<body>
";


include_once('header2.php');


print"
<table align='center' width='1200' cellpadding='0' cellspacing='1' height='800' bgcolor='gray'>
<tr bgcolor='white'> 
<td align='center' valign='top' width='220' bgcolor='#C5B991'>  

<table align='center' width='200' cellpadding='0' cellspacing='0' height=''>

<tr> <td height='10'> </td></tr>


<tr> <td height='30' width='200' bgcolor='green'>   <span id='child'> <b> <font color='white'>Create</font> </b> </span>  </td></tr>

<tr> <td height='7'> </td></tr>





";


include_once('create_left.php');


print"

<td align='center' valign='top' width='980'>  


<br>
<br>


<form  enctype='multipart/form-data' action='edit_employee_profile.php' method='POST'>

<table align='center' width='700' cellpadding='0' cellspacing='0'>
<tr> <td align='center' height='28' bgcolor='#7087A3' id='tda'>  <font face='arial' color='white' size='2'> <b> Edit Profile  </b> </font> </td> </tr>
</table>












<table align='center' width='700' cellpadding='' cellspacing='0' bgcolor='F2F2F2'>
<tr> 
<td align='center' height='20' bgcolor='' valign='top'> 




<table align='center' width='550' cellpadding='' cellspacing='0' bgcolor='F2F2F2'>
<tr> <td align='center' height='20' bgcolor=''>   </td> <td> </td> </tr>
";



print"



<tr> 
     <td height='20' bgcolor='' align='left' width='220'> <font face='arial' size='2'> Add Picture  </font>   </td>
     <td align='left' width='330'>   <img src='employee/$picture' width='50' height='55'> <input type='file' id='qd1' name='addpicture'> </td> 
</tr>


<tr> <td height='10'> </td> </tr>


<tr> 
     <td height='20' bgcolor='' align='left'> <font face='arial' size='2'> Select Office / Factory  </font>   </td>
     <td align='left'> :  


<select name='em_type'>

<option value='$em_type'>$em_typen</option>

<option value='0'>All</option>
<option value='1'>Head Office</option>
<option value='2'>Factory</option>

</select>

 </td> 
</tr>


<tr> <td height='10'> </td> </tr>






<tr> 
     <td height='20' bgcolor='' align='left'> <font face='arial' size='2'> Name </font>   </td>
     <td align='left'> :  <input type='text' id='q1_new' name='teacher_name' value='$teacher_name'> </td> 
</tr>


<tr> <td height='10'> </td> </tr>









<tr> 
     <td height='20' bgcolor='' align='left'> <font face='arial' size='2'> Father's Name </font>   </td>
     <td align='left'> :  <input type='text' id='q1_new' name='father_name' value='$father_name'> </td> 
</tr>


<tr> <td height='10'> </td> </tr>


<tr> 
     <td height='20' bgcolor='' align='left'> <font face='arial' size='2'> Mother's Name  </font>   </td>
     <td align='left'> : <input type='text' id='q1_new' name='mother_name' value='$mother_name'> </td> 
</tr>


<tr> <td height='10'> </td> </tr>



<tr> 
     <td height='20' bgcolor='' align='left'> <font face='arial' size='2'> Mobile Number  </font>   </td>
     <td align='left'> : <input type='text' id='q1_new' name='mobile_number' value='$mobile_number'> </td> 
</tr>


<tr> <td height='10'> </td> </tr>



<tr> 
     <td height='20' bgcolor='' align='left'> <font face='arial' size='2'> Designation   </font>   </td>
     <td align='left'> : <input type='text' id='q1_new' name='deg_name' value='$deg_name'> </td> 
</tr>


<tr> <td height='10'> </td> </tr>






<tr> 
     <td height='20' bgcolor='' align='left'> <font face='arial' size='2'> Employee ID  </font>   </td>
     <td align='left'> : <input type='text' id='q1_new' name='teacher_id' value='$teacher_id'> </td> 
</tr>



<tr> <td height='10'> </td> </tr>


<tr> 
     <td height='20' bgcolor='' align='left'> <font face='arial' size='2'> Joining Date  </font>   </td>
     <td align='left'> :

<select name='jdat'>
<option>$jdat</option>
<option>01</option>
<option>01</option>
<option>02</option>
<option>03</option>
<option>04</option>
<option>05</option>
<option>06</option>
<option>07</option>
<option>08</option>
<option>09</option>
<option>10</option>
<option>11</option>
<option>12</option>
<option>13</option>
<option>14</option>
<option>15</option>
<option>16</option>
<option>17</option>
<option>18</option>
<option>19</option>
<option>20</option>
<option>21</option>
<option>22</option>
<option>23</option>
<option>24</option>
<option>25</option>
<option>26</option>
<option>27</option>
<option>28</option>
<option>29</option>
<option>30</option>
<option>31</option>
</select>


<select name='jmon'>
<option>$jmon</option>
<option>01</option>
<option>01</option>
<option>02</option>
<option>03</option>
<option>04</option>
<option>05</option>
<option>06</option>
<option>07</option>
<option>08</option>
<option>09</option>
<option>10</option>
<option>11</option>
<option>12</option>

</select>


<select name='jyer'>
<option>$jyer</option>
<option>2000</option>
<option>2001</option>
<option>2002</option>
<option>2003</option>
<option>2004</option>
<option>2005</option>
<option>2006</option>
<option>2007</option>
<option>2008</option>
<option>2009</option>
<option>2010</option>
<option>2011</option>
<option>2012</option>
<option>2013</option>
<option>2014</option>
<option>2015</option>
<option>2016</option>
<option>2017</option>
<option>2018</option>
<option>2019</option>
<option>2020</option>
</select>

</td>
</tr>

";

print"
<tr> <td height='10'> </td> </tr>

<tr> 
     <td height='20' bgcolor='' align='left'> <font face='arial' size='2'> Voter ID  </font>   </td>
     <td align='left'> : <input type='text' id='q1_new' name='voter_id' value='$voter_id'> </td> 
</tr>


<tr> <td height='10'> </td> </tr>




<tr> 
     <td height='20' bgcolor='' align='left'> <font face='arial' size='2'> Email </font>   </td>
     <td align='left'> :  <input type='text' id='q1_new' name='email' value='$email'> </td> 
</tr>


<tr> <td height='10'> </td> </tr>





<tr> 
     <td height='20' bgcolor='' align='left' valign='top'> <font face='arial' size='2'> Permanent And Present Address  </font>   </td>
     <td align='left'> : <textarea id='q2' name='address'>$address</textarea> </td> 
</tr>


<tr> <td height='10'> </td> </tr>















<tr> 
     <td height='20' bgcolor='' align='left' valign='top'> <font face='arial' size='2'> Education Qualification </font>   </td>
     <td align='left'> :  <textarea id='q2' name='qualification'>$qualification</textarea> </td> 
</tr>


<tr> <td height='10'> </td> </tr>






<tr> 
     <td height='20' bgcolor='' align='left' valign='top'> <font face='arial' size='2'> Comments </font>   </td>
     <td align='left'> :  <textarea id='q2' name='comments'>$comments</textarea> </td> 
</tr>


<tr> <td height='10'> </td> </tr>



<tr> 
     <td height='20' bgcolor='' align='right'> <font face='arial' size='2'> Active / Inactive </font>   </td>
     <td align='left'> : <input type='checkbox' name='active'  $chh value='1'> </td> 
</tr>


<tr> <td height='10'> </td> </tr>


<tr> 
     <td height='20' bgcolor='' align='right'> <font face='arial' size='2'> SL </font>   </td>
     <td align='left'> : <input type='text' name='sl' value='$sl'> </td> 
</tr>


<tr> <td height='10'> </td> </tr>








<tr> 
     <td height='20' bgcolor='' align='left'> <font face='arial' size='2'> Monthly Salary  </font>   </td>
     <td align='left'> : <input type='text' id='q1_new' name='salary' value='$salary'> </td> 
</tr>


<tr> <td height='10'> </td> </tr>











<tr> 

<td height='20' bgcolor='' align='right' valign='top'>   </td>
<td align='left'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

<input type='hidden'  name='ser' value='1'>
<input type='hidden'  name='pas' value='$pas'>
<input type='hidden'  name='s' value='$s'>


<input type='Submit' id='qq' value='Save'>  


</td> </tr></td> 
</tr>



<tr> <td align='center' height='20' bgcolor=''>   </td> <td> </td> </tr>

</table>

</td>
</tr>
</table>






<table align='center' width='700' cellpadding='0' cellspacing='0'>
<tr> <td align='center' height='28' bgcolor='#7087A3' id='tdt'>  <font face='arial' color='white' size='2'> <b>   </b> </font> </td> </tr>
</table>










</td>
</tr>
</table>



</form>


</td>


</tr>
</table>




</body>

</html>


";


?>