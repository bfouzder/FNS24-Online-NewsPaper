<?

include("vImage.php");
$vImage = new vImage();

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title>Example Captch Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body>
<table width="100%" border="1" cellpadding="0" cellspacing="0" bordercolor="#006699">
  <form name="form1" method="post" action="verify.php">
    <tr bordercolor="#FFFFFF" bgcolor="#3399CC">
      <td colspan="2" align="center"><font color="#FFFFFF" size="4" face="Verdana, Arial, Helvetica, sans-serif"><strong>Verification Image<br>
Imagem de Verifica&ccedil;&atilde;o </strong></font> </td>
    </tr>
    <tr bordercolor="#FFFFFF">
      <td colspan="2"><font size="2" face="Verdana, Arial, Helvetica, sans-serif">&nbsp;</font></td>
    </tr>
    <tr bordercolor="#FFFFFF">
      <td colspan="2"><div align="center"><font size="2" face="Verdana, Arial, Helvetica, sans-serif"><img src="img.php?size=6"></font></div></td>
    </tr>
    <tr bordercolor="#FFFFFF">
      <td width="25%" nowrap><font size="2" face="Verdana, Arial, Helvetica, sans-serif">Please enter the code you see above*:&nbsp;<br>
Por favor digite o texto da imagem*:&nbsp;</font></td>
      <td width="75%"><font size="2" face="Verdana, Arial, Helvetica, sans-serif">
	    <?
	$vImage->showCodBox(1);
	?>
	</font></td>
    </tr>
    <tr bordercolor="#FFFFFF">
      <td colspan="2" align="center" nowrap>
        <input type="submit" name="Submit" value="Send / Enviar">
      </td>
    </tr>
    <tr bordercolor="#FFFFFF">
      <td colspan="2" nowrap><font size="1" face="Verdana, Arial, Helvetica, sans-serif">*Code <strong>is</strong> Case-Sensitive<br>
        &nbsp;&nbsp;O c&oacute;digo <strong>&eacute; sensivel</strong> a Caixa Alta/Baixa</font></td>
    </tr>
  </form>
</table>

<div align="right"><font size="1" face="Verdana, Arial, Helvetica, sans-serif">author: <a href="mailto:dooms@terra.com.br">Rafael &quot;DoomsDay&quot; Dohms</a></font><br>
</div>
</body>
</html>
