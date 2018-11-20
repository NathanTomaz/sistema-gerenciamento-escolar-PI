<?php
@session_start();
include('login-php/verifica_login.php');
?>
<!--
Função: Página Home da aplicação
Autor: Nathan Tomaz
Data: 13/11/2018
-->
<!doctype html>
<html lang='pt-br'>
<head>
	<meta charset='UTF-8'>
	<title>Cadastro Escolar - Home</title>
	<link rel='stylesheet' href='css/normalize.css'>
	<link rel='stylesheet' href='css/geral.css'>
	<script src='js/prefixfree.min.js'></script>
<script src='js/javascript.js'></script>

</head>
<body>

<div id="wrapper">
<div id="branding">
<?php include "head.php";?>
</div>

<div id="content">
<p>&nbsp;</p>
<h3>Bem-Vindo ao Trabalho de Programação para Internet I</h3>
<p>Utilize o menu ao lado para efetuar as tarefas desejadas.</p>
</div>

<ul id="mainNav">
<?php include "menu.php"?>
</ul>

<div id="footer">
<p> &copy; Nathan Tomaz <?php echo date('Y');?> - Todos os Direitos Reservados </p>
</div>


</div>

<script src='js/jquery.min.js'></script>
</body>
</html>
