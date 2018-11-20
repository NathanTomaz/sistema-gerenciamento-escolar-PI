<?php
session_start();
include_once("conexao.php");
$cod_aluno = filter_input(INPUT_GET, 'cod_aluno', FILTER_SANITIZE_NUMBER_INT);
$result_aluno = "SELECT * FROM aluno WHERE cod_aluno = '$cod_aluno'";
$resultado_aluno = mysqli_query($conn, $result_aluno);
$row_aluno = mysqli_fetch_assoc($resultado_aluno);
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

		<a href="cad_aluno.php">Cadastrar Alunos</a><br>
		<a href="listarAlunos.php">Listar Alunos</a><br>
		<h2>Editar Aluno</h2>
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

		<?php
		if(isset($_SESSION['msg'])){
			echo $_SESSION['msg'];
			unset($_SESSION['msg']);
		}
		?>
		<form method="POST" action="proc_edit_aluno.php">
			<input type="hidden" name="cod_aluno" value="<?php echo $row_aluno['cod_aluno']; ?>">

			<label>Aluno: </label>
			<input type="text" name="nome" autofocus placeholder="Nathan Tomaz" value="<?php echo $row_aluno['nome']; ?>"><br><br>

			<label>Matricula: </label>
			<input type="text" placeholder="00.000-0000" name="matricula" id="matricula" value="<?php echo $row_aluno['matricula']; ?>"><br><br>

			<label>Telefone: </label>
			<input type="text" placeholder="(00) 0000-0000" name="telefone" id="telefone" value="<?php echo $row_aluno['telefone']; ?>"><br><br>

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
