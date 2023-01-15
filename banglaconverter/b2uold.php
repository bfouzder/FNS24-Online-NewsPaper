<?php

require_once 'bijoy2unicode.php';
$demo=trim($_POST['convert']);
$converted = convertBijoyToUnicode($demo);

print"$converted";



?>