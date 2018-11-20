<?php
session_start();
include_once("conexao.php");

$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
$matri = filter_input(INPUT_POST, 'matricula', FILTER_SANITIZE_STRING);
$tel = filter_input(INPUT_POST, 'telefone', FILTER_SANITIZE_STRING);

$result_aluno = "INSERT INTO aluno (nome, matricula, telefone) VALUES ('$nome', '$matri', '$tel')";
$resultado_aluno = mysqli_query($conn, $result_aluno);

if(mysqli_insert_id($conn)){
	$_SESSION['msg'] = "<p style='color:green;'>Aluno cadastrado com sucesso</p>";
	header("Location: listarAlunos.php");
}else{
	$_SESSION['msg'] = "<p style='color:red;'>Aluno não foi cadastrado com sucesso</p>";
	header("Location: cad_aluno.php");
}
