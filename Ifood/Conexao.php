<?php
$servidor = "localhost";
$usuario = "root";
$senha = "root";
$banco = "IFeats";

$conexao = mysqli_connect($servidor, $usuario, $senha, $banco);

// este if deve ficar comentado após testar conexão com BD
/*
if (!$conexao) 
    {
    die("Erro na conexão: " . mysqli_connect_error());
    }
else { 
	echo ("Conectado com sucesso ao BD");
     }
*/
?>