<?php



$axr=1;

$sql="SELECT * FROM `address` WHERE user_id='$axr' ";


$result=mysql_query($sql);
$arrar1=mysql_fetch_array($result);

$shop_name=$arrar1[1];
$shop_mobile=$arrar1[2];
$shop_email=$arrar1[3];
$shop_address=$arrar1[4];



//print" $shop_mobile   <br>  $shop_email  <br>  $shop_address ";

if($set_pad!=1)
{
print"
<table align='center' width='1000' cellpadding='0' height='0' cellspacing='0' bgcolor=''>
<tr>


<tr>
<td height='20'> </td>
</tr>


<td width='100'>  </td>

<td align='left' width='200'> <img src='banner//$shop_name' width='200' height='60'> </td>

<td width='20'>  </td>

<td align='left'>
<table align='center' width='750' cellpadding='0' height='0' cellspacing='0' bgcolor=''>
<tr>
<td align='left'>

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<font face='arial' size='6'> <b> $shop_address </b>
</font>
<font face='arial' size='4'> <br>  $shop_mobile </font>
<br>
<font face='arial' size='4'>

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
 $shop_email
</font>

<font color='red' size='4'>  </font>
<br>


</td>
</tr>
</table>

</td>
</tr>


<tr>
<td align='center' height='18'>
</td>
</tr>
</table>
";



}


/*
print"
<table align='center' width='1000' cellpadding='0' height='0' cellspacing='0' bgcolor=''>
<tr>
<td align='center'>
<img src='banner.gif' width='1000'>
</td>
</tr>


<tr>
<td align='center' height='8'>
</td>
</tr>
</table>
";
*/




?>