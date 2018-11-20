<?php
session_start();
include_once("conexao.php");

?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<link rel='stylesheet' href='css/normalize.css'>
		<link rel='stylesheet' href='css/geral.css'>
		<script src='js/prefixfree.min.js'></script>
<script src='js/javascript.js'></script>
		<title>CRUD - Listar Turmas</title>
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
		<h2>Listar Turmas</h2>
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

		$result_turmas = "SELECT * FROM turma LIMIT $inicio, $qnt_result_pg";
		$resultado_turmas = mysqli_query($conn, $result_turmas);
		while($row_turma = mysqli_fetch_assoc($resultado_turmas)){
			echo "Letra: " . $row_turma['letra'] . "<br>";
			echo "Periodo: " . $row_turma['periodo'] . "<br>";
			echo "Cod_Curso: " . $row_turma['cod_curso'] . "<br>";
      echo "Ano: " . $row_turma['ano'] . "<br>";
      echo "Semestre: " . $row_turma['semestre'] . "<br>";
			echo "<a href='edit_turma.php?cod_turma=" . $row_turma['cod_turma'] . "'>Editar</a>&nbsp";
			echo "<a href='listarTurmas.php?excluir=" . $row_turma['cod_turma'] . "'>Excluir</a><br><hr>";
		}

		if(isset($_GET['excluir'])){
			$id = $_GET['excluir'];
			$sql = "DELETE FROM `turma` WHERE `turma`.`cod_turma` = $id";
			mysqli_query($conn,$sql);?>

			<script>alert("Turma removida com sucesso!");
			window.location.assign("listarTurmas.php");
			</script>

			<?php
			header("listarTurmas.php");
		}


		//Paginação - Somar a quantidade de usuários
		$result_pg = "SELECT COUNT(cod_turma) AS num_result FROM turma";
		$resultado_pg = mysqli_query($conn, $result_pg);
		$row_pg = mysqli_fetch_assoc($resultado_pg);
		//echo $row_pg['num_result'];
		//Quantidade de pagina
		$quantidade_pg = ceil($row_pg['num_result'] / $qnt_result_pg);

		//Limitar os link antes depois
		$max_links = 2;
		echo "<a href='listarTurmas.php?pagina=1'>Primeira</a> ";

		for($pag_ant = $pagina - $max_links; $pag_ant <= $pagina - 1; $pag_ant++){
			if($pag_ant >= 1){
				echo "<a href='listarTurmas.php?pagina=$pag_ant'>$pag_ant</a> ";
			}
		}

		echo "$pagina ";

		for($pag_dep = $pagina + 1; $pag_dep <= $pagina + $max_links; $pag_dep++){
			if($pag_dep <= $quantidade_pg){
				echo "<a href='listarTurmas.php?pagina=$pag_dep'>$pag_dep</a> ";
			}
		}

		echo "<a href='listarTurmas.php?pagina=$quantidade_pg'>Ultima</a>";

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
