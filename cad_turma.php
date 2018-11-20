<?php
session_start();
include 'conexao.php';

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
		<title>CRUD - Turma</title>
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
		<h2>Cadastrar Turma</h2>
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

		<form method="POST" action="proc_cad_turma.php">
		<table border="0" cellspacing="4" cellpadding="4">
			<tr>
				<td><label title="Nome da turma.">Turma</label></td>
				<td><input type="text" name="letra" size="1" maxlength="1" placeholder="A" id="letra"></td>
			</tr>

		<tr>
			<td><label>Período</label></td>
			<td><input type="text" name="periodo" size="2" maxlength="2" placeholder="8" id="periodo"></td>

		</tr>

			<tr>
        <td>Curso</td>

				<td>
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
          </select>
        </td>
			</tr>
      <tr>
        <td>Ano</td>
        <td><input type="year" name="ano" size="4" maxlength="4" placeholder="2077" id="ano"><br></td>
      </tr>
      <tr>
        <td>Semestre</td>
      <td>
      <select name="semestre" id="semestre">
      <option value="1">1º</option>
      <option value="2">2º</option>
      <option value="3">3º</option>
      <option value="4">4º</option>
      <option value="5">5º</option>
      <option value="6">6º</option>
      <option value="7">7º</option>
      <option value="8">8º</option>
      <option value="9">9º</option>
      <option value="10">10º</option>
      <select/>
      </td>
      </tr>
			<tr>
				<td colspan="2">
					<input type="submit" value="Cadastrar">
					<input type="button" name="btnLimpar" value="Limpar" onclick="location.href='cad_turma.php'" title="Limpar a página">
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
