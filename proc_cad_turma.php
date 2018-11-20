<?php
session_start();
include_once("conexao.php");

$letra = filter_input(INPUT_POST, 'letra', FILTER_SANITIZE_STRING);
$periodo = filter_input(INPUT_POST, 'periodo', FILTER_SANITIZE_STRING);
$cod_curso = filter_input(INPUT_POST, 'cod_curso', FILTER_SANITIZE_NUMBER_INT);
$ano = filter_input(INPUT_POST, 'ano', FILTER_SANITIZE_NUMBER_INT);
$semestre = filter_input(INPUT_POST, 'semestre', FILTER_SANITIZE_STRING);

echo $letra;

$result_turma = "INSERT INTO turma (letra, periodo, cod_curso, ano, semestre) VALUES('$letra', '$periodo', '$cod_curso', '$ano', '$semestre')";
$resultado_turma = mysqli_query($conn, $result_turma);

if(mysqli_insert_id($conn)){
	$_SESSION['msg'] = "<p style='color:green;'>Turma cadastrada com sucesso</p>";
	header("Location: listarTurmas.php");
}else{
	$_SESSION['msg'] = "<p style='color:red;'>Turma não foi cadastrada com sucesso</p>";
	header("Location: cad_turma.php");
}
