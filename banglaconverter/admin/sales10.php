<?php

print"
<html>
<head>
<title> Testing </title>
";
?>
  
  <script src="jquery-1.10.2.js"></script>
  <script src="jquery-ui.js"></script>
  

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css">

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  


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
    $("#tweet").keyup(function(){
	
        var tweet_txt=$('#tweet').val();
  if($.trim(tweet_txt)!='')
{

$.ajax ({
url:"new.php",
method:"POST",
data:{tweet:tweet_txt},
dataType:"text",
success:function(data)
{
$('$t').html(data);
//alert('sdf');
}



});


//$('#t').load("new2.php").fadeIn("slow");


}


		
    });



});





</script>


