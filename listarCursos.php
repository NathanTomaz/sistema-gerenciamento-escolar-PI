<?php
session_start();
include_once("conexao.php");

?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<link rel='stylesheet' href='css/normalize.css'>
		<link rel='stylesheet' href='css/geral.css'>
		<script src='js/prefixfree.min.js'></script>
		<script src='js/javascript.js'></script>
			<meta charset="UTF-8">
		<title>CRUD - Listar Cursos</title>
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
		<h2>Lista de Cursos</h2>
		<?php
		if(isset($_SESSION['msg'])){
			echo $_SESSION['msg'];
			unset($_SESSION['msg']);
		}

		//Receber o número da página
		$pagina_atual = filter_input(INPUT_GET,'pagina', FILTER_SANITIZE_NUMBER_INT);
		$pagina = (!empty($pagina_atual)) ? $pagina_atual : 1;

		//Setar a quantidade de itens por pagina
		$qnt_result_pg = 3;

		//calcular o inicio visualização
		$inicio = ($qnt_result_pg * $pagina) - $qnt_result_pg;

		$result_cursos = "SELECT * FROM curso LIMIT $inicio, $qnt_result_pg";
		$resultado_cursos = mysqli_query($conn, $result_cursos);
		while($row_curso = mysqli_fetch_assoc($resultado_cursos)){
			echo "Sigla: " . $row_curso['sigla'] . "<br>";


			echo "Nome: " . $row_curso['nome'] . "<br>";
			echo "<a href='edit_curso.php?cod_curso=" . $row_curso['cod_curso'] . "'>Editar</a>&nbsp";
			echo "<a href='listarCursos.php?excluir=" . $row_curso['cod_curso'] . "'>Excluir</a><br><hr>";
		}

		if(isset($_GET['excluir'])){
			$id = $_GET['excluir'];
			$sql = "DELETE FROM `curso` WHERE `curso`.`cod_curso` = $id";
			mysqli_query($conn,$sql);?>

			<script>alert("Curso removido com sucesso!");
			window.location.assign("listarCursos.php");
			</script>

			<?php
			header("listarCursos.php");
		}

		//Paginação - Somar a quantidade de usuários
		$result_pg = "SELECT COUNT(cod_curso) AS num_result FROM curso";
		$resultado_pg = mysqli_query($conn, $result_pg);
		$row_pg = mysqli_fetch_assoc($resultado_pg);
		//echo $row_pg['num_result'];
		//Quantidade de pagina
		$quantidade_pg = ceil($row_pg['num_result'] / $qnt_result_pg);

		//Limitar os link antes depois
		$max_links = 2;
		echo "<a href='listarCursos.php?pagina=1'>Primeira</a> ";

		for($pag_ant = $pagina - $max_links; $pag_ant <= $pagina - 1; $pag_ant++){
			if($pag_ant >= 1){
				echo "<a href='listarCursos.php?pagina=$pag_ant'>$pag_ant</a> ";
			}
		}

		echo "$pagina ";

		for($pag_dep = $pagina + 1; $pag_dep <= $pagina + $max_links; $pag_dep++){
			if($pag_dep <= $quantidade_pg){
				echo "<a href='listarCursos.php?pagina=$pag_dep'>$pag_dep</a> ";
			}
		}

		echo "<a href='listarCursos.php?pagina=$quantidade_pg'>Ultima</a>";

		?>
	</div>

 <ul id="mainNav">
 <?php include "menu.php"?>
 </ul>

 <div id="footer">
 <p> &copy; Nathan Tomaz <?php echo date('Y');?> - Todos os Direitos Reservados </p>
 </div>
	</body>
</html>
