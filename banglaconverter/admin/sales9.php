<?php

print"
<html>
<head>
<title> Testing </title>
";
?>
  

  <link rel="stylesheet" href="jquery-ui-themes-1.11.4/themes/smoothness/jquery-ui.css">
  
  

  <script src="jquery-1.10.2.js"></script>
  <script src="jquery-ui.js"></script>
  

<?php
print"  
</head>


<body>

<table align='center' width='800' cellpadding='0' cellspacing='0'>

<tr> 

<td align='center'>  
<BR>
<BR>
<BR>
<BR>


<form name='add_tweet' method='POST'>


<input type='text' name='tweet' id='tweet'>

<br>
<BR>
<BR>

<input type='button' name='btn_tweet' id='btn_tweet'  value='POST'>

</form>

</td>
</tr>




<tr>
<td align='center'>
<div id='t'>
";

print"
</div>
</td>
</tr>

</table>



</body>

</html>
";
?>
<script>

$(document).ready(function(){
    $("#btn_tweet").click(function(){
	
        var tweet_txt=$('#tweet').val();
  if($.trim(tweet_txt)!='')
{
$.ajax ({
url:"new_n.php",
method:"POST",
data:{tweet:tweet_txt},
dataType:"text",
success:function(data)
{
$('#tweet').val("");
}



});


$('#t').load("new3.php").fadeIn("slow");


}


		
    });



});





</script>


