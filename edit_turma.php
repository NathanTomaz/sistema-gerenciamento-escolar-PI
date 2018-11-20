<?php
session_start();
include_once("conexao.php");
$cod_turma = filter_input(INPUT_GET, 'cod_turma', FILTER_SANITIZE_NUMBER_INT);
$result_turma = "SELECT * FROM turma WHERE cod_turma = '$cod_turma'";
$resultado_turma = mysqli_query($conn, $result_turma);
$row_turma = mysqli_fetch_assoc($resultado_turma);
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<<meta charset="utf-8">
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

		<a href="cad_turma.php">Cadastrar Turmas</a><br>
		<a href="listarTurmas.php">Listar Turmas</a><br>
		<h2>Editar Turma</h2>
		<fieldset>
			<legend>
				Turmas
					<?php
						if(isset($_GET['cod_turma']))
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
		<form method="POST" action="proc_edit_turma.php">
			<input type="hidden" name="cod_turma" value="<?php echo $row_turma['cod_turma']; ?>">

			<label title="Nome da turma.">Turma: </label>
			<input type="text" name="letra" size="1" maxlength="1" placeholder="A" id="letra" value="<?php echo $row_turma['letra']; ?>"><br><br>

			<label>Período: </label>
			<input type="text" name="periodo" size="2" maxlength="2" placeholder="8" id="periodo" value="<?php echo $row_turma['periodo']; ?>"><br><br>

			<label>Curso: </label>
      <select name="cod_curso">
            <option>Selecione</option>
      <?php
                $sql_curso = "SELECT * FROM curso";
                $todos_cursos = mysqli_query($conn, $sql_curso);
                while($row_cursos = mysqli_fetch_assoc($todos_cursos)){?>

            <option value="<?php  echo $row_cursos['cod_curso'];?>"><?php echo $row_cursos['nome']; ?>
                </option> <?php
                  }

             ?>
      </select><br><br>

      <label>Ano: </label>
      <input input type="year" name="ano" size="4" maxlength="4" placeholder="2077" id="ano" value="<?php echo $row_turma['ano']; ?>"><br><br>

      <label>Semestre: </label>
      <input input type="number" name="semestre" size="2" maxlength="2"  id="semestre" value="<?php echo $row_turma['semestre']; ?>"><br><br>

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
