<?php

require_once "../Conexao.php";

//pegar o nome do produto
$email = $_POST['email'];
$senha = $_POST['senha'];

$sql = "SELECT * FROM Cliente WHERE emailCliente='$email' AND senhaCliente='$senha'";
$resultado = $conexao -> query($sql);

if($resultado -> num_rows > 0){
    session_start();
    $linha = $resultado -> fetch_assoc();
    $_SESSION['email'] = $linha['emailCliente'];
    header("Location: DadosCliente.php");
    exit();
}
else{
    header("Location: LogarCliente.php?status=email");
}
?>