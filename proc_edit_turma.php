<?php
session_start();
include_once("conexao.php");

$cod_turma = filter_input(INPUT_POST, 'cod_turma', FILTER_SANITIZE_NUMBER_INT);
$letra = filter_input(INPUT_POST, 'letra', FILTER_SANITIZE_STRING);
$periodo = filter_input(INPUT_POST, 'periodo', FILTER_SANITIZE_NUMBER_INT);
$cod_curso = filter_input(INPUT_POST, 'cod_curso', FILTER_SANITIZE_NUMBER_INT);
$ano = filter_input(INPUT_POST, 'ano', FILTER_SANITIZE_NUMBER_INT);
$semestre = filter_input(INPUT_POST, 'semestre', FILTER_SANITIZE_NUMBER_INT);


//echo "Letra: $letra <br>";
//echo "cod_curso: $cod_curso <br>";

$result_turma = "UPDATE turma SET letra='$letra', periodo='$periodo', cod_curso='$cod_curso', ano='$ano', semestre='$semestre' WHERE cod_turma='$cod_turma'";
$resultado_turma = mysqli_query($conn, $result_turma);

if(mysqli_affected_rows($conn)){
	$_SESSION['msg'] = "<p style='color:green;'>Turma editada com sucesso</p>";
	header("Location: listarTurmas.php");
}else{
	$_SESSION['msg'] = "<p style='color:red;'>Turma não foi editada com sucesso</p>";
	header("Location: listarTurmas.php?cod_turma=$cod_turma");
}
