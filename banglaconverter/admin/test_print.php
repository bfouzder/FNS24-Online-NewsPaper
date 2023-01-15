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




print"
<table align='center'>
<tr>
<td>
Page1
</td>
</tr>
</table>
<div class='page-break'>
</div>
";


print"
<table>
<tr>
<td>
Page2
</td>
</tr>
</table>
<div class='page-break'>
</div>

</table>
";










print"

</body>

</html>




";

?>