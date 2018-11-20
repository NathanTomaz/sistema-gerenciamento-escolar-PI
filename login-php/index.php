<?php
session_start();
?>
<!--
Função: Tela de login do site(app)
@author: Nathan Tomaz de Oliveira
Data: 13/11/18
-->
<!doctype html>
<html lang='pt-br'>
<head>
	<meta charset='UTF-8'>
	<title>Trabalho PI - Sistema Escolar</title>
	<link rel='stylesheet' href='../css/normalize.css'>
	<link rel="stylesheet" href="../css/login.css">
	<script src='../js/prefixfree.min.js'></script>
	<script src='../js/javascript.js'></script>

</head>
<body style="background-image: url(../images/back.jpg)">
<div class="divhead"></div>
<div class="divlogin">
<form name="frmLogin" action="login.php" method="post">

	<h1 align="center">Sistema de Login</h1>

	<table align="center" cellpadding="5" cellspacing="5">
		<caption align="center">
			Acesso ao Sistema
		</caption>
		<tr>
			<td>&nbsp;</td>
			<td><input type="text" name="usuario" placeholder="Login" autofocus="" ></td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td><input type="password" name="senha"  placeholder="Senha"></td>
		</tr>
		<tr>
			<td colspan="2" align="center">
				<input type="submit" name="btnLogar" value="Logar">
				<input type="reset" name="btnLimpar" value="Limpar" title="Limpa o formulário" >
			</td>
		</tr>
	</table>
</form>
</div>
<div class="divfoot">
	<?php
		if(isset($_GET['msg']))
		{
			echo "<p align='center'>".$_GET['msg']."</p>";
		}
	?>
</div>
<script src='../js/jquery.min.js'></script>
</body>
</html>
