<?php
session_start();

?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
<link rel='stylesheet' href='css/normalize.css'>
<link rel='stylesheet' href='css/geral.css'>
<script src='js/prefixfree.min.js'></script>
<script src='js/javascript.js'></script>
	<meta charset="UTF-8">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>
		<title>CRUD - Aluno</title>
	</head>
	<body>
		<div id="wrapper">
		<div id="branding">
		<?php include "head.php";?>
		</div>

		<div id="content">
		<p>&nbsp;</p>

		<a href="cad_aluno.php">Cadastrar Alunos</a><br>
		<a href="listarAlunos.php">Listar Alunos</a><br>
		<h2>Cadastrar Aluno</h2>
		<?php
		if(isset($_SESSION['msg'])){
			echo $_SESSION['msg'];
			unset($_SESSION['msg']);
		}
		?>
		<fieldset>
<legend>
	Alunos
		<?php
			if(isset($_GET['cod_aluno']))
			{
				echo "<label class='label'>[Modo edição]</label>";
			}
			else
			{

				echo "<label class='label'>[Modo inserção]</label>";
			}

		?>
</legend>
		<form method="POST" action="proc_cad_aluno.php">
		<table border="0" cellspacing="4" cellpadding="4">
			<tr>
				<td><label title="Nome do aluno.">Aluno</label></td>
				<td><input type="text" name="nome" autofocus placeholder="Nathan Tomaz"></td>
			</tr>

		<tr>
			<td><label title="Número da matricula">Matrícula</label></td>
			<td><input type="text" placeholder="00.000-0000" name="matricula" id="matricula"></td>

		</tr>

			<tr>
				<td><label title="Número de Telefone">Telefone</label></td>
				<td><input type="text" placeholder="(00) 0000-0000" name="telefone" id="telefone" ></td>
			</tr>

			<tr>
				<td colspan="2">
					<input type="submit" value="Cadastrar">
					<input type="button" name="btnLimpar" value="Limpar" onclick="location.href='cad_aluno.php'" title="Limpar a página">
				</td>

			</tr>
		</table>
		</form>

		</fieldset>

		<script type="text/javascript">
		 mascara();
		 </script>

		 	</div>

			<ul id="mainNav">
			<?php include "menu.php"?>
			</ul>

			<div id="footer">
			<p> &copy; Nathan Tomaz <?php echo date('Y');?> - Todos os Direitos Reservados </p>
			</div>

	</body>
</html>
