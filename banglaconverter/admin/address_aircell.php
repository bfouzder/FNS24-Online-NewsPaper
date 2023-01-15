<?php



$axr=1;

$sql="SELECT * FROM `address` WHERE user_id='$axr' ";


$result=mysql_query($sql);
$arrar1=mysql_fetch_array($result);

$shop_name=$arrar1[1];
$shop_mobile=$arrar1[2];
$shop_email=$arrar1[3];
$shop_address=$arrar1[4];



print"

<table align='center' width='1000' cellpadding='5' height='600' cellspacing='0' bgcolor='#FAF1F1'>
<tr>
<td valign='top'>

<table align='center' width='1000' cellpadding='0' cellspacing='0'>

<tr> 

<td width='200' valign='top'> 
<table align='center' width='200' cellpadding='0' cellspacing='0'>
<tr> <td height='10'> </td> </tr>
<tr>
<td align='center'>
<img src='logo.jpg' width='200' height='90'>
</td>
</tr>
</table>
 </td>

 <td width='100'> </td>
 
<td align='center' valign='top'> 
<table align='center' width='700' cellpadding='0' cellspacing='0'>
<tr> <td align='left'> <font face='solaimanlipi' size='6' color='3F3D3D'> <b> Aircell Communication Limited </b> </font> </td></tr>
<tr> <td align='left'> <font face='solaimanlipi' size='3'>  8/68 (8th Floor), Gulistan Shopping Complex, 2, Bangha Bondhu Avenu, Gulistan, </font> </td></tr>
<tr> <td align='left'> <font face='solaimanlipi' size='3'>  Dhaka-1000. Telefax: + 88 02 9585449, Hotline, 01842 447707, 01971 447707  </font> </td></tr>

<tr> <td align='left'> <font face='solaimanlipi' size='3'>  01617 - 447707. Email: aircell_acl@yahoo.com, Web: www.aircell-bd.com  </font> </td></tr>


</table>
</td>


</tr>

</table>




<br>
";

?>