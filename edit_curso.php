<?php
session_start();
include_once("conexao.php");
$cod_curso = filter_input(INPUT_GET, 'cod_curso', FILTER_SANITIZE_NUMBER_INT);
$result_curso = "SELECT * FROM curso WHERE cod_curso = '$cod_curso'";
$resultado_curso = mysqli_query($conn, $result_curso);
$row_curso = mysqli_fetch_assoc($resultado_curso);
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<link rel='stylesheet' href='css/normalize.css'>
		<link rel='stylesheet' href='css/geral.css'>
		<script src='js/prefixfree.min.js'></script>
<script src='js/javascript.js'></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>
		<title>CRUD - Editar</title>
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
		<h2>Editar Curso</h2>
		<fieldset>
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

		<?php
		if(isset($_SESSION['msg'])){
			echo $_SESSION['msg'];
			unset($_SESSION['msg']);
		}
		?>
		<form method="POST" action="proc_edit_curso.php">
			<input type="hidden" name="cod_curso" value="<?php echo $row_curso['cod_curso']; ?>">

			<label>Curso: </label>
			<input type="text" name="nome" size="25" maxlength="25" id="nome" placeholder="Engenharia de Software" autofocus value="<?php echo $row_curso['nome']; ?>"><br><br>

			<label>Sigla: </label>
			<input type="text" name="sigla" size="2" maxlength="2" id="sigla" placeholder="ES" value="<?php echo $row_curso['sigla']; ?>"><br><br>

			<input type="submit" value="Editar">
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
