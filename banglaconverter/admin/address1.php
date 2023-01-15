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
";



if($shop_mobile==1)
{
print"
<tr>
<td height='10'> </td>
</tr>

<tr>
<td width='50'>  </td>

<td align='left' width='200'> <img src='banner//$shop_name' width='200' height='60'> </td>

<td width='30'>  </td>

<td align='left' valign='top'>
<table align='center' width='780' cellpadding='0' height='0' cellspacing='0' bgcolor=''>
<tr>
<td align='left'>


 $shop_address 

";


print"
<br>
</td>
</tr>
";


print"
</table>

</td>
<tr>

";


}

else
{

print"
<tr>
<td height='10'> </td>
</tr>


<tr>
<td align='left' width='1000'> <img src='banner//$shop_name' width='1000' height='100'> </td>
</tr>


";	
}





print"

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