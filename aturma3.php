<?php

include 'conexao.php';
$cod_turma = $_POST['cod_turma'];
foreach ($_POST['alunos'] as $cod_aluno){
      $sql = "INSERT INTO aluno_turma values($cod_aluno, $cod_turma)";
      $sql_c = mysqli_query($conn, $sql);
}
?>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <title>Cadastro Finalizado</title>
  </head>
  <body>
      <script type="text/javascript">
        alert("Registro inserido com sucesso!");
	window.location.assign("aturma.php");
    </script>
  </body>
</html>
