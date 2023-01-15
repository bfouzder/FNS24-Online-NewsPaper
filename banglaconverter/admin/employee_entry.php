<?php

include_once('dbconnection.php');




$deg_name=trim($_POST['deg_name']);
$teacher_name=trim($_POST['teacher_name']);
$father_name=trim($_POST['father_name']);
$mother_name=trim($_POST['mother_name']);
$mobile_number=trim($_POST['mobile_number']);
$teacher_id=trim($_POST['teacher_id']);

$voter_id=trim($_POST['voter_id']);

$salary=trim($_POST['salary']);

$em_type=trim($_POST['em_type']);



$email=trim($_POST['email']);
$address=trim($_POST['address']);
$qualification=trim($_POST['qualification']);
$comments=trim($_POST['comments']);


$jdat=trim($_POST['jdat']);
$jmon=trim($_POST['jmon']);
$jyer=trim($_POST['jyer']);




//print" $deg_name  - $teacher_name - $father_name - $mother_name - $mobile_number - $teacher_id - $email - $address - $qualification - $comments  ";




$sql="SELECT * FROM `designation` WHERE user_id='$deg_name' ";
$result=mysql_query($sql);
$arrg=mysql_fetch_array($result);
$deg=$arrg[1];




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

$v=1;

$sql = "INSERT INTO `teacher_profile` (`user_id`, `deg_name`, `teacher_name`, `father_name`, `mother_name`, `mobile_number`, `teacher_id`, `email`, `address`, `picture`, `qualification`, `comments`, `jdat`, `jmon`, `jyer`, `active`, `voter_id`, `type`) VALUES ('','$deg_name','$teacher_name','$father_name','$mother_name','$mobile_number','$teacher_id','$email','$address','$addpicture','$qualification','$comments','$jdat','$jmon','$jyer','$v','$voter_id','$em_type')";
mysql_query($sql);


if($addpicture!="")
{
copy($_FILES['addpicture']['tmp_name'], "$upload_dir/$addpicture") or die("Couldn't copy");
}



include_once('s.php');
}
else
{
include_once('w.php');
}
}
















print"

<html>

<head>
<title> New Employee Entry </title>
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



<form enctype='multipart/form-data' action='employee_entry.php' method='POST'>


<table align='center' width='400' cellpadding='0' cellspacing='0'>
<tr> <td height='20'>  </td> </tr>
</table>



<table align='center' width='700' cellpadding='0' cellspacing='0'>
<tr> <td align='center' height='28' bgcolor='#7087A3' id='tda'>  <font face='arial' color='white' size='2'> <b> New Employee Entry  </b> </font> </td> </tr>
</table>


<table align='center' width='700' cellpadding='0' cellspacing='0' bgcolor='F2F2F2'>
<tr> 
<td align='center' height='20' bgcolor=''> 




<table align='center' width='550' cellpadding='0' cellspacing='0' bgcolor='F2F2F2'>
<tr> <td align='center' height='20' bgcolor=''>   </td> <td> </td> </tr>

";


print"


<tr> 
     <td height='20' bgcolor='' align='left' width='220'> <font face='arial' size='2'> Add Picture  </font>   </td>
     <td align='left' width='330'> : <input type='file' id='qd1' name='addpicture'> </td> 
</tr>

";

print"
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
     <td height='20' bgcolor='' align='left'> <font face='arial' size='2'>  Name  </font>   </td>
     <td align='left'> : <input type='text' id='q1_new' name='teacher_name'> </td> 
</tr>


<tr> <td height='10'> </td> </tr>









<tr> 
     <td height='20' bgcolor='' align='left'> <font face='arial' size='2'> Father's Name  </font>   </td>
     <td align='left'> : <input type='text' id='q1_new' name='father_name'> </td> 
</tr>


<tr> <td height='10'> </td> </tr>


<tr> 
     <td height='20' bgcolor='' align='left'> <font face='arial' size='2'> Mother's Name  </font>   </td>
     <td align='left'> : <input type='text' id='q1_new' name='mother_name'> </td> 
</tr>


<tr> <td height='10'> </td> </tr>



<tr> 
     <td height='20' bgcolor='' align='left'> <font face='arial' size='2'> Mobile Number  </font>   </td>
     <td align='left'> :  <input type='text' id='q1_new' name='mobile_number'> </td> 
</tr>


<tr> <td height='10'> </td> </tr>







<tr> 
     <td height='20' bgcolor='' align='left'> <font face='arial' size='2'> Designation   </font>   </td>
     <td align='left'> : <input type='text' id='q1_new' name='deg_name'> </td> 
</tr>


<tr> <td height='10'> </td> </tr>











<tr> 
     <td height='20' bgcolor='' align='left'> <font face='arial' size='2'> Employee ID  </font>   </td>
     <td align='left'> :  <input type='text' id='q1_new' name='teacher_id'> </td> 
</tr>


<tr> <td height='10'> </td> </tr>



<tr> 
     <td height='20' bgcolor='' align='left'> <font face='arial' size='2'> Joining Date  </font>   </td>
     <td align='left'> :

<select name='jdat'>
<option>$dat</option>
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
<option>$mon</option>
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
<option>$yer</option>

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


<tr> <td height='10'> </td> </tr>


<tr> 
     <td height='20' bgcolor='' align='left'> <font face='arial' size='2'> Voter ID  </font>   </td>
     <td align='left'> : <input type='text' id='q1_new' name='voter_id'> </td> 
</tr>


<tr> <td height='10'> </td> </tr>






<tr> 
     <td height='20' bgcolor='' align='left'> <font face='arial' size='2'> Email  </font>   </td>
     <td align='left'> : <input type='text' id='q1_new' name='email'> </td> 
</tr>


<tr> <td height='10'> </td> </tr>





<tr> 
     <td height='20' bgcolor='' align='left' valign='top'> <font face='arial' size='2'> Present And Permanent Address  </font>   </td>
     <td align='left'> : <textarea id='q2' name='address'> </textarea> </td> 
</tr>


<tr> <td height='10'> </td> </tr>




<tr> 
     <td height='20' bgcolor='' align='left' valign='top'> <font face='arial' size='2'> Education Qualification  </font>   </td>
     <td align='left'> : <textarea id='q2' name='qualification'> </textarea> </td> 
</tr>


<tr> <td height='10'> </td> </tr>






<tr> 
     <td height='20' bgcolor='' align='left' valign='top'> <font face='arial' size='2'> Comments  </font>   </td>
     <td align='left' valign='top'> : <textarea id='q2' name='comments'> </textarea> </td> 
</tr>


<tr> <td height='10'> </td> </tr>



<tr> 
     <td height='20' bgcolor='' align='left'> <font face='arial' size='2'> Monthly Salary  </font>   </td>
     <td align='left'> : <input type='text' id='q1_new' name='salary'> </td> 
</tr>


<tr> <td height='10'> </td> </tr>





<tr> 
     <td height='20' bgcolor='' align='right' valign='top'>   </td>
     <td align='left'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

<input type='hidden'  name='ser' value='1'>
<input type='hidden'  name='pas' value='$pas'>

 <input type='Submit' id='qq' value='Save'>  


</td> </tr></td> 
</tr>






<tr> <td align='center' height='30' bgcolor=''>   </td> <td> </td> </tr>

</table>



</td>
</tr>
</table>



<table align='center' width='700' cellpadding='0' cellspacing='0'>
<tr> <td align='center' height='28' bgcolor='#7087A3' id='tdt'>  <font face='arial' color='white' size='2'> <b>   </b> </font> </td> </tr>
</table>




</form>




</td>


</tr>
</table>




</body>

</html>


";


?>