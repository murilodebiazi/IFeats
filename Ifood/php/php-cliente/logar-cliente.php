<?php

require_once "../conectar.php";

$email = $_POST['email'] ?? "";
$senha = $_POST['senha'] ?? "";
$confirmar = $_POST['confirmar'] ?? "";

if ($confirmar == $senha) {
    $sql = "SELECT * FROM Cliente WHERE emailCliente='$email' AND senhaCliente='$senha'";
    $resultado = $conexao->query($sql);
    if ($resultado->num_rows > 0) {
        session_start();
        $linha = $resultado->fetch_assoc();
        $_SESSION['emailCliente'] = $linha["emailCliente"];
        header("Location: sessao-cliente.php");
        exit();
    }
    //else{
    //    header("Location: LogarCliente.php?status=nao");
    //}
} else {
    header("Location: form-logar-cliente.php?status=senha");
}
?>