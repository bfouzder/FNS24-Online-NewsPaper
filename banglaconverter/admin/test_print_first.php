<?php

include_once('dbconnection.php');

print"
<html>
<head>
<title>
Testing
</title>

<style>

@media all {
	.page-break	{ display: none; }
}

@media print {
	.page-break	{ display: block; page-break-before: always; }
}

</style>
</head>


<body>
";
include_once('address1.php');


for($i=1;$i<=60;$i++)
{
$k++;

if($k==1)
{
print" 
<table align='center' width='500' cellpadding='0' cellspacing='1' bgcolor='black'>

<tr bgcolor='white'>
<td>
Name Counting
</td>
</tr>
";


}
print"
<tr bgcolor='white'>
<td>
$i 
</td>
</tr>
";


if($k==50)
{
print"
</table>
";
}



if($k==50)
{
print"
<div class='page-break'>
";

include_once('address.php');

print"
</div>
";
$k=0;
}

}


print"

</body>

</html>




";

?>