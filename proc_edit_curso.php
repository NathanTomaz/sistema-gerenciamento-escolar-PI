<?php
session_start();
include_once("conexao.php");

$cod_curso = filter_input(INPUT_POST, 'cod_curso', FILTER_SANITIZE_NUMBER_INT);
$nome_curso = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
$sigla = filter_input(INPUT_POST, 'sigla', FILTER_SANITIZE_STRING);



//echo "Nome: $nome <br>";
//echo "Matricula: $matri <br>";

$result_curso = "UPDATE curso SET nome='$nome_curso', sigla='$sigla' WHERE cod_curso='$cod_curso'";
$resultado_curso = mysqli_query($conn, $result_curso);

if(mysqli_affected_rows($conn)){
	$_SESSION['msg'] = "<p style='color:green;'>Curso editado com sucesso</p>";
	header("Location: listarCursos.php");
}else{
	$_SESSION['msg'] = "<p style='color:red;'>Curso não foi editado com sucesso</p>";
	header("Location: listarCursos.php?cod_curso=$cod_curso");
}
