<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
	<meta charset="UTF-8">
	<link rel='stylesheet' href='css/normalize.css'>
	<link rel='stylesheet' href='css/geral.css'>
	<script src='js/prefixfree.min.js'></script>
<script src='js/javascript.js'></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>
		<title>CRUD - Curso</title>
	</head>
	<body>
		<div id="wrapper">
		<div id="branding">
		<?php include "head.php";?>
		</div>

		<div id="content">
		<p>&nbsp;</p>

		<a href="cad_curso.php">Cadastrar Cursos</a><br>
		<a href="listarCursos.php">Listar Cursos</a><br>
		<h2>Cadastrar Cursos</h2>
		<?php
		if(isset($_SESSION['msg'])){
			echo $_SESSION['msg'];
			unset($_SESSION['msg']);
		}
		?>
		<legend>
			Cursos
				<?php
					if(isset($_GET['cod_curso']))
					{
						echo "<label class='label'>[Modo edição]</label>";
					}
					else
					{

						echo "<label class='label'>[Modo inserção]</label>";
					}

				?>
		</legend>

		<fieldset>

		<form method="POST" action="proc_cad_curso.php">
		<table border="0" cellspacing="4" cellpadding="4">
			<tr>
				<td><label title="Nome do curso.">Curso</label></td>
				<td><input type="text" name="nome" size="25" maxlength="25" id="nome" placeholder="Engenharia de Software" autofocus/></td>
			</tr>

		<tr>
			<td><label title="Sigla do Curso">Sigla</label></td>
			<td><input type="text" name="sigla" size="2" maxlength="2" id="sigla" placeholder="ES" /></td>

		</tr>

			<tr>
				<td colspan="2">
					<input type="submit" value="Cadastrar">
					<input type="button" name="btnLimpar" value="Limpar" onclick="location.href='cad_curso.php'" title="Limpar a página">
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
