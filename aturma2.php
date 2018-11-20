
<?php
include 'conexao.php';
session_start();
$cod_turma = $_GET['cod_turma'];
?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
		<link rel='stylesheet' href='css/normalize.css'>
		<link rel='stylesheet' href='css/geral.css'>
		<script src='js/prefixfree.min.js'></script>
<script src='js/javascript.js'></script>
    <title>Alunos</title>
  </head>
  <body>
    <div id="wrapper">
    <div id="branding">
    <?php include "head.php";?>
    </div>

    <div id="content">
    <p>&nbsp;</p>



    <form  method="post" action="aturma3.php">
        <input type="hidden" name="cod_turma" value="<?= $cod_turma ?>">
        <a href="aturma.php">Voltar para Turmas</a><br>
<h2>Alunos</h2>

        <?php
        $sql_aturma2 = "SELECT aluno.cod_aluno, aluno.nome FROM aluno "
                . "";
        $todos_sem_turma = mysqli_query($conn, $sql_aturma2)or die(mysqli_error($conn));

        while ($row_aturma2 = mysqli_fetch_array($todos_sem_turma)) {
            echo '<input type="checkbox" name="alunos[]" value="' . $row_aturma2['cod_aluno'] . '">';
            echo $row_aturma2['nome'];
            echo "<br>";
        }
        ?>

        <input type="submit" name="" value="enviar">
    </form>

  </div>

 <ul id="mainNav">
 <?php include "menu.php"?>
 </ul>

 <div id="footer">
 <p> &copy; Nathan Tomaz <?php echo date('Y');?> - Todos os Direitos Reservados </p>
 </div>
  </body>
</html>
