<?php include 'conexao.php';
session_start();
?>

<!DOCTYPE html>

<html>
    <head>
      <script src="javascript.js">
  </script>
  <link rel='stylesheet' href='css/normalize.css'>
  <link rel='stylesheet' href='css/geral.css'>
  <script src='js/prefixfree.min.js'></script>
<script src='js/javascript.js'></script>
  	<meta charset="UTF-8">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>
  		<title>CRUD - Aluno-Turma</title>
        <title>Cadastrar Aluno na Turma</title>
    </head>
    <body>
      <div id="wrapper">
      <div id="branding">
      <?php include "head.php";?>
      </div>

      <div id="content">
      <p>&nbsp;</p>

<a href="aturma.php">Cadastrar Aluno na Turma</a><br>
<h2>Turmas</h2>

    <?php
          $sql_curso = "SELECT nome,periodo,cod_turma FROM curso,turma "
                  . "WHERE curso.cod_curso = turma.cod_curso ";

          $todos_turmas = mysqli_query($conn, $sql_curso);
          while($row_cursos = mysqli_fetch_assoc($todos_turmas)){
      $cod_turma =  $row_cursos['cod_turma'];
            echo "<a href='aturma2.php?cod_turma=$cod_turma'>".$row_cursos['periodo']."° ".$row_cursos['nome']."</a><br>";
          }
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
