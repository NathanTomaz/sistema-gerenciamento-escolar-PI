<?php
$servidor = "localhost";
$usuario = "root";
$senha = "vici";
$dbname = "gestao";

//Criar a conexao
$conn = mysqli_connect($servidor, $usuario, $senha, $dbname) or die ("Não foi possível conectar");
