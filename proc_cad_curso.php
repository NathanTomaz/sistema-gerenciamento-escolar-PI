<?php
session_start();
include_once("conexao.php");

$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
$sigla = filter_input(INPUT_POST, 'sigla', FILTER_SANITIZE_STRING);

$result_curso = "INSERT INTO curso (nome, sigla) VALUES ('$nome', '$sigla')";
$resultado_curso = mysqli_query($conn, $result_curso);

if(mysqli_insert_id($conn)){
	$_SESSION['msg'] = "<p style='color:green;'>Curso cadastrado com sucesso</p>";
	header("Location: listarCursos.php");
}else{
	$_SESSION['msg'] = "<p style='color:red;'>Curso não foi cadastrado com sucesso</p>";
	header("Location: cad_curso.php");
}
