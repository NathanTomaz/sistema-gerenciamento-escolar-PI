<?php
session_start();
include_once("conexao.php");
//include('head.php');
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<link rel='stylesheet' href='css/normalize.css'>
		<link rel='stylesheet' href='css/geral.css'>
		<script src='js/prefixfree.min.js'></script>
<script src='js/javascript.js'></script>
		<title>CRUD - Listar Alunos</title>
	</head>
	<body>
		<div id="wrapper">
		<div id="branding">
		<?php include "head.php";?>
		</div>

		<div id="content">
		<p>&nbsp;</p>


		<a href="cad_aluno.php">Cadastrar Alunos</a><br>
		<a href="listarAlunos.php">Listar Alunos</a><br><br>
		<h2>Lista de Alunos</h2>
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

		$result_alunos = "SELECT * FROM aluno LIMIT $inicio, $qnt_result_pg";
		$resultado_alunos = mysqli_query($conn, $result_alunos);
		while($row_aluno = mysqli_fetch_assoc($resultado_alunos)){
			echo "Matricula: " . $row_aluno['matricula'] . "<br>";
			echo "Nome: " . $row_aluno['nome'] . "<br>";
			echo "Telefone: " . $row_aluno['telefone'] . "<br>";
			echo "<a href='edit_aluno.php?cod_aluno=" . $row_aluno['cod_aluno'] . "'>Editar</a>&nbsp";
			echo "<a href='listarAlunos.php?excluir=" . $row_aluno['cod_aluno'] . "'>Excluir</a><br><hr>";

		}

if(isset($_GET['excluir'])){
	$id = $_GET['excluir'];
	$sql = "DELETE FROM `aluno` WHERE `aluno`.`cod_aluno` = $id";
	mysqli_query($conn,$sql);?>

	<script>alert("Aluno removido com sucesso!");
	window.location.assign("listarAlunos.php");
	</script>

	<?php
	header("listarAlunos.php");
}


		//Paginação - Somar a quantidade de usuários
		$result_pg = "SELECT COUNT(cod_aluno) AS num_result FROM aluno";
		$resultado_pg = mysqli_query($conn, $result_pg);
		$row_pg = mysqli_fetch_assoc($resultado_pg);
		//echo $row_pg['num_result'];
		//Quantidade de pagina
		$quantidade_pg = ceil($row_pg['num_result'] / $qnt_result_pg);

		//Limitar os link antes depois
		$max_links = 2;
		echo "<a href='listarAlunos.php?pagina=1'>Primeira</a> ";

		for($pag_ant = $pagina - $max_links; $pag_ant <= $pagina - 1; $pag_ant++){
			if($pag_ant >= 1){
				echo "<a href='listarAlunos.php?pagina=$pag_ant'>$pag_ant</a> ";
			}
		}

		echo "$pagina ";

		for($pag_dep = $pagina + 1; $pag_dep <= $pagina + $max_links; $pag_dep++){
			if($pag_dep <= $quantidade_pg){
				echo "<a href='listarAlunos.php?pagina=$pag_dep'>$pag_dep</a> ";
			}
		}

		echo "<a href='listarAlunos.php?pagina=$quantidade_pg'>Ultima</a>";

		?>


				 	</div>

					<ul id="mainNav">
					<?php include "menu.php"?>
					</ul>

					<div id="footer">
					<p> &copy; Nathan Tomaz <?php echo date('Y');?> - Todos os Direitos Reservados </p>
					</div>
		</div>
	</body>
</html>
