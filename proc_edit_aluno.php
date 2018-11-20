<?php
session_start();
include_once("conexao.php");

$cod_aluno = filter_input(INPUT_POST, 'cod_aluno', FILTER_SANITIZE_NUMBER_INT);
$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
$tel = filter_input(INPUT_POST, 'telefone', FILTER_SANITIZE_STRING);
$matri = filter_input(INPUT_POST, 'matricula', FILTER_SANITIZE_STRING);


//echo "Nome: $nome <br>";
//echo "Matricula: $matri <br>";

$result_aluno = "UPDATE aluno SET nome='$nome', telefone='$tel', matricula='$matri' WHERE cod_aluno='$cod_aluno'";
$resultado_aluno = mysqli_query($conn, $result_aluno);

if(mysqli_affected_rows($conn)){
	$_SESSION['msg'] = "<p style='color:green;'>Aluno editado com sucesso</p>";
	header("Location: listarAlunos.php");
}else{
	$_SESSION['msg'] = "<p style='color:red;'>Aluno não foi editado com sucesso</p>";
	header("Location: listarAlunos.php?cod_aluno=$cod_aluno");
}
